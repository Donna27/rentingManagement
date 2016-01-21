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
<div class="header">
<!--form longin-->
	

</div>
    <!--content LEFT-->
   	  <div class="content-left">
        	
    <? include("menu.php");?>
      </div>
    <!--content RIGHT--> 
<div class="content-right">
<div >navigate<br />
 	<hr style="border:0;border-bottom:2px dashed #ABF"/>
 	</div>
    
    <div class="head-name">Payment</div>
    <br />
    <div><ul class="nav nav-tabs">
  <li>
    <a href="<?php echo base_url() ?>payment_con/index">ชำระเงินตามใบเเจ้งหนี้</a>
  </li >
  <li  class="active"><a href="<?php echo base_url() ?>payment_con/pay_in_advance">ชำระเงินล่วงหน้า</a></li>
  <li><a href="<?php echo base_url() ?>payment_con/pay_history">ประวัติการชำระเงิน</a></li>
</ul></div>
	
    
<br />
<p>&nbsp;&nbsp;Click Select Invoice for Bill</p>
<div style="border:solid 1px #BBB; width:868px; margin-left:22px;border-radius:7px">

    <div><div class="CSSTableGenerator" >
                <table >
                    <tr>
                        <td width="7%">
                          Status
                        </td>
                        <td width="11%" >
                            Pay Date
                        </td>
                        <td width="8%">
                            Invocie No.
                        </td>
                        <td width="15%">
                           Customer Name
                        </td>
                        <td width="11%">
                            House Rate
                        </td>
                        <td width="9%">
                            Electric Bill
                        </td>
                        <td width="11%">
                            Water Bill
                        </td >
                        <td width="10%">Insurance
                            
                        </td>
                        <td width="9%">
                            plege
                        </td>
                        <td width="9%">
                            Other
                        </td>
                    </tr>
                    
                    <tr style="height:30px">
                        <td >
                            Row 1
                        </td>
                        <td>
                            Row 1
                        </td>
                        <td>
                            Row 1
                        </td>
                        <td>
                            Row 1
                        </td>
                        <td>
                            Row 1
                        </td>
                        <td>
                            Row 1
                        </td>
                        <td>
                            Row 1
                        </td>
                        <td>
                            Row 1
                        </td>
                        <td>
                           
                        </td>
                         <td>
                            Row 1
                        </td>
                    </tr>
                   
                </table>
            </div>
            <br /><br />


   
</div>
   </div><br />
   <div>
   
 <table width="330" height="25px" border="0" cellspacing="0" cellpadding="0" style="margin-left:30px" >
  <tr bgcolor="#e5e5e5">
    <td align="center" style="border-radius:5px; font:#666">Select Month For Pay In Advance</td>
  </tr>
</table><br />
 <table width="410" border="0" cellspacing="0" cellpadding="0" style="margin-left:30px" >
    <tr>
    <td width="42"><form action="" style="margin:auto" >
<input type="checkbox" name="del" value="delete" style="width:20px;  height:20px ; margin-left:12px" >
</form></td>
    <td width="124">Jan</td>
    <td width="38"><form action="" style="margin:auto" >
<input type="checkbox" name="del" value="delete" style="width:20px;  height:20px ; margin-left:12px" >
</form></td>
    <td width="206">Jul</td>
    
   
  </tr>
  <tr>
    <td><form action="" style="margin:auto" >
<input type="checkbox" name="del" value="delete" style="width:20px;  height:20px ; margin-left:12px" >
</form></td>
    <td>Feb</td>
    <td><form action="" style="margin:auto" >
<input type="checkbox" name="del" value="delete" style="width:20px;  height:20px ; margin-left:12px" >
</form></td>
    <td>Aug</td>
    
   
  </tr>
  <tr>
    <td><form action="" style="margin:auto" >
<input type="checkbox" name="del" value="delete" style="width:20px;  height:20px ; margin-left:12px" >
</form></td>
    <td>Mar</td>
    <td><form action="" style="margin:auto" >
<input type="checkbox" name="del" value="delete" style="width:20px;  height:20px ; margin-left:12px" >
</form></td>
    <td>Sep</td>
    
  </tr>
  <tr>
    <td><form action="" style="margin:auto" >
