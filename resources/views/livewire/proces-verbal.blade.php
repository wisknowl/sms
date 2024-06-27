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
                {{ __('Proces Verbal') }}
            </h2>
        </div>
        <div class="flex justify-end">
            @if($pvmod == 1)
            <a href="{{ URL::to('exportpvcc/'. $specialty. '/' . $levelmod . '/' . $semestermod . '/' . $academic_year_mod)  }}">
                <x-primary-button wire:change="" class=" ml-3">
                    {{ __('Imprimer') }}
                </x-primary-button>
            </a>
            @elseif($pvmod == 2)
            <a href="{{ URL::to('exportpvsn/'. $specialty. '/' . $levelmod . '/' . $semestermod . '/' . $academic_year_mod)  }}">
                <x-primary-button wire:change="" class=" ml-3">
                    {{ __('Imprimer') }}
                </x-primary-button>
            </a>
            @else
            <a href="{{ URL::to('exportpvblanc/'. $specialty. '/' . $levelmod . '/' . $semestermod . '/' . $academic_year_mod)  }}">
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
                        <select wire:model="specialty" mul wire:change="updatePV" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm !important">
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
                        <div class=" p-1 rounded bg-white">
                            <input id="1" type="radio" wire:model="pvmod" wire:click="updatePV" value="1" name="PV" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label>PV_CC</label>
                        </div>
                        <div class="bg-white p-1 rounded">
                            <input id="2" type="radio" wire:model="pvmod" wire:click="updatePV" value="2" name="PV" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label>PV_SN</label>
                        </div>
                        <div class="bg-white p-1 rounded">
                            <input id="3" type="radio" wire:model="pvmod" wire:click="updatePV" value="3" name="PV" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label>PV_BLANC</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 mt-4">
            <div class="py-2 flex justify-center items-center whitespace-nowrap rounded bg-white text-black text-sm font-medium uppercase">
                @if($pvmod == 1)
                Procés Verbal Control Continu
                @elseif($pvmod == 2)
                Procés Verbal session normale
                @else
                Procés Verbal bts blanc
                @endif
            </div>
        </div>

        <div class="flex flex-col mt-1">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="w-full overflow-hidden border rounded">

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
                                    <th colspan="{{ $n }}" class=" px-4 py-2 border"><b>{{ $ue->code }} {{ $ue->name }} | Credit {{ $ue->credit_points }}</b></th>
                                    @endforeach
                                </tr>
                                <tr style="font-size: small;">
                                    <td colspan="3" class=" px-4 py-2 border"></td>
                                    @foreach($courses as $course)
                                    <th class=" px-4 py-2 border"><b>{{$course->code}} {{$course->name}} | Credit {{ $course->credit_points }}</b></th>
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
                        @elseif($pvmod == 2)

                        <table border="0px" class="" style="text-align: center;">
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
                                    <th colspan="{{ $n }}" class="px-4 py-2 border"><b>{{ $ue->code }} {{ $ue->name }} | Credit {{ $ue->credit_points }}</b></th>
                                    <th colspan="3" class="px-4 py-2 border"></th>
                                    @endforeach
                                    <th class="px-4 py-2"></th>
                                </tr>
                                <tr style="font-size: small;">
                                    <td colspan="3" class="px-4 py-2"></td>
                                    @foreach($ues as $ue)
                                    @foreach($courses as $course)
                                    @if($course->ue_id == $ue->id)
                                    <th colspan="6" class="px-4 py-2 border"><b>{{$course->code}} {{$course->name}} | Credit {{ $course->credit_points }}</b></th>
                                    @endif
                                    @endforeach
                                    <th colspan="3" class="whitespace-nowrap px-4 py-2" style="background-color: lightgray;"><b>Result UE</b></th>
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
                                @php($studentData = array())
                                @php($st_count=1)
                                @foreach($students as $student)
                                @php($failedCourses = array())

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
                                    @if($st_course->exam_marks > $st_course->reseat_mark)
                                    <td class="whitespace-nowrap px-4 py-2 border">{{$st_course->exam_marks}}</td>
                                    @else
                                    <td class="whitespace-nowrap px-4 py-2 border">{{$st_course->reseat_mark}}</td>
                                    @endif

                                    @if($st_course->exam_marks < $st_course->reseat_mark)
                                        @php($courseavg = (((((($st_course->ca_marks) / 20) * 30) + ((($st_course->reseat_mark) / 20) * 70)) / 100) * 20))
                                        <td class="whitespace-nowrap px-4 py-2 border">{{ $courseavg }}</td>
                                        @else
                                        @php($courseavg = (((((($st_course->ca_marks) / 20) * 30) + ((($st_course->exam_marks) / 20) * 70)) / 100) * 20))
                                        @if ($courseavg < 10)
                                        <td class="whitespace-nowrap px-4 py-2 border bg-red-200">{{ $courseavg }}</td>
                                        @else
                                        <td class="whitespace-nowrap px-4 py-2 border">{{ $courseavg }}</td>
                                        @endif
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
                                                                                @if($courseavg < 10)
                                                                                <td class="whitespace-nowrap px-4 py-2 border">NV</td>
                                                                                @else
                                                                                <td class="whitespace-nowrap px-4 py-2 border">VA</td>
                                                                                @endif
                                                                                <!-- Determining Ratrapage -->
                                                                                @if($courseavg < 7) @php($failedCourses[]=$st_course->course->name)
                                                                                    @endif
                                                                                <!-- Determining Ratrapage -->

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
                                                                                        <td class="whitespace-nowrap px-4 py-2 border" style="background-color: lightgray;">{{ number_format(ceil($ue_mark * 100) / 100, 2, '.', '')}}</td>
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

                                                                                        @php($studentData[$student->id] = $failedCourses)
                                                                                        @endforeach
                                                                                        <td class="whitespace-nowrap px-4 py-2"></td>
                                                                                        <th class="whitespace-nowrap px-4 py-2 border"><b>{{$student->matricule}}</b></th>
                                                                                        <th class="whitespace-nowrap px-4 py-2 border"><b>{{$student->name}}</b></th>
                                                                                        @php($semester_avg = $ue_sum / $ue_credit_sum)
                                                                                        <td class="whitespace-nowrap px-4 py-2 border">{{ number_format(ceil($semester_avg * 100) / 100, 2, '.', '') }}</td>
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

                                <tr style="font-size: small;">
                                    <td colspan="3" class="px-4 py-2"></td>
                                    @foreach($ues as $ue)
                                    @foreach($courses as $course)
                                    @if($course->ue_id == $ue->id)
                                    @php($sum_marks = 0)
                                    @foreach($students as $student)
                                    @foreach($st_courses as $st_course)
                                    @if($st_course->student_id == $student->id)
                                    @if($st_course->course->ue_id == $ue->id)
                                    @if($st_course->course->id == $course->id)
                                    @php($sum_marks = $sum_marks + $st_course->exam_marks)
                                    @endif
                                    @endif
                                    @endif
                                    @endforeach
                                    @endforeach
                                    <th colspan="6" class="px-4 py-2 border"><b>{{$sum_marks}}</b></th>
                                    @endif
                                    @endforeach
                                    <th colspan="3" class="whitespace-nowrap px-4 py-2" style="background-color: lightgray;"><b>Result UE</b></th>
                                    @endforeach
                                    <th class="whitespace-nowrap px-4 py-2"></th>
                                    <th colspan="5" class="whitespace-nowrap px-4 py-2 border" style="background-color: lightgray;"><b>DECISION FINALE</b></th>
                                </tr>
                            </tbody>
                        </table>
                        @else

                        <table class="min-w-full text-center text-sm font-light">
                            <thead>

                                <tr style="font-size: small;">
                                    <td colspan="3" class=" px-4 py-2 border"></td>
                                    @foreach($papers as $paper)
                                    <th class=" px-4 py-2 border"><b>{{$paper->code}} {{$paper->name}} | Credit {{ $paper->credit_points }}</b></th>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th class="whitespace-nowrap px-4 py-2 border"><b>#</b></th>
                                    <th class="whitespace-nowrap px-4 py-2 border"><b>Matricule</b></th>
                                    <th class="whitespace-nowrap px-4 py-2 border"><b>Noms</b></th>
                                    @foreach($papers as $paper)
                                    <th class="whitespace-nowrap px-4 py-2 border"><b>Note/20</b></th>
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
                                    <th class="whitespace-nowrap px-4 py-2 border" data-twe-width="100" data-twe-fixed="true"><b>{{$student->name}}</b></th>
                                    @foreach($papers as $paper)

                                    @foreach($student_papers as $st_paper)
                                    @if($st_paper->paper->id == $paper->id)

                                    @if($st_paper->student_id == $student->id)
                                    @php($ca = $st_paper->mark)
                                    @if($ca == 0)
                                    <td class="whitespace-nowrap px-4 py-2 border"></td>
                                    @else
                                    <td class="whitespace-nowrap px-4 py-2 border">{{ $st_paper->mark }}</td>
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
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @if($pvmod == 2)
        <div class="flex flex-col mt-3">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="w-full overflow-hidden border rounded">
                        <div class="grid grid-cols-1">
                            <div class="py-2 flex justify-center items-center whitespace-nowrap rounded bg-white text-black text-sm font-medium uppercase">
                                Rattrapage
                            </div>
                        </div>
                        <table class="min-w-full text-center text-sm font-light">
                            @foreach($students as $student)
                            <tr class="border">
                                <th class="whitespace-nowrap px-4 py-2 border">
                                    {{$student->name}}
                                </th>
                                @if (array_key_exists($student->id, $studentData))
                                <td class="whitespace-nowrap px-4 py-2 border">
                                    <table class="min-w-full text-center text-sm font-light">
                                        @if(!empty($studentData[$student->id]))
                                        @foreach($studentData[$student->id] as $failedCourse)
                                        <tr class="whitespace-nowrap px-4 py-2 border">
                                            <td>
                                                {{$failedCourse}}
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr class="whitespace-nowrap px-4 py-2 border">
                                            <td>
                                                Aucun Cours a rattraper
                                            </td>
                                        </tr>
                                        @endif
                                    </table>
                                </td>
                                @endif
                            </tr>

                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>