<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Invoice_con extends CI_Controller{
		function __construct()
			{
				parent::__construct();
				$this->load->model('House_model');
				$this->load->model('House_type_model');
				$this->load->model('Lease_model');
				$this->load->model('Customer_model');
				$this->load->model('Invoice_model');
				$this->load->model('Utility_model');
				$this->load->helper('load_controller');
				$this->load->library('encrypt');
				$this->load->library('pagination');
				if($this->session->userdata('logged_in')==NULL){
				redirect('login_con','refresh');	}
			}
			
		public function generate_invoice(){
			$data = $this->Lease_model->select_last_id();
			$start = $data['start'];
			$end = $data['end'];
			
			$m_count =  (int)abs((strtotime($start) - strtotime($end))/(60*60*24*30));
			
			
			$lease_id = $data['lease_id'];
			
			$t = explode('-',$start); //Separate Day($t[2])-Month($t[1])-Year($t[0])
			//Calculate month and year to add
			for($i=1;$i<$m_count;$i++){
			
				if($i<10){
					$invoice_id = $lease_id."0".$i;
				}else{
					$invoice_id = $lease_id.$i;
				}
				$year=$t[0];
				$month= $t[1];
				$monthAdd=$i;
				
				$year += floor($monthAdd/12);
				$monthAdd = $monthAdd%12;
				$month += $monthAdd;
				if($month> 12) {
				   $year ++;
				    $month = $month % 12;
				    if($month === 0)
				       $month= 12;
				}
			
				$time = strtotime($year."-".$month."-".$t[2]);

				$newformat = date('Y-m-d',$time);
				
				
				$info = array(
					'invoice_id'=>$invoice_id,
					'in_issue_date'=> $newformat,
					'in_lease_id'=> $data['lease_id'],
					'in_house_id'=>$data['house_id']
					);
				$this->Invoice_model->insert_payment($info);
				
			}//end for loop
				
		}
		function view_invoice()
			{	$invoice_id = $this->uri->segment(3);
				$id = $this->encrypt->decode($invoice_id);
				$data = $this->Invoice_model->select_id($id);
				if($data!=NULL){
					$this->load->view('invoice_bill',$data);
				}else{
					$this->load->view('blank');
				}
				
			}
		function edit_invoice($offset = 0)
			{	
			$limit=10;
			$results = $this->Invoice_model->search_edit($limit,$offset);
			$data['invoices'] = $results['rows'];
			$data['num_results'] = $results['num_rows'];
			//Unit old
			foreach($data['invoices'] as $invoice){
			
			$unit=$this->Invoice_model->check_unit($invoice->in_issue_date,$invoice->in_house_id);
				if($unit!=NULL){
					
				
					if($unit['electric_unit']!=NULL){
						$invoice->unit=$unit['electric_unit'];
					}
					if($unit['water_unit']!=NULL){
						$invoice->w_unit=$unit['water_unit'];
					}
				}else{
					$invoice->w_unit=0;
					$invoice->unit=0;
				}
			}
			$rate = $this->Utility_model->select_rate();
			$data['rate']=$rate;
			
			//pagination
			$config=array();
			$config['base_url']=site_url('menu_con/payment');
			$config['total_rows']=$data['num_results'];
			$config['per_page']=$limit;
			$config['uri_segment']=3;
			
			$this->pagination->initialize($config);
			$data['pagination']= $this->pagination->create_links();
			$this->load->view('invoice_edit',$data);
			}
		function view_invoice_inside(){
			$invoice_id = $this->uri->segment(3);
			
			$data = $this->Invoice_model->select_id($invoice_id);
				if($data!=NULL){
					//select rate
					$data['rate'] = $this->Utility_model->select_rate();
					
					//calculate deadline
					$adate = date($data['in_issue_date']);	
					$pay_date =date("Y-m-d",strtotime("+7 days",strtotime($adate)));
					$unit=$this->Invoice_model->check_unit($data['in_issue_date'],$data['in_house_id']);
						if($unit!=NULL){
							$data['used']['water_use'] = $data['water_unit'] - $unit['water_unit'];
							$data['used']['elec_use'] = $data['electric_unit']-$unit['electric_unit'];
						}else{
							$data['used']['water_use'] = $data['water_unit'];
							$data['used']['elec_use'] = $data['electric_unit'];
						}
			
					//Send data to view
					$this->load->view('invoice_bill',$data);
					
				}else{
					load_controller('menu_con','index');
				}
		}
		function update_only(){
				
			$check = $this->input->post('invoice_id1');
				if($check==NULL){
					echo '<script language="javascript">';
					echo 'alert("No invoice !!")';
					echo '</script>';
				}else{
					
				//Loop for every box.
				for($i = 1; $i <= 10; $i++){
				$invoice_id  =  $this->input->post('invoice_id'.$i);
				$water_unit  =  $this->input->post('water_unit'.$i);
				$water_bill  =  $this->input->post('water_bill'.$i);
				$elec_unit  =  $this->input->post('elec_unit'.$i);
				$elec_bill  =  $this->input->post('elec_bill'.$i);
				$rent_fee  =  $this->input->post('rent_fee'.$i);
				$total  =  $this->input->post('total'.$i);
			
					$data = array(
						
						'water_unit'=>$water_unit,
						'water_bill'=>$water_bill,
						'electric_unit'=>$elec_unit,
						'electric_bill'=>$elec_bill,
						'in_rent_fee'=>$rent_fee,
						'total_amount'=>$total,
						
						
					);
					//Check that invoice_id is Null or Not.
						if($invoice_id!=NULL){
							
							
							$this->Invoice_model->update($data,$invoice_id);
							
						}
				
					}//end for
				}//end if
				load_controller('invoice_con','edit_invoice');
				
		}
		function update_all()
			{	$check = $this->input->post('invoice_id1');
				if($check==NULL){
					echo '<script language="javascript">';
					echo 'alert("No invoice !!")';
					echo '</script>';
				}else{
					
				//Loop for every box.
				for($i = 1; $i <= 10; $i++){
				$invoice_id  =  $this->input->post('invoice_id'.$i);
				$water_unit  =  $this->input->post('water_unit'.$i);
				$water_bill  =  $this->input->post('water_bill'.$i);
				$elec_unit  =  $this->input->post('elec_unit'.$i);
				$elec_bill  =  $this->input->post('elec_bill'.$i);
				$rent_fee  =  $this->input->post('rent_fee'.$i);
				$total  =  $this->input->post('total'.$i);
				$status = 1 ;
					$data = array(
						
						'water_unit'=>$water_unit,
						'water_bill'=>$water_bill,
						'electric_unit'=>$elec_unit,
						'electric_bill'=>$elec_bill,
						'in_rent_fee'=>$rent_fee,
						'total_amount'=>$total,
						'invoice_status'=>$status
						
					);
					//Check that invoice_id is Null or Not.
						if($invoice_id!=NULL){
							
							
							$this->Invoice_model->update($data,$invoice_id);
							$this->invoice_email($invoice_id);
						}
				
				}//end for
				}//end if
				load_controller('menu_con','invoice');
			}
			
		function invoice_email($invoice_id){
			
			$data=$this->Invoice_model->select_id($invoice_id);
			$unit=$this->Invoice_model->check_unit($data['in_issue_date'],$data['in_house_id']);
			if($unit!=NULL){
				$water_use = $data['water_unit'] - $unit['water_unit'];
				$elec_use = $data['electric_unit']-$unit['electric_unit'];
			}else{
				$water_use = $data['water_unit'];
				$elec_use = $data['electric_unit'];
			}
			
			//email setting
			$ci = get_instance();
			$ci->load->library('email');
			$config['protocol'] = "smtp";
			$config['smtp_host'] = "ssl://smtp.gmail.com";
			$config['smtp_port'] = "465";
			$config['smtp_user'] = "khaolak.longstay@gmail.com"; 
			$config['smtp_pass'] = "kono159753";
			$config['charset'] = "utf-8";
			$config['mailtype'] = "html";
			$config['newline'] = "\r\n";
			//encrypt id
			$id= $this->encrypt->encode($invoice_id);
			
			//select rate
			$rate = $this->Utility_model->select_rate();
			
			//calculate deadline
			$adate = date($data['in_issue_date']);	
			$pay_date =date("Y-m-d",strtotime("+7 days",strtotime($adate)));
			//mail
			$ci->email->initialize($config);
			$ci->email->from('khaolak.longstay@gmail.com','Service House Long Stay');
			//$list = array();
			$ci->email->to($data['email']);
			$this->email->reply_to('my-email@gmail.com', 'Explendid Videos');
			$ci->email->subject('Dear '.$data['customer_name'].'');
			/*('Dear, '.$data['customer_name'].' <br /> This is your invoice for '.$data['in_issue_date'].
			' please click the link to see invoice detail. '.
			'<a href="http://localhost/service-house/invoice_con/view_invoice/'.$id.'">CLICK </a>'
			);*/
			$ci->email->message('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Invoice - ใบแจ้งหนี้</title>

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
	font-size: 14px;
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
	font-size: 16px;
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
   
</head>
<body style="zoom:200%;margin:none;">

      <table width="600" border="0" cellspacing="0" cellpadding="0" align="center">
    
  <tbody>
 
  <tr class="doc16">
  
     </tr>
  <tr>
  	<td style="color:#CCC">______________________________________________</td>
    <td style="color:#CCC">______________________________________________</td>
  </tr>
</tbody>

</table>

<table width="600"  align="center">
  <tr>
    <td width="149" align="left" class="doc16">Invoice No. (ใบแจ้งหนี้ เลขที่) :</td>
    <td width="120" class="doc16"><div style="position:absolute; left: 195px; top: 109px;">'.$data['invoice_id'].'</div></td>
    <td width="158" class="doc16"> Issue Date (วันที่ออกใบแจ้งหนี้) :</td>
    <td width="153" class="doc16"><div style="position:absolute; left: 485px; top: 108px;">'.$data['in_issue_date'].'</div></td>
    
  </tr>
</table>

 <table width="600"  align="center">
  <tr>
    <td width="148" class="doc16" > House Name (ชื่อบ้าน) :</td>
    <td width="440" class="doc16"><div style="position:absolute; left: 194px; top: 137px;">'.$data['house_name'].'</div></td>
    
  </tr>
</table>

<table width="600"  align="center">
  <tr>
    <td width="148" align="right" class="doc16"> Lessee (ชื่อผู้เช่า) :</td>
    <td width="440" class="doc16"><div style="position:absolute; left: 194px; top: 167px;">'.$data['customer_name'].'</div></td>
    
  </tr>
</table>

<table width="600"  align="center">
  <tr>
    <td width="147" align="right" class="doc16">Address (ที่อยู่) :</td>
    <td width="441" class="doc16"><div style="position:absolute; left: 194px; top: 197px;">'. $data['house_address'].'</div></td>
    
  </tr>
</table> <br />


<table width="600" align="center" bordercolor="#CCC" cellspacing="0" cellpadding="0" style="margin:auto;border-style: solid;
border-width:1px"  >
  <tr class="doc16" bgcolor="#E2E2E2" >
    <td width="226" height="28" align="center">Description (รายการ)</td>
    <td width="122" align="center">Quantity(จำนวนหน่วย)</td>
    <td width="118" align="center">Unit(ราคาต่อหน่วย)</td>
    <td width="132" align="center">Amount(จำนวนเงิน)/ Baht</td>
  </tr>
</table>

<table width="600" align="center"  cellspacing="0" cellpadding="0" style="margin:auto"  >
  <tr class="doc16">
    <td width="225" height="28">&nbsp;&nbsp;<div style="position:absolute; left: 54px; top: 280px; width: 123px;">Rental fee&nbsp;(ค่าเช่าบ้าน)</div></td>
    <td width="123" align="center">&nbsp;</td>
    <td width="119" align="center">&nbsp;</td>
    <td width="131" align="center"><div style="position:absolute; left: 559px; top: 280px; width: 32px;">'. $data['in_rent_fee'].'</div></td>
</tr>

 <tr class="doc16">
    <td width="225" height="28">&nbsp;&nbsp;<div style="position:absolute; left: 53px; top: 304px; width: 101px;">Electric bill&nbsp;(ค่าไฟ)</div></td>
    <td width="123" align="center"><div style="position:absolute; left: 53px; top: 329px; width: 81px;">'.$elec_use.'</div></td>
    <td width="119" align="center"><div style="position:absolute; left: 309px; top: 303px; width: 24px;">'.$rate['electric_rate'].'</div></td>
    <td width="131" align="center"><div style="position:absolute; left: 559px; top: 305px; width: 32px;">'. $data['electric_bill'].'</div></td>
</tr>

<tr class="doc16">
    <td width="225" height="28">&nbsp;&nbsp;<div style="position:absolute; left: 441px; top: 304px; width: 101px;">Water bill&nbsp;(ค่าน้ำ)</div></td>
    <td width="123" align="center"><div style="position:absolute; left: 309px; top: 330px; width: 25px;">'.$water_use.'</div></td>
    <td width="119" align="center"><div style="position:absolute; left: 436px; top: 331px; width: 25px;">'.$rate['water_rate'].'</div></td>
    <td width="131" align="center"><div style="position:absolute; left: 559px; top: 330px; width: 32px;">'.$data['water_bill'].'</div></td>
</tr>


</table>


<hr width="598" align="center" size="1px" color="#CCC">
<table width="600" align="center"  cellspacing="0" cellpadding="0" style="margin:auto"  >
  <tr class="doc16">
    <td width="314" height="28">&nbsp;&nbsp;</td>
    
    <td width="164" align="right">Total (รวมเงิน) :</td>
    <td width="120" align="center"><div style="position:absolute; left: 559px; top: 372px; width: 32px;">'. $data['total_amount'].'</div></td>
  </tr>
 
</table>

<hr width="598" align="center" size="1px" color="#CCC">
<table width="600" align="center"  cellspacing="0" cellpadding="0" style="margin:auto"  >
<tr class="doc16">
    <td width="63" height="28">&nbsp;&nbsp; Remark :</td>				
	
     <td width="535" height="28">**&nbsp;&nbsp;Please pay before&nbsp; : '.$pay_date.'</td>
    
    
  </tr>
</table>

<br />
</body></html>');
			$ci->email->send();

		}
			
}