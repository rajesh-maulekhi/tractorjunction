<?php

class Edit_brand_end extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('upload');
        $this->load->library('image_lib');

        $this->load->helper('form');
        $this->load->helper('shweta');
        $this->load->database();
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
            $rand = rand(999, 99999);
            $config['file_name'] = newslugend($this->input->post('brand_name') . $rand);
            $config['upload_path'] = './upload/';
            $config['allowed_types'] = 'jpg|jpeg|gif|png';
            $config['max_size'] = 80000;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $this->upload->initialize($config);
            $this->upload->do_upload('picture');
            $upload_data = $this->upload->data();
            $image_name = $upload_data['file_name'];

            if ($this->input->post('image') != "default_brand.jpg") {
                if (file_exists("./upload/" . $this->input->post('image'))) {
                    unlink('./upload/' . $this->input->post('image'));
                }

            }
        } else {
            $image_name = $this->input->post('image');
        }
        $slug = '';
        $slug = SlugEditPage('brand', $this->input->post('brand_name'), $this->input->post('old_slug'));
		$data_seo=array(
		'meta_title'=>(($this->input->post('meta_title'))),
		'meta_keywords'=>(($this->input->post('meta_keywords'))),
		'meta_description'=>(($this->input->post('meta_description'))),
		);
		$data_seo_tag='';
		$data_seo_tag=base64_encode(serialize($data_seo));

        $data = array(
            'name' => strtolower($this->input->post('brand_name')),
            'slug' => $slug,
            'type' => $type_str,
            'seo_meta' => $data_seo_tag,
            'image' => $image_name
        );

        shweta_update('brand', $data, 'id', $this->input->post('model_id'));

        $this->session->set_userdata('value_inserted', 'Brand Updated successfully');

        header("Location:view_brand");


    }
}

?>