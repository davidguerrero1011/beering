$(document).ready(function () {
    $("#submitInfoAccount").attr("disabled", true);
    $("#showAccountInfo").css("display", "none");
    $("#supplierUsers").css("display", "none");
    $("#showoAccount").css("display", "none");
});

axios.defaults.headers.common["X-CSRF-TOKEN"] = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");

function deleteConfig(id, type) {
    let category = "";
    switch (type) {
        case 1:
            category = "el país";
            break;
        case 2:
            category = "la ciudad";
            break;
        case 3:
            category = "el rol";
            break;
        case 4:
            category = "el usuario";
            break;
        case 5:
            category = "la mesa";
            break;
        case 6:
            category = "el registro de inventario";
            break;
        case 7:
            category = "el registro de caja";
            break;
        case 8:
            category = "el cobro";
            break;
        case 9:
            category = "el pago";
            break;
        case 10:
            category = "la promoción";
            break;
        case 11:
            category = "la preparación";
            break;
        case 12:
            category = "la canción";
            break;
        case 13:
            category = "los productos";
            break;
        case 14:
            category = "las categorias";
            break;
        case 15:
            category = "el tipo de pago";
            break;
        case 16:
            category = "el proveedor";
            break;
        default:
            console.log("No existe el modulo");
            break;
    }

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger",
        },
        buttonsStyling: false,
    });
    swalWithBootstrapButtons
        .fire({
            title: "Esta seguro?",
            text: `De borrar ${category}, despues no podra revertir esta acción, esta seguro de continuar?`,
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Si, Borrelo!",
            cancelButtonText: "No, Mejor no!",
            reverseButtons: true,
        })
        .then((result) => {
            if (result.isConfirmed) {
                let formData = new FormData();
                formData.append(
                    "_token",
                    document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                );

                axios
                    .delete(`/configuration/destroy/${id}/${type}`, {
                        data: formData,
                    })
                    .then((response) => {
                        setTimeout(function () {
                            const swalWithBootstrapButtons = Swal.mixin({
                                customClass: {
                                    confirmButton: "btn btn-success",
                                    cancelButton: "btn btn-danger",
                                },
                                buttonsStyling: false,
                            });

                            swalWithBootstrapButtons
                                .fire({
                                    title:
                                        response.data.status == "success"
                                            ? "Borrado!"
                                            : response.data.status == "warning"
                                              ? "Cuidado"
                                              : "Error",
                                    text: `${response.data.message}`,
                                    icon:
                                        response.data.status == "success"
                                            ? "success"
                                            : response.data.status == "warning"
                                              ? "warning"
                                              : "error",
                                    timer: 3000,
                                    showConfirmButton: false,
                                })
                                .then(() => {
                                    location.reload();
                                });
                        });
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: "Cancelado",
                    text: `${category} a borrar fue cancelado a tiempo!`,
                    icon: "error",
                });
            }
        });
}

function changeStatus(id, status, type) {
    let formData = new FormData();
    formData.append("id", id);
    formData.append("_method", "PUT");
    formData.append("status", status);
    formData.append("type", type);
    formData.append(
        "_token",
        document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content"),
    );

    axios
        .post(`/configuration/update-status`, formData)
        .then((response) => {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger",
                },
                buttonsStyling: false,
            });

            setTimeout(function () {
                swalWithBootstrapButtons
                    .fire({
                        title:
                            response.data.status == "success"
                                ? "Actualizado!"
                                : response.data.status == "warning"
                                  ? "Cuidado"
                                  : "Error",
                        text: `${response.data.message}`,
                        icon:
                            response.data.status == "success"
                                ? "success"
                                : response.data.status == "warning"
                                  ? "warning"
                                  : "error",
                        timer: 3000,
                        showConfirmButton: false,
                    })
                    .then(() => {
                        location.reload();
                    });
            });
        })
        .catch((error) => {
            console.log(error);
        });
}

