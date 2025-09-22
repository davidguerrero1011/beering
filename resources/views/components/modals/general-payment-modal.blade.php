<div>
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="{{ $id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">

                <!-- Header -->
                <div class="modal-header">
                    <h1 class="modal-title" id="{{ $id }}Label">Total Mesa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <!-- Body -->
                <div class="modal-body">
                    <div id="firstStep">
                        <h3>Número de cuentas</h3>
                        <p>Ingrese el numero de cuentas</p>
                        <div class="input-group flex-nowrap">
                            <input type="number" class="form-control" placeholder="Número de cuentas" id="accountNumber" aria-label="accounts" aria-describedby="addon-wrapping" value="0">
                        </div>
                    </div>

                    <div id="showAccountInfo"></div>
                </div>

                <!-- Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="closeModal();">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="submitInfoAccount">Aceptar</button>
                </div>

            </div>
        </div>
    </div>
</div>
