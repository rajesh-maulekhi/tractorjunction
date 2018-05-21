<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function OrderBy_Query($field,$table,$whr_col,$whr_condiition,$condition){
	$ci =& get_instance();
	$ci->load->database();
	$ci->db->select($field);
	$ci->db->from($table);
		if($whr_col !=''){
		$ci->db->order_by($whr_col, $whr_condiition);
	}
	if($condition !=''){
		$ci->db->where($condition);
	}

	$query = $ci->db->get();
	return $query->result();
}
function Pagination_query_selectedmessy($field_name,$table_name,$per_page,$page_name,$condition){
	$root = "http://".$_SERVER['HTTP_HOST'];
	$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
	$ci =& get_instance();
	$ci->load->database();
	$ci->load->library('session');
	$ci->load->helper('query');
	$ci->load->helper('form');
	$ci->load->helper('url');
	$ci->load->library("pagination");	
	$ci->load->model("Front_model");
	$config = array();
	$config["base_url"] = $root . $page_name;
	$config["total_rows"] = count(select_th('id',$table_name,$condition));
	$result["total_rows"] = count(select_th('id',$table_name,$condition));
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
	$result['result']=$ci->Front_model->show_pagination_filter_selectedmessy($field_name,$config["per_page"], $page,$table_name,$condition);
	$result["links"] = $ci->pagination->create_links();
	return $result;
}
function shweta_select_th_distinct($field,$table,$whr){
$ci =& get_instance();
$ci->load->database();
$ci->db->distinct();
$ci->db->select($field);
if($whr !=""){
$ci->db->where($whr);
}
 $query =$ci->db->get($table);
return $query->result();

}

