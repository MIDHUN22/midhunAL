<?php

defined('BASEPATH') or exit('No direct script access allowed');

//Class created by Arul P Das on 8/4/2021
class Services extends CO_Web_Controller
{

    function __construct()
    {
        parent::__construct();
        // loading models
        $this->load->model('Career_model', 'career_model');
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
        $this->data['career'] = $this->career_model->get_all(['order_asc' => true]);
        $this->data['active_menu'] = 'services';
        $this->data['site_content'] = 'service';
        $this->load->view('web/content', $this->data);
    }

    public function oldservices()
    {
        $this->data['active_menu'] = 'services';
        $this->data['site_content'] = 'service-old';
        $this->load->view('web/content', $this->data);
    }

    // public function view($id)
    // {
    //     $array_services = $this->article_model->get_all(); // desc

    //     $services = '';
    //     $enquiry = '';
    //     if ($id == '1') {
    //         $enquiry = 1;
    //         $services = $array_services[2]->description;
    //     } elseif ($id == '2') {
    //         $enquiry = 2;
    //         $services = $array_services[1]->description;
    //     } elseif ($id == '3') {
    //         $enquiry = 3;
    //         $services = $array_services[0]->description;
    //     }

    //     $this->data['active_menu'] = 'services';
    //     $this->data['site_content'] = 'service-view';
    //     $this->data['services'] = $services;
    //     $this->data['enquiry'] = $enquiry;
    //     $this->load->view('web/content', $this->data);
    // }

    public function whatwedo($id)
    {
        $this->data['career'] = $this->career_model->get($id);
        $this->data['active_menu'] = 'whatwedo';
        $this->data['site_content'] = 'whatwedo';
        $this->load->view('web/content', $this->data);
    }
}