<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Article extends CO_Panel_Controller {

    public function __construct() {
        parent::__construct();
        //loading models
        $this->load->model('Article_model', 'article_model');
        $this->load->model('Language_model', 'language_model');
        //loading helpers
        $this->load->helper('file_upload');
        $this->load->helper('image_upload');
        //declaring variables
        $this->data['articleDescImgError'] = '';
        //configuration
        $controller_config = array();
        $controller_config['disable_article_add'] = FALSE;
        $controller_config['disable_article_delete'] = FALSE;
        $controller_config['disable_article_slug_title'] = TRUE;
        $controller_config['disable_article_subtitle'] = FALSE;
        $controller_config['disable_article_short_description'] = TRUE;
        $controller_config['disable_article_languages'] = FALSE;
        $controller_config['disable_page_seo'] = TRUE;
        $controller_config['disable_article_description_img'] = TRUE;
        $this->data['controller_config'] = $controller_config;
    }

    public function index() {
        redirect('panel/article/all', 'refresh');
    }

    public function all() {
        //Articles list view
        $filter = array();
        $this->form_validation->set_rules('filterArticleCreatedAt', 'created at', 'trim');
        $this->form_validation->set_rules('filterArticleTitle', 'title', 'trim');
        $filter['language'] = 1;
        if ($this->form_validation->run() === TRUE) {
            //filter the result based on search
            $filter['title'] = $this->input->post('filterArticleTitle');
            if ($this->input->post('filterArticleCreatedAt') != '') {
                $filterArticleCreatedAt = explode('-', $this->input->post('filterArticleCreatedAt'));
                if (!empty($filterArticleCreatedAt[0])) {
                    $filterArticleCreatedAt[0] = str_replace('/', '-', $filterArticleCreatedAt[0]);
                    $filter['from_created_at'] = strtotime($filterArticleCreatedAt[0]);
                }
                if (!empty($filterArticleCreatedAt[1])) {
                    $filterArticleCreatedAt[1] = str_replace('/', '-', $filterArticleCreatedAt[1]);
                    $filter['to_created_at'] = strtotime($filterArticleCreatedAt[1]);
                }
            }
        }
        $this->data['articles'] = $this->article_model->get_all($filter);
        $this->data['active_menu'] = 'article';
        $this->data['site_content'] = 'articles';
        $this->load->view('panel/content', $this->data);
    }

    public function add($lang = 1) {
        //add article
        $current_language = $this->language_model->get_language($lang);
        $this->form_validation->set_rules('articleTitle', 'title', 'trim|required');
        if ($this->data['controller_config']['disable_article_slug_title'] != TRUE)
            $this->form_validation->set_rules('articleSlugTitle', 'slug title', 'trim|required|is_unique[article.title_slug]');
        $this->form_validation->set_rules('articleSubtitle', 'subtitle', 'trim');
        $this->form_validation->set_rules('articleShortDesc', 'short description', 'trim');
        $this->form_validation->set_rules('articleDescription', 'description', 'trim');
        if ($this->form_validation->run() === TRUE) {
            $input_data = array();
            $no_error = TRUE;
            $input_data['title'] = $this->input->post('articleTitle');
            $input_data['title_slug'] = $this->input->post('articleSlugTitle');
            $input_data['subtitle'] = $this->input->post('articleSubtitle');
            $input_data['short_desc'] = $this->input->post('articleShortDesc');
            $input_data['description'] = $this->input->post('articleDescription');
            $input_data['created_at'] = time();
            $input_data['created_by'] = $_SESSION['user_id'];
            $input_data['language'] = $lang;
            $input_data['active'] = 1;
            $config = array();
            $config['upload_path'] = 'assets/uploads/article';
            $config['allowed_types'] = 'png|jpeg|jpg';
            $config['encrypt_name'] = TRUE;
            $config['max_size'] = config_item('MAX_IMG_FILE_SIZE');
            if (!empty($_FILES['articleDescImg']) && $_FILES['articleDescImg']['error'] == 0) {
                $file_info = array('field_name' => 'articleDescImg', 'file' => &$_FILES['articleDescImg']);
                $upload_result = image_upload($file_info, $config, FALSE, TRUE);
                if (!$upload_result['error']) {
                    $file_name = $upload_result['file_name'];
                    $input_data['desc_img'] = $file_name;
                } else {
                    $this->data['articleDescImgError'] = $upload_result['error_msg'];
                    $no_error = FALSE;
                }
            }
            if ($no_error == TRUE) {
                $article_id = $this->article_model->add($input_data);
                if ($article_id <= 0) {
                    $no_error = FALSE;
                }
            }
            if ($no_error == FALSE) {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
            } else {
                $this->session->set_flashdata('success', 'Saved successfully.');
                redirect('panel/article/all', 'refresh');
            }
        }
        $this->data['current_language'] = $current_language;
        $this->data['active_menu'] = 'article';
        $this->data['site_content'] = 'add_article';
        $this->load->view('panel/content', $this->data);
    }

    public function edit($id, $lang = 1) {
        //edit article based on language
        $language_parent = '';
        if ($id > 0 && $lang == '1') {
            $parent_article = $this->article_model->get($id);
            $article = $parent_article;
        } else if ($id > 0 && $lang > 0) {
            $parent_article = $this->article_model->get($id);
            if ($parent_article) {
                $language_parent = $id;
                $article = $this->article_model->get_by_parent($id, $lang);
            }
        } else {
            redirect('panel/article/all', 'refresh');
        }
        //disabling feature based on language
        if ($lang != 1) {
            $this->data['controller_config']['disable_article_description_img'] = TRUE;
        }
        $current_language = $this->language_model->get_language($lang);
        if (!$parent_article || !$current_language) {
            redirect('panel/article/all', 'refresh');
        }
        //disabling feature based on language
        if ($lang != 1) {
            $this->data['controller_config']['disable_article_slug_title'] = TRUE;
        }
        $filter = array();
        $filter['status'] = 1;
        $filter['for_site'] = 1;
        $languages = $this->language_model->get_languages($filter);
        $article_languages = $this->article_model->get_languages($id);
        $this->form_validation->set_rules('articleTitle', 'title', 'trim|required');
        if ($this->data['controller_config']['disable_article_slug_title'] != TRUE && $lang==1) {
            if (!$article || empty($article->title_slug) || $article->title_slug != $this->input->post('articleSlugTitle')) {
                $this->form_validation->set_rules('articleSlugTitle', 'slug title', 'trim|required|is_unique[article.title_slug]');
            }
        }
        $this->form_validation->set_rules('articleSubtitle', 'subtitle', 'trim');
        $this->form_validation->set_rules('articleShortDesc', 'short description', 'trim');
        $this->form_validation->set_rules('articleDescription', 'description', 'trim');
        if ($this->form_validation->run() === TRUE) {
            $input_data = array();
            $no_error = TRUE;
            $input_data['title'] = $this->input->post('articleTitle');
            $input_data['title_slug'] = $this->input->post('articleSlugTitle');
            $input_data['subtitle'] = $this->input->post('articleSubtitle');
            $input_data['short_desc'] = $this->input->post('articleShortDesc');
            $input_data['description'] = $this->input->post('articleDescription');
            $input_data['language'] = $lang;
            $input_data['active'] = 1;
            if ($lang != 1) {
                $input_data['language_parent'] = $language_parent;
            } else {
                $input_data['language_parent'] = '';
            }
            $config = array();
            $config['upload_path'] = 'assets/uploads/article';
            $config['allowed_types'] = 'png|jpeg|jpg';
            $config['encrypt_name'] = TRUE;
            $config['max_size'] = config_item('MAX_IMG_FILE_SIZE');
            if (!empty($_FILES['articleDescImg']) && $_FILES['articleDescImg']['error'] == 0) {
                $file_info = array('field_name' => 'articleDescImg', 'file' => &$_FILES['articleDescImg']);
                $upload_result = image_upload($file_info, $config, FALSE, TRUE);
                if (!$upload_result['error']) {
                    $file_name = $upload_result['file_name'];
                    if (file_exists('./assets/uploads/article/' . $article->desc_img) && !empty($article->desc_img)) {
                        unlink('./assets/uploads/article/' . $article->desc_img);
                        unlink('./assets/uploads/article/thumb_' . $article->desc_img);
                    }
                    $input_data['desc_img'] = $file_name;
                } else {
                    $this->data['articleDescImgError'] = $upload_result['error_msg'];
                    $no_error = FALSE;
                }
            }
            if ($no_error == TRUE) {
                if ($article) {
                    $input_data['updated_at'] = time();
                    $input_data['updated_by'] = $_SESSION['user_id'];
                    $this->article_model->add($input_data, $article->id);
                } else {
                    $input_data['created_at'] = time();
                    $input_data['created_by'] = $_SESSION['user_id'];
                    $this->article_model->add($input_data);
                }
            }
            if ($no_error == FALSE) {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
            } else {
                $this->session->set_flashdata('success', 'Saved successfully.');
                redirect('panel/article/edit/' . $id . '/' . $lang, 'refresh');
            }
        }
        $this->data['article_languages'] = explode(',', $article_languages->languages);
        $this->data['article'] = $article;
        $this->data['languages'] = $languages;
        $this->data['current_language'] = $current_language;
        $this->data['id'] = $id;
        $this->data['lang'] = $lang;
        $this->data['active_menu'] = 'article';
        $this->data['site_content'] = 'edit_article';
        $this->load->view('panel/content', $this->data);
    }

    public function delete_desc_img($id, $lang = '1') {
        //edit article based on language
        if ($id > 0 && $lang == '1') {
            $article = $this->article_model->get($id);
        } else if ($id > 0 && $lang > 0) {
            $article = $this->article_model->get_by_parent($id, $lang);
        } else {
            redirect('panel/article/all', 'refresh');
        }
        if (file_exists('./assets/uploads/article/' . $article->desc_img) && !empty($article->desc_img)) {
            unlink('./assets/uploads/article/' . $article->desc_img);
            unlink('./assets/uploads/article/thumb_' . $article->desc_img);
        }
        $input_data['desc_img'] = '';
        $this->article_model->add($input_data, $article->id);
        $this->session->set_flashdata('success', 'Image deleted successfully.');
        redirect('panel/article/edit/' . $id . '/' . $lang, 'refresh');
    }

    public function delete($id) {
        if ($id > 0) {
            $this->article_model->disable($id);
        }
        $this->session->set_flashdata('success', 'Article deleted successfully.');
        redirect('panel/article/all', 'refresh');
    }

}
