<?php

class ListRentTractor extends CI_Controller
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
        $this->load->view('admins/listRentTractor');
        $this->load->view('admins/footer');
    }


    function inactive($id, $status)
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        $fil = array(
            'status' => $status,
        );
        shweta_update('rent_tractor', $fil, 'id', $id);
        $this->session->set_userdata('dataupdate', 'Tractor Updated successfully');
        header("location:" . $root . "admins/list-rent-tractors");
    }


    function view($id)
    {
        $result = array();
        $result['result'] = shweta_select('*', 'rent_tractor', 'id', $id);
        $this->load->view('admins/header');
        $this->load->view('admins/single_rent_tractor', $result);
        $this->load->view('admins/footer');

    }

    function UpdateSinglerent()
    {

        $data = array(
            'rentper' => $this->input->post('rentper'),
        );
        shweta_update('rent_tractor', $data, 'id', $this->input->post('id'));
        $this->session->set_userdata('dataupdate', 'Tractor Updated successfully');
        header('location:' . $_SERVER['HTTP_REFERER']);
    }


    function SrachAjax()
    {

        $result = array();
        $value = $_GET["term"];

        $condition = '';
        $condition = "model_name LIKE '%" . $value . "%'";
        $result = shweta_select_th('model_name', 'rent_tractor', $condition);


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