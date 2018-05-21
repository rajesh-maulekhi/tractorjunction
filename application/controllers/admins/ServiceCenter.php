<?php

class ServiceCenter extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('shweta');
        $this->load->database();
    }

    function index()
    {
        $this->load->view('admins/header');
        $this->load->view('admins/add_service_center');
        $this->load->view('admins/footer');
    }

    function addServiceCenterEnd()
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        date_default_timezone_set("Asia/Kolkata");
        $date_time = $date = date('Y-m-d');

        $fil = array(
            'name' => $this->input->post('name'),
            'brand' => $this->input->post('brand'),
            'state' => $this->input->post('state'),
            'city' => $this->input->post('city'),
            'address' => $this->input->post('address'),
            'mobile' => $this->input->post('mobile'),
            'status' => 1,
            'date' => $date_time,
        );
        shweta_insert_form('service_center', $fil);
        $this->session->set_userdata('dataupdate', 'Service center added successfully');
        header("location:" . $root . "admins/add-service-center");
    }

    function show_service_center()
    {
        $this->load->view('admins/header');
        $this->load->view('admins/show_service_center');
        $this->load->view('admins/footer');
    }

    function delallservices()
    {
        $deleteid = array();
        $deleteid = $this->input->post('val1');
        foreach ($deleteid as $delid) {
            shweta_delete('service_center', 'id', $delid);
        }
        echo "service successfully deleted";
    }

    function DeleteServiceCenter()
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        shweta_delete('service_center', 'id', $this->input->get('id'));
        $this->session->set_userdata('dataupdate', 'Service center delete successfully');
        header("location:" . $root . "admins/show-service-center");

    }

    function edit_service_center($id)
    {
        $result = array();
        $result['result'] = shweta_select('*', 'service_center', 'id', $id);
        $this->load->view('admins/header');
        $this->load->view('admins/edit_service_center', $result);
        $this->load->view('admins/footer');
    }

    function editServiceCenterEnd()
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        date_default_timezone_set("Asia/Kolkata");
        $date_time = $date = date('Y-m-d');

        $fil = array(
            'name' => $this->input->post('name'),
            'brand' => $this->input->post('brand'),
            'state' => $this->input->post('state'),
            'city' => $this->input->post('city'),
            'address' => $this->input->post('address'),
            'mobile' => $this->input->post('mobile'),
            'status' => 1,
        );
        shweta_update('service_center', $fil, 'id', $this->input->post('id_val'));
        $this->session->set_userdata('dataupdate', 'Service center updated successfully');
        header("location:" . $root . "admins/show-service-center");
    }
}

?>