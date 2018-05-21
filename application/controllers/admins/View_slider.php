<?php

class View_slider extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('shweta');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library("pagination");
    }

    function index()
    {


        $this->load->model("form_model");
        $config = array();
        $config["base_url"] = base_url() . "admins/view_slider";
        $config["total_rows"] = $this->db->count_all("slider");
        $config["per_page"] = 4;
        $config["page_query_string"] = TRUE;
        $config['first_tag_open'] = $config['last_tag_open'] = $config['next_tag_open'] = $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
        $config['first_tag_close'] = $config['last_tag_close'] = $config['next_tag_close'] = $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li><span><b>";
        $config['cur_tag_close'] = "</b></span></li>";
        $config['first_link'] = '&laquo; First';
        $config['last_link'] = 'Last &raquo;';
        $config['use_page_numbers'] = true;
        $this->pagination->initialize($config);
        $temp = strstr($_SERVER['REQUEST_URI'], '=');
        $temp = str_replace("=", "", $temp);
        $temp = $temp - 1;
        if ($temp > 0)
            $page = $temp * $config["per_page"];
        else
            $page = 0;
        $result['result'] = $this->form_model->show_pagination($config["per_page"], $page, 'slider');
        $result["links"] = $this->pagination->create_links();

        $this->load->view('admins/header');
        $this->load->view('admins/view_slider', $result);
        $this->load->view('admins/footer');
    }
}

?>