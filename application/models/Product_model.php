<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

	public function get_product_data($name) {
	   $query = $this->db->get_where("products",array('name'=>$name));
	   return $query->row_array();
	}


}