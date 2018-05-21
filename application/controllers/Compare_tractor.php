<?php

class Compare_tractor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('shweta');
        $this->load->helper('query');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->database();
        $this->load->model("Front_model");
    }

    function GetModelName()
    {
        $result = array();
        $value_brand = $this->input->post('id_brand');
        $result = shweta_select('*', 'tech_specification', 'brand', $value_brand);
        ?>
        <option value="0">Select Model</option>
        <?php
        if (!empty($result)) {

            foreach ($result as $r => $t) {
                ?>
                <option value="<?php echo($t->id); ?>"><?php echo ucfirst($t->model_name); ?></option>
                <?php
            }
        } else {
            ?>
            <option value="">No Tractor Found</option>
            <?php
        }
    }
    function GetModelNameOnRoad()
    {
        $result = array();
        $value_brand = $this->input->post('id_brand');
        $result = shweta_select('*', 'tech_specification', 'brand', $value_brand);
        ?>
        <option value="0">Select Model</option>
        <?php
        if (!empty($result)) {

            foreach ($result as $r => $t) {
                ?>
                <option value="<?php echo($t->model_name); ?>"><?php echo ucfirst($t->model_name); ?></option>
                <?php
            }
        } else {
            ?>
            <option value="">No Tractor Found</option>
            <?php
        }
    }

    function index()
    {

        $this->session->set_userdata('pageinfo', 'compare');
 
        $meta=Meta_title_description('compare_tractors');
        $data = array();
        $data = array_merge($data, $meta);


        $condBrand = "type LIKE '%tractor%'";
        $brand_result = $this->Front_model->get_result_fields('name,id', $condBrand, 'brand');

        $tractor_drop_down = array();
        $tractor_drop_down[0] = 'Select Brand';
        foreach ($brand_result as $key => $value) {
            $tractor_drop_down[$value->id] = ucfirst($value->name);
        }
        $result['tractor_drop_down'] = $tractor_drop_down;

        $result['class_div'] = "col-md-4";

        $this->load->view('header', $data);
        $this->load->view('compare_tractor', $result);
        $this->load->view('footer');

    }

    function CompareSearch($tractor_id, $brand_id, $tractorName)
    {

        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        $this->session->set_userdata('tractor_id', $tractor_id);
        $this->session->set_userdata('brand_id', $brand_id);
        header('Location: ' . $root . 'compare-tractors');
        die;
    }
