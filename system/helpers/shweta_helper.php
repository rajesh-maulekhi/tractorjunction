<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	function shweta_uploadImage($file_up)
	{
		$ci =& get_instance();
		if($file_up!=""){
		$ci->load->library('upload');
		$config['upload_path']   = './upload/';
		$config['allowed_types'] = 'jpg|jpeg|gif|png';
		$config['max_size']      = 80000;
		$ci->load->library('image_lib', $config);
		$ci->image_lib->resize();
		$ci->upload->initialize($config); 
		if(!$ci->upload->do_upload('picture')){
			echo $ci->upload->display_errors(); die();
			return false;
		}
		else{
			return true;
		}
	}
}
function GetCountResultDesboard($field,$table,$whr){
$ci =& get_instance();
$ci->load->database();
$ci->db->distinct();
$ci->db->select($field);
if($whr !=""){
$ci->db->where($whr);
}
 $query =$ci->db->get($table);
return count($query->result());

}
function Tractorsbrands(){
	$condBrand = "type LIKE '%tractor%'";
	$result=Select_OrderBy_brand('*', 'brand', $condBrand, 'name', 'ASC');
	return $result;
}
function SlugCreate($table_name,$name){
	$array=array();
	$slug=newslugend($name);
	$slugResult=shweta_select('slug',$table_name,'','');
	foreach($slugResult as $b=>$a){
		$array[]=$a->slug;
	}
	$array=array_filter($array);
	if(in_array($slug,$array)){
		$slug= $slug.(count($slugResult)+1);
	}else{
		$slug=$slug;
	}
	return $slug;
}

function SlugEditPage($table_name,$name,$oldslug){
	$array=array();
	$slug=newslugend($name);
	$slugOld=newslugend($oldslug);
	if($slugOld != $slug){
		$slugResult=shweta_select('slug',$table_name,'','');
		foreach($slugResult as $b=>$a){
			$array[]=$a->slug;
		}
		$array=array_filter($array);
		if(in_array($slug,$array)){
			$slug= $slug.(count($slugResult)+1);
		}else{
			$slug=$slug;
		}
	}
	return $slug;
}
function shweta_select($field,$table,$whr_col,$whr_data){
	$ci =& get_instance();
	$ci->load->database();
	$ci->db->select($field);
	$ci->db->from($table);
	if($whr_col != '')
	$ci->db->where($whr_col,$whr_data);
	$query = $ci->db->get();
return $query->result();
}
function shweta_insert_form($table_name,$data){
		$ci =& get_instance();
$ci->db->insert($table_name,$data);
}
function shweta_select_thdistinct($field,$table,$whr){
$ci =& get_instance();
$ci->load->database();
$ci->db->distinct();
$ci->db->select($field);
if($whr != ''){
$ci->db->where($whr);
}
 $query =$ci->db->get($table);
return $query->result();
}

function countDealears($table,$whr){
	$ci =& get_instance();
	$ci->load->database();
	$ci->db->select('id');
	if($whr !=''){
	$ci->db->where($whr);
	}
	$query =$ci->db->get($table);
	return (count($query->result()));
}

function countResultAllNo($table,$condition){
	$ci =& get_instance();
	$ci->load->database();
	$ci->db->select('id');
	$ci->db->from($table);
	if($condition != ""){
		$ci->db->where($condition);
	}
	$query = $ci->db->get();
	return count($query->result());
}

function shweta_popular($table,$data,$whr_col,$whr_data){
	$ci =& get_instance();
	$ci->db->where($whr_col,$whr_data);
	$ci->db->update($table,$data);
}

function Actual_slug_get($slug){
	$slug_array=array();
	$slug_array=explode('-',$slug);
	$get_allBrand=shweta_select('name','brand','','');
	$all_brand=array();
	foreach($get_allBrand as $getKey=>$getValue){
		$all_brand[]=newslugend($getValue->name);
	}
	foreach($all_brand as $t){
		foreach($slug_array as $slu){
			if($slu == $t){
			 $slug= str_replace($slu, "", $slug);	
			}
		}
	}
	return newslugend($slug);
}

function shweta_select_like($field,$table,$like_col,$like_data){
	$ci =& get_instance();
	$ci->load->database();
	$ci->db->select($field);
	$ci->db->from($table);
	$ci->db->like($like_col,$like_data);
	$query = $ci->db->get();
	return $query->result();
}
function shweta_select_limit($field,$table,$whr_col,$whr_data,$limit, $start){
	$ci =& get_instance();
	$ci->load->database();
	$ci->db->select($field);
	$ci->db->from($table);
		$ci->db->order_by('model_name', 'ASC');
	if($whr_col != '')
	$ci->db->where($whr_col,$whr_data);
	$ci->db->limit($limit, $start);
	$query = $ci->db->get();
	return $query->result();
}
function shweta_select_limitRandom($field,$table,$whr_col,$whr_data,$limit, $start){
	$ci =& get_instance();
	$ci->load->database();
	$ci->db->select($field);
	$ci->db->from($table);
		$ci->db->order_by('id', 'RANDOM');
	if($whr_col != '')
	$ci->db->where($whr_col,$whr_data);
	$ci->db->limit($limit, $start);
	$query = $ci->db->get();
	return $query->result();
}
function shweta_order_by_Table($field,$table,$whr_col,$whr_condiition,$limit, $start){
	$ci =& get_instance();
	$ci->load->database();
	$ci->db->select($field);
	$ci->db->from($table);
	if($whr_col !='') {
        $ci->db->where($whr_col, $whr_condiition);
    }
	// $ci->db->where($condition);
	$ci->db->order_by($limit, $start);
	$query = $ci->db->get();
	return $query->result();
}
function shweta_order_by_limit($field,$table,$whr_col,$whr_condiition,$limit, $start){
	$ci =& get_instance();
	$ci->load->database();
	$ci->db->select($field);
	$ci->db->from($table);
	
	$ci->db->order_by($whr_col, $whr_condiition);
	// $ci->db->where($condition);
	$ci->db->limit($limit, $start);
	$query = $ci->db->get();
	return $query->result();
}
function shweta_order_by_limitvendor($field,$table,$whr_col,$whr_condiition,$limit, $start,$brand_id){
	$arr=array(
	'brand'=>$brand_id
	);
	$ci =& get_instance();
	$ci->load->database();
	$ci->db->select($field);
	$ci->db->from($table);
	
	$ci->db->order_by($whr_col, $whr_condiition);
	$ci->db->where($arr);
	$ci->db->limit($limit, $start);
	$query = $ci->db->get();
	return $query->result();
}
function shweta_order_by_limitvendor2($field,$table,$whr_col,$whr_condiition,$limit, $start,$brand_id){
	$arr=array(
	'brand_id'=>$brand_id
	);
	$ci =& get_instance();
	$ci->load->database();
	$ci->db->select($field);
	$ci->db->from($table);
	
	$ci->db->order_by($whr_col, $whr_condiition);
	$ci->db->where($arr);
	$ci->db->limit($limit, $start);
	$query = $ci->db->get();
	return $query->result();
}
function shweta_order_by_limit2($field,$table,$whr_condiition,$limit, $start){
	$ci =& get_instance();
	$ci->load->database();
	$ci->db->select($field);
	$ci->db->from($table);
			$ci->db->order_by('model_name', 'ASC');
		if($whr_condiition != ""){
	$ci->db->where($whr_condiition);
		}
	$ci->db->limit($limit, $start);
	$query = $ci->db->get();
	return $query->result();
}
function shweta_select_th($field,$table,$whr){
	$ci =& get_instance();
	$ci->load->database();
	$ci->db->select($field);
	$ci->db->from($table);
	if($whr != ""){
	$ci->db->where($whr);
	}
	$query = $ci->db->get();
	return $query->result();
}
function shweta_delete($table,$whr_col,$whr_data){
	$ci =& get_instance();
	$ci->db->where($whr_col,$whr_data);
	$ci->db->delete($table);
}
function shweta_select_rand($field,$table){
	$ci =& get_instance();
	$ci->load->database();
	$ci->db->select($field);
	$ci->db->from($table);
	$ci->db->order_by('id', 'RANDOM');
    $ci->db->limit(4);
	$query = $ci->db->get();
	return $query->result();
}
function shweta_select_randlatest($field,$table,$whr_col){
	$ci =& get_instance();
	$ci->load->database();
	$ci->db->select($field);
	$ci->db->from($table);
	$ci->db->order_by('id', 'RANDOM');
	$ci->db->where($whr_col);
    $ci->db->limit(4);
	$query = $ci->db->get();
	return $query->result();
}
function randomSelecxt($field,$table,$whr_col,$limit){
	$ci =& get_instance();
	$ci->load->database();
	$ci->db->select($field);
	$ci->db->from($table);
	$ci->db->order_by('id', 'RANDOM');
	if($whr_col != ''){
	$ci->db->where($whr_col);
	}
    $ci->db->limit($limit);
	$query = $ci->db->get();
	return $query->result();
}
function shweta_update($table,$data,$whr_col,$whr_data){
	$ci =& get_instance();
	$ci->db->where($whr_col,$whr_data);
	$ci->db->update($table,$data);
}
function shweta_order_by_query($field,$table,$whr_col,$whr_condiition){
	$ci =& get_instance();
	$ci->load->database();
	$ci->db->select($field);
	$ci->db->from($table);
	$ci->db->order_by($whr_col, $whr_condiition);
	$query = $ci->db->get();
	return $query->result();
}
function resultOrdrBy($field,$table,$whr_col,$whr_data,$orderCol,$ordyBY){
	$ci =& get_instance();
	$ci->load->database();
	$ci->db->select($field);
	$ci->db->from($table);
	$ci->db->order_by($orderCol, $ordyBY);
	$ci->db->where($whr_col,$whr_data);
	$query = $ci->db->get();
	return $query->result();
}
function resultOrdrByWhere($field,$table,$whrcond,$orderCol,$ordyBY,$limit){
	$ci =& get_instance();
	$ci->load->database();
	$ci->db->select($field);
	$ci->db->from($table);
	$ci->db->order_by($orderCol, $ordyBY);
	if($whrcond !=''){
		$ci->db->where($whrcond);
	}
	if($limit !=''){
		   $ci->db->limit($limit);
	}
	$query = $ci->db->get();
	return $query->result();
}

