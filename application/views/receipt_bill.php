<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- saved from url=(0054)http://pkthealth-coop.com/member/special-loan.php?id=1 -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>ใบเสร็จรับเงิน</title>


	<style type="text/css">
    @charset "utf-8";
/* CSS Document */

.text_white {
	color: #FFF;
}
#link_b {
	color: #000;
}

#link_b:hover {
	color: #3FF;
}
#link_log {
	color: #00C;
	text-decoration: none;
	font-size: 14px;
}
#link_log:hover {
	color: #3FF;
	font-size: 14px;
}
.content {
	font-size: 12px;
	color: #000;
	text-decoration: none;
}
a:link {
	color: #FFF;
	text-decoration: none;
}

a:visited {
	color: #FFF;
}

a:hover {
	color: #3FF;
}
.text {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 11px;
	color: #000;
}
p {
	line-height: 25px;
	text-align: justify;
	word-spacing: normal;
}

.doc16 {
	font-family: "Cordia New";
	font-size: 16px;
	text-align:justify;
}
.doc18 {
	font-family: "Cordia New";
	font-size: 20px;
	
}
.doc20 {
	font-family: "Cordia New";
	font-size: 24px;
	
}

.doc14 {
	font-family: "Cordia New";
	font-size: 14px;
}

.doc24 {
	font-family: "Cordia New";
	font-size: 30px;
}

.doc32 {
	font-family: "Cordia New";
	font-size: 36px;
}


    
    </style>
   
</head
><body style="zoom:200%;" onload="window.print()">

      <table width="600" border="0" cellspacing="0" cellpadding="0" align="center">
    
  <tbody>
 
  <tr class="doc16">
  
    <td width="61%" align="left"><img src="<?php echo pathResource;?>img/logo_invoice1.png" width="200" height="54" /><div class="doc16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4/111 Moo.7 Kukkak Takuapa Phang-nga Thailand 82190</div></td>
    <td width="39%" align="left"><img src="<?php echo pathResource;?>img/receipt_word.png" width="200" height="54" /></td>
  </tr>
 
</tbody>

</table>
<hr width="598" align="center" size="1px" color="#CCC">

<table width="600"  align="center">
  <tr>
    <td width="149" align="left" class="doc16">Invoice No. (ใบแจ้งหนี้ เลขที่) :</td>
    <td width="110" class="doc16"><div style="position:absolute; left: 195px; top: 105px;"><?php echo $invoice_id;?></div></td>
    <td width="152" class="doc16"> Payment Date (วันที่ชำระเงิน) :</td>
    <td width="169" class="doc16"><div style="position:absolute; left: 475px; top: 106px;"><?php echo $pay_date;?></div></td>
    
  </tr>
</table>

 <table width="600"  align="center">
  <tr>
    <td width="148" align="right" class="doc16"> House Name (ชื่อบ้าน) :</td>
    <td width="440" class="doc16"><div style="position:absolute; left: 194px; top: 137px;"><?php echo $house_name;?></div></td>
    
  </tr>
</table>

<table width="600"  align="center">
  <tr>
    <td width="148" align="right" class="doc16"> Lessee (ชื่อผู้เช่า) :</td>
    <td width="440" class="doc16"><div style="position:absolute; left: 194px; top: 166px;"><?php echo $customer_name;?></div></td>
    
  </tr>
</table>

<table width="600"  align="center">
  <tr>
    <td width="147" align="left" class="doc16">Address (ที่อยู่) :</td>
    <td width="441" class="doc16"><div style="position:absolute; left: 194px; top: 194px;"><?php echo $house_address;?></div></td>
    
  </tr>
</table>

 <br />


<table width="600" align="center" bordercolor="#CCC" cellspacing="0" cellpadding="0" style="margin:auto;border-style: solid;
border-width:1px"  >
  <tr class="doc16" bgcolor="#E2E2E2" >
    <td width="226" height="28" align="center" >Description (รายการ)</td>
    <td width="121" align="center">Quantity(จำนวนหน่วย)</td>
    <td width="118" align="center">Unit(ราคาต่อหน่วย)</td>
    <td width="133" align="center">Amount(จำนวนเงิน)/ Baht</td>
  </tr>
</table>

<table width="600" align="center"  cellspacing="0" cellpadding="0" style="margin:auto"  >
  <tr class="doc16">
    <td width="225" height="28">&nbsp;&nbsp;<div style="position:absolute; left: 54px; top: 280px; width: 123px;">Rental fee&nbsp;(ค่าเช่าบ้าน)</div></td>
    <td width="122" align="center">&nbsp;</td>
    <td width="120" align="center">&nbsp;</td>
    <td width="131" align="center"><div style="position:absolute; left: 559px; top: 280px; width: 50px;"><?php echo $in_rent_fee;?></div></td>
</tr>

 <tr class="doc16">
    <td width="225" height="28">&nbsp;&nbsp;<div style="position:absolute; left: 53px; top: 304px; width: 101px;">Electric bill&nbsp;(ค่าไฟ)</div></td>
    <td width="122" align="center"><div style="position:absolute; left: 53px; top: 329px; width: 81px;">Water bill&nbsp;(ค่าน้ำ)</div></td>
    <td width="120" align="center"><div style="position:absolute; left: 309px; top: 303px; width: 24px;">15</div></td>
    <td width="131" align="center"><div style="position:absolute; left: 559px; top: 305px; width: 50px;"><?php echo $electric_bill;?></div></td>
</tr>

<tr class="doc16">
    <td width="225" height="28">&nbsp;&nbsp;<div style="position:absolute; left: 441px; top: 304px; width: 24px;">20</div></td>
    <td width="122" align="center"><div style="position:absolute; left: 309px; top: 330px; width: 25px;">15</div></td>
    <td width="120" align="center"><div style="position:absolute; left: 436px; top: 331px; width: 25px;">20</div></td>
    <td width="131" align="center"><div style="position:absolute; left: 559px; top: 330px; width: 50px;"><?php echo $water_bill;?></div></td>
</tr>


</table>


<hr width="598" align="center" size="1px" color="#CCC">
<table width="600" align="center"  cellspacing="0" cellpadding="0" style="margin:auto"  >
  <tr class="doc16">
    <td width="314" height="28">&nbsp;&nbsp;</td>
    
    <td width="164" align="right">Total (รวมเงิน) :</td>
    <td width="120" align="center"><div style="position:absolute; left: 559px; top: 371px; width: 50px;"><?php echo $total_amount;?></div></td>
  </tr>
  
</table>

<hr width="598" align="center" size="1px" color="#CCC">
<br />
<table width="600" align="center"  cellspacing="0" cellpadding="0" style="margin:auto"  >
<tr class="doc16">
    <td width="397" height="28" align="right">&nbsp;&nbsp;Receipien :</td>
     <td width="201" height="28">&nbsp;&nbsp;……………………<div style="position:absolute; left: 459px; top: 429px; width: 90px;"><?php echo $user_name;?></div>……………………</td>
    
    
  </tr>
</table>

<br />
</body></html>