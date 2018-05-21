<?php

class Reviews extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('shweta');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library("pagination");
		    $this->load->model("form_model");
		    $this->load->model("Front_model");
    }

    function user_reviewsDirect()
    {
		$meta_keywords = "";
        $meta_description = "";
        $meta = array(
            'meta_title' => 'Rate & Review - TractorJunction',
            'meta_keywords' => $meta_keywords,
            'meta_description' => $meta_description,
            'meta_robots' => 'all',
            'extra_headers' => ''
        );
        $data11 = array();
        $data11 = array_merge($data11, $meta);
      
		$result=array(); 
        $this->load->view('header',$data11);
        $this->load->view('user_reviews',$result);
        $this->load->view('footer');

    }
    function user_reviews($id_enc,$tractorName)
    {
         $tractor_id=unserialize(base64_decode($id_enc));
		$data=array(
			'id'=>$tractor_id
			);
			$tractorData = $this->Front_model->get_result_fields('id,brand,model_name', $data, 'tech_specification');
			
			
			
			
		$result=array();
		$result['result']=$tractorData;
        	$meta_keywords = "";
        $meta_description = "";
        $meta = array(
            'meta_title' => 'Rate & Review - TractorJunction',
            'meta_keywords' => $meta_keywords,
            'meta_description' => $meta_description,
            'meta_robots' => 'all',
            'extra_headers' => ''
        );
        $data11 = array();
        $data11 = array_merge($data11, $meta);
      
		// $result=array(); 
        $this->load->view('header',$data11);
        $this->load->view('user_reviews',$result);
        $this->load->view('footer');

    }
	function SubmitReview(){
		date_default_timezone_set("Asia/Kolkata");
$date_time = $date = date('Y-m-d H:i:s');
		
		$user_reg = $this->Front_model->get_result_check('id', 'user_reg', 'mobile', $this->input->post('mobile_no_req'));
		$userId = 0;
			if (!empty($user_reg)) {
				foreach ($user_reg as $key => $value) {
					$userId = $value->id;
				}
			}else{
				$dataUser = array(
					'username' => $this->input->post('name'),
					'mobile' => $this->input->post('mobile_no_req'),
					'date_time' => $date_time,
				);
				$this->db->insert('user_reg', $data);
				$userId = $this->db->insert_id();
			}
			$data=array(
			'brand_id'=>$this->input->post('brand_id'),
			'tractor_id'=>$this->input->post('model_name'),
			'user_name'=>$this->input->post('name'),
			'user_id'=>$userId,
			'rating'=>$this->input->post('rating'),
			'reviewDes'=>$this->input->post('reviewDes'),
		);
		$this->db->insert('user_review', $data);
		$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

	$data=array(
			'id'=>$this->input->post('model_name')
			);
			$tractorData = $this->Front_model->get_result_fields('id,brand,model_name', $data, 'tech_specification');
			$model_name='';
if(!empty($tractorData)){
			foreach($tractorData as $key=>$value){
			$url='';
			foreach(SelectQuery('name','brand','id',$value->brand) as $ke=>$val) $BrandName= ($val->name) ;
			$model_name=$value->model_name;
			$url=$root.'product/'.$value->id.'/'.newslugend($BrandName)."-tractor-".shweta_nameslug($value->model_name);
			
			}
			}else{
			$url=$root.'tractors';
			// die;
			}
$this->session->set_userdata('newsesson', 'Thank you for review '.$BrandName." tractor ".$model_name);

header('Location: '.$url);
die;
	}
	function show_user_reviews($id_enc,$tractorName){
				$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
     $this->load->library("pagination");
	
		 $tractor_id=unserialize(base64_decode($id_enc));
		$data=array(
			'tractor_id'=>$tractor_id
			);
			$data2=array(
			'id'=>$tractor_id
			);
			$model_name="";
			$tractorData = $this->Front_model->get_result_fields('brand,id,model_name', $data2, 'tech_specification');
			if(!empty($tractorData)){
			foreach($tractorData as $key=>$value){
			$url='';
			$model_name=$value->model_name;
			foreach(SelectQuery('name','brand','id',$value->brand) as $ke=>$val) $BrandName= ($val->name) ;
			$url=$root.'product/'.$value->id.'/'.newslugend($BrandName)."-tractor".shweta_nameslug($value->model_name);
			
			}
			}else{
				$url=$root;
			
			}
			// echo $url;
			// die;

			
			  $this->load->model("form_model");
        $config = array();
        $config["base_url"] = $root . "reviews/".$id_enc."/".$tractorName;
        $config["total_rows"] = count(shweta_select_th('id','user_review',$data));
         
		$config["per_page"] = 10;
        $config["page_query_string"] = TRUE;
        $config['first_tag_open'] = $config['last_tag_open'] = $config['next_tag_open'] = $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
        $config['first_tag_close'] = $config['last_tag_close'] = $config['next_tag_close'] = $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li><span><b>";
        $config['cur_tag_close'] = "</b></span></li>";
        $config['first_link'] = '&laquo; First';
        $config['last_link'] = 'Last &raquo;';
        $config['use_page_numbers'] = true;
        $this->pagination->initialize($config);
		$temp=0;
		if(isset($_GET['per_page'])){
       $temp = $_GET['per_page'];
		}
		$temp = $temp - 1;
		if ($temp > 0)
            $page = $temp * $config["per_page"];
        else
            $page = 0;
        $result['result'] = $this->form_model->show_review($config["per_page"], $page,$data);
		 $result["links"] = $this->pagination->create_links();
		 $result["url"] = $url;
		 $result["BrandName"] = $BrandName;
		 $result["model_name"] = $model_name;
        $result['popular_result'] = $this->Front_model->PopLatUpTract('wheel_drive,id,priceShow,price,hp,brand,model_name,capacity,cylinder,transmission_clutch,image', 'tech_specification', 'popular', 'yes', 5, 0);

		// echo "<pre>";
		// print_r($result);
		// die;
		$meta_keywords = "";
        $meta_description = "";
        $meta = array(
            'meta_title' => 'Rate & Review - TractorJunction',
            'meta_keywords' => $meta_keywords,
            'meta_description' => $meta_description,
            'meta_robots' => 'all',
            'extra_headers' => ''
        );
        $data11 = array();
        $data11 = array_merge($data11, $meta);
      
		// $result=array(); 
        $this->load->view('header',$data11);
        $this->load->view('show_reviews',$result);
        $this->load->view('footer');
	}
}

?>