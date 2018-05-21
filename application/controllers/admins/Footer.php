<?php

class Footer extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->helper('shweta');

    }

    function index()
    {

        $this->load->view('admins/footer');
    }
}

?>