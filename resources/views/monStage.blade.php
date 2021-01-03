<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mon stage') }}
        </h2>
    </x-slot>

    

    <div class="py-14 px-6 lg:px-8 xl:px-8 shadow-xl">
    @if (isset($stagiaires) > 0)
    <div class="lg:text-center ">
      <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
        Mon stage
      </p>
      <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
        C'est ici que vous retrouverez tout les détails de votre stage ainsi que les tâches attribuées par votre entreprise.
      </p>
    </div>
      <!-- component -->
<!-- <div class="w-full">
  <div class="flex">
    <div class="w-1/3">
      <div class="relative mb-2">
        <div class="w-10 h-10 mx-auto bg-green-500 rounded-full text-lg text-white flex items-center">
          <span class="text-center text-white w-full">
            <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
              <path class="heroicon-ui" d="M5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm14 8V5H5v6h14zm0 2H5v6h14v-6zM8 9a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm0 8a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </svg>
          </span>
        </div>
      </div>

      <div class="text-xs text-center md:text-base">Candidature retenue</div>
    </div>

    <div class="w-1/3">
    @if($stagiaires->conventionValideEn == true && $stagiaires->conventionValideTu == true)  
      <div class="relative mb-2">
        <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
          <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
          
          <div class="w-0 bg-green-300 py-1 rounded" style="width: 100%;"></div>
          </div>
        </div>

        <div class="w-10 h-10 mx-auto bg-green-500 rounded-full text-lg text-white flex items-center">
          <span class="text-center text-white w-full">
            <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
              <path class="heroicon-ui" d="M19 10h2a1 1 0 0 1 0 2h-2v2a1 1 0 0 1-2 0v-2h-2a1 1 0 0 1 0-2h2V8a1 1 0 0 1 2 0v2zM9 12A5 5 0 1 1 9 2a5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm8 11a1 1 0 0 1-2 0v-2a3 3 0 0 0-3-3H7a3 3 0 0 0-3 3v2a1 1 0 0 1-2 0v-2a5 5 0 0 1 5-5h5a5 5 0 0 1 5 5v2z"/>
            </svg>
          </span>
        </div>
      </div>
      @else 
      <div class="relative mb-2">
        <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
          <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
          
          <div class="w-0 bg-green-300 py-1 rounded" style="width: 0%;"></div>
          </div>
        </div>

        <div class="w-10 h-10 mx-auto bg-white rounded-full text-lg text-white flex items-center">
          <span class="text-center text-gray-600 w-full">
            <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
              <path class="heroicon-ui" d="M19 10h2a1 1 0 0 1 0 2h-2v2a1 1 0 0 1-2 0v-2h-2a1 1 0 0 1 0-2h2V8a1 1 0 0 1 2 0v2zM9 12A5 5 0 1 1 9 2a5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm8 11a1 1 0 0 1-2 0v-2a3 3 0 0 0-3-3H7a3 3 0 0 0-3 3v2a1 1 0 0 1-2 0v-2a5 5 0 0 1 5-5h5a5 5 0 0 1 5 5v2z"/>
            </svg>
          </span>
        </div>
      </div>
      @endif
      
      <div class="text-xs text-center md:text-base">Convention valide</div>
    </div>

    <div class="w-1/3">
      <div class="relative mb-2">
        <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
          <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
            <div class="w-0 bg-green-300 py-1 rounded" style="width: 0%;"></div>
          </div>
        </div>

        <div class="w-10 h-10 mx-auto bg-white border-2 border-gray-200 rounded-full text-lg text-white flex items-center">
          <span class="text-center text-gray-600 w-full">
            <svg class="w-full fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
              <path class="heroicon-ui" d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-2.3-8.7l1.3 1.29 3.3-3.3a1 1 0 0 1 1.4 1.42l-4 4a1 1 0 0 1-1.4 0l-2-2a1 1 0 0 1 1.4-1.42z"/>
            </svg>
          </span>
        </div>
      </div>

      <div class="text-xs text-center md:text-base">Stage valide</div>
    </div>
  </div>
</div> -->
        <div class="max-w-7xl mx-auto px-2">
            <div class="overflow-hidden  sm:rounded-lg">
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="py-12">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    

    <div class="mt-10">
      <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
        <div class="flex">
          <div class="flex-shrink-0">
            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
              <!-- Heroicon name: globe-alt -->
              <svg class="h-6 w-6"s xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>
            </div>
          </div>
          <div class="ml-4">
            <a href="{{ route('viewDetails', ['id'=> $stagiaires->no_nanterre]) }}">
            <dt class="text-lg leading-6 font-medium text-gray-900">
              Détails
            </dt>
            </a>
            <dd class="mt-2 text-base text-gray-500">
              Consultez les détails de votre stage, et ajoutez les documents relative à celui-ci.
            </dd>
          </div>
        </div>

        <div class="flex">
          <div class="flex-shrink-0">
            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
              <!-- Heroicon name: scale -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
</svg>
            </div>
          </div>
          <div class="ml-4">
          <a href="{{ route('missions', ['id_stagiaire'=> $stagiaires->id_stagiaire]) }}">
            <dt class="text-lg leading-6 font-medium text-gray-900">
              Tâches
            </dt>
            </a>
            <dd class="mt-2 text-base text-gray-500">
              Consultez vos tâches que l'on vous à attribuez durant votre stage.
            </dd>
          </div>
        </div>

      </dl>
    </div>
  </div>
</div>




            </div>
        </div>
        @else 
<div class="flex bg-gray-100 py-24 px-16 justify-center">
    <div class="p-12 text-center max-w-2xl">
        <div class="md:text-3xl text-3xl font-bold">Aucun stages</div>
        <div class="text-xl font-normal mt-4">Vous n'avez pas encore de stage, n'attendez plus et commencez à postulez dès 
        aujourd'hui.
        </div>
        <div class="mt-6 flex justify-center h-12 relative">
        <a href="{{ route('stages') }}" class="flex shadow-md font-medium absolute py-2 px-4 text-green-100
        cursor-pointer bg-green-600 rounded text-lg tr-mt  svelte-jqwywd">
        Découvrir les offres
        </a>
        </div>
    </div>
</div>
@endif
    </div>
</x-app-layout>

	