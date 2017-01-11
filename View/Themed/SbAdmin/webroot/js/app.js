$(document).ready(function() {

	 $(this).bind('keydown','keypress', function(event) {
	 	 if( event.shiftKey && event.which == 78 ) {
		       $('#stockModal').modal('toggle');
		       $('#itemModal').modal('toggle');
		       //console.log('so');
		    }

		 if(event.which == 189){
		 	console.log('trigger');
		 	$('.cus-select').change(function(event) {
		 		var data = $(this).val();
		 		console.log(data);
		 	});
		 	$('.cus-select')
			        .val('minus')
			        .trigger('change');
		 	}
		 if (event.shiftKey  && event.which == 187 ) {
		 	console.log('add');
		 	$('.cus-select').change(function(event) {
		 		var data = $(this).val();
		 		console.log(data);
		 	});
		 	$('.cus-select')
			        .val('add')
			        .trigger('change');
		 	}

		 
	 });

	 $('.input-daterange').datepicker({
	 	 todayBtn: true,
   		 orientation: "top left",
   		 autoclose: true,
    	 todayHighlight: true

	 });
	 $('#calendar').datepicker({
	    calendarWeeks: true,
	    autoclose: true,
	    todayHighlight: true
	});
	 /*$('tr#selected').click(function(){
		        window.location.href = $(this).attr("href");
		        return false;
		    });*/
	 $('#have-tooltip').tooltip({placement: 'left'});


	 $(".select_box").chosen({
	  	width:"100%",
	    no_results_text: "Oops, nothing found!",
	    
	    search_contains:true
  	});
	
   	$('#selectall').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    
});