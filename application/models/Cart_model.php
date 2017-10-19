<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends CI_Model {
		
	function __construct() {
		parent::__construct();
		
	}
	
	function get_addressbook() {
		$query = $this->db->get('addressbook');
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return FALSE;
		}
	}

	function get_items_list( $selectedItems = array() ) {
		$this->db->select('id, it_name, it_price, it_weight');
		$this->db->where('deleted', '0');
		if(!empty($selectedItems)){
			$this->db->where_in('id', $selectedItems);
			$this->db->order_by('it_weight', 'ASC');
		}
		
		$query = $this->db->get('items');
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return FALSE;
		}
	}
	
	
	function get_assigned(){ // LOCAL - HOSTING
		$query = $this->db->query('SELECT
  `Emp_Code` AS emp_code,
  `Emp_Name` AS emp_name,
  `Designation` AS emp_des,
  `Client` AS `client`
FROM
  TEAM_INFORMATION
WHERE CLIENT IN ("YTLC","MOE")
  AND `Status` IN ("In Service")
ORDER BY Projects DESC');
	
		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return FALSE;
		}
	}
	
	
	
}
/*END OF FILE*/
