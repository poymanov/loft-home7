<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_Model extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }
    public function get_all($tableName) {
        $query = $this->db->get($tableName);
        return $query->result_array();
    }
    public function del($id,$tableName) {
        $this->db->delete($tableName,array('id'=>$id));
    }
    public function getOnen($id,$tableName) {
        $query = $this->db->get_where($tableName, array('id' => $id));
        return $query->result_array();
    }
    public function update($id,$data,$tableName) {
        $this->db->where('id', $id);
        $this->db->update($tableName, $data);
    }
}

