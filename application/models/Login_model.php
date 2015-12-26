<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	//Создание нового пользователя
	public function password_check($email,$password) {

		//1) Находим пользователя по email
        $query = $this->db->select('id,password')->get_where('users',array('email'=>$email));
        $result = $query->row_array();
        
        //2) Сравниваем текущий введный пароль и хэш из базы
        if(password_verify($password,$result['password'])) {
            return $result['id'];
        } else {
            return false;
        }
	}
}