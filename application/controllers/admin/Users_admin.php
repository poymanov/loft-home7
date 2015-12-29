<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_admin extends MY_Controller{

    public function index(){
        //Параметры представления
        $this->setData('title', 'Пользователи сайта');
        //Подгружаем модель пользователей
        $this->load->model('users_model');

        //Удаление пользователя
        $action = $this->input->get('action');
        if ($action === 'deluser'){
           $id = $this->input->get('id');
           $this->users_model->deleteUser($id);
           $this->setData ('message',"<span class='msg-success'> Сообщение: Пользователь № ".$id." успешно удален с сайта.</span>");
        }
        $this->setData ('users',$this->users_model->get_allUsers());
        //Вызов отображений
        $this->load->view('admin/common/header',$this->data);
        $this->load->view('admin/users',$this->data);
        $this->load->view('admin/common/footer');

    }

    public function edituser() {
        //Параметры представления
        $this->setData('title', 'Изменение данных пользователя');
        //Подгружаем модель пользователей
        $this->load->model('users_model');
        $id = $this->input->get('id');

        $this->setData ('user',$this->users_model->getOnenUser($id));
        //Вызов отображений
        $this->load->view('admin/common/header',$this->data);
        $this->load->view('admin/edituser',$this->data);
        $this->load->view('admin/common/footer');
    }
}
