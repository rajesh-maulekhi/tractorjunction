<?php

class Add_brand_end extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('javascript');
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
        $this->load->library('image_lib');
        $this->load->database();
        $this->load->helper('shweta');
    }

    function index()
    {
        $type = array();
        $type_str = '';
        $type = $this->input->post('type');
        $type_str = "tractor";
        if (!empty($type)) {
            $type_str = implode($type, "$$");
        }

        if (($_FILES['picture']['name']) != "") {
            $this->load->library('upload');
            // required configuration..
            $config['file_name'] = newslugend($this->input->post('brand_name'));
            $config['upload_path'] = './upload/';
            $config['allowed_types'] = 'jpg|jpeg|gif|png';
            $config['max_size'] = 80000;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $this->upload->initialize($config);
            $this->upload->do_upload('picture');
            $upload_data = $this->upload->data();
            $image_name = $upload_data['file_name'];

        } else {
            $image_name = "default_brand.jpg";
        }


//slug
        $slug = '';
        $slug = SlugCreate('brand', $this->input->post('brand_name'));
$data_seo=array(
		'meta_title'=>(($this->input->post('meta_title'))),
		'meta_keywords'=>(($this->input->post('meta_keywords'))),
		'meta_description'=>(($this->input->post('meta_description'))),
		);
		$data_seo_tag='';
		$data_seo_tag=base64_encode(serialize($data_seo));

        $this->upload_data['picture'] = $this->upload->data();
        $file_name = $this->upload_data['picture'];
        $fil = array(
            'image' => $image_name,
            'type' => $type_str,
            'slug' => $slug,
            'seo_meta' => $data_seo_tag,
            'name' => strtolower($this->input->post('brand_name')),
            'description' => $this->input->post('brand_description'),
        );
        shweta_insert_form('brand', $fil);
        $this->session->set_userdata('value_inserted', 'Brand added successfully');
        header("Location:view_brand");

    }
}

?>
