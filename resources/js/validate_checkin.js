$(document).ready(function(){


$("#checkin").validate({
	
                      errorClass:'showerror',
	});

	$("#passport").each(function() {
        $(this).rules('add', {
            required: true,
			minlength: 7,
			maxlength:10,
            messages: {
                required:  "Please insert Passport NO. ",
				minlength: "Passport No.is between 7-10 digit" 
            }
        });
    });
	
	$("#cus_name").each(function() {
        $(this).rules('add', {
            required: true,
			textonly:true,
            messages: {
                required:  "Please insert Customer Name ", 
            }
        });
    });
	$("#birth_date").each(function() {
        $(this).rules('add', {
            required: true,
			date: true,
            messages: {
                required:  "Please insert birthdate ", 
				
            }
        });
    });
	$("#phone").each(function() {
        $(this).rules('add', {
            required: true,
			number: true,
			minlength: 8,
			maxlength:11,
            messages: {
                required:  " Please insert Phone Number ", 
            }
        });
    });
	$("#email").each(function() {
        $(this).rules('add', {
            required: true,
			email: true,
            messages: {
                required:  " Please insert Valid Email ", 
            }
        });
    });
	$("#province").each(function() {
        $(this).rules('add', {
            required: true,
            messages: {
                required:  " Please insert Province ", 
            }
        });
    });
	$("#zipcode").each(function() {
        $(this).rules('add', {
            required: true,
			digits: true,
            messages: {
               required:  " Please insert Zipcode ", 
            }
        });
    });
	$("#country").each(function() {
        $(this).rules('add', {
            required: true,
			textonly:true,
            messages: {
              
            }
        });
    });
	$("#txtdeposit").each(function() {
        $(this).rules('add', {
            required: true,
			number: true,
            messages: {
               
            }
        });
    });
	$("#txtstart").each(function() {
        $(this).rules('add', {
            required: true,
			date: true,
            messages: {
               
            }
        });
    });$("#txtend").each(function() {
        $(this).rules('add', {
            required: true,
			date: true,
            messages: {
               
            }
        });
    });
	jQuery.validator.addMethod(
	"textonly", 
	function(value, element)
	{
	    valid = false;
	    check = /[^-\.a-zA-Z\s\u00C0-\u00D6\u00D8-\u00F6\u00F8-\u02AE]/.test(value);
	    if(check==false)
	        valid = true;
	    return this.optional(element) || valid;
	}, 
	jQuery.format("Please only enter letters, spaces, periods, or hyphens.")
	);
});
