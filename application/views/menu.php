
<style type="text/css">
	.font li{
	font-size:19px;
	font:Arial, Helvetica, sans-serif;
		}
		
</style>
	<?php $session_data= $this->session->userdata('logged_in'); ?>
	<div class="font">
	<div style="margin-top:7px"><div style="background-color:#fff">
    
   			 <ul  class="nav nav-tabs nav-stacked">
  				<li class="active" ><a href="#"><i ><img src="<?php echo pathResource;?>img/menu-list.png" width="29" height="29"/></i>&nbsp;&nbsp;Main Menu</a></li>
                <li ><a href="<?php echo base_url();?>menu_con/index"><i ><img src="<?php echo pathResource;?>img/arrow.png" /></i>&nbsp;&nbsp;Home</a></li>
			  	<li><a href="<?php echo base_url();?>menu_con/move_in"><i><img src="<?php echo pathResource;?>img/arrow.png"  /></i>&nbsp;&nbsp;&nbsp;Move-in</a></li>
  				<li><a href="<?php echo base_url();?>menu_con/move_out"><img src="<?php echo pathResource;?>img/arrow.png"/></i>&nbsp;&nbsp;&nbsp;Move-out</a></li>
                <li><a href="<?php echo base_url();?>menu_con/payment"><img src="<?php echo pathResource;?>img/arrow.png"/></i>&nbsp;&nbsp;&nbsp;Payment</a></li>
                <li><a href="<?php echo base_url();?>menu_con/invoice"><img src="<?php echo pathResource;?>img/arrow.png"/></i>&nbsp;&nbsp;&nbsp;Invoice</a></li>
                
				<li><a href="<?php echo base_url();?>menu_con/history"><img src="<?php echo pathResource;?>img/arrow.png"/></i>&nbsp;&nbsp;&nbsp;History</a></li>
              	
			    <li><a href="<?php echo base_url();?>menu_con/report"><img src="<?php echo pathResource;?>img/arrow.png"/></i>&nbsp;&nbsp;&nbsp;Report</a></li>
             </ul>
                </div>
    

             <?php if($session_data['priority']=="Admin" || $session_data['priority']=="Manager") { ?>
            <ul class="nav nav-tabs nav-stacked">
  				<li class="active"><a href="#"><img src="<?php echo pathResource;?>img/setting.png" width="27" height="27"/></i>&nbsp;&nbsp;&nbsp;Management Menu</a></li>
  				
				<li><a href="<?php echo base_url();?>menu_con/house_manage"><img src="<?php echo pathResource;?>img/arrow.png"/></i>&nbsp;&nbsp;&nbsp;House Management</a></li>
  				
				<li><a href="<?php echo base_url();?>menu_con/expense"><img src="<?php echo pathResource;?>img/arrow.png"/></i></i>&nbsp;&nbsp;&nbsp;Miscellaneous Expense</a></li>
                
				<li><a href="<?php echo base_url();?>menu_con/customer_manage"><img src="<?php echo pathResource;?>img/arrow.png"/></i>&nbsp;&nbsp;&nbsp;Customer Management</a></li>
              	 <?php if($session_data['priority']=="Admin") { ?>
				<li><a href="<?php echo base_url();?>menu_con/member_manage"><img src="<?php echo pathResource;?>img/arrow.png"/></i>&nbsp;&nbsp;&nbsp;Member Management</a></li>
				<?php } ?>
				
   				<li></li>
			</ul>
			<?php } ?>
		<!--	User Panel-->
			<div style="border:outset 1px; height:95px; width:245px; margin-top:0px; margin-left:1px; background-color:#CFC;" >
            <br />
				<div style="width:80;margin-top: -15px; margin-left: 10px; float:left;">
				<?php if($session_data['priority']=="Admin"){ ?>
				<img src="<?php echo pathResource;?>img/icon_admin"/>
				<?php } ?>
				<?php if($session_data['priority']=="Manager"){ ?>
				<img src="<?php echo pathResource;?>img/icon_manager"/>
				<?php } ?>
				<?php if($session_data['priority']=="Staff"){ ?>
				<img src="<?php echo pathResource;?>img/icon_user"/>
				<?php } ?>
			 </div>
				<div style="width:165px; margin-top:-15px; float:right;">
				You are Logged in as : <?php echo $session_data['user_name']; ?><br />
                
				Priority : <?php echo $session_data['priority']; ?><br />
				<a href="<?php echo base_url();?>login_con/logout"><button>Log Out</button></a> <a href="<?php echo base_url();?>user_con/edit_user/<?php echo $session_data['user_id'];?>"><button>Edit Profile</button></a>
				</div>
			</div>



</div>
 
</div>