function GetOnRoadPricceAD(){
        $root = "http://".$_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);

    $tractor_name=$this->input->post('tractors_id');
       $result = shweta_select_like('hp','tech_specification', 'model_name',$tractor_name);
       // $result=array();
       $HP='';
       if(!empty($result)){
           foreach($result as $key=>$value){}
                foreach (SelectQuery('name', 'hp', 'id', $value->hp) as $ke => $val) $HP = ($val->name);
                if($HP !=''){
                if($HP <= '37'){
    ?>
    <img class="img-responsive Jhon_dheerMob" src="<?php echo $root; ?>web_root/jhon_dheer/0_37_hp_M_OnRoad.jpg" alt="Jhon Dheer Tractor | Tractorjunction" title="Jhon Dheer Tractor | Tractorjunction">
    <img class="img-responsive Jhon_dheerDesk" src="<?php echo $root; ?>web_root/jhon_dheer/0_37_hp_D_OnRoad.jpg" alt="Jhon Dheer Tractor | Tractorjunction" title="Jhon Dheer Tractor | Tractorjunction">
    <?php 
}else if($HP >= '38' && $HP < '40'){
    ?>
    <img class="img-responsive Jhon_dheerMob" src="<?php echo $root; ?>web_root/jhon_dheer/38_40_hp_M_OnRoad.jpg" alt="Jhon Dheer Tractor | Tractorjunction" title="Jhon Dheer Tractor | Tractorjunction">
    <img class="img-responsive Jhon_dheerDesk" src="<?php echo $root; ?>web_root/jhon_dheer/38_40_hp_D_OnRoad.jpg" alt="Jhon Dheer Tractor | Tractorjunction" title="Jhon Dheer Tractor | Tractorjunction">
        <?php 
}else if($HP >= '41' && $HP < '44'){
    ?>
    <img class="img-responsive Jhon_dheerMob" src="<?php echo $root; ?>web_root/jhon_dheer/41_44_hp_M_OnRoad.jpg" alt="Jhon Dheer Tractor | Tractorjunction" title="Jhon Dheer Tractor | Tractorjunction">
    <img class="img-responsive Jhon_dheerDesk" src="<?php echo $root; ?>web_root/jhon_dheer/41_44_hp_D_OnRoad.jpg" alt="Jhon Dheer Tractor | Tractorjunction" title="Jhon Dheer Tractor | Tractorjunction">
        <?php 
}else if($HP >= '44'){
    ?>
    <img class="img-responsive Jhon_dheerMob" src="<?php echo $root; ?>web_root/jhon_dheer/45_hp_M_OnRoad.jpg" alt="Jhon Dheer Tractor | Tractorjunction" title="Jhon Dheer Tractor | Tractorjunction">
    <img class="img-responsive Jhon_dheerDesk" src="<?php echo $root; ?>web_root/jhon_dheer/45_hp_D_OnRoad.jpg" alt="Jhon Dheer Tractor | Tractorjunction" title="Jhon Dheer Tractor | Tractorjunction">
        <?php 
}   else{
                    ?> <a href="<?php echo $root; ?>search-tractor/59/john-deere">
                    <img class="img-responsive Jhon_dheerMob" src="<?php echo $root; ?>web_root/jhon_dheer/45_hp_M_OnRoad.jpg" alt="Jhon Dheer Tractor | Tractorjunction" title="Jhon Dheer Tractor | Tractorjunction">
                    <img class="img-responsive Jhon_dheerDesk" src="<?php echo $root; ?>web_root/jhon_dheer/45_hp_D_OnRoad.jpg" alt="Jhon Dheer Tractor | Tractorjunction" title="Jhon Dheer Tractor | Tractorjunction">
                    </a>  <?php         
                }
                    
                }else{
                    ?>  <a href="<?php echo $root; ?>search-tractor/59/john-deere">
                    <img class="img-responsive Jhon_dheerMob" src="<?php echo $root; ?>web_root/jhon_dheer/45_hp_M_OnRoad.jpg" alt="Jhon Dheer Tractor | Tractorjunction" title="Jhon Dheer Tractor | Tractorjunction">
                    <img class="img-responsive Jhon_dheerDesk" src="<?php echo $root; ?>web_root/jhon_dheer/45_hp_D_OnRoad.jpg" alt="Jhon Dheer Tractor | Tractorjunction" title="Jhon Dheer Tractor | Tractorjunction">
                    </a>  <?php         
                }
           
       }else{
?>  <a href="<?php echo $root; ?>search-tractor/59/john-deere">
<img class="img-responsive Jhon_dheerMob" src="<?php echo $root; ?>web_root/jhon_dheer/45_hp_M_OnRoad.jpg" alt="Jhon Dheer Tractor | Tractorjunction" title="Jhon Dheer Tractor | Tractorjunction">
<img class="img-responsive Jhon_dheerDesk" src="<?php echo $root; ?>web_root/jhon_dheer/45_hp_D_OnRoad.jpg" alt="Jhon Dheer Tractor | Tractorjunction" title="Jhon Dheer Tractor | Tractorjunction">
</a>  <?php 
       }
      
}
    function CompareFourth($tractor1, $tractor2, $tractor3)
    {
        $data = array(
            'Tractor_first' => $tractor1,
            'Tractor_second' => $tractor2,
            'Tractor_third' => $tractor3,
        );
        $result['result_first'] = $this->Front_model->get_result_fields('*', "id='" . $data['Tractor_first'] . "'", 'tech_specification');
        $result['result_second'] = $this->Front_model->get_result_fields('*', "id='" . $data['Tractor_second'] . "'", 'tech_specification');
        $result['result_third'] = $this->Front_model->get_result_fields('*', "id='" . $data['Tractor_third'] . "'", 'tech_specification');

        $result_first = $this->Front_model->get_result_fields('hp', "id='" . $data['Tractor_first'] . "'", 'tech_specification');
        $hp_first = '';
        $condition = '';
        foreach ($result_first as $key => $value) {

            foreach (SelectQuery('name', 'hp', 'id', $value->hp) as $raa) $hp_first = ucfirst(strtolower($raa->name));
        }
        $condition = "name >= '" . $hp_first . "'";
        $ci = &get_instance();
        $ci->load->database();
        $ci->db->select('hp.*,tech_specification.id,tech_specification.*,tech_specification.id as tractor_id,hp.id as hp_id');
        $ci->db->from('hp');
        $ci->db->join('tech_specification', 'hp.id = tech_specification.hp');
        if ($condition != "") {
            $ci->db->where($condition);
        }
        $ci->db->limit('1');
        $query = $ci->db->get();
        $result['result_fourth'] = $query->result();


        $des = "Compare tractors in India by brands to see which is better by performance including fuel efficiency, horsepower, hydraulic capacity, fuel tank capacity, transmission, price range and more. Select up to three tractors to compare them side by side.";
        $ky = "Compare Tractors Online, Compare Tractors, Tractor Comparison site, Compare Tractors in India, Popular Tractor Brands Comparison, Latest Tractors Comparisons, New Tractors Comparisons, Tractor Brands Comparison, Compare Tractors Price Online, Compare Tractor Brands, Compare Tractor Models, Compare Tractors Price";
        $this->session->set_userdata('pageinfo', 'compare');

        $meta = array(
            'meta_title' => 'Compare Tractors, Brands, Models, Prices, Specifications, Performance- TractorJunction',
            'meta_keywords' => $ky,
            'meta_description' => $des,
            'meta_robots' => 'all',
            'extra_headers' => ''

        );
        $data = array();
        $data = array_merge($data, $meta);
$result['result_fourth']=array();

        $result['class_div'] = "col-md-4";

        $this->load->view('header', $data);
        $this->load->view('compare_tractor_fourt', $result);
        $this->load->view('footer');

    }

    function GetThirdTractor()
    {
        $data = array(
            'Tractor_first' => $this->input->post('Tractor_first'),
//      'Tractor_first'=>78,
        );

        $result_first = $this->Front_model->get_result_fields('hp', "id='" . $data['Tractor_first'] . "'", 'tech_specification');
        $hp_first = '';
        $condition = '';
        foreach ($result_first as $key => $value) {

            foreach (SelectQuery('name', 'hp', 'id', $value->hp) as $raa) $hp_first = ucfirst(strtolower($raa->name));
        }

        $condition = "name >= '" . $hp_first . "' and brand='62'";
        $ci = &get_instance();
        $ci->load->database();
        $ci->db->select('hp.*,tech_specification.id,tech_specification.brand,tech_specification.id as tractor_id,hp.id as hp_id');
        $ci->db->from('hp');
        $ci->db->join('tech_specification', 'hp.id = tech_specification.hp');
        if ($condition != "") {
            $ci->db->where($condition);
        }
        $ci->db->limit('1');
        $query = $ci->db->get();
        $result_third = $query->result();

        $tractor_id = '';
        foreach ($result_third as $key1 => $value1) {
            $tractor_id = $value1->tractor_id;
        }
        echo $tractor_id;


    }

    function compare_result()
    {
        $data = array(
            'Tractor_first' => $this->input->post('Tractor_first'),
            'Tractor_second' => $this->input->post('Tractor_second'),
            'Tractor_third' => $this->input->post('Tractor_third'),
        );
        $result_first = $this->Front_model->get_result_fields('*', "id='" . $data['Tractor_first'] . "'", 'tech_specification');
        $result_second = $this->Front_model->get_result_fields('*', "id='" . $data['Tractor_second'] . "'", 'tech_specification');
        $result_third = $this->Front_model->get_result_fields('*', "id='" . $data['Tractor_third'] . "'", 'tech_specification');


        echo Compare_spcTab($result_first, $result_second, $result_third);


    }

    function compare_result_getImage()
    {

        $data = array(
            'id' => $this->input->post('Tractorid')
        );
        $result = $this->Front_model->get_result_fields('image,model_name', $data, 'tech_specification');
        foreach ($result as $key => $value) {
            ?>    <img onerror="imgError(this);" src="upload/<?php echo $value->image; ?>" class="img-responsive"
                       alt="<?php echo $value->model_name; ?>" style="height: 133px;
margin-top: 20px;
border: 1px solid #ddd;
padding: 5px;">
            <?php
        }

    }

}

?>