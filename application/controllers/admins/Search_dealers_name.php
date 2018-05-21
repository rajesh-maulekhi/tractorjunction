<?php

class Search_dealers_name extends CI_Controller
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
        // print_r($value_array);


        $ci =& get_instance();
        $ci->load->database();
        $ci->db->select('dealers.*,cities.*,dealers.id as deallers_id');
        $ci->db->from('dealers');

        $ci->db->join('cities', 'cities.id = dealers.city');
        // $ci->db->where($condition_p_b_hp);
        $ci->db->like('dealers.pin', $value_array);
        $ci->db->or_like('cities.name', $value_array);
        $ci->db->group_by('cities.name,dealers.pin');
        $query = $ci->db->get();
        $qq1a = $query->result();
        foreach ($qq1a as $result => $value) {
            ?>
            <li onclick="set_item('<?php echo ucfirst($value->name); ?>');"
                value="<?php echo $value->name; ?>"><?php echo ucfirst($value->name); ?></li>

            <?php
        }
        if (empty($qq1a)) {
            echo "No Result Found";
        }
    }


}


?>