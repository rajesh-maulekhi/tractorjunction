<?php

class Vendor_login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('shweta');
        $this->load->database();
        $this->load->library('session');
    }

    function index()
    {
		 
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        $data = array(
            'name' => $this->input->post('name'),
            'password' => $this->input->post('password')
        );


        $result = array();
// $condition="(username='".$data['name']."' and password= '".$data['password']."')";
        $condition = "username=" . $this->db->escape($data['name']) . " and password =" . $this->db->escape($data['password']) . " and status='1'";

        $result = shweta_select_th('*', 'vendors', $condition);
		 // echo "<pre>";
		 // print_r($result);
		 // die;
        if (!empty($result)) {
            foreach ($result as $key => $value) {
                $vendor_id=$value->id;
				
                // $arry['username'] = $value->username;
                $this->session->set_userdata('vendor',$vendor_id);
				// echo $this->session->userdata('vendor');
				// die;
            }
        } else {
            $this->session->set_userdata('wrong', "Wrong UserName/PassWord....");
			header("location:" . $root . "vendor/");
			die;
        }
        header("location:" . $root . "vendor/Home");
		die;

    }
}

?>