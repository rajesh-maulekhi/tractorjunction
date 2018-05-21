<?php

class Questions extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
              $this->load->library('javascript');
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
        $this->load->library('image_lib');
        $this->load->database();
        $this->load->helper('shweta');
        $this->load->helper('query');
		   $this->load->helper('url');
        $this->load->library("pagination");
			$this->load->model("Front_model");
    }
function DeleteQues($id){
		$data=array(
		'id'=>$id
		);
		$data2=array(
		'question_id'=>$id
		);
		$this->Front_model->delete_data($data,'questions');
		$this->Front_model->delete_data($data2,'ans_of_question');
		        $this->session->set_userdata('dataupdate', 'Question Delete successfully');
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

header("Location: ".$root."admins/Questions/ShowAAllQuestion");
die;
	}
    function index()
    {
        $this->load->view('admins/header');
        $this->load->view('admins/add_question');
        $this->load->view('admins/footer');
    }
	
    function ShowAAllQuestion()
    {
		$this->load->model("form_model");
        $config = array();
        $config["base_url"] = base_url() . "Questions/ShowAAllQuestion";
        $config["total_rows"] = $this->db->count_all("questions");
        $config["per_page"] = 20;
        $config["page_query_string"] = TRUE;
        $config['first_tag_open'] = $config['last_tag_open'] = $config['next_tag_open'] = $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
        $config['first_tag_close'] = $config['last_tag_close'] = $config['next_tag_close'] = $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li><span><b>";
        $config['cur_tag_close'] = "</b></span></li>";
        $config['first_link'] = '&laquo; First';
        $config['last_link'] = 'Last &raquo;';
        $config['use_page_numbers'] = true;
        $this->pagination->initialize($config);
        $temp = strstr($_SERVER['REQUEST_URI'], '=');
        $temp = str_replace("=", "", $temp);
        $temp = $temp - 1;
        if ($temp > 0)
            $page = $temp * $config["per_page"];
        else
            $page = 0;
        $result['result'] = $this->form_model->show_ResultPag($config["per_page"], $page,'questions');
        $result["links"] = $this->pagination->create_links();
     
	 
        $this->load->view('admins/header');
        $this->load->view('admins/show_question',$result);
        $this->load->view('admins/footer');
    }
	function AddQuestionEnd(){
			date_default_timezone_set("Asia/Kolkata");
		$data=array(
		'question'=>$this->input->post('question'),
		'publish_by'=>'admin',
		);
		
		   shweta_insert_form('questions', $data);
         $this->session->set_userdata('dataupdate', 'Question added successfully');
		$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        header("Location: ".$root."admins/Questions");
		die;

	}
	
}

?>