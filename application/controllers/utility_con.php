<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Utility_con extends CI_Controller{
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
		function add_utility(){
				$water  =  $this->input->post('water');
				$elec  =  $this->input->post('electric');
				
				$date = date('Y-m-d');
				$data=array(
					'water_rate' =>$water,
					'electric_rate' =>$elec,
					'date_edit'=>$date
				);
				$this->Utility_model->insert_utility($data);
				load_controller('menu_con','expense');
				
		}
}