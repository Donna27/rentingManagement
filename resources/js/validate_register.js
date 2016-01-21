	$(document).ready(function(){
	
	
	$("#vali").validate({

	errorClass: 'showerror',
	
	rules:{
		
		txtusername:{
					required: true
					},
					
		txtpassword:{
					required: true,
					minlength :8
					},
					
		txtconpassword:{
					required: true,
					minlength :8,
					equalTo : "#txtpassword"
					},
		txtname:{
					required: true	
				},
		
		txtemail:{
					required: true, 
					email: true
					},
		txtbirthday:{
					required: true
					},
					
		txtaddress:{
					required: true
					},
					
		txtprovince:{
		
					required: true
					},
					
		txtcountry:{
					required: true
					},
					
		txtzipcode:{
					required: true
					},
					
		txtphone:{
					required: true
					},
					
		txtpriority:{
					required: true
					}
					},
		
		messages:{
		
			txtusername:{
						required: "*Please enter Username" 
						},
				txtpassword: {
						required: "*Please enter Password"
						},
				txtconpassword: {
						required: "*Please enter Password",
						equalTo: "*Password is not True"
						},
				txtname: {
						required: "*Please enter Name"
						},
				txtemail: {
						required: "*Please enter Email",
						email:	  "*Email is Not True"
						},
				txtbirthday: {
						required: "*Please select Birthday"
						},
				txtaddress: {
						required: "*Please enter Address"
						},
				txtprovince: {
						required: "*Please enter Province"
						},
				txtcountry: {
						required: "*Please enter Country"
						},
				txtzipcode:	{
						required: "*Please enter Zipcode"
						},
				txtphone:	{
						required: "*Please enter Phone"
						},
				txtpriority:	{
						required: "*Please select priority"
						}

			  }
		});


});