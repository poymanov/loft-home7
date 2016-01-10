<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_Model extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }
    //Запрос
    public function get($sql) {
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    //Ввывод всех данных из таблицы
    public function get_all($tableName) {
        $query = $this->db->get($tableName);
        return $query->result_array();
    }
    //Удаление строки из таблицы по ID
    public function del($id,$tableName) {
        $this->db->delete($tableName,array('id'=>$id));
    }
    //Получение данных по ID
    public function getWhere($id,$tableName) {
        $query = $this->db->get_where($tableName, array('id' => $id));
        return $query->row_array();
    }
    //Изменение данных по ID
    public function update($id,$data,$tableName) {
        $this->db->where('id', $id);
        $this->db->update($tableName, $data);
    }

}

