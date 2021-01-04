<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div x-data="{ open: false }">

  <!-- Dialog (full screen) -->
  <div class="absolute top-0 left-0 flex items-center justify-center w-full h-full" style="background-color: rgba(0,0,0,.5);" x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90">
    <!-- A basic modal dialog with title, body and one button to close -->
    <div class="container px-4 max-w-md mx-auto pb-4 " @click.away="open = false">
      <!-- todo wrapper -->
      <div class="bg-white rounded  px-4 pt-4 pb-4">
        <div class="flex flex-row">
          <div class="title font-bold text-medium">Ajouter des tâches</div>
          <div class="flex items-center" id="resultAjoute">
            <div class="capitalize ml-3 text-sm font-semibold">Tâche ajoutée</div>
          </div>
          <div class="flex items-center" id="erreur">
            <div class="capitalize ml-3 text-sm font-semibold">Champs requis</div>
          </div>
        </div>
        <div class="flex items-center text-sm mt-2">
          <button class="ajouteTache">
            <svg class="w-3 h-3 mr-3 focus:outline-none" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
              <path d="M12 4v16m8-8H4"></path>
            </svg>
          </button>
          <span>Ajoutez tâche</span>
        </div>
        <input type="text" placeholder="Intitulé tâche" class=" rounded-sm shadow-sm px-4 py-2 border border-gray-200 w-full mt-4 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" id="todoTitle">
        <textarea type="text" placeholder="Description tâche" name="about" rows="5" id="todoDesc" class="rounded-sm shadow-sm px-4 py-2 border border-gray-200 w-full mt-2 mb-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"></textarea>
      </div>
    </div>
  </div>
  @if(Auth::user()->hasRole('tu'))
  <div class="fixed bottom-0 right-0 mr-12 mb-8 ">
    <a href="{{ route('exportStudent', ['tuteurId' => Auth::user()->id]) }}">
      <div class="bg-white rounded-lg shadow-md px-4 py-2 border-1 border-gray-400">
        Export CSV
      </div>
    </a>
  </div>
  @endif

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
                <div class=" overflow-hidden border-b border-gray-200 sm:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                      <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Nom
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Intitule stage
                        </th>
                        @if (Auth::user()->hasRole('en') || Auth::user()->hasRole('tu'))
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Convention
                        </th>
                        @elseif(Auth::user()->hasRole('ju'))
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Statut
                        </th>
                        @endif
                        @if(Auth::user()->hasRole('tu'))
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Statut
                        </th>
                        @endif
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Classe
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                          <span class="sr-only">Détails</span>
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                          <span class="sr-only">Tâches</span>
                        </th>
                        @if(Auth::user()->hasRole('admin'))
                        <th scope="col" class="relative px-6 py-3">
                          <span class="sr-only">Archiver</span>
                        </th>
                        @endif
                        @if (Auth::user()->hasRole('en'))
                        <th scope="col" class="relative px-6 py-3">
                          <span class="sr-only">AjouterTaches</span>
                        </th>
                        @endif
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
                        @if(Auth::user()->hasRole('en'))
                        @if($stagiaire->conventionValideEn == true)
                        <td class="px-6 py-4 whitespace-nowrap">
                          <a href="" class="invalidConvention" data-id="{{ $stagiaire->no_nanterre }}">
                            <span class="inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                              Valide
                            </span>
                          </a>
                        </td>
                        @else
                        <td class="px-6 py-4 whitespace-nowrap">
                          <a href="" class="valideConvention" data-id="{{ $stagiaire->no_nanterre }}">
                            <span class="inline-flex text-xs leading-5 font-semibold rounded-full bg-white-100 text-gray-800">
                              Non valide
                            </span>
                          </a>
                        </td>
                        @endif
                        @elseif(Auth::user()->hasRole('ju'))
                        @if($stagiaire->isValid == true)
                        <td class="px-6 py-4 whitespace-nowrap">
                          <a href="" class="invalidStage" data-id="{{ $stagiaire->no_nanterre }}">
                            <span class=" inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                              Valide
                            </span>
                          </a>
                        </td>
                        @else
                        <td class="px-6 py-4 whitespace-nowrap">
                          <a href="" class="valideStage" data-id="{{ $stagiaire->no_nanterre }}">
                            <span class=" inline-flex text-xs leading-5 font-semibold rounded-full bg-white-100 text-gray-800">
                              Non valide
                            </span>
                          </a>
                        </td>
                        @endif
                        @elseif(Auth::user()->hasRole('tu'))
                        @if($stagiaire->conventionValideTu == true)
                        <td class="px-6 py-4 whitespace-nowrap">
                          <a href="" class="invalidConvention" data-id="{{ $stagiaire->no_nanterre }}">
                            <span class="inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                              Valide
                            </span>
                          </a>
                        </td>
                        @else
                        <td class="px-6 py-4 whitespace-nowrap">
                          <a href="" class="valideConvention" data-id="{{ $stagiaire->no_nanterre }}">
                            <span class="inline-flex text-xs leading-5 font-semibold rounded-full bg-white-100 text-gray-800">
                              Non valide
                            </span>
                          </a>
                        </td>
                        @endif
                        @endif
                        @if(Auth::user()->hasRole('tu'))
                        @if($stagiaire->isValid == true)
                        <td class="px-6 py-4 whitespace-nowrap">
                          <span class=" inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Valide
                          </span>
                        </td>
                        @else
                        <td class="px-6 py-4 whitespace-nowrap">
                          <span class=" inline-flex text-xs leading-5 font-semibold rounded-full bg-white-100 text-gray-800">
                            Non valide
                          </span>
                        </td>
                        @endif
                        @endif
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                          {{$stagiaire->etudiant['classe']}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                          <a href="{{ route('viewDetails', ['id'=> $stagiaire->no_nanterre]) }}" class="text-indigo-600 hover:text-indigo-900">Détails</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                          <a href="{{ route('missions', ['id_stagiaire' => $stagiaire->id_stagiaire]) }}" class="text-indigo-600 hover:text-indigo-900">Tâches</a>
                        </td>
                        @if(Auth::user()->hasRole('admin'))
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                          @if($stagiaire->estArchive() == 1)
                          <a class=" text-green-800">Archiver</a>
                          @elseif($stagiaire->estArchive() == 0)
                          <a href="" data-id="{{ $stagiaire->id_stagiaire }}" class="archive text-indigo-600 hover:text-indigo-900">Archiver</a>
                          @endif
                        </td>
                        @endif
                        @if (Auth::user()->hasRole('en'))
                        <td class="px-6 py-4">
                          <a data-id="{{ $stagiaire->id_stagiaire }}" class="modalTache" x-on:click="open = true" >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="text-indigo-600 hover:text-indigo-900 cursor-pointer">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                          </a>
                        </td>
                        @endif
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
          @if(Auth::user()->hasRole('en'))
          <div class="flex  py-24 justify-center">
            <div class="p-12 text-center max-w-2xl">
              <div class="md:text-3xl text-3xl font-medium">Aucun stagiaires</div>
              <div class="text-xl font-normal mt-4">Vous n'avez pas encore de stagiaires, n'attendez plus et commencez à recruter des stagiaires dès
                aujourd'hui.
              </div>
              <div class="mt-6 flex justify-center h-12 relative">
                <a href="{{ route('candidatures') }}" class="flex shadow-md font-medium absolute py-2 px-4 text-white
        cursor-pointer bg-indigo-600 rounded text-lg tr-mt  svelte-jqwywd">
                  Chercher candidatures
                </a>
              </div>
            </div>
          </div>
          @elseif(Auth::user()->hasRole('tu'))
          <div class="flex  py-24 justify-center">
            <div class="p-12 text-center max-w-2xl">
              <div class="md:text-3xl text-3xl font-medium">Aucun stagiaires</div>
              <div class="text-xl font-normal mt-4">Vous n'êtes pas encore responsable de stagiaires, revenez plus tard.
              </div>
            </div>
          </div>
          @elseif(Auth::user()->hasRole('admin'))
          <div class="flex  py-24 justify-center">
            <div class="p-12 text-center max-w-2xl">
              <div class="md:text-3xl text-3xl font-medium">Aucun stagiaires</div>
              <div class="text-xl font-normal mt-4">Il n'existe pas encore de staigiaires, revenez plus tard.
              </div>

            </div>
          </div>
          @endif
          @endif

        </div>
      </div>
    </div>
</div>
</div>
</div>
</x-app-layout>
</div>

<script>
  $('#resultAjoute').hide(); // or fade, css display however you'd like.
  $('#erreur').hide();
  let idEtudiant = null;

  $('.valideConvention').click(function(e) {
    e.preventDefault();
    var el = $(this);
    $.ajax({
      url: "/stagiaires/valideConvention",
      type: "POST",
      data: {
        _token: "{{ csrf_token() }}",
        no_nanterre: el.attr('data-id')
      },
      success: function(response) {
        location.reload();
        if (response) {
          $('.success').text(response.success);
          $("#ajaxform")[0].reset();

        }
      },
    });
  });

  $('.invalidConvention').click(function(e) {
    e.preventDefault();
    var el = $(this);
    $.ajax({
      url: "/stagiaires/invalidConvention",
      type: "POST",
      data: {
        _token: "{{ csrf_token() }}",
        no_nanterre: el.attr('data-id')
      },
      success: function(response) {
        location.reload();
        if (response) {
          $('.success').text(response.success);
          $("#ajaxform")[0].reset();

        }
      },
    });
  });

  $('.valideStage').click(function(e) {
    e.preventDefault();
    var el = $(this);
    $.ajax({
      url: "/stagiaires/valideStage",
      type: "POST",
      data: {
        _token: "{{ csrf_token() }}",
        no_nanterre: el.attr('data-id')
      },
      success: function(response) {
        location.reload();
        if (response) {
          $('.success').text(response.success);
          $("#ajaxform")[0].reset();

        }
      },
    });
  });

  $('.invalidStage').click(function(e) {
    e.preventDefault();
    var el = $(this);
    $.ajax({
      url: "/stagiaires/invalidStage",
      type: "POST",
      data: {
        _token: "{{ csrf_token() }}",
        no_nanterre: el.attr('data-id')
      },
      success: function(response) {
        location.reload();
        if (response) {
          $('.success').text(response.success);
          $("#ajaxform")[0].reset();

        }
      },
    });
  });

  $('.archive').click(function(e) {
    e.preventDefault();
    var el = $(this);
    $.ajax({
      url: "/archive",
      type: "POST",
      data: {
        _token: "{{ csrf_token() }}",
        id_stagiaire: el.attr('data-id')
      },
      success: function(response) {
        location.reload();
        if (response) {
          $('.success').text(response.success);
          $("#ajaxform")[0].reset();

        }
      },
    });
  });

  $('.modalTache').click(function(e) {
    e.preventDefault();
    var el = $(this);
    idEtudiant = el.attr('data-id');
  });

  $('.ajouteTache').click(function(e) {
    if ($("#todoTitle").val() == '' || $("#todoDesc").val() == '') {
      $("#erreur").fadeIn(500);
      $("#erreur").delay(3000).fadeOut(300);
    } else {
      e.preventDefault();
      var el = $(this);
      $.ajax({
        url: "/stagiaires/ajouteTache",
        type: "POST",
        data: {
          _token: "{{ csrf_token() }}",
          titre_tache: $('#todoTitle').val(),
          desc_tache: $('#todoDesc').val(),
          id_stagiaire: idEtudiant
        },
        success: function(response) {
          $("#resultAjoute").fadeIn(500);
          $("#resultAjoute").delay(3000).fadeOut(300);
        }
      })
      $('#todoTitle').val("");
      $('#todoDesc').val("");
    }
  })
</script>