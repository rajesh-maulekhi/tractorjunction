<?php

class Insurance extends CI_Controller
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

 
			$meta=Meta_title_description('tractor_insurance');
  
        $data = array();
        $data = array_merge($data, $meta);
        $this->session->set_userdata('pageinfo', 'finance');
        $this->load->view('header', $data);
        $this->load->view('insurance');
        $this->load->view('footer');

    }

    function InsuranceEnd()
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        date_default_timezone_set("Asia/Kolkata");
        $date_time = $date = date('Y-m-d h:i:sa');

        $data = array(
            'type' => $this->input->post('type'),
            'regno' => $this->input->post('regno'),
            'insurance_company' => $this->input->post('insurance_company'),
            'brand' => $this->input->post('brand'),
            'model' => $this->input->post('model'),
            'regmnth' => $this->input->post('regmnth'),
            'regyear' => $this->input->post('regyear'),
            'precompany' => $this->input->post('precompany'),
            'claims' => $this->input->post('claims'),
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'mobile' => $this->input->post('mobile'),
            'date' => $date_time,
        );
        shweta_insert_form('insurance', $data);
        $this->session->set_userdata('newsesson', 'Insurance added auccessfully');
        header("Location:" . $root . "tractor-insurance");
    }

}

?>