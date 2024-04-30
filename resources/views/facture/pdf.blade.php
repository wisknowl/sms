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
            font-size: 11px;
        }


        .text-start {
            text-align: start;
        }

        .text-center {
            text-align: center;
        }

        .text-normal {
            font-size: initial;
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

        .text-end {
            text-align: right;
        }

        .pt-5 {
            padding-top: 5px;
        }

        .p-10 {
            padding: 10px 0px;
        }

        .float-left {
            float: left;
        }

        .w-50 {
            width: 50%;
        }

        .border-0 {
            border: none;
        }

        .border-b-0 {
            border-bottom: 0px;
        }

        .border-t-0 {
            border-top: 0px;
        }

        .border-b-1 {
            border-bottom: 1px solid grey;
        }

        .border-tb-0 {
            border-top: 0px;
            border-bottom: 0px;
        }
    </style>
</head>

<body>
    @php
    use Illuminate\Support\Str;

    $tranche_names = ['inscription', 'first', 'second', 'third'];
    @endphp

    <div>
        <table border="0px" class="w-full border-collapse border-tb-0">
            <tr>
                <td class="text-center border-b-0" style="width: 48%;"><img src="{{ public_path('img/isig.png') }}"></td>
                <td style="width: 4%;" class="border-tb-0 text-center">|</td>
                <td class="text-center border-b-0" style="width: 48%;"><img src="{{ public_path('img/isig.png') }}"></td>
            </tr>
            <tr>
                <td class="text-center text-medium border-t-0" style="width: 48%;">INSTITUT SUPERIEUR D'INFORMATIQUE ET DE GESTION</td>
                <td style="width: 4%;" class="border-tb-0 text-center">|</td>
                <td class="text-center text-medium border-t-0" style="width: 48%;">INSTITUT SUPERIEUR D'INFORMATIQUE ET DE GESTION</td>
            </tr>
            <tr>
                <td style="width: 48%;">
                    <table border="0px" class="text-xs w-full border-0 border-collapse">
                        <tr>
                            <td class="border-0"><span class="w-50">Année académique : {{$year_session}}</span></td>
                            <td class="border-0"><span class="text-end">Le : {{ $deposit_date }}</span></td>
                        </tr>
                    </table>
                </td>
                <td style="width: 4%;" class="border-tb-0 text-center">|</td>
                <td style="width: 48%;">
                    <table border="0px" class="text-xs w-full border-0 border-collapse">
                        <tr>
                            <td class="border-0"><span class="w-50">Année académique : {{$year_session}}</span></td>
                            <td class="border-0"><span class="text-end">Le : {{ $deposit_date }}</span></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="text-center underline border-0" style="width: 48%;">RECU PENSION/FRAIS DIVERS</td>
                <td style="width: 4%;" class="border-tb-0 text-center">|</td>
                <td class="text-center underline border-0" style="width: 48%;">RECU PENSION/FRAIS DIVERS</td>
            </tr>
            <tr>
                <td class="border-tb-0 p-4" style="width: 48%;">
                    <table border="0px" class="text-small border-collapse border-0">
                        <tr>
                            <td class="border-0">Matricule : </td>
                            <td class="border-0">{{ $student->matricule }}</td>
                        </tr>
                        <tr>
                            <td class="border-0">Nom : </td>
                            <td class="border-0">{{ $student->name }}</td>
                        </tr>
                        <tr>
                            <td class="border-0">Spécialité : </td>
                            <td class="border-0">{{ $specialty->name }}</td>
                        </tr>
                        <tr>
                            <td class="border-0">Niveau: {{ $level->name }}</td>
                            <td class="border-0">Périod : {{$period}}</td>
                        </tr>

                    </table>
                </td>
                <td style="width: 4%;" class="border-tb-0 text-center">|</td>
                <td class="border-tb-0 p-4" style="width: 48%;">
                    <table border="0px" class="text-small border-collapse border-0">
                        <tr>
                            <td class="border-0">Matricule : </td>
                            <td class="border-0">{{ $student->matricule }}</td>
                        </tr>
                        <tr>
                            <td class="border-0">Nom : </td>
                            <td class="border-0">{{ $student->name }}</td>
                        </tr>
                        <tr>
                            <td class="border-0">Spécialité : </td>
                            <td class="border-0">{{ $specialty->name }}</td>
                        </tr>
                        <tr>
                            <td class="border-0">Niveau: {{ $level->name }}</td>
                            <td class="border-0">Périod : {{$period}}</td>
                        </tr>

                    </table>
                </td>
            </tr>
            <tr>
                <td class="border-tb-0" style="width: 48%;">
                    <table border="0px" class="text-small w-full border-collapse border-0">
                        <tr>
                            <td class="border-0">Versement: {{ $deposited_amount }}</td>
                            <td class="border-0">Type de versement : {{$tdv}}</td>
                            <td class="border-0"></td>
                        </tr>
                    </table>
                </td>
                <td style="width: 4%;" class="border-tb-0 text-center">|</td>
                <td class="border-tb-0" style="width: 48%;">
                    <table border="0px" class="text-small w-full border-collapse border-0">
                        <tr>
                            <td class="border-0">Versement: {{ $deposited_amount }}</td>
                            <td class="border-0">Type de versement : {{$tdv}}</td>
                            <td class="border-0"></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="border-0 text-center underline" style="width: 48%;">Récapitulatif du paiement</td>
                <td style="width: 4%;" class="border-tb-0 text-center">|</td>
                <td class="border-0 text-center underline" style="width: 48%;">Récapitulatif du paiement</td>
            </tr>
            <tr>
                <td class="border-0" style="width: 48%;">
                    <table border="0px" class="border-0 text-small w-full border-collapse">
                        <tr class="text-center">
                            <td style="width: 30%;">Date versement</td>
                            <td style="width: 30%;">Date validation</td>
                            <td style="width: 40%;">Montant payé</td>
                        </tr>
                    </table>
                </td>
                <td style="width: 4%;" class="border-tb-0 text-center">|</td>
                <td class="border-0" style="width: 48%;">
                    <table border="0px" class="border-0 text-small w-full border-collapse">
                        <tr class="text-center">
                            <td style="width: 30%;">Date versement</td>
                            <td style="width: 30%;">Date validation</td>
                            <td style="width: 40%;">Montant payé</td>
                        </tr>
                    </table>
                </td>
            </tr>
            @foreach($paymentSummary as $payment)
            <tr>
                <td class="border-0" style="width: 48%;">
                    <table border="0px" class="text-small w-full border-collapse">
                        <tr class="text-center">
                            <td style="width: 30%;">{{ \Carbon\Carbon::parse($payment->created_at)->format('d-m-Y') }}</td>
                            <td style="width: 30%;">{{ \Carbon\Carbon::parse($payment->updated_at)->format('d-m-Y') }}</td>
                            <td style="width: 40%;">{{ $payment->inscription + $payment->tranche1 + $payment->tranche2 + $payment->tranche3 }}</td>
                        </tr>
                    </table>
                </td>
                <td style="width: 4%;" class="border-tb-0 text-center">|</td>
                <td class="border-0" style="width: 48%;">
                    <table border="0px" class="text-small w-full border-collapse">
                        <tr class="text-center">
                            <td style="width: 30%;">{{ \Carbon\Carbon::parse($payment->created_at)->format('d-m-Y') }}</td>
                            <td style="width: 30%;">{{ \Carbon\Carbon::parse($payment->updated_at)->format('d-m-Y') }}</td>
                            <td style="width: 40%;">{{ $payment->inscription + $payment->tranche1 + $payment->tranche2 + $payment->tranche3 }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
            @endforeach

            <tr style="page-break-inside: avoid;">
                <td style="width: 48%;">
                    <table border="0px" class="text-small w-full border-collapse">
                        <tbody>
                            <tr>
                                <td colspan="6" class="text-normal text-center underline p-4">Versement par Tranche</td>
                            </tr>
                            <tr class="text-center">
                                <td></td>
                                <td>Inscription</td>
                                <td>Tranche1</td>
                                <td>Tranche2</td>
                                <td>Tranche3</td>
                                <th>Total</th>
                            </tr>
                            <tr class="text-center">
                                <td>Date limite de paiement</td>
                                @foreach($tranche_names as $name)
                                @foreach($tranches as $tranche)
                                @if($tranche->name == $name)
                                @if($tranche->name == 'inscription')
                                <td></td>
                                @else
                                <td>{{ \Carbon\Carbon::parse($tranche->due_date)->format('d-m-Y') }}</td>
                                @endif
                                @endif
                                @endforeach
                                @endforeach
                                <td rowspan="2"></td>
                            </tr>
                            <tr class="text-center">
                                <td>Montant du</td>
                                @foreach($tranche_names as $name)
                                @foreach($specialty_tranches as $specialty_tranche)
                                @if($specialty_tranche->tranche->name == $name)
                                <td>{{$specialty_tranche->tranche_amount}}</td>
                                @endif
                                @endforeach
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
                </td>
                <td style="width: 4%;" class="border-tb-0 text-center">|</td>
                <td style="width: 48%;">
                    <table border="0px" class="text-small w-full border-collapse">
                        <tbody>
                            <tr>
                                <td colspan="6" class="text-center text-normal p-4 underline">Versement par Tranche</td>
                            </tr>
                            <tr class="text-center">
                                <td></td>
                                <td>Inscription</td>
                                <td>Tranche1</td>
                                <td>Tranche2</td>
                                <td>Tranche3</td>
                                <th>Total</th>
                            </tr>
                            <tr class="text-center">
                                <td>Date limite de paiement</td>
                                @foreach($tranche_names as $name)
                                @foreach($tranches as $tranche)
                                @if($tranche->name == $name)
                                @if($tranche->name == 'inscription')
                                <td></td>
                                @else
                                <td>{{ \Carbon\Carbon::parse($tranche->due_date)->format('d-m-Y') }}</td>
                                @endif
                                @endif
                                @endforeach
                                @endforeach
                                <td rowspan="2"></td>
                            </tr>
                            <tr class="text-center">
                                <td>Montant du</td>
                                @foreach($tranche_names as $name)
                                @foreach($specialty_tranches as $specialty_tranche)
                                @if($specialty_tranche->tranche->name == $name)
                                <td>{{$specialty_tranche->tranche_amount}}</td>
                                @endif
                                @endforeach
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
                </td>
            </tr>
            <tr>
                <td class="text-xs p-4" style="width: 48%;">
                    <div>Les Frais d'inscription et d'etude de dossier ne sont ni remboursables, ni substituables</div>
                    <div>Registration and studying documents fees are not refundable or transferable</div>
                </td>
                <td style="width: 4%;" class="border-tb-0 text-center">|</td>
                <td class="text-xs p-4" style="width: 48%;">
                    <div>Les Frais d'inscription et d'etude de dossier ne sont ni remboursables, ni substituables</div>
                    <div>Registration and studying documents fees are not refundable or transferable</div>
                </td>
            </tr>
            <tr>
                <td style="width: 48%;">
                    <table class="p-4 text-xs w-full border-collapse border-0">
                        <tbody>
                            <tr>
                                <td class="border-0">B.P: </td>
                                <td class="border-0">Douala</td>
                                <td class="border-0" rowspan="3">Validé par: ZUNITA</td>
                            </tr>
                            <tr>
                                <td class="border-0">Tél: 651101005/695036786</td>
                                <td class="border-0">Fax: </td>
                            </tr>
                            <tr>
                                <td class="border-0">Site web: www.isig.cm.com</td>
                                <td class="border-0">Email: isig.bonaberi@gmail.com</td>
                            </tr>
                            <tr class="text-end pt-5">
                                <td class="border-0" colspan="3">Réf : {{$referenceId}}</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td style="width: 4%;" class="border-tb-0 text-center">|</td>
                <td style="width: 48%;">
                    <table class="p-4 text-xs w-full border-collapse">
                        <tbody>
                            <tr>
                                <td class="border-0">B.P: </td>
                                <td class="border-0">Douala</td>
                                <td class="border-0" rowspan="3">Validé par: ZUNITA</td>
                            </tr>
                            <tr>
                                <td class="border-0">Tél: 651101005/695036786</td>
                                <td class="border-0">Fax: </td>
                            </tr>
                            <tr>
                                <td class="border-0">Site web: www.isig.cm.com</td>
                                <td class="border-0">Email: isig.bonaberi@gmail.com</td>
                            </tr>
                            <tr class="text-end pt-5">
                                <td class="border-0" colspan="3">Réf : {{$referenceId}}</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>