<?php

class Delete_brand extends CI_Controller
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

            $result1 = array();
            $result1 = shweta_select('*', 'tech_specification', 'brand', $p);
            foreach ($result1 as $f => $a) {
                shweta_delete('tech_specification', 'id', $a->id);
                if ($a->image != "tractor_default.png") {
                    if (file_exists("./upload/" . $a->image)) {
                        unlink('./upload/' . $a->image);
                    }
                }
            }

            $result = array();
            $result = shweta_select('image', 'brand', 'id', $p);
            foreach ($result as $f1 => $a1) {
                if ($a1->image != "default_brand.jpg") {
                    if (file_exists("./upload/" . $a1->image)) {
                        unlink('upload/' . $a1->image);
                    }
                }
            }

            shweta_delete('brand', 'id', $p);
        shweta_delete('harvester', 'brand', $p);
        shweta_delete('new_implement', 'brand', $p);
        shweta_delete('old_tractor', 'brand', $p);


        }
        echo "successfully deleted";


    }
}

?>