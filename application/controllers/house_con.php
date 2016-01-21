<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class House_con extends CI_Controller{
		function __construct()
			{
				parent::__construct();
				$this->load->model('House_model');
				$this->load->model('House_type_model');
				$this->load->helper('load_controller');
				
				if($this->session->userdata('logged_in')==NULL){
				redirect('login_con','refresh');	}
			}
		function add()
			{
			$results = $this->House_type_model->search(20);
			
			$data['types'] = $results['rows'];
			$data['num_results'] = $results['num_rows'];
			$this->load->view('house_add_view',$data);
			}
		function insert_house()
			{
				$name  =  $this->input->post('housename');
				$address  =  $this->input->post('houseaddress');
				$type_id  =  $this->input->post('type_id');
				
				$data = array(
					'house_name' =>$name,
					'house_address' =>$address,
					'type_id' =>$type_id
				);
				
			$check_name = $this->House_model->check_house_name($data['house_name']);
			
			if($check_name==FALSE){
			
			$this->House_model->insert_house($data);
			
			$this->load->view('blank');
			load_controller('menu_con','house_manage');
			
			}
			else{
			echo '<script language="javascript">';
			echo 'alert("ชื่อบ้านซ้ำ กรุณาดำเนินการใหม่ !!")';
			echo '</script>';
			$results = $this->House_type_model->search(20);
			
			$data['types'] = $results['rows'];
			$data['num_results'] = $results['num_rows'];
			$this->load->view('house_add_view',$data);
			}
			
			
			}
		function edit_view(){
			$id = $this->uri->segment(3);
			$data=$this->House_model->select_id($id);
			$data['house_type'] = $this->House_type_model->search($data['type_id']);
			$results = $this->House_type_model->search(20);
			$data['types'] = $results['rows'];
			
			$this->load->view('house_edit',$data);
			}
		function edit_house()
			{	
				$id = $this->uri->segment(3);
				$name  =  $this->input->post('name');
				$address  =  $this->input->post('address');
				$type_id  =  $this->input->post('type_id');
				
				$data=array(
					'house_name'=>$name,
					'house_address'=>$address,
					'type_id'=>$type_id
				);
				$this->House_model->update($data,$id);
			
			
			}
		function delete_house()
			{
				$data['house_id'] = $this->uri->segment(3);
			
				$this->House_model->delete($data['house_id']);
				
				echo '<script language="javascript">';
				echo 'alert("House Deleted !!")';
				echo '</script>';
			
				$this->load->view('blank');
				
			
				load_controller('menu_con','house_manage');
			}
		function type_edit(){
				$id  =  $this->input->post('id');
				$t_name  =  $this->input->post('type_name');
				$rent_fee  =  $this->input->post('rent_fee');
				
				$data=array(
					'type_name' => $t_name,
					'rent_fee' =>$rent_fee,
				);
				$this->House_type_model->update($data,$id);
				load_controller('menu_con','expense');
		}
		function add_type()
			{
				$t_name  =  $this->input->post('type_name');
				$rent_fee  =  $this->input->post('rent_fee');
				$date = date('Y-m-d');
				$data=array(
					'type_name' => $t_name,
					'rent_fee' =>$rent_fee,
					'date_edit'=>$date
				);
				$this->House_type_model->insert_type($data);
				load_controller('menu_con','expense');
			}
}