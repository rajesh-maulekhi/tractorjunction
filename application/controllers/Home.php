<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->library('session');
        $this->load->database();
        $this->load->helper('shweta');
        $this->load->helper('query');
        $this->load->model('Front_model');
    }
    
function AdsSubmit($brand_id,$page_name,$brand_name){
    $ip_address= getUserIP();
    $data=array(
    'ip_address'=>$ip_address,
    'brand_id'=>$brand_id,
    'page_name'=>$page_name,
    );
        $root = "http://".$_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
    if($brand_id == "55"){
    $this->db->insert('vendor_ads_data',$data); 
                header("Location: https://www.mahindratractor.com/yuvo.aspx");
    die;
    }else{
    $this->db->insert('vendor_ads_data',$data); 
            header("Location: ".$root."search-tractor/".$brand_id."/".$brand_name."");
    die;
    }
    
    header("Location: ".$root."search-tractor/".$brand_id."/".$brand_name."");
    die;
}
function AdsSubmitMahindra($brand_id,$page_name,$brand_name){
    $ip_address= getUserIP();
    $data=array(
    'ip_address'=>$ip_address,
    'brand_id'=>$brand_id,
    'page_name'=>$page_name,
    );
        $root = "http://".$_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
    if($brand_id == "55"){
    $this->db->insert('vendor_ads_data',$data); 
                header("Location: https://www.mahindratractor.com/tractor-mechanisation-solutions/tractor/arjun-novo-605-di-i");
    die;
    }else{
    $this->db->insert('vendor_ads_data',$data); 
            header("Location: ".$root."search-tractor/".$brand_id."/".$brand_name."");
    die;
    }
    
    header("Location: ".$root."search-tractor/".$brand_id."/".$brand_name."");
    die;
}
function AdsSubmitMahindraNew($brand_id,$page_name,$brand_name,$hp){
    $ip_address= getUserIP();
    $data=array(
    'ip_address'=>$ip_address,
    'brand_id'=>$brand_id,
    'page_name'=>$page_name,
    );
        $root = "http://".$_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
    if($brand_id == "55"){
        $this->db->insert('vendor_ads_data',$data); 
        if($hp == "30"){
            header("Location: https://www.mahindratractor.com/jivo.aspx");
            die;    
        }
        elseif($hp == "45"){
            header("Location: https://www.mahindratractor.com/yuvo.aspx");
            die;    
        }else{
            header("Location: https://www.mahindratractor.com/yuvo.aspx");
            die;
        }
    

    }else{
    $this->db->insert('vendor_ads_data',$data); 
            header("Location: ".$root."search-tractor/".$brand_id."/".$brand_name."");
    die;
    }
    
    header("Location: ".$root."search-tractor/".$brand_id."/".$brand_name."");
    die;
}
    function DemoSearchPage()
    {
           $ci =& get_instance();
        $ci->load->database();
        $ci->db->select('image');
        $ci->db->from('tech_specification');
        // $ci->db->where("status='coming_soon'");

        $query = $ci->db->get();
        $result = $query->result();
echo "<pre>";
print_r($result);
die;
foreach($result as $key=>$value){
if(file_exists('./upload/'.$value->image))
{
    rename('./upload/'.$value->image , './new_image/'.$value->image);
    echo "success";
} 
}

    }

    function StateGet()
    {
        $c_id = $this->input->post('StateID');

        $data = array(
            'cou_name' => $c_id
        );
        $result = array();
        $result['result'] = shweta_select('*', 'cities', 'state_id', $data['cou_name']);
        ?>
        <?php
        foreach ($result as $r => $t) {
            foreach ($t as $r1 => $t1) {

                ?>
                <option value=<?php echo $t1->id; ?>><?php echo $t1->name; ?></option>
                <?php
            }
        }
    }

    function index()
    {


        $ci =& get_instance();
        $ci->load->database();
        $ci->db->select('tech_specification.model_name,tech_specification.id,brand.name,tech_specification.id as tractor_id');
        $ci->db->from('tech_specification');

        $ci->db->join('brand', 'tech_specification.brand = brand.id');
        $ci->db->limit(80, 0);
        $ci->db->order_by('id', 'RANDOM');
        $query = $ci->db->get();
        $result['Tract_res'] = $query->result();


        $result['populorTractor'] = $this->Front_model->PopLatUpTract('wheel_drive,id,priceShow,price,hp,brand,model_name,capacity,cylinder,transmission_clutch,image', 'tech_specification', 'popular', 'yes', 3, 0);


        $result['latestTractor'] = $this->Front_model->PopLatUpTract('wheel_drive,id,priceShow,price,hp,brand,model_name,capacity,cylinder,transmission_clutch,image', 'tech_specification', 'latest', '1', 3, 0);

        $result['UpcomingTractor'] = $this->Front_model->PopLatUpTract('wheel_drive,id,priceShow,price,hp,brand,model_name,capacity,cylinder,transmission_clutch,image', 'tech_specification', 'status', 'coming_soon', 3, 0);
        $condBrand = "type LIKE '%tractor%'";
        $result['brandsImg'] = $this->Front_model->PopLatUpTractWhere('name,image,id', 'brand', $condBrand, 12, 0);
        $condBrand = "type LIKE '%tractor%'";
        $result['TractorBrand'] = Select_OrderBy_brand('*', 'brand', $condBrand, 'name', 'ASC');
        $result['new_implement'] = $this->Front_model->PopLatUpTract('*', 'new_implement', 'status', '1', 4, 0);
        $result['old_tractor'] = $this->Front_model->PopLatUpTract('*', 'old_tractor', 'status', '1', 3, 0);
        $compare_tractor = $this->Front_model->PopLatUpTract('tractor_id,brand,sbrand,stractor_id', 'compare_tractorfront', 'status', '1', 3, 0);
        $data_com = array();
        $hp = '';
        $hp_name = '';
        $s_hp = '';
        $s_hp_name = '';
        foreach ($compare_tractor as $key => $value) {
            foreach (SelectQuery('name', 'brand', 'id', $value->brand) as $raa) $brand_name = ucfirst(strtolower($raa->name));
            foreach (SelectQuery('hp', 'tech_specification', 'id', $value->tractor_id) as $raa) $hp = ucfirst(strtolower($raa->hp));
            foreach (SelectQuery('name', 'hp', 'id', $hp) as $raa) $hp_name = ucfirst(strtolower($raa->name));
            foreach (SelectQuery('name', 'brand', 'id', $value->sbrand) as $raa) $sbrand_name = ucfirst(strtolower($raa->name));
            foreach (SelectQuery('model_name,image', 'tech_specification', 'id', $value->tractor_id) as $raa) {
                $tractor_name = ucfirst(strtolower($raa->model_name));
                $tractor_image = (($raa->image));
            }
            foreach (SelectQuery('model_name,image,hp', 'tech_specification', 'id', $value->stractor_id) as $raa) {

                $stractor_name = ucfirst(strtolower($raa->model_name));
                $s_hp = ucfirst(strtolower($raa->hp));

                foreach (SelectQuery('name', 'hp', 'id', $s_hp) as $raa1) $s_hp_name = ucfirst(strtolower($raa1->name));
                $stractor_image = (($raa->image));
            }
            $data_com['first_tractor'] = $brand_name . ' ' . $tractor_name;
            $data_com['first_tractor_image'] = $tractor_image;
            $data_com['First_hp'] = $hp_name;
            $data_com['second_hp'] = $s_hp_name;

            $data_com['second_tractor'] = $sbrand_name . ' ' . $stractor_name;
            $data_com['second_tractor_image'] = $stractor_image;

            $compare_data[] = $data_com;
        }
        $result['compare_data'] = $compare_data;
//echo "<pre>";
//print_r($result['compare_data']);
//die;
        $news_data = array(
            'status' => '1',
            'type' => 'tractor',
        );
        $result['newsTractor_single'] = $this->Front_model->get_result_News('title,id,image', $news_data, 'news', 1, 0);
        $result['newsTractor_group'] = $this->Front_model->get_result_News('description,title,id,image', $news_data, 'news', 3, 1);


        $news_dataAg = array(
            'status' => '1',
            'type' => 'agriculture',
        );
        $result['newsagriculture_single'] = $this->Front_model->get_result_News('title,id,image', $news_dataAg, 'news', 1, 0);
        $result['newsagriculture_group'] = $this->Front_model->get_result_News('description,title,id,image', $news_dataAg, 'news', 3, 1);
// echo "<pre>";
// print_r($result['newsagriculture_group']);
// die;

        
        $meta=Meta_title_description('home');
  
        $data = array();
        $data = array_merge($data, $meta);
        $this->session->set_userdata('pageinfo', 'home');
        $this->load->view('header', $data);
        $this->load->view('home', $result);
        $this->load->view('footer');
    }
}

?>