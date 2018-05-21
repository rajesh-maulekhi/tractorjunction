<?php

class Reply_request_onroad_end extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('javascript');
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
        $this->load->library('image_lib');
        $this->load->database();
        $this->load->helper('shweta');
    }

    function index()
    {
        $id = $this->input->post('id');
        $email = $this->input->post('email');
        $message2 = $this->input->post('message');
        $brand = $this->input->post('brand');
        $model = $this->input->post('model');
        $location = $this->input->post('location');
        $uname = $this->input->post('uname');

        $req_date = $this->input->post('req_date');


        $nameHeader = $uname;
        $lineSecond = "<strong>Message: " . $message2 . "</strong>";
        $lineFirst = 'This is mail for your On Road Price request of tractor ' . $brand . ' ' . $model . ' with Tractor junction.';
        $otherInfo = array(
            'Request On' => $req_date,
            'Request for brand' => $brand,
            'Request for Model' => $model,
        );

        $message = sentMailFunction($nameHeader, $lineFirst, $lineSecond, $otherInfo);


        $subject = "On Road Price Request at TractorJunction";


        MailSentNow($message, $subject, $email);
        $data = array(
            'id' => $id,
            'status' => '1',
            'message' => $message2,
        );
        $this->session->set_userdata('value_inserted', 'Mail sent successfully');
        shweta_update('onroadprice', $data, 'id', $data['id']);

        header("Location:view_request_onroad");


    }
}

?>
