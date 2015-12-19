<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalog extends CI_Controller {

	public function view_category($name){

		//Параметры представления
		$data['pathCommon'] = "/markup";

		//Подгружаем модель выбора главного меню
		$this->load->model('main_menu');
		$data['main_menu'] = $this->main_menu->get_menu();

		//Подгружаем модель категорий
		$this->load->model('categories_model');
		$categories = $this->categories_model->get_categories();
		$data['categories'] = $categories;

		//Полученаем информацию по отдельной категории
		$category = $this->categories_model->get_category_info($name);
		
		//Получаем товары по категории
		$products = $this->categories_model->get_category_products($category['id']);
		$data['products'] = $products;

		//Если нет такой категории, выводим содержимое страницы 404
		if(!$category) {

		} else {
			//Дополнительные метаданные
			$data['title'] = $category['title'];
			$data['meta_keywords'] = $category['meta_keywords'];
			$data['meta_description'] = $category['meta_description'];

			//Контент страницы
			$data['h1'] = $category['title'];

			//Формирование хлебных крошек для страницы
			$breadcrumbs = array();
			$breadcrumbs[] = array(
				'href' => '/',
				'name' => 'Главная'
			);
			$breadcrumbs[] = array(
				'href' => '',
				'name' => $category['title']
			);
			$data['breadcrumbs'] = $breadcrumbs;

			//Вызов отображений
			$this->load->view('common/header',$data);
			$this->load->view('common/main_menu',$data);
			$this->load->view('catalog',$data);
			$this->load->view('common/footer',$data);
		}


	}
}