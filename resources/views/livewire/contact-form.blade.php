<div>
<div>
    <section class="relative py-6 min-w-screen animation-fade animation-delay">
        <div class=" max-w-5xl mx-auto rounded-lg">
            @if ($success)
                <div class="fixed top-0 w-full left-0 text-white px-6 py-4 border-0 rounded mb-4 bg-green-500"  x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <span class="inline-block align-middle mr-8">{{ $success }}
                            </span>
                </div>
            @endif
                <div class="flex mx-auto flex-wrap items-center justify-center w-11/12 p-14 shadow-xl">
                    <form wire:submit.prevent="contactFormSubmit" action="/contact" method="POST" class="w-full">
                        @csrf
                        <div class="pb-3">
                            @error('email')
                                <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                            <input wire:model="email" class="w-full px-5 py-3 appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm " type="text" placeholder="{{ Auth::user()->etudiant->tuteur->user['email']  }}" name="email" value="{{ Auth::user()->etudiant->tuteur->user['email']  }}" />
                        </div>
                        <div class="py-3">
                            @error('name')
                                <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                            <input wire:model="name" class="w-full px-5 py-3 appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm " type="text" placeholder="Nom" name="name" value="{{ old('name') }}" />
                        </div>
                        <div class="py-3">
                            @error('comment')
                                <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                            <textarea wire:model="comment" row="4" class="w-full h-40 px-5 py-3 appearance-none h-24 rounded resize relative block w-full px-2  border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" name="comment" placeholder="Votre message ici...">{{ old('comment') }}</textarea>
                        </div>
                        <div class="pt-3 text-right ">
                            <button class=" items-end py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" type="submit">
                                Envoyer
                            </button>
                        </div>
    
                    </form>
                </div>
        </div>
    </section>
</div>
</div>
