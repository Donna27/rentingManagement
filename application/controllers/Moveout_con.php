<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Moveout_con extends CI_Controller{
		function __construct()
			{
				parent::__construct();
				$this->load->model('house_model');
				$this->load->model('Customer_model');
				$this->load->model('Lease_model');
				$this->load->model('payment_model');
				$this->load->model('Invoice_model');
				$this->load->model('House_type_model');
				$this->load->helper('load_controller');
				if($this->session->userdata('logged_in')==NULL){
				redirect('login_con','refresh');	}
			}
			
		public function move_out(){
			$lease_id = $this->uri->segment(3);
			$house_id = $this->uri->segment(4);
			
			$check=$this->Invoice_model->invoice_check_out($lease_id);
			if($check!=NULL){
				echo '<script language="javascript">';
				echo 'alert("สัญญานี้ไม่สามารถยกเลิกได้ เนื่องจากยังชำระเงินไม่ครบ !!")';
				echo '</script>';
				load_controller('menu_con','move_out');
				
			}else{
					echo '<script language="javascript">';
				echo 'alert("Success !!")';
				echo '</script>';
			}
			
	/*		$this->Lease_model->check_out($lease_id);
			$this->house_model->house_check_out($house_id);
			$this->Invoice_model->close($lease_id);*/
			
			load_controller('menu_con','move_out');
		}
		
}