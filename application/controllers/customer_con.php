<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Customer_con extends CI_Controller{
		function __construct()
			{
				parent::__construct();
				
				$this->load->model('Customer_model');
				$this->load->helper('load_controller');
				if($this->session->userdata('logged_in')==NULL){
				redirect('login_con','refresh');	}
			}
			
		function delete_user()
			{
				$data['cus_id'] = $this->uri->segment(3);
			
				$this->Customer_model->delete($data['cus_id']);
				
				echo '<script language="javascript">';
				echo 'alert("Customer Deleted !!")';
				echo '</script>';
			
				$this->load->view('blank');
				
			
				load_controller('menu_con','customer_manage');
			}
}