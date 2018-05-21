<?php

class Edit_uses extends CI_Controller
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
        $this->load->model("form_model");
        $result['result'] = shweta_select('*', 'category_tractor', 'id', $data);

        $this->load->view("admins/header");
        $this->load->view("admins/edit_uses", $result);
        $this->load->view("admins/footer");
    }
}

?>