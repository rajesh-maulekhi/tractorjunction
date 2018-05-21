<?php

class Blog extends CI_Controller
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

    function index()
    {
        $this->load->view('admins/header');
        $this->load->view('admins/add_blog');
        // $this->load->view('admins/footer');
    }
    function ShowBlog()
    {
		$this->load->model("form_model");
        $config = array();
        $config["base_url"] = base_url() . "Blog/ShowBlog";
        $config["total_rows"] = $this->db->count_all("blog");
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
        $result['result'] = $this->form_model->show_blog($config["per_page"], $page);
        $result["links"] = $this->pagination->create_links();
     
	 
        $this->load->view('admins/header');
        $this->load->view('admins/show_blog',$result);
        $this->load->view('admins/footer');
    }
	function AddBlogEnd(){
		date_default_timezone_set("Asia/Kolkata");
		$image_name='';
		   if (($_FILES['image_name']['name']) != "") {
            $this->load->library('upload');
            // required configuration..
            $config['file_name'] = newslugend($this->input->post('title'));
            $config['upload_path'] = './upload/blog_image/';
            $config['allowed_types'] = 'jpg|jpeg|gif|png';
            $config['max_size'] = 80000000;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $this->upload->initialize($config);
            $this->upload->do_upload('image_name');
            $upload_data = $this->upload->data();
            $image_name = $upload_data['file_name'];

        }
		
		$meta_tags=array(
		'meta_title'=>$this->input->post('meta_title'),
		'meta_keyword'=>$this->input->post('meta_keyword'),
		'meta_description'=>$this->input->post('meta_description'),
		);
 
		$seo_tags='';
		$seo_tags=base64_encode(serialize($meta_tags));
		$data=array(
		'title'=>$this->input->post('title'),
		'slug'=>newslug_end($this->input->post('slug')),
		'blog_date'=>date("Y-m-d", strtotime($this->input->post('date'))),
		'description'=>$this->input->post('description'),
		'image_name'=>$image_name,
		'seo_tags'=>$seo_tags
		);

		   shweta_insert_form('blog', $data);
        $this->session->set_userdata('dataupdate', 'Blog added successfully');
		$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        header("Location: ".$root."admins/Blog");
		die;
	}
	function DeleteBlog($id){
		$data=array(
		'id'=>$id
		);
		$this->Front_model->delete_data($data,'blog');
		        $this->session->set_userdata('dataupdate', 'Blog Delete successfully');
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

header("Location: ".$root."admins/Blog/ShowBlog");
die;
	}
	function EditBlog($id){
        $result['result'] = shweta_select('*', 'blog', 'id', $id);
     $this->load->view('admins/header');
        $this->load->view('admins/edit_blog',$result);
        // $this->load->view('admins/footer');
   
   }
   function UpdateBlogEnd(){
	   	$image_name='';
		   if (($_FILES['image_name']['name']) != "") {
		   $this->load->library('upload');
            $config['file_name'] = newslugend($this->input->post('title'));
            $config['upload_path'] = './upload/blog_image/';
            $config['allowed_types'] = 'jpg|jpeg|gif|png';
            $config['max_size'] = 80000000;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $this->upload->initialize($config);
            $this->upload->do_upload('image_name');
            $upload_data = $this->upload->data();
            $image_name = $upload_data['file_name'];

        }else{
			$image_name=$this->input->post('old_image');
		}
			$meta_tags=array(
		'meta_title'=>$this->input->post('meta_title'),
		'meta_keyword'=>$this->input->post('meta_keyword'),
		'meta_description'=>$this->input->post('meta_description'),
		);
 
		$seo_tags='';
		$seo_tags=base64_encode(serialize($meta_tags));
		$data=array(
		'title'=>$this->input->post('title'),
		'slug'=>newslug_end($this->input->post('slug')),
		'blog_date'=>date("Y-m-d", strtotime($this->input->post('date'))),
		'description'=>$this->input->post('description'),
		'image_name'=>$image_name,
		'seo_tags'=>$seo_tags
		);
		    shweta_update('blog', $data, 'id', $this->input->post('id_val'));
		        $this->session->set_userdata('dataupdate', 'Blog Update successfully');
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

header("Location: ".$root."admins/Blog/ShowBlog");
die;
		
   }
	
}

?>