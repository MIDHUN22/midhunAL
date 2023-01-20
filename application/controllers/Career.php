<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Career extends CO_Web_Controller
{

    function __construct()
    {
        parent::__construct();
        // loading models
        $this->load->model('Article_model', 'article_model');
        // $this->load->model('Page_model', 'page_model');
        // $this->load->model('News_model', 'news_model');
        // if ($_SESSION['lang'] == 2) :
        //     $meta =  '<title>International Staffing Consultancy | Human Capital Supplier in UAE</title>
        //     <meta name="description" content="Candidates seeking international job opportunities in any field can connect with us through our official website. We are International Staffing Consultancy in UAE. " />
        //     <meta name="keywords" content="International staffing Consultancy, International staffing Consultancy in uae, International staffing Consultancy in ajman, best human capital supplier in uae, human capital supplier" />
        //     <link rel="canonical" href= "https://www.creativehrc.com/careers"/>';
        // else :
        //     $meta =  '<title>International Staffing Consultancy | Human Capital Supplier in UAE</title>
        //     <meta name="description" content="Candidates seeking international job opportunities in any field can connect with us through our official website. We are International Staffing Consultancy in UAE. " />
        //     <meta name="keywords" content="International staffing Consultancy, International staffing Consultancy in uae, International staffing Consultancy in ajman, best human capital supplier in uae, human capital supplier" />
        //     <link rel="canonical" href= "https://www.creativehrc.com/careers"/>';
        // endif;
        // $this->config->set_item('META', $meta);
    }

    public function index()
    {
        $filter = [];
        $filter['title'] = ($_POST && $_POST['search']) ? $_POST['search'] : '';
        $careers = $this->article_model->get_all($filter);
        // echo "<pre>"; print_r($careers);exit;

        $this->data['active_menu'] = 'career';
        $this->data['site_content'] = 'career';
        $this->data['careers'] = $careers;
        $this->load->view('web/content', $this->data);
    }

    public function view($id)
    {
        $careers = $this->news_model->get_all_news(array("news_id" => $id, "language_id" => $_SESSION['lang']));
        $this->data['active_menu'] = 'career';
        $this->data['site_content'] = 'career_desc';
        $this->data['careers'] = $careers;
        $this->load->view('web/content', $this->data);
    }
}
