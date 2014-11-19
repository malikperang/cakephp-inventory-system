$(document).ready(function() {
	 var table = $('#data-table').DataTable();
		   var tt = new $.fn.dataTable.TableTools( table );
		 
	 $( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');

	  $('#selected').click(function(){
		        window.location = $(this).attr('href');
		        return false;
		    });
		    $('#have-tooltip').tooltip({placement: 'left'});

	 $(document).bind('keydown', function(event) {
	 	 if( event.which == 83 ) {
		       $('#myModal').modal('toggle');
		    }

	 });
		   
});