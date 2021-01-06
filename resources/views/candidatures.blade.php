<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Candidatures') }}
    </h2>
  </x-slot>

  <div class="flex justify-between container mx-auto">
    <div class="w-full lg:w-12/12 shadow-xl">

      <div class="py-12">
        @if(count($candidatures)>0)
        <div id="container" class="w-4/5 mx-auto">
          <div class="flex flex-col sm:flex-row">
            @foreach($candidatures as $candidature)
            @if($loop->iteration % 5 == 0)
          </div>
        </div>
        <div id="container" class="w-4/5 mx-auto">
          <div class="flex flex-col sm:flex-row">
            <a href="{{route('candidatureProfile',[$candidature->etudiant['no_nanterre'],$candidature->stage['titre_stage']])}}">
              <div class="sm:w-1/4  p-2">
                <div class="bg-white px-6 py-8 rounded-lg shadow-lg text-center">
                  <div class="mb-3">
                    <img class="w-auto mx-auto rounded-full" src="{{ $candidature->etudiant->user['profile_photo_path'] }}" alt="" />
                  </div>
                  <h2 class="text-xl font-medium text-gray-700"> {{ $candidature->etudiant['nom'] }} {{ $candidature->etudiant['prenom'] }}</h2>
                  <span class="text-blue-500 block mb-5">Front End Developer</span>
                  <form id="ajaxform">
                    <a href="#" data-id="[{{ $candidature->id_stage }}, {{ $candidature->no_nanterre }}]" class="hire px-4 py-2 bg-blue-500 text-white rounded-full">Recruter</a>
                  </form>
                </div>
              </div>
            </a>
            @else
            <a href="{{route('candidatureProfile',[$candidature->etudiant['no_nanterre'],$candidature->stage['titre_stage']])}}">
              <div class="sm:w-1/4 p-2">
                <div class="bg-white px-6 py-8 rounded-lg shadow-lg text-center">
                  <div class="mb-3">
                    <img class="w-auto mx-auto rounded-full" src="{{ $candidature->etudiant->user['profile_photo_url'] }}" alt="" />
                  </div>
                  <h2 class="text-xl font-medium text-gray-700">{{ $candidature->etudiant['nom'] }} {{ $candidature->etudiant['prenom'] }}</h2>
                  <span class="text-blue-500 block mb-5">Front End Developer</span>
                  <form id="ajaxform">
                    <a href="#" data-id="[{{ $candidature->id_stage }}, {{ $candidature->no_nanterre }}]" class="hire px-4 py-2 bg-blue-500 text-white rounded-full">Recruter</a>
                  </form>
                </div>
              </div>
            </a>
            @endif
            @endforeach
          </div>

        </div>






      </div>


      <div class="mt-8">
        {!! $candidatures->links() !!}
      </div>
      @else
      <div class="flex bg-gray-100 py-24 justify-center">
        <div class="p-12 text-center max-w-2xl">
          <div class="md:text-3xl text-3xl font-medium">Aucunes candidatures</div>
          <div class="text-xl font-normal mt-4">Vous n'avez pas encore de candidats, n'attendez plus et commencez à ajouter des candidatures
            aujourd'hui.
          </div>
          <div class="mt-6 flex justify-center h-12 relative">
            <a href="{{ route('createStage') }}" class="flex shadow-md font-medium absolute py-2 px-4 text-white
        cursor-pointer bg-indigo-600 rounded text-lg tr-mt  svelte-jqwywd">
              Ajouter candidature
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
</x-app-layout>



<script>
  $('.hire').click(function(e) {
    e.preventDefault();
    var el = $(this);
    console.log(el.attr('data-id')[1]);
    console.log(el.attr('data-id')[5]);
    var retrieved_array = JSON.parse(el.attr('data-id'));
    $.ajax({
      url: "/candidatures/attente",
      type: "POST",
      data: {
        _token: "{{ csrf_token() }}",
        id_stage: retrieved_array[0],
        no_nanterre: retrieved_array[1]
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
</script>