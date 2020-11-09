<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="x-ua-compatible" content="ie=edge">
    {!! app('seotools')->generate() !!}

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="/images/logos/favicon.png">
    <link rel="stylesheet" href="{{ asset('/vendor/admin/css/admin.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body class="" style="min-height: 100vh">
<div class="justify-content-center d-flex w-100">
    @include('cookieConsent::index')
</div>
@yield('content')
<script src="{{asset('/vendor/admin/js/manifest.js')}}"></script>
<script src="{{asset('/vendor/admin/js/vendor.js')}}"></script>
<script src="{{asset('/vendor/admin/js/admin.js')}}"></script>
<script src="https://kit.fontawesome.com/5573a6d434.js" crossorigin="anonymous"></script>

@yield('scripts')
</body>
</html>
