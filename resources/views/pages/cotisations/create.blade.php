@extends('pages.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">


    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
@endsection
@section('auth-content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Cotisations</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Tableau De Bord</a></li>
                            <li class="breadcrumb-item"><a href="payments.html">Cotisations</a></li>
                            <li class="breadcrumb-item active">Ajouter une cotisation</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form id="cotisationAddForm">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Date:</label>
                                            <div class="cal-icon">
                                                <input class="form-control datetimepicker" type="text" name="date">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Membre:</label>


                                            <select class="placeholder js-states select form-control select2-membres"
                                                name="membre">

                                                @foreach ($membres as $membre)
                                                    @php
                                                        $membre_id = Illuminate\Support\Facades\Crypt::encryptString(
                                                            $membre->id,
                                                        );
                                                    @endphp
                                                    <option value="{{ $membre_id }}">
                                                        {{ $membre->user->last_name . ' ' . $membre->user->first_name }}
                                                    </option>
                                                @endforeach
                                            </select>


                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Montant:</label>
                                            <input type="text" class="form-control" name="montant">
                                        </div>

                                        <div class="form-group">
                                            <label>Motif De Cotisation:</label>
                                            <button type="button" class="btn btn-primary me-1" data-bs-toggle="modal"
                                                data-bs-target="#con-close-modal">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                            <select class="select select2-types" name="type">

                                                @foreach ($natures as $nature)
                                                    @php
                                                        $nature_id = Illuminate\Support\Facades\Crypt::encryptString(
                                                            $nature->id,
                                                        );
                                                    @endphp
                                                    <option value="{{ $nature_id }}">{{ $nature->designation }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Mode de payement:</label>
                                            <select class="select" name="mode">
                                                <option disabled>Select Payment Mode</option>
                                                <option value="Main à main">Main à main</option>
                                                <option value="Tmoney">Tmoney</option>
                                                <option value="Flooz">Flooz</option>
                                            </select>
                                        </div>
                                        <div class="text-end mt-4">
                                            <button type="submit" class="btn btn-primary cotisationAddBtn"> <span
                                                    class="normal-status">
                                                    Ajouter la cotisation
                                                </span>
                                                <span class="indicateur d-none">
                                                    <span class="spinner-border spinner-border-sm me-1" role="status"
                                                        aria-hidden="true"></span>
                                                    Loading...
                                                </span>
                                            </button>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('pages.natures.create')
@endsection


@push('js')
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('app-js/cotisations/add.js') }}"></script>
    <script src="{{ asset('app-js/natures/add.js') }}"></script>

    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
@endpush
