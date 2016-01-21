<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo isset($title) ? $title : 'Service House Long Stay' ; ?></title>
<link href="<?php echo pathResource;?>css/bootstrap-ie7.css" rel="stylesheet">
<link href="<?php echo pathResource;?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo pathResource;?>css/bootstrap-responsive.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo pathResource;?>css/style.css" type="text/css"/>

<script type="text/javascript" src="<?php echo pathResource;?>js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="<?php echo pathResource;?>js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo pathResource;?>js/validate_invoice.js"></script>
</head>
<body>
	<div class="header-a"><div class="header"></div></div>
	<div class="content">
   	<div class="content-left">
        <? include("menu.php");?>
     </div>
    
	<div class="content-right">
	<div ><ul class="breadcrumb">
  <li class="active">Add Invoice</li>
</ul>
 	
	<hr style="border-bottom:thin; color:#CCC;margin-top:-22px"/>
 	</div>
    <br />
	<div><ul class="nav nav-tabs">
  	<li class="active">
    <a href="<?php echo base_url() ?>menu_con/invoice">เพิ่มใบแจ้งหนี้</a>
  	</li>
  	<li ><a href="<?php echo base_url() ?>invoice_con/edit_invoice">แก้ไขใบแจ้งหนี้</a></li>
  
	</ul>
</div>
    
    
  
    <div style="font-size:22px; font-family:Arial, Helvetica, sans-serif;margin-left:20px"><p>กรุณาใส่ข้อมูลค่าใช้จ่ายของบ้านแต่ละหลัง</p></div>
    

    <div ><div class="CSSTableGenerator" >
	<form autocomplete="off" method="POST" name="add_invoice" id="add_invoice" action="<?php echo base_url();?>invoice_con/update_all">
                <table class="table table-bordered" >
                 <thead>
				 <th>Lease ID</th>
				 <th>Invoice issue</th>
				 <th>Ex-Water Unit</th>
				 <th>Water Unit</th>
				 <th>Water Bill</th>
				 <th>Ex-Electric Unit</th>
				 <th>Electric Unit</th>
				 <th>Electric Bill</th>
				 <th>Rent Fee</th>
				
				 <th>Total</th>
				 
			<!--	 <th>View Invoice</th>-->
				 </thead>
                 <tbody>
				<?php $i=1 ?>
				  <?php foreach($invoices as $invoice): ?>
					<tr>
						<input name="invoice_id<?php echo $i; ?>" type="hidden" value="<?php echo $invoice->invoice_id; ?>"/>
						<td><?php echo $invoice->in_lease_id; ?></td>
						<td><?php echo $invoice->in_issue_date; ?></td>
						<td><input id="ex_water_unit<?php echo $i; ?>" type="text" readonly="true"  size="4" maxlength="4" style="width:40px;" value="<?php echo $invoice->w_unit; ?>"></td>
						<td><input name="water_unit<?php echo $i; ?>" id="water_unit<?php echo $i; ?>" onchange="calculate<?php echo $i; ?>()"type="text" size="5" maxlength="4" style="width:40px;" value="<?php echo $invoice->water_unit; ?>"></td>
						<td><input name="water_bill<?php echo $i; ?>" id="water_bill<?php echo $i; ?>" onchange="calculate<?php echo $i; ?>()" type="number" size="5" maxlength="4" style="width:40px;" value="<?php echo $invoice->water_bill; ?>"></td>
						<td><input id="ex_elec_unit<?php echo $i; ?>" type="text" readonly="true"  size="4" maxlength="4" style="width:40px;" value="<?php echo $invoice->unit; ?>"></td>
						<td><input name="elec_unit<?php echo $i; ?>" id="elec_unit<?php echo $i; ?>" onchange="calculate<?php echo $i; ?>()" type="number" size="5" maxlength="4" style="width:40px;" value="<?php echo $invoice->electric_unit; ?>"></td>
						<td><input name="elec_bill<?php echo $i; ?>" id="elec_bill<?php echo $i; ?>" readonly="true"  type="number" size="5" maxlength="4" style="width:40px;" value="<?php echo $invoice->electric_bill; ?>"></td>
						<td><input name="rent_fee<?php echo $i; ?>" id="rent_fee<?php echo $i; ?>"  type="number" size="5" maxlength="5" style="width:40px;" value="<?php echo $invoice->rent_fee; ?>"></td>
						<td><input name="total<?php echo $i; ?>" id="total<?php echo $i; ?>" type="text" size="5" readonly="true" maxlength="6" style="width:50px;" value="<?php echo $invoice->total_amount; ?>"></td>
						<!--<td><a target="_blank" href="<?php echo base_url();?>invoice_con/view_invoice_inside/<?php echo $invoice->invoice_id; ?>"><button type="button">View</button></a></td>-->
					</tr>
					<?php $i++ ?>
					<?php endforeach; ?>
				 </tbody>  
                 
                   
                </table>
			
	            <div style="margin-left:710px" class="">
				  <?php if(strlen($pagination)): ?>
				  
					Pages :<?php echo $pagination; ?>
				  
				  <?php endif; ?>
				  
			  	</div>
				<div style="margin-left:65px;">
				<br />
				<button class="btn btn-primary" type="submit">Update all invoice and send email</button>
				</div>
				</form>
				
    

