<?php

class DealershipEnquiry extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('shweta');
        $this->load->helper('form');
        $this->load->library('session');
		      $this->load->helper('query');
        $this->load->database();
    }

    function index()
    {

 
			$meta=Meta_title_description('tractor_dealership_enquiry');
        $data = array();
        $data = array_merge($data, $meta);
        $this->session->set_userdata('pageinfo', 'more');
        $this->load->view('header', $data);
        $this->load->view('dealershipEnquiryform');
        $this->load->view('footer');

    }

    function DealershipEnquiryEnd()
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        date_default_timezone_set("Asia/Kolkata");
        $date_time = $date = date('Y-m-d h:i:sa');
        $data = array(
            'name' => $this->input->post('name'),
            'city' => $this->input->post('city'),
            'state' => $this->input->post('state'),
            'mobile' => $this->input->post('mobile'),
            'email' => $this->input->post('email'),
            'brand' => $this->input->post('brand'),
            'model' => $this->input->post('model'),
            'date' => $date_time,
        );

//mail sent
        $nameHeader = $this->input->post('email');
        $lineSecond = 'We will contact you as soon as possible...';
        $lineFirst = 'Thank You! Your Dealearship enquiry request is submited in Tractor junction';
        $otherInfo = array();
        $message = sentMailFunction($nameHeader, $lineFirst, $lineSecond, $otherInfo);

        $subject = "Dealearship Enquiry";
        MailSentNow($message, $subject, $nameHeader);


        shweta_insert_form('dealership_enquiry', $data);
        $this->session->set_userdata('newsesson', 'Dealership Request apply successfully');
        header("Location:" . $root . "tractor-dealership-enquiry");
    }

}

?>