<?php

class ListFinanceTractor extends CI_Controller
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
        $this->load->view('admins/list_FinnaceTractor');
        $this->load->view('admins/footer');
    }


    function inactive($id, $status)
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        $fil = array(
            'status' => $status,
        );
        shweta_update('finance', $fil, 'id', $id);
        $this->session->set_userdata('dataupdate', 'Insurance Updated successfully');
        header("location:" . $root . "admins/finance-tractor");
    }


    function view($id)
    {
        $result = array();
        $result['result'] = shweta_select('*', 'finance', 'id', $id);
        
        $this->load->view('admins/header');
        $this->load->view('admins/singlefinancetractor', $result);
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
        $this->load->view('admins/add_financeTractorScheme');
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
            'type' => 'finance',
            'date' => $date_time,
            'image' => $image_name,
        );
        shweta_insert_form('scheme', $fil);
        $this->session->set_userdata('dataupdate', 'Finance scheme added successfully');
        header("location:" . $root . "admins/add-finance-tractor-scheme");
    }

    function UpdateschemeEndSe()
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
            }else{
			$image_name=$this->input->post('image_old');
		}


        }else{
			$image_name=$this->input->post('image_old');
		}


        $fil = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'order_by' => $this->input->post('order_by'),
            'image' => $image_name,
        );
		// echo "<pre>";
		// print_r($fil);
		// die;
        shweta_popular('scheme', $fil,'id',$this->input->post('id_val'));
		
        $this->session->set_userdata('dataupdate', 'Scheme Update successfully');
        header("location:" . $root . "admins/list-tractor-scheme");
    }

    function UpdateschemeEnd()
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
            'status' => 1,
            'type' => 'finance',
            'date' => $date_time,
            'image' => $image_name,
        );
        shweta_insert_form('scheme', $fil);
        $this->session->set_userdata('dataupdate', 'finance scheme added successfully');
        header("location:" . $root . "admins/add-finance-tractor-scheme");
    }


    function ListTractorScheme()
    {
        $this->load->view('admins/header');
        $this->load->view('admins/list_TractorScheme');
        $this->load->view('admins/footer');
    }

    function DeleteTractorScheme($id)
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        $result = array();
        $result = shweta_select('image', 'scheme', 'id', $id);
        foreach ($result as $f => $a) {
            if (file_exists("./images/scheme/" . $a->image)) {
                unlink('./images/scheme/' . $a->image);
            }
        }

        shweta_delete('scheme', 'id', $id);
        $this->session->set_userdata('dataupdate', 'Scheme Delete successfully');
        header("location:" . $root . "admins/list-tractor-scheme");
    }

    function ViewTractorScheme($id)
    {
        $result = array();
        $result['result'] = shweta_select('*', 'scheme', 'id', $id);
        $this->load->view('admins/header');
        $this->load->view('admins/view_Single_TractorScheme', $result);
        $this->load->view('admins/footer');
    }

    function EditTractorScheme($id)
    {
        $result = array();
        $result['result'] = shweta_select('*', 'scheme', 'id', $id);
        $this->load->view('admins/header');
        $this->load->view('admins/edit_Single_TractorScheme', $result);
        $this->load->view('admins/footer');
    }

}

?>