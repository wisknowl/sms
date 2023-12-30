<div class="mb-4 p-6">
    <!-- @notifyCss -->
    <script>
        document.addEventListener('livewire:load', function() {
            function validate(str, min, max) {
                // convert the input string to a number
                var n = parseFloat(str);
                // check if the number is valid and within the range
                if (!isNaN(n) && n >= min && n <= max) {
                    // return the number as valid
                    return n;
                } else {
                    // return null as invalid
                    return null;
                }
            }

            function validateInput() {
                // get the input element by its id
                var input = document.getElementById("number-input");
                // get the input value
                var value = input.value;
                // validate the input value using the validate function
                var valid = validate(value, 0, 20);
                // if the input value is valid, set it as the input value
                if (valid !== null) {
                    input.value = valid;
                } else {
                    // if the input value is invalid, clear the input value
                    input.value = "";
                }
            }
        })
    </script>
    <x-notify::notify />
    <!-- @notifyJs -->
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
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
                <select wire:model="cycle" wire:change="updateSpecialties" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm !important">
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
                    <select wire:model="specialty" wire:change="updateLevels" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm !important">
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
                <select wire:model="level" wire:change="updateSemesters" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm !important">
                    @isset($levels)
                    @foreach($levels as $level)
                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                    @endforeach
                    @endisset
                </select>
            </div>
        </div>
        <div class="py-4 grid grid-cols-3 gap-6">
            <div>
                <label>Semestre</label>
                <select wire:model="semester" wire:change="updateCourses" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm !important">
                    @isset($semesters)
                    @foreach($semesters as $semester)
                    <option value="{{ $semester->id }}">{{ $semester->name }}</option>
                    @endforeach
                    @endisset
                </select>
            </div>
            <div>
                <label>Cours</label>
                <select wire:model="course" wire:change="updateStudents" name="course_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm !important">
                    @isset($courses)
                    @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->code }} | {{ $course->name }}</option>
                    @endforeach
                    @endisset
                </select>
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
                            @isset($course_students)
                            @foreach($course_students as $course_student)
                            <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-300 dark:hover:bg-neutral-200">
                                <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $course_student->id }}</td>
                                <td class="whitespace-nowrap px-6 py-4 font-medium">
                                    <a href="{{ URL::to('generateTranscript/'. $course_student->student->id) }}">
                                        <x-primary-button wire:change="generateTranscript({{$a_year}})" class=" ml-3">
                                            {{ __('Relever') }}
                                        </x-primary-button>
                                    </a>
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $course_student->student->matricule }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $course_student->student->name }}</td>
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
                            @endforeach
                            @endisset
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    function validate(str, min, max) {
        // convert the input string to a number
        var n = parseFloat(str);
        // check if the number is valid and within the range
        if (!isNaN(n) && n >= min && n <= max) {
            // return the number as valid
            return n;
        } else {
            // return null as invalid
            return null;
        }
    }

    function validateInput() {
        // get the input element by its id
        var input = document.getElementById("number-input");
        // get the input value
        var value = input.value;
        // validate the input value using the validate function
        var valid = validate(value, 0, 20);
        // if the input value is valid, set it as the input value
        if (valid !== null) {
            input.value = valid;
        } else {
            // if the input value is invalid, clear the input value
            input.value = "";
        }
    }
</script>
@endpush