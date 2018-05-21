<?php

class Password_change_end extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('javascript');
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->load->helper('shweta');
        $this->load->library('session');

    }

    function index()
    {
        $old_password = $this->input->post('o_pass');
        $new_password = $this->input->post('n_pass');
        $confirm_password = $this->input->post('c_pass');
        $user_id = $this->input->post('user_id');
        $fil = array(
            'id' => $this->input->post('user_id'),
            'password' => $this->input->post('c_pass'),
        );
        $result = array();
        $result = shweta_select('*', 'admin', 'password', $old_password);

        if (empty($result)) {
            $this->session->set_userdata('old_not_match', 'Old password not match');
            header("Location:Home");
            die;
        } elseif (!empty($result)) {
            if ($confirm_password == $new_password) {
                shweta_update('admin', $fil, 'id', $fil['id']);
                $this->session->set_userdata('value_inserted', 'HP added successfully');
                header("Location:Home");
                die;

            } else {
                $this->session->set_userdata('new_not_match', 'Old password not match');
                header("Location:Home");
                die;
            }
        } else {
            $this->session->set_userdata('new_not_match1', 'Old password not match');
            header("Location:Home");
            die;

        }
    }
}

?>
