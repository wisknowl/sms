<html>
<head>
    
</head>
<body>
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
                                @if($level->id == $level_id)
                                <tr style="font-size: small;" class="border-b transition duration-300 ease-in-out hover:bg-neutral-300 dark:border-neutral-300 dark:hover:bg-neutral-200 bg-neutral-100 even:bg-neutral-200">
                                    <th class="whitespace-nowrap px-4 py-2 border"><b>{{$count}}</b></th>
                                    <th class="whitespace-nowrap px-4 py-2 border"><b>{{$student->matricule}}</b></th>
                                    <th class="whitespace-nowrap px-4 py-2 border"><b>{{$student->name}}</b></th>
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
</body>
</html>