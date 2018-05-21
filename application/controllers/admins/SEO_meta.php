<?php

class SEO_meta extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
       $this->load->helper('form');
        $this->load->library('session');
        $this->load->database();
        $this->load->helper('shweta');
        $this->load->helper('query');
        $this->load->model('Front_model');
    }

    function updateTag($page_name)
    {
		$result['page_name']=$page_name;
		$result['result'] = $this->Front_model->get_result($data=array('page_name'=>$page_name),'seo_meta');
        $this->load->view('admins/header');
        $this->load->view('admins/edit_meta_tag',$result);
        $this->load->view('admins/footer');
    }
	
	
		function TagEditEnd(){
		$data=array(
		'meta_title'=>base64_encode(serialize($this->input->post('meta_title'))),
		'meta_keywords'=>base64_encode(serialize($this->input->post('meta_keywords'))),
		'meta_description'=>base64_encode(serialize($this->input->post('meta_description'))),
		);
		$this->Front_model->update_data('seo_meta',$data,$data2=array('page_name'=>$this->input->post('page_name')));
		$root = "http://".$_SERVER['HTTP_HOST'];
		$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);

		$this->session->set_userdata('dataupdate', 'meta tag updated successfully');
		header("Location: ".$root.'admin/');
		die;
		}
}

?>