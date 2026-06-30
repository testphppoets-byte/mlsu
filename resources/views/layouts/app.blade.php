<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials.head') 
</head>
<body>
    <!-- Header -->
     	@include('partials.responsive-nav')
     <header>
	   @include('partials.header')
     </header>

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('partials.footer')
</body>
</html>

