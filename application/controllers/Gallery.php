<?php

defined('BASEPATH') or exit('No direct script access allowed');

//Class created by Arul P Das on 8/4/2021
class Gallery extends CO_Web_Controller
{

    function __construct()
    {
        parent::__construct();
        // loading models
        $this->load->model('News_model', 'news_model');
        $this->load->model('News_file_model', 'news_file_model');
        // $this->load->model('Page_model', 'page_model');
        // $this->load->model('file_model', 'file_model');
        // $this->load->model('File_description_model', 'file_desc_model');
        // $meta =  '<title>Manpower Supply company in UAE | Best Recruitment Agency in UAE </title>
        //     <meta name="description" content="We are registered and authorized Manpower Supply company in UAE. We provides all kinds of Labour and Manpower supply services.We helps clients to meet their Needs." />
        //     <meta name="keywords" content="manpower supply, manpower supply company, best manpower supply company in uae, international manpower supply consultancy, international manpower supply consultancy in middle east, recruitment agency,best recruitment agency in uae" />
        //     <link rel="canonical" href= "https://www.creativehrc.com/services"/>';
        // $this->config->set_item('META', $meta);
    }

    public function index()
    {
        $gallery_main = [];
        $temp_gallery = $this->news_model->get_all_news();
        if($temp_gallery) {
            foreach($temp_gallery as $items) {
                $gallery_main[$items->newsroom] = $items->title;
            }
        }
        $this->data['gallery_main'] = $gallery_main;
        $this->data['gallery'] = $this->news_file_model->get_files();
        // echo "<pre>"; print_r($this->data['gallery']); exit;
        // echo "<pre>"; print_r($this->data); exit;
        $this->data['active_menu'] = 'gallery';
        $this->data['site_content'] = 'gallery';
        $this->load->view('web/content', $this->data);
    }

    public function view($id)
    {
        $this->data['active_menu'] = 'gallery';
        $this->data['site_content'] = 'gallery-view';
        $this->load->view('web/content', $this->data);
    }
}
