<?php

class ViewReview extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('shweta');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library("pagination");
    }

    function index()
    {


        $result = array();
        $result['result'] = shweta_select('*', 'user_review', 'id', $this->input->get('id'));
        $this->load->view('admins/header');
        $this->load->view('admins/viewReview', $result);
        $this->load->view('admins/footer');
    }
}

?>