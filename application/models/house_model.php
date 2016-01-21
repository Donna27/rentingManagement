<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class House_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	function insert_house($data)
	{
		$this->db->insert('house',$data);
	}
	function select_id($house_id)
	{
		$this->db->select('*');
		$this->db->from('house');
		$this->db->join('house_type','house_type.type_id=house.type_id');
		$this->db->where('house_id',$house_id);
		$query = $this->db->get();
		return $query->row_array();
	}
	function search($limit,$offset)
	{	//results query
		$q = $this->db->select('*')
			->from('house')
			->join('house_type','house_type.type_id=house.type_id')
			->limit($limit,$offset);
			
		$ret['rows'] = $q->get()->result();
		//count query
		$q = $this->db->select('COUNT(*) as count',FALSE)
			->from('house');
		$tmp = $q->get()->result();
		$ret['num_rows'] = $tmp[0]->count;
		return $ret;
	}
	function search_available()
	{	//results query
		$q = $this->db->select('*')
			->from('house')
			->join('house_type','house_type.type_id=house.type_id')
			->order_by('house_status','ASC');
			
			
			
		$ret['rows'] = $q->get()->result();
		//count query
		$q = $this->db->select('COUNT(*) as count',FALSE)
			->from('house');
		$tmp = $q->get()->result();
		$ret['num_rows'] = $tmp[0]->count;
		return $ret;
	}
	function delete($house_id){
		$this->db->where('house_id',$house_id);
		$this->db->delete('house');
		
	}
	
	function update_status($data){
		$this->db->set('house_status',$data['house_status']);
		$this->db->where('house_id',$data['house_id']);
		$this->db->update('house');
		
	}
	function check_house_name($data){
		$this->db->select('*');
		$this->db->from('house');
		$this->db->where('house_name',$data);
		$this->db->limit(1);
		$query = $this->db->get();
		
		if($query->num_rows()== 1){
			return TRUE;
		}
		else{
			return FALSE;
		}
		
		
	}
	function house_check_out($data){
		
		$setZero = array(
			'house_status'=>0
		);
		$this->db->where('house_id',$data);
		$this->db->update('house',$setZero);
		
	}
	function update($data,$id){
		
	
		
		$this->db->where('house_id',$id);
		$this->db->update('house',$data);
		
	}
	
	
}