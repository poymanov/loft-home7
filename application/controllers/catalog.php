<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalog extends MY_Controller {

	public function view_category($name,$page = 0){

		//Полученаем информацию по отдельной категории
		$category = $this->categories_model->get_category_info($name);
		
		//Получаем данные для фильтров

		//Производитель
		$manucturers = $this->categories_model->get_manufacturers();
		$this->setData('manucturers',$manucturers);

		//Вложенные подкатегории для категории
		$subcategories = $this->categories_model->get_subcategories($category['id']);
		$this->setData('subcategories',$subcategories);

		//Подключаем библиотеку пагинации
		$this->load->library('pagination');

		//Настройки для пагинации
		$config = array();
		$config["base_url"] = base_url() . "catalog/" . $name;
		$config["total_rows"] = $this->categories_model->count_category_products($category['id']);
		$config["per_page"] = 6;
		$config["uri_segment"] = 3;
		$config['full_tag_open'] = '<div class="paginator_pages"><ul>';
		$config['full_tag_close'] = '</ul></div';
		$config['num_tag_open']  = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active">';
		$config['cur_tag_close'] = '</li>';
		$config['next_tag_open']  = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open']  = '<li>';
		$config['prev_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		if($page == 0){
			$page = ($this->uri->segment(3)) ? $this->uri->segment(2) : 0;
		}

		//Если у нас был get-запрос, то получаем дополнительные фильтры
		//для отбора товаров

		$get = $this->input->get();

		//Получаем товары по категории
		$products = $this->categories_model->get_category_products($category['id'],$config["per_page"],$page,$get);

		$this->setData('products',$products);

		//Если нет такой категории, выводим содержимое страницы 404
		if(!$category) {

		} else {
			//Дополнительные метаданные
			$this->setData('title',$category['title']);
			$this->setData('meta_keywords',$category['meta_keywords']);
			$this->setData('meta_description',$category['meta_description']);

			//Контент страницы

			//Если у нас были зайдествованы фильтры, 
			//то отображем их в заголовке страницы

			$h1 = $category['title'];

			if($get) {
				$h1 .= ":<br>";
				if($get['subcategory']) {
					$filter_category = $this->categories_model->get_category_name($get['subcategory']);
					$h1 .= $filter_category['title']."<br>";
				}
				if($get['manufacturer']) {
					$filter_manufacturer = $this->categories_model->get_manufacturer_name($get['manufacturer']);
					$h1 .= $filter_manufacturer['name']."<br>";
				}

				if($get['price1']) {
					$h1 .= "от ".$get['price1']."<br>";
				}

				if($get['price2']) {
					$h1 .= "до ".$get['price2']."<br>";
				}
			}

			$this->setData('h1',$h1);

			//Формирование хлебных крошек для страницы
			$breadcrumbs = array();
			$breadcrumbs[] = array(
				'href' => '/',
				'name' => 'Главная'
			);
			$breadcrumbs[] = array(
				'href' => '',
				'name' => $category['title']
			);
			$this->setData('breadcrumbs',$breadcrumbs);

			//Вызов отображений
			$this->load->view('common/header',$this->data);
			$this->load->view('common/main_menu',$this->data);
			$this->load->view('catalog',$this->data);
			$this->load->view('common/footer',$this->data);
		}
	}
}