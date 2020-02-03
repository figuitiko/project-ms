$(document).ready(function () {

    function validator(myForm) {
        $.validator.addMethod("RFC", function (value, element) {
            if (value !== '') {
                var patt = new RegExp("^[A-Z,Ñ,&]{3,4}[0-9]{2}[0-1][0-9][0-3][0-9][A-Z,0-9]?[A-Z,0-9]?[0-9,A-Z]?$");
                return patt.test(value);
            } else {
                return false;
            }
        }, "Ingrese un RFC valido");
        // Initialize form validation on the registration form.
        // It has the name attribute "registration"
        $('#'+myForm).validate({
            // Specify validation rules
            rules: {
                // The key name on the left side is the name attribute
                // of an input field. Validation rules are defined
                // on the right side
                name: "required",
                social_reason: "required",
                rfc: {
                    RFC: true
                },
                worker_amount: "required",
                phone: "required",
                address: "required",
                activity: "required",


            },
            // Specify validation error messages
            messages: {
                name: "Por favor ponga el nombre de la empresa",
                social_reason: "No puede dejar en Blanco la Razon Social",
                worker_amount: "Debe introducir una cantidad de trabajadores",
                phone:"Debe instroducir el numero de la empresa",
                address: "Debe instroducir la Direccion  de la empresa",
                activity: "Debe  el número de la empresa",

            },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function(form) {
                form.submit();
            }
        });

    };
    validator('demo-form2');
    validator('demo-form-enterprise')

})

