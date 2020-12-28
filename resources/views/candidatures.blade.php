<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Candidatures') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div id="container" class="w-4/5 mx-auto">
    <div class="flex flex-col sm:flex-row">
      @foreach($candidatures as $candidature)
      @if($loop->iteration % 5 == 0)
</div>
</div>
     <div id="container" class="w-4/5 mx-auto">
    <div class="flex flex-col sm:flex-row">
    <div class="sm:w-1/4 p-2">
        <div class="bg-white px-6 py-8 rounded-lg shadow-lg text-center">
          <div class="mb-3">
            <img
              class="w-auto mx-auto rounded-full"
              src="https://i.pravatar.cc/150?img=66"
              alt=""
            />
          </div>
          <h2 class="text-xl font-medium text-gray-700">Pande Muliada</h2>
          <span class="text-blue-500 block mb-5">Front End Developer</span>

          <a href="#" class="px-4 py-2 bg-blue-500 text-white rounded-full"
            >Hire</a
          >
        </div>
      </div>
      @else
      <div class="sm:w-1/4 p-2">
        <div class="bg-white px-6 py-8 rounded-lg shadow-lg text-center">
          <div class="mb-3">
            <img
              class="w-auto mx-auto rounded-full"
              src="https://i.pravatar.cc/150?img=66"
              alt=""
            />
          </div>
          <h2 class="text-xl font-medium text-gray-700">Pande Muliada</h2>
          <span class="text-blue-500 block mb-5">Front End Developer</span>

          <a href="#" class="px-4 py-2 bg-blue-500 text-white rounded-full"
            >Hire</a
          >
        </div>
      </div>
      @endif
      @endforeach
</div>
</div>
    

            <!-- component -->
<div id="container" class="w-4/5 mx-auto">
    <div class="flex flex-col sm:flex-row">
      <!-- Card 1 -->
      <div class="sm:w-1/4 p-2">
        <div class="bg-white px-6 py-8 rounded-lg shadow-lg text-center">
          <div class="mb-3">
            <img
              class="w-auto mx-auto rounded-full"
              src="https://i.pravatar.cc/150?img=66"
              alt=""
            />
          </div>
          <h2 class="text-xl font-medium text-gray-700">Pande Muliada</h2>
          <span class="text-blue-500 block mb-5">Front End Developer</span>

          <a href="#" class="px-4 py-2 bg-blue-500 text-white rounded-full"
            >Hire</a
          >
        </div>
      </div>

      <!-- Card 2 -->
      <div class="sm:w-1/4 p-2">
        <div class="bg-white px-6 py-8 rounded-lg shadow-lg text-center">
          <div class="mb-3">
            <img
              class="w-auto mx-auto rounded-full"
              src="https://i.pravatar.cc/150?img=31"
              alt=""
            />
          </div>
          <h2 class="text-xl font-medium text-gray-700">Saraswati Cahyati</h2>
          <span class="text-blue-500 block mb-5">Back End Developer</span>

          <a href="#" class="px-4 py-2 bg-blue-500 text-white rounded-full"
            >Hire</a
          >
        </div>
      </div>

      <!-- Card 3 -->
      <div class="sm:w-1/4 p-2">
        <div class="bg-white px-6 py-8 rounded-lg shadow-lg text-center">
          <div class="mb-3">
            <img
              class="w-auto mx-auto rounded-full"
              src="https://i.pravatar.cc/150?img=18"
              alt=""
            />
          </div>
          <h2 class="text-xl font-medium text-gray-700">Wayan Alex</h2>
          <span class="text-blue-500 block mb-5">Data Scientist</span>

          <a href="#" class="px-4 py-2 bg-blue-500 text-white rounded-full"
            >Hire</a
          >
        </div>
      </div>

      <!-- Card 4 -->
      <div class="sm:w-1/4 p-2">
        <div class="bg-white px-6 py-8 rounded-lg shadow-lg text-center">
          <div class="mb-3">
            <img
              class="w-auto mx-auto rounded-full"
              src="https://i.pravatar.cc/150?img=28"
              alt=""
            />
          </div>
          <h2 class="text-xl font-medium text-gray-700">Ketut Julia</h2>
          <span class="text-blue-500 block mb-5">Project Manager</span>

          <a href="#" class="px-4 py-2 bg-blue-500 text-white rounded-full"
            >Hire</a
          >
        </div>
      </div>
    </div>
  </div>



	</div>
	




            </div>
        </div>
    </div>
</x-app-layout>
