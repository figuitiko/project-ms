const baseUrl= 'http://127.0.0.1:8000/';
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



    // $('#guardar').on('click',function (e) {
    //     e.preventDefault();
    //     var textareas= $('#demo-form2 textarea');
    //     var myInputs = $('#demo-form2 input');
    //
    //     if(textareas){
    //         textareas.each(function () {
    //            // console.log($(this).val());
    //             console.log('i am here on the text area');
    //             if($(this).val()== ''){
    //                 alert('no dejes preguntas en blanco por favor');
    //                 e.preventDefault();
    //                 return;
    //             }
    //
    //         })
    //     }
    //     if(myInputs){
    //         myInputs.each(function (ind, element) {
    //             console.log(element);
    //             console.log('i am here on the inputs');
    //             if(!$(this).val()){
    //                 alert('no dejes preguntas en blanco por favor');
    //                 e.preventDefault();
    //                 return;
    //             }
    //
    //         })
    //     }
    //     $('#demo-form2').submit();
    //
    //     // // var oTable = $('#dataTable').dataTable();
    //     // // var nNodes = oTable.fnGetNodes( );
    //     // //
    //     // // console.log(nNodes);
    //     // // //var data = oTable.$('input, select').serialize();
    //     // //
    //     // // alert(
    //     // //     "The following data would have been submitted to the server: \n\n"+
    //     // //     data.substr( 0, 120 )+'...'
    //     // // );
    //     // return false;
        var table = $('#dataTable').dataTable();
        console.log(table)


            var data = table.$('input, select').serializeArray();
            console.log(data)
    //    //
    //    //
    //    // //data= JSON.stringify(data);
    //    //  function getFields(input, field) {
    //    //      var output = [];
    //    //      for (var i=0; i < input.length ; ++i)
    //    //          output.push(input[i][field]);
    //    //      return output;
    //    //  }
    //    //
    //    //
    //    //
    //    //  var result = getFields(data, "value");
    //    //
    //    //
    //    //  for(const value of result){
    //    //      console.log(value);
    //    //      $('#demo-form2').append("<input type='hidden' name='the_questions[]' value='"+
    //    //         value+"' />");
    //    //  }
    //    //  $('#demo-form2').submit();
    //
    //
    //
    // });

    function validator(myForm) {

        // Initialize form validation on the registration form.
        // It has the name attribute "registration"
        $('#'+myForm).validate({
            // Specify validation rules
            rules: {
                // The key name on the left side is the name attribute
                // of an input field. Validation rules are defined
                // on the right side
               "questions[]" : "required",
                title: "required",
                description: "required",
                "new_questions[]": "required"
            },
            // Specify validation error messages
            messages: {
                "questions[]" :"Por favor no deje preguntas en blanco",
                "new_questions[]" :"Por favor no deje preguntas en blanco",
                 title: "Por favor ponga el titulo",
                description: "Por favor  no deje la descripcion en blanco"


            },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function(form) {
                form.submit();
            }
        });

    };
    validator('demo-form2');






    var settingsEnterprise = {
        url: baseUrl+"admin/enterprise",
        type: 'GET',
        dataType: "JSON"
    };
    console.log(baseUrl+"admin/enterprise");
    $.ajax(settingsEnterprise).done(function (response) {
        console.log(response);
        console.log('i am here');
    })




});


var deleteQuestion= function(e,id , token, idButton){
    e.preventDefault();
    console.log('hello i am here');

 console.log(idButton);

     var button =$('#'+idButton);
    // var id = $(this).data("id");
    // var token = $(this).data("token");


    $.ajax(
        {
            url: baseUrl+"admin/question/"+id,
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

                $('#header-question').find('span').html('se  ha borrado una pregunta')
                button.parent('td').parent('tr').remove();
                setTimeout(()=>{
                    $('#header-question').find('span').html('');
                },3000)

            },
            error: function () {
                console.log("It failed");
            }

        });
}


var updateQuestion = function (e,id,token,idButton) {
    e.preventDefault();
    confirm

    var button =$('#'+idButton);
 console.log(button)
    var content = button.parent('td').parent('tr').find('td input').val();
    // $('#update-1').parent('td').parent('tr').find('td input').val();
    // console.log(content)

 if(content){
     var settingQuestionUpdate= {
         url: baseUrl+"admin/question/"+id,
         type: 'PUT',
         dataType: "JSON",
         data: {
             "id": id,
             "_method": 'PUT',
             "_token": token,
             "content": content
         }
     };
     $.ajax(settingQuestionUpdate).done(function (response) {
         console.log(response)
         $('#input-1').html("hello");
         button.parent('td').parent('tr').find('td span').html('pregunta actualizada');
         setTimeout(()=>{
             button.parent('td').parent('tr').find('td span').html('');
         },3000)
     });
 }else{
     alert('nopuede estar vacio');
 }

}

var disableIfEmpty = function (idInput) {
    console.log('i am on the keyup')
        var input = $('#'+idInput);
        input.parent('td').parent('tr').find('td button').prop('disabled',false);

}