function shweta_pagination_query($table_name,$per_page,$page_name){
	$root = "http://".$_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
	$ci =& get_instance();
	$ci->load->database();
	$ci->load->library('session');
	$ci->load->helper('shweta');
	$ci->load->helper('form');
	$ci->load->helper('url');
	$ci->load->library("pagination");
	$ci->load->model("Form_model");
	$config = array();
	$config["base_url"] = $root . $page_name;
	$config["total_rows"] = $ci->db->count_all($table_name);
	$result["total_rows"] = $ci->db->count_all($table_name);
	$config["per_page"] = $per_page;
	$config["page_query_string"] = TRUE;
	$config['first_tag_open'] = $config['last_tag_open']= $config['next_tag_open']= $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
    $config['first_tag_close'] = $config['last_tag_close']= $config['next_tag_close']= $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';
	$config['cur_tag_open'] = "<li><span><b>";
	$config['cur_tag_close'] = "</b></span></li>";
	$config['first_link'] = '&laquo; First';
	$config['last_link'] = 'Last &raquo;';
	$config['use_page_numbers'] = true;
	$ci->pagination->initialize($config);
	$temp = strstr($_SERVER['REQUEST_URI'],'=');
	$temp = str_replace("=","",$temp);
	$temp= $temp - 1;
	if($temp > 0)
	$page = $temp * $config["per_page"];
	else 
	$page= 0;
	$result['result']=$ci->Form_model->show_pagination($config["per_page"], $page,$table_name);
	$result["links"] = $ci->pagination->create_links();
	return $result;
}
function shweta_pagination_query_new_orderby($table_name,$per_page,$page_name,$condition,$orderby,$ordercolum){
	$root = "http://".$_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
	$ci =& get_instance();
	$ci->load->database();
	$ci->load->library('session');
	$ci->load->helper('shweta');
	$ci->load->helper('form');
	$ci->load->helper('url');
	$ci->load->library("pagination");
	$ci->load->model("Form_model");
	$config = array();
	$config["base_url"] = $root . $page_name;
	$config["total_rows"] =  count(shweta_select_th('id',$table_name,$condition));
	$result["total_rows"] = count(shweta_select_th('id',$table_name,$condition));
	$config["per_page"] = $per_page;
	$config["page_query_string"] = TRUE;
	$config['first_tag_open'] = $config['last_tag_open']= $config['next_tag_open']= $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
    $config['first_tag_close'] = $config['last_tag_close']= $config['next_tag_close']= $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';
	$config['cur_tag_open'] = "<li><span><b>";
	$config['cur_tag_close'] = "</b></span></li>";
	$config['first_link'] = '&laquo; First';
	$config['last_link'] = 'Last &raquo;';
	$config['use_page_numbers'] = true;
	$ci->pagination->initialize($config);
	$temp = strstr($_SERVER['REQUEST_URI'],'=');
	$temp = str_replace("=","",$temp);
	$temp= $temp - 1;
	if($temp > 0)
	$page = $temp * $config["per_page"];
	else 
	$page= 0;
	$result['result']=$ci->Form_model->show_pagination_filter_orderby($config["per_page"], $page,$table_name,$condition,$orderby,$ordercolum);
	$result["links"] = $ci->pagination->create_links();
	return $result;
}
function shweta_order_by_limit_new_orderby($field,$table,$condition,$limit, $start,$orderby,$ordercolum){
	$ci =& get_instance();
	$ci->load->database();
	$ci->db->select($field);
	$ci->db->from($table);
	$ci->db->order_by($orderby, $ordercolum);
	if($condition != ''){
	$ci->db->where($condition);
	}
	$ci->db->limit($limit, $start);
	$query = $ci->db->get();
	return $query->result();
}

