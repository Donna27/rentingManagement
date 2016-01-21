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
	<div class="nav"> Monve-In > Insert Detail > Rent Detail <br />
 	<hr style="border:0;border-bottom:1px dashed #AAA" />
 	</div>
    
    <div class="head-name">Rental Detail</div>
    <br />
<!--form-->
	<form action="<?php echo base_url();?>checkin_con/checkin_detail" method="POST">
    <table width="700" border="0" cellspacing="0" cellpadding="0" style="margin:auto " >

  <tr>
    <td width="132" height="40" align="right" >
    House id &nbsp;&nbsp;<input name="cus_id" type="hidden"  value="<?php echo $cus_id; ?>">
    </td>
    <td width="568" ><input name="house_id"  type="text" class="textbox" style="width:70px">&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-default">Select House id</button>
</td>
  </tr>
  
  <tr >
    <td width="132" height="40" align="right" >
    House Name.&nbsp;&nbsp;
    </td>
    <td width="568" ><input type="text" class="textbox" readonly="true" style="width:230px"></td>
  </tr>
  
  

  
  <tr >
    <td width="132" height="40" align="right" >
    Move-in Date&nbsp;&nbsp;
    </td>
    <td width="568" ><input name="chk_in" type="date" class="textbox" value="<?php echo date('Y-m-d'); ?>" style="width:150px"></td>
  </tr>
  
  <tr >
    <td width="132" height="40" align="right" >
    Move-out Date&nbsp;&nbsp;
    </td>
    <td width="568" ><input name="chk_out" type="date" class="textbox" value="<?php echo date('Y-m-d'); ?>"  style="width:150px"></td>
  </tr>
  
  <tr >
    <td width="132" height="40" align="right" >
    pledge&nbsp;&nbsp;
    </td>
    <td width="568" ><input name="pledge" type="text" class="textbox" style="width:150px">&nbsp;&nbsp;Baht</td>
  </tr>

  <tr >
    <td width="132" height="40" align="right" >
   Roome Rate&nbsp;&nbsp;
    </td>
    <td width="568" ><input name="rate" readonly="true" type="text" class="textbox" style="width:150px">&nbsp;&nbsp;Baht/Month</td>
  </tr>
  

  
  
  </table>
  <br />
  <div style="margin-left:150px">
  <a href="check-in-customer.php"><button type="button" class="btn btn-info">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Back&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  
 <button type="submit" class="btn btn-info" onclick="return confirm('ดำเนินการต่อ')">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Next&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 
 <button type="button" class="btn btn-info">&nbsp;&nbsp;&nbsp;&nbsp;Cancel&nbsp;&nbsp;&nbsp;&nbsp;</button></div>

    </form>
	
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