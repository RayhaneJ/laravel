<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div x-data="{ open: false }">

      <!-- Dialog (full screen) -->
      <div class="absolute top-0 left-0 flex items-center justify-center w-full h-full" style="background-color: rgba(0,0,0,.5);" x-show="open" >

        <!-- A basic modal dialog with title, body and one button to close -->
        <div class="container px-3 max-w-md mx-auto"  @click.away="open = false">
    <!-- todo wrapper -->
    <div class="bg-white rounded shadow px-4 py-4">
      <div class="title font-bold text-lg">Ajouter des tâches</div>
      <div class="flex items-center text-sm mt-2">
        <button class="ajouteTache" >
          <svg class="w-3 h-3 mr-3 focus:outline-none" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M12 4v16m8-8H4"></path>
          </svg>
        </button>
        <span>Ajoutez tâche</span>
      </div>
      <input type="text" placeholder="Intitulé tâche" class=" rounded-sm shadow-sm px-4 py-2 border border-gray-200 w-full mt-4" id="todoTitle">
      <input type="text" placeholder="Description tâche" class=" rounded-sm shadow-sm px-4 py-2 border border-gray-200 w-full mt-2" id="todoDesc"> 
      
      <!-- todo list -->
      <ul class="todo-list mt-4">

      <div class="flex items-center" id="resultAjoute" >
              <div class="capitalize ml-3 text-sm font-semibold">Tâche ajoutée</div>
            </div>

      </ul>
    </div>

   
  </div>
      </div>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Candidatures') }}
        </h2>
    </x-slot>

    <div class="flex justify-between container mx-auto">
            <div class="w-full lg:w-12/12">
            <div class="py-12">
              
            @if(count($stagiaires)>0)
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Nom
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Intitule stage
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Convention
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Classe
              </th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Détails</span>
              </th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Tâches</span>
              </th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">AjouterTaches</span>
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @foreach($stagiaires as $stagiaire)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10">
                    <img class="h-10 w-10 rounded-full" src="{{ $stagiaire->etudiant->user['profile_photo_url'] }}" alt="">
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">
                      {{$stagiaire->etudiant['nom']}} {{$stagiaire->etudiant['prenom']}}
                    </div>
                    <div class="text-sm text-gray-500">
                      {{ $stagiaire->etudiant->user['email'] }}
                    </div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ $stagiaire->stage['titre_stage'] }}</div>
                <div class="text-sm text-gray-500">{{ $stagiaire->stage['duree'] }}</div>
              </td>
              @if($stagiaire->conventionValideEn == true)
              <td class="px-6 py-4 whitespace-nowrap">
              <a href="" class="invalidConvention" data-id="{{ $stagiaire->no_nanterre }}">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  Valide
                </span>
                </a>
              </td>
              @else 
              <td class="px-6 py-4 whitespace-nowrap">
                <a href="" class="valideConvention" data-id="{{ $stagiaire->no_nanterre }}">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-white-100 text-gray-800">
                  Non valide
                </span>
                </a>
              </td>
              @endif
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
              {{$stagiaire->etudiant['classe']}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="{{ route('viewDetails', ['id'=> $stagiaire->no_nanterre]) }}" class="text-indigo-600 hover:text-indigo-900">Détails</a>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <a href="#" class="text-indigo-600 hover:text-indigo-900">Tâches</a>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              <a data-id="{{ $stagiaire->id_stagiaire }}" class="modalTache" x-on:click="open = true" 
           class="text-indigo-600 hover:text-indigo-900 cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>
</a>
              </td>
            </tr>
            @endforeach
            <!-- More rows... -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>



  
  <div class="mt-8">
                        {!! $stagiaires->links() !!}
                </div>
                @else 
                <div class="flex  py-24 justify-center">
    <div class="p-12 text-center max-w-2xl">
        <div class="md:text-3xl text-3xl font-bold">Aucun stagiaires</div>
        <div class="text-xl font-normal mt-4">Vous n'avez pas encore de stagiaires, n'attendez plus et commencez à recruter des stagiaires dès
        aujourd'hui.
        </div>
        <div class="mt-6 flex justify-center h-12 relative">
        <a href="{{ route('candidatures') }}" class="flex shadow-md font-medium absolute py-2 px-4 text-green-100
        cursor-pointer bg-green-600 rounded text-lg tr-mt  svelte-jqwywd">
        Consultez candidatures.
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
</div>
</x-app-layout>
</div>

<script>

   $('#resultAjoute').hide();// or fade, css display however you'd like.

let idEtudiant=null;

$('.valideConvention').click(function(e){
  e.preventDefault();
  var el = $(this);
  $.ajax({
        url: "/stagiaires/valideConvention",
        type:"POST",
        data:{
          _token: "{{ csrf_token() }}", 
          no_nanterre: el.attr('data-id')
        },
        success:function(response){
          location.reload();
          if(response) {
            $('.success').text(response.success);
            $("#ajaxform")[0].reset();
            
          }
        },
       });
});

$('.invalidConvention').click(function(e){
  e.preventDefault();
  var el = $(this);
  $.ajax({
        url: "/stagiaires/invalidConvention",
        type:"POST",
        data:{
          _token: "{{ csrf_token() }}", 
          no_nanterre: el.attr('data-id')
        },
        success:function(response){
          location.reload();
          if(response) {
            $('.success').text(response.success);
            $("#ajaxform")[0].reset();
            
          }
        },
       });
});

$('.modalTache').click(function(e){
  e.preventDefault();
  var el = $(this);
  idEtudiant = el.attr('data-id');
});

$('.ajouteTache').click(function(e){
  e.preventDefault();
  var el = $(this);
  $.ajax({
        url: "/stagiaires/ajouteTache",
        type:"POST",
        data:{
          _token: "{{ csrf_token() }}", 
          titre_tache: $('#todoTitle').val(),
          desc_tache: $('#todoDesc').val(),
          id_stagiaire: idEtudiant
        },
        success:function(response){  
          $("#resultAjoute").fadeIn(500);
          $("#resultAjoute").delay(3000).hide(500);
        }
       })
       $('#todoTitle').val("");
       $('#todoDesc').val("");
    });

  



</script>