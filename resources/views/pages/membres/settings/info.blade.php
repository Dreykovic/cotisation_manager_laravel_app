@extends('pages.membres.show')
@section('membre-settings')
    @php
        $membre_id = Illuminate\Support\Facades\Crypt::encryptString($membre->id);
    @endphp
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">information basique</h5>
        </div>
        <div class="card-body">

            <form id="membreUpdateForm">
                <input type="hidden" name="membre" value="{{ $membre_id }}">
                <div class="row form-group">
                    <label for="name" class="col-sm-3 col-form-label input-label">Nom </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" placeholder="Votre nom de famille"
                            value="{{ $membre->user->last_name }}" name="nom">
                    </div>
                </div>
                <div class="row form-group">
                    <label for="name" class="col-sm-3 col-form-label input-label">Prénoms</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" placeholder="Votre (vos) prénoms"
                            value="{{ $membre->user->first_name }}" name="prenom">
                    </div>
                </div>
                <div class="row form-group">
                    <label for="email" class="col-sm-3 col-form-label input-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="email" placeholder="Email"
                            value="{{ $membre->user->email }}" name="email">
                    </div>
                </div>
                <div class="row form-group">
                    <label for="phone" class="col-sm-3 col-form-label input-label">Contact </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="phone" placeholder="XXXXXXXX"
                            value="{{ $membre->user->contact }}" name="telephone">
                    </div>
                </div>
                <div class="row form-group">
                    <label for="location" class="col-sm-3 col-form-label input-label">Adresse</label>
                    <div class="col-sm-9">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="location" placeholder="Pays"
                                value="{{ $membre->user->pays }}" name="pays">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Ville ou Village"
                                value="{{ $membre->user->ville }}" name="ville">
                        </div>
                        {{-- <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Ville ou Village"
                                value="{{ $membre->user->quartier }}" name="quartier">
                        </div> --}}

                    </div>
                </div>
                <div class="row form-group">
                    <label for="addressline1" class="col-sm-3 col-form-label input-label">Date de naissance
                    </label>
                    <div class="col-sm-9">

                        <input class="form-control datetimepicker" type="text" name="date"
                            value="{{ $membre->user->date_naissance }}">
                    </div>
                </div>
                <div class="row form-group">
                    <label for="addressline2" class="col-sm-3 col-form-label input-label">Nom Du Pere
                    </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="addressline2" placeholder="Prénoms de votre père"
                            value="{{ $membre->user->nom_pere }}" name="pere">
                    </div>
                </div>
                <div class="row form-group">
                    <label for="addressline2" class="col-sm-3 col-form-label input-label">Nom De La Mère
                    </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="addressline2" placeholder="Prénoms de votre mère"
                            value="{{ $membre->user->nom_mere }}" name="mere">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label input-label">Genre</label>
                    <div class="col-md-9">
                        <div class="checkbox">
                            <label>
                                <input type="radio" name="sexe" value="Féminin"
                                    {{ $membre->user->sexe === 'Féminin' ? 'checked' : '' }}> Femme
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="radio" name="sexe" value="Masculin"
                                    {{ $membre->user->sexe === 'Masculin' ? 'checked' : '' }}>Homme
                            </label>
                        </div>

                    </div>
                </div>

                <div class="text-end">

                    <button onclick="location.reload()" class="btn btn-secondary "><span class="normal-status">
                            Annuler
                        </span>
                    </button>
                    <button type="submit" class="btn btn-primary membreUpdateBtn"><span class="normal-status">
                            Appliquer les changements
                        </span>
                        <span class="indicateur d-none">
                            <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                            Loading...
                        </span>
                    </button>

                </div>
            </form>

        </div>
    </div>
@endsection