<input type="checkbox" name="del" value="delete" style="width:20px;  height:20px ; margin-left:12px" >
</form></td>
    <td>Apr</td>
    <td><form action="" style="margin:auto" >
<input type="checkbox" name="del" value="delete" style="width:20px;  height:20px ; margin-left:12px" >
</form></td>
    <td>Oct</td>
    
  </tr>
  <tr>
    <td><form action="" style="margin:auto" >
<input type="checkbox" name="del" value="delete" style="width:20px;  height:20px ; margin-left:12px" >
</form></td>
    <td>May</td>
    <td><form action="" style="margin:auto" >
<input type="checkbox" name="del" value="delete" style="width:20px;  height:20px ; margin-left:12px" >
</form></td>
    <td>Nov</td>
    
  </tr>
  <tr>
    <td><form action="" style="margin:auto" >
<input type="checkbox" name="del" value="delete" style="width:20px;  height:20px ; margin-left:12px" >
</form></td>
    <td>Jun</td>
    <td><form action="" style="margin:auto" >
<input type="checkbox" name="del" value="delete" style="width:20px;  height:20px ; margin-left:12px" >
</form></td>
    <td>Dec</td>
    
  </tr>
  
  
</table>
<table width="410" border="0" cellspacing="0" cellpadding="0" style="margin-left:35px" >
  <tr>
    <td width="75">&nbsp;</td>
    <td width="229">&nbsp;</td>
    
  </tr>
  <tr>
    <td align="right">Year&nbsp;&nbsp;</td>
    <td><select name="seaech" style="width:90px">
    <option>2556</option>
    <option>2557</option>
    <option>2558</option>
     <option>2559</option>
     
  </select></td>
    
  </tr>
  <tr>
    <td align="right">House Rate&nbsp;&nbsp;</td>
    <td><input type="text" class="textbox" style="width:77px ; height:17px"> 
    Baht (per/month)</td>
    
  </tr>
  <tr>
    <td align="right">Electric Bill&nbsp;&nbsp;</td>
    <td><input type="text" class="textbox" style="width:77px ; height:17px"> Baht </td>
    
  </tr>
  <tr>
    <td align="right">Water Bill&nbsp;&nbsp;</td>
    <td><input type="text" class="textbox" style="width:77px ; height:17px"> Bath</td>
    
  </tr>
  <tr>
    <td align="right">Other&nbsp;&nbsp;</td>
    <td><input type="text" class="textbox" style="width:77px ; height:17px"> 
    Bath</td>
    
  </tr>
</table>


<table width="330" border="0" cellspacing="0" cellpadding="0" style="margin-left:480px;margin-top:-380px" >
  <tr>
    <td width="131" align="right">Invoice No.&nbsp;&nbsp;</td>
    <td width="149"><input type="text" class="textbox" style="width:77px ; height:17px"></td>
    <td width="24">&nbsp;</td>
    <td width="26">&nbsp;</td>
  </tr>
  <tr>
    <td align="right">Custmer Name&nbsp;&nbsp;</td>
    <td><input type="text" class="textbox" style="width:150px ; height:17px"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">Status&nbsp;&nbsp;</td>
    <td><select name="seaech" style="width:166px">
    <option>Move-in</option>
    <option>Reservation</option>
   
  </select></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">ค่าประกัน&nbsp;&nbsp;</td>
    <td><input type="text" class="textbox" style="width:77px ; height:17px">
    Baht</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">ค่ามัดจำล่วงหน้า&nbsp;&nbsp;</td>
    <td><input type="text" class="textbox" style="width:77px ; height:17px"> 
      Baht</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">Other&nbsp;&nbsp;</td>
    <td><input type="text" class="textbox" style="width:77px ; height:17px"> 
      Baht</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td align="right">Total&nbsp;&nbsp;</td>
    <td><input type="text" class="textbox" style="width:77px ; height:17px"> 
    Baht</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td align="right">Pay Date&nbsp;&nbsp;</td>
    <td><input type="text" class="textbox" style="width:77px ; height:17px"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br />
<div style="margin-left:490px; margin-top:37px">
  <a href="#"><button type="button" class="btn btn-info" onclick="return confirm('Do you want to do this ?')"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Save&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><button type="button" class="btn btn-info" onclick="return confirm('Do you want to do this ?')">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Calcel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button></a></div>
</div>

  </div>


</div></div>


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