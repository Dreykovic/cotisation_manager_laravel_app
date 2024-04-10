@extends('pages.membres.show')
@section('membre-settings')
    @php
        $membre_id = Illuminate\Support\Facades\Crypt::encryptString($membre->id);
    @endphp
    <div class="card card-table">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h5 class="card-title">Cotisations</h5>
                </div>
                <div class="col-auto">
                    <a href="{{ route('membres.cotisations_add', $membre_id) }}"
                        class="btn btn-outline-primary btn-sm">Ajouter</a>
                    {{-- <a href="#" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#con-close-modal">Ajouter</a> --}}
                </div>
            </div>
        </div>
        @if (!$membre->cotisations->isEmpty())
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0" id="cotisationTable">
                        <thead>
                            <tr>
                                <th>Nature</th>
                                <th>Montant</th>
                                <th>Date</th>
                                <th>Mode Payement</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($membre->cotisations as $cotisation)
                                @php
                                    $cotisation_id = Illuminate\Support\Facades\Crypt::encryptString($cotisation->id);
                                @endphp
                                <tr>
                                    <td>{{ $cotisation->nature->designation }}</td>
                                    <td>{{ $cotisation->montant }}</td>
                                    <td>
                                        {{ $cotisation->date_cotisation }}
                                    </td>
                                    <td>
                                        {{ $cotisation->canal }}
                                    </td>
                                    <td class="text-end">

                                        <a href="#" id="{{ $cotisation_id }}"
                                            class="btn btn-sm btn-white text-danger me-2 deleteBtn"><i
                                                class="far fa-trash-alt me-1"></i> <span class="normal-status"> Supprimer
                                            </span>
                                            <span class="indicateur d-none">
                                                <span class="spinner-border spinner-border-sm me-1" role="status"
                                                    aria-hidden="true"></span>
                                                Loading...
                                            </span></a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">Aucune cotisation</h5>
                    </div>

                </div>
            </div>
        @endif
    </div>
    @include('pages.membres.settings.create')
@endsection
