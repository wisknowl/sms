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
    
    <div>
        <table border="0px" class="table" style="text-align: center;">
            <thead>
                <tr>
                    <td>{{$name}}</td>
                </tr>
                <tr class=" ">
                    <td colspan="3"></td>
                    @foreach($ues as $ue)
                    @php($n=0)
                    @foreach($courses as $course)
                    @if($ue->id == $course->ue_id)
                    @php($n = $n+2)
                    @endif
                    @endforeach
                    <th class=" " colspan="{{ $n }}">{{ $ue->code }} {{ $ue->name }}</th>
                    @endforeach
                </tr>
                <tr style="font-size: small;">
                    <td colspan="3"></td>
                    @foreach($courses as $course)
                    <th colspan="2">{{$course->code}} {{$course->name}}</th>
                    @endforeach
                </tr>
                <tr style="font-size: x-small;">
                    <th>#</th>
                    <th>Matricule</th>
                    <th>Noms</th>
                    @foreach($courses as $course)
                    <th>CC</th>
                    <th>Judgement</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>

                @php($count=1)
                @foreach($students as $student)
                <tr class=" " style="font-size: small;">
                    <td>{{$count}}</td>

                    <td>{{$student->matricule}}</td>
                    <td>{{$student->name}}</td>
                    @foreach($courses as $course)

                    @foreach($st_courses as $st_course)
                    @if($st_course->course->id == $course->id)

                    @if($st_course->student_id == $student->id)
                    <td>{{ $st_course->ca_marks }}</td>
                    <td>Assez bien</td>
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