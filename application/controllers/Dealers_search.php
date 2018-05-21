<?php

class Dealers_search extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('shweta_helper');
        $this->load->helper('query');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('Front_model');
        $this->load->database();
    }
function findbybrand(){
		$root = "http://".$_SERVER['HTTP_HOST'];
	$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
	header('Location: '.$root.'find-tractor-dealers');
	die;
}
    function index()
    {
        $condition = '';
        if (isset($_POST['brand'])) {

            $authorize = $this->input->post('brand');
            $condition = "authorize='" . $authorize . "'";

            if (isset($_POST['pincode']) && ($_POST['pincode'] != '')) {
                $pincode = $_POST['pincode'];
                $condition .= " and pin='" . $pincode . "'";

                $result['search'] = $pincode;
            }
        }


        $this->db->select('dealers.*,brand.*');
        $this->db->from('dealers');
        $this->db->join('brand', 'dealers.authorize = brand.id');
        if ($condition == '') {
            $this->db->limit(10, 0);
            $this->db->order_by('id', 'RANDOM');

        }
        if ($condition != '') {
            $this->db->where($condition);
        }
        $query = $this->db->get();
        $result['data'] = $query->result();

        $this->session->set_userdata('pageinfo', 'morae');

      
			$meta=Meta_title_description('find_tractor_dealers');
  
        $data11 = array();
        $data11 = array_merge($data11, $meta);
        $this->load->view('header', $data11);
        $this->load->view('dealers_search', $result);

        $this->load->view('footer');
    }

}

?>