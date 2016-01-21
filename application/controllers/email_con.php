<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Email_con extends CI_Controller{
		function __construct()
			{
				parent::__construct();
				$this->load->model('House_model');
				$this->load->model('House_type_model');
				$this->load->model('Lease_model');
				$this->load->model('Customer_model');
				$this->load->model('Invoice_model');
				$this->load->helper('load_controller');
				if($this->session->userdata('logged_in')==NULL){
				redirect('login_con','refresh');	}
			}
			
		function invoice_email(){
			
			$ci = get_instance();
			$ci->load->library('email');
			$config['protocol'] = "smtp";
			$config['smtp_host'] = "ssl://smtp.gmail.com";
			$config['smtp_port'] = "465";
			$config['smtp_user'] = "mr.pangseen@gmail.com"; 
			$config['smtp_pass'] = "mypuf&5m";
			$config['charset'] = "utf-8";
			$config['mailtype'] = "html";
			$config['newline'] = "\r\n";

			$ci->email->initialize($config);

			$ci->email->from('service_house@gmail.com','Service House Long Stay');
			$list = array('boomer_saw@hotmail.com','im_supawadee@hotmail.com');
			$ci->email->to($list);
			$this->email->reply_to('my-email@gmail.com', 'Explendid Videos');
			$ci->email->subject('This is an email test');
			$ci->email->message('Hello, This is a test email from "Service House Long Stay System"');
			$ci->email->send();

		}
		function test($data){
			print_r($data);
			$this->load->view('blank');
			
		}
		
}