<?php

class Password_change extends CI_Controller
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
        $this->load->view('admins/header');
        $this->load->view('admins/password_change');
        $this->load->view('admins/footer');
    }
}

?>