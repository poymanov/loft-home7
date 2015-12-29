<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_admin extends MY_Controller{

    public function index(){

        //Параметры представления
        $this->setData('title', 'Панель управления сайтом');

        //Вызов отображений
        $this->load->view('admin/common/header',$this->data);
        $this->load->view('admin/index',$this->data);
        $this->load->view('admin/common/footer',$this->data);
    }
}