<?php
class Form_model extends CI_Model{
public function __construct() {
parent::__construct();
$this->load->helper('query');
}
public function admin_login($data){
    $condition = "username =" . "'" . $data['name'] . "' and ";
    $condition .= "password =" . "'" . $data['password'] . "'";
    return shweta_select_th('*','admin',$condition);
}
public function show_review($limit, $start,$data1){
    $data=array();
	

   $query = shweta_order_by_limit_new_orderby('*','user_review',$data1,$limit, $start,'id','DESC'); 
    if ($query > 0) {
            foreach ($query as $row) {
                $data[] = $row;
            } 
            return $data;
        }
        return false;
}
public function show_tractor($limit, $start){
    $data=array();

   $query = shweta_order_by_limit('*','tech_specification','id','DESC',$limit, $start); 
    if ($query > 0) {
            foreach ($query as $row) {
                $data[] = $row;
            } 
            return $data;
        }
        return false;
}
public function move_single_google_login(){
    // echo "aa";
    // $this->load->library('session');
// echo $this->session->userdata('current_url1');
        // die;
        $root = "http://".$_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);

        header("location:".$root);

}
public function show_pagination_filter_orderby($limit,$start,$table_name,$condition,$orderby,$ordercolum){
    $data=array();
        $query = shweta_order_by_limit_new_orderby('*',$table_name,$condition,$limit, $start,$orderby,$ordercolum);
        if ($query > 0) {
            foreach ($query as $row) {
                $data[] = $row;
            } 
            return $data;
        }
        return false;
}
public function show_result_search($limit, $start){
    $data=array();
        $query = shweta_order_by_limit('*','tech_specification','id','RANDOM',$limit, $start);
        if ($query > 0) {
            foreach ($query as $row) {
                $data[] = $row;
            } 
            return $data;
        }
        return false;
}
public function show_hp($limit,$start){
    $data=array();
        $query = shweta_order_by_limit('*','hp','id','DESC',$limit, $start);
        if ($query > 0) {
            foreach ($query as $row) {
                $data[] = $row;
            } 
            return $data;
        }
        return false;
}

public function show_brand($limit,$start){
    $data=array();
        $query = shweta_order_by_limit('*','brand','id','DESC',$limit, $start);
        if ($query > 0) {
            foreach ($query as $row) {
                $data[] = $row;
            } 
            return $data;
        }
        return false;
}
public function show_question($limit,$start){
    $data=array();
        $query = shweta_order_by_limit('*','questions','date_time','DESC',$limit, $start);
        if ($query > 0) {
            foreach ($query as $row) {
                $data[] = $row;
            } 
            return $data;
        }
        return false;
}
public function show_ResultPag($limit,$start,$tablename){
    $data=array();
        $query = shweta_order_by_limit('*',$tablename,'id','DESC',$limit, $start);
        if ($query > 0) {
            foreach ($query as $row) {
                $data[] = $row;
            } 
            return $data;
        }
        return false;
}
public function show_blog($limit,$start){
	
    $data=array();
        $query = shweta_order_by_limit('*','blog','blog_date','DESC',$limit, $start);
        if ($query > 0) {
            foreach ($query as $row) {
                $data[] = $row;
            } 
            return $data;
        }
        return false;
}
public function show_pagination($limit,$start,$table_name){
    $data=array();
        $query = shweta_order_by_limit('*',$table_name,'id','DESC',$limit, $start);
        if ($query > 0) {
            foreach ($query as $row) {
                $data[] = $row;
            } 
            return $data;
        }
        return false;
}
public function show_paginationvendor($limit,$start,$table_name,$brand_id){
	
    $data=array();
        $query = shweta_order_by_limitvendor2('*',$table_name,'id','DESC',$limit, $start,$brand_id);
        if ($query > 0) {
            foreach ($query as $row) {
                $data[] = $row;
            } 
            return $data;
        }
        return false;
}
public function show_paginationvendorA($limit,$start,$table_name,$brand_id){
	
    $data=array();
        $query = shweta_order_by_limitvendor('*',$table_name,'id','DESC',$limit, $start,$brand_id);
        if ($query > 0) {
            foreach ($query as $row) {
                $data[] = $row;
            } 
            return $data;
        }
        return false;
}
public function update_hp_range($data){
    $this->load->database();
    foreach($data as $d){
    $this->db->where('id',$d['id']);
    $this->db->update('hp_range',$d);
        }
    $this->load->library('session');
    $this->session->set_userdata('range',"Value Update");
    header("location:../hp_range");

    }
    public function show_pagination_filter($limit,$start,$table_name,$condition){
    $data=array();
        $query = shweta_order_by_limit_new('*',$table_name,$condition,$limit, $start,'id','DESC');
        if ($query > 0) {
            foreach ($query as $row) {
                $data[] = $row;
            } 
            return $data;
        }
        return false;
}
    public function update_price_range($data){
    $this->load->database();
    foreach($data as $d){
    $this->db->where('id',$d['id']);
    $this->db->update('price_range',$d);
        }
    $this->load->library('session');
    $this->session->set_userdata('range',"Value Update");
    header("location:../price_range");

    }
    public function show_br($limit,$start,$table_name,$whr,$con){
    $data=array();
        $query = shweta_select_limit('*',$table_name,$whr,$con,$limit, $start);
        if ($query > 0) {
            foreach ($query as $row) {
                $data[] = $row;
            } 
            return $data;
        }
        return false;
} 


}
?>