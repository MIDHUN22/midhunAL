<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Student extends CO_Web_Controller
{

    function __construct()
    {
        parent::__construct();
        // loading models
        $this->load->model('midhun_model', 'midhun_model');
        // $this->load->model('Career_model', 'career_model');
    }

    public function index()
    {
        $this->data['midhun'] = $this->midhun_model->get_all(['order_asc' => true]);

        $this->data['active_menu'] = 'student';
        $this->data['site_content'] = 'student';

        $this->load->view('web/content', $this->data);
    }

    public function test($id = '')
    {
        // $this->data['career'] = $this->career_model->get_all(['order_asc' => true]);

        // $this->data['message'] = ' test' . $id;     // ############## try

        // $this->data['midhun'] = $this->midhun_model->get_all(['order_asc' => true]);

        // $this->data['active_menu'] = 'student';
        // $this->data['site_content'] = 'student';

        // $this->load->view('web/content', $this->data);
    }
}