@php
    $theme = \App\Models\Theme::first();
@endphp
<footer class="footer-wrapper footer-default footer-overlay background-image" style="background-image: url(&quot;https://www.mlsu.ac.in/old_css/images/footer.jpg&quot;);">

<div class="container">
   <div class="widget-area">
      <div class="row justify-content-between">
         <div class="col-md-6 col-xl-auto">
              {!! \App\Models\Block::where('slug', 'footer_block1')->where('published', true)->first()?->content !!} 
               
         </div>
         <div class="col-sm-6 col-xl-auto">
             {!! \App\Models\Block::where('slug', 'footer_block2')->where('published', true)->first()?->content !!} 
         </div>
         <div class="col-sm-6 col-xl-auto">
            {!! \App\Models\Block::where('slug', 'footer_block3')->where('published', true)->first()?->content !!} 
         </div>
         <div class="col-md-6 col-xl-auto">
         {!! \App\Models\Block::where('slug', 'footer_block4')->where('published', true)->first()?->content !!} 
         </div>
      </div>
   </div>
</div>
<div class="copyright-wrap z-index-common">
   <div class="container">
      <div class="row justify-content-center gy-3 align-items-center">
         <div class="col-lg-6">
           {!! \App\Models\Block::where('slug', 'footer_copyright')->where('published', true)->first()?->content !!} 
         </div>
         <div class="col-lg-6 text-lg-end text-center">
 		{!! \App\Models\Block::where('slug', 'footer_link_bottom')->where('published', true)->first()?->content !!} 
           
         </div>
      </div>
   </div>
</div>
</footer>
<script src="assets/js/jquery-3.7.1.min.js"></script>
<script src="assets/js/swiper-bundle.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/js/imagesloaded.pkgd.min.js"></script>
<script src="assets/js/isotope.pkgd.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/gsap.min.js"></script>
<script src="assets/js/ScrollTrigger.min.js"></script>
<script src="assets/js/SplitText.min.js"></script>
<script src="assets/js/lenis.min.js"></script>
<script src="assets/js/main.js"></script>
 {!! $theme->footer_content !!}

