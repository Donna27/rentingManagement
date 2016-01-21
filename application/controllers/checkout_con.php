<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Checkout_con extends CI_Controller{
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
			}
			
		public function move_out(){
			$lease_id = $this->uri->segment(3);
			$house_id = $this->uri->segment(4);
			$this->Lease_model->check_out($lease_id);
			$this->house_model->house_check_out($house_id);
			$this->Invoice_model->invoice_check_out();
			load_controller('menu_con','move_out');
		}
		
}