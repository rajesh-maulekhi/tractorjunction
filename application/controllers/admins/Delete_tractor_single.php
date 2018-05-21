<?php

class Delete_tractor_single extends CI_Controller
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
        $result = array();
        $result = shweta_select('*', 'tech_specification', 'id', $this->input->post('val21'));

        foreach ($result as $value => $key) {
            $key->image;
            if ($key->image != "tractor_default.png") {
                if (file_exists("./upload/" . $key->image)) {
                    unlink('./upload/' . $key->image);
                }
            }
        }
        shweta_delete('tech_specification', 'id', $this->input->post('val21'));
        echo "successfully deleted";

    }
}

?>