<?php

class View_offer extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('shweta');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library("pagination");
    }

    function index()
    {


        $this->load->view('admins/header');
        $this->load->view('admins/view_offer');
        $this->load->view('admins/footer');
    }
}

?>