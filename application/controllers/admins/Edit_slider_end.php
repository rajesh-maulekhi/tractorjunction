<?php

class Edit_slider_end extends CI_Controller
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


        if ($_FILES['picture']['name'] != "") {
            if (file_exists("./upload/" . $this->input->post('slider_image'))) {
                unlink('./upload/' . $this->input->post('slider_image'));
            }
            $this->load->library('upload');
            // required configuration.
            $config['file_name'] = newslugend($this->input->post('slider_caption'));
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
            $image_name = $this->input->post('slider_image');
        }


        $fil = array(
            'image' => $image_name,
            'slider_caption' => $this->input->post('slider_caption'),
            'slider_sub_caption' => $this->input->post('slider_sub_caption'),
            'read_link' => $this->input->post('read_link'),
        );


        shweta_update('slider', $fil, 'id', $this->input->post('slider_id'));

        $this->session->set_userdata('value_inserted', 'Slider Updated successfully');

        header("Location:view_slider");


    }
}

?>