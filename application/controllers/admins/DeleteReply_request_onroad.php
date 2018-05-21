<?php

class DeleteReply_request_onroad extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('shweta');
        $this->load->database();
    }

    function index()
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];

        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);


        $id = $this->input->get('id');

        shweta_delete('onroadprice', 'id', $id);
        $this->session->set_userdata('value_inserted', 'Successfully deleted');
        header("location:" . $_SERVER['HTTP_REFERER']);


    }
}

?>