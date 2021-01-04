<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Informations profile') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Mettre à jour votre compte, informations et adresse email.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
        <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
            <!-- Profile Photo File Input -->
            <input type="file" class="hidden" wire:model="photo" x-ref="photo" x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

            <x-jet-label for="photo" value="{{ __('Photo') }}" />

            <!-- Current Profile Photo -->
            <div class="mt-2" x-show="! photoPreview">
                <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
            </div>

            <!-- New Profile Photo Preview -->
            <div class="mt-2" x-show="photoPreview">
                <span class="block rounded-full w-20 h-20" x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                </span>
            </div>

            <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                {{ __('Selectionner une photo') }}
            </x-jet-secondary-button>

            @if ($this->user->profile_photo_path)
            <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                {{ __('Supprimer Photo') }}
            </x-jet-secondary-button>
            @endif

            <x-jet-input-error for="photo" class="mt-2" />
        </div>
        @endif

        @if(Auth::user()->hasRole('et'))
        <div class="col-span-6 sm:col-span-6 w-5/6">
            <div x-data="{}" class="flex flex-row ">
                <input type="file" class="hidden" id="cv" wire:model="cv" x-ref="cv" />
                <x-jet-secondary-button class=" mr-2" type="button" x-on:click.prevent="$refs.cv.click()">
                    {{ __('Déposez CV') }}
                </x-jet-secondary-button>
                <x-jet-label class="m-auto" value="{!! str_replace('cv/', ' ', Auth::user()->etudiant['cv']) !!}" />
            </div>
            <x-jet-input-error for="cv" class="mt-2" />

            <div x-data="{}" class="flex mt-3 flex-row ">
                <input type="file" class="hidden" id="lm" wire:model="lm" x-ref="lm" />
                <x-jet-secondary-button class=" mr-2" type="button" x-on:click.prevent="$refs.lm.click()">
                    {{ __('Déposez LM') }}
                </x-jet-secondary-button>
                <x-jet-label class="m-auto" value="{!! str_replace('lettre_motiv/', ' ', Auth::user()->etudiant['lettre_motiv']) !!}" />
            </div>

            <x-jet-input-error for="lettre_motiv" class="mt-2" />
        </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full appearance-none rounded relative block w-full px-2 py-1 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full appearance-none rounded relative block w-full px-2 py-1 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Sauvegarder.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Sauvegarde') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>