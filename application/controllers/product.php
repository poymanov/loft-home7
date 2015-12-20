<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function view_product($name){
		//Подгружаем модель выбора главного меню
		$this->load->model('main_menu');
		$data['main_menu'] = $this->main_menu->get_menu();

		//Подгружаем модель категорий
		$this->load->model('categories_model');
		$categories = $this->categories_model->get_categories();
		$data['categories'] = $categories;

		//Подгружаем модель товаров
		$this->load->model('product_model');
		$product = $this->product_model->get_product_data($name);

		if(!$product) {
		
		} else {
			//Параметры представления
			$data['pathCommon'] = "/markup";
			$data['title'] = $product['title'];
			$data['meta_keywords'] = $product['meta_keywords'];
			$data['meta_description'] = $product['meta_description'];
			$data['h1'] = $product['h1'];
			$data['price'] = $product['price'];

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
			$data['breadcrumbs'] = $breadcrumbs;
			
			//Вызов отображений
			$this->load->view('common/header',$data);
			$this->load->view('common/main_menu',$data);
			$this->load->view('product',$data);
			$this->load->view('common/footer',$data);
		}
	}
}