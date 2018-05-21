<?php
       echo "aa";
 

            set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
            include 'PHPExcel/IOFactory.php';

//             // This is the file path to be uploaded.
            $inputFileName = 'qq.xlsx';

            try {
                $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
            } catch(Exception $e) {
                die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
         
            }
// die;
            $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
     // echo      $arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet
// echo "<pre>";
// for($i=2;$i<=6;$i++){

// $Amount = trim($allDataInSheet[$i]["A"]);
// $TransactionID = trim($allDataInSheet[$i]["B"]);
// $ProductDescription = trim($allDataInSheet[$i]["C"]);
// $CustomerName = trim($allDataInSheet[$i]["D"]);
// $CustomerEmail = trim($allDataInSheet[$i]["E"]);
// $CustomerMobile = trim($allDataInSheet[$i]["F"]);
// $send_email_now="0";

// $requestArray=array(
//     'amount'=>$Amount,
//     'txnid'=>$TransactionID,
//     'productinfo'=>$ProductDescription,
//     'firstname'=>$CustomerName,
//     'email'=>$CustomerEmail,
//     'phone'=>$CustomerMobile,
//     'send_email_now'=>$send_email_now,
// );

// print_r($requestArray);
// }
// $insertTable= mysql_query("insert into dealers (state, city, name_de, authorize, address, pin, contact) values('".$state."', '".$city."', '".$name_de."', '".$authorize."', '".$address."', '".$pin."', '".$contact."');");


// $msg = 'Record has been added. <div style="Padding:20px 0 0 0;"></div>';

?>