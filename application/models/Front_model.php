<?php
class Front_model extends CI_Model{
public function __construct() {
parent::__construct();
$this->load->database();
}
function PopLatUpTract($field,$table,$whr_col,$whr_data,$limit, $start){
	$this->db->select($field);
	$this->db->from($table);
		$this->db->order_by('id', 'RANDOM');
	if($whr_col != '')
	$this->db->where($whr_col,$whr_data);
	$this->db->limit($limit, $start);
	$query = $this->db->get();
	return $query->result();
}
public function query_execute($SQL){
	$query = $this->db->query($SQL);
	return $query->result_array();
}

function PopLatUpTractWhere($field,$table,$whr_col,$limit, $start){
	$this->db->select($field);
	$this->db->from($table);
		$this->db->order_by('id', 'RANDOM');
	if($whr_col != '')
	$this->db->where($whr_col);
	$this->db->limit($limit, $start);
	$query = $this->db->get();
	return $query->result();
}

	public function getBBlogTotalCount($whereCol,$whereData){
		$this->db->select('total_view');
		$this->db->from('blog');
		$this->db->where($whereCol,$whereData);
		$query = $this->db->get();
		$result= $query->result();	
		$total_view=0;
		$total_view=$result[0]->total_view;
	  return $total_view;
	}
	public function get_answerOFquestion($question_id){
		$whereQu="question_id='".$question_id."' and status='1'";
		$this->db->select('id');
		$this->db->from('ans_of_question');
		$this->db->where($whereQu);
		$query = $this->db->get();
		$result= $query->result();	
		
		$total_ans=0;
		$total_ans=count($result);
		
	  return $total_ans;
	}
	public function getNewsCount($whereCol,$whereData){
		$this->db->select('total_view');
		$this->db->from('news');
		$this->db->where($whereCol,$whereData);
		$query = $this->db->get();
		$result= $query->result();	
		$total_view=0;
		$total_view=$result[0]->total_view;
	  return $total_view;
	}
	public function getNewsTotalCount($whereCol,$whereData){
		$this->db->select('total_view');
		$this->db->from('news_blog_total_view');
		$this->db->where($whereCol,$whereData);
		$query = $this->db->get();
		$result= $query->result();	
		$total_view=0;
		$total_view=$result[0]->total_view;
	  return $total_view;
	}
	function updateBlogViewCount($data,$whr_col,$whr_data){
	$this->db->where($whr_col,$whr_data);
	$this->db->update('blog',$data);
}
	function updateNewsViewCount($data,$whr_col,$whr_data){
	$this->db->where($whr_col,$whr_data);
	$this->db->update('news',$data);
}
	function updateNewsTotalCount($data,$whr_col,$whr_data){
	$this->db->where($whr_col,$whr_data);
	$this->db->update('news_blog_total_view',$data);
}
	public function get_request_result($tablename,$data){
		$this->db->select('*');
		$this->db->from($tablename);
		$this->db->where($data);
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();
		return $query->result();	
	}
	public function brandSeoTag($id){
		$data=array(
		'id'=>$id
		);
		$this->db->select('seo_meta');
		$this->db->from('brand');
		$this->db->where($data);
		$query = $this->db->get();
		return $query->result();	
	}
	public function get_result_fieldsJson($fields,$data,$tablename,$limit,$start){
		$this->db->select($fields);
		$this->db->from($tablename);
		$this->db->where($data);
		if($limit !=''){
		$this->db->limit($limit, $start);
		}
		$query = $this->db->get();
		return $query->result();	
	}
	public function get_result_fields($fields,$data,$tablename){
		$this->db->select($fields);
		$this->db->from($tablename);
		$this->db->where($data);
		$query = $this->db->get();
		return $query->result();	
	}
	public function get_result_fieldsOrder($fields,$data,$tablename){
		$this->db->select($fields);
		$this->db->from($tablename);
		$this->db->where($data);
		$this->db->order_by('date_time', 'DESC');
		$query = $this->db->get();
		return $query->result();	
	}
	public function get_result_checkOnroad($fields,$tablename,$whrcol){
		$this->db->select($fields);
		$this->db->from($tablename);
		$this->db->where($whrcol);
		$query = $this->db->get();
		return $query->result();	
	}
	public function get_result_check($fields,$tablename,$whr,$whrcol){
		$this->db->select($fields);
		$this->db->from($tablename);
		$this->db->where($whr,$whrcol);
		$query = $this->db->get();
		return $query->result();	
	}
	public function get_result_News($fields,$data,$tablename,$limit,$start){
		$this->db->select($fields);
		$this->db->from($tablename);
		$this->db->order_by('date', 'DESC');
		$this->db->where($data);
		if($limit !='')
			$this->db->limit($limit, $start);
		$query = $this->db->get();
		return $query->result();	
	}
	public function get_result_fieldsLimit($fields,$data,$tablename,$limit,$start){
		$this->db->select($fields);
		$this->db->from($tablename);
		if(!empty($data))
		$this->db->where($data);
		if($limit !='')
			$this->db->limit($limit, $start);
		$query = $this->db->get();
		return $query->result();	
	}
	public function get_result($data,$tablename){
		$this->db->select('*');
		$this->db->from($tablename);
		$this->db->where($data);
		$query = $this->db->get();
		return $query->result();	
	}
	public function insert_data($data,$tableName){
		$this->db->insert($tableName,$data);	
	}
	public function delete_data($data,$tableName){
		$this->db->where($data);
		$this->db->delete($tableName);		
	}
	function update_da($table,$data,$whr_col){
	$this->db->where($whr_col);
	$this->db->update($table,$data);
}
	function update_data($table,$data,$whr_col,$whr_data){
	$this->db->where($whr_col,$whr_data);
	$this->db->update($table,$data);
}
	public function show_pagination_filter_selected($field_name,$limit,$start,$table_name,$condition){
	$data=array();
        $query = order_by_limit_new($field_name,$table_name,$condition,$limit, $start,'id','RANDOM');
		if ($query > 0) {
            foreach ($query as $row) {
                $data[] = $row;
            } 
            return $data;
        }
        return false;
}	public function show_pagination_filter($limit,$start,$table_name,$condition){
	$data=array();
        $query = order_by_limit_new('*',$table_name,$condition,$limit, $start,'id','DESC');
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