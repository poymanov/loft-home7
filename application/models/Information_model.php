<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Information_model extends CI_Model {

	public function get_information($name) {
		$query = $this->db->get_where('information',array('name'=>$name));
		return $query->row_array();
	}
}