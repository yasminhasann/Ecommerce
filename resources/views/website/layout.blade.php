<!DOCTYPE html>
@php
    if(!auth()->check()){
        $lang = 'en';
        $Dir = 'ltr';
    }else{
        $lang = auth()->user()->locale;
        if($lang == 'ar'){
            $Dir = 'rtl';
        }else{
            $Dir = 'ltr';
        }
    }
@endphp
<html lang="{{$lang}}" dir="{{$Dir}}">
<head>
    <title>@yield('title')-shopper</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href=" {{ asset('assets/fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css')}}">


    <link rel="stylesheet" href="{{ asset('assets/css/aos.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    @yield ('styles')
</head>

<body>
    @include('website.components.navbar')
    @yield('content')
    @include('website.components.footer')
    {{-- <h1>{{ __('messages.welcome') }}</h1> --}}
    <script src="{{ asset('assets/js/bootstrap.min.css')}}"></script>
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('assets/js/jquery-ui.js')}}"></script>
    <script src="{{ asset('assets/js/popper.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('assets/js/aos.js')}}"></script>
    <script src="{{ asset('assets/js/main.js')}}"></script>
    @yield ('scripts')

</body>

</html>
