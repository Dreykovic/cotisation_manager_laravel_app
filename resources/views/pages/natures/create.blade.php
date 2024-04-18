<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="natureAddForm">
                <div class="modal-header">
                    <h4 class="modal-title">Ajouter une nature de cotisation</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-4">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="field-3" class="form-label">Désignation</label>
                                <input type="text" class="form-control" id="field-3" placeholder="Désignation"
                                    name="designation">
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
