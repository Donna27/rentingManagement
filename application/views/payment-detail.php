<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo isset($title) ? $title : 'Service House Long Stay' ; ?></title>

<link href="<?php echo pathResource;?>css/bootstrap-ie7.css" rel="stylesheet">
<link href="<?php echo pathResource;?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo pathResource;?>css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="<?php echo pathResource;?>css/style.css" rel="stylesheet">
<!--facybox method-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo pathResource;?>fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo pathResource;?>fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="<?php echo pathResource;?>fancybox/jquery.easing-1.3.pack.js"></script>
<script type="text/javascript" src="<?php echo pathResource;?>fancybox/jquery.mousewheel-3.0.4.pack.js"></script>

<script type="text/javascript">	
		function fancy_view(id){
			$('#'+id).css('display','block');
			$('#pass_id').attr('value',id);
			//alert(id);
			$.fancybox(
                $('#fancybox_pay').html(),
                {
                    'width'             : 900,
                    'height'            : 1100,
                    'autoScale'         : false,
                    'transitionIn'      : 'none',
                    'transitionOut'     : 'none',
                    'hideOnContentClick': false,
                    'onStart': function () { 
                    }
                 }
            );
			setTimeout(function(){
			//var t = document.getElementById("pass_id").value;;
			$('#'+id).css('display','none');			
			},300);		
			
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
<div ><ul class="breadcrumb">
  <li class="active">Payment</li>
</ul>
 	
	<hr style="border-bottom:thin; color:#CCC;margin-top:-22px"/>
 	</div>
    
    
   
    <br />
    <div><ul class="nav nav-tabs">
  	<li class="active">
    <a href="<?php echo base_url() ?>payment_con/index">ชำระเงินตามใบเเจ้งหนี้</a>
  	</li>
  	<li ><a href="<?php echo base_url() ?>payment_con/pay_history">ประวัติการชำระเงิน</a></li>
  <!--	<li><a href="<?php echo base_url() ?>payment_con/pay_history">ประวัติการชำระเงิน</a></li>-->
	</ul>
</div>
	
    
<br />
<p>&nbsp;&nbsp;Click Select Invoice for Bill</p><br />
<div style=" width:868px; margin-left:22px;border-radius:7px">

    <div>
	<div class="CSSTableGenerator" >
                <table class="table table-bordered" >
                 <thead>
				 <th>Invoice ID</th>
				 <th>Lease ID</th>
				 <th>Issue Date</th>
				 <th>Customer Name</th>
				 <th>Water Bill</th>
				 <th>Electric Bill</th>
				 <th>Total Amount</th>
				 <th>Select</th>
				 </thead>
                 <tbody>
				 
				  <?php foreach($invoices as $invoice): ?>
					<tr>
						<td><?php echo $invoice->invoice_id; ?></td>
						<td><?php echo $invoice->in_lease_id; ?></td>
						<td><?php echo $invoice->in_issue_date; ?></td>
						<td><?php echo $invoice->customer_name; ?></td>
						<td><?php echo $invoice->water_bill; ?></td>
						<td><?php echo $invoice->electric_bill; ?></td>
						<td><?php echo $invoice->total_amount; ?></td>
						<!--<?php echo base_url();?>payment_con/index/<?php echo $invoice->invoice_id;?>-->
						<td><button class="btn btn-success" onclick="fancy_view(<?php echo $invoice->invoice_id; ?>)">Pay</button></td>
					</tr>
					<?php endforeach; ?>
				 </tbody>  
                 
                   
                </table>
        </div>
            <br /><br />


  
</div>
   </div>


		<div style="margin-left:710px" class="">
	  <?php if(strlen($pagination)): ?>
	  
		Pages :<?php echo $pagination; ?>
	  
	  <?php endif; ?>
</div>

</div>

</div>
<!--fancybox start-->

<input type="hidden" id="pass_id"/>
<div id="fancybox_pay">
<?php foreach($invoices as $invoice): ?>
		<div id="<?php echo $invoice->invoice_id; ?>" style="display:none;" >	
			<h3>Payment detail</h3> 
			<form name="add_payment" id="add_payment" method="POST" action="<?php echo base_url();?>payment_con/pay">
				<table>
					<tr>
					<td align="right">Invoice ID : </td><input name="invoice_id" type="hidden" value="<?php echo $invoice->invoice_id; ?>"/>
					<td align="left"><input  type="text" value="<?php echo $invoice->invoice_id; ?>" disabled="true"/></td>
					</tr>
					<tr>
					<td align="right">Lease ID : </td><input name="lease_id" type="hidden" value="<?php echo $invoice->in_lease_id; ?>"/>
					<td align="left"><input type="text" value="<?php echo $invoice->in_lease_id; ?>" disabled="true"/></td>
					</tr>
					<tr>
					<td align="right">Invoice issue date : </td><input name="in_issue_date" type="hidden" value="<?php echo $invoice->in_issue_date;?>"/>
					<td align="left"><input  type="text" value="<?php echo $invoice->in_issue_date; ?>" disabled="true"/></td>
					</tr>
					<tr>
					<td align="right">Water bill : </td><input name="water_bill" type="hidden" value="<?php echo $invoice->water_bill; ?>"/>
					<td align="left"><input  type="text" value="<?php echo $invoice->water_bill; ?>" disabled="true"/></td>
					</tr>
					<tr>
					<td align="right">Electric bill : </td><input name="electric_bill" type="hidden" value="<?php echo $invoice->electric_bill; ?>"/>
					<td align="left"><input type="text" value="<?php echo $invoice->electric_bill; ?>" disabled="true"/></td>
					</tr>
					<tr>
					<td align="right">Total amount : </td><input name="total" type="hidden" value="<?php echo $invoice->total_amount; ?>"/>
					<td align="left"><input type="text" value="<?php echo $invoice->total_amount; ?>" disabled="true"/></td>
					</tr>
					<tr>
					<td align="right">Note : </td>
					<td align="left"><textarea name="note" rows="2" style="resize: none;" ></textarea></td>
					</tr>
				</table>
				<button type="submit">Confirm</button>
				<button type="" >Cancel</button>
			</form>
		</div>
 <?php endforeach; ?>
 </div>
</body>
</html>