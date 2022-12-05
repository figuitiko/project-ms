$(document).ready(function () {
$('#dataTable_event_tr').DataTable();
$('#dataTable_count').DataTable();
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



    $('#even_tr_div').hide();
    $('#even_tr').on('click', function () {

        toggleButtons('#even_tr','#even_tr_div');

    })

    $('#event_count_div').hide();
    $('#even_count').on('click', function () {
        toggleButtons('#even_count', '#event_count_div');
    })
    $('#graf_event').hide();
    $('#graf_ev_btn').on('click', function () {
        toggleButtons('#graf_ev_btn', '#graf_event');
    })
    $('#total_report').hide();
    $('#total_result_btn').on('click', function () {
        toggleButtons('#total_result_btn', '#total_report');
    })
    $('#total_report_categories').hide();
    $('#total_cat_btn').on('click', function () {
        toggleButtons('#total_cat_btn', '#total_report_categories');
    })
    $('#dom_report_event').hide();
    $('#total_dom_btn').on('click', function () {
        toggleButtons('#total_dom_btn', '#dom_report_event');
    })
    $('#guide_list_report').hide();
    $('#guide_list_btn').on('click', function () {
        toggleButtons('#guide_list_btn', '#guide_list_report');
    })

    $('.card-header i').on('click', function () {
        console.log('i am here')
        console.log($(this).parent().parent());
        $(this).parent().parent().hide();
        console.log($(this).parent().parent().attr('id'))
            let idParent = $(this).parent().parent().attr('id');
        if(  idParent === 'guide_list_report' ){
            $('#guide_list_btn').text('Abrir')
        }
        if(  idParent === 'even_tr_div' ){
            $('#even_tr').text('Abrir')
        }
        if(  idParent === 'event_count_div' ){
            $('#even_count').text('Abrir')
        }
        if(  idParent === 'graf_event' ){
            $('#graf_ev_btn').text('Abrir')
        }
        if(  idParent === 'graf_event' ){
            $('#graf_ev_btn').text('Abrir')
        }
        if(  idParent === 'total_report' ){
            $('#total_result_btn').text('Abrir')
        }
        if(  idParent === 'total_report_categories' ){
            $('#total_cat_btn').text('Abrir')
        }
        if(  idParent === 'dom_report_event' ){
            $('#guide_list_btn').text('Abrir')
        }
        window.location = '#basic_emp';

    })


    function toggleButtons( id_btn, id_table) {
        $(id_table).toggle();


        if( $(id_table).is(':visible')){
            $(id_btn).text('Cerrar')
        }else{
            $(id_btn).text('Abrir')
        }
        window.location = id_table;
    }



})


//---------------------chart----------------

var id= $('#graf_event').data('enterprise');
var url = `/admin/charts/${id}`;

var Name = new Array();
var Labels = new Array();
var Amount = new Array();
$(document).ready(function(){
    $.get(url, function(response){
        console.log(response);
        response.forEach(function(data){
            Name.push(data.name);

            Amount.push(data.total);
        });
        var ctx = document.getElementById("canvas").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels:Name,
                datasets: [{
                    label: 'Eventos traumáticos',
                    data: Amount,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    });
});


//---------------------excel-------------------


$(document).ready(function(){
    $('#form_excel').on('submit', function (e) {
        e.preventDefault();
        let token = $('#csrf_token_value').val();
        let data = $('#questions_values').val().split(',');
        let guide = $('#guide_value').val();
        let enterprise = $('#enterprise_value').val();
        console.log(data);
        console.log(token);
        window.location.href = `/admin/applied-guide-report?data=${data}&guide=${guide}&enterprise=${enterprise}`

        /*let settingToSend= {
            url: `/admin/applied-guide-report?data=${data}&guide=${guide}&enterprise=${enterprise}`,
            type: 'GET',
            dataType: "JSON",

        }
fa-eye(settingToSend)
            .done(function (data) {
                console.log('data send'+data);
            });*/
    })


});