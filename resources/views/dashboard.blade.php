<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>

<x-app-layout>

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight hidden">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  @if (\Session::has('success'))
  <div class="fixed top-0 w-full text-white px-6 py-4 border-0 rounded mb-4 bg-green-500"  x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
  <span class="inline-block align-middle mr-8">{!! \Session::get('success') !!}
  </span>
</div>
@endif



  <div class="py-12 ">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="py-12 bg-white">
          <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
              <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Bienvenue
              </p>
              <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                Cette platforme permet de mettre faciliter la recherche de stage pour les étudiants, ainsi que le suivi et l'évaluation de ceux-ci.
              </p>
            </div>
            <div class="mt-10">
              <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                @if (Auth::user()->hasRole('et'))
                <div class="flex">
                  <div class="flex-shrink-0">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                      <!-- Heroicon name: globe-alt -->
                      <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                      </svg>
                    </div>
                  </div>

                  <div class="ml-4">
                    <a href="{{ route('stages') }}">
                      <dt class="text-lg leading-6 font-medium text-gray-900">
                        Les offres de stages
                      </dt>
                    </a>
                    <dd class="mt-2 text-base text-gray-500">
                      Consultez les dernières offres de stages.
                    </dd>
                  </div>
                </div>
                @endif
                @if (Auth::user()->hasRole('en'))
                <div class="flex">
                  <div class="flex-shrink-0">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                      <!-- Heroicon name: globe-alt -->
                      <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                    </div>
                  </div>

                  <div class="ml-4">
                    <a href="{{ route('createStage') }}">
                      <dt class="text-lg leading-6 font-medium text-gray-900">
                        Les offres de stages

                      </dt>
                    </a>
                    <dd class="mt-2 text-base text-gray-500">
                      Ajouter une offre de stage.
                    </dd>
                  </div>

                </div>
                <div class="flex">
                  <div class="flex-shrink-0">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                      <!-- Heroicon name: scale -->
                      <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                      </svg>
                    </div>
                  </div>
                  <div class="ml-4">
                    <a href="{{ route('candidatures') }}">
                      <dt class="text-lg leading-6 font-medium text-gray-900">
                        Candidatures
                      </dt>
                    </a>
                    <dd class="mt-2 text-base text-gray-500">
                      Consultez les candidatures des offres de stage que vous avez mis en
                      ligne.
                    </dd>
                  </div>
                </div>

                <div class="flex">
                  <div class="flex-shrink-0">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                      <!-- Heroicon name: scale -->
                      <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                      </svg>
                    </div>
                  </div>
                  <div class="ml-4">
                    <a href="{{ route('stagiaires') }}">
                      <dt class="text-lg leading-6 font-medium text-gray-900">
                        Stagiaires
                      </dt>
                    </a>
                    <dd class="mt-2 text-base text-gray-500">
                      Consultez les stagiaires que vous avez recrutés, le détail de leur stage ou attribuer des tâches.
                    </dd>
                  </div>
                </div>
                @endif

                @if (Auth::user()->hasRole('et'))
                <div class="flex">
                  <div class="flex-shrink-0">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                      <!-- Heroicon name: scale -->
                      <svg aria-hidden="true" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                      </svg>

                    </div>
                  </div>
                  <div class="ml-4">
                    <a href="{{ route('monStage')  }}">
                      <dt class="text-lg leading-6 font-medium text-gray-900">
                        Mon stage
                      </dt>
                    </a>
                    <dd class="mt-2 text-base text-gray-500">
                      Consultez les informations, gérer le cahier de stage,
                      mettre en ligne les documents relatifs à la restitution du stage.
                    </dd>
                  </div>
                </div>
                <div class="flex">
                  <div class="flex-shrink-0">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                      <!-- Heroicon name: lightning-bolt -->
                      <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                      </svg>
                    </div>
                  </div>
                  <div class="ml-4">
                    <a href="{{ route('mescandidatures') }}">
                      <dt class="text-lg leading-6 font-medium text-gray-900">
                        Mes Candidatures
                      </dt>
                    </a>
                    <dd class="mt-2 text-base text-gray-500">
                      Consultez les offres de stages auxquels vous avez postulez.
                    </dd>
                  </div>
                </div>

                <div class="flex">
                  <div class="flex-shrink-0">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                      <!-- Heroicon name: annotation -->
                      <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                      </svg>
                    </div>
                  </div>
                  <div class="ml-4">
                    <a href="{{ route('mesCandidaturesRetenues') }}">
                      <dt class="text-lg leading-6 font-medium text-gray-900">
                        Candidatures retenues
                      </dt>
                    </a>
                    <dd class="mt-2 text-base text-gray-500">
                      Consultez vos candidatures retenues pour les offres de stages auxquels vous avez postulez, accepter ou refuser les.
                    </dd>
                  </div>
                </div>
                @endif

                @if (Auth::user()->hasRole('ju'))
                <!-- <div class="flex">
                  <div class="flex-shrink-0">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                      <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                      </svg>
                    </div>
                  </div>
                  <div class="ml-4">
                    <a href="{{ route('stagiaires') }}">
                      <dt class="text-lg leading-6 font-medium text-gray-900">
                        Stagiaires
                      </dt>
                    </a>
                    <dd class="mt-2 text-base text-gray-500">
                      Consultez et gérez les stagiaires qui sont actuellement en stage, avec le détail de leur stage.
                    </dd>
                  </div>
                </div> -->
                @endif

                @if(Auth::user()->hasRole('admin'))
                <div class="flex">
                  <div class="flex-shrink-0">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                      <!-- Heroicon name: globe-alt -->
                      <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
                      </svg>
                    </div>
                  </div>

                  <div class="ml-4">
                    <a href="{{ route('users') }}">
                      <dt class="text-lg leading-6 font-medium text-gray-900">
                        Profils utilisateurs
                      </dt>
                    </a>
                    <dd class="mt-2 text-base text-gray-500">
                      Gérez le profil des utilisateurs.
                    </dd>
                  </div>

                </div>
                <div class="flex">
                  <div class="flex-shrink-0">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                      <!-- Heroicon name: scale -->
                      <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path fill="#fff" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                      </svg>
                    </div>
                  </div>
                  <div class="ml-4">
                    <a href="{{ route('stagiaires') }}">
                      <dt class="text-lg leading-6 font-medium text-gray-900">
                        Stagiaires

                      </dt>
                    </a>
                    <dd class="mt-2 text-base text-gray-500">
                      Gérez le profil des staigiaires.
                    </dd>
                  </div>
                </div>
                @endif


              </dl>
            </div>
          </div>
        </div>


        <?php /**PATH /Users/rayhanejebbari/Sites/laravel_projet/vendor/laravel/jetstream/src/../resources/views/components/welcome.blade.php ENDPATH**/ ?>
      </div>

    </div>
  </div>
</x-app-layout>