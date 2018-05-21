<?php

class EmiCalculatorEnd extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('javascript');
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
        $this->load->library('image_lib');
        $this->load->database();
        $this->load->helper('shweta');
		      $this->load->helper('query');
    }

    function index()
    {

        $tractorprice = $this->input->post('tractorprice');
        $loanamount = $this->input->post('loanamount');
        $intrest = $this->input->post('intrest');
        $downpayment = $this->input->post('downpayment');

        $intrest_rate = ($loanamount * $intrest) / 100;
        $intrest_rate1 = (($loanamount * $intrest) / 100) * 2;
        $intrest_rate2 = (($loanamount * $intrest) / 100) * 3;
        $intrest_rate3 = (($loanamount * $intrest) / 100) * 4;


        $result = array();
        $result['tractorprice'] = $tractorprice;
        $result['loanamount'] = $loanamount;
        $result['intrest'] = $intrest;
        $result['downpayment'] = $downpayment;


        $result['month1'] = ($loanamount + $intrest_rate) / 12;


        $result['month2'] = ($loanamount + $intrest_rate1) / 24;
        $result['month3'] = ($loanamount + $intrest_rate2) / 36;
        $result['month4'] = ($loanamount + $intrest_rate3) / 48;

// echo "<pre>";
// print_r($result);
// die;

        $meta = array(
            'meta_title' => 'loans | TractorJunction',
            'meta_keywords' => 'keywords here',
            'meta_description' => 'description here',
            'meta_robots' => 'all',
            'extra_headers' => ''

        );
        $data = array();
        $data = array_merge($data, $meta);
        $this->session->set_userdata('pageinfo', '11');
        $this->load->view('header', $data);
        $this->load->view('loans', $result);
        $this->load->view('footer');

    }


}

?>
