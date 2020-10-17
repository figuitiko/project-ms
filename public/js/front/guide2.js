$(document).ready(function () {
    $('#dataTable').dataTable({
        "bPaginate": false
    });

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


    //$('.category_wrapper_first').fadeOut();
    $('.category_wrapper_second').fadeOut();
    $('.category_wrapper_third').fadeOut();
    $('.category_wrapper_four').fadeOut();
    $('#send_button').fadeOut();
    $(document).on('click', '#user_button',function (e) {
        e.preventDefault();


       var name = $('#name').val();
       var lastName = $('#last_name').val();
       var job = $('#job').val();
       var age = $('#age').val();
       var studies = $('#studies').val();

       if(name != '' && lastName != '' && job != '' && age != '' && studies != ''){
          if(confirm('Esta seguro que desea pasar a la siguientes preguntas ?')){
              $('#user-data').fadeOut(3000);
              $('#question_header').fadeIn(3000);
              $('.category_wrapper_first').fadeIn(3000);
          }else {
              return;
          }

       }else {
           alert("Por favor no puede dejar campos vacios");
           return;
       }

    });

    //----------------------- first question pages--------------------------------------------------------------------------

    $('#question_first_button').click(function (e) {
        e.preventDefault();
        e.stopPropagation();
           var checker_1 = 0;
           var checker_2 = 0;
           var checker_3 = 0;
           var checker_4 = 0;
            $('#dataTable_9 tr td .form-check-input:checked').each(function () {
                console.log($(this).length);
                if($(this).length > 0 ){

                    checker_1++;
                }else{
                    console.log('i am on the 0')

                }
            });
        $('#dataTable_10 tr td .form-check-input:checked').each(function () {

            if($(this).length > 0 ){

                checker_2++;
            }else{
                console.log('i am on the 0')

            }
        });
        $('#dataTable_11 tr td .form-check-input:checked').each(function () {

            if($(this).length > 0 ){

                checker_3++;
            }else{
                console.log('i am on the 0')

            }
        });
        $('#dataTable_12 tr td .form-check-input:checked').each(function () {

            if($(this).length > 0 ){

                checker_4++;
            }else{
                console.log('i am on the 0')

            }
        });




        if(checker_1 === 5 && checker_2 === 3 && checker_3 === 4 && checker_4 == 4 ){
            if(confirm("Esta seguro que desea pasar a las siguientes preguntas?")){
                $('.category_wrapper_first').fadeOut(3000);
                $('.category_wrapper_second').fadeIn(3000);
            }
            else {
                return;
            }


        }
        else {
            alert('No puede dejar campos sin marcar')
        }
        if(checker_1 !== 5) {
            // alert("No puedes dejar campos sin marcar");
            var notification = `<span class="error">no puedes dejar campos sin marcar</span>`
            $('#dataTable_9').after(notification);
        }
        if(checker_2 !== 3){
            // alert("No puedes dejar campos sin marcar");
            var notification = `<span class="error">no puedes dejar campos sin marcar</span>`
            $('#dataTable_10').after(notification);
        }
        if(checker_3 !== 4){
            // alert("No puedes dejar campos sin marcar");
            var notification = `<span class="error">no puedes dejar campos sin marcar</span>`
            $('#dataTable_11').after(notification);
        }
        if(checker_4 !== 4){
            // alert("No puedes dejar campos sin marcar");
            var notification = `<span class="error">no puedes dejar campos sin marcar</span>`
            $('#dataTable_12').after(notification);
        }

    });
//---------------------------sencond question page----------------------------------

    $('#question_second_button').click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        var checker_1 = 0;
        var checker_2 = 0;
        var checker_3 = 0;
        var checker_4 = 0;
        var checker_5 = 0;
        $('#dataTable_13 tr td .form-check-input:checked').each(function () {
            console.log($(this).length);
            if($(this).length > 0 ){

                checker_1++;
            }else{
                console.log('i am on the 0')

            }
        });
        $('#dataTable_14 tr td .form-check-input:checked').each(function () {

            if($(this).length > 0 ){

                checker_2++;
            }else{
                console.log('i am on the 0')

            }
        });
        $('#dataTable_15 tr td .form-check-input:checked').each(function () {

            if($(this).length > 0 ){

                checker_3++;
            }else{
                console.log('i am on the 0')

            }
        });
        $('#dataTable_16 tr td .form-check-input:checked').each(function () {

            if($(this).length > 0 ){

                checker_4++;
            }else{
                console.log('i am on the 0')

            }
        });
        $('#dataTable_17 tr td .form-check-input:checked').each(function () {

            if($(this).length > 0 ){

                checker_5++;
            }else{
                console.log('i am on the 0')

            }
        });




        if(checker_1 === 6 && checker_2 === 6 && checker_3 === 2 && checker_4 == 6 && checker_5 == 5 ){
            if(confirm("Estas seguro que vas a pasar al a siguiente pagina")){
                $('.category_wrapper_second').fadeOut(3000);
                $('.category_wrapper_third').fadeIn(3000);
                $('#send_button').fadeIn(3000);
            }else{
                return
            }

        }
        else {
            alert('No puede dejar campos sin marcar')
        }
        if(checker_1 !== 6) {
            // alert("No puedes dejar campos sin marcar");
            var notification = `<span class="error">no puedes dejar campos sin marcar</span>`
            $('#dataTable_13').after(notification);
        }
        if(checker_2 !== 6){
            // alert("No puedes dejar campos sin marcar");
            var notification = `<span class="error">no puedes dejar campos sin marcar</span>`
            $('#dataTable_14').after(notification);
        }
        if(checker_3 !== 2){
            // alert("No puedes dejar campos sin marcar");
            var notification = `<span class="error">no puedes dejar campos sin marcar</span>`
            $('#dataTable_15').after(notification);
        }
        if(checker_4 !== 6){
            // alert("No puedes dejar campos sin marcar");
            var notification = `<span class="error">no puedes dejar campos sin marcar</span>`
            $('#dataTable_16').after(notification);
        }
        if(checker_5 !== 5){
            // alert("No puedes dejar campos sin marcar");
            var notification = `<span class="error">no puedes dejar campos sin marcar</span>`
            $('#dataTable_17').after(notification);
        }

    });
    //------------------------------------- four-------------

    $('#question_third_button').click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        var checker_1 = 0;
        var checker_2 = 0;
        var checker_3 = 0;

        $('#dataTable_18 tr td .form-check-input:checked').each(function () {
            console.log($(this).length);
            if($(this).length > 0 ){

                checker_1++;
            }else{
                console.log('i am on the 0')

            }
        });
        $('#dataTable_19 tr td .form-check-input:checked').each(function () {

            if($(this).length > 0 ){

                checker_2++;
            }else{
                console.log('i am on the 0')

            }
        });
        $('#dataTable_20 tr td .form-check-input:checked').each(function () {

            if($(this).length > 0 ){

                checker_3++;
            }else{
                console.log('i am on the 0')

            }
        });





        if(checker_1 === 5 && checker_2 === 10 && checker_3 === 8 ){
            if(confirm("esta seguro que desea pasar a las siguientes preguntas ?")){
                $('.category_wrapper_third').fadeOut(3000);
                $('.category_wrapper_four').fadeIn(3000);
                $('#send_button').fadeIn(3000);
            }
            else{
                return;
            }

        }
        else {
            alert('No puede dejar campos sin marcar')
        }
        if(checker_1 !== 5) {
            // alert("No puedes dejar campos sin marcar");
            var notification = `<span class="error">no puedes dejar campos sin marcar</span>`
            $('#dataTable_18').after(notification);
        }
        if(checker_2 !== 10){
            // alert("No puedes dejar campos sin marcar");
            var notification = `<span class="error">no puedes dejar campos sin marcar</span>`
            $('#dataTable_19').after(notification);
        }
        if(checker_3 !== 8){
            // alert("No puedes dejar campos sin marcar");
            var notification = `<span class="error">no puedes dejar campos sin marcar</span>`
            $('#dataTable_20').after(notification);
        }


    });



   //--------------------------------------------
 $('#inlineRadio1').change(function () {
        $('#dataTable_21').show();
        $('#text_yes_0').show();
 });
    $('#inlineRadio2').change(function () {
        $('#dataTable_21').hide();
        $('#text_yes_0').hide();
    });
    $('#inlineRadio3').change(function () {
        $('#dataTable_22').show();
        $('#text_yes_1').show();
    })
    $('#inlineRadio4').change(function () {
        $('#dataTable_22').hide();
        $('#text_yes_1').hide();
    })


});


