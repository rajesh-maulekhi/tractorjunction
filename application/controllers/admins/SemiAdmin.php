<?php

class SemiAdmin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('shweta');
        $this->load->database();
    }

    function AddAdmin()
    {
        $this->load->view('admins/header');
        $this->load->view('admins/add_admin');
        $this->load->view('admins/footer');
    }

    function ShowAdmin()
    {
        $result['result'] = shweta_select('*', 'user_reg', 'user_type', 'semiadmin');
        $this->load->view('admins/header');
        $this->load->view('admins/show_admin', $result);
        $this->load->view('admins/footer');
    }

    function AddAdminEnd()
    {
        date_default_timezone_set("Asia/Kolkata");

        $name = $this->input->post('name');
        $location = $this->input->post('location');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $date_time = $date = date('Y-m-d H:i:s');
        $data = array(
            'username' => $name,
            'password' => $password,
            'location' => $location,
            'mobile' => $this->input->post('mobile'),
            'state' => $this->input->post('states'),
            'date_time' => $date_time,
            'email' => $email,
            'user_type' => 'semiadmin',
        );
        // echo "<pre>";
        // print_r($data);
        // die;
        $result = shweta_select('email', 'user_reg', 'email', $email);
        if (empty($result)) {


            shweta_insert_form('user_reg', $data);
            $this->session->set_userdata('dataupdate', "Successfully registered...! We are happy to serve you");


//mail sent
            $nameHeader = $email;
            $lineSecond = '';
            $lineFirst = 'Congratulations! You have successfully created a new account with Tractor junction';
            $otherInfo = array(
                'Email-Id' => $email,
                'Name' => $name,
                'location' => $location,
                'Mobile No' => $this->input->post('mobile'),
            );

            $message = sentMailFunction($nameHeader, $lineFirst, $lineSecond, $otherInfo);


            $subject = "Successfully registration";
            MailSentNow($message, $subject, $email);
            $textMessage = "Congratulations! You have successfully created a new account with Tractor junction.Your E-mail:" . $email . " and Password=" . $password . "";
            smsSent($this->input->post('mobile'), $textMessage);

            $result1 = array();
            $result1 = shweta_select('id', 'user_reg', 'email', $email);
            foreach ($result1 as $aa => $rr) {
                $this->session->set_userdata('review_id', $rr->id);
            }
        } else {
            $this->session->set_userdata('dataupdate', "Email already registered...! Please enter different E-mail");
        }
        header("location:" . $_SERVER['HTTP_REFERER']);
    }

    function AdUsedTractorEnd()
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
        $this->load->view('addRentTractor_semiAdmin');
        $this->load->view('footer');

    }

    function AdUsedTractorForSell()
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
        $this->load->view('addOldTractor_semiAdmin');
        $this->load->view('footer');

    }

    function AddTractor()
    {

        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        date_default_timezone_set("Asia/Kolkata");
        $date_time = $date = date('Y-m-d');


        $userId = '';
        $result = array();
        $result = shweta_select('*', 'user_reg', 'mobile', $this->input->post('mobile'));
        if (!empty($result)) {


            foreach (shweta_select('id', 'user_reg', 'mobile', $this->input->post('mobile')) as $raa) $userId = ($raa->id);

        } else {

            $passwordNew = $this->input->post('name') . rand(99, 9999);

            $data2 = array(
                'username' => $this->input->post('name'),
                'password' => $passwordNew,
                'location' => $this->input->post('city'),
                'mobile' => $this->input->post('mobile'),
                'state' => $this->input->post('state'),
                'date_time' => $date_time,
                'email' => $this->input->post('email'),
            );
            $this->db->insert('user_reg', $data2);
            $userId = $this->db->insert_id();
//sms user reg
            $txtmsg = "Thank you for join TractorJunction.Your username is: " . $this->input->post('mobile') . " and Password: " . $passwordNew . "
. We are happy to help you. Regards tractorjunction.com";
            $mobile = $this->input->post('mobile');
            smsSent($mobile, $txtmsg);
//
        }


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
            'who_added' => $this->session->userdata('review_id'),
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

//Email sent user	


            $nameHeader = '';
            $lineSecond = '';
            $brandseller = '';
            foreach (shweta_select('name', 'brand', 'id', $this->input->post('brand')) as $raa) $brandseller = ($raa->name);
            $nameHeader = $this->input->post('email');
            $lineFirst = 'Congratulations! You have successfully added a ' . $rent_tractorValue . ' for rent in TractorJunction';
            $otherInfo = array(
                'Brand' => ucfirst($brandseller),
                'Model Name' => ucfirst($this->input->post('model')),
                'Rent type' => ucfirst($rent_tractorValue),
            );
            $subject = "Successfully Added  product for RENT";
            $message = sentMailFunction($nameHeader, $lineFirst, $lineSecond, $otherInfo);
        }
