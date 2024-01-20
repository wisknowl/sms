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
                @php($n = $n+1)
                @endif
                @endforeach
                <th class=" " colspan="{{ $n }}"><b>{{ $ue->code }} {{ $ue->name }}</b></th>
                @endforeach
            </tr>
            <tr style="font-size: small;">
                <td colspan="3"></td>
                @foreach($courses as $course)
                <th><b>{{$course->code}} {{$course->name}}</b></th>
                @endforeach
            </tr>
            <tr style="font-size: x-small;">
                <th><b>#</b></th>
                <th><b>Matricule</b></th>
                <th><b>Noms</b></th>
                @foreach($courses as $course)
                <th><b>CC</b></th>
                <!-- <th><b>Judgement</b></th> -->
                @endforeach
            </tr>
        </thead>
        <tbody>

            @php($count=1)
            @foreach($students as $student)
            @foreach($student->levels as $level)
            @if($level->id == $level_id)
            <tr class=" " style="font-size: small;">
                <td><b>{{$count}}</b></td>
                <td><b>{{$student->matricule}}</b></td>
                <td><b>{{$student->name}}</b></td>
                @foreach($courses as $course)

                @foreach($st_courses as $st_course)
                @if($st_course->course->id == $course->id)

                @if($st_course->student_id == $student->id)
                @php($ca = $st_course->ca_marks)
                @if($ca == 0)
                <td></td>
                @else
                <td style="width: 20px;">{{ $st_course->ca_marks }}</td>
                @endif
                <!-- @if($ca < 0 || $ca == 0)
                <td></td>
                @elseif($ca > 0 && $ca < 5)
                <td>Null</td>
                @elseif($ca == 5 || ($ca > 5 && $ca < 10))
                <td>Médiocre</td>
                @elseif($ca == 10 || ($ca > 10 && $ca < 12))
                <td>Passable</td>
                @elseif($ca == 12 || ($ca > 12 && $ca < 14))
                <td>Assez bien</td>
                @elseif($ca == 14 || ($ca > 14 && $ca < 18))
                <td>Bien</td>
                @else
                <td>Très bien</td>
                @endif -->
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
</body>

</html>