$(document).ready(function() {
    $("#add").click(function(){
        $('#questions').append(inputHtml());
        $('#remove').removeClass('button-visible');

    });
    function inputHtml(){
        $html='<div class=" col-md-8">\n' +
            '                       <textarea class="form-control" name="new_questions[]"></textarea>\n' +
            '                    </div>';
        return $html;
    };

    $('#remove').click(function () {
        if($('#demo-form2 textarea').length >= 1)
        {
            $('#demo-form2 textarea').last().remove();
        }
        if($('#demo-form2 textarea').length == 0)
        {
            $('#remove').addClass('button-visible');
        }

    });
    // var form =$('#demo-form2');
    // $('#demo-form2').validate({
    //     rules:{
    //      questions:'required',
    //       new_questions:'required'
    //     },
    //     submitHandler: function(form) {
    //         form.submit();
    //     }
    // })

    $('#guardar').on('click',function (e) {
        var textareas= $('#demo-form2 textarea');
        var myInputs = $('#demo-form2 input');
        console.log(textareas);
        if(textareas){
            textareas.each(function () {
                console.log($(this).val());
                if($(this).val()== ''){
                    alert('no dejes preguntas en blanco por favor');
                    e.preventDefault();
                    return;
                }

            })
        }
        if(myInputs){
            myInputs.each(function () {
                console.log($(this).val());
                if($(this).val()== ''){
                    alert('no dejes preguntas en blanco por favor');
                    e.preventDefault();
                    return;
                }

            })
        }
    })





    const baseUrl= 'http://127.0.0.1:8000/';


    $('.questions').find('button').on('click', function(e) {
        e.preventDefault();
        console.log(this);
        var button = this;
        var id = $(this).data("id");
        var token = $(this).data("token");




        $.ajax(
            {
                url: baseUrl+"question/delete/"+id,
                type: 'DELETE',
                dataType: "JSON",
                data: {
                    "id": id,
                    "_method": 'DELETE',
                    "_token": token,
                },
                beforeSend:function(){

                },
                success: function ()
                {
                    console.log("it Work");

                    $(button).parent('div').parent('div').remove();

                },
                error: function () {
                    console.log("It failed");
                }

            });
    });

    // var copyLink= function(){
    //     alert('liga copiada');
    // }
    $('table tbody tr td').find('.fa-copy').on('click',function () {
      var text = $(this).siblings().attr('href');
        document.addEventListener('copy', function(e) {
            e.clipboardData.setData('text/plain', text);
            e.preventDefault();
        }, true);
        document.execCommand("copy");
        alert('liga copiada');
    })

    // $('.fa-copy').on('click',function (e) {
    //     alert('liga copiada');
    //
    // })
    // function copyToClipboard(element) {
    //     var $temp = $("<input>");
    //     $("body").append($temp);
    //     $temp.val($(element).text()).select();
    //     document.execCommand("copy");
    //     $temp.remove();
    // }

    $('table tbody tr td').find('button').on('click', function () {
        var guide = $(this).data('guide');
        console.log(guide);
        $('#modal-activate').data('guide',guide);
        if(guide['is_activated']==1){
            $("#activated-guide").prop("checked", true);
        }


    })




    $('#modal-activate').on('click', function (e) {
        e.preventDefault();
        if ($('#activated-guide').is(":checked")){
            var active= true;

        }
        // else {
        //     var active = '';
        // }


            var button = this;
        var guide = $(this).data("guide");
        console.log($("#enterprise-active option:selected").val());
        var token = $(this).data("token");
        $.ajax({
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
         })

    })
});
