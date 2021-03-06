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

        $submit = $this->input->post('submit');
        $id = $this->input->get('id');

        //Параметры представления
        $this->setData('title',"Заказ № $id");

        if ((isset($submit))){
            $status = $this->input->post('status');
            $delivery = $this->input->post('delivery');
            $payments = $this->input->post('payments');

            $data = array(
                'id' => $id,
                'status' => $status,
                'delivery' => $delivery,
                'payment' => $payments);

            $this->MY_model->update($id,$data,'orders');
            //Сообщение о успешной оперпции
            $this->setData ('message',"<div class='alert alert-success'> Сообщение: Данные заказа № ".$id." успешно изменены.</div>");
            //Страница для перенаправления
            $this->setData ('url','/admin/orders/');

            //Вызов отображений
            $this->load->view('admin/common/header',$this->data);
            $this->load->view('admin/massege.php',$this->data);
            $this->load->view('admin/common/footer');
        }
        else {

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

            //Все статусы заказов
            $this->setData ('allSatus',$this->MY_model->get_all('orders_status'));
            //Все способы доставки
            $this->setData ('allDelivery_methods',$this->MY_model->get_all('delivery_methods'));
            //Все способы оплаты
            $this->setData ('allPayments_methods',$this->MY_model->get_all('payments_methods'));

            //Вызов отображений
            $this->load->view('admin/common/header',$this->data);
            $this->load->view('admin/ordersDetail',$this->data);
            $this->load->view('admin/common/footer');
        }
    }
}
?>