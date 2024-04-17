@extends('pages.app')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/plugins/intl-tel-input/css/intlTelInput.min.css') }}">
@endsection
@section('guest-content')
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <img class="img-fluid logo-dark mb-2" src="{{ asset('assets/img/logo.png') }}" alt="Logo">
                <div class="login-right-wrap">

                    <div class="card">
                        <div class="card-header">

                            <h1 class="m-auto">Enregistrement</h1>
                            <p class="account-subtitle">Enregistrer vous</p>
                        </div>


                        <div class="card-body">

                            <form id="registerForm">

                                <div class="row form-group">
                                    <label for="name" class="col-sm-3 col-form-label input-label required">Nom </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name"
                                            placeholder="Votre nom de famille" name="nom" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="name"
                                        class="col-sm-3 col-form-label input-label required">Prénoms</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name"
                                            placeholder="Votre (vos) prénoms" name="prenom" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label input-label required">Sexe</label>
                                    <div class="col-md-9">
                                        <div class="checkbox">
                                            <label>
                                                <input type="radio" name="sexe" value="Féminin"> Féminin
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="radio" name="sexe" value="Masculin">Masculin
                                            </label>
                                        </div>

                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="addressline1" class="col-sm-3 col-form-label input-label required">Date de
                                        naissance
                                    </label>
                                    <div class="col-sm-9">
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker" type="text" name="date"
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <label for="addressline2" class="col-sm-3 col-form-label input-label required">Nom Du
                                        Pere
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="addressline2"
                                            placeholder="Prénoms de votre père" name="pere" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="addressline2" class="col-sm-3 col-form-label input-label required">Nom De
                                        La Mère
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="addressline2"
                                            placeholder="Prénoms de votre mère" name="mere" required>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <label for="phone" class="col-sm-3 col-form-label input-label required">Contact
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="tel" class="form-control" id="phone" placeholder=""
                                            name="telephone" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="location" class="col-sm-3 col-form-label input-label">Adresse</label>
                                    <div class="col-sm-9">
                                        <div class="mb-3">  
                                            <select type="text" class="form-control" id="location" placeholder="Pays"
                                                name="pays"></select>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="Ville ou Village"
                                                name="ville">
                                        </div>


                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="email" class="col-sm-3 col-form-label input-label">Email
                                        (optionnel)</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="email" placeholder="Email"
                                            name="email">
                                    </div>
                                </div>


                                <div class="text-end">

                                    <button onclick="location.reload()" class="btn btn-secondary "><span
                                            class="normal-status">
                                            Annuler
                                        </span>
                                    </button>
                                    <button type="submit" class="btn btn-primary " id="submitBtn"><span
                                            class="normal-status">
                                            Soumettre
                                        </span>
                                        <span class="indicateur d-none">
                                            <span class="spinner-border spinner-border-sm me-1" role="status"
                                                aria-hidden="true"></span>
                                            Loading...
                                        </span>
                                    </button>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/intl-tel-input/js/intlTelInput.min.js') }}"></script>

    <script src="{{ asset('app-js/auth/register.js') }}"></script>
@endpush
