<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activation extends MY_Controller {

	public function index($code){

        //Активируем аккаунт
        $this->load->model('reg_model');
       $this->setData('msg',$this->reg_model->activation_user($code));

        //Дополнительные метаданные
        $this->setData('title','Активация аккаунта');
        $this->setData('meta_keywords','Активация аккаунта');
        $this->setData('meta_description','Активация аккаунта');

        //Контент страницы
        $this->setData('h1','Активация аккаунта');
        $this->setData('text','Активация аккаунта');

        //Вызов базовых отображений
        $this->load->view('common/header',$this->data);
        $this->load->view('common/main_menu',$this->data);

        //Формирование хлебных крошек для страницы
        $breadcrumbs = array();
        $breadcrumbs[] = array(
            'href' => '/',
            'name' => 'Главная'
        );
        $breadcrumbs[] = array(
            'href' => '',
            'name' => 'Активация аккаунта'
        );
        $this->setData('breadcrumbs',$breadcrumbs);

        //Вызов основного отображения
        $this->load->view('activation',$this->data);

        $this->load->view('common/footer',$this->data);
    }
}