<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller{

	public function index(){
		
		//Параметры представления
		$this->setData('title', 'Главная');
		$this->setData('meta_keywords','главная страница');
		$this->setData('meta_description','главная страница');

		//Для главной страницы немного другое отображение меню
		$this->setData('nav_class','nav_wrap');

		//Вызов отображений
		$this->load->view('common/header',$this->data);
		$this->load->view('common/slider');
		$this->load->view('common/main_menu',$this->data);
		$this->load->view('index',$this->data);
		$this->load->view('common/footer',$this->data);
	}
}
