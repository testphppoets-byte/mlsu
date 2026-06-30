@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $gallery->title }}</h1>
    <p>{{ $gallery->description }}</p>

    <div class="row">
        @foreach($gallery->images as $image)
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $image->image_path) }}" class="card-img-top" alt="{{ $image->caption }}">
                    <div class="card-body">
                        <p>{{ $image->caption }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

