<div>
    <div class="modal fade" id="statesModal" tabindex="-1" aria-labelledby="3" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content bg-info text-white">

                <!-- Header -->
                <div class="modal-header">
                    <h1 class="modal-title" id="statusModalTitle">Estado</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <!-- Body -->
                <div class="modal-body">
                    <div class="container">
                        <div class="col">
                            <p>La mesa va a estar en el estado:</p>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="available" name="status" value="Disponible">
                                <label for="available" class="form-check-label">Disponible</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="busy" name="status" value="Ocupada">
                                <label for="busy" class="form-check-label">Ocupada</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="reservade" name="status" value="Reservada">
                                <label for="reservade" class="form-check-label">Reservada</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
