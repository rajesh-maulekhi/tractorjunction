<?php

class ActivateReview extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->helper('shweta');
        $this->load->database();
    }

    function index()
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];

        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);


        $data = array(
            'status' => '1',
        );
        shweta_update('user_review', $data, 'id', $this->input->get('id'));
        $this->session->set_userdata('value_inserted', 'Successfully Activated');
        header("Location:" . $root . "admins/View_reviews");
    }

    function deactivate()
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];

        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);


        $data = array(
            'status' => '0',
        );
        shweta_update('user_review', $data, 'id', $this->input->get('id'));
        $this->session->set_userdata('value_inserted', 'Successfully Dectivated');
        header("Location:" . $root . "admins/View_reviews");
    }
}

?>