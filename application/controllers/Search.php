<?php

class Search extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('shweta');
        $this->load->helper('query');
        $this->load->library("pagination");
        $this->load->model("Front_model");
    }
	function SingleT(){
			$root = "http://".$_SERVER['HTTP_HOST'];
			$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);

			if(isset($_GET['id_val'])){
			$data=array(
			'id'=>$_GET['id_val']
			);
			$result = $this->Front_model->get_result_fields('id,brand,model_name', $data, 'tech_specification');
			if(!empty($result)){
			foreach($result as $key=>$value){
			$url='';
			foreach(SelectQuery('name','brand','id',$value->brand) as $ke=>$val) $BrandName= ($val->name) ;
			$url=$root.'product/'.$value->id.'/'.newslugend($BrandName)."-tractor".shweta_nameslug($value->model_name);
			header('Location: '.$url);
			die;
			
			}
			}else{
			header('Location: '.$root.'tractors');
			die;
			}
			}else{
			header('Location: '.$root.'tractors');
			die;
			}
	}
	function SingleTractorPageForError($id,$b,$c){
			$root = "http://".$_SERVER['HTTP_HOST'];
			$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
	$data=array(
			'id'=>$id
			);
				$result = $this->Front_model->get_result_fields('id,brand,model_name', $data, 'tech_specification');
			if(!empty($result)){
			foreach($result as $key=>$value){
			$url='';
			foreach(SelectQuery('name','brand','id',$value->brand) as $ke=>$val) $BrandName= ($val->name) ;
			$url=$root.'product/'.$value->id.'/'.newslugend($BrandName)."-tractor".shweta_nameslug($value->model_name);
			header('Location: '.$url);
			die;
			}
			}else{
			header('Location: '.$root.'tractors');
			die;
			}
	}

    function DealearGet()
    {
        $datadealear = array(
            'authorize' => $this->input->post('Brand_Value'),
            'city' => $this->input->post('city_Value'),
        );

        $dealear_result = $this->Front_model->get_result_fieldsLimit('*', $datadealear, 'dealers', '1', '0');

        if (!empty($dealear_result)) {
            foreach ($dealear_result as $dealear_resultkey => $dealear_resultvalue) {
                foreach (SelectQuery('name', 'brand', 'id', $dealear_resultvalue->authorize) as $raa) $brand_name = ucfirst(($raa->name));
            } ?>
            <div class="col-sm-12 col-md-12 col-xs-12 ipm paddingZ padding_0_in_small">
                <div class="box-wrapper ipm">
                    <div class="box ipm">
                        <div class="row ipm">
                            <div class="col-sm-12 col-md-12 col-xs-12 ipm padding_0_in_small ipm"
                                 style="padding: 10px 20px;">
                                <div class="col-sm-3 col-md-3 col-xs-6">
                                    <ul class="paddingZ" style="line-height: 25px;margin-bottom: 0px;" type="none">
                                        <li>Name :</li>
                                        <li>Contact No. :</li>
                                        <li>Authorization:</li>
                                        <li>Address :</li>
                                        <li>State :</li>
                                        <li>City :</li>
                                        <li>Pin Code :</li>
                                    </ul>
                                </div>
                                <div class="col-sm-9 col-md-9 col-xs-6">
                                    <ul class="paddingZ" style="line-height: 25px;margin-bottom: 0px;" type="none">
                                        <li><?php echo $dealear_resultvalue->name_de; ?></li>
                                        <li><?php echo $dealear_resultvalue->contact; ?></li>
                                        <li><?php echo $brand_name; ?></li>
                                        <li><?php echo $dealear_resultvalue->address; ?></li>
                                        <li><?php
                                            if ($dealear_resultvalue->state != 0)
                                                foreach (shweta_select('name', 'states', 'id', $dealear_resultvalue->state) as $raa) echo ucfirst($raa->name);
                                            else
                                                echo "Not Filled";

                                            ?></li>
                                        <li>
                                            <?php
                                            if ($dealear_resultvalue->city != 0)
                                                foreach (shweta_select('name', 'cities', 'id', $dealear_resultvalue->city) as $raa) echo ucfirst($raa->name);
                                            else
                                                echo "Not Filled*";
                                            ?>

                                        </li>
                                        <li><?php echo $dealear_resultvalue->pin; ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } else {
            echo "Not Found";
        }
    }
