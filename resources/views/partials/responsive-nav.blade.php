@php
    $menus = \App\Models\Menu::with('children.children')
        ->whereNull('parent_id')
        ->orderBy('order')
        ->get();
    $theme = \App\Models\Theme::first();
@endphp

 <div class="th-menu-wrapper">
        <div class="th-menu-area text-center">
            <button class="th-menu-toggle"><i class="fas fa-times"></i></button>
            <div class="mobile-logo">
               <a href="/">
			@if($theme->logo)
				<img src="{{ asset('storage/' . $theme->logo) }}"
				     alt="{{ $theme->title }}"
				     >
			@else <img src="img/logo_red.png" alt="Mlsu">
			@endif</a>
            </div>
            <div class="th-mobile-menu">
                <ul>  
		@foreach($menus as $menu)
                    <li class="{{ $menu->children->count() ? 'menu-item-has-children th-item-has-children' : '' }}"">  <a href="{{ $menu->url }}">{{ $menu->title }}     @if($menu->children->count())<span class="th-mean-expand"></span>@endif </a>
                       {{-- Level 2 --}}
                @if($menu->children->count())
			 <ul class="{{ $menu->is_child_megamenu ? 'sub-menu th-submenu' : 'sub-menu th-submenu' }}" style="display: none;">
		                @foreach($menu->children as $child)                                     
		                            <li>
		                                <a class="seprated-hr" href="{{ $child->url }}">{{ $child->title }}</a>
		                           </li>
		                            {{-- Level 3 --}}
		                            @if($child->children->count())
		                    		@foreach($child->children as $grandchild)
		                                        <li><a href="{{ $grandchild->url }}">{{ $grandchild->title }}</a></li>
		                                 @endforeach
		                            @endif                                              
		                @endforeach
                        </ul>
                      @endif
                    </li>
                 @endforeach
    </ul>
            </div>
        </div>
    </div>
