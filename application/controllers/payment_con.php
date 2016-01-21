<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Payment_con extends CI_Controller{
		function __construct()
			{
				parent::__construct();
		 		$this->load->model('house_model');
				$this->load->model('Customer_model');
				$this->load->model('Invoice_model');
				$this->load->model('payment_model');
				$this->load->helper('load_controller');
				if($this->session->userdata('logged_in')==NULL){
				redirect('login_con','refresh');	}
			}
			
			public function index(){
				$this->load->view('payment-detail');
			}
			function pay(){
			
				$invoice_id  =  $this->input->post('invoice_id');
				$total  =  $this->input->post('total');
				$note  =  $this->input->post('note');
				$status=2;
				
				$data=array(
					'invoice_status'=>$status,
				);	
				$this->Invoice_model->update($data,$invoice_id);
				$today=date('Y-m-d');
				$session_data = $this->session->userdata('logged_in');
				$payment=array(
					'pay_id'=>$invoice_id,
					'invoice_id'=>$invoice_id,
					'pay_date'=>$today,
					'note'=>$note,
					'pay_amount'=>$total,
					'p_user_id'=>$session_data['user_id']
				);
				
				$this->payment_model->insert_payment($payment);
				$data = $this->payment_model->select_id($invoice_id);
				$this->load->view('receipt_bill',$data);
				
			}
			function view_reciept(){
				$invoice_id = $this->uri->segment(3);
				
				$data = $this->payment_model->select_id($invoice_id);
				
				$this->load->view('receipt_bill',$data);
			}
			function pay_history(){
				/*$invoice_id = $this->uri->segment(3);
				
				$data = $this->payment_model->select_id($invoice_id);*/
				
				$this->load->view('payment-history');
			}
}