<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activation extends CI_Controller {

	public function index($code){

        //Подгружаем модель выбора главного меню
        $this->load->model('main_menu');
        $data['main_menu'] = $this->main_menu->get_menu();

        //Подгружаем модель категорий
        $this->load->model('categories_model');
        $categories = $this->categories_model->get_categories();
        $data['categories'] = $categories;
        
        //Параметры представления
        $data['pathCommon'] = "/markup";

        //Активируем аккаунт
        $this->load->model('reg_model');
        $data['msg'] = $this->reg_model->activation_user($code);

        //Дополнительные метаданные
        $data['title'] = 'Активация аккаунта';
        $data['meta_keywords'] = 'Активация аккаунта';
        $data['meta_description'] = 'Активация аккаунта';

        //Контент страницы
        $data['h1'] = 'Активация аккаунта';
        $data['text'] = 'Активация аккаунта';

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
            'name' => 'Активация аккаунта'
        );
        $data['breadcrumbs'] = $breadcrumbs;

        //Вызов основного отображения
        $this->load->view('activation',$data);

        $this->load->view('common/footer',$data);
    }
}