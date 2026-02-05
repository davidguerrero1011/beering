<div>
    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">

                <!-- Header -->
                <div class="modal-header">
                    <h3 class="modal-title" id="profileLabel"><i class="bi bi-key"></i> {{ $title }}</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <!-- Body -->
                <div class="modal-body">
                    <div>
                        <p>Ingrese su antigua contraseña</p>
                        <div class="input-group flex-nowrap">
                            <div class="container">
                                <div class="row" id="firstStep">
                                    <div class="col-12 col-md-6 mx-auto text-center">
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="option1" name="options" value="1">
                                            <label class="form-check-label">Recuerda su contraseña?</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mx-auto text-center">
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="option2" name="options" value="2">
                                            <label class="form-check-label">Recibir Código</label>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="row mt-3">
                                    <div class="col-12 col-md-12">
                                        <form class="d-none" method="post" id="validatePassword">
                                            <input type="hidden" name="userId" id="userId" value="{{ $userId }}">
                                            <div>
                                                <input type="text" class="form-control mb-3" placeholder="Contraseña Antigua" id="oldPassword" onblur="validateOldPassword(this.value);" name="oldPassword">
                                                <span id="oldErrors" class="text-danger"</span>
                                            </div>
                                            <div>
                                                <input type="text" class="form-control" placeholder="Contraseña Nueva" id="newPassword" name="newPassword" disabled>
                                                <span id="newErrors"></span>
                                            </div>
                                        </form>
                                    </div>
                                
                                    <div class="col-12 col-md-12 mt-3">
                                        <div class="container d-none" id="sendCode">
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <button type="button" class="btn btn-primary" onclick="updatePassword();">Enviar Código</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="modal-footer d-none">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="closeModal('paymentModal');">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="submitPassword">Aceptar</button>
                </div>

            </div>
        </div>
    </div>
</div>
