<?php

class User_list_export extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->helper('shweta');
		   $this->load->model("Front_model");
    }
function GetRequestList(){
	       $this->load->view('admins/header');
        $this->load->view('admins/request_list');
        // $this->load->view('admins/footer');
}
function GetRequestListHarvester(){
	       $this->load->view('admins/header');
        $this->load->view('admins/request_list_harvester');
        // $this->load->view('admins/footer');
}
	function GetExcelDemoOnnRoadHarvester(){
			date_default_timezone_set("Asia/Kolkata");
			$today_date =  date('Y-m-d');
			$dateBefore = date('Y-m-d', strtotime('-7 days'));
			$radioType=$this->input->post('request_list');
			if($radioType == "7"){
				$from_date=date('Y-m-d', strtotime('-7 days'));
				$to_date =  date('Y-m-d');
			}elseif($radioType == "15"){
				$from_date=date('Y-m-d', strtotime('-15 days'));
				$to_date =  date('Y-m-d');
			}elseif($radioType == "date_range"){
				$from_date=$this->input->post('from_date');
				$to_date=$this->input->post('to_date');
			}
		 $from_date= date("Y-m-d", strtotime($from_date));
			 
		 $to_date= date("Y-m-d", strtotime($to_date));
		
			$where_cod='';
			
$where_cod="req_type ='harvester' and request_for='on_road_request' and date_time between '".$from_date."' AND '".$to_date."'";	 
$onroadHarvester=$this->Front_model->get_request_result('onroad_request_harvester',$where_cod);
$where_cod="req_type ='harvester' and request_for='demo_request' and date_time between '".$from_date."' AND '".$to_date."'";	 
$DemoHarvester=$this->Front_model->get_request_result('onroad_request_harvester',$where_cod);
$where_cod="req_type ='implement' and request_for='on_road_request' and date_time between '".$from_date."' AND '".$to_date."'";	 
$onroadImplement=$this->Front_model->get_request_result('onroad_request_harvester',$where_cod);
$where_cod="req_type ='implement' and request_for='demo_request' and date_time between '".$from_date."' AND '".$to_date."'";	 
$DemoImplement=$this->Front_model->get_request_result('onroad_request_harvester',$where_cod);
		
$all_result=array();
$all_result=array_merge($all_result,$onroadHarvester);
$all_result=array_merge($all_result,$DemoHarvester);
$all_result=array_merge($all_result,$onroadImplement);
$all_result=array_merge($all_result,$DemoImplement);
		
	 
		
	 
$on_road_result=array();
foreach($all_result as $key1=>$obj){
	
$brand_name = '';
$Model_name = '';
$type_model = '';
	
if($obj->req_type == "harvester"){
foreach (shweta_select('brand,model_name,slug', 'harvester', 'id', $obj->impID) as $raa) {
foreach (shweta_select('name', 'brand', 'id', $raa->brand) as $raa1) $brand_name = ucfirst($raa1->name);
$Model_name = $raa->model_name;

}	
$type_model=$brand_name." ".$Model_name;
}else{ 
foreach (shweta_select('brand,model_name', 'new_implement', 'id', $obj->impID) as $raa) {
foreach (shweta_select('name', 'brand', 'id', $raa->brand) as $raa1) $brand_name = ucfirst($raa1->name);
$Model_name = $raa->model_name;

}	
$type_model=$brand_name." ".$Model_name;
}

$Name = '';
$Email = '';
foreach (shweta_select('username', 'user_reg', 'id', $obj->user_id) as $raa) {

$Name = $raa->username;

}
foreach (shweta_select('name', 'states', 'id', $obj->state) as $raa1) $state = ucfirst($raa1->name);
foreach (shweta_select('name', 'cities', 'id', $obj->city) as $raa1) $city = ucfirst($raa1->name);

	
	
	
	
	
	$on_road_result[]=array(
	'name'=>$Name,
	'email'=>$obj->email_id,
	'request_for'=>$type_model,
	'mobile'=>$obj->contact_no,
	'state'=>$state,
	'city'=>$city,
	'request_date'=>$obj->date_time,
	'req_type'=>$obj->req_type,
	'request_for_type'=>$obj->request_for,
	
	 
	);
}
 

  $i = 0;
        if (!empty($on_road_result)) {
            require_once('export_file_excel/Classes/PHPExcel.php');
            $objPHPExcel = new PHPExcel;
            // set default font
            $objPHPExcel->getDefaultStyle()->getFont()->setName('Calibri');
            // set default font size
            $objPHPExcel->getDefaultStyle()->getFont()->setSize(10);
            // create the writer
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
            // currency format, € with < 0 being in red color
            $currencyFormat = '#,#0.## \€;[Red]-#,#0.## \€';
            // number format, with thousands separator and two decimal points.
            $numberFormat = '#,#0.##;[Red]-#,#0.##';
            // writer already created the first sheet for us, let's get it
            $objSheet = $objPHPExcel->getActiveSheet();
            // rename the sheet
            $objSheet->setTitle('Requests onroad and Demo');
            // let's bold and size the header font and write the header
            // as you can see, we can specify a range of cells, like here: cells from A1 to A4
            $objSheet->getStyle('A1:J1')->getFont()->setBold(true)->setSize(12);

            // write header
            $objSheet->getCell('A1')->setValue('S.NO');
            $objSheet->getCell('B1')->setValue('Name');
            $objSheet->getCell('C1')->setValue('Email');
            $objSheet->getCell('D1')->setValue('Request for'); 
            $objSheet->getCell('E1')->setValue('Contact No');
            $objSheet->getCell('F1')->setValue('State');
            $objSheet->getCell('G1')->setValue('City');
            $objSheet->getCell('H1')->setValue('Request date');
            $objSheet->getCell('I1')->setValue('Harvester / Implement');
            $objSheet->getCell('J1')->setValue('Request Type');

            // we could get this data from database, but here we are writing for simplicity
            $i = 2;
            $s_no = 1;
            foreach ($on_road_result AS $p) {

                $objSheet->getCell('A' . $i)->setValue($s_no);
                $objSheet->getCell('B' . $i)->setValue(ucwords($p['name']));
                $objSheet->getCell('C' . $i)->setValue($p['email']);
                $objSheet->getCell('D' . $i)->setValue($p['request_for']);
                $objSheet->getCell('E' . $i)->setValue($p['mobile']);
                $objSheet->getCell('F' . $i)->setValue($p['state']);
                $objSheet->getCell('G' . $i)->setValue($p['city']); 
                $objSheet->getCell('H' . $i)->setValue(date("d-m-Y", strtotime($p['request_date'])));
				  $objSheet->getCell('I' . $i)->setValue($p['req_type']);
				  $objSheet->getCell('J' . $i)->setValue($p['request_for_type']);
                $i++;
                $s_no++;
            }

            // autosize the columns
            $objSheet->getColumnDimension('A')->setAutoSize(true);
            $objSheet->getColumnDimension('B')->setAutoSize(true);
            $objSheet->getColumnDimension('C')->setAutoSize(true);
            $objSheet->getColumnDimension('D')->setAutoSize(true);
            $objSheet->getColumnDimension('E')->setAutoSize(true);
            $objSheet->getColumnDimension('F')->setAutoSize(true);
            $objSheet->getColumnDimension('G')->setAutoSize(true);
            $objSheet->getColumnDimension('H')->setAutoSize(true);
            $objSheet->getColumnDimension('I')->setAutoSize(true);

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="OnRoad_Demo_request.xls"');
            header('Cache-Control: max-age=0');

            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
// ob_clean();
            $objWriter->save('php://output');
            //Setting the header type
            // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            // header('Content-Disposition: attachment;filename="file.xlsx"');
            // header('Cache-Control: max-age=0');
            // $objWriter->save('php://output');
        }
        exit;

 
			
	}
	function GetExcelDemoOnnRoad(){
			date_default_timezone_set("Asia/Kolkata");
			$today_date =  date('Y-m-d');
			$dateBefore = date('Y-m-d', strtotime('-7 days'));
			$radioType=$this->input->post('request_list');
			if($radioType == "7"){
				$from_date=date('Y-m-d', strtotime('-7 days'));
				$to_date =  date('Y-m-d');
			}elseif($radioType == "15"){
				$from_date=date('Y-m-d', strtotime('-15 days'));
				$to_date =  date('Y-m-d');
			}elseif($radioType == "date_range"){
				$from_date=$this->input->post('from_date');
				$to_date=$this->input->post('to_date');
			}
		 $from_date= date("Y-m-d", strtotime($from_date));
			 
		 $to_date= date("Y-m-d", strtotime($to_date));
		
			$where_cod='';
			$where_cod="date_ between '".$from_date."' AND '".$to_date."'";
$onroadprice_result = $this->Front_model->get_request_result('onroadprice',$where_cod);
 
$on_road_result=array();
foreach($onroadprice_result as $key1=>$value1){
	$user_id='';$user_name='';$user_email='';$brand_name='';$stateID='';$stateName='';$locationID='';$city_name='';
	$user_id = $value1->user_id;
$pincode='';
$mobile_type='';
$full_address='';
	foreach (shweta_select('pincode', 'user_reg', 'id', $user_id) as $raa) $pincode = ($raa->pincode);
	foreach (shweta_select('mobile_type', 'user_reg', 'id', $user_id) as $raa) $mobile_type = ($raa->mobile_type);
	foreach (shweta_select('full_address', 'user_reg', 'id', $user_id) as $raa) $full_address = ($raa->full_address);
	foreach (shweta_select('username', 'user_reg', 'id', $user_id) as $raa) $user_name = ucfirst($raa->username);
	foreach (shweta_select('email', 'user_reg', 'id', $user_id) as $raa) $user_email = ucfirst($raa->email);
	foreach (shweta_select('name', 'brand', 'id', $value1->brand) as $raa) $brand_name = ucfirst($raa->name);
	foreach (shweta_select('state', 'user_reg', 'id', $user_id) as $raa) $stateID = ($raa->state);
	foreach (shweta_select('name', 'states', 'id', $stateID) as $raa) $stateName = ucfirst($raa->name);
	foreach (shweta_select('location', 'user_reg', 'id', $user_id) as $raa) $locationID = ($raa->location);
	if (ctype_digit($locationID)) {
	foreach (shweta_select('name', 'cities', 'id', $locationID) as $raa) $city_name = ucfirst($raa->name);
	} else {
	$city_name = ucfirst($locationID);
	}
	 
	$on_road_result[]=array(
	'name'=>$user_name,
	'email'=>$user_email,
	'brand'=>$brand_name,
	'model'=>$value1->model,
	'mobile'=>$value1->contact_no,
	'state'=>$stateName,
	'city'=>$city_name,
	'request_date'=>$value1->date_,
	'request_type'=>"on road request",
	'full_address'=>$full_address,
	'pincode'=>$pincode,
	'mobile_type'=>$mobile_type,
	
	'land_size'=>$value1->land_size,
	'soil_information'=>$value1->soil_information,
	'old_tractor'=>$value1->old_tractor,
	'old_implement'=>$value1->old_implement,
	);
}



			$where_cod='';
			$where_cod="date between '".$from_date."' AND '".$to_date."'";
$demo_request_result = $this->Front_model->get_request_result('demo_request',$where_cod);

$demoRequest_result=array();
foreach($demo_request_result as $key1=>$value1){
	$user_id='';$user_name='';$user_email='';$brand_name='';$stateID='';$stateName='';$locationID='';$city_name='';
 $pincode='';
$mobile_type='';
$full_address='';
  	foreach (shweta_select('id', 'user_reg', 'mobile', $value1->contact) as $raa) $user_id = ($raa->id);
  	foreach (shweta_select('pincode', 'user_reg', 'id', $user_id) as $raa) $pincode = ($raa->pincode);
	foreach (shweta_select('mobile_type', 'user_reg', 'id', $user_id) as $raa) $mobile_type = ($raa->mobile_type);
	foreach (shweta_select('full_address', 'user_reg', 'id', $user_id) as $raa) $full_address = ($raa->full_address);
	
	foreach (shweta_select('name', 'brand', 'id', $value1->brand) as $raa) $brand_name = ucfirst($raa->name);
	 
	foreach (shweta_select('name', 'states', 'id', $value1->state) as $raa) $stateName = ucfirst($raa->name);
	foreach (shweta_select('name', 'cities', 'id', $value1->city) as $raa) $city_name = ucfirst($raa->name);
 
	 
	$demoRequest_result[]=array(
	'name'=>$value1->name,
	'email'=>$value1->email,
	'brand'=>$brand_name,
	'model'=>$value1->model,
	'mobile'=>$value1->contact,
	'state'=>$stateName,
	'city'=>$city_name,
	'request_date'=>$value1->date,
	'request_type'=>"demo request",
	'full_address'=>$full_address,
	'pincode'=>$pincode,
	'mobile_type'=>$mobile_type,
	
	'land_size'=>'',
	'soil_information'=>'',
	'old_tractor'=>'',
	'old_implement'=>'',
	
	);
}



$total_result=array_merge($on_road_result,$demoRequest_result);
// echo "<pre>";
// print_r($total_result);
// die;
  $i = 0;
        if (!empty($total_result)) {
            require_once('export_file_excel/Classes/PHPExcel.php');
            $objPHPExcel = new PHPExcel;
            // set default font
            $objPHPExcel->getDefaultStyle()->getFont()->setName('Calibri');
            // set default font size
            $objPHPExcel->getDefaultStyle()->getFont()->setSize(10);
            // create the writer
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
            // currency format, € with < 0 being in red color
            $currencyFormat = '#,#0.## \€;[Red]-#,#0.## \€';
            // number format, with thousands separator and two decimal points.
            $numberFormat = '#,#0.##;[Red]-#,#0.##';
            // writer already created the first sheet for us, let's get it
            $objSheet = $objPHPExcel->getActiveSheet();
            // rename the sheet
            $objSheet->setTitle('Requests onroad and Demo');
            // let's bold and size the header font and write the header
            // as you can see, we can specify a range of cells, like here: cells from A1 to A4
            $objSheet->getStyle('A1:Q1')->getFont()->setBold(true)->setSize(12);

            // write header
            $objSheet->getCell('A1')->setValue('S.NO');
            $objSheet->getCell('B1')->setValue('Name');
            $objSheet->getCell('C1')->setValue('Email');
            $objSheet->getCell('D1')->setValue('Request for brand');
            $objSheet->getCell('E1')->setValue('Request for model');
            $objSheet->getCell('F1')->setValue('Contact No');
            $objSheet->getCell('G1')->setValue('State');
            $objSheet->getCell('H1')->setValue('City');
            $objSheet->getCell('I1')->setValue('Pincode');
            $objSheet->getCell('J1')->setValue('Full address');
            $objSheet->getCell('K1')->setValue('Mobile Type');
            $objSheet->getCell('L1')->setValue('Land Size');
            $objSheet->getCell('M1')->setValue('Soil Information');
            $objSheet->getCell('N1')->setValue('Have old Tractor');
            $objSheet->getCell('O1')->setValue('Have old Implement');
            $objSheet->getCell('P1')->setValue('Request date');
            $objSheet->getCell('Q1')->setValue('Request Type');

            // we could get this data from database, but here we are writing for simplicity
            $i = 2;
            $s_no = 1;
            foreach ($total_result AS $p) {

                $objSheet->getCell('A' . $i)->setValue($s_no);
                $objSheet->getCell('B' . $i)->setValue($p['name']);
                $objSheet->getCell('C' . $i)->setValue($p['email']);
                $objSheet->getCell('D' . $i)->setValue($p['brand']);
                $objSheet->getCell('E' . $i)->setValue($p['model']);
                $objSheet->getCell('F' . $i)->setValue($p['mobile']);
                $objSheet->getCell('G' . $i)->setValue($p['state']);
                $objSheet->getCell('H' . $i)->setValue($p['city']);
                $objSheet->getCell('I' . $i)->setValue($p['pincode']);
                $objSheet->getCell('J' . $i)->setValue($p['full_address']);
                $objSheet->getCell('K' . $i)->setValue($p['mobile_type']);
                $objSheet->getCell('L' . $i)->setValue($p['land_size']);
                $objSheet->getCell('M' . $i)->setValue($p['soil_information']);
                $objSheet->getCell('N' . $i)->setValue($p['old_tractor']);
                $objSheet->getCell('O' . $i)->setValue($p['old_implement']);
                $objSheet->getCell('P' . $i)->setValue(date("d-m-Y", strtotime($p['request_date'])));
				  $objSheet->getCell('Q' . $i)->setValue($p['request_type']);
                $i++;
                $s_no++;
            }

            // autosize the columns
            $objSheet->getColumnDimension('A')->setAutoSize(true);
            $objSheet->getColumnDimension('B')->setAutoSize(true);
            $objSheet->getColumnDimension('C')->setAutoSize(true);
            $objSheet->getColumnDimension('D')->setAutoSize(true);
            $objSheet->getColumnDimension('E')->setAutoSize(true);
            $objSheet->getColumnDimension('F')->setAutoSize(true);
            $objSheet->getColumnDimension('G')->setAutoSize(true);
            $objSheet->getColumnDimension('H')->setAutoSize(true);
            $objSheet->getColumnDimension('I')->setAutoSize(true);
            $objSheet->getColumnDimension('J')->setAutoSize(true);
            $objSheet->getColumnDimension('K')->setAutoSize(true);
            $objSheet->getColumnDimension('L')->setAutoSize(true);
            $objSheet->getColumnDimension('M')->setAutoSize(true);
            $objSheet->getColumnDimension('N')->setAutoSize(true);
            $objSheet->getColumnDimension('O')->setAutoSize(true);
            $objSheet->getColumnDimension('P')->setAutoSize(true);
            $objSheet->getColumnDimension('Q')->setAutoSize(true);

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="OnRoad_Demo_request.xls"');
            header('Cache-Control: max-age=0');

            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
// ob_clean();
            $objWriter->save('php://output');
            //Setting the header type
            // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            // header('Content-Disposition: attachment;filename="file.xlsx"');
            // header('Cache-Control: max-age=0');
            // $objWriter->save('php://output');
        }
        exit;

 
			
	}
    function index()
    {

        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

// echo $root.'export_file_excel/Classes/PHPExcel.php';
// die;
        $products = array();
        $products = shweta_select_th('*', 'user_reg', 'date_time > DATE_SUB(NOW(), INTERVAL 7 DAY)');
        // echo "<pre>";
        // print_r($products);
        // die;
        $i = 0;
        if (!empty($products)) {
            // echo "aa";
            //die;
            require_once('export_file_excel/Classes/PHPExcel.php');
            // echo "aa";
            // die;
            $objPHPExcel = new PHPExcel;
            // set default font
            $objPHPExcel->getDefaultStyle()->getFont()->setName('Calibri');
            // set default font size
            $objPHPExcel->getDefaultStyle()->getFont()->setSize(10);
            // create the writer
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
            // currency format, € with < 0 being in red color
            $currencyFormat = '#,#0.## \€;[Red]-#,#0.## \€';
            // number format, with thousands separator and two decimal points.
            $numberFormat = '#,#0.##;[Red]-#,#0.##';
            // writer already created the first sheet for us, let's get it
            $objSheet = $objPHPExcel->getActiveSheet();
            // rename the sheet
            $objSheet->setTitle('My sales report');
            // let's bold and size the header font and write the header
            // as you can see, we can specify a range of cells, like here: cells from A1 to A4
            $objSheet->getStyle('A1:H1')->getFont()->setBold(true)->setSize(12);

            // write header
            $objSheet->getCell('A1')->setValue('S.NO');
            $objSheet->getCell('B1')->setValue('Username');
            $objSheet->getCell('C1')->setValue('Email');
            $objSheet->getCell('D1')->setValue('Location');
            $objSheet->getCell('E1')->setValue('Gender');
            $objSheet->getCell('F1')->setValue('Contact no');
            $objSheet->getCell('G1')->setValue('State');
            $objSheet->getCell('H1')->setValue('Join_Date');

            // we could get this data from database, but here we are writing for simplicity
            $i = 2;
            $s_no = 1;
            foreach ($products AS $a => $p) {
                // echo "aa";
                // die;
                $location = "";
                if ($p->location != "") {


                    if (ctype_digit($p->location)) {
                        foreach (shweta_select('name', 'cities', 'id', $p->location) as $raa) $location = ucfirst($raa->name);
                    } else {
                        $location = $p->location;
                    }
                } else {
                    $location = "Not Filled";
                }
                $gender = "";
                if ($p->gender != "") {
                    $gender = $p->gender;
                } else {
                    $gender = "Not Filled";
                }
                $mobile = "";
                if ($p->mobile != "") {
                    $mobile = $p->mobile;
                } else {
                    $mobile = "Not Filled";
                }
                $state = "";
                if ($p->state != "") {
                    foreach (shweta_select('name', 'states', 'id', $p->state) as $raa) $state = ucfirst($raa->name);

                } else {
                    $state = "Not Filled";
                }
                $objSheet->getCell('A' . $i)->setValue($s_no);
                $objSheet->getCell('B' . $i)->setValue($p->username);
                $objSheet->getCell('C' . $i)->setValue($p->email);
                $objSheet->getCell('D' . $i)->setValue($location);
                $objSheet->getCell('E' . $i)->setValue($gender);
                $objSheet->getCell('F' . $i)->setValue($mobile);
                $objSheet->getCell('G' . $i)->setValue($state);
                $objSheet->getCell('H' . $i)->setValue(date("d-m-Y", strtotime($p->date_time)));
                $i++;
                $s_no++;
            }

            // autosize the columns
            $objSheet->getColumnDimension('A')->setAutoSize(true);
            $objSheet->getColumnDimension('B')->setAutoSize(true);
            $objSheet->getColumnDimension('C')->setAutoSize(true);
            $objSheet->getColumnDimension('D')->setAutoSize(true);
            $objSheet->getColumnDimension('E')->setAutoSize(true);
            $objSheet->getColumnDimension('F')->setAutoSize(true);
            $objSheet->getColumnDimension('G')->setAutoSize(true);
            $objSheet->getColumnDimension('H')->setAutoSize(true);
            // echo "aa";
            // die;
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="userlist.xls"');
            header('Cache-Control: max-age=0');
// echo "aa";
            // die;
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
// echo "aa";
            // die;
// ob_clean();
            $objWriter->save('php://output');

        }
        exit;
    }

    function onroad()
    {


        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

// echo $root.'export_file_excel/Classes/PHPExcel.php';
// die;
        date_default_timezone_set("Asia/Kolkata");
        $date_time =  date('Y-m-d');
        $date_time_pre = date('Y-m-d', strtotime('-7 days'));

$whr_col="date_ between '".$date_time_pre."' AND '".$date_time."'";
        $products = array();
			$ci =& get_instance();
	$ci->load->database();
	$ci->db->select('*');
	$ci->db->from('onroadprice');
	if($whr_col != '')
	$ci->db->where($whr_col);
	$query = $ci->db->get();
$products=$query->result();

        // echo "<pre>";
		// print_r($products);
		// die;
        $result = array();
        $result1 = array();
        $locationID = '';


        foreach ($products as $key => $value) {

            $stateID = '';
            $locationID = '';
            $user_id = $value->user_id;
            foreach (shweta_select('username', 'user_reg', 'id', $user_id) as $raa) $result['name'] = ucfirst($raa->username);
            foreach (shweta_select('email', 'user_reg', 'id', $user_id) as $raa) $result['email'] = ucfirst($raa->email);
			$model_name='';
			foreach (shweta_select('model_name', 'tech_specification', 'id', $value->model) as $raa)  $model_name = ucfirst($raa->model_name);
			if ($model_name == "") {
			$model_name= $value->model; }
			$result['model'] = ucfirst($model_name);
            foreach (shweta_select('name', 'brand', 'id', $value->brand) as $raa) $result['brand'] = ucfirst($raa->name);
            foreach (shweta_select('mobile', 'user_reg', 'id', $user_id) as $raa) $result['mobile'] = ucfirst($raa->mobile);
            foreach (shweta_select('state', 'user_reg', 'id', $user_id) as $raa) $stateID = ($raa->state);
            foreach (shweta_select('name', 'states', 'id', $stateID) as $raa) $result['state'] = ucfirst($raa->name);
            foreach (shweta_select('location', 'user_reg', 'id', $user_id) as $raa) $locationID = ($raa->location);
            if (ctype_digit($locationID)) {
                foreach (shweta_select('name', 'cities', 'id', $locationID) as $raa) $result['city'] = ucfirst($raa->name);
            } else {
                $result['city'] = ucfirst($locationID);
            }
            $result['joindate'] = $value->date_;


            $result1[] = $result;

        }


        // print_r($result1);


        // die;
        $i = 0;
        if (!empty($products)) {
            require_once('export_file_excel/Classes/PHPExcel.php');
            $objPHPExcel = new PHPExcel;
            // set default font
            $objPHPExcel->getDefaultStyle()->getFont()->setName('Calibri');
            // set default font size
            $objPHPExcel->getDefaultStyle()->getFont()->setSize(10);
            // create the writer
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
            // currency format, € with < 0 being in red color
            $currencyFormat = '#,#0.## \€;[Red]-#,#0.## \€';
            // number format, with thousands separator and two decimal points.
            $numberFormat = '#,#0.##;[Red]-#,#0.##';
            // writer already created the first sheet for us, let's get it
            $objSheet = $objPHPExcel->getActiveSheet();
            // rename the sheet
            $objSheet->setTitle('My sales report');
            // let's bold and size the header font and write the header
            // as you can see, we can specify a range of cells, like here: cells from A1 to A4
            $objSheet->getStyle('A1:I1')->getFont()->setBold(true)->setSize(12);

            // write header
            $objSheet->getCell('A1')->setValue('S.NO');
            $objSheet->getCell('B1')->setValue('Name');
            $objSheet->getCell('C1')->setValue('Email');
            $objSheet->getCell('D1')->setValue('Request for brand');
            $objSheet->getCell('E1')->setValue('Request for model');
            $objSheet->getCell('F1')->setValue('Contact No');
            $objSheet->getCell('G1')->setValue('State');
            $objSheet->getCell('H1')->setValue('City');
            $objSheet->getCell('I1')->setValue('Request date');

            // we could get this data from database, but here we are writing for simplicity
            $i = 2;
            $s_no = 1;
            foreach ($result1 AS $p) {

                $objSheet->getCell('A' . $i)->setValue($s_no);
                $objSheet->getCell('B' . $i)->setValue($p['name']);
                $objSheet->getCell('C' . $i)->setValue($p['email']);
                $objSheet->getCell('D' . $i)->setValue($p['brand']);
                $objSheet->getCell('E' . $i)->setValue($p['model']);
                $objSheet->getCell('F' . $i)->setValue($p['mobile']);
                $objSheet->getCell('G' . $i)->setValue($p['state']);
                $objSheet->getCell('H' . $i)->setValue($p['city']);
                $objSheet->getCell('I' . $i)->setValue(date("d-m-Y", strtotime($p['joindate'])));
                $i++;
                $s_no++;
            }

            // autosize the columns
            $objSheet->getColumnDimension('A')->setAutoSize(true);
            $objSheet->getColumnDimension('B')->setAutoSize(true);
            $objSheet->getColumnDimension('C')->setAutoSize(true);
            $objSheet->getColumnDimension('D')->setAutoSize(true);
            $objSheet->getColumnDimension('E')->setAutoSize(true);
            $objSheet->getColumnDimension('F')->setAutoSize(true);
            $objSheet->getColumnDimension('G')->setAutoSize(true);
            $objSheet->getColumnDimension('H')->setAutoSize(true);
            $objSheet->getColumnDimension('I')->setAutoSize(true);

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="onroadlist.xls"');
            header('Cache-Control: max-age=0');

            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
// ob_clean();
            $objWriter->save('php://output');
            //Setting the header type
            // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            // header('Content-Disposition: attachment;filename="file.xlsx"');
            // header('Cache-Control: max-age=0');
            // $objWriter->save('php://output');
        }
        exit;

    }

    function demoRequest()
    {


        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        $products = array();
        $products = shweta_select('*', 'demo_request', '', '');

        $result = array();
        $result1 = array();

        // echo "<pre>";
        // print_r($products);
        // die;

        foreach ($products as $key => $value) {

            $result['name'] = ucfirst($value->name);
            $result['email'] = ucfirst($value->email);
            foreach (shweta_select('name', 'brand', 'id', $value->brand) as $raa) $result['brand'] = ucfirst($raa->name);
            $result['model'] = ucfirst($value->model);

            $user_id = '';
            $stateID = '';
            $locationID = '';
            foreach (shweta_select('id', 'user_reg', 'email', $value->email) as $raa) $user_id = ($raa->id);

            foreach (shweta_select('state', 'user_reg', 'id', $user_id) as $raa) $stateID = ($raa->state);

            if ($value->city == "") {
                foreach (shweta_select('location', 'user_reg', 'id', $user_id) as $raa) $locationID = ($raa->location);
// foreach(shweta_select('location','user_reg','id',$user_id) as $raa)  $result['city']=($raa->location) ;


                if (ctype_digit($locationID)) {
                    foreach (shweta_select('name', 'cities', 'id', $locationID) as $raa) $result['city'] = ucfirst($raa->name);
                } else {
                    $result['city'] = ucfirst($locationID);
                }
            } else {
                // echo "aa";
                // die;
                foreach (shweta_select('name', 'cities', 'id', $value->city) as $raa) $result['city'] = ucfirst($raa->name);

            }

            if ($value->city == "") {
                foreach (shweta_select('name', 'states', 'id', $stateID) as $raa) $result['state'] = ucfirst($raa->name);

            } else {
                foreach (shweta_select('name', 'states', 'id', $value->city) as $raa) $result['state'] = ucfirst($raa->name);
            }


            $result['contact'] = ucfirst($value->contact);
            $result['joindate'] = $value->date;
            $result1[] = $result;

        }
        // echo "<pre>";
        // print_r($result1);
        // die;

        $i = 0;
        if (!empty($products)) {
            require_once('export_file_excel/Classes/PHPExcel.php');
            $objPHPExcel = new PHPExcel;
            // set default font
            $objPHPExcel->getDefaultStyle()->getFont()->setName('Calibri');
            // set default font size
            $objPHPExcel->getDefaultStyle()->getFont()->setSize(10);
            // create the writer
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
            // currency format, € with < 0 being in red color
            $currencyFormat = '#,#0.## \€;[Red]-#,#0.## \€';
            // number format, with thousands separator and two decimal points.
            $numberFormat = '#,#0.##;[Red]-#,#0.##';
            // writer already created the first sheet for us, let's get it
            $objSheet = $objPHPExcel->getActiveSheet();
            // rename the sheet
            $objSheet->setTitle('My sales report');
            // let's bold and size the header font and write the header
            // as you can see, we can specify a range of cells, like here: cells from A1 to A4
            $objSheet->getStyle('A1:I1')->getFont()->setBold(true)->setSize(12);

            // write header
            $objSheet->getCell('A1')->setValue('S.NO');
            $objSheet->getCell('B1')->setValue('name');
            $objSheet->getCell('C1')->setValue('email');
            $objSheet->getCell('D1')->setValue('Request for model');
            $objSheet->getCell('E1')->setValue('Request for brand');
            $objSheet->getCell('F1')->setValue('Contact No');
            $objSheet->getCell('G1')->setValue('State');
            $objSheet->getCell('H1')->setValue('City');
            $objSheet->getCell('I1')->setValue('Request date');
            // we could get this data from database, but here we are writing for simplicity
            $i = 2;
            $s_no = 1;
            foreach ($result1 AS $p) {

                $objSheet->getCell('A' . $i)->setValue($s_no);
                $objSheet->getCell('B' . $i)->setValue($p['name']);
                $objSheet->getCell('C' . $i)->setValue($p['email']);
                $objSheet->getCell('D' . $i)->setValue($p['model']);
                $objSheet->getCell('E' . $i)->setValue($p['brand']);
                $objSheet->getCell('F' . $i)->setValue($p['contact']);
                $objSheet->getCell('G' . $i)->setValue($p['state']);
                $objSheet->getCell('H' . $i)->setValue($p['city']);
                $objSheet->getCell('I' . $i)->setValue(date("d-m-Y", strtotime($p['joindate'])));
                $i++;
                $s_no++;
            }

            // autosize the columns
            $objSheet->getColumnDimension('A')->setAutoSize(true);
            $objSheet->getColumnDimension('B')->setAutoSize(true);
            $objSheet->getColumnDimension('C')->setAutoSize(true);
            $objSheet->getColumnDimension('D')->setAutoSize(true);
            $objSheet->getColumnDimension('E')->setAutoSize(true);
            $objSheet->getColumnDimension('F')->setAutoSize(true);
            $objSheet->getColumnDimension('G')->setAutoSize(true);
            $objSheet->getColumnDimension('H')->setAutoSize(true);
            $objSheet->getColumnDimension('I')->setAutoSize(true);
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="demorequestlist.xls"');
            header('Cache-Control: max-age=0');
// echo "aa";
// die;
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
// ob_clean();
            $objWriter->save('php://output');
            //Setting the header type
            // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            // header('Content-Disposition: attachment;filename="file.xlsx"');
            // header('Cache-Control: max-age=0');
            // $objWriter->save('php://output');
        }
        exit;

    }

    function dealearslist()
    {

        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        $products = array();
        $products = shweta_select('*', 'dealers', '', '');

        $result = array();
        $result1 = array();

        foreach ($products as $key => $value) {

            $result['name'] = ucfirst($value->name_de);
            foreach (shweta_select('name', 'states', 'id', $value->state) as $raa) $result['state'] = ucfirst($raa->name);
            foreach (shweta_select('name', 'cities', 'id', $value->city) as $raa) $result['city'] = ucfirst($raa->name);
            foreach (shweta_select('name', 'brand', 'id', $value->authorize) as $raa) $result['authorize'] = ucfirst($raa->name);
            $result['address'] = ucfirst($value->address);
            $result['pin'] = ucfirst($value->pin);
            $result['contact'] = ucfirst($value->contact);

            $result1[] = $result;
        }
// echo "<pre>";
// print_r($result1);
// die;
        $i = 0;
        if (!empty($products)) {
            require_once('export_file_excel/Classes/PHPExcel.php');
            $objPHPExcel = new PHPExcel;
            // set default font
            $objPHPExcel->getDefaultStyle()->getFont()->setName('Calibri');
            // set default font size
            $objPHPExcel->getDefaultStyle()->getFont()->setSize(10);
            // create the writer
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
            // currency format, € with < 0 being in red color
            $currencyFormat = '#,#0.## \€;[Red]-#,#0.## \€';
            // number format, with thousands separator and two decimal points.
            $numberFormat = '#,#0.##;[Red]-#,#0.##';
            // writer already created the first sheet for us, let's get it
            $objSheet = $objPHPExcel->getActiveSheet();
            // rename the sheet
            $objSheet->setTitle('My sales report');
            // let's bold and size the header font and write the header
            // as you can see, we can specify a range of cells, like here: cells from A1 to A4
            $objSheet->getStyle('A1:L1')->getFont()->setBold(true)->setSize(12);

            // write header
            $objSheet->getCell('A1')->setValue('S.no');
            $objSheet->getCell('B1')->setValue('Name');
            $objSheet->getCell('C1')->setValue('City');
            $objSheet->getCell('D1')->setValue('State');
            $objSheet->getCell('E1')->setValue('Authorize for brand');
            $objSheet->getCell('F1')->setValue('Address');
            $objSheet->getCell('G1')->setValue('Pincode');
            $objSheet->getCell('H1')->setValue('Contact No');

            // we could get this data from database, but here we are writing for simplicity
            $i = 2;
            $s_no = 1;
            foreach ($result1 AS $p) {

                $objSheet->getCell('A' . $i)->setValue($s_no);
                $objSheet->getCell('B' . $i)->setValue($p['name']);
                $objSheet->getCell('C' . $i)->setValue($p['city']);
                $objSheet->getCell('D' . $i)->setValue($p['state']);
                $objSheet->getCell('E' . $i)->setValue($p['authorize']);
                $objSheet->getCell('F' . $i)->setValue($p['address']);
                $objSheet->getCell('G' . $i)->setValue($p['pin']);
                $objSheet->getCell('H' . $i)->setValue($p['contact']);
                $i++;
                $s_no++;
            }

            // autosize the columns
            $objSheet->getColumnDimension('A')->setAutoSize(true);
            $objSheet->getColumnDimension('B')->setAutoSize(true);
            $objSheet->getColumnDimension('C')->setAutoSize(true);
            $objSheet->getColumnDimension('D')->setAutoSize(true);
            $objSheet->getColumnDimension('E')->setAutoSize(true);
            $objSheet->getColumnDimension('F')->setAutoSize(true);
            $objSheet->getColumnDimension('G')->setAutoSize(true);
            $objSheet->getColumnDimension('H')->setAutoSize(true);

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="dealerslist.xls"');
            header('Cache-Control: max-age=0');

            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
// ob_clean();
            $objWriter->save('php://output');
            //Setting the header type
            // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            // header('Content-Disposition: attachment;filename="file.xlsx"');
            // header('Cache-Control: max-age=0');
            // $objWriter->save('php://output');
        }
        exit;

    }

    function TrackIpAddress()
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        $result = array();
        $result = shweta_order_by_query('*', 'add_track', 'date_time', 'ASC');
        $newArry = array();
        $newArry2 = array();

        foreach ($result as $key => $value) {
            $ip = $value->ip_address;

            $newArry['ip_address'] = $value->ip_address;
            $newArry['username'] = $value->user_id;
            $newArry['date_time'] = $value->date_time;
            // $newArry['city']='';
            // $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));
            // if($ip_data && $ip_data->geoplugin_countryName != null){
            // $newArry['city'] = $ip_data->geoplugin_city;
            // }

            $newArry2[] = $newArry;
        }

        $i = 0;
        if (!empty($result)) {
            require_once('export_file_excel/Classes/PHPExcel.php');
            $objPHPExcel = new PHPExcel;
            // set default font
            $objPHPExcel->getDefaultStyle()->getFont()->setName('Calibri');
            // set default font size
            $objPHPExcel->getDefaultStyle()->getFont()->setSize(10);
            // create the writer
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
            // currency format, € with < 0 being in red color
            $currencyFormat = '#,#0.## \€;[Red]-#,#0.## \€';
            // number format, with thousands separator and two decimal points.
            $numberFormat = '#,#0.##;[Red]-#,#0.##';
            // writer already created the first sheet for us, let's get it
            $objSheet = $objPHPExcel->getActiveSheet();
            // rename the sheet
            $objSheet->setTitle('My sales report');
            // let's bold and size the header font and write the header
            // as you can see, we can specify a range of cells, like here: cells from A1 to A4
            $objSheet->getStyle('A1:E1')->getFont()->setBold(true)->setSize(12);

            // write header
            $objSheet->getCell('A1')->setValue('S.no');
            $objSheet->getCell('B1')->setValue('User Name');
            $objSheet->getCell('C1')->setValue('IP Address');
            // $objSheet->getCell('D1')->setValue('City Name');
            $objSheet->getCell('D1')->setValue('Date And Time');
            // we could get this data from database, but here we are writing for simplicity
            $i = 2;
            $s_no = 1;

            foreach ($newArry2 as $qw22) {
                $name = $qw22['username'];
                if ($qw22['username'] == 'guest') {
                    $name = $qw22['username'];
                } else {
                    foreach (shweta_select('username', 'user_reg', 'id', $name) as $raa) {
                        $name = $raa->username;
                    }
                }
                $ipname = $qw22['ip_address'];
                // $cityname='';
                // if($qw22['city']==''){
                // $cityname='Not Filled';
                // }
                // else{
                // $cityname=$qw22['city'];
                // }
                $datetime = $qw22['date_time'];

                $objSheet->getCell('A' . $i)->setValue($s_no);
                $objSheet->getCell('B' . $i)->setValue($name);
                $objSheet->getCell('C' . $i)->setValue($ipname);
                // $objSheet->getCell('D'.$i)->setValue($cityname);
                $objSheet->getCell('D' . $i)->setValue($datetime);

                $i++;
                $s_no++;
            }
            // autosize the columns
            $objSheet->getColumnDimension('A')->setAutoSize(true);
            $objSheet->getColumnDimension('B')->setAutoSize(true);
            $objSheet->getColumnDimension('C')->setAutoSize(true);
            $objSheet->getColumnDimension('D')->setAutoSize(true);
            // $objSheet->getColumnDimension('E')->setAutoSize(true);

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="TrackIpAddress.xls"');
            header('Cache-Control: max-age=0');

            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
// ob_clean();
            $objWriter->save('php://output');
            //Setting the header type
            // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            // header('Content-Disposition: attachment;filename="file.xlsx"');
            // header('Cache-Control: max-age=0');
            // $objWriter->save('php://output');
            // }
            exit;

        }
    }
}

?>
