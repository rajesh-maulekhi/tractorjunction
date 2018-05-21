<?php

class ImplementTractor extends CI_Controller
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
        $this->load->view('admins/add_harvester');
        $this->load->view('admins/footer');
    }


    function deleteAllimage()
    {

        $result1 = array();
        $result1 = shweta_select('*', ' harvester', 'id', $this->input->get('id'));
        foreach ($result1 as $f => $a) {
            $gallery_array = array();
            $gallery_array = array_filter(explode('$$', $a->gallery));

            foreach ($gallery_array as $image_name) {

                if (file_exists("./images/implementTractor/" . $image_name)) {
                    unlink('./images/implementTractor/' . $image_name);
                    $this->session->set_userdata('dataupdate', 'Image Deleted');
                }
            }
        }
        $data1 = array(
            'gallery' => '',
        );
        shweta_update('harvester', $data1, 'id', $this->input->get('id'));

        header("Location:" . $_SERVER['HTTP_REFERER']);

    }


    function deleteAllimageImplement()
    {

        $result1 = array();
        $result1 = shweta_select('*', 'new_implement', 'id', $this->input->get('id'));
        foreach ($result1 as $f => $a) {
            $gallery_array = array();
            $gallery_array = array_filter(explode('$$', $a->gallery));

            foreach ($gallery_array as $image_name) {

                if (file_exists("./images/implementTractor/" . $image_name)) {
                    unlink('./images/implementTractor/' . $image_name);
                    $this->session->set_userdata('dataupdate', 'Image Deleted');
                }
            }
        }
        $data1 = array(
            'gallery' => '',
        );
        shweta_update('new_implement', $data1, 'id', $this->input->get('id'));

        header("Location:" . $_SERVER['HTTP_REFERER']);

    }

    function DeleteHarvesterImagesingle()
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        $image_name = "";
        $image_name = $this->input->get('imagename');


        $result1 = array();
        $result1 = shweta_select('*', 'harvester', 'id', $this->input->get('id'));
        foreach ($result1 as $f => $a) {
            $gallery_array = array();
            $gallery_array = explode('$$', $a->gallery);
            $key = array_search($image_name, $gallery_array);
            if ($key !== false) {
                unset($gallery_array[$key]);
            }

            $gallery_image = implode('$$', $gallery_array);
            $data1 = array(
                'gallery' => $gallery_image,
            );
            shweta_update('harvester', $data1, 'id', $this->input->get('id'));
        }


        if (file_exists("./images/implementTractor/" . $image_name)) {
            unlink('./images/implementTractor/' . $image_name);
            $this->session->set_userdata('dataupdate', 'Image Deleted');
        }


        header("Location:" . $_SERVER['HTTP_REFERER']);


    }

    function DeleteHarvesterImagesingleImplement()
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        $image_name = "";
        $image_name = $this->input->get('imagename');


        $result1 = array();
        $result1 = shweta_select('*', ' new_implement', 'id', $this->input->get('id'));
        foreach ($result1 as $f => $a) {
            $gallery_array = array();
            $gallery_array = explode('$$', $a->gallery);
            $key = array_search($image_name, $gallery_array);
            if ($key !== false) {
                unset($gallery_array[$key]);
            }

            $gallery_image = implode('$$', $gallery_array);
            $data1 = array(
                'gallery' => $gallery_image,
            );
            shweta_update('new_implement', $data1, 'id', $this->input->get('id'));
        }


        if (file_exists("./images/implementTractor/" . $image_name)) {
            unlink('./images/implementTractor/' . $image_name);
            $this->session->set_userdata('dataupdate', 'Image Deleted');
        }


        header("Location:" . $_SERVER['HTTP_REFERER']);


    }

    function addHarvesterEnd()
    {

        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        date_default_timezone_set("Asia/Kolkata");
        $date_time = $date = date('Y-m-d');


        $gallery_name1 = '';

        if (!empty($_FILES['userfile']['name'][0])) {

            $slug = newslugend($this->input->post('name'));
            // $this->load->library('upload');
            $files = $_FILES;
            $count = count($_FILES['userfile']['name']);
            for ($i = 0; $i < $count; $i++) {
                $this->load->library('upload');
                $_FILES['userfile']['name'] = $files['userfile']['name'][$i];
                $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
                $_FILES['userfile']['size'] = $files['userfile']['size'][$i];
                $conf = $this->set_upload_optionsmultiple($slug);
                $this->load->library('image_lib', $conf);
                $this->image_lib->resize();
                $this->upload->initialize($conf);
                $this->upload->do_upload('userfile');
                $upload_data = $this->upload->data();
                $image_name[] = $upload_data['file_name'];
                $gallery_name1 = implode('$$', array_filter($image_name));
            }

        }
        // echo $gallery_name1;
// die;
        $image_name = '';
        if (isset($_FILES['model_image']['name'])) {
            if ($_FILES['model_image']['name'] != "") {

                $config['file_name'] = newslugend($this->input->post('name'));
                $this->load->library('upload');
                $config['upload_path'] = './images/implementTractor/';
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
        $specImge = '';
        if (isset($_FILES['model_image2']['name'])) {
            if ($_FILES['model_image2']['name'] != "") {

                $config['file_name'] = newslugend($this->input->post('name')) . "-specifications";
                $this->load->library('upload');
                $config['upload_path'] = './images/implementTractor/';
                $config['allowed_types'] = 'jpg|jpeg|gif|png';
                $config['max_size'] = 8000;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $this->upload->initialize($config);
                $this->upload->do_upload('model_image2');
                $upload_data = $this->upload->data();
                $specImge = $upload_data['file_name'];
            }
        }


        //slug check
        $array = array();
        $slug = newslugend($this->input->post('name'));
        $slugResult = shweta_select('slug', 'harvester', '', '');
        foreach ($slugResult as $b => $a) {
            $array[] = $a->slug;
        }
        $array = array_filter($array);
        if (in_array($slug, $array)) {
            $slug = $slug . (count($slugResult) + 1);
        } else {
            $slug = $slug;
        }


        $fil = array(
            'model_name' => $this->input->post('name'),
            'brand' => $this->input->post('brand'),
            'image' => $image_name,
            'specImge' => $specImge,
            'gallery' => $gallery_name1,

            'type' => $this->input->post('type'),
            'crop' => $this->input->post('crop'),
            'length' => $this->input->post('length'),
            'width' => $this->input->post('width'),
            'height' => $this->input->post('height'),
            'groundclear' => $this->input->post('groundclear'),
            'weight' => $this->input->post('weight'),
            'beltlength' => $this->input->post('beltlength'),
            'wheelbase' => $this->input->post('wheelbase'),
            'rollers' => $this->input->post('rollers'),
            'grouser' => $this->input->post('grouser'),
            'hgrouser' => $this->input->post('hgrouser'),
            'area' => $this->input->post('area'),
            'enginemodel' => $this->input->post('enginemodel'),
            'coolingsystem' => $this->input->post('coolingsystem'),
            'engtype' => $this->input->post('engtype'),
            'epower' => $this->input->post('epower'),
            'rpm' => $this->input->post('rpm'),
            'drytpe' => $this->input->post('drytpe'),
            'fuelcapacity' => $this->input->post('fuelcapacity'),
            'transtype' => $this->input->post('transtype'),
            'batteries' => $this->input->post('batteries'),
            'outputbattery' => $this->input->post('outputbattery'),
            'cutterbar' => $this->input->post('cutterbar'),
            'cutterheight' => $this->input->post('cutterheight'),
            'reeldrive' => $this->input->post('reeldrive'),
            'reelheight' => $this->input->post('reelheight'),
            'feeder' => $this->input->post('feeder'),
            'thershingdiameter' => $this->input->post('thershingdiameter'),
            'thershinglength' => $this->input->post('thershinglength'),
            'thershingsystem' => $this->input->post('thershingsystem'),
            'revolution' => $this->input->post('revolution'),
            'speedadjustment' => $this->input->post('speedadjustment'),
            'concavewidth' => $this->input->post('concavewidth'),
            'concaveclear' => $this->input->post('concaveclear'),
            'separatingdiameter' => $this->input->post('separatingdiameter'),
            'cylinderlength' => $this->input->post('cylinderlength'),
            'cleningtype' => $this->input->post('cleningtype'),
            'cleaningarea' => $this->input->post('cleaningarea'),
            'uppersieve' => $this->input->post('uppersieve'),
            'lowersieve' => $this->input->post('lowersieve'),
            'graintank' => $this->input->post('graintank'),

            'overview' => $this->input->post('overview'),
            'sNOWalker' => $this->input->post('sNOWalker'),
            'sNOStpesWalker' => $this->input->post('sNOStpesWalker'),
            'lengthWalker' => $this->input->post('lengthWalker'),
            'widthWalker' => $this->input->post('widthWalker'),
            'hprice' => $this->input->post('hprice'),

            'tyarFront' => $this->input->post('tyarFront'),
            'cutCaacity' => $this->input->post('cutCaacity'),
            'tyarRear' => $this->input->post('tyarRear'),
            'tlength' => $this->input->post('tlength'),
            'twidth' => $this->input->post('twidth'),
            'theight' => $this->input->post('theight'),
            'typeClutch' => $this->input->post('typeClutch'),
            'thershingwidth' => $this->input->post('thershingwidth'),
            'power_Source' => $this->input->post('power_Source'),


            'status' => 1,
            'date' => $date_time,
            'slug' => $slug,
        );
        shweta_insert_form('harvester', $fil);
        $this->session->set_userdata('dataupdate', 'Harvester added successfully');
        header("location:" . $root . "admins/add-harvester");


    }

    private function set_upload_optionsmultiple($slug)
    {
        $config = array();
        $config['upload_path'] = './images/implementTractor/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $slug . '-gallery-1';
        $config['overwrite'] = FALSE;
        return $config;
    }

    function editHarvesterEnd()
    {

        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        date_default_timezone_set("Asia/Kolkata");
        $date_time = $date = date('Y-m-d');


        $gallery_name1 = '';

        if (!empty($_FILES['userfile']['name'][0])) {

            $slug = newslugend($this->input->post('name'));
            // $this->load->library('upload');
            $files = $_FILES;
            $count = count($_FILES['userfile']['name']);
            for ($i = 0; $i < $count; $i++) {
                $this->load->library('upload');
                $_FILES['userfile']['name'] = $files['userfile']['name'][$i];
                $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
                $_FILES['userfile']['size'] = $files['userfile']['size'][$i];
                $conf = $this->set_upload_optionsmultiple($slug);
                $this->load->library('image_lib', $conf);
                $this->image_lib->resize();
                $this->upload->initialize($conf);
                $this->upload->do_upload('userfile');
                $upload_data = $this->upload->data();
                $image_name[] = $upload_data['file_name'];
                $gallery_name1 = implode('$$', array_filter($image_name));
            }

        }
        $new_gallery = "";
        $gallery = "";
        foreach (shweta_select('gallery', 'harvester', 'id', $this->input->post('idHar')) as $raa) $gallery = ($raa->gallery);
        if ($gallery == "") {
            $new_gallery = $gallery_name1;
        } else {
            $new_gallery = rtrim(($gallery . "$$" . $gallery_name1), '$$');
        }


        $image_name = '';
        if (isset($_FILES['model_image']['name'])) {
            if ($_FILES['model_image']['name'] != "") {
                $randNon = rand(9999, 9999);
                $config['file_name'] = newslugend($this->input->post('name') . $randNon);
                $this->load->library('upload');
                $config['upload_path'] = './images/implementTractor/';
                $config['allowed_types'] = 'jpg|jpeg|gif|png';
                $config['max_size'] = 8000;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $this->upload->initialize($config);
                $this->upload->do_upload('model_image');
                $upload_data = $this->upload->data();
                $image_name = $upload_data['file_name'];
                if (file_exists("./images/implementTractor/" . $this->input->post('oldmodel_image'))) {
                    unlink('./images/implementTractor/' . $this->input->post('oldmodel_image'));
                }
            } else {
                $image_name = $this->input->post('oldmodel_image');
            }
        } else {
            $image_name = $this->input->post('oldmodel_image');
        }

        $specimage = '';
        if (isset($_FILES['model_image2']['name'])) {
            if ($_FILES['model_image2']['name'] != "") {
                $randNon = rand(9999, 9999);
                $config['file_name'] = newslugend($this->input->post('name') . $randNon);
                $this->load->library('upload');
                $config['upload_path'] = './images/implementTractor/';
                $config['allowed_types'] = 'jpg|jpeg|gif|png';
                $config['max_size'] = 8000;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $this->upload->initialize($config);
                $this->upload->do_upload('model_image2');
                $upload_data = $this->upload->data();
                $specimage = $upload_data['file_name'];
                if (file_exists("./images/implementTractor/" . $this->input->post('old_spec'))) {
                    unlink('./images/implementTractor/' . $this->input->post('old_spec'));
                }
            } else {
                $specimage = $this->input->post('old_spec');
            }
        } else {
            $specimage = $this->input->post('old_spec');
        }
        //slug check

        $array = array();
        $slug = newslugend($this->input->post('name'));
        $slugOld = newslugend($this->input->post('slug_old'));
        if ($slugOld != $slug) {
            $slugResult = shweta_select('slug', 'harvester', '', '');
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


        $fil = array(
            'model_name' => $this->input->post('name'),
            'brand' => $this->input->post('brand'),
            'image' => $image_name,
            'specImge' => $specimage,
            'gallery' => $new_gallery,

            'type' => $this->input->post('type'),
            'crop' => $this->input->post('crop'),
            'length' => $this->input->post('length'),
            'width' => $this->input->post('width'),
            'height' => $this->input->post('height'),
            'groundclear' => $this->input->post('groundclear'),
            'weight' => $this->input->post('weight'),
            'beltlength' => $this->input->post('beltlength'),
            'wheelbase' => $this->input->post('wheelbase'),
            'rollers' => $this->input->post('rollers'),
            'grouser' => $this->input->post('grouser'),
            'hgrouser' => $this->input->post('hgrouser'),
            'area' => $this->input->post('area'),
            'enginemodel' => $this->input->post('enginemodel'),
            'coolingsystem' => $this->input->post('coolingsystem'),
            'engtype' => $this->input->post('engtype'),
            'epower' => $this->input->post('epower'),
            'rpm' => $this->input->post('rpm'),
            'drytpe' => $this->input->post('drytpe'),
            'fuelcapacity' => $this->input->post('fuelcapacity'),
            'transtype' => $this->input->post('transtype'),
            'batteries' => $this->input->post('batteries'),
            'outputbattery' => $this->input->post('outputbattery'),
            'cutterbar' => $this->input->post('cutterbar'),
            'cutterheight' => $this->input->post('cutterheight'),
            'reeldrive' => $this->input->post('reeldrive'),
            'reelheight' => $this->input->post('reelheight'),
            'feeder' => $this->input->post('feeder'),
            'thershingdiameter' => $this->input->post('thershingdiameter'),
            'thershinglength' => $this->input->post('thershinglength'),
            'thershingsystem' => $this->input->post('thershingsystem'),
            'revolution' => $this->input->post('revolution'),
            'speedadjustment' => $this->input->post('speedadjustment'),
            'concavewidth' => $this->input->post('concavewidth'),
            'concaveclear' => $this->input->post('concaveclear'),
            'separatingdiameter' => $this->input->post('separatingdiameter'),
            'cylinderlength' => $this->input->post('cylinderlength'),
            'cleningtype' => $this->input->post('cleningtype'),
            'cleaningarea' => $this->input->post('cleaningarea'),
            'uppersieve' => $this->input->post('uppersieve'),
            'lowersieve' => $this->input->post('lowersieve'),
            'graintank' => $this->input->post('graintank'),
            'overview' => $this->input->post('overview'),
            'sNOWalker' => $this->input->post('sNOWalker'),
            'sNOStpesWalker' => $this->input->post('sNOStpesWalker'),
            'lengthWalker' => $this->input->post('lengthWalker'),
            'widthWalker' => $this->input->post('widthWalker'),
            'hprice' => $this->input->post('hprice'),

            'cutCaacity' => $this->input->post('cutCaacity'),
            'tyarFront' => $this->input->post('tyarFront'),
            'tyarRear' => $this->input->post('tyarRear'),
            'tlength' => $this->input->post('tlength'),
            'twidth' => $this->input->post('twidth'),
            'theight' => $this->input->post('theight'),
            'typeClutch' => $this->input->post('typeClutch'),
            'thershingwidth' => $this->input->post('thershingwidth'),
            'power_Source' => $this->input->post('power_Source'),
            'slug' => $slug,
            'status' => 1,
        );
        shweta_update('harvester', $fil, 'id', $this->input->post('idHar'));
        $this->session->set_userdata('dataupdate', 'Harvester update successfully');
        header("location:" . $root . "admins/show-harvester");


    }

    function showharvesterList()
    {
        $this->load->view('admins/header');
        $this->load->view('admins/list_harvesterNew');
        $this->load->view('admins/footer');
    }

    function showImplementListNew()
    {
        $this->load->view('admins/header');
        $this->load->view('admins/list_ImplementNewList');
        $this->load->view('admins/footer');
    }

    function SrachAjax()
    {

        $result = array();
        $value = $_GET["term"];

        $condition = '';
        $condition = "model_name LIKE '%" . $value . "%'";
        $result = shweta_select_th('model_name', 'harvester', $condition);


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

    function SrachAjaxImplement()
    {

        $result = array();
        $value = $_GET["term"];

        $condition = '';
        $condition = "model_name LIKE '%" . $value . "%'";
        $result = shweta_select_th('model_name', 'new_implement', $condition);


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

    function deleteHarvester($k1)
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);


        $result = array();
        $result = shweta_select('*', 'harvester', 'id', $k1);
        foreach ($result as $f => $a) {
            // shweta_delete('tech_specification','id',$a->id);
            if (file_exists("./images/implementTractor/" . $a->image)) {
                unlink('./images/implementTractor/' . $a->image);
            }
            if (file_exists("./images/implementTractor/" . $a->specImge)) {
                unlink('./images/implementTractor/' . $a->specImge);
            }
        }
        shweta_delete('harvester', 'id', $k1);
        $this->session->set_userdata('dataupdate', 'Harvester deleted successfully');
        header("location:" . $root . "admins/show-harvester");
    }

    function deleteImplementNew($k1)
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);


        $result = array();
        $result = shweta_select('*', 'new_implement', 'id', $k1);
        foreach ($result as $f => $a) {
            // shweta_delete('tech_specification','id',$a->id);
            if (file_exists("./images/implementTractor/" . $a->image)) {
                unlink('./images/implementTractor/' . $a->image);
            }
        }
        shweta_delete('new_implement', 'id', $k1);
        shweta_delete('implementvalue', 'ImpId', $k1);
        $this->session->set_userdata('dataupdate', 'Implement deleted successfully');
        header("location:" . $root . "admins/show-implement-list");
    }

    function editHarvesterNew($id)
    {
        $result = array();
        $result['result'] = shweta_select('*', 'harvester', 'id', $id);
        $this->load->view('admins/header');
        $this->load->view('admins/edit_HarvesterNew', $result);
        $this->load->view('admins/footer');
    }

    function edit_ImplementNew($id)
    {
        $result = array();
        $result['result'] = shweta_select('*', 'new_implement', 'id', $id);
        $this->load->view('admins/header');
        $this->load->view('admins/edit_Implement_New', $result);
        $this->load->view('admins/footer');
    }

    function addField()
    {
        $this->load->view('admins/header');
        $this->load->view('admins/add_field');
        $this->load->view('admins/footer');
    }

    function addFiledEnd()
    {

        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        date_default_timezone_set("Asia/Kolkata");
        $date_time = $date = date('Y-m-d');
        //slug check
        $array = array();
        $slug = newslugend($this->input->post('name'));
        $slugResult = shweta_select('slug', 'filed', '', '');
        foreach ($slugResult as $b => $a) {
            $array[] = $a->slug;
        }
        $array = array_filter($array);
        if (in_array($slug, $array)) {
            $slug = $slug . (count($slugResult) + 1);
        } else {
            $slug = $slug;
        }


        $fil = array(
            'name' => $this->input->post('name'),
            'implement_cate' => $this->input->post('implement_cate'),
            'status' => 1,
            'date' => $date_time,
            'slug' => $slug,
        );
        shweta_insert_form('filed', $fil);
        $this->session->set_userdata('dataupdate', 'Filed title added successfully');
        header("location:" . $root . "admins/add-field-title");


    }

    function editFiledEnd()
    {

        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        date_default_timezone_set("Asia/Kolkata");
        $date_time = $date = date('Y-m-d');
        //slug check

        $array = array();
        $slug = newslugend($this->input->post('name'));
        $slugOld = newslugend($this->input->post('slug_old'));
        if ($slugOld != $slug) {
            $slugResult = shweta_select('slug', 'filed', '', '');
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


        $fil = array(
            'name' => $this->input->post('name'),
            'implement_cate' => $this->input->post('implement_cate'),
            'slug' => $slug,
        );
        shweta_update('filed', $fil, 'id', $this->input->post('id'));
        $this->session->set_userdata('dataupdate', 'Filed title updated successfully');
        header("location:" . $root . "admins/show-field-title");


    }

    function showField()
    {
        $this->load->view('admins/header');
        $this->load->view('admins/show_field');
        $this->load->view('admins/footer');
    }

    function editField($id)
    {
        $result = array();
        $result['result'] = shweta_select('*', 'filed', 'id', $id);
        $this->load->view('admins/header');
        $this->load->view('admins/edit_fieldTitle', $result);
        $this->load->view('admins/footer');
    }

    function editFieldName($id)
    {
        $result = array();
        $result['result'] = shweta_select('*', 'implement_fileds', 'id', $id);
        $this->load->view('admins/header');
        $this->load->view('admins/edit_fieldName', $result);
        $this->load->view('admins/footer');
    }

    function deleteallfileds()
    {
        $value = array();
        $value = $this->input->post('val1');
        foreach ($value as $k1) {
            shweta_delete('filed', 'id', $k1);
            shweta_delete('implement_fileds', 'title', $k1);
            shweta_delete('implementvalue', 'cateId', $k1);
        }
        echo "Deleted successfully";
    }

    function deleteallfiledssingle($k1)
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        shweta_delete('implement_fileds', 'title', $k1);
        shweta_delete('filed', 'id', $k1);
        shweta_delete('implementvalue', 'cateId', $k1);
        $this->session->set_userdata('dataupdate', 'Filed title deleted successfully');
        header("location:" . $root . "admins/show-field-title");
    }

    function addFieldsName()
    {
        $this->load->view('admins/header');
        $this->load->view('admins/add_fields_name');
        $this->load->view('admins/footer');
    }

    function addFieldsNameEnd()
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        //feature
        $feature_name = array();
        $feature_name_str = '';
        $feature_name = $this->input->post('contactNo');
        if (!empty($feature_name)) {
            $feature_name = (array_filter($feature_name));
            $feature_name_str = implode('$$', $feature_name);
        }


        date_default_timezone_set("Asia/Kolkata");
        $date_time = $date = date('Y-m-d');


        $fil = array(
            'fieldsName' => $feature_name_str,
            'title' => $this->input->post('field'),
        );
        shweta_insert_form('implement_fileds', $fil);
        $this->session->set_userdata('dataupdate', 'Fileds  added successfully');
        header("location:" . $root . "admins/add-fields");
    }

    function updateFieldsNameEnd()
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        //feature
        $feature_name = array();
        $feature_name_str = '';
        $feature_name = $this->input->post('contactNo');
        if (!empty($feature_name)) {
            $feature_name = (array_filter($feature_name));
            $feature_name_str = implode('$$', $feature_name);
        }

