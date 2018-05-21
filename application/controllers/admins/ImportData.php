<?php

class ImportData extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('shweta');
        $this->load->helper('form');
        $this->load->database();
    }

    function index()
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);


        if (isset($_POST["submit"])) {

            if (isset($_FILES["model_image"])) {
                $imageFileType = pathinfo($_FILES["model_image"]["name"], PATHINFO_EXTENSION);
                if ($imageFileType != "xls") {
                    $this->session->set_userdata('dataupdate', 'File is not valid format please try again');
                    header('Location:' . $root . "admins/ImportDealers");
                } else {
                    require_once 'export_file_excel/Classes/PHPExcel.php';


                    if ($_FILES['model_image']['name'] != "") {
                        $this->load->library('upload');
                        $config['upload_path'] = '/upload/files/';
                        $config['allowed_types'] = 'xls';
                        $config['max_size'] = 8000;
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();
                        $this->upload->initialize($config);
                        $this->upload->do_upload('model_image');
                        $uploadedStatus = 1;
                    }
                    // echo "aa";
                    // die;
                    /************************ YOUR DATABASE CONNECTION END HERE  ****************************/

                    $file_path = './upload/files/' . $_FILES['model_image']['name'];
                    include './export_file_excel/Classes/PHPExcel/IOFactory.php';
                    $inputFileName = $file_path;
                    $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
                    $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
                    $arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet

// echo "<pre>";
// print_r($allDataInSheet);
// die;
                    $this->db->truncate('dealers');

                    for ($i = 2; $i <= $arrayCount; $i++) {
                        $state = trim($allDataInSheet[$i]["A"]);
                        $city = trim($allDataInSheet[$i]["B"]);
                        $name_de = trim($allDataInSheet[$i]["C"]);
                        $authorize = trim($allDataInSheet[$i]["D"]);
                        $address = trim($allDataInSheet[$i]["E"]);
                        $pin = trim($allDataInSheet[$i]["F"]);
                        $contact = trim($allDataInSheet[$i]["G"]);

                        $data = array(
                            'state' => $state,
                            'city' => $city,
                            'name_de' => $name_de,
                            'authorize' => $authorize,
                            'address' => $address,
                            'pin' => $pin,
                            'contact' => $contact,
                        );
                        shweta_insert_form('dealers', $data);
                        $this->session->set_userdata('dataupdate', 'data inserted');
                    }


                    unlink($file_path);
                    $this->session->set_userdata('dataupdate', 'data inserted');
                    header('Location:' . $root . "admins/ImportDealers");
                }
            }
        } else {
            $this->session->set_userdata('dataupdate', 'No File selected');
            header('Location:' . $root . "admins/ImportDealers");
        }


    }

    function Harvester()
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        if (isset($_POST["submit"])) {

            if (isset($_FILES["model_image"])) {
                $imageFileType = pathinfo($_FILES["model_image"]["name"], PATHINFO_EXTENSION);
                if ($imageFileType != "xls") {
                    $this->session->set_userdata('dataupdate', 'File is not valid format please try again');
                    header('Location:' . $root . "admins/ImportHarvester");
                } elseif ($_FILES['model_image']['name'] != 'Harvester.xls') {
                    $this->session->set_userdata('dataupdate', 'File Name is not valid . please try again');
                    header('Location:' . $root . "admins/ImportHarvester");
                } else {
                    require_once 'css/Classes/PHPExcel.php';
                    if ($_FILES['model_image']['name'] != "") {
                        $this->load->library('upload');
                        $config['upload_path'] = './upload/files/';
                        $config['allowed_types'] = 'xls';
                        $config['max_size'] = 8000;
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();
                        $this->upload->initialize($config);
                        $this->upload->do_upload('model_image');
                        $uploadedStatus = 1;
                    }
                    /************************ YOUR DATABASE CONNECTION END HERE  ****************************/

                    $file_path = './upload/files/' . $_FILES['model_image']['name'];
                    include './css/Classes/PHPExcel/IOFactory.php';
                    $inputFileName = $file_path;
                    // echo $inputFileName;
                    // die;
                    $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
                    $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
                    $arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet


                    for ($i = 2; $i <= $arrayCount; $i++) {
                        $image = trim($allDataInSheet[$i]["F"]);
                        $speciimage = trim($allDataInSheet[$i]["E"]);
                        $id = trim($allDataInSheet[$i]["B"]);


                        $data = array(
                            'specImge' => $speciimage,
                            'image' => $image,

                        );
                        shweta_popular('harvester', $data, 'id', $id);
                        $this->session->set_userdata('dataupdate', 'data Updated');
                    }


                    unlink($file_path);
                    $this->session->set_userdata('dataupdate', 'data Updated');
                    header('Location:' . $root . "admins/ImportHarvester");
                }
            }
        } else {
            $this->session->set_userdata('dataupdate', 'No File selected');
            header('Location:' . $root . "admins/ImportHarvester");
        }


    }

    function Implement()
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        if (isset($_POST["submit"])) {

            if (isset($_FILES["model_image"])) {
                $imageFileType = pathinfo($_FILES["model_image"]["name"], PATHINFO_EXTENSION);
                if ($imageFileType != "xls") {
                    $this->session->set_userdata('dataupdate', 'File is not valid format please try again');
                    header('Location:' . $root . "admins/ImportImplement");
                } elseif ($_FILES['model_image']['name'] != 'Implement.xls') {
                    $this->session->set_userdata('dataupdate', 'File Name Is Not Valid.please try again');
                    header('Location:' . $root . "admins/ImportImplement");
                } else {
                    require_once 'css/Classes/PHPExcel.php';
                    if ($_FILES['model_image']['name'] != "") {
                        $this->load->library('upload');
                        $config['upload_path'] = './upload/files/';
                        $config['allowed_types'] = 'xls';
                        $config['max_size'] = 8000;
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();
                        $this->upload->initialize($config);
                        $this->upload->do_upload('model_image');
                        $uploadedStatus = 1;
                    }
                    /************************ YOUR DATABASE CONNECTION END HERE  ****************************/

                    $file_path = './upload/files/' . $_FILES['model_image']['name'];
                    include './css/Classes/PHPExcel/IOFactory.php';
                    $inputFileName = $file_path;
                    // echo $inputFileName;
                    // die;
                    $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
                    $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
                    $arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet


                    for ($i = 2; $i <= $arrayCount; $i++) {
                        $image = trim($allDataInSheet[$i]["F"]);
                        $speciimage = trim($allDataInSheet[$i]["E"]);
                        $id = trim($allDataInSheet[$i]["B"]);

                        $data = array(
                            'specImge' => $speciimage,
                            'image' => $image,

                        );
                        shweta_popular('new_implement', $data, 'id', $id);
                        $this->session->set_userdata('dataupdate', 'data Updated');
                    }

                    unlink($file_path);
                    $this->session->set_userdata('dataupdate', 'data Updated');
                    header('Location:' . $root . "admins/ImportImplement");
                }
            }
        } else {
            $this->session->set_userdata('dataupdate', 'No File selected');
            header('Location:' . $root . "admins/ImportImplement");
        }


    }

    function Tractor()
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        if (isset($_POST["submit"])) {

            if (isset($_FILES["model_image"])) {
                $imageFileType = pathinfo($_FILES["model_image"]["name"], PATHINFO_EXTENSION);
                if ($imageFileType != "xls") {
                    $this->session->set_userdata('dataupdate', 'File is not valid format please try again');
                    header('Location:' . $root . "admins/ImportTracor");
                } elseif ($_FILES['model_image']['name'] != 'Tractor.xls') {
                    $this->session->set_userdata('dataupdate', 'File Name Is Not Valid. please try again');
                    header('Location:' . $root . "admins/ImportTracor");
                } else {
                    require_once 'css/Classes/PHPExcel.php';
                    if ($_FILES['model_image']['name'] != "") {
                        $this->load->library('upload');
                        $config['upload_path'] = './upload/files/';
                        $config['allowed_types'] = 'xls';
                        $config['max_size'] = 8000;
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();
                        $this->upload->initialize($config);
                        $this->upload->do_upload('model_image');
                        $uploadedStatus = 1;
                    }
                    /************************ YOUR DATABASE CONNECTION END HERE  ****************************/

                    $file_path = './upload/files/' . $_FILES['model_image']['name'];
                    include './css/Classes/PHPExcel/IOFactory.php';
                    $inputFileName = $file_path;
                    // echo $inputFileName;
                    // die;
                    $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
                    $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
                    $arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet


                    for ($i = 2; $i <= $arrayCount; $i++) {
                        $image = trim($allDataInSheet[$i]["E"]);

                        $id = trim($allDataInSheet[$i]["B"]);

                        $data = array(

                            'image' => $image,

                        );
                        shweta_popular('tech_specification', $data, 'id', $id);
                        $this->session->set_userdata('dataupdate', 'data Updated');
                    }


                    unlink($file_path);
                    $this->session->set_userdata('dataupdate', 'data Updated');
                    header('Location:' . $root . "admins/ImportTracor");
                }
            }
        } else {
            $this->session->set_userdata('dataupdate', 'No File selected');
            header('Location:' . $root . "admins/ImportTracor");
        }


    }
}

?>