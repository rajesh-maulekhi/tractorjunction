<?php

class Add_popular_tractor_ajax extends CI_Controller
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
    }

    function index()
    {
        $id_val = $this->input->post('id12');
        $p_val = $this->input->post('value12');
        $data = array(
            'popular' => $p_val
        );
        shweta_popular('tech_specification', $data, 'id', $id_val);
        $this->session->set_userdata('p_add', "Successfully Updated");

    }

    function PriceChangeShow()
    {
        $id_val = $this->input->post('id12');
        $p_val = $this->input->post('value12');
        $data = array(
            'priceShow' => $p_val
        );
        shweta_popular('tech_specification', $data, 'id', $id_val);
        $this->session->set_userdata('p_add', "Successfully Updated");

    }

    function latest()
    {
        $id_val = $this->input->post('id12');
        $p_val = $this->input->post('value12');
        $data = array(
            'latest' => $p_val
        );
// print_r($data);
        shweta_popular('tech_specification', $data, 'id', $id_val);
        $this->session->set_userdata('p_add', "Successfully Updated");

    }
}

?>
