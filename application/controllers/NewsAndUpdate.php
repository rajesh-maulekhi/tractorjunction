<?php

class NewsAndUpdate extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('shweta');
        $this->load->helper('form');
        $this->load->library('session');
		      $this->load->helper('query');
			   $this->load->model("Front_model");
			     $this->load->database();
    }

    function index()
    {
        // $id = $this->input->post('id_val');
        $this->session->set_userdata('pageinfo', 'offer');
 
		$meta=Meta_title_description('tractor_news');
        $data11 = array();
        $data11 = array_merge($data11, $meta);
        $this->load->view('header', $data11);
        $this->load->view('newsAndUpdate');
        $this->load->view('footer');

    }

    function singlenews($slug, $id)
    {
		$totalCount=0;
		$totalCount = $this->Front_model->getNewsCount('id',$id);
		$totalCount=$totalCount+1;
		$this->Front_model->updateNewsViewCount($data=array('total_view'=>$totalCount),'id',$id);
	 
		
	 
        $result1 = array();
		$result1['totalCount']=$totalCount;
        $result1['result1'] = shweta_select('*', 'news', 'id', $id);
        $meta = array(
            'meta_title' => 'Tractors News, Agriculture and Farming News and Updates India- TractorJunction',
            'meta_keywords' => "",
            'meta_description' => "",
            'meta_robots' => 'all',
            'extra_headers' => ''

        );
        $data11 = array();
        $data11 = array_merge($data11, $meta);
        $this->load->view('header', $data11);
        $this->load->view('single_newsandUpdate', $result1);
        $this->load->view('footer');

    }

    function MoreNewsTractor()
    {
        $limitcal = 0;
        if ($this->session->userdata('viewmoresession3')) {
            $limitcal = $this->session->userdata('viewmoresession3') + 3;
            $this->session->set_userdata('viewmoresession3', $limitcal);

        }
        $condition = "status='1' and type='tractor'";
        $result = resultOrdrByWhere('*', 'news', $condition, 'id', 'DESC', $limitcal);
        $totalval = count(resultOrdrByWhere('*', 'news', $condition, 'id', 'DESC', ''));
        echo NewsHtmlDiv($result, $totalval, 'GetMoreNews', 'filter_result');

    }

    function MoreNewsTractorAgree()
    {
        $limitcal = 0;
        if ($this->session->userdata('viewmoresession3')) {
            $limitcal = $this->session->userdata('viewmoresession3') + 3;
            $this->session->set_userdata('viewmoresession3', $limitcal);

        }
        $condition = "status='1' and type='agriculture'";
        $result = resultOrdrByWhere('*', 'news', $condition, 'id', 'DESC', $limitcal);
        $totalval = count(resultOrdrByWhere('*', 'news', $condition, 'id', 'DESC', ''));
        echo NewsHtmlDiv($result, $totalval, 'GetMoreNews', 'filter_result2');

    }

}

?>