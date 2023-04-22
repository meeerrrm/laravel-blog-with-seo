<x-landing-layout>
    <x-slot name="title">
        <title>{{ $blog->title }}</title>
    </x-slot>
        <section class="p-4 py-24" id="header">
            <div class="max-w-4xl mx-auto px-5 text-center">
                <div class="w-full md:h-96 bg-slate-900 rounded-2xl overflow-hidden" id="imagePlace">
                    <img src="{{ asset('assets/blog/'.$blog->thumnail) }}" class="mx-auto" alt="{{ $blog->title }}">
                </div>
                <h1 class="text-4xl font-bold uppercase text-slate-100 mt-10">{{ $blog->title }}</h1>
                <div class="mt-4">
@foreach(json_decode($blog->tag) as $tag)
                    <a href="#" class="bg-sky-700 p-1 px-4 rounded-full text-slate-100 transition-all hover:bg-sky-500 text-sm inline-block mt-1">{{ $tag }}</a>
@endforeach
                </div>
                <div class="text-left text-slate-300 mt-8" id="mainContent">
{!! json_decode($blog->content) !!}
                </div>
            </div>
        </section>
    <x-slot name="js">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
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