function getStarRate($final_rating){
   if($final_rating == ""){
   ?>
   <i class="fa fa-star-o" style="color:#C9302C;"></i>
   <i class="fa fa-star-o" style="color:#C9302C;"></i>
   <i class="fa fa-star-o" style="color:#C9302C;"></i>
   <i class="fa fa-star-o" style="color:#C9302C;"></i>
   <i class="fa fa-star-o" style="color:#C9302C;"></i>
   <?php 
   }
   else{
?>

<?php 		
			if(0.5 > $final_rating){
				?>
	  <i class="fa fa-star-o" style="color:#C9302C;"></i>
	  <i class="fa fa-star-o" style="color:#C9302C;"></i>
	  <i class="fa fa-star-o" style="color:#C9302C;"></i>
	  <i class="fa fa-star-o" style="color:#C9302C;"></i>
	  <i class="fa fa-star-o" style="color:#C9302C;"></i>
				<?php 
			}
			elseif(0.5 <= $final_rating && 1.0 > $final_rating){
				?>
				<i class="fa fa-star-half-o" style="color:#C9302C;"></i>
	  <i class="fa fa-star-o" style="color:#C9302C;"></i>
	  <i class="fa fa-star-o" style="color:#C9302C;"></i>
	  <i class="fa fa-star-o" style="color:#C9302C;"></i>
	  <i class="fa fa-star-o" style="color:#C9302C;"></i>				
				<?php 
			}
			elseif(1.0 <= $final_rating && 1.5 > $final_rating){
								?>
	   <i class="fa fa-star" style="color:#C9302C;"></i>	
	  <i class="fa fa-star-o" style="color:#C9302C;"></i>
	  <i class="fa fa-star-o" style="color:#C9302C;"></i>
	  <i class="fa fa-star-o" style="color:#C9302C;"></i>
	  <i class="fa fa-star-o" style="color:#C9302C;"></i>			
				<?php 
			}
			elseif(1.5 <= $final_rating && 2.0 > $final_rating){												?>
	<i class="fa fa-star" style="color:#C9302C;"></i>
	<i class="fa fa-star-half-o" style="color:#C9302C;"></i>			
	<i class="fa fa-star-o" style="color:#C9302C;"></i>
	<i class="fa fa-star-o" style="color:#C9302C;"></i>
	<i class="fa fa-star-o" style="color:#C9302C;"></i>				
				<?php 
			}
			elseif(2.0 <= $final_rating && 2.5 > $final_rating){
				?>
				<i class="fa fa-star" style="color:#C9302C;"></i>
				<i class="fa fa-star" style="color:#C9302C;"></i>			
			    <i class="fa fa-star-o" style="color:#C9302C;"></i>
			    <i class="fa fa-star-o" style="color:#C9302C;"></i>
			    <i class="fa fa-star-o" style="color:#C9302C;"></i>
				<?php 
			}
			elseif(2.5 <= $final_rating && 3.0 > $final_rating){								?>
				<i class="fa fa-star" style="color:#C9302C;"></i>
				<i class="fa fa-star" style="color:#C9302C;"></i>
				<i class="fa fa-star-half-o" style="color:#C9302C;"></i>	
				<i class="fa fa-star-o" style="color:#C9302C;"></i>
				<i class="fa fa-star-o" style="color:#C9302C;"></i>			
				<?php 
			}
			elseif(3.0 <= $final_rating && 3.5 > $final_rating){
								?>
				<i class="fa fa-star" style="color:#C9302C;"></i>
				<i class="fa fa-star" style="color:#C9302C;"></i>
				<i class="fa fa-star" style="color:#C9302C;"></i>	
				<i class="fa fa-star-o" style="color:#C9302C;"></i>
				<i class="fa fa-star-o" style="color:#C9302C;"></i>				
				<?php 
			}
			elseif(3.5 <= $final_rating && 4.0 > $final_rating){
								?>
				<i class="fa fa-star" style="color:#C9302C;"></i>
				<i class="fa fa-star" style="color:#C9302C;"></i>
				<i class="fa fa-star" style="color:#C9302C;"></i>
				<i class="fa fa-star-half-o" style="color:#C9302C;"></i>
		
	  <i class="fa fa-star-o" style="color:#C9302C;"></i>				
				<?php 
			}
			elseif(4.0 <= $final_rating && 4.5 > $final_rating){
								?>
				<i class="fa fa-star" style="color:#C9302C;"></i>
				<i class="fa fa-star" style="color:#C9302C;"></i>
				<i class="fa fa-star" style="color:#C9302C;"></i>
				<i class="fa fa-star" style="color:#C9302C;"></i>
				<i class="fa fa-star-o" style="color:#C9302C;"></i>			
				<?php 
			}
			elseif(4.5 <= $final_rating && 5.0 > $final_rating){
								?>
				<i class="fa fa-star" style="color:#C9302C;"></i>
				<i class="fa fa-star" style="color:#C9302C;"></i>
				<i class="fa fa-star" style="color:#C9302C;"></i>
				<i class="fa fa-star" style="color:#C9302C;"></i>
				<i class="fa fa-star-half-o" style="color:#C9302C;"></i>
				<?php 
			}
			elseif(5.0 == $final_rating ){												?>
				<i class="fa fa-star" style="color:#C9302C;"></i>
				<i class="fa fa-star" style="color:#C9302C;"></i>
				<i class="fa fa-star" style="color:#C9302C;"></i>
				<i class="fa fa-star" style="color:#C9302C;"></i>
				<i class="fa fa-star" style="color:#C9302C;"></i>				
				<?php 
			}
			else{
								?>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<?php 
			}
			?>
<?php }
 } ?>
<?php 
function shweta_pagination_query_new($table_name,$per_page,$page_name,$condition){
	$root = "http://".$_SERVER['HTTP_HOST'];
	$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
	$ci =& get_instance();
	$ci->load->database();
	$ci->load->library('session');
	$ci->load->helper('shweta');
	$ci->load->helper('form');
	$ci->load->helper('url');
	$ci->load->library("pagination");	
	$ci->load->model("Form_model");
	$config = array();
	$config["base_url"] = $root . $page_name;
	$config["total_rows"] = count(shweta_select_th('id',$table_name,$condition));
	$result["total_rows"] = count(shweta_select_th('id',$table_name,$condition));
	$config["per_page"] = $per_page;
	$result["per_page"] = $per_page;
	$config["page_query_string"] = TRUE;
	$config['first_tag_open'] = $config['last_tag_open']= $config['next_tag_open']= $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
    $config['first_tag_close'] = $config['last_tag_close']= $config['next_tag_close']= $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';
	$config['cur_tag_open'] = "<li><span><b>";
	$config['cur_tag_close'] = "</b></span></li>";
	$config['first_link'] = '&laquo; First';
	$config['last_link'] = 'Last &raquo;';
	$config['use_page_numbers'] = true;
	$ci->pagination->initialize($config);
	$temp = strstr($_SERVER['REQUEST_URI'],'=');
	$temp = str_replace("=","",$temp);
	$temp= $temp - 1;
	$result["page"]=$temp;
	if($temp > 0)
	$page = $temp * $config["per_page"];
	else 
	$page= 0;
	$result['result']=$ci->Form_model->show_pagination_filter($config["per_page"], $page,$table_name,$condition);
	$result["links"] = $ci->pagination->create_links();
	return $result;
}
function newslugend($slug){
	$slug=str_replace("&","and",$slug);
	$text = preg_replace('~[^\\pL\d]+~u', '_', $slug);
	$text = trim($text, '_');  // trim
	$text = strtolower($text);  // lowercase
	$text = preg_replace('~[^-\w]+~', '', $text);  // remove unwanted characters
	$text=str_replace("_","-",$text);
	return $slug=$text;	
}

