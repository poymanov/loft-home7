<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories_model extends CI_Model {

	public function get_categories() {
		$query = $this->db->select('id,name,title,parent_id')->get('categories');
		$arrQuery = $query->result_array();

        //Собираем все категории в этот массив
        $categoriesList = array();

        //1) Проходимся и собираем все категории 1 уровня
        foreach ($arrQuery as $itemQuery) {
            if(!empty($itemQuery['parent_id'])) {
                continue;
            }

            //2) Собираем все дочерние категории текущей категории
            $childrens = $this->get_categories_childrens($itemQuery,$arrQuery);

            $categoriesList[] = array(
                'id' => $itemQuery['id'],
                'href' => $itemQuery['name'],
                'title' => $itemQuery['title'],
                'childrens' =>  $childrens
            );
        }

        return $categoriesList;
	}

    protected function get_categories_childrens($categoryItem,$arrQuery) {
        //Собираем дочерние элементы категории
        $childrens = array();

        foreach ($arrQuery as $itemChildrens) {
            if($categoryItem['id'] == $itemChildrens['parent_id']) {
                $childrens[] = array(
                    'id' => $itemChildrens['id'],
                    'href' => $itemChildrens['name'],
                    'title' => $itemChildrens['title'],
                    'childrens' => $this->get_categories_childrens($itemChildrens,$arrQuery)
                );
            }
        }
        return $childrens;
    }

}