<form wire:submit.prevent="save" >
      <div class="bg-gray-50 px-4 pt-5 pb-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">
          Déposer document
        </dt>

        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
        <div>
              <div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                <div class="space-y-1 text-center">
                  <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  <div class="flex text-sm text-gray-600">
                    <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                      <span>Dépose un fichier</span>
                      <input wire:model="file" id="file-upload" name="file-upload" type="file" class="sr-only">
                    </label>
                    <p class="pl-1">ou drag and drop</p>
                  </div>
                  <p class="text-xs text-gray-500">
                    PNG, JPG, PDF
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 ">
          <x-jet-action-message class="inline-flex justify-center py-2 px-4  text-sm font-medium" on="saved">
            {{ __('Sauvegarder.') }}
        </x-jet-action-message>
        <x-jet-input-error for="file" class="inline-flex justify-center py-2 px-4  text-sm font-medium" />
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Sauvegarde
            </button>
            
          </div>
</form>
