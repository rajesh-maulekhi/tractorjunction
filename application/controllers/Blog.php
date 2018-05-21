<?php

class Blog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('shweta');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library("pagination");
		    $this->load->model("form_model");
		    $this->load->model("Front_model");
    }

    function index()
    {
    $this->load->model("form_model");
        $config = array();
        $config["base_url"] = base_url() . "blog";
        $config["total_rows"] = $this->db->count_all("blog");
        $config["per_page"] = 3;
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
        $result['result'] = $this->form_model->show_blog($config["per_page"], $page);
        $result["links"] = $this->pagination->create_links();
        $result['popular_result'] = $this->form_model->show_blog(4, 0);

   			$meta=Meta_title_description('blog_page');
  
        $data = array();
        $data = array_merge($data, $meta);
       
        $this->load->view('header', $data);
  
        $this->load->view('blog',$result);
        $this->load->view('footer');

    }
function SingleBlog($slug){
	
	$totalCount=0;
		$totalCount = $this->Front_model->getBBlogTotalCount('slug',$slug);
		$totalCount=$totalCount+1;
		$this->Front_model->updateBlogViewCount($data=array('total_view'=>$totalCount),'slug',$slug);
		

	$result['totalCount']=$totalCount;
	$cond="slug='".$slug."'";
	  $result['result'] = shweta_select_th('*', 'blog', $cond);
	    
	    $seo_tags=$result['result'][0]->seo_tags;
		$meta_tag=unserialize(base64_decode($seo_tags));
	
	   $meta = array(
            'meta_title' => $meta_tag['meta_title'],
            'meta_keywords' => $meta_tag['meta_keyword'],
            'meta_description' => $meta_tag['meta_description'],
            'meta_robots' => 'all',
            'extra_headers' => ''

        );
	 
        $data = array();
        $data = array_merge($data, $meta); 
       $result['popular_result'] = $this->form_model->show_blog(4, 0);
        $this->load->view('header', $data);
        $this->load->view('single_blog',$result);
        $this->load->view('footer');
	}
}

?>