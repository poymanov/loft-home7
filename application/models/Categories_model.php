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
                'childrens' =>  $childrens,
                'products' => $this->count_category_products($itemQuery['id'])
            );
        }

        return $categoriesList;
	}

    public function get_category_info($name) {
        $query = $this->db->select('id,name,title,meta_keywords,meta_description')->get_where('categories',array('name'=>$name));
        return $query->row_array();
    }

    public function get_category_products($id,$limit,$start,$filters) {

        $arrCategories = array();
        $arrCategories[] = $id;

    
        //1) Получаем id продуктов по категории
        $query = $this->db->select('product_id');
        

        //Если были фильтры и есть фильтр по категории
        //то отбираем товары по категории с фильтром
        //иначе по общей категории
        if($filters) {
            if($filters['subcategory']) {
                $cat_id = $filters['subcategory'];
            } else {
                $cat_id = $id;
            }
        } else {
            $cat_id = $id;
        }

        $query = $query->where('category_id',$cat_id);
        $query = $query->get('products_categories');
        $products = $query->result_array();

        //2) Собираем все id продуктов в простой массив
        $idArray = array();
        foreach ($products as $product) {
            $idArray[] = $product['product_id'];
        }

        if($idArray) {
            //3) По id продуктов получаем остальные данные по каждому из продуктов
            $query = $this->db->select('name,title,image')->limit($limit, $start);
            $query = $query->where_in('id',$idArray);
            if($filters) {
                 if($filters['manufacturer']) {
                    $query = $query->where('manufacturer_id',$filters['manufacturer']);
                 }

                 if($filters['price1']) {
                    $query = $query->where('price>',$filters['price1']);
                 }

                 if($filters['price2']) {
                    $query = $query->where('price<',$filters['price2']);
                 }
            }
            $query = $query->get('products');
            $arrQuery = $query->result_array();
            return $arrQuery;
        } else {
            //если ни одного товара не найдено, возвращаем пустой массив
            return array();
        }
        
    }

    public function count_category_products($id) {
        $query = $this->db->select('product_id')->where('category_id',$id)->count_all_results('products_categories');
        return $query;
    }

    public function get_manufacturers() {
        $query = $this->db->get('manufacturers');
        return $query->result_array();
    }

    public function get_subcategories($id) {
        $query = $this->db->select('id,title')->get_where('categories',array('parent_id'=>$id));
        return $query->result_array();
    }

    public function get_manufacturer_name($id){
        $query = $this->db->select('name')->get_where('manufacturers',array('id'=>$id));
        return $query->row_array();
    }

    public function get_category_name($id){
        $query = $this->db->select('title')->get_where('categories',array('id'=>$id));
        return $query->row_array();
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
                    'childrens' => $this->get_categories_childrens($itemChildrens,$arrQuery),
                    'products' => $this->count_category_products($itemChildrens['id'])
                );
            }
        }
        return $childrens;
    }

}