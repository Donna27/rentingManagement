<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class House_type_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	function insert_type($data)
	{
		$this->db->insert('house_type',$data);
	}
	function select_all($type_id)
	{
		$this->db->select('*');
		$this->db->from('house_type');
		$this->db->where('type_id',$type_id);
		$query = $this->db->get();
		return $query->row_array();
	}
		function search()
	{	//results query
		$q = $this->db->select('*')
			->from('house_type');
			
			
			
		$ret['rows'] = $q->get()->result();
		//count query
		$q = $this->db->select('COUNT(*) as count',FALSE)
			->from('house');
		$tmp = $q->get()->result();
		$ret['num_rows'] = $tmp[0]->count;
		return $ret;
	}
	function select_mis()
	{
		$this->db->select('*');
		$this->db->from('house_type');		
		$query = $this->db->get();
		return $query->result_array();
	}
	function update($data,$id){
		$this->db->where('type_id',$id);
		$this->db->update('house_type',$data);
		
	}
		
}