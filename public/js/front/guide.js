$(document).ready(function () {
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
                department: "required",
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
                department: "El Departamento es Requerido",

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

    /*------------------------------------guide one-----------------------------------*/

        $('#dataTable_24').hide();
        $('#header_24').hide();
        $('#dataTable_25').hide();
            $('#header_25').hide();
        $('#dataTable_26').hide();
         $('#header_26').hide();


        $('.checking_yes').on('change', function (e) {

            let value =$(this).parent().parent().parent().parent().data('value')
            if(value === 23){
                $('#dataTable_24').show();
                $('#header_24').show();
            }
            if(value === 24){
                $('#dataTable_25').show();
                $('#header_25').show();
            }
            if(value === 25){
                $('#dataTable_26').show();
                $('#header_26').show();
            }
        })

    $('.checking_no').on('change', function (e) {
        //console.log($('.checking_yes'));
        let value =$(this).parent().parent().parent().parent().data('value');
        console.log($('.checking_yes').is(':checked'));

            if($('#dataTable_23 .checking_yes').is(':checked')){
                if(value === 23){
                    $('#dataTable_24').show();
                    $('#header_24').show();
                }

            }else{
                if(value === 23){
                    $('#dataTable_24 .checking_yes').prop('checked', false);
                    $('#dataTable_24 .checking_no').prop('checked', false);
                    $('#dataTable_24').hide();
                    $('#header_24').hide();
                }

            }
        if($('#dataTable_24 .checking_yes').is(':checked')){
            if(value === 24){
                $('#dataTable_25').show();
                $('#header_25').show();
            }

        }else{
            if(value === 24){
                $('#dataTable_25 .checking_yes').prop('checked', false);
                $('#dataTable_25 .checking_no').prop('checked', false);
                $('#dataTable_25').hide();
                $('#header_25').hide();
            }

        }
        if($('#dataTable_25 .checking_yes').is(':checked')){
            if(value === 25){
                $('#dataTable_26').show();
                $('#header_26').show();
            }

        }else{
            if(value === 25){
                $('#dataTable_26 .checking_yes').prop('checked', false);
                $('#dataTable_26 .checking_no').prop('checked', false);
                $('#dataTable_26').hide();
                $('#header_26').hide();
            }

        }

    })


});


