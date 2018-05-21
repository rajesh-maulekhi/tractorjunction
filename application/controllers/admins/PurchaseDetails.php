<?php

class PurchaseDetails extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('shweta');
        $this->load->database();
    }

    function index()
    {
        $this->load->view('admins/header');
        $this->load->view('admins/purchase_oldtractor');
        $this->load->view('admins/footer');
    }

    function replayConfirmedOldTractor($id, $status)
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        $fil = array(
            'status' => $status,
        );
        shweta_update('purchaserequest', $fil, 'id', $id);
        $this->session->set_userdata('dataupdate', 'Deatils Updated successfully');
        header("location:" . $root . "admins/buy-old-tractors-details");
    }

    function singleOld($id)
    {
        $result = array();
        $result['result'] = shweta_select('*', 'purchaserequest', 'id', $id);
        $this->load->view('admins/header');
        $this->load->view('admins/purchase_oldtractorSingle', $result);
        $this->load->view('admins/footer');
    }

    function ListRentTractorDetails()
    {
        $this->load->view('admins/header');
        $this->load->view('admins/purchase_renttractor');
        $this->load->view('admins/footer');
    }

    function replayConfirmedRentTractor($id, $status)
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        $fil = array(
            'status' => $status,
        );
        shweta_update('purchaserequest', $fil, 'id', $id);
        $this->session->set_userdata('dataupdate', 'Deatils Updated successfully');
        header("location:" . $root . "admins/buy-rent-tractors-details");
    }

    function singleRent($id)
    {
        $result = array();
        $result['result'] = shweta_select('*', 'purchaserequest', 'id', $id);
        $this->load->view('admins/header');
        $this->load->view('admins/purchase_renttractorSingle', $result);
        $this->load->view('admins/footer');
    }

    function ListImplementTractorDetails()
    {
        $this->load->view('admins/header');
        $this->load->view('admins/purchase_implementTractor');
        $this->load->view('admins/footer');
    }

    function singleimplemnt($id)
    {
        $result = array();
        $result['result'] = shweta_select('*', 'purchaserequest', 'id', $id);
        $this->load->view('admins/header');
        $this->load->view('admins/purchase_ImplementTractorSingle', $result);
        $this->load->view('admins/footer');
    }
}

?>