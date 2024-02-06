<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        <span class="mr-1.5 [&>svg]:h-5 [&>svg]:w-5 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                            <svg width="800px" height="800px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="blue">
                                <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                <path d="M64 64c0-17.7-14.3-32-32-32S0 46.3 0 64V400c0 44.2 35.8 80 80 80H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H80c-8.8 0-16-7.2-16-16V64zm96 288H448c17.7 0 32-14.3 32-32V251.8c0-7.6-2.7-15-7.7-20.8l-65.8-76.8c-12.1-14.2-33.7-15-46.9-1.8l-21 21c-10 10-26.4 9.2-35.4-1.6l-39.2-47c-12.6-15.1-35.7-15.4-48.7-.6L135.9 215c-5.1 5.8-7.9 13.3-7.9 21.1v84c0 17.7 14.3 32 32 32z"></path>
                            </svg>
                        </span>
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('specialties.index')" :active="request()->routeIs('specialties.index')">
                        <span class="mr-1.5 [&>svg]:h-5 [&>svg]:w-5 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                            <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="4" y="4" width="16" height="7" rx="1" stroke="#222222" />
                                <path d="M4 16C4 15.0572 4 14.5858 4.29289 14.2929C4.58579 14 5.05719 14 6 14H10V18C10 18.9428 10 19.4142 9.70711 19.7071C9.41421 20 8.94281 20 8 20H6C5.05719 20 4.58579 20 4.29289 19.7071C4 19.4142 4 18.9428 4 18V16Z" stroke="#222222" />
                                <path d="M14 14H18C18.9428 14 19.4142 14 19.7071 14.2929C20 14.5858 20 15.0572 20 16V18C20 18.9428 20 19.4142 19.7071 19.7071C19.4142 20 18.9428 20 18 20H16C15.0572 20 14.5858 20 14.2929 19.7071C14 19.4142 14 18.9428 14 18V14Z" stroke="#222222" />
                            </svg>
                        </span>
                        {{ __('Structure') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('students.index')" :active="request()->routeIs('students.index')">
                        <span class="mr-1.5 [&>svg]:h-5 [&>svg]:w-5 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                <path style="fill:#F7B239;" d="M323.286,276.612l11.276,74.881l-78.555,117.229l-79.764-137.774l12.484-54.336 c2.586-1.064,5.221-2.03,7.904-2.888c17.379,10.345,37.682,16.279,59.376,16.279s41.985-5.934,59.364-16.279h0.012 C318.065,274.581,320.699,275.548,323.286,276.612z" />
                                <path style="fill:#E09B2D;" d="M323.286,276.612l0.399,38.625l-21.452-2.151c-14.164,6.139-29.791,9.547-46.227,9.547 c-16.424,0-32.063-3.408-46.227-9.547l-27.494-7.517l6.442-28.957c2.586-1.064,5.221-2.03,7.904-2.888 c17.379,10.345,37.682,16.279,59.376,16.279s41.985-5.934,59.364-16.279h0.012C318.065,274.581,320.699,275.548,323.286,276.612z" />
                                <g>
                                    <rect x="405.793" y="9.064" style="fill:#F7B239;" width="12.085" height="72.428" />
                                    <polygon style="fill:#F7B239;" points="395.916,109.893 411.836,46.94 427.755,109.893 	" />
                                </g>
                                <path style="fill:#666666;" d="M256.006,511.988V512H124.238V372.836c0-43.447,26.636-80.67,64.488-96.224l67.28,116.54V511.988z" />
                                <path style="fill:#4D4D4D;" d="M206.804,307.925l-18.077-31.313c-37.852,15.554-64.488,52.777-64.488,96.224V512h59.821V372.836 C184.058,348.281,192.571,325.716,206.804,307.925z" />
                                <g>
                                    <path style="fill:#666666;" d="M387.774,372.836V512H256.006v-0.012V393.152l67.28-116.54 C361.137,292.166,387.774,329.389,387.774,372.836z" />
                                    <polygon style="fill:#666666;" points="171.698,115.699 171.698,9.886 341.474,9.886 341.474,117.289 227.472,117.289  171.698,117.289 	" />
                                </g>
                                <path style="fill:#F7EDCD;" d="M196.63,273.723c-34.105-20.267-56.959-57.49-56.959-100.055c0,0,65.576-49.683,106.86-77.48 c22.008,21.814,85.915,41.997,125.797,77.48c0,42.565-22.854,79.776-56.947,100.055h-0.012 c-17.379,10.345-37.67,16.279-59.364,16.279C234.313,290.002,214.009,284.068,196.63,273.723z" />
                                <path style="fill:#B27214;" d="M199.204,115.223l-13.294-3.626c-19.832,20.872-29.411,26.095-46.239,62.071 c0,0,32.425-7.529,62.083-21.403c19.373-9.064,37.574-20.835,44.777-34.975c-0.004-0.004-0.007-0.007-0.011-0.011 c0.004,0.004,0.007,0.007,0.011,0.011c22.008,21.814,63.388,52.221,125.797,56.379c0-30.455-11.711-58.155-30.854-78.882v-0.012 H225.055L199.204,115.223z" />
                                <path style="fill:#E0D5B8;" d="M286.063,286.063c-9.584,2.562-19.663,3.94-30.057,3.94c-21.693,0-41.997-5.934-59.376-16.279 c-34.105-20.267-56.959-57.49-56.959-100.055c0,0,14.052-22.016,31.736-28.03c9.575-3.256,19.929,11.501,30.347,6.626 c-1.293,6.937-1.97,14.092-1.97,21.403c0,42.565,22.854,79.788,56.959,100.055C265.795,279.113,275.645,283.283,286.063,286.063z" />
                                <rect x="246.93" y="338.199" style="fill:#F7B239;" width="18.128" height="173.789" />
                                <g>
                                    <polygon style="fill:#4D4D4D;" points="341.474,9.886 216.171,9.886 171.698,9.886 171.698,34.854 171.698,93.517 171.698,94.774  186.308,94.774 216.171,94.774 216.171,34.854 341.474,34.854 	" />
                                    <path style="fill:#4D4D4D;" d="M208.305,223.206c-5.007,0-9.064-4.058-9.064-9.064V196.86c0-5.006,4.057-9.064,9.064-9.064 c5.007,0,9.064,4.058,9.064,9.064v17.282C217.369,219.148,213.312,223.206,208.305,223.206z" />
                                    <path style="fill:#4D4D4D;" d="M304.88,223.206c-5.007,0-9.064-4.058-9.064-9.064V196.86c0-5.006,4.057-9.064,9.064-9.064 s9.064,4.058,9.064,9.064v17.282C313.944,219.148,309.887,223.206,304.88,223.206z" />
                                </g>
                                <path style="fill:#666666;" d="M432.683,18.128H79.317c-5.007,0-9.064-4.058-9.064-9.064S74.31,0,79.317,0h353.366 c5.007,0,9.064,4.058,9.064,9.064S437.69,18.128,432.683,18.128z" />
                                <path style="fill:#995C0D;" d="M171.699,94.774L171.699,94.774L171.699,94.774h-1.169c-19.14,20.741-30.859,48.451-30.859,78.894 c0,0,32.425-7.529,62.083-21.403c3.916-21.029,13.499-40.075,27.083-55.496c-0.031-0.046,0.68-0.865,1.696-1.994H171.699z" />
                            </svg>
                        </span>
                        {{ __('Etudiant') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link>
                        <span class="mr-1.5 [&>svg]:h-5 [&>svg]:w-5 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="794.082px" height="794.082px" viewBox="0 0 794.082 794.082" style="enable-background:new 0 0 794.082 794.082;" xml:space="preserve">
                                <g>
                                    <path d="M713.298,186.754h0.003c0,90.051,0,179.204,0,269.796c-119.669,0.52-237.33,0.62-357.021,0.442c0-44.206,0-85.371,0-127.49 c-17.63,0-33.229,0-52.015,0c0,44.361-1.585,86.458,0.541,128.362c1.495,29.475,29.195,51.681,59.068,51.744 c114.688,0.25,229.375,0.143,344.062,0.619c34.097,0.146,60.201-24.021,60.039-60.542c-0.386-87.645-0.106-175.291-0.096-262.936 h0.096v-45.693h-54.678L713.298,186.754L713.298,186.754z" />
                                    <path d="M775.44,72.811c-5.709-1.829-12.212-1.547-18.359-1.557c-57.313-0.103-114.627-0.062-171.938-0.062 c-4.248,0-8.469,0-12.485,0c-1.768-18.784-17.569-33.482-36.814-33.482s-35.052,14.699-36.817,33.482c-4.446,0-9.112,0-13.8,0 c-55.239,0-110.48-0.002-165.728,0.004c-4.833,0.001-9.71-0.352-14.491,0.173c-14.131,1.546-26.798,14.699-26.558,27.161 c0.239,12.377,13.224,25.016,27.354,26.417c3.421,0.34,6.902,0.102,10.354,0.102c147.084,0.003,294.167,0.003,441.25,0.001 c3.455,0,6.929,0.237,10.354-0.082c13.365-1.242,25.063-12.418,26.25-24.873C794.962,90.027,786.329,76.301,775.44,72.811z" />
                                    <path d="M358.014,201.16v-60.099h-54.678v60.099h2.078c17.43,0,33.452,0,50.521,0H358.014z" />
                                    <g>
                                        <circle cx="149.113" cy="113.355" r="89.043" />
                                        <path d="M439.494,215.397H211.476l-11.131,69.235l-10.105,62.865h-13.219l-8.515-96.739l9.972-35.357h-58.729l9.972,35.357 l-8.515,96.739h-13.219L100,297.809l-10.042-62.466l-3.207-19.945H50h-0.125v0.003C22.317,215.468,0,237.825,0,265.398v212.99 c0,27.612,22.386,50,50,50v187.548c0,27.614,22.386,50,50,50c24.416,0,44.731-17.505,49.112-40.646 c4.382,23.142,24.699,40.646,49.115,40.646c27.614,0,50-22.386,50-50V503.403V414.59V315.4h191.269c27.613,0,50-22.387,50-50 C489.494,237.783,467.109,215.397,439.494,215.397z" />
                                    </g>
                                    <path d="M683.544,718.137l0.038-0.039L563.957,598.473v-69.024h-56.055v64.062v4.963L388.278,718.098l0.038,0.039 c-10.936,10.935-10.936,28.663,0,39.598c10.936,10.937,28.663,10.936,39.599,0l79.988-79.988v64.023c0,15.464,12.534,28,28,28 c15.464,0,28-12.536,28-28h0.055v-64.023l79.988,79.988c10.936,10.936,28.663,10.937,39.599,0 C694.479,746.8,694.479,729.072,683.544,718.137z" />
                                </g>
                            </svg>
                        </span>
                        {{ __('Professeur') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('notes.index')" :active="request()->routeIs('notes.index')">
                        <span class="mr-1.5 [&>svg]:h-5 [&>svg]:w-5 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                <path style="fill:#FFFFFF;" d="M372.809,508H94.315c-15.735-0.04-28.477-12.783-28.517-28.517V32.517 C65.838,16.782,78.581,4.04,94.315,4h323.378c15.735,0.04,28.477,12.783,28.517,28.517v402.306" />
                                <path style="fill:#0000ff;" d="M372.817,512H94.315c-17.95-0.024-32.501-14.575-32.517-32.525V32.517 C61.814,14.567,76.365,0.024,94.315,0h323.378c17.95,0.024,32.485,14.567,32.509,32.517v402.298h-7.999V32.517 C442.179,18.99,431.22,8.023,417.685,7.999H94.315C80.78,8.015,69.813,18.982,69.797,32.517v446.958 c0.016,13.535,10.983,24.502,24.518,24.518h278.51V512H372.817z" />
                                <path style="fill:#0000ff;" d="M372.809,450.246v61.706l77.129-77.129h-61.682C379.744,434.839,372.841,441.727,372.809,450.246z" />
                                <g>
                                    <path style="fill:#0000ff;" d="M188.762,308.603l-19.198,63.138h-41.948l71.393-222.787H250.9l72.393,222.787H279.65 l-20.182-63.138H188.762z M252.556,277.862l-17.518-54.867c-4.296-13.543-7.935-28.757-11.199-41.644h-0.664 c-3.304,12.887-6.615,28.429-10.575,41.644l-17.19,54.867H252.556z" />
                                    <path style="fill:#0000ff;" d="M350.659,147.53v40.388h38.78v13.935h-38.78v40.748h-14.663v-40.748h-38.772v-13.935h38.78V147.53 H350.659z" />
                                </g>
                            </svg>
                        </span>
                        {{ __('Les Notes') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>