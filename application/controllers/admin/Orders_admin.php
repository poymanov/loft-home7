<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders_admin extends MY_Controller{
    public function index(){
    //Параметры представления
    $this->setData('title','Заказы');

    //Вывод всех заказов
    $sql = "SELECT
    orders.id,
    orders.date_reg,
    orders.date_update,
    users.name,
    users.lastname,
    orders_status.name as status,
    delivery_methods.name as delivery,
    payments_methods.name as payments
    FROM
    orders
    INNER JOIN users ON users.id = orders.user_id
    INNER JOIN orders_status ON orders_status.id = orders.status
    INNER JOIN delivery_methods ON delivery_methods.id = orders.delivery
    INNER JOIN payments_methods ON payments_methods.id = orders.payment ORDER BY orders.id";

    //Вывод всех заказов
    $this->setData ('orders',$this->MY_model->get($sql));
    //Вызов отображений
    $this->load->view('admin/common/header',$this->data);
    $this->load->view('admin/orders',$this->data);
    $this->load->view('admin/common/footer');
    }
}
?>