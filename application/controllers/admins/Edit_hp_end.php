<?php

class Edit_hp_end extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('shweta');
        $this->load->database();
        $this->load->library('session');

    }

    function index()
    {
        $fil = array(
            'name' => $this->input->post('hp_name'),
            'description' => $this->input->post('hp_description'),
        );

        shweta_update('hp', $fil, 'id', $this->input->post('hp_id'));

        $this->session->set_userdata('value_inserted', 'HP Updated successfully');

        header("Location:view_hp");


    }
}

?>