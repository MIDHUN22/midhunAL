<?php



defined('BASEPATH') or exit('No direct script access allowed');

class SegmentsAdmin extends CO_Panel_Controller
{

    public function __construct()
    {
        parent::__construct();
        //loading models
        $this->load->model('Segments_model', 'segments_model');
        $this->load->model('Language_model', 'language_model');
        //loading helpers
        $this->load->helper('file_upload');
        $this->load->helper('image_upload');
        $this->data['brandImgError'] = '';
        //configuration
        $controller_config = array();
        $controller_config['disable_segments_img'] = FALSE;
        $controller_config['disable_brand_link'] = TRUE;
        $controller_config['disable_segments_description'] = FALSE;
        $controller_config['disable_segments_languages'] = FALSE;
        $this->data['controller_config'] = $controller_config;
    }

    public function index()
    {
        redirect('panel/segmentsadmin/all', 'refresh');
    }

    public function all()
    {

        //Brands list view
        $filter = array();
        $this->form_validation->set_rules('filterBrandCreatedAt', 'created at', 'trim');
        $this->form_validation->set_rules('filterBrandName', 'name', 'trim');
        $filter['language'] = 1;
        if ($this->form_validation->run() === TRUE) {
            //filter the result based on search
            $filter['name'] = $this->input->post('filterBrandName');
            if ($this->input->post('filterBrandCreatedAt') != '') {
                $filterBrandCreatedAt = explode('-', $this->input->post('filterBrandCreatedAt'));
                if (!empty($filterBrandCreatedAt[0])) {
                    $filterBrandCreatedAt[0] = str_replace('/', '-', $filterBrandCreatedAt[0]);
                    $filter['from_created_at'] = strtotime($filterBrandCreatedAt[0]);
                }
                if (!empty($filterBrandCreatedAt[1])) {
                    $filterBrandCreatedAt[1] = str_replace('/', '-', $filterBrandCreatedAt[1]);
                    $filter['to_created_at'] = strtotime($filterBrandCreatedAt[1]);
                }
            }
        }

        $filter['show_active_inactive'] = true;
        $this->data['segments'] = $this->segments_model->get_all($filter);
        $this->data['active_menu'] = 'segments';
        $this->data['site_content'] = 'segments';
        $this->load->view('panel/content', $this->data);
        // echo "<pre>";
        // print_r($this->data);
        // exit;
    }

    public function add($lang = 1)
    {
        //add brand
        $current_language = $this->language_model->get_language($lang);
        $this->form_validation->set_rules('title', 'title', 'trim|required');
        $this->form_validation->set_rules('short_description', 'short_description', 'trim|required');
        $this->form_validation->set_rules('description', 'description', 'trim|max_length[13]');



        // $this->form_validation->set_rules('brandDescription', 'description', 'trim');
        // $this->form_validation->set_rules('brandLink', 'link', 'trim');
        if ($this->form_validation->run() === TRUE) {
            $input_data = array();
            $no_error = TRUE;
            $input_data['title'] = $this->input->post('title');
            $input_data['short_description'] = $this->input->post('short_description');
            $input_data['description'] = $this->input->post('description');

            $input_data['created_at'] = time();
            $input_data['created_by'] = $_SESSION['user_id'];
            $input_data['active'] = 1;
            // $input_data['link'] = $this->input->post('brandLink');
            // $input_data['language'] = $lang;
            $config = array();
            $config['upload_path'] = 'assets/uploads/segments';
            $config['allowed_types'] = 'png|jpeg|jpg';
            $config['encrypt_name'] = TRUE;
            $config['max_size'] = config_item('MAX_IMG_FILE_SIZE');
            if (!empty($_FILES['brandImg']) && $_FILES['brandImg']['error'] == 0) {
                $file_info = array('field_name' => 'brandImg', 'file' => &$_FILES['brandImg']);
                $upload_result = image_upload($file_info, $config, FALSE, TRUE);
                if (!$upload_result['error']) {
                    $file_name = $upload_result['file_name'];
                    $input_data['image'] = $file_name;
                } else {
                    $this->data['brandImgError'] = $upload_result['error_msg'];
                    $no_error = FALSE;
                }
            }

            if ($no_error == TRUE) {
                $brand_id = $this->segments_model->add($input_data);
                if ($brand_id <= 0) {
                    $no_error = FALSE;
                }
            }

            if ($no_error == FALSE) {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
            } else {
                $this->session->set_flashdata('success', 'Saved successfully.');
                redirect('panel/segmentsadmin/all', 'refresh');
            }
        }
        $this->data['current_language'] = $current_language;
        $this->data['active_menu'] = 'segments';
        $this->data['site_content'] = 'add_segments';
        $this->load->view('panel/content', $this->data);
    }