function brandsSearchForError(){
		$root = "http://".$_SERVER['HTTP_HOST'];
		$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);

		if(isset($_GET['id'])){
				$data=array(
				'id'=>$_GET['id']
				);
					$result = $this->Front_model->get_result_fields('id,name', $data, 'brand');
			if(!empty($result)){
			foreach($result as $key=>$value){
			$url=''; 
			$url=$root.'search-tractor/'.$value->id.'/'.newslugend($value->name);
			header('Location: '.$url);
			die;
			}
			}else{
			header('Location: '.$root.'tractors');
			die;
			}
				
		}else{
		header('Location: '.$root.'tractors');
		die;
		}
}
    function brandsSearch($id, $name)
    {
        $brand_id = $id;
        $final_condition = "brand ='" . $brand_id . "'";
        $result['tractor_page'] = 0;
        $condition_final = array();
        $result['tractor_result'] = Pagination_query_selected('priceShow,price,transmission_clutch,wheel_drive,id,brand,model_name,hp,cylinder,image,capacity', 'tech_specification', '24', 'tractors', $final_condition);
	
$seo_tags = $this->Front_model->brandSeoTag($brand_id);
	$meta_tag=array(); 
	$seo_tag=$seo_tags[0]->seo_meta;
	$meta_tag=unserialize(base64_decode($seo_tag));
	$meta_title=$meta_tag['meta_title'];
	if($meta_title ==""){
		$meta_title='Tractor Brands in India, Tractor Price in India, Tractor Brands, Tractor Models- TractorJunction';		
	}
	$meta_keywords=$meta_tag['meta_keywords'];
	if($meta_keywords ==""){
	$meta_keywords = "Tractor, Tractors, Latest Tractors, Latest Tractor in India, Compare Tractors Online, Compare Tractors,  Tractors in India, Tractor Price in India, Tractor Brands, Tractor Information, Tractor Specification, Tractors Reviews, Tractors Features, Tractors Models, Tractor prices India, New Tractors in India, Model Tractors, Agriculture Tractor, Tractor Dealers in India, Best Tractor in India, Best Tractors in India, Tractor Info, Commercial Tractors,  Agricultural Tractors, Tractor Models, Latest Tractors in India,  New Tractors, New Tractors in India, Tractor Prices, Tractors Specification, Tractor Reviews, Tractor Features, ACE Tractor, Captain Tractor, Eicher Tractor, Escort Tractor, Farmtrac Tractor, Force Tractor, HMT Tractor, Indo Farm Tractor, John Deere Tractor, Josh Tractor, Kubota Tractor, Lovson Tractor, Mahindra Tractor, Massey Ferguson Tractor, New Holland Tractor, PowerTrac Tractor, Preet Tractor, Same Deutz-Fahr Tractor, Sonalika Tractor, Standard Tractor, Swaraj Tractor, Tafe Tractor, VST Shakti Tractor";
	}
	$meta_description=$meta_tag['meta_description'];
if($meta_description ==""){
	$meta_description = "List of all Tractor Brands in India including ACE, Captain, Eicher, Escort, Farmtrac, Force, HMT,  Indo Farm, John Deere, Josh, Kubota, Lovson, Mahindra, Massey Ferguson, New Holland, PowerTrac, Preet, Same Deutz-Fahr, Sonalika, Standard, Swaraj, Tafe, VST Shakti.";
	}

	$result['ad_var']='brand';
        $meta = array(
            'meta_title' => $meta_title,
            'meta_keywords' => $meta_keywords,
            'meta_description' => $meta_description,
            'meta_robots' => 'all',
            'extra_headers' => ''
        );
        $data11 = array();
        $data11 = array_merge($data11, $meta);
        $this->load->view('header', $data11);
        $this->load->view('search', $result);
        $this->load->view('footer');
    }
function OnRoadPricePage(){
	
        $keyword = "";
        $keyword = "Tractor, Tractors, Latest Tractors, Latest Tractor in India, Compare Tractors Online, Compare Tractors,  Tractors in India, Tractor Price in India, Tractor Brands, Tractor Information, Tractor Specification, Tractors Reviews, Tractors Features, Tractors Models, Tractor prices India, New Tractors in India, Model Tractors, Agriculture Tractor, Tractor Dealers in India, Best Tractor in India, Best Tractors in India, Tractor Info, Commercial Tractors,  Agricultural Tractors, Tractor Models, Latest Tractors in India,  New Tractors, New Tractors in India, Tractor Prices, Tractors Specification, Tractor Reviews, Tractor Features";
        $des = "Find latest tractor models and brands in India. Check out their information, price, features, specification, reviews, models, dealers and all details of major tractor manufacturers including Mahindra, Eicher, Sonalika, New Holland, John Deere etc.";
        $meta = array(
            'meta_title' => "India's first tractor online showroom: Latest Tractor Models, Tractor Price, Tractor Reviews, Compare Tractors, Tractor Specification & Features – TractorJunction",
            'meta_keywords' => $keyword,
            'meta_description' => $des,
            'meta_robots' => 'all',
            'extra_headers' => ''
        );
        $data = array();
        $data = array_merge($data, $meta);
        $this->load->view('header', $data);
        $this->load->view('on_RoadPrice_page');
        $this->load->view('footer');
    
}
    function AdvanceSearch()
    {
	$root = "http://".$_SERVER['HTTP_HOST'];
		$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);

