<x-app-layout>
    <x-slot name="additional">
        <script src="https://cdn.tiny.cloud/1/yekqlq7bzvgmppefyvzt59s50ccq4mtt1fualcap3dg81523/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Blog') }}</h2>
    </x-slot>

                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                        
@if (session('status') === 'blog-created')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 3000)"
                            class="bg-green-500 text-white py-4 px-8 block rounded-lg shadow"
                        >Your blog has created.</p>
@endif
@if (session('status') === 'blog-updated')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 3000)"
                            class="bg-green-500 text-white py-4 px-8 block rounded-lg shadow"
                        >Your blog has updated.</p>
@endif
@if (session('status') === 'blog-deleted')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 3000)"
                            class="bg-green-500 text-white py-4 px-8 block rounded-lg shadow"
                        >Your blog has Deleted.</p>
@endif
@if (session('status') === 'blog-unsuccess-delete')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 3000)"
                            class="bg-red-500 text-white py-4 px-8 block rounded-lg shadow"
                        >Your blog doesn`t deleted.</p>
@endif
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 px-8 text-gray-900">
                                <div class="relative overflow-x-auto">
                                    <table class="w-full text-sm text-left text-gray-500 border">
                                        <thead class="text-gray-700 uppercase bg-gray-50">
                                            <tr class="border-b">
                                                <th class="px-6 py-3 text-center">Author</th>
                                                <th class="px-6 py-3 text-center">Title</th>
                                                <th class="px-6 py-3 text-center">View</th>
                                                <th class="px-6 py-3 text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
@foreach($data as $d)
                                            <tr class="border-b even:bg-gray-100">
                                                <td class="px-6 py-3 text-center">{{ $d->user->name }}</td>
                                                <td class="px-6 py-3 text-center">{{ $d->title }}</td>
                                                <td class="px-6 py-3 text-center">{{ count($d->blog_view_log) }}</td>
                                                <td class="px-6 py-3 text-center">
                                                    <x-a-button-edit href="{{ route('admin.blog.edit',$d->id) }}">{{ __('Update') }}</x-a-button-edit>
                                                    <form method="POST" action="{{ route('admin.blog.destroy') }}" class="inline">
                                                        @csrf

                                                        @method('delete')
                                                        
                                                        <input type="hidden" name="blog_id" value="{{ $d->id }}">
                                                        <x-danger-button>{{ __('Delete') }}</x-danger-button>
                                                    </form>
                                                </td>
                                            </tr>
@endforeach                     
                                        </tbody>
                                    </table>
                                </div>
                                <x-a-button-primary href="{{ route('admin.blog.create') }}" class="mt-4">{{ __('Create') }}</x-a-button-primary>
                            </div>
                        </div>
                    </div>
                </div>
    
</x-app-layout>