    public function edit($id, $lang = 1)
    {
        //edit brand based on language
        $language_parent = '';
        if ($id > 0 && $lang == '1') {
            $parent_brand = $this->segments_model->get($id, '', true);
            $brand = $parent_brand;
        } else if ($id > 0 && $lang > 0) {
            $parent_brand = $this->segments_model->get($id, '', true);
            if ($parent_brand) {
                $language_parent = $id;
                $brand = $this->segments_model->get_by_parent($id, $lang, true);
            }
        } else {
            redirect('panel/segmentsadmin/all', 'refresh');
        }

        $current_language = $this->language_model->get_language($lang);
        if (!$parent_brand || !$current_language) {
            redirect('panel/segmentsadmin/all', 'refresh');
        }

        //disabling feature based on language
        if ($lang != 1) {
            $this->data['controller_config']['disable_brand_img'] = TRUE;
            $this->data['controller_config']['disable_brand_link'] = TRUE;
        }

        $filter = array();
        $filter['status'] = 1;
        $filter['for_site'] = 1;

        $languages = $this->language_model->get_languages($filter);

        //$brand_languages = $this->segments_model->get_languages($id);

        $this->form_validation->set_rules('title', 'title', 'trim|required');
        $this->form_validation->set_rules('short_description', 'short_description', 'trim');
        $this->form_validation->set_rules('description', ' description', 'trim');

        $this->form_validation->set_rules('brandStatus', ' status', 'required');


        if ($this->form_validation->run() === TRUE) {
            $input_data = array();
            $no_error = TRUE;
            $input_data['title'] = $this->input->post('title');
            $input_data['short_description'] = $this->input->post('short_description');
            $input_data['description'] = $this->input->post('description');

            // $input_data['description'] = $this->input->post('brandDescription');
            // $input_data['language'] = $lang;
            // $input_data['active'] = $this->input->post('brandStatus');
            // $input_data['link'] = $this->input->post('brandLink');
            // if ($lang != 1) {
            //     $input_data['language_parent'] = $language_parent;
            // } else {
            //     $input_data['language_parent'] = '';
            // }


            $config = array();
            $config['upload_path'] = 'assets/uploads/segments';
            $config['allowed_types'] = 'png|jpeg|jpg';
            $config['encrypt_name'] = TRUE;
            $config['max_size'] = config_item('MAX_IMG_FILE_SIZE');
            if (!empty($_FILES['brandImg']) && $_FILES['brandImg']['error'] == 0) {
                $file_info = array('field_name' => 'brandImg', 'file' => &$_FILES['brandImg']);
                $upload_result = image_upload($file_info, $config, FALSE, TRUE);
                if (!$upload_result['error']) {
                    $file_name = $upload_result['file_name'];
                    if (file_exists('./assets/uploads/segments/' . $brand->image) && !empty($brand->image)) {
                        unlink('./assets/uploads/segments/' . $brand->image);
                        unlink('./assets/uploads/segments/thumb_' . $brand->image);
                    }
                    $input_data['image'] = $file_name;
                } else {
                    $this->data['brandImgError'] = $upload_result['error_msg'];
                    $no_error = FALSE;
                }
            }

            if ($no_error == TRUE) {
                if ($brand) {
                    $input_data['updated_at'] = time();
                    $input_data['updated_by'] = $_SESSION['user_id'];
                    // echo "<pre>";
                    // print_r($input_data);
                    // exit;
                    $this->segments_model->add($input_data, $id);
                } else {
                    $input_data['created_at'] = time();
                    $input_data['created_by'] = $_SESSION['user_id'];
                    $this->segments_model->add($input_data);
                }
            }
            if ($no_error == FALSE) {
                $this->session->set_flashdata('error', 'Something went wrong, Please try again.');
            } else {
                $this->session->set_flashdata('success', 'Saved successfully.');
                redirect('panel/segmentsadmin/edit/' . $id . '/' . $lang, 'refresh');
            }
        }
        $this->data['brand_languages'] = explode(',', $brand_languages->languages);
        $this->data['brand'] = $brand;

        $this->data['languages'] = $languages;
        $this->data['current_language'] = $current_language;
        $this->data['id'] = $id;
        $this->data['lang'] = $lang;
        $this->data['active_menu'] = 'segments';

        $this->data['site_content'] = 'edit_segmemts';
        // echo "<pre>";
        // print_r($this->data);
        // exit;
        $this->load->view('panel/content', $this->data);
    }

    public function delete_brand_img($id, $lang = '1')
    {
        //edit brand based on language
        if ($id > 0 && $lang == '1') {
            $brand = $this->segments_model->get($id);
        } else if ($id > 0 && $lang > 0) {
            $brand = $this->segments_model->get_by_parent($id, $lang);
        } else {
            redirect('panel/brand/all', 'refresh');
        }
        if (file_exists('./assets/uploads/segments/' . $brand->image) && !empty($brand->image)) {
            unlink('./assets/uploads/segments/' . $brand->image);
            unlink('./assets/uploads/segments/thumb_' . $brand->image);
        }
        $input_data['image'] = '';
        $this->segments_model->add($input_data, $brand->id);
        $this->session->set_flashdata('success', 'Image deleted successfully.');
        redirect('panel/segmentsadmin/edit/' . $id . '/' . $lang, 'refresh');
    }

    public function delete($id, $lang = '1')
    {

        if ($id > 0 && $lang == '1') {

            $brand = $this->segments_model->get($id);

            if ($id > 0 && $lang > 0) {
                $this->segments_model->disable($id);
            }
        }
        $this->session->set_flashdata('success', 'Brand deleted successfully.');
        redirect('panel/segmentsadmin/all', 'refresh');
    }
}