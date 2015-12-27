<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function index(){

		//Подгружаем нужные библиотеки
		$this->load->helper(array('form'));
        $this->load->library('form_validation');

		//Дополнительные метаданные
		$this->setData('title','Авторизация');
		$this->setData('meta_keywords','Авторизация');
		$this->setData('meta_description','Авторизация');

		//Контент страницы
		$this->setData('h1','Авторизация');

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
		$this->setData('breadcrumbs',$breadcrumbs);

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
                $this->setData('user_id',$this->session->userdata('user_id'));
            } else {
                //Если пароль неверный, выводим форму с сообщением об ошибке
                $this->setData('invalidPassword',true);
            }
        }
        //Вызов отображений
        $this->load->view('common/header',$this->data);
        $this->load->view('common/main_menu',$this->data);
        $this->load->view('login',$this->data);
		$this->load->view('common/footer',$this->data);
	}

    //Завершаем сессию пользователя
    public function logout() {
        //Удаляем данные о пользователе
        $this->session->unset_userdata('user_id');

        //Дополнительные метаданные
        $this->setData('title','Выход из системы');
        $this->setData('meta_keywords','Выход из системы');
        $this->setData('meta_description','Выход из системы');

        //Контент страницы
        $this->setData('h1','Выход из системы');

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
        $this->setData('breadcrumbs',$breadcrumbs);

        //Вызов отображений
        $this->load->view('common/header',$this->data);
        $this->load->view('common/main_menu',$this->data);
        
        $this->load->view('logout',$this->data);
        $this->load->view('common/footer',$this->data);
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