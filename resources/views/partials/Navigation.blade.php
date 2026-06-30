@php
    $menus = \App\Models\Menu::with('children.children')
        ->whereNull('parent_id')
        ->orderBy('order')
        ->get();
@endphp


<nav class="main-menu d-none d-xl-block">
    {{-- Mobile toggle button --}}
    <button class="menu-toggle d-xl-none">☰</button>

    <ul class="menu-list">
        @foreach($menus as $menu)
            <li class="{{ $menu->children->count() ? 'menu-item-has-children' : '' }}">
                <a href="{{ $menu->url }}">{{ $menu->title }}</a>

                {{-- Level 2 --}}
                @if($menu->children->count())
                    <ul class="{{ $menu->is_child_megamenu ? 'mega-menu mega-menu-content mega-scroll' : 'sub-menu' }}">
                        @if($menu->is_child_megamenu)
                            <li>
                                <div class="container">
                                    <div class="row gy-4">
                                        @foreach($menu->children as $child)
                                            <div class="col-lg-3 col-md-6">
                                                <div class="mega-menu-box">
                                                    <h3 class="mega-menu-title">
                                                        <a href="{{ $child->url }}">{{ $child->title }}</a>
                                                    </h3>
                                                    {{-- Level 3 --}}
                                                    @if($child->children->count())
                                                        <ul class="sub-menu-3">
                                                            @foreach($child->children as $grandchild)
                                                                <li><a href="{{ $grandchild->url }}">{{ $grandchild->title }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                        @else
                            @foreach($menu->children as $child)
                                <li class="{{ $child->children->count() ? 'menu-item-has-children' : '' }}">
                                    <a href="{{ $child->url }}">{{ $child->title }}</a>
                                    {{-- Level 3 --}}
                                    @if($child->children->count())
                                        <ul class="sub-menu">
                                            @foreach($child->children as $grandchild)
                                                <li><a href="{{ $grandchild->url }}">{{ $grandchild->title }}</a></li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        @endif
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</nav>

