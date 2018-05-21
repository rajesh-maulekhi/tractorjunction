<?php

class Offer extends CI_Controller
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
        // $id = $this->input->post('id_val');
        $this->session->set_userdata('pageinfo', 'offer');
// $result['result'] = shweta_select('*','tech_specification','id',$id);
 
			$meta=Meta_title_description('special_tractor_offers');
        $data11 = array();
        $data11 = array_merge($data11, $meta);
        $this->load->view('header', $data11);
        $this->load->view('offer');
        $this->load->view('footer');

    }

}

?>