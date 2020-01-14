window.onload = function() {
    document.getElementById('button').onclick = function() {

        document.getElementById('modalOverlay').style.display = 'none';
        var token = $(this).data("token");
        $.ajax(
            {
                url: baseUrl+"/admin/guide/"+guide['id'],
                type: 'PUT',
                dataType: "JSON",
                data: {
                    "_method": 'PUT',
                    "_token": token,
                    "is_activated":active,
                    "active_enterprise": $("#enterprise-active option:selected").val()
                },
                success: function (result)
                {
                    console.log("it Work");
                    console.log(result);
                    $('#modal-activated').modal('toggle');

                    if(active == true){
                        $('#activate-msg').removeClass('visible-msg');
                    }
                    else{
                        $('#activate-msg').addClass('visible-msg');
                    }
                    setTimeout(function(){  window.location.href = baseUrl+"admin/guide/"; }, 3000);


                    // $(button).parent('div').parent('div').remove();

                },
            }
            )

    };
};
