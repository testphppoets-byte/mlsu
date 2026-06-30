@php
    $theme = \App\Models\Theme::first();
@endphp
<div class="header-top">
   <div class="container">
      <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
         <div class="col-auto">
            <div class="header-links">
 		{!! \App\Models\Block::where('slug', 'header_top_left_part')->where('published', true)->first()?->content !!}
            </div>
         </div>
	<div class="col-auto">
            <div class="header-links">
              {!! \App\Models\Block::where('slug', 'header_top_right_part')->where('published', true)->first()?->content !!} 
	    </div>	
         </div> 
      </div>
   </div>
</div>
<div class="header-info d-none d-sm-block">
   <div class="container">
      <div class="row justify-content-between align-items-center">
         <div class="col-lg-5 col-sm-8 col-md-5">
            <div class="header-logo">
		<a href="/"> 
		@if($theme->logo)
			<img src="{{ asset('storage/' . $theme->logo) }}"
			     alt="{{ $theme->title }}"
			     >
		@else <img src="img/logo_red.png" alt="Mlsu">
		@endif</a>
	     </div>
         </div>
         <div class="col-auto">
            <div class="header-info-right">
             {!! \App\Models\Block::where('slug', 'header_mid_info_right_part')->where('published', true)->first()?->content !!} 
               
         </div>
      </div>
   </div>
</div>
<div class="container-fluid">
<div class="marquee">
    <div class="marquee-content">
        🌟 NAAC Accredited 'A' Grade University   🏆 India Rankings 2025 (NIRF)  |  🎓 State Public Universities: Rank Band 51–100  |  💊 Pharmacy Category: Rank 64
    </div>
</div>
</div>
<div class="sticky-wrapper">
   <div class="menu-area">
      <div class="container ">
         <div class="menu-wrapp">
            <div class="row align-items-center justify-content-between">
               <div class="col-auto">
                  <div class="header-left d-flex align-items-center">
                     <div class="header-logo d-block d-sm-none"><a href="/">
			@if($theme->logo)
				<img src="{{ asset('storage/' . $theme->logo) }}"
				     alt="{{ $theme->title }}"
				     >
			@else <img src="img/logo_red.png" alt="Mlsu">
			@endif</a>
		     </div>
			
                
		@include('partials.Navigation')
                    
                  </div>
		 <div class="col-auto ms-lg-auto"><div class="header-button"><button type="button" class="th-menu-toggle d-inline-block d-xl-none"><i class="fas fa-bars"></i></button></div></div>
               </div>
              
            </div>
         </div>
      </div>
   </div>
</div>