</div>
<span style="font-size:15px;">*Current Electric Rate = <?php echo $rate['electric_rate']; ?> Baht.</span><br />
<span style="font-size:15px;">**Current Water Rate = <?php echo $rate['water_rate']; ?> Baht.</span>
</div>


<script src="<?php echo pathResource;?>js/jquery.js"></script> 
<script src="<?php echo pathResource;?>js/bootstrap.min.js"></script>
<script type="text/javascript">
	var elec_rate =<?php echo $rate['electric_rate']; ?>;
	var water_rate=<?php echo $rate['water_rate']; ?>;
function calculate1(){
				var ex_unit = document.getElementById("ex_elec_unit1").value;
				var rent = document.getElementById("rent_fee1").value;
				var elec_unit = document.getElementById("elec_unit1").value;
				var water = document.getElementById("water_bill1").value;
				
				var ex_w_unit = document.getElementById("ex_water_unit1").value;
				var w_unit = document.getElementById("water_unit1").value;
				if(w_unit==0){
					var p_water = water;
				}else{
					var total_water_unit = w_unit-ex_w_unit;
					var p_water = total_water_unit*water_rate;
					$("#water_bill1").attr('value',p_water);
				}
				
				var total_unit =  elec_unit-ex_unit;
				var result = total_unit * elec_rate;
				
				var total_amount = (rent*1) + (result) + (p_water*1) ;
				
				$("#elec_bill1").attr('value',result);
				$("#total1").attr('value',total_amount);
}
function calculate2(){
	var ex_unit = document.getElementById("ex_elec_unit2").value;
				var rent = document.getElementById("rent_fee2").value;
				var elec_unit = document.getElementById("elec_unit2").value;
				var water = document.getElementById("water_bill2").value;
				
				
				var ex_w_unit = document.getElementById("ex_water_unit2").value;
				var w_unit = document.getElementById("water_unit2").value;
				if(w_unit==0){
					var p_water = water;
				}else{
					var total_water_unit = w_unit-ex_w_unit;
					var p_water = total_water_unit*water_rate;
					$("#water_bill2").attr('value',p_water);
				}
				var total_unit =  elec_unit-ex_unit;
				var result = total_unit * elec_rate;
				
				var total_amount = (rent*1) + (result) + (p_water*1) ;
				
				$("#elec_bill2").attr('value',result);
				$("#total2").attr('value',total_amount);
}
function calculate3(){
	var ex_unit = document.getElementById("ex_elec_unit3").value;
				var rent = document.getElementById("rent_fee3").value;
				var elec_unit = document.getElementById("elec_unit3").value;
				var water = document.getElementById("water_bill3").value;
				
				
				var ex_w_unit = document.getElementById("ex_water_unit3").value;
				var w_unit = document.getElementById("water_unit3").value;
				if(w_unit==0){
					var p_water = water;
				}else{
					var total_water_unit = w_unit-ex_w_unit;
					var p_water = total_water_unit*water_rate;
					$("#water_bill3").attr('value',p_water);
				}
				var total_unit =  elec_unit-ex_unit;
				var result = total_unit * elec_rate;
				
				var total_amount = (rent*1) + (result) + (p_water*1) ;
				
				$("#elec_bill3").attr('value',result);
				$("#total3").attr('value',total_amount);
}
function calculate4(){
	var ex_unit = document.getElementById("ex_elec_unit4").value;
				var rent = document.getElementById("rent_fee4").value;
				var elec_unit = document.getElementById("elec_unit4").value;
				var water = document.getElementById("water_bill4").value;
				
				
				var ex_w_unit = document.getElementById("ex_water_unit4").value;
				var w_unit = document.getElementById("water_unit4").value;
				if(w_unit==0){
					var p_water = water;
				}else{
					var total_water_unit = w_unit-ex_w_unit;
					var p_water = total_water_unit*water_rate;
					$("#water_bill4").attr('value',p_water);
				}
				var total_unit =  elec_unit-ex_unit;
				var result = total_unit * elec_rate;
				
				var total_amount = (rent*1) + (result) + (p_water*1) ;
				
				$("#elec_bill4").attr('value',result);
				$("#total4").attr('value',total_amount);
}
function calculate5(){
	var ex_unit = document.getElementById("ex_elec_unit5").value;
				var rent = document.getElementById("rent_fee5").value;
				var elec_unit = document.getElementById("elec_unit5").value;
				var water = document.getElementById("water_bill5").value;
				
				
				var ex_w_unit = document.getElementById("ex_water_unit5").value;
				var w_unit = document.getElementById("water_unit5").value;
				if(w_unit==0){
					var p_water = water;
				}else{
					var total_water_unit = w_unit-ex_w_unit;
					var p_water = total_water_unit*water_rate;
					$("#water_bill5").attr('value',p_water);
				}
				var total_unit =  elec_unit-ex_unit;
				var result = total_unit * elec_rate;
				
				var total_amount = (rent*1) + (result) + (p_water*1) ;
				
				$("#elec_bill5").attr('value',result);
				$("#total5").attr('value',total_amount);
}
function calculate6(){
	var ex_unit = document.getElementById("ex_elec_unit6").value;
				var rent = document.getElementById("rent_fee6").value;
				var elec_unit = document.getElementById("elec_unit6").value;
				var water = document.getElementById("water_bill6").value;
				
				
				var ex_w_unit = document.getElementById("ex_water_unit6").value;
				var w_unit = document.getElementById("water_unit6").value;
				if(w_unit==0){
					var p_water = water;
				}else{
					var total_water_unit = w_unit-ex_w_unit;
					var p_water = total_water_unit*water_rate;
					$("#water_bill6").attr('value',p_water);
				}
				var total_unit =  elec_unit-ex_unit;
				var result = total_unit * elec_rate;
				
				var total_amount = (rent*1) + (result) + (p_water*1) ;
				
				$("#elec_bill6").attr('value',result);
				$("#total6").attr('value',total_amount);
}
function calculate7(){
	var ex_unit = document.getElementById("ex_elec_unit7").value;
				var rent = document.getElementById("rent_fee7").value;
				var elec_unit = document.getElementById("elec_unit7").value;
				var water = document.getElementById("water_bill7").value;
				
				
				var ex_w_unit = document.getElementById("ex_water_unit7").value;
				var w_unit = document.getElementById("water_unit7").value;
				if(w_unit==0){
					var p_water = water;
				}else{
					var total_water_unit = w_unit-ex_w_unit;
					var p_water = total_water_unit*water_rate;
					$("#water_bill7").attr('value',p_water);
				}
				var total_unit =  elec_unit-ex_unit;
				var result = total_unit * elec_rate;
				
				var total_amount = (rent*1) + (result) + (p_water*1) ;
				
				$("#elec_bill7").attr('value',result);
				$("#total7").attr('value',total_amount);
}
function calculate8(){
	var ex_unit = document.getElementById("ex_elec_unit8").value;
				var rent = document.getElementById("rent_fee8").value;
				var elec_unit = document.getElementById("elec_unit8").value;
				var water = document.getElementById("water_bill8").value;
				
				
				var ex_w_unit = document.getElementById("ex_water_unit8").value;
				var w_unit = document.getElementById("water_unit8").value;
				if(w_unit==0){
					var p_water = water;
				}else{
					var total_water_unit = w_unit-ex_w_unit;
					var p_water = total_water_unit*water_rate;
					$("#water_bill8").attr('value',p_water);
				}
				var total_unit =  elec_unit-ex_unit;
				var result = total_unit * elec_rate;
				
				var total_amount = (rent*1) + (result) + (p_water*1) ;
				
				$("#elec_bill8").attr('value',result);
				$("#total8").attr('value',total_amount);
}
function calculate9(){
	var ex_unit = document.getElementById("ex_elec_unit9").value;
				var rent = document.getElementById("rent_fee9").value;
				var elec_unit = document.getElementById("elec_unit9").value;
				var water = document.getElementById("water_bill9").value;
				
				
				var ex_w_unit = document.getElementById("ex_water_unit9").value;
				var w_unit = document.getElementById("water_unit9").value;
				if(w_unit==0){
					var p_water = water;
				}else{
					var total_water_unit = w_unit-ex_w_unit;
					var p_water = total_water_unit*water_rate;
					$("#water_bill9").attr('value',p_water);
				}
				var total_unit =  elec_unit-ex_unit;
				var result = total_unit * elec_rate;
				
				var total_amount = (rent*1) + (result) + (p_water*1) ;
				
				$("#elec_bill9").attr('value',result);
				$("#total9").attr('value',total_amount);
}
function calculate10(){
	var ex_unit = document.getElementById("ex_elec_unit10").value;
				var rent = document.getElementById("rent_fee10").value;
				var elec_unit = document.getElementById("elec_unit10").value;
				var water = document.getElementById("water_bill10").value;
				
				
				var ex_w_unit = document.getElementById("ex_water_unit10").value;
				var w_unit = document.getElementById("water_unit10").value;
				if(w_unit==0){
					var p_water = water;
				}else{
					var total_water_unit = w_unit-ex_w_unit;
					var p_water = total_water_unit*water_rate;
					$("#water_bill10").attr('value',p_water);
				}
				var total_unit =  elec_unit-ex_unit;
				var result = total_unit * elec_rate;
				
				var total_amount = (rent*1) + (result) + (p_water*1) ;
				
				$("#elec_bill10").attr('value',result);
				$("#total10").attr('value',total_amount);
}
		/*$('#elec_unit1').bind('input', function()  {
		    
				var ex_unit = document.getElementById("ex_elec_unit1").value;
				var rent = document.getElementById("rent_fee1").value;
				var elec_unit = document.getElementById("elec_unit1").value;
				var water = document.getElementById("water_bill1").value;
				
				var p_water = water+0;
				var total_unit =  elec_unit-ex_unit;
				var result = total_unit * 4;
				
				var total_amount = (rent*1) + (result) + (p_water*1) ;
				
				$("#elec_bill1").attr('value',result);
				$("#total1").attr('value',total_amount);
		}); 
		*/

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