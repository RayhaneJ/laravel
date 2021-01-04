<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Candidatures retenues') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <!-- component -->
                @if(Auth::user()->etudiant->hasStage() == false)
                @if(count($candidaturesAttente) > 0)
                <div class="bg-gray-100 overflow-x-hidden">
                    <div class="px-6 py-8">
                        <div class="flex justify-between container mx-auto">
                            <div class="w-full lg:w-12/12">
                                <div class="flex items-center justify-between">
                                    <h1 class="text-xl font-bold text-gray-700 md:text-2xl">Vos candidatures en retenues</h1>
                                    <div>
                                        <select class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                            <option>Latest</option>
                                            <option>Last Week</option>
                                        </select>
                                    </div>
                                </div>
                                @foreach ($candidaturesAttente as $candidatureAttente)
                                <div class="mt-6">
                                    <div class="max-w-4xl px-10 py-6 bg-white rounded-lg shadow-md">
                                        <div class="flex justify-between items-center"><span class="font-light text-gray-600">Jun 1,
                                                2020</span><a href="#" class="px-2 py-1 bg-gray-600 text-gray-100 font-bold rounded hover:bg-gray-500">Laravel</a>
                                        </div>
                                        <div class="mt-2"><a href="#" class="text-2xl text-gray-700 font-bold hover:underline">
                                                {{ $candidatureAttente->stage['titre_stage'] }}
                                            </a>
                                            <p class="mt-2 text-gray-600">{{ $candidatureAttente->stage['desc_stage'] }}</p>
                                        </div>
                                        <div class="flex justify-between items-center mt-4">
                                            <form id="ajaxform">
                                                <a class="accepteStage" href="" class="text-blue-500 hover:underline" data-id="{{ $candidatureAttente->stage['id_stage'] }}">
                                                    Acceptez l'offre
                                                </a>
                                            </form>
                                            <div><a href="#" class="flex items-center"><img src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=731&amp;q=80" alt="avatar" class="mx-4 w-10 h-10 object-cover rounded-full hidden sm:block">
                                                    <h1 class="text-gray-700 font-bold hover:underline">{{ $candidatureAttente->stage->entreprise['id_entreprise'] }}</h1>
                                                </a></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                <div class="mt-8">
                                    {!! $candidaturesAttente->links() !!}
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                @else
                <div class="flex bg-gray-100 py-24  justify-center">
                    <div class=" text-center w-2/4">
                        <div class="md:text-3xl text-3xl font-medium">Aucunes candidatures retenues</div>
                        <div class="text-xl font-normal mt-4">Vous n'avez pas encore de candidature retenues, n'attendez plus et commencez à postulez dès
                            aujourd'hui.
                        </div>
                        <div class="mt-6 flex justify-center h-12 relative">
                            <a href="{{ route('stages') }}" class="flex shadow-md font-medium absolute py-2 px-4 text-white
        cursor-pointer bg-indigo-600 rounded text-lg tr-mt  svelte-jqwywd">
                                Cherche un stage
                            </a>
                        </div>
                    </div>
                </div>
                @endif
                @else
                <div class="flex bg-gray-100 py-24 justify-center">
                    <div class="text-center w-2/4">
                        <div class="md:text-3xl text-3xl font-medium">Vous êtes déja associé à un stage</div>
                        <div class="text-xl font-normal mt-4">Vous ne pouvez pas accéder à ces fonctionalités.
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
    $('.accepteStage').click(function(e) {
        e.preventDefault();
        var el = $(this);
        $.ajax({
            url: "/stage/accepte",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id_stage: el.attr('data-id')
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