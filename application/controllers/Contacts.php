<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends MY_Controller {

	public function index(){

        //Обратка формы обратной связи

        $this->load->helper(array('form'));

        $this->load->library('form_validation');

        //Правила валидации формы
        $config = array(
               array(
                     'field'   => 'name', 
                     'label'   => 'ФИО', 
                     'rules'   => 'trim|required|max_length[50]'
                  ),
               array(
                     'field'   => 'email', 
                     'label'   => 'E-mail', 
                     'rules'   => 'trim|required|valid_email|max_length[50]'
                  ),
               array(
                     'field'   => 'message', 
                     'label'   => 'Текст сообщения', 
                     'rules'   => 'trim|required'
                  ),
               array(
                     'field'   => 'g-recaptcha-response', 
                     'label'   => 'Капча', 
                     'rules'   => 'callback_recaptcha_check'
                )
        );

        $this->form_validation->set_rules($config);

        //Проверяем форму и выводим соответствующее сообщение
        if ($this->form_validation->run() == FALSE) {
            $this->setData('form_status','error');
        } else {
            $this->setData('form_status','success');

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
        }

        //Подгружаем модель получения отдельной страницы с информацией
        $this->load->model('information_model');
        $information = $this->information_model->get_information("contacts");

        //Если такой страницы информации нет, выводим содержимое страницы 404
        if(!$information) {

        } else {
            //Дополнительные метаданные
            $this->setData('title',$information['title']);
            $this->setData('meta_keywords',$information['meta_keywords']);
            $this->setData('meta_description',$information['meta_description']);

            //Контент страницы
            $this->setData('h1',$information['h1']);
            $this->setData('text',$information['text']);

            //Вызов базовых отображений
            $this->load->view('common/header',$this->data);
            $this->load->view('common/main_menu',$this->data);

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
            $this->setData('breadcrumbs',$breadcrumbs);

            //Вызов основного отображения
            $this->load->view('contacts',$this->data);
        }

        $this->load->view('common/footer',$this->data);
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
}