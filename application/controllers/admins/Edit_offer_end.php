<?php

class Edit_offer_end extends CI_Controller
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

        if (($_FILES['picture']['name']) != "") {
            $rand_no = rand(99, 999);
            $image_name = "imageoffer" . $rand_no . ".jpg";

            $_FILES['picture']['name'] = $image_name;
            $this->load->library('upload');
            // required configuration.
            $config['upload_path'] = './upload/offer/';
            $config['allowed_types'] = 'jpg|jpeg|gif|png';
            $config['max_size'] = 80000;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $this->upload->initialize($config);
            $this->upload->do_upload('picture');


            if (file_exists("./upload/offer/" . $this->input->post('image'))) {
                unlink('./upload/offer/' . $this->input->post('image'));
            }

        } else {
            $image_name = $this->input->post('image');
        }

        $fil = array(
            'image' => $image_name,
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'exp_date' => $this->input->post('endDate'),
        );


        shweta_update('offer', $fil, 'id', $this->input->post('model_id'));

        $this->session->set_userdata('value_inserted', 'offer Updated successfully');

        header("Location:view_offer");


    }
}

?>