function newslug_end($slug){

	$slug=str_replace("&","and",$slug);
	$text = preg_replace('~[^\\pL\d]+~u', '_', $slug);
	$text = trim($text, '_');  // trim
	$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);  // transliterate
	$text = strtolower($text);  // lowercase
	$text = preg_replace('~[^-\w]+~', '', $text);  // remove unwanted characters
	$text=str_replace("_","-",$text);
	return $slug=$text;
	
}
function SelectQuery($field,$table,$whr_col,$whr_condiition){
	$ci =& get_instance();
	$ci->load->database();
	$ci->db->select($field);
	$ci->db->from($table);
	if($whr_col !=''){
		$ci->db->where($whr_col,$whr_condiition);
	}
	$query = $ci->db->get();
	return $query->result();
}
function SelectQuery_th($field,$table,$whr_condition){
	$ci =& get_instance();
	$ci->load->database();
	$ci->db->select($field);
	$ci->db->from($table);
	if($whr_condition !=''){
		$ci->db->where($whr_condition);
	}
	$query = $ci->db->get();
	return $query->result();
}
function select_th($field,$table,$whr){
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
function order_by_limit_new($field,$table,$condition,$limit, $start,$whr_col, $whr_condiition){
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
function Pagination_query_selected($field_name,$table_name,$per_page,$page_name,$condition){
	$root = "http://".$_SERVER['HTTP_HOST'];
	$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
	$ci =& get_instance();
	$ci->load->database();
	$ci->load->library('session');
	$ci->load->helper('query');
	$ci->load->helper('form');
	$ci->load->helper('url');
	$ci->load->library("pagination");	
	$ci->load->model("Front_model");
	$config = array();
	$config["base_url"] = $root . $page_name;
	$config["total_rows"] = count(select_th('id',$table_name,$condition));
	$result["total_rows"] = count(select_th('id',$table_name,$condition));
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
	$result['result']=$ci->Front_model->show_pagination_filter_selected($field_name,$config["per_page"], $page,$table_name,$condition);
	$result["links"] = $ci->pagination->create_links();
	return $result;
}
function Pagination_query($table_name,$per_page,$page_name,$condition){
	$root = "http://".$_SERVER['HTTP_HOST'];
	$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
	$ci =& get_instance();
	$ci->load->database();
	$ci->load->library('session');
	$ci->load->helper('query');
	$ci->load->helper('form');
	$ci->load->helper('url');
	$ci->load->library("pagination");	
	$ci->load->model("Front_model");
	$config = array();
	$config["base_url"] = $root . $page_name;
	$config["total_rows"] = count(select_th('id',$table_name,$condition));
	$result["total_rows"] = count(select_th('id',$table_name,$condition));
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
	$result['result']=$ci->Front_model->show_pagination_filter($config["per_page"], $page,$table_name,$condition);
	$result["links"] = $ci->pagination->create_links();
	return $result;
}
function TractorShowHTML($tractor_result,$page_type){
// echo "aa";
// die;
$root = "http://".$_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
	if(!empty($tractor_result)){
		$sno=0;
			$BrandName='Tractor Brand';$HP='';
		foreach($tractor_result as $key=>$value){
foreach(SelectQuery('name','brand','id',$value->brand) as $ke=>$val) $BrandName= ($val->name) ;
foreach(SelectQuery('name','hp','id',$value->hp) as $ke=>$val) $HP= ($val->name) ;
	?>
            <div class="co-md-3 col-sm-3  prod-div max_mar" style="height:346px;border-bottom:2px solid #DD4445">

                <a class="onlyUnderlImneAtag" href="<?php echo $root; ?>product/<?php echo $value->id; ?>/<?php echo newslugend($BrandName)."-tractor"; ?>-<?php echo shweta_nameslug($value->model_name); ?>">
                    <span class="WDClass">
                        <?php
                        if($value->wheel_drive == "2") {
                            echo "2WD";
                        }elseif($value->wheel_drive == "4") {
                            echo "4WD";
                        }else{
							   echo "2WD";
						}
                        ?>

                    </span>

                <img onerror="imgError(this);" src="<?php echo $root; ?>upload/<?php echo $value->image; ?>" class="popularTrator" alt="<?php echo $BrandName; ?> <?php echo $value->model_name; ?> tractor">
                </a>
                <a class="onlyUnderlImneAtag" href="<?php echo $root; ?>product/<?php echo $value->id; ?>/<?php echo newslugend($BrandName)."-tractor"; ?>-<?php echo shweta_nameslug($value->model_name); ?>">
                    <h5 style="text-align:center;color:#D63334;text-transform: uppercase;">
                        <b>
                            <?php echo $BrandName; ?>			</b>
                        <span style="color:#148F1A">	<?php echo $value->model_name; ?></span></h5>
                </a>
                <ul style="font-size:12px;line-height:20px">
                    <li class="colo">
                        <?php echo $HP; ?> HP			Diesel Engine
                    </li>



                    <li class="colo">
                        <?php echo $value->cylinder; ?>			Cylinder <?php 
						if($value->capacity !='')
						echo ", ".$value->capacity." CC Engine";

					?>  </li>


                    <?php if($value->transmission_clutch !="") { ?>
                        <li class="colo">
                            <?php echo $value->transmission_clutch; ?>
                            Diaphragm Type Clutch
                        </li>
                    <?php } ?>
		 <?php if ($value->priceShow != "0" && $value->price !="") { ?>
			<li class="colo"> Price : &nbsp;<i class="fa fa-inr"></i>
			<?php echo $value->price; ?>  Lac*
			</li>
			 <?php }  ?>
                </ul>
                <a style="background: #DD4445;
color: white;
padding: 5px 10px;position: absolute;
right: 0;
bottom: 17px;
float: right;" href="<?php echo $root; ?>compare-results/<?php echo $value->id; ?>/<?php echo $value->brand; ?>/<?php echo $BrandName; ?>-<?php echo $value->model_name; ?>">
                    <i class="fa fa-balance-scale" style="font-size:12px;padding-right:3px"></i>
                    Compare</a>
            </div>

<?php 
$mahindra_ad_show=MahindraAd();
if($page_type == 'brand' && $mahindra_ad_show=='1'){

if($sno ==2){ ?>
<div class="co-md-3 col-sm-3  prod-div max_mar singleAdv" style="height:346px;border-bottom:2px solid #DD4445">
<?php 
if($value->brand== '63' ||$value->brand== '65' ||$value->brand== '66' ||$value->brand== '71'){

?>

<a target="_blank" href="<?php echo MahindraAdLink('55','mahindra-tractors','search_tractors'); ?>">
	<img style="margin-top: 33px;" class="img-responsive" src="<?php echo $root; ?>web_root/mahindra/Brands_2_Desktop.gif" alt="Mahindra Tractor | Tractorjunction" title="Mahindra Tractor | Tractorjunction">
</a>
<?php 
}else if($value->brand== '74'){

?>

<a target="_blank" href="http://yehmasseyhai.com">
	<img style="" class="img-responsive" src="<?php echo $root; ?>web_root/mahindra/messy_ad_1.gif" alt="Mahindra Tractor | Tractorjunction" title="Massey Tractor | Tractorjunction">
</a>
<?php 
}else{
?>

<a target="_blank" href="<?php echo MahindraAdLink('55','mahindra-tractors','search_tractors'); ?>">
	<img style="margin-top: 0px;    float: right;" class="img-responsive" src="<?php echo $root; ?>web_root/mahindra/Brands_1_Desktop.gif" alt="Mahindra Tractor | Tractorjunction" title="Mahindra Tractor | Tractorjunction">
</a>
<?php 
}
?>			
</div>
<?php }}
?>
<?php 
$mahindra_ad_show=MahindraAd();
if($page_type == 'new_tractor' && $mahindra_ad_show=='1'){
if($sno ==2){ ?>
<div class="co-md-3 col-sm-3  prod-div max_mar singleAdv" style="height:346px;border-bottom:2px solid #DD4445">

<a target="_blank" href="<?php echo MahindraAdLink('55','mahindra-tractors','search_tractors'); ?>">
	<img style="margin-top: 33px;" class="img-responsive" src="<?php echo $root; ?>web_root/mahindra/search_trac_des.gif" alt="Mahindra Tractor | Tractorjunction" title="Mahindra Tractor | Tractorjunction">
</a>
			
</div>
<?php }}
?>

<?php 
 $sno++;
}
}else{
	?><h3 class="NoResultFound">No Result Found</h3><?php }
}

function POPLatUpHTMLHOme($populorTractor,$jhon_dheer_value_image_D){

	?>

<div class="col-md-12 col-sm-12 col-xs-12 paddingZ">
	<?php 
	$root = "http://".$_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
	foreach ($populorTractor as $key => $value) {
			$BrandName='Tractor Brand';$HP='';
foreach(SelectQuery('name','brand','id',$value->brand) as $ke=>$val) $BrandName= ucwords($val->name) ;
foreach(SelectQuery('name','hp','id',$value->hp) as $ke=>$val) $HP= ($val->name) ;

	?>
<div class="co-md-3 col-sm-3  prod-div max_mar popLurTr">
	<img onerror="imgError(this);" src="<?php echo $root; ?>upload/<?php echo $value->image; ?>" class="popularTrator" alt="<?php echo $BrandName ?> <?php echo $value->model_name; ?> tractor">
	<a class="onlyUnderlImneAtag" href="<?php echo $root; ?>product/<?php echo $value->id; ?>/<?php echo newslugend($BrandName)."-tractor"; ?>-<?php echo shweta_nameslug($value->model_name); ?>">
	<h5 style="text-align:center;color:#D63334;">
	<b>
	<?php echo ucfirst($BrandName); ?>			</b>
	<span style="color:#148F1A">	<?php echo ucfirst($value->model_name); ?></span></h5>
	</a>
	<ul style="font-size:12px;line-height:20px">
	<?php if($value->hp !="") { ?>
			<li class="colo"> 
			<?php echo $HP." HP"; ?>
			Diesel Engine 
			</li>
			<?php } ?>



	<?php if($value->cylinder !="") { ?>
			<li class="colo"> 
			<?php echo $value->cylinder; ?>
			Cylinder, <?php echo $value->capacity." CC"; ?> Engine </li>
			<?php } ?>

			<?php if($value->transmission_clutch !="") { ?>
			<li class="colo"> 
			<?php echo $value->transmission_clutch; ?> 
			Diaphragm Type Clutch 
			</li>
			<?php } ?>
			 <?php if ($value->priceShow != "0" && $value->price!='') { ?>
			<li class="colo"> Price : &nbsp;<i class="fa fa-inr"></i>
			<?php echo $value->price; ?>  Lac*
			</li>
			 <?php }  ?>
	</ul>
	</div>	

	<?php 
}
?>

<div class="co-md-3 col-sm-3  prod-div max_mar popLurTr Jhon_dheerDesk">
<a href="<?php echo $root; ?>search-tractor/59/john-deere" target="_blank">
<img src="<?php echo $root; ?>web_root/jhon_dheer/<?php echo $jhon_dheer_value_image_D; ?>.png" alt="jhon dheer tractor" class="img-responsive">
</a>
	</div>

</div><?php 
}
function POPLatUpHTML($populorTractor){

	?>

<div class="col-md-12 col-sm-12 col-xs-12 paddingZ">
	<?php 
	$root = "http://".$_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
	foreach ($populorTractor as $key => $value) {
			$BrandName='Tractor Brand';$HP='';
foreach(SelectQuery('name','brand','id',$value->brand) as $ke=>$val) $BrandName= ucwords($val->name) ;
foreach(SelectQuery('name','hp','id',$value->hp) as $ke=>$val) $HP= ($val->name) ;

	?>
<div class="co-md-3 col-sm-3  prod-div max_mar popLurTr">
	<img onerror="imgError(this);" src="<?php echo $root; ?>upload/<?php echo $value->image; ?>" class="popularTrator" alt="<?php echo $BrandName ?> <?php echo $value->model_name; ?> tractor">
	<a class="onlyUnderlImneAtag" href="<?php echo $root; ?>product/<?php echo $value->id; ?>/<?php echo newslugend($BrandName)."-tractor"; ?>-<?php echo shweta_nameslug($value->model_name); ?>">
	<h5 style="text-align:center;color:#D63334;">
	<b>
	<?php echo ucfirst($BrandName); ?>			</b>
	<span style="color:#148F1A">	<?php echo ucfirst($value->model_name); ?></span></h5>
	</a>
	<ul style="font-size:12px;line-height:20px">
	<?php if($value->hp !="") { ?>
			<li class="colo"> 
			<?php echo $HP." HP"; ?>
			Diesel Engine 
			</li>
			<?php } ?>



	<?php if($value->cylinder !="") { ?>
			<li class="colo"> 
			<?php echo $value->cylinder; ?>
			Cylinder, <?php echo $value->capacity." CC"; ?> Engine </li>
			<?php } ?>

			<?php if($value->transmission_clutch !="") { ?>
			<li class="colo"> 
			<?php echo $value->transmission_clutch; ?> 
			Diaphragm Type Clutch 
			</li>
			<?php } ?>
	</ul>
	</div>	

	<?php 
}
?></div><?php 
}
function OnRoadModel($brand_name,$model_name,$req_type,$brandId,$id_tractor,$req_type_model,$model_id_ht){
	
?>
<div class="modal fade" id="<?php echo $model_id_ht; ?>" role="dialog">
<div class="modal-dialog model_roadprice" style="width: 50%;margin-top:150px;">
<!-- Modal content-->
<div class="modal-content ">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title"><i class="fa fa-road" style="margin-right:5px;"></i><?php echo $req_type; ?></h4>
</div>
<div class="modal-footer">
<div class="modal-body ">
<div class="col-sm-12 col-md-12" style="padding:15px;">
<p class="text-center font_a" style="font-size: 15px;color: rgb(30, 81, 32);">To get the <?php echo $req_type; ?> of 
<br>
<p style="text-align: center;
color: #DB4C4D;
font-size: 23px;">
<?php echo $brand_name;
?>
 <?php echo $model_name;?>.</p> 

<p class="font_fd" style="color: #ad9d9d;
font-size: 24px;
text-align: center;">If you  want to continue with your request?<br> Please enter your Mobile No.</p>

<div class="col-md-12 col-xs-12 col-sm-12" style="padding: 10px 0px;">
<center>
<?php echo form_open('Search/OnRoadRequest_submit'); ?>
<input type="hidden" value="<?php echo $brandId; ?>" name="brand_id">
<input type="hidden" value="<?php echo $req_type_model; ?>" name="req_type">
<input type="hidden" value="<?php echo $model_name; ?>" name="model_name">
<input type="hidden" value="<?php echo $id_tractor; ?>" name="id_tractor">
<input type="hidden" value="<?php echo $brand_name; ?>" name="brand_name">
<input style="border: 1px solid #DB4C4D;
padding: 6px 27px;" type="text" maxlength="10" pattern="[6789][0-9]{9}" required="required" onkeypress="return isNumberKey(event)" placeholder=" Enter your contact No" name="mobile_no_req" id="OnRoadMobile" maxlength="10" minlength="10" onkeypress="return isNumberKey(event);"></center>
</div>
<button type="submit" style="float: none;"class="btn btn-info btn-lg singleP_compare" >Yes
</button>
<button type="button" style="float: none;" class="btn btn-info btn-lg singleP_compare" data-dismiss="modal">No</button>
<?php echo form_close(); ?>
</div>
</div>
</div>
</div>
</div>
</div>
	<?php 
}
function OnRoadModelHarverster($model_id_ht,$req_type,$brand_name,$model_name,$id_model,$actual_link){
	
?>
<div class="modal fade" id="<?php echo $model_id_ht; ?>" role="dialog">
<div class="modal-dialog model_roadprice" style="width: 50%;margin-top:150px;">
<!-- Modal content-->
<div class="modal-content ">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title"><i class="fa fa-road" style="margin-right:5px;"></i>On Road Price <?php echo $brand_name;
?>
 <?php echo $model_name;?></h4>
</div>
<div class="modal-footer">
<div class="modal-body ">
<div class="col-sm-12 col-md-12" style="padding:15px;">
<p class="text-center font_a" style="font-size: 15px;color: rgb(30, 81, 32);">To get the <?php echo $req_type; ?> of 
<br>
<p style="text-align: center;
color: #DB4C4D;
font-size: 23px;">
<?php echo $brand_name;
?>
 <?php echo $model_name;?>.</p> 

<p class="font_fd" style="color: #ad9d9d;
font-size: 24px;
text-align: center;">If you  want to continue with your request?<br> Please enter your Mobile No.</p>

<div class="col-md-12 col-xs-12 col-sm-12" style="padding: 10px 0px;">
<center>
<?php echo form_open('Search/OnRoadRequest_submitHarvester'); ?>
<input type="hidden" value="<?php echo $id_model; ?>" name="implement_id">
<input type="hidden" value="<?php echo $model_id_ht; ?>" name="request_for">
<input type="hidden" value="<?php echo $req_type; ?>" name="req_type">
<input type="hidden" value="<?php echo $actual_link; ?>" name="actual_link">
<input style="border: 1px solid #DB4C4D;
padding: 6px 27px;" type="text" maxlength="10" pattern="[789][0-9]{9}" required="required" onkeypress="return isNumberKey(event)" placeholder=" Enter your contact No" name="mobile_no_req" id="OnRoadMobile" maxlength="10" minlength="10" onkeypress="return isNumberKey(event);"></center>
</div>
<button type="submit" style="float: none;"class="btn btn-info btn-lg singleP_compare" >Yes
</button>
<button type="button" style="float: none;" class="btn btn-info btn-lg singleP_compare" data-dismiss="modal">No</button>
<?php echo form_close(); ?>
</div>
</div>
</div>
</div>
</div>
</div>
	<?php 
}
function Compare_spcTab($result_first,$result_second,$result_third){
	if(!empty($result_first)){
		foreach($result_first as $key1=>$first){}
	}if(!empty($result_second)){
		foreach($result_second as $key2=>$second){}
	}if(!empty($result_third)){
		foreach($result_third as $key3=>$third){}
	}
	?>
								<div class="col-sm-12 col-md-12 col-xs-12" style="padding:0px;border:1px solid #ddd;">
								<button type="button" class="btn btn-info compare_head " data-toggle="collapse" data-target="#engine">Engine</button>
								<div id="engine" class="collapse in">
									<table class="table table-striped" style="border-top: 3px solid #DD4445;">
										<tbody>
											<tr>
												<th class="widthH">No. Of Cylinder</th>
												<?php if(!empty($result_first)) { ?>
												<td class="widthH">
													<?php
														if($first->cylinder !="")
														echo $first->cylinder;
														else
														echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_second)) { ?>
												<td class="widthH">
													<?php
														if($second->cylinder !="")
														echo $second->cylinder;
														else
														echo "Not filled" ; 
													?>
												</td>
												<?php 
													}
												?>
												<?php if(!empty($result_third)) { ?>
												<td class="widthH">
													<?php
													if($third->cylinder !="")
													echo $third->cylinder;
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>

										
											</tr>
											<tr>
												<th>HP Category</th>
												<?php if(!empty($result_first)) { ?>
												<td class="widthH">
													<?php 
													if($first->hp !="")
													foreach(shweta_select('name','hp','id',$first->hp) as $raa) echo ucfirst($raa->name." HP") ;
													else
													echo "Not Filled";
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_second)) { ?>
												<td class="widthH">
													<?php 
													if($second->hp !="")
													foreach(shweta_select('name','hp','id',$second->hp) as $raa) echo ucfirst($raa->name." HP") ;
													else
													echo "Not Filled";
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_third)) { ?>
												<td class="widthH">
													<?php 
													if($third->hp !="")
													foreach(shweta_select('name','hp','id',$third->hp) as $raa) echo ucfirst($raa->name." HP") ;
													else
													echo "Not Filled";
													?>
												</td>
												<?php 
												}
												?>
	
											</tr>
											<tr>
												<th>Capacity CC</th>
												<?php if(!empty($result_first)) { ?>
												<td class="widthH">
													<?php
													if($first->capacity !="")
													echo $first->capacity." CC";
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_second)) { ?>
												<td class="widthH">
													<?php
														if($second->capacity !="")
														echo $second->capacity." CC";
														else
														echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_third)) { ?>
												<td class="widthH">
													<?php
													if($third->capacity !="")
													echo $third->capacity." CC";
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>

											</tr>  
											<tr>
												<th>Engine Rated RPM</th>
	<?php if(!empty($result_first)) { ?>
																						<td class="widthH">
													<?php
													if($first->engine_rated_rpm !="")
													echo $first->engine_rated_rpm;
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_second)) { ?>
												<td class="widthH">
													<?php
													if($second->engine_rated_rpm !="")
													echo $second->engine_rated_rpm;
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_third)) { ?>
												<td class="widthH">
													<?php
													if($third->engine_rated_rpm !="")
													echo $third->engine_rated_rpm;
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
											
											</tr>   
											<tr>
												<th>Cooling</th>
												<?php if(!empty($result_first)) { ?>
												<td class="widthH">
													<?php
													if($first->cooling	 !="")
													echo $first->cooling;
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_second)) { ?>
												<td class="widthH">
													<?php
													if($second->cooling !="")
													echo $second->cooling;
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_third)) { ?>
												<td class="widthH">
													<?php
													if($third->cooling !="")
													echo $third->cooling;
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
											
											</tr> 
											<tr>
												<th>Air Filter</th>
												<?php if(!empty($result_first)) { ?>
												<td class="widthH">
													<?php
													if($first->engine_air_filter !="")
													echo $first->engine_air_filter;
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_second)) { ?>
												<td class="widthH">
													<?php
													if($second->engine_air_filter !="")
													echo $second->engine_air_filter;
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_third)) { ?>
												<td class="widthH">
													<?php
													if($third->engine_air_filter !="")
													echo $third->engine_air_filter;
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
											
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="col-sm-12 col-md-12 col-xs-12" style="padding:0px;border:1px solid #ddd;margin-top:5px">
								<button type="button" class="btn btn-info compare_head " data-toggle="collapse" data-target="#trans">Transmission</button>
								<div id="trans" class="collapse in">
									<table class="table table-striped" style="border-top: 3px solid #DD4445;">
									<tbody>
									<tr>
									<th class="widthH">Transmission type</th>
									<?php if(!empty($result_first)) { ?>
											
									<td class="widthH">
									<?php
									if($first->transmission_type !="")
									echo $first->transmission_type;
									else
									echo "Not filled" ; 
									?>
									</td>
									<?php 
									}
									?>	
									<?php if(!empty($result_second)) { ?>
											
									<td class="widthH">
									<?php
									if($second->transmission_type !="")
									echo $second->transmission_type;
									else
									echo "Not filled" ; 
									?>
									</td>
									<?php 
									}
									?>
										<?php if(!empty($result_third)) { ?>
											<td class="widthH">
									<?php
									if($third->transmission_type !="")
									echo $third->transmission_type;
									else
									echo "Not filled" ; 
									?>
									</td>
									<?php 
									}
									?>
									</tr>
									<tr>
									<th class="widthH">Clutch</th>
									<?php if(!empty($result_first)) { ?>
												<td class="widthH">
									<?php
									if($first->transmission_clutch !="")
									echo $first->transmission_clutch;
									else
									echo "Not filled" ; 
									?>
									</td>
									<?php 
									}
									?>
									<?php if(!empty($result_second)) { ?>
												<td class="widthH">
									<?php
									if($second->transmission_clutch !="")
									echo $second->transmission_clutch;
									else
									echo "Not filled" ; 
									?>
									</td>
									<?php 
									}
									?>
									<?php if(!empty($result_third)) { ?>
											
									<td class="widthH">
									<?php
									if($third->transmission_clutch !="")
									echo $third->transmission_clutch;
									else
									echo "Not filled" ; 
									?>
									</td>
									<?php 
									}
									?>
									</tr>
									<tr>
									<tr>
									<th>Alternator</th>
									<?php if(!empty($result_first)) { ?>
												<td class="widthH">
									<?php
									if($first->alternator_info !="")
									echo $first->alternator_info;
									else
									echo "Not filled" ; 
									?>
									</td>
									<?php 
									}
									?>	
									<?php if(!empty($result_second)) { ?>
											
									<td class="widthH">
									<?php
									if($second->alternator_info !="")
									echo $second->alternator_info;
									else
									echo "Not filled" ; 
									?>
									</td>
									<?php 
									}
									?>
										<?php if(!empty($result_third)) { ?>
											<td class="widthH">
									<?php
									if($third->alternator_info !="")
									echo $third->alternator_info;
									else
									echo "Not filled" ; 
									?>
									</td>
									<?php 
									}
									?>

									</tr>
									<tr>
									<th>Battery</th>
	<?php if(!empty($result_first)) { ?>
											
											<td class="widthH">
									<?php
									if($first->battery_info !="")
									echo $first->battery_info;
									else
									echo "Not filled" ; 
									?>
									</td>
									<?php 
									}
									?>
	<?php if(!empty($result_second)) { ?>
																				<td class="widthH">
									<?php
									if($second->battery_info !="")
									echo $second->battery_info;
									else
									echo "Not filled" ; 
									?>
									</td>
									<?php 
									}
									?>
										<?php if(!empty($result_third)) { ?>
											
									<td class="widthH">
									<?php
									if($third->battery_info !="")
									echo $third->battery_info;
									else
									echo "Not filled" ; 
									?>
									</td>
									<?php 
									}
									?>
							
									</tr>

									<th>Gear Box</th>
								<?php if(!empty($result_first)) { ?>
													<td class="widthH">
									<?php
									if($first->transmission_gear_box !="")
									echo $first->transmission_gear_box;
									else
									echo "Not filled" ; 
									?>
									</td>
									<?php 
									}
									?>
										<?php if(!empty($result_second)) { ?>
											
									<td class="widthH">
									<?php
									if($second->transmission_gear_box !="")
									echo $second->transmission_gear_box;
									else
									echo "Not filled" ; 
									?>
									</td>
									<?php 
									}
									?>
										<?php if(!empty($result_third)) { ?>
											
									<td class="widthH">
									<?php
									if($third->transmission_gear_box !="")
									echo $third->transmission_gear_box;
									else
									echo "Not filled" ; 
									?>
									</td>
									<?php 
									}
									?>
									
									</tr>
									<tr>
									<th>Forward Speed</th>
										<?php if(!empty($result_first)) { ?>
											<td class="widthH">
									<?php
									if($first->speed_forward !="")
									echo $first->speed_forward;
									else
									echo "Not filled" ; 
									?>
									</td>
									<?php 
									}
									?>
										<?php if(!empty($result_second)) { ?>
											
									<td class="widthH">
									<?php
									if($second->speed_forward !="")
									echo $second->speed_forward;
									else
									echo "Not filled" ; 
									?>
									</td>
									<?php 
									}
									?>
										<?php if(!empty($result_third)) { ?>
											
									<td class="widthH">
									<?php
									if($third->speed_forward !="")
									echo $third->speed_forward;
									else
									echo "Not filled" ; 
									?>
									</td>
									<?php 
									}
									?>
									</tr>  
									<tr>
									<th>Reverse speed</th>
									<?php if(!empty($result_first)) { ?>
												<td class="widthH">
									<?php
									if($first->speed_reverse !="")
									echo $first->speed_reverse;
									else
									echo "Not filled" ; 
									?>
									</td>
									<?php 
									}
									?>
										<?php if(!empty($result_second)) { ?>
											
									<td class="widthH">
									<?php
									if($second->speed_reverse !="")
									echo $second->speed_reverse;
									else
									echo "Not filled" ; 
									?>
									</td>
									<?php 
									}
									?>
										<?php if(!empty($result_third)) { ?>
											
									<td class="widthH">
									<?php
									if($third->speed_reverse !="")
									echo $third->speed_reverse;
									else
									echo "Not filled" ; 
									?>
									</td>
									<?php 
									}
									?>
									</tr>
									</tbody>
									</table>
								</div>	  
							</div>   
							<div class="col-sm-12 col-md-12 col-xs-12" style="padding:0px;border:1px solid #ddd;margin-top:5px">
								<button type="button" class="btn btn-info compare_head " data-toggle="collapse" data-target="#breaks">Brakes</button>
								<div id="breaks" class="collapse in">
									<table class="table table-striped" style="border-top: 3px solid #DD4445;">
										<tbody>
											<tr>
												<th class="widthH">Brake</th>
											<?php if(!empty($result_first)) { ?>
													<td class="widthH">
													<?php
													if($first->breaks !="")
													echo $first->breaks;
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_second)) { ?>
												<td class="widthH">
													<?php
													if($second->breaks !="")
													echo $second->breaks;
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_third)) { ?>
												<td class="widthH">
													<?php
													if($third->breaks !="")
													echo $third->breaks;
													else
													echo "Not filled" ; 
												?>
												</td>
												<?php 
												}
												?>
											
											</tr>
										</tbody>
									</table>
								</div>	  
							</div>   
							<div class="col-sm-12 col-md-12" style="padding:0px;border:1px solid #ddd;margin-top:5px">
								<button type="button" class="btn btn-info compare_head " data-toggle="collapse" data-target="#hydraulics">Hydraulics</button>
								<div id="hydraulics" class="collapse in">
									<table class="table table-striped" style="border-top: 3px solid #DD4445;">
										<tbody>
											<tr>
												<th class="widthH">Lifting Capacity</th>
												<?php if(!empty($result_first)) { ?>
												<td class="widthH">
													<?php
													if($first->hydraulic_lifting_capacity !="")
													echo $first->hydraulic_lifting_capacity;
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_second)) { ?>
												<td class="widthH">
													<?php
													if($second->hydraulic_lifting_capacity !="")
													echo $second->hydraulic_lifting_capacity;
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_third)) { ?>
												<td class="widthH">
													<?php
													if($third->hydraulic_lifting_capacity !="")
													echo $third->hydraulic_lifting_capacity;
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
											
											</tr>
											<tr>
												<th>3 point Linkage</th>
												<?php if(!empty($result_first)) { ?>
												<td class="widthH">
													<?php
													if($first->hydraulic_point_linkage !="")
													echo $first->hydraulic_point_linkage;
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_second)) { ?>
												<td class="widthH">
													<?php
													if($second->hydraulic_point_linkage !="")
													echo $second->hydraulic_point_linkage;
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_third)) { ?>
												<td class="widthH">
													<?php
													if($third->hydraulic_point_linkage !="")
													echo $third->hydraulic_point_linkage;
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>

											</tr>
										</tbody>
									</table>
								</div>	  
							</div>
							<div class="col-sm-12 col-md-12 col-xs-12" style="padding:0px;border:1px solid #ddd;margin-top:5px">
								<button type="button" class="btn btn-info compare_head " data-toggle="collapse" data-target="#steering">Steering</button>
								<div id="steering" class="collapse in">
									<table class="table table-striped" style="border-top: 3px solid #DD4445;">
										<tbody>
											<tr>
												<th class="widthH">Type</th>
	<?php if(!empty($result_first)) { ?>
																							<td class="widthH">
													<?php
													if($first->steering_type !="")
													echo $first->steering_type;
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_second)) { ?>
												<td class="widthH">
													<?php
													if($second->steering_type !="")
													echo $second->steering_type;
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_third)) { ?>
												<td class="widthH">
													<?php
													if($third->steering_type !="")
													echo $third->steering_type;
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
													?>
											
											</tr>   
												<tr>
													<th class="widthH">Steering Column</th>
												<?php if(!empty($result_first)) { ?>
													<td class="widthH">
														<?php
														if($first->steering_column !="")
														echo $first->steering_column;
														else
														echo "Not filled" ; 
														?>
													</td>
													<?php 
													}
													?>
												<?php if(!empty($result_second)) { ?>
													<td class="widthH">
													<?php
													if($second->steering_column !="")
													echo $second->steering_column;
													else
													echo "Not filled" ; 
													?>
													</td>
													<?php 
													}
													?>
												<?php if(!empty($result_third)) { ?>
													<td class="widthH">
															<?php
															if($third->steering_column !="")
															echo $third->steering_column;
															else
															echo "Not filled" ; 
															?>
													</td>
													<?php 
													}
													?>
											
												</tr>
											</tbody>
										</table>
									</div>	  
							</div> 
							<div class="col-sm-12 col-md-12 col-xs-12" style="padding:0px;border:1px solid #ddd;margin-top:5px">
								<button type="button" class="btn btn-info compare_head " data-toggle="collapse" data-target="#power">Power Take Off</button>
								<div id="power" class="collapse in">
									<table class="table table-striped" style="border-top: 3px solid #DD4445;">
										<tbody>
											<tr>
												<th class="widthH">Type</th>
												<?php if(!empty($result_first)) { ?>
												<td class="widthH">
													<?php
													if($first->powertakeoff_type !="")
													echo $first->powertakeoff_type;
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_second)) { ?>
												<td class="widthH">
													<?php
													if($second->powertakeoff_type !="")
													echo $second->powertakeoff_type;
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_third)) { ?>
												<td class="widthH">
													<?php
													if($third->powertakeoff_type !="")
													echo $third->powertakeoff_type;
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
											
											</tr>   
											<tr>
												<th class="widthH">RPM</th>
												<?php if(!empty($result_first)) { ?>
												<td class="widthH">
													<?php
													if($first->powertakeoff_rpm !="")
													echo $first->powertakeoff_rpm;
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_second)) { ?>
												<td class="widthH">
													<?php
													if($second->powertakeoff_rpm !="")
													echo $second->powertakeoff_rpm;
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_third)) { ?>
												<td class="widthH">
													<?php
													if($third->powertakeoff_rpm !="")
													echo $third->powertakeoff_rpm;
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
											
											</tr>
											</tbody>
									</table>
								</div>	  
							</div> 
							<div class="col-sm-12 col-md-12 col-xs-12" style="padding:0px;border:1px solid #ddd;margin-top:5px">
								<button type="button" class="btn btn-info compare_head " data-toggle="collapse" data-target="#wheels">Wheels And Tyres</button>
								<div id="wheels" class="collapse in">
									<table class="table table-striped" style="border-top: 3px solid #DD4445;">
										<tbody>
											<tr>
												<th class="widthH">Wheel drive</th>
												<?php if(!empty($result_first)) { ?>
												<td class="widthH">
													<?php
													if($first->wheel_drive !="")
													echo $first->wheel_drive;
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_second)) { ?>
												<td class="widthH">
													<?php
													if($second->wheel_drive !="")
													echo $second->wheel_drive;
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_third)) { ?>
												<td class="widthH">
													<?php
													if($third->wheel_drive !="")
													echo $third->wheel_drive;
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
											
											</tr>  
											<tr>
												<th class="widthH">Front</th>
												<?php if(!empty($result_first)) { ?>
												<td class="widthH">
													<?php
													if($first->wheels_tyre_front !="")
													echo $first->wheels_tyre_front;
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_second)) { ?>
												<td class="widthH">
													<?php
													if($second->wheels_tyre_front !="")
													echo $second->wheels_tyre_front;
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_third)) { ?>
												<td class="widthH">
													<?php
													if($third->wheels_tyre_front !="")
													echo $third->wheels_tyre_front;
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
											
											</tr>  
											<tr>
												<th class="widthH">Rear</th>
												<?php if(!empty($result_first)) { ?>
												<td class="widthH">
													<?php
													if($first->wheels_tyre_rear !="")
													echo $first->wheels_tyre_rear;
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_second)) { ?>
												<td class="widthH">
													<?php
													if($second->wheels_tyre_rear !="")
													echo $second->wheels_tyre_rear;
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_third)) { ?>
												<td class="widthH">
													<?php
													if($third->wheels_tyre_rear !="")
													echo $third->wheels_tyre_rear;
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
											
											</tr>
										</tbody>
									</table>
								</div>	  
							</div> 
							<div class="col-sm-12 col-md-12 col-xs-12" style="padding:0px;border:1px solid #ddd;margin-top:5px">
								<button type="button" class="btn btn-info compare_head " data-toggle="collapse" data-target="#fuel">Fuel Tank</button>
								<div id="fuel" class="collapse in">
									<table class="table table-striped" style="border-top: 3px solid #DD4445;">
										<tbody>
											<tr>
												<th class="widthH">Capacity</th>
												<?php if(!empty($result_first)) { ?>
												<td class="widthH">
													<?php
													if($first->fuel_tank_capacity !="")
													echo $first->fuel_tank_capacity." Lit";
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_second)) { ?>
												<td class="widthH">
													<?php
													if($second->fuel_tank_capacity !="")
													echo $second->fuel_tank_capacity." Lit";
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_third)) { ?>
												<td class="widthH">
													<?php
													if($third->fuel_tank_capacity !="")
													echo $third->fuel_tank_capacity." Lit";
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
											
											</tr>
										</tbody>
									</table>
								</div>	  
							</div>
							<div class="col-sm-12 col-md-12 col-xs-12" style="padding:0px;border:1px solid #ddd;margin-top:5px">
								<button type="button" class="btn btn-info compare_head " data-toggle="collapse" data-target="#dimensions">Dimensions And Weight Of Tractor</button>
								<div id="dimensions" class="collapse in">
									<table class="table table-striped" style="border-top: 3px solid #DD4445;">
										<tbody>
											<tr>
												<th class="widthH">Total Weight</th>
												<?php if(!empty($result_first)) { ?>
												<td class="widthH">
													<?php
													if($first->total_weight !="")
													echo $first->total_weight." kg";
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_second)) { ?>
												<td class="widthH">
													<?php
													if($second->total_weight !="")
													echo $second->total_weight." kg";
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_third)) { ?>
												<td class="widthH">
													<?php
													if($third->total_weight !="")
													echo $third->total_weight." kg";
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
											
											</tr>  
											<tr>
												<th class="widthH">Wheel Base</th>
												<?php if(!empty($result_first)) { ?>
												<td class="widthH">
													<?php
													if($first->wheel_base !="")
													echo $first->wheel_base." mm";
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_second)) { ?>
												<td class="widthH">
													<?php
													if($second->wheel_base !="")
													echo $second->wheel_base." mm";
													else
													echo "Not filled" ; 
												?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_third)) { ?>
												<td class="widthH">
													<?php
													if($third->wheel_base !="")
													echo $third->wheel_base." mm";
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
											
											</tr>  
											<tr>
												<th class="widthH">Overall Length</th>
												<?php if(!empty($result_first)) { ?>
												<td class="widthH">
													<?php
													if($first->overall_length !="")
													echo $first->overall_length." mm";
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_second)) { ?>
												<td class="widthH">
													<?php
													if($second->overall_length !="")
													echo $second->overall_length." mm";
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_third)) { ?>
												<td class="widthH">
												<?php
												if($third->overall_length !="")
												echo $third->overall_length." mm";
												else
												echo "Not filled" ; 
												?>
												</td>
												<?php 
												}
												?>
											
											</tr>  
											<tr>
												<th class="widthH">Overall Width</th>
												<?php if(!empty($result_first)) { ?>
												<td class="widthH">
													<?php
													if($first->overall_width !="")
													echo $first->overall_width." mm";
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_second)) { ?>
												<td class="widthH">
													<?php
													if($second->overall_width !="")
													echo $second->overall_width." mm";
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_third)) { ?>
												<td class="widthH">
													<?php
													if($third->overall_width !="")
													echo $third->overall_width." mm";
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
											
											</tr>  
											
											<tr>
												<th class="widthH">Ground Clearance</th>
												<?php if(!empty($result_first)) { ?>
												<td class="widthH">
													<?php
													if($first->ground_clearance !="")
													echo $first->ground_clearance." mm";
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_second)) { ?>
												<td class="widthH">
													<?php
													if($second->ground_clearance !="")
													echo $second->ground_clearance." mm";
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_third)) { ?>
												<td class="widthH">
													<?php
													if($third->ground_clearance !="")
													echo $third->ground_clearance." mm";
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
											
											</tr>	
											<tr>
												<th class="widthH">Turning Radius With Brakes</th>
												<?php if(!empty($result_first)) { ?>
												<td class="widthH">
													<?php
													if($first->turningradius_with_breaks !="")
													echo $first->turningradius_with_breaks." mm";
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_second)) { ?>
												<td class="widthH">
													<?php
													if($second->turningradius_with_breaks !="")
													echo $second->turningradius_with_breaks." mm";
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_third)) { ?>
												<td class="widthH">
													<?php
													if($third->turningradius_with_breaks !="")
													echo $third->turningradius_with_breaks." mm";
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
											
											</tr>
										</tbody>
									</table>
								</div>	  
							</div> 
							<div class="col-sm-12 col-md-12 col-xs-12" style="padding:0px;border:1px solid #ddd;margin-top:5px">
								<button type="button" class="btn btn-info compare_head " data-toggle="collapse" data-target="#accessories">Accessories</button>
								<div id="accessories" class="collapse in">
									<table class="table table-striped" style="border-top: 3px solid #DD4445;">
										<tbody>
											<tr>
												<th class="widthH">Accessories</th>
												<?php if(!empty($result_first)) { ?>
												<td class="widthH">
													<?php
													if($first->accessories !=""){
													$v=rtrim($first->accessories,'$$');
													$aa[] = explode('$$',$v);
													$rr="";
													foreach($aa as $k){
													foreach($k as $k1){ 
													$rr.= $k1." , "; 
													}
													echo rtrim($rr,' , ');
													}
													}
													else
													echo "Not filled" ;   ?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_second)) { ?>
												<td class="widthH">
													<?php
													if($second->accessories !=""){
													$vs=rtrim($second->accessories,'$$');
													$aas[] = explode('$$',$vs);
													$rrs="";
													foreach($aas as $ks){
													foreach($ks as $k1s){ 
													$rrs.= $k1s." , "; 
													}
													echo rtrim($rrs,' , ');
													}
													}
													else
													echo "Not filled" ;   ?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_third)) { ?>
												<td class="widthH">
													<?php
													if($third->accessories !=""){
													$v12s_third=rtrim($third->accessories,'$$');
													$aa12s_third[] = explode('$$',$v12s_third);
													$rr12s_third="";
													foreach($aa12s_third as $k21s_third){
													foreach($k21s_third as $k121s_third){ 
													$rr12s_third.= $k121s_third." , "; 
													}
													echo rtrim($rr12s_third,' , ');
													}
													}
													else
													echo "Not filled" ;   ?>
												</td>
												<?php 
												}
												?>
											
											</tr>
										</tbody>
									</table>
								</div>	  
							</div> 
							<div class="col-sm-12 col-md-12 col-xs-12" style="padding:0px;border:1px solid #ddd;margin-top:5px">
								<button type="button" class="btn btn-info compare_head " data-toggle="collapse" data-target="#options">Options</button>
								<div id="options" class="collapse in">
									<table class="table table-striped" style="border-top: 3px solid #DD4445;">
										<tbody>
											<tr>
												<th class="widthH">Options</th>
												<?php if(!empty($result_first)) { ?>
												<td class="widthH">
													<?php
													if($first->options !=""){
													$v1=rtrim($first->options,'$$');
													$aa1[] = explode('$$',$v1);
													$rr1="";
													foreach($aa1 as $k2){
													foreach($k2 as $k12){ 
													$rr1.= $k12." , "; 
													}
													echo rtrim($rr1,' , ');
													}
													}
													else
													echo "Not filled" ;   ?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_second)) { ?>
												<td class="widthH">
													<?php
													if($second->options !=""){
													$v1s=rtrim($second->options,'$$');
													$aa1s[] = explode('$$',$v1s);
													$rr1s="";
													foreach($aa1s as $k2s){
													foreach($k2s as $k12s){ 
													$rr1s.= $k12s." , "; 
													}
													echo rtrim($rr1s,' , ');
													}
													}
													else
													echo "Not filled" ;   ?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_third)) { ?>
												<td class="widthH">
													<?php
													if($third->options !=""){
													$v1s_aa=rtrim($third->options,'$$');
													$aa1s_aa[] = explode('$$',$v1s_aa);
													$rr1s_aa="";
													foreach($aa1s_aa as $k2s_aa){
													foreach($k2s_aa as $k12s_aa){ 
													$rr1s_aa.= $k12s_aa." , "; 
													}
													echo rtrim($rr1s_aa,' , ');
													}
													}
													else
													echo "Not filled" ;   ?>
												</td>
												<?php 
												}
												?>
											
											</tr>
										</tbody>
									</table>
								</div>	  
							</div> 
							<div class="col-sm-12 col-md-12 col-xs-12" style="padding:0px;border:1px solid #ddd;margin-top:5px">
								<button type="button" class="btn btn-info compare_head " data-toggle="collapse" data-target="#additional">Additional-Features</button>
								<div id="additional" class="collapse in">
									<table class="table table-striped" style="border-top: 3px solid #DD4445;">
										<tbody>
											<tr>
												<th class="widthH">Features</th>
												<?php if(!empty($result_first)) { ?>
												<td class="widthH">
													<?php
													if($first->additional_features !=""){
													$v12=rtrim($first->additional_features,'$$');
													$aa12[] = explode('$$',$v12);
													$rr12="";
													foreach($aa12 as $k21){
													foreach($k21 as $k121){ 
													$rr12.= $k121." , "; 
													}
													echo rtrim($rr12,' , ');
													}
													}
													else
													echo "Not filled" ;   ?>	
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_second)) { ?>
												<td class="widthH">
													<?php
													if($second->additional_features !=""){
													$v12s=rtrim($second->additional_features,'$$');
													$aa12s[] = explode('$$',$v12s);
													$rr12s="";
													foreach($aa12s as $k21s){
													foreach($k21s as $k121s){ 
													$rr12s.= $k121s." , "; 
													}
													echo rtrim($rr12s,' , ');
													}
													}
													else
													echo "Not filled" ;   ?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_third)) { ?>
												<td class="widthH">
													<?php
													if($third->additional_features !=""){
													$v12s_ads=rtrim($third->additional_features,'$$');
													$aa12s_ads[] = explode('$$',$v12s_ads);
													$rr12s_ads="";
													foreach($aa12s_ads as $k21s_ads){
													foreach($k21s_ads as $k121s_ads){ 
													$rr12s_ads.= $k121s_ads." , "; 
													}
													echo rtrim($rr12s_ads,' , ');
													}
													}
													else
													echo "Not filled" ;   ?>
												</td>
												<?php 
												}
												?>
											
											</tr>
										</tbody>
									</table>
								</div>	  
							</div> 
							<div class="col-sm-12 col-md-12 col-xs-12" style="padding:0px;border:1px solid #ddd;margin-top:5px">
								<button type="button" class="btn btn-info compare_head " data-toggle="collapse" data-target="#warranty">Warranty</button>
								<div id="warranty" class="collapse in">
									<table class="table table-striped" style="border-top: 3px solid #DD4445;">
										<tbody>
											<tr>
												<th class="widthH">Warranty</th>
												<?php if(!empty($result_first)) { ?>
												<td class="widthH">
													<?php
													if($first->warranty !="")
													echo $first->warranty." yr";
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_second)) { ?>
												<td class="widthH">
													<?php
													if($second->warranty !="")
													echo $second->warranty." yr";
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_third)) { ?>
												<td class="widthH">
													<?php
													if($third->warranty !="")
													echo $third->warranty." yr";
													else
													echo "Not filled" ; 
													?>
												</td>
												<?php 
												}
												?>
											
											</tr>
										</tbody>
									</table>
								</div>	  
							</div> 
							<div class="col-sm-12 col-md-12 col-xs-12" style="padding:0px;border:1px solid #ddd;margin-top:5px">
								<button type="button" class="btn btn-info compare_head " data-toggle="collapse" data-target="#status">Status</button>
								<div id="status" class="collapse in">
									<table class="table table-striped" style="border-top: 3px solid #DD4445;">
										<tbody>
											<tr>
												<th class="widthH">Status</th>
												<?php if(!empty($result_first)) { ?>
												<td class="widthH">
													<?php
													if($first->status !=""){
													if($first->status == "coming_soon"){
													echo "coming soon";}
													else{
													echo $first->status;
													}
													}
													else
													echo "Not filled" ; ?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_second)) { ?>
												<td class="widthH">
													<?php
													if($second->status !=""){
													if($second->status == "coming_soon"){
													echo "coming soon";}
													else{
													echo $second->status;
													}
													}
													else
													echo "Not filled" ; ?>
												</td>
												<?php 
												}
												?>
												<?php if(!empty($result_third)) { ?>
												<td class="widthH">
													<?php
													if($third->status !=""){
													if($third->status == "coming_soon"){
													echo "coming soon";}
													else{
													echo $third->status;
													}
													}
													else
													echo "Not filled" ; ?>
												</td>
												<?php 
												}
												?>
											
											</tr> 
										
											</tbody>
										</table>
									</div>	  
								</div>
	<?php 
}
function Meta_title_description($page_name){
	$ci =& get_instance();
	$ci->load->database();
	$ci->load->model('Front_model');
	$result = $ci->Front_model->get_result($data=array('page_name'=>$page_name),'seo_meta');
	$meta_title = ""; $meta_keywords = ""; $meta_description = "";		
	foreach($result as $key=>$value){
		$meta_title=unserialize(base64_decode($value->meta_title));
		$meta_keywords=unserialize(base64_decode($value->meta_keywords));
		$meta_description=unserialize(base64_decode($value->meta_description));
	}
	$meta = array(
		'meta_title' => $meta_title,
		'meta_keywords' => $meta_keywords,
		'meta_description' => $meta_description,
		'meta_robots' => 'all',
		'extra_headers' => ''
	);
	// echo "<pre>";
	// print_r($meta);
	// die;
	return $meta;
}
function MahindraAd(){
	return '1';
}
function MahindraAdLink($brand_id,$brand_name,$page_name){
	if($page_name =="search_tractors"){
		$root = "http://".$_SERVER['HTTP_HOST'];
		$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
		$url=$root."Home/AdsSubmitMahindra/".$brand_id."/".$page_name."/".$brand_name;
		return $url;	
	}else{
		$root = "http://".$_SERVER['HTTP_HOST'];
		$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
		$url=$root."Home/AdsSubmit/".$brand_id."/".$page_name."/".$brand_name;
		return $url;
	}
		}
