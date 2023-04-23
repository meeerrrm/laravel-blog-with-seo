<x-landing-layout>
    <x-slot name="title">
        <title>{{ $blog->title }}</title>
    </x-slot>
        <section class="p-4 py-24" id="header">
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
                <div class="text-left text-slate-300 mt-8" id="mainContent">
{!! json_decode($blog->content) !!}
                </div>
                <div class="text-slate-300 mt-24">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="flex flex-wrap">
                            <div class="w-1/3">
                                <div class="rounded-full w-14 h-14 overflow-hidden mx-auto">
                                    <img src="{{ asset('assets/picture/'.$blog->user->profile_picture) }}" class="h-14">
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
        </section>
    <x-slot name="js">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<!-- place for config your content css -->
        <script>
            $(document).ready(function(){	
                $('#mainContent').closest('div').find('ol').addClass('list-decimal ml-4 mt-2');
                $('#mainContent').closest('div').find('ul').addClass('list-disc ml-4 mt-2');
                $('#mainContent').closest('div').find('li').addClass('mb-4 font-bold text-white');
                $('#mainContent').closest('div').find('p').addClass('mt-2 font-light text-slate-300');
            });
        </script>
    </x-slot>
</x-landing-layout>