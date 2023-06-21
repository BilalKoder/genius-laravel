<!doctype html>
<html lang="en">

@include('front.includes.header')

<body>

    @yield('content')

    @include('front.includes.footer')
    @yield('scripts')
</body>

</html>