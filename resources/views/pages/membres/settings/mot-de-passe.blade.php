@extends('pages.membres.show')
@section('membre-settings')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Change Password</h5>
        </div>
        <div class="card-body">

            <form>
                <div class="row form-group">
                    <label for="current_password" class="col-sm-3 col-form-label input-label">Current Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="current_password"
                            placeholder="Enter current password">
                    </div>
                </div>
                <div class="row form-group">
                    <label for="new_password" class="col-sm-3 col-form-label input-label">New
                        Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="new_password" placeholder="Enter new password">
                        <div class="progress progress-md mt-2">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 2%" aria-valuenow="2"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <label for="confirm_password" class="col-sm-3 col-form-label input-label">Confirm new password</label>
                    <div class="col-sm-9">
                        <div class="mb-3">
                            <input type="password" class="form-control" id="confirm_password"
                                placeholder="Confirm your new password">
                        </div>
                        <h5>Password requirements:</h5>
                        <p class="mb-2">Ensure that these requirements are met:</p>
                        <ul class="list-unstyled small">
                            <li>Minimum 8 characters long - the more, the better</li>
                            <li>At least one lowercase character</li>
                            <li>At least one uppercase character</li>
                            <li>At least one number, symbol</li>
                        </ul>
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>

        </div>
    </div>
@endsection
