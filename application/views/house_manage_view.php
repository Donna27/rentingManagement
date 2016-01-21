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
	<div ><ul class="breadcrumb">
  <li class="active">House Management</li>
</ul><hr style="border-bottom:thin; color:#CCC;margin-top:-22px"/>
 		
 	</div>
    
    
    <br />
    <div style="border:solid 1px #84ADFB ; width:788px ; margin-left:58px; box-shadow: 1px 0px 1px 1px #84ADFB">
    <table width="700" border="0" cellspacing="0" cellpadding="0" style="margin:auto ">
   <label style="margin-left:5px">SEARCH </label>
  <tr >
  
    <td width="132" height="40" align="right" >
    Search Type &nbsp;&nbsp;
    </td>
    <td width="568" >
   
  <select name="seaech" style="margin-left:5px">
    <option>House ID</option>
    <option>House Name</option>
    <option>Status</option>
     <option>House Type</option>
     
  </select>
  &nbsp;&nbsp;Keyword &nbsp; <input type="text" class="textbox" style="width:150px ; height:22px">
  <img src="<?php echo pathResource;?>img/icon-search.png" width="37" height="37" style="margin-top:-10px;cursor:hand;cursor: pointer" id="Image39" onMouseOver="MM_swapImage('Image39','','<?php echo pathResource;?>img/icon-search-o.png ',1)" onMouseOut="MM_swapImgRestore()" /></td>
  </tr>
</table>

</div>
<br>

<!--Table Data-->


	
    

	<div >
Found <?php echo $num_results ;?> House

<div class="CSSTableGenerator">
	<table class="table table-bordered" width="500" align="center">
 	<thead>
		<th>House ID</th>
		<th>House Name</th>
		<th>House Address</th>
		<th>House Type</th>
		<th>Type Name</th>
		<th>Rent Fee</th>
		<th>Edit</th>
		<th>Delete</th>
	</thead>
	<tbody>
		<?php foreach($houses as $house): ?>
		<tr>
			<td><?php echo $house->house_id; ?></td>
			<td><?php echo $house->house_name; ?></td>
			<td><?php echo $house->house_address; ?></td>
			<td><?php echo $house->type_id; ?></td>
			<td><?php echo $house->type_name; ?></td>
			<td><?php echo $house->rent_fee; ?></td>
			<td><a href="<?php echo base_url();?>house_con/edit_view/<?php echo $house->house_id;?>"><button class="btn btn-warning">Edit</button></a></td>
			<td><a onclick="return confirm('ต้องการลบบ้านหมายเลข <?php echo $house->house_id; ?> ใช่หรือไม่')" href="<?php echo base_url();?>house_con/delete_house/<?php echo $house->house_id;?>"><button class="btn btn-danger">Delete</button></a></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
	
  </table>
 </div>
 <div>
<a href="<?php echo base_url();?>house_con/add"><button class="btn" type="button" style="background:#dff0d8">Add House</button> </a>

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