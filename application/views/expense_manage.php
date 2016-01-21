<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo isset($title) ? $title : 'Service House Long Stay' ; ?></title>
<link href="<?php echo pathResource;?>css/bootstrap-ie7.css" rel="stylesheet">
<link href="<?php echo pathResource;?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo pathResource;?>css/bootstrap-responsive.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo pathResource;?>css/style.css" type="text/css"/>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo pathResource;?>fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo pathResource;?>fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="<?php echo pathResource;?>fancybox/jquery.easing-1.4.pack.js"></script>
<script type="text/javascript" src="<?php echo pathResource;?>fancybox/jquery.mousewheel-3.0.4.pack.js"></script>

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
  <li class="active">Expense Management</li>
</ul>
 	
 	</div>
    
    
  	<hr style="border-bottom:thin; color:#CCC;margin-top:-22px"/>
 
    

<div>
	<span>*Current Electric Rate = <?php echo $rate['electric_rate']; ?> Baht.</span><br />
	<span>**Current Water Rate = <?php echo $rate['water_rate']; ?> Baht.</span><br />
	<a id="tip5" title="Login" href="#set_rate"><button>Set new Rate</button></a>
	</div>

   

   

    </div>
</div>
	<!--Fancy box insert ultility_cost-->
	<div style="display:none">
		<form id="set_rate" method="post" action="" autocomplete="off">
		    <!--<p id="login_error">Please, enter data</p>
			<p>
				<label for="">Login: </label>
				<input type="text" id="login_name" name="login_name" size="30" />
			</p>
			<p>
				<label for="">Password: </label>
				<input type="password" id="login_pass" name="login_pass" size="30" />
			</p>
			<p>
				<input type="submit" value="Login" />
			</p>
			<p>
			    <em>Leave empty so see resizing</em>
			</p>-->
			<table>
				<tr>
					<td align="right">Water Unit </td>
					<td><input type="text" id="water_unit" name="water_unit" size="2" maxlength="2" /></td>
				</tr>
				<tr>
					<td align="right">Electric Unit </td>
					<td><input type="text"  id="electric_unit" name="electric_unit" size="2" maxlength="2"/></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" value="Submit" /></td>
				</tr>
			</table>
		</form>
	</div>

<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
		$("#set_rate").bind("submit", function() {

			if ($("#login_name").val().length < 1 || $("#login_pass").val().length < 1) {
			    $("#login_error").show();
			    $.fancybox.resize();
			    return false;
			}

			$.fancybox.showActivity();

			

			return false;
		});
		$("#tip5").fancybox({
			'scrolling'		: 'no',
			'titleShow'		: false,
			'onClosed'		: function() {
			    $("#login_error").hide();
			}
		});

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