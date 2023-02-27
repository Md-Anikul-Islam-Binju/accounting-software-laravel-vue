<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        {{--Use for Template Design--}}
        <link rel="stylesheet" href="{{asset('backend/css/starlight.css')}}">
        <link href="{{asset('backend/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
        <link href="{{asset('backend/lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">
        <link href="{{asset('backend/lib/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
        <link href="{{asset('backend/lib/rickshaw/rickshaw.min.css')}}" rel="stylesheet">

        {{--Use for Name Route laravel (Its from Ziggy Route)--}}
        @routes
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        {{--Use for Template Design--}}
        <script src="{{asset('backend/lib/jquery/jquery.js')}}"></script>
        <script src="{{asset('backend/lib/popper.js/popper.js')}}"></script>
        <script src="{{asset('backend/lib/bootstrap/bootstrap.js')}}"></script>
        <script src="{{asset('backend/lib/jquery-ui/jquery-ui.js')}}"></script>
        <script src="{{asset('backend/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>
        <script src="{{asset('backend/lib/jquery.sparkline.bower/jquery.sparkline.min.js')}}"></script>
        <script src="{{asset('backend/lib/d3/d3.js')}}"></script>
        <script src="{{asset('backend/lib/rickshaw/rickshaw.min.js')}}"></script>
        <script src="{{asset('backend/lib/chart.js/Chart.js')}}"></script>
        <script src="{{asset('backend/lib/Flot/jquery.flot.js')}}"></script>
        <script src="{{asset('backend/lib/Flot/jquery.flot.pie.js')}}"></script>
        <script src="{{asset('backend/lib/Flot/jquery.flot.resize.js')}}"></script>
        <script src="{{asset('backend/lib/flot-spline/jquery.flot.spline.js')}}"></script>
        <script src="{{asset('backend/js/starlight.js')}}"></script>
        <script src="{{asset('backend/js/ResizeSensor.js')}}"></script>
        <script src="{{asset('backend/js/dashboard.js')}}"></script>
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia

        @env ('local')
            <script src="http://localhost:8080/js/bundle.js"></script>
        @endenv
    </body>
</html>
