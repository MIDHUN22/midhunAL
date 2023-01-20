<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CO_Web_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('News_file_model', 'news_file_model');
        $this->load->model('Page_model', 'page_model');
        $this->load->model('file_model', 'file_model');
        // $meta =  '<title>HR Consultancy in UAE |config_item('WEBSITE_TITLE'). </title>
        //     <meta name="description" content="We are one of the trusted and leading HR Consultancy in UAE. We offer a broad range of human capital and management consulting services." />
        //     <meta name="keywords" content="hr consultancy, hr consultancy uae,best hr consultancy ajman,hr consultancy middle east, human resource consultancy, human resource consultancy uae,human resource consultancy ajman" />
        //     <link rel="canonical" href= "https://www.creativehrc.com/"/>';
        // $this->config->set_item('META', $meta);
    }

    public function index()
    {
        $lang = $_SESSION['lang'];
        $this->data['home_content'] = $this->page_model->get_by_menu_array(1);
        // echo "<pre>"; print_r($this->data['home_content']);exit;

        $filter = array();
        $filter['parent_id'] = '2';
        $filter['file_type'] = 'I';
        $filter['file_for'] = 'A';
        $filter['file_order_asc'] = true;
        $this->data['home_banners'] = $this->file_model->get_by_lang($filter, $_SESSION['lang']);

        $filter = array();
        $filter['parent_id'] = '1';
        $filter['file_type'] = 'I';
        $filter['file_for'] = 'A';
        $filter['file_order_asc'] = true;
        $this->data['clients'] = $this->file_model->get_by_lang($filter, $_SESSION['lang']);
        // echo "<pre>"; print_r($this->data['clients']);exit;

        $this->data['gallery'] = $this->news_file_model->get_files([]);
        // echo "<pre>"; print_r($this->data['gallery']);exit;

        $this->data['active_menu'] = 'home';
        $this->data['site_content'] = 'home';

        // echo "<pre>"; print_r($this->data);exit;

        $this->load->view('web/content', $this->data);
    }

    public function loading()
    {
        $this->data['active_menu'] = 'loading';
        $this->data['site_content'] = 'loading';
        $this->load->view('web/content', $this->data);
    }

    public function send()
    {
        // echo "<pre>"; print_r($this->input->post()); echo "</pre>";exit;
        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('company_name', 'name', 'trim');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
        $this->form_validation->set_rules('subject', 'subject', 'trim|required');
        $this->form_validation->set_rules('comments', 'message', 'trim|required');
        $this->form_validation->set_rules('phone', 'phone', 'trim');
        if ($this->form_validation->run() === TRUE) {
            $contact_name = $this->input->post('name');
            $company_name = $this->input->post('company_name');
            $contact_email = $this->input->post('email');
            $contact_phone = $this->input->post('phone');
            $contact_message = $this->input->post('comments');
            $contact_message .= "<br/><br/><br/><br/>Regards,<br/><br/>";
            if ($contact_name) {
                $contact_message .= $contact_name . "<br/>";
            }
            if ($company_name) {
                $contact_message .= $company_name . "<br/>";
            }
            $contact_message .= $contact_email . "<br/>";
            if ($contact_phone) {
                $contact_message .= $contact_phone . "<br/>";
            }
            $subject = config_item('WEBSITE_TITLE') . " | Contact from " . $contact_name . " On " . date('d M Y H:i');
            $contact_subject = $this->input->post('subject');
            if ($contact_subject) {
                $contact_message .= "<br/> Subject: " . $contact_subject . "<br/><br/>";
            }
            $this->data['message'] = $contact_message;
            $this->data['logo_title'] = config_item('WEBSITE_TITLE');
            $mail_template = $this->load->view('mail_template/message/index', $this->data, true);
            $this->load->library('email');
            $email_setting = array('mailtype' => 'html');
            $config_mail = config_item('MAIL');
            if ($config_mail['ENABLE_SMTP'] == TRUE) {
                $this->email->protocol = 'smtp';
                $this->email->smtp_host = $config_mail['SMTP_HOST'];
                $this->email->smtp_user = $config_mail['SMTP_EMAIL'];
                $this->email->smtp_pass = $config_mail['SMTP_PASSWORD'];
                $this->email->smtp_port = $config_mail['SMTP_PORT'];
                $this->email->smtp_crypto = $config_mail['SMTP_SECURE'];
            }
            $this->email->initialize($email_setting);
            $mail_to = $this->panel_settings->contact_email;

            $panel_setting = $this->settings_model->get(1); // This is to get mail id from admin settings

            $this->email->from('mailer@demo.arabinfotec.com', config_item('WEBSITE_TITLE') . '');
            $this->email->reply_to($contact_email, $contact_name);
            $this->email->to($mail_to);
            $this->email->subject($subject);
            $this->email->message($mail_template);
            if ($this->email->send()) {
                // $this->session->set_flashdata('web_success', 'Your message has been successfully sent. We will contact you very soon!.');
                // redirect('contact_us', 'refresh');
                // $arry = array();
                // $arry['success'] = true;
                // $arry['message'] = "<span style='color:green; font-weight:bold'>Your message has been successfully sent. We will contact you very soon!.</span>";
                // echo json_encode($arry);
                echo 'OK';
            } else {
                // $this->session->set_flashdata('web_error', 'Something went wrong, Please try again.');
                // $arry = array();
                // $arry['success'] = false;
                // $arry['message'] = "<span style='color:#8b0000; font-weight:bold'>Something went wrong, Please try again.</span>";
                // echo json_encode($arry);
                echo 'Something went wrong, Please try again.';
            }
            exit;
        } else {
            // $arry = array();
            // $arry['success'] = false;
            // $arry['message'] = "<span style='color:#8b0000; font-weight:bold;'>Please fill the required fields</span>";
            // echo json_encode($arry);
            echo 'Please fill the required fields';
            exit;
        }
        // $this->data['active_menu'] = 'home';
        // $this->data['site_content'] = 'contact_us';
        // $this->load->view('web/content', $this->data);

        echo 'Something went wrong, Please try again.';
        exit;
    }
}
