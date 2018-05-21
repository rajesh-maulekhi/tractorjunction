<?php

class DeleteReview extends CI_Controller
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

        shweta_delete('user_review', 'id', $this->input->get('id'));
        header("Location:" . $_SERVER['HTTP_REFERER']);

    }
}

?>