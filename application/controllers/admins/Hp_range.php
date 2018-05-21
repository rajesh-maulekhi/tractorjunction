<?php

class Hp_range extends CI_Controller
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
        $this->load->view('admins/header');
        $this->load->view('admins/hp_range');
        $this->load->view('admins/footer');

    }

    function hp_range_insert()
    {
        $data = array();
        for ($i = 1; $i < 6; $i++) {
            if ($i == 1) {
                $data[$i]['id'] = $i;
                $data[$i]['first'] = 1;
                $data[$i]['second'] = $this->input->post('second' . $i);
            } else {
                $data[$i]['id'] = $i;
                $data[$i]['first'] = $this->input->post('first' . $i);
                $data[$i]['second'] = $this->input->post('second' . $i);
            }
        }

        $this->load->model("form_model");
        $this->form_model->update_hp_range($data);


    }
}

?>