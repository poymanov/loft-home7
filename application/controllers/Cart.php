<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends MY_Controller {

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
}