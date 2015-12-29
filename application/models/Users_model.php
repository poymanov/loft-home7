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
        $query = "DELETE FROM users WHERE id = $id";
        $this->db->query($query);
    }
}
?>