function oldTractorDiv($SearchOldTractor){
	$root = "http://".$_SERVER['HTTP_HOST'];
	$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
if(!empty($SearchOldTractor)){
	foreach($SearchOldTractor as $row => $obj){
	$tractor_brandImage='';
	$tractor_brand='';
	$hp='';
	$state='';
	foreach(shweta_select('image','brand','id',$obj->brand) as $raa) $tractor_brandImage= $raa->image;
	foreach(shweta_select('name','brand','id',$obj->brand) as $raa) $tractor_brand= $raa->name;
	foreach(shweta_select('name','hp','id',$obj->hp) as $raa) $hp= $raa->name;
	foreach(shweta_select('name','states','id',$obj->state) as $raa) $state= $raa->name;
	?>	
<div class="col-sm-12 col-md-12 prod-div c7" >
	<div class="col-sm-4 col-md-4 paddingZ">					
				<img  onerror="imgError(this);" src="<?php echo $root."images/oldTractor/"; ?><?php echo $obj->image; ?>" alt="<?php echo $tractor_brand; ?> <?php echo $obj->model_name; ?> tractor" style="width: 100%;height: 129px;border:1px solid #ddd" class="img-responsive" >
	
		</div>
 
		<div class="col-sm-5 col-md-5 paddingZ">
		<div class="col-md-12 col-sm-12 paddingZ c9" style="line-height: 34px;padding-left:5px;">
			<span class="c10">
			<a href="<?php echo $root; ?>used-tractor/<?php echo newslugend($tractor_brand); ?>-<?php echo newslugend($obj->slug); ?>" style="color:#2A7842;text-transform: capitalize;font-size: 22px;"><?php echo ucfirst($obj->model_name); ?></a></span></br>	
			<?php 
			$userLocation='';
			$userLocationId='';
			foreach(shweta_select('state','user_reg','id',$obj->user_id) as $raa) $userLocationId=($raa->state) ;
			if($userLocationId !=""){
			?>
			<span class="c11" style="color: #c2b2b2;"><b></b> <i class="fa fa-map-marker"></i> 
			<?php
			foreach(shweta_select('name','states','id',$userLocationId) as $raa) echo $userLocation=($raa->name) ;
			?>
			</span></br>
			<?php } ?>
			<span class="c11" style="font-size: 22px;
font-family: 'robotoregular';
color: #000;">

 <i class="fa fa-inr"></i> 
<?php  if($obj->price !='')
	echo $obj->price;
	else
		echo "Not Available";
?>

 </span></br>

		</div>	
	</div>
			<div class="col-sm-3 col-md-3" style="padding:0px;margin-top:15px;">
		<div class="col-sm-12 col-md-12">
			<img onerror="imgError(this);"  src="<?php echo $root."upload/"; ?><?php echo $tractor_brandImage; ?>" alt="<?php echo $tractor_brand; ?> tractor logo" style="height: 68px;
width: 100%;
margin-left: 0px;" class="brandImageCs"/>
		
		</div>
		<div class="col-sm-12 col-md-12">
			<a style="color: white;" href="<?php echo $root; ?>used-tractor/<?php echo newslugend($tractor_brand); ?>-<?php echo newslugend($obj->slug); ?>" class="c15">
				<div class="oldTractorbutton"> 
				    Get Seller Details  
				</div>
			</a>
		</div>
	</div>
	
</div>		
	<?php 
	} }
else{
?><h4 style="color:#DB4C4D;text-align:center;">No Tractor found</h4><?php 
}
}
function RentTractorDiv($SearchOldTractor){
	$root = "http://".$_SERVER['HTTP_HOST'];
	$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
	if(!empty($SearchOldTractor)){
		foreach($SearchOldTractor as $row => $obj){
		$tractor_brandImage='';
		$tractor_brand='';
		$state='';
		foreach(shweta_select('image','brand','id',$obj->brand) as $raa) $tractor_brandImage= $raa->image;
		foreach(shweta_select('name','brand','id',$obj->brand) as $raa) $tractor_brand= $raa->name;
		foreach(shweta_select('name','states','id',$obj->state) as $raa) $state= $raa->name;
	?>
	<div class="col-md-12 col-sm-12 paddingZ sha" >
		<h3 style="font-size: 20px;font-weight: 500;color: #C9302C;padding-left: 12px;"><?php 
			$type=$obj->rent_type;
			echo $type=ucfirst(str_replace('-'," ",$type));
			?>
		</h3>
		<div class="col-md-2 col-sm-2">
			<img src="<?php echo $root; ?>images/default-image.jpg" alt="<?php echo $tractor_brand; ?> <?php echo $obj->model_name; ?> tractor" style="margin: 10px 0px 0px;width: 100%;">
		</div>
		<div class="col-md-3 col-sm-3 ">
			<p class="c11" style="margin:10px;color:#DB4C4D;font-size:15px"><b> State : <?php echo $state; ?> </b> </p>
			<p class="c11" style="font-size:15px;margin:10px"><b>  <?php echo ucfirst(($tractor_brand)); ?> </b> </p>
			<p class="c11" style="font-size:15px;margin:10px"><b> Model : <?php echo ucfirst(strtolower($obj->model_name)); ?> </b> </p>
		</div>
		<div class="col-md-4 col-sm-4 ">
			<p class="c11" style="margin:10px"><b>Owner Name : </b> <?php 
				foreach(shweta_select('username','user_reg','id',$obj->user_id) as $raa) echo ucfirst($raa->username);
				?>
			</p>
			<p class="c11" style="margin:10px"><b> Phone Number : </b> +91-******</p>
			<p class="c11" style="margin:10px"><b> Availability : </b><span style="color:green"><?php echo ucfirst(strtolower($obj->availability_val)); ?></span></p>
		</div>
		<div class="col-md-3 col-sm-3 paddingZ">
			<p class="c11" style="margin:10px"><b>Rent Per Day : </b> <?php echo ucfirst(strtolower($obj->rentper)); ?> <i class="fa fa-inr"></i></p>
			<a style="color:white" href="<?php echo $root;?>rent-tractor/<?php echo newslugend($obj->slug); ?>">	<button type="button" class="btn btn-danger"  style="height:40px ;width:80%;font-size:15px;margin:10px 0px 0px 10px">
			View</button></a>
		</div>	
	</div>
	<?php 
	} }
	else{
	?><h4 style="color:#DB4C4D;text-align:center;">No Tractor found</h4><?php 
	}
}
function implementTractorDiv($SearchOldTractor){
	$root = "http://".$_SERVER['HTTP_HOST'];
	$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
	if(!empty($SearchOldTractor)){
		
		foreach($SearchOldTractor as $row => $obj){
	?>
	<?php 
	$barndName='';
	foreach(shweta_select('name','brand','id',$obj->brand) as $raa) $barndName= ($raa->name); ?>
	<div class="col-sm-4 col-md-4 col-xs-12 price" style="position:relative" style="bottom: 10px !important;">
		<div class="col-sm-12 col-md-12 col-xs-12 prod-div" style="background-color:#F7F9FC;border:1px solid #e9e9e9;border-radius:3px;text-align:center">
			<div class="col-sm-12 col-md-12 col-xs-12 paddingZ">
				<div style="color:#DC3F40;font-size:18px;font-weight:bold;padding:5px;text-overflow: ellipsis;
white-space: nowrap;"><?php foreach(shweta_select('name','brand','id',$obj->brand) as $raa) echo ucfirst($raa->name); ?></div>
					<img onerror="imgError(this);" src="<?php echo $root."images/implementTractor/"; ?><?php echo $obj->image;?>"   alt="<?php echo ucfirst($barndName); ?><?php echo $obj->model_name; ?> tractor harvester" style="height:170px;width:100%" class=""/>					
				
				
			</div>
			<div class="col-sm-12 col-md-12 col-xs-12 paddingZ" style="height:177px;">
				<ul style="padding:0px 10px;margin-top:0px;line-height: 24px;text-align:left;list-style:none;font-size: 12px;height:124px;">
					<a onclick="HarvesterUrlAjax('<?php echo ($obj->id); ?>','<?php echo newslugend($barndName); ?>','<?php echo newslugend($obj->slug); ?>')" style="cursor:pointer;color:#2A7842;">
					<li style="text-align: center;"><span style="font-size:18px;font-weight:bold;"><?php echo ucfirst($obj->model_name); ?></span></li></a>
					<li><span style="font-size:13px;;"><b><i class="fa fa-bolt"></i> Power</b>: <?php echo ucfirst($obj->epower); ?></span></li>
					<?php if($obj->hprice != ""){ ?>
					<li><span style="font-size:13px;;"><b><i class="fa fa-inr"></i> Price</b>: <span style="color:rgb(219,76,77)"><?php echo ucfirst($obj->hprice); ?> <i class="fa fa-inr"></i></span></span></li>
					<?php } ?>
					<li><span style="font-size:13px;;"><b><i class="fa fa-wrench"></i> Cutting Width</b>: <?php echo ucfirst($obj->cutterbar); ?></span></li>
					<li><span style="font-size:13px;;"><b><i class="fa fa-plug"></i> Power Source</b>: 
						<?php 
						if($obj->power_Source == "self"){
						echo "Self Propelled";
						}else{
						echo "Tractor Mounted";
						}
						?>
						</span>
					</li>
					<li><span style="font-size:13px;;"><b><i class="fa fa-tachometer"></i> Crop</b>: <?php echo ucfirst($obj->crop); ?></span></li>
				</ul>
			</div>
			<div class="col-sm-12 col-md-12 col-xs-12 " style="padding:0px;">
				<div class="col-sm-12 col-md-12 col-xs-12 " style="text-align:center;background:rgba(212, 21, 22, 0.1);padding:10px;">
					<a onclick="HarvesterUrlAjax('<?php echo ($obj->id); ?>','<?php echo newslugend($barndName); ?>','<?php echo newslugend($obj->slug); ?>')" style="cursor:pointer;font-size:1.0em;color:#4d4d4d;">DETAILS</a>
				</div>
			</div>
		</div>
	</div>
	<?php 
	} }
	else{
	?><h4 style="color:#DB4C4D;text-align:center;">No result found</h4><?php 
	}
}
function implementTractorDivNew($SearchOldTractor,$total,$lastval){
	$root = "http://".$_SERVER['HTTP_HOST'];
	$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
	if(!empty($SearchOldTractor)){
	foreach($SearchOldTractor as $row => $obj){
	?>
	<?php 
	$b_name='';
	foreach(shweta_select('name','brand','id',$obj->brand) as $raa) $b_name=($raa->name); ?>
	<div class="col-sm-4 col-md-4 col-xs-12 price" style="position:relative">
		<div class="col-sm-12 col-md-12 col-xs-12  prod-div" style="background-color:#F7F9FC;border:1px solid #e9e9e9;border-radius:3px;text-align:center;height: 400px;">
			<div class="col-sm-12 col-md-12 col-xs-12 paddingZ">
				<div style="color:#DC3F40;font-size:18px;font-weight:bold;padding:5px;text-overflow: ellipsis;
white-space: nowrap;"><?php foreach(shweta_select('name','brand','id',$obj->brand) as $raa) echo ucfirst($raa->name); ?></div>
		 
			</div>	<div class="col-sm-12 col-md-12 col-xs-12 paddingZ"> 
					<img src="<?php echo $root."images/implementTractor/"; ?><?php echo $obj->image;?>"   alt="<?php echo ucfirst($b_name); ?><?php echo $obj->model_name; ?> tractor harvester" style="height:170px;width:100%" class=""/>					
		 
					  
				
			 
			</div>
				<div class="col-sm-12 col-md-12 col-xs-12 paddingZ" style="height:153px;">
					<ul style="padding:0px 15px;margin-top:5px;line-height: 23px;text-align:left;list-style:none;font-size: 12px;">
						<a onclick="ImplementUrlAjax('<?php echo ($obj->id); ?>','<?php echo newslugend($b_name); ?>','<?php echo newslugend($obj->slug); ?>')" style="cursor:pointer;color:#2A7842;">
						<li style="text-align:center"><span style="font-size:17px;font-weight:bold;"><?php echo ucfirst($obj->model_name); ?></span>
							<h5>(<?php foreach(shweta_select('name','filed','id',$obj->implementType) as $raa) echo ucfirst($raa->name); ?>)</h5>
						</li>
						</a>
							<?php if($obj->price != "" && $obj->price != "NA"){ ?>
							<li><span style="font-size:13px;;"><b><i class="fa fa-inr"></i> Price</b>: <span style="color:rgb(219,76,77)"><?php echo ucfirst($obj->price); ?> <i class="fa fa-inr"></i></span></span></li>
							<?php } ?>
							<?php if($obj->tractorPower != "" && $obj->tractorPower != "N/A"){ ?>
							<li><span style="font-size:13px;;"><b><i class="fa fa-bolt"></i> Power</b>: <?php echo ucfirst($obj->tractorPower); ?></span></li>
							<?php } ?>
							<li><span style="font-size:13px;;"><b><i class="fa fa-tachometer"></i> Category</b>: <?php foreach(shweta_select('name','implement_type_cate','id',$obj->implement_cate) as $raa) echo ucfirst($raa->name); ?></span></li>
						</ul>
					</div>
					<div class="col-sm-12 col-md-12 col-xs-12 " style="padding:0px;">
						<div class="col-sm-12 col-md-12 col-xs-12 " style="text-align:center;background:rgba(212, 21, 22, 0.1);padding:10px;">
						<a onclick="ImplementUrlAjax('<?php echo ($obj->id); ?>','<?php echo newslugend($b_name); ?>','<?php echo newslugend($obj->slug); ?>')" style="cursor:pointer;font-size:1.0em;color:#4d4d4d;">DETAILS</a>
						</div>
					</div>
		</div>
	</div>
	<?php 
	} }
	else{
	?><h4 style="color:#DB4C4D;text-align:center;">No result found</h4><?php 
	}
 
}
function implementOldTractorDiv($SearchOldTractor){
	$root = "http://".$_SERVER['HTTP_HOST'];
	$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
	if(!empty($SearchOldTractor)){
	foreach($SearchOldTractor as $row => $obj){
	?>
	<?php
	$b_name='';
	foreach(shweta_select('name','brand','id',$obj->brand) as $raa)  $b_name=($raa->name); ?>
	<div class="col-sm-12 col-md-12 col-xs-12 prod-div c7" >
		<div class="col-sm-3 col-md-3 col-xs-12 paddingZ">
			<img src="<?php echo $root."css/"?>s_img_new.php?image=<?php echo $root;?>images/implementTractor/<?php echo $obj->image; ?>&width=149&height=129&zc=2" class="img-responsive c8" >
		</div>
		<div class="col-sm-9 col-md-9 col-xs-12 paddingZ">
			<div class="col-md-12 col-sm-12 col-xs-12 "style="">
				<h3 style="font-weight:bold;color:#148F1A;text-align:center"> Product Only For <span style="color:#DB4C4D;"> <?php echo ucfirst($obj->implement_for); ?></span></h3>
				<div class="col-md-8 col-sm-8 "style="font-size:16px;line-height:25px">
					<span ><b>Brand</b> : 	<span style="color:#DB4C4D"><?php foreach(shweta_select('name','brand','id',$obj->brand) as $raa) echo ucfirst($raa->name); ?></span></span><br>
					<span ><b>Model Name</b> : <?php echo ucfirst($obj->model_name); ?></span><br>
					<span><b>Owner Name</b> : <?php echo ucfirst($obj->name); ?> </span><br>
					<?php if($obj->hp != "0"){ ?>
					<span><b>Work on HP</b> : 
					<?php foreach(shweta_select('name','hp_range_imp','id',$obj->hp) as $raa) echo $raa->name." HP"; ?>
					</span>
					<?php } ?>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12 "style="line-height:25px">
					<span><b>Category </b>: <span style="color:#148F1A;"><?php 
					if($obj->type_implement != "harvester"){
					foreach(shweta_select('name','filed','id',$obj->type_implement) as $raa) echo $raa->name;
					} else{
					echo ucfirst($obj->type_implement);
					}
					?></span></span><br>
					<a href="<?php echo $root; ?>used-tractor-implement/<?php echo newslugend($b_name); ?>-<?php echo newslugend($obj->slug); ?>" style="font-size:1.0em;color:#4d4d4d;"><button class="btn btn-danger"style="margin:15px 10px 0px"><i class="fa fa-eye"></i> View</button>
					</a>
				</div>
			</div>
		</div>
	</div>
	<?php 
	} }
	else{
	?><h4 style="color:#DB4C4D;text-align:center;">No result found</h4><?php 
	}
}
function shweta_order_by_limit_new($field,$table,$condition,$limit, $start,$whr_col, $whr_condiition){
	$ci =& get_instance();
	$ci->load->database();
	$ci->db->select($field);
	$ci->db->from($table);
	$ci->db->order_by($whr_col, $whr_condiition);
	if($condition != ""){
	$ci->db->where($condition);
	}
	$ci->db->limit($limit, $start);
	$query = $ci->db->get();
	return $query->result();
}

