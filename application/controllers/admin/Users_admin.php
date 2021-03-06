<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_admin extends MY_Controller{

    public function index(){

        //Удаление пользователя
        $action = $this->input->get('action');
        if ($action === 'deluser'){
           $id = $this->input->get('id');
           $this->MY_model->del($id,'users');
           $this->setData('title', 'Пользователи сайта');
           $this->setData ('message',"<div class='alert alert-success'> Сообщение: Пользователь № ".$id." успешно удален с сайта.</div>");
            //Страница для перенаправления
            $this->setData ('url','/admin/users/');
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

            //Вывод всех пользователей
            $sql = "SELECT
            users.id,
            users.name,
            users.lastname,
            users.tel,
            users.email,
            users.password,
            users.date_reg,
            users.is_activated,
            users.users_group,
            users_groups.name as groupUser
            FROM
            users
            INNER JOIN users_groups ON users_groups.id = users.users_group";

            //Вывод всех пользователей
            $this->setData ('users',$this->MY_model->get($sql));

            //Вызов отображений
            $this->load->view('admin/common/header',$this->data);
            $this->load->view('admin/users',$this->data);
            $this->load->view('admin/common/footer');
        }
;

    }

    public function edituser() {
        $this->setData('title', 'Изменение данных пользователя');
        $submit = $this->input->post('submit');

        //Правила для валидации формы
        $rules = array(
            array(
                'field'=>'name',
                'label'=>'Имя',
                'rules'=>'required|alpha'
            ),
            array(
                'field'=>'lastname',
                'label'=>'Фамилия',
                'rules'=>'required|alpha'
            ),
            array(
                'field'=>'tel',
                'label'=>'Телефон',
                'rules'=>'required|numeric'
            ),
            array(
                'field'=>'email',
                'label'=>'email',
                'rules'=>'required|valid_email'
            ),
        );
        $this->form_validation->set_rules($rules);
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>", '</div>');

        if ($this->form_validation->run() == TRUE){

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

            $this->MY_model->update($id,$data,'users');
            //Сообщение о успешной оперпции
            $this->setData ('message',"<div class='alert alert-success'> Сообщение: Данные пользователь № ".$id." успешно изменены.</div>");
            //Страница для перенаправления
            $this->setData ('url','/admin/users/');
            //Вызов отображений
            $this->load->view('admin/common/header',$this->data);
            $this->load->view('admin/massege.php',$this->data);
            $this->load->view('admin/common/footer');
        }
        else {
            $id = $this->input->get('id');
            $this->setData ('user',$this->MY_model->getWhere($id,'users'));
            //Все группы пользователей
            $this->setData ('allUsers_groups',$this->MY_model->get_all('users_groups'));
            //Вызов отображений
            $this->load->view('admin/common/header',$this->data);
            $this->load->view('admin/edituser',$this->data);
            $this->load->view('admin/common/footer');
        }




    }
}
