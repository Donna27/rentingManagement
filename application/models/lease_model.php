<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lease_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	function insert($data)
	{
		$this->db->insert('lease',$data);
	}
	function select_all($rent_id)
	{
		$this->db->select('*');
		$this->db->from('lease');
		$this->db->where('rent_id',$rent_id);		
		$query = $this->db->get();
		return $query->row_array();
	}
	function select_last_id()
	{
			$this->db->select('*');
			$this->db->from('lease');
			$this->db->join('customer','lease.l_cus_id=customer.cus_id');
			$this->db->join('house','lease.l_house_id=house.house_id');
			$this->db->join('house_type','house_type.type_id=house.type_id');
			$this->db->order_by('lease_id','DESC');
			$this->db->limit(1);
		$query = $this->db->get();
		return $query->row_array();
	}
	function select_by_id($id)
	{
			$this->db->select('*');
			$this->db->from('lease');
			$this->db->join('customer','lease.l_cus_id=customer.cus_id');
			
			$this->db->join('house','lease.l_house_id=house.house_id');
			$this->db->join('house_type','house_type.type_id=house.type_id');
			$this->db->join('user','lease.l_user_id=user.user_id');
			
			$this->db->where('lease_id',$id);		
			$query = $this->db->get();
			return $query->row_array();
	}
	
	function search_check_out($limit,$offset)
	{	//results query
		$q = $this->db->select('*')
			->from('lease')
			->join('customer','lease.l_cus_id=customer.cus_id')
			->join('house','lease.l_house_id=house.house_id')
			->join('house_type','house_type.type_id=house.type_id')
		//	->join('invoice','lease.lease_id=invoice.in_lease_id')
			->where('lease_status',"1")
			->limit($limit,$offset);
			
			
		$ret['rows'] = $q->get()->result();
		//count query
		$q = $this->db->select('COUNT(*) as count',FALSE)
			->where('lease_status',"1")
			->from('lease');
		$tmp = $q->get()->result();
		$ret['num_rows'] = $tmp[0]->count;
		return $ret;
	}
	function check_id()
	{
			$this->db->select('lease_id');
			$this->db->from('lease');
			$this->db->order_by('lease_id','DESC');
			$this->db->limit(1);
		$query = $this->db->get();
		return $query->row_array();
	}
	function check_out($id){
	
		$setZero['lease_status']=0;
		$this->db->where('lease_id',$id);
		$this->db->update('lease',$setZero);
		
		
	
		/*$this->db->set',0);
		$this->db->from('lease');
		$this->db->where('lease_id',$id);
		$query = $this->db->get();*/
	}
	function select_lease_id($l_house_id)
	{
		$this->db->select('*');
		$this->db->from('lease');
		$this->db->where('l_house_id',$l_house_id);
		$this->db->join('customer','lease.l_cus_id = customer.cus_id');	
		$query = $this->db->get();
		return $query->result_array();
	}
	
	
}