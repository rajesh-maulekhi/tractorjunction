<?php

class Delete_brand_single extends CI_Controller
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
// echo "aa";
// die;
        $logo_thumb = $this->input->post('img');


        $result = array();
        $result = shweta_select('*', 'tech_specification', 'brand', $this->input->post('val21'));
        foreach ($result as $f => $a) {
            shweta_delete('tech_specification', 'id', $a->id);
            if ($a->image != "tractor_default.png") {
                if (file_exists("./upload/" . $a->image)) {
                    unlink('./upload/' . $a->image);
                }
            }
        }
        if ($logo_thumb != "default_brand.jpg") {
            if (file_exists("./upload/" . $logo_thumb)) {
                unlink('upload/' . $logo_thumb);
            }
        }
        shweta_delete('brand', 'id', $this->input->post('val21'));
        shweta_delete('harvester', 'brand', $this->input->post('val21'));
        shweta_delete('new_implement', 'brand', $this->input->post('val21'));
        shweta_delete('old_tractor', 'brand', $this->input->post('val21'));

        echo "successfully deleted";


    }
}

?>