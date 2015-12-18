<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index(){

		//Параметры представления
		$data['pathCommon'] = "/markup";
		$data['title'] = "Главная";

		//Вызов отображений
		$this->load->view('common/header',$data);
		$this->load->view('index',$data);
		$this->load->view('common/footer',$data);
	}
}
