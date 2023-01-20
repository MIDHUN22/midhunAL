<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Contact_us extends CO_Web_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Contact_model', 'contact_model');
        // $this->load->model('settings_model');
        // $this->load->model('file_model', 'file_model');
        // $this->load->model('News_model', 'news_model');
        // $meta =  '<title>Best Hiring Consultancy in UAE | Manpower Recruitment Agency UAE</title>
        // <meta name="description" content="We are the best Manpower Recruitment Agency in UAE collaborates with our clients to find the most qualified people. We Provide Professional Services to clients." />
        // <meta name="keywords" content="best hiring consultancy in uae, hiring consultancy in ajman, best manpower recruitment agency, manpower recruitment agency in uae, international manpower supply consultancy, international manpower supply consultancy in middle east" />
        // <link rel="canonical" href= "https://www.creativehrc.com/contact-us"/>';
        // $this->config->set_item('META', $meta);
    }

    public function index()
    {
        $this->data['active_menu'] = 'contact_us';
        $this->data['site_content'] = 'contact_us';
        $this->data['enquiry_type'] = 'contact';
        // $this->send();
        $this->load->view('web/content', $this->data);
    }

    public function post($id = '')
    {
        $this->data['active_menu'] = 'contact_us';
        $this->data['site_content'] = 'contact_us';
        $careers = $this->article_model->get($id);
        // echo "<pre>"; print_r($careers);exit;
        $this->data['subject'] = $careers->title;
        $this->data['enquiry_type'] = 'careers';
        $this->load->view('web/content', $this->data);
    }

    public function enquiry($id = '')
    {
        if ($id == 1) {
            $job_title  =   "Human Capital Consulting";
        } else if ($id == 2) {
            $job_title  =   "Recruitment and Manpower Supply";
        } else if ($id == 3) {
            $job_title  =   "Process Review, Redesign";
        } else if ($id == 4) {
            $job_title  =   "Organizational Development";
        } else if ($id == 5) {
            $job_title  =   "Human Capital Audit";
        } else if ($id == 6) {
            $job_title  =   "Performance Management Support &Coaching";
        } else if ($id == 7) {
            $job_title  =   "Job Descriptions";
        } else if ($id == 8) {
            $job_title  =   "Compensation & Benefits";
        } else if ($id == 9) {
            $job_title  =   "Policy Development";
        }
        $this->data['active_menu'] = 'contact_us';
        $this->data['site_content'] = 'contact_us';
        // $careers = $this->news_model->get_all_news(array("news_id"=>$id));
        $this->data['subject']   =   $job_title;
        $this->data['enquiry_type']   =   'services';
        //echo $careers[0]['title'];
        //print_r($careers[0]->title); exit;
        //echo($careers->title); exit;
        // $this->send();
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
        $enquiry_type = $this->input->post('enquiry_type');
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
            $enquiry_type = $this->input->post('enquiry_type');
            if ($enquiry_type == "careers") {
                $subject = config_item('WEBSITE_TITLE') . " | Application for Careers from " . $contact_name . " On " . date('d M Y H:i');
                $subject_heading    =   "Post Applied ";
                $mail_to    =   "arul@arabinfotec.com";
                // } else if ($enquiry_type == "services") {
                //     $subject = config_item('WEBSITE_TITLE') . " | Service Request from " . $contact_name . " On " . date('d M Y H:i');
                //     $mail_to    =   "arul@arabinfotec.com";
                //     $subject_heading    =   "Service Requested ";
            } else {
                $subject = config_item('WEBSITE_TITLE') . " | Contact from " . $contact_name . " On " . date('d M Y H:i');
                $mail_to    =   "arul@arabinfotec.com";
                $subject_heading    =   "Subject ";
            }

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