//hp condition
        $hp = "";
        $cont_hp = "";
        $condition_hp = "";
        $hp_explode = array();
        $hp_id = array();
        $id_hp = array();
        $min_id_hp = array();
        $max_id_hp = array();


        $hp = $this->input->post('hp_name');
        if ($hp != "0" && $hp != "") {
            if ($hp != "0" && $hp != "") {
                $hp_explode[] = explode(':', $hp);
                foreach ($hp_explode as $h1) {
                    if ($h1[0] == "hp") {
                        $hp_id[] = $h1[1];
                    }
                }
            }
            foreach ($hp_id as $id_h) {
                $id_hp[] = explode('-', $id_h);
            }
            foreach ($id_hp as $e121) {
                $min_id_hp[] = $e121[0];
                $max_id_hp[] = $e121[1];
            }
            $cont_hp = count($max_id_hp);

            $condition_hp = " name BETWEEN " . $min_id_hp[0] . " AND " . $max_id_hp[0];
        }

        //condition brand
        $brand = "";
        $brand = $this->input->post('brand_name');
        $condition_brand = "";
        if ($brand != "0" && $brand != "") {
            $condition_brand = " brand = " . $brand;
        }


        $final_condition = "";

        if ($condition_brand != "" && $condition_brand != "") {
            $final_condition .= "(" . $condition_brand . ") AND ";
        }
        if ($condition_hp != "" && $condition_hp != "") {
            $final_condition .= "(" . $condition_hp . ") AND ";
        }
        $final_condition = rtrim($final_condition, ' AND');
     $ci =& get_instance();
        $ci->load->database();
   
		if($final_condition !=""){
        $ci->db->select('hp.*,tech_specification.*,tech_specification.id as tractor_id');
        $ci->db->from('hp');
        $ci->db->where($final_condition);
        $ci->db->join('tech_specification', 'tech_specification.hp = hp.id');
        $query = $ci->db->get();
        $result['tractor_result']['result'] = $query->result();
}else{
	header('Location: '.$root.'tractors');
			die;
		
}
		
        $result['tractor_page'] = 0;
        // $condition_final = array();
        // $result['tractor_result'] = Pagination_query_selected('transmission_clutch,wheel_drive,id,brand,model_name,hp,cylinder,image,capacity', 'tech_specification', '24', 'tractors', $final_condition);
