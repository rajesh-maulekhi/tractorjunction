<?php

class CompareFront extends CI_Controller
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
        $this->load->view('admins/header');
        $this->load->view('admins/compareFront');
        $this->load->view('admins/footer');
    }

    function addcompareEnd()
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];

        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);


        $data = array(
            'brand' => $this->input->post('brand'),
            'tractor_id' => $this->input->post('model'),
            'sbrand' => $this->input->post('sbrand'),
            'stractor_id' => $this->input->post('smodel'),
            'status' => 1,
        );

        // if((count(shweta_select('id','compare_tractorfront','',''))) < 2){
        shweta_insert_form('compare_tractorfront', $data);
        $this->session->set_userdata('dataupdate', 'Successfully Added');

        // }else{
        // $this->session->set_userdata('dataupdate','Only two tractor add');
        // }


        header("Location:" . $_SERVER['HTTP_REFERER']);
    }

    function deleteCompare($id)
    {
        shweta_delete('compare_tractorfront', 'id', $id);
        header("Location:" . $_SERVER['HTTP_REFERER']);
    }
}

?>