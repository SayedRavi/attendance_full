<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{asset('plugins/materialize/materialize.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/bootstrap.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('plugins/css/style.css')}}">
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
@stack('css')

    <!-- Scripts -->
{{--    @vite(['resources/sass/app.scss', 'resources/js/app.js'])--}}
</head>
<body>
   @yield('content')
   <div id="modal" class="modal" style="overflow: visible;"></div>

@stack('js')
   <script src="{{asset('plugins/materialize/materialize.min.js')}}"></script>
   <script src="{{asset('plugins/jquery/jquery.lazyload.min.js')}}"></script>
   <script src="{{asset('plugins/javascript/init.js')}}"></script>
   <script src="{{asset('plugins/javascript/js.js')}}"></script>
       <script src="{{asset('plugins/sweetalert/sweetalert.min.js')}}"></script>

       <script>
       @if(session()->has('message'))
           M.toast({
           html: '{{session()->get('message')}}',
           classes: '{{session()->get('classes')}}'
       });
       @endif
   </script>

</body>
</html>
