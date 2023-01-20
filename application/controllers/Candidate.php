<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Candidate extends CO_Web_Controller
{
    public $country_list = '';
    function __construct()
    {
        parent::__construct();
        $this->load->model('Candidate_model', 'candidate_model');
        $this->load->model('News_model', 'news_model');
        $this->load->model('Country_model', 'country_model');
        $this->load->helper('file_upload');
        $meta =  '<title>Best Hiring Consultancy in UAE | Manpower Recruitment Agency UAE</title>
        <meta name="description" content="We are the best Manpower Recruitment Agency in UAE collaborates with our clients to find the most qualified people. We Provide Professional Services to clients." />
        <meta name="keywords" content="best hiring consultancy in uae, hiring consultancy in ajman, best manpower recruitment agency, manpower recruitment agency in uae, international manpower supply consultancy, international manpower supply consultancy in middle east" />
        <link rel="canonical" href= "https://www.creativehrc.com/contact-us"/>';
        $this->config->set_item('META', $meta);
        $this->country_list = $this->country_model->get_countries();
    }

    public function index()
    {
        $this->data['active_menu'] = 'candidate';
        $this->data['site_content'] = 'candidate';
        $this->data['subject']   =   '';
        $this->load->view('web/content', $this->data);
    }

    public function post($id = '')
    {
        $this->data['active_menu'] = 'candidate';
        $this->data['site_content'] = 'candidate';
        $careers = $this->news_model->get_all_news(array("news_id" => $id));
        $this->data['career_id']   =   $id;
        $this->data['subject']   =   $careers[0]->title;
        $this->data['country_list'] = $this->country_list;
        $this->data['gender'] = "";
        $this->data['country'] = "";
        $this->load->view('web/content', $this->data);
    }

    public function send()
    {
        // echo "<pre>"; print_r($this->input->post()); echo "</pre>";exit;
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('country', 'Nationality', 'trim|required');
        $this->form_validation->set_rules('phonecode', 'Country Code', 'trim|required');
        $this->form_validation->set_rules('phone', 'Mobile With WhatsApp', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback__email_exist[' . $this->input->post('career_id') . ']');
        //$this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('current_loc', 'Current Location', 'trim|required');
        $this->form_validation->set_rules('notice_period', 'Notice Period', 'trim|required');
        $this->form_validation->set_rules('join_now', 'Can You Join Immediately', 'trim|required');

        $this->form_validation->set_rules('subject', 'Post', 'trim|required');
        $this->form_validation->set_rules('job_role', 'Job Role', 'trim');
        if ($this->form_validation->run() === TRUE) {

            $success_array = $this->candidateRegister(); // This is to save into db
            if ($success_array['success']) {
                $contact_name = $this->input->post('name');
                $company_name = $this->input->post('company_name');
                $contact_email = $this->input->post('email');
                $contact_phonecode = $this->input->post('phonecode');
                $contact_phone = $this->input->post('phone');
                $contact_message = "Job Role :" . $this->input->post('job_role');
                $contact_message .= "<br/><br/><br/><br/>Regards,<br/><br/>";
                if ($contact_name) {
                    $contact_message .= $contact_name . "<br/>";
                }
                if ($company_name) {
                    $contact_message .= $company_name . "<br/>";
                }
                $contact_message .= $contact_email . "<br/>";
                if ($contact_phone) {
                    $contact_message .= $contact_phonecode . ' ' . $contact_phone . "<br/>";
                }

                $subject = config_item('WEBSITE_TITLE')." | Resume for Careers from " . $contact_name . " On " . date('d M Y H:i');
                $subject_heading    =   "Post Applied ";
                //$mail_to    =   "careers@creativehrc.com";
                $mail_to    =   "sinaj@vstbiz.com";

                $contact_subject = $this->input->post('subject');
                if ($contact_subject) {
                    $contact_message .= "<br/> $subject_heading: " . $contact_subject . "<br/><br/>";
                }
                $this->data['message'] = $contact_message;
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

                $this->email->from('mailer@demo.arabinfotec.com', config_item('WEBSITE_TITLE').'');
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
                // if ($this->email->send()) {
                $arry = array();
                $arry['success'] = true;
                $arry['message'] = "<span style='color:green; font-weight:bold'>Your message has been successfully sent. We will contact you very soon!.</span>";
                redirect("success.php?type=candidate&lang=".$_SESSION['lang']);

                // } else {
                //     $arry = array();
                //     $arry['success'] = false;
                //     $error_message = "<span style='color:red; font-weight:bold'>Something went wrong, Please try again.</span>";
                // }
            } else {
                $arry = array();
                $arry['success'] = false;
                $error_message = $success_array['error'];
            }
        } else {
            $arry = array();
            $arry['success'] = false;
            $msg = $this->data['web_labels']['REQUIRED_FIELDS'];
            $error_message = "<span style='color:#f52020; font-weight:bold;'>" . $msg . "</span>";
        }

        $this->data['career_id'] = $this->input->post('career_id');
        $this->data['subject'] = $this->input->post('subject');
        $this->data['gender'] = $this->input->post('gender');
        $this->data['country'] = $this->input->post('country');
        $this->data['notice_period'] = $this->input->post('notice_period');
        $this->data['join_now'] = $this->input->post('join_now');
        $this->data['error_message'] = $error_message;
        $this->data['country_list'] = $this->country_list;
        $this->data['active_menu'] = 'candidate';
        $this->data['site_content'] = 'candidate';
        $this->load->view('web/content', $this->data);
        // $this->data['site_content'] = 'candidate';
        // $this->load->view('web/content', $this->data);
    }

    /*
    *   This is to check whether a candidate already registered for a post. (Form Validation)
    */
    function _email_exist($email, $career_id)
    {
        $result = [];
        if ($email && $career_id) {
            $result = $this->candidate_model->checkEmailExist($email, $career_id);
        }

        if (count($result) > 0) {
            $this->form_validation->set_message('_email_exist', 'Your CV is already present in our database. We will check and get back to you');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function candidateRegister()
    {
        $success_arry = [];
        $success_arry['success'] = true;
        $continue = true;
        $file_name = '';

        $config = array();
        $config['upload_path'] = 'assets/uploads/career';
        $config['allowed_types'] = 'pdf|jpg|jpeg|png';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = config_item('MAX_IMG_FILE_SIZE');
        if (!empty($_FILES['resume_file']['name'])) {
            $file_info = array('field_name' => 'resume_file', 'file' => &$_FILES['resume_file']);
            $upload_result = file_upload($file_info, $config);
            if (!$upload_result['error']) {
                $file_name = $upload_result['file_name'];
            } else {
                $success_arry['success'] = false;
                $success_arry['error'] = $upload_result['error_msg'];
                $continue = false;
            }
        } else {
            $success_arry['success'] = false;
            $success_arry['error'] = "Please upload an updated resume";
            $continue = false;
        }

        if ($continue) {
            $input_data = [];
            $input_data['full_name'] = $this->input->post('name');
            //$input_data['address'] = $this->input->post('address');
            $input_data['current_loc'] = $this->input->post('current_loc');
            $input_data['company'] = $this->input->post('company_name');
            $input_data['email'] = $this->input->post('email');
            $input_data['phonecode'] = $this->input->post('phonecode');
            $input_data['phone'] = $this->input->post('phone');
            $input_data['gender'] = $this->input->post('gender');
            $input_data['country'] = $this->input->post('country');
            $input_data['join_now'] = $this->input->post('join_now');
            $input_data['notice_period'] = $this->input->post('notice_period');
            $input_data['career_id'] = $this->input->post('career_id');
            $input_data['post'] = $this->input->post('subject');
            $input_data['job_role'] = $this->input->post('job_role');
            $input_data['experience'] = $this->input->post('experience');
            $input_data['resume'] = $file_name;
            $input_data['created_at'] = date('Y-m-d H:i:s');
            $input_data['updated_at'] = date('Y-m-d H:i:s');
            $input_data['active'] = 1;
            if (!$this->candidate_model->add($input_data)) {
                $success_arry['success'] = false;
                $success_arry['error'] = 'Something wrong. Please try again.';
            }
        }

        return $success_arry;
    }
}
