<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo isset($title) ? $title : 'Service House Long Stay' ; ?></title>
 <link href="<?php echo pathResource;?>css/bootstrap-ie7.css" rel="stylesheet">
 <link href="<?php echo pathResource;?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo pathResource;?>css/bootstrap-responsive.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo pathResource;?>css/style.css" type="text/css"/>
</head>
<body>
	<div class="content">
	<div class="header-a"><div class="header"></div>
   	<div class="content-left">
        <? include("menu.php");?>
     </div>
    <!--content RIGHT--> 
	<div class="content-right">
	<div ><ul class="breadcrumb">
  <li class="active">History > Lease agreement detail > Invoice data</li>
</ul>
 	
 	</div>
    
    
  	<hr style="border-bottom:thin; color:#CCC;margin-top:-22px"/>
 
    
<p>&nbsp;&nbsp; Lease agreement detail</p>

	
    <div align="center"><div class="CSSTableGenerator" >
			<table border="1">
		<thead>
		<th>Lease agreement No.</th>
		<th>invoice_status</th>
		<th>Water unit</th>
		<th>Water bill</th>
		<th>Electric unit</th>
		<th>Electric bill</th>
		<th>Issue Date</th>
		<th>Rent bill</th>
		<th>Total amount</th>
		<th>View Invoice</th>
		</thead>
		
<?php foreach($invoice_data as $ind){?>
<tr>
<tr>
<td style="text-align:center;"><?php echo $ind["in_lease_id"];?></td>
<td>
	<?php if($ind["invoice_status"]== 0){ ?>
	NOT APPROVE
	<?php } ?>
	<?php if($ind["invoice_status"]== 1){ ?>
	WAITING PAYMENT
	<?php } ?>
	<?php if($ind["invoice_status"]== 2){ ?>
	COMPLETE
	<?php } ?>
	<?php if($ind["invoice_status"]== 3){ ?>
	CLOSED
	<?php } ?>

</td>





<td><?php echo $ind["water_unit"];?></td>
<td><?php echo $ind["water_bill"];?></td>
<td><?php echo $ind["electric_unit"];?></td>
<td><?php echo $ind["electric_bill"];?></td>
<td><?php echo $ind["in_issue_date"];?></td>
<td><?php echo $ind["in_rent_fee"];?></td>
<td style="text-align:center;"><?php echo $ind["total_amount"];?></td>
<td><a target="_blank" href="<?php echo base_url();?>invoice_con/view_invoice_inside/<?php echo $ind["invoice_id"];?>"><input type="submit"name="view" value="Print" style="padding:5px; font-size:14px;"/></a></td>





</tr>
</tr>
<?php } ?>
</table> </div>
	<br />
<!--//pagination-->
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