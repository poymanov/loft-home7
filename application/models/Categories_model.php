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

    public function get_category_info($name) {
        $query = $this->db->select('id,name,title,meta_keywords,meta_description')->get_where('categories',array('name'=>$name));
        return $query->row_array();
    }

    public function get_category_products($id) {
        //1) Получаем id продуктов по категории
        $query = $this->db->select('product_id')->get_where('products_categories',array('category_id'=>$id));
        $products = $query->result_array();

        //2) Собираем все id продуктов в простой массив
        $idArray = array();
        foreach ($products as $product) {
            $idArray[] = $product['product_id'];
        }

        //3) По id продуктов получаем остальные данные по каждому из продуктов
        $query = $this->db->select('name,title,image')->where_in('id',$idArray)->get('products');
        $arrQuery = $query->result_array();
        return $arrQuery;
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