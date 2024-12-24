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
                    <td style="width:30%">Republique du Cameroun</td>
                    <td rowspan="4"><img style="width:20%;  text-align:center; vertical-align: middle;" src="{{ public_path('img/Logo_de_ud.png') }}"></td>
                    <td style="width:30%">Republic of Cameroon</td>
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
                    <td class="wordwrap-nowrap">UNIVERSITE DE DOUALA</td>
                    <td class="wordwrap-nowrap">THE UNIVERSITY OF DOUALA</td>
                </tr>
            </table>
            <div>
                <hr>
            </div>
            <table class="table" style="text-align: center;">
                <tr style="font-size:13px;">
                    <td><img style="width:50%; height:auto; max-width: none; max-height: none; text-align:center; vertical-align: middle;" src="{{ public_path('img/download (2).png') }}"></td>
                    <td style="width:50%">
                        <table class="table" style="text-align: center;">
                            <tr>
                                <td style="font-weight:bold;">STALWART UNIVERSITY INSTITUTE</td>
                            </tr>
                            <tr>
                                <td>SOUS LA TUTELLE TECHNIQUE DE</td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">FACULTE DES SCIENCES ECONOMIQUES ET DE</td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">GESTION APPLIQUEE DE L\'UNIVERSITE DE DOUALA</td>
                            </tr>
                        </table>
                    </td>
                    <td><img style="width:50%; height:auto; max-width: none; max-height: none; text-align:center; vertical-align: middle;" src="{{ public_path('img/download.png') }}"></td>
                </tr>

            </table>
            <div>
                <hr>
            </div>
            <center style="font-weight:bold; font-size:12px;">
                RELEVE DE NOTES/ACADEMIC TRANSCRIPT
            </center>
            

        </div>
        <div>
            <table class="table" style="padding: 2px;">
                <tr style="font-size: 11px;">
                    <td><label for="">{{ __('transcript.name') }} : </label><span>{{ $transcript['credential']->name }}</span></td>
                    <td><label for="">{{ __('transcript.matricule') }} : </label><span>{{ $transcript['credential']->matricule }}</span></td>
                    <td><label for="">{{ __('transcript.year') }} : </label><span>{{ $transcript['academic_year'] }}</span></td>
                </tr>
                <tr style="font-size: 11px;">
                    <td><label for="">{{ __('transcript.dob') }} : </label><span>{{ date('d/m/Y', strtotime($transcript['credential']->dob)) }} {{ __('transcript.pob') }} : </label><span>{{ $transcript['credential']->pob }}</span></span></td>
                    <td><label for="">{{ __('transcript.sex') }} : </label><span>male</span></td>
                    <td><label for="">Cycle: </label><span>{{ $transcript['credential']->cycle->name }}</span></td>
                </tr>
                <tr style="font-size: 11px;">
                    <td colspan=""><label for="">{{ __('transcript.specialty') }} : </label><span style="font-weight:bold;">{{ $transcript['credential']->specialty->name }}</span></td>
                    <td><label for="">{{ __('transcript.level') }} : </label><span>{{ $transcript['level'] }}</span></td>
                    <td>No ___________2024/UD/FSEGA/SUI/CI</td>
                </tr>
            </table>
        </div>
        <div class="container mt-5">
            <table border="0px" class="table">
                <thead style="background-color: lightgray;text-align:center; font-size:10px;">
                    <tr class="table-danger">
                        <th style="padding: 2px">{{ __('transcript.unit_code') }}</th>
                        <th>{{ __('transcript.course_code') }}</th>
                        <th>{{ __('transcript.course_title') }}</th>
                        <!-- <th>{{ __('transcript.p_credit') }}</th> -->
                        <th>{{ __('transcript.mark_20') }}</th>
                        <th>{{ __('transcript.e_credit') }}</th>
                        <!-- <th>{{ __('transcript.grade') }}</th> -->
                        <th>{{ __('transcript.dec') }}</th>
                        <th>{{ __('transcript.yea') }}</th>
                    </tr>
                </thead>
                <tbody style="background-color: white; text-align: center; font-size: 10px;">

                    @php($total_credit_obtain=0)
                    @php($total_credit=0)
                    @php($annual_avg=0)
                    @php($checkSemester = 1)
                    @foreach($transcript['semesters'] as $semester)
                    @if($transcript['tdr'] == 1 && $transcript['semester_mod'] == $semester->name)
                    @php($course_credit_sum=0)
                    @php($credit = $sumavg = $count = $ue_credit_sum = 0)
                    @foreach($transcript['course_natures'] as $course_nature)

                    <tr style="font-size: 9px; text-align: center; background-color:lightblue">
                        <td class="border-0"></td>
                        <td class="border-0"></td>
                        @if($course_nature->id == 1)
                        <td class="border-0" style="text-align: left;">{{$course_nature->id}}-{{ __('transcript.fund') }}</td>
                        @elseif($course_nature->id == 2)
                        <td class="border-0" style="text-align: left;">{{$course_nature->id}}-{{ __('transcript.prof') }}</td>
                        @else
                        <td class="border-0" style="text-align: left;">{{$course_nature->id}}-{{ __('transcript.trav') }}</td>
                        @endif
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
                        <!-- <td></td> -->
                        @php( $ue_mark = number_format(ceil($st_ue->average * 100) / 100, 2, '.', ''))
                        <td style="font-weight:bold;">{{$ue_mark}}</td>
                        <td style="font-weight:bold;">{{ $st_ue->credit }}</td>
                        <!-- @if( $ue_mark < 0 || $ue_mark==0) <td style="font-weight:bold;">F</td>
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
                                                                @endif -->
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
                        <!-- <td>{{ $st_course->course->credit_points }}</td> -->
                        @php($courseavg)
                        @if($st_course->exam_marks < $st_course->reseat_mark)
                            @php($courseavg = (((((($st_course->ca_marks) / 20) * 30) + ((($st_course->reseat_mark) / 20) * 70)) / 100) * 20))
                            @php($course_mark = number_format(ceil($courseavg * 100) / 100, 2, '.', ''))
                            <td>{{ $course_mark }}</td>
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
                            <!-- @if( $course_mark < 0 || $course_mark==0) <td>F</td>
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
                                                                    @endif -->
                                                                    <td></td>
                                                                    @if($semester->id == 1)
                                                                    <td>{{ $transcript['academic_year'] }}</td>
                                                                    @else
                                                                    <td>{{ $transcript['academic_year'] }}</td>
                                                                    @endif
                    </tr>
                    @php($course_credit_sum = $course_credit_sum + $st_course->course->credit_points)
                    @endif
                    @endforeach

                    @endif
                    @endforeach
                    @endforeach
                    <tr style="font-size: 10px; background-color:#393F86; color:white; font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif;">
                        <th colspan="6">{{ __('transcript.credit_acquired') }} {{ strtoupper($semester->name) }}: {{ $credit }} on {{$course_credit_sum}}</th>
                        <th colspan="">{{ __('transcript.average') }} : {{ number_format(ceil( $sumavg/$ue_credit_sum * 100) / 100, 2, '.', '') }}</th>
                    </tr>
                    @php($total_credit_obtain += $credit)
                    @php($total_credit += $course_credit_sum)
                    @php($annual_avg = $annual_avg + number_format(ceil( $sumavg/$ue_credit_sum * 100) / 100, 2, '.', ''))
                    @php($gpa = ($annual_avg/20)*4)
                    @php($mention = $annual_avg)
                    @endif

                    @if($transcript['tdr'] == 2)
                    @php($checkSemester = 2)
                    @php($course_credit_sum=0)
                    @php($credit = $sumavg = $count = $ue_credit_sum = 0)
                    @foreach($transcript['course_natures'] as $course_nature)

                    <!-- <tr style="font-size: 9px; text-align: center; background-color:lightblue">
                        <td class="border-0"></td>
                        <td class="border-0"></td>
                        @if($course_nature->id == 1)
                        <td class="border-0" style="text-align: left;">{{$course_nature->id}}-{{ __('transcript.fund') }}</td>
                        @elseif($course_nature->id == 2)
                        <td class="border-0" style="text-align: left;">{{$course_nature->id}}-{{ __('transcript.prof') }}</td>
                        @else
                        <td class="border-0" style="text-align: left;">{{$course_nature->id}}-{{ __('transcript.trav') }}</td>
                        @endif
                        <td class="border-0"></td>
                        <td class="border-0"></td>
                        <td class="border-0"></td>
                        <td class="border-0"></td>
                        <td class="border-0"></td>
                        <td class="border-0"></td>
                    </tr> -->

                    @foreach($transcript['st_ues'] as $st_ue)
                    @if($semester->id == $st_ue->ue->semester_id && $course_nature->id == $st_ue->ue->course_nature_id)
                    <tr style="font-size: 10px; text-align: center; ">
                        <td>{{ $st_ue->ue->code }}</td>
                        <td></td>
                        <td style="text-align: left;font-weight:bold;">{{ $st_ue->ue->name }}</td>
                        <!-- <td></td> -->
                        @php( $ue_mark = number_format(ceil($st_ue->average * 100) / 100, 2, '.', ''))
                        <td style="font-weight:bold;">{{$ue_mark}}</td>
                        <td style="font-weight:bold;">{{ $st_ue->credit }}</td>
                        <!-- @if( $ue_mark < 0 || $ue_mark==0) <td style="font-weight:bold;">F</td>
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
                                                                @endif -->
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
                        <!-- <td>{{ $st_course->course->credit_points }}</td> -->
                        @php($courseavg)
                        @if($st_course->exam_marks < $st_course->reseat_mark)
                            @php($courseavg = (((((($st_course->ca_marks) / 20) * 30) + ((($st_course->reseat_mark) / 20) * 70)) / 100) * 20))
                            @php($course_mark = number_format(ceil($courseavg * 100) / 100, 2, '.', ''))

                            <td>{{ $course_mark }}</td>
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
                            <!-- @if( $course_mark < 0 || $course_mark==0) <td>F</td>
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
                                                                    @endif -->
                                                                    <td></td>
                                                                    @if($semester->id == 1)
                                                                    <td>{{ $transcript['academic_year'] }}</td>
                                                                    @else
                                                                    <td>{{ $transcript['academic_year'] }}</td>
                                                                    @endif
                    </tr>
                    @php($course_credit_sum = $course_credit_sum + $st_course->course->credit_points)
                    @endif
                    @endforeach

                    @endif
                    @endforeach
                    @endforeach
                    <tr style="font-size: 10px; background-color:#393F86; color:white; font-weight: bold; font-family:Verdana, Geneva, Tahoma, sans-serif;">
                        <th colspan="6">{{ __('transcript.credit_acquired') }} {{ strtoupper($semester->name) }}: {{ $credit }} {{ __('transcript.on') }} {{$course_credit_sum}}</th>
                        <th colspan="">{{ __('transcript.average') }} : {{ number_format(ceil( $sumavg/$ue_credit_sum * 100) / 100, 2, '.', '') }}</th>
                    </tr>
                    @php($total_credit_obtain += $credit)
                    @php($total_credit += $course_credit_sum)
                    @php($annual_avg = $annual_avg + number_format(ceil( $sumavg/$ue_credit_sum * 100) / 100, 2, '.', ''))
                    @php($gpa = ($annual_avg/40)*4)
                    @php($mention = $annual_avg/2)
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="divb" style="margin-top: 0px; padding-bottom:30px">
            <!-- <table class="table">
                <tr style="font-size: 10px;">
                    <td><label for="">{{ __('transcript.decision') }} : </label>
                        <span style="font-weight:bold;">
                            @if($checkSemester == 1)
                            @if($total_credit_obtain == 30)
                            {{ __('transcript.passed') }}
                            @else
                            {{ __('transcript.failed') }}
                            @endif
                            @else
                            @if($total_credit_obtain == 60)
                            {{ __('transcript.passed') }}
                            @else
                            {{ __('transcript.failed') }}
                            @endif
                            @endif
                        </span>
                    </td>

                    <td><label for="">{{ __('transcript.gpa') }} : </label><span style="font-weight:bold;">{{number_format($gpa, 3, '.', '') }}</span></td>
                    <td>
                        <label for="">Grade : </label>
                        <span style="font-weight:bold;">
                            @if( $gpa < 0 || $gpa==0) F @elseif( $gpa> 0 && $gpa < 1.3) F @elseif( $gpa==1.3 || ( $gpa> 1.3 && $gpa < 1.7)) D @elseif( $gpa==1.7 || ( $gpa> 1.7 && $gpa < 2.0)) C- @elseif( $gpa==2.0 || ( $gpa> 2.0 && $gpa < 2.3)) C @elseif( $gpa==2.3 || ( $gpa> 2.3 && $gpa < 2.7)) C+ @elseif( $gpa==2.7 || ( $gpa> 2.7 && $gpa < 3.0)) B- @elseif( $gpa==3.0 || ( $gpa> 3.0 && $gpa < 3.3)) B @elseif( $gpa==3.3 || ( $gpa> 3.3 && $gpa < 3.7)) B+ @elseif( $gpa==3.7 || ( $gpa> 3.7 && $gpa < 3.9)) A @else A+ @endif </span>
                    </td>
                    <td><label for="">{{ __('transcript.total_credit') }} : </label><span style="font-weight:bold;">{{$total_credit_obtain}} {{ __('transcript.on') }} {{$total_credit}}</span></td>
                    <td>
                        <label for="">{{ __('transcript.appreciation') }} : </label>
                        <span style="font-weight:bold;">
                            @if($mention < 0 || $mention==0) {{ __('transcript.null') }} @elseif($mention> 0 && $mention < 5) {{ __('transcript.null') }} @elseif($mention==5 || ($mention> 5 && $mention < 10)) {{ __('transcript.mediocre') }} @elseif($mention==10 || ($mention> 10 && $mention < 12)) {{ __('transcript.passable') }} @elseif($mention==12 || ($mention> 12 && $mention < 14)) {{ __('transcript.assez_bien') }} @elseif($mention==14 || ($mention> 14 && $mention < 17.5)) {{ __('transcript.bien') }} @else {{ __('transcript.tres_bien') }} @endif </span>
                    </td>
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
            </table> -->
            <table class="table trf-11">
                <tr style="font-weight:bold;">
                    <td>Average</td>
                    <td>Note</td>
                    <td>Grade</td>
                    <td>Mention</td>
                    <td>Decision</td>
                </tr>
                <tr>
                    <td>13</td>
                    <td>60</td>
                    <td>A</td>
                    <td>Assez Bien</td>
                    <td>Admis</td>
                </tr>
            </table>
            <div style="height:20px"></div>
            <table class="table trf-11">
                <tr>
                    <td>The Rector SUI</td>
                    <td>Done in Douala, the:</td>
                    <td>The Dean</td>
                </tr>
            </table>
        </div>
    </div>
    @endforeach
</body>

</html>