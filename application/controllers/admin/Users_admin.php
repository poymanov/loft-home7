<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_admin extends MY_Controller{

    public function index(){
        //Подгружаем модель получения списка пользователей
        $this->load->model('users_model');
        //Удаление пользователя
        if (isset($_GET['del'])) {
            $id = $_GET['id'];
            $this->users_model->deleteUser($id);
            $this->setData ('message',"<span class='msg-success'> Сообщение: Пользователь № ".$id." успешно удален с сайта.</span>");
            unset($_GET['del']);
        }

        $this->setData ('users',$this->users_model->get_allUsers());
        //Параметры представления
        $this->setData('title', 'Пользователи сайта');

        //Вызов отображений
        $this->load->view('admin/common/header',$this->data);
        $this->load->view('admin/users',$this->data);
        $this->load->view('admin/common/footer');

    }
}