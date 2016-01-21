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
	  <li class="active">Move In / Insert Detail</li>
	</ul> <br />
 	
 	</div>
    <hr style="border-bottom:thin; color:#CCC;margin-top:-40px"/>
    <div class="head-name">Customer Detail</div>
    <br />
<!--form-->
	<form name="checkin" id="checkin" action="<?php echo base_url();?>checkin_con/checkin_customer" method="POST">
    <table width="700" border="0" cellspacing="0" cellpadding="0" style="margin:auto">
	
	
  
  <tr >
    <td width="132" height="40" align="right" >
    Passport No.&nbsp;&nbsp;<br />
	<font size="2" color="#adadad"> Ex.A123456&nbsp;&nbsp; </font>
    </td>
    <td width="568" ><input name="passport" id="passport" type="text" class="textbox" style="width:230px">&nbsp;&nbsp;&nbsp;&nbsp;</td>
  </tr>
 
  
  <tr >
    <td width="132" height="40" align="right" >
    Customer Name &nbsp;&nbsp;<br />
	<font size="2" color="#adadad"> Ex.Mr.Alex Johnson&nbsp;&nbsp; </font>
    </td>
    <td width="568" ><input type="text" name="cus_name" id="cus_name" class="textbox" style="width:230px"></td>
  </tr>
  
  <tr >
    <td width="132" height="40" align="right" >
    Birth Date&nbsp;&nbsp;<br />
	<font size="2" color="#adadad"> Ex.12/24/1991&nbsp;&nbsp; </font>
    </td>
    <td width="568" ><input name="birthdate" id="birthdate" type="date" class="textbox" value="<?php echo date('Y-m-d'); ?>" style="width:150px"></td>
  </tr>
  
  <tr >
    <td width="132" height="40" align="right" >
    Phone&nbsp;&nbsp;
	<br />
	<font size="2" color="#adadad"> Ex.66874737908&nbsp;&nbsp; </font>
    </td>
    <td width="568" ><input name="phone" id="phone" type="tel" class="textbox" style="width:150px"></td>
  </tr>
  
  <tr >
    <td width="132" height="40" align="right" >
    E-mail&nbsp;&nbsp;<br />
	<font size="2" color="#adadad"> Ex.xxx@gmail.com&nbsp;&nbsp; </font>
    </td>
    <td width="568" ><input name="email" id="email" type="email" class="textbox" style="width:150px"></td>
  </tr>
  
  <tr >
    <td width="132" height="40" align="right" >
    Address&nbsp;&nbsp;
	<br />
	<font size="2" color="#adadad"> Ex.4/24 Moo.7 Kukkak, Takuapa&nbsp;&nbsp; </font>
    </td>
    <td width="568" ><textarea name="address"   style="width:230px; height:50px; resize:none;"></textarea></td>
  </tr>
  
  <tr >
    <td width="132" height="40" align="right" >
   Province&nbsp;&nbsp;<br />
	<font size="2" color="#adadad"> Ex.Phang-Nga&nbsp;&nbsp; </font>
    </td>
    <td width="568" ><input name="province" id="province" type="text" class="textbox" style="width:150px"></td>
  </tr>
  
  <tr >
    <td width="132" height="40" align="right" >
   Zipcode&nbsp;&nbsp;
   <br />
	<font size="2" color="#adadad"> Ex.82190&nbsp;&nbsp; </font>
    </td>
    <td width="568" ><input name="zipcode" id="zipcode" type="text" class="textbox" style="width:150px"></td>
  </tr>
  
  <tr >
    <td width="132" height="40" align="right" >
   Country&nbsp;&nbsp;<br />
	<font size="2" color="#adadad"> Ex.Thailand&nbsp;&nbsp; </font>
    </td>
    <td width="568" ><input name="country" id="country" type="text" class="textbox" style="width:150px"></td>
  </tr>
  <tr><td><hr></td><td><hr></td></tr>
  <tr>
  <td colspan="2" ><div style="margin-left:-77px" class="head-name">Rent Detail</div>  </td>
  </tr>
  <tr>
  	<td  width="132" height="40" align="right">Start Date&nbsp;&nbsp;</td>
	<td width="568"><input type="date" id="txtstart" name="txtstart" class="textbox"/></td>
  </tr>
  <tr>
  	<td  width="132" height="40" align="right">End Date&nbsp;&nbsp;<br />
	<font size="2" color="#adadad"> Ex.Not less than Start Date&nbsp;&nbsp; </font>
	</td>
	<td width="568"><input type="date" id="txtend" name="txtend"  onchange="test();" class="textbox"/></td>
  </tr>
  <tr>
  	<td  width="132" height="40" align="right">Deposit&nbsp;&nbsp;<br />
	<font size="2" color="#adadad"> Ex.Not less than <?php echo $rent_fee*2 ;?>&nbsp;&nbsp; </font>
	</td>
	
	<td width="568"><input type="text" name="txtdeposit" id="txtdeposit" onchange="check_deposit();" class="textbox"/></td>
  </tr>
  <input type="hidden" name="txthouseid" value="<?php echo $house_id ?>" class="textbox"/>
  </table>
  <br /><br />
  <div style="margin-left:230px">
  
  <button type="submit"  id="btn_submit" class="btn btn-info" onclick="return confirm('ดำเนินการต่อ')">
  
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Next&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="" class="btn btn-info">&nbsp;&nbsp;&nbsp;&nbsp;Cancel&nbsp;&nbsp;&nbsp;&nbsp;</button>
<br />
<font id="warn_deposit" size="2" color="red" style="display:none;" >Deposit must more than <?php echo $rent_fee*2 ;?>*</font>
<font id="warn_date" size="2" color="red" style="display:none;" >End date must more than Start date*</font>
</div>
</form>
   
    </div>
      
</div>

<script src="<?php echo pathResource;?>js/jquery.js"></script> 
<script src="<?php echo pathResource;?>js/jquery.validate.js"></script> 
<script src="<?php echo pathResource;?>js/validate_checkin.js"></script> 
<script src="<?php echo pathResource;?>js/bootstrap.min.js"></script>
<script type="text/javascript">
	 function test(){
	 	
		var d_end = document.getElementById("txtend").value;
		var d_start = document.getElementById("txtstart").value;
		
		if(d_end<=d_start){
			$('#btn_submit').attr('disabled',true);
			$('#warn_date').css('display','block');
		}else{
			$('#btn_submit').attr('disabled',false);
			$('#warn_date').css('display','none');
		}
	 }
	  function check_deposit(){
	 	
		var deposit = document.getElementById("txtdeposit").value;
		var rent_fee= <?php echo $rent_fee*2 ;?>;
		
		if(deposit<rent_fee){
			$('#btn_submit').attr('disabled',true);
			$('#warn_deposit').css('display','block');
			
		}else{
			$('#btn_submit').attr('disabled',false);
			$('#warn_deposit').css('display','none');
		}
	 }


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