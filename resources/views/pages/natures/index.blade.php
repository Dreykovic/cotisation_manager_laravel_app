@extends('pages.app')
@section('style')
@endsection

@section('auth-content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Motif de cotisation</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Tableau De Bord</a></li>
                            <li class="breadcrumb-item active">Motif de Cotisation</li>
                        </ul>
                    </div>

                </div>
            </div>




            <div class="card invoices-tabs-card">
                <div class="card-body card-body pt-0 pb-0">
                    <div class="invoices-main-tabs border-0 pb-0">
                        <div class="row align-items-center">
                            <div class="col-lg-12 col-md-12">
                                <div class="invoices-settings-btn invoices-settings-btn-one">


                                    <button type="button" class="btn btn-primary me-1" data-bs-toggle="modal"
                                        data-bs-target="#con-close-modal">
                                        <i data-feather="plus-circle"></i> Nouveau Motif
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @if (!$natures->isEmpty())
                    @foreach ($natures as $nature)
                        @php
                            $nature_id = Illuminate\Support\Facades\Crypt::encryptString($nature->id);
                        @endphp
                        <div class="col-sm-6 col-lg-4 col-xl-3 d-flex parent">
                            <div class="card invoices-grid-card w-100">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <a href="#" class="invoice-grid-link nature">{{ $nature->designation }}</a>
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-end">

                                            <a class="dropdown-item mb-3" href="{{ route('natures.show', $nature_id) }}"><i
                                                    class="far fa-eye me-2"></i>Voir</a>

                                            <button class="dropdown-item mb-3 downloadBtn"
                                                data-nature-id="{{ $nature_id }}"><i
                                                    class="fas fa-file-pdf me-2"></i>Télécharger</button>
                                            <a class="dropdown-item text-danger deleteBtn " href="#"
                                                id="{{ $nature_id }}"><i class="far fa-trash-alt me-2"></i> <span
                                                    class="normal-status">
                                                    Supprimer
                                                </span>
                                                <span class="indicateur d-none">
                                                    <span class="spinner-border spinner-border-sm me-1" role="status"
                                                        aria-hidden="true"></span>
                                                    Loading...
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <span><i class="far fa-money-bill-alt"></i> Montant Total</span>
                                            <h6 class="mb-0 montant">{{ $nature->montant_total }}</h6>
                                        </div>
                                        <div class="col-auto">
                                            <span><i class="far fa-user"></i>Total Cotisations</span>
                                            <h6 class="mb-0">{{ $nature->cotisations->count() }}</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="card-footer">
                        <h4 class="card-title">Pas de motif, liste vide</h4>
                    </div>
                @endif

            </div>
        </div>
    </div>
    @include('pages.natures.create')
    @include('pdf.pdf-view')
@endsection





@push('js')
    <script src="{{ asset('app-js/natures/add.js') }}"></script>
    <script src="{{ asset('app-js/natures/index.js') }}"></script>
    <script src="{{ asset('app-js/natures/pdf.js') }}"></script>
@endpush
