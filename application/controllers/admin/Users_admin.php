<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_admin extends MY_Controller{

    public function index(){

        //Подгружаем модель пользователей
        $this->load->model('users_model');

        //Удаление пользователя
        $action = $this->input->get('action');
        if ($action === 'deluser'){
           $id = $this->input->get('id');
           $this->users_model->deleteUser($id);
           $this->setData('title', 'Пользователи сайта');
           $this->setData ('message',"<div class='alert alert-success'> Сообщение: Пользователь № ".$id." успешно удален с сайта.</div>");
            //Параметры представления
            $this->setData('title', 'Удаление пользователя');
           //Вызов отображений
           $this->load->view('admin/common/header',$this->data);
            $this->load->view('admin/massege.php',$this->data);
           $this->load->view('admin/common/footer');
        }
        else {
            //Параметры представления
            $this->setData('title', 'Пользователи сайта');
            $this->setData ('users',$this->users_model->get_allUsers());
            //Вызов отображений
            $this->load->view('admin/common/header',$this->data);
            $this->load->view('admin/users',$this->data);
            $this->load->view('admin/common/footer');
        }
;

    }

    public function edituser() {
        $this->setData('title', 'Изменение данных пользователя');
        //Подгружаем модель пользователей
        $this->load->model('users_model');

        $submit = $this->input->post('submit');


        if ((isset($submit))){
            $id = $this->input->get('id');
            $name = $this->input->post('name');
            $lastname = $this->input->post('lastname');
            $tel = $this->input->post('tel');
            $email = $this->input->post('email');
            $users_group = $this->input->post('users_group');
            $is_activated = $this->input->post('is_activated');
            $data = array(
                'name' => $name,
                'lastname' => $lastname,
                'tel' => $tel,
                'email' => $email,
                'users_group' => $users_group,
                'is_activated' => $is_activated );

            $this->users_model->updateUser($id,$data);
            $this->setData ('message',"<div class='alert alert-success'> Сообщение: Данные пользователь № ".$id." успешно изменены.</div>");
            //Вызов отображений
            $this->load->view('admin/common/header',$this->data);
            $this->load->view('admin/massege.php',$this->data);
            $this->load->view('admin/common/footer');
        }
        else {
            $id = $this->input->get('id');
            $this->setData ('user',$this->users_model->getOnenUser($id));
            //Вызов отображений
            $this->load->view('admin/common/header',$this->data);
            $this->load->view('admin/edituser',$this->data);
            $this->load->view('admin/common/footer');
        }




    }
}
