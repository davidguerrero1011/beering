$(document).ready(function () {
    $("#submitInfoAccount").attr("disabled", true);
    $("#showAccountInfo").css("display", "none");
    $("#supplierUsers").css("display", "none");
});

axios.defaults.headers.common["X-CSRF-TOKEN"] = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");

function deleteConfig(id, type) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger",
        },
        buttonsStyling: false,
    });
    swalWithBootstrapButtons
        .fire({
            title: "Esta usted seguro?",
            text: `Si lo borra, no podra revertir el borrado del registro ID ${id}`,
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Si, Borrelo!",
            cancelButtonText: "No, Mejor no!",
            reverseButtons: true,
        })
        .then((result) => {
            if (result.isConfirmed) {
                let formData = new FormData();
                formData.append("_token", document.querySelector('meta[name="csrf-token"]').getAttribute("content"));

                axios
                    .delete(`/configuration/destroy/${id}/${type}`, { data: formData })
                    .then((response) => {
                        setTimeout(function () {
                            swalWithBootstrapButtons.fire({
                                title: response.data.status == "success" ? "Borrado!" : response.data.status == "warning" ? "Cuidado" : "Error",
                                text: `${response.data.message}`,
                                icon: response.data.status == "success" ? "success" : response.data.status == "warning" ? "warning" : "error",
                                timer: 3000,
                                showConfirmButton: false,
                            }).then(() => {
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
                    text: "El país a borrar fue cancelado a tiempo!",
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
            .getAttribute("content")
    );

    axios
        .post(`/configuration/update-status`, formData)
        .then((response) => {
            setTimeout(function () {
                if (response.data.status == "success") {
                    Swal.fire({
                        title: "Actualizado",
                        text: `${response.data.message}`,
                        icon: "success",
                    });
                }
                location.reload();
            });
        })
        .catch((error) => {
            console.log(error);
        });
}

function showTableDetails(id, state) {
    if (state == "Disponible" || state == "Reservada") {
        Swal.fire({
            title: "La mesa",
            text: "No tiene cuenta pendiente porque esta disponible o reservada",
            icon: "success",
        });
    } else {
        Swal.fire({
            title: "Total Cuenta",
            text: "¿Va a pagar en una sola cuenta o en varias?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, dividela",
            cancelButtonText: "No, solo una",
        }).then((result) => {
            console.log(result);

            if (result.isConfirmed) {
                const modal = new bootstrap.Modal(
                    document.getElementById("paymentModal")
                );
                modal.show();
            }

            if (state == "Disponible" || state == "Reservada") {
                let message = `La mesa no tiene ninguna cuenta pendiente porque la mesa esta disponible o esta reservada`;
                $("#showAccountInfo").append(message);
            } else if (state == "Ocupada") {
                $("#accountNumber").on("blur", function () {
                    $("#submitInfoAccount").removeAttr("disabled");

                    let accounts =
                        document.getElementById("accountNumber").value;
                    console.log("accounts: " + accounts);

                    if (accounts > 0 || accounts) {
                        let formData = new FormData();
                        formData.append(
                            "_token",
                            document
                                .querySelector('meta[name="csrf-token"]')
                                .getAttribute("content")
                        );
                        formData.append("accounts", accounts);

                        axios
                            .post(`/account/${id}`, formData)
                            .then((response) => {
                                console.log(response);
                            })
                            .catch((error) => {
                                console.log(error);
                            });
                    }
                });
            }
        });
    }
}

function closeModal() {
    const modal = bootstrap.Modal.getInstance(
        document.getElementById("paymentModal")
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
