<?php

class CustomerCare extends CI_Controller
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
        $this->load->view('admins/add_CustomerCare');
        $this->load->view('admins/footer');
    }

    function addCustomerCareEnd()
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        date_default_timezone_set("Asia/Kolkata");
        $date_time = $date = date('Y-m-d');

//feature
        $feature_name = array();
        $feature_name = $this->input->post('contactNo');
        if (!empty($feature_name)) {
            $feature_name = (array_filter($feature_name));
            $feature_name_str = implode('$$', $feature_name);
        }


        $fil = array(
            'brand' => $this->input->post('brand'),
            'contactno' => $feature_name_str,
            'status' => 1,
            'date' => $date_time,
        );
        shweta_insert_form('customercare', $fil);
        $this->session->set_userdata('dataupdate', 'Customer Care  added successfully');
        header("location:" . $root . "admins/add-customer-care");
    }

    function show_CustomerCare()
    {
        $this->load->view('admins/header');
        $this->load->view('admins/show_CustomerCare');
        $this->load->view('admins/footer');
    }

    function delallCustomerCare()
    {
        $deleteid = array();
        $deleteid = $this->input->post('val1');
        foreach ($deleteid as $delid) {
            shweta_delete('customercare', 'id', $delid);
        }
        echo "Customer care successfully deleted";
    }

    function DeleteCustomerCare()
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        shweta_delete('customercare', 'id', $this->input->get('id'));
        $this->session->set_userdata('dataupdate', 'Service center delete successfully');
        header("location:" . $root . "admins/show-customer-care");

    }

    function edit_CustomerCare($id)
    {
        $result = array();
        $result['result'] = shweta_select('*', 'customercare', 'id', $id);
        $this->load->view('admins/header');
        $this->load->view('admins/edit_CustomerCare', $result);
        $this->load->view('admins/footer');
    }

    function editCustomerCareEnd()
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        date_default_timezone_set("Asia/Kolkata");
        $date_time = $date = date('Y-m-d');


//feature
        $feature_name = array();
        $feature_name = $this->input->post('contactNo');
        if (!empty($feature_name)) {
            $feature_name = (array_filter($feature_name));
            $feature_name_str = implode('$$', $feature_name);
        }


        $fil = array(
            'brand' => $this->input->post('brand'),
            'contactno' => $feature_name_str,
        );
        shweta_update('customercare', $fil, 'id', $this->input->post('id_val'));
        $this->session->set_userdata('dataupdate', 'Customer care updated successfully');
        header("location:" . $root . "admins/show-customer-care");
    }
}

?>