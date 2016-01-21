<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_con extends CI_Controller{
		function __construct()
	{
		parent::__construct();
		
		
		$this->load->helper('load_controller');
		$this->load->helper(array('form', 'url'));
		$this->load->model('user_model');
		
		$this->load->helper('url');		
		$this->load->helper(array('form'));	
		
	}
	public function index()
	{	
	$this->view_login();

	}
	
	public function view_login()
	{	$error = "";
		
		$data = array(
		
		'error' => $error
		);
		$this->load->view('login_form',$data);
		//$this->load->view('login_form',$data);
	}
	
	public function view_error($data){
		$this->load->view('login_form',$data);
	
	}
	public function verifylogin(){
   
	   $this->load->library('form_validation');
	   $this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
	   $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean|callback_check_database');
	   //$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required');

		   if($this->form_validation->run() == FALSE)
		   {
		     
		   //  $this->load->view('login_form');
		   $error = "<li>Username or Password is Not Valid</li>";
		   $data = array(
		   'error' => $error
		   );
		  	 
			$this->view_error($data);
		   //$this->load->view('home_control/view_error',$error);
				   
		   
		   }
		   else
		   {
		  
		   load_controller('menu_con','index');
		   }

		 }
	
	function check_database($password)
 	{  
   $username = $this->input->post('username'); 
   $result = $this->user_model->login($username,$password);
   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'user_id' => $row->user_id,
         'username' => $row->username,
		 'user_name'=>$row->user_name,
		 'priority'=>$row->priority
		
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
	public function home()
 {
 	
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
	 $data['user_id'] = $session_data['user_id'];
	 $user_id = $data['user_id'];
	// $username = $data['username'];
		//$priority = $this->user_model->select_priority($username);
	$list = $this->user_model->select_id($user_id);
	$user = array(
	 //'priority' => $priority,
	 'list' => $list,
	 'data' => $data );
		
		//print_r($priority); 
		//print_r($list); 
	
	 if($list['priority']== "administrator")
   {	
		$this->load->view('admin_view',$user);
		}	
	
 	if($list['priority'] == "staff")
   {
  	
		$this->load->view('staff_view',$user);

		}
	if($list['priority'] == "manager")
   {
  	
		$this->load->view('manager_view',$user);

		}
	if($list['priority'] != "administrator" AND $list['priority'] != "staff" AND $list['priority'] != "manager")
   {
  	
		//redirect('login_control/view_login', 'refresh');
		
		 $error = "<li>Priority is not true !!!</li>";
   $data = array(
   'error' => $error
   );
  	
	$this->view_error($data);

		}
		
	}
  
   else
   {
     redirect('login_con/view_login', 'refresh');
	//$this->view_login($user);
   }
 }
	  public function logout()
	 {
	   $this->session->unset_userdata('logged_in');
	   
	   redirect(base_url(), 'refresh');
	   
	   
	 }
	 function forget_password(){
	 	$email  =  $this->input->post('email');
		
		$data=$this->user_model->forget_pass($email);
	 	
		if($data==NULL){
			echo '<script language="javascript">';
			echo 'alert("Email invalid !!")';
			echo '</script>';
			$this->view_login();
		}else{
			$this->view_login();
			//send mail
			$ci = get_instance();
			$ci->load->library('email');
			$config['protocol'] = "smtp";
			$config['smtp_host'] = "ssl://smtp.gmail.com";
			$config['smtp_port'] = "465";
			$config['smtp_user'] = "khaolak.longstay@gmail.com"; 
			$config['smtp_pass'] = "kono159753";
			$config['charset'] = "utf-8";
			$config['mailtype'] = "html";
			$config['newline'] = "\r\n";
			
			$ci->email->initialize($config);
			$ci->email->from('khaolak.longstay@gmail.com','Service House Long Stay');
			//$list = array();
			$ci->email->to($email);
			$this->email->reply_to('my-email@gmail.com', 'Explendid Videos');
			$ci->email->subject('Service House Recovery Password');
			$ci->email->message('
			Dear, '.$data['0']['user_name'].'. <br/><br/>
			This is your password for use in Service House Long Stay System. <br/><br/>
			Password : '.$data['0']['password'].'<br/><br/>
			
			Please keep your password secret.			
			
			<br/>
			Best regards.
			
			');
			$ci->email->send();
			
		}
	 }


 }
	
	
	
	
	
	
	
	
	
	
	
	
