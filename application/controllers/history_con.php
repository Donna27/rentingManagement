<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class History_con extends CI_Controller{
		function __construct()
			{
				parent::__construct();
				$this->load->model('house_model');
				$this->load->model('Customer_model');
				$this->load->model('Lease_model');
				$this->load->model('payment_model');
				$this->load->model('House_type_model');
				$this->load->model('invoice_model');
				$this->load->helper('load_controller');
				if($this->session->userdata('logged_in')==NULL){
				redirect('login_con','refresh');	}
				
			}
			public function index(){
				$data['house_id'] = $this->uri->segment(3);
				
				$result = $this->house_model->select_id($data['house_id']);
				$l_house_id = $data['house_id'];
				$lease_house_data = $this->Lease_model->select_lease_id($l_house_id);
				$housename = $result['house_name'];
				if($lease_house_data != array()){
					//print_r($lease_house_data);
					//print_r($result);
					$data = array(
					'housename' => $housename,
					'lease_house_data' => $lease_house_data
					);
					$this->load->view('lease_agreement_view',$data);
				}else{
					echo "<script type=\"text/javascript\">alert('No have Lease agreement.') </script>";
					  load_controller('menu_con','history');
				}
				//$this->load->view('lease_agreement_view',$result);
				
			}
			
			public function view_invoice()
			{
				$in_lease_id = $this->uri->segment(3);
				$invoice_data = $this->invoice_model->select_invoice_id($in_lease_id);
				//print_r($invoice_data);
	
					
					//print_r($result);
					$data = array(
					'invoice_data' => $invoice_data
					);
					$this->load->view('invoic_data_view',$data);
				
			}
}