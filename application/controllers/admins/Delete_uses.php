<?php

class Delete_uses extends CI_Controller
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
        foreach ($this->input->post('val1') as $p) {
            shweta_delete('category_tractor', 'id', $p);

        }
        echo "successfully deleted";


    }
}

?>