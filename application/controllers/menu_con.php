<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class menu_con extends CI_Controller{
		function __construct()
			{
				parent::__construct();
				$this->load->model('House_model');
				$this->load->model('House_type_model');
				$this->load->model('Invoice_model');
				$this->load->model('Lease_model');
				$this->load->model('User_model');
				$this->load->model('Customer_model');
				$this->load->model('Utility_model');
				$this->load->library('pagination');
				if($this->session->userdata('logged_in')==NULL){
				redirect('login_con','refresh');	}
			}
			
		public function index(){
			$this->load->view('index_view');
		}
		public function move_in(){
			$results = $this->House_model->search_available();
			
			$data['houses'] = $results['rows'];
			$data['num_results'] = $results['num_rows'];
		
			$this->load->view('check-in',$data);
		}
		public function move_out($offset = 0){
			$limit = 10;
			$results = $this->Lease_model->search_check_out($limit,$offset);
			$data['leases'] = $results['rows'];
			$data['num_results'] = $results['num_rows'];
			
			//pagination
			$config=array();
			$config['base_url']=site_url('menu_con/move_out');
			$config['total_rows']=$data['num_results'];
			$config['per_page']=$limit;
			$config['uri_segment']=3;
			
			$this->pagination->initialize($config);
			$data['pagination']= $this->pagination->create_links();
			
			$this->load->view('check-out',$data);
		}
		public function payment($offset = 0){
			$limit=10;
			$results = $this->Invoice_model->search_payment($limit,$offset);
			$data['invoices'] = $results['rows'];
			$data['num_results'] = $results['num_rows'];
			
			//pagination
			$config=array();
			$config['base_url']=site_url('menu_con/payment');
			$config['total_rows']=$data['num_results'];
			$config['per_page']=$limit;
			$config['uri_segment']=3;
			//print_r($data['invoices']);
			$this->pagination->initialize($config);
			$data['pagination']= $this->pagination->create_links();
			$this->load->view('payment-detail',$data);
		}
		public function invoice($offset = 0){
			$limit=10;
			$issue_date= date('Y-m').'-01';
			$perpage = array(
				'limit' =>$limit,
				'offset' =>$offset
			);
			$results = $this->Invoice_model->search_invoice($perpage,$issue_date);
			$data['invoices'] = $results['rows'];
			$data['num_results'] = $results['num_rows'];
			
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
			$config['base_url']=site_url('menu_con/invoice');
			$config['total_rows']=$data['num_results'];
			$config['per_page']=$limit;
			$config['uri_segment']=3;
			//print_r($config['per_page']);
			$this->pagination->initialize($config);
			$data['pagination']= $this->pagination->create_links();
		
			$this->load->view('invoice-index',$data);
		}
		public function history(){
			$results = $this->House_model->search_available();
			
			$data['houses'] = $results['rows'];
			$data['num_results'] = $results['num_rows'];
		
			$this->load->view('history_view',$data);
		}
		public function house_manage($offset = 0){
			$limit=10;
			$results = $this->House_model->search($limit,$offset);
			
			$data['houses'] = $results['rows'];
			$data['num_results'] = $results['num_rows'];
			//pagination
			$config=array();
			$config['base_url']=site_url('menu_con/house_manage');
			$config['total_rows']=$data['num_results'];
			$config['per_page']=$limit;
			$config['uri_segment']=3;
			
			$this->pagination->initialize($config);
			$data['pagination']= $this->pagination->create_links();
			$this->load->view('house_manage_view',$data);
		}
		public function expense(){
			$rate = $this->Utility_model->select_rate();
			$data['rate']=$rate;
			$data['types']=$this->House_type_model->select_mis();
			
		
			$this->load->view('mis_manage',$data);
		
		}
		public function customer_manage($offset = 0){
			$limit=10;
			$results = $this->Customer_model->search($limit,$offset);
			
			$data['users'] = $results['rows'];
			$data['num_results'] = $results['num_rows'];
			//pagination
			$config=array();
			$config['base_url']=site_url('menu_con/customer_manage');
			$config['total_rows']=$data['num_results'];
			$config['per_page']=$limit;
			$config['uri_segment']=3;
			
			$this->pagination->initialize($config);
			$data['pagination']= $this->pagination->create_links();
			$this->load->view('customer_view',$data);
		}
		public function member_manage($offset = 0){
			$limit=10;
			$results = $this->User_model->search($limit,$offset);
			
			$data['users'] = $results['rows'];
			$data['num_results'] = $results['num_rows'];
			//pagination
			$config=array();
			$config['base_url']=site_url('menu_con/member_manage');
			$config['total_rows']=$data['num_results'];
			$config['per_page']=$limit;
			$config['uri_segment']=3;
			
			$this->pagination->initialize($config);
			$data['pagination']= $this->pagination->create_links();
			$this->load->view('user_manage',$data);
		}
		public function report(){
			$this->load->view('index_view');
		}
		public function test_pdf(){
			$this->load->view('lease_agreement');
		}
		
}