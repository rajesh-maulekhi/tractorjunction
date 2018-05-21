<?php

class RentTractor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('shweta');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->database();
		      $this->load->helper('query');
    }

    function index()
    {

        $des = "TractorJunction is one of the leading online automotive information source for Tractors in India. Here user can find out the latest Tractor brands and models in India along with their detailed information like features, specification and performance etc.";
        $key = "Tractor, Tractors, Latest Tractors, Latest Tractor in India, Compare Tractors Online, Compare Tractors,  Tractors in India, Tractor Price in India, Tractor Brands, Tractor Information, Tractor Specification, Tractors Reviews, Tractors Features, Tractors Models, Tractor prices India, New Tractors in India, Model Tractors, Agriculture Tractor, Tractor Dealers in India, Best Tractor in India, Best Tractors in India, Tractor Info, Commercial Tractors,  Agricultural Tractors, Tractor Models, Latest Tractors in India,  New Tractors, New Tractors in India, Tractor Prices, Tractors Specification, Tractor Reviews, Tractor Features";
        $meta = array(
            'meta_title' => 'Tractors Information, Tractors Specification, Tractors Features, Tractor Price in India- TractorJunction',
            'meta_keywords' => $key,
            'meta_description' => $des,
            'meta_robots' => 'all',
            'extra_headers' => ''

        );
        $data = array();
        $data = array_merge($data, $meta);
        $this->session->set_userdata('pageinfo', 'rent');
        $this->load->view('header', $data);
        $this->load->view('addRentTractor');
        $this->load->view('footer');

    }

    function singleRentTractor($slug)
    {

        $des = "TractorJunction is one of the leading online automotive information source for Tractors in India. Here user can find out the latest Tractor brands and models in India along with their detailed information like features, specification and performance etc.";
        $key = "Tractor, Tractors, Latest Tractors, Latest Tractor in India, Compare Tractors Online, Compare Tractors,  Tractors in India, Tractor Price in India, Tractor Brands, Tractor Information, Tractor Specification, Tractors Reviews, Tractors Features, Tractors Models, Tractor prices India, New Tractors in India, Model Tractors, Agriculture Tractor, Tractor Dealers in India, Best Tractor in India, Best Tractors in India, Tractor Info, Commercial Tractors,  Agricultural Tractors, Tractor Models, Latest Tractors in India,  New Tractors, New Tractors in India, Tractor Prices, Tractors Specification, Tractor Reviews, Tractor Features";
        $meta = array(
            'meta_title' => 'Tractors Information, Tractors Specification, Tractors Features, Tractor Price in India- TractorJunction',
            'meta_keywords' => $key,
            'meta_description' => $des,
            'meta_robots' => 'all',
            'extra_headers' => ''

        );
        $data = array();
        $data = array_merge($data, $meta);
        // $slug= Actual_slug_get($slug);
        $cond = '';
        $cond = "slug LIKE '" . $slug . "'";
        $result = array();
        $result['result'] = shweta_select_th('*', 'rent_tractor', $cond);
        // echo "<pre>";
        // print_r($result['result']);
        // die;

        $this->session->set_userdata('pageinfo', 'rent');
        $this->load->view('header', $data);
        $this->load->view('singleRentTractor', $result);
        $this->load->view('footer');

    }

    function ShowrentTractor($slug)
    {

        $slug = str_replace("used-", "", $slug);
        $slug = str_replace("-on-rent", "", $slug);
        // echo $slug;
        // die;
        $result['rr'] = $slug;
        $result['result'] = shweta_select('*', 'rent_tractor', 'rent_type', $slug);
        $this->session->set_userdata('rentResult', $result['result']);
        $des = "TractorJunction is one of the leading online automotive information source for Tractors in India. Here user can find out the latest Tractor brands and models in India along with their detailed information like features, specification and performance etc.";
        $key = "Tractor, Tractors, Latest Tractors, Latest Tractor in India, Compare Tractors Online, Compare Tractors,  Tractors in India, Tractor Price in India, Tractor Brands, Tractor Information, Tractor Specification, Tractors Reviews, Tractors Features, Tractors Models, Tractor prices India, New Tractors in India, Model Tractors, Agriculture Tractor, Tractor Dealers in India, Best Tractor in India, Best Tractors in India, Tractor Info, Commercial Tractors,  Agricultural Tractors, Tractor Models, Latest Tractors in India,  New Tractors, New Tractors in India, Tractor Prices, Tractors Specification, Tractor Reviews, Tractor Features";
        $meta = array(
            'meta_title' => 'Tractors Information, Tractors Specification, Tractors Features, Tractor Price in India- TractorJunction',
            'meta_keywords' => $key,
            'meta_description' => $des,
            'meta_robots' => 'all',
            'extra_headers' => ''

        );
        $data = array();
        $data = array_merge($data, $meta);
        $this->session->set_userdata('pageinfo', 'rent');
        $this->load->view('header', $data);
        $this->load->view('searchRenttractor', $result);
        $this->load->view('footer');

    }

    function SearchPageIni()
    {
 
			$meta=Meta_title_description('used_tractors_for_rent');
        $data = array();
        $data = array_merge($data, $meta);
        $this->session->set_userdata('pageinfo', 'rent');
        $this->load->view('header', $data);
        $this->load->view('searchRenttractorInitial');
        $this->load->view('footer');

    }

    function AddTractor()
    {

        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        date_default_timezone_set("Asia/Kolkata");
        $date_time = $date = date('Y-m-d');


//slug check
        $array = array();
        $slug = newslugend($this->input->post('model'));
        $slugResult = shweta_select('slug', 'rent_tractor', '', '');
        foreach ($slugResult as $b => $a) {
            $array[] = $a->slug;
        }
        $array = array_filter($array);
        if (in_array($slug, $array)) {
            $slug = $slug . (count($slugResult) + 1);
        } else {
            $slug = $slug;
        }


        $email = $this->input->post('email');
        $userId = '';
        $result = array();
        $result = shweta_select('*', 'user_reg', 'email', $this->input->post('email'));
        if (!empty($result)) {
            $dataCity = array(
                'location' => $this->input->post('city'),
            );
            foreach (shweta_select('id', 'user_reg', 'email', $this->input->post('email')) as $raa) $userId = ($raa->id);
            shweta_update('user_reg', $dataCity, 'id', $userId);
        } else {

            $data2 = array(
                'username' => $this->input->post('name'),
                'password' => $this->input->post('pasword'),
                'location' => $this->input->post('city'),
                'mobile' => $this->input->post('mobile'),
                'state' => $this->input->post('state'),
                'date_time' => $date_time,
                'email' => $this->input->post('email'),
            );
            $this->db->insert('user_reg', $data2);
            $userId = $this->db->insert_id();
        }
// echo "<pre>";
        $rent_tractor = array();
        $rent_tractor = $this->input->post('Tractorwith');


        $data1 = array(
            'name' => $this->input->post('name'),
            'availability_val' => 'available',
            'user_id' => $userId,
            'state' => $this->input->post('state'),
            'city' => $this->input->post('city'),
            'email' => $this->input->post('email'),
            'mobile' => $this->input->post('mobile'),
            'brand' => $this->input->post('brand'),
            'model_name' => $this->input->post('model'),
            'rentper' => $this->input->post('rentper'),
            'overview' => $this->input->post('overview'),
            'yearpurchase' => $this->input->post('yearpurchase'),
            'hp' => $this->input->post('hp'),

            'status' => '1',
            'date' => $date_time,
        );
        foreach ($rent_tractor as $rent_tractorValue) {


//slug check
            $array = array();
            if (strtolower($rent_tractorValue) != "tractor") {
                $slug = newslugend($this->input->post('model') . "-" . str_replace('tractor with', '', strtolower($rent_tractorValue)));
            } else {
                $slug = newslugend($this->input->post('model'));
            }

            $slugResult = shweta_select('slug', 'rent_tractor', '', '');
            foreach ($slugResult as $b => $a) {
                $array[] = $a->slug;
            }
            $array = array_filter($array);
            if (in_array($slug, $array)) {
                $slug = $slug . (count($slugResult) + 1);
            } else {
                $slug = $slug;
            }
////////////////////


            $data2 = array();
            $data2 = array(
                'rent_type' => newslugend($rent_tractorValue),
                'slug' => $slug,
            );
            $data = array_merge($data2, $data1);
            shweta_insert_form('rent_tractor', $data);


            $sellEmail = '';
            $sellEmail = $this->input->post('email');


            $userEmail = '';
            foreach (shweta_select('email', 'user_reg', 'id', $this->session->userdata('review_id')) as $raa) $userEmail = ($raa->email);
            $brandseller = '';
            foreach (shweta_select('name', 'brand', 'id', $this->input->post('brand')) as $raa) $brandseller = ($raa->name);
            //mail sent
            $nameHeader = $sellEmail;
            $lineSecond = '';
            $lineFirst = 'Congratulations! You have successfully added a ' . $rent_tractorValue . ' for rent in Tractor junction';
            $otherInfo = array(
                'Brand' => ucfirst($brandseller),
                'Model Name' => ucfirst($this->input->post('model')),
            );
            $message = sentMailFunction($nameHeader, $lineFirst, $lineSecond, $otherInfo);

            $subject = "Successfully Added  product for RENT";
            MailSentNow($message, $subject, $sellEmail);


        }

// shweta_insert_form('rent_tractor',$data);
        $this->session->set_userdata('messageTrue', 'Rent tractor added auccessfully');
        header("Location:" . $root . "add-used-products-for-rent");

    }


    function FilterRentTractorResult()
    {

        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
// echo "aaa";

        $value_array = $this->input->post('val');
// echo "<pre>";
// print_r($value_array);
// die;

        if (!empty($value_array)) {
            $main_array_explode = array();
            $key_index_array = array();
            $colume_name = array();
            $colume_value = array();
            $key_value = "";
            $key_index = "";
            $new_array = array();
            foreach ($value_array as $key => $value) {
                $main_array_explode[] = explode(':', $value);
            }
// print_r($main_array_explode);
// die;
            foreach ($main_array_explode as $key1) {
                $key_index = $key1[0];
                $key_value = $key1[1];
                $new_array[][$key_index] = $key_value;
            }
            $explode_hp = array();
            $condition_brand = '';
            $condition_Cate = '';
            $condition_year = '';
            $condition_hp = '';

            foreach ($new_array as $key2 => $value2) {
                foreach ($value2 as $key3 => $value3) {

                    //Category condition
                    if ($key3 == "brand") {
                        $condition_brand .= $key3 . " = " . $value3 . " OR ";
                    } elseif ($key3 == "rent_type") {
                        $condition_Cate .= $key3 . " = '" . $value3 . "' OR ";
                    } //yearpurchase condition
                    elseif ($key3 == "yearpurchase") {
                        $condition_year .= $key3 . " = '" . $value3 . "' OR ";
                    } //hp condition	.
                    elseif ($key3 == "hp") {
                        $explode_hp = explode('-', $value3);
                        $condition_hp .= " hp.name BETWEEN " . $explode_hp[0] . " AND " . $explode_hp[1] . " OR ";
                    }

                }
            }

            $condition_brand = rtrim($condition_brand, " OR");
            $condition_Cate = rtrim($condition_Cate, " OR");
            $condition_year = rtrim($condition_year, " OR");
            $condition_hp = rtrim($condition_hp, " OR");

            $fibal_condition = "";

            if ($condition_brand != "") {
                $fibal_condition .= " (" . $condition_brand . " ) AND ";
            }
            if ($condition_Cate != "") {
                $fibal_condition .= " (" . $condition_Cate . " ) AND ";
            }
            if ($condition_year != "") {
                $fibal_condition .= " (" . $condition_year . " ) AND ";
            }
            if ($condition_hp != "") {
                $fibal_condition .= " (" . $condition_hp . " ) AND ";
            }

            $condition_final = "";
            $condition_final = rtrim($fibal_condition, " AND");
            // $condition_final.=" and status='1' and  state='33'";
            // die;
            $result = array();
            $ci =& get_instance();
            $ci->load->database();
            $ci->db->select('rent_tractor.*,hp.name');
            $ci->db->from('rent_tractor');
            $ci->db->join('hp', 'hp.id = rent_tractor.hp');
            $ci->db->where($condition_final);
            $total = "";
            $query = $ci->db->get();
            $result = $query->result();
            // echo "<pre>";
            // print_r($result);
            // die;
        } else {
            $result = array();
            $result = $this->session->userdata('rentResult');
        }
        echo RentTractorDiv($result);
    }

    function SrachAjax()
    {

        $result = array();
        $value = $_GET["term"];

        $condition = '';
        $condition = "model_name LIKE '%" . $value . "%'";
        $result = shweta_select_th('model_name', 'rent_tractor', $condition);


        $json = array();
        if (!empty($result)) {
            foreach ($result as $key => $resultvalue) {
                $json[] = array(
                    'value' => $resultvalue->model_name,
                    'label' => $resultvalue->model_name
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

    function GetSearchResult()
    {

        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);


        $result = array();
        $value = $this->input->post('name');
        $condition = '';
        $condition = "model_name LIKE '%" . $value . "%'";
        $result = shweta_select_th('model_name,slug', 'rent_tractor', $condition);
        $slug = '';
        // echo "<pre>";
        // print_r($result);
        // die;
        if (!empty($result)) {
            foreach ($result as $value => $obj) {
                $slug = $obj->slug;
            }
            header("Location:" . $root . "rent-tractor-info/" . $slug);
        } else {
            header("Location:" . $root . "buy-rent-tractor");
        }
    }

    function sendRequest()
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        date_default_timezone_set("Asia/Kolkata");
        $date_time = $date = date('Y-m-d h:i:sa');


        $getOrder = array();
        $toNo = 0;
        $getOrder = shweta_select('*', 'purchaserequest', 'type', 'rent');
        $toNo = count($getOrder);
        $toNo = $toNo + 1;
        $newNO = 0;
        $newNO = "R9610T" . $toNo;
        // die;

        $data = array(
            'name' => $this->input->post('name'),
            'user_id' => $this->session->userdata('review_id'),
            'contact' => $this->input->post('contact'),
            'email' => $this->input->post('email'),
            'address' => $this->input->post('address'),
            'pincode' => $this->input->post('pincode'),
            'state' => $this->input->post('state'),
            'city' => $this->input->post('city'),
            'requestfor' => $this->input->post('id_tractor'),
            'status' => '0',
            'type' => 'rent',
            'date' => $date_time,
            'reqNo' => $newNO,
        );

// echo "<pre>";
// print_r($data);
// die;

//get all info for mail	
        $buyerEmail = '';
        $buyerEmail = $this->input->post('email');

        $sellerEmail = '';
        $Sellername = '';
        $Sellercity = '';
        $Sellerstate = '';
        $userId = '';
        $Sellermobile = '';
        $Sellerpincode = '';
        foreach (shweta_select('email,name,city,state,mobile,user_id', 'rent_tractor', 'id', $this->input->post('id_tractor')) as $raa) {
            $sellerEmail = ($raa->email);
            $Sellername = ($raa->name);
            $Sellercity = ($raa->city);
            $Sellerstate = ($raa->state);
            $Sellermobile = ($raa->mobile);
// $Sellerpincode=($raa->pincode) ;
            $userId = ($raa->user_id);


        }
        foreach (shweta_select('name', 'cities', 'id', $Sellercity) as $raa) $Sellercity = ($raa->name);
        foreach (shweta_select('name', 'states', 'id', $Sellerstate) as $raa) $Sellerstate = ($raa->name);


        $TractorModel = '';
        foreach (shweta_select('model_name', 'rent_tractor', 'id', $this->input->post('id_tractor')) as $raa) $TractorModel = ($raa->model_name);
        $TractorBrand = '';
        foreach (shweta_select('brand', 'rent_tractor', 'id', $this->input->post('id_tractor')) as $raa) $TractorBrand = ($raa->brand);
        $brandName = '';
        foreach (shweta_select('name', 'brand', 'id', $TractorBrand) as $raa) $brandName = ($raa->name);
        $StateName = '';
        foreach (shweta_select('name', 'states', 'id', $this->input->post('state')) as $raa) $StateName = ($raa->name);
        $CityName = '';
        foreach (shweta_select('name', 'cities', 'id', $this->input->post('city')) as $raa) $CityName = ($raa->name);

//mail sent seller
        $nameHeader = $sellerEmail;
        $lineSecond = 'Below are the buyer information...';
        $lineFirst = $buyerEmail . ' has request to purchase your <strong>' . ucfirst($brandName) . ' ' . ucfirst($TractorModel) . '</strong> tractor in Tractor junction';
        $otherInfo = array(
            'Request Date' => date("d-M-Y", strtotime($date_time)),
            'Tractor Brand' => ucfirst($brandName),
            'Tractor Model Name' => ucfirst($TractorModel),
            'Name' => ucfirst($this->input->post('name')),
            'Contact No' => $this->input->post('contact'),
            'Email-id' => $this->input->post('email'),
            'Pincode' => $this->input->post('pincode'),
            'State' => $StateName,
            'City' => $CityName,
            'Address' => $this->input->post('address'),


        );
        $message = sentMailFunction($nameHeader, $lineFirst, $lineSecond, $otherInfo);

        $subject = "Buyer Info For request Your  Tractor at Tractor Junction";
        MailSentNow($message, $subject, $sellerEmail);

//mail sent Buyer
        $nameHeader = ucfirst($this->input->post('name'));
        $toSend = ucfirst($this->input->post('email'));
        $lineSecond = 'Below are the seller information...';
        $lineFirst = 'Thank You ' . $nameHeader . ' for purchasing <strong>' . $brandName . ' ' . $TractorModel . '</strong> tractor in Tractor junction';
        $otherInfo = array(
            'Request Date' => date("d-M-Y", strtotime($date_time)),
            'Tractor Brand' => $brandName,
            'Tractor Model Name' => $TractorModel,
            'Seller Email-id' => $sellerEmail,
            'Seller Name' => $Sellername,
            'Seller City' => $Sellercity,
            'Seller State' => $Sellerstate,
            'Seller Mobile' => $Sellermobile,


        );
        $message = sentMailFunction($toSend, $lineFirst, $lineSecond, $otherInfo);

        $subject = "Seller Info For request Used Tractor at Tractor Junction";
        MailSentNow($message, $subject, $nameHeader);

//mail sent loginTractor
        $AdminUserId = '';
        foreach (shweta_select('email', 'user_reg', 'id', $userId) as $raa) $AdminUserId = ($raa->email);


        $nameHeader = $AdminUserId;
        $lineSecond = 'Below are the information...';
        $lineFirst = 'Your tractor <strong>' . $brandName . ' ' . $TractorModel . '</strong> has been purchase  in Tractor junction';
        $otherInfo = array(
            'Purchase Date' => date("d-M-Y", strtotime($date_time)),
            'Tractor Brand' => $brandName,
            'Tractor Model Name' => $TractorModel,
            'Seller Email-id' => $sellerEmail,
            'Seller Mobile' => $Sellermobile,
            'Buyer Email-id' => $this->input->post('email'),
            'Buyer Contact No' => $this->input->post('contact'),


        );
        $message = sentMailFunction($nameHeader, $lineFirst, $lineSecond, $otherInfo);

        $subject = "Seller & buyer Info For request Used Tractor at Tractor Junction";
        MailSentNow($message, $subject, $nameHeader);
//end mail

        //sent sms buyer
        $txtmsg = "Thank you for showing your intrest. Tractor informations Model Name=" . ucfirst($TractorModel) . ",Seller mobile no=" . $Sellermobile . ",Seller Email-id=" . $sellerEmail . ". We are happy to help you. Regards tractorjunction.com";
        // echo "<br>";
        $mobile = $this->input->post('contact');
        smsSent($mobile, $txtmsg);

        //sent sms seller
        // echo "<br>";
        echo $txtmsg = ucfirst($this->input->post('name')) . " request to buy your tractor  " . ucfirst($brandName) . " " . ucfirst($TractorModel) . ". You can contact " . $this->input->post('contact') . ". We are happy to help you. Regards tractorjunction.com";
        // echo "<br>";
        $mobile = $Sellermobile;
        smsSent($mobile, $txtmsg);


        $this->db->insert('purchaserequest', $data);
        $insert_id = $this->db->insert_id();

        $this->session->set_userdata('thyankYou', $insert_id);

        header("Location:" . $_SERVER['HTTP_REFERER']);
    }


    function CloseButton()
    {
        $this->session->unset_userdata('thyankYou');
        header("Location:" . $_SERVER['HTTP_REFERER']);

    }


}

?>