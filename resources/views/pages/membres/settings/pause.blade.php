<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="cotisationAddForm">
                @php
                    $membre_id = Illuminate\Support\Facades\Crypt::encryptString($membre->id);
                @endphp
                <div class="modal-header">
                    <h4 class="modal-title">Ajouter une cotisation</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-4">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">

                                <label for="date" class="form-label">Date:</label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" type="text" name="date"
                                        id="date">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">

                                <label for="date" class="form-label">Date:</label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" type="text" name="date"
                                        id="date">
                                </div>
                                <label for="montant" class="form-label">Montant:</label>
                                <input type="text" class="form-control" name="montant" id="montant">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">

                                <label class="form-label" for="motif">Motif De Cotisation:</label>

                                <select class="select select2-types" name="type" id="motif">

                                    @foreach ($natures as $nature)
                                        @php
                                            $nature_id = Illuminate\Support\Facades\Crypt::encryptString($nature->id);
                                        @endphp
                                        <option value="{{ $nature_id }}">{{ $nature->designation }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">

                                <label class="form-label" for="mode">Mode de payement:</label>
                                <select class="select" name="mode" id="mode">
                                    <option disabled>Select Payment Mode</option>
                                    <option value="Main à main">Main à main</option>
                                    <option value="Tmoney">Tmoney</option>
                                    <option value="Flooz">Flooz</option>
                                </select>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-info waves-effect waves-light natureAddBtn"><span
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
</div>
