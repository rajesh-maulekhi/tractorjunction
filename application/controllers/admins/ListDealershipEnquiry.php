<?php

class ListDealershipEnquiry extends CI_Controller
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
        $this->load->view('admins/list_dealershipEnquiry');
        $this->load->view('admins/footer');
    }


    function inactive($id, $status)
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        $fil = array(
            'status' => $status,
        );
        shweta_update('dealership_enquiry', $fil, 'id', $id);
        $this->session->set_userdata('dataupdate', 'Dealership request Updated successfully');
        header("location:" . $root . "admins/list-Dealership-enquiry");
    }


    function view($id)
    {
        $result = array();
        $result['result'] = shweta_select('*', 'dealership_enquiry', 'id', $id);
        $this->load->view('admins/header');
        $this->load->view('admins/singleDealershipEnquiry', $result);
        $this->load->view('admins/footer');

    }


    function SrachAjax()
    {

        $result = array();
        $value = $_GET["term"];

        $condition = '';
        $condition = "model_name LIKE '%" . $value . "%'";
        $result = shweta_select_th('model_name', 'old_tractor', $condition);


        $json = array();
        if (!empty($result)) {
            foreach ($result as $key => $resultvalue) {
                $json[] = array(
                    'value' => $resultvalue->model_name,
                    'label' => $resultvalue->model_name
                );
            }
        } else {
            $json[] = array(
                'value' => "",
                'label' => "No Result Found"
            );
        }
        echo json_encode($json);


    }


}

?>