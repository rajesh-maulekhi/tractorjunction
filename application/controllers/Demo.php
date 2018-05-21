<?php

class Demo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('shweta');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->database();
		   $this->load->model("Front_model");
		      $this->load->helper('query');
    }
function show_image_resize() {
  }
    function index()
    { 
	$pass='$P$B.i0wyHknpodneNB/R2y0T.SUocMRP.';
	$secret_key = '8cykcGcimyYF$dq%hSqDy|~*&[|#]]|{o%&l%h./7Nodg uF%]#!F)( ZQ|)w_]#';
    $secret_iv = '8cykcGcimyYF$dq%hSqDy|~*&[|#]]|{o%&l%h./7Nodg uF%]#!F)( ZQ|)w_]#';
 
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
	     $output = openssl_decrypt( base64_decode( $pass ), $encrypt_method, $key, 0, $iv );
  echo $output;
  die;
	
	
     $result = $this->Front_model->get_result($data=array(), 'onroadprice');
	 echo "<pre>";
// print_r($result);die;
$i=0;
foreach($result as $key=>$value){
 
 if (!ctype_digit($value->model)) {
  
 }else{
	 
	 $model_name='';
	 $result2=SelectQuery('model_name','tech_specification','id',$value->model);
	 if(!empty($result2)){
		$model_name='';
		foreach($result2 as $key1=>$value1){
			$model_name= ($value1->model_name) ;
		}
		if($model_name !=''){
					$data=array(
					'model'=>$model_name
					);
					// print_r($data);
					$this->Front_model->update_data('onroadprice',$data,'id',$value->id);
		}
	 }
	 
 }
 // die;
	 }
		
		
		
		
 
    }
	function ForDEmoReq(){
	  $result = $this->Front_model->get_result($data=array(), 'demo_request');
	 echo "<pre>";
// print_r($result);die;
$i=0;
foreach($result as $key=>$value){
 
 if (!ctype_digit($value->model)) {
  
 }else{
	 
	 $model_name='';
	 $result2=SelectQuery('model_name','tech_specification','id',$value->model);
	 if(!empty($result2)){
		$model_name='';
		foreach($result2 as $key1=>$value1){
			$model_name= ($value1->model_name) ;
		}
		if($model_name !=''){
					$data=array(
					'model'=>$model_name
					);
					// print_r($data);
					$this->Front_model->update_data('demo_request',$data,'id',$value->id);
		}
	 }
	 
 }
 // die;
	 }
		
	
	}


}

?>