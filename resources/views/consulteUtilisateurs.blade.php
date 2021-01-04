<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div x-data="{ open: false }">

  <!-- Dialog (full screen) -->
  <x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Utilisateurs') }}
      </h2>
    </x-slot>

    <div class="flex justify-between container mx-auto">
      <div class="w-full lg:w-12/12">
        <div class="py-12">
          @if(count($users)>0)
          <!-- This example requires Tailwind CSS v2.0+ -->
          <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                      <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Email
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Nom
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Téléphone
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Role
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                          <span class="sr-only">Supprimer</span>
                        </th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                      @foreach($users as $user)
                      <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                              <img class="h-10 w-10 rounded-full" src="{{ $user->profile_photo_url }}" alt="">
                            </div>
                            <div class="ml-4">
                              <div class="text-sm font-medium text-gray-900">
                                {{ $user->email }}
                              </div>
                            </div>
                          </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">

                          @switch($user->role)
                          @case("et")
                          {{$user->etudiant['nom']}} {{$user->etudiant['prenom']}}
                          @break
                          @case("en")
                          {{$user->entreprise['nom']}} {{$user->entreprise['prenom']}}
                          @break
                          @case("tu")
                          {{$user->tuteur['nom']}} {{$user->tuteur['prenom']}}
                          @break
                          @case("ju")
                          {{$user->jury['nom']}} {{$user->jury['prenom']}}
                          @break
                          @endswitch
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                          @switch($user->role)
                          @case('et')
                          {{$user->etudiant['no_tel']}} {{$user->etudiant['no_tel']}}
                          @break
                          @case('en')
                          {{$user->entreprise['no_tel']}} {{$user->entreprise['no_tel']}}
                          @break
                          @case('tu')
                          {{$user->tuteur['no_tel']}} {{$user->tuteur['no_tel']}}
                          @break
                          @case('ju')
                          {{$user->jury['no_tel']}} {{$user->jury['no_tel']}}
                          @break
                          @endswitch
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                          {{ $user->role }}
                        </td>
                        <td class="px-6 py-4  whitespace-nowrap text-center text-sm font-medium">
                          <a href="" class="supprimeUser" data-id="{{ $user->id }}" class="text-indigo-600 hover:text-indigo-900">Supprimer</a>
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
            {!! $users->links() !!}
          </div>
          @else
          <div class="flex  py-24 justify-center">
            <div class="p-12 text-center max-w-2xl">
              <div class="md:text-3xl text-3xl font-bold">Aucun utilisateurs</div>
              <div class="text-xl font-normal mt-4">Il n'existe encore aucun utilisateurs.
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
  $('.supprimeUser').click(function(e) {
    e.preventDefault();
    var el = $(this);
    $.ajax({
      url: "/users/delete",
      type: "DELETE",
      data: {
        _token: "{{ csrf_token() }}",
        id: el.attr('data-id')
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