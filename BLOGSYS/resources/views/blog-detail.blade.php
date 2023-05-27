<x-landing-layout>
    <x-slot name="title">
        <title>{{ $blog->title }} | Blog | {{ config('app.name', 'Blog with SEO') }}</title>
    </x-slot>
	<x-slot name="seo_config">
		<meta name="description" content="{{ $blog->description }}">
		<meta name="keywords" content="@foreach(json_decode($blog->tag) as $val){{ $val }}, @endforeach{{ $blog->keyword }},{{ strtolower($blog->user->name) }}">
		<meta name="author" content="{{ $blog->user->name }}" />
        <meta name="publisher" content="Entol Rizky Development">

        <meta name="og:title" content="{{ $blog->title }}"/>
        <meta name="og:type" content="website"/>
        <meta name="og:url" content="{{ Request::url() }}"/>
        <meta name="og:image" content="{{ asset('assets/blog/'.$blog->thumnail) }}"/>
        <meta name="og:image:alt" content="{{ $blog->title }}" />
        <meta name="og:site_name" content="ERDev"/>
        <meta name="og:description" content="{{ $blog->description }}..."/>
        <meta name="article:published_time" content="{{ $blog->publish_date }}"/>
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "NewsArticle",
            "headline": "{{ $blog->title }}",
            "image": [
                "{{ asset('assets/blog/'.$blog->thumnail) }}",
            ],
            "datePublished": "{{ $blog->publish_date }}T08:00:00+08:00",
            "dateModified": "{{ date('Y-m-d',strtotime($blog->updated_at)) }}T09:20:00+08:00",
            "author": [{
                "@type": "Person",
                "name": "{{ $blog->user->name }}",
                "url": "https://entolrizky.com/"
            }]
            "publisher":{
                "name": "{{ config('app.name', 'Blog with SEO') }}",
                "url": "{{ url('/') }}"
            }
        }
        </script>
    </x-slot>
        <div class="p-4 py-24" id="header">
            <div class="max-w-4xl mx-auto px-5 text-center">
                <div class="w-full md:h-96 bg-slate-900 rounded-2xl overflow-hidden" id="imagePlace">
                    <img src="{{ asset('assets/blog/'.$blog->thumnail) }}" class="mx-auto h-full" alt="{{ $blog->title }}">
                </div>
                <h1 class="text-4xl font-bold uppercase text-slate-100 mt-10">{{ $blog->title }}</h1>
                <div class="mt-4">
@foreach(json_decode($blog->tag) as $tag)
                    <a href="{{ route('tag.detail',$tag) }}" class="bg-sky-700 p-1 px-4 rounded-full text-slate-100 transition-all hover:bg-sky-500 text-sm inline-block mt-1">{{ $tag }}</a>
@endforeach
                </div>
                <article class="text-left text-slate-300 mt-8 prose lg:prose-xl" id="mainContent">
{!! json_decode($blog->content) !!}
                </article>
                <div class="text-slate-300 mt-24">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="flex flex-wrap">
                            <div class="w-1/3">
                                <div class="rounded-full w-14 h-14 overflow-hidden mx-auto">
                                    <img src="{{ asset('assets/picture/'.$blog->user->profile_picture) }}" alt="Profile Picture - {{ $blog->user->name}}" class="h-14">
                                </div>
                            </div>
                            <div class="w-2/3 text-left">
                                <h3 class="text-slate-100 font-bold">{{ strtoupper($blog->user->name) }}</h3>
                                <p>Publish at <b>{{ date('d F Y',strtotime($blog->publish_date)) }}</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <x-slot name="js">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    </x-slot>
</x-landing-layout>