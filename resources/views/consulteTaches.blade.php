<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Missions') }}
        </h2>
    </x-slot>

    <div class="flex justify-between shadow-xl container mx-auto">
            <div class="w-full lg:w-12/12">
            <div class="py-12">
            <!-- component -->
<!-- This is an example component -->

@if(count($missions)>0)
<div class="min-h-screen bg-gray-100">
            
    <div class="min-h-screen flex justify-center">
        <div class="w-2/3 mx-auto">
            
    <!-- left col -->
    @foreach($missions as $mission) 
      @if($loop->iteration % 2 === 0) 
      <div class="flex flex-row w-full">
    <!-- left col -->

    <div class="w-2/5 px-2 py-10">

    </div>
    <!--line column-->
    <div class="w-1/5  flex justify-center">
        <div class="relative flex h-full w-1 bg-gray-800 items-center justify-center text-white font-semibold text-lg">
        <div class="absolute flex flex-col justify-center h-24 w-24 rounded-full border-2 bg-gray-800 leading-none text-center z-10">
                <div>{{ $mission->created_at->format('d') }}</div>
                <div>{{ $mission->created_at->format('M') }}</div>
            </div>
        </div>
    </div>
    <!--right column-->
    <div class="w-2/5 px-2 py-10 m-auto">
        <div class="flex flex-col w-full rounded-lg shadow bg-white px-4 py-5">
            <div class="text-gray-600 mb-2 flex justify-between">
            <div class="flex flex-col">
            {{ $mission->user['email'] }}
                <div class="font-bold">
                    {{ $mission->titre_mission }}
                </div>
            </div>
            </div>
            <div class="text-gray-600">
            {{ $mission->mission }}
            </div>
        </div>
    </div>
</div>
      @else
      <div class="flex flex-row w-full">
    <!-- left col -->

    <div class="w-2/5 px-2 py-10 m-auto">
        <div class="flex flex-col w-full rounded-lg shadow bg-white px-4 py-5">
            <div class="text-gray-600 mb-2 flex justify-between">
            <div class="flex flex-col">
            {{ $mission->user['email'] }}
                <div class="font-bold">
                    {{ $mission->titre_mission }}
                </div>
            </div>
            </div>
            <div class="text-gray-600">
            {{ $mission->mission }}
            </div>
        </div>

    </div>
    <!--line column-->
    <div class="w-1/5  flex justify-center">
        <div class="relative flex h-full w-1 bg-gray-700 border-opacity-20 border-gray-700 items-center justify-center">
        <div class="relative flex h-full w-1 bg-gray-800 items-center justify-center text-white font-semibold text-lg">
            <div class="absolute flex flex-col justify-center h-24 w-24 rounded-full border-2 bg-gray-800 leading-none text-center z-10">
                <div>{{ $mission->created_at->format('d') }}</div>
                <div>{{ $mission->created_at->format('M') }}</div>
            </div>
        </div>
        </div>
    </div>
    <!--right column-->
    <div class="w-2/5 px-2 py-10 ">

    </div>
</div>
      @endif
@endforeach

        </div>
    </div>

        </div>
        @else
        <div class="flex  py-24 justify-center">
    <div class="p-12 text-center max-w-2xl">
        <div class="md:text-3xl text-3xl font-medium">Aucunes missions</div>
        <div class="text-xl font-normal mt-4">Vous n'avez pas encore de missions, n'attendez plus et contactez votre entreprise ou tuteur.
        </div>
        <div class="mt-6 flex justify-center h-12 relative">
        <a href="{{ route('candidatures') }}" class="flex shadow-md font-medium absolute py-2 px-4 text-white
        cursor-pointer bg-indigo-600 rounded text-lg tr-mt  svelte-jqwywd">
        Contacter entreprise
        </a>
        </div>
    </div>
</div>
@endif
                </div>
</div>
</div>
            </div>
        </div>
    </div>
</x-app-layout>