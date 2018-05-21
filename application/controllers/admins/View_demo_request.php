<?php

class View_demo_request extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('shweta');
    }

    function index()
    {
        $data = $this->input->get('id');

        $result['result'] = shweta_select('*', 'demo_request', 'id', $data);

        $this->load->view('admins/header');
        $this->load->view('admins/view_demo_request', $result);
        $this->load->view('admins/footer');
    }
}

?>