<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="robots" content="index, follow" />
        <meta name="googlebot" content="index, follow" />

@if(isset($title))
        {{ $title }}
@else
        <title>Blog | {{ config('app.name', 'Blog with SEO') }}</title>
@endif
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo/logo.png') }}" />
        <link rel="canonical" href="{{ Request::url() }}" />
@if($_SERVER['REMOTE_ADDR'] === "127.0.0.1")
        @vite(['resources/css/app.css', 'resources/js/app.js'])
@else
<!-- CSS -->
        <link rel="stylesheet" href="{{ asset('build/assets/main.css') }}">
<!-- Scripts -->
        <link rel="stylesheet" href="{{ asset('build/assets/app-919ba201.js') }}">
        <link rel="stylesheet" href="{{ asset('build/assets/main.js') }}">
@endif
@if(isset($seo_config))
<!-- SEO -->
        {{ $seo_config }}
@endif
<!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-4W10XXDJ3B"></script>
        <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

                gtag('config', 'G-4W10XXDJ3B');
        </script>
    </head>
    <body class="bg-slate-800">
        
        @include('layouts.nav-landing')
        {{ $slot }}
		<div class="w-full rounded-lg border-b-2 border-sky-400 mx-auto" data-aos-anchor-placement="center-bottom" data-aos="zoom-in"></div>
		<div class="bg-gradient-to-r from-sky-900 to-indigo-900 p-6 md:px-48 h-auto flex text-center"  data-aos-anchor-placement="center-bottom" data-aos="zoom-in">
			<p class="font-normal text-white ml-0 mr-auto">©{{ date('Y') }} All rights reserved.</p>
			<p class="font-normal text-white mr-0 ml-auto">Crafted with <i class="fa-solid fa-heart text-red-500 mx-1"></i> by <a href="https://entolrizky.com/" class="hover:text-sky-400 transition">Mohammad Entol Rizky Muslimin</a></p>
		</div>
	<!-- Javascript -->
		<script type="text/javascript" src="https://entolrizky.com/assets/js/alpine.js"></script>
		<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
		<script src="https://kit.fontawesome.com/c8151e59d5.js"></script>
@if(isset($js))
        {{ $js }}
@endif
		<script>
			AOS.init();
        </script>
    </body>
</html>