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
    <div class="p-6">
        <!-- @notifyCss -->
        <x-notify::notify />
        <!-- @notifyJs -->
        <div class="border-b mb-2">
            <h2 class="font-bold uppercase text-xl text-gray-800 text-center mb-4">
                {{ __('relever_page.relever') }}
            </h2>
        </div>
        <div class="flex justify-end">
            <!-- <button wire:click="updateMarks" class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" data-te-ripple-init data-te-ripple-color="light">Enregistrer</button> -->
        </div>
        <div class=" mb-2 flex justify-between items-center">
            <!-- Button trigger vertically centered modal-->
            <div></div>

            <div class="flex justify-end items-center">
                <div>
                    <input wire:model="search" wire:change="fl" type="search" class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:border-0 focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary" id="exampleSearch" placeholder="Rechercher" />
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
                    @forelse($students as $student)
                    @php($student_array[] = $student->id)
                    @empty
                    @php($student_array[] = null)
                    @endforelse
                    @php($student_list = serialize($student_array))
                    @php($specialtyNameLevel = $specialtyName . " " . $levelName)
                    <a href="{{ URL::to('transcript_list/' . $student_list .  '/' . $academic_year_mod . '/' . $tdr . '/' . $semester_mod . '/' . $specialtyNameLevel) }}" target="_blank">
                        <button wire:click="" type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-500 focus:z-10 focus:ring-2 focus:ring-blue-500 focus:text-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
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
                    </a>

                </div>
            </div>
        </div>
        <div class="my-2 px-3 rounded bg-slate-100">

            <div class="py-4 grid grid-cols-4 gap-4">
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
                        <select wire:model="specialty" mul wire:change="updateStudents" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm !important">
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
                    <select wire:model="level" mul wire:change="updateStudents" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm !important">
                        @isset($levels)
                        @foreach($levels as $level)
                        <option value="{{ $level->id }}">Niveau {{ $level->name }}</option>
                        @endforeach
                        @endisset
                    </select>
                </div>
                <div>
                    <label for="">Type de Relever</label>
                    <select wire:model.lazy="tdr" mul wire:change="" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm !important">
                        <option value="1">Semestriel</option>
                        <option value="2">Annuelle</option>
                    </select>
                </div>
            </div>
            <!-- Dropdown menu -->
            <div id="delib" class="z-10 hidden p-4 w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
                <input placeholder="0.00" type="number" wire:model="noteDeliberation" class="center-placeholder rounded focus:border-x-0 focus:border-t-0 py-0 px-2 w-full border-0 bg-neutral-200">
            </div>
        </div>
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden border rounded">
                        <table class="min-w-full text-center text-sm font-light">
                            <thead class="border-b font-medium dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-4 py-2 border">Index</th>
                                    <th scope="col" class="px-4 py-2 border">Matricule</th>
                                    <th scope="col" class="px-4 py-2 border">Nom</th>
                                    <th scope="col" class="px-4 py-2 border">Moyenne Semestriel</th>
                                    <th scope="col" class="px-4 py-2 border">Relever</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($count = 1)
                                @forelse($students as $student)
                                <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-300 dark:border-neutral-300 dark:hover:bg-neutral-200 bg-neutral-100 even:bg-neutral-200">
                                    <td class="whitespace-nowrap px-4 py-2 border font-medium">{{ $count }}</td>
                                    <td class="whitespace-nowrap px-4 py-2 border">{{ $student->matricule }}</td>
                                    <td class="whitespace-nowrap px-4 py-2 border">{{ $student->name }}</td>
                                    @if (array_key_exists($student->id, $moyenne_semestriel))
                                    <td class="whitespace-nowrap px-4 py-2 border">{{ number_format(ceil($moyenne_semestriel[$student->id] * 100) / 100, 2, '.', '') }}</td>
                                    @endif 
                                    <td class="whitespace-nowrap px-4 py-2 flex justify-center items-center">
                                        <a href="{{ URL::to('generateTranscript/'. $student->id . '/' . $academic_year_mod . '/' . $tdr . '/' . $semester_mod . '/' . $student->name) }}" target="_blank">
                                            <button class="font-medium text-blue-600 dark:text-red-500 hover:underline flex items-center">
                                                <span class="mr-0 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                                    <svg width="800px" height="800px" viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--noto" preserveAspectRatio="xMidYMid meet">

                                                        <path d="M64.32 103.32c-34.03 0-53.56-33.13-56.94-39.38c3.07-6.27 20.91-39.26 56.94-39.26s53.87 32.98 56.94 39.26c-3.38 6.25-22.92 39.38-56.94 39.38z" fill="#fafafa">

                                                        </path>

                                                        <path d="M64.32 27.12c15.81 0 29.84 6.42 41.7 19.09c6.63 7.08 10.73 14.26 12.49 17.67c-4.51 7.99-23.05 36.99-54.19 36.99c-14.88 0-28.63-6.45-40.89-19.17c-6.89-7.15-11.37-14.41-13.3-17.82c1.75-3.41 5.86-10.6 12.49-17.67c11.86-12.67 25.89-19.09 41.7-19.09m0-4.88C22.56 22.24 4.66 64 4.66 64s20.25 41.76 59.66 41.76S123.97 64 123.97 64s-17.9-41.76-59.65-41.76z" fill="#b0bec5">

                                                        </path>

                                                        <path d="M64.32 37c26.97 0 45.47 16.51 53.66 27.71c.96 1.31 1.99-4.99 1.12-6.36c-7.84-12.26-25.41-32.91-54.77-32.91S17.38 46.1 9.54 58.36c-.88 1.37.3 6.83 1.41 5.64c8.54-9.17 26.39-27 53.37-27z" fill="#b0bec5">

                                                        </path>

                                                        <circle cx="64.32" cy="60.79" r="33.15" fill="#9c7a63">

                                                        </circle>

                                                        <path d="M64.32 37c10.87 0 20.36 2.68 28.36 6.62c-5.81-9.58-16.34-15.97-28.36-15.97c-12.28 0-23 6.69-28.72 16.61C43.61 40.04 53.18 37 64.32 37z" fill="#806451">

                                                        </path>

                                                        <circle cx="64.32" cy="60.79" r="15.43" fill="#212121">

                                                        </circle>

                                                        <circle cx="88.86" cy="59.37" r="7.72" fill="#d9baa5">

                                                        </circle>

                                                        <g>

                                                            <path d="M7.21 67.21c-.52 0-1.05-.13-1.54-.4a3.207 3.207 0 0 1-1.27-4.35c.85-1.55 21.28-40.21 59.92-40.21s58.47 37.89 59.29 39.41c.84 1.56.27 3.5-1.29 4.35c-1.56.84-3.5.27-4.35-1.29c-.18-.34-18.88-33.86-53.66-33.86c-34.79 0-54.11 34.34-54.3 34.69a3.185 3.185 0 0 1-2.8 1.66z" fill="#616161">

                                                            </path>

                                                        </g>

                                                    </svg>
                                                </span>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                @php($count = $count + 1)
                                @empty
                                <tr>
                                    <td colspan="8" class="whitespace-nowrap px-4 py-2 border">Aucun Etudiant trouver</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>