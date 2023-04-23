<x-landing-layout>
    <x-slot name="title">
        <title>Tag Blog | {{ config('app.name', 'Blog with SEO') }}</title>
    </x-slot>
	<x-slot name="seo_config">
		<meta name="description" content="Kumpulan Tag blog pada website {{ config('app.name', 'Blog with SEO') }}">
		<meta name="keywords" content="tag, blog, education, edukatif, teknologi, technology, @foreach($tags as $key => $tag){{ $key.', ' }}@endforeach">
		
		<meta name="copyright"content="Entol Rizky Development" />
		<meta name="owner" content="Entol Rizky Development" />
		<meta name="author" content="Entol Rizky Development" />
        <meta name="publisher" content="Entol Rizky Development">

		<meta name="blogcatalog" />
	</x-slot>
        <section class="p-4 py-24 min-h-screen" id="header">
            <div class="max-w-4xl mx-auto px-5 text-center">
                <h1 class="text-4xl font-bold uppercase text-slate-100 mt-10">Blog Tag</h1>
                <div>
@foreach($tags as $key => $tag)
                    <a href="#" class="text-white mx-4 mt-8 inline-block lowercase">{{ $key }} <span class="bg-sky-700 text-white px-2 rounded-full">{{ $tag }}</span></a>
@endforeach
                </div>
            </div>
        </section>
</x-landing-layout>