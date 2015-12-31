<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders_admin extends MY_Controller{
    public function index(){
    //Параметры представления
    $this->setData('title','Заказы');

        //Вызов отображений
    $this->load->view('admin/common/header',$this->data);
    $this->load->view('admin/orders',$this->data);
    $this->load->view('admin/common/footer');
    }
}
?>