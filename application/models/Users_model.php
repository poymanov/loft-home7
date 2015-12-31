<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }
    public function get_allUsers() {
        $query = $this->db->get('users');
        return $query->result_array();
    }
    public function deleteUser($id) {
        $this->db->delete('users',array('id'=>$id));
    }
    public function getOnenUser($id) {
        $query = $this->db->get_where('users', array('id' => $id));
        return $query->result_array();
    }
    public function updateUser($id,$data) {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

}
?>