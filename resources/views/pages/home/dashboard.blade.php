@extends('pages.app')
@section('auth-content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-xl-6 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('cotisations.index') }}">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-1">
                                        <i class="fas fa-dollar-sign"></i>
                                    </span>
                                    <div class="dash-count">
                                        <div class="dash-title">Cotisations</div>

                                    </div>
                                </div>
                            </a>

                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('membres.index') }}">

                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-2">
                                        <i class="fas fa-users"></i>
                                    </span>
                                    <div class="dash-count">
                                        <div class="dash-title">Membres</div>

                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
@endsection
