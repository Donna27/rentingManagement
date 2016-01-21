<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo isset($title) ? $title : 'Service House Long Stay' ; ?></title>

        
<link href="<?php echo pathResource;?>css/bootstrap-ie7.css" rel="stylesheet">
<link href="<?php echo pathResource;?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo pathResource;?>css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="<?php echo pathResource;?>css/style.css" rel="stylesheet">

</head>
<body >
	<div class="content">
    <!--header-->
<div class="header"></div>

<!--content LEFT-->
<div class="content-left">
        	<? include("menu.php");?>
      </div>
      
<!--content RIGHT--> 
	<div class="content-right">
    
<!--nav-->
		<div><ul class="breadcrumb">
	  <li class="active">House Management / House Edit </li>
	</ul> <br />
 	
 	</div>
    <hr style="border-bottom:thin; color:#CCC;margin-top:-40px"/>
    <div class="head-name">Edit House</div>
    <br />
	<form name="addhouse" id="addhouse" action="<?php echo base_url();?>house_con/edit_house" method="POST">
		<table align="">
			<tr align="left">
				<td>House Name</td>
				<td><input id="housename" name="housename" value="<?php echo $house_name;?>" type="text"/></td>
			</tr>
			<tr align="left">
				<td>House Address</td>
				<td><textarea id="houseaddress" name="houseaddress" rows="3" style="resize:none;" ><?php echo $house_address;?></textarea></td>
			</tr>
			<tr align="left">
				<td>House Type </td>
				
			</tr>
			<tr>
				<td></td>
				<td>
					<?php foreach($types as $type): ?>
					<input type="radio" name="type_id" <?php if($type_id==$type->type_id){echo "checked" ;}?>  value="<?php echo $type->type_id; ?>">
					<?php echo $type->type_name; ?>( <?php echo $type->rent_fee; ?> Baht) <br/>
					<?php endforeach; ?>
				</td>
			</tr>
		
		</table>
		<br><br><br><br>
		<div>
 <button type="submit" class="btn btn-info" onclick="return confirm('Do you want to do this ?')"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sumit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
	</form>
    
</div>
      
</div>


<script src="<?php echo pathResource;?>js/jquery.js"></script> 
<script src="<?php echo pathResource;?>js/jquery.validate.js"></script> 
<script src="<?php echo pathResource;?>js/validate_house.js"></script> 
<script src="<?php echo pathResource;?>js/bootstrap.min.js"></script>
<script type="text/javascript">

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script> 
</body>
</html>