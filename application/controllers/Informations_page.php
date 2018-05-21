<?php

class Informations_page extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('shweta');
        $this->load->helper('form');
        $this->load->library('session');
		      $this->load->helper('query');
    }

    function about_us()
    {

 
		$meta=Meta_title_description('about_us');
        $data = array();
        $data = array_merge($data, $meta);
        $this->session->set_userdata('pageinfo', 'more');
        $this->load->view('header', $data);
        $this->load->view('about');
        $this->load->view('footer');

    }
	
    function guest_post()
    {

 
	$meta = array(
            'meta_title' => 'Submit Guest Post  - Tractor Junction',
            'meta_keywords' => "",
            'meta_description' => "",
            'meta_robots' => 'all',
            'extra_headers' => ''

        );
        $data = array();
        $data = array_merge($data, $meta);
        $this->load->view('header', $data);
        $this->load->view('guest_post');
        $this->load->view('footer');

    }

    function advertise()
    {
 
			$meta=Meta_title_description('advertise_with_us');
        $data = array();
        $data = array_merge($data, $meta);
        $this->load->view('header', $data);
        $this->load->view('advertise');
        $this->load->view('footer');

    }

    function career_page()
    {
        $this->session->set_userdata('pageinfo', 'more');
        $des = "Be part of something amazing by exploring career and job opportunities at TractorJunction";
        $key = "Careers at TractorJunction, Tractor, Tractors, Latest Tractors, Latest Tractor in India, Compare Tractors Online, Compare Tractors,  Tractors in India, Tractor Price in India, Tractor Brands, Tractor Information, Tractor Specification, Tractors Reviews, Tractors Features, Tractors Models, Tractor prices India, New Tractors in India, Model Tractors, Agriculture Tractor, Tractor Dealers in India, Best Tractor in India, Best Tractors in India, Tractor Info, Commercial Tractors,  Agricultural Tractors, Tractor Models, Latest Tractors in India,  New Tractors, New Tractors in India, Tractor Prices, Tractors Specification, Tractor Reviews, Tractor Features";

        $meta = array(
            'meta_title' => 'Careers at TractorJunction - TractorJunction',
            'meta_keywords' => $key,
            'meta_description' => $des,
            'meta_robots' => 'all',
            'extra_headers' => ''

        );
        $data = array();
        $data = array_merge($data, $meta);
        $this->load->view('header', $data);
        $this->load->view('career');
        $this->load->view('footer');

    }


    function Contact_us()
    {
        $this->session->set_userdata('pageinfo', 'more');
        $des = "Be part of something amazing by exploring career and job opportunities at TractorJunction";
        $key = "Careers at TractorJunction, Tractor, Tractors, Latest Tractors, Latest Tractor in India, Compare Tractors Online, Compare Tractors,  Tractors in India, Tractor Price in India, Tractor Brands, Tractor Information, Tractor Specification, Tractors Reviews, Tractors Features, Tractors Models, Tractor prices India, New Tractors in India, Model Tractors, Agriculture Tractor, Tractor Dealers in India, Best Tractor in India, Best Tractors in India, Tractor Info, Commercial Tractors,  Agricultural Tractors, Tractor Models, Latest Tractors in India,  New Tractors, New Tractors in India, Tractor Prices, Tractors Specification, Tractor Reviews, Tractor Features";

        $meta = array(
            'meta_title' => 'Best Tractors in India, Tractor Price in India, Tractor Brands, Tractor Models, Compare Tractors Online - TractorJunction',
            'meta_keywords' => $key,
            'meta_description' => $des,
            'meta_robots' => 'all',
            'extra_headers' => ''

        );
        $data = array();
        $data = array_merge($data, $meta);
        $this->load->view('header', $data);

        $this->load->view('contact');
        $this->load->view('footer');

    }

    function Policy()
    {
        $this->session->set_userdata('pageinfo', 'more');
 
			$meta=Meta_title_description('privacy_policy');
        $data11 = array();
        $data11 = array_merge($data11, $meta);
        $this->load->view('header', $data11);
        $this->load->view('policy');
        $this->load->view('footer');

    }

    function termcondition()
    {
        $this->session->set_userdata('pageinfo', 'more');
        $des = "TractorJunction is committed to protecting the privacy and personal information that visitors may provide for information purposes. This information is necessary in order to provide appropriate service. Our visitor’s information will only be used for their query purposes and will not be distributed, sold or rented to any third party involuntarily.";
        $key = "Privacy Policy of TractorJunction, Tractor, Tractors, Latest Tractors, Latest Tractor in India, Compare Tractors Online, Compare Tractors,  Tractors in India, Tractor Price in India, Tractor Brands, Tractor Information, Tractor Specification, Tractors Reviews, Tractors Features, Tractors Models, Tractor prices India, New Tractors in India, Model Tractors, Agriculture Tractor, Tractor Dealers in India, Best Tractor in India, Best Tractors in India, Tractor Info, Commercial Tractors,  Agricultural Tractors, Tractor Models, Latest Tractors in India,  New Tractors, New Tractors in India, Tractor Prices, Tractors Specification, Tractor Reviews, Tractor Features";

        $meta = array(
            'meta_title' => 'tern and condition- TractorJunction ',
            'meta_keywords' => $key,
            'meta_description' => $des,
            'meta_robots' => 'all',
            'extra_headers' => ''

        );
        $data11 = array();
        $data11 = array_merge($data11, $meta);
        $this->load->view('header', $data11);
        $this->load->view('termCondition');
        $this->load->view('footer');

    }


}

?>