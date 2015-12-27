<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends CI_Model {

    //Получение способов доставки
	public function get_delivery_methods() {
        $query = $this->db->get('delivery_methods');
        return $query->result_array();
	}

    //Получение способов оплаты
    public function get_payments_methods() {
        $query = $this->db->get('payments_methods');
        return $query->result_array();
    }

    //Создание нового заказа
    public function create_new_order($order) {
        //Дополняем массив необходимыми данными
        $order['status'] = '1';//Статус "Новый" по-умолчанию
        $order['date_reg'] = date("Y-m-d H:i:s");//текущая дата для даты регистрации
        $order['date_update'] = date("Y-m-d H:i:s");//текущая дата для даты изменения статуса

        //Записываем все данные по заказу в БД
        $this->db->insert('orders', $order);
        $order_id = $this->db->insert_id();
        
        //Записываем состав заказа в БД
        foreach($this->cart->contents() as $item) {

            //Проходимся по каждой строке заказа и добавляем в БД
            $orderContent = array(
                'order_id' => $order_id,
                'product_id' => $item['id'],
                'price' => $item['price'],
                'count' => $item['qty']
            );
            $this->db->insert('orders_content', $orderContent);
        }

        //Уничтожаем корзину
        $this->cart->destroy();

        //Возвращем номер нового заказа
        return $order_id;
    }

    public function get_user_info($user_id) {
        //Получаем информацию о пользователе
        $query = $this->db->select('name,lastname,email')->get_where('users',array('id'=>$user_id));
        return $query->row_array();
    }

    public function get_admin_info() {
        //Получаем адреса почты всех администраторов для рассылки писем
        $query = $this->db->select('email')->get_where('users',array('users_group'=>1));
        return $query->result_array();
    }
}