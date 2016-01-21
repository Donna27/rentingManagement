<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	 class Register_con extends CI_Controller{
	 	function __construct()
			{
				parent::__construct();
				$this->load->model('user_model');
				
				$this->load->helper(array('form', 'url'));
				$this->load->model('user_model');
				$this->load->helper('load_controller');
				if($this->session->userdata('logged_in')==NULL){
				redirect('login_con','refresh');	}
				
			}
			
	 function index()
			{				
				$this->load->view('register_view');
			}
			
		function getInput()
		{
			
		
			$username=$this->input->post('txtusername');
			$password=$this->input->post('txtpassword');
			$comfirmpassword = $this->input->Post('txtConPassword');
			$name=$this->input->post('txtname');
			$email=$this->input->post('txtemail');
			
			$phone=$this->input->post('txtphone');
			$priority=$this->input->post('txtpriority');
			
				
			$data = array(
					'username'=>$username,
					'password'=>$password,
					'user_name'=>$name,
					'email'=>$email,
					'phone'=>$phone,
					'priority'=>$priority
					);
		$this->user_model->insert($data);
		echo '<script language="javascript">';
		echo 'alert("Successfully Registered!!")';
		echo '</script>';
		load_controller('menu_con','index');
		
		
			}
	 }