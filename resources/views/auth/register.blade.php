<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>


<form method="POST" action="{{ route('register') }}">
	@csrf
	<div x-data="app()" x-cloak>
		<div class="max-w-3xl mx-auto px-4 ">
			<x-jet-validation-errors class="mb-4" />
			<div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
				<div class="max-w-md w-full space-y-8">
					<div>
						<img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
						<h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
							Créez votre compte
						</h2>
					</div>
					<div class="rounded-md space-y-4">
						<div>
							<label for="email-address" class="sr-only">Email address</label>
							<input id="email-address" name="email" type="email" autocomplete="email" required class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm " placeholder="Adresse mail">
						</div>
						<div>
							<label for="password" class="sr-only">Password</label>
							<input id="password" name="password" type="password" autocomplete="current-password" required autocomplete="new-password" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm " placeholder="Mot de passe">
						</div>
						<div>
							<label for="password_confirmation" class="sr-only">Confirm-password</label>
							<input id="password_confirmation" name="password_confirmation" type="password" autocomplete="current-password" required autocomplete="new-password" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Confirmez mot de passe">
						</div>
						<input hidden id="role" name="role"/>
						<div x-data="select({ data: { ju: 'Juge', en: 'Entreprise', et: 'Etudiant', tu: 'Tuteur', }, name: 'role', placeholder: 'Selectionnez un rôle' })" x-init="init()" @click.away="closeListbox()" @keydown.escape="closeListbox()" class="relative">
							<span class="inline-block w-full rounded-md shadow-sm">
								<button x-ref="button" type="button" @click="toggleListboxVisibility()" :aria-expanded="open" aria-haspopup="listbox" class="relative z-0 w-full py-2 pl-3 pr-10 text-left transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md cursor-default focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
									<span x-show="! open" x-text="value in options ? options[value] : placeholder" :class="{ 'text-gray-500': ! (value in options) }" class="block truncate"></span>
									<input x-ref="search" x-show="open" x-model="search" @keydown.enter.stop.prevent="selectOption()" @keydown.arrow-up.prevent="focusPreviousOption()" @keydown.arrow-down.prevent="focusNextOption()" type="search" class="w-full form-control focus:outline-none" />
									<span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
										<svg class="w-5 h-5 text-gray-400" viewBox="0 0 20 20" fill="none" stroke="currentColor">
											<path d="M7 7l3-3 3 3m0 6l-3 3-3-3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
										</svg>
									</span>
								</button>
							</span>

							<div x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-cloak class="absolute z-10 w-full mt-1 bg-white rounded-md shadow-lg">
								<ul x-ref="listbox" @keydown.enter.stop.prevent="selectOption()" @keydown.arrow-up.prevent="focusPreviousOption()" @keydown.arrow-down.prevent="focusNextOption()" role="listbox" :aria-activedescendant="focusedOptionIndex ? name + 'Option' + focusedOptionIndex : null" tabindex="-1" class="py-1 overflow-auto text-base leading-6 rounded-md shadow-xs max-h-60 focus:outline-none sm:text-sm sm:leading-5">
									<template x-for="(key, index) in Object.keys(options)" :key="index">
										<li :id="name + 'Option' + focusedOptionIndex" @click="selectOption()" @mouseenter="focusedOptionIndex = index" @mouseleave="focusedOptionIndex = null" role="option" :aria-selected="focusedOptionIndex === index" :class="{ 'text-white bg-indigo-600': index === focusedOptionIndex, 'text-gray-900': index !== focusedOptionIndex }" class="relative py-2 pl-3 text-gray-900 cursor-default select-none pr-9">
											<span x-text="Object.values(options)[index]" :class="{ 'font-semibold': index === focusedOptionIndex, 'font-normal': index !== focusedOptionIndex }" class="block font-normal truncate"></span>

											<span x-show="key === value" :class="{ 'text-white': index === focusedOptionIndex, 'text-indigo-600': index !== focusedOptionIndex }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600">
												<svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
													<path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
												</svg>
											</span>
										</li>
									</template>
									<div x-show="! Object.keys(options).length" x-text="emptyOptionsMessage" class="px-3 py-2 text-gray-900 cursor-default select-none">
									</div>
								</ul>
							</div>
						</div>
						<div x-show.transition.in="step === 2 && (role==='et' || role==='tu' || role==='ju')" class="space-y-4">
							<div class="rounded-md flex space-x-2 justify-between">
								<div>
									<label for="nom" class="sr-only">Nom</label>
									<input id="nom" name="nom" class="flex-shrink md:flex-shrink-0  appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Nom">
								</div>
								<div>
									<label for="prenom" class="sr-only">Prenom</label>
									<input id="prenom" name="prenom" type="prenom" class="flex-shrink md:flex-shrink-0  appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Prénom">
								</div>
							</div>
							<div class="rounded-md flex space-x-2 justify-between">
								<div>
									<label for="date" class="sr-only">Date</label>
									<input id="date" placeholder="01/01/2021" name="date" type="date" class="flex-shrink md:flex-shrink-0  appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Date">
								</div>
								<div x-show.transition.in="step === 2 && role==='et'">
									<label for="classe" class="sr-only">Classe</label>
									<input id="classe" name="classe" type="classe" class="flex-shrink md:flex-shrink-0  appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Classe">
								</div>
								<div x-show.transition.in="step === 2 && (role==='ju' || role==='tu')">
									<label for="statut" class="sr-only">Statut</label>
									<input id="statut" name="statut"  class="flex-shrink md:flex-shrink-0  appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Statut">
								</div>
							</div>
							<div>
								<label for="tel" class="sr-only">Telephone</label>
								<input id="tel" name="telUser" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Téléphone">
							</div>
						</div>
						<div x-show.transition.in="step === 2 && role==='en'" class="space-y-4">
							<div>
								<label for="tel" class="sr-only">Telephone</label>
								<input id="tel" name="telEntreprise" type="tel" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Téléphone">
							</div>
							<div>
								<label for="ville" class="sr-only">Ville</label>
								<input id="ville" name="ville"  class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Ville">
							</div>
							<div>
								<label for="rue" class="sr-only">Nom rue</label>
								<input id="rue" name="rue" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Nom rue">
							</div>
							<div class="rounded-md grid grid-flow-col auto-cols-max flex justify-between">
								<div>
									<label for="noRue" class="sr-only">noRue</label>
									<input id="noRue" name="noRue" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Numéro rue">
								</div>
								<div>
									<label for="cp" class="sr-only">Code postal</label>
									<input id="cp" name="cp" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Code postal">
								</div>
							</div>
						</div>

					</div>
					<div>
						<button @click="step=2" type="button" x-show="step===1" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
							<span class="absolute left-0 inset-y-0 flex items-center pl-3">
								<!-- Heroicon name: lock-closed -->
								<svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
									<path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
								</svg>
							</span>
							Continuez
						</button>
						<button type="submit" x-show="step===2" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
							<span class="absolute left-0 inset-y-0 flex items-center pl-3">
								<!-- Heroicon name: lock-closed -->
								<svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
									<path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
								</svg>
							</span>
							S'enregistrez
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