function showTableDetails(id, state, userId, element) {
    showDetails(id, userId);

    if (state == "Disponible") {
        const modalState = new bootstrap.Modal(
            document.getElementById("statesModal"),
        );
        modalState.show();
        var globalState = "";

        document.querySelectorAll('input[name="status"]').forEach((radio) => {
            radio.onclick = function () {
                let formData = new FormData();
                formData.append(
                    "_token",
                    document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                );
                formData.append("state", this.value);
                formData.append("table", id);

                axios
                    .post(`/getStatesTable`, formData)
                    .then((response) => {
                        globalState = response.data.status.state;
                        const swalWithBootstrapButtons = Swal.mixin({
                            customClass: {
                                confirmButton: "btn btn-success",
                                cancelButton: "btn btn-danger",
                            },
                            buttonsStyling: false,
                        });
                        swalWithBootstrapButtons.fire({
                            title: "Estado Actualizado",
                            text: `La tabla quedo con estado ${globalState}`,
                            icon: "success",
                            timer: 3000,
                            showConfirmButton: false,
                        });
                        modalState.hide();

                        if (globalState == "Disponible") {
                            location.reload();
                        } else if (globalState == "Ocupada") {
                            const modal = new bootstrap.Modal(
                                document.getElementById("paymentModal"),
                            );
                            modal.show();
                            $("#clubTable").val(id);

                            let formData = new FormData();
                            formData.append(
                                "_token",
                                document
                                    .querySelector('meta[name="csrf-token"]')
                                    .getAttribute("content"),
                            );
                            formData.append("id", id);

                            axios
                                .post(`/configuration/table-name`, formData)
                                .then((response) => {
                                    document.getElementById(
                                        `ModalTitle`,
                                    ).innerHTML =
                                        response.data.data.table +
                                        " " +
                                        response.data.data.number;
                                    axios
                                        .get(
                                            "/configuration/products",
                                            formData,
                                        )
                                        .then((response) => {
                                            console.log(response);
                                            var options = response.data[0]
                                                .map(
                                                    (element) =>
                                                        `<option>${element.product}</option>`,
                                                )
                                                .join("");

                                            $("#productsList").append(options);
                                        })
                                        .catch((error) => {
                                            console.log(error);
                                        });
                                })
                                .catch((error) => {
                                    console.log(error);
                                });
                        }
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            };
        });
    } else {
        const modal = new bootstrap.Modal(
            document.getElementById("paymentModal"),
        );
        modal.show();
        $("#clubTable").val(id);

        let formData = new FormData();
        formData.append(
            "_token",
            document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        );
        formData.append("id", id);

        axios
            .post(`/configuration/table-name`, formData)
            .then((response) => {
                document.getElementById(`ModalTitle`).innerHTML =
                    response.data.data.table + " " + response.data.data.number;
                axios
                    .get("/configuration/products", formData)
                    .then((response) => {
                        console.log(response);
                        var options = response.data[0]
                            .map(
                                (element) =>
                                    `<option value=${element.id}>${element.product}</option>`,
                            )
                            .join("");
                        $("#productsList").append(options);
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            })
            .catch((error) => {
                console.log(error);
            });
    }
}

function closeModal(identifier) {
    const modal = bootstrap.Modal.getInstance(
        document.getElementById(`${identifier}`),
    );
    modal.hide();
}

$("#role_id").on("change", function () {
    let id = document.getElementById("role_id").value;
    axios
        .get(`/typeuser/${id}`)
        .then((response) => {
            if (response.data.name == "Proveedores") {
                $("#normalUsers").css("display", "none");
                $("#supplierUsers").css("display", "inline");

                $("#normalUsers").hide().find(":input").prop("disabled", true);
                $("#supplierUsers")
                    .show()
                    .find(":input")
                    .prop("disabled", false);
            } else {
                $("#supplierUsers").css("display", "none");
                $("#normalUsers").css("display", "inline");

                $("#supplierUsers")
                    .hide()
                    .find(":input")
                    .prop("disabled", true);
                $("#normalUsers").show().find(":input").prop("disabled", false);
            }
        })
        .catch((error) => {
            console.log(error);
        });
});

function validateOldPassword(password) {
    let formData = new FormData();
    formData.append(
        "_token",
        document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content"),
    );
    formData.append("oldPassword", password);
    formData.append("userId", document.getElementById("userId").value);

    axios
        .post(`/validate-password`, formData)
        .then((response) => {
            $("#oldErrors").addClass("d-none");
            $("#newPassword").removeAttr("disabled");

            if (response.data.status == 2) {
                $("#oldErrors").removeClass("d-none");
                $("#newPassword").attr("disabled", true);
                document.getElementById("oldErrors").innerHTML =
                    "La contraseña actual no coincide con la registrada en el sistema.";
            }
        })
        .catch((error) => {
            console.log(error);
            document.getElementById("oldErrors").innerHTML =
                error.response.data.errors.oldPassword[0];
        });
}

$("#option1").on("click", function () {
    $("#validatePassword").removeClass("d-none");
    $("#sendCode").addClass("d-none");
});

$("#option2").on("click", function () {
    $("#sendCode").removeClass("d-none");
    $("#validatePassword").addClass("d-none");
});

$("#newPassword").on("blur", function () {
    $("#sendCode").removeClass("d-none");
});

$("#newPassword").on("blur", function () {
    let hideButton = document.getElementById("newPassword").value;
    if (hideButton == "") {
        $("#sendCode").addClass("d-none");
        document.getElementById("newErrors").innerHTML =
            "La contraseña nueva es obligatoria, por favor ingresela";
        $("#newErrors").addClass("text-danger");
    } else {
        document.getElementById("newErrors").innerHTML = "";
    }
});

function updatePassword() {
    let formData = new FormData();
    formData.append("userId", document.getElementById("userId").value);
    formData.append(
        "newPassword",
        document.getElementById("newPassword").value,
    );
    formData.append(
        "_token",
        document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content"),
    );

    axios
        .post(`/change-password`, formData)
        .then((response) => {
            const overlay = document.querySelector(
                ".position-absolute.top-50.start-50",
            );
            if (overlay.contains(document.activeElement)) {
                document.activeElement.blur();
            }

            overlay.setAttribute("aria-hidden", "true");
            document.addEventListener("focusin", function (e) {
                const el = e.target;
                const hiddenParent = el.closest("[aria-hidden='true']");
                if (hiddenParent) {
                    el.blur();
                }
            });

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger",
                },
                buttonsStyling: false,
            });

            swalWithBootstrapButtons.fire({
                title:
                    response.data.status == "success"
                        ? "Contraseña Actualizada"
                        : "Error Actualización",
                text: `${response.data.message}`,
                icon: response.data.status == "success" ? "success" : "error",
                timer: 3000,
                showConfirmButton: false,
            });
        })
        .catch((error) => {
            console.log(error);
        });
}

function showInfo(value, element, user) {
    let tableId = element.getAttribute("data-table");
    showDetails(tableId, user);

    if (!value) {
        $("#productsList").attr("disabled", true);
        $("#amount").attr("disabled", true);
    } else {
        $("#productsList").removeAttr("disabled");
        $("#amount").removeAttr("disabled");
    }
}

$("#amount").on("blur", function () {
    $("#submitInfoAccount").removeAttr("disabled");
});

function storeProducts() {
    let formData = new FormData();
    formData.append(
        "_token",
        document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content"),
    );
    formData.append(
        "productsList",
        document.getElementById("productsList").value,
    );
    formData.append("amount", document.getElementById("amount").value);
    formData.append("clubTable", document.getElementById("clubTable").value);

    axios
        .post(`/accounts/account-payment`, formData)
        .then((response) => {
            console.log(response);

            const notyfAnswer = new Notyf();
            notyfAnswer.success(response.data.success);
            $("#productsList").val("0");
            $("#amount").val("");
        })
        .catch((error) => {
            console.log(error);
            const notyfError = new Notyf();
            notyfError.error(response.data.success);
        });
}

function showDetails(tableId, userId) {
    let formData = new FormData();
    formData.append(
        "_token",
        document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content"),
    );
    formData.append("tableId", tableId);
    formData.append("userId", userId);

    axios
        .post(`/accounts/show-details`, formData)
        .then((response) => {
            if (response.data.response > 0) {
                $("#showoAccount").css("display", "inline");
            } else {
                $("#showoAccount").css("display", "none");
            }
        })
        .catch((error) => {
            console.log(error);
            const notyfError = new Notyf();
            notyfError.error(response.data.success);
        });
}

function getTableInformation(element) {
    const modalState = bootstrap.Modal.getOrCreateInstance(
        document.getElementById("paymentModal"),
    );
    modalState.hide();

    const modalTable = new bootstrap.Modal(
        document.getElementById("listProductsModal"),
    );
    modalTable.show();

    let tableId = $("#clubTable").val();

    let formData = new FormData();
    formData.append("_token", document.querySelector('meta[name="csrf-token"]').getAttribute("content"));
    axios
        .get(`/accounts/get-table-information/${tableId}`)
        .then((response) => {
            console.log(response);
            var detail = "";
            const formatCop = new Intl.NumberFormat("es-CO", {
                style: "currency",
                currency: "COP",
                minimumFractionDigits: 0,
            });
            const filteredProducts = response.data.response.filter(
                (item, index, self) =>
                    index ===
                    self.findIndex(
                        (t) => t.products.product === item.products.product,
                    ),
            );

            $("#ModalProductTitle").text(
                `Cuenta ${response.data.response[0].accounts.club_tables.table} ${response.data.response[0].accounts.club_tables.number}`,
            );
            filteredProducts.forEach((element) => {
                detail += `<tr class="text-center">`;
                detail += `<td>${element.products.product}</td>`;
                detail += `<td>${formatCop.format(element.prize)}</td>`;
                detail += `<td>${element.amont}</td>`;
                detail += `</tr>`;
            });
            detail += `<tr class="table-warning">`;
            detail += `<td colspan="3" class="text-center"><strong>${formatCop.format(response.data.preTotal.pre_total)}</strong></td>`;
            detail += `</tr>`;

            $("#accountDetail").append(detail);
        })
        .catch((error) => {
            console.log(error);
            const notyfError = new Notyf();
            notyfError.error(error);
        });
}