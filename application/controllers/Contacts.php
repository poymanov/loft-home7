<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends CI_Controller {

	public function index(){

        //Обратка формы обратной связи

        $this->load->helper(array('form'));

        $this->load->library('form_validation');

        //Правила валидации формы
        $config = array(
               array(
                     'field'   => 'name', 
                     'label'   => 'ФИО', 
                     'rules'   => 'trim|required'
                  ),
               array(
                     'field'   => 'email', 
                     'label'   => 'E-mail', 
                     'rules'   => 'trim|required|valid_email'
                  ),
               array(
                     'field'   => 'message', 
                     'label'   => 'Текст сообщения', 
                     'rules'   => 'trim|required'
                  )
        );

        $this->form_validation->set_rules($config);

        //Проверяем форму и выводим соответствующее сообщение
        if ($this->form_validation->run() == FALSE) {
            $data['form_status'] = "error";
        } else {
            $data['form_status'] = "success";

            $name = $this->input->post('name');
            $tel = $this->input->post('tel');
            $email = $this->input->post('email');
            $message = $this->input->post('message');

            $emailTo = 'admin@admin.ru';
            $body = "Имя: $name \n\nКонтактный телефон: $tel \n\nE-mail: $email \n\nСообщение: $message \n\n";
            $subject = "Сообщение из интернет-магазина";
            $headers = 'From: <'.$emailTo.'>';

            //Если нет ошибок, то отправляем письмо
            mail($emailTo, $subject, $body, $headers);
            //echo $this->input->post('name');
        }

        //Подгружаем модель выбора главного меню
        $this->load->model('main_menu');
        $data['main_menu'] = $this->main_menu->get_menu();

        //Подгружаем модель категорий
        $this->load->model('categories_model');
        $categories = $this->categories_model->get_categories();
        $data['categories'] = $categories;
        
        //Подгружаем модель получения отдельной страницы с информацией
        $this->load->model('information_model');
        $information = $this->information_model->get_information("contacts");

        //Параметры представления
        $data['pathCommon'] = "/markup";

        //Если такой страницы информации нет, выводим содержимое страницы 404
        if(!$information) {

        } else {
            //Дополнительные метаданные
            $data['title'] = $information['title'];
            $data['meta_keywords'] = $information['meta_keywords'];
            $data['meta_description'] = $information['meta_description'];

            //Контент страницы
            $data['h1'] = $information['h1'];
            $data['text'] = $information['text'];

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
                'name' => $information['h1']
            );
            $data['breadcrumbs'] = $breadcrumbs;

            //Вызов основного отображения
            $this->load->view('contacts.php',$data);
        }

        $this->load->view('common/footer',$data);
    }
}