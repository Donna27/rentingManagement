<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utility_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	function select_rate()
	{
		$this->db->select('*');
		$this->db->from('utility_cost');
		$this->db->order_by('utility_id','DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row_array();
	}
	function insert_utility($data){
			$this->db->insert('utility_cost',$data);
	}
}