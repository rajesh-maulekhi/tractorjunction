<?php

class Logout extends CI_Controller
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
        $this->load->library('session');

        $this->session->unset_userdata('admin');

        $this->load->view('admins/login');

    }
}

?>