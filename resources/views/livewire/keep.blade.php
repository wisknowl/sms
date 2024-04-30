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

<div class="overflow-hidden border rounded">
    <table class="min-w-full text-center text-sm font-light">
        <thead class="border-b font-medium dark:border-neutral-500 bg-white">
            <tr>
                <th scope="col" class="px-4 py-2 border">Inscription</th>
                <th scope="col" class="px-4 py-2 border">Frais Medicale</th>
                <th scope="col" class="px-4 py-2 border">1ere Tranche</th>
                <th scope="col" class="px-4 py-2 border">2eme Tranche</th>
                <th scope="col" class="px-4 py-2 border">3eme Tranche</th>
                <th scope="col" class="px-4 py-2 border">Period</th>
                <th scope="col" class="px-4 py-2 border">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-300 dark:border-neutral-300 dark:hover:bg-neutral-200 bg-neutral-100 even:bg-neutral-200">
                <td class="whitespace-nowrap px-4 py-2 border font-medium">35000</td>
                <td class="whitespace-nowrap px-4 py-2 border font-medium">5000</td>
                <td class="whitespace-nowrap px-4 py-2 border">230000</td>
                <td class="whitespace-nowrap px-4 py-2 border">85000</td>
                <td class="whitespace-nowrap px-4 py-2 border">35000</td>
                <td class="whitespace-nowrap px-4 py-2 border">Jour</td>
                <td class="whitespace-nowrap px-4 py-2 flex justify-center items-center">
                    <button type="button" wire:click.prevent='' class="flex justify-center items-center font-medium text-red-600 dark:text-red-500 hover:underline" data-te-toggle="modal" data-te-target="#deleteModal">
                        <span class="mr-0 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                            <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2h4a1 1 0 1 1 0 2h-1.069l-.867 12.142A2 2 0 0 1 17.069 22H6.93a2 2 0 0 1-1.995-1.858L4.07 8H3a1 1 0 0 1 0-2h4V4zm2 2h6V4H9v2zM6.074 8l.857 12H17.07l.857-12H6.074zM10 10a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1zm4 0a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1z" fill="#FF0000" />
                            </svg>
                        </span>
                        <span></span>
                    </button>

                    <!-- <button wire:click="$emit('openModal', 'mymodal')">Open Modal</button> X-->
                    <!-- <button wire:click="$dispatch('openModal', {component: 'mymodal'})"></button> -->
                    <button class="edit mx-2 font-medium text-blue-600 dark:text-red-500 hover:underline" data-te-toggle="modal" id="btnModal">
                        <span class="mr-0 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                            <svg fill="#000000" width="800px" height="800px" viewBox="0 0 24 24" id="edit" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color">
                                <path id="secondary" d="M21,22H3a1,1,0,0,1,0-2H21a1,1,0,0,1,0,2Z" style="fill: rgb(44, 169, 188);"></path>
                                <path id="primary" d="M20.71,3.29a2.93,2.93,0,0,0-2.2-.84,3.25,3.25,0,0,0-2.17,1L7.46,12.29a1.16,1.16,0,0,0-.25.43L6,16.72A1,1,0,0,0,7,18a.9.9,0,0,0,.28,0l4-1.17a1.16,1.16,0,0,0,.43-.25l8.87-8.88a3.25,3.25,0,0,0,1-2.17A2.91,2.91,0,0,0,20.71,3.29Z" style="fill: #0000FF;"></path>
                            </svg>
                        </span>
                    </button>
                    <a href="#">
                        <button class="font-medium text-blue-600 dark:text-red-500 hover:underline">
                            <span class="mr-0 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                <svg width="800px" height="800px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill="#4A4A4A" fill-rule="evenodd" d="M2.5,7.5 C3.88071187,7.5 5,8.61928813 5,10 C5,11.3807119 3.88071187,12.5 2.5,12.5 C1.11928813,12.5 0,11.3807119 0,10 C0,8.61928813 1.11928813,7.5 2.5,7.5 Z M17.5,7.5 C18.8807119,7.5 20,8.61928813 20,10 C20,11.3807119 18.8807119,12.5 17.5,12.5 C16.1192881,12.5 15,11.3807119 15,10 C15,8.61928813 16.1192881,7.5 17.5,7.5 Z M10.226404,7.5 C11.6071159,7.5 12.726404,8.61928813 12.726404,10 C12.726404,11.3807119 11.6071159,12.5 10.226404,12.5 C8.84569215,12.5 7.72640403,11.3807119 7.72640403,10 C7.72640403,8.61928813 8.84569215,7.5 10.226404,7.5 Z" />
                                </svg>
                            </span>
                        </button>
                    </a>

                </td>
            </tr>

        </tbody>
    </table>
</div>