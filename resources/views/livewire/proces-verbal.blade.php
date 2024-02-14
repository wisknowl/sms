<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion Des Notes') }}
        </h2>
        <div class="flex justify-between items-center">
            <div class="">
                <h2 class="text-motion z-1 glow font-semibold text-l text-gray-800 leading-tight">
                    @if (Session::has('year_name')) Année academique {{ Session::get('year_name') }}@endif |
                    @if (Session::has('semester_name')) Semestre {{ Session::get('semester_name') }}@endif
                </h2>
            </div>
            <div class="mx-2.5">
                <button id="dropdownRadioBgHoverButton" data-dropdown-toggle="dropdownRadioBgHover" class="flex items-center whitespace-nowrap rounded bg-primary-100 px-6 pb-1 pt-1.5 text-xs font-medium uppercase leading-normal text-neutral-800 shadow-[0_4px_9px_-4px_#fbfbfb] transition duration-150 ease-in-out hover:bg-neutral-100 hover:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] focus:bg-neutral-100 focus:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] focus:outline-none focus:ring-0 active:bg-neutral-200 active:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] motion-reduce:transition-none" type="button">
                    Changer Année
                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdownRadioBgHover" class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioBgHoverButton">
                        <form action="{{ route('proces_verbal', ['year_id' => Session::get('year_id'), 'semester_id' => Session::get('semester_id')]) }}" method="get">

                            @isset($academic_years)
                            @foreach($academic_years as $academic_year)
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="{{ $academic_year->id }}" type="radio" value="{{ $academic_year->id }}" name="year_id" onclick="this.form.submit()" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="{{ $academic_year->id }}" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">{{ $academic_year->name }}</label>
                                </div>
                            </li>
                            @endforeach
                            @endisset

                        </form>
                    </ul>
                    <div class="p-3" data-te-select-custom-content-ref>
                        <!-- Button trigger modal -->
                        <button type="button" class="inline-block rounded uppercase bg-primary p-1 text-xs font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" data-te-toggle="modal" data-te-target="#exampleModal1" data-te-ripple-init data-te-ripple-color="light">
                            Creer
                        </button>
                    </div>
                </div>
                <!-- Modal -->
                <div data-te-modal-init class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div data-te-modal-dialog-ref class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                        <div class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                            <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                                <!--Modal title-->
                                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
                                    Creer une annee academic
                                </h5>
                                <!--Close button-->
                                <button type="button" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>

                            <!--Modal body-->
                            <form method="POST" action="{{ route('academic_years.store') }}">
                                @csrf
                                <div class="relative flex-auto p-4" data-te-modal-body-ref>
                                    <div class="relative mb-3" data-te-input-wrapper-init>
                                        <input name="name" type="text" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="exampleFormControlInputText" placeholder="Example label" />
                                        <label for="exampleFormControlInputText" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Nom de l'annee: par example 2023-2024
                                        </label>
                                    </div>
                                    <div class="grid grid-cols-2 gap-2">
                                        <div class="relative mb-3" data-te-datepicker-init data-te-input-wrapper-init>
                                            <input name="start_date" type="text" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" placeholder="Select a date" />
                                            <label for="floatingInput" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Début</label>
                                        </div>
                                        <div class="relative mb-3" data-te-datepicker-init data-te-input-wrapper-init>
                                            <input name="end_date" type="text" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" placeholder="Select a date" />
                                            <label for="floatingInput" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Echéance</label>
                                        </div>
                                    </div>
                                </div>

                                <!--Modal footer-->
                                <div class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                                    <button type="button" class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200" data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                                        Close
                                    </button>
                                    <button type="submit" class="ml-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" data-te-ripple-init data-te-ripple-color="light">
                                        Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div>

                <button id="dropdownRadioButton" data-dropdown-toggle="dropdownDefaultRadio" class="flex items-center whitespace-nowrap rounded bg-primary-100 px-6 pb-1 pt-1.5 text-xs font-medium uppercase leading-normal text-neutral-800 shadow-[0_4px_9px_-4px_#fbfbfb] transition duration-150 ease-in-out hover:bg-neutral-100 hover:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] focus:bg-neutral-100 focus:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] focus:outline-none focus:ring-0 active:bg-neutral-200 active:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] motion-reduce:transition-none" type="button">
                    Changer Semestre
                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdownDefaultRadio" class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioBgHoverButton">
                        <form action="{{ route('proces_verbal', ['year_id' => Session::get('year_id'), 'semester_id' => Session::get('semester_id')]) }}" method="get">

                            @isset($semesters)
                            @foreach($semesters as $semester)
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="{{ $semester->id }}" type="radio" name="semester_id" value="{{ $semester->id }}" onclick="this.form.submit()" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="{{ $semester->id }}" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Semestre {{ $semester->name }}</label>
                                </div>
                            </li>
                            @endforeach
                            @endisset

                        </form>
                    </ul>
                    <div class="p-3" data-te-select-custom-content-ref>
                        <!-- Button trigger modal -->
                        <button type="button" class="inline-block rounded bg-primary uppercase p-1 text-xs font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" data-te-toggle="modal" data-te-target="#exampleModal" data-te-ripple-init data-te-ripple-color="light">
                            Creer
                        </button>
                    </div>
                </div>
                <!--Semester modal-->
                <div data-te-modal-init class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none" id="exampleModal" tabindex="1" aria-labelledby="exampleModalLabel" aria-modal="true">
                    <div data-te-modal-dialog-ref class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[300px]">
                        <div class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                            <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 py-1 px-2 dark:border-opacity-50">
                                <!--Modal title-->
                                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="semesterModalSmLabel">
                                    Creer le Semestre
                                </h5>
                                <!--Close button-->
                                <button type="button" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>

                            <!--Modal body-->
                            <form method="POST" action="{{ route('levels.store') }}">
                                @csrf
                                <div class="relative p-4">

                                    <!-- Semester Name -->
                                    <div class="relative" data-te-input-wrapper-init>
                                        <input type="number" name="semester" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="exampleFormControlInput1" placeholder="Example label" />
                                        <label for="exampleFormControlInput1" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Par example: 1,2 ou 3...
                                        </label>
                                    </div>

                                </div>

                                <!--Modal footer-->
                                <div class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-2 dark:border-opacity-50">
                                    <button type="button" class="inline-block rounded bg-primary-100  text-xs px-2 py-1 font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200" data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                                        Fermer
                                    </button>
                                    <button type="submit" class="ml-1 inline-block rounded bg-primary text-xs px-2 py-1 font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" data-te-ripple-init data-te-ripple-color="light">
                                        Creer
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    <div class="flex justify-between">
        <div class="  w-auto border-r">
            @include('layouts.sidenave')
        </div>
        <div class="py-10" style="width:75%">
            <div class="">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg relative">
                    <div wire:loading class="absolute right-6 top-6">
                        <div role="status">
                            <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor" />
                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill" />
                            </svg>
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <!-- @notifyCss -->
                        <x-notify::notify />
                        <!-- @notifyJs -->
                        <div class="border-b mb-2">
                            <h2 class="font-bold uppercase text-xl text-gray-800 text-center mb-4">
                                {{ __('Proces Verbal') }}
                            </h2>
                        </div>
                        <div class="flex justify-end">
                            @if($pvmod == 1)
                            <a href="{{ URL::to('exportpvcc/'. $specialty. '/' . $levelmod . '/' . $semestermod . '/' . $academic_year_mod)  }}" target="_blank">
                                <x-primary-button wire:change="" class=" ml-3">
                                    {{ __('Imprimer') }}
                                </x-primary-button>
                            </a>
                            @else
                            <a href="{{ URL::to('exportpvsn/'. $specialty. '/' . $levelmod . '/' . $semestermod . '/' . $academic_year_mod)  }}" target="_blank">
                                <x-primary-button wire:change="" class=" ml-3">
                                    {{ __('Imprimer') }}
                                </x-primary-button>
                            </a>
                            @endif
                        </div>
                        <div class="my-2 px-3 rounded bg-slate-100">
                            <div class="py-4 grid grid-cols-4 gap-6 items-center">
                                <div>
                                    <label for="">Cycle</label>
                                    <select wire:model="cycle" mul wire:change="updateSpecialties" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm !important">
                                        @isset($cycles)
                                        @foreach($cycles as $cycle)
                                        <option value="{{ $cycle->id }}">{{ $cycle->name }} | {{ $cycle->code }}</option>
                                        @endforeach
                                        @endisset
                                    </select>
                                </div>
                                <div>
                                    <form>
                                        <label>Specialite</label>
                                        <select wire:model="specialty" mul wire:change="updateLevels" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm !important">
                                            @isset($specialties)
                                            @foreach($specialties as $specialty)
                                            <option value="{{ $specialty->id }}">{{ $specialty->name }} | {{ $specialty->code }}</option>
                                            @endforeach
                                            @endisset
                                        </select>
                                    </form>

                                </div>
                                <div>
                                    <label for="">Niveau</label>
                                    <select wire:model="levelmod" mul wire:change="updatePV" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm !important">
                                        @isset($levels)
                                        @foreach($levels as $level)
                                        <option value="{{ $level->id }}">Niveau {{ $level->name }}</option>
                                        @endforeach
                                        @endisset
                                    </select>
                                </div>
                                <div>
                                    <label for="">Type De PV</label>
                                    <div class="mt-1 flex items-center">
                                        <div class="mr-3 p-2 rounded bg-white">
                                            <input id="1" type="radio" wire:model="pvmod" wire:click="updatePV" value="1" name="PV" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label>PVCC</label>
                                        </div>
                                        <div class="bg-white p-2 rounded">
                                            <input id="2" type="radio" wire:model="pvmod" wire:click="updatePV" value="2" name="PV" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label>PVSN</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex flex-col mt-5">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                    <div class="overflow-hidden border rounded">
                                        @if($pvmod == 1)
                                        <table class="min-w-full text-center text-sm font-light">
                                            <thead>
                                                <tr class=" ">
                                                    <td colspan="3" class=" px-4 py-2 border"></td>
                                                    @foreach($ues as $ue)
                                                    @php($n=0)
                                                    @foreach($courses as $course)
                                                    @if($ue->id == $course->ue_id)
                                                    @php($n = $n+1)
                                                    @endif
                                                    @endforeach
                                                    <th colspan="{{ $n }}" class=" px-4 py-2 border"><b>{{ $ue->code }} {{ $ue->name }}</b></th>
                                                    @endforeach
                                                </tr>
                                                <tr style="font-size: small;">
                                                    <td colspan="3" class=" px-4 py-2 border"></td>
                                                    @foreach($courses as $course)
                                                    <th class=" px-4 py-2 border"><b>{{$course->code}} {{$course->name}}</b></th>
                                                    @endforeach
                                                </tr>
                                                <tr>
                                                    <th class="whitespace-nowrap px-4 py-2 border"><b>#</b></th>
                                                    <th class="whitespace-nowrap px-4 py-2 border"><b>Matricule</b></th>
                                                    <th class="whitespace-nowrap px-4 py-2 border"><b>Noms</b></th>
                                                    @foreach($courses as $course)
                                                    <th class="whitespace-nowrap px-4 py-2 border"><b>CC</b></th>
                                                    @endforeach
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @php($count=1)
                                                @foreach($students as $student)
                                                @foreach($student->levels as $level)
                                                @if($level->id == $levelmod)
                                                <tr style="font-size: small;" class="border-b transition duration-300 ease-in-out hover:bg-neutral-300 dark:border-neutral-300 dark:hover:bg-neutral-200 bg-neutral-100 even:bg-neutral-200">
                                                    <th class="whitespace-nowrap px-4 py-2 border"><b>{{$count}}</b></th>
                                                    <th class="whitespace-nowrap px-4 py-2 border"><b>{{$student->matricule}}</b></th>
                                                    <th class="whitespace-nowrap px-4 py-2 border"><b>{{$student->name}}</b></th>
                                                    @foreach($courses as $course)

                                                    @foreach($st_courses as $st_course)
                                                    @if($st_course->course->id == $course->id)

                                                    @if($st_course->student_id == $student->id)
                                                    @php($ca = $st_course->ca_marks)
                                                    @if($ca == 0)
                                                    <td class="whitespace-nowrap px-4 py-2 border"></td>
                                                    @else
                                                    <td class="whitespace-nowrap px-4 py-2 border">{{ $st_course->ca_marks }}</td>
                                                    @endif

                                                    @endif
                                                    @endif
                                                    @endforeach
                                                    @endforeach
                                                </tr>
                                                @php($count=$count+1)
                                                @endif
                                                @endforeach
                                                @endforeach

                                            </tbody>

                                        </table>
                                        @else
                                        <table border="0px" class="table" style="text-align: center;">
                                            <thead>
                                                <tr class=" ">
                                                    <td colspan="3" class="px-4 py-2 border"></td>
                                                    @foreach($ues as $ue)
                                                    @php($n=0)
                                                    @foreach($courses as $course)
                                                    @if($ue->id == $course->ue_id)
                                                    @php($n = $n+6)
                                                    @endif
                                                    @endforeach
                                                    <th colspan="{{ $n }}" class="px-4 py-2 border"><b>{{ $ue->code }} {{ $ue->name }}</b></th>
                                                    <th colspan="3" class="px-4 py-2 border"></th>
                                                    @endforeach
                                                    <th class="px-4 py-2"></th>
                                                </tr>
                                                <tr style="font-size: small;">
                                                    <td colspan="3" class="px-4 py-2"></td>
                                                    @foreach($ues as $ue)
                                                    @foreach($courses as $course)
                                                    @if($course->ue_id == $ue->id)
                                                    <th colspan="6" class="px-4 py-2 border"><b>{{$course->code}} {{$course->name}}</b></th>
                                                    @endif
                                                    @endforeach
                                                    <th colspan="3" class="whitespace-nowrap px-4 py-2" style="background-color: lightgray;"><b>Result UC</b></th>
                                                    @endforeach
                                                    <th class="whitespace-nowrap px-4 py-2"></th>
                                                    <th colspan="5" class="whitespace-nowrap px-4 py-2 border" style="background-color: lightgray;"><b>DECISION FINALE</b></th>
                                                </tr>
                                                <tr style="font-size: small;">
                                                    <th class="whitespace-nowrap px-4 py-2 border"><b>#</b></th>
                                                    <th class="whitespace-nowrap px-4 py-2 border"><b>Matricule</b></th>
                                                    <th class="whitespace-nowrap px-4 py-2 border"><b>Noms</b></th>
                                                    @foreach($ues as $ue)
                                                    @foreach($courses as $course)
                                                    @if($course->ue_id == $ue->id)
                                                    <th class="whitespace-nowrap px-4 py-2 border"><b>CC</b></th>
                                                    <th class="whitespace-nowrap px-4 py-2 border"><b>EXAM</b></th>
                                                    <th class="whitespace-nowrap px-4 py-2 border"><b>Moyenne</b></th>
                                                    <th class="whitespace-nowrap px-4 py-2 border"><b>Grade</b></th>
                                                    <th class="whitespace-nowrap px-4 py-2 border"><b>Credit</b></th>
                                                    <th class="whitespace-nowrap px-4 py-2 border"><b>Dec</b></th>
                                                    @endif
                                                    @endforeach
                                                    <th class="whitespace-nowrap px-4 py-2 border" style="background-color: lightgray;"><b>Moyenne</b></th>
                                                    <th class="whitespace-nowrap px-4 py-2 border" style="background-color: lightgray;"><b>Credit</b></th>
                                                    <th class="whitespace-nowrap px-4 py-2 border" style="background-color: lightgray;"><b>Dec</b></th>
                                                    @endforeach
                                                    <th class="whitespace-nowrap px-4 py-2"></th>
                                                    <th class="whitespace-nowrap px-4 py-2 border"><b>Matricule</b></th>
                                                    <th class="whitespace-nowrap px-4 py-2 border"><b>Noms</b></th>
                                                    <th class="whitespace-nowrap px-4 py-2 border"><b>Moyenne Semestrielle</b></th>
                                                    <th class="whitespace-nowrap px-4 py-2 border"><b>Crédit Obtenu</b></th>
                                                    <th class="whitespace-nowrap px-4 py-2 border"><b>Décision</b></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @php($st_count=1)
                                                @foreach($students as $student)
                                                @foreach($student->levels as $level)
                                                @if($level->id == $levelmod)
                                                <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-300 dark:border-neutral-300 dark:hover:bg-neutral-200 bg-neutral-100 even:bg-neutral-200" style="font-size: small;">
                                                    <th class="whitespace-nowrap px-4 py-2 border"><b>{{$st_count}}</b></th>
                                                    <th class="whitespace-nowrap px-4 py-2 border"><b>{{$student->matricule}}</b></th>
                                                    <th class="whitespace-nowrap px-4 py-2 border"><b>{{$student->name}}</b></th>

                                                    @php($count = 0)
                                                    @php($ue_credit_sum = 0)
                                                    @php($ue_sum = 0)
                                                    @php($credit_obtained = 0)

                                                    @foreach($ues as $ue)

                                                    @foreach($courses as $course)

                                                    @if($course->ue_id == $ue->id)

                                                    @php($courseavg_sum = 0)
                                                    @php($course_credit_sum = 0)
                                                    @php($check_credit_sum = 0)

                                                    @foreach($st_courses as $st_course)

                                                    @if($st_course->student_id == $student->id)
                                                    @if($st_course->course->ue_id == $ue->id)
                                                    @if($st_course->course->id == $course->id)

                                                    <td class="whitespace-nowrap px-4 py-2 border">{{ $st_course->ca_marks }}</td>
                                                    <td class="whitespace-nowrap px-4 py-2 border">{{$st_course->exam_marks}}</td>

                                                    @if($st_course->exam_marks < $st_course->reseat_mark)
                                                        @php($courseavg = (((((($st_course->ca_marks) / 20) * 30) + ((($st_course->reseat_mark) / 20) * 70)) / 100) * 20))
                                                        <td class="whitespace-nowrap px-4 py-2 border">{{ $courseavg }}</td>
                                                        @else
                                                        @php($courseavg = (((((($st_course->ca_marks) / 20) * 30) + ((($st_course->exam_marks) / 20) * 70)) / 100) * 20))
                                                        <td class="whitespace-nowrap px-4 py-2 border">{{ $courseavg }}</td>
                                                        @endif

                                                        @if($courseavg < 0 || $courseavg==0) <td class="whitespace-nowrap px-4 py-2 border">F</td>
                                                            @elseif($courseavg > 0 && $courseavg < 6.5) <td class="whitespace-nowrap px-4 py-2 border">F</td>
                                                                @elseif($courseavg == 6.5 || ($courseavg > 6.5 && $courseavg < 8.5)) <td class="whitespace-nowrap px-4 py-2 border">D</td>
                                                                    @elseif($courseavg == 8.5 || ($courseavg > 8.5 && $courseavg < 10)) <td class="whitespace-nowrap px-4 py-2 border">C-</td>
                                                                        @elseif($courseavg == 10 || ($courseavg > 10 && $courseavg < 11.5)) <td class="whitespace-nowrap px-4 py-2 border">C</td>
                                                                            @elseif($courseavg == 11.5 || ($courseavg > 11.5 && $courseavg < 13.5)) <td class="whitespace-nowrap px-4 py-2 border">C+</td>
                                                                                @elseif($courseavg == 13.5 || ($courseavg > 13.5 && $courseavg < 15)) <td class="whitespace-nowrap px-4 py-2 border">B-</td>
                                                                                    @elseif($courseavg == 15 || ($courseavg > 15 && $courseavg < 16.5)) <td class="whitespace-nowrap px-4 py-2 border">B</td>
                                                                                        @elseif($courseavg == 16.5 || ($courseavg > 16.5 && $courseavg < 18.5)) <td class="whitespace-nowrap px-4 py-2 border">B+</td>
                                                                                            @elseif($courseavg == 18.5 || ($courseavg > 18.5 && $courseavg < 19.5)) <td class="whitespace-nowrap px-4 py-2 border">A</td>
                                                                                                @else
                                                                                                <td class="whitespace-nowrap px-4 py-2 border">A+</td>
                                                                                                @endif

                                                                                                @if($courseavg >= 10)
                                                                                                @php($check = $st_course->course->credit_points)
                                                                                                <td class="whitespace-nowrap px-4 py-2 border">{{ $check }}</td>
                                                                                                @else
                                                                                                @php($check = 0)
                                                                                                <td class="whitespace-nowrap px-4 py-2 border">{{$check}}</td>
                                                                                                @endif
                                                                                                @if($check == 0)
                                                                                                <td class="whitespace-nowrap px-4 py-2 border">NV</td>
                                                                                                @else
                                                                                                <td class="whitespace-nowrap px-4 py-2 border">VA</td>
                                                                                                @endif

                                                                                                @endif
                                                                                                @if($st_course->exam_marks < $st_course->reseat_mark)
                                                                                                    @php($courseavg = (((((($st_course->ca_marks) / 20) * 30) + ((($st_course->reseat_mark) / 20) * 70)) / 100) * 20))
                                                                                                    @else
                                                                                                    @php($courseavg = (((((($st_course->ca_marks) / 20) * 30) + ((($st_course->exam_marks) / 20) * 70)) / 100) * 20))
                                                                                                    @endif

                                                                                                    @if($courseavg >= 10)
                                                                                                    @php($check_credit_sum = $check_credit_sum + $st_course->course->credit_points)
                                                                                                    @endif
                                                                                                    @php($course_credit_multiply = $courseavg * $st_course->course->credit_points)
                                                                                                    @php($courseavg_sum = $courseavg_sum + $course_credit_multiply)
                                                                                                    @php($course_credit_sum = $course_credit_sum + $st_course->course->credit_points)

                                                                                                    @endif
                                                                                                    @endif

                                                                                                    @endforeach
                                                                                                    @endif

                                                                                                    @endforeach


                                                                                                    @php($ue_mark = $courseavg_sum / $course_credit_sum)
                                                                                                    <td class="whitespace-nowrap px-4 py-2 border" style="background-color: lightgray;">{{$ue_mark}}</td>
                                                                                                    <td class="whitespace-nowrap px-4 py-2 border" style="background-color: lightgray;">{{$check_credit_sum}}</td>

                                                                                                    @if($ue_mark >= 10)
                                                                                                    <td class="whitespace-nowrap px-4 py-2 border" style="background-color: lightgray;">VA</td>
                                                                                                    @else
                                                                                                    <td class="whitespace-nowrap px-4 py-2 border" style="background-color: lightgray;">NV</td>
                                                                                                    @endif

                                                                                                    @php($ue_credit_multiply = $ue_mark * $ue->credit_points)
                                                                                                    @php($ue_sum = $ue_sum + $ue_credit_multiply)
                                                                                                    @php($ue_credit_sum = $ue_credit_sum + $ue->credit_points)
                                                                                                    @php($credit_obtained = $credit_obtained + $check_credit_sum)

                                                                                                    @endforeach
                                                                                                    <td class="whitespace-nowrap px-4 py-2"></td>
                                                                                                    <th class="whitespace-nowrap px-4 py-2 border"><b>{{$student->matricule}}</b></th>
                                                                                                    <th class="whitespace-nowrap px-4 py-2 border"><b>{{$student->name}}</b></th>
                                                                                                    @php($semester_avg = $ue_sum / $ue_credit_sum)
                                                                                                    <td class="whitespace-nowrap px-4 py-2 border">{{$semester_avg}}</td>
                                                                                                    <td class="whitespace-nowrap px-4 py-2 border">{{$credit_obtained}}</td>
                                                                                                    @if($credit_obtained == 30)
                                                                                                    <td class="whitespace-nowrap px-4 py-2 border">Fermé</td>
                                                                                                    @else
                                                                                                    <td class="whitespace-nowrap px-4 py-2 border">Non Fermé</td>
                                                                                                    @endif
                                                </tr>
                                                @php($st_count=$st_count+1)
                                                @endif
                                                @endforeach
                                                @endforeach

                                            </tbody>
                                        </table>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="width: 56px;"></div>
    </div>
</div>