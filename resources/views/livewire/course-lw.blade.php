<div class="bg-white  overflow-x-hidden overflow-y-visible shadow-sm sm:rounded-lg relative">
    <div wire:loading class="absolute right-6 top-6">
        <div role="status">
            <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor" />
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill" />
            </svg>
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <div class="p-6 text-gray-900">
        <div class="border-b mb-2">
            <h2 class="font-bold uppercase text-xl text-gray-800 text-center mb-4 textwrap-none">
                {{ __('Element Constitutif') }}
            </h2>
        </div>
        <!--Tabs content-->
        <div class="mb-6">
            <x-notify::notify />
            <!-- <div> <label for="">{{ $sql }}</label></div> -->
            <!-- Add Specialty -->
            <div class="mb-2 flex justify-between items-center">
                <!-- Button trigger vertically centered modal-->
                <button type="button" class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" data-te-toggle="modal" data-te-target="#exampleModalCenter" data-te-ripple-init data-te-ripple-color="light">
                    Ajouter
                </button>

                <div class="flex justify-end items-center">

                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="justify-between mx-1 border-2 text-neutral-900 bg-white hover:bg-slate-50 focus:outline-none  font-medium rounded-lg text-sm px-3 py-1.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                        <span class="[&>svg]:h-5 [&>svg]:w-5 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                            <svg width="800px" height="800px" viewBox="-5 -2 24 24" fill="#9CA3AF" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 2.5H15M3 7.5H12M5 12.5H10" stroke="#000000" />
                            </svg>
                        </span>
                        <span class="mx-2.5">Filtrer</span>
                        <svg class="w-2.5 h-2.5 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="#9CA3AF" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div wire:ignore id="dropdown" class="z-10 !visible hidden bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-60 dark:bg-gray-700">
                        <ul class="text-start py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <h2 class="mb-0" id="headingTwo">
                                    <button class="group relative flex w-full items-center rounded-none border-0 bg-white px-3 py-2 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400 dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)]" type="button" data-te-collapse-init data-te-collapse-collapsed data-te-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Specialité
                                        <span class="-mr-1 ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:mr-0 group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </span>
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="!visible" data-te-collapse-item aria-labelledby="headingTwo" data-te-parent="#accordionExample">
                                    <div class="">
                                        <ul class="overflow-auto h-52 w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                            <!-- <form action="{{ route('cours.index') }}" method='get'>
                                                @csrf
                                                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                                    <div class="flex items-center pl-3 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                        <input type="radio" name="all" id="radio" value="some_value" onclick="this.form.submit()" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                        <label for="radio" class="ms-2 py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 uppercase">Tout</label>
                                                    </div>
                                                </li>
                                            </form> -->
                                            @foreach($specialties as $specialty)
                                            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                                <div>
                                                    <div class="flex items-center pl-3 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                        <input id="{{ $specialty->id }}" type="radio" wire:model="specialty" wire:click="fs" value="{{ $specialty->id }}" name="{{ $specialty->name }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                        <label for="{{ $specialty->id }}" class="ms-2 py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $specialty->name }}</label>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            
                            <hr class=" h-0 border border-t-0 border-solid border-neutral-700 opacity-25 dark:border-neutral-200" />
                            <li>
                                <h2 class="mb-0" id="headingFour">
                                    <button class="group relative flex w-full items-center rounded-none border-0 bg-white px-3 py-2 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400 dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)]" type="button" data-te-collapse-init data-te-collapse-collapsed data-te-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        Niveau
                                        <span class="-mr-1 ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:mr-0 group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </span>
                                    </button>
                                </h2>
                                <div id="collapseFour" class="!visible hidden" data-te-collapse-item aria-labelledby="headingFour" data-te-parent="#accordionExample1">
                                    <div class="">
                                        <ul class="w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                            @foreach($levels as $level)
                                            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                                <div>

                                                    <div class="flex items-center pl-3 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                        <input id="{{ $level->id }}" type="radio" wire:model="level" wire:click="fs" value="{{ $level->id }}" name="{{ $level->name }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                        <label for="{{ $level->id }}" class="ms-2 py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 uppercase">Niveau {{ $level->name }}</label>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>

                    <div>
                        <input wire:model="search" wire:change="nf" type="search" class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:border-0 focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary" id="exampleSearch" placeholder="Rechercher" />
                    </div>

                    <div class="ml-1 inline-flex rounded-md shadow-sm" role="group">

                        <!-- <a href="{{ route('students.pdf') }}" target="_blank"> -->
                        <button type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-500 focus:z-10 focus:ring-2 focus:ring-blue-500 focus:text-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                            <span class="mr-0 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                <svg width="800px" height="800px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.29 1H3v11h1V2h10v6h6v14H4v-3H3v4h18V6.709zM20 7h-5V2h.2L20 6.8zm-4.96 11l2.126-5H16.08l-1.568 3.688L12.966 13h-1.084l2.095 5zM7 14.349v.302A1.35 1.35 0 0 0 8.349 16H9.65a.349.349 0 0 1 .349.349v.302A.349.349 0 0 1 9.65 17H7v1h2.651A1.35 1.35 0 0 0 11 16.651v-.302A1.35 1.35 0 0 0 9.651 15H8.35a.349.349 0 0 1-.35-.349v-.302A.349.349 0 0 1 8.349 14H11v-1H8.349A1.35 1.35 0 0 0 7 14.349zm-5 .692v.918A2.044 2.044 0 0 0 4.041 18H6v-1H4.041A1.042 1.042 0 0 1 3 15.959v-.918A1.042 1.042 0 0 1 4.041 14H6v-1H4.041A2.044 2.044 0 0 0 2 15.041z" />
                                    <path fill="none" d="M0 0h24v24H0z" />
                                </svg>
                            </span>
                        </button>
                        <!-- </a> -->
                        <button type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-500 focus:z-10 focus:ring-2 focus:ring-blue-500 focus:text-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                            <span class="mr-0 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 309.529 309.529" style="enable-background:new 0 0 309.529 309.529;" xml:space="preserve">
                                    <g>
                                        <path style="fill:#3DB39E;" d="M179.728,251.279c0-39.586,32.096-71.682,71.682-71.682c6.698,0,13.173,0.995,19.329,2.716V86.711
		L183.69,0H19.46C8.79,0,0.13,8.65,0.13,19.329v270.609c0,10.679,8.659,19.329,19.329,19.329h189.929
		C191.441,296.239,179.728,275.161,179.728,251.279z" />
                                        <path style="fill:#2F8A78;" d="M270.46,86.981h-67.372c-10.67,0-19.329-8.659-19.329-19.329V0.193L270.46,86.981z" />
                                        <path style="fill:#3DB39E;" d="M251.41,193.553c32.028,0,57.988,25.969,57.988,57.988c0,32.009-25.959,57.988-57.988,57.988
		c-32.009,0-57.988-25.978-57.988-57.988C193.422,219.522,219.401,193.553,251.41,193.553z" />
                                        <path style="fill:#FFFFFF;" d="M270.74,241.876h-9.665v-9.665c0-5.345-4.32-9.665-9.665-9.665c-5.345,0-9.665,4.32-9.665,9.665
		v9.665h-9.665c-5.345,0-9.665,4.32-9.665,9.665c0,5.354,4.32,9.665,9.665,9.665h9.665v9.665c0,5.354,4.32,9.665,9.665,9.665
		c5.344,0,9.665-4.31,9.665-9.665v-9.665h9.665c5.345,0,9.665-4.31,9.665-9.665C280.404,246.206,276.085,241.876,270.74,241.876z" />
                                        <path style="fill:#8BD1C5;" d="M183.758,228.026v-5.741h2.252c1.508-3.373,3.267-6.601,5.258-9.665h-7.509V193.3h19.329v5.422
		c3.006-2.754,6.224-5.258,9.665-7.471V125.64H58.118v125.64h121.619C179.776,243.123,181.216,235.333,183.758,228.026z
		 M183.758,135.304h19.329v19.329h-19.329V135.304z M183.758,164.308h19.329v19.32h-19.329V164.308z M87.112,241.625H67.783v-19.339
		h19.329V241.625z M87.112,212.621H67.783v-19.32h19.329V212.621z M87.112,183.627H67.783v-19.32h19.329V183.627z M87.112,154.634
		H67.783v-19.329h19.329V154.634z M116.106,241.625h-19.33v-19.339h19.329L116.106,241.625L116.106,241.625z M116.106,212.621
		h-19.33v-19.32h19.329L116.106,212.621L116.106,212.621z M116.106,183.627h-19.33v-19.32h19.329L116.106,183.627L116.106,183.627z
		 M116.106,154.634h-19.33v-19.329h19.329L116.106,154.634L116.106,154.634z M145.099,241.625H125.77v-19.339h19.329V241.625z
		 M145.099,212.621H125.77v-19.32h19.329V212.621z M145.099,183.627H125.77v-19.32h19.329V183.627z M145.099,154.634H125.77v-19.329
		h19.329V154.634z M174.093,241.625h-19.329v-19.339h19.329V241.625z M174.093,212.621h-19.329v-19.32h19.329V212.621z
		 M174.093,183.627h-19.329v-19.32h19.329V183.627z M154.764,154.634v-19.329h19.329v19.329H154.764z" />
                                    </g>
                                </svg>

                            </span>
                        </button>
                        <button wire:click="ues_list" type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-500 focus:z-10 focus:ring-2 focus:ring-blue-500 focus:text-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                            <span class="mr-0 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 309.529 309.529" style="enable-background:new 0 0 309.529 309.529;" xml:space="preserve">
                                    <g>
                                        <path style="fill:#E2574C;" d="M179.728,251.279c0-39.586,32.096-71.682,71.682-71.682c6.698,0,13.173,0.995,19.329,2.716V86.711
		L183.69,0H19.46C8.79,0,0.13,8.65,0.13,19.329v270.609c0,10.679,8.659,19.329,19.329,19.329h189.929
		C191.441,296.239,179.728,275.161,179.728,251.279z" />
                                        <path style="fill:#B53629;" d="M270.46,86.981h-67.372c-10.67,0-19.329-8.659-19.329-19.329V0.193L270.46,86.981z" />
                                        <path style="fill:#3DB39E;" d="M251.41,193.553c32.028,0,57.988,25.969,57.988,57.988c0,32.009-25.959,57.988-57.988,57.988
		c-32.009,0-57.988-25.978-57.988-57.988C193.422,219.522,219.401,193.553,251.41,193.553z" />
                                        <path style="fill:#FFFFFF;" d="M270.74,241.876h-9.665v-9.665c0-5.345-4.32-9.665-9.665-9.665c-5.345,0-9.665,4.32-9.665,9.665
		v9.665h-9.665c-5.345,0-9.665,4.32-9.665,9.665c0,5.354,4.32,9.665,9.665,9.665h9.665v9.665c0,5.354,4.32,9.665,9.665,9.665
		c5.344,0,9.665-4.31,9.665-9.665v-9.665h9.665c5.345,0,9.665-4.31,9.665-9.665C280.404,246.206,276.085,241.876,270.74,241.876z" />
                                        <path style="fill:#FFFFFF;" d="M198.235,146.544c3.238,0,4.823-2.822,4.823-5.557c0-2.832-1.653-5.567-4.823-5.567h-18.44
		c-3.605,0-5.615,2.986-5.615,6.282v45.317c0,4.04,2.3,6.282,5.412,6.282c3.093,0,5.403-2.242,5.403-6.282v-12.438h11.153
		c3.46,0,5.19-2.832,5.19-5.644c0-2.754-1.73-5.49-5.19-5.49h-11.153v-16.903C184.995,146.544,198.235,146.544,198.235,146.544z
		 M135.908,135.42h-13.492c-3.663,0-6.263,2.513-6.263,6.243v45.395c0,4.629,3.74,6.079,6.417,6.079h14.159
		c16.758,0,27.824-11.027,27.824-28.047C164.545,147.095,154.126,135.42,135.908,135.42z M136.556,181.946h-8.225v-35.334h7.413
		c11.221,0,16.101,7.529,16.101,17.918C151.845,174.253,147.052,181.946,136.556,181.946z M87.131,135.42H73.765
		c-3.779,0-5.886,2.493-5.886,6.282v45.317c0,4.04,2.416,6.282,5.663,6.282s5.663-2.242,5.663-6.282v-13.231h8.379
		c10.341,0,18.875-7.326,18.875-19.107C106.46,143.152,98.226,135.42,87.131,135.42z M86.909,163.158h-7.703v-17.097h7.703
		c4.755,0,7.78,3.711,7.78,8.553C94.679,159.447,91.664,163.158,86.909,163.158z" />
                                    </g>
                                </svg>
                            </span>
                        </button>

                    </div>
                </div>
            </div>

            <div class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block" id="tabs-home" role="tabpanel" aria-labelledby="tabs-home-tab" data-te-tab-active>
                <!-- Specialty List -->
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-hidden border rounded">
                                <table class="min-w-full text-center text-sm font-light">
                                    <thead class="border-b font-medium dark:border-neutral-500">
                                        <tr>
                                            <th scope="col" class="px-4 py-2 border">#</th>
                                            <th scope="col" class="px-4 py-2 border">Name</th>
                                            <th scope="col" class="px-4 py-2 border">Code</th>
                                            <th scope="col" class="px-4 py-2 border">Unite D'enseignement</th>
                                            <th scope="col" class="px-4 py-2 border">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($count = 1)
                                        @php($credit_sum = 0)
                                        @forelse($courses as $course)
                                        <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-300 dark:border-neutral-300 dark:hover:bg-neutral-200 bg-neutral-100 even:bg-neutral-200">
                                            <td class="whitespace-nowrap px-4 py-2 border font-medium">{{ $count }}</td>
                                            <td class="whitespace-nowrap px-4 py-2 border">{{ $course->name }} | Credit {{ $course->credit_points }}</td>
                                            @php($credit_sum = $credit_sum + $course->credit_points)
                                            <td class="whitespace-nowrap px-4 py-2 border">{{ $course->code }}</td>
                                            <td class="whitespace-nowrap px-4 py-2 border">{{ $course->ue->code }} | {{ $course->ue->name }} | Credit {{ $course->ue->credit_points }}</td>
                                            <td class="whitespace-nowrap px-4 py-2 flex justify-center items-center">
                                                <button type="button" wire:click.prevent='setDeleteId({{ $course->id }})' class="flex justify-center items-center font-medium text-red-600 dark:text-red-500 hover:underline" data-te-toggle="modal" data-te-target="#deleteModal">
                                                    <span class="mr-0 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                                        <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M7 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2h4a1 1 0 1 1 0 2h-1.069l-.867 12.142A2 2 0 0 1 17.069 22H6.93a2 2 0 0 1-1.995-1.858L4.07 8H3a1 1 0 0 1 0-2h4V4zm2 2h6V4H9v2zM6.074 8l.857 12H17.07l.857-12H6.074zM10 10a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1zm4 0a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1z" fill="#FF0000" />
                                                        </svg>
                                                    </span>
                                                    <span></span>
                                                </button>

                                                <!-- <button wire:click="$emit('openModal', 'mymodal')">Open Modal</button> -->
                                                <!-- <button wire:click="$dispatch('openModal', {component: 'mymodal'})">click</button> -->
                                                <button class="edit mx-2 font-medium text-blue-600 dark:text-red-500 hover:underline" data-te-toggle="modal" id="btnModal" data-te-id="{{ $course->id }}" data-te-name="{{ $course->name }}" data-te-code="{{ $course->code }}" data-te-cp="{{ $course->credit_points }}" data-te-level="{{ $course->level_id }}" data-te-semester="{{ $course->semester_id }}" data-te-target="#updateModal">
                                                    <span class="mr-0 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                                        <svg fill="#000000" width="800px" height="800px" viewBox="0 0 24 24" id="edit" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color">
                                                            <path id="secondary" d="M21,22H3a1,1,0,0,1,0-2H21a1,1,0,0,1,0,2Z" style="fill: rgb(44, 169, 188);"></path>
                                                            <path id="primary" d="M20.71,3.29a2.93,2.93,0,0,0-2.2-.84,3.25,3.25,0,0,0-2.17,1L7.46,12.29a1.16,1.16,0,0,0-.25.43L6,16.72A1,1,0,0,0,7,18a.9.9,0,0,0,.28,0l4-1.17a1.16,1.16,0,0,0,.43-.25l8.87-8.88a3.25,3.25,0,0,0,1-2.17A2.91,2.91,0,0,0,20.71,3.29Z" style="fill: #0000FF;"></path>
                                                        </svg>
                                                    </span>
                                                </button>
                                                <button class="font-medium text-blue-600 dark:text-red-500 hover:underline">
                                                    <span class="mr-0 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                                        <svg width="800px" height="800px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill="#4A4A4A" fill-rule="evenodd" d="M2.5,7.5 C3.88071187,7.5 5,8.61928813 5,10 C5,11.3807119 3.88071187,12.5 2.5,12.5 C1.11928813,12.5 0,11.3807119 0,10 C0,8.61928813 1.11928813,7.5 2.5,7.5 Z M17.5,7.5 C18.8807119,7.5 20,8.61928813 20,10 C20,11.3807119 18.8807119,12.5 17.5,12.5 C16.1192881,12.5 15,11.3807119 15,10 C15,8.61928813 16.1192881,7.5 17.5,7.5 Z M10.226404,7.5 C11.6071159,7.5 12.726404,8.61928813 12.726404,10 C12.726404,11.3807119 11.6071159,12.5 10.226404,12.5 C8.84569215,12.5 7.72640403,11.3807119 7.72640403,10 C7.72640403,8.61928813 8.84569215,7.5 10.226404,7.5 Z" />
                                                        </svg>
                                                    </span>
                                                </button>

                                            </td>
                                        </tr>
                                        @php($count = $count + 1)
                                        @empty
                                        <tr>
                                            <td colspan="4" class="whitespace-nowrap px-4 py-2 border">Aucun cours trouvable</td>
                                        </tr>
                                        @endforelse
                                        <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-300 dark:border-neutral-300 dark:hover:bg-neutral-200 bg-neutral-100 even:bg-neutral-200">
                                            <td></td>
                                            <td colspan="" class="whitespace-nowrap px-4 py-2 border">
                                                Credit total {{ $credit_sum }}
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                <!--Create modal-->
                <div wire:ignore data-te-modal-init class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
                    <div data-te-modal-dialog-ref class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
                        <div class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                            <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                                <!--Modal title-->
                                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalCenterTitle">
                                    ELEMENT CONSTITUTIF
                                </h5>
                                <!--Close button-->
                                <button type="button" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>

                            <!--Modal body-->
                            <form method="POST" action="">
                                @csrf
                                <div class="relative p-4">
                                    <div class="grid grid-cols-2 gap-3">
                                        <!-- Specialty Name -->
                                        <div class="relative mb-3" data-te-input-wrapper-init>
                                            <input name="name" type="text" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="exampleFormControlInput1" placeholder="Example label" />
                                            <label for="exampleFormControlInput1" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Intitule
                                            </label>
                                        </div>
                                        <!-- Code -->
                                        <div class="relative mb-3" data-te-input-wrapper-init>
                                            <input name="code" type="text" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="exampleFormControlInput1" placeholder="Example label" />
                                            <label for="exampleFormControlInput1" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Code
                                            </label>
                                        </div>
                                        <!-- Credit Points -->
                                        <div class="relative mb-3" data-te-input-wrapper-init>
                                            <input name="credit_point" type="number" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="exampleFormControlInput1" placeholder="Example label" />
                                            <label for="exampleFormControlInput1" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Credit
                                            </label>
                                        </div>
                                        <!-- Type -->
                                        <select name="course_nature" data-te-select-init data-te-select-option-height="52" data-te-select-placeholder="Type de Cours">
                                            <option value="Matiere Fondamental" data-te-select-secondary-text="Tronc Commun">
                                                Matiere Fondamental
                                            </option>
                                            <option value="Matiere de Specialité" data-te-select-secondary-text="">
                                                Matiere de Specialité
                                            </option>
                                            <option value="Matiere Transversal" data-te-select-secondary-text="Tronc Commun">
                                                Matiere Transversal
                                            </option>
                                        </select>

                                        <!-- Cost/Hour -->
                                        <div class="relative mb-3" data-te-input-wrapper-init>
                                            <input name="cost_per_hour" type="number" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="exampleFormControlInput1" placeholder="Example label" />
                                            <label for="exampleFormControlInput1" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Coût par heure
                                            </label>
                                        </div>
                                        <!-- Hourly Rate -->
                                        <div class="relative mb-3" data-te-input-wrapper-init>
                                            <input name="duration" type="number" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="exampleFormControlInput1" placeholder="Example label" />
                                            <label for="exampleFormControlInput1" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Heur Total
                                        </div>
                                        <!-- Level -->
                                        <select name="level" data-te-select-init data-te-select-placeholder="Niveau">
                                            @isset($levels)
                                            @foreach($levels as $level)
                                            <option value="{{ $level->id }}">Niveau {{ $level->name }}</option>
                                            @endforeach
                                            @endisset
                                        </select>
                                        <!-- Semester -->
                                        <select name="semester" data-te-select-init data-te-select-placeholder="Semester">
                                            @isset($semesters)
                                            @foreach($semesters as $semester)
                                            <option value="{{ $semester->id }}">Semestre {{ $semester->name }}</option>
                                            @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                    <!-- UE -->
                                    <div class="mt-3">
                                        <select name="ue_id" data-te-select-init data-te-select-filter="true" data-te-select-placeholder="Unite Denseignement">
                                            @isset($uees)
                                            @foreach($uees as $uee)
                                            <option value="{{ $uee->id }}">{{ $uee->code }} | {{ $uee->name }}</option>
                                            @endforeach
                                            @endisset
                                        </select>
                                    </div>

                                    <!-- Description -->
                                    <div class="relative my-3" data-te-input-wrapper-init>
                                        <textarea name="description" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="exampleFormControlTextarea1" rows="3" placeholder="Your message"></textarea>
                                        <label for="exampleFormControlTextarea1" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Description
                                        </label>
                                    </div>
                                </div>

                                <!--Modal footer-->
                                <div class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                                    <button type="button" class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200" data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                                        Fermer
                                    </button>
                                    <button type="submit" class="ml-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" data-te-ripple-init data-te-ripple-color="light">
                                        Ajouter
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Delete modal -->
                <div wire:ignore data-te-modal-init class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div data-te-modal-dialog-ref class="pointer-events-none absolute right-7 h-auto w-full translate-x-[100%] opacity-0 transition-all duration-300 ease-in-out max-[576px]:right-auto min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                        <div class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                            <div class="flex flex-shrink-0 items-center justify-between rounded-t-md bg-danger p-2 dark:border-b dark:border-neutral-500 dark:bg-transparent">
                                <h5 class="text-xl font-medium leading-normal text-white" id="deleteModalLabel">
                                    Supprimer Ce Cours
                                </h5>
                                <button type="button" class="box-content rounded-none border-none text-white hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            <div class="relative flex flex-auto p-2 items-center" data-te-modal-body-ref>
                                <span class="text-info-600 [&>svg]:h-16 [&>svg]:w-20">
                                    <svg fill="#000000" width="800px" height="800px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.755,20.283,4,8H20L18.245,20.283A2,2,0,0,1,16.265,22H7.735A2,2,0,0,1,5.755,20.283ZM21,4H16V3a1,1,0,0,0-1-1H9A1,1,0,0,0,8,3V4H3A1,1,0,0,0,3,6H21a1,1,0,0,0,0-2Z" />
                                    </svg>
                                </span>
                                <div class="ml-6">
                                    <p class="my-2">
                                        Etes-vous sûr de vouloir supprimer ce cours?
                                    </p>
                                    <p class="my-2">
                                        Si vous supprimez ce cours, toutes ses informations seront supprimées
                                    </p>
                                </div>
                            </div>
                            <div class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-2 dark:border-opacity-50">
                                <button type="button" class="mr-2 inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200" data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                                    Non
                                </button>
                                <button type="button" wire:click='deleteCourse' class="inline-block rounded bg-danger px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#54b4d3] transition duration-150 ease-in-out hover:bg-danger hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:bg-danger focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:outline-none focus:ring-0 active:bg-danger active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(84,180,211,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)]" data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                                    Oui
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Update modal-->
                <div wire:ignore data-te-modal-init class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-modal="true" role="dialog">
                    <div data-te-modal-dialog-ref class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
                        <div class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                            <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                                <!--Modal title-->
                                <h5 class="text-xl uppercase font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="updateModalLabel">
                                    MODIFIER L'ELEMENT CONSTITUTIF
                                </h5>
                                <!--Close button-->
                                <button type="button" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>

                            <!--Modal body-->
                            <form id="updateForm" method="POST" action="{{ route('cours.updateCo') }}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" id="id">
                                <div class="relative p-4">
                                    <div class="grid grid-cols-2 gap-3">
                                        <!-- Specialty Name -->
                                        <div class="relative mb-3" data-te-input-wrapper-init>
                                            <input name="upName" id="name" type="text" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="exampleFormControlInput1" placeholder="Example label" />
                                            <label for="exampleFormControlInput1" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Intitule
                                            </label>
                                        </div>
                                        <!-- Code -->
                                        <div class="relative mb-3" data-te-input-wrapper-init>
                                            <input name="upCode" id="code" type="text" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="exampleFormControlInput1" placeholder="Example label" />
                                            <label for="exampleFormControlInput1" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Code
                                            </label>
                                        </div>
                                        <!-- Credit Points -->
                                        <div class="relative mb-3" data-te-input-wrapper-init>
                                            <input name="upCredit_point" id="credit_point" type="number" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="exampleFormControlInput1" placeholder="Example label" />
                                            <label for="exampleFormControlInput1" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Credit
                                            </label>
                                        </div>
                                        <!-- Type -->
                                        <select name="upCourse_nature" id="course_nature" data-te-select-init data-te-select-option-height="52" data-te-select-placeholder="Type de Cours">
                                            <option value="Matiere Fondamental" data-te-select-secondary-text="Tronc Commun">
                                                Matiere Fondamental
                                            </option>
                                            <option value="Matiere de Specialité" data-te-select-secondary-text="">
                                                Matiere de Specialité
                                            </option>
                                            <option value="Matiere Transversal" data-te-select-secondary-text="Tronc Commun">
                                                Matiere Transversal
                                            </option>
                                        </select>

                                        <!-- Cost/Hour -->
                                        <div class="relative mb-3" data-te-input-wrapper-init>
                                            <input name="cost_per_hour" type="number" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="exampleFormControlInput1" placeholder="Example label" />
                                            <label for="exampleFormControlInput1" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Coût par heure
                                            </label>
                                        </div>
                                        <!-- Hourly Rate -->
                                        <div class="relative mb-3" data-te-input-wrapper-init>
                                            <input name="duration" type="number" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="exampleFormControlInput1" placeholder="Example label" />
                                            <label for="exampleFormControlInput1" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Heur Total
                                        </div>
                                        <!-- Level -->
                                        <select name="upLevel" id="level" data-te-select-init data-te-select-placeholder="Niveau">
                                            @isset($levels)
                                            @foreach($levels as $level)
                                            <option value="{{ $level->id }}">Niveau {{ $level->name }}</option>
                                            @endforeach
                                            @endisset
                                        </select>
                                        <!-- Semester -->
                                        <select name="upSemester" id="semester" data-te-select-init data-te-select-placeholder="Semester">
                                            @isset($semesters)
                                            @foreach($semesters as $semester)
                                            <option value="{{ $semester->id }}">Semestre {{ $semester->name }}</option>
                                            @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                    <!-- UE -->
                                    <div class="mt-3">
                                        <select name="upue_id" data-te-select-init data-te-select-filter="true" data-te-select-placeholder="Unite Denseignement">
                                            @isset($uees)
                                            @foreach($uees as $uee)
                                            <option value="{{ $uee->id }}">{{ $uee->code }} | {{ $uee->name }}</option>
                                            @endforeach
                                            @endisset
                                        </select>
                                    </div>

                                    <!-- Description -->
                                    <div class="relative my-3" data-te-input-wrapper-init>
                                        <textarea name="upDescription" id="description" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="exampleFormControlTextarea1" rows="3" placeholder="Your message"></textarea>
                                        <label for="exampleFormControlTextarea1" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Description
                                        </label>
                                    </div>
                                </div>

                                <!--Modal footer-->
                                <div class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                                    <button type="button" class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200" data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                                        Fermer
                                    </button>
                                    <button type="submit" class="ml-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" data-te-ripple-init data-te-ripple-color="light">
                                        Appliquer
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div>
                    {{ $courses->links() }}
                </div>
            </div>
        </div>
    </div>
</div>