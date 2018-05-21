<?php

class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('shweta');
        // $this->load->helper('query');

        $this->load->helper('form');
    }

    function index()
    {

        $this->load->view('admins/header');
        $this->load->view('admins/home');
        $this->load->view('admins/footer');
    }
}

?>