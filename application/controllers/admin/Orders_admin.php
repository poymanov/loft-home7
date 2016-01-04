<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders_admin extends MY_Controller{
    private $sql = "SELECT
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
    INNER JOIN payments_methods ON payments_methods.id = orders.payment";

    public function index(){
    //Параметры представления
    $this->setData('title','Заказы');

    //Вывод всех заказов
    $this->sql .= ' ORDER BY orders.id';
    $this->setData ('orders',$this->MY_model->get($this->sql));

    //Вызов отображений
    $this->load->view('admin/common/header',$this->data);
    $this->load->view('admin/orders',$this->data);
    $this->load->view('admin/common/footer');
    }
    public function editorder() {

    $id = $this->input->get('id');
    //Получение данных о заказе для редактирования
    $this->sql .= " WHERE orders.id = $id";
    $this->setData ('orders',$this->MY_model->get($this->sql));

    //Получение состава заказа
    $sql2 = "SELECT
    products.h1 as tovarName,
    orders_content.count,
    orders_content.price,
    orders_content.order_id
    FROM
    orders_content
    INNER JOIN products ON orders_content.product_id = products.id
    WHERE order_id = $id";

    $this->setData ('orders_content',$this->MY_model->get($sql2));

    //Параметры представления
    $this->setData('title',"Заказ № $id");
    //Вызов отображений
    $this->load->view('admin/common/header',$this->data);
    $this->load->view('admin/ordersDetail',$this->data);
    $this->load->view('admin/common/footer');
    }
}
?>