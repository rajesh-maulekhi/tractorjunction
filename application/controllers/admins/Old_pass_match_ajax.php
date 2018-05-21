<?php

class Old_pass_match_ajax extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('shweta');
    }

    function index()
    {
// echo "hello";
        $old_password = $this->input->post('old_password');
        $this->input->post('user_id');
        $result = array();
        $result = shweta_select('*', 'admin', 'id', $this->input->post('user_id'));
// print_r($result);
        $password = "";
        foreach ($result as $value => $key) {
            $password = $key->password;
        }
        if ($password == $old_password) {
            echo "yes";
        } else {
            echo "no";
        }
    }
}

?>