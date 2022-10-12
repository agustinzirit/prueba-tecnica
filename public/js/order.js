(() => {
    const Product = {
        onReady: () => {
            $(document).on("click", "#btnPreOrderSave", function (e) {
                const data = Product.getData();
                const isValidated = Product.isValid(data);

                if (isValidated) {
                    // $("#labelPrecio").html(`$${data.price}`);
                    // $("#labelComprador").html(data.customer_name);
                    // $("#labelProducto").html(data.product_text);
                    // $("#labelCorreo").html(data.customer_email);
                    // $("#labelMovil").html(data.customer_mobile);

                    // $("#mdlProcesarPago").modal("show");
                } else {
                    Product.showMessage("Todos los campos son requeridos.", 'danger');
                }
            });
        },

        isValid: (data) => {
            let validated = true;

            $.each(data, (i, value) => {
                if (value == "") validated = false;
            });

            return validated;
        },

        getData: () => {
            let data = [];

            $("form .form-control").each((i, e) => {
                data = { ...data, [$(e).attr("id")]: $(e).val() };
            });

            const $selected = $("select option:selected");
            data = {
                ...data,
                product_text: $selected.text(),
                price: $selected.attr('data-price'),
            };

            return data;
        },

        showMessage: (message, type = 'success') => {
            if (type== 'success') {
                toastr.success(message, "Exito");
            } else {
                toastr.error(message, 'Error');
            }
        },

        onProcess: () => {

        }
    };

    Product.onReady();
})();
