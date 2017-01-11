/**
 * Below is datatables configuration
 * for more information about this config,
 * please visit http://datatables.net/manual/index
 */
$(document).ready(function() {
	$('#stock-admin-table').DataTable({
		 responsive: true,
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
              	{ "bSortable": false },                  
               ] ,   
	 });

	 $('#items-table').DataTable({
	 	 responsive: true,
		"sDom": 'T<"top"i>rt<"bottom"flp><"clear">',
         tableTools: {   
         	"sSwfPath":"theme/SbAdmin/swf/copy_csv_xls_pdf.swf",
	        "aButtons": [
	        	"copy",
	            "print", {
	                "sExtends": "xls",
	                "sTitle": "Items Report"
	            }, {
	                "sExtends": "pdf",
	                "sTitle": "Items Report"
	            },{
	            	"sExtends": "csv",
	                "sTitle": "Items Report"
	            }]
	       },
        "aoColumns": [
        	{ "bSortable": false, "width": "5%" },
          	{ "bSortable": false },
          	{ "bSortable": false },
          	{ "bSortable": false },
          	{ "bSortable": false },   
          	{ "bSortable": false},
          	{"bSortable": false ,"width": "10%" },
          	{ "bSortable": false}, 
          	null,
          	{ "bSortable": false,"width": "15%"},                 
           ] ,   

		
	 });

	 $('#selectdate-staff').DataTable({
	 	 responsive: true,
		"sDom": 'T<"top"i>rt<"bottom"flp><"clear">',
         tableTools: {   
         	"sSwfPath":"../theme/SbAdmin/swf/copy_csv_xls_pdf.swf",
	        "aButtons": [
	        	"copy",
	            "print", {
	                "sExtends": "xls",
	                "sTitle": "Stocks Report"
	            }, {
	                "sExtends": "pdf",
	                "sTitle": "Stocks Report"
	            },{
	            	"sExtends": "csv",
	                "sTitle": "Stocks Report"
	            }]
	      },
	    "aoColumns": [
              	{ "bSortable": false },
              	{ "bSortable": false },
              	{ "bSortable": false },
              	{ "bSortable": false },
              	{ "bSortable": false },
              	{ "bSortable": false },
              	{ "width": "15%"},
              	{ "bSortable": false },        
               ] ,   
	 });
	 $('#selectdate-admin').DataTable({
	 	 responsive: true,
		"sDom": 'T<"top"i>rt<"bottom"flp><"clear">',
         tableTools: {   
         	"sSwfPath":"../theme/SbAdmin/swf/copy_csv_xls_pdf.swf",
	        "aButtons": [
	        	"copy",
	            "print", {
	                "sExtends": "xls",
	                "sTitle": "Stocks Report"
	            }, {
	                "sExtends": "pdf",
	                "sTitle": "Stocks Report"
	            },{
	            	"sExtends": "csv",
	                "sTitle": "Stocks Report"
	            }]
	      },
	    "aoColumns": [
	    		{ "bSortable": false },
              	{ "bSortable": false },
              	{ "bSortable": false },
              	{ "bSortable": false },
              	{ "bSortable": false },
              	{ "bSortable": false },
              	{ "bSortable": false },
              	{ "width": "15%"},
              	{ "bSortable": false },        
               ] ,   
	 });

	 $('#stock-staff-table').DataTable({
		 responsive: true,
		"sDom": 'T<"top"i>rt<"bottom"flp><"clear">',
         tableTools: {   
         	"sSwfPath":"theme/SbAdmin/swf/copy_csv_xls_pdf.swf",
	        "aButtons": [
	        	"copy",
	            "print", {
	                "sExtends": "xls",
	                "sTitle": "Stocks Report"
	            }, {
	                "sExtends": "pdf",
	                "sTitle": "Stocks Report"
	            },{
	            	"sExtends": "csv",
	                "sTitle": "Stocks Report"
	            }]
	      },
	    "aoColumns": [
              	{ "bSortable": false },
              	{ "bSortable": false },
              	{ "bSortable": false },
              	{ "bSortable": false },
              	{ "bSortable": false },
              	{ "bSortable": false,"width": "15%"},
              	null,
              	{ "bSortable": false,"width": "10%"},               
               ] ,   
	 });

	  $('#unit-m-table').DataTable({
	  	 responsive: true,
		"sDom": '<"top"i>rt<"bottom"flp><"clear">',
	    "aoColumns": [
              	{ "bSortable": false },
              	{ "bSortable": false },
              	{ "bSortable": false },
              	{ "width": "15%"},
              	{ "bSortable": false },        
               ] ,   
	 });


		   
});