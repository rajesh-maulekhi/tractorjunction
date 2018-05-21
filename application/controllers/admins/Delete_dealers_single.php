<?php

class Delete_dealers_single extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('shweta');
        $this->load->helper('form');
    }

    function index()
    {


        shweta_delete('dealers', 'id', $this->input->post('val21'));

        echo "successfully deleted";


    }
}

?>