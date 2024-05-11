// add href params
$(document).ready(function(){
    console.log("rocking on route without onchange");
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
    // $('#dataTable').dataTable({
    //     'drawCallback': function(){
            
    //     },
    // })
    
    $('table tbody tr>td').on('change', 'select.year', function(){
        console.log("rocking on route");
        let year = $(this).val();      
      let _href = $(this).parent().parent().find('td> a.fa-eye') .attr("href");    
      $(this).parent().parent().find('td> a.fa-eye') .attr("href", _href + '&year=' + year);
    });

    // $("select.year").change(function(){
    //     console.log("rocking on route");
    //     let year = $(this).val();        
    //     let _href = $("a.fa-eye").attr("href");
    //     $("a.fa-eye").attr("href", _href + '&year=' + year);
    // });
    

});