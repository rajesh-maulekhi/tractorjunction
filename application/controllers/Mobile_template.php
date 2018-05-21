<?php

class Mobile_template extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('shweta');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library("pagination");
		$this->load->model("form_model");
		$this->load->model("Front_model");
    }
    function splashScreen(){
        $this->load->view('mobileTemplate/splashScreen');
    }

    function sideScreen(){
        $this->load->view('mobileTemplate/sideScreen');
    }
    function homeScreen(){
        $this->load->view('mobileTemplate/homeScreen');
    }
}

?>