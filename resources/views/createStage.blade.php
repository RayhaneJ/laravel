<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>


<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Ajouter une offre de stage') }}
    </h2>
  </x-slot>

  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif


  <div class="py-12">
    <div class="max-w-7xl  mx-auto sm:px-6 lg:px-8">

      <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
              <h3 class="text-lg font-medium leading-6 text-gray-900">Détails du stage</h3>
              <p class="mt-1 text-sm text-gray-600">
                Ajouter les détails concernant l'offre de stage.
              </p>
            </div>
          </div>
          <div class="mt-5 md:mt-0 md:col-span-2">
            <form action="{{ route('storeStage') }}" method="POST" class="pb-5">
              @csrf
              <input type="hidden" name="id_entreprise" value="{{Auth::user()->id}}" />
              <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                  <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                      <label for="dateDebut" class="block text-sm font-medium text-gray-700">Date de début</label>
                      <input type="date" placeholder="01/01/2021" name="dateDebut" id="dateDebut" class="appearance-none rounded relative block w-full px-2 py-1 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    </div>

                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                      <label for="dateFin" class="block text-sm font-medium text-gray-700">Date de fin</label>
                      <input type="date" name="dateFin" placeholder="01/01/2021"  id="dateFin" class="appearance-none rounded relative block w-full px-2 py-1 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                      <label for="titre_stage" class="block text-sm font-medium text-gray-700">Titre</label>
                      <input type="text" placeholder="Intitule stage" name="titre_stage" id="titre_stage" class="appearance-none rounded relative block w-full px-2 py-1 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    </div>

                    <div class="col-span-6">
                      <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                      <textarea type="text" name="description" id="description" class="appearance-none h-24 rounded resize relative block w-full px-2  border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"></textarea>
                    </div>

                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                      <label for="duree" class="block text-sm font-medium text-gray-700">Durée</label>
                      <input type="duree" name="duree" placeholder="Nombre mois" id="duree" class="appearance-none rounded relative block w-full px-2 py-1 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    </div>
                  </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                  <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Ajouter
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>







    </div>
  </div>
</x-app-layout>