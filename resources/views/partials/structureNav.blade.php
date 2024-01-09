<div class="flex justify-between mb-5 items-center">
    <div class="flex items-center">
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex uppercase p-3">
            <x-nav-link :href="route('levels.index')" :active="request()->routeIs('levels.index')">
                {{ __('Niveau') }}
            </x-nav-link>
        </div>
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex uppercase p-3">
            <x-nav-link :href="route('specialties.index')" :active="request()->routeIs('specialties.index')">
                {{ __('Specialité') }}
            </x-nav-link>
        </div>
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex uppercase p-3">
            <x-nav-link :href="route('uniteEseignements.index')" :active="request()->routeIs('uniteEseignements.index')">
                {{ __('Unité Denseignement') }}
            </x-nav-link>
        </div>
        <div class="sm:ms-10" data-te-dropdown-ref>
            <button class="flex items-center whitespace-nowrap rounded bg-primary-100 px-6 pb-1 pt-1.5 text-xs font-medium uppercase leading-normal text-neutral-800 shadow-[0_4px_9px_-4px_#fbfbfb] transition duration-150 ease-in-out hover:bg-neutral-100 hover:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] focus:bg-neutral-100 focus:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] focus:outline-none focus:ring-0 active:bg-neutral-200 active:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] motion-reduce:transition-none" type="button" id="dropdownMenuButton9" data-te-dropdown-toggle-ref aria-expanded="false" data-te-ripple-init>
                Affectation
                <span class="ml-2 w-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                    </svg>
                </span>
            </button>
            <ul class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block" aria-labelledby="dropdownMenuButton9" data-te-dropdown-menu-ref>
                <li>
                    <x-nav-link :href="route('specialty_ue.index')" :active="request()->routeIs('specialty_ue.index')" class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600" data-te-dropdown-item-ref>
                        UE au Specialité
                    </x-nav-link>
                </li>
                <!-- <li>
                    <x-nav-link :href="route('ue_cours.index')" :active="request()->routeIs('ue_cours.index')" class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600" data-te-dropdown-item-ref>
                        Cours au UE
                    </x-nav-link>
                </li> -->
            </ul>
        </div>
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex uppercase p-3">
            <x-nav-link :href="route('cours.index')" :active="request()->routeIs('cours.index')">
                {{ __('Cours') }}
            </x-nav-link>
        </div>

    </div>
    <div wire:loading>
        <!-- <progress max="100" wire:loading.progress="progress"></progress> -->

        <div role="status">
            <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor" />
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill" />
            </svg>
            <span class="sr-only">Loading...</span>
        </div>

    </div>
</div>