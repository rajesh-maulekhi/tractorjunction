<?php

class NewsAndUpdate extends CI_Controller
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
        $this->load->view('admins/add_newsUpdate');
        $this->load->view('admins/footer');
    }

    function addNewsAndUpdateEnd()
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        date_default_timezone_set("Asia/Kolkata");
        $date_time = $date = date('Y-m-d');


        $image_name = '';
        if (isset($_FILES['model_image']['name'])) {
            if ($_FILES['model_image']['name'] != "") {
                $this->load->library('upload');
                $config['upload_path'] = './images/news/';
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
            'type' => $this->input->post('type'),
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'status' => 1,
            'date' => $date_time,
            'image' => $image_name,
        );
        shweta_insert_form('news', $fil);
        $this->session->set_userdata('dataupdate', 'News added successfully');
        header("location:" . $root . "admins/news-update");
    }

    function show_NewsAndUpdate()
    {
        $this->load->view('admins/header');
        $this->load->view('admins/show_NewsAndUpdate');
        $this->load->view('admins/footer');
    }

    function DeleteNews()
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        $result = array();
        $result = shweta_select('image', 'news', 'id', $this->input->get('id'));
        foreach ($result as $key => $value) {
            if ($value->image != "tractor_default.png") {
                if (file_exists("./images/news/" . $value->image)) {
                    unlink('./images/news/' . $value->image);
                }
            }
        }


        shweta_delete('news', 'id', $this->input->get('id'));
        $this->session->set_userdata('dataupdate', 'News delete successfully');
        header("location:" . $root . "admins/show-news-update");

    }

    function DeleteNewsAll()
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        $deleteid = array();
        $deleteid = $this->input->post('val1');
        foreach ($deleteid as $delid) {
            $result = array();
            $result = shweta_select('image', 'news', 'id', $delid);
            foreach ($result as $key => $value) {
                if ($value->image != "tractor_default.png") {
                    if (file_exists("./images/news/" . $value->image)) {
                        unlink('./images/news/' . $value->image);
                    }
                }
            }


            shweta_delete('news', 'id', $delid);
        }
        echo "News successfully deleted";

    }

    function edit_news($id)
    {

        $result = array();
        $result['result'] = shweta_select('*', 'news', 'id', $id);

        $this->load->view('admins/header');
        $this->load->view('admins/edit_NewsAndUpdate', $result);
        $this->load->view('admins/footer');

    }

    function editNewsAndUpdateEnd()
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        date_default_timezone_set("Asia/Kolkata");
        $date_time = $date = date('Y-m-d');


        $image_name = '';
        if (isset($_FILES['model_image']['name'])) {
            if ($_FILES['model_image']['name'] != "") {
                $this->load->library('upload');
                $config['upload_path'] = './images/news/';
                $config['allowed_types'] = 'jpg|jpeg|gif|png';
                $config['max_size'] = 8000;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $this->upload->initialize($config);
                $this->upload->do_upload('model_image');
                $upload_data = $this->upload->data();
                $image_name = $upload_data['file_name'];

                if (file_exists("./images/news/" . $this->input->post('old_image'))) {
                    unlink('./images/news/' . $this->input->post('old_image'));
                }

            } else {
                $image_name = $this->input->post('old_image');
            }


            $fil = array(
                'type' => $this->input->post('type'),
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'image' => $image_name,
            );
            shweta_update('news', $fil, 'id', $this->input->post('id'));
            $this->session->set_userdata('dataupdate', 'News update successfully');
            header("location:" . $root . "admins/show-news-update");
        }


    }
}

?>