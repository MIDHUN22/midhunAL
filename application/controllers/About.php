<?php

defined('BASEPATH') or exit('No direct script access allowed');

//Class created by Arul P Das on 8/4/2021
class About extends CO_Web_Controller
{

    function __construct()
    {
        parent::__construct();
        // loading models
        
        $this->load->model('Page_model', 'page_model');
        
        // $meta =  '<title>International HR Consulting Services in Ajman | About us</title>
        //     <meta name="description" content="We provide international HR consulting services in MENA region.Crack your dream jobs with the Best Recruitment Agency in UAE.Get in touch with us today." />
        //     <meta name="keywords" content="international hr consultancy,best international hr consulting services uae ,international hr consulting services in middle east, consulting services, top consulting services ajman, interntional human resource consultancy, interntional human resource consultancy ajman,International hr consulting services in Ajman" />
        //     <link rel="canonical" href= "https://www.creativehrc.com/about"/>';
        // $this->config->set_item('META', $meta);
    }

    public function index()
    {
        $this->data['about_us'] = $this->page_model->get_by_menu_array(2);
        // echo "<pre>"; print_r($this->data['about_us']);exit;

        $this->data['vision'] = $this->page_model->get(3);
        $this->data['motto'] = $this->page_model->get(4);
        $this->data['mission'] = $this->page_model->get(5);

        $this->data['active_menu'] = 'about';
        $this->data['site_content'] = 'about';
        // $this->data['about_data'] = $page_data;
        //echo '<pre>'; print_r($this->data['aboutUsGallery']); exit;
        $this->load->view('web/content', $this->data);
    }
}
