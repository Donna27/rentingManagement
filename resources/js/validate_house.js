$(document).ready(function(){


$("#addhouse").validate({
	
                      errorClass:'showerror',
	});

	$("#housename").each(function() {
        $(this).rules('add', {
            required: true,
            messages: {
                required:  " Please insert House Name ", 
            }
        });
    });
	$("#houseaddress").each(function() {
        $(this).rules('add', {
            required: true,
            messages: {
                required:  " Please insert House Address ", 
            }
        });
    });		
});