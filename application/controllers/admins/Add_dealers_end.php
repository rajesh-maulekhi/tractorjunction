<?php

class Add_dealers_end extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('javascript');
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
        $this->load->library('image_lib');
        $this->load->database();
        $this->load->helper('shweta');
    }

    function index()
    {
        $data = array(
            'state' => $this->input->post('state'),
            'city' => $this->input->post('city'),
            'name_de' => $this->input->post('name'),
            'authorize' => $this->input->post('authorize'),
            'contact' => $this->input->post('contact'),
            'address' => $this->input->post('address'),
            'pin' => $this->input->post('pin'),
        );

        shweta_insert_form('dealers', $data);
        $this->session->set_userdata('value_inserted', 'Dealer added successfully');
        header("Location:view_dealers");

    }


}

?>
