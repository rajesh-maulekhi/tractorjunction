<?php

class Add_hp_end extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('javascript');
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->load->helper('shweta');
        $this->load->library('session');

    }

    function index()
    {
        $fil = array(
            'name' => $this->input->post('hp_name'),
            'description' => $this->input->post('hp_description'),
        );

        shweta_insert_form('hp', $fil);
        $this->session->set_userdata('value_inserted', 'HP added successfully');
        header("Location:view_hp");
    }
}

?>
