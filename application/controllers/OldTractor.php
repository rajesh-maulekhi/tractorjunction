<?php

class OldTractor extends CI_Controller
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

        $root = "http://" . $_SERVER['HTTP_HOST'];

        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

  
			$meta=Meta_title_description('sell_used_tractor');
        $data = array();
        $data = array_merge($data, $meta);
        $this->session->set_userdata('pageinfo', 'old');
        $this->load->view('header', $data);
        $this->load->view('add_old_tractor_step1');
        $this->load->view('footer');

    }

    function singleUsedTractor($slug)
    {
        // echo "<pre>";
        $result = array();
        $alltractor = shweta_select('id,brand,slug', 'old_tractor', '', '');
        $alltractorArr = array();
        $alltractorArrNew = array();
        foreach ($alltractor as $alltractorKey => $alltractorValue) {
            $brandNameOld = '';
            foreach (shweta_select('name', 'brand', 'id', $alltractorValue->brand) as $raa) $brandNameOld = ucfirst($raa->name);
            $alltractorArr['id'] = $alltractorValue->id;
            $alltractorArr['slug'] = newslugend($brandNameOld) . "-" . $alltractorValue->slug;

            $alltractorArrNew[] = $alltractorArr;
        }
        foreach ($alltractorArrNew as $kk) {
            if ($kk['slug'] == $slug) {

                $result['result'] = shweta_select('*', 'old_tractor', 'id', $kk['id']);
            }
        }

        // echo $slug= Actual_slug_get($slug);
// print_r($result);
// die;


        $brandName = '';
        $modelName = '';

        foreach ($result['result'] as $key => $value) {
            foreach (shweta_select('name', 'brand', 'id', $value->brand) as $raa) $brandName = ucfirst($raa->name);
            $modelName = $value->model_name;
        }


        $title = "Used " . $brandName . " " . $modelName . " Tractor Information in India - TractorJunction";
        $Description = "Get details information about " . $brandName . " " . $modelName . " used tractor in India only on tractorjunction. This is India’s largest tractor online portal from where anyone can sell or buy your used tractor.";
        $key = "Used " . $brandName . " " . $modelName . " Tractor for Sell, Used " . $brandName . " " . $modelName . " Tractor Information, Sell Used Tractors, Used Tractor for Sell, Old Tractor for Sell, Sell Old Tractors, Used Tractors for Sell in India, Rent Used Tractor, Rent Used Tractors in India, Latest Tractors in India, Tractors in India, Tractor Price in India, Tractor Brands, Tractors Models in India, Tractor prices India, Agricultural Tractors, Online Compare Tractors, Compare Tractors in India";
        $meta = array(
            'meta_title' => $title,
            'meta_keywords' => $key,
            'meta_description' => $Description,
            'meta_robots' => 'all',
            'extra_headers' => ''

        );
        $data = array();
        $data = array_merge($data, $meta);


        $this->session->set_userdata('pageinfo', 'old');
        $this->load->view('header', $data);
        $this->load->view('singleUsedTractor', $result);
        $this->load->view('footer');

    }

    function ShowOldTractor()
    {
 
			$meta=Meta_title_description('used_tractors_for_sell');
        $data = array();
        $data = array_merge($data, $meta);
        $this->session->set_userdata('pageinfo', 'old');
        $this->load->view('header', $data);
        $this->load->view('searchOldtractor');
        $this->load->view('footer');
    }


    function AddTractor()
    {

        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        date_default_timezone_set("Asia/Kolkata");
        $date_time = $date = date('Y-m-d');

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

        $image_name = '';
        if (isset($_FILES['model_image']['name'])) {
            if ($_FILES['model_image']['name'] != "") {
                $this->load->library('upload');
                $config['file_name'] = newslugend($this->input->post('model'));
                $config['upload_path'] = './images/oldTractor/';
                $config['allowed_types'] = 'jpg|jpeg|gif|png';
                $config['max_size'] = 8000;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $this->upload->initialize($config);
                $this->upload->do_upload('model_image');
                $upload_data = $this->upload->data();
                $image_name = $upload_data['file_name'];
            }
        }

//slug check
        $array = array();
        $slug = newslugend($this->input->post('model'));
        $slugResult = shweta_select('slug', 'old_tractor', '', '');
        foreach ($slugResult as $b => $a) {
            $array[] = $a->slug;
        }
        $array = array_filter($array);
        if (in_array($slug, $array)) {
            $slug = $slug . (count($slugResult) + 1);
        } else {
            $slug = $slug;
        }
        $userid = '';
        $data = array(
            'email' => $this->input->post('email'),
            'mobile' => $this->input->post('mobile'),
            'pincode' => $this->input->post('pincode'),
            'name' => $this->input->post('name'),
            'state' => $this->input->post('state'),
            'city' => $this->input->post('city'),
            'date' => $date_time,
            'user_id' => $userId,
            'brand' => $this->input->post('brand'),
            'model_name' => $this->input->post('model'),
            'slug' => $slug,
            'yearpurchase' => $this->input->post('yearpurchase'),
            'price' => $this->input->post('price'),
            'image' => $image_name,
            'hours' => $this->input->post('hours'),
            'rto' => $this->input->post('rto'),
            'engincond' => $this->input->post('engincond'),
            'transcond' => $this->input->post('transcond'),
            'electriccond' => $this->input->post('electriccond'),
            'taycond' => $this->input->post('taycond'),
            'stryingcond' => $this->input->post('stryingcond'),
            'overview' => $this->input->post('overview'),
            'status' => '0',
        );
        // echo "<pre>";
        // print_r($data);
        // die;

        if ($userId != "") {
            $this->db->insert('old_tractor', $data);
            $insert_id = $this->db->insert_id();
            // $this->session->set_userdata('otherDetails',$insert_id);
            // header("Location:".$root."add-used-tractor-information");


            $sellEmail = '';
            foreach (shweta_select('email', 'old_tractor', 'id', $this->session->userdata('otherDetails')) as $raa) $sellEmail = ($raa->email);

            $sellmobile = '';
            foreach (shweta_select('mobile', 'old_tractor', 'id', $this->session->userdata('otherDetails')) as $raa) $sellmobile = ($raa->mobile);

// $userEmail='';
// foreach(shweta_select('email','user_reg','id',$this->session->userdata('review_id')) as $raa) $userEmail=($raa->email) ;
            $brandseller = '';
            foreach (shweta_select('name', 'brand', 'id', $this->input->post('brand')) as $raa) $brandseller = ($raa->name);


//mail sent
            $nameHeader = $sellEmail;
            $lineSecond = 'Please wait for admin approval';
            $lineFirst = 'Congratulations! You have successfully added used tactor in Tractor junction';
            $otherInfo = array(
                'Brand' => $brandseller,
                'Model Name' => $this->input->post('model'),
                'Price' => $this->input->post('price') . " lac",
            );
            $message = sentMailFunction($nameHeader, $lineFirst, $lineSecond, $otherInfo);
            $textmsg = 'Congratulations! You have successfully added used tactor in Tractor junction. You can check in your account ' . $sellEmail . '  Please wait for admin approval';
            smsSent($sellmobile, $textmsg);

            $subject = "Successfully Added Used Tractor";
            MailSentNow($message, $subject, $sellEmail);


// $this->session->unset_userdata('otherDetails');


            $this->session->set_userdata('messageTrue', 'used tractor added successfully. Please wait for admin approval');
            header("Location:" . $root . "sell-used-tractor");


        } else {
            $this->session->set_userdata('messageFalse', "Mail id you had entered not registred with us. Please register first then add your tractor");
            header("Location:" . $root . "sell-used-tractor");
        }

    }

    function AddTractorOtherinfoend()
    {

        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        $user_id = '';;
        $mobileNo = $this->input->post('mobNo');
        $result = shweta_select('id', 'user_reg', 'mobile', $mobileNo);
        if (empty($result)) {
            date_default_timezone_set("Asia/Kolkata");
            $date_time = $date = date('Y-m-d H:i:s');
            $data = array(
                'mobile' => $mobileNo,
                'password' => $mobileNo,
                'date_time' => $date_time,
            );
            $this->db->insert('user_reg', $data);
            $user_id = $this->db->insert_id();
            $textMessage = "Congratulations! You have successfully created a new account with Tractor junction.Your Username is :" . $mobileNo . " and Password=" . $mobileNo . "";
            smsSent($mobileNo, $textMessage);

        } else {
            foreach (shweta_select('id', 'user_reg', 'mobile', $mobileNo) as $raa) $user_id = ($raa->id);
        }

        $randNo = rand(1111, 9999);
        $textMessage = 'OTP for add old tractor on tractorjunction is ' . $randNo;
        smsSent($mobileNo, $textMessage);
        $this->session->set_userdata('mobileUserId', $user_id);
        $this->session->set_userdata('otpOldTractor', $randNo);
        $this->session->set_userdata('mobileNoOtp', $mobileNo);
        $this->session->set_userdata('messageTrue', "OTP successfully sent in your mobile no");
        header("Location:" . $_SERVER['HTTP_REFERER']);
        die;
    }

    function AddOldTRactorOtpMatch()
    {
        $otp = $this->input->post('otp');
        $mainOTp = $this->session->userdata('otpOldTractor');
        $userId = $this->session->userdata('mobileUserId');
        $mobileNo = $this->session->userdata('mobileNoOtp');
        if ($otp == $mainOTp) {
            $this->session->set_userdata('review_id', $userId);
            $this->session->unset_userdata('otpOldTractor');
            $this->session->unset_userdata('mobileNoOtp');
            $username = '';
            $state = '';
            foreach (shweta_select('username', 'user_reg', 'id', $userId) as $raa) $username = ($raa->username);
            foreach (shweta_select('state', 'user_reg', 'id', $userId) as $raa) $state = ($raa->state);
            $data = array(
                'userId' => $userId,
                'mobileNo' => $mobileNo,
                'username' => $username,
                'state' => $state,
            );
            $this->session->set_userdata('mobileUserId', $data);
        } else {
            $this->session->set_userdata('messageFalse', "OTP not match please try again");
        }
        header("Location:" . $_SERVER['HTTP_REFERER']);
        die;
    }

    function ResendOTP()
    {
        $mobileNo = $this->session->userdata('mobileNoOtp');
        $randNo = rand(1111, 9999);
        $textMessage = 'OTP for add old tractor on tractorjunction is ' . $randNo;

        smsSent($mobileNo, $textMessage);
        $this->session->set_userdata('otpOldTractor', $randNo);
        header("Location:" . $_SERVER['HTTP_REFERER']);
        die;
    }

    function addOldTractorfinal()
    {
        $image_name = '';
        if (isset($_FILES['model_image']['name'])) {
            if ($_FILES['model_image']['name'] != "") {
                $this->load->library('upload');
                $config['file_name'] = newslugend($this->input->post('model'));
                $config['upload_path'] = './images/oldTractor/';
                $config['allowed_types'] = 'jpg|jpeg|gif|png';
                $config['max_size'] = 8000;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $this->upload->initialize($config);
                $this->upload->do_upload('model_image');
                $upload_data = $this->upload->data();
                $image_name = $upload_data['file_name'];
            }


        }


//slug check
        $array = array();
        $slug = newslugend($this->input->post('model'));
        $slugResult = shweta_select('slug', 'old_tractor', '', '');
        foreach ($slugResult as $b => $a) {
            $array[] = $a->slug;
        }
        $array = array_filter($array);
        if (in_array($slug, $array)) {
            $slug = $slug . (count($slugResult) + 1);
        } else {
            $slug = $slug;
        }
        $userid = '';
        date_default_timezone_set("Asia/Kolkata");
        $date_time = $date = date('Y-m-d H:i:s');
        $data = $this->session->userdata('mobileUserId');
        $data1 = array(
            'mobile' => $data['mobileNo'],
            'name' => $this->input->post('name'),
            'state' => $this->input->post('state'),
            'city' => $this->input->post('city'),
            'date' => $date_time,
            'user_id' => $data['userId'],
            'brand' => $this->input->post('brand'),
            'model_name' => $this->input->post('model'),
            'hp' => $this->input->post('hp'),
            'cc' => $this->input->post('cc'),
            'price' => $this->input->post('price'),
            'yearpurchase' => $this->input->post('yearpurchase'),
            'overview' => $this->input->post('overview'),
            'slug' => $slug,
            'image' => $image_name,
            'status' => '0',
        );
        // echo "<pre>";
        // print_r($data1);
        // die;
        $this->db->insert('old_tractor', $data1);
        $insert_id = $this->db->insert_id();
        // $this->session->set_userdata('otherDetails',$insert_id);
        // header("Location:".$root."add-used-tractor-information");

        $textmsg = 'Congratulations! You have successfully added used tactor in Tractor junction. You can check in your account. Please wait for admin approval';
        smsSent($sellmobile, $textmsg);


        $this->session->unset_userdata('mobileUserId');
        $this->session->unset_userdata('mobileNoOtp');


        $this->session->set_userdata('messageTrue', 'used tractor added successfully. Please wait for admin approval');
        header("Location:" . $_SERVER['HTTP_REFERER']);
        die;


    }

    function addOtherinfo()
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
        $this->session->set_userdata('pageinfo', 'old');
        $this->load->view('header', $data);
        $this->load->view('addOtherinfoOldtractor');
        $this->load->view('footer');

    }


    function FilteroldTractorResult()
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
// print_r($new_array);
// die;
// print_r($key_value);
            $explode_price = array();
            $explode_hp = array();
            $all_tractor = array();
            $all_tractor_explode = array();
            $match_tractor = array();
            $condition_price = "";
            $condition_hp = "";
            $condition_brand = "";
            $condition_year = "";
            $condition_uses = "";
            $condition_state = "";
