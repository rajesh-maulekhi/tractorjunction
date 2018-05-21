<?php

class TractorServiceCenters extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('shweta');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->database();
		      $this->load->helper('query');

    }

    function index()
    {
        $des = "Search for local and authorised tractor service centers across multiple cities in India with their address and contact details at Tractor Junction.";
        $key = "Tractor Service Centers in India, Tractor Service Centers, Tractor Service Stations, Tractor Service Stations India, Authorised Tractor Service Centers in India, Authorised Tractor Service Centers, Popular Tractor Service Centers in India";
        $meta = array(
            'meta_title' => 'Tractor Service Centers in India, Tractor Service Stations, Authorised Tractor Service Centers in India – TractorJunction',
            'meta_keywords' => $key,
            'meta_description' => $des,
            'meta_robots' => 'all',
            'extra_headers' => ''

        );

        $data = array();
        $data = array_merge($data, $meta);
        $this->session->set_userdata('pageinfo', 'more');
        $this->load->view('header', $data);
        $this->load->view('tractor_service_centers');
        $this->load->view('footer');

    }

}

?>