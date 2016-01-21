<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo isset($title) ? $title : 'Service House Long Stay' ; ?></title>
<script type="text/javascript" src="<?php echo pathResource;?>js/jquery-1.8.0.min.js"></script>

<script type="text/javascript" src="<?php echo pathResource;?>js/jquery.validate.js"></script>
<link href="<?php echo pathResource;?>css/bootstrap-ie7.css" rel="stylesheet">
 <link href="<?php echo pathResource;?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo pathResource;?>css/bootstrap-responsive.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo pathResource;?>css/style.css" type="text/css"/>

<script type="text/javascript">
	
		$(document).ready(function(){
$("#vali").validate({
	
    errorClass: 'showerror',

rules:{
		username:{
						required: true 
						
						},
		password: {
				required: true,

					},		
		},				
		
messages:{		
				username:{
						required: "<li>The username field is required.</li>"				
			}  ,   
		
				password:{
					required: "<li>The password field is required.</li>"
								
					}
}
});
});

</script>
<link href="<?php echo pathResource;?>css/style.css" rel="stylesheet" type="text/css">
<style type="text/css">
		

		.showerror{
	color:red;
	padding-left: 35px;
	}
</style>

</head>
<body>

<div class="bg-login">
<br />
  <img src="<?php echo pathResource;?>img/Logo.png" width="370" height="100" />
			
			<label style="margin-top:75px;margin-left: 488px;font-size: 26px;color: #fff;font-family:Arial, Helvetica, sans-serif">Login to you Account</label>
			<div  class="bg-loin1" >
			<div style="width:700px;margin:auto"><br /><br />
			<form class="form-horizontal" method="post" action="<?php echo base_url();?>login_con/verifylogin" id="vali" >

			<div id="form_login" class="control-group">
			   		 <label class="control-label" for="inputEmail">Username</label>
					  <div class="controls">
			        <input type="text" name="username" placeholder="Username " id="username" class="validate[required]" style="width:220px;height:30px;">
			        </div>
			   		</div>
			        <div class="control-group">
					 <label class="control-label" for="inputPassword">Password</label>
					 <div class="controls">
			        <input type="password" name="password" placeholder="Password" id="password" class="validate[required]" style="width:220px;height:30px;">
			        </div>
			    	</div>
					<div class="control-group">
			    	<div class="controls">
						<div id="error" style="">
							<?php if($error != ""){?>		
							<font color="red"><?php echo $error;?></font>
							<?php }?>
						</div>       
			    	
			        <button class="btn btn-info" type="submit" name="submit">&nbsp;&nbsp;&nbsp;login&nbsp;&nbsp;&nbsp;</button>
			   		<button class="btn btn-info"  name="submit">&nbsp;&nbsp;Forget Password&nbsp;&nbsp;</button>
					</div> 
					</div> 
				
			</form>
</div>
</div>
</div>
</body>
</html>