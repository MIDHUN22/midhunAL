<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Segments extends CO_Web_Controller
{

    function __construct()
    {
        parent::__construct();
        // loading models
        $this->load->model('Segments_model', 'segments_model');
        // $this->load->model('Career_model', 'career_model');
    }

    public function index()
    {
        $this->data['segments'] = $this->segments_model->get_all(['order_asc' => true]);

        $this->data['active_menu'] = 'segments';
        $this->data['site_content'] = 'segments';

        $this->load->view('web/content', $this->data);
    }

    public function view($id)
    {
        $this->data['segments'] = $this->segments_model->get($id);
        $this->data['active_menu'] = 'view_segments';
        $this->data['site_content'] = 'view_segments';
        $this->load->view('web/content', $this->data);
    }
}