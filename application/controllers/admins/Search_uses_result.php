<?php

class Search_uses_result extends CI_Controller
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

        $value_array = $this->input->post('val_model_result');
// echo $value_array;

        $ci =& get_instance();
        $ci->load->database();
        $ci->db->select('*');
        $ci->db->from('category_tractor');

        $ci->db->where('cate_name', $value_array);
        // $ci->db->like('model_name',$value_array);
        $query = $ci->db->get();
        $qq1a = $query->result();
        $s_no = 1;
        foreach ($qq1a as $result => $obj) {

            ?>


            <tr>

                <td><input type="checkbox" class="form-control checkbox" style="    height: 18px;
    width: 18px;
    background: #139ED9 !important;
    color: #139ED9 !important;" class="checkbox" value="<?php echo $obj->id; ?>"/></td>

                <td><?php echo $s_no; ?>.</td>
                <td><?php echo $obj->cate_name; ?></td>

                <td>
                    <?php echo form_open('admins/edit_uses'); ?>
                    <?php echo form_input(array('type' => 'hidden', 'name' => 'hidden_id_edit', 'value' => $obj->id)); ?>
                    <?php $data = array('type' => 'submit', 'style' => 'float:left;margin-right:32px', 'class' => 'btn btn-default buttoupdate');
                    echo form_button($data, '<i class="fa fa-edit"></i> Edit');
                    echo form_close();
                    ?>
                    <button type="button" class="btn btn-default buttoupdate" value="<?php echo $obj->id; ?>"
                            onclick="delete_tractor(this.value);" style=""><i class="fa fa-times"> Delete</i></button>
                </td>


            </tr>


            <?php
            $s_no++;
        }
    }

}


?>