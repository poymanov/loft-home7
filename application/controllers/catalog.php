<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Catalog extends CI_Controller {

	public function index(){

		//Параметры представления
		$data['pathCommon'] = "/markup";
		$data['title'] = "Каталог";

		//Вызов отображений
		$this->load->view('common/header',$data);
		$this->load->view('catalog',$data);
		$this->load->view('common/footer',$data);
	}
}