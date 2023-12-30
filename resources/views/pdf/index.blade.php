<!DOCTYPE html>
<html>

<head>
    <style>
        @page {
            margin: 0.4in;
        }

        .divb {
            border: 1px solid black;
            padding: 2px;
        }

        img {
            width: 50%;
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
    </style>
</head>

<body>
    <div class="divb">
        <table class="table" style="text-align: center;">
            <tr class="trf-11">
                <td>Republique du Cameroun</td>
                <td rowspan="4"><img src="{{ public_path('images/isig.png') }}"></td>
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
            <tr class="trf-11">
                <td>INSTITUT SUPERIEUR D'INFORMATIQUE ET DE GESTION</td>
                <td>HIGHER INSTITUTE OF MANAGEMENT AND COMPUTER SCIENCE</td>
            </tr>
            <tr>
                <td colspan="3" style="font-weight: bold;">ANNUAL TRANSCRIPT</td>
            </tr>
        </table>
    </div>
    <div>
        <table class="table" style="padding: 2px;">
            <tr style="font-size: 13px;">
                <td><label for="">Name: </label><span>{{ $credential->name }}</span></td>
                <td><label for="">Matricule: </label><span>{{ $credential->matricule }}</span></td>
                <td><label for="">Academic year: </label><span>{{ $academic_year }}</span></td>
            </tr>
            <tr style="font-size: 13px;">
                <td><label for="">Date of birth: </label><span>{{ date('d/m/Y', strtotime($credential->dob)) }}</span></td>
                <td><label for="">At: </label><span>{{ $credential->pob }}</span></td>
                <td><label for="">Cyle: </label><span>{{ $credential->cycle->name }}</span></td>
            </tr>
            <tr>
                <td colspan="2"><label for="">Specialty: </label><span>{{ $credential->specialty->name }}</span></td>
                <td><label for="">Level: </label><span>{{ $level }}</span></td>
            </tr>
        </table>
    </div>
    <div class="container mt-5">
        <table border="0px" class="table">
            <thead style="height: 33px;background-color: lightgray;text-align:center; font-size:12px;">
                <tr class="table-danger">
                    <th scope="col">Unit code</th>
                    <th scope="col">Course code</th>
                    <th scope="col">Course title</th>

                    <th>Planned Credit</th>
                    <th>Mark/20</th>
                    <th>Earned Credit</th>
                    <th>Grade</th>
                    <th>Decision</th>
                    <th>Session</th>
                </tr>
            </thead>
            <tbody style="background-color: white; text-align: center; font-size: 13px;">
                @foreach($semesters as $semester)
                <tr style="font-size: 12px; background-color:gray">
                    <th colspan="2">{{ $semester->name }}</th>
                    <th colspan="3">CREDIT ACQUIRED IN SEMESTER 1: 30</th>
                    <th colspan="4">AVERAGE: 13.63</th>
                </tr>
                @foreach($course_natures as $course_nature)
                
                <tr style="font-size: 12px; text-align: center; background-color:lightblue">
                    <td colspan="9">{{$course_nature->id}}-{{ $course_nature->name }}</td>
                </tr>
                @foreach($ues as $ue)
                @if($semester->id == $ue->semester_id && $course_nature->id == $ue->course_nature_id)
                <tr style="font-size: 12px; text-align: center; font-weight:bold;">
                    <td>{{ $ue->code }}</td>
                    <td></td>
                    <td>{{ $ue->name }}</td>
                    <td></td>
                    <td>11.9</td>
                    <td>5</td>
                    <td>B</td>
                    <td>VA</td>
                    <td></td>
                </tr>
                @foreach($st_courses as $st_course)
                @if($ue->id == $st_course->course->ue_id)
                <tr>
                    <td></td>
                    <td>{{$st_course->course->code}}</td>
                    <td>{{ $st_course->course->name }}</td>
                    <td>{{ $st_course->course->credit_points }}</td>
                    <td>{{ $st_course->average }}</td>
                    @if($st_course->average >= 10)
                    <td>{{ $st_course->course->credit_points }}</td>
                    @else
                    <td>0</td>
                    @endif
                    <td>B</td>
                    <td></td>
                    <td>SN3</td>
                </tr>
                @else
                <div></div>
                @endif
                @endforeach
                @else
                <div></div>
                @endif
                @endforeach
                @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="divb" style="margin-top: 3px;">
        <table class="table">
            <tr style="font-size: 13px;">
                <td><label for="">Decision of Jury: </label><span>Passed</span></td>
                <td><label for="">GPA: </label><span>2.619</span></td>
                <td><label for="">Grade: </label><span>C+</span></td>
                <td><label for="">Total credit earned: </label><span>60 On 60</span></td>
                <td><label for="">Appreciation: </label><span>FAIRLY GOOD</span></td>
            </tr>
            <tr style="font-size: 13px; text-align:end">
                <td><label for="">GPA = </label><span>Grade Point Average</span></td>
                <td></td>
                <td></td>
                <td></td>
                <td><label for="">Date: </label><span></span></td>
            </tr>
            <tr style="font-size: 13px;">
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
        </table>
    </div>
</body>

</html>