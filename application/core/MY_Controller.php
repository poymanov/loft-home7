<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
    protected $data = array();

    public function __construct() {
        parent::__construct();

        // Путь к разметке
        $this->setData('pathCommon','/markup');

        // Подгружаем модель главного меню
        $this->load->model('main_menu');
        $this->setData('main_menu', $this->main_menu->get_menu());

        //Подгружаем модель категорий
		$this->load->model('categories_model');
		$categories = $this->categories_model->get_categories();
		$this->setData('categories',$categories);

        //id текущего авторизованного пользователя
        $this->setData('user_id',$this->session->userdata('user_id'));
    }

    protected function setData($key, $value){
		$this->data[$key] = $value;
	}
}