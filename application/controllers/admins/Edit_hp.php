<?php

class Edit_hp extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('shweta');
    }

    function index()
    {
        $data = $this->input->post('hidden_id_edit');

        $result['result'] = shweta_select('*', 'hp', 'id', $data);

        $this->load->view("admins/header");
        $this->load->view("admins/edit_hp", $result);
        $this->load->view("admins/footer");
    }
}

?>