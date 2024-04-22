<td class="whitespace-nowrap px-4 py-2 border font-medium">
    <a href="{{ URL::to('generateTranscript/'. $course_student->student->id) }}" target="_blank">
        <x-primary-button wire:change="generateTranscript({{$a_year}})" class=" ml-3">
            {{ __('Relever') }}
        </x-primary-button>
    </a>
</td>

<div class="fa">
    <div class="fac border">
        <div class="border">
            <div class="text-center"><img src="{{ public_path('img/isig.png') }}"></div>
            <div class="text-medium text-center">INSTITUT SUPERIEUR D'INFORMATIQUE ET DE GESTION</div>
        </div>
        <div class="text-xs">
            <span class="w-50">Année académique : {{$year_session}}</span>
            <span class="w-full text-end">Le 03/05/2023</span>
        </div>
        <div class="border p-10">
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
                    Versement: {{ $deposited_amount }}
                </div>
                <div class="inline-block">
                    Date du versement : {{ $deposit_date }}
                </div>
            </div>
            <div class="p-4">
                <div class="p-4 underline text-center">
                    Récapitulatif du paiement
                </div>
                <table border="0px" class="text-xs w-full border-collapse">
                    <tbody>
                        <tr class="text-center">
                            <td>Date versement</td>
                            <td>Date validation</td>
                            <td>Montant payé</td>
                        </tr>
                        <tr class="text-center">
                            @foreach($paymentSummary as $payment)
                        <tr class="text-center">
                            <td>{{ $payment->created_at }}</td>
                            <td>{{ $payment->updated_at }}</td>
                            <td>{{ $payment->inscription + $payment->tranche1 + $payment->tranche2 + $payment->tranche3 }}</td>
                        </tr>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="underline text-center">
                Versement par Tranche
            </div>
        </div>
        <table border="0px" class="text-xs w-full border-collapse">

            <tbody>
                <tr class="text-center">
                    <td></td>
                    <td>Inscription</td>
                    <td>Tranche1</td>
                    <td>Tranche2</td>
                    <td>Tranche3</td>
                    <th>Total</th>
                </tr>
                <tr class="text-center">
                    <td>Date linite de paiement</td>
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
        <div class="text-xs">
            <span class="w-50">Année académique : {{$year_session}}</span>
            <span class="w-full text-end">Le 03/05/2023</span>
        </div>
        <div class="border p-10">
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
                    Versement: {{ $deposited_amount }}
                </div>
                <div class="inline-block">
                    Date du versement : {{ $deposit_date }}
                </div>
            </div>
            <div class="p-4">
                <div class="p-4 underline text-center">
                    Récapitulatif du paiement
                </div>
                <table border="0px" class="text-xs w-full border-collapse">
                    <tbody>
                        <tr class="text-center">
                            <td>Date versement</td>
                            <td>Date validation</td>
                            <td>Montant payé</td>
                        </tr>
                        <tr class="text-center">
                            @foreach($paymentSummary as $payment)
                        <tr class="text-center">
                            <td>{{ $payment->created_at }}</td>
                            <td>{{ $payment->updated_at }}</td>
                            <td>{{ $payment->inscription + $payment->tranche1 + $payment->tranche2 + $payment->tranche3 }}</td>
                        </tr>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="underline text-center">
                Versement par Tranche
            </div>
        </div>
        <table border="0px" class="text-xs w-full border-collapse">

            <tbody>
                <tr class="text-center">
                    <td></td>
                    <td>Inscription</td>
                    <td>Tranche1</td>
                    <td>Tranche2</td>
                    <td>Tranche3</td>
                    <th>Total</th>
                </tr>
                <tr class="text-center">
                    <td>Date linite de paiement</td>
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
<div>
    <table border="0px" class="text-xs w-full border-collapse">
        <tr>
            <td>
                <table border="0px" class="text-xs w-full border-collapse" style="page-break-inside: avoid">
                    <tr>
                        <td colspan="2" class="text-center"><img src="{{ public_path('img/isig.png') }}"></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center">INSTITUT SUPERIEUR D'INFORMATIQUE ET DE GESTION</td>
                    </tr>
                    <tr>
                        <td>
                            <span class="w-50">Année académique : {{$year_session}}</span>
                        </td>
                        <td>
                            <span class="w-full text-end">Le 03/05/2023</span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center">RECU PENSION/FRAIS DIVERS</td>
                    </tr>
                    <tr>
                        <td>Matricule : </td>
                        <td>{{ $student->matricule }}</td>
                    </tr>
                    <tr>
                        <td>Nom : </td>
                        <td>{{ $student->name }}</td>
                    </tr>
                    <tr>
                        <td>Spécialité : </td>
                        <td>{{ $specialty->name }}</td>
                    </tr>
                    <tr>
                        <td>Niveau: {{ $level->name }}</td>
                        <td>Périod : Jour</td>
                    </tr>
                    <tr>
                        <td>Versement: {{ $deposited_amount }}</td>
                        <td>Date du versement : {{ $deposit_date }}</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center underline">Récapitulatif du paiement</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <table border="0px" class="text-xs w-full border-collapse">
                                <tbody>
                                    <tr class="text-center">
                                        <td>Date versement</td>
                                        <td>Date validation</td>
                                        <td>Montant payé</td>
                                    </tr>
                                    @foreach($paymentSummary as $payment)
                                    <tr class="text-center">
                                        <td>{{ $payment->created_at }}</td>
                                        <td>{{ $payment->updated_at }}</td>
                                        <td>{{ $payment->inscription + $payment->tranche1 + $payment->tranche2 + $payment->tranche3 }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center underline">Versement par Tranche</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <table border="0px" class="text-xs w-full border-collapse">
                                <tbody>
                                    <tr class="text-center">
                                        <td></td>
                                        <td>Inscription</td>
                                        <td>Tranche1</td>
                                        <td>Tranche2</td>
                                        <td>Tranche3</td>
                                        <th>Total</th>
                                    </tr>
                                    <tr class="text-center">
                                        <td>Date linite de paiement</td>
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
                        <td colspan="2">Les Frais d'inscription et d'etude de dossier ne sont ni remboursables, ni substituables</td>
                        <td colspan="2">Registration and studying documents fees are not refundable or transferable</td>
                    </tr>
                    <tr>
                        <td colspan="2">
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
                        </td>
                    </tr>
                </table>
            </td>

        </tr>
    </table>
</div>