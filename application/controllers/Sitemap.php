<?php
class Sitemap extends CI_Controller {
public function __construct() {
parent::__construct();
$this->load->helper('shweta_helper');
$this->load->helper('form');
$this->load->library('session');
      $this->load->helper('query');
}
function index() {
$root = "http://www.tractorjunction.com/";
	
 $data=array();
 $data['baseurl']="http://www.tractorjunction.com/";
 $data['abouturl']="http://www.tractorjunction.com/about-us";
 $data['privacyurl']="http://www.tractorjunction.com/privacy-policy";
 $data['advertiseurl']="http://www.tractorjunction.com/advertise-with-us";
 $data['carerurl']="http://www.tractorjunction.com/career";
 $data['contacturl']="http://www.tractorjunction.com/contact-us";
 $data['offerurl']="http://www.tractorjunction.com/special-tractor-offers";
 $data['compareurl']="http://www.tractorjunction.com/compare-tractors";
 $data['searchurl']="http://www.tractorjunction.com/tractors";
 $data['loanurl']="http://www.tractorjunction.com/tractor-loan-emi-calculator";

 
 $data['finance']="http://www.tractorjunction.com/tractor-finance";
 $data['insurance']="http://www.tractorjunction.com/tractor-insurance";
 $data['findtractordealers']="http://www.tractorjunction.com/find-tractor-dealers";
 $data['tractordealershipenquiry']="http://www.tractorjunction.com/tractor-dealership-enquiry";
 $data['tractornews']="http://www.tractorjunction.com/tractor-news";
 $data['tractorcustomercare']="http://www.tractorjunction.com/tractor-customer-care";
 $data['tractorservicecenters']="http://www.tractorjunction.com/tractor-service-centers";
 $data['sellusedtractor']="http://www.tractorjunction.com/sell-used-tractor";
 $data['tractorproductsonrent']="http://www.tractorjunction.com/tractor-products-on-rent";
 $data['usedtractorsforsell']="http://www.tractorjunction.com/used-tractors-for-sell";
 $data['populartractors']="http://www.tractorjunction.com/popular-tractors";
 $data['latesttractors']="http://www.tractorjunction.com/latest-tractors";
 $data['upcomingtractors']="http://www.tractorjunction.com/upcoming-tractors";
 
 
//brandURL
$branddata=array();
$branddata=shweta_select('name,id,slug','brand','',''); 
	foreach($branddata as $branddata=>$rr){
		$data['brandurl'][]=$root."brand/".$rr->id."/".newslugend($rr->slug)."-tractors";
	}
//TractorURL
$tractordata=array();
	$tractordata=shweta_select('id,model_name,brand','tech_specification','','');
	foreach($tractordata as $tractordata=>$rr1){
		$brandName='';
		foreach(shweta_select('name','brand','id',$rr1->brand) as $raa) $brandName= newslugend($raa->name);
		$data['tractorurl'][]=$root."search-tractor/".$rr1->id."/".$brandName."-tractor"."-".newslugend($rr1->model_name);
	}
//HarvesterURL
$HarvesterData=array();
	$HarvesterData=shweta_select('id,model_name,brand,slug','harvester','','');
	foreach($HarvesterData as $HarvesterData=>$rr1){
		$brandName='';
		foreach(shweta_select('name','brand','id',$rr1->brand) as $raa) $brandName= newslugend($raa->name);
		$data['harvesterURL'][]=$root."harvester/".$brandName."-".$rr1->slug."-combine-harvester";
	}
//ImplementsURL
$ImplementsData=array();
	$ImplementsData=shweta_select('id,model_name,brand,slug','new_implement','','');
	foreach($ImplementsData as $ImplementsData=>$rr1){
		$brandName='';
		foreach(shweta_select('name','brand','id',$rr1->brand) as $raa) $brandName= newslugend($raa->name);
		$data['ImplementsURL'][]=$root."implement/".$brandName."-".$rr1->slug;
	}
//OldTractorURL
$OldTractorData=array();
	$OldTractorData=shweta_select('id,model_name,brand,slug','old_tractor','','');
	foreach($OldTractorData as $OldTractorData=>$rr1){
		$brandName='';
		foreach(shweta_select('name','brand','id',$rr1->brand) as $raa) $brandName= newslugend($raa->name);
		$data['OldTractorURL'][]=$root."used-tractor/".$brandName."-".$rr1->slug;
	}
//RentTractorURL
$RentTractorData=array();
	$RentTractorData=shweta_select('id,model_name,brand,slug','rent_tractor','','');
	foreach($RentTractorData as $RentTractorData=>$rr1){
		$brandName='';
		foreach(shweta_select('name','brand','id',$rr1->brand) as $raa) $brandName= newslugend($raa->name);
		$data['RentTractorURL'][]=$root."rent-tractor/".$brandName."-".$rr1->slug;
	}
//OldImplementTractorURL
$OldImplementTractorData=array();
	$OldImplementTractorData=shweta_select('id,model_name,brand,slug','old_implement','','');
	foreach($OldImplementTractorData as $OldImplementTractorData=>$rr1){
		$brandName='';
		foreach(shweta_select('name','brand','id',$rr1->brand) as $raa) $brandName= newslugend($raa->name);
		$data['OldImplementTractorURL'][]=$root."used-tractor-implement/".$brandName."-".$rr1->slug;
	}

	
	
	
	
	
	
	        header("Content-Type: text/xml;charset=iso-8859-1");
	
// echo "<pre>";
// print_r($data);
// die;
 $this->load->view("sitemap_view",$data);

	}

}
?>