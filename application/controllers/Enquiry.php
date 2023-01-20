<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Enquiry extends CO_Web_Controller
{

    function __construct()
    {
        parent::__construct();
        // loading models
        $this->load->model('Enquiry_model', 'enquiry_model');
        // $this->load->model('Career_model', 'career_model');
    }

    public function index()
    {


        // $this->data['enquiry'] = $this->enquiry_model->get_all(['order_asc' => true]);

        $this->data['active_menu'] = 'enquiry';
        $this->data['site_content'] = 'enquiry';

        $this->load->view('web/content', $this->data);
    }
    public function send()
    {
        // echo "<pre>"; print_r($this->input->post()); echo "</pre>";exit;
        $this->form_validation->set_rules('name', 'name', 'trim|required');

        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
        $this->form_validation->set_rules('comments', 'message', 'trim|required');
        $enquiry_type = $this->input->post('enquiry_type');
        if ($this->form_validation->run() === TRUE) {
            $contact_name = $this->input->post('name');
            $contact_email = $this->input->post('email');
            $contact_message = $this->input->post('comments');
            $contact_message .= "<br/><br/><br/><br/>Regards,<br/><br/>";
            if ($contact_name) {
                $contact_message .= $contact_name . "<br/>";
            }

            $contact_message .= $contact_email . "<br/>";



            $mail_to    =   "arul@arabinfotec.com"; // Here overwriting mail id to test mail id // sinaj@vstbiz.com

            $contact_subject = $this->input->post('subject');
            if ($contact_subject) {
                $contact_message .= "<br/> $subject_heading: " . $contact_subject . "<br/><br/>";
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
            //$mail_to = $this->panel_settings->contact_email;

            $panel_setting = $this->settings_model->get(1); // This is to get mail id from admin settings

            $this->email->from('mailer@demo.arabinfotec.com', config_item('WEBSITE_TITLE') . '');
            $this->email->reply_to($contact_email, $contact_name);
            $this->email->to($mail_to);
            $this->email->subject($subject);
            $this->email->message($mail_template);
            //Check if there is an attachment
            if (isset($_FILES['resume_file']) && $_FILES['resume_file']['size'] > 0) {
                $attach_path = $_FILES['resume_file']['tmp_name'];
                $attach_name = $_FILES['resume_file']['name'];
                $this->email->attach($attach_path, 'attachment', $attach_name);
            }
            if ($this->email->send()) {
                echo 'OK';
            } else {
                echo "Something went wrong, Please try again.";
            }
            exit;
        } else {
            echo 'Please fill the required fields';
            exit;
        }

        echo "Something error. Please try again.";
        exit;
    }
}