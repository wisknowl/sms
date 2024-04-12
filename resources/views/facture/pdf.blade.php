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
            width: 10%;
            height: 6%;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            /* transform: rotate(90deg); */

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

        .w-full {
            width: 100%;
        }

        .border-collapse {
            border-collapse: collapse;
        }
        .text-end{
            text-align: right;
        }
        .pt-5{
            padding-top: 5px;
        }
    </style>
</head>

<body>

    <div class="fa">
        <div class="fac border">
            <div class="border">
                <div class="text-center"><img src="{{ public_path('img/isig.png') }}"></div>
                <div class="text-medium text-center">INSTITUT SUPERIEUR D'INFORMATIQUE ET DE GESTION</div>
            </div>
            <div class="border">
                <div class="underline p-4 text-center">
                    RECU PENSION/FRAIS DIVERS
                </div>
                <div class="text-small">
                    <div class="text-start p-4">
                        Matricule : {{ $student->matricule }}
                    </div>
                    <div class="p-4">
                        <div>Nom: {{ $student->name }}</div>
                    </div>
                    <div class="p-4">
                        Spécialité : {{ $specialty->name }}
                    </div>
                    <div class="p-4">
                        <div class="inline-block mr-10">
                            Niveau: {{ $level->name }}
                        </div>
                        <div class="inline-block">
                            Périod : Jour
                        </div>
                    </div>
                </div>
                <div class="p-4 text-small">
                    <div class="inline-block mr-10">
                        Versement: {{ $montant }}
                    </div>
                    <div class="inline-block">
                        Date du versement : {{ $deposit_date }}
                    </div>
                </div>
                <div class="p-4 underline text-center">
                    Versement par Tranche
                </div>
            </div>
            <table border="0px" class="text-xs w-full border-collapse">
                <tbody>
                    <tr class="text-center">
                        <td></td>
                        <td>Tranche1</td>
                        <td>Tranche2</td>
                        <td>Tranche3</td>
                        <th>Total</th>
                    </tr>
                    <tr class="text-center">
                        <td>Date linite de paiement</td>
                        @foreach($tranches as $tranche)
                        <td>{{$tranche->due_date}}</td>
                        @endforeach
                        <td rowspan="2"></td>
                    </tr>
                    <tr class="text-center">
                        <td>Montant du</td>
                        @foreach($specialty_tranches as $specialty_tranche)
                        <td>{{$specialty_tranche->tranche_amount}}</td>
                        @endforeach

                    </tr>
                    <tr class="text-center">
                        <td>Montant payé</td>
                        @php($sumPaidAmounts=0)
                        @foreach($paidAmounts as $paidAmount)
                        <td>{{$paidAmount}}</td>
                        @php($sumPaidAmounts = $sumPaidAmounts + $paidAmount)
                        @endforeach
                        <th>Payé : {{$sumPaidAmounts}}</th>
                    </tr>
                    <tr class="text-center">
                        <td>Reste a payé</td>
                        @php($sumRemainingAmounts=0)
                        @foreach($remainingAmounts as $remainingAmount)
                        <td>{{$remainingAmount}}</td>
                        @php($sumRemainingAmounts = $sumRemainingAmounts + $remainingAmount)
                        @endforeach
                        <th>Reste : {{$sumRemainingAmounts}}</th>
                    </tr>
                </tbody>
            </table>
            <div class="p-4 text-xs border">
                <div>
                    Les Frais d'inscription et d'etude de dossier ne sont ni remboursables, ni substituables
                </div>
                <div>
                    Registration and studying documents fees are not refundable or transferable
                </div>
            </div>
            <div>
                <table class="p-4 text-xs w-full border-collapse">
                    <tbody>
                        <tr>
                            <td>B.P: </td>
                            <td>Douala</td>
                            <td rowspan="3">Validé par: ZUNITA</td>
                        </tr>
                        <tr>
                            <td>Tél: 651101005/695036786</td>
                            <td>Fax: </td>
                        </tr>
                        <tr>
                            <td>Site web: www.isig.cm.com</td>
                            <td>Email: isig.bonaberi@gmail.com</td>
                        </tr>
                        <tr class="text-end pt-5">
                            <td colspan="3">Réf : {{$referenceId}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mid"></div>
        <div class="fac border">
            <div class="border">
                <div class="text-center"><img src="{{ public_path('img/isig.png') }}"></div>
                <div class="text-medium text-center">INSTITUT SUPERIEUR D'INFORMATIQUE ET DE GESTION</div>
            </div>
            <div class="border">
                <div class="underline p-4 text-center">
                    RECU PENSION/FRAIS DIVERS
                </div>
                <div class="text-small">
                    <div class="text-start p-4">
                        Matricule : {{ $student->matricule }}
                    </div>
                    <div class="p-4">
                        <div>Nom: {{ $student->name }}</div>
                    </div>
                    <div class="p-4">
                        Spécialité : {{ $specialty->name }}
                    </div>
                    <div class="p-4">
                        <div class="inline-block mr-10">
                            Niveau: {{ $level->name }}
                        </div>
                        <div class="inline-block">
                            Périod : Jour
                        </div>
                    </div>
                </div>
                <div class="p-4 text-small">
                    <div class="inline-block mr-10">
                        Versement: {{ $montant }}
                    </div>
                    <div class="inline-block">
                        Date du versement : {{ $deposit_date }}
                    </div>
                </div>
                <div class="p-4 underline text-center">
                    Versement par Tranche
                </div>
            </div>
            <table border="0px" class="text-xs w-full border-collapse">
                <tbody>
                    <tr class="text-center">
                        <td></td>
                        <td>Tranche1</td>
                        <td>Tranche2</td>
                        <td>Tranche3</td>
                        <th>Total</th>
                    </tr>
                    <tr class="text-center">
                        <td>Date linite de paiement</td>
                        @foreach($tranches as $tranche)
                        <td>{{$tranche->due_date}}</td>
                        @endforeach
                        <td rowspan="2"></td>
                    </tr>
                    <tr class="text-center">
                        <td>Montant du</td>
                        @foreach($specialty_tranches as $specialty_tranche)
                        <td>{{$specialty_tranche->tranche_amount}}</td>
                        @endforeach

                    </tr>
                    <tr class="text-center">
                        <td>Montant payé</td>
                        @php($sumPaidAmounts=0)
                        @foreach($paidAmounts as $paidAmount)
                        <td>{{$paidAmount}}</td>
                        @php($sumPaidAmounts = $sumPaidAmounts + $paidAmount)
                        @endforeach
                        <th>Payé : {{$sumPaidAmounts}}</th>
                    </tr>
                    <tr class="text-center">
                        <td>Reste a payé</td>
                        @php($sumRemainingAmounts=0)
                        @foreach($remainingAmounts as $remainingAmount)
                        <td>{{$remainingAmount}}</td>
                        @php($sumRemainingAmounts = $sumRemainingAmounts + $remainingAmount)
                        @endforeach
                        <th>Reste : {{$sumRemainingAmounts}}</th>
                    </tr>
                </tbody>
            </table>
            <div class="p-4 text-xs border">
                <div>
                    Les Frais d'inscription et d'etude de dossier ne sont ni remboursables, ni substituables
                </div>
                <div>
                    Registration and studying documents fees are not refundable or transferable
                </div>
            </div>
            <div>
                <table class="p-4 text-xs w-full border-collapse">
                    <tbody>
                        <tr>
                            <td>B.P: </td>
                            <td>Douala</td>
                            <td rowspan="3">Validé par: ZUNITA</td>
                        </tr>
                        <tr>
                            <td>Tél: 651101005/695036786</td>
                            <td>Fax: </td>
                        </tr>
                        <tr>
                            <td>Site web: www.isig.cm.com</td>
                            <td>Email: isig.bonaberi@gmail.com</td>
                        </tr>
                        <tr class="text-end pt-5">
                            <td colspan="3">Réf : {{$referenceId}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>