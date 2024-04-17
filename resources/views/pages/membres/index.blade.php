@extends('pages.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatables.min.css') }}">
@endsection

@section('auth-content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Membres</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Tableau de bord</a></li>
                            <li class="breadcrumb-item active">Membres</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-header">
                            <h4 class="card-title">Liste des Membres</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @if (!$membres->isEmpty())
                                    <table class="table table-stripped table-center table-hover datatable"
                                        id="membersTable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Nom</th>
                                                <th>Père</th>
                                                <th>Mère</th>
                                                <th>Sexe</th>
                                                <th>Adresse</th>
                                                <th class="text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($membres as $membre)
                                                @php
                                                    $membre_id = Illuminate\Support\Facades\Crypt::encryptString(
                                                        $membre->id,
                                                    );
                                                @endphp
                                                <tr>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="{{ route('membres.info', $membre_id) }}"
                                                                class="memberName">
                                                                <i class="avatar avatar-sm me-2 avatar-img rounded-circle"
                                                                    data-feather="user">
                                                                </i>

                                                                {{ $membre->user->last_name . ' ' . $membre->user->first_name }}

                                                            </a>
                                                        </h2>
                                                    </td>
                                                    <td>{{ $membre->user->nom_pere }}
                                                    </td>
                                                    <td>{{ $membre->user->nom_mere }}</td>
                                                    <td>{{ $membre->user->sexe }}</td>
                                                    <td>{{ $membre->user->pays . '/' . $membre->user->ville }}</td>
                                                    <td class="text-end">
                                                        <a href="{{ route('membres.cotisations', $membre_id) }}"
                                                            class="btn btn-sm btn-white text-success me-2"><i
                                                                class="far fa-eye me-1"></i> Cotisations</a>
                                                        <a href="#"
                                                            class="btn btn-sm btn-white text-danger me-2 deleteBtn"
                                                            id="{{ $membre_id }}"><i class="far fa-trash-alt me-1 "></i>
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
                                @else
                                    <div class="card-footer">
                                        <h4 class="card-title">Aucun membre, liste vide</h4>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('app-js/membres/index.js') }}"></script>
@endpush
