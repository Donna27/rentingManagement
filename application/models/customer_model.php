<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	function insert_customer($data)
	{
		$this->db->insert('customer',$data);
	}
	function delete($cus_id){
		$this->db->where('cus_id',$cus_id);
		$this->db->delete('customer');
		
	}
	function select_last_id()
	{
		$this->db->select('*');
		$this->db->from('customer');
		$this->db->order_by('cus_id','DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row_array();
	}

	function select_all($cus_id)
	{
		$this->db->select('*');
		$this->db->from('customer');
		$this->db->where('cus_id',$cus_id);
		$query = $this->db->get();
		return $query->row_array();
	}
	function search($limit,$offset)
	{	//results query
		$q = $this->db->select('*')
			->from('customer')
			
			->limit($limit,$offset);
			
		$ret['rows'] = $q->get()->result();
		//count query
		$q = $this->db->select('COUNT(*) as count',FALSE)
			->from('customer');
		$tmp = $q->get()->result();
		$ret['num_rows'] = $tmp[0]->count;
		return $ret;
	}
}