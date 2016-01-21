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
	  <li class="active">Move In / Insert Detail / Move In Result</li>
	</ul> <br />
 	
 	</div>
    <hr style="border-bottom:thin; color:#CCC;margin-top:-40px"/>
    <div class="head-name">Move in Success</div>
    <br />
<!--form-->
	
    <table width="700" border="0" cellspacing="0" cellpadding="0" style="margin:auto " >

  <tr>
    <td width="132" height="40" align="right" >
    Customer Name &nbsp;&nbsp;
    </td>
    <td width="568" ><input type="text" class="textbox" readonly="true" value="<?php echo $customer_name; ?>" style="width:230px"></td></td>
  </tr>
  <tr >
    <td width="132" height="40" align="right" >
    House Name.&nbsp;&nbsp;<input type="hidden" name="lease_id" value="<?php echo $lease_id; ?>" >
    </td>
    <td width="568" ><input type="text" value="<?php echo $house_name; ?>" class="textbox" readonly="true" style="width:230px"></td></td>
  </tr>

  <tr >
    <td width="132" height="40" align="right" >
    Move-in Date&nbsp;&nbsp;
    </td>
    <td width="568"><input type="text" class="textbox"  value="<?php echo $start; ?>" readonly="true" style="width:230px"></td></td>
  </tr>
  
  <tr >
    <td width="132" height="40" align="right" >
    Move-out Date&nbsp;&nbsp;
    </td>
    <td width="568" ><input type="text" class="textbox"  value="<?php echo $end; ?>" readonly="true" style="width:230px"></td></td>
  </tr>
  
  <tr >
    <td width="132" height="40" align="right" >
    Deposit&nbsp;&nbsp;
    </td>
    <td width="568" ><input type="text" class="textbox"  value="<?php echo $deposit; ?>" readonly="true" style="width:230px"></td></td>
  </tr>

  <tr >
    <td width="132" height="40" align="right" >
  Rent Fee&nbsp;&nbsp;
    </td>
    <td width="568" ><input type="text" class="textbox"  value="<?php echo $rent_fee; ?>" readonly="true" style="width:230px"></td></td>
  </tr>
  <tr><td>&nbsp;</td></tr>
  <tr>
  <td align="right"><!--button Print-->
	<a target="_blank" href="<?php echo base_url();?>checkin_con/lease_agreement/<?php echo $lease_id; ?>"><input class="btn btn-info" type="button" value="Print Contract" /></a>
	
	</td></tr>
  
  </table>
  <br />
  <div style="margin-left:150px">
  </div>
	
    </div>
      
</div>

<script src="<?php echo pathResource;?>js/jquery.js"></script> 
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