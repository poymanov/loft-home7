<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reg extends CI_Controller {

	function __construct(){
        parent::__construct();

        //Библиотека понадобится во всех функциях класса
        $this->load->library('form_validation');

        //Модуль необходимый для всех методов класса
        $this->load->model('reg_model');
    }

	public function index(){

		//Подгружаем нужные библиотеки
		$this->load->helper(array('form'));

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
		$data['title'] = 'Регистрация';
		$data['meta_keywords'] = 'Регистрация';
		$data['meta_description'] = 'Регистрация';

		//Контент страницы
		$data['h1'] = 'Регистрация';

		//Формирование хлебных крошек для страницы
		$breadcrumbs = array();
		$breadcrumbs[] = array(
			'href' => '/',
			'name' => 'Главная'
		);
		$breadcrumbs[] = array(
			'href' => '',
			'name' => 'Регистрация'
		);
		$data['breadcrumbs'] = $breadcrumbs;

		//Вызов отображений
		$this->load->view('common/header',$data);
		$this->load->view('common/main_menu',$data);

		//Проверяем форму на ошибки

		//Правила валидации формы
        $config = array(
               array(
                     'field'   => 'name', 
                     'label'   => 'ФИО', 
                     'rules'   => 'trim|required|max_length[50]'
                  ),
                 array(
                     'field'   => 'lastname', 
                     'label'   => 'Фамилия', 
                     'rules'   => 'trim|required|max_length[50]'
                  ),
               array(
                     'field'   => 'tel', 
                     'label'   => 'Телефон', 
                     'rules'   => 'max_length[25]'
                  ),
               array(
                     'field'   => 'email', 
                     'label'   => 'E-mail', 
                     'rules'   => 'callback_email_check'
                  ),
               array(
                     'field'   => 'password1', 
                     'label'   => 'Пароль', 
                     'rules'   => 'trim|required'
                  ),
               array(
                     'field'   => 'password2', 
                     'label'   => 'Подтверждение пароля', 
                     'rules'   => 'trim|required|matches[password1]'
                  ),
               array(
                     'field'   => 'g-recaptcha-response', 
                     'label'   => 'Капча', 
                     'rules'   => 'callback_recaptcha_check'
                )
        );
	
        $this->form_validation->set_rules($config);

        //Если проверка не прошла выводим форму
        if ($this->form_validation->run() == FALSE) {
        	$this->load->view('reg',$data);
        } else {
        	//Сбор данных для регистрации нового пользователя
        	$userArr = array(
        		'name' => $this->input->post('name'),
        		'lastname' => $this->input->post('lastname'),
        		'tel' => $this->input->post('tel'),
        		'email' => $this->input->post('email'),
        		'password' => trim($this->input->post('password1'))
        	);

        	//Передача данных для регистрации пользователя
        	$this->reg_model->reg_user($userArr);

        	//Вывод сообщения об успешной регистрации
        	$data['user_email'] = $this->input->post('email');
        	$this->load->view('reg-success',$data);
        }

		$this->load->view('common/footer',$data);
	}

	//проверка формы обратной связи через Google reCaptcha
    public function recaptcha_check($value) {

        $google_url="https://www.google.com/recaptcha/api/siteverify";
        $secret='6LcF2hMTAAAAAFTgZxtPKvMPEXiKE_LnSqunVJFB';
        $ip=$_SERVER['REMOTE_ADDR'];
        $url=$google_url."?secret=".$secret."&response=".$value."&remoteip=".$ip;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
        $curlData = curl_exec($curl);
        curl_close($curl);
        $res=$curlData;
        $res= json_decode($res, true);

        if($res['success']) {
            return true;
        } else {
            $this->form_validation->set_message('recaptcha_check', 'Ошибка заполнения капчи!');
            return false;
        }
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

    	//3) Максимальная длина адреса
    	if(!$this->form_validation->max_length($value,25)) {
    		 $this->form_validation->set_message('email_check', 'Максимальная длина поля e-mail 25 символов');
            return false;
    	}

    	//4) Наличие такого e-mail в базе данных
		$is_email = $this->reg_model->check_email($value);

		if($is_email) {
			$this->form_validation->set_message('email_check', 'Пользователь с таким e-mail уже зарегистрирован');
            return false;
		}

    	return true;
    }
}