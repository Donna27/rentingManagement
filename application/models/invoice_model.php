<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invoice_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	function insert_payment($data)
	{
		$this->db->insert('invoice',$data);
	}
	function update($data,$id){
		$this->db->where('invoice_id', $id);
		$this->db->update('invoice', $data); 
	}
	function select_all()
	{
		$this->db->select('*');
		$this->db->from('invoice');
		$this->db->order_by('invoice_id','DESC');
		$query = $this->db->get();
		return $query->row_array();
	}
	function select_by_rent_id()
	{
		$this->db->select('*');
		$this->db->from('invoice');
		
		$query = $this->db->get();
		return $query->row_array();
	}
	function search_payment($limit,$offset)
	{	$invoice_status = 1;
		
		//results query
		$q = $this->db->select('*')
			->from('invoice')			
			->join('lease','invoice.in_lease_id=lease.lease_id')
			->join('customer','lease.l_cus_id=customer.cus_id')
			->where('invoice.invoice_status',$invoice_status)
			->limit($limit,$offset);
			
		$ret['rows'] = $q->get()->result();
		//count query
		$q = $this->db->select('COUNT(*) as count',FALSE)
			->from('invoice')
			->join('lease','lease.lease_id=invoice.in_lease_id')
			->join('customer','lease.l_cus_id=customer.cus_id')
			->where('invoice.invoice_status',$invoice_status);
		$tmp = $q->get()->result();
		$ret['num_rows'] = $tmp[0]->count;
		return $ret;
	}
	function search_edit($limit,$offset)
	{	$invoice_status = 1;
		
		//results query
		$q = $this->db->select('*')
			->from('invoice')
			->join('house','invoice.in_house_id=house.house_id')
			->join('house_type','house_type.type_id=house.type_id')
			->where('invoice_status',$invoice_status)
			->limit($limit,$offset);
			
		$ret['rows'] = $q->get()->result();
		//count query
		$q = $this->db->select('COUNT(*) as count',FALSE)
			->from('invoice')
			->where('invoice_status',$invoice_status);
		$tmp = $q->get()->result();
		$ret['num_rows'] = $tmp[0]->count;
		return $ret;
	}
	function search_invoice($data,$issue_date)
	{	$invoice_status = 0;
		
		//results query
		$q = $this->db->select('*')
			->from('invoice')
			->join('house','invoice.in_house_id=house.house_id')
			->join('house_type','house_type.type_id=house.type_id')
			->where('invoice_status',$invoice_status)
			->where('in_issue_date',$issue_date)
			->order_by('in_issue_date','ASC')
			->limit($data['limit'],$data['offset']);
			
		$ret['rows'] = $q->get()->result();
		//count query
		$q = $this->db->select('COUNT(*) as count',FALSE)
			->from('invoice')			
			->where('invoice_status',$invoice_status)
			->where('in_issue_date',$issue_date);
		//	->order_by('issue_date','ASC');
		$tmp = $q->get()->result();
		$ret['num_rows'] = $tmp[0]->count;
		return $ret;
	}
	function check_unit($data,$id)
	{	
		//results query
		$q = $this->db->select('*')
			->from('invoice')			
			->where('in_house_id',$id)			
			->where('in_issue_date <',$data)			
			->limit(1);
		
		$q = $this->db->get();	
		return $q->row_array();
		
	}
	function select_id($id)
	{
		$this->db->select('*');
		$this->db->from('invoice');
		$this->db->join('lease','invoice.in_lease_id=lease.lease_id');
		$this->db->join('customer','customer.cus_id=lease.l_cus_id');
		$this->db->join('house','invoice.in_house_id=house.house_id');
		$this->db->join('house_type','house_type.type_id=house.type_id');
		$this->db->where('invoice_id',$id);
		$query = $this->db->get();
		return $query->row_array();
	}
	function invoice_check_out($id)
	{	$data=2;
		//results query
		$q = $this->db->select('*')
			->from('invoice')			
			->where('in_lease_id',$id)			
			->where('invoice_status <',$data)			
			->limit(1);
		
		$q = $this->db->get();	
		return $q->row_array();
		
	}
	function select_invoice_id($in_lease_id)
	{
			$this->db->select('*');
			$this->db->from('invoice');
			$this->db->where('in_lease_id',$in_lease_id);
			$query = $this->db->get();
			return $query->result_array();
	}
	function close($id){
		$data['invoice_status']=3;
		$this->db->where('in_lease_id', $id);
		$this->db->update('invoice', $data); 
	}
}