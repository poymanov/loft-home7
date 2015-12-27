<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends MY_Controller {

	function __construct(){
        parent::__construct();
        //Модуль необходимый для всех методов класса
        $this->load->model('cart_model');
    }

	public function index(){
		$this->setData('title','Корзина');
		$this->setData('meta_keywords','Корзина');
		$this->setData('meta_description','Корзина');
		$this->load->helper(array('form'));
		//Контент страницы
		$this->setData('h1','Корзина');

		//Формирование хлебных крошек для страницы
		$breadcrumbs = array();
		$breadcrumbs[] = array(
			'href' => '/',
			'name' => 'Главная'
		);
		$breadcrumbs[] = array(
			'href' => '',
			'name' => 'Корзина'
		);
		$this->setData('breadcrumbs',$breadcrumbs);

		//Получаем способы оплаты и доставки для оформления заказа
		$this->setData('delivery',$this->cart_model->get_delivery_methods());
		$this->setData('payments',$this->cart_model->get_payments_methods());

		//Вызов отображений
		$this->load->view('common/header',$this->data);
		$this->load->view('common/main_menu',$this->data);
		$this->load->view('cart',$this->data);
		$this->load->view('common/footer',$this->data);
	}

	public function add() {
		//Добавление товара в корзину
		$product_id = $this->input->post('product_id');
		$qty = $this->input->post('qty');
		$name = $this->input->post('name');
		$alias = $this->input->post('alias');
		$price = $this->input->post('price');

		$data = array(
               'id'      => $product_id,
               'name'    => $name,
               'alias'   => $alias,
               'qty'     => $qty,
               'price'   => $price
            );

		$this->cart->insert($data);

		$data = array();
		//Возвращаем json-ответ с общим количеством товара в корзине
		$data['totalQty'] = $this->cart->total_items();
    	header("Content-Type: application/json");
    	echo json_encode($data);
    	exit;
	}

	public function update($rowid,$qty) {

		//Получаем данные для обновления корзины и обновляем её
		$data = array('rowid' => $rowid,'qty' => $qty);
		$this->cart->update($data); 

		//Перезагружаем страницу с корзиной
		redirect('/cart');
	}

	public function clear_cart() {
		//Очищаем корзину
		$this->cart->destroy();
		redirect('/cart');
	}

	public function checkout() {
		// Записываем заказ в базу данных

		$user_id = $this->input->post('user_id');
		//Данные по заказу
		$orderArr = array(
			'user_id' => $user_id,
			'delivery' => $this->input->post('delivery'),
			'payment' => $this->input->post('payments')
		);

		$order_id = $this->cart_model->create_new_order($orderArr);

		//Отправляем письмо пользователю
		$this->send_mail_customer($user_id,$order_id);

		//Отправляем письмо администраторам
		$this->send_mail_admin($order_id);

		// Выводим страницу с сообщением об успешном оформлении заказа
		$this->setData('title','Оформление заказа');
		$this->setData('meta_keywords','Оформления заказа');
		$this->setData('meta_description','Оформления заказа');

		//Контент страницы
		$this->setData('h1','Оформление заказа');
		$this->setData('text','<p><strong>Заказ #'.$order_id.'</strong> успешно сформирован.<br>Администратор будет уведомлен о вашем заказе.</p>');

		//Формирование хлебных крошек для страницы
		$breadcrumbs = array();
		$breadcrumbs[] = array(
			'href' => '/',
			'name' => 'Главная'
		);
		$breadcrumbs[] = array(
			'href' => '',
			'name' => 'Оформление заказа'
		);
		$this->setData('breadcrumbs',$breadcrumbs);

		//Вызов отображений
		$this->load->view('common/header',$this->data);
		$this->load->view('common/main_menu',$this->data);
		$this->load->view('checkout',$this->data);
		$this->load->view('common/footer',$this->data);
	}

	protected function send_mail_customer($user_id,$order_id) {
		// Формируем письмо для отправки клиенту
		$user_info = $this->cart_model->get_user_info($user_id);

		// Формируем заголовок письма
		$mailTitle = "Уведомение о заказе #".$order_id." - интернет-магазин";
		$mailContent = "<p>Здравствуйте, <strong>".$user_info['name']." ".$user_info['lastname']."</strong>! </p>";
		$mailContent .= "<p>Благодарим вас за заказ в нашем интернет-магазине!</p>";

		//Отправляем письмо пользователю

		$emailTo = $user_info['email'];
        $body = $mailContent;
        $subject = $mailTitle;
        $headers = 'From: <home@loft-7.ru>';

        mail($emailTo, $subject, $body, $headers);
	}

	protected function send_mail_admin($order_id) {
		// Формируем письмо для отправки клиенту
		$admin_info = $this->cart_model->get_admin_info();

		// Формируем заголовок письма
		$mailTitle = "Поступил новый заказ #".$order_id;
		$mailContent = "<p>В интернет-магазине появился новый заказ #".$order_id.".<br>Просьба обработать заказ и поменять статус</p>";
		
		//Отправляем сообщение каждому администратору
		foreach ($admin_info as $admin) {
			$emailTo = $admin['email'];
			$body = $mailContent;
 			$subject = $mailTitle;
			$headers = 'From: <home@loft-7.ru>';
			mail($emailTo, $subject, $body, $headers);
		}
	}
}