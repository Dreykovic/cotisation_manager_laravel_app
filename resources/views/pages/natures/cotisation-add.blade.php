<div id="cont-add-modal" class="modal myModal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card"></div>
            <div class="card-body">
                <form id="cotisationAddForm">
                    @php
                        $nature_id = Illuminate\Support\Facades\Crypt::encryptString($nature->id);
                    @endphp
                    <input type="hidden" name="type" value="{{ $nature_id }}">
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
                                            $membre_id = Illuminate\Support\Facades\Crypt::encryptString($membre->id);
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
