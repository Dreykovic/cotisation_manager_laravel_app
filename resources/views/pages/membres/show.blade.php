@extends('pages.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">


    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
@endsection
@section('auth-content')
    @php
        $membre_id = Illuminate\Support\Facades\Crypt::encryptString($membre->id);
    @endphp
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="page-title">Parametres</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Tableau De Bord</a>
                            </li>
                            <li class="breadcrumb-item active">Paramètre profile</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-md-4">

                    <div class="widget card-body shadow settings-menu">
                        <ul>
                            <li class="nav-item">
                                <a href="{{ route('membres.info', $membre_id) }}"
                                    class="nav-link {{ Str::startsWith(request()->path(), 'membres/settings/info') ? 'active' : '' }}">
                                    <i class="far fa-user"></i> <span>Paramètre profile</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('membres.cotisations', $membre_id) }}"
                                    class="nav-link {{ Str::startsWith(request()->path(), 'membres/settings/cotisations') ? 'active' : '' }}"">
                                    <i class="far fa-check-square"></i> <span>Cotisations</span>
                                </a>
                            </li>
                            {{-- 
                            <li class="nav-item">
                                <a href="{{ route('membres.password', $membre_id) }}"
                                    class="nav-link {{ Str::startsWith(request()->path(), 'membres/settings/mot-de-passe') ? 'active' : '' }}"">
                                    <i class="fas fa-unlock-alt"></i> <span>Changer Mot De Passe</span>
                                </a>
                            </li> --}}

                        </ul>
                    </div>

                </div>
                <div class="col-xl-9 col-md-8">
                    @yield('membre-settings')
                    {{-- @include('pages.membres.settings.info') --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('app-js/membres/update.js') }}"></script>
    <script src="{{ asset('app-js/cotisations/add.js') }}"></script>
    <script src="{{ asset('app-js/cotisations/delete.js') }}"></script>

    <script src="{{ asset('app-js/natures/add.js') }}"></script>

    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
@endpush
