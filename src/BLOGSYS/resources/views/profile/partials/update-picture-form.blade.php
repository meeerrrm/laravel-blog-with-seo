<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Picture Update') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your new uploaded file is image!') }}
        </p>
    </header>

    <form method="post" action="{{ route('picture.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf

        @method('put')

        <div>
            <input type="hidden" name="old_picture" value="{{ $user->profile_picture }}">
            <x-input-current-img :value="__(asset('assets/picture/'.$user->profile_picture))" />
            <x-input-label for="new_profile" :value="__('Upload Image')" />
            <x-text-input id="new_profile" name="new_profile" type="file" class="mt-1 block w-full" autocomplete="new-profile-picture" />
            <x-input-error :messages="$errors->updateProfilePicture->get('new_profile')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

@if (session('status') === 'profile-picture-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
@endif
        </div>
    </form>
</section>
