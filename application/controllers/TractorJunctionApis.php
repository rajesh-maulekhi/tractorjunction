<?php
class TractorJunctionApis extends CI_Controller
{
        public function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->library('session');
        $this->load->database();
        $this->load->helper('shweta');
        $this->load->helper('query');
        $this->load->model('Front_model');

    }

	function HomeSlider(){
		$root = "http://".$_SERVER['HTTP_HOST'];
		$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
		$result = $this->Front_model->get_result($data=array(),'app_slider');
		if(!empty($result)){
			foreach($result as $key=>$value){
				$Jcate['image_link']=$root.'web_root/images_new/'.$value->image_name;
				$Json[]=$Jcate;
			}
		}else{
			$Jcate['message']="no image found";
			$Json[]=$Jcate;
		}
		$jsonFinal = json_encode(array('home_banner' => $Json));
		echo $jsonFinal;
		die;
	}
	function PopularTractor(){
		$root = "http://".$_SERVER['HTTP_HOST'];
		$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
		$result= $this->Front_model->PopLatUpTract('wheel_drive,id,priceShow,price,hp,brand,model_name,capacity,cylinder,transmission_clutch,image', 'tech_specification', 'popular', 'yes', 4, 0);
		if(!empty($result)){
			foreach($result as $key=>$value){
				$BrandName='Tractor Brand';$HP='';
				foreach(SelectQuery('name','brand','id',$value->brand) as $ke=>$val) $BrandName= ucwords($val->name) ;
				foreach(SelectQuery('name','hp','id',$value->hp) as $ke=>$val) $HP= ($val->name) ;
				$Jcate['id']=$value->id;
				$Jcate['brand']=$BrandName;
				$Jcate['model_name']=$value->model_name;
				$Jcate['hp']=$HP;
				$Jcate['image']=$root.'upload/'.$value->image;
				$Json[]=$Jcate;
			}
		}else{
			$Jcate['message']="no result found";
			$Json[]=$Jcate;
		}
		$jsonFinal = json_encode(array('home_banner' => $Json));
		echo $jsonFinal;
		die;
	}
	function LatestTractor(){
		$root = "http://".$_SERVER['HTTP_HOST'];
		$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
		$result = $this->Front_model->PopLatUpTract('wheel_drive,id,priceShow,price,hp,brand,model_name,capacity,cylinder,transmission_clutch,image', 'tech_specification', 'latest', '1', 4, 0);
		if(!empty($result)){
			foreach($result as $key=>$value){
				$BrandName='Tractor Brand';$HP='';
				foreach(SelectQuery('name','brand','id',$value->brand) as $ke=>$val) $BrandName= ucwords($val->name) ;
				foreach(SelectQuery('name','hp','id',$value->hp) as $ke=>$val) $HP= ($val->name) ;
				$Jcate['id']=$value->id;
				$Jcate['brand']=$BrandName;
				$Jcate['model_name']=$value->model_name;
				$Jcate['hp']=$HP;
				$Jcate['image']=$root.'upload/'.$value->image;
				$Json[]=$Jcate;
			}
		}else{
			$Jcate['message']="no result found";
			$Json[]=$Jcate;
		}
		$jsonFinal = json_encode(array('home_banner' => $Json));
		echo $jsonFinal;
		die;
	}
	function Implements_tractors(){
			$root = "http://".$_SERVER['HTTP_HOST'];
		$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
		$result = $this->Front_model->PopLatUpTract('id,model_name,brand,implement_cate,image', 'new_implement', 'status', '1', 4, 0);
	
		if(!empty($result)){
			foreach($result as $key=>$value){
				$BrandName = '';
				$implement_cate = '';
				foreach (SelectQuery('name', 'brand', 'id', $value->brand) as $ke => $val) $BrandName = ($val->name);
				foreach (shweta_select('name', 'implement_type_cate', 'id', $value->implement_cate) as $raa) $implement_cate = ucfirst($raa->name);
				$Jcate['id']=$value->id;
				$Jcate['brand']=$BrandName;
				$Jcate['model_name']=$value->model_name;
				$Jcate['implement_type_cate']=$implement_cate;
				$Jcate['image']=$root.'images/implementTractor/'.$value->image;
				$Json[]=$Jcate;
			}
		}else{
			$Jcate['message']="no result found";
			$Json[]=$Jcate;
		}
		$jsonFinal = json_encode(array('implements' => $Json));
		echo $jsonFinal;
		die;
	}
	function Compare_tractors(){
			$root = "http://".$_SERVER['HTTP_HOST'];
		$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
	  $compare_tractor = $this->Front_model->PopLatUpTract('tractor_id,brand,sbrand,stractor_id', 'compare_tractorfront', 'status', '1', 3, 0);
       foreach ($compare_tractor as $key => $value) {
            foreach (SelectQuery('name', 'brand', 'id', $value->brand) as $raa) $brand_name = ucfirst(strtolower($raa->name));
            foreach (SelectQuery('hp', 'tech_specification', 'id', $value->tractor_id) as $raa) $hp = ucfirst(strtolower($raa->hp));
            foreach (SelectQuery('name', 'hp', 'id', $hp) as $raa) $hp_name = ucfirst(strtolower($raa->name));
            foreach (SelectQuery('name', 'brand', 'id', $value->sbrand) as $raa) $sbrand_name = ucfirst(strtolower($raa->name));
            foreach (SelectQuery('model_name,image', 'tech_specification', 'id', $value->tractor_id) as $raa) {
                $tractor_name = ucfirst(strtolower($raa->model_name));
                $tractor_image = (($raa->image));
            }
            foreach (SelectQuery('model_name,image,hp', 'tech_specification', 'id', $value->stractor_id) as $raa) {

                $stractor_name = ucfirst(strtolower($raa->model_name));
                $s_hp = ucfirst(strtolower($raa->hp));

                foreach (SelectQuery('name', 'hp', 'id', $s_hp) as $raa1) $s_hp_name = ucfirst(strtolower($raa1->name));
                $stractor_image = (($raa->image));
            }
            $Jcate['first_tractor'] = $brand_name . ' ' . $tractor_name;
            $Jcate['first_tractor_image'] = $root.'upload/'.$tractor_image;
            $Jcate['First_hp'] = $hp_name;
            $Jcate['second_hp'] = $s_hp_name;

            $Jcate['second_tractor'] = $sbrand_name . ' ' . $stractor_name;
            $Jcate['second_tractor_image'] = $root.'upload/'.$stractor_image;

           $Json[]=$Jcate;
        }
		
		$jsonFinal = json_encode(array('comapre' => $Json));
		echo $jsonFinal;
		die;
	}
	function OldTractor(){
		$root = "http://".$_SERVER['HTTP_HOST'];
		$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
	  $result = $this->Front_model->PopLatUpTract('brand,state,id,model_name,name,image', 'old_tractor', 'status', '1', 3, 0);
    	if(!empty($result)){
			foreach($result as $key=>$value){
				$BrandName = '';
				$state_name = '';
				foreach (SelectQuery('name', 'brand', 'id', $value->brand) as $ke => $val) $BrandName = ($val->name);
				foreach (SelectQuery('name', 'states', 'id', $value->state) as $ke => $val) $state_name = ($val->name);
				$Jcate['id']=$value->id;
				$Jcate['brand']=$BrandName;
				$Jcate['state_name']=$state_name;
				$Jcate['model_name']=$value->model_name;
				$Jcate['username']=$value->name;
				$Jcate['image']=$root.'images/oldTractor/'.$value->image;
				$Json[]=$Jcate;
			}
		}else{
			$Jcate['message']="no result found";
			$Json[]=$Jcate;
		}
		$jsonFinal = json_encode(array('old_tractor' => $Json));
		echo $jsonFinal;
		die;
	}
	function TractorNews(){
		$root = "http://".$_SERVER['HTTP_HOST'];
		$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
	        $news_data = array(
            'status' => '1',
            'type' => 'tractor',
        );
	$result = $this->Front_model->get_result_News('description,title,id,image', $news_data, 'news', 4, 0);
	if(!empty($result)){
			foreach($result as $key=>$value){
				if (strlen($value->title) > 60) {
					$Jcate['title']=substr((strip_tags($value->title)), 0, 60) . "...";
				} else {
					$Jcate['title']=(strip_tags($value->title));
				}
				if (strlen($value->description) > 60) {
					$Jcate['description']=substr((strip_tags($value->description)), 0, 60) . "...";
				} else {
					$Jcate['description']=(strip_tags($value->description));
				}
				$Jcate['id']=$value->id;
				$Jcate['image']=$root.'images/news/'.$value->image;
				$Json[]=$Jcate;
				}
		}else{
			$Jcate['message']="no result found";
			$Json[]=$Jcate;
		}
 
		$jsonFinal = json_encode(array('tractor_new' => $Json));
		echo $jsonFinal;
		die;
	}
	function AgriNews(){
	 $root = "http://".$_SERVER['HTTP_HOST'];
		$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
	        $news_data = array(
            'status' => '1',
            'type' => 'tractor',
        );
		$this->db->select('description,title,id,image,total_view');
		$this->db->from('news');
		$this->db->order_by('total_view', 'DESC');
		$this->db->where($news_data);
	 
			$this->db->limit(4, 0);
		$query = $this->db->get();
		$result= $query->result();
	
	if(!empty($result)){
			foreach($result as $key=>$value){
				if (strlen($value->title) > 60) {
					$Jcate['title']=substr((strip_tags($value->title)), 0, 60) . "...";
				} else {
					$Jcate['title']=(strip_tags($value->title));
				}
				// if (strlen($value->description) > 60) {
					$Jcate['description']=$Jcate['title'];
				// } else {
					// $Jcate['description']=(strip_tags($value->description));
				// }
				$Jcate['id']=$value->id;
				$Jcate['image']=$root.'images/news/'.$value->image;
				$Json[]=$Jcate;
				}
		}else{
			$Jcate['message']="no result found";
			$Json[]=$Jcate;
		}
 
		$jsonFinal = json_encode(array('popular_news' => $Json));
		echo $jsonFinal;
		die;
	}
	function PopularTractorAll(){
			$root = "http://".$_SERVER['HTTP_HOST'];
		$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
		$data=array(
		'popular'=>'yes'
		);
$limit=$_GET['limit'];
$start=$_GET['start'];
		$result= $this->Front_model->get_result_fieldsJson('wheel_drive,id,priceShow,price,hp,brand,model_name,capacity,cylinder,transmission_clutch,image',$data, 'tech_specification',$limit,$start);
	
		if(!empty($result)){
			foreach($result as $key=>$value){
				$BrandName='Tractor Brand';$HP='';
				foreach(SelectQuery('name','brand','id',$value->brand) as $ke=>$val) $BrandName= ucwords($val->name) ;
				foreach(SelectQuery('name','hp','id',$value->hp) as $ke=>$val) $HP= ($val->name) ;
				$Jcate['id']=$value->id;
				$Jcate['brand']=$BrandName;
				$Jcate['model_name']=$value->model_name;
				$Jcate['hp']=$HP;
				$Jcate['image']=$root.'upload/'.$value->image;
				$Json[]=$Jcate;
			}
		}else{
			$Jcate['message']="no result found";
			$Json[]=$Jcate;
		}
		$jsonFinal = json_encode(array('popular_tractor' => $Json));
		echo $jsonFinal;
		die;
	
	}
	function LatestTractorAll(){
			$root = "http://".$_SERVER['HTTP_HOST'];
		$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
		$data=array(
		'latest'=>'1'
		);
		$limit=$_GET['limit'];
$start=$_GET['start'];
		$result= $this->Front_model->get_result_fieldsJson('wheel_drive,id,priceShow,price,hp,brand,model_name,capacity,cylinder,transmission_clutch,image',$data, 'tech_specification',$limit,$start);
		
		if(!empty($result)){
			foreach($result as $key=>$value){
				$BrandName='Tractor Brand';$HP='';
				foreach(SelectQuery('name','brand','id',$value->brand) as $ke=>$val) $BrandName= ucwords($val->name) ;
				foreach(SelectQuery('name','hp','id',$value->hp) as $ke=>$val) $HP= ($val->name) ;
				$Jcate['id']=$value->id;
				$Jcate['brand']=$BrandName;
				$Jcate['model_name']=$value->model_name;
				$Jcate['hp']=$HP;
				$Jcate['image']=$root.'upload/'.$value->image;
				$Json[]=$Jcate;
			}
		}else{
			$Jcate['message']="no result found";
			$Json[]=$Jcate;
		}
		$jsonFinal = json_encode(array('latest_tractor' => $Json));
		echo $jsonFinal;
		die;
	
	}
	function NewTractorAll(){
			$root = "http://".$_SERVER['HTTP_HOST'];
		$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
		$data=array(
		);
				$limit=$_GET['limit'];
$start=$_GET['start'];
		$result= $this->Front_model->get_result_fieldsJson('wheel_drive,id,priceShow,price,hp,brand,model_name,capacity,cylinder,transmission_clutch,image',$data, 'tech_specification',$limit,$start);
		
		if(!empty($result)){
			foreach($result as $key=>$value){
				$BrandName='Tractor Brand';$HP='';
				foreach(SelectQuery('name','brand','id',$value->brand) as $ke=>$val) $BrandName= ucwords($val->name) ;
				foreach(SelectQuery('name','hp','id',$value->hp) as $ke=>$val) $HP= ($val->name) ;
				$Jcate['id']=$value->id;
				$Jcate['brand']=$BrandName;
				$Jcate['model_name']=$value->model_name;
				$Jcate['hp']=$HP;
				$Jcate['image']=$root.'upload/'.$value->image;
				$Json[]=$Jcate;
			}
		}else{
			$Jcate['message']="no result found";
			$Json[]=$Jcate;
		}
		$jsonFinal = json_encode(array('new_tractor' => $Json));
		echo $jsonFinal;
		die;
	
	}
	function AllTractorsBrands(){
			$condBrand = "type LIKE '%tractor%'";
                        $query = Select_OrderBy_brand('id,name', 'brand', $condBrand, 'name', 'ASC');
						
                       foreach ($query as $key => $value) {
						   		$Jcate['id']=$value->id;
						   		$Jcate['name']=$value->name;
				$Json[]=$Jcate;
		
                        }
    	$jsonFinal = json_encode(array('tractor_brands' => $Json));
		echo $jsonFinal;
		die;
	}
	function FindTractor(){
		$root = "http://".$_SERVER['HTTP_HOST'];
		$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
  
$limit=$_GET['limit'];
$start=$_GET['start'];
		$data=array(
		'authorize'=>$_GET['brand'],
		);
		if (isset($_POST['pincode']) && ($_POST['pincode'] != '')) {
    	$data=array(
		'pin'=>$_GET['pincode'],
		);      
		}
		
		$result= $this->Front_model->get_result_fieldsJson('*',$data, 'dealers',$limit,$start);
	 
	if(!empty($result)){
			foreach($result as $key=>$value){
				$BrandName='Tractor Brand';
				foreach(SelectQuery('name','brand','id',$value->authorize) as $ke=>$val) $BrandName= ucwords($val->name) ;
				 if ($value->state != 0){
					foreach (shweta_select('name', 'states', 'id', $value->state) as $raa) $Jcate['state']= ucfirst($raa->name);
				 }else{
				$Jcate['state']='';
				 }
				if ($value->city != 0)
				foreach (shweta_select('name', 'cities', 'id', $value->city) as $raa) $Jcate['city']= ucfirst($raa->name);
				else{	$Jcate['city']=''; }

			   
				$Jcate['id']=$value->id;
				$Jcate['brand']=$BrandName;
				$Jcate['name']=$value->name_de;
				$Jcate['address']=$value->address;
				$Jcate['pin']=$value->pin;
				$Jcate['contact']=$value->contact;
				$Json[]=$Jcate;
			}
		}else{
			$Jcate['message']="no result found";
			$Json[]=$Jcate;
		}
		$jsonFinal = json_encode(array('find_dealer' => $Json));
		echo $jsonFinal;
		die;
	
	}
	function TractorImplementsAll(){
			$root = "http://".$_SERVER['HTTP_HOST'];
		$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
		$data=array(
		'status'=>'1'
		);
$limit=$_GET['limit'];
$start=$_GET['start'];
		$result= $this->Front_model->get_result_fieldsJson('*',$data, 'new_implement',$limit,$start);

		if(!empty($result)){
			foreach($result as $key=>$value){
		                       $BrandName = '';
                            $implement_cate = '';
                            $power = '';
                            $implementType = '';
                            foreach (SelectQuery('name', 'brand', 'id', $value->brand) as $ke => $val) $BrandName = ($val->name);
                            foreach (shweta_select('name', 'implement_type_cate', 'id', $value->implement_cate) as $raa) $implement_cate = ucfirst($raa->name);
      foreach(shweta_select('name','filed','id',$value->implementType) as $raa) $implementType= ucfirst($raa->name);
		if($value->tractorPower != "" && $value->tractorPower != "N/A"){
		$power =ucfirst($value->tractorPower);
		}


		$Jcate['model_name']=$value->model_name;
				$Jcate['id']=$value->id;
				$Jcate['brand']=$BrandName;
				$Jcate['implement_cate']=$implement_cate;
				$Jcate['implementType']=$implementType;
				$Jcate['power']=$power;
		 
				$Jcate['image']=$root.'images/implementTractor/'.$value->image;
				$Json[]=$Jcate;
			}
		}else{
			$Jcate['message']="no result found";
			$Json[]=$Jcate;
		}
	 
		$jsonFinal = json_encode(array('implements' => $Json));
		echo $jsonFinal;
		die;
	
	}
	function TractorHarvesterAll(){
			$root = "http://".$_SERVER['HTTP_HOST'];
		$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
		$data=array(
		'status'=>'1'
		);
$limit=$_GET['limit'];
$start=$_GET['start'];
		$result= $this->Front_model->get_result_fieldsJson('*',$data, 'harvester',$limit,$start);

		if(!empty($result)){
			foreach($result as $key=>$value){
 	$barndName='';
	foreach(shweta_select('name','brand','id',$value->brand) as $raa) $barndName= ($raa->name);
		
				$Jcate['id']=$value->id;
				$Jcate['model_name']=$value->model_name;
				$Jcate['epower']=$value->epower;
				$Jcate['cutterbar']=$value->cutterbar;
				$Jcate['crop']=$value->crop;
				$Jcate['barndName']=$barndName;
 if($value->power_Source == "self"){
						$Jcate['power_Source']= "Self Propelled";
						}else{
						$Jcate['power_Source']= "Tractor Mounted";
						}
		 
				$Jcate['image']=$root.'images/implementTractor/'.$value->image;
				$Json[]=$Jcate;
			}
		}else{
			$Jcate['message']="no result found";
			$Json[]=$Jcate;
		}

		$jsonFinal = json_encode(array('harvester' => $Json));
		echo $jsonFinal;
		die;
	
	}
	function BlogsAll(){
			$root = "http://".$_SERVER['HTTP_HOST'];
		$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
	     
$limit=$_GET['limit'];
$start=$_GET['start'];
 
		$result=  shweta_order_by_limit('*','blog','blog_date','DESC',$limit, $start);
 
		if(!empty($result)){
			foreach($result as $key=>$value){
$blog_des='';
						    if (strlen($value->description) > 450) {
                                    $blog_des= substr(ucfirst(($value->description)), 0, 450) ;
                                } else {
                                    $blog_des= ucfirst(($value->description));
                                } 
								$blog_des= strip_tags($blog_des);
				$Jcate['id']=$value->id;
				$Jcate['title']=$value->title;
				$Jcate['blog_date']=$value->blog_date;
			 
				$Jcate['blog_des']=$blog_des;
 
		 
				$Jcate['image']=$root.'upload/blog_image/'.$value->image_name;
				$Json[]=$Jcate;
			}
		}else{
			$Jcate['message']="no result found";
			$Json[]=$Jcate;
		}
		$jsonFinal = json_encode(array('blog' => $Json));
		echo $jsonFinal;
		die;
	
	}

	function TractorNewsAll(){
			$root = "http://".$_SERVER['HTTP_HOST'];
		$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
	     
$limit=$_GET['limit'];
$start=$_GET['start'];
      $condition = '';
        $condition = "status='1' and type='tractor'";
		$result=  shweta_order_by_limit_new('*','news',$condition,$limit, $start,'date','DESC');
 
		if(!empty($result)){
			foreach($result as $key=>$value){
$blog_des='';
						    if (strlen($value->description) > 450) {
                                    $blog_des= substr(ucfirst(($value->description)), 0, 450) ;
                                } else {
                                    $blog_des= ucfirst(($value->description));
                                } 
								$blog_des= strip_tags($blog_des);
				$Jcate['id']=$value->id;
				$Jcate['title']=$value->title;
			 
			 
				$Jcate['des']=$blog_des;
 
		 
				$Jcate['image']=$root.'images/news/'.$value->image;
				$Json[]=$Jcate;
			}
		}else{
			$Jcate['message']="no result found";
			$Json[]=$Jcate;
		}
	 
		$jsonFinal = json_encode(array('tractor_news' => $Json));
		echo $jsonFinal;
		die;
	
	}
	function AgreeNewsAll(){
			$root = "http://".$_SERVER['HTTP_HOST'];
		$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
	     
$limit=$_GET['limit'];
$start=$_GET['start'];
      $condition = '';
        $condition = "status='1' and type='agriculture'";
		$result=  shweta_order_by_limit_new('*','news',$condition,$limit, $start,'date','DESC');

		if(!empty($result)){
			foreach($result as $key=>$value){
$blog_des='';
						    if (strlen($value->description) > 450) {
                                    $blog_des= substr(ucfirst(($value->description)), 0, 450) ;
                                } else {
                                    $blog_des= ucfirst(($value->description));
                                } 
								$blog_des= strip_tags($blog_des);
				$Jcate['id']=$value->id;
				$Jcate['title']=$value->title;
			 
			 
				$Jcate['des']=$blog_des;
 
		 
				$Jcate['image']=$root.'images/news/'.$value->image;
				$Json[]=$Jcate;
			}
		}else{
			$Jcate['message']="no result found";
			$Json[]=$Jcate;
		}
 	 echo "<pre>";
	 print_r($Json);
	 die;
		$jsonFinal = json_encode(array('tractor_news' => $Json));
		echo $jsonFinal;
		die;
	
	}

}

?>