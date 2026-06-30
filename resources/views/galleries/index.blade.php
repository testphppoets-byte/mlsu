@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gallery Categories</h1>
    @foreach($categories as $category)
        <h2>{{ $category->name }}</h2>
        <p>{{ $category->description }}</p>
        <div class="row">
            @foreach($category->galleries as $gallery)
                <div class="col-md-4">
                    <a href="{{ route('galleries.show', $gallery) }}">
                        <div class="card">
                            <div class="card-body">
                                <h5>{{ $gallery->title }}</h5>
                                <p>{{ $gallery->description }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
@endsection

