<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_con extends CI_Controller{
		function __construct()
			{
				parent::__construct();
				$this->load->model('User_model');
				
				$this->load->helper('load_controller');
				if($this->session->userdata('logged_in')==NULL){
				redirect('login_con','refresh');	}
			}
		
		
		function edit_user()
			{	$data['user_id'] = $this->uri->segment(3);
				
				$results = $this->User_model->select_id($data['user_id']);
				$this->load->view('user_edit',$results);
			
			}
		function update()
			{	$data['user_id'] = $this->input->post('txtuserid');
				$data['username']=$this->input->post('txtusername');
				$data['password']=$this->input->post('txtpassword');
				$comfirmpassword = $this->input->Post('txtConPassword');
				$data['user_name']=$this->input->post('txtname');
				$data['email']=$this->input->post('txtemail');
				
				$data['phone']=$this->input->post('txtphone');
				$data['priority']=$this->input->post('txtpriority');
					
				$this->User_model->update($data);
					
			
				load_controller('menu_con','member_manage');
			}
		function delete_user()
			{
				$data['user_id'] = $this->uri->segment(3);
			
				$this->User_model->delete($data['user_id']);
				
			
				load_controller('menu_con','member_manage');
			
			}
		
}