$(document).ready(function () {

    $('#votacion').validate({
        rules: {
            nombre: {
                required: true
            },
            apellido: {
                required: true
            },
            alias: {
                required: true,
                minlength: 5,
                alphanumeric: true
            },
            rut: {
                required: true,
                rut: true
            },
            email: {
                required: true,
                email: true
            },
            region: {
                required: true
            },
            comuna: {
                required: true
            },
            candidato: {
                required: true
            },
            'via[]': {
                required: true,
                minlength: 2
            }
        },
        messages: {
            nombre: "Por favor ingresa tu nombre",
            apellido: "Por favor ingresa tu apellido",
            alias: {
                required: "Por favor ingresa un alias",
                minlength: "El alias debe tener al menos 5 caracteres",
                alphanumeric: "El alias debe contener letras y números"
            },
            rut: {
                required: "Por favor ingresa un rut",
                rut: "Por favor ingresa un rut chileno válido"
            },
            email: "Por favor ingresa un email válido",
            region: "Por favor selecciona una región",
            ciudad: "Por favor selecciona una ciudad",
            candidato: "Por favor selecciona un candidato",
            'via[]': {
                required: "Por favor selecciona al menos dos opciones",
                minlength: "Por favor selecciona al menos dos opciones"
            }
        },
        submitHandler: function(form) {
            // Enviar el formulario por AJAX
            $.ajax({
                type: 'POST',
                url: '../resources/views/procesarFormulario.php', // Aquí debes especificar la URL a la que enviarás el formulario
                data: $('#votacion').serialize(),
                success: function(response) {
                    // Manejar la respuesta del servidor
                    console.log(response);
                    // Por ejemplo, puedes mostrar un mensaje de éxito o redirigir a otra página
                },
                error: function(xhr, status, error) {
                    // Manejar errores de la petición AJAX
                    console.error(error);
                }
            });
        }
    });

    // Método de validación para Rut chileno
    $.validator.addMethod("rut", function(value, element) {
        return this.optional(element) || /\b\d{1,2}\.\d{3}\.\d{3}[-][0-9kK]{1}\b/.test(value);
    }, "Por favor ingresa un Rut chileno válido");

    // Método de validación para alfanumérico
    $.validator.addMethod("alphanumeric", function(value, element) {
        return this.optional(element) || /^(?=.*[a-zA-Z])(?=.*\d).+$/.test(value);
    }, "Por favor ingresa al menos una letra y un número");
});