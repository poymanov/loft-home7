<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_admin extends MY_Controller{

    public function index() {
        $action = $this->input->get('action');
        if ($action === 'delcategory'){
            $id = $this->input->get('id');
            $this->MY_model->del($id,'categories');
            $this->setData('title', 'Пользователи сайта');
            $this->setData ('message',"<div class='alert alert-success'> Сообщение: Категория успешно удалена с сайта.</div>");
            //Страница для перенаправления
            $this->setData ('url','/admin/category');
            //Параметры представления
            $this->setData('title', 'Удаление категории');
            //Вызов отображений
            $this->load->view('admin/common/header',$this->data);
            $this->load->view('admin/massege',$this->data);
            $this->load->view('admin/common/footer');
        }
        else {
            $categorys = $this->MY_model->get_all('categories');
            $this->setData('categorys', $categorys);
            //Параметры представления
            $this->setData('title', 'Категории каталога');
            //Вызов отображений
            $this->load->view('admin/common/header',$this->data);
            $this->load->view('admin/category',$this->data);
            $this->load->view('admin/common/footer');
        }

    }

    public function editcategory() {
        //Параметры представления
        $this->setData('title', 'Редактирование категорий');
        $submit = $this->input->post('submit');
        if ((isset($submit))){
            $id = $this->input->post('id');
            $title = $this->input->post('title');
            $parent_id = $this->input->post('parent_id');
            $name = $this->input->post('name');
            $meta_keywords = $this->input->post('meta_keywords');
            $meta_description = $this->input->post('meta_description');
            $data = array(
                'title' => $title,
                'parent_id' => $parent_id,
                'name' => $name,
                'meta_keywords' => $meta_keywords,
                'meta_description' => $meta_description );

            $this->MY_model->update($id,$data,'categories');
            //Сообщение о успешной оперпции
            $this->setData ('message',"<div class='alert alert-success'> Сообщение: Данные категории успешно изменены.</div>");

            //Страница для перенаправления
            $this->setData ('url','/admin/category/');
            //Вызов отображений
            $this->load->view('admin/common/header',$this->data);
            $this->load->view('admin/massege.php',$this->data);
            $this->load->view('admin/common/footer');
        }
        else {
            $id = $this->input->get('id');
            //Получаем данные выбранной категории
            $category = $this->MY_model->getWhere($id,'categories');
            $this->setData('category',$category);
            //Все группы пользователей
            $this->setData ('allcategories',$this->MY_model->get_all('categories'));

            //Вызов отображений
            $this->load->view('admin/common/header',$this->data);
            $this->load->view('admin/editcategory',$this->data);
            $this->load->view('admin/common/footer');
        }

    }

    public function newcategory() {
        //Параметры представления
        $this->setData('title', 'Добавление новой категории');
        $submit = $this->input->post('submit');

        if ((isset($submit))){
            $title = $this->input->post('title');
            $parent_id = $this->input->post('parent_id');
            $name = $this->input->post('name');
            $meta_keywords = $this->input->post('meta_keywords');
            $meta_description = $this->input->post('meta_description');
            if($title ==''  || $parent_id ==''  || $name ==''  || $meta_keywords =='' || $meta_description == '') {
                //Сообщение о успешной оперпции
                $this->setData ('message',"<div class='alert alert-danger'> Сообщение: Вы заполнили не все поля, попробуйте снова.</div>");
                //Страница для перенаправления
                $this->setData ('url','/admin/category_admin/newcategory');
            }
            else {
                $data = array(
                    'title' => $title,
                    'parent_id' => $parent_id,
                    'name' => $name,
                    'meta_keywords' => $meta_keywords,
                    'meta_description' => $meta_description );

                $this->db->insert('categories', $data);

                //Сообщение о успешной оперпции
                $this->setData ('message',"<div class='alert alert-success'> Сообщение: Данные категории успешно изменены.</div>");
                //Страница для перенаправления
                $this->setData ('url','/admin/category/');
            }


            //Вызов отображений
            $this->load->view('admin/common/header',$this->data);
            $this->load->view('admin/massege.php',$this->data);
            $this->load->view('admin/common/footer');
        }
        else {
            //Все группы пользователей
            $this->setData ('allcategories',$this->MY_model->get_all('categories'));

            //Вызов отображений
            $this->load->view('admin/common/header',$this->data);
            $this->load->view('admin/newcategory',$this->data);
            $this->load->view('admin/common/footer');
        }

    }

} 