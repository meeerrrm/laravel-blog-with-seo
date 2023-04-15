<x-app-layout>
    <x-slot name="additional">
        <script src="https://cdn.tiny.cloud/1/yekqlq7bzvgmppefyvzt59s50ccq4mtt1fualcap3dg81523/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Create Blog') }}</h2>
    </x-slot>

                <div class="py-12">
                    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
@if(session('error'))
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 5000)"
                            class=" bg-red-400 text-white py-4 px-8 block shadow rounded-lg"
                        >{{ session('error') }}</p>
@endif
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 px-8 text-gray-900">
                                <form method="POST" action="{{ route('admin.blog.store') }}" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
                                    <div class="w-full h-[400px]">
                                        <img id="preview" alt="Preview Image" class="mx-auto w-auto h-[400px]" style="display:hidden">
                                    </div>
                                    <div class="py-2">
                                        <x-input-label for="thumnail" value="{{ __('Thumnail') }}" />
                                        <x-text-input name="thumnail" class="mt-1 w-full" id="thumnail" type="file" autocomplete="thumnail" accept="image/*" onchange="showPreview(event);" />
                                        <p class="text-gray-600 text-xs italic">Recommanded size 600 x 400 px</p>
                                        <x-input-error :messages="$errors->BlogStoreRequest->get('thumnail')" class="mt-2" />

                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="py-2">
                                            <x-input-label for="title" value="{{ __('Title') }}" />
                                            <x-text-input name="title" class="mt-1 w-full" id="title" type="text" autocomplete="title" />
                                            <x-input-error :messages="$errors->BlogStoreRequest->get('title')" class="mt-2" />
                                            </div>
                                        <div class="py-2">
                                            <x-input-label for="uniq" value="{{ __('Uniq') }}" />
                                            <x-text-input name="uniq" class="mt-1 w-full" id="uniq" type="text" autocomplete="uniq" readonly />
                                            <x-input-error :messages="$errors->BlogStoreRequest->get('uniq')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="py-2">
                                        <x-input-label for="description" value="{{ __('Short description') }}" />
                                        <x-text-input name="description" class="mt-1 w-full" id="description" type="text" autocomplete="description" />
                                        <x-input-error :messages="$errors->BlogStoreRequest->get('description')" class="mt-2" />
                                    </div>
                                    <div class="py-2">
                                        <x-input-label for="content" value="{{ __('Content') }}" />
                                        <textarea name="content" id="" cols="30" rows="10"></textarea>
                                        <x-input-error :messages="$errors->BlogStoreRequest->get('content')" class="mt-2" />
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="py-2">
                                            <x-input-label for="tag" value="{{ __('Tags') }}" />
                                            <x-text-input name="tag" class="mt-1 w-full" id="tag" type="text" autocomplete="tag" />
                                            <p class="text-gray-600 text-xs italic">Seperate your tag with whitespace " "</p>
                                            <x-input-error :messages="$errors->BlogStoreRequest->get('tag')" class="mt-2" />
                                        </div>
                                        <div class="py-2">
                                            <x-input-label for="keyword" value="{{ __('Keyword') }}" />
                                            <x-text-input name="keyword" class="mt-1 w-full" id="keyword" type="text" autocomplete="keyword" />
                                            <p class="text-gray-600 text-xs italic">Seperate your tag with comma ","</p>
                                            <x-input-error :messages="$errors->BlogStoreRequest->get('keyword')" class="mt-2" />
                                            </div>
                                    </div>
                                    <div class="py-2">
                                        <x-input-label for="publish_date" value="{{ __('Publish Date') }}" />
                                        <x-text-input name="publish_date" class="mt-1 w-full" id="publish_date" type="date" autocomplete="publish_date" />
                                        <x-input-error :messages="$errors->BlogStoreRequest->get('publish_date')" class="mt-2" />
                                    </div>
                                    <x-a-button-back href="{{ route('admin.blog.index') }}">Back</x-a-button-back>
                                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
    <x-slot name="js">
        <script>
            $(document).ready(function(){
                $('#title').keyup(function(){
                    let title = $(this).val();
                    let uniq = title.replaceAll(" ","-").toLowerCase();
                    document.getElementById('uniq').value = uniq;
                });
            });
        </script>
        <script>
                function showPreview(event){
                    if(event.target.files.length > 0){
                        let src = URL.createObjectURL(event.target.files[0]);
                        let preview = document.getElementById("preview");
                        preview.src = src;
                        preview.style.display = "block";
                    }
                }
        </script>
        <script>
            tinymce.init({
                selector: 'textarea',
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                tinycomments_mode: 'embedded',
                menubar: 'edit insert view format table tools help',
            });
        </script>
    </x-slot>
</x-app-layout>