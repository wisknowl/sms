<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center text-center">
            {{ __('Structure') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Content -->
                    <!--Tabs navigation-->
                    @include ('partials.structureNav')

                    <!--Tabs content-->
                    <div class="mb-6">
                        <h2 class="font-light text-xl text-gray-800 leading-tight flex items-center text-center my-4">
                            {{ __('Affectation Unite Denseignement au Specialite') }}
                        </h2>
                        <!-- Add Specialty -->
                        <div class="space-y-2 flex justify-end">
                            <!-- Button trigger vertically centered modal-->
                            <button type="button" class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" data-te-toggle="modal" data-te-target="#exampleModalCenter" data-te-ripple-init data-te-ripple-color="light">
                                Affecter
                            </button>
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
                                                        <th scope="col" class="px-6 py-4">#</th>
                                                        <th scope="col" class="px-6 py-4">Unite Denseignement</th>
                                                        <th scope="col" class="px-6 py-4">Specialite</th>
                                                        <th scope="col" class="px-6 py-4">Jour Creer</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($specialty_ues)
                                                    @foreach($specialty_ues as $specialty_ue)
                                                    <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-300 dark:hover:bg-neutral-200">
                                                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $specialty_ue->id }}</td>
                                                        <td class="whitespace-nowrap px-6 py-4">{{ $specialty_ue->specialty->name  }}</td>
                                                        <td class="whitespace-nowrap px-6 py-4">{{ $specialty_ue->ue->name  }}</td>
                                                        <td class="whitespace-nowrap px-6 py-4">{{ $specialty_ue->created_at }}</td>
                                                    </tr>
                                                    @endforeach
                                                    @endisset
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!--Verically centered modal-->
                            <div data-te-modal-init class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
                                <div data-te-modal-dialog-ref class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
                                    <div class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                                        <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                                            <!--Modal title-->
                                            <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalCenterTitle">
                                                Affectation Unite D'enseignement au Specialite
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
                                                <!-- Specialty Name -->
                                                <div class="mb-1.5">
                                                    Specialite
                                                </div>
                                                <select name="specialty" data-te-select-placeholder=" " data-te-select-init data-te-select-option-height="52">
                                                    @isset($specialties)
                                                    @foreach($specialties as $specialty)
                                                    <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                                                    @endforeach
                                                    @endisset
                                                </select>
                                                <div class="mt-3 mb-1.5">
                                                    Unite D'enseignement
                                                </div>
                                                <!-- UE -->
                                                <select name="specialty_ue[]" data-te-select-init data-te-select-filter="true" data-te-select-placeholder=" " multiple>
                                                    @isset($ues)
                                                    @foreach($ues as $ue)
                                                    <option value="{{ $ue->id }}">{{ $ue->name }}</option>
                                                    @endforeach
                                                    @endisset
                                                </select>
                                            </div>

                                            <!--Modal footer-->
                                            <div class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                                                <button type="button" class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200" data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                                                    Close
                                                </button>
                                                <button type="submit" class="ml-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" data-te-ripple-init data-te-ripple-color="light">
                                                    Affecter
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>