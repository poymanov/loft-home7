<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_admin extends MY_Controller{

    public function index() {
        //Параметры представления
        $this->setData('title', 'Категории каталога');
        //Вызов отображений
        $this->load->view('admin/common/header',$this->data);
        $this->load->view('admin/category',$this->data);
        $this->load->view('admin/common/footer');
    }

} 