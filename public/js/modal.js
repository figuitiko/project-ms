$(document).ready(function () {
    $('#btn-surveyed-next').on('click' ,function (e) {
        e.preventDefault();
        $('#user-data').appendTo('#last-class');
        $('#user-data').addClass('visible-msg');

    })

    function validatorFront(myForm) {

        // Initialize form validation on the registration form.
        // It has the name attribute "registration"


        $('#'+myForm).validate({

            // Specify validation rules
            rules: {
                // The key name on the left side is the name attribute
                // of an input field. Validation rules are defined
                // on the right side
                name: "required",
                last_name: "required",
                job: "required",
                age: {
                    required: true,
                    number: true
                },
                studies: "required"
            },
            // Specify validation error messages
            messages: {
                name: "Por favor ponga el nombre ",
                last_name: "Por favor ponga los apellidos",
                job: "Debe introducir la ocupacion",
                age:"Debe instroducir la edad y el valor ser numérico",
                studies: "Debe introducir los estudios",

            },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function(form) {
                form.submit();
            }
        });
        $('.form-check-input').each(function() {
            $(this).rules('add', {
                required: true,
                messages: {
                    required: "el campo es requerido",

                }
            });
        });

    };
    validatorFront('surveyed-form-2');


});


