<?php

class TractorCustomerCare extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('shweta');
        $this->load->helper('form');
        $this->load->library('session');
		      $this->load->helper('query');
    }

    function index()
    {
 
			$meta=Meta_title_description('tractor_customer_care');
        $data = array();
        $data = array_merge($data, $meta);
        $this->session->set_userdata('pageinfo', 'more');
        $this->load->view('header', $data);
        $this->load->view('tractor_customer_care');
        $this->load->view('footer');

    }

}

?>