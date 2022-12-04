// add href params
$(document).ready(function(){
    //the same function for all the selects
    // $("select").change(function(){
    //     //get the value of the select
    //     let value = $(this).val();
    //     //get the name of the select
    //     let name = $(this).attr('name');
    //     //get the href of the link
    //     let _href = $("a.fa-eye").attr("href");
    //     //add the new value to the href
    //     $("a.fa-eye").attr("href", _href + '&' + name + '=' + value);
    // });

    $(".year").change(function(){
        console.log("rocking on route");
        let year = $(this).val();        
        let _href = $("a.fa-eye").attr("href");
        $("a.fa-eye").attr("href", _href + '&year=' + year);
    });
    

});