// echo "<pre>";
// print_r($new_array);
// die;

            foreach ($new_array as $key2 => $value2) {
                foreach ($value2 as $key3 => $value3) {
                    //price condition
                    if ($key3 == "price") {
                        $explode_price = explode('-', $value3);
                        $condition_price .= " price BETWEEN " . $explode_price[0] . " AND " . $explode_price[1] . " OR ";
                    } //brand condition
                    elseif ($key3 == "brand") {
                        $condition_brand .= $key3 . " = '" . $value3 . "' OR ";
                    } //yearpurchase condition
                    elseif ($key3 == "yearpurchase") {
                        $condition_year .= $key3 . " = '" . $value3 . "' OR ";
                    } //state condition
                    elseif ($key3 == "state") {
                        $condition_state .= $key3 . " = '" . $value3 . "' OR ";
                    } //hp condition	.
                    elseif ($key3 == "hp") {
                        $explode_hp = explode('-', $value3);
                        $condition_hp .= " hp.name BETWEEN " . $explode_hp[0] . " AND " . $explode_hp[1] . " OR ";
                    }

                }
            }
            $condition_new_price = rtrim($condition_price, " OR");
            $condition_new_brand = rtrim($condition_brand, " OR");
            $condition_year = rtrim($condition_year, " OR");
            $condition_new_hp = rtrim($condition_hp, " OR");
            $condition_state = rtrim($condition_state, " OR");

            $fibal_condition = "";

            if ($condition_new_price != "") {
                $fibal_condition .= " (" . $condition_new_price . " ) AND ";
            }
            if ($condition_new_brand != "") {
                $fibal_condition .= " (" . $condition_new_brand . " ) AND ";
            }
            if ($condition_year != "") {
                $fibal_condition .= " (" . $condition_year . " ) AND ";
            }
            if ($condition_new_hp != "") {
                $fibal_condition .= " (" . $condition_new_hp . " ) AND ";
            }
            if ($condition_state != "") {
                $fibal_condition .= " (" . $condition_state . " ) AND ";
            }
            $condition_final = "";
            $condition_final = rtrim($fibal_condition, " AND");
            $condition_final .= " and status='1'";

            $result = array();
            $ci =& get_instance();
            $ci->load->database();
            $ci->db->select('*');
            $ci->db->from('old_tractor');
            // $ci->db->join('hp', 'hp.id = old_tractor.hp');
            $ci->db->where($condition_final);
            $total = "";
            $query = $ci->db->get();
            $result = $query->result();
            // echo "<pre>";
            // print_r($result);
            // die;
            ?>
            <div class="col-sm-12 col-md-12">
                <?php echo oldTractorDiv($result); ?>
            </div>

            <?php
        } else {
            $condition = "status='1'";
            $result = shweta_pagination_query_new_orderby('old_tractor', '15', 'used-tractors-for-sell', $condition, 'id', 'DESC');

            ?>
            <div class="col-sm-12 col-md-12">
                <?php echo oldTractorDiv($result['result']); ?>
            </div>
            <div class="pagination" style="float:right; margin-top: 13px;">
                <ul class="pagination" style="margin:-4px 10px -23px 0px !important;">
                    <?php echo $result['links']; ?>
                </ul>
            </div>
            <?php
        }

    }

    function SrachAjax()
    {

        $result = array();
        $value = $_GET["term"];

        $condition = '';
        $condition = "model_name LIKE '%" . $value . "%'";
        $result = shweta_select_th('model_name', 'old_tractor', $condition);


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

    function SrachAjaxMain()
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

    function FindResult()
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

    function FindResultAjax()
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

        echo $root . "product/" . $id . "/" . $brand_URL;

    }

    function GetresuOldTractro()
    {
        $value = $this->input->post('tractorname1');
        $condition = '';
        if ($value != "") {
            $condition = "(old_tractor.model_name LIKE '%" . $value . "%' or brand.name LIKE '%" . $value . "%') and status='1'";

            $result = array();

            // $result=shweta_select_th('*','old_tractor',$condition);


            $ci = &get_instance();
            $ci->load->database();
            $ci->db->select('old_tractor.*,brand.name');
            $ci->db->from('old_tractor');
            $ci->db->join('brand', 'old_tractor.brand = brand.id');
            if ($condition != "") {
                $ci->db->where($condition);
            }
            $query = $ci->db->get();
            $result = $query->result();


            $slug = '';
            if (!empty($result)) {
                ?>
                <div class="col-sm-12 col-md-12">
                    <?php echo oldTractorDiv($result); ?>
                </div>
                <?php
            } else {
                ?>
                <h4 style="color:#DB4C4D;text-align:center;">No Tractor found</h4>
                <?php
            }
        } else {
            $condition = "status='1'";
            // die;
            $result = array();

            $result = shweta_pagination_query_new_orderby('old_tractor', '15', 'used-tractors-for-sell', $condition, 'id', 'DESC');

            $slug = '';
            if (!empty($result['result'])) {
                ?>
                <div class="col-sm-12 col-md-12">
                    <?php echo oldTractorDiv($result['result']); ?>
                </div>
                <div class="pagination" style="float:right; margin-top: 13px;">
                    <ul class="pagination" style="margin:-4px 10px -23px 0px !important;">
                        <?php echo $result['links']; ?>
                    </ul>
                </div>
                <?php
            } else {
                ?>
                <h4 style="color:#DB4C4D;text-align:center;">No Tractor found</h4>
                <?php
            }
        }
    }

    function GetSearchResult()
    {

        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);


        $result = array();
        $value = $this->input->post('name');
        $condition = '';
        $condition = "model_name LIKE '%" . $value . "%'";
        $result = shweta_select_th('model_name,slug', 'old_tractor', $condition);
        $slug = '';
        // echo "<pre>";
        // print_r($result);
        // die;
        if (!empty($result)) {
            foreach ($result as $value => $obj) {
                $slug = $obj->slug;
            }
            header("Location:" . $root . "used-tractor-info/" . $slug);
        } else {
            header("Location:" . $root . "buy-used-tractor");
        }
    }

    function CloseButton()
    {
        $this->session->unset_userdata('thyankYou');
        header("Location:" . $_SERVER['HTTP_REFERER']);

    }

    function sendRequest()
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        date_default_timezone_set("Asia/Kolkata");
        $date_time = $date = date('Y-m-d h:i:sa');


        $getOrder = array();
        $toNo = 0;
        $getOrder = shweta_select('*', 'purchaserequest', 'type', 'old');
        $toNo = count($getOrder);
        $toNo = $toNo + 1;
        $newNO = 0;
        $newNO = "U9160T" . $toNo;
        // die;
		        $this->load->model("Front_model");
        date_default_timezone_set("Asia/Kolkata");
        $date_time = $date = date('Y-m-d H:i:s');
		$user_reg = $this->Front_model->get_result_check('id', 'user_reg', 'mobile', $this->input->post('contact'));
				if (!empty($user_reg)) {
					$userId = '';
					foreach ($user_reg as $key => $value) {
					$userId = $value->id;
					}
				
				}else{
						$data = array(
						'username' => $this->input->post('name'),
						'email' => $this->input->post('email'),
						'mobile' => $this->input->post('contact'),
						'state' => $this->input->post('state'),
						'location' => $this->input->post('city'),
						'date_time' => $date_time,
						);
						$this->db->insert('user_reg', $data);
						$userId = $this->db->insert_id();
				}
		
		
        $data = array(
            'name' => $this->input->post('name'),
            'user_id' => $userId,
            'contact' => $this->input->post('contact'),
            'email' => $this->input->post('email'),
            'address' => $this->input->post('address'),
            'pincode' => $this->input->post('pincode'),
            'state' => $this->input->post('state'),
            'city' => $this->input->post('city'),
            'requestfor' => $this->input->post('id_tractor'),
            'status' => '0',
            'type' => 'old',
            'date' => $date_time,
            'reqNo' => $newNO,
        );
 

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
        foreach (shweta_select('email,name,city,state,mobile,pincode,user_id', 'old_tractor', 'id', $this->input->post('id_tractor')) as $raa) {
            $sellerEmail = ($raa->email);
            $Sellername = ($raa->name);
            $Sellercity = ($raa->city);
            $Sellerstate = ($raa->state);
            $Sellermobile = ($raa->mobile);
            $Sellerpincode = ($raa->pincode);
            $userId = ($raa->user_id);


        }
		// $Sellermobile="7737663306";
        foreach (shweta_select('name', 'cities', 'id', $Sellercity) as $raa) $Sellercity = ($raa->name);
        foreach (shweta_select('name', 'states', 'id', $Sellerstate) as $raa) $Sellerstate = ($raa->name);


        $TractorModel = '';
        foreach (shweta_select('model_name', 'old_tractor', 'id', $this->input->post('id_tractor')) as $raa) $TractorModel = ($raa->model_name);
        $TractorBrand = '';
        foreach (shweta_select('brand', 'old_tractor', 'id', $this->input->post('id_tractor')) as $raa) $TractorBrand = ($raa->brand);
        $brandName = '';
        foreach (shweta_select('name', 'brand', 'id', $TractorBrand) as $raa) $brandName = ($raa->name);
        $StateName = '';
        foreach (shweta_select('name', 'states', 'id', $this->input->post('state')) as $raa) $StateName = ($raa->name);
        $CityName = '';
        foreach (shweta_select('name', 'cities', 'id', $this->input->post('city')) as $raa) $CityName = ($raa->name);

