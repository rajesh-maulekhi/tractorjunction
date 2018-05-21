<?php

class ListInsuranceTractor extends CI_Controller
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
        $this->load->view('admins/list_InsuranceTractor');
        $this->load->view('admins/footer');
    }


    function inactive($id, $status)
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        $fil = array(
            'status' => $status,
        );
        shweta_update('insurance', $fil, 'id', $id);
        $this->session->set_userdata('dataupdate', 'Insurance Updated successfully');
        header("location:" . $root . "admins/insurance-tractor");
    }


    function view($id)
    {
        $result = array();
        $result['result'] = shweta_select('*', 'insurance', 'id', $id);
        $this->load->view('admins/header');
        $this->load->view('admins/singleInsurancetractor', $result);
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

    function scheme()
    {
        $this->load->view('admins/header');
        $this->load->view('admins/add_InsuranceTractorScheme');
        $this->load->view('admins/footer');
    }

    function schemeEnd()
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        date_default_timezone_set("Asia/Kolkata");
        $date_time = $date = date('Y-m-d');


        $image_name = '';
        if (isset($_FILES['model_image']['name'])) {
            if ($_FILES['model_image']['name'] != "") {
                $this->load->library('upload');
                $config['upload_path'] = './images/scheme/';
                $config['allowed_types'] = 'jpg|jpeg|gif|png';
                $config['max_size'] = 8000;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $this->upload->initialize($config);
                $this->upload->do_upload('model_image');
                $upload_data = $this->upload->data();
                $image_name = $upload_data['file_name'];
            }
        }


        $fil = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'order_by' => $this->input->post('order_by'),
            'status' => 1,
            'type' => 'insurance',
            'date' => $date_time,
            'image' => $image_name,
        );
        shweta_insert_form('scheme', $fil);
        $this->session->set_userdata('dataupdate', 'Insurance scheme added successfully');
        header("location:" . $root . "admins/add-insurance-tractor-scheme");
    }


}

?>