// echo "<pre>";
// print_r($feature_name);
// die;
// echo $this->input->post('idval');
// die;
        $data8 = array(
            'impName' => $feature_name_str,
        );

        shweta_update('implementvalue', $data8, 'cateId ', $this->input->post('cateId'));

        date_default_timezone_set("Asia/Kolkata");
        $date_time = $date = date('Y-m-d');


        $fil = array(
            'fieldsName' => $feature_name_str,
            'title' => $this->input->post('field'),
        );
        shweta_update('implement_fileds', $fil, 'id', $this->input->post('idval'));
        $this->session->set_userdata('dataupdate', 'Fileds  Updated successfully');
        header("location:" . $root . "admins/show-fields");
    }

    function showFieldsname()
    {
        $this->load->view('admins/header');
        $this->load->view('admins/show_fieldName');
        $this->load->view('admins/footer');
    }

    function deleteallfiledsName()
    {
        $value = array();
        $value = $this->input->post('val1');
        foreach ($value as $k1) {
            shweta_delete('implement_fileds', 'id', $k1);
        }
        echo "Deleted successfully";
    }

    function deleteallfiledNamessingle($k1, $cateid)
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        shweta_delete('implement_fileds', 'id', $k1);
        shweta_delete('implementvalue', 'cateId', $cateid);
        $this->session->set_userdata('dataupdate', 'Fileds deleted successfully');
        header("location:" . $root . "admins/show-fields");
    }

    function Add_implementsNew()
    {
        $this->load->view('admins/header');
        $this->load->view('admins/add_implementNew');
        $this->load->view('admins/footer');
    }

    function getFields()
    {
        $value = $this->input->post('eml');


        $fields = array();
        $fields = shweta_select('*', 'implement_fileds', 'title', $value);
        foreach ($fields as $fieldsKey => $fieldsValue) {

            $featurename = array();
            $featurename_filter = array();
            $featurename_count = "";

            $featurename = explode('$$', $fieldsValue->fieldsName);
            $featurename_filter = (array_filter($featurename));
            ?>
            <h4 style="text-align:center;">If u have not value please insert N/A in field</h4>
            <?php
            foreach ($featurename_filter as $k1) {

                ?>

                <div class="form-group">
                    <label class="control-label col-md-4 col-sm-4 col-xs-12"><?php echo ucfirst($k1); ?> :
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_input(array('type' => 'text', 'required' => 'required', 'value' => 'N/A', 'class' => 'form-control', 'name' => 'valueImplement[]')); ?>
                    </div>
                </div>

                <?php

            }


        }


    }

    function addImplementNewEnd()
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        //feature
        $feature_name = array();
        $feature_name_str = '';
        $feature_name = $this->input->post('valueImplement');
        if (!empty($feature_name)) {
            $feature_name = (array_filter($feature_name));
            $feature_name_str = implode('$$', $feature_name);
        }


        $all_fieldName = "";
        foreach (shweta_select('*', ' implement_fileds', 'title', $this->input->post('implementFor')) as $key => $value) {
            $all_fieldName = $value->fieldsName;
        }