//mail sent seller
       $nameHeader = $sellerEmail;
        $lineSecond = 'Below are the buyer information...';
        $lineFirst = $buyerEmail . ' has request to purchase your <strong>' . $brandName . ' ' . $TractorModel . '</strong> tractor in Tractor junction';
        $otherInfo = array(
            'Request Date' => date("d-M-Y", strtotime($date_time)),
            'Tractor Brand' => ucfirst($brandName),
            'Tractor Model Name' => $TractorModel,
            'Name' => ucfirst($this->input->post('name')),
            'Contact No' => $this->input->post('contact'),
            'Email-id' => $this->input->post('email'),
            'Pincode' => $this->input->post('pincode'),
            'State' => $StateName,
            'City' => $CityName,
            'Address' => $this->input->post('address'),


        );
        $message = sentMailFunction($nameHeader, $lineFirst, $lineSecond, $otherInfo);
	 
        $subject = "Buyer Info For request Your Used Tractor at Tractor Junction";
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
            'Seller Pincode' => $Sellerpincode,


        );
		$message = sentMailFunction($toSend, $lineFirst, $lineSecond, $otherInfo);
 
        $subject = "Seller Info For request Used Tractor at Tractor Junction";
        MailSentNow($message, $subject, $toSend);

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
 
        $subject = "Seller & buyer Info For request Used Tractor at Tractor Junction";
        MailSentNow($message, $subject, $nameHeader);
//end mail

        //sent sms buyer
      $txtmsg = "Thank you for showing your interest. Tractor informations are, Model : " . ucfirst($brandName." ".$TractorModel) . ", Seller Contact no : " . $Sellermobile .". We are happy to help you. Regards tractorjunction.com";
  
		// echo "<br>";
        $mobile = $this->input->post('contact');
        smsSent($mobile, $txtmsg);
        //sent sms seller
        // echo "<br>";
         $txtmsg = ucfirst($this->input->post('name')) . " request to buy your tractor  " . ucfirst($brandName) . " " . ucfirst($TractorModel) . ". You can contact " . $this->input->post('contact') . ". We are happy to help you. Regards tractorjunction.com";
        
		// echo "<br>";
        $mobile = $this->input->post('contact');
        smsSent($mobile, $txtmsg);


        $this->db->insert('purchaserequest', $data);
        $insert_id = $this->db->insert_id();

        $this->session->set_userdata('thyankYou', $insert_id);
$url=$this->input->post('actual_link');
        header("Location:" . $url);
		die;
    }
}

?>