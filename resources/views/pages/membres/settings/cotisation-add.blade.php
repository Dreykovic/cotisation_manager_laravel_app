@extends('pages.membres.show')
@section('membre-settings')
    <div class="card shadow">
        <div class="card-body">
            <form id="cotisationAddForm">
                @php
                    $membre_id = Illuminate\Support\Facades\Crypt::encryptString($membre->id);
                @endphp
                <input type="hidden" name="membre" value="{{ $membre_id }}">


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Date:</label>
                            <div class="cal-icon">
                                <input class="form-control datetimepicker" type="text" name="date">
                            </div>
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
                                        $nature_id = Illuminate\Support\Facades\Crypt::encryptString($nature->id);
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
                            <button type="submit" class="btn btn-primary cotisationAddBtn"> <span class="normal-status">
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
    @include('pages.natures.create')
@endsection
