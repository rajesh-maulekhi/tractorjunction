<?php

class Reply_request_onroad extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('shweta');
    }

    function index()
    {
        $data = $this->input->get('id');

        $result['result'] = shweta_select('*', 'onroadprice', 'id', $data);

        $this->load->view('admins/header');
        $this->load->view('admins/reply_request_onroad', $result);
        $this->load->view('admins/footer');
    }
}

?>