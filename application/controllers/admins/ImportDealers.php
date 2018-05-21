<?php

class ImportDealers extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('shweta');
        $this->load->helper('form');
    }

    function index()
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        $this->load->view('admins/header');
        $this->load->view('admins/importdealers');
        $this->load->view('admins/footer');
    }
}

?>