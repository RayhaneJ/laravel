<x-jet-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Mettre à jour mot de passe') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Assurez vous que votre compte utilise un mot de passe long, au hasard pour rester sécurisé') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="current_password" value="{{ __('Mot de passe actuel') }}" />
            <x-jet-input id="current_password" type="password" class="mt-1 block w-full appearance-none rounded relative block w-full px-2 py-1 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" wire:model.defer="state.current_password" autocomplete="current-password" />
            <x-jet-input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="password" value="{{ __('Nouveau mot de passe') }}" />
            <x-jet-input id="password" type="password" class="mt-1 block w-full appearance-none rounded relative block w-full px-2 py-1 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" wire:model.defer="state.password" autocomplete="new-password" />
            <x-jet-input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="password_confirmation" value="{{ __('Confirmez mot de passe') }}" />
            <x-jet-input id="password_confirmation" type="password" class="mt-1 block w-full appearance-none rounded relative block w-full px-2 py-1 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
            <x-jet-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Sauvegarder.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Sauvegarde') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