// echo "<pre>";
// print_r($result);
// die;
		
		
        $meta_keywords = "Tractor, Tractors, Latest Tractors, Latest Tractor in India, Compare Tractors Online, Compare Tractors,  Tractors in India, Tractor Price in India, Tractor Brands, Tractor Information, Tractor Specification, Tractors Reviews, Tractors Features, Tractors Models, Tractor prices India, New Tractors in India, Model Tractors, Agriculture Tractor, Tractor Dealers in India, Best Tractor in India, Best Tractors in India, Tractor Info, Commercial Tractors,  Agricultural Tractors, Tractor Models, Latest Tractors in India,  New Tractors, New Tractors in India, Tractor Prices, Tractors Specification, Tractor Reviews, Tractor Features, ACE Tractor, Captain Tractor, Eicher Tractor, Escort Tractor, Farmtrac Tractor, Force Tractor, HMT Tractor, Indo Farm Tractor, John Deere Tractor, Josh Tractor, Kubota Tractor, Lovson Tractor, Mahindra Tractor, Massey Ferguson Tractor, New Holland Tractor, PowerTrac Tractor, Preet Tractor, Same Deutz-Fahr Tractor, Sonalika Tractor, Standard Tractor, Swaraj Tractor, Tafe Tractor, VST Shakti Tractor";
        $meta_description = "List of all Tractor Brands in India including ACE, Captain, Eicher, Escort, Farmtrac, Force, HMT,  Indo Farm, John Deere, Josh, Kubota, Lovson, Mahindra, Massey Ferguson, New Holland, PowerTrac, Preet, Same Deutz-Fahr, Sonalika, Standard, Swaraj, Tafe, VST Shakti.";
        $meta = array(
            'meta_title' => 'Tractor Brands in India, Tractor Price in India, Tractor Brands, Tractor Models- TractorJunction',
            'meta_keywords' => $meta_keywords,
            'meta_description' => $meta_description,
            'meta_robots' => 'all',
            'extra_headers' => ''
        );
        $data11 = array();
        $data11 = array_merge($data11, $meta);
        $this->load->view('header', $data11);
        $this->load->view('search', $result);
        $this->load->view('footer');
    }

    function index()
    {
        $result['tractor_page'] = 1;
        $populorTractor = $this->Front_model->PopLatUpTract('wheel_drive,id,priceShow,price,hp,brand,model_name,capacity,cylinder,transmission_clutch,image', 'tech_specification', 'popular', 'yes', 8, 0);

        $paginationResult = Pagination_query_selected('transmission_clutch,price,priceShow,wheel_drive,id,brand,model_name,hp,cylinder,image,capacity', 'tech_specification', '24', 'tractors', '');

        $paginationResult['result'] = array_merge($populorTractor, $paginationResult['result']);
//        echo "<pre>";
//        print_r($paginationResult);
//        die;
        $result['tractor_result'] = ($paginationResult);
        	
		$meta=Meta_title_description('tractors');
	
  $result['ad_var']='new_tractor';

        $data11 = array();
        $data11 = array_merge($data11, $meta);
        $this->load->view('header', $data11);
        $this->load->view('search', $result);
        $this->load->view('footer');
    }

    function PopularTractor()
    {
        $condition = "popular='yes'";
        $result['tractor_page'] = 2;
        $result['tractor_result'] = Pagination_query_selected('price,priceShow,wheel_drive,transmission_clutch,id,brand,model_name,hp,cylinder,image,capacity', 'tech_specification', '24', 'tractors', $condition);
     
			$meta=Meta_title_description('popular_tractors');
        $data11 = array();
        $data11 = array_merge($data11, $meta);
        $this->load->view('header', $data11);
        $this->load->view('search', $result);
        $this->load->view('footer');
    }

    function LatestTractor()
    {
        $condition = "latest='1'";
        $result['tractor_page'] = 2;
        $result['tractor_result'] = Pagination_query_selected('price,priceShow,wheel_drive,transmission_clutch,id,brand,model_name,hp,cylinder,image,capacity', 'tech_specification', '24', 'tractors', $condition);
 
		
			$meta=Meta_title_description('latest_tractors');
        $data11 = array();
        $data11 = array_merge($data11, $meta);
        $this->load->view('header', $data11);
        $this->load->view('search', $result);
        $this->load->view('footer');
    }

    function UpcomingTractor()
    {
        $condition = "status='coming_soon'";
        $result['tractor_page'] = 2;
        $result['tractor_result'] = Pagination_query_selected('price,priceShow,wheel_drive,transmission_clutch,id,brand,model_name,hp,cylinder,image,capacity', 'tech_specification', '24', 'tractors', $condition);

 
			$meta=Meta_title_description('upcoming_tractors');
        $data11 = array();
        $data11 = array_merge($data11, $meta);
        $this->load->view('header', $data11);
        $this->load->view('search', $result);
        $this->load->view('footer');
    }

    function SingleTractorPage($id, $c)
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        $this->session->set_userdata('pageinfo', 'search');
        $data = array(
            'id' => $id
        );
        $result['result'] = $this->Front_model->get_result_fields('*', $data, 'tech_specification');
        $reviewData =$this->Front_model->query_execute("SELECT AVG(rating) as AVGRating, COUNT(id) as basedON FROM `user_review` WHERE tractor_id=".$id."");
        if (empty($result['result'])) {
            header("location:" . $root . "tractors");
            die;
        }
        foreach ($result['result'] as $key => $value) {
        }
        $title = "";
        $des = "";
        $brand_name = '';
        foreach (SelectQuery('name', 'brand', 'id', $value->brand) as $raa) $brand_name = ucfirst(strtolower($raa->name));
        $title .= $brand_name;
        $title .= " Tractor";
        if ($value->model_name != "") {
            $title .= ucfirst(" " . $value->model_name);
        } else {
            $title .= "Not filled";
        }
        $title .= " | Tractorjunction";

        $des .= $brand_name;
        $des .= " tractor ";
        $des .= ucfirst($value->model_name);


        $whrcond = "popular = 'yes'";
        $result['popular_tractor'] = resultOrdrByWhere('model_name,brand,id', 'tech_specification', $whrcond, 'id', 'RANDOM', '10');

        $whrcond = "latest = '1'";
        $result['latest_tractor'] = resultOrdrByWhere('model_name,brand,id', 'tech_specification', $whrcond, 'id', 'RANDOM', '10');

   
  $AVGRating=0;
  $basedON=0;
  // print_r($reviewData);
  if(!empty($reviewData)){
	  foreach($reviewData as $valueReview){
		  $AVGRating=$valueReview['AVGRating'];
		  $basedON=$valueReview['basedON'];
	  }
	    $AVGRating=round($AVGRating,1);
  }
  // $AVGRating=5;
