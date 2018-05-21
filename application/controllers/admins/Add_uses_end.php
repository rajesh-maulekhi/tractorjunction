<?php

class Add_uses_end extends CI_Controller
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
        $data = array(
            'cate_name' => $this->input->post('cate_name'),
        );

        shweta_insert_form('category_tractor', $data);
        $this->session->set_userdata('value_inserted', 'Category added successfully');
        header("Location:view_uses");

    }


}

?>