function shweta_nameslug($name){
	$slug=str_replace("&","and",$name);
	$text = preg_replace('~[^\\pL\d]+~u', '_', $slug);
	$text = trim($text, '_');  // trim
	$text = strtolower($text);  // lowercase
	$text = preg_replace('~[^-\w]+~', '', $text);  // remove unwanted characters
	$text=str_replace("_","-",$text);
	return $slug=$text;
}

function showtractorListDiv($result){
	$root = "http://".$_SERVER['HTTP_HOST'];
	$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
	?>
	<div class="row">
	<?php if(!empty($result)){ ?>
	<?php
	foreach($result as $row => $tractor_value){
	?>	
	<div class="col-sm-6 col-md-4" style="    margin-bottom: 20px;">
	<div class="col-sm-12 col-md-12 prod-div" style="background:#fff;border:1px solid #e9e9e9;border-radius:3px;">
	<div class="col-sm-12 col-md-12 paddingZ">
		<?php 
			foreach(shweta_select('name','brand','id',$tractor_value->brand) as $raa) $brand_name= str_replace(" "," ",(strtolower($raa->name))) ;
			$model_name=strtolower($tractor_value->model_name);
		?>
		<?php if($tractor_value->image != "" && file_exists("./upload/".$tractor_value->image)){ ?>
		<img src="<?php echo $root."css/"?>s_img_new.php?image=<?php echo $root."upload/"; ?><?php echo $tractor_value->image; ?>&width=218&height=170&zc=2" alt="<?php echo $brand_name.""; ?> tractor <?php echo $model_name; ?>" class="img-responsive" style="padding: 20px 0px;margin:auto;">
		<?php } else { ?>
		<img src="<?php echo $root; ?>images/tractor_default_image.jpg" alt="<?php echo $brand_name.""; ?> tractor <?php echo $model_name; ?>" class="img-responsive" style="width: 100%;height:170px;margin:auto;margin-top: 17px;">	<?php } ?>	
	</div>
	<?php if($tractor_value->priceShow != 0){ ?>
	<?php 
	if($tractor_value->price !=""){
	?>
	<a href="#"><span class="comp_btn "><i class="fa fa-rupee" style="margin: 0px 0px 3px 5px;"></i>
		<?php 
		echo $tractor_value->price." lac*";
		?>
		</span>
	</a>
	<?php }}  ?>
	<?php 
	if($tractor_value->hp !=""){
	?>
	<a href="#"><span class="comp_btn1"><i class="fa fa-wrench" style="margin: 0px 0px 3px 5px;"></i> 
		<?php 
		foreach(shweta_select('name','hp','id',$tractor_value->hp) as $raa) echo ucfirst($raa->name." HP") ;
		?>
		</span>
	</a>
	<?php } ?>
	<div class="col-sm-12 col-md-12 paddingZ" style="height:154px;">
		<ul style="padding:0px 15px;margin-top:20px;line-height: 28px;list-style:none;font-size: 12px;">
			<li>
				<a href="<?php echo $root; ?>product/<?php echo $tractor_value->id; ?>/<?php 	foreach(shweta_select('name','brand','id',$tractor_value->brand) as $raa) echo newslugend($raa->name)."-tractor"; ?>-<?php echo shweta_nameslug($tractor_value->model_name); ?>" class="hh">
					<span style="color:#DC3F40;font-size:18px;font-weight:bold;">
					<?php 
					if($tractor_value->brand !="")
					foreach(shweta_select('name','brand','id',$tractor_value->brand) as $raa) echo ucfirst($raa->name) ;
					?> 
					</span>
				</a>
			</li>
			<li><span style="color:#148f1a;"><b>
				<?php 
				if($tractor_value->model_name !="")
				echo ucfirst($tractor_value->model_name);
				?>
				</b></span>
			</li>
			<?php 
				if($tractor_value->capacity !=""){
			?>
			<li><b>CC :</b> 
			<?php 
				echo $tractor_value->capacity." CC";
			?>
			</li>
			<?php } ?>
			<?php 
				if($tractor_value->cylinder !=""){
			?>
				<li><b>Cylinder :</b> 
			<?php 
				echo $tractor_value->cylinder;
			?>
			</li>
			<?php } ?>
			<?php 
			if($tractor_value->transmission_clutch !=""){
			?>
			<li style="line-height: 16px;"><b>Clutch :</b>
			<span style="text-transform: uppercase;">
			<?php 
			echo $tractor_value->transmission_clutch;
			?>
			</span>
			</li>
			<?php } ?>
		</ul>
	</div>
	<div class="col-sm-12 col-md-12" style="padding:0px;margin-top:20px;">
		<div class="col-sm-8 col-md-8" style="border-left:3px solid rgba(212, 21, 22, 0.8);text-align:center;background:rgba(212, 21, 22, 0.1);padding:13px;">
		<a href="<?php echo $root; ?>product/<?php echo $tractor_value->id; ?>/<?php 	foreach(shweta_select('name','brand','id',$tractor_value->brand) as $raa) echo newslugend($raa->name)."-tractor"; ?>-<?php echo shweta_nameslug($tractor_value->model_name); ?>" class="hh"><button class="hh" style="font-size:1.0em;color:#4d4d4d;background: #FBE7E7;border: none">
			DETAILS
			</button>
		</a></div>
		<div class="col-sm-4 col-md-4 hvr-border" style="text-align:center;padding:13px;">
			<a href="#" data-toggle="modal" data-target="#myModal_<?php echo $tractor_value->id; ?>" style="font-size:1.0em;color:#4d4d4d;"><i class="fa fa-balance-scale" style="font-weight:bold"></i></a>
		</div>
	</div>
	</div>
	</div>

	<!-- Modal start compare-->

	<div class="modal fade" id="myModal_<?php echo $tractor_value->id; ?>" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Select a Tractor for compare</h4>
				</div>
				<?php $att='onsubmit="return validation22()" id="form"';
				echo form_open('compare-result');
				?>
				<div class="modal-body">
					<div class="col-sm-12 col-md-12" style="padding:15px;">
						<div class="col-sm-6 col-md-6">
							<label for="sel1" style="color:#4d4d4d;">Brand</label>
							<?php 
								$cc[0]='please select';
								foreach(shweta_select('*','brand','','') as $r => $t){ 
								$cc[$t->id] = ucfirst($t->name);		
								}		
								$js5 = 'class="form-control brand_id" id="brand_id" onchange="model_name_get(this.value)"';
								echo form_dropdown('brand_name', $cc, '', $js5);
							?>
							<div style="display:none;color:red;margin-top: 4px;float:left;" id="user_error"><i class="fa fa-arrow-up"></i> Please Fill this field...</div>
							<?php echo form_input(array('type' => 'hidden','name'=>'compare_id','value' => $tractor_value->id)); ?>
						</div>
						<div class="col-sm-6 col-md-6">
							<label for="sel1" style="color:#4d4d4d;">Model</label>
							<select class="form-control model_name_id" id="model_name_id" name="model_name">
							</select>
							<div style="display:none;color:red;margin-top: 4px;float:left;" id="user_error1"><i class="fa fa-arrow-up"></i> Please Fill this field...</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<?php echo form_input(array('type' => 'submit','id'=>'submit','style'=>'margin-right: 15px', 'class' => 'btn btn-default modal_compare', 'value' => 'Compare Now')); ?>
				</div>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
	<?php 
	}
	?>
	<?php } 
	else{
	?>
	<h3 style="text-align:center;text-transform: capitalize;padding-bottom: 10px;color: #DB4C4D;">
	sorry no product found
	</h3>
	<?php }?>
	</div>
	<?php 
}

