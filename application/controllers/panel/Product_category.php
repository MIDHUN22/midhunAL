<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Product_category extends CO_Panel_Controller
{

    public function __construct()
    {
        parent::__construct();
        //loading models
        $this->load->model('Product_category_model', 'product_category_model');
        $this->load->model('Language_model', 'language_model');
        //configuration
        $controller_config = array();
        $controller_config['disable_add_category'] = FALSE;
        $controller_config['disable_delete_category'] = FALSE;
        $controller_config['disable_parent_category'] = FALSE;
        $controller_config['disable_category_order'] = FALSE;
        $controller_config['disable_languages_category'] = FALSE;
        $this->data['controller_config'] = $controller_config;
    }

    public function index()
    {
        $this->all();
    }

    public function all()
    {
        $parent_categories = $this->product_category_model->get_all(TRUE);
        $all_categories = $this->product_category_model->get_all();
        $this->data['category_count'] = $this->product_category_model->num_rows;
        $this->data['category_items'] = '';
        if ($parent_categories) {
            $i = 1;
            foreach ($parent_categories as $parent_category) {
                $this->data['sl_no'] = $i;
                $this->data['category_id'] = $parent_category->id;
                $this->data['title'] = $parent_category->title;
                $this->data['category_order'] = $parent_category->category_order;
                $this->data['category_items'] .= $this->load->view('panel/product_category_item', $this->data, TRUE);
                $this->data['category_items'] .= $this->get_child_category($parent_category->id, $i);
                $i++;
            }
        }
        if ($_POST) {
            foreach ($all_categories as $category) {
                $input_data = array();
                $input_data['category_order'] = $this->input->post('category_order_' . $category->id);
                $this->product_category_model->update($input_data, $category->id);
            }
            $category_order = 0;
            $parent_categories = $this->product_category_model->get_all(TRUE);
            foreach ($parent_categories as $parent_category_item) {
                $category_order++;
                $input_data = array();
                $input_data['category_order'] = $category_order;
                $this->product_category_model->update($input_data, $parent_category_item->id, 1);
                $this->update_order($parent_category_item->id);
            }
            $this->session->set_flashdata('success', 'Saved successfully.');
            redirect('panel/product_category/all', 'refresh');
        }
        $this->data['categories'] = $this->get_all_categories($parent_categories);
        $this->data['active_menu'] = 'product_category';
        $this->data['site_content'] = 'product_category';
        $this->load->view('panel/content', $this->data);
    }

    public function add($lang = 1)
    {

        $current_language = $this->language_model->get_language($lang);
        if (!$current_language) {
            redirect('panel/product_category/all', 'refresh');
        }
        $categories = $this->product_category_model->get_all();
        $parent_categories = $this->product_category_model->get_all(TRUE);
        $category_order = $this->product_category_model->num_rows+1;
        $this->form_validation->set_rules('parentCategory', 'parent category', 'trim');
        $this->form_validation->set_rules('categoryTitle', 'Title', 'trim|required|is_unique[product_category.title]');
        if ($this->form_validation->run() === TRUE) {
            $input_data = array();
            $input_data['parent_id'] = !empty($this->input->post('parentCategory')) ? $this->input->post('parentCategory') : '';
            $input_data['title'] = $this->input->post('categoryTitle');
            $input_data['category_order'] = $category_order;
            $input_data['language'] = $lang;
            $input_data['created_at'] = time();
            $input_data['created_by'] = $_SESSION['user_id'];
            $input_data['active'] = 1;
            $no_error = TRUE;
            $category_id = $this->product_category_model->add($input_data);
            if ($lang == 1) {
                $parent_categories = $this->product_category_model->get_all(TRUE);
                if ($parent_categories) {
                    $category_order = 0;
                    foreach ($parent_categories as $parent_category_item) {
                        $category_order++;
                        $input_data = array();
                        $input_data['category_order'] = $category_order;
                        $this->product_category_model->update($input_data, $parent_category_item->id, 1);
                        $this->update_order($parent_category_item->id);
                    }
                }
            }
            if ($no_error == FALSE) {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
            } else {
                $this->session->set_flashdata('success', 'Saved successfully.');
                redirect('panel/product_category/all', 'refresh');
            }
        }
        $this->data['categories'] = $this->get_all_categories($parent_categories);
        $this->data['current_language'] = $current_language;
        $this->data['active_menu'] = 'product_category';
        $this->data['site_content'] = 'add_product_category';
        $this->load->view('panel/content', $this->data);
    }

    public function edit($id, $lang = 1)
    {
        if ($id > 0 && $lang == '1') {
            $parent_category = $this->product_category_model->get($id);
            $category = $parent_category;
        } else if ($id > 0 && $lang > 0) {
            $parent_category = $this->product_category_model->get($id);
            if ($parent_category) {
                $category = $this->product_category_model->get_by_lang_parent($id, $lang);
            }
        } else {
            redirect('panel/product_category/all', 'refresh');
        }
        $current_language = $this->language_model->get_language($lang);
        if (!$parent_category || !$current_language) {
            redirect('panel/product_category/all', 'refresh');
        }
        //disabling feature based on language
        if ($lang != 1) {
            $this->data['controller_config']['disable_parent_category'] = TRUE;
        }
        $filter = array();
        $filter['status'] = 1;
        $filter['for_site'] = 1;
        $languages = $this->language_model->get_languages($filter);
        $categories = $this->product_category_model->get_all();
        $category_languages = $this->product_category_model->get_languages($id);
        $parent_categories = $this->product_category_model->get_all(TRUE);
        $this->form_validation->set_rules('parentCategory', 'Parent Category', 'trim');
        if (!$category || empty($category->title) || $category->title != $this->input->post('categoryTitle')) {
            $this->form_validation->set_rules('categoryTitle', 'Title', 'trim|required|is_unique[product_category.title]');
        }
        if ($this->form_validation->run() === TRUE) {
            $input_data = array();
            $input_data['parent_id'] = $this->input->post('parentCategory');
            $input_data['title'] = $this->input->post('categoryTitle');
            $input_data['language'] = $lang;
            $input_data['category_order'] = $parent_category->category_order;
            if ($lang != 1) {
                $input_data['language_parent'] = $parent_category->id;
            } else {
                $input_data['language_parent'] = '';
            }
            $input_data['active'] = 1;
            if ($category) {
                $input_data['updated_at'] = time();
                $input_data['updated_by'] = $_SESSION['user_id'];
                $this->product_category_model->update($input_data, $category->id, $lang);
            } else {
                $input_data['created_at'] = time();
                $input_data['created_by'] = $_SESSION['user_id'];
                $this->product_category_model->add($input_data);
            }
            if ($lang == 1) {
                $parent_categories = $this->product_category_model->get_all(TRUE);
                if ($parent_categories) {
                    $category_order = 0;
                    foreach ($parent_categories as $parent_category_item) {
                        $category_order++;
                        $input_data = array();
                        $input_data['category_order'] = $category_order;
                        $this->product_category_model->update($input_data, $parent_category_item->id, 1);
                        $this->update_order($parent_category_item->id);
                    }
                }
            }
            $this->session->set_flashdata('success', 'Saved successfully.');
            redirect('panel/product_category/all', 'refresh');
        }
        $this->data['current_language'] = $current_language;
        $this->data['category_languages'] = explode(',', $category_languages->languages);
        $this->data['languages'] = $languages;
        $this->data['categories'] = $this->get_all_categories($parent_categories);
        $this->data['parent_category'] = $parent_category;
        $this->data['id'] = $id;
        $this->data['category'] = $category;
        $this->data['active_menu'] = 'product_category';
        $this->data['site_content'] = 'edit_product_category';
        $this->load->view('panel/content', $this->data);
    }


    public function get_child_category($parent_id, $sl_no)
    {
        $category_items = '';
        if ($parent_id > 0) {
            $categories = $this->product_category_model->get_by_parent($parent_id);
            if ($categories) {
                $i = 1;
                foreach ($categories as $category) {
                    $this->data['sl_no'] = $sl_no . '.' . $i;
                    $this->data['category_id'] = $category->id;
                    $this->data['title'] = $category->title;
                    $this->data['category_order'] = $category->category_order;
                    $category_items .= $this->load->view('panel/product_category_item', $this->data, TRUE);
                    $category_items .= $this->get_child_category($category->id, $this->data['sl_no']);
                    $i++;
                }
            }
        }
        return $category_items;
    }

    private function update_order($parent_id)
    {
        if ($parent_id > 0) {
            $categories = $this->product_category_model->get_by_parent($parent_id);
            if ($categories) {
                $i = 1;
                foreach ($categories as $category) {
                    $input_data = array();
                    $input_data['category_order'] = $i;
                    $this->product_category_model->update($input_data, $category->id);
                    $this->update_order($category->id);
                    $i++;
                }
            }
        }
    }

    public function delete($id)
    {
        if ($id > 0) {
            $category = $this->product_category_model->get($id);
            if ($category) {
                $this->product_category_model->disable($id);
                $category_order = 0;
                $parent_categories = $this->product_category_model->get_all(TRUE);
                if ($parent_categories) {
                    foreach ($parent_categories as $parent_category_item) {
                        $category_order++;
                        $input_data = array();
                        $input_data['category_order'] = $category_order;
                        $this->product_category_model->update($input_data, $parent_category_item->id, 1);
                        $this->update_order($parent_category_item->id);
                    }
                }
            }
        }
        $this->session->set_flashdata('success', 'Deleted successfully.');
        redirect('panel/product_category/all', 'refresh');
    }

    public function get_all_categories($categories, $sl_no = '')
    {
        $category_items = array();
        if ($categories) {
            $i = 1;
            if ($sl_no) {
                $sl_no .= '.';
            }
            foreach ($categories as $category) {
                $tmp_category_item = array();
                $tmp_category_item['sl_no'] = $sl_no . $i;
                $tmp_category_item['category_id'] = $category->id;
                $tmp_category_item['title'] = $category->title;
                $tmp_category_item['category_order'] = $category->category_order;
                array_push($category_items, $tmp_category_item);
                $chid_categories = $this->product_category_model->get_by_parent($category->id);
                if ($chid_categories) {
                    $child_category_items = $this->get_all_categories($chid_categories, $tmp_category_item['sl_no']);
                    if ($child_category_items) {
                        foreach ($child_category_items as $child_category_item) {
                            array_push($category_items, $child_category_item);
                        }
                    }
                }
                $i++;
            }
        }
        return $category_items;
    }

}
