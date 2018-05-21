<?php

class Search_uses_name extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('shweta');
        $this->load->helper('form');
    }

    function index()
    {

        $value_array = $this->input->post('val_model');
// echo $value_array;

        $ci =& get_instance();
        $ci->load->database();
        $ci->db->select('*');
        $ci->db->from('category_tractor');

        // $ci->db->where($condition_p_b_hp);
        $ci->db->like('cate_name', $value_array);
        $query = $ci->db->get();
        $qq1a = $query->result();

        foreach ($qq1a as $result => $value) {
            ?>
            <li onclick="set_item('<?php echo ucfirst($value->cate_name); ?>');"
                value="<?php echo $value->cate_name; ?>"><?php echo ucfirst($value->cate_name); ?></li>

            <?php
        }

    }

}

?>