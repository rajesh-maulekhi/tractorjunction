<?php

class Edit_tractor extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('shweta');

    }

    function EditTra($id)
    {
        $data = $id;
        $this->load->model("form_model");
        $result['result'] = shweta_select('*', 'tech_specification', 'id', $data);

        $this->load->view("admins/header");
        $this->load->view("admins/edit_tractor", $result);
        $this->load->view("admins/footer");
    }
}

?>