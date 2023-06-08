<x-landing-layout>
    <x-slot name="title">
        <title>{{ $blog->title }}</title>
    </x-slot>
	<x-slot name="seo_config">
		<meta name="description" content="{{ $blog->description }}">
		<meta name="keywords" content="@foreach(json_decode($blog->tag) as $val){{ $val }}, @endforeach{{ $blog->keyword }},{{ strtolower($blog->user->name) }}">
		<meta name="author" content="{{ $blog->user->name }}" />
        <meta name="publisher" content="{{ config('app.name', 'Blog with SEO') }}">

        <meta property="og:title" content="{{ $blog->title }}"/>
        <meta property="og:type" content="article" />
        <meta property="og:url" content="{{ Request::url() }}"/>
        <meta property="og:image" content="{{ asset('assets/blog/'.$blog->thumnail) }}"/>
        <meta property="og:image:alt" content="{{ $blog->title }}" />
        <meta property="og:site_name" content="{{ config('app.name', 'Blog with SEO') }}"/>
        <meta property="og:description" content="{{ $blog->description }}..."/>
        <meta property="article:published_time" content="{{ $blog->publish_date }}"/>
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@graph": [
              {
                "@type": "Article",
                "@id": "{{ route('blog.detail',$blog->uniq) }}#article",
                "isPartOf": {
                  "@id": "{{ route('blog.detail',$blog->uniq) }}"
                },
                "author": [
                  {
                    "@id": "https://entolrizky.com/"
                  }
                ],
                "headline": "{{ $blog->title }}",
                "datePublished": "{{ $blog->publish_date }}T03:00:00+00:00",
                "dateModified": "{{ date('Y-m-d',strtotime($blog->updated_at)) }}T05:07:25+00:00",
                "mainEntityOfPage": {
                  "@id": "{{ route('blog.detail',$blog->uniq) }}"
                },
                "wordCount": {{ strlen($blog->content) }},
                "publisher": {
                  "@id": "https://entolrizky.com/"
                },
                "image": {
                  "@id": "{{ route('blog.detail',$blog->uniq) }}#primaryimage"
                },
                "thumbnailUrl": "{{ asset('assets/blog/'.$blog->thumnail) }}",
                "keywords": [
@foreach(explode(',',$blog->keyword) as $key => $kw)
                  "{{ $kw }}"@if($key != array_key_last(explode(',',$blog->keyword))),@endif
@endforeach
                ],
                "inLanguage": "en-US",
                "video": [
                  {
                    "@id": "{{ route('blog.detail',$blog->uniq) }}#video"
                  }
                ]
              },
              {
                "@type": "WebPage",
                "@id": "{{ route('blog.detail',$blog->uniq) }}",
                "url": "{{ route('blog.detail',$blog->uniq) }}",
                "name": "{{ $blog->title }}",
                "isPartOf": {
                  "@id": "{{ url('/') }}"
                },
                "primaryImageOfPage": {
                  "@id": "{{ route('blog.detail',$blog->uniq) }}#primaryimage"
                },
                "image": {
                  "@id": "{{ route('blog.detail',$blog->uniq) }}#primaryimage"
                },
                "thumbnailUrl": "{{ asset('assets/blog/'.$blog->thumnail) }}",
                "datePublished": "2022-03-21T03:00:00+00:00",
                "dateModified": "2023-04-13T05:07:25+00:00",
                "description": "{{ $blog->description }}",
                "breadcrumb": {
                  "@id": "{{ route('blog.detail',$blog->uniq) }}#breadcrumb"
                },
                "inLanguage": "en-US",
                "potentialAction": [
                  {
                    "@type": "ReadAction",
                    "target": [
                      "{{ route('blog.detail',$blog->uniq) }}"
                    ]
                  }
                ]
              },
              {
                "@type": "ImageObject",
                "inLanguage": "en-US",
                "@id": "{{ route('blog.detail',$blog->uniq) }}#primaryimage",
                "url": "{{ asset('assets/blog/'.$blog->thumnail) }}",
                "contentUrl": "{{ asset('assets/blog/'.$blog->thumnail) }}",
                "width": 720,
                "height": 384,
                "caption": "{{ $blog->title }}"
              },
              {
                "@type": "BreadcrumbList",
                "@id": "{{ route('blog.detail',$blog->uniq) }}#breadcrumb",
                "itemListElement": [
                  {
                    "@type": "ListItem",
                    "position": 1,
                    "name": "Home",
                    "item": "{{ route('index') }}"
                  },
                  {
                    "@type": "ListItem",
                    "position": 2,
                    "name": "Tag",
                    "item": "{{ route('tag') }}"
                  },
                  {
                    "@type": "ListItem",
                    "position": 3,
                    "name": "Portal",
                    "item": "https://blog.entolrizky.com/"
                  },
@php $no = 4 @endphp
@foreach($newest as $nw)
                  {
                    "@type": "ListItem",
                    "position": {{ $no++ }},
                    "name": "{{ $nw->title }}",
                    "item": "{{ route('blog.detail',$nw->uniq) }}"
                  }@if($no != 7),@endif
@endforeach
                ]
              },
              {
                "@type": "Organization",
                "@id": "https://entolrizky.com",
                "name": "Mohammad Entol Rizky",
                "url": "https://entolrizky.com",
                "logo": {
                  "@type": "ImageObject",
                  "inLanguage": "en-US",
                  "@id": "{{ url('/') }}#",
                  "url": "{{ url('/assets/logo/logo.png') }}",
                  "contentUrl": "{{ url('/assets/logo/logo.png') }}",
                  "width": 1920,
                  "height": 1080,
                  "caption": "{{ config('app.name', 'Blog with SEO') }}"
                },
                "image": {
                  "@id": "{{ url('/') }}#/schema/logo/image/"
                },
                "sameAs": [
                  "https://www.instagram.com/meeerrrm/",
                  "https://www.facebook.com/MuhammadE.Rizky08/",
                  "https://github.com/meeerrrm",
                  "https://www.linkedin.com/in/mohammad-entol-rizky/",
                  "https://entolrizky.com"
                ]
              },
              {
                "@type": "Person",
                "@id": "{{ url('/') }}",
                "name": "{{ $blog->user->name}}",
                "image": {
                  "@type": "ImageObject",
                  "inLanguage": "en-US",
                  "@id": "{{ url('/') }}",
                  "url": "{{ url('/assets/picture/'.$blog->user->profile_picture) }}",
                  "contentUrl": "{{ url('/assets/picture/'.$blog->user->profile_picture) }}",
                  "caption": "{{ $blog->user->name}}"
                },
                "url": "{{ url('/') }}"
              }
            ]
          }
        </script>
    </x-slot>
        <div class="p-4 py-24" id="header">
            <div class="max-w-4xl mx-auto px-5 text-center">
                <div class="w-full md:h-96 bg-slate-900 rounded-2xl overflow-hidden" id="imagePlace">
                    <img src="{{ asset('assets/blog/'.$blog->thumnail) }}" class="mx-auto h-full" alt="{{ $blog->title }}">
                </div>
                <h1 class="text-4xl font-bold uppercase text-sky-700 mt-10">{{ $blog->title }}</h1>
                <div class="mt-4">
@foreach(json_decode($blog->tag) as $tag)
                    <a href="{{ route('tag.detail',$tag) }}" class="bg-sky-700 p-1 px-4 rounded-full text-slate-100 transition-all hover:bg-sky-500 text-sm inline-block mt-1">{{ $tag }}</a>
@endforeach
                </div>
                <article class="text-left mt-8 format lg:format-lg format-red max-w-none" id="mainContent">
{!! json_decode($blog->content) !!}
                </article>
                <div class="text-sky-900 mt-24">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="flex flex-wrap">
                            <div class="w-1/3">
                                <div class="rounded-full w-14 h-14 overflow-hidden mx-auto">
                                    <img src="{{ asset('assets/picture/'.$blog->user->profile_picture) }}" alt="Profile Picture - {{ $blog->user->name}}" class="h-14">
                                </div>
                            </div>
                            <div class="w-2/3 text-left">
                                <h3 class="text-sky-800 font-bold">{{ strtoupper($blog->user->name) }}</h3>
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