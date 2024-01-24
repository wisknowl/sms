<div>
    <div class="bg-white shadow">
        <div class="flex justify-between max-w-7xl mx-auto py-5 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Gestion Des Notes') }} {{$academic_year}}
            </h2>
            <div class="grid grid-cols-3 gap-4">
                <div class="flex text-center items-center">
                </div>
                <div></div>
                <div wire:ignore>
                    <select id="select_input" wire:model.lazy.500ms="academic_year" data-te-select-init data-te-select-placeholder="Annee academique" wire:change="" class="py-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm !important">
                        @isset($academic_years)
                        @foreach($academic_years as $academic_year)
                        <option value="{{ $academic_year->name }}">{{ $academic_year->name }}</option>
                        @endforeach
                        @endisset
                    </select>
                    <div class="p-3" data-te-select-custom-content-ref>
                        <!-- Button trigger modal -->
                        <button type="button" class="inline-block rounded bg-primary p-1 text-xs font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" data-te-toggle="modal" data-te-target="#exampleModal1" data-te-ripple-init data-te-ripple-color="light">
                            Creer
                        </button>
                    </div>
                    <!-- Modal -->
                    <div wire:ignore data-te-modal-init class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <label for="exampleFormControlInputText" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Nom de l'annee: par example 2023/2024
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
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 pt-6 text-gray-900">
                    @include ('partials.noteNav')
                </div>
                <div class="mb-4 p-6 pt-0">
                    <!-- @notifyCss -->
                    <x-notify::notify />
                    <!-- @notifyJs -->
                    <h2 class="underline underline-offset-4 font-light text-xl text-gray-800 leading-tight flex items-center text-center mb-2">
                        {{ __('Saisie Des Notes') }}
                    </h2>
                    <div class="flex justify-end">
                        <button wire:click="updateMarks" class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" data-te-ripple-init data-te-ripple-color="light">Enregistrer</button>

                    </div>
                    <div class="my-2 px-3 rounded bg-slate-100">
                        <div class="pt-4 grid grid-cols-3 gap-6">
                            <div>
                                <label for="">Cycle</label>
                                <select wire:model="cycle" multiple wire:change="updateSpecialties" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm !important">
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
                                    <select wire:model="specialty" multiple wire:change="updateLevels" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm !important">
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
                                <select wire:model="level" multiple wire:change="updateSemesters" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm !important">
                                    @isset($levels)
                                    @foreach($levels as $level)
                                    <option value="{{ $level->id }}">Niveau {{ $level->name }}</option>
                                    @endforeach
                                    @endisset
                                </select>
                            </div>
                        </div>
                        <div class="py-4 grid grid-cols-3 gap-6 items-center">
                            <div>
                                <label>Semestre</label>
                                <select wire:model="semester" multiple wire:change="updateCourses" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm !important">
                                    @isset($semesters)
                                    @foreach($semesters as $semester)
                                    <option value="{{ $semester->id }}">Semestre {{ $semester->name }}</option>
                                    @endforeach
                                    @endisset
                                </select>
                            </div>
                            <div>
                                <label>Cours</label>
                                <select wire:model.lazy.500ms="coursemod" multiple wire:change="updateStudents" name="course_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm !important">
                                    @isset($courses)
                                    @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->code }} | {{ $course->name }}</option>
                                    @endforeach
                                    @endisset
                                </select>
                            </div>
                            <div class="">
                                
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-hidden border rounded">
                                    <table class="min-w-full text-center text-sm font-light">
                                        <thead class="border-b font-medium dark:border-neutral-500">
                                            <tr>
                                                <th scope="col" class="px-6 py-4">Index</th>
                                                <th scope="col" class="px-6 py-4">Action</th>
                                                <th scope="col" class="px-6 py-4">Matricule</th>
                                                <th scope="col" class="px-6 py-4">Nom</th>
                                                <th scope="col" class="px-6 py-4">Note CC</th>
                                                <th scope="col" class="px-6 py-4">Note Examen</th>
                                                <th scope="col" class="px-6 py-4">Note Rattrapage</th>
                                                <th scope="col" class="px-6 py-4">Note Semestriel</th>

                                                <!-- <th scope="col" class="px-6 py-4">Index</th> -->
                                            </tr>
                                        </thead>
                                        <style>
                                            .center-placeholder {
                                                text-align: center;

                                                ::placeholder {
                                                    text-align: center;
                                                }
                                            }
                                        </style>
                                        <tbody>
                                            @forelse($course_students as $course_student)
                                            <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-300 dark:border-neutral-300 dark:hover:bg-neutral-200 bg-neutral-100 even:bg-neutral-200">
                                                <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $course_student->id }}</td>
                                                <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                    <a href="{{ URL::to('generateTranscript/'. $course_student->student->id) }}" target="_blank">
                                                        <x-primary-button wire:change="generateTranscript({{$a_year}})" class=" ml-3">
                                                            {{ __('Relever') }}
                                                        </x-primary-button>
                                                    </a>
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $course_student->student->matricule }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">{{ $course_student->student->name }} {{ $course_student->student->id }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    <input id="number-input" placeholder="{{ old('ca_marks.'.$course_student->id, $course_student->ca_marks) }}" type="number" wire:key="{{ $course_student->id }}" wire:model="ca_marks.{{ $course_student->id }}" class="center-placeholder rounded focus:border-x-0 focus:border-t-0 border-b-2 border-neutral-300">
                                                </td>

                                                <td class="whitespace-nowrap px-6 py-4">
                                                    <input placeholder="{{ old('exam_mark.'.$course_student->id, $course_student->exam_marks) }}" type="number" wire:key="{{ $course_student->id }}" wire:model="exam_mark.{{ $course_student->id }}" class="center-placeholder rounded focus:border-x-0 focus:border-t-0 border-b-2 border-neutral-300">
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    <input placeholder="{{ old('reseat_mark.'.$course_student->id, $course_student->reseat_mark) }}" type="number" wire:key="{{ $course_student->id }}" wire:model="reseat_mark.{{ $course_student->id }}" class="center-placeholder rounded focus:border-x-0 focus:border-t-0 border-b-2 border-neutral-300">
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    <input placeholder="{{ $course_student->average }}" type="number" wire:key="{{ $course_student->id }}" class="center-placeholder rounded focus:border-x-0 focus:border-t-0 border-b-2 border-neutral-300">
                                                </td>
                                                <!-- <td>
                                    <input type="text" placeholder="{{ $course_student->id }}" wire:model="course_student_id" class="center-placeholder rounded focus:border-x-0 focus:border-t-0 border-b-2 border-neutral-300">
                                </td> -->
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="8" class="whitespace-nowrap px-6 py-4">No Students found</td>
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
        </div>
    </div>
</div>