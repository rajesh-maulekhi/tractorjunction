<?php

class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('shweta'); 
		$this->load->database();  
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library("pagination");
 
    }

    function index()
    {

        $this->load->view('vendor/header');
        $this->load->view('vendor/home');
        $this->load->view('vendor/footer');
    }
    function PassChaneEnd()
    {
		$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
		$id=$this->session->userdata('vendor');
       $u_name = $this->input->post('u_name');
        $n_pass = $this->input->post('n_pass');
        $o_pass = $this->input->post('o_pass');
		   $result = array();
        $condition = "password='" . $o_pass . "' and id ='" . $id . "'";
	   
      $fil = array(
            'username' => $u_name,
            'password' => $n_pass,
        );
        $result = shweta_select_th('*', 'vendors', $condition);
		// print_r($result);
		// die;
		   if (empty($result)) {
            $this->session->set_userdata('dataupdate', 'Old password not match');
          	   header("Location: ".$root."vendor");
            die;
        } elseif (!empty($result)) {
			shweta_update('vendors', $fil, 'id', $id);
			    $this->session->set_userdata('dataupdate', 'Profile Updated');
		}
		   header("Location: ".$root."vendor");
            die; 
    }
    function Profile()
    {

        $this->load->view('vendor/header');
        $this->load->view('vendor/password_change');
        $this->load->view('vendor/footer');
    }
    function onRoadPriceShow()
    {
		// echo $this->session->userdata('vendor');
		// die;
		$brand_id="0";
		$vendorResult=shweta_select('brand_id','vendors','id',$this->session->userdata('vendor'));
		foreach($vendorResult as $key=>$value){
			$brand_id=$value->brand_id;
		}
		// echo $brand_id;
		// die;
	 $cond="brand='".$brand_id."'"; 
        $this->load->model("form_model");
        $config = array();
        $config["base_url"] = base_url() . "vendor/on-road-price";
        $config["total_rows"] = GetCountResultDesboard('id','onroadprice',$cond);
        $config["per_page"] = 12;
        $config["page_query_string"] = TRUE;
        $config['first_tag_open'] = $config['last_tag_open'] = $config['next_tag_open'] = $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
        $config['first_tag_close'] = $config['last_tag_close'] = $config['next_tag_close'] = $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li><span><b>";
        $config['cur_tag_close'] = "</b></span></li>";
        $config['first_link'] = '&laquo; First';
        $config['last_link'] = 'Last &raquo;';
        $config['use_page_numbers'] = true;
        $this->pagination->initialize($config);
        $temp = strstr($_SERVER['REQUEST_URI'], '=');
        $temp = str_replace("=", "", $temp);
        $temp = $temp - 1;
        if ($temp > 0)
            $page = $temp * $config["per_page"];
        else
            $page = 0;
        $result['result'] = $this->form_model->show_paginationvendorA($config["per_page"], $page, 'onroadprice',$brand_id);
        $result["links"] = $this->pagination->create_links();
$result['total_rows']=$config["total_rows"];
        $this->load->view('vendor/header');
        $this->load->view('vendor/view_request_onroad', $result);
        $this->load->view('vendor/footer');
    }
    function Ads_Data()
    {
		$brand_id="0";
		$vendorResult=shweta_select('brand_id','vendors','id',$this->session->userdata('vendor'));
		foreach($vendorResult as $key=>$value){
			$brand_id=$value->brand_id;
		}
	$cond="brand_id='".$brand_id."'"; 

        $this->load->model("form_model");
        $config = array();
        $config["base_url"] = base_url() . "vendor/Home/Ads_Data";
       $config["total_rows"] = GetCountResultDesboard('id','vendor_ads_data',$cond);
        
		$config["per_page"] = 12;
        $config["page_query_string"] = TRUE;
        $config['first_tag_open'] = $config['last_tag_open'] = $config['next_tag_open'] = $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
        $config['first_tag_close'] = $config['last_tag_close'] = $config['next_tag_close'] = $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li><span><b>";
        $config['cur_tag_close'] = "</b></span></li>";
        $config['first_link'] = '&laquo; First';
        $config['last_link'] = 'Last &raquo;';
        $config['use_page_numbers'] = true;
        $this->pagination->initialize($config);
        $temp = strstr($_SERVER['REQUEST_URI'], '=');
        $temp = str_replace("=", "", $temp);
        $temp = $temp - 1;
        if ($temp > 0)
            $page = $temp * $config["per_page"];
        else
            $page = 0;
        $result['result'] = $this->form_model->show_paginationvendor($config["per_page"], $page, 'vendor_ads_data',$brand_id);
        $result["links"] = $this->pagination->create_links();
$result['total_rows']=$config["total_rows"];

// echo "<pre>";
// print_r($result);
// die;
        $this->load->view('vendor/header');
        $this->load->view('vendor/ads_data', $result);
        $this->load->view('vendor/footer');
    }
}

?>