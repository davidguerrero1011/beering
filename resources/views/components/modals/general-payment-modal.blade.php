<div>
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">

                <!-- Header -->
                <div class="modal-header">
                    <h1 class="modal-title" id="ModalTitle"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <!-- Body -->
                <div class="modal-body">
                    <div id="firstStep">
                        <h3>Seleccione los productos</h3>
                    <div>
                        <form id="listproducts">
                            @csrf
                            <fieldset>
                                <div class="mb-3 mt-3 form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="tableStatus" name="tableStatus" onchange="showInfo(this.checked, this, {{ $user }});">
                                    <label class="form-check-label" for="tableStatus">Habilitar Compra</label>
                                </div>
                                <div class="mb-3">
                                    <label for="productsList" class="form-label">Producto</label>
                                    <select id="productsList" class="form-select" name="product" disabled>
                                        <option value="0">Seleccione el producto</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="amount" class="form-label">Cantidad</label>
                                    <input type="number" id="amount" class="form-control" name="amount" id="amount" placeholder="Ingrese la cantidad del producto" disabled>
                                    <input type="hidden" name="clubTable" value="" id="clubTable">
                                </div>
                            </fieldset>

                             <!-- Footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="closeModal('paymentModal');">Cancelar</button>
                                <button type="button" class="btn btn-primary" onclick="storeProducts();" id="submitInfoAccount">Aceptar</button>
                                <button type="button" class="btn btn-danger" id="deleteInfoAccount">Borrar</button>
                                <button type="button" class="btn btn-warning" id="showoAccount" onclick="getTableInformation(this);">Mostrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
