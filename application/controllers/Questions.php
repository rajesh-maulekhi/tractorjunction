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

    function ShowAllQuestions()
    {
		    $this->load->model("form_model");
        $config = array();
        $config["base_url"] = base_url() . "questionanswer";
        $config["total_rows"] = $this->db->count_all("questions");
	  
        $config["per_page"] = 10;
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
        $temp=(int)$temp;
		$temp = $temp - 1;
        
		if ($temp > 0)
            $page = $temp * $config["per_page"];
        else
            $page = 0;
        $result['result'] = $this->form_model->show_question($config["per_page"], $page);
        $result["links"] = $this->pagination->create_links();
  // echo "<pre>";
  // print_r($result['result']);
  // die;
        $this->load->view('header');
        $this->load->view('show_question',$result);
        $this->load->view('footer');
    }
	function AddQuestionEnd(){
			$data=array(
		'publish_by'=>$this->input->post('name'),
		'publish_mob'=>$this->input->post('publish_mob'),
		'question'=>$this->input->post('question'),
		);
shweta_insert_form('questions', $data);
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

$this->session->set_userdata('newsesson', 'Thank you! Your question add successfully');

header('Location: '.$root.'questionanswer');
die;

	}
	function AddAnsEnd(){
		$url=$this->input->post('id_que');
			$data=array(
		'question_id'=>$this->input->post('question_id'),
		'name_answer'=>$this->input->post('name'),
		'mobile_no'=>$this->input->post('publish_mob'),
		'answer'=>$this->input->post('question'),
		'status'=>'1',
		);
shweta_insert_form('ans_of_question', $data);
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

$this->session->set_userdata('newsesson', 'Thank you! Your answer post successfully');

header('Location: '.$url);
die;

	}
	function SingleQuestion($queId,$que){
		$result['result']=$this->Front_model->get_result_fields('*',$data=array('id'=>$queId),'questions');
		$result['answer_of_que']=$this->Front_model->get_result_fieldsOrder('*',$data=array('question_id'=>$queId,'status'=>'1'),'ans_of_question');

		$title= trim($result['result'][0]->question);
		$title=$title." - TractorJunction";
        $meta = array(
            'meta_title' => $title,
            'meta_keywords' => "",
            'meta_description' => "",
            'meta_robots' => 'all',
            'extra_headers' => ''

        );
        $data = array();
        $data = array_merge($data, $meta);
        $this->load->view('header', $data);
        $this->load->view('single_question',$result);
        $this->load->view('footer');
	}
	
}

?>