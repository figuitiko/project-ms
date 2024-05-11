// Call the dataTables jQuery plugin
$(document).ready(function() {
  const table = $('#dataTable').DataTable();
  table.on('draw', function(){
    console.log('draw');
    $('table tbody tr>td').on('change', 'select.year', function(){     
      let year = $(this).val();      
      let _href = $(this).parent().parent().find('td> a.fa-eye') .attr("href");    
      $(this).parent().parent().find('td> a.fa-eye') .attr("href", _href + '&year=' + year);
  });
  });
});
