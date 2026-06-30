@extends('layouts.app')

@section('title', $page->title)
@section('content')
    <h1>{{ $page->title }}</h1>

    @if($page->featured_image)
        <img src="{{ asset('storage/' . $page->featured_image) }}" alt="{{ $page->title }}">
    @endif

    <div>
        {!! $page->content !!}
    </div>
@endsection

