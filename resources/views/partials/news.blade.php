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

<!-- News & Events Section -->

    <div class="section-title text-center mb-4">
      <h2 class="fw-bold">Latest News & Events</h2>
      <p>Stay updated with Mlsu highlights</p>
    </div>

    <!-- Scrollable News List -->
    <div class="news-scrollbar position-relative overflow-hidden" style="height:300px;">
      <ul class="list-unstyled mb-0 news-list">
	@php $i =0; @endphp
	@foreach($news as $item)
		@php $i =$i+1;  @endphp
		@if($item->published)
        <li class="p-3 border-bottom bg-white">
          <h5 class="mb-1 box-title  n-title">@if($item->link)
			<a href="{{ $item->link }}" target="_blank">{{ $item->title }}</a>@else {{ $item->title }} @endif</h5>
          <small class="text-muted">last Updated On: {{ $item->updated_at->format('d M Y h:i A') }}</small>
	
        </li>
	@endif
	 @endforeach
      </ul>
    </div>
	



