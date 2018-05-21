<?php

class Delete_uses_single extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();

        $this->load->helper('shweta');
        $this->load->helper('form');
    }

    function index()
    {
        shweta_delete('category_tractor', 'id', $this->input->post('val21'));


        echo "successfully deleted";


    }
}

?>