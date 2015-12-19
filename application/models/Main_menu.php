<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_menu extends CI_Model {

	public function get_menu() {
		$query = $this->db->select('name,h1')->get('information');
		return $query->result_array();
	}
}