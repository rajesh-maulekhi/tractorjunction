<?php

class Delete_slider_single extends CI_Controller
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
        shweta_delete('slider', 'id', $this->input->post('val21'));
        $result = array();
        $result = shweta_select('*', 'slider', 'id', $this->input->post('val21'));
// echo "<pre>";
// print_r($result);
// echo $this->input->post('val21');
// die;
        foreach ($result as $value => $key) {
            $root = "http://" . $_SERVER['HTTP_HOST'];

            $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);


            unlink('upload/' . $key->image);
        }

        echo "successfully deleted";


    }
}

?>