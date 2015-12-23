<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Information extends CI_Controller {

	public function display_information($name){

		//Подгружаем модель выбора главного меню
		$this->load->model('main_menu');
		$data['main_menu'] = $this->main_menu->get_menu();

		//Подгружаем модель категорий
		$this->load->model('categories_model');
		$categories = $this->categories_model->get_categories();
		$data['categories'] = $categories;
		
		//Подгружаем модель получения отдельной страницы с информацией
		$this->load->model('information_model');
		$information = $this->information_model->get_information($name);

		//Параметры представления
		$data['pathCommon'] = "/markup";

		//Если такой страницы информации нет, выводим содержимое страницы 404
		if(!$information) {

		} else {
			//Дополнительные метаданные
			$data['title'] = $information['title'];
			$data['meta_keywords'] = $information['meta_keywords'];
			$data['meta_description'] = $information['meta_description'];

			//Контент страницы
			$data['h1'] = $information['h1'];
			$data['text'] = $information['text'];

			//Вызов базовых отображений
			$this->load->view('common/header',$data);
			$this->load->view('common/main_menu',$data);

			//Формирование хлебных крошек для страницы
			$breadcrumbs = array();
			$breadcrumbs[] = array(
				'href' => '/',
				'name' => 'Главная'
			);
			$breadcrumbs[] = array(
				'href' => '',
				'name' => $information['h1']
			);
			$data['breadcrumbs'] = $breadcrumbs;


			//Вызов основного отображения
			$this->load->view('Information',$data);

		}

		$this->load->view('common/footer',$data);
	}
}