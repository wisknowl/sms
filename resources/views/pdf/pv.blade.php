<!DOCTYPE html>
<html>

<head>
    <style>
        @page {
            margin: 0.4in;
        }


        .pb {
            page-break-inside: avoid;
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
            /* transform: rotate(90deg); */

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
        <table border="0px" class="table" style="text-align: center;">
            <tbody>

                @foreach($ues as $ue)
                <tr style="color: red;">
                    <td colspan="5">{{ $ue->code }} {{ $ue->name }}</td>
                </tr>
                @foreach($courses as $course)
                @if($course->ue_id == $ue->id)
                <tr>
                    <td colspan="5">{{ $course->name }}</td>
                </tr>
                @foreach($st_courses as $st_course)
                @if($course->id == $st_course->course->id && $st_course->course->level_id == 11)
                <tr>
                    <td>{{ $st_course->student->matricule }}</td>
                    <td>{{ $st_course->student->name }}</td>
                    <td>{{ $st_course->ca_marks }}</td>
                    <td>{{ $st_course->exam_marks }}</td>
                    <td>{{ $st_course->average }}</td>
                </tr>
                @endif
                @endforeach
                @endif
                @endforeach
                @endforeach



            </tbody>
        </table>
        <table border="0px" class="table" style="text-align: center;">
            <thead>
                <tr class="pb">
                    <td colspan="3"></td>
                    @foreach($ues as $ue)
                    @php($n=0)
                    @foreach($courses as $course)
                    @if($ue->id == $course->ue_id)
                    @php($n = $n+6)
                    @endif
                    @endforeach
                    <th class="pb" colspan="{{ $n }}">{{ $ue->code }} {{ $ue->name }}</th>
                    @endforeach
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3"></td>
                    @foreach($courses as $course)
                    <th colspan="6">{{$course->code}} {{$course->name}}</th>
                    @endforeach
                </tr>
                <tr style="font-size: x-small;">
                    <th>#</th>
                    <th>Matricule</th>
                    <th>Noms</th>
                    @foreach($courses as $course)
                    <th>CC</th>
                    <th>EXAM</th>
                    <th>Moyenne</th>
                    <th>Grade</th>
                    <th>Credit</th>
                    <th>Dec</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>

                @php($count=1)
                @foreach($students as $student)
                <tr class="pb" style="font-size: small;">
                    <td>{{$count}}</td>

                    <td>{{$student->matricule}}</td>
                    <td>Wisknowl</td>
                    @foreach($courses as $course)

                    @foreach($st_courses as $st_course)
                    @if($st_course->course->id == $course->id)

                    @if($st_course->student_id == $student->id)
                    <td>{{ $st_course->ca_marks }}</td>
                    <td>{{$st_course->exam_marks}}</td>
                    <td>{{$st_course->average}}</td>
                    <td>B</td>
                    <td>2</td>
                    <td>NVA</td>
                    @endif
                    @endif
                    @endforeach
                    @endforeach
                </tr>
                @php($count=$count+1)
                @endforeach

            </tbody>
        </table>
    </div>
</body>

</html>