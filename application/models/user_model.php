<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class User_model extends CI_Model 
{	
	function __construct() {
		parent::__construct();
	}
	function insert($data)
	{
		$this->db->insert('user',$data);
	}
	function search($limit,$offset)
	{	//results query
		$q = $this->db->select('*')
			->from('user')
			
			->limit($limit,$offset);
			
		$ret['rows'] = $q->get()->result();
		//count query
		$q = $this->db->select('COUNT(*) as count',FALSE)
			->from('user');
		$tmp = $q->get()->result();
		$ret['num_rows'] = $tmp[0]->count;
		return $ret;
	}
	function select_user_remote($username)
 	{
		 $this -> db -> select('*');
   		 $this -> db -> from('user');
  		 $this -> db -> where('username',$username);
  		 $query = $this -> db -> get();
  		
		if($query -> num_rows() == 1)
   			{
     			 return $query->result();
   			}
   		else
	   		{
	     			 return false;
	   		}
 	}
	function login($username, $password)
	{
		 $this -> db -> select('*');
		 $this -> db -> from('user');
		 $this -> db -> where('username',$username);
		 $this -> db -> where('password',$password);
		 $this -> db -> limit(1);
		 $query = $this -> db -> get();
		 if($query -> num_rows() == 1)
		 {
		     return $query->result();
		 }
		 else
		 {
		 return false;
	 	 }
	}
	 function select_id($id)
	 {
	   $this -> db -> select('*');
	   $this -> db -> from('user');
	   $this -> db -> where('user_id',$id);
	   $query = $this -> db -> get();
	   return $query->row_array();
	  }
	  
	  function select_priority($username)
	{  
		$this->db->select('priority');
	    $this->db->from('user');
	    $this->db-> where('username',$username);
	    $query = $this->db->get();
	    return $query->row_array();	
	}
	function select_all_user()
	 {
	   $this -> db -> select('*');
	   $this -> db -> from('user');
	   $query = $this -> db -> get();
	   return $query->result_array();
	  }
	  function delete($user_id){
		$this->db->where('user_id',$user_id);
		$this->db->delete('user');
		
		}
		function update($data){
		$this->db->where('user_id',$data['user_id']);
		$this->db->update('user',$data);
		
		}
		function forget_pass($email){
			$this -> db -> select('*');
		   	$this -> db -> from('user');
			$this -> db -> where('email',$email);
		   	$query = $this -> db -> get();
		   	return $query->result_array();
		}
}
	//public function email_exists(){
  //  $email = $this->input->post('email');
  //  $query = $this->db->query("SELECT email, password FROM users WHERE email='$email'");    
  //  if($row = $query->row()){
       // return TRUE;
  //  }else{
       // return FALSE;
   // }
 //}
		//public function temp_reset_password($temp_pass){
   // $data =array(
   //             'email' =>$this->input->post('email'),
                //'reset_pass'=>$temp_pass);
              //  $email = $data['email'];

    //if($data){
    //    $this->db->where('email', $email);
     //   $this->db->update('users', $data);  
     //   return TRUE;
   // }else{
       // return FALSE;
    //}

//}
		//public function is_temp_pass_valid($temp_pass){
    //$this->db->where('reset_pass', $temp_pass);
   // $query = $this->db->get('users');
   // if($query->num_rows() == 1){
    //    return TRUE;
  //  }else{
	// return FALSE;
//}
//}