@extends('layouts.app')

@section('title', 'Home - Mohanlal Sukhadia University')

@section('content')
    <div class="th-hero-wrapper hero-1" id="hero">
         <div class="swiper th-slider" id="heroSlide" data-slider-options='{"effect":"fade"}'>
            <div class="swiper-wrapper">
               <div class="swiper-slide">
                  <div class="hero-inner">
                     <div class="th-hero-bg" data-bg-src="img/1.jpg"></div>
                     <div class="container th-container2">
                        <div class="row gy-60 align-items-center">
                           <div class="col-xxl-6 col-xl-8 col-lg-9">
                              <div class="hero-style1">
                                 <div class="hero-text-wrap">
                                    <h1 class="hero-title text-white" data-ani="slideinup" data-ani-delay="0.3s">Welcome to Mohanlal Sukhadia University - Udaipur</h1>
                                    <p class="hero-text text-white" data-ani="slideinup" data-ani-delay="0.5s"> India Rankings 2025 :
State Public Universities Category: Rank-band 51-100 <br/>
Pharmacy Category: Rank 64 </p>
                                   
                                 </div>
                              </div>
                           </div>
                          
                        </div>
                     </div>
                  </div>
               </div>
               <div class="swiper-slide">
                  <div class="hero-inner">
                     <div class="th-hero-bg" data-bg-src="img/3.jpg"></div>
                     <div class="container th-container2">
                        <div class="row gy-60 align-items-center">
                           <div class="col-xxl-6 col-xl-8 col-lg-9">
                              <div class="hero-style1">
                                 <div class="hero-text-wrap">
                                    <h1 class="hero-title text-white" data-ani="slideinup" data-ani-delay="0.3s">Shaping the Leaders of Tomorrow</h1>
                                    <p class="hero-text text-white" data-ani="slideinup" data-ani-delay="0.5s">NAAC Accredited 'A' Grade University</p>

                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="swiper-slide">
                  <div class="hero-inner">
                     <div class="th-hero-bg" data-bg-src="img/4.jpg"></div>
                     <div class="container th-container2">
                        <div class="row gy-60 align-items-center">
                           <div class="col-xxl-6 col-xl-8 col-lg-9">
                              <div class="hero-style1">
                                 <div class="hero-text-wrap">
                                    <h1 class="hero-title text-white" data-ani="slideinup" data-ani-delay="0.3s">Vision of the University</h1>
                                    <p class="hero-text text-white" data-ani="slideinup" data-ani-delay="0.5s">To provide knowledge and quality based education to the students by inculcating moral values, scientific temper and employing state of the art technologies. It aims to pursue excellence towards creating manpower with high degree of intellectual, professional and cultural development to meet the national and global challenges.</p>
                                   
                                 </div>
                              </div>
                           </div>
                          
                        </div>
                     </div>
                  </div>
               </div>
              
		<div class="swiper-slide" data-bg-src="img/kulpati2.png"></div>
            <div class="slider-pagination"></div>
         </div>
      </div>
      
      <!-- feature Section --->
      <div class="feature-sec-1 position-relative overflow-hidden">
         <div class="container th-container2">
            <div class="row gx-10 gy-10">
               <div class="col-xl-3 col-md-6 feature-card_wrapp">
                  <div class="feature-card wow fadeInUp" data-wow-delay=".2s">
                     <div class="box-icon"><img src="{{ asset('assets/img/admission1.png') }}" alt="online Admission"></div>
                     <h3 class="box-title">Online Admissions</h3>
                     <a href="https://mlsuadmissions.sumsraj.com/main.aspx" target="_blank" class="th-btn style-border2 th-icon">Explore Admissions</a>
                  </div>
               </div>
               <div class="col-xl-3 col-md-6 feature-card_wrapp">
                  <div class="feature-card wow fadeInUp" data-wow-delay=".4s">
                     <div class="box-icon"><img src="{{ asset('assets/img/exams.png') }}" alt="University Exams"></div>
                     <h3 class="box-title">University Exams</h3>
                     <a href="https://www.mlsu.ac.in/Examination-and-Results" class="th-btn style-border2 th-icon">Explore Exams</a>
                  </div>
               </div>
               <div class="col-xl-3 col-md-6 feature-card_wrapp">
                  <div class="feature-card wow fadeInUp" data-wow-delay=".6s">
                     <div class="box-icon"><img src="{{ asset('assets/img/econtent.png') }}" alt="Digital E-Contet"></div>
                     <h3 class="box-title">Digital E-Contet</h3>
                     <a href="/E-Contents" class="th-btn style-border2 th-icon">Explore E-Content</a>
                  </div>
               </div>
               <div class="col-xl-3 col-md-6 feature-card_wrapp">
                  <div class="feature-card wow fadeInUp" data-wow-delay=".8s">
                     <div class="box-icon"><img src="{{ asset('assets/img/portal.png') }}" alt="SUMS Portal"></div>
                     <h3 class="box-title">SUMS Portal</h3>
                     <a href="https://mlsuportal.sumsraj.com/" target="_blank" class="th-btn style-border2 th-icon">SUMS Portal</a>
                  </div>
               </div>
            </div>
         </div>
      </div>

	<!-- chancelor and vc section --->
	<section class="professor-area-1 position-relative space overflow-hidden shape-mockup-wrap" id="professor-sec">
	    <div class="container">
		<div class="row justify-content-lg-between justify-content-center align-items-center">		    
		 {!! \App\Models\Block::where('slug', 'home_c_vc_part')->where('published', true)->first()?->content !!} 
	    </div>
	    </div>
	</section>


