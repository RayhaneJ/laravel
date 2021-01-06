<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>


<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Détails stage') }}
    </h2>
  </x-slot>

  <div class="py-12 min-h-screen min-w-full">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <!-- This example requires Tailwind CSS v2.0+ -->
        @if(Auth::user()->id === $stagiaires->no_nanterre || Auth::user()->role === "tu" )
        <div class="bg-gray-50 shadow overflow-hidden sm:rounded-lg">
          @else
          <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            @endif
            <div class="px-4 py-5 sm:px-6 ">
              <h3 class="text-lg leading-6 font-medium text-gray-900">
                Informations
              </h3>
              <p class="mt-1 max-w-2xl text-sm text-gray-500">
                Détails personnels concernant la candidature.
              </p>
            </div>
            <div class="border-t border-gray-200">
              <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                  <dt class="text-sm font-medium text-gray-500">
                    Nom
                  </dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $stagiaires->etudiant['nom'] }} {{ $stagiaires->etudiant['nom'] }}
                  </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                  <dt class="text-sm font-medium text-gray-500">
                    Intitule poste
                  </dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $stagiaires->stage['titre_stage']}}
                  </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                  <dt class="text-sm font-medium text-gray-500">
                    Email
                  </dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{$stagiaires->etudiant->user['email']}}
                  </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                  <dt class="text-sm font-medium text-gray-500">
                    Téléphone
                  </dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{$stagiaires->etudiant->user['no_tel']}}
                  </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                  <dt class="text-sm font-medium text-gray-500">
                    A propos
                  </dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{$stagiaires->etudiant->user['no_tel']}}
                  </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                  <dt class="text-sm font-medium text-gray-500">
                    Documents
                  </dt>

                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <ul class=" rounded-md divide-y divide-gray-200">
                      @if(isset($stagiaires->etudiant['cv']))
                      <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">

                        <div class="w-0 flex-1 flex items-center">
                          <!-- Heroicon name: paper-clip -->
                          <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                          </svg>
                          <span class="ml-2 flex-1 w-0 truncate">
                            {!! str_replace('cv/', ' ', $stagiaires->etudiant['cv']) !!}
                          </span>
                        </div>

                        <div class="ml-4 flex-shrink-0">
                          <a href="/download/{{$stagiaires->etudiant['cv']}}" class="font-medium text-indigo-600 hover:text-indigo-500">
                            Download
                          </a>
                        </div>
                      </li>
                      @endif
                      @if(isset($stagiaires->etudiant['lettre_motiv']))
                      <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">

                        <div class="w-0 flex-1 flex items-center">
                          <!-- Heroicon name: paper-clip -->
                          <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                          </svg>
                          <span class="ml-2 flex-1 w-0 truncate">
                            {!! str_replace('lm/', ' ', $stagiaires->etudiant['lettre_motiv']) !!}
                          </span>
                        </div>

                        <div class="ml-4 flex-shrink-0">
                          <a href="/download/{{$stagiaires->etudiant['lettre_motiv']}}" class="font-medium text-indigo-600 hover:text-indigo-500">
                            Download
                          </a>
                        </div>
                      </li>
                      @endif

                      @if(count($stagiaires->documents)>0)
                      @foreach($stagiaires->documents as $document)
                      <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">

                        <div class="w-0 flex-1 flex items-center">
                          <!-- Heroicon name: paper-clip -->
                          <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                          </svg>
                          <span class="ml-2 flex-1 w-0 truncate">
                            {!! str_replace('file/', ' ', $document->path) !!}
                          </span>
                        </div>

                        <div class="ml-4 flex-shrink-0">
                          <a href="/download/{{$document->path}}" class="font-medium text-indigo-600 hover:text-indigo-500">
                            Download
                          </a>
                        </div>
                      </li>
                      @endforeach
                      @endif
                    </ul>
                  </dd>
                </div>
                @if(Auth::user()->id === $stagiaires->no_nanterre || Auth::user()->role === "tu" )
                @livewire('upload-file',['stagiaires' => $stagiaires])
                @endif
                @livewire('add-comment',['stagiaires' => $stagiaires])
            </div>
            </dd>
          </div>
          </dl>
        </div>
      </div>
    </div>
  </div>
  </div>
</x-app-layout>