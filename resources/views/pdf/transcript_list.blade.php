<!DOCTYPE html>
<html>

<head>
    <style>
        @page {
            margin: 0.3in;
        }

        .divb {
            border: 1px solid black;
            padding: 2px;
        }

        img {
            width: 45%;
            height: 6%;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .trf-11 {
            font-size: 11px;
        }

        .tdp {
            padding: 0px;
        }

        .ta {
            text-align: center;
        }

        .border-0 {
            border: none;
        }

        .wordwrap-nowrap {
            word-wrap: initial;
        }
    </style>
</head>

<body>
    @foreach($transcriptArray as $transcript)
    <div style="page-break-inside: avoid;">
        <div class="divb">
            <table class="table" style="text-align: center;">
                <tr class="trf-11">
                    <td>Republique du Cameroun</td>
                    <td rowspan="4"><img src="{{ public_path('img/isig.png') }}"></td>
                    <td>Republic of Cameroon</td>
                </tr>
                <tr class="trf-11">
                    <td>Paix - Travail - Patrie</td>
                    <td>Peace - Work - Fatherland</td>
                </tr>
                <tr class="trf-11">
                    <td>Ministère de L'Enseignement Supérieur</td>
                    <td>Ministry of Higher Education</td>
                </tr>
                <tr style="font-size: 10px;">
                    <td class="wordwrap-nowrap">INSTITUT SUPERIEUR D'INFORMATIQUE ET DE GESTION</td>
                    <td class="wordwrap-nowrap">HIGHER INSTITUTE OF MANAGEMENT AND COMPUTER SCIENCE</td>
                </tr>
                <tr>
                    <td colspan="3" style="font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif;">
                        @if($transcript['tdr'] == 2)
                        {{ __('transcript.a_transcript') }}
                        @else
                        {{ __('transcript.transcript') }}
                        @endif
                    </td>
                </tr>
            </table>
        </div>
        <div>
            <table class="table" style="padding: 2px;">
                <tr style="font-size: 11px;">
                    <td><label for="">{{ __('transcript.name') }} : </label><span>{{ $transcript['credential']->name }}</span></td>
                    <td><label for="">{{ __('transcript.matricule') }} : </label><span>{{ $transcript['credential']->matricule }}</span></td>
                    <td><label for="">{{ __('transcript.year') }} : </label><span>{{ $transcript['academic_year'] }}</span></td>
                </tr>
                <tr style="font-size: 11px;">
                    <td><label for="">{{ __('transcript.dob') }} : </label><span>{{ date('d/m/Y', strtotime($transcript['credential']->dob)) }}</span></td>
                    <td><label for="">{{ __('transcript.pob') }} : </label><span>{{ $transcript['credential']->pob }}</span></td>
                    <td><label for="">Cycle: </label><span>{{ $transcript['credential']->cycle->name }}</span></td>
                </tr>
                <tr style="font-size: 11px;">
                    <td colspan="2"><label for="">{{ __('transcript.specialty') }} : </label><span>{{ $transcript['credential']->specialty->name }}</span></td>
                    <td><label for="">{{ __('transcript.level') }} : </label><span>{{ $transcript['level'] }}</span></td>
                </tr>
            </table>
        </div>
        <div class="container mt-5">
            <table border="0px" class="table">
                <thead style="background-color: lightgray;text-align:center; font-size:10px;">
                    <tr class="table-danger">
                        <th>Unit code</th>
                        <th>Course code</th>
                        <th>Course title</th>
                        <th>Planned Credit</th>
                        <th>Mark/20</th>
                        <th>Earned Credit</th>
                        <th>Grade</th>
                        <th>Decision</th>
                        <th>Session</th>
                    </tr>
                </thead>
                <tbody style="background-color: white; text-align: center; font-size: 10px;">
                    @php($total_credit_obtain=0)
                    @php($total_credit=0)
                    @foreach($transcript['semesters'] as $semester)
                    @if($transcript['tdr'] == 1 && $transcript['semester_mod'] == $semester->name)
                    @php($course_credit_sum=0)
                    @php($credit = $sumavg = $count = $ue_credit_sum = 0)
                    @foreach($transcript['course_natures'] as $course_nature)

                    <tr style="font-size: 9px; text-align: center; background-color:lightblue">
                        <td class="border-0"></td>
                        <td class="border-0"></td>
                        <td class="border-0" style="text-align: left;">{{$course_nature->id}}-{{ strtoupper($course_nature->name) }}</td>
                        <td class="border-0"></td>
                        <td class="border-0"></td>
                        <td class="border-0"></td>
                        <td class="border-0"></td>
                        <td class="border-0"></td>
                        <td class="border-0"></td>
                    </tr>
                    @foreach($transcript['st_ues'] as $st_ue)
                    @if($semester->id == $st_ue->ue->semester_id && $course_nature->id == $st_ue->ue->course_nature_id)
                    <tr style="font-size: 10px; text-align: center; ">
                        <td>{{ $st_ue->ue->code }}</td>
                        <td></td>
                        <td style="text-align: left;font-weight:bold;">{{ $st_ue->ue->name }}</td>
                        <td></td>
                        @php( $ue_mark = number_format(ceil($st_ue->average * 100) / 100, 2, '.', ''))
                        <td style="font-weight:bold;">{{$ue_mark}}</td>
                        <td style="font-weight:bold;">{{ $st_ue->credit }}</td>
                        @if( $ue_mark < 0 || $ue_mark==0) <td style="font-weight:bold;">F</td>
                            @elseif( $ue_mark > 0 && $ue_mark < 6.5) <td style="font-weight:bold;">F</td>
                                @elseif( $ue_mark == 6.5 || ( $ue_mark > 6.5 && $ue_mark < 8.5)) <td style="font-weight:bold;">D</td>
                                    @elseif( $ue_mark == 8.5 || ( $ue_mark > 8.5 && $ue_mark < 10)) <td style="font-weight:bold;">C-</td>
                                        @elseif( $ue_mark == 10 || ( $ue_mark > 10 && $ue_mark < 11.5)) <td style="font-weight:bold;">C</td>
                                            @elseif( $ue_mark == 11.5 || ( $ue_mark > 11.5 && $ue_mark < 13.5)) <td style="font-weight:bold;">C+</td>
                                                @elseif( $ue_mark == 13.5 || ( $ue_mark > 13.5 && $ue_mark < 15)) <td style="font-weight:bold;">B-</td>
                                                    @elseif( $ue_mark == 15 || ( $ue_mark > 15 && $ue_mark < 16.5)) <td style="font-weight:bold;">B</td>
                                                        @elseif( $ue_mark == 16.5 || ( $ue_mark > 16.5 && $ue_mark < 18.5)) <td style="font-weight:bold;">B+</td>
                                                            @elseif( $ue_mark == 18.5 || ( $ue_mark > 18.5 && $ue_mark < 19.5)) <td style="font-weight:bold;">A</td>
                                                                @else
                                                                <td style="font-weight:bold;">A+</td>
                                                                @endif
                                                                @if($ue_mark < 10) <td style="font-weight:bold;">NVA</td>
                                                                    @else
                                                                    <td style="font-weight:bold;">VA</td>
                                                                    @endif
                                                                    <td></td>
                                                                    @php($credit=$credit + $st_ue->credit)
                                                                    @php($ue_multiply = $st_ue->average * $st_ue->ue->credit_points)
                                                                    @php($ue_credit_sum = $ue_credit_sum + $st_ue->ue->credit_points)
                                                                    @php($sumavg = $sumavg + $ue_multiply)
                    </tr>
                    @foreach($transcript['st_courses'] as $st_course)
                    @if($st_ue->ue->id == $st_course->course->ue_id)
                    <tr style="font-size: 10px;">
                        <td></td>
                        <td>{{$st_course->course->code}}</td>
                        <td style="text-align: left;">{{ $st_course->course->name }}</td>
                        <td>{{ $st_course->course->credit_points }}</td>
                        @php($courseavg)
                        @if($st_course->exam_marks < $st_course->reseat_mark)
                            @php($courseavg = (((((($st_course->ca_marks) / 20) * 30) + ((($st_course->reseat_mark) / 20) * 70)) / 100) * 20))
                            <td>{{ $courseavg }}</td>
                            @else
                            @php($courseavg = (((((($st_course->ca_marks) / 20) * 30) + ((($st_course->exam_marks) / 20) * 70)) / 100) * 20))
                            @php($course_mark = number_format(ceil($courseavg * 100) / 100, 2, '.', ''))
                            <td>{{ $course_mark }}</td>
                            @endif
                            @if($course_mark >= 10)
                            <td>{{ $st_course->course->credit_points }}</td>
                            @else
                            <td>0</td>
                            @endif
                            @if( $course_mark < 0 || $course_mark==0) <td>F</td>
                                @elseif( $course_mark > 0 && $course_mark < 6.5) <td>F</td>
                                    @elseif( $course_mark == 6.5 || ( $course_mark > 6.5 && $course_mark < 8.5)) <td>D</td>
                                        @elseif( $course_mark == 8.5 || ( $course_mark > 8.5 && $course_mark < 10)) <td>C-</td>
                                            @elseif( $course_mark == 10 || ( $course_mark > 10 && $course_mark < 11.5)) <td>C</td>
                                                @elseif( $course_mark == 11.5 || ( $course_mark > 11.5 && $course_mark < 13.5)) <td>C+</td>
                                                    @elseif( $course_mark == 13.5 || ( $course_mark > 13.5 && $course_mark < 15)) <td>B-</td>
                                                        @elseif( $course_mark == 15 || ( $course_mark > 15 && $course_mark < 16.5)) <td>B</td>
                                                            @elseif( $course_mark == 16.5 || ( $course_mark > 16.5 && $course_mark < 18.5)) <td>B+</td>
                                                                @elseif( $course_mark == 18.5 || ( $course_mark > 18.5 && $course_mark < 19.5)) <td>A</td>
                                                                    @else
                                                                    <td>A+</td>
                                                                    @endif
                                                                    <td></td>
                                                                    @if($semester->id == 1)
                                                                    <td>SN1</td>
                                                                    @else
                                                                    <td>SN2</td>
                                                                    @endif
                    </tr>
                    @php($course_credit_sum = $course_credit_sum + $st_course->course->credit_points)
                    @endif
                    @endforeach

                    @endif
                    @endforeach
                    @endforeach
                    <tr style="font-size: 10px; background-color:grey;">
                        <th colspan="6">{{ __('transcript.credit_acquired') }} {{ strtoupper($semester->name) }}: {{ $credit }} on {{$course_credit_sum}}</th>
                        <th colspan="3">{{ __('transcript.average') }} : {{ number_format(ceil( $sumavg/$ue_credit_sum * 100) / 100, 2, '.', '') }}</th>
                    </tr>
                    @php($total_credit_obtain += $credit)
                    @php($total_credit += $course_credit_sum)
                    @endif

                    @if($transcript['tdr'] == 2)
                    @php($course_credit_sum=0)
                    @php($credit = $sumavg = $count = $ue_credit_sum = 0)
                    @foreach($transcript['course_natures'] as $course_nature)

                    <tr style="font-size: 9px; text-align: center; background-color:lightblue">
                        <td class="border-0"></td>
                        <td class="border-0"></td>
                        <td class="border-0" style="text-align: left;">{{$course_nature->id}}-{{ strtoupper($course_nature->name) }}</td>
                        <td class="border-0"></td>
                        <td class="border-0"></td>
                        <td class="border-0"></td>
                        <td class="border-0"></td>
                        <td class="border-0"></td>
                        <td class="border-0"></td>
                    </tr>
                    @foreach($transcript['st_ues'] as $st_ue)
                    @if($semester->id == $st_ue->ue->semester_id && $course_nature->id == $st_ue->ue->course_nature_id)
                    <tr style="font-size: 10px; text-align: center; ">
                        <td>{{ $st_ue->ue->code }}</td>
                        <td></td>
                        <td style="text-align: left;font-weight:bold;">{{ $st_ue->ue->name }}</td>
                        <td></td>
                        @php( $ue_mark = number_format(ceil($st_ue->average * 100) / 100, 2, '.', ''))
                        <td style="font-weight:bold;">{{$ue_mark}}</td>
                        <td style="font-weight:bold;">{{ $st_ue->credit }}</td>
                        @if( $ue_mark < 0 || $ue_mark==0) <td style="font-weight:bold;">F</td>
                            @elseif( $ue_mark > 0 && $ue_mark < 6.5) <td style="font-weight:bold;">F</td>
                                @elseif( $ue_mark == 6.5 || ( $ue_mark > 6.5 && $ue_mark < 8.5)) <td style="font-weight:bold;">D</td>
                                    @elseif( $ue_mark == 8.5 || ( $ue_mark > 8.5 && $ue_mark < 10)) <td style="font-weight:bold;">C-</td>
                                        @elseif( $ue_mark == 10 || ( $ue_mark > 10 && $ue_mark < 11.5)) <td style="font-weight:bold;">C</td>
                                            @elseif( $ue_mark == 11.5 || ( $ue_mark > 11.5 && $ue_mark < 13.5)) <td style="font-weight:bold;">C+</td>
                                                @elseif( $ue_mark == 13.5 || ( $ue_mark > 13.5 && $ue_mark < 15)) <td style="font-weight:bold;">B-</td>
                                                    @elseif( $ue_mark == 15 || ( $ue_mark > 15 && $ue_mark < 16.5)) <td style="font-weight:bold;">B</td>
                                                        @elseif( $ue_mark == 16.5 || ( $ue_mark > 16.5 && $ue_mark < 18.5)) <td style="font-weight:bold;">B+</td>
                                                            @elseif( $ue_mark == 18.5 || ( $ue_mark > 18.5 && $ue_mark < 19.5)) <td style="font-weight:bold;">A</td>
                                                                @else
                                                                <td style="font-weight:bold;">A+</td>
                                                                @endif
                                                                @if($ue_mark < 10) <td style="font-weight:bold;">NVA</td>
                                                                    @else
                                                                    <td style="font-weight:bold;">VA</td>
                                                                    @endif
                                                                    <td></td>
                                                                    @php($credit=$credit + $st_ue->credit)
                                                                    @php($ue_multiply = $st_ue->average * $st_ue->ue->credit_points)
                                                                    @php($ue_credit_sum = $ue_credit_sum + $st_ue->ue->credit_points)
                                                                    @php($sumavg = $sumavg + $ue_multiply)
                    </tr>
                    @foreach($transcript['st_courses'] as $st_course)
                    @if($st_ue->ue->id == $st_course->course->ue_id)
                    <tr style="font-size: 10px;">
                        <td></td>
                        <td>{{$st_course->course->code}}</td>
                        <td style="text-align: left;">{{ $st_course->course->name }}</td>
                        <td>{{ $st_course->course->credit_points }}</td>
                        @php($courseavg)
                        @if($st_course->exam_marks < $st_course->reseat_mark)
                            @php($courseavg = (((((($st_course->ca_marks) / 20) * 30) + ((($st_course->reseat_mark) / 20) * 70)) / 100) * 20))
                            <td>{{ $courseavg }}</td>
                            @else
                            @php($courseavg = (((((($st_course->ca_marks) / 20) * 30) + ((($st_course->exam_marks) / 20) * 70)) / 100) * 20))
                            @php($course_mark = number_format(ceil($courseavg * 100) / 100, 2, '.', ''))
                            <td>{{ $course_mark }}</td>
                            @endif
                            @if($course_mark >= 10)
                            <td>{{ $st_course->course->credit_points }}</td>
                            @else
                            <td>0</td>
                            @endif
                            @if( $course_mark < 0 || $course_mark==0) <td>F</td>
                                @elseif( $course_mark > 0 && $course_mark < 6.5) <td>F</td>
                                    @elseif( $course_mark == 6.5 || ( $course_mark > 6.5 && $course_mark < 8.5)) <td>D</td>
                                        @elseif( $course_mark == 8.5 || ( $course_mark > 8.5 && $course_mark < 10)) <td>C-</td>
                                            @elseif( $course_mark == 10 || ( $course_mark > 10 && $course_mark < 11.5)) <td>C</td>
                                                @elseif( $course_mark == 11.5 || ( $course_mark > 11.5 && $course_mark < 13.5)) <td>C+</td>
                                                    @elseif( $course_mark == 13.5 || ( $course_mark > 13.5 && $course_mark < 15)) <td>B-</td>
                                                        @elseif( $course_mark == 15 || ( $course_mark > 15 && $course_mark < 16.5)) <td>B</td>
                                                            @elseif( $course_mark == 16.5 || ( $course_mark > 16.5 && $course_mark < 18.5)) <td>B+</td>
                                                                @elseif( $course_mark == 18.5 || ( $course_mark > 18.5 && $course_mark < 19.5)) <td>A</td>
                                                                    @else
                                                                    <td>A+</td>
                                                                    @endif
                                                                    <td></td>
                                                                    @if($semester->id == 1)
                                                                    <td>SN1</td>
                                                                    @else
                                                                    <td>SN2</td>
                                                                    @endif
                    </tr>
                    @php($course_credit_sum = $course_credit_sum + $st_course->course->credit_points)
                    @endif
                    @endforeach

                    @endif
                    @endforeach
                    @endforeach
                    <tr style="font-size: 10px; background-color:grey;">
                        <th colspan="6">{{ __('transcript.credit_acquired') }} {{ strtoupper($semester->name) }}: {{ $credit }} on {{$course_credit_sum}}</th>
                        <th colspan="3">{{ __('transcript.average') }} : {{ number_format(ceil( $sumavg/$ue_credit_sum * 100) / 100, 2, '.', '') }}</th>
                    </tr>
                    @php($total_credit_obtain += $credit)
                    @php($total_credit += $course_credit_sum)
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="divb" style="margin-top: 0px;">
            <table class="table">
                <tr style="font-size: 10px;">
                    <td><label for="">{{ __('transcript.decision') }} : </label><span style="font-weight:bold;">Passed</span></td>
                    <td><label for="">{{ __('transcript.gpa') }} : </label><span style="font-weight:bold;">2.619</span></td>
                    <td><label for="">Grade : </label><span style="font-weight:bold;">C+</span></td>
                    <td><label for="">{{ __('transcript.total_credit') }} : </label><span style="font-weight:bold;">{{$total_credit_obtain}} On {{$total_credit}}</span></td>
                    <td><label for="">{{ __('transcript.appreciation') }} : </label><span style="font-weight:bold;">FAIRLY GOOD</span></td>
                </tr>
                <tr style="font-size: 10px; text-align:end">
                    <td><label for="">{{ __('transcript.gpa') }} = </label><span>{{ __('transcript.gpaw') }}</span></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><label for="">Date : </label><span>_________________</span></td>
                </tr>
                <tr style="font-size:9px;">
                    <td colspan="5">
                        <table>
                            <tr>
                                <td><i><label for="">A+ = </label><span>]3.9 4.0]</span></i></td>
                                <td><i><label for="">A = </label><span>[3.7 3.9]</span></i></td>
                                <td><i><label for="">B+ = </label><span>[3.3 3.7[</span></i></td>
                                <td><i><label for="">B = </label><span>[3.0 3.3[</span></i></td>
                                <td><i><label for="">B- = </label><span>[2.7 3.0[</span></i></td>
                            </tr>
                            <tr>
                                <td><i><label for="">C+ = </label><span>[2.3 2.7[</span></i></td>
                                <td><i><label for="">C = </label><span>[2.0 2.3[</span></i></td>
                                <td><i><label for="">C- = </label><span>[1.7 2.0[</span></i></td>
                                <td><i><label for="">D = </label><span>[1.3 1.7[</span></i></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr style="font-size: 8px; text-align:center">
                    <td colspan="5">{{ __('transcript.notice') }}</td>
                </tr>
            </table>
        </div>
    </div>
    @endforeach
</body>

</html>