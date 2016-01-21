<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo isset($title) ? $title : 'Service House Long Stay' ; ?></title>
        
<link href="<?php echo pathResource;?>css/bootstrap.css" rel="stylesheet">
<link href="<?php echo pathResource;?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo pathResource;?>css/bootstrap-responsive.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/style.css" type="text/css"/>
<script type="text/javascript" src="<?php echo pathResource;?>js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="<?php echo pathResource;?>js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo pathResource;?>js/validate_register.js"></script>

</head>
<body>
	<div class="header-a"><div class="header"><br /></div></div>
	<div class="content">
	<div class="content-left"><? include("menu.php");?></div>
      
<!--content RIGHT--> 
	<div class="content-right">
    
<!--nav-->
	<div ><div ><ul class="breadcrumb">
  <li><a href="#">Member Management</a> <span class="divider">/</span></li>
 
  <li class="active">Create Account</li>
</ul>
 	<hr style="border:0;border-bottom:2px dashed #ABF;margin-top:-20px"/>
 	</div>
    
    <div class="head-name">Create Account</div>
    <hr style="border-bottom:thin; color:#CCC;margin-top:8px"/>
    <br>

<!--form-->
<form class="form-horizontal" autocomplete="off"  id="vali" method="post" action="<?php echo base_url();?>register_con/getInput" >

	
    <table width="700" border="0" cellspacing="0" cellpadding="0" style="margin:auto " >

  <tr>
    <td width="170" height="40" align="right" >Username&nbsp;&nbsp;
    </td>
    <td width="530" ><input type="text" class="textbox" name="txtusername" style="width:200px ; height:22px" >
</td>
  </tr>
  <tr>
    <td width="170" height="40" align="right" >
    Password&nbsp;&nbsp;
    </td>
    <td width="530" ><input type="password" class="textbox1" name="txtpassword" id="txtpassword" style="width:200px ; height:22px" />
    </td>

  </tr>
   </tr>
   <tr>
    <td width="170" height="40" align="right" >
    Confirm Password&nbsp;&nbsp;
    </td>
    <td width="530" ><input type="password" class="textbox1" style="width:200px ; height:22px" name="txtconpassword" />
    </td>
  </tr>
   <tr>
   &nbsp;</td>
    
  </tr>
   </table>
    <table width="700" border="0" cellspacing="0" cellpadding="0" style="margin:auto;margin-top:6px " >
    <tr>
    <td width="170" height="40" align="right" >
    Name&nbsp;&nbsp;
    </td>
    <td width="530" ><input type="text" class="textbox11" style="width:200px ; height:22px" name="txtname" /></td>
  </tr>
  <tr>
    <td width="170" height="40" align="right" >
    Email&nbsp;&nbsp;
    </td>
    <td width="530" ><input type="text" class="textbox11" style="width:200px ; height:22px" name="txtemail"/></td>
  </tr>
  <tr>
  <td width="170" height="40" align="right" >
  Phone
  </td>
  <td width="530" >
  <input type="tel" name="txtphone"/>
  </td>
  </tr>
  <tr>
    <td width="169" height="40" align="right" >
   Priority&nbsp;&nbsp;
    </td>
    <td width="531" ><div class="dropdown">
<!-- DropDown -->    
         <select style="width:164px" name="txtpriority">
         <option>Manager</option>
         <option>Staff</option>
       

       </select>
</div></td>
  </tr>
  </table>
<hr style="border-bottom:thin; color:#CCC;margin-top:22px;width:70%;margin:auto;margin-top:30px" />
<div style="margin-left:280px;margin-top:22px">
  <!--<a href="#"><button type="button" class="btn btn-info" onclick="return confirm('Do you want to do this ?')"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sumit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
    <input type="submit" name="submit" value="submit" class="btn btn-info" style="width:100px;">
  
  <a href="<?php echo base_url();?>member_management_con/member_management"><button type="button" class="btn btn-info" style="width:100px;"> &nbsp;&nbsp;&nbsp;&nbsp;Cancel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </button></a></div>

</form>
</div>

</div>


<!--<script src="<?php echo base_url(); ?>resources/js/jquery.js"></script> -->
<script src="<?php echo base_url(); ?>resources/js/bootstrap.min.js"></script>

</body>
</html>