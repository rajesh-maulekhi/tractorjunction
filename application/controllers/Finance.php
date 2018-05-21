<?php

class Finance extends CI_Controller
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

 
			$meta=Meta_title_description('tractor_finance');
  
        $data = array();
        $data = array_merge($data, $meta);
        $this->session->set_userdata('pageinfo', 'finance');
        $this->load->view('header', $data);
        $this->load->view('finance');
        $this->load->view('footer');

    }

    function SingleScheme($id,$slug)
    {
   $result['finance_result'] = shweta_select('*', 'scheme', 'id', $id);
 $result['type']=$slug;
 $meta_title=$result['finance_result'][0]->title." - Tractorjunction";
		$meta = array(
		'meta_title' => $meta_title,
		'meta_keywords' => "",
		'meta_description' => "",
		'meta_robots' => 'all',
		'extra_headers' => ''
	);
        $data = array();
        $data = array_merge($data, $meta);
        $this->session->set_userdata('pageinfo', 'finance');
        $this->load->view('header', $data);
        $this->load->view('single_scheme',$result);
        $this->load->view('footer');

    }

    function FinanceEnd()
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        date_default_timezone_set("Asia/Kolkata");
        $date_time = $date = date('Y-m-d h:i:sa');
        $data = array(
            'type' => $this->input->post('type'),
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'contact' => $this->input->post('contact'),
            'state' => $this->input->post('state'),
            'city' => $this->input->post('city'),
            'financeamt' => $this->input->post('financeamt'),
            'address' => $this->input->post('address'),
            'date' => $date_time,
        );



        shweta_insert_form('finance', $data);
        $this->session->set_userdata('newsesson', 'Your request submitted succefully. we will contact you as soon as possible...!');
        header("Location:" . $root . "tractor-finance");
    }

}

?>