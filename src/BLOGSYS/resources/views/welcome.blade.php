<x-landing-layout>

	<x-slot name="seo_config">
		<meta name="description" content="Dapatkan informasi edukatif seputar perkembangan teknologi, pengembangan infastruktur, perangkat lunak dan berbagai hal teknologi lainnya.">
		<meta name="keywords" content="@foreach($tags as $key => $val){{$key .','}} @endforeach {{ config('app.name', 'Blog with SEO') }}">
		
		<meta name="copyright"content="Entol Rizky Development" />
		<meta name="owner" content="Entol Rizky Development" />
		<meta name="author" content="Entol Rizky Development" />
        <meta name="publisher" content="Entol Rizky Development">

        <script type="application/ld+json">
		{
			"@context": "https://schema.org",
			"@graph": [
			  {
				"@type": "CollectionPage",
				"@id": "{{ url('/') }}",
				"url": "{{ url('/') }}",
				"name": "{{ config('app.name', 'Blog with SEO') }} - Informasi, Tutorial Pengembangan Infrastuktur Teknologi",
				"isPartOf": {
				  "@id": "{{ url('/') }}#website"
				},
				"about": {
				  "@id": "https://entolrizky.com"
				},
				"description": "Dapatkan informasi edukatif seputar perkembangan teknologi, pengembangan infastruktur, perangkat lunak dan berbagai hal teknologi lainnya.",
				"breadcrumb": {
				  "@id": "{{ url('/') }}#breadcrumb"
				},
				"inLanguage": "en-US"
			  },
			  {
				"@type": "BreadcrumbList",
				"@id": "{{ url('/') }}#breadcrumb",
				"itemListElement": [
				  {
					"@type": "ListItem",
					"position": 1,
					"name": "Home"
				  }
				]
			  },
			  {
				"@type": "WebSite",
				"@id": "{{ url('/') }}",
				"url": "{{ url('/') }}",
				"name": "{{ config('app.name', 'Blog with SEO') }}",
				"description": "Informasi, Tutorial Pengembangan Infrastuktur Teknologi",
				"publisher": {
				  "@id": "{{ url('/') }}#organization"
				},
				"inLanguage": "en-US"
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
				  "width": 606,
				  "height": 67,
				  "caption": "{{ config('app.name', 'Blog with SEO') }}"
				},
				"image": {
				  "@id": "{{ url('/') }}#/schema/logo/image/"
				},
				"sameAs": [
				  "https://www.instagram.com/meeerrrm/",
				  "https://www.facebook.com/MuhammadE.Rizky08/",
				  "https://github.com/meeerrrm",
				  "https://www.linkedin.com/in/mohammad-entol-rizky-0659a722b/",
				  "https://entolrizky.com"
				]
			  }
			]
		}
		</script>
	</x-slot>

        <section class="p-8 pt-[20vh] grid grid-cols-1 content-center" id="header">
            <div class="max-w-6xl mx-auto px-5 text-center">
                <h1 class="text-7xl font-bold uppercase text-sky-500">BLOG</h1>
                <p class="text-xl font-semibold text-sky-600 mt-1">{{ config('app.name', 'Blog with SEO') }}</p>
            </div>
        </section>
        <section class="p-8">
            <div class="max-w-6xl mx-auto px-5 py-32">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
@foreach($blogs as $blog)
					<div class="">
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
                </div>
            </div>
        </section>
</x-landing-layout>