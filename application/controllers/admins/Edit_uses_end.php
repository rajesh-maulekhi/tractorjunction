<?php

class Edit_uses_end extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('shweta');
        $this->load->database();
        $this->load->library('session');

    }

    function index()
    {
        $fil = array(
            'cate_name' => $this->input->post('cate_name')
        );

        shweta_update('category_tractor', $fil, 'id', $this->input->post('cate_id'));

        $this->session->set_userdata('value_inserted', 'Category Updated successfully');

        header("Location:view_uses");


    }
}

?>