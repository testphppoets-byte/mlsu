@php
    use App\Models\News;
    use Illuminate\Support\Carbon;

    $now = Carbon::now();

 $news = News::with('category')
        ->whereHas('category', function ($query) {
            $query->where('u_name', 'news');   // filter category = "news"
        })
        ->where(function ($query) use ($now) {
            $query->whereNull('valid_from')
                  ->orWhere('valid_from', '<=', $now);
        })
        ->where(function ($query) use ($now) {
            $query->whereNull('valid_until')
                  ->orWhere('valid_until', '>=', $now);
        })
        ->latest()
        ->take(10)
        ->get();
@endphp

@php /* Faq section design @endphp
<section class="faq-area-1 position-relative space overflow-hidden shape-mockup-wrap">
       <div class="container">
            <div class="row gy-30 gx-30 align-items-center justify-content-center">
		<div class="col-lg-12 col-12">
                 <div class="title-area text-center"><span class="sub-title">News & Events</span>
			<h2 class="sec-title">Stay informed with the most recent announcements and happenings.</h2>
		  </div>
               </div>

                <div class="col-xxl-4">
                    <div class="faq-imgbox wow fadeInLeft" data-wow-delay=".3s" style="visibility: hidden; animation-delay: 0.3s; animation-name: none;">
                   
                    </div>
                </div>
                <div class="col-xxl-8">
                    <div class="faq-content">
                        <div class="faq-wrap">
                            
                        </div>
                        <div class="faq-box">
                            <div class="faq-wrap1">
                                <div class="accordion" id="faqAccordion">
				@php $i =0; @endphp
				@foreach($news as $item)
					@php $i =$i+1; @endphp
                                    <div class="accordion-card wow fadeInUp" data-wow-delay=".1s" style="visibility: hidden; animation-delay: 0.1s; animation-name: none;">
                                        <div class="accordion-header" id="collapse-item-1">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $i}}" aria-expanded="true" aria-controls="collapse-1">{{ $item->title }}</button>
                                        </div>
                                        <div id="collapse-{{ $i}}" class="accordion-collapse collapse show" aria-labelledby="collapse-item-1" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body">
                                                <p class="faq-text">{{ $item->content }} &nbsp;
							@if($item->link)
								<a href="{{ $item->link }}" target="_blank">Explore</a>
							@endif
						</p>
						@if($item->valid_until)
							<small>Valid until: {{ $item->valid_until->format('d M Y H:i') }}</small>
						@endif
                                            </div>
                                        </div>
                                    </div>
				   @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


