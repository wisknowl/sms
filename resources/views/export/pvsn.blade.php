<html>

<body>

    <table border="0px" class="table" style="text-align: center;">
        <thead>
            <tr class=" ">
                <td colspan="3"></td>
                @foreach($ues as $ue)
                @php($n=0)
                @foreach($courses as $course)
                @if($ue->id == $course->ue_id)
                @php($n = $n+6)
                @endif
                @endforeach
                <th class=" " colspan="{{ $n }}"><b>{{ $ue->code }} {{ $ue->name }}</b></th>
                <th colspan="3" style="background-color: lightgray;"></th>
                @endforeach
                <th></th>
            </tr>
            <tr style="font-size: small;">
                <td colspan="3"></td>
                @foreach($ues as $ue)
                @foreach($courses as $course)
                @if($course->ue_id == $ue->id)
                <th colspan="6"><b>{{$course->code}} {{$course->name}}</b></th>
                @endif
                @endforeach
                <th colspan="3" style="background-color: lightgray;"><b>Result UC</b></th>
                @endforeach
                <th></th>
                <th colspan="5" style="background-color: lightgray;"><b>DECISION FINALE</b></th>
            </tr>
            <tr style="font-size: x-small;">
                <th><b>#</b></th>
                <th><b>Matricule</b></th>
                <th><b>Noms</b></th>
                @foreach($ues as $ue)
                @foreach($courses as $course)
                @if($course->ue_id == $ue->id)
                <th><b>CC</b></th>
                <th><b>EXAM</b></th>
                <th><b>Moyenne</b></th>
                <th><b>Grade</b></th>
                <th><b>Credit</b></th>
                <th><b>Dec</b></th>
                @endif
                @endforeach
                <th style="background-color: lightgray;"><b>Moyenne</b></th>
                <th style="background-color: lightgray;"><b>Credit</b></th>
                <th style="background-color: lightgray;"><b>Dec</b></th>
                @endforeach
                <th></th>
                <th><b>Matricule</b></th>
                <th><b>Noms</b></th>
                <th><b>Moyenne Semestrielle</b></th>
                <th><b>Crédit Obtenu</b></th>
                <th><b>Décision</b></th>
            </tr>
        </thead>
        <tbody>

            @php($st_count=1)
            @foreach($students as $student)
                @foreach($student->levels as $level)
                    @if($level->id == $level_id)
                        <tr class=" " style="font-size: small;">
                            <td><b>{{$st_count}}</b></td>
                            <td><b>{{$student->matricule}}</b></td>
                            <td><b>{{$student->name}}</b></td>

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

                                                        <td>{{ $st_course->ca_marks }}</td>
                                                        <td>{{$st_course->exam_marks}}</td>
                                                        
                                                        @if($st_course->exam_marks < $st_course->reseat_mark)
                                                            @php($courseavg = (((((($st_course->ca_marks) / 20) * 30) + ((($st_course->reseat_mark) / 20) * 70)) / 100) * 20))
                                                            <td>{{ $courseavg }}</td>
                                                        @else
                                                            @php($courseavg = (((((($st_course->ca_marks) / 20) * 30) + ((($st_course->exam_marks) / 20) * 70)) / 100) * 20))
                                                            <td>{{ $courseavg }}</td>
                                                        @endif

                                                        @if($courseavg < 0 || $courseavg == 0)
                                                            <td>F</td>
                                                        @elseif($courseavg > 0 && $courseavg < 6.5)
                                                            <td>F</td>
                                                        @elseif($courseavg == 6.5 || ($courseavg > 6.5 && $courseavg < 8.5))
                                                            <td>D</td>
                                                        @elseif($courseavg == 8.5 || ($courseavg > 8.5 && $courseavg < 10))
                                                            <td>C-</td>
                                                        @elseif($courseavg == 10 || ($courseavg > 10 && $courseavg < 11.5))
                                                            <td>C</td>
                                                        @elseif($courseavg == 11.5 || ($courseavg > 11.5 && $courseavg < 13.5))
                                                            <td>C+</td>
                                                        @elseif($courseavg == 13.5 || ($courseavg > 13.5 && $courseavg < 15))
                                                            <td>B-</td>
                                                        @elseif($courseavg == 15 || ($courseavg > 15 && $courseavg < 16.5))
                                                            <td>B</td>
                                                        @elseif($courseavg == 16.5 || ($courseavg > 16.5 && $courseavg < 18.5))
                                                            <td>B+</td>
                                                        @elseif($courseavg == 18.5 || ($courseavg > 18.5 && $courseavg < 19.5))
                                                            <td>A</td>
                                                        @else
                                                            <td>A+</td>
                                                        @endif

                                                        @if($courseavg >= 10)
                                                            @php($check = $st_course->course->credit_points)
                                                            <td>{{ $check }}</td>
                                                        @else
                                                            @php($check = 0)
                                                            <td>{{$check}}</td>
                                                        @endif
                                                        @if($check == 0)
                                                            <td>NV</td>
                                                        @else
                                                            <td>VA</td>
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
                                <td style="background-color: lightgray;">{{ number_format(ceil($ue_mark * 100) / 100, 2, '.', '')}}</td>
                                <td style="background-color: lightgray;">{{$check_credit_sum}}</td>

                                @if($ue_mark >= 10)
                                 <td style="background-color: lightgray;">VA</td>
                                @else
                                    <td style="background-color: lightgray;">NV</td>
                                @endif
                                
                                @php($ue_credit_multiply = $ue_mark * $ue->credit_points)
                                @php($ue_sum = $ue_sum + $ue_credit_multiply)
                                @php($ue_credit_sum = $ue_credit_sum + $ue->credit_points)
                                @php($credit_obtained = $credit_obtained + $check_credit_sum)

                            @endforeach
                            <td></td>
                            <td><b>{{$student->matricule}}</b></td>
                            <td><b>{{$student->name}}</b></td>
                            @php($semester_avg = $ue_sum / $ue_credit_sum)
                            <td>{{ number_format(ceil($semester_avg * 100) / 100, 2, '.', '') }}</td>
                            <td>{{$credit_obtained}}</td>
                            @if($credit_obtained == 30)
                            <td>Fermé</td>
                            @else
                            <td>Non Fermé</td>
                            @endif
                        </tr>
                        @php($st_count=$st_count+1)
                    @endif
                @endforeach
            @endforeach

        </tbody>
    </table>
</body>

</html>