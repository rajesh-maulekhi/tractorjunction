<?php

class Reply_request_end extends CI_Controller
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
        $brand_name = $this->input->post('brand');
        $model_name = $this->input->post('model');
        $u_name = ucfirst($this->input->post('uname'));
        $email_name = $this->input->post('email');
        $contact_name = $this->input->post('contact');
        if ($contact_name == "") {
            $contact_name = "Not Filled";
        }
        $req_date = $this->input->post('req_date');
        $message2 = $this->input->post('message');


//mail sent
        $nameHeader = $u_name;
        $lineSecond = "<strong>Message: " . $message2 . "</strong>";
        $lineFirst = 'This is mail for your demo request of tractor ' . $brand_name . ' ' . $model_name . ' with Tractor junction.';
        $otherInfo = array(
            'Request On' => $req_date,
            'Request for brand' => $brand_name,
            'Request for Model' => $model_name,
        );

        $message = sentMailFunction($nameHeader, $lineFirst, $lineSecond, $otherInfo);
        $subject = "Demo Request at TractorJunction";


        MailSentNow($message, $subject, $email);
        $data = array(
            'id' => $id,
            'status' => '1',
            'message' => $message2,
        );
        $this->session->set_userdata('value_inserted', 'Mail sent successfully');
        shweta_update('demo_request', $data, 'id', $data['id']);

        header("Location:view_request");
    }
}

?>
