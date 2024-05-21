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
                {{ __('Saisie De Notes') }}
            </h2>
        </div>
        <div class="flex justify-end">
            @if($course_paper == 1)
            <button wire:click="updateMarks" class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" data-te-ripple-init data-te-ripple-color="light">Enregistrer</button>
            @else
            <button wire:click="update_bts_marks" class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" data-te-ripple-init data-te-ripple-color="light">Enregistrer</button>
            @endif
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
                        <select wire:model="specialty" mul wire:change="updateCourses" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm !important">
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
                    <select wire:model="level" mul wire:change="updateCourses" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm !important">
                        @isset($levels)
                        @foreach($levels as $level)
                        <option value="{{ $level->id }}">Niveau {{ $level->name }}</option>
                        @endforeach
                        @endisset
                    </select>
                </div>
                <div>
                    <div class="mt-1 flex items-center">
                        <div class="mr-3 rounded flex items-center">
                            <input id="1" type="radio" wire:model="course_paper" wire:click="updateCP" value="1" name="PV" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label>EC</label>
                        </div>
                        <div class="rounded flex items-center">
                            <input id="2" type="radio" wire:model="course_paper" wire:click="updatePapers" value="2" name="PV" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label>Epreuve BTS Blanc</label>
                        </div>
                    </div>
                    @if($course_paper == 1)
                    <select wire:model.lazy.500ms="coursemod" mul wire:change="updateStudents" name="course_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm !important">
                        @isset($courses)
                        @php($sum_credit = 0)
                        @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->code }} | {{ strtoupper($course->name) }} ___ {{$course->credit_points}}</option>
                        @php($sum_credit = $sum_credit + $course->credit_points)
                        @endforeach
                        <option value="1" class="text-bold">Crédit Total : {{$sum_credit}}</option>
                        @else
                        <option value="0">Aucun cours trouver</option>
                        @endisset
                    </select>
                    @else
                    <select wire:model.lazy.500ms="papermod" mul wire:change="updateStudentsBts" name="paper_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm !important">
                        @isset($papers)
                        @php($sum_credit = 0)
                        @foreach($papers as $paper)
                        <option value="{{ $paper->id }}">{{ strtoupper($paper->name) }} ___ {{$paper->credit_points}}</option>
                        @php($sum_credit = $sum_credit + $paper->credit_points)
                        @endforeach
                        <option value="1" class="text-bold">Crédit Total : {{$sum_credit}}</option>
                        @else
                        <option value="0">Aucun Epreuve trouver</option>
                        @endisset
                    </select>
                    @endif
                </div>
            </div>
            <div class="pb-4 grid grid-cols-4 gap-4">
                <button id="dropdownRadioBgHoverButton" data-dropdown-toggle="delib" class="flex justify-evenly items-center whitespace-nowrap rounded bg-white  pb-1 pt-1.5 text-xs font-medium uppercase leading-normal text-neutral-800 shadow-[0_4px_9px_-4px_#fbfbfb] transition duration-150 ease-in-out hover:bg-neutral-100 hover:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] focus:bg-neutral-100 focus:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] focus:outline-none focus:ring-0 active:bg-neutral-200 active:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] motion-reduce:transition-none" type="button">
                    Saisir La note de Déliberation
                    <svg class="w-2.5 h-2.5 ms-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                    </svg>
                </button>
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
                        @if($course_paper == 1)

                        <table class="min-w-full text-center text-sm font-light">
                            <thead class="border-b font-medium dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-4 py-1 border">#</th>
                                    <th scope="col" class="px-4 py-1 border">Matricule</th>
                                    <th scope="col" class="px-4 py-1 border">Nom</th>
                                    <th scope="col" class="px-4 py-1 border">Note CC</th>
                                    <th scope="col" class="px-4 py-1 border">Note Examen</th>
                                    <th scope="col" class="px-4 py-1 border">Note Rattrapage</th>
                                    <th scope="col" class="px-4 py-1 border">Note Semestriel</th>

                                    <!-- <th scope="col" class="px-4 py-1 border">Index</th> -->
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
                                @php($count = 1)
                                @forelse($course_students as $course_student)
                                <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-300 dark:border-neutral-300 dark:hover:bg-neutral-200 bg-neutral-100 even:bg-neutral-200">
                                    <td class="whitespace-nowrap px-4 py-1 border font-medium">{{ $count }}</td>

                                    <td class="whitespace-nowrap px-4 py-1 border font-medium">{{ $course_student->student->matricule }}</td>
                                    <td class="whitespace-nowrap px-4 py-1 border">{{ $course_student->student->name }}</td>
                                    @if($count % 2 == 0)
                                    <td class="whitespace-nowrap px-4 py-1 border">
                                        <input id="number-input" placeholder="{{ old('ca_marks.'.$course_student->id, $course_student->ca_marks) }}" type="number" wire:key="{{ $course_student->id }}" wire:model="ca_marks.{{ $course_student->id }}" class="center-placeholder rounded focus:border-x-0 py-0 px-2 w-full focus:border-t-0 border-0 bg-neutral-200">
                                    </td>

                                    <td class="whitespace-nowrap px-4 py-1 border">
                                        <input placeholder="{{ old('exam_mark.'.$course_student->id, $course_student->exam_marks) }}" type="number" wire:key="{{ $course_student->id }}" wire:model="exam_mark.{{ $course_student->id }}" class="center-placeholder rounded focus:border-x-0 focus:border-t-0 py-0 px-2 w-full border-0 bg-neutral-200">
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-1 border">
                                        <input placeholder="{{ old('reseat_mark.'.$course_student->id, $course_student->reseat_mark) }}" type="number" wire:key="{{ $course_student->id }}" wire:model="reseat_mark.{{ $course_student->id }}" class="center-placeholder rounded focus:border-x-0 focus:border-t-0 py-0 px-2 w-full border-0 bg-neutral-200">
                                    </td>
                                    @if($course_student->exam_marks < $course_student->reseat_mark)
                                        @php($courseavg = (((((($course_student->ca_marks) / 20) * 30) + ((($course_student->reseat_mark) / 20) * 70)) / 100) * 20))
                                        <td class="whitespace-nowrap px-4 py-1 border">{{ $courseavg }}</td>
                                        @else
                                        @php($courseavg = (((((($course_student->ca_marks) / 20) * 30) + ((($course_student->exam_marks) / 20) * 70)) / 100) * 20))
                                        <td class="whitespace-nowrap px-4 py-1 border">{{ $courseavg }}</td>
                                        @endif

                                        @else
                                        <td class="whitespace-nowrap px-4 py-1 border">
                                            <input id="number-input" placeholder="{{ old('ca_marks.'.$course_student->id, $course_student->ca_marks) }}" type="number" wire:key="{{ $course_student->id }}" wire:model="ca_marks.{{ $course_student->id }}" class="center-placeholder rounded focus:border-x-0 py-0 px-2 w-full focus:border-t-0 border-0 bg-neutral-100">
                                        </td>

                                        <td class="whitespace-nowrap px-4 py-1 border">
                                            <input placeholder="{{ old('exam_mark.'.$course_student->id, $course_student->exam_marks) }}" type="number" wire:key="{{ $course_student->id }}" wire:model="exam_mark.{{ $course_student->id }}" class="center-placeholder rounded focus:border-x-0 focus:border-t-0 py-0 px-2 w-full border-0 bg-neutral-100">
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-1 border">
                                            <input placeholder="{{ old('reseat_mark.'.$course_student->id, $course_student->reseat_mark) }}" type="number" wire:key="{{ $course_student->id }}" wire:model="reseat_mark.{{ $course_student->id }}" class="center-placeholder rounded focus:border-x-0 focus:border-t-0 py-0 px-2 w-full border-0 bg-neutral-100">
                                        </td>

                                        @if($course_student->exam_marks < $course_student->reseat_mark)
                                            @php($courseavg = (((((($course_student->ca_marks) / 20) * 30) + ((($course_student->reseat_mark) / 20) * 70)) / 100) * 20))
                                            <td class="whitespace-nowrap px-4 py-1 border">{{ $courseavg }}</td>
                                            @else
                                            @php($courseavg = (((((($course_student->ca_marks) / 20) * 30) + ((($course_student->exam_marks) / 20) * 70)) / 100) * 20))
                                            <td class="whitespace-nowrap px-4 py-1 border">{{ $courseavg }}</td>
                                            @endif

                                            @endif

                                            <!-- <td>
                            <input type="text" placeholder="{{ $course_student->id }}" wire:model="course_student_id" class="center-placeholder rounded focus:border-x-0 focus:border-t-0 border-0">
                        </td> -->
                                </tr>
                                @php($count = $count + 1)
                                @empty
                                <tr>
                                    <td colspan="8" class="whitespace-nowrap px-4 py-1 border">Aucun Etudiant trouver</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        @else
                        <table class="min-w-full text-center text-sm font-light">
                            <thead class="border-b font-medium dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-4 py-1 border">#</th>
                                    <th scope="col" class="px-4 py-1 border">Matricule</th>
                                    <th scope="col" class="px-4 py-1 border">Nom</th>
                                    <th scope="col" class="px-4 py-1 border">Note BTS Blanc</th>
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
                                @php($count = 1)
                                @forelse($paper_students as $paper_student)
                                <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-300 dark:border-neutral-300 dark:hover:bg-neutral-200 bg-neutral-100 even:bg-neutral-200">
                                    <td class="whitespace-nowrap px-4 py-1 border font-medium">{{ $count }}</td>

                                    <td class="whitespace-nowrap px-4 py-1 border font-medium">{{ $paper_student->student->matricule }}</td>
                                    <td class="whitespace-nowrap px-4 py-1 border">{{ $paper_student->student->name }}</td>
                                    @if($count % 2 == 0)
                                    <td class="whitespace-nowrap px-4 py-1 border">
                                        <input id="number-input" placeholder="{{ old('mark.'.$paper_student->id, $paper_student->mark) }}" type="number" wire:key="{{ $paper_student->id }}" wire:model="mark.{{ $paper_student->id }}" class="center-placeholder rounded focus:border-x-0 py-0 px-2 w-full focus:border-t-0 border-0 bg-neutral-200">
                                    </td>

                                    @else
                                    <td class="whitespace-nowrap px-4 py-1 border">
                                        <input id="number-input" placeholder="{{ old('mark.'.$paper_student->id, $paper_student->mark) }}" type="number" wire:key="{{ $paper_student->id }}" wire:model="mark.{{ $paper_student->id }}" class="center-placeholder rounded focus:border-x-0 py-0 px-2 w-full focus:border-t-0 border-0 bg-neutral-100">
                                    </td>

                                    @endif

                                </tr>
                                @php($count = $count + 1)
                                @empty
                                <tr>
                                    <td colspan="8" class="whitespace-nowrap px-4 py-1 border">Aucun Etudiant trouver</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>