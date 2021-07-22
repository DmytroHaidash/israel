<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="title" content="{{ (isset($page_title) ? $page_title . ' | ' : '') . config('app.name') }}">
    <meta name="description" content="{{ __('common.footer.copy') }}">
    <meta name="og:title" content="{{ (isset($page_title) ? $page_title . ' | ' : '') . config('app.name') }}">
    <meta name="og:description" content="{{ __('common.footer.copy') }}">
    <meta name="og:image" content="{{ asset('images/logo.png') }}">
    <meta name="og:image:width" content="520">
    <meta name="og:image:height" content="520">
    <meta name="og:site_name" content="{{ url('/') }}">

    <title>{{ (isset($page_title) ? $page_title . ' | ' : '') . config('app.name') }}</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link rel="dns-prefetch" href="https://api.mapbox.com">
    <link rel="preconnect" href="https://api.mapbox.com">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">
    <link href="{{ url(mix('css/app.css')) }}" rel="stylesheet">

    {{--<link rel="apple-touch-icon" sizes="180x180" href="/images/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicons/favicon-16x16.png">
    <link rel="manifest" href="/images/favicons/site.webmanifest">
    <link rel="shortcut icon" href="/images/favicons/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="/images/favicons/browserconfig.xml">--}}
    <meta name="theme-color" content="#ffffff">
</head>
<body>
@includeIf('partials.app.layouts.icons')
<div id="app" v-cloak>
    @if(request()->route()->getName() != 'app.home')
        @includeIf('partials.app.layouts.header')
    @endif
    <main>
        @yield('content')
    </main>
    @includeIf('partials.app.layouts.menu')
    @includeIf('partials.app.layouts.footer')
</div>

<script src="{{ url(mix('js/manifest.js')) }}" defer></script>
<script src="{{ url(mix('js/vendor.js')) }}" defer></script>
<script src="{{ url(mix('js/app.js')) }}" defer></script>
@stack('scripts')
</body>
</html>
