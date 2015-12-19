<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index(){

		//Подгружаем модель выбора главного меню
		$this->load->model('main_menu');
		$data['main_menu'] = $this->main_menu->get_menu();

		//Параметры представления
		$data['pathCommon'] = "/markup";
		$data['title'] = "Главная";
		$data['meta_keywords'] = "главная страница";
		$data['meta_description'] = "главная страница";

		//Для главной страницы немного другое отображение меню
		$data['nav_class'] = "nav_wrap";

		//Вызов отображений
		$this->load->view('common/header',$data);
		$this->load->view('common/slider');
		$this->load->view('common/main_menu',$data);
		$this->load->view('index',$data);
		$this->load->view('common/footer',$data);
	}
}
