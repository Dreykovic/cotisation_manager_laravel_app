@extends('pages.membres.show')
@section('membre-settings')
    <div class="card shadow">
        <div class="card-header">
            <h5 class="card-title">Change Password</h5>
        </div>
        <div class="card-body">

            <form id="pwdResetForm">
                {{-- <div class="row form-group">
                    <label for="current_password" class="col-sm-3 col-form-label input-label">Current Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="current_password"
                            placeholder="Enter current password">
                    </div>
                </div> --}}
                <div class="row form-group">
                    <label for="new_password" class="col-sm-3 col-form-label input-label">Nouveau mot de passe</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="new_password" placeholder="Entrer un nouveau mot de passe" name="password" autocomplete="off">
                     
                    </div>
                </div>
                <div class="row form-group">
                    <label for="confirm_password" class="col-sm-3 col-form-label input-label">Confirmer le nouveau mot de passe</label>
                    <div class="col-sm-9">
                        <div class="mb-3">
                            <input type="password" class="form-control" id="confirm_password"
                                placeholder="Confirmer le nouveau mot de passe" name="password_confirmation" autocomplete="off">
                        </div>
                       
                    </div>
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-info waves-effect waves-light pwdResetBtn"><span
                        class="normal-status">
                        Ajouter le type
                    </span>
                    <span class="indicateur d-none">
                        <span class="spinner-border spinner-border-sm me-1" role="status"
                            aria-hidden="true"></span>
                        Loading...
                    </span></button>
                </div>
            </form>

        </div>
    </div>
@endsection
