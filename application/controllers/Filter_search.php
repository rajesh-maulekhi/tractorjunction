<?php

class Filter_search extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('shweta');
        $this->load->helper('form');
        $this->load->helper('query');
        $this->load->library('session');
        $this->load->model('Front_model');
        
    }
function viewmore(){
    
    $root = "http://".$_SERVER['HTTP_HOST'];
    $root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
    header('Location: '.$root.'tractors');
    die;
}
    function index()
    {

        @define('ROOTURL', $root);
        @define('IMAGES', ROOTURL . "upload/");

        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
// echo "aaa";

        $value_array = $this->input->post('val');
        $page_type1 = $this->input->post('page_type1');

        if (!empty($value_array)) {
            $main_array_explode = array();
            $key_index_array = array();
            $colume_name = array();
            $colume_value = array();
            $key_value = "";
            $key_index = "";
            $new_array = array();
            foreach ($value_array as $key => $value) {
                $main_array_explode[] = explode(':', $value);
            }
// print_r($main_array_explode);
// die;
            foreach ($main_array_explode as $key1) {
                $key_index = $key1[0];
                $key_value = $key1[1];
                $new_array[][$key_index] = $key_value;
            }
// print_r($new_array);
// die;
// print_r($key_value);
            $explode_price = array();
            $explode_hp = array();
            $all_tractor = array();
            $all_tractor_explode = array();
            $match_tractor = array();
            $condition_price = "";
            $condition_hp = "";
            $condition_brand = "";
            $condition_uses = "";
// echo "<pre>";
// print_r($new_array);
// die;

            foreach ($new_array as $key2 => $value2) {
                foreach ($value2 as $key3 => $value3) {
                    //price condition
                    if ($key3 == "price") {
                        $explode_price = explode('-', $value3);
                        $condition_price .= " price BETWEEN " . $explode_price[0] . " AND " . $explode_price[1] . " OR ";
                    } //brand condition
                    elseif ($key3 == "brand") {
                        $condition_brand .= $key3 . " = " . $value3 . " OR ";
                    } //hp condition    .
                    elseif ($key3 == "hp") {
                        $explode_hp = explode('-', $value3);
                        $condition_hp .= " hp BETWEEN " . $explode_hp[0] . " AND " . $explode_hp[1] . " OR ";
                    } //category uses
                    elseif ($key3 == "uses_tractor") {
                        $all_tractor = shweta_select('id,uses_tractor', 'tech_specification', '', '');
                        foreach ($all_tractor as $all => $val) {
                            $all_tractor_explode = explode(',', $val->uses_tractor);
                            if (in_array($value3, $all_tractor_explode)) {
                                if (!in_array($val->id, $match_tractor)) {
                                    $condition_uses .= "tech_specification.id = " . $val->id . " OR ";
                                }
                            }
                        }
                    }
                }
            }


            $condition_new_price = rtrim($condition_price, " OR");
            $condition_new_brand = rtrim($condition_brand, " OR");
            $condition_new_hp = rtrim($condition_hp, " OR");
            $condition_new_uses = rtrim($condition_uses, " OR");
            $fibal_condition = "";

            if ($condition_new_price != "") {
                $fibal_condition .= " (" . $condition_new_price . " ) AND ";
            }
            if ($condition_new_brand != "") {
                $fibal_condition .= " (" . $condition_new_brand . " ) AND ";
            }
            if ($condition_new_hp != "") {
                $fibal_condition .= " (" . $condition_new_hp . " ) AND ";
            }
            if ($condition_new_uses != "") {
                $fibal_condition .= " (" . $condition_new_uses . " ) AND ";
            };
            $condition_final = "";
            $condition_final = rtrim($fibal_condition, " AND");;
            $condition_final;

            $result['tractor_result'] = $this->Front_model->get_result_fieldsLimit('priceShow,price,wheel_drive,transmission_clutch,id,brand,model_name,hp,cylinder,image,capacity', $condition_final, 'tech_specification', 24, 1);

            echo TractorShowHTML($result['tractor_result'],$page_type1);


        } else {
            $condition_final = array();
            $result['tractor_result'] = $this->Front_model->get_result_fieldsLimit('priceShow,price,wheel_drive,transmission_clutch,id,brand,model_name,hp,cylinder,image,capacity', $condition_final, 'tech_specification', 24, 1);
            echo TractorShowHTML($result['tractor_result'],$page_type1);
        }
    }
}

?>