<!-- Value section --->
      <div class="counter-area1 overflow-hidden">
         <div class="container th-container2">
            <div class="counter-wrap1">
               <div class="counter-card wow fadeInUp" data-wow-delay=".2s">
                  <div class="box-icon"><img src="{{ asset('img/icon/counter-icon1-1.svg') }}" alt="icon"></div>
                  <div class="media-body">
                     <h3 class="box-number"><span class="counter-number">38</span></h3>
                     <p class="box-text">Departments</p>
                  </div>
               </div>
		<div class="divider"></div>
               <div class="counter-card wow fadeInUp" data-wow-delay=".6s">
                  <div class="box-icon"><img src="{{ asset('img/icon/counter-icon1-3.svg') }}" alt="icon"></div>
                  <div class="media-body">
                     <h3 class="box-number"><span class="counter-number">9</span></h3>
                     <p class="box-text">Faculties</p>
                  </div>
               </div>
               <div class="divider"></div>
               <div class="counter-card wow fadeInUp" data-wow-delay=".4s">
                  <div class="box-icon"><img src="{{ asset('img/icon/counter-icon1-2.svg') }}" alt="icon"></div>
                  <div class="media-body">
                     <h3 class="box-number"><span class="counter-number">182</span></h3>
                     <p class="box-text">faculty members</p>
                  </div>
               </div>               
               <div class="divider"></div>
               <div class="counter-card wow fadeInUp" data-wow-delay=".7s">
                  <div class="box-icon"><img src="{{ asset('img/icon/counter-icon1-4.svg') }}" alt="icon"></div>
                  <div class="media-body">
                     <h3 class="box-number"><span class="counter-number">180</span>K</h3>
                     <p class="box-text">Students</p>
                  </div>
               </div>
               <div class="divider"></div>
            </div>
         </div>
      </div>

<!-- news and events section -->
<section class="news-events  position-relative space overflow-hidden shape-mockup-wrap">
  <div class="container">
   <div class="row">
	<div class="col-lg-8">@include('partials.news') </div>
	 {!! \App\Models\Block::where('slug', 'home_other_link')->where('published', true)->first()?->content !!} 
    </div>
<hr class="my-4 hr hr-blurry" >
</section>
<!-- More Info Section -->
	  <div class="counter-area1 overflow-hidden">
          <div class="container th-container2">
            <div class="counter-wrap1">
		<div class="col-lg-12"><div class="title-area mb-0 ps-xl-5"><a href="https://mlsuportal.sumsraj.com" target="_blank"><h2 class="sec-title text-white">Examination Time Tables, Student’s and Exam related Notices are available at SUMS MLSU Portal.</h2></a></div></div>
		 
		</div>                               
	  </div>
	</div>
	</div>
	</div>


      
  
@endsection

