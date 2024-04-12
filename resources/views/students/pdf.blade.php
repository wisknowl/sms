<!DOCTYPE html>
<html>

<head>
    <style>
        @page {
            margin: 0.4in;
            size: A4 portrait;
        }


        .pb {
            page-break-inside: avoid;
        }

        .divb {
            border: 1px solid black;
            padding: 2px;
        }

        img {
            width: 10%;
            height: 6%;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            /* transform: rotate(90deg); */

        }

        .text-lg{
            font-size: 20px;
        }

        .text-medium {
            font-size: 13px;
        }

        .text-small {
            font-size: 12px;
        }

        .text-xs {
            font-size: 12px;
        }

        .text-start {
            text-align: start;
        }

        .text-center {
            text-align: center;
        }

        .tdp {
            padding: 0px;
        }

        .ta {
            text-align: center;
        }

        .fac {
            width: 48%;
            float: left;
        }

        .border {
            border: 1px solid grey;
        }

        .mid {
            width: 4%;
            float: left;
        }

        .underline {
            text-decoration: underline;
        }

        .p-1 {
            padding: 1px 0px;
        }

        .p-4 {
            padding: 4px 4px;
        }

        .inline-block {
            display: inline-block;
        }

        .mr-10 {
            margin-right: 10px;
        }
        .m-10{
            margin: 10px;
        }

        .w-full {
            width: 100%;
        }

        .border-collapse {
            border-collapse: collapse;
        }

        .text-end {
            text-align: right;
        }

        .pt-5 {
            padding-top: 5px;
        }
    </style>
</head>

<body>

    <div class="fa">
        <div class="p-4 m-10 text-center text-lg ">
            @if($spec && $level)
            <strong>Liste des étudiants en {{$spec}} Niveau {{$level}}</strong>
            @endif
            
        </div>
        <table border="0px" class="w-full border-collapse">
            <thead>
                <th>#</th>
                <th>Matricule</th>
                <th>Nom</th>
            </thead>
            <tbody>
                @php($count = 1)
                @foreach($students as $student)
                <tr class="text-center">
                    <td>{{$count}}</td>
                    <td>{{$student->matricule}}</td>
                    <td>{{$student->name}}</td>
                </tr>
                @php($count =  $count + 1)
                @endforeach
            </tbody>
        </table>

    </div>
</body>

</html>