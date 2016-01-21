$(document).ready(function(){


$("#add_invoice").validate({
	
                      errorClass:'showerror',
	});

	$("#total1").each(function() {
        $(this).rules('add', {
            required: true,
            messages: {
                required:  "*", 
            }
        });
    });
	$("#total2").each(function() {
        $(this).rules('add', {
            required: true,
            messages: {
                required:  "*", 
            }
        });
    });
	$("#total3").each(function() {
        $(this).rules('add', {
            required: true,
            messages: {
                required:  "*", 
            }
        });
    });
});