<?php

class ListOldTractor extends CI_Controller
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
        $this->load->view('admins/listOldTractor');
        $this->load->view('admins/footer');
    }


    function inactive($id, $status)
    {

        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        $fil = array(
            'status' => $status,
        );
        shweta_update('old_tractor', $fil, 'id', $id);
        $mobile = '';
        foreach (shweta_select('mobile', 'old_tractor', 'id', $id) as $raa) $mobile = ($raa->mobile);
        if ($status == 0) {
            $textmsg = "Your tractor status is pending from admin side at Tractrojunction";
        } else {
            $textmsg = "Congratulations! Your tractor status is active from admin side at Tractrojunction";
        }
        // echo $mobile;
        // die;
        smsSent($mobile, $textmsg);

        $this->session->set_userdata('dataupdate', 'Tractor Updated successfully');
        header("location:" . $root . "admins/list-old-tractors");
    }


    function view($id)
    {
        $result = array();
        $result['result'] = shweta_select('*', 'old_tractor', 'id', $id);
        $this->load->view('admins/header');
        $this->load->view('admins/single_old_tractor', $result);
        $this->load->view('admins/footer');

    }

    function edit($id)
    {
        $result = array();
        $result['result'] = shweta_select('*', 'old_tractor', 'id', $id);
        $this->load->view('admins/header');
        $this->load->view('admins/edit_old_tractor', $result);
        $this->load->view('admins/footer');

    }

    function deleteoldtractro($p)
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        $result = array();
        $result = shweta_select('image', 'old_tractor', 'id', $p);
        foreach ($result as $f1 => $a1) {
            // if(file_exists("./images/oldTractor/".$a1->image)){
// unlink('./images/oldTractor/'.$a1->image);
            // }

        }

        shweta_delete('old_tractor', 'id', $p);
        $this->session->set_userdata('dataupdate', 'Tractor Delete successfully');
        header("location:" . $root . "admins/list-old-tractors");
    }

    function UpdateOldTractorEnd()
    {

        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);


        $image_name = '';
        if (isset($_FILES['model_image']['name'])) {
            if ($_FILES['model_image']['name'] != "") {
                $this->load->library('upload');
                $config['file_name'] = newslugend($this->input->post('model'));
                $config['upload_path'] = './images/oldTractor/';
                $config['allowed_types'] = 'jpg|jpeg|gif|png';
                $config['max_size'] = 8000;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $this->upload->initialize($config);
                $this->upload->do_upload('model_image');
                $upload_data = $this->upload->data();
                $image_name = $upload_data['file_name'];


                if (file_exists("./images/oldTractor/" . $this->input->post('old_image'))) {
                    unlink('./images/oldTractor/' . $this->input->post('old_image'));
                }
            } else {
                $image_name = $this->input->post('old_image');
            }

        } else {
            $image_name = $this->input->post('old_image');
        }

//slug check


        $array = array();
        $slug = newslugend($this->input->post('model'));
        $slugOld = newslugend($this->input->post('slug_old'));
        if ($slugOld != $slug) {
            $slugResult = shweta_select('slug', 'old_tractor', '', '');
            foreach ($slugResult as $b => $a) {
                $array[] = $a->slug;
            }
            $array = array_filter($array);
            if (in_array($slug, $array)) {
                $slug = $slug . (count($slugResult) + 1);
            } else {
                $slug = $slug;
            }
        }


        $engincond = $this->input->post('engincond');

        $transcond = $this->input->post('transcond');

        $electriccond = $this->input->post('electriccond');

        $taycond = $this->input->post('taycond');

        $stryingcond = $this->input->post('stryingcond');


        $data = array(
            'email' => $this->input->post('email'),
            'mobile' => $this->input->post('mobile'),
            'pincode' => $this->input->post('pincode'),
            'name' => $this->input->post('name'),
            'state' => $this->input->post('state'),
            'city' => $this->input->post('city'),
            'brand' => $this->input->post('brand'),
            'model_name' => $this->input->post('model'),
            'slug' => $slug,
            'hp' => $this->input->post('hp'),
            'cc' => $this->input->post('cc'),
            'yearpurchase' => $this->input->post('yearpurchase'),
            'price' => $this->input->post('price'),
            'image' => $image_name,
            'hours' => $this->input->post('hours'),
            'rto' => $this->input->post('rto'),
            'engin' => $this->input->post('engin'),
            'chasis' => $this->input->post('chasis'),
            'engincond' => $engincond,
            'transcond' => $transcond,
            'electriccond' => $electriccond,
            'taycond' => $taycond,
            'stryingcond' => $stryingcond,
            'resonrelling' => $this->input->post('resonrelling'),
            'overview' => $this->input->post('overview'),
        );
        // echo "<pre>";
        // print_r($data);
        // die;
        shweta_update('old_tractor', $data, 'slug', $this->input->post('slug_old'));
        $this->session->set_userdata('dataupdate', 'Tractor Updated successfully');
        header("location:" . $root . "admins/list-old-tractors");
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