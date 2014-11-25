/**
 * Below is datatables configuration
 * for more information about this config,
 * please visit http://datatables.net/manual/index
 */
$(document).ready(function() {
	$('#stock-table').DataTable({
	
		"sDom": 'T<"top"i>rt<"bottom"flp><"clear">',
         tableTools: {   
         	"sSwfPath":"theme/SbAdmin/swf/copy_csv_xls_pdf.swf",
	        "aButtons": [
	        	"copy",
	            "print", {
	                "sExtends": "xls",
	                "sTitle": "Stock Report"
	            }, {
	                "sExtends": "pdf",
	                "sTitle": "Stock Report"
	            },{
	            	"sExtends": "csv",
	                "sTitle": "Stock Report"
	            }]
	      },
	    "aoColumns": [
              	{ "bSortable": false },
              	{ "bSortable": false },
              	{ "bSortable": false },
              	{ "bSortable": false },
              	{ "bSortable": false },
              	{ "bSortable": false },
              	{ "bSortable": false,"width": "15%"},
              	null,
              	null,                     
               ] ,   
	 });

	 $('#items-table').DataTable({
		"sDom": 'T<"top"i>rt<"bottom"flp><"clear">',
		"sSwfPath":"theme/SbAdmin/swf/copy_csv_xls_pdf.swf",
         tableTools: {   
	        "aButtons": [
	        	"copy",
	            "print", {
	                "sExtends": "xls",
	                "sTitle": "Stock Report"
	            }, {
	                "sExtends": "pdf",
	                "sTitle": "Stock Report"
	            },{
	            	"sExtends": "csv",
	                "sTitle": "Stock Report"
	            }]
	       },
        "aoColumns": [
          	{ "bSortable": false },
          	{ "bSortable": false },
          	{ "bSortable": false },
          	{ "bSortable": false },
          	{ "bSortable": false },
          	{ "bSortable": false,"width": "10%" },
          	{ "bSortable": false},
          	null                       
           ] ,   

		
	 });

	 $('#selectdate').DataTable({
		"sDom": 'T<"top"i>rt<"bottom"flp><"clear">',
         tableTools: {   
         	"sSwfPath":"../theme/SbAdmin/swf/copy_csv_xls_pdf.swf",
	        "aButtons": [
	        	"copy",
	            "print", {
	                "sExtends": "xls",
	                "sTitle": "Stock Report"
	            }, {
	                "sExtends": "pdf",
	                "sTitle": "Stock Report"
	            },{
	            	"sExtends": "csv",
	                "sTitle": "Stock Report"
	            }]
	      },
	    "aoColumns": [
              	{ "bSortable": false },
              	{ "bSortable": false },
              	{ "bSortable": false },
              	{ "bSortable": false },
              	{ "bSortable": false },
              	{ "bSortable": false },
              	{ "bSortable": false,"width": "15%"}              
               ] ,   
	 });
    //var tt = new $.fn.dataTable.TableTools( table );
		 
	 //$(table).insertAfter('.dataTables_filter');

	 

		   
});