function tabContainFrontDiv($result){
	$root = "http://".$_SERVER['HTTP_HOST'];
	$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
	if(empty($result)){
		?>
		No tractor found
		<?php 
	}
	else{ foreach($result as $ra => $ob1){ 
	?>		  
	<div class="co-md-3 col-sm-3  prod-div max_mar" style="height:346px;border-bottom:2px solid #DD4445">
		<?php if($ob1->image != "" && file_exists("./upload/".$ob1->image)){ ?>
		<img src="<?php echo $root."css/"?>s_img_new.php?image=<?php echo $root."upload/"; ?><?php echo $ob1->image; ?>&width=237&height=187&zc=2"   alt="<?php 	foreach(shweta_select('name','brand','id',$ob1->brand) as $raa) echo ($raa->name); ?>-<?php echo ($ob1->model_name); ?> tractor" />
		<?php } else{ ?>
			<img src="<?php echo $root."css/"?>s_img_new.php?image=<?php echo $root."images/default-image.jpg"; ?>&width=237&height=187&zc=2"  tractor logo" class=""/>	<img src="<?php echo $root."css/"?>s_img_new.php?image=<?php echo $root."images/default-image.jpg"; ?>&width=345&height=324&zc=2"  tractor logo" class=""/>
		<?php } ?>
		<a href="<?php echo $root; ?>product/<?php echo $ob1->id; ?>/<?php 	foreach(shweta_select('name','brand','id',$ob1->brand) as $raa) echo newslugend($raa->name)."-tractor"; ?>-<?php echo newslugend($ob1->model_name); ?>">
			<h5 style="text-align:center;color:#D63334">
			<b> 
				<?php 
				foreach(shweta_select('name','brand','id',$ob1->brand) as $raa) echo ucfirst($raa->name) ;
				?>
			</b>
			<span style="color:#148F1A"><?php 	echo ucfirst($ob1->model_name); ?></span></h5>
		</a>
		<ul style="font-size:12px;line-height:20px">
			<?php if($ob1->hp !="") { ?>
			<li class="colo"> 
			<?php  foreach(shweta_select('name','hp','id',$ob1->hp) as $raa) echo ucfirst($raa->name." HP") ; ?>
			Diesel Engine 
			</li>
			<?php } ?>
			<?php if($ob1->cylinder !="") { ?>
			<li class="colo"> 
			<?php echo $ob1->cylinder; ?>
			Cylinder </li>
			<?php } ?>
			<?php if($ob1->transmission_clutch !="") { ?>
			<li class="colo"> 
			<?php echo $ob1->transmission_clutch; ?> 
			Diaphragm Type Clutch 
			</li>
			<?php } ?>
			<?php if($ob1->priceShow !="0") { ?>
			<?php if($ob1->price !="") { ?>
			<li class="colo"> 

			Estimated Price :- 
			<?php echo $ob1->price."* L"; ?> 
			</li>
			<?php } } ?>
		</ul>
	</div>		
	<?php } } ?>	
	<?php 
}

