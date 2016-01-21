<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	 class Index_con extends CI_Controller{
	 	function __construct()
			{
				parent::__construct();
				$this->load->helper('load_controller');
				if($this->session->userdata('logged_in')==NULL){
				redirect('login_con','refresh');	}
			}
			
		public function index()
			{
				
			 load_controller('Login_con','index');
			}
	 }