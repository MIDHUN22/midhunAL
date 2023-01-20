<?php

defined('BASEPATH') or exit('No direct script access allowed');

class CO_Web_Controller extends CO_Core_Controller
{

    function __construct()
    {
        parent::__construct();
        if (empty($_SESSION['web_guest_id'])) {
            $_SESSION['web_guest_id'] = mt_rand(1, 9999) . date('dm');
        }
        if (empty($_SESSION['web_user_type'])) {
            // if web user type is G then guest user 
            // if web user type is C then customer 
            $_SESSION['web_user_type'] = 'G';
        }
        //checking user is customer
        if (!$this->ion_auth->in_group('customer')) {
            $_SESSION['web_user_type'] = 'G';
        }

        if (!isset($_SESSION['lang'])) {
            $_SESSION['lang'] = 1;
        }
        $this->data['web_alert'] = $this->web_alert();
        $this->general();
        $this->change_language();
    }

    private function web_alert()
    {
        if ($this->session->flashdata('web_error')) {
            return '<div class="alert">
            <span class="closebtn">&times;</span>  
            <strong>Error!</strong> ' . $this->session->flashdata('web_error') . '</div>';
        } else if ($this->session->flashdata('web_success')) {
            return '<div class="alert success" style="background:#00FF00;">
            <span class="closebtn">&times;</span>  
            <strong>Success!</strong> ' . $this->session->flashdata('web_success') . '</div>';
        } else if ($this->session->flashdata('web_info')) {
            return '<div class="alert info">
            <span class="closebtn">&times;</span>  
            <strong>Info!</strong> ' . $this->session->flashdata('web_success') . '</div>';
        } else if ($this->session->flashdata('web_warning')) {
            return '<div class="alert warning">
            <span class="closebtn">&times;</span>  
            <strong>Warning!</strong> ' . $this->session->flashdata('web_success') . '</div>';
        }
        return '';
    }

    private function general()
    {
        //getting common data
        $this->form_validation->set_error_delimiters('<div class="error-text">', '</div>');
        $this->load->model('Language_model', 'language_model');
        $this->load->model('Contact_model', 'contact_model');
        $this->load->model('Social_model', 'social_model');
        $this->load->model('Article_model', 'article_model');
        $this->load->model('file_model', 'file_model');
        $this->load->model('Page_model', 'page_model');
        $this->load->model('Career_model', 'career_model');
        $this->load->model('Segments_model', 'segments_model');
        $this->load->model('settings_model');
        $this->data['common_contact'] = $this->contact_model->get_by_lang(1, $_SESSION['lang']);
        $this->data['web_languages'] = $this->language_model->get_languages();
        //$this->data['gallery'] = $this->file_model->get_all(1);
        $this->data['settings'] = $this->settings_model->get(1); // This is to get copyright

        $services_menu = $this->career_model->get_all(['order_asc' => true]);
        $this->data['services_menu']    =   $services_menu;

        $this->data['segments_menu'] = $this->segments_model->get_all(['order_asc' => true]);

        $this->data['social_facebook'] = $this->social_model->get_socialmedia(1);
        $this->data['social_instagram'] = $this->social_model->get_socialmedia(2);
        $this->data['social_whatsapp'] = $this->social_model->get_socialmedia(3);
        $this->data['social_linkedin'] = $this->social_model->get_socialmedia(5);
        $this->data['social_twitter'] = $this->social_model->get_socialmedia(4);
        $this->data['social_pinterest'] = $this->social_model->get_socialmedia(6);
        //echo '<pre>'; print_r($this->data); exit;
        //common about us
        $footer_about_us = $this->page_model->get_page_content(1631120935);
        $this->data['footer_about_us'] = $footer_about_us;
    }


    /**
     * function to change website language
     * @return bool
     */
    function change_language()
    {

        $this->load->model('Language_model', 'language_model');
        $this->load->model('Label_model', 'label_model');
        if (!empty($this->input->get('lang'))) {
            if ($this->input->get('lang') == 'en') {
                $_SESSION['lang'] = 1;
            } else if ($this->input->get('lang') == 'ar') {
                $_SESSION['lang'] = 2;
            }
        } else if (empty($_SESSION['lang'])) {
            $_SESSION['lang'] = 1;
        }

        $language = $this->language_model->get_language($_SESSION['lang']);
        $language = ($language) ? strtolower($language->name) : "english";
        $this->session->set_userdata('site_lang', $language);

        // multilanguage support
        $web_labels = $this->label_model->get_all_by_lang($_SESSION['lang']);
        $this->data['web_labels'] = array();
        if ($web_labels) {
            foreach ($web_labels as $web_label) {
                $this->data['web_labels'][$web_label->keyword] = $web_label->title;
            }
        }
    }
}