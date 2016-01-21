<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Miscellaneous Expense Management</title>

<link href="<?php echo pathResource;?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo pathResource;?>css/bootstrap-responsive.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo pathResource;?>css/style.css" type="text/css"/>
<!--facybox method-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo pathResource;?>fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo pathResource;?>fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="<?php echo pathResource;?>fancybox/jquery.easing-1.3.pack.js"></script>
<script type="text/javascript" src="<?php echo pathResource;?>fancybox/jquery.mousewheel-3.0.4.pack.js"></script>

</head>
<body>
	<div class="header-a"><div class="header"></div></div>
	<div class="content">
   	<div class="content-left">
        <? include("menu.php");?>
     </div>
    
	<div class="content-right">
	<div ><div ><ul class="breadcrumb">
  <li class="active">Miscellaneous Expense Management </li>
 
 
</ul>
 	<hr style="border:0;border-bottom:2px dashed #ABF;margin-top:-20px"/>
 	</div>
    <div class="head-name">Miscellaneous Expense Management</div>
  	<hr style="border-bottom:thin; color:#CCC;margin-top:8px"/>
  	<div style="border:solid 1px #BBB; width:600px; margin-left:170px;border-radius:2px;border-color:#44A2D5" >
  	  
  	  <div>
      <p><img src="<?php echo pathResource;?>img/water.jpg" width="70" height="70" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Water Unit <?php echo $rate['water_rate']; ?>  Baht/Unit</p><br />
      <p><img src="<?php echo pathResource;?>img/electric.jpg" width="70" height="70" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Electric Unit <?php echo $rate['electric_rate']; ?> Baht/Unit</p>
      <br />
	  <p>&nbsp;&nbsp; Last Update : <?php echo $rate['date_edit']; ?></p>
      <p style="margin-left:20px"><button onclick="fancy_view()" class="btn btn-warning">Set new rate</button></p>
      <br />
    </div>
			<div>
			
			</div>

  </div>
    <br /><br />
    
    <div style="border:solid 1px #BBB; width:600px; margin-left:170px;border-radius:2px;border-color:#44A2D5" >

    <div >
		
      <p><img src="<?php echo pathResource;?>img/house_miss.png" width="70" height="70" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;House Type</p>
      <br />
     				<?php foreach($types as $type): ?>
					&nbsp;&nbsp;&nbsp;&nbsp;<font><?php echo $type['type_id']; ?>
					<?php echo $type['type_name']; ?>( <?php echo $type['rent_fee']; ?> Baht) &nbsp;&nbsp;</font> <button class="btn btn-warning" onclick="fancybox_edit_type(<?php echo $type['type_id']; ?>);">Edit</button>
					   <br /><?php endforeach; ?>
      
      <br /><button onclick="fancy_type()" class="btn btn-warning">Add</button>
     
      <br />
	  
    </div>

    </div>

    </div>
</div>
<div id="fancybox_pay" style="display:none">
			<h3>Set Utility Cost</h3> 
			<form name="utility_c" id="utility_c" method="POST" action="<?php echo base_url();?>Utility_con/add_utility">
				<table>
					<tr>
					<td align="right">Water Rate : </td>
					<td align="left"><input name="water" type="number"  /></td>
					</tr>
					<tr>
					<td align="right">Electric Rate : </td>
					<td align="left"><input name="electric" type="number"  /></td>
					</tr>
				
				</table>
				<button type="submit">Confirm</button>
				<button type="" >Cancel</button>
			</form>
 </div>
 <div id="fancybox_edit_type">
 <?php foreach($types as $type): ?>
 		<div id="<?php echo $type['type_id']; ?>" style="display:none;" >
		<h3>Edit House Type</h3>	
			<form autocomplete="off" name="type_edit" id="type_edit" method="POST" action="<?php echo base_url();?>house_con/type_edit">
				<table>
					<tr>
					<td align="right">Type</td><input name="id" value="<?php echo $type['type_id']; ?>" type="hidden" />
					<td align="left"><textarea style="resize:none" name="type_name"><?php echo $type['type_name']; ?></textarea>
					</td>
					</tr>
					<tr>
					<td align="right">Rent Fee</td>
					<td align="left"><input name="rent_fee" type="text" value="<?php echo $type['rent_fee']; ?>" /></td>
					</tr>
					<tr>
					<td colspan="2" align="center"><button type="submit">Submit</button></td>
					
					</tr>
					
					
				
				</table>
			
			</form>
		</div>
 <?php endforeach; ?>
</div>
<div id="fancybox_type" style="display:none">
			<h3>Set House Type</h3> 
			<form autocomplete="off" name="utility_c" id="utility_c" method="POST" action="<?php echo base_url();?>house_con/add_type">
				<table>
					<tr>
					<td align="right">Type Name : </td>
					<td align="left"><textarea style="resize:none" name="type_name"></textarea></td>
					</tr>
					<tr>
					<td align="right">Rent Fee: </td>
					<td align="left"><input name="rent_fee" type="number"  /></td>
					</tr>
				
				</table>
				<button type="submit">Confirm</button>
				<button type="" >Cancel</button>
			</form>
 </div>
<!--<script src="<?php echo pathResource;?>js/jquery.js"></script> -->
<script src="<?php echo pathResource;?>js/bootstrap.min.js"></script>
<script type="text/javascript">
		function fancy_view(){
		
			
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
		}
		function fancybox_edit_type(id){
			$('#'+id).css('display','block');
			$('#pass_id').attr('value',id);
			
			$.fancybox(
                $('#fancybox_edit_type').html(),
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
            );setTimeout(function(){
			//var t = document.getElementById("pass_id").value;;
			$('#'+id).css('display','none');			
			},300);	
		}
		function fancy_type(){
		
			
			$.fancybox(
                $('#fancybox_type').html(),
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