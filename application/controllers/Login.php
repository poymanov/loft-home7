<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index(){

		//Подгружаем нужные библиотеки
		$this->load->helper(array('form'));
        $this->load->library('form_validation');

		//Параметры представления
		$data['pathCommon'] = "/markup";

		//Подгружаем модель выбора главного меню
		$this->load->model('main_menu');
		$data['main_menu'] = $this->main_menu->get_menu();

		//Подгружаем модель категорий
		$this->load->model('categories_model');
		$categories = $this->categories_model->get_categories();
		$data['categories'] = $categories;

		//Дополнительные метаданные
		$data['title'] = 'Авторизация';
		$data['meta_keywords'] = 'Авторизация';
		$data['meta_description'] = 'Авторизация';

		//Контент страницы
		$data['h1'] = 'Авторизация';

		//Формирование хлебных крошек для страницы
		$breadcrumbs = array();
		$breadcrumbs[] = array(
			'href' => '/',
			'name' => 'Главная'
		);
		$breadcrumbs[] = array(
			'href' => '',
			'name' => 'Авторизация'
		);
		$data['breadcrumbs'] = $breadcrumbs;

		//Вызов отображений
		$this->load->view('common/header',$data);
		$this->load->view('common/main_menu',$data);
        
        //Если пользователь авторизован, то не нужно отображать форму авторизации
		$data['user_id'] = $this->session->userdata('user_id');

		//Правила валидации формы
        $config = array(
               array(
                     'field'   => 'email', 
                     'label'   => 'E-mail', 
                     'rules'   => 'callback_email_check'
                  ),
               array(
                     'field'   => 'password', 
                     'label'   => 'Пароль', 
                     'rules'   => 'trim|required'
                )
        );
	
        $this->form_validation->set_rules($config);

        // //Если проверка не прошла выводим форму
        if ($this->form_validation->run() == FALSE) {
        } else {
            //Если первоначалная проверка полей прошла успешно
            //Проверяем, чтобы пароль пользователя с данным e-mail 
            //был корректным
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $this->load->model('login_model');
            $userValid = $this->login_model->password_check($email,$password);

            
            if($userValid) {
               //Создаем сессию для авторизованного пользователя
                $this->session->set_userdata(array('user_id'=>$userValid));
                $data['user_id'] = $this->session->userdata('user_id');
            } else {
                //Если пароль неверный, выводим форму с сообщением об ошибке
                $data['invalidPassword'] = true;
            }

            
        }

        $this->load->view('login',$data);
		$this->load->view('common/footer',$data);
	}

    //Завершаем сессию пользователя
    public function logout() {
        //Удаляем данные о пользователе
        $this->session->unset_userdata('user_id');

        //Параметры представления
        $data['pathCommon'] = "/markup";

        //Подгружаем модель выбора главного меню
        $this->load->model('main_menu');
        $data['main_menu'] = $this->main_menu->get_menu();

        //Подгружаем модель категорий
        $this->load->model('categories_model');
        $categories = $this->categories_model->get_categories();
        $data['categories'] = $categories;

        //Дополнительные метаданные
        $data['title'] = 'Выход из системы';
        $data['meta_keywords'] = 'Выход из системы';
        $data['meta_description'] = 'Выход из системы';

        //Контент страницы
        $data['h1'] = 'Выход из системы';

        //Формирование хлебных крошек для страницы
        $breadcrumbs = array();
        $breadcrumbs[] = array(
            'href' => '/',
            'name' => 'Главная'
        );
        $breadcrumbs[] = array(
            'href' => '',
            'name' => 'Выход из системы'
        );
        $data['breadcrumbs'] = $breadcrumbs;

        //Вызов отображений
        $this->load->view('common/header',$data);
        $this->load->view('common/main_menu',$data);
        
        $this->load->view('logout',$data);
        $this->load->view('common/footer',$data);
    }

    public function email_check($value) {
        //Проводим проверку e-mail на различные ошибки

        //1) Поле не пустое
        if(!$this->form_validation->required($value)) {
             $this->form_validation->set_message('email_check', 'Поле e-mail обязательно.');
            return false;
        }

        //2) Корректное заполнение e-mail
        if(!$this->form_validation->valid_email($value)) {
             $this->form_validation->set_message('email_check', 'Поле E-mail должно содержать правильный E-mail адрес.');
            return false;
        }

        //4) Наличие такого e-mail в базе данных
        $this->load->model('reg_model');
        $is_email = $this->reg_model->check_email($value);

        if(!$is_email) {
            $this->form_validation->set_message('email_check', 'Пользователь с таким e-mail не обнаружен');
            return false;
        }

        return true;
    }

}