<script>
	role = null;

	function app() {
		return {
			step: 1,
		}
	}

	function select(config) {
		return {
			data: config.data,
			emptyOptionsMessage: config.emptyOptionsMessage ?? 'Aucun résultats pour votre recherche.',
			focusedOptionIndex: null,
			name: config.name,
			open: false,
			options: {},
			placeholder: config.placeholder ?? 'Selectionnez un rôle',
			search: '',
			value: config.value,

			closeListbox: function() {
				this.open = false

				this.focusedOptionIndex = null

				this.search = ''
			},

			focusNextOption: function() {
				if (this.focusedObjectIndex === null) return this.focusedObjectIndex = Object.keys(this.options).length - 1

				if (this.focusedOptionIndex + 1 >= Object.keys(this.options).length) return

				this.focusedOptionIndex++

				this.$refs.listbox.children[this.focusedOptionIndex].scrollIntoView({
					block: "center",
				})
			},

			focusPreviousOption: function() {
				if (this.focusedObjectIndex === null) return this.focusedObjectIndex = 0

				if (this.focusedOptionIndex <= 0) return

				this.focusedOptionIndex--

				this.$refs.listbox.children[this.focusedOptionIndex].scrollIntoView({
					block: "center",
				})
			},

			init: function() {
				this.options = this.data

				if (!(this.value in this.options)) this.value = null

				this.$watch('search', ((value) => {
					if (!this.open || !value) return this.options = this.data

					this.options = Object.keys(this.data)
						.filter((key) => this.data[key].toLowerCase().includes(value.toLowerCase()))
						.reduce((options, key) => {
							options[key] = this.data[key]
							return options
						}, {})
				}))
			},

			selectOption: function() {
				if (!this.open) return this.toggleListboxVisibility()

				this.value = Object.keys(this.options)[this.focusedOptionIndex]
				role = this.value
				document.getElementById('role').value = role
				console.log(document.getElementById('role').value)

				this.closeListbox()
			},

			toggleListboxVisibility: function() {
				if (this.open) return this.closeListbox()

				this.focusedOptionIndex = Object.keys(this.options).indexOf(this.value)

				if (this.focusedOptionIndex < 0) this.focusedOptionIndex = 0

				this.open = true

				this.$nextTick(() => {
					this.$refs.search.focus()

					this.$refs.listbox.children[this.focusedOptionIndex].scrollIntoView({
						block: "nearest"
					})
				})
			},
		}
	}
</script>