function MahindraAdLinkNew($brand_id,$brand_name,$page_name,$hp){
	if($page_name =="single_tractor"){
		$root = "http://".$_SERVER['HTTP_HOST'];
		$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
		$url=$root."Home/AdsSubmitMahindraNew/".$brand_id."/".$page_name."/".$brand_name."/".$hp;
		return $url;	
	}else{
		$root = "http://".$_SERVER['HTTP_HOST'];
		$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
		$url=$root."Home/AdsSubmit/".$brand_id."/".$page_name."/".$brand_name;
		return $url;
	}
		}
function jhon_dheerAdLink($brand_id,$brand_name,$page_name){
		$root = "http://".$_SERVER['HTTP_HOST'];
		$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
		$url=$root."Home/AdsSubmit/".$brand_id."/".$page_name."/".$brand_name;
		return $url;
}
function new_hollandAdLink($brand_id,$brand_name,$page_name){
		$root = "http://".$_SERVER['HTTP_HOST'];
		$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
		$url=$root."Home/AdsSubmit/".$brand_id."/".$page_name."/".$brand_name;
		return $url;
}
function powertracAdLink($brand_id,$brand_name,$page_name){
		$root = "http://".$_SERVER['HTTP_HOST'];
		$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
		$url=$root."Home/AdsSubmit/".$brand_id."/".$page_name."/".$brand_name;
		return $url;
}
function farmtracAdLink($brand_id,$brand_name,$page_name){
		$root = "http://".$_SERVER['HTTP_HOST'];
		$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
		$url=$root."Home/AdsSubmit/".$brand_id."/".$page_name."/".$brand_name;
		return $url;
}
function massyAdLink($brand_id,$brand_name,$page_name){
		$root = "http://".$_SERVER['HTTP_HOST'];
		$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
		$url=$root."Home/AdsSubmit/".$brand_id."/".$page_name."/".$brand_name;
		return $url;
}
function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}

?>