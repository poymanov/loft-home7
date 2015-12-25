<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reg_model extends CI_Model {

    //Проверка наличия e-mail в базе пользователей
	public function check_email($email) {
		return $this->db->where('email',$email)->count_all_results('users');
	}

	//Создание нового пользователя
	public function reg_user($arrOptions) {

		//1) шифруем пароль пользователя
		$arrOptions['password'] = password_hash($arrOptions['password'],PASSWORD_DEFAULT);

		//2) добавляем для даты регистрации текущую дату и время
		//загружаем нужный helper для этого
		$this->load->helper('date');
		$arrOptions['date_reg'] = date("Y-m-d H:i:s");

		//3) Всем новым пользователям ставим по-умолчанию группу зарегистрированные
		$arrOptions['users_group'] = 2;
		
		//4) Записываем пользователя в базу
		$this->db->insert('users', $arrOptions); 

		//5) Генерируем письмо с кодом для последующей активации

		//шифруем e-mail для проверки активации
		//$activationCode = $this->encrypt->encode($arrOptions['email']);

		$activationCode = base64_encode($arrOptions['email']);
		$activationLink = base_url()."activation/".$activationCode;

		//6) Отправка письма пользователю для активации
		//Подготавливаем текст сообщения
		$mailTitle = "Активация аккаунта в интернете-магазине";
		$mailContent = "<p>Спасибо за регистрацию в нашем магазине</p><p>Для активации аккаунта перейдите по следующей ссылке:<br><a href='".$activationLink."'>".$activationLink."</p>";

		$emailTo = $arrOptions['email'];
        $body = $mailContent;
        $subject = $mailTitle;
        $headers = 'From: <home@loft-7.ru>';

        //Отправляем письмо
        mail($emailTo, $subject, $body, $headers);
	}

	public function activation_user($code) {
		$userEmail = base64_decode($code);
		
		// 1) Находим зарегистрированного пользователя по email
		$query = $this->db->select('id,is_activated')->get_where('users',array('email'=>$userEmail));
        $result = $query->row_array();

        //Если не нашли сопоставление нашему e-mail в базе возвращаем сообщение с ошибкой
        if(!$result) {
        	return "Ошибка активации.<br>Неверный код активации.";
        }

        // Если аккаунт уже активирован, сообщаем об этом
        if($result['is_activated'] == 1) {
        	return "Ошибка активации.<br>Аккаунт <strong>$userEmail</strong> уже активирован.";
        }
        
        // 2) Обновляем запись, добавляем отметку активации
        $newData = array('is_activated'=>'1');
        $this->db->update('users', $newData, $result);

        return "<br>Аккаунт <strong>$userEmail</strong> успешно активирован.";
	}
}