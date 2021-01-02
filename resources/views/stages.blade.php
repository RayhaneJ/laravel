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
@if(count($stages) > 0)
<div class="bg-gray-100 overflow-x-hidden">
    <div class="px-6 py-8">
        <div class="flex justify-between container mx-auto">
            <div class="w-full lg:w-12/12">
                <div class="flex items-center justify-between">
                    <h1 class="text-xl font-bold text-gray-700 md:text-2xl">Les offres de stages</h1>
                    <div>
                        <select class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option>Latest</option>
                            <option>Last Week</option>
                        </select>
                    </div>
                </div>
                @foreach ($stages as $stage)
                    <div class="mt-6">
                    <div class="max-w-4xl px-10 py-6 bg-white rounded-lg shadow-md">
                        <div class="flex justify-between items-center"><span class="font-light text-gray-600">Jun 1,
                                2020</span><a href="#"
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
                                        src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=731&amp;q=80"
                                        alt="avatar" class="mx-4 w-10 h-10 object-cover rounded-full hidden sm:block">
                                    <h1 class="text-gray-700 font-bold hover:underline">{{ $stage->entreprise['id_entreprise'] }}</h1>
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
    <div class="p-12 text-center max-w-2xl">
        <div class="md:text-3xl text-3xl font-bold">Aucunes offre de stage</div>
        <div class="text-xl font-normal mt-4">Aucun entreprise n'a encore déposez d'offre de stage, revenez plus tard.
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
	