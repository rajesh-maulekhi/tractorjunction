<?php

class Search_request_result_onroad extends CI_Controller
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

        $date1 = $this->input->post('date1');
        $date2 = $this->input->post('date2');
// echo $value_array;
// echo $date1; echo "<br>";
// echo $date2;echo "<br>";
        $newDate1 = date("Y-m-d", strtotime($date1));
        $newDate2 = date("Y-m-d", strtotime($date2));
// echo $value_array;

        $ci =& get_instance();
        $ci->load->database();
        $ci->db->select('*');
        $ci->db->from('onroadprice');
        $ci->db->where('date_ >=', $newDate2);
        $ci->db->where('date_ <=', $newDate1);
        $query = $ci->db->get();
        $qq1a = $query->result();

        if (empty($qq1a)) {
            ?>
            <h3>
                No Result Found
            </h3>
            <?php
        } else {
// echo "<pre>";
// print_r($qq1a);
            $s_no = 1;
            foreach ($qq1a as $result => $obj) {
                ?>

                <tr style="text-align: left;">

                    <td><?php echo $s_no; ?>.</td>
                    <td><?php foreach (shweta_select('username', 'user_reg', 'id', $obj->user_id) as $raa) echo ucfirst($raa->username); ?></td>
                    <td><?php foreach (shweta_select('name', 'brand', 'id', $obj->brand) as $raa) echo $raa->name ?></td>

                    <td><?php echo $obj->model; ?></td>
                    <td><?php echo $obj->date_; ?></td>
                    <td>
                        <?php
                        if ($obj->status == "0") {
                            ?><i class="fa fa-times"></i><?php
                        } else {
                            ?><i class="fa fa-check"></i>
                        <?php } ?>
                    </td>

                    <td>
                        <?php echo form_open('admins/Reply_request_onroad'); ?>
                        <?php echo form_input(array('type' => 'hidden', 'name' => 'hidden_id_edit', 'value' => $obj->id)); ?>
                        <?php $data = array('type' => 'submit', 'style' => 'float:left;margin-right:0px', 'class' => 'btn btn-default buttoupdate');
                        echo form_button($data, '<i class="fa fa-reply"> </i> Reply');
                        echo form_close();
                        ?>
                    </td>


                </tr>


                <?php
                $s_no++;
            }
        }

    }
}


?>