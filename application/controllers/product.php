<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends CI_Controller {

	public function index(){

		//Параметры представления
		$data['pathCommon'] = "/markup";
		$data['title'] = "Карточка товара";

		//Вызов отображений
		$this->load->view('common/header',$data);
		$this->load->view('product',$data);
		$this->load->view('common/footer',$data);
	}
}