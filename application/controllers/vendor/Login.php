<?php

class Login extends CI_Controller
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
        $this->load->view('vendor/login');
    }
	function Logout(){
		    $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
  $this->session->unset_userdata('vendor');
  header("location:" . $root . "vendor/");
			die;
	}
}

?>