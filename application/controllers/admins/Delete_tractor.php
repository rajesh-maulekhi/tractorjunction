<?php

class Delete_tractor extends CI_Controller
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
        foreach ($this->input->post('val1') as $p) {
            $result[] = shweta_select('*', 'tech_specification', 'id', $p);
            shweta_delete('tech_specification', 'id', $p);
        }
        foreach ($result as $value => $key) {
            foreach ($key as $value1 => $key1) {
                if ($key1->image != "tractor_default.png") {
                    if (file_exists("./upload/" . $key1->image)) {
                        unlink('./upload/' . $key1->image);
                    }
                }
            }
        }
        echo "successfully deleted";
    }
}

?>