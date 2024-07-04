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
    <table border="0px" class="table">
        <tr>
            <th colspan="2">
                Rattrapage {{$specialty_name}}
            </th>
        </tr>
        <tr>
            <th >Nom et Prenom</th>
            <td>
                <table class="table">
                    <tr>
                        <th class="wordwrap-nowrap" style="width:40%">Matiere</th>
                        <th class="wordwrap-nowrap" style="width:10%;">CC</th>
                        <th class="wordwrap-nowrap" style="width:10%;">NE</th>
                        <th class="wordwrap-nowrap" style="width:10%;">NS</th>
                    </tr>
                </table>
            </td>
        </tr>
        @foreach($students as $student)
        <tr>
            <th>
                {{$student->name}}
            </th>
            @if (array_key_exists($student->id, $studentData))
            <td>
                <table class="table border-0">

                    @if(!empty($studentData[$student->id]))
                    @foreach($studentData[$student->id] as $failedCourse)
                    <tr>
                        <td style="width:40%;">
                            {{$failedCourse['course_name']}}
                        </td>
                        <td style="width:10%;">
                            {{$failedCourse['ca_marks']}}
                        </td>
                        <td style="width:10%;">
                            {{$failedCourse['exam_marks']}}
                        </td>
                        <td style="width:10%;">
                            {{$failedCourse['course_mark']}}
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
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
</body>

</html>