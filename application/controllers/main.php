<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index(){
		//путь к папке с представлениями, общие файлы
		$data['pathCommon'] = "/markup";

		$this->load->view('common/header',$data);
		$this->load->view('index',$data);
		$this->load->view('common/footer',$data);
	}
}
