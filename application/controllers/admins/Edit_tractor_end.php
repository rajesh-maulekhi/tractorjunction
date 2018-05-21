<?php

class Edit_tractor_end extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('shweta');
        $this->load->library('session');

        $this->load->database();
    }

    function index()
    {
        //initilize variable
        $ass_array = array();
        $option_array = array();
        $additional_array = array();
        $accessories_arr = array();
        $options_arr = array();
        $additional_features_arr = array();
        $caption1 = "";
        $caption2 = "";
        $caption3 = "";
        $uses_val_string = "";
        $ass_array = $this->input->post('accessories_name');
        $option_array = $this->input->post('options_name');
        $additional_array = $this->input->post('addi_name');

        if (!empty($ass_array)) {
            $accessories_arr = (array_filter($ass_array));
        }
        if (!empty($option_array)) {
            $options_arr = (array_filter($option_array));
        }
        if (!empty($additional_array)) {
            $additional_features_arr = (array_filter($additional_array));
        }
        foreach ($accessories_arr as $p1) {
            $caption1 .= $p1 . "$$";
        }

        foreach ($options_arr as $p2) {
            $caption2 .= $p2 . "$$";
        }
        foreach ($additional_features_arr as $p3) {
            $caption3 .= $p3 . "$$";
        }
        $ass_val = rtrim($caption1, '$$');
        $opt_val = rtrim($caption2, '$$');
        $add_val = rtrim($caption3, '$$');

        if ($this->input->post('uses') != "") {
            $uses_val = $this->input->post('uses');
            $uses_val_string = implode(',', $uses_val);
        }

        $image_name = "";
        $newDate = date("Y-m-d");
        if (($_FILES['model_image']['name']) != "") {


            // $image_name=$brand_name."tractor".$model_name.$rand_no.".jpg";


// $_FILES['model_image']['name']=$image_name;

            $this->load->library('upload');
            $RanddomNo = rand(111111, 999999);
            $brand = '';
            foreach (shweta_select('name', 'brand', 'id', $this->input->post('brand')) as $raa) $brand = ($raa->name);
            $config['file_name'] = newslugend($brand) . '-' . newslugend($this->input->post('model_name') . '-' . $RanddomNo);
            // required configuration.
            $config['upload_path'] = './upload/';
            $config['allowed_types'] = 'jpg|jpeg|gif|png';
            $config['max_size'] = 80000;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $this->upload->initialize($config);
            $this->upload->do_upload('model_image');
            if ($this->input->post('model_img') != "tractor_default.png") {
                if (file_exists("./upload/" . $this->input->post('model_img'))) {
                    unlink('./upload/' . $this->input->post('model_img'));
                }
            }
            $upload_data = $this->upload->data();
            $image_name = $upload_data['file_name'];

        } else {
            $image_name = $this->input->post('model_img');
        }
        $slug = '';
        $slug = SlugEditPage('tech_specification', $this->input->post('model_name'), $this->input->post('old_slug'));


        $data = array(
            'brand' => $this->input->post('brand'),
            'model_name' => $this->input->post('model_name'),
            'image' => $image_name,
            'slug' => $slug,
            'cylinder' => $this->input->post('cylinder'),
            'hp' => $this->input->post('hp'),
            'capacity' => $this->input->post('capacity'),
            'engine_rated_rpm' => $this->input->post('engine_rated_rpm'),
            'cooling' => $this->input->post('cooling'),
            'engine_air_filter' => $this->input->post('engine_air_filter'),
            'transmission_clutch' => $this->input->post('transmission_clutch'),
            'transmission_gear_box' => $this->input->post('transmission_gear_box'),
            'transmission_type' => $this->input->post('transmission_type'),
            'wheel_drive' => $this->input->post('wheel_drive'),
            'overview' => $this->input->post('overview'),
            'speed_forward' => $this->input->post('speed_forward'),
            'speed_reverse' => $this->input->post('speed_reverse'),
            'breaks' => $this->input->post('breaks'),
            'hydraulic_lifting_capacity' => $this->input->post('hydraulic_lifting_capacity'),
            'hydraulic_point_linkage' => $this->input->post('hydraulic_point_linkage'),
            'steering_type' => $this->input->post('steering_type'),
            'steering_column' => $this->input->post('steering_column'),
            'powertakeoff_type' => $this->input->post('powertakeoff_type'),
            'powertakeoff_rpm' => $this->input->post('powertakeoff_rpm'),
            'wheels_tyre_front' => $this->input->post('wheels_tyre_front'),
            'wheels_tyre_rear' => $this->input->post('wheels_tyre_rear'),
            'fuel_tank_capacity' => $this->input->post('fuel_tank_capacity'),
            'battery_info' => $this->input->post('battery_info'),
            'alternator_info' => $this->input->post('alternator_info'),
            'total_weight' => $this->input->post('total_weight'),
            'wheel_base' => $this->input->post('wheel_base'),
            'overall_length' => $this->input->post('overall_length'),
            'overall_width' => $this->input->post('overall_width'),
            'ground_clearance' => $this->input->post('ground_clearance'),
            'turningradius_with_breaks' => $this->input->post('turningradius_with_breaks'),
            'accessories' => $ass_val,
            'options' => $opt_val,
            'additional_features' => $add_val,
            'warranty' => $this->input->post('warranty'),
            'uses_tractor' => $uses_val_string,
            'status' => $this->input->post('status'),
            'other_info' => $this->input->post('other_info'),
            'price' => $this->input->post('price'),
            'ptohp' => $this->input->post('ptohp'),
            'fuel_pump' => $this->input->post('fuel_pump'),
        );
        // echo "<pre>";
        // print_r($data);
        // die;
        shweta_update('tech_specification', $data, 'id', $this->input->post('model_id'));
        $this->session->set_userdata('value_inserted', 'Tractor Updated successfully');

        // shweta_insert_form('tech_specification',$data);
        // $this->session->set_userdata('value_inserted', 'Tractor added successfully');
        header("Location:view_tractor");

    }
}

?>