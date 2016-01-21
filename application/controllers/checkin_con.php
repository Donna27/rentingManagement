<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Checkin_con extends CI_Controller{
		function __construct()
			{
				parent::__construct();
				$this->load->model('house_model');
				$this->load->model('Customer_model');
				$this->load->model('Lease_model');
				$this->load->model('payment_model');
				$this->load->model('House_type_model');
				$this->load->model('Utility_model');
				$this->load->helper('load_controller');
				if($this->session->userdata('logged_in')==NULL){
				redirect('login_con','refresh');	}
			}
			public function index(){
				$data['house_id'] = $this->uri->segment(3);
				
				$check = $this->house_model->select_id($data['house_id']);
				if($check['house_status']!=0){
					load_controller('menu_con','move_in');
				}else{			
				$result = $this->house_model->select_id($data['house_id']);
				$result['house_id'] = $data['house_id'];
				$this->load->view('check-in-customer',$result);
				}
				
			}
		
			public function select_customer(){
				$this->load->view('check-in-select-cus');
			}
			public function checkin_customer(){
				
				$name  =  $this->input->post('cus_name');
				$birthdate  =  $this->input->post('birthdate');
				$passport_id  =  $this->input->post('passport');
				$address  =  $this->input->post('address');
				$province  =  $this->input->post('province');
				$zipcode  =  $this->input->post('zipcode');
				$country  =  $this->input->post('country');
				$phone  =  $this->input->post('phone');
				$email  =  $this->input->post('email');
				$data  =  array(
						'customer_name' =>$name,
						'birthdate' =>$birthdate,
						'passport_number' =>$passport_id,
						'address' =>$address,
						'province' =>$province,
						'zipcode' =>$zipcode,
						'country' =>$country,
						'phone' =>$phone,
						'email' =>$email
						
							);
			
				
					$this->Customer_model->insert_customer($data);
					
					$result = $this->Customer_model->select_last_id();
					
					$cus_id = $result['cus_id'];
					$house_id = $this->input->post('txthouseid');
					$date = date('Y-m-d');
					$chk_in  =  $this->input->post('txtstart');
					$chk_out  =  $this->input->post('txtend');
					$deposit  =  $this->input->post('txtdeposit');
					
					$session_data = $this->session->userdata('logged_in');
					
					$last_id = $this->Lease_model->check_id();
					$lease_id= date('ym').'01';
					while($last_id['lease_id']>=$lease_id){					
					$lease_id = $lease_id+1;
					}
					$data = array(
							'lease_id'=>$lease_id,
							'l_house_id' =>$house_id,
							'start' =>$chk_in,
							'end' =>$chk_out,	
							'l_cus_id' =>$cus_id,
							'issue_date'=>$date,
							'deposit'=>$deposit,
							'l_user_id'=>$session_data['user_id']
							
							);
					$this->Lease_model->insert($data);
					
					
					
					$data['house_status']= 1;
					$data['house_id']=$house_id;
					$this->house_model->update_status($data);
					
					load_controller('invoice_con','generate_invoice');
					
					$data = $this->Lease_model->select_last_id();
					
					$this->load->view('check-in-result',$data);
				
				//$this->load->view('check-in-detail');
				
				
			}
			
			public function result(){
				$this->load->view('check-in-result');
			}
			public function lease_agreement(){
				$id = $this->uri->segment(3);
				$data = $this->Lease_model->select_by_id($id);
				$data['utility']=$this->Utility_model->select_rate();
				//print_r ($data);
				$this->load->view('lease_agreement',$data);
				
				
				
			}
}