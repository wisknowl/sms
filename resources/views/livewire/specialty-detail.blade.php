<div class="bg-white overflow-y-visible overflow-x-hidden shadow-sm sm:rounded-lg relative">
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
            <h2 class="font-bold uppercase text-xl text-gray-800 text-center mb-4">
                {{$specialty_name}}
            </h2>
        </div>
        <!--Tabs content-->
        <div class="mb-6">
            <x-notify::notify />
            <!-- Specialty Detail -->

            <div class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block" id="tabs-home" role="tabpanel" aria-labelledby="tabs-home-tab" data-te-tab-active>
                <!-- Specialty List -->
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="py-3 px-3 bg-slate-50 rounded">
                                <h5 class="text-center text-lg">
                                    Frais De Scolarite
                                </h5>
                                <div class="py-4 grid grid-cols-2 gap-4">
                                    <div class="block rounded-lg bg-gray-800 text-white p-2 text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white">
                                        <h5 class="mb-2 text-xl text-center font-medium leading-tight">Cour du Jour</h5>
                                        <div class="overflow-x-auto text-nowrap border rounded bg-inherit">
                                            <table class="min-w-full text-center text-sm font-light bg-inherit">
                                                <thead class="border-b font-medium dark:border-neutral-500 bg-inherit">
                                                    <tr>
                                                        <th scope="col" class="px-4 py-2  border-r">Inscription et Frais Medicale</th>
                                                        <th scope="col" class="px-4 py-2  border-r">1ere Tranche</th>
                                                        <th scope="col" class="px-4 py-2  border-r">2eme Tranche</th>
                                                        <th scope="col" class="px-4 py-2  border-r">3eme Tranche</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class=" border-r transition duration-300 ease-in-out dark:border-neutral-300 dark:hover:bg-neutral-200 bg-inherit">
                                                        @php
                                                        use Illuminate\Support\Str;

                                                        $tranche_names = ['inscription', 'first', 'second', 'third'];
                                                        @endphp

                                                        @php
                                                        $breakOuterLoop = false;
                                                        @endphp
                                                        @foreach($tranche_names as $name)
                                                        @foreach($tranches as $tranche)
                                                        @if($tranche->name == $name)
                                                        @if ($breakOuterLoop)
                                                        @break
                                                        @endif
                                                        @php
                                                        $matchFound = false;
                                                        @endphp

                                                        @forelse($specialty_tranches as $specialty_tranche)
                                                        @if($specialty_tranche->tranche_id == $tranche->id && $specialty_tranche->period == 'jour')
                                                        <td class="whitespace-nowrap px-4 py-2   border-r font-medium">
                                                            <div class="">
                                                                <span>{{ $specialty_tranche->tranche_amount }}</span>
                                                            </div>
                                                            <div class="my-2">
                                                                <label for="">Delai: </label><span class="pl-2">{{ $tranche->due_date}}</span>
                                                            </div>
                                                            <div>
                                                                <button class="edit mx-2 font-medium text-blue-600 hover:cursor-pointer dark:text-red-500 hover:underline" data-te-toggle="modal" id="btnModal">
                                                                    <span class="mr-0 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                                                        <svg fill="#000000" width="800px" height="800px" viewBox="0 0 24 24" id="edit" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color">
                                                                            <path id="secondary" d="M21,22H3a1,1,0,0,1,0-2H21a1,1,0,0,1,0,2Z" style="fill: rgb(44, 169, 188);"></path>
                                                                            <path id="primary" d="M20.71,3.29a2.93,2.93,0,0,0-2.2-.84,3.25,3.25,0,0,0-2.17,1L7.46,12.29a1.16,1.16,0,0,0-.25.43L6,16.72A1,1,0,0,0,7,18a.9.9,0,0,0,.28,0l4-1.17a1.16,1.16,0,0,0,.43-.25l8.87-8.88a3.25,3.25,0,0,0,1-2.17A2.91,2.91,0,0,0,20.71,3.29Z" style="fill: #0000FF;"></path>
                                                                        </svg>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </td>
                                                        @php
                                                        $matchFound = true;
                                                        @endphp
                                                        @endif
                                                        @empty
                                                        <td colspan="4" class="whitespace-nowrap px-4 py-2   border-r font-medium">
                                                            <div>Aucune tranche n'a été créée pour cette filière</div>
                                                            <div class="flex justify-center items-center">
                                                                <button class="edit flex justify-center items hover:cursor-pointer mx-2 font-medium text-blue-600  dark:text-red-500 hover:underline" data-te-toggle="modal" data-te-target="#exampleModalCenter">
                                                                    <span class="mr-0 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                                                        <svg fill="blue" height="800px" width="800px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" enable-background="new 0 0 0 0" xml:space="preserve">
                                                                            <path d="M256,0C114.6,0,0,114.6,0,256s114.6,256,256,256s256-114.6,256-256S397.4,0,256,0z M405.3,277.3c0,11.8-9.5,21.3-21.3,21.3 h-85.3V384c0,11.8-9.5,21.3-21.3,21.3h-42.7c-11.8,0-21.3-9.6-21.3-21.3v-85.3H128c-11.8,0-21.3-9.6-21.3-21.3v-42.7 c0-11.8,9.5-21.3,21.3-21.3h85.3V128c0-11.8,9.5-21.3,21.3-21.3h42.7c11.8,0,21.3,9.6,21.3,21.3v85.3H384c11.8,0,21.3,9.6,21.3,21.3 V277.3z" />
                                                                        </svg>
                                                                    </span>
                                                                    <div class="ml-1 uppercase">Creer</div>
                                                                </button>
                                                            </div>
                                                        </td>
                                                        @php
                                                        $breakOuterLoop = true;
                                                        @endphp
                                                        @endforelse
                                                        @if($specialty_tranches->isNotEmpty())
                                                        @if(!$matchFound)
                                                        <td class="whitespace-nowrap px-4 py-2   border-r font-medium">
                                                            <div class="flex justify-center items-center">
                                                                <button class="edit flex justify-center items hover:cursor-pointer mx-2 font-medium text-blue-600  dark:text-red-500 hover:underline" data-te-toggle="modal" data-te-target="#exampleModalCenter">
                                                                    <span class="mr-0 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                                                        <svg fill="blue" height="800px" width="800px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" enable-background="new 0 0 0 0" xml:space="preserve">
                                                                            <path d="M256,0C114.6,0,0,114.6,0,256s114.6,256,256,256s256-114.6,256-256S397.4,0,256,0z M405.3,277.3c0,11.8-9.5,21.3-21.3,21.3 h-85.3V384c0,11.8-9.5,21.3-21.3,21.3h-42.7c-11.8,0-21.3-9.6-21.3-21.3v-85.3H128c-11.8,0-21.3-9.6-21.3-21.3v-42.7 c0-11.8,9.5-21.3,21.3-21.3h85.3V128c0-11.8,9.5-21.3,21.3-21.3h42.7c11.8,0,21.3,9.6,21.3,21.3v85.3H384c11.8,0,21.3,9.6,21.3,21.3 V277.3z" />
                                                                        </svg>
                                                                    </span>
                                                                    <div class="ml-1 uppercase">Creer</div>
                                                                </button>
                                                            </div>
                                                        </td>
                                                        @endif
                                                        @endif
                                                        @endif
                                                        @endforeach
                                                        @endforeach
                                                    </tr>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="block rounded-lg bg-gray-800 text-white p-2 text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white">
                                        <h5 class="mb-2 text-xl text-center font-medium leading-tight">Cour du Soir</h5>
                                        <div class="overflow-x-auto text-nowrap border rounded bg-inherit">
                                            <table class="min-w-full text-center text-sm font-light bg-inherit">
                                                <thead class="border-b font-medium dark:border-neutral-500 bg-inherit">
                                                    <tr>
                                                        <th scope="col" class="px-4 py-2  border-r">Inscription et Frais Medicale</th>
                                                        <th scope="col" class="px-4 py-2  border-r">1ere Tranche</th>
                                                        <th scope="col" class="px-4 py-2  border-r">2eme Tranche</th>
                                                        <th scope="col" class="px-4 py-2  border-r">3eme Tranche</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class=" border-r transition duration-300 ease-in-out dark:border-neutral-300 dark:hover:bg-neutral-200 bg-inherit">


                                                        @php
                                                        $breakOuterLoop = false;
                                                        @endphp
                                                        @foreach($tranche_names as $name)
                                                        @foreach($tranches as $tranche)
                                                        @if($tranche->name == $name)
                                                        @if ($breakOuterLoop)
                                                        @break
                                                        @endif
                                                        @php
                                                        $matchFound = false;
                                                        @endphp

                                                        @forelse($specialty_tranches as $specialty_tranche)
                                                        @if($specialty_tranche->tranche_id == $tranche->id && $specialty_tranche->period == 'soir')
                                                        <td class="whitespace-nowrap p-4 border-r font-medium">
                                                            <div class="">
                                                                <span>{{ $specialty_tranche->tranche_amount }}</span>
                                                            </div>
                                                            <div class="my-2">
                                                                <label for="">Delai: </label><span class="pl-2">{{ $tranche->due_date}}</span>
                                                            </div>
                                                            <div>
                                                                <button class="edit mx-2 font-medium text-blue-600 hover:cursor-pointer dark:text-red-500 hover:underline" data-te-toggle="modal" id="btnModal">
                                                                    <span class="mr-0 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                                                        <svg fill="#000000" width="800px" height="800px" viewBox="0 0 24 24" id="edit" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color">
                                                                            <path id="secondary" d="M21,22H3a1,1,0,0,1,0-2H21a1,1,0,0,1,0,2Z" style="fill: rgb(44, 169, 188);"></path>
                                                                            <path id="primary" d="M20.71,3.29a2.93,2.93,0,0,0-2.2-.84,3.25,3.25,0,0,0-2.17,1L7.46,12.29a1.16,1.16,0,0,0-.25.43L6,16.72A1,1,0,0,0,7,18a.9.9,0,0,0,.28,0l4-1.17a1.16,1.16,0,0,0,.43-.25l8.87-8.88a3.25,3.25,0,0,0,1-2.17A2.91,2.91,0,0,0,20.71,3.29Z" style="fill: #0000FF;"></path>
                                                                        </svg>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </td>
                                                        @php
                                                        $matchFound = true;
                                                        @endphp
                                                        @endif
                                                        @empty
                                                        <td colspan="4" class="whitespace-nowrap px-4 py-2   border-r font-medium">
                                                            <div>Aucune tranche n'a été créée pour cette filière</div>
                                                            <div class="flex justify-center items-center">
                                                                <button class="edit flex justify-center items hover:cursor-pointer mx-2 font-medium text-blue-600  dark:text-red-500 hover:underline" data-te-toggle="modal" data-te-target="#exampleModalCenter">
                                                                    <span class="mr-0 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                                                        <svg fill="blue" height="800px" width="800px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" enable-background="new 0 0 0 0" xml:space="preserve">
                                                                            <path d="M256,0C114.6,0,0,114.6,0,256s114.6,256,256,256s256-114.6,256-256S397.4,0,256,0z M405.3,277.3c0,11.8-9.5,21.3-21.3,21.3 h-85.3V384c0,11.8-9.5,21.3-21.3,21.3h-42.7c-11.8,0-21.3-9.6-21.3-21.3v-85.3H128c-11.8,0-21.3-9.6-21.3-21.3v-42.7 c0-11.8,9.5-21.3,21.3-21.3h85.3V128c0-11.8,9.5-21.3,21.3-21.3h42.7c11.8,0,21.3,9.6,21.3,21.3v85.3H384c11.8,0,21.3,9.6,21.3,21.3 V277.3z" />
                                                                        </svg>
                                                                    </span>
                                                                    <div class="ml-1 uppercase">Creer</div>
                                                                </button>
                                                            </div>
                                                        </td>
                                                        @php
                                                        $breakOuterLoop = true;
                                                        @endphp
                                                        @endforelse
                                                        @if($specialty_tranches->isNotEmpty())
                                                        @if(!$matchFound)
                                                        <td class="whitespace-nowrap p-4 border-r font-medium">
                                                            <div class="flex justify-center items-center">
                                                                <button class="edit flex justify-center items hover:cursor-pointer mx-2 font-medium text-blue-600  dark:text-red-500 hover:underline" data-te-toggle="modal" data-te-target="#exampleModalCenter">
                                                                    <span class="mr-0 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                                                        <svg fill="blue" height="800px" width="800px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" enable-background="new 0 0 0 0" xml:space="preserve">
                                                                            <path d="M256,0C114.6,0,0,114.6,0,256s114.6,256,256,256s256-114.6,256-256S397.4,0,256,0z M405.3,277.3c0,11.8-9.5,21.3-21.3,21.3 h-85.3V384c0,11.8-9.5,21.3-21.3,21.3h-42.7c-11.8,0-21.3-9.6-21.3-21.3v-85.3H128c-11.8,0-21.3-9.6-21.3-21.3v-42.7 c0-11.8,9.5-21.3,21.3-21.3h85.3V128c0-11.8,9.5-21.3,21.3-21.3h42.7c11.8,0,21.3,9.6,21.3,21.3v85.3H384c11.8,0,21.3,9.6,21.3,21.3 V277.3z" />
                                                                        </svg>
                                                                    </span>
                                                                    <div class="ml-1 uppercase">Creer</div>
                                                                </button>
                                                            </div>
                                                        </td>
                                                        @endif
                                                        @endif
                                                        @endif
                                                        @endforeach
                                                        @endforeach
                                                    </tr>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>


                                <div class="overflow-hidden border rounded">
                                    <table class="min-w-full text-center text-sm font-light">
                                        <thead class="border-b font-medium dark:border-neutral-500 bg-white">
                                            <tr>
                                                <th scope="col" class="px-4 py-2 border">Inscription</th>
                                                <th scope="col" class="px-4 py-2 border">Frais Medicale</th>
                                                <th scope="col" class="px-4 py-2 border">1ere Tranche</th>
                                                <th scope="col" class="px-4 py-2 border">2eme Tranche</th>
                                                <th scope="col" class="px-4 py-2 border">3eme Tranche</th>
                                                <th scope="col" class="px-4 py-2 border">Period</th>
                                                <th scope="col" class="px-4 py-2 border">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-300 dark:border-neutral-300 dark:hover:bg-neutral-200 bg-neutral-100 even:bg-neutral-200">
                                                <td class="whitespace-nowrap px-4 py-2 border font-medium">35000</td>
                                                <td class="whitespace-nowrap px-4 py-2 border font-medium">5000</td>
                                                <td class="whitespace-nowrap px-4 py-2 border">230000</td>
                                                <td class="whitespace-nowrap px-4 py-2 border">85000</td>
                                                <td class="whitespace-nowrap px-4 py-2 border">35000</td>
                                                <td class="whitespace-nowrap px-4 py-2 border">Jour</td>
                                                <td class="whitespace-nowrap px-4 py-2 flex justify-center items-center">
                                                    <button type="button" wire:click.prevent='' class="flex justify-center items-center font-medium text-red-600 dark:text-red-500 hover:underline" data-te-toggle="modal" data-te-target="#deleteModal">
                                                        <span class="mr-0 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                                            <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M7 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2h4a1 1 0 1 1 0 2h-1.069l-.867 12.142A2 2 0 0 1 17.069 22H6.93a2 2 0 0 1-1.995-1.858L4.07 8H3a1 1 0 0 1 0-2h4V4zm2 2h6V4H9v2zM6.074 8l.857 12H17.07l.857-12H6.074zM10 10a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1zm4 0a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1z" fill="#FF0000" />
                                                            </svg>
                                                        </span>
                                                        <span></span>
                                                    </button>

                                                    <!-- <button wire:click="$emit('openModal', 'mymodal')">Open Modal</button> X-->
                                                    <!-- <button wire:click="$dispatch('openModal', {component: 'mymodal'})"></button> -->
                                                    <button class="edit mx-2 font-medium text-blue-600 dark:text-red-500 hover:underline" data-te-toggle="modal" id="btnModal">
                                                        <span class="mr-0 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                                            <svg fill="#000000" width="800px" height="800px" viewBox="0 0 24 24" id="edit" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color">
                                                                <path id="secondary" d="M21,22H3a1,1,0,0,1,0-2H21a1,1,0,0,1,0,2Z" style="fill: rgb(44, 169, 188);"></path>
                                                                <path id="primary" d="M20.71,3.29a2.93,2.93,0,0,0-2.2-.84,3.25,3.25,0,0,0-2.17,1L7.46,12.29a1.16,1.16,0,0,0-.25.43L6,16.72A1,1,0,0,0,7,18a.9.9,0,0,0,.28,0l4-1.17a1.16,1.16,0,0,0,.43-.25l8.87-8.88a3.25,3.25,0,0,0,1-2.17A2.91,2.91,0,0,0,20.71,3.29Z" style="fill: #0000FF;"></path>
                                                            </svg>
                                                        </span>
                                                    </button>
                                                    <a href="#">
                                                        <button class="font-medium text-blue-600 dark:text-red-500 hover:underline">
                                                            <span class="mr-0 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                                                <svg width="800px" height="800px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill="#4A4A4A" fill-rule="evenodd" d="M2.5,7.5 C3.88071187,7.5 5,8.61928813 5,10 C5,11.3807119 3.88071187,12.5 2.5,12.5 C1.11928813,12.5 0,11.3807119 0,10 C0,8.61928813 1.11928813,7.5 2.5,7.5 Z M17.5,7.5 C18.8807119,7.5 20,8.61928813 20,10 C20,11.3807119 18.8807119,12.5 17.5,12.5 C16.1192881,12.5 15,11.3807119 15,10 C15,8.61928813 16.1192881,7.5 17.5,7.5 Z M10.226404,7.5 C11.6071159,7.5 12.726404,8.61928813 12.726404,10 C12.726404,11.3807119 11.6071159,12.5 10.226404,12.5 C8.84569215,12.5 7.72640403,11.3807119 7.72640403,10 C7.72640403,8.61928813 8.84569215,7.5 10.226404,7.5 Z" />
                                                                </svg>
                                                            </span>
                                                        </button>
                                                    </a>

                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
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
                                    Creer une Tranche
                                </h5>
                                <!--Close button-->
                                <button type="button" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>

                            <!--Modal body-->
                            <form method="POST" action="{{route('specialty_tranche.store')}}">
                                @csrf
                                <div class="relative p-4">
                                    <div class="relative ">
                                        <input type="hidden" name="id" value="{{$specialtyId}}">
                                    </div>
                                    <!-- Code -->
                                    <div class="relative mb-3" data-te-input-wrapper-init>
                                        <input name="montant" type="number" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="exampleFormControlInput1" placeholder="Example label" required />
                                        <label for="exampleFormControlInput1" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Montant
                                        </label>
                                    </div>
                                    <div class="mb-3">
                                        <select name="tranche_id" data-te-select-filter="false" data-te-select-init data-te-select-placeholder="Type">
                                            @isset($tranches)
                                            @foreach($tranche_names as $name)

                                            @foreach($tranches as $tranche)
                                            @if($tranche->name == $name)

                                            @if($tranche->name == 'first')
                                            <option value="{{ $tranche->id }}">{{strtoupper('1ere Tranche')}}</option>
                                            @elseif($tranche->name == 'second')
                                            <option value="{{ $tranche->id }}">{{strtoupper('2eme Tranche')}}</option>
                                            @elseif($tranche->name == 'third')
                                            <option value="{{ $tranche->id }}">{{strtoupper('3eme Tranche')}}</option>
                                            @else
                                            <option value="{{ $tranche->id }}">{{strtoupper($tranche->name)}} | et {{strtoupper('Frais Medicale')}}</option>
                                            @endif
                                            @endif
                                            @endforeach
                                            @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <select name="level_id" data-te-select-init data-te-select-filter="false" data-te-select-init data-te-select-placeholder="Niveau">
                                            @foreach($levels as $level)
                                            <option value="{{$level->id}}">Niveau {{$level->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-0">
                                        <select name="period" data-te-select-init data-te-select-filter="false" data-te-select-init data-te-select-placeholder="Period">
                                            <option value="jour">Jour</option>
                                            <option value="soir">Soir</option>
                                        </select>
                                    </div>

                                </div>

                                <!--Modal footer-->
                                <div class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                                    <button type="button" class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200" data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                                        Fermer
                                    </button>
                                    <button type="submit" class="ml-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                                        Creer
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