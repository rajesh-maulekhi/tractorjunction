<?php

class EmiCalculator extends CI_Controller
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
        $meta = array(
            'meta_title' => 'Tractor Loan EMI calculator | TractorJunction',
            'meta_keywords' => 'keywords here',
            'meta_description' => 'description here',
            'meta_robots' => 'all',
            'extra_headers' => ''

        );
        $data = array();
        $data = array_merge($data, $meta);
        $this->session->set_userdata('pageinfo', '11');
        $this->load->view('header', $data);
        $this->load->view('loans');
        $this->load->view('footer');

    }

}

?>