@php
    $theme = \App\Models\Theme::first();
@endphp
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', '{{ $theme->title }}')</title>
<meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="theme-color" content="#ffffff">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

<link rel="stylesheet" href="{{ asset('css/magnific-popup.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">

<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
<link rel="icon" type="image/png" sizes="32x32" href="/icon/favicon-32x32.png">
<link rel="apple-touch-icon" sizes="180x180" href="/icon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="16x16" href="/icon/favicon-16x16.png">
<link rel="icon" href="/icon/favicon.ico">
 {!! $theme->head_content !!}