function sentMailFunction($name,$lineFirst,$lineSecond,$otherInfo){
	$root = "http://".$_SERVER['HTTP_HOST'];
	$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
$mess='
	<div id=":138" class="ii gt adP adO"><div id=":137" class="a3s aXjCH m1542c4466795d87e"><u></u>
    <div>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="max-width:730px;width:100%">
<tbody><tr>
      <td width="30" bgcolor="#f3f3f3" background=""><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="max-width:562px; width:95%">
          <tbody><tr>
          <td>&nbsp;</td>
        </tr>
          <tr>
          <td height="88" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody><tr>
              <td bgcolor="#D63334" height="3"></td>
            </tr>
              <tr>
              <td height="88" valign="middle"><table width="251" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tbody><tr>
                  
				   <td height="88" align="center" style="color:#DD4445;font-size: 32px;"><a target="_blank" style="color: rgb(221, 68, 69);text-decoration-line: initial;" href="http://www.tractorjunction.com/">Tractor<span style="color:#148F20"> Junction</a></span></td>
           </tr>
                </tbody></table>
              </td></tr><tr>
              <td align="center" bgcolor="#8BDBD2" style="font-family:Calibri;font-size:13px;color:#757575;font-weight:normal">
			  <img alt="Tractor Junction" src="'.$root.'images/tractor-junction-banner.jpg" alt="" style="width:100%" class="CToWUd">
			  
			  </td>
            </tr>
              <tr>
              <td style="font-family:Calibri;font-size:13px;color:#757575;font-weight:normal"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="max-width:546px">
                  <tbody><tr>
                    <td><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                        <tbody><tr>
                          <td align="left" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tbody><tr>
                                <td style="font-family:Calibri;font-size:13px;font-weight:normal;color:#5d5d5d">&nbsp;</td>
                              </tr>
                              <tr>
                                <td style="font-family:Calibri;font-size:13px;font-weight:normal;color:#5d5d5d"><table border="0" align="left" cellpadding="0" cellspacing="0">
                                                                                                            <tbody><tr>
                                      <td style="font-family:Calibri;font-size:13px;font-weight:normal;color:#5d5d5d">
									  <strong style="font-size:16px;color:148F20">Dear
                                         '.$name.'</strong>
                                        <p>'.$lineFirst.'</p>
                                        <p>'.$lineSecond.'</p>
                                        </td>
                                    </tr>
                                  </tbody></table>
                               
                                  <p>&nbsp;</p></td>
                              </tr>
                     
                              
                            </tbody></table></td>
                        </tr>
						<tr>
                          <td height="10" bgcolor=""></td>
                        </tr>
						<tr>
                          <td height="10" bgcolor=""></td>
                        </tr>
						<tr>
                          <td height="10" bgcolor=""></td>
                        </tr>
                        <tr>';
						if(!empty($otherInfo)){ 
            
               $mess.='<td>
                        <table style="width:500px;background-color:#fff;border-width:1px;border-color:148F20;border-top-color:#D63334;border-style:solid;border-top-width:2px" align="center">
                            <tbody>';
                         foreach($otherInfo as $otherInfoKey=>$otherInfoVal){
						
                                $mess.='<tr>
                                    <td colspan="4" style="font-size:9px;font-family:Arial,Helvetica,sans-serif;color:#a7a7a7;border-top:1px solid #d1d1d1;padding:15px 20px">
                                        '.$otherInfoKey.' : <span style="font-size:13px;color:#6b6a6b">'.$otherInfoVal.'</span>
                                    </td>
                                </tr>';
						 }
                               
                            
$mess.='</tbody>
                        </table>
                    </td>
						';
						}
						$mess.='
                        </tr>
                        <tr>
                          <td height="10" bgcolor=""></td>
                        </tr>
                        <tr>
                          <td height="10" bgcolor=""></td>
                        </tr>
                        <tr>
                          <td height="10" bgcolor=""></td>
                        </tr>
                        <tr>
                          <td height="80" style="font-family:Calibri;font-size:12px;color:#636363;font-weight:normal"><table border="0" cellspacing="0" cellpadding="2">
                              <tbody><tr>
                
                                <td width="10" align="left" valign="middle"><img src="https://ci5.googleusercontent.com/proxy/fzhvHwc8ASux486KyuY-bhuq3ayvh0nf9oIfszYE529N0rJ3CvqFiV7VUxpck_9ooKna0nfNJkBUjMVLlXK4-al-FA=s0-d-e1-ft#http://i2.sdlcdn.com/img/eventImage/10/vr.jpg" width="1" height="35" alt="" class="CToWUd"></td>
                                <td valign="top"><table border="0" cellspacing="0" cellpadding="0">
                                    <tbody><tr>
                                      <td align="left" style="padding:4px;font-size:11px">STAY CONNECTED</td>
                                    </tr>
                                    <tr>
                                      <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                                          <tbody><tr>
<td>
<a href="https://www.facebook.com/tractorjunction/" target="_blank" >
<img src="'.$root.'images/mailimages/facebook.jpg" width="23" height="21" alt="facebook" class="CToWUd"></a>
</td><td>
<a href="https://plus.google.com/u/0/111375983648287404977?hl=en" target="_blank" >
<img src="'.$root.'images/mailimages/google_plus.jpg" width="23" height="21" alt="google" class="CToWUd"></a>
</td><td>
<a href="https://twitter.com/tractorjunction" target="_blank" >
<img src="'.$root.'images/mailimages/twitter.jpg" width="23" height="21" alt="twitter" class="CToWUd"></a>
</td>
                                       </tr>
                                        </tbody></table></td>
                                    </tr>
                                    <tr></tr>
                                  </tbody></table></td>
                              </tr>
                            </tbody></table></td>
                        </tr>
                      </tbody></table></td>
                  </tr>
                </tbody></table></td>
            </tr>
              <tr>
              <td>&nbsp;</td>
            </tr>
            </tbody></table></td>
        </tr>
        </tbody></table>
</td></tr></tbody></table></div><div class="yj6qo"></div><div class="adL">


</div></div></div>';

	return $mess;
}

function MailSentNow($message,$subject,$to){	
	$ci =& get_instance();
	$config['charset'] = 'utf-8';
	$config['wordwrap'] = TRUE;
	$config['mailtype'] = 'html';
	$ci->load->library('email');
	$ci->email->initialize($config);
	$ci->email->from('no-replay@tractorjunction.com', 'TractorJunction');
	$ci->email->to($to);
	$ci->email->reply_to('rajat_gupta57@yahoo.com');
	$ci->email->subject($subject);
	$ci->email->message($message);
	$ci->email->send();

}

function smsSent($mobile,$txtmsg){

	$txtmsg=rawurlencode($txtmsg);
	// $url="http://sms.bulksmsserviceproviders.com/api/send_http.php?authkey=f5622449c000bb7a989da632b34a8e2b&mobiles=".$mobile."&message=$txtmsg&sender=tctrjn&route=B";
 // $url="http://bulksms.tekhook.in/app/smsapi/index.php?key=4593E7C6A7F3C5&routeid=316&type=text&contacts=".$mobile."&senderid=TCTRJN&msg=".$txtmsg."";
$url="http://bulksms.tekhook.in/app/smsapi/index.php?key=4593E7C6A7F3C5&routeid=2&type=text&contacts=".$mobile."&senderid=TCTRJN&msg=".$txtmsg."";
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_exec($ch);
	curl_close($ch);	
}
function Select_OrderBy_brand($field,$table,$condition,$orderby,$ordercolum){
	$ci =& get_instance();
	$ci->load->database();
	$ci->db->select($field);
	$ci->db->from($table);
	$ci->db->order_by($orderby, $ordercolum);
	if($condition != ''){
	$ci->db->where($condition);
	}
	$query = $ci->db->get();
	return $query->result();
}

