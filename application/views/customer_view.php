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
<body>
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
	<div> <ul class="breadcrumb">
  <li class="active">Customer Management</li>
</ul> 
<hr style="border-bottom:thin; color:#CCC;margin-top:-22px"/>
 
 	</div>
    
  
    <br />
    
<br>

<!--Table Data-->


	
    

	<div >
Found <?php echo $num_results ;?> Customers

<div class="CSSTableGenerator">
	<table class="table table-bordered" width="500" align="center">
 	<thead>
		<th>Customer ID</th>
		<th>Name</th>
		<th>Birthdate</th>
		<th>Passport No.</th>
		<th>address</th>
		<th>Province</th>
		<th>Country</th>
		<th>Zipcode</th>
		<th>Edit</th>
		<th>Delete</th>
	</thead>
	<tbody>
		<?php foreach($users as $user): ?>
		<tr>
			<td><?php echo $user->cus_id; ?></td>
			<td><?php echo $user->customer_name; ?></td>
			<td><?php echo $user->birthdate; ?></td>
			
			<td><?php echo $user->passport_number; ?></td>
			<td><?php echo $user->address; ?></td>
			<td><?php echo $user->province; ?></td>
			<td><?php echo $user->country; ?></td>
			<td><?php echo $user->zipcode; ?></td>
			<td><a href="<?php echo base_url();?>customer_con/edit_user/<?php echo $user->cus_id;?>"><button class="btn btn-warning">Edit</button></a></td>
			<td><a onclick="return confirm('Do you want to delete User ID : <?php echo $user->cus_id; ?> ?')" href="<?php echo base_url();?>customer_con/delete_user/<?php echo $user->cus_id;?>"><button class="btn btn-danger">Delete</button></a></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
	
  </table>
 </div>
 <div>


	 <div class="btn-toolbar" style="margin-top:-28px; margin-left:517px">
	  <div class="btn-group">
	
	  </div>
	</div>
</div>

    </div>
    <br />
    <div style="margin-left:710px" class="">
		
	  <?php if(strlen($pagination)): ?>
	  
		Pages :<?php echo $pagination; ?>
	  
	  <?php endif; ?>
  </div>
</div>
      
</div>


<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script>
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