$result['AVGRating']=$AVGRating;
$result['basedON']=$basedON;
 
        $des .= " Tractor has the comfort and convenience features to keep you smiling even during the longest days; the engine power and hydraulic capacity to take on hard-to-handle chores and the quality of engineering, assembly, and components are very good.";
        $meta = array(
            'meta_title' => $title,
            'meta_keywords' => 'keywords here',
            'meta_description' => $des,
            'meta_robots' => 'all',
            'extra_headers' => ''
        );
        $data11 = array();
        $data11 = array_merge($data11, $meta);

        $this->load->view('header', $data11);
        $this->load->view('single_tractor_page', $result);
        $this->load->view('footer');
    }

    function TractorFeaturesSpecifications($id)
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        $this->session->set_userdata('pageinfo', 'search');
        $data = array(
            'id' => $id
        );
        $result['result'] = $this->Front_model->get_result_fields('*', $data, 'tech_specification');

        if (empty($result['result'])) {
            header("location:" . $root . "tractors");
            die;
        }
        foreach ($result['result'] as $key => $value) {
        }
        $title = "";
        $des = "";
        $brand_name = '';
        foreach (SelectQuery('name', 'brand', 'id', $value->brand) as $raa) $brand_name = ucfirst(strtolower($raa->name));
        $title .= $brand_name;
        $title .= " Tractor";
        if ($value->model_name != "") {
            $title .= ucfirst(" " . $value->model_name);
        } else {
            $title .= "Not filled";
        }
        $title .= " Features & Specifications";
        $result['title'] = $title;
        $result['brand_name'] = $brand_name;
        $title .= " | Tractorjunction";

        $des .= $brand_name;
        $des .= " tractor ";
        $des .= ucfirst($value->model_name);


        $des .= " Tractor has the comfort and convenience features to keep you smiling even during the longest days; the engine power and hydraulic capacity to take on hard-to-handle chores and the quality of engineering, assembly, and components are very good.";
        $meta = array(
            'meta_title' => $title,
            'meta_keywords' => 'keywords here',
            'meta_description' => $des,
            'meta_robots' => 'all',
            'extra_headers' => ''
        );
        $data11 = array();
        $data11 = array_merge($data11, $meta);
        $this->load->view('header', $data11);
        $this->load->view('tractor_specification', $result);
        $this->load->view('footer');
    }
    function OnRoadRequest_submit()
    {
		//request page 1
		
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        $BrandName = $this->input->post('brand_name');
     
	   if(isset($_POST['id_tractor'])){
	   $red_url = $root . 'product/' . $this->input->post('id_tractor') . '/' . newslugend($BrandName) . "-tractor-" . shweta_nameslug($this->input->post('model_name'));
       }else{
	   $red_url=$root;
	   }
		date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d');
			
        if ($this->input->post('req_type') == "onroad") {
				
				$data_request = array(
					'brand' => $this->input->post('brand_id'),
					'model' => $this->input->post('model_name'),
					'contact_no' => $this->input->post('mobile_no_req'),
					'date_' => $date,
				);
				$request_type="onroad";
				$request_contact_no=$data_request['contact_no'];
				$this->session->set_userdata('request_result', $data_request);
				$this->session->set_userdata('request_contact_no', $request_contact_no);
                $this->session->set_userdata('request_url', $red_url);
                $this->session->set_userdata('request_type', $request_type);
                header('Location: ' . $root . 'user-registration');
                die;
           

        }
 elseif ($this->input->post('req_type') == "demoReq") {
			$data_request = array(
					'brand' => $this->input->post('brand_id'),
					'model' => $this->input->post('model_name'),
					'contact' => $this->input->post('mobile_no_req'),
					'date' => $date,
				);
				$request_type="demoReq";
				$request_contact_no=$data_request['contact'];
				$this->session->set_userdata('request_result', $data_request);
				$this->session->set_userdata('request_contact_no', $request_contact_no);
                $this->session->set_userdata('request_url', $red_url);
                $this->session->set_userdata('request_type', $request_type);
               header('Location: ' . $root . 'user-registration');
                die;
         
	}
	 
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        $BrandName = $this->input->post('brand_name');

        $red_url = $root . 'product/' . $this->input->post('id_tractor') . '/' . newslugend($BrandName) . "-tractor-" . shweta_nameslug($data['model']);

        header('Location: ' . $red_url);
    }

    function SearchMainAjax()
    {

        $result = array();
        $value = $_GET["term"];

        $condition = '';
        $condition = "model_name LIKE '%" . $value . "%' or name LIKE '%" . $value . "%'";
        // $result=shweta_select_th('model_name','tech_specification',$condition);
        $ci = &get_instance();
        $ci->load->database();
        $ci->db->select('tech_specification.*,brand.*');
        $ci->db->from('tech_specification');
        $ci->db->join('brand', 'tech_specification.brand = brand.id');
        if ($condition != "") {
            $ci->db->where($condition);
        }
        $query = $ci->db->get();
        $result = $query->result();


        $json = array();
        if (!empty($result)) {
            foreach ($result as $key => $resultvalue) {
                $json[] = array(
                    'value' => $resultvalue->model_name,
                    'label' => ucfirst($resultvalue->name) . " " . $resultvalue->model_name
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

    function FindSearchTractor()
    {

        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        $value_array = $this->input->post('valueSearch');
        $id = '';
        $slug = '';
        $brand = '';
        foreach (shweta_select('id', 'tech_specification', 'model_name', $value_array) as $raa) $id = ($raa->id);
        foreach (shweta_select('slug', 'tech_specification', 'model_name', $value_array) as $raa) $slug = ($raa->slug);
        foreach (shweta_select('brand', 'tech_specification', 'model_name', $value_array) as $raa) $brand = ($raa->brand);
        $brand_URL = "";
        foreach (shweta_select('name', 'brand', 'id', $brand) as $raa) $brand_URL = newslugend(strtolower($raa->name));
        $brand_URL = $brand_URL . "-tractor-" . newslugend($value_array);
        header("Location:" . $root . "product/" . $id . "/" . $brand_URL);

    }

    function UserRegistration()
    {
        $keyword = "";
        $keyword = "Tractor, Tractors, Latest Tractors, Latest Tractor in India, Compare Tractors Online, Compare Tractors,  Tractors in India, Tractor Price in India, Tractor Brands, Tractor Information, Tractor Specification, Tractors Reviews, Tractors Features, Tractors Models, Tractor prices India, New Tractors in India, Model Tractors, Agriculture Tractor, Tractor Dealers in India, Best Tractor in India, Best Tractors in India, Tractor Info, Commercial Tractors,  Agricultural Tractors, Tractor Models, Latest Tractors in India,  New Tractors, New Tractors in India, Tractor Prices, Tractors Specification, Tractor Reviews, Tractor Features";
        $des = "Find latest tractor models and brands in India. Check out their information, price, features, specification, reviews, models, dealers and all details of major tractor manufacturers including Mahindra, Eicher, Sonalika, New Holland, John Deere etc.";
        $meta = array(
            'meta_title' => "India's first tractor online showroom: Latest Tractor Models, Tractor Price, Tractor Reviews, Compare Tractors, Tractor Specification & Features – TractorJunction",
            'meta_keywords' => $keyword,
            'meta_description' => $des,
            'meta_robots' => 'all',
            'extra_headers' => ''
        );
        $data = array();
        $data = array_merge($data, $meta);
        $this->session->set_userdata('pageinfo', 'home');
        $this->load->view('header', $data);
        $this->load->view('user_registration');
        $this->load->view('footer');

    }
    function UserRegistrationStepDetails()
    {
	 
        $keyword = "";
        $keyword = "Tractor, Tractors, Latest Tractors, Latest Tractor in India, Compare Tractors Online, Compare Tractors,  Tractors in India, Tractor Price in India, Tractor Brands, Tractor Information, Tractor Specification, Tractors Reviews, Tractors Features, Tractors Models, Tractor prices India, New Tractors in India, Model Tractors, Agriculture Tractor, Tractor Dealers in India, Best Tractor in India, Best Tractors in India, Tractor Info, Commercial Tractors,  Agricultural Tractors, Tractor Models, Latest Tractors in India,  New Tractors, New Tractors in India, Tractor Prices, Tractors Specification, Tractor Reviews, Tractor Features";
        $des = "Find latest tractor models and brands in India. Check out their information, price, features, specification, reviews, models, dealers and all details of major tractor manufacturers including Mahindra, Eicher, Sonalika, New Holland, John Deere etc.";
        $meta = array(
            'meta_title' => "India's first tractor online showroom: Latest Tractor Models, Tractor Price, Tractor Reviews, Compare Tractors, Tractor Specification & Features – TractorJunction",
            'meta_keywords' => $keyword,
            'meta_description' => $des,
            'meta_robots' => 'all',
            'extra_headers' => ''
        );
        $data = array();
        $data = array_merge($data, $meta);
        $this->session->set_userdata('pageinfo', 'home');
        $this->load->view('header', $data);
        $this->load->view('user_registration_step_2');
        $this->load->view('footer');

    }

    function UserRegOnRoad()
    {

  $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
      
//////////////////////////////////////
date_default_timezone_set("Asia/Kolkata");
$date_time = $date = date('Y-m-d H:i:s');
$data_req=array();
if ($this->input->post('req_type') == "onroad") {
$contact_no=$this->input->post('mobile');
$user_reg = $this->Front_model->get_result_check('id', 'user_reg', 'mobile', $contact_no);
$user_id = '';
// echo "<pre>";
// print_r($user_reg);
// die;
if (!empty($user_reg)) {
foreach ($user_reg as $key => $value) {
$user_id = $value->id;
$data = array(
'username' => $this->input->post('name'),
'email' => $this->input->post('email'),
'state' => $this->input->post('states'),
'location' => $this->input->post('city'),
'pincode' => $this->input->post('pincode'),
'mobile_type' => $this->input->post('mobile_type'),
'full_address' => $this->input->post('full_address'),
'date_time' => $date_time,
);
 
$this->Front_model->update_data('user_reg',$data, 'id', $user_id);
}
}else{
$data = array(
'username' => $this->input->post('name'),
'email' => $this->input->post('email'),
'mobile' => $this->input->post('mobile'),
'state' => $this->input->post('states'),
'location' => $this->input->post('city'),
'pincode' => $this->input->post('pincode'),
// 'mobile_type' => $this->input->post('mobile_type'),
// 'full_address' => $this->input->post('full_address'),
'date_time' => $date_time,
);
$this->db->insert('user_reg', $data);
$user_id = $this->db->insert_id();

}

$request_result=$this->session->userdata('request_result');
$data_req=array(
'user_id'=>$user_id,
);
if(!empty($data_req)){
$request_result=array_merge($request_result,$data_req);
}

$checkRequest=array(
'brand'=>$request_result['brand'],
'model'=>$request_result['model'],
'contact_no'=>$request_result['contact_no'],
'user_id'=>$request_result['user_id'],
 
);

	$checkOnroad = $this->Front_model->get_result_checkOnroad('id', 'onroadprice',$checkRequest);
 
$customer_type='once';
if(!empty($checkOnroad)){
	$customer_type='return';
	$checkRequest=array(
'customer_type'=>$customer_type,
);
}
$request_result=array_merge($request_result,$checkRequest);

$url=	$this->session->userdata('request_url');
$this->db->insert('onroadprice', $request_result);
$on_road_req_id = $this->db->insert_id();



$this->session->unset_userdata('request_result');

$this->session->unset_userdata('request_contact_no');

$this->session->unset_userdata('request_type');
 
if($request_result['brand'] =="55"){
	
 $this->session->set_userdata('on_road_req_id',$on_road_req_id);
 $this->session->set_userdata('contact_no',$request_result['contact_no']);
header('Location: '.$root.'user-registration-details');
die;
}else{
$txt_msg = "Thank you for submitting request.We will contact you as soon as possible. Regards Team Tractorjunction.";
smsSent($data_req['contact_no'], $txt_msg);
$this->session->set_userdata('newsesson', 'Thank you for your request! we will contact you as soon as possible');
$this->session->unset_userdata('request_url');
header('Location: '.$url);
die;
}
}
else if ($this->input->post('req_type') == "demoReq") {
 
$contact_no=$this->input->post('mobile');
$user_reg = $this->Front_model->get_result_check('id', 'user_reg', 'mobile', $contact_no);
$user_id = '';
if (!empty($user_reg)) {
foreach ($user_reg as $key => $value) {
$user_id = $value->id;

}
}else{
$data = array(
'username' => $this->input->post('name'),
'email' => $this->input->post('email'),
'mobile' => $this->input->post('mobile'),
'state' => $this->input->post('states'),
'location' => $this->input->post('city'),
'pincode' => $this->input->post('pincode'),
'mobile_type' => $this->input->post('mobile_type'),
'full_address' => $this->input->post('full_address'),
'date_time' => $date_time,
);
$this->db->insert('user_reg', $data);
$user_id = $this->db->insert_id();

}

$request_result=$this->session->userdata('request_result');
$data_req=array(

'name' => $this->input->post('name'),
'user_id'=>$user_id,
'state' => $this->input->post('states'),
'city' => $this->input->post('city'),
'email' => $this->input->post('email'),
'contact' => $this->input->post('mobile'),
);

$request_result=array_merge($request_result,$data_req);
 $url=	$this->session->userdata('request_url');
$this->db->insert('demo_request', $request_result);
$txt_msg = "Thank you for submitting request.We will contact you as soon as possible. Regards Team Tractorjunction.";
smsSent($data_req['contact'], $txt_msg);
$this->session->set_userdata('newsesson', 'Thank you for your request! we will contact you as soon as possible');
$this->session->unset_userdata('request_result');
$this->session->unset_userdata('request_contact_no');
$this->session->unset_userdata('request_url');
$this->session->unset_userdata('request_type');


header('Location: '.$url);
die;
}
///////////////////////////////////
		
		 
			if ($this->input->post('req_type') == "harvester" || $this->input->post('req_type') == "implement") {
				$user_reg = $this->Front_model->get_result_check('id', 'user_reg', 'mobile', $this->input->post('mobile'));
				if (!empty($user_reg)) {
					$userId = '';
					foreach ($user_reg as $key => $value) {
					$userId = $value->id;
					}
				
				}else{
						$data = array(
						'username' => $this->input->post('name'),
						'email' => $this->input->post('email'),
						'mobile' => $this->input->post('mobile'),
						'state' => $this->input->post('states'),
						'location' => $this->input->post('city'),
						'date_time' => $date_time,
						);
						$this->db->insert('user_reg', $data);
						$userId = $this->db->insert_id();
				}
					$data2 = $this->session->userdata('data_harverterOnroad');
					$url = $this->session->userdata('url_actual');
					$data=array(
					'user_id'=>$userId,
					'name' => $this->input->post('name'),
					'email_id' => $this->input->post('email'),
					'contact_no' => $this->input->post('mobile'),
					'state' => $this->input->post('states'),
					'city' => $this->input->post('city'),
					);
					$data = array_merge($data, $data2);
					$this->session->unset_userdata('data_harverterOnroad');
					$this->session->unset_userdata('url_actual');
					$this->db->insert('onroad_request_harvester', $data);
					$txt_msg = "Thank you for submitting request.We will contact you as soon as possible. Regards Team Tractorjunction.";
					smsSent($data['contact_no'], $txt_msg);
					$this->session->set_userdata('newsesson', 'Thank you for your request! we will contact you as soon as possible');
					header('Location: '.$url);
					die;
			}
			
  if ($this->session->userdata('demo_requRes')) {
	  
    $user_reg = $this->Front_model->get_result_check('id', 'user_reg', 'mobile', $this->input->post('mobile'));
         
		 if (!empty($user_reg)) {
                $userId = '';
                foreach ($user_reg as $key => $value) {
                    $userId = $value->id;
                }
			}else{
	  $data = array(
            'username' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'mobile' => $this->input->post('mobile'),
            'state' => $this->input->post('states'),
            'location' => $this->input->post('city'),
            'date_time' => $date_time,
        );
        $this->db->insert('user_reg', $data);
        $userId = $this->db->insert_id();
 			
			}
 }else{
	  $data = array(
            'username' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'mobile' => $this->input->post('mobile'),
            'state' => $this->input->post('states'),
            'location' => $this->input->post('city'),
            'pincode' => $this->input->post('pincode'),
            'date_time' => $date_time,
        );
        $this->db->insert('user_reg', $data);
        $userId = $this->db->insert_id();
 	  
  }

        if ($this->session->userdata('demo_requRes')) {
			

			  $data2 = $this->session->userdata('demo_requRes');

			 
			 $new_data=array(
		      'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'contact' => $this->input->post('mobile'),
            'state' => $this->input->post('states'),
            'city' => $this->input->post('city'),
            'user_id' => $userId,
  		 );
			
			


            // $data2 = $this->session->userdata('demo_requRes');
            $red_url = $this->session->userdata('on_road_req_result_url');

            $data2 = array_merge($new_data, $data2);
// echo "<pre>";
// print_r($data2);
// die;
            $this->Front_model->insert_data($data2, 'demo_request');
            $txt_msg = "Thank you for submitting on road tractor request.We will contact you as soon as possible. Regards Team Tractorjunction.";
            smsSent($data['mobile'], $txt_msg);
            $this->session->unset_userdata('demo_requRes');
        } else {


            $data3 = array(
                'user_id' => $userId,
            );
            $data2 = $this->session->userdata('on_road_req_result');
            $red_url = $this->session->userdata('on_road_req_result_url');

			
			
            $data2 = array_merge($data3, $data2);

            $this->Front_model->insert_data($data2, 'onroadprice');
            $txt_msg = "Thank you for submitting on road tractor request.We will contact you as soon as possible. Regards Team Tractorjunction.";
            smsSent($data['mobile'], $txt_msg);
            $this->session->unset_userdata('on_road_req_result');
        }
        $this->session->unset_userdata('on_road_req_result_url');
        $this->session->set_userdata('newsesson', 'Thank you for your request! we will contact you as soon as possible');
        header('Location: ' . $red_url);
        die;
    }
	function UserRegOnRoad_final(){
					 $new_data=array(
		      'land_size' => $this->input->post('land_size'),
            'soil_information' => $this->input->post('soil_information'),
            'old_tractor' => $this->input->post('old_tractor'),
            'old_implement' => $this->input->post('old_implement'),
			
  		 );
		 
 $contact_no= $this->session->userdata('contact_no');
$user_reg = $this->Front_model->get_result_check('id', 'user_reg', 'mobile', $contact_no);
$user_id = '';

if (!empty($user_reg)) {
foreach ($user_reg as $key => $value) {
$user_id = $value->id;
$new_data_userdata=array(
'mobile_type' => $this->input->post('mobile_type'),
'full_address' => $this->input->post('full_address'),
  		 );
$this->Front_model->update_data('user_reg',$new_data_userdata, 'id', $user_id);
}
}
		 
		 
		 
		 
		 
		 
		 
		 
		 $on_road_req_id= $this->session->userdata('on_road_req_id');
		 $this->Front_model->update_data('onroadprice',$new_data, 'id', $on_road_req_id);
		 $url=	$this->session->userdata('request_url');
 


$txt_msg = "Thank you for submitting request.We will contact you as soon as possible. Regards Team Tractorjunction.";
smsSent($contact_no, $txt_msg);
$this->session->set_userdata('newsesson', 'Thank you for your request! we will contact you as soon as possible');
$this->session->unset_userdata('request_url');
header('Location: '.$url);
die;
	}
	function OnRoadRequest_submitHarvester(){
		    $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
      
		    date_default_timezone_set("Asia/Kolkata");
        $date_time = $date = date('Y-m-d');
		
		$url=$this->input->post('actual_link');
				$data=array(
					'impID'=>$this->input->post('implement_id'),
					'req_type'=>$this->input->post('req_type'),
					'contact_no'=>$this->input->post('mobile_no_req'),
					'request_for'=>$this->input->post('request_for'),
					'date_time'=>$date_time,
				);
			   $this->session->set_userdata('url_actual',$url);
			   $this->session->set_userdata('data_harverterOnroad',$data);
		header('Location: '.$root.'user-registration');
		die;
		
	}
}

?>