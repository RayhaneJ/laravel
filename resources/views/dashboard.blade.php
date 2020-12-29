<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    @if (\Session::has('success'))
    <div class="alert alert-success" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
      x-transition:leave="transition ease-in duration-300"
      x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

<!-- This example requires Tailwind CSS v2.0+ -->
<div class="py-12 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="lg:text-center">
      <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Transactions</h2>
      <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
        A better way to send money
      </p>
      <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
        Lorem ipsum dolor sit amet consect adipisicing elit. Possimus magnam voluptatum cupiditate veritatis in accusamus quisquam.
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
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
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
          @endif
          @if (Auth::user()->hasRole('en'))
        <div class="flex">
          <div class="flex-shrink-0">
            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
              <!-- Heroicon name: globe-alt -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
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
          @endif
        </div>

        @if (Auth::user()->hasRole('et'))
        <div class="flex">
          <div class="flex-shrink-0">
            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
              <!-- Heroicon name: scale -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
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
        @endif

        @if (Auth::user()->hasRole('en'))
        <div class="flex">
          <div class="flex-shrink-0">
            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
              <!-- Heroicon name: scale -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
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
        @endif

        @if (Auth::user()->hasRole('et'))
        <div class="flex">
          <div class="flex-shrink-0">
            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
              <!-- Heroicon name: lightning-bolt -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
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
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
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
              Consultez vos candidatures retenues pour les offres de stages auxquels vous avez postulez.
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
