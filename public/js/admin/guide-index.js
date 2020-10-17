const baseUrl= '/';


$('table tr td:last-child button ').on('click',function () {
    var guide = $(this).data('guide');
    $('#modal-activate').data('guide',guide );
    if(guide.is_activated == 1){
        $('#activated_check').hide();
        $('#deactivated_check').show();
        $('#activated_check').prop('check', false);
        $('#enterprise_to_activate').hide();


    }else {
        $('#deactivated_check').hide();
        $('#activated_check').show();
        $('#deactivated_check').prop('check', false);
        $('#enterprise_to_activate').show();
    }
})




$('#modal-activate').on('click', function (e) {
    e.preventDefault();
    if ($('#activated-guide').is(":checked")){
       var  active = 1;

    }
    if ($('#deactivated-guide').is(":checked")){
         active= 0;

    }
    console.log(active);
    // else {
    //     var active = '';
    // }


    var button = this;
    var guide = $(this).data("guide");
    console.log(guide);
    console.log($("#enterprise-active option:selected").val());
    var token = $(this).data("token");


    var settingActivate = {

        url: "/admin/guide/"+guide['id'],
        type: 'PUT',
        dataType: "JSON",
        data: {
            "_method": 'PUT',
            "_token": token,
            "is_activated":active,
            "active_enterprise": $("#enterprise-active option:selected").val(),


        }
    };

    $.ajax(settingActivate).done(function (response) {

        console.log("it Work");
        console.log(response);
        $('#modal-activated').modal('toggle');

        if(active == true){
            $('#activate-msg').removeClass('visible-msg');
            $('#activate-msg').text('Se ha activado la guia');
        }
        else if(active == 0){
            $('#activate-msg').removeClass('visible-msg alert-success');
            $('#activate-msg').addClass('alert-danger');
            $('#activate-msg').text('Se ha desactivado la guia');
        }
        $("#enterprise-active").val();
        setTimeout(function(){  window.location.href = "/admin/guide/"; }, 3000);
    })

    $('table tbody tr td').find('.fa-copy').on('click',function () {
        var text = $(this).siblings().attr('href');
        document.addEventListener('copy', function(e) {
            e.clipboardData.setData('text/plain', text);
            e.preventDefault();
        }, true);
        document.execCommand("copy");
        alert('liga copiada');
    })



    $('table tbody tr td').find('button').on('click', function () {
        var guide = $(this).data('guide');
        console.log(guide);
        $('#modal-activate').data('guide',guide);
        if(guide['is_activated']==1){
            $("#activated-guide").prop("checked", true);
        }


    })




});
