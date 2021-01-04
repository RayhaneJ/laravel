<div>

<form wire:submit.prevent="save" >
@if(count($stagiaires->remarques) > 0)
    @if(Auth::user()->hasRole('en') || Auth::user()->hasRole('ju') || Auth::user()->role === "admin")
    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
    @else
    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
    @endif 
        <dt class="text-sm font-medium text-gray-500">
          Remarques du stage
        </dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
          <ul class="border border-gray-200 rounded-md divide-y divide-gray-200">
              @foreach($stagiaires->remarques as $remarque)
              <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
              <div class="w-0 flex-1 flex items-center">
                <!-- Heroicon name: paper-clip -->
                <span class="ml-2 flex-1 w-0 truncate">
                  {{$remarque->remarque}}
                </span>
              </div>
              <div class="ml-4 flex-shrink-0 font-medium">
                  {{ $remarque->user['email'] }}
              </div>
            </li>
              @endforeach
          </ul>
        </dd>
      </div>
      @else 
      @if(Auth::user()->hasRole('en') || Auth::user()->hasRole('ju') || Auth::user()->role === "admin")
    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
    @else
    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
    @endif 
        <dt class="text-sm font-medium text-gray-500">
          Remarques du stage
        </dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
          <ul class="border border-gray-200 rounded-md divide-y divide-gray-200">
              <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
              <div class="w-0 flex-1 flex items-center">
                <!-- Heroicon name: paper-clip -->
                <span class="ml-2 flex-1 w-0 truncate">
                  Il n'existe pas encore de remarques pour ce stage.
                </span>
              </div>
            </li>
          </ul>
        </dd>
      </div>
      @endif
      @if(Auth::user()->hasRole('en') || Auth::user()->hasRole('ju') || Auth::user()->role === "admin")
      <div class="bg-white px-4 pt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
      @elseif(Auth::user()->hasRole('et') || Auth::user()->role = "tu")
          <div class="bg-gray-50 px-4 pt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          @endif 
        <dt class="text-sm font-medium text-gray-500">
          Ajouter remarque
        </dt>

        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
        <div>
        <div>
              <div class="mt-1">
                <textarea wire:model="remarque" id="about" name="about" rows="5" class="appearance-none h-24 rounded resize relative block w-full px-2  border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"></textarea>
              </div>
              <p class="mt-2 text-sm text-gray-500">
                Ajouter des remarques sur le stage.
              </p>
            </div>
            </div>
          </div>
          @if(Auth::user()->hasRole('en') || Auth::user()->hasRole('ju') || Auth::user()->role === "admin")
          <div class="px-4 py-3 bg-white text-right sm:px-6 ">
              @elseif(Auth::user()->hasRole('et') || Auth::user()->role = "tu")
              <div class="px-4 bg-gray-50 text-right sm:px-6 ">
                  @endif
          <x-jet-action-message class="inline-flex justify-center py-2 px-4  text-sm font-medium" on="saved">
            {{ __('Sauvegarder.') }}
        </x-jet-action-message>
        <x-jet-input-error for="remarque" class="inline-flex justify-center py-2 px-4  text-sm font-medium" />
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Sauvegarde
            </button>
            
          </div>
</form>

</div>