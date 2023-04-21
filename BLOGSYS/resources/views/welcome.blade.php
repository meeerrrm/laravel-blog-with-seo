<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Blog - {{ config('app.name', 'Blog with SEO') }}</title>
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/logo/logo.png') }}">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="bg-slate-800">
		<nav 
			x-data="{showMenu:false}"
			class="sticky shadow-lg top-0 bg-slate-800 z-50 w-full transition border-b-2 border-b-sky-900"
			:class="{'left-0 text-black h-auto': showMenu}">
			<div class="relative px-5 max-w-7xl flex flex-wrap items-center justify-between h-24 py-1 mx-auto">
				<div class="flex items-center justify-start h-full w-1/4">
                    <a href="#" class="mx-auto z-[99]">
                        <img 
                         src="{{ asset('assets/logo/logo.png') }}" 
                         class="h-20 z-[99] mx-auto"
                         alt="{{ config('app.name', 'Blog with SEO') }} Logo">
                    </a>
				</div>
				<div 
					class="top-0 left-0 items-start hidden w-full py-4 text-sm bg-opacity-50 md:items-center md:w-3/4  lg:text-base md:bg-transparent md:p-0 md:relative md:flex transition h-full"
					:class="{'flex fixed ': showMenu, 'hidden': !showMenu }">
					<div 
						class="flex-col pb-8 md:pb-0 w-full relative overflow-hidden bg-slate-800 rounded-lg md:bg-transparent md:overflow-visible md:rounded-none md:relative md:flex md:flex-row border-b-2 border-b-sky-900 sm:border-none">
						<div class="flex flex-col items-start justify-center w-full text-black-700 text-center lg:space-x-8 md:w-2/3 md:mt-0 md:flex-row md:items-center pt-[85px] md:pt-0">
							<div class="border-t-2 border-t-sky-900 w-full mb-3 md:hidden"></div>
							<a href="#" class="inline-block w-full text-xl py-2 md:py-0 md:text-base md:w-auto px-5 text-white hover:text-sky-500 transition">Beranda</a>
							<a href="#" class="inline-block w-full text-xl py-2 md:py-0 md:text-base md:w-auto px-5 text-white hover:text-sky-500 transition">Tag</a>
							<a href="#" class="inline-block w-full text-xl py-2 md:py-0 md:text-base md:w-auto px-5 text-white hover:text-sky-500 transition">Category</a>
							<a href="#" class="inline-block w-full text-xl py-2 md:py-0 md:text-base md:w-auto px-5 text-white hover:text-sky-500 transition">Portal</a>
						</div>
					</div>
				</div>
				<div 
					class="right-0 flex flex-col items-center justify-center w-10 h-10 rounded-full cursor-pointer md:hidden transition"
					@click="showMenu = !showMenu">
					<svg class="w-10 h-10 text-white" x-show="!showMenu"
						fill="none" stroke-linecap="round"
						stroke-linejoin="round" stroke-width="2"
						viewBox="0 0 24 24" stroke="currentColor"
						x-cloak="">
						<path d="M4 6h16M4 12h16M4 18h16"></path>
					</svg>
					<svg class="w-10 h-10 text-white z-[100]" x-show="showMenu"
						fill="none" stroke="currentColor"
						viewBox="0 0 24 24"
						xmlns="http://www.w3.org/2000/svg" x-cloak="">
						<path stroke-linecap="round" stroke-linejoin="round"
							stroke-width="2" d="M6 18L18 6M6 6l12 12">
						</path>
					</svg>
				</div>
			</div>
		</nav>
        <section class="p-8 h-[80vh] grid grid-cols-1 content-center" id="header">
            <div class="max-w-6xl mx-auto px-5 text-center">
                <h1 class="text-7xl font-bold uppercase text-slate-100">BLOG</h1>
                <p class="text-xl font-semibold text-slate-300 mt-1">{{ config('app.name', 'Blog with SEO') }}</p>
            </div>
        </section>
        <section class="p-8 bg-slate-800">
            <div class="max-w-6xl mx-auto px-5 py-32">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
@foreach($blogs as $blog)
                    <div class="group shadow-lg hover:scale-110 transition-all rounded-xl overflow-hidden grid grid-cols-1 content-stretch">
                        <div class="h-44 overflow-hidden">
                            <img src="{{ asset('assets/blog/'.$blog->thumnail) }}" class="w-full h-auto transition-all object-contain" alt="{{ $blog->title }}">
                        </div>
                        <div class="px-4 py-6 border-2 border-sky-600 border-t-0 rounded-b-xl">
                            <p>
                                <a href="#" class="text-sky-400 font-thin hover:text-sky-600">{{ json_decode($blog->tag)[0] }}</a>
                            </p>
                            <h1 class="text-white font-bold text-2xl pt-2">{{ $blog->title }}</h1>
                        </div>
                    </div>
@endforeach
                </div>
            </div>
        </section>
		<div class="w-full rounded-lg border-b-2 border-sky-400 mx-auto" data-aos-anchor-placement="center-bottom" data-aos="zoom-in"></div>
		<div class="bg-gradient-to-r from-sky-900 to-indigo-900 p-6 md:px-48 h-auto flex text-center"  data-aos-anchor-placement="center-bottom" data-aos="zoom-in">
			<p class="font-normal text-white ml-0 mr-auto">©{{ date('Y') }} All rights reserved.</p>
			<p class="font-normal text-white mr-0 ml-auto">Crafted with <i class="fa-solid fa-heart text-red-500 mx-1"></i> by <a href="https://entolrizky.com/" class="hover:text-sky-400 transition">Mohammad Entol Rizky Muslimin</a></p>
		</div>
	<!-- Javascript -->
		<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
		<script src="https://kit.fontawesome.com/c8151e59d5.js"></script>
		<script>
			AOS.init();
        </script>
    </body>
</html>