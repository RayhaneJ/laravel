<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Les offres de stages') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

<!-- component -->
@if(Auth::user()->etudiant->hasStage() == false)
@if(count($stages) > 0)
<div class="bg-gray-100 overflow-x-hidden">
    <div class="px-6 py-8">
        <div class="flex justify-between container mx-auto">
            <div class="w-full lg:w-12/12">
                <div class="flex items-center justify-between">
                    <h1 class="text-xl font-bold text-gray-700 md:text-2xl">Les offres de stages</h1>
                </div>
                @foreach ($stages as $stage)
                    <div class="mt-6">
                    <div class="max-w-4xl px-10 py-6 bg-white rounded-lg shadow-md">
                        <div class="flex justify-between items-center">
                            <span class="font-light text-gray-600">
                                {{ $stage->created_at->format('d M, Y') }}</span><a href="#"
                                class="px-2 py-1 bg-gray-600 text-gray-100 font-bold rounded hover:bg-gray-500">Laravel</a>
                        </div>
                        <div class="mt-2"><a href="#" class="text-2xl text-gray-700 font-bold hover:underline">
                           {{ $stage->titre_stage }}
                        </a>
                            <p class="mt-2 text-gray-600">{{ $stage->desc_stage }}</p>
                        </div>
                        <div class="flex justify-between items-center mt-4">
                        @if(Auth::user()->hasRole('et'))
                        <form id="ajaxform" > 
                        @if (count($postules) > 0)
                        @foreach($postules as $postule)
                        
                            @if($postule->id_stage == $stage->id_stage)
                             <?php $isPresent = true ?>
                             @break
                            @else
                             <?php $isPresent = false ?>
                            @endif                
                        @endforeach 
                            @if($isPresent==true)
                            <a class="postuleDelete" href=""
                                class="text-blue-500 hover:underline" data-id="{{ $stage->id_stage }}">
                                En attente
                            </a>
                            @else 
                            <a class="postuleStore" href=""
                                class="text-blue-500 hover:underline" data-id="{{ $stage->id_stage }}">
                                Postulez
                            </a>
                            @endif 
                        @else
                        
                        <a class="postuleStore" href=""
                                class="text-blue-500 hover:underline" data-id="{{ $stage->id_stage }}">
                                Postulez
                            </a>
                        @endif
                       
                        </form>
                        @endif
                            <div><a href="#" class="flex items-center"><img
                            src="{{ $stage->entreprise->user['profile_photo_url'] }}" alt="{{ $stage->entreprise->user['email'] }}" class="mx-4 w-10 h-10 object-cover rounded-full hidden sm:block">
                                    <h1 class="text-gray-700 font-bold hover:underline">{{ $stage->entreprise->user['email'] }}</h1>
                                </a></div>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="mt-8">
                        {!! $stages->links() !!}
                </div>
            </div>
           
        </div>
    </div>

</div>
@else 
<div class="flex bg-gray-100 py-24 justify-center">
    <div class="text-center w-2/4">
        <div class="md:text-3xl text-3xl font-medium">Aucunes offre de stage</div>
        <div class="text-xl font-normal mt-4">Aucun entreprise n'a encore déposez d'offre de stage, revenez plus tard.
        </div>
    </div>
</div>
@endif
@else 
<div class="flex bg-gray-100 py-24 justify-center">
    <div class="text-center w-2/4">
        <div class="md:text-3xl text-3xl font-medium">Vous êtes déja associé à un stage</div>
        <div class="text-xl font-normal mt-4">Vous ne pouvez pas accéder à ces fonctionalités
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
<script>
$('.postuleStore').click(function(e){
  e.preventDefault();
  var el = $(this);
  $.ajax({
        url: "/postule",
        type:"POST",
        data:{
          _token: "{{ csrf_token() }}", 
          id_stage: el.attr('data-id')
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

$('.postuleDelete').click(function(e){
  e.preventDefault();
  var el = $(this);
  $.ajax({
        url: "/postule/delete",
        type:"DELETE",
        data:{
          _token: "{{ csrf_token() }}", 
          id_stage: el.attr('data-id')
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
</script>
	