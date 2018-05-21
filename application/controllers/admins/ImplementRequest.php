<?php

class ImplementRequest extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('shweta');
        $this->load->database();
    }

    function harvesterrequest()
    {
		$result['page_type']="Harvester on road Request";
$condition = "req_type='harvester' and request_for='on_road_request'";
$result['result'] = shweta_pagination_query_new_orderby('onroad_request_harvester', '20', 'admins/harvester-on-road-request', $condition, 'date_time', 'DESC');
		
        $this->load->view('admins/header');
        $this->load->view('admins/view_harvesterrequest',$result);
        $this->load->view('admins/footer');
    }

    function harvesterrequestDemo()
    {
		$result['page_type']="Harvester Demo Request";
$condition = "req_type='harvester' and request_for='demo_request'";
$result['result'] = shweta_pagination_query_new_orderby('onroad_request_harvester', '20', 'admins/harvester-demo-request', $condition, 'date_time', 'DESC');
		
        $this->load->view('admins/header');
        $this->load->view('admins/view_harvesterrequest',$result);
        $this->load->view('admins/footer');
    }
    function implementonroadReq()
    {
	$result['page_type']="Implement on road Request";
$condition = "req_type='implement' and request_for='on_road_request'";
$result['result'] = shweta_pagination_query_new_orderby('onroad_request_harvester', '20', 'admins/implement-on-road-request', $condition, 'date_time', 'DESC');
		
        $this->load->view('admins/header');
        $this->load->view('admins/view_harvesterrequest',$result);
        $this->load->view('admins/footer');
    }
    function implementDemoReq()
    {
	$result['page_type']="Implement Demo Request";
$condition = "req_type='implement' and request_for='demo_request'";
$result['result'] = shweta_pagination_query_new_orderby('onroad_request_harvester', '20', 'admins/implement-demo-request', $condition, 'date_time', 'DESC');
		
        $this->load->view('admins/header');
        $this->load->view('admins/view_harvesterrequest',$result);
        $this->load->view('admins/footer');
    }

    function Implementrequest()
    {
        $this->load->view('admins/header');
        $this->load->view('admins/view_Implementrequest');
        $this->load->view('admins/footer');
    }

    function ShowSingleHArvesterRequest($id)
    {

        $result['result'] = shweta_select('*', 'implement_req', 'id', $id);
        $this->load->view('admins/header');
        $this->load->view('admins/view_harvesterrequestSingle', $result);
        $this->load->view('admins/footer');
    }

    function ReplySingleHArvesterRequest($id)
    {

        $result['result'] = shweta_select('*', 'implement_req', 'id', $id);
        $this->load->view('admins/header');
        $this->load->view('admins/reply_harvesterrequest', $result);
        $this->load->view('admins/footer');
    }

    function ReplyReqHarvester()
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        $fil = array(
            'message' => ($this->input->post('message')),
            'status' => 1,
        );
        shweta_update('implement_req', $fil, 'id', $this->input->post('id_req'));
        $mobile = '';
        $email = '';
        foreach (shweta_select('email,mobile', 'user_reg', 'id', $this->input->post('userID')) as $raa) {
            $email = ($raa->email);
            $mobile = ($raa->mobile);
        }
        $brand_name = '';
        $Model_name = '';
        $slug = '';
        if ($this->input->post('req_type') == "harvester") {
            foreach (shweta_select('brand,model_name,slug', 'harvester', 'id', $this->input->post('impID')) as $raa) {
                foreach (shweta_select('name', 'brand', 'id', $raa->brand) as $raa1) $brand_name = ucfirst($raa1->name);
                $Model_name = $raa->model_name;
            }
        } else {
            foreach (shweta_select('brand,model_name,slug', 'new_implement', 'id', $this->input->post('impID')) as $raa) {
                foreach (shweta_select('name', 'brand', 'id', $raa->brand) as $raa1) $brand_name = ucfirst($raa1->name);
                $Model_name = $raa->model_name;
            }
        }

//mail sent
        $nameHeader = $email;
        $lineSecond = $this->input->post('message');
        $lineFirst = 'Thank you! For you are showing intrest at Tractor junction';
        $otherInfo = array(
            'Request for brand' => $brand_name,
            'Request for model' => $Model_name,
        );
        $message = sentMailFunction($nameHeader, $lineFirst, $lineSecond, $otherInfo);

        $subject = "Request Reply";
        MailSentNow($message, $subject, $nameHeader);

        $txtmsg = "Reply of request for " . $brand_name . " " . $Model_name . ".Please check your mailid for full details";
// echo $mobile;
        // die;
        smsSent($mobile, $txtmsg);
        $this->session->set_userdata('dataupdate', 'successfully sent mail');
        if ($this->input->post('req_type') == "harvester") {
            header("Location:" . $root . 'admins/harvester-request');
        } else {
            header("Location:" . $root . 'admins/implement-request');
        }
    }

    function DeteleReq($id)
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        shweta_delete('implement_req', 'id', $id);
        $this->session->set_userdata('dataupdate', 'Request delete Successully');
        header("Location:" . $_SERVER['HTTP_REFERER']);
    }


}

?>