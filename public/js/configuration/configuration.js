function validateOrders(order, type) {
    let formData = new FormData();
    formData.append("order", order);
    formData.append("type", type);
    formData.append(
        "_token",
        document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content")
    );

    axios
        .post(`/configuration/validate-order`, formData)
        .then((response) => {
            
            if (response.data.status == 1) {
                let element = document.querySelector("#orderMessage");
                element.textContent = response.data.message;
                $("#order").val("");
                $("#orderMessage").addClass("text-danger");
                $("#orderMessage").val(element.textContent);
                $('#saveCategory').attr('disabled', true);
            } else {
                document.getElementById("orderMessage").textContent = "";
                $("#orderMessage").removeClass("text-danger");
                $('#saveCategory').removeAttr('disabled');
            }
        })
        .catch((error) => {
            console.log(error);
        });
}
