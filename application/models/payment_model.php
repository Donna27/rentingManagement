<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	function insert_payment($data)
	{
		$this->db->insert('payment',$data);
	}
	function select_all()
	{
		$this->db->select('*');
		$this->db->from('payment');
		$this->db->order_by('invoice_id','DESC');
		$query = $this->db->get();
		return $query->row_array();
	}
	function select_id($id)
	{
		$this->db->select('*');
		$this->db->from('payment');
		$this->db->join('invoice','payment.invoice_id=invoice.invoice_id');
		$this->db->join('lease','invoice.in_lease_id=lease.lease_id');
		$this->db->join('house','lease.l_house_id=house.house_id');
		$this->db->join('user','payment.p_user_id=user.user_id');
		$this->db->join('customer','lease.l_cus_id=customer.cus_id');
		$this->db->where('pay_id',$id);
		$query = $this->db->get();
		return $query->row_array();
	}
}