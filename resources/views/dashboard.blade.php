<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} 
        </h2>
        @include ('partials.div')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 pb-6 text-gray-900">
                    <div class="mt-0 mb-0">
                        <div class="grid grid-cols-5 grid-rows-1">
                            <div class="mr-4 hover:cursor-pointer block hover:bg-slate-50 rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                                <div class="h-full p-3 flex flex-col items-center justify-evenly">
                                    <div class="flex justify-center">
                                        <span class="[&>svg]:h-5 [&>svg]:w-5 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                            <svg xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" version="1.1" width="320" height="448" viewBox="0 0 320 448" id="svg2" inkscape:version="0.91 r13725" sodipodi:docname="user.svg">
                                                <title id="title3336">user</title>
                                                <metadata id="metadata199">
                                                    <rdf:RDF>
                                                        <cc:Work rdf:about="">
                                                            <dc:format>image/svg+xml</dc:format>
                                                            <dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage" />
                                                            <dc:title>user</dc:title>
                                                        </cc:Work>
                                                    </rdf:RDF>
                                                </metadata>
                                                <defs id="defs197" />
                                                <sodipodi:namedview pagecolor="#ffffff" bordercolor="#666666" borderopacity="1" objecttolerance="10" gridtolerance="10" guidetolerance="10" inkscape:pageopacity="0" inkscape:pageshadow="2" inkscape:window-width="1603" inkscape:window-height="1166" id="namedview195" showgrid="true" inkscape:zoom="1.7383042" inkscape:cx="233.68255" inkscape:cy="226.57553" inkscape:window-x="145" inkscape:window-y="796" inkscape:window-maximized="0" inkscape:current-layer="g4407" inkscape:snap-bbox="true" inkscape:bbox-nodes="true" inkscape:object-nodes="true">
                                                    <inkscape:grid type="xygrid" id="grid4169" spacingx="16" spacingy="16" empspacing="2" />
                                                </sodipodi:namedview>
                                                <g transform="matrix(0.43750932,0,0,0.4375,-64.004988,0)" id="g4407">
                                                    <path id="path4390" style="stroke:none" d="M 512.00049,731.42857 658.28309,512 l 219.4239,0 10e-6,512 -731.413,0 0,-512 219.4239,0 z M 292.576,219.477 C 292.576,98.352 390.78,0 512,0 c 120.976,0 219.424,98.353 219.424,219.477 0,121.173 -98.448,219.38 -219.424,219.38 -121.219,0 -219.424,-98.206 -219.424,-219.38 z" />
                                                </g>
                                            </svg>
                                        </span>
                                        <span></span>
                                    </div>
                                    <span>
                                        <h6 class="text-sm">Utilisateur</h6>
                                    </span>
                                    <div>{{$user_count}}</div>
                                </div>
                            </div>
                            <a href="{{ route('students.index') }}">
                                <div class="mr-4 hover:cursor-pointer block hover:bg-slate-50 rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                                    <div class="h-full p-3 flex flex-col items-center justify-evenly">
                                        <div class="flex justify-center">
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
                                            <span></span>
                                        </div>
                                        <span>
                                            <h6 class="text-sm">Etudiant</h6>
                                        </span>
                                        <div>{{ $count }}</div>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('specialties.index') }}">

                                <div class="mr-4 hover:cursor-pointer block hover:bg-slate-50 rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                                    <div class="h-full p-3 flex flex-col items-center justify-evenly">
                                        <div class="flex justify-center">
                                            <span class="[&>svg]:h-5 [&>svg]:w-5 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                                <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect x="4" y="4" width="16" height="7" rx="1" stroke="#222222" />
                                                    <path d="M4 16C4 15.0572 4 14.5858 4.29289 14.2929C4.58579 14 5.05719 14 6 14H10V18C10 18.9428 10 19.4142 9.70711 19.7071C9.41421 20 8.94281 20 8 20H6C5.05719 20 4.58579 20 4.29289 19.7071C4 19.4142 4 18.9428 4 18V16Z" stroke="#222222" />
                                                    <path d="M14 14H18C18.9428 14 19.4142 14 19.7071 14.2929C20 14.5858 20 15.0572 20 16V18C20 18.9428 20 19.4142 19.7071 19.7071C19.4142 20 18.9428 20 18 20H16C15.0572 20 14.5858 20 14.2929 19.7071C14 19.4142 14 18.9428 14 18V14Z" stroke="#222222" />
                                                </svg>
                                            </span>
                                            <span></span>
                                        </div>
                                        <span>
                                            <h6 class="text-sm">Spécialité</h6>
                                        </span>
                                        <div>{{$specialty_count}}</div>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('uniteEseignements.index') }}">
                                <div class="mr-4 hover:cursor-pointer block hover:bg-slate-50 rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                                    <div class="h-full p-3 flex flex-col items-center justify-evenly">
                                        <div class="flex justify-center">
                                            <span class="[&>svg]:h-5 [&>svg]:w-5 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                                <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect x="4" y="4" width="16" height="7" rx="1" stroke="#222222" />
                                                    <path d="M4 16C4 15.0572 4 14.5858 4.29289 14.2929C4.58579 14 5.05719 14 6 14H10V18C10 18.9428 10 19.4142 9.70711 19.7071C9.41421 20 8.94281 20 8 20H6C5.05719 20 4.58579 20 4.29289 19.7071C4 19.4142 4 18.9428 4 18V16Z" stroke="#222222" />
                                                    <path d="M14 14H18C18.9428 14 19.4142 14 19.7071 14.2929C20 14.5858 20 15.0572 20 16V18C20 18.9428 20 19.4142 19.7071 19.7071C19.4142 20 18.9428 20 18 20H16C15.0572 20 14.5858 20 14.2929 19.7071C14 19.4142 14 18.9428 14 18V14Z" stroke="#222222" />
                                                </svg>
                                            </span>
                                            <span></span>
                                        </div>
                                        <span>
                                            <h6 class="text-sm">Unite D'enseignement</h6>
                                        </span>
                                        <div>{{$ue_count}}</div>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('cours.index') }}">
                                <div class="mr-0 hover:cursor-pointer block hover:bg-slate-50 rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                                    <div class="h-full p-3 flex flex-col items-center justify-evenly">
                                        <div class="flex justify-center">
                                            <span class="[&>svg]:h-5 [&>svg]:w-5 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                                <svg width="800px" height="800px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5 2H9l-.35.15-.65.64-.65-.64L7 2H1.5l-.5.5v10l.5.5h5.29l.86.85h.7l.86-.85h5.29l.5-.5v-10l-.5-.5zm-7 10.32l-.18-.17L7 12H2V3h4.79l.74.74-.03 8.58zM14 12H9l-.35.15-.14.13V3.7l.7-.7H14v9zM6 5H3v1h3V5zm0 4H3v1h3V9zM3 7h3v1H3V7zm10-2h-3v1h3V5zm-3 2h3v1h-3V7zm0 2h3v1h-3V9z" />
                                                </svg>
                                            </span>
                                            <span></span>
                                        </div>
                                        <span>
                                            <h6 class="text-sm">Cours</h6>
                                        </span>
                                        <div>{{$course_count}}</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="py-10">
                        <div class="flex justify-evenly w-full">
                            <div class="w-1/4 overflow-hidden">
                                <div>
                                    <h4 class="text-lg">
                                        Ce semestre
                                    </h4>
                                </div>
                                <canvas data-te-chart="doughnut" data-te-dataset-label="Traffic" data-te-labels="['% Validé', '% Non validé']" data-te-dataset-data="[{{$validated_ue_percent}}, {{$not_validated_ue_percent}}]" data-te-dataset-background-color="['rgb(144,238,144)', 'rgba(255,0,0)']">
                                </canvas>
                            </div>
                            <div class="w-1/2 overflow-hidden">
                                <div>
                                    <h4 class="text-lg h-8">

                                    </h4>
                                </div>
                                <canvas id="chart-options-example"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>