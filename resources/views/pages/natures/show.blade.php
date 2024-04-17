@extends('pages.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatables.min.css') }}">
@endsection







@section('auth-content')
    @php
        $nature_id = Illuminate\Support\Facades\Crypt::encryptString($nature->id);
    @endphp
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Cotisations pour {{ $nature->designation }}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Tableau De Bord</a></li>
                            <li class="breadcrumb-item ">{{ $nature->designation }}</li>
                            <li class="breadcrumb-item active">Cotisations</li>

                        </ul>
                    </div>
                    <div class="col-auto">

                        <button type="button" class="btn btn-primary me-1" data-bs-toggle="modal"
                            data-bs-target="#cont-add-modal">
                            <i class="fas fa-plus"></i> Ajouter
                        </button>
                        <button class="btn btn-primary" id="downloadBtn" data-nature-id="{{ $nature_id}}">
                            <i class="fas fa-download"></i>
                        </button>
                    </div>
                </div>
            </div>

            @if (!$nature->cotisations->isEmpty())
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-table">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-center table-hover datatable" id="cotisationTable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Membre</th>
                                                <th>Montant</th>
                                                <th>Date</th>
                                                <th>Canal de payement</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($nature->cotisations as $cotisation)
                                                @php
                                                    $cotisation_id = Illuminate\Support\Facades\Crypt::encryptString(
                                                        $cotisation->id,
                                                    );
                                                @endphp
                                                <tr>

                                                    <td>
                                                        <h2 class="table-avatar">
                                                            @php
                                                                $membre_id = Illuminate\Support\Facades\Crypt::encryptString(
                                                                    $cotisation->membre->id,
                                                                );
                                                            @endphp
                                                            <a href="{{ route('membres.info', $membre_id) }}"
                                                                class="memberName">
                                                                <i class="avatar avatar-sm me-2 avatar-img rounded-circle"
                                                                    data-feather="user">
                                                                </i>

                                                                {{ $cotisation->membre->user->last_name . ' ' . $cotisation->membre->user->first_name }}

                                                            </a>
                                                        </h2>
                                                    </td>
                                                    <td>{{ $cotisation->montant }} </td>
                                                    <td>{{ $cotisation->date_cotisation }}</td>
                                                    <td>{{ $cotisation->canal }}</td>
                                                    <td class="text-end">

                                                        <a href="#"
                                                            class="btn btn-sm btn-white text-danger me-2 deleteBtn"
                                                            id="{{ $cotisation_id }}"><i
                                                                class="far fa-trash-alt me-1 "></i>
                                                            <span class="normal-status"> Supprimer
                                                            </span>
                                                            <span class="indicateur d-none">
                                                                <span class="spinner-border spinner-border-sm me-1"
                                                                    role="status" aria-hidden="true"></span>
                                                                Loading...
                                                            </span></a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="card-footer">
                    <h4 class="card-title">,Pas de cotisation liste vide</h4>
                </div>
            @endif
        </div>
    </div>
    @include('pages.natures.cotisation-add')
    @include('pages.natures.pdf-view')

@endsection




@push('js')
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('app-js/cotisations/add.js') }}"></script>
    <script src="{{ asset('app-js/cotisations/delete.js') }}"></script>
    <script src="{{ asset('app-js/natures/pdf.js') }}"></script>
@endpush
