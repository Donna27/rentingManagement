<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rental_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	function insert_rental($data)
	{
		$this->db->insert('rental',$data);
	}
	function select_rent_detail($rent_id)
	{
		$this->db->select('*');
		$this->db->from('rental');
		$this->db->where('rent_id',$rent_id);		
		$query = $this->db->get();
		return $query->row_array();
	}
	function select_last_id()
	{
		$this->db->select('rent_id');
		$this->db->from('rental');
		$this->db->order_by('rent_id','DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row_array();
	}
	
}