// echo $all_fieldName;
// echo "<pre>";
// print_r($feature_name);
// die;


        $gallery_name1 = '';

        if (!empty($_FILES['userfile']['name'][0])) {

            $slug = newslugend($this->input->post('name'));
            // $this->load->library('upload');
            $files = $_FILES;
            $count = count($_FILES['userfile']['name']);
            for ($i = 0; $i < $count; $i++) {
                $this->load->library('upload');
                $_FILES['userfile']['name'] = $files['userfile']['name'][$i];
                $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
                $_FILES['userfile']['size'] = $files['userfile']['size'][$i];
                $conf = $this->set_upload_optionsmultiple($slug);
                $this->load->library('image_lib', $conf);
                $this->image_lib->resize();
                $this->upload->initialize($conf);
                $this->upload->do_upload('userfile');
                $upload_data = $this->upload->data();
                $image_name[] = $upload_data['file_name'];
                $gallery_name1 = implode('$$', array_filter($image_name));
            }

        }


        date_default_timezone_set("Asia/Kolkata");
        $date_time = $date = date('Y-m-d');


        $image_name = '';
        if (isset($_FILES['model_image']['name'])) {
            if ($_FILES['model_image']['name'] != "") {
                $this->load->library('upload');
                $config['file_name'] = newslugend($this->input->post('name'));
                $config['upload_path'] = './images/implementTractor/';
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
        $specImge = '';
        if (isset($_FILES['model_image2']['name'])) {
            if ($_FILES['model_image2']['name'] != "") {

                $config['file_name'] = newslugend($this->input->post('name')) . "-specifications";
                $this->load->library('upload');
                $config['upload_path'] = './images/implementTractor/';
                $config['allowed_types'] = 'jpg|jpeg|gif|png';
                $config['max_size'] = 8000;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $this->upload->initialize($config);
                $this->upload->do_upload('model_image2');
                $upload_data = $this->upload->data();
                $specImge = $upload_data['file_name'];
            }
        }

        //slug check
        $array = array();
        $slug = newslugend($this->input->post('name'));
        $slugResult = shweta_select('slug', 'new_implement', '', '');
        foreach ($slugResult as $b => $a) {
            $array[] = $a->slug;
        }
        $array = array_filter($array);
        if (in_array($slug, $array)) {
            $slug = $slug . (count($slugResult) + 1);
        } else {
            $slug = $slug;
        }

        $imp_cate_fi = '';
        foreach (shweta_select('implement_cate', 'filed', 'id', $this->input->post('implementFor')) as $raa) $imp_cate_fi = ($raa->implement_cate);


        $fil = array(
            'spec_value' => '',
            'model_name' => $this->input->post('name'),
            'implementType' => $this->input->post('implementFor'),
            'implement_cate' => $imp_cate_fi,
            'brand' => $this->input->post('brand'),
            'overview' => $this->input->post('overview'),
            'slug' => $slug,
            'specImge' => $specImge,
            'date' => $date_time,
            'image' => $image_name,
            'gallery' => $gallery_name1,
            'tractorpower' => $this->input->post('tractorpower'),
            'price' => $this->input->post('price'),
            'status' => 1,
        );

        // shweta_insert_form('new_implement',$fil);
        $this->db->insert('new_implement', $fil);
        $insert_id = $this->db->insert_id();


        $data8 = array(
            'impName' => $all_fieldName,
            'ImpValue' => $feature_name_str,
            'ImpId' => $insert_id,
            'cateId' => $this->input->post('implementFor'),
        );

        shweta_insert_form('implementvalue', $data8);


        $this->session->set_userdata('dataupdate', 'Implement  added successfully');
        header("location:" . $root . "admins/add-implement");
    }

    function updateImplementNewEnd()
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        //feature
        $feature_name = array();
        $feature_name_str = '';
        $feature_name = $this->input->post('valueImplement');
        if (!empty($feature_name)) {
            $feature_name = (array_filter($feature_name));
            $feature_name_str = implode('$$', $feature_name);
        }


        $gallery_name1 = '';

        if (!empty($_FILES['userfile']['name'][0])) {

            $slug = newslugend($this->input->post('name'));
            // $this->load->library('upload');
            $files = $_FILES;
            $count = count($_FILES['userfile']['name']);
            for ($i = 0; $i < $count; $i++) {
                $this->load->library('upload');
                $_FILES['userfile']['name'] = $files['userfile']['name'][$i];
                $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
                $_FILES['userfile']['size'] = $files['userfile']['size'][$i];
                $conf = $this->set_upload_optionsmultiple($slug);
                $this->load->library('image_lib', $conf);
                $this->image_lib->resize();
                $this->upload->initialize($conf);
                $this->upload->do_upload('userfile');
                $upload_data = $this->upload->data();
                $image_name[] = $upload_data['file_name'];
                $gallery_name1 = implode('$$', array_filter($image_name));
            }

        }
        $new_gallery = "";
        $gallery = "";
        foreach (shweta_select('gallery', 'new_implement', 'id', $this->input->post('idHar')) as $raa) $gallery = ($raa->gallery);
        if ($gallery == "") {
            $new_gallery = $gallery_name1;
        } else {
            $new_gallery = rtrim(($gallery . "$$" . $gallery_name1), '$$');
        }


        date_default_timezone_set("Asia/Kolkata");
        $date_time = $date = date('Y-m-d');


        $image_name = '';
        if (isset($_FILES['model_image']['name'])) {
            if ($_FILES['model_image']['name'] != "") {
                $this->load->library('upload');
                $randNo = rand(1111, 99999);
                $config['file_name'] = newslugend($this->input->post('name') . $randNo);
                $config['upload_path'] = './images/implementTractor/';
                $config['allowed_types'] = 'jpg|jpeg|gif|png';
                $config['max_size'] = 8000;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $this->upload->initialize($config);
                $this->upload->do_upload('model_image');
                $upload_data = $this->upload->data();
                $image_name = $upload_data['file_name'];
                if (file_exists("./images/implementTractor/" . $this->input->post('oldmodel_image'))) {
                    unlink('./images/implementTractor/' . $this->input->post('oldmodel_image'));
                }
            } else {
                $image_name = $this->input->post('oldmodel_image');
            }
        } else {
            $image_name = $this->input->post('oldmodel_image');
        }
///
        $specImge = '';
        if (isset($_FILES['model_image2']['name'])) {
            if ($_FILES['model_image2']['name'] != "") {
                $this->load->library('upload');
                $randNo = rand(1111, 99999);
                $config['file_name'] = newslugend($this->input->post('name') . $randNo);
                $config['upload_path'] = './images/implementTractor/';
                $config['allowed_types'] = 'jpg|jpeg|gif|png';
                $config['max_size'] = 8000;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $this->upload->initialize($config);
                $this->upload->do_upload('model_image2');
                $upload_data = $this->upload->data();
                $specImge = $upload_data['file_name'];
                if (file_exists("./images/implementTractor/" . $this->input->post('specImage'))) {
                    unlink('./images/implementTractor/' . $this->input->post('specImage'));
                }
            } else {
                $specImge = $this->input->post('specImage');
            }
        } else {
            $specImge = $this->input->post('specImage');
        }


        $array = array();
        $slug = newslugend($this->input->post('name'));
        $slugOld = newslugend($this->input->post('slug_old'));
        if ($slugOld != $slug) {
            $slugResult = shweta_select('slug', 'new_implement', '', '');
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


        $imp_cate_fi = '';
        foreach (shweta_select('implement_cate', 'filed', 'id', $this->input->post('implementFor')) as $raa) $imp_cate_fi = ($raa->implement_cate);


        $data8 = array(
            'ImpValue' => $feature_name_str,
        );

        shweta_update('implementvalue', $data8, 'ImpId', $this->input->post('idHar'));


        $fil = array(
            'spec_value' => '',
            'model_name' => $this->input->post('name'),
            'overview' => $this->input->post('overview'),
            'tractorPower' => $this->input->post('tractorpower'),
            'price' => $this->input->post('price'),

            'implement_cate' => $imp_cate_fi,
            'brand' => $this->input->post('brand'),
            'specImge' => $specImge,
            'gallery' => $new_gallery,
            'slug' => $slug,
            'image' => $image_name,
            'status' => 1,
        );

        shweta_update('new_implement', $fil, 'id', $this->input->post('idHar'));
        $this->session->set_userdata('dataupdate', 'Implement  Updated successfully');
        header("location:" . $root . "admins/show-implement-list");
    }

    function ShowImplementsOld()
    {
        $this->load->view('admins/header');
        $this->load->view('admins/list_oldImplements');
        $this->load->view('admins/footer');
    }

    function singleOldImplements($id)
    {
        // echo $id;
        // die;
        $result = array();
        $result['result'] = shweta_select('*', 'old_implement', 'id', $id);
// print_r($result);
// die;
        $this->load->view('admins/header');
        $this->load->view('admins/single_implementsOld_tractor', $result);
        $this->load->view('admins/footer');

    }

    function SrachAjax2()
    {

        $result = array();
        $value = $_GET["term"];

        $condition = '';
        $condition = "model_name LIKE '%" . $value . "%'";
        $result = shweta_select_th('model_name', 'old_implement', $condition);


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

    private function set_upload_options()
    {

        $config = array();
        // $config['file_name']=newslugend($a)."-harvester";
        $config['upload_path'] = './images/implementTractor/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite'] = FALSE;
        return $config;
    }
}

?>