function quickLinksHTML(){
	$root = "http://".$_SERVER['HTTP_HOST'];
	$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
	?>
	<div class="container">
		<div class="col-md-12 col-sm-12" style="margin-top:15px">
			<h4 style="color:#148f1a;font-size: 20px;margin-bottom: -18px;" class="font-upcoming">Quick  <span style="color:#cc0001;">links</span> </h4>
			<div class="border">
				<div class="border-inner"></div>
			</div>
			<div class="col-md-2 col-sm-6 quick">
				<a href="<?php echo $root; ?>tractors"><button class="har_but" style="padding:5px">Tractor </button></a>
			</div>
			<div class="col-md-2 col-sm-6 quick">
				<a href="<?php echo $root; ?>compare-tractors"><button class="har_but" style="padding:5px"> Compare</button></a>
			</div>
			<div class="col-md-2 col-sm-2 quick">
				<a href="<?php echo $root; ?>tractor-combine-harvesters">	<button class="har_but" style="padding:5px">  Harvester</button></a>
			</div>
			<div class="col-md-2 col-sm-2 quick">
				<a href="<?php echo $root; ?>used-tractors-for-sell">	<button class="har_but" style="padding:5px"> Used tractors</button></a>
			</div>
			<div class="col-md-2 col-sm-2 quick">
				<a href="<?php echo $root; ?>used-tractors-for-rent">	<button class="har_but" style="padding:5px"> Rent tractors</button></a>
			</div>
			<div class="col-md-2 col-sm-2 quick">
				<a href="<?php echo $root; ?>tractor-dealership-enquiry">	<button class="har_but" style="padding:5px"> Dealership </button></a>
			</div>
			<div class="col-md-2 col-sm-6 quick">
				<a href="<?php echo $root; ?>find-tractor-dealers"><button class="har_but" style="padding:5px"> Find Dealer </button></a>
			</div>
			<div class="col-md-2 col-sm-6 quick">
				<a href="<?php echo $root; ?>tractor-news"><button class="har_but" style="padding:5px"> News & Update </button></a>
			</div>
			<div class="col-md-2 col-sm-6 quick">
				<a href="<?php echo $root; ?>tractor-finance"><button class="har_but" style="padding:5px"> Finance </button></a>
			</div>
			<div class="col-md-2 col-sm-6 quick">
				<a href="<?php echo $root; ?>tractor-insurance"><button class="har_but" style="padding:5px"> Insurance </button></a>
			</div>
			<div class="col-md-2 col-sm-6 quick">
				<a href="<?php echo $root; ?>tractor-customer-care"><button class="har_but" style="padding:5px"> Customer Care </button></a>
			</div>
			<div class="col-md-2 col-sm-6 quick">
				<a href="<?php echo $root; ?>tractor-service-centers"><button class="har_but" style="padding:5px"> Service Centers </button></a>
			</div>
		</div>
	</div>
	<?php 
}

function NewsHtmlDiv($result,$totalval,$funName,$resultID){
	$root = "http://".$_SERVER['HTTP_HOST'];
	$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
	?>
	<?php
		if(!empty($result)){
	?>
	<div id="<?php echo $resultID; ?>">
		<?php 
			foreach($result as $row => $obj){
		?>
		<div class="col-md-12 col-sm-12 col-xs-12 font_a mar_news"style="border:1px solid #eee;padding:10px;">
			<div class="col-md-4 col-sm-4 col-xs-12 font_a ipm ">
				<?php if($obj->image != "" && file_exists("./images/news/".$obj->image)){ ?>
				<img src="<?php echo $root?>images/news/<?php echo $obj->image; ?>" style="height:150px;width:100%"/>
				<?php } else { ?>
				<img src="<?php echo $root; ?>images/tractor_default_image.jpg"  style="height:150px;width:100%" alt="No image found" >
				<?php } ?>
			</div>
			<div class="col-md-8 col-sm-8 col-xs-12 ipm font_a NewsDescription" style="text-align:justify;line-height:22px">
				<h4 class="font_a NwtsTitle">
				<a style="color:rgb(219,76,77); text-decoration: underline;" href="<?php echo $root; ?>tractor-news/<?php echo newslugend($obj->title); ?>/<?php echo ($obj->id); ?>"><?php echo ($obj->title); ?></a></h4>
				<p>
					<?php 
						if(strlen($obj->description)>330){
						echo substr((strip_tags($obj->description)),0,330)."...";
						}else{
						echo (strip_tags($obj->description));
						}
					?>
				</p>
				<a href="<?php echo $root; ?>tractor-news/<?php echo newslugend($obj->title); ?>/<?php echo ($obj->id); ?>">Read More</a>
			</div>
		</div>
		<?php 
		}
		?>
		<?php 
		$lastval=count($result);
		if($totalval > $lastval){
		?>
		<h5 style="text-align:center;margin-top:40px;">
			<a class="view_more" id="viewMoreId" onclick="<?php echo $funName; ?>();"><br>View more <i class="fa fa-refresh"></i></a>
			<img src="<?php echo $root;?>images/view_moreLoder.gif" style="width: 12%;bottom: 207px;right: 44%;display:none;margin:auto; " id="ImageViewMore">
		</h5>
		<?php 
		}
		?>
	</div>
	<?php 
	}
	else{
	?>
		<h4 style="color:#DB4C4D;text-align:center;">No news found</h4>
	<?php 
	}
	?>
	<?php 
}

function footeradd(){
		$root = "http://".$_SERVER['HTTP_HOST'];
	$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

	if (strpos($actual_link, '/product/') !== false) {
	}
	elseif (strpos($actual_link, '/on-road-price') !== false) {
	}else{

	?>
	<div class="container">
    <div class="col-sm-12 col-xs-12 adsDiv">
        <p class="advertisementLabel">Advertisement</p>

    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-4027828216747405" data-ad-slot="4740348772" data-ad-format="auto"></ins>
	<script>
	(adsbygoogle = window.adsbygoogle || []).push({});
	</script>
    </div>
    </div>

	<?php
	}
}

function searchAdd(){
	?>
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<ins class="adsbygoogle" style="display:inline-block;width:255px;height:600px"data-ad-client="ca-pub-4027828216747405"data-ad-slot="6356682772"></ins>
<script>
	(adsbygoogle = window.adsbygoogle || []).push({});
</script>
	<?php
}
function homeFront(){
	?>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Ads7 -->
<ins class="adsbygoogle" style="display:inline-block;width:299px;height:350px"data-ad-client="ca-pub-4027828216747405"data-ad-slot="7335718378"></ins>
<script>
	(adsbygoogle = window.adsbygoogle || []).push({});
</script>
	<?php 
}
function newsFront(){
	?>
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<ins class="adsbygoogle" style="display:inline-block;width:360px;height:246px"data-ad-client="ca-pub-4027828216747405"data-ad-slot="7833415977"></ins>
	<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
	</script>
	<?php 
}

function AdsUpprHome(){
?>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle" style="display:inline-block;width:300px;height:70px"data-ad-client="ca-pub-4027828216747405"data-ad-slot="8243715171"></ins>
<script>
	(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<?php 
}

function MetaTags($REQUEST_URI){
	
	?>
	<meta name="web-author" content="Tractor Junction" /> 
<meta name="googlebot" content="all"> 
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-control" content="no-cache">
<meta http-equiv="Expires" content="0">
<meta name="robots" content="index, follow" /> 
<meta name="revisit-after" content="3 days"> 
<meta name="copyright" content="Tractor Junction"> 
<meta name="language" content="English"> 
<meta name="reply-to" content="contact@tractorjunction.com"> 
<meta name="distribution" content="Global" /> 
<meta name="rating" content="General" /> 
<meta name="google-site-verification" content="BfVUKkyPGEt4xrv4HzPeOMkHh42ZHiq80aeN15sPUDU" /> 
<meta name="google-site-verification" content="BfVUKkyPGEt4xrv4HzPeOMkHh42ZHiq80aeN15sPUDU" /> 
<link rel="canonical" href="<?php echo "http://www.tractorjunction.com".$REQUEST_URI; ?>" />
<meta property="og:locale" content="en_US" /> 
<meta property="og:type" content="website" /> 
<meta property="og:url" content="<?php echo "http://www.tractorjunction.com".$REQUEST_URI; ?>" /> 
<meta property="og:site_name" content="Tractor Junction " /> 
<meta property="og:image" content="" />
<meta name="twitter:card" content="summary" /> 
<meta name="twitter:url" content="<?php echo "http://www.tractorjunction.com".$REQUEST_URI; ?>" /> 
<meta name="twitter:site" content="@tractorjunction" /> 
<meta name="twitter:creator" content="@tractorjunction" /> 
<meta name="twitter:image" content=""/>
 
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-77053076-1', 'auto');
ga('send', 'pageview');
</script>

	<?php 
}
