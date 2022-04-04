<!-- SCRIPTS -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<!-- JQUERY -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
<script>
    $(document).ready(function() {
        lock('portrait');
        // Take the info in the Form | prevent form default
        $.validator.methods.email = function( value, element ) {
            return this.optional( element ) || /[A-Za-z]+\.[A-Za-z0-9]+@jupa.superate.org.pa/.test( value );
        }
        $('#form').validate({
            rules: {
                first_name: {
                    required:  true,
                    minlength: 3
                },
                last_name: {
                    required: true,
                    minlength: 4
                },
                email: {
                    required: true,
                    email:    true

                },
                user_pwd: {
                    required: true,
                    minlength: 6,
                },
                confirm_password: {
                    equalTo: "#password"
                },
                pwd: {
                    required: true
                }
            },
            messages: {
                first_name: {
                    required:  "Falta su nombre",
                    minlength: "muy original! Ahora escribe un nombre"
                },
                last_name: {
                    required: "Falta su apellido",
                    minlength: "No había visto uno tan corto O.o"
                },
                email: {
                    required: "Aquí hace falta algo",
                    email:    "El correo ¡Supérate!"
                },
                user_pwd: {
                    required: "Este campo es obligatorio",
                    minlength: "Al menos 6 caracteres"
                },
                confirm_password: {
                    required: "Este campo es obligatorio",
                    equalTo: "No coinciden"
                },
                pwd: {
                    required: "Aquí también hace falta algo"
                }
            }
        })
    })
</script>