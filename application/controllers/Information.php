<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Information extends MY_Controller {

	public function display_information($name){

		//Подгружаем модель получения отдельной страницы с информацией
		$this->load->model('information_model');
		$information = $this->information_model->get_information($name);

		//Если такой страницы информации нет, выводим содержимое страницы 404
		if(!$information) {

		} else {
			//Дополнительные метаданные
			$this->setData('title',$information['title']);
			$this->setData('meta_keywords',$information['meta_keywords']);
			$this->setData('meta_description',$information['meta_description']);

			//Контент страницы
			$this->setData('h1',$information['h1']);
			$this->setData('text',$information['text']);

			//Вызов базовых отображений
			$this->load->view('common/header',$this->data);
			$this->load->view('common/main_menu',$this->data);

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
			$this->setData('breadcrumbs',$breadcrumbs);


			//Вызов основного отображения
			$this->load->view('Information',$this->data);

		}

		$this->load->view('common/footer',$this->data);
	}
}