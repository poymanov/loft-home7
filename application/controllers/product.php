<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {

	public function view_product($name){
		//Подгружаем модель товаров
		$this->load->model('product_model');
		$this->load->helper('form');
		$product = $this->product_model->get_product_data($name);

		if(!$product) {
		
		} else {
			//Параметры представления
			$this->setData('title',$product['title']);
			$this->setData('meta_keywords',$product['meta_keywords']);
			$this->setData('meta_description',$product['meta_description']);
			$this->setData('h1',$product['h1']);
			$this->setData('price',$product['price']);
			$this->setData('description',$product['description']);
			$this->setData('image',$product['image']);
			$this->setData('product_id',$product['id']);
			$this->setData('sku',$product['sku']);
			$this->setData('alias',$product['name']);

			$manufacturer = $this->product_model->get_manufacturer($product['manufacturer_id']);
	
			//Получаем наименование производителя для вывода
			$this->setData('manufacturer',$manufacturer['name']);

			//Формирование хлебных крошек

			//Формирование хлебных крошек для страницы
			$breadcrumbs = array();
			$breadcrumbs[] = array(
				'href' => '/',
				'name' => 'Главная'
			);
			$breadcrumbs[] = array(
				'href' => '',
				'name' => $product['h1']
			);
			$this->setData('breadcrumbs',$breadcrumbs);
			
			//Вызов отображений
			$this->load->view('common/header',$this->data);
			$this->load->view('common/main_menu',$this->data);
			$this->load->view('product',$this->data);
			$this->load->view('common/footer',$this->data);
		}
	}
}