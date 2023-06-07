<x-landing-layout>
	<x-slot name="seo_config">
		<meta name="description" content="Tag blog {{ $tag }} dengan konten edukatif yang berisi seputar teknologi.">
		<meta name="keywords" content="tag, blog, education, edukatif, teknologi, technology">
		
		<meta name="copyright"content="Entol Rizky Development" />
		<meta name="owner" content="Entol Rizky Development" />
		<meta name="author" content="Entol Rizky Development" />
        <meta name="publisher" content="Entol Rizky Development">

		<meta name="blogcatalog" />
	</x-slot>
        <section class="p-8 grid grid-cols-1 content-center" id="header">
            <div class="max-w-6xl mx-auto px-5 text-center">
                <p class="text-xl font-semibold text-sky-700 mt-16">Blog with Tag</p>
                <h1 class="text-7xl font-bold uppercase text-sky-500">{{ $tag }}</h1>
            </div>
            <div class="max-w-6xl mx-auto px-5 pt-24 pb-32">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
@if(count($blogs) > 0)
@foreach($blogs as $blog)
					<div>
						<a href="{{ route('blog.detail',$blog->uniq) }}" class="h-full w-full group">
							<div class="h-full group shadow hover:scale-105 rounded overflow-hidden transition-all bg-white">
								<div class="h-44 overflow-hidden bg-slate-400">
									<img src="{{ asset('assets/blog/'.$blog->thumnail) }}" class="h-44 w-auto transition-all object-contain mx-auto" alt="{{ $blog->title }}">
								</div>
								<div class="px-4 py-6">
									<p>
										<span class="text-slate-600 font-thin hover:text-slate-600">{{ json_decode($blog->tag)[0] }}</span>
									</p>
									<h2 class="text-sky-700 group-hover:text-sky-500 font-bold text-2xl pt-2">{{ $blog->title }}</h2>
								</div>
							</div>
						</a>
					</div>
@endforeach
@else
					<div class="md:col-span-3 h-[30vh]">
						<h2 class="text-white text-2xl">Blog with <b>{{ $tag }}</b> tag not found.</h2>
					</div>
@endif
                </div>
            </div>
        </section>
</x-landing-layout>