<?php

class Edit_offer extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('shweta');
    }

    function index()
    {
        $data = $this->input->get('id1');

        $result['result'] = shweta_select('*', 'offer', 'id', $data);

        $this->load->view("admins/header");
        $this->load->view("admins/edit_offer", $result);
        // $this->load->view("admins/footer");
    }
}

?>