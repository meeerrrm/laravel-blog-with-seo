<x-landing-layout>
        <section class="p-8 py-32" id="header">
            <div class="max-w-4xl mx-auto px-5 text-center">
                <div class="w-full h-96 bg-slate-900 rounded-2xl overflow-hidden" id="imagePlace">
                    <img src="{{ asset('assets/blog/'.$blog->thumnail) }}" class="mx-auto" alt="{{ $blog->title }}">
                </div>
                <h1 class="text-4xl font-bold uppercase text-slate-100 mt-12">{{ $blog->title }}</h1>
                <div class="text-left text-slate-300 mt-12" id="mainContent">
                    {!! json_decode($blog->content) !!}
                </div>
            </div>
        </section>
    <x-slot name="js">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function(){	
                $('#mainContent').closest('div').find('ol').addClass('list-decimal ml-4');
                $('#mainContent').closest('div').find('ul').addClass('list-disc ml-4');
                $('#mainContent').closest('div').find('li').addClass('mt-4 font-bold');
                $('#mainContent').closest('div').find('p').addClass('mt-4 font-light');
            });
        </script>
    </x-slot>
</x-landing-layout>