//sms sent user product
        $txtmsg = "Thank you for join TractorJunction.Your product successfully added on TractorJunction.com.You can check in your profile
. We are happy to help you.";
        $mobile = $this->input->post('mobile');
        smsSent($mobile, $txtmsg);

//sms sent Admin product
        $txtmsg = "Product successfully added. We are happy to help you. Regards tractorjunction.com";
        $mobile = '';
        foreach (shweta_select('mobile', 'user_reg', 'id', $this->session->userdata('review_id')) as $raa) $mobile = ($raa->mobile);
        smsSent($mobile, $txtmsg);


// shweta_insert_form('rent_tractor',$data);
        $this->session->set_userdata('messageTrue', 'Rent tractor added Successfully');
        header("Location:" . $root . "add-used-tractor-sell-admin");

    }

    function AddTractorForSell()
    {

        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        date_default_timezone_set("Asia/Kolkata");
        $date_time = $date = date('Y-m-d');


        $userId = '';
        $result = array();
        $result = shweta_select('*', 'user_reg', 'mobile', $this->input->post('mobile'));
        if (!empty($result)) {


            foreach (shweta_select('id', 'user_reg', 'mobile', $this->input->post('mobile')) as $raa) $userId = ($raa->id);

        } else {

            $passwordNew = $this->input->post('name') . rand(99, 9999);

            $data2 = array(
                'username' => $this->input->post('name'),
                'password' => $passwordNew,
                'location' => $this->input->post('city'),
                'mobile' => $this->input->post('mobile'),
                'state' => $this->input->post('state'),
                'date_time' => $date_time,
                'email' => $this->input->post('email'),
            );
            $this->db->insert('user_reg', $data2);
            $userId = $this->db->insert_id();
//sms user reg
            $txtmsg = "Thank you for join TractorJunction.Your username is: " . $this->input->post('mobile') . " and Password: " . $passwordNew . "
. We are happy to help you. Regards tractorjunction.com";
            $mobile = $this->input->post('mobile');
            smsSent($mobile, $txtmsg);
//
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
        date_default_timezone_set("Asia/Kolkata");
        $date_time = $date = date('Y-m-d');

        $data1 = array(
            'email' => $this->input->post('email'),
            'mobile' => $this->input->post('mobile'),
            'name' => $this->input->post('name'),
            'state' => $this->input->post('state'),
            'city' => $this->input->post('city'),
            'user_id' => $userId,
            'brand' => $this->input->post('brand'),
            'model_name' => $this->input->post('model'),
            'slug' => $slug,
            'yearpurchase' => $this->input->post('yearpurchase'),
            'price' => $this->input->post('price'),
            'image' => $image_name,
            'hours' => $this->input->post('hours'),
            'rto' => $this->input->post('rto'),
            'engin' => $this->input->post('engin'),
            'transcond' => $this->input->post('transcond'),
            'electriccond' => $this->input->post('electriccond'),
            'taycond' => $this->input->post('taycond'),
            'stryingcond' => $this->input->post('stryingcond'),
            'overview' => $this->input->post('overview'),
            'date' => $date_time,
            'status' => 1,
            'who_added' => $this->session->userdata('review_id'),
        );


        shweta_insert_form('old_tractor', $data1);

//Email sent user	


        $nameHeader = '';
        $lineSecond = '';
        $brandseller = '';
        foreach (shweta_select('name', 'brand', 'id', $this->input->post('brand')) as $raa) $brandseller = ($raa->name);
        $nameHeader = $this->input->post('email');
        $lineFirst = 'Congratulations! You have successfully added a product for sell in TractorJunction';
        $otherInfo = array(
            'Brand' => ucfirst($brandseller),
            'Model Name' => ucfirst($this->input->post('model')),
        );
        $subject = "Successfully Added  Tractor for SELL";
        $message = sentMailFunction($nameHeader, $lineFirst, $lineSecond, $otherInfo);

//sms sent user product
        $txtmsg = "Thank you for join TractorJunction.Your Tractor successfully added on TractorJunction.com.You can check in your profile
. We are happy to help you. Regards tractorjunction.com";
        $mobile = $this->input->post('mobile');
        smsSent($mobile, $txtmsg);

//sms sent Admin product
        $txtmsg = "Tractor successfully added. We are happy to help you. Regards tractorjunction.com";
        $mobile = '';
        foreach (shweta_select('mobile', 'user_reg', 'id', $this->session->userdata('review_id')) as $raa) $mobile = ($raa->mobile);
        smsSent($mobile, $txtmsg);


// shweta_insert_form('rent_tractor',$data);
        $this->session->set_userdata('messageTrue', 'Used tractor added Successfully');
        header("Location:" . $root . "add-used-tractor-sell-admin");

    }


}

?>