<?php

class Search_dealers_result extends CI_Controller
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
        $ci->db->select('dealers.*,cities.*,dealers.id as deallers_id');
        $ci->db->from('dealers');

        $ci->db->join('cities', 'cities.id = dealers.city');
        // $ci->db->where($condition_p_b_hp);
        $ci->db->like('cities.name', $value_array);
        $query = $ci->db->get();
        $qq1a = $query->result();
// echo "<pre>";
        // print_r($qq1a);
// die;
        $s_no = 1;
        foreach ($qq1a as $result => $obj) {
            foreach (shweta_select('name', 'states', 'id', $obj->state) as $raa1) {
            }


            ?>


            <tr>
                <td><input type="checkbox" class="form-control checkbox" style="    height: 18px;
    width: 18px;
    background: #139ED9 !important;
    color: #139ED9 !important;" class="checkbox" value="<?php echo $obj->id; ?>"/></td>

                <td><?php echo $s_no; ?>.</td>
                <td><?php echo ucfirst($raa1->name); ?></td>
                <td><?php foreach (shweta_select('name', 'cities', 'id', $obj->city) as $raa1) echo $raa1->name; ?></td>
                <td><?php echo ucfirst($obj->name); ?></td>

                <td style="width:10%;"><?php
                    $cou = strlen($obj->address);
                    if ($cou > 5) {
                        echo substr($obj->address, 0, 10); ?>.......
                    <?php } else
                        echo ucfirst($obj->address);
                    ?>
                </td>
                <td><?php echo ucfirst($obj->pin); ?></td>
                <td><?php echo ucfirst($obj->contact); ?></td>

                <td>
                    <?php echo form_open('admins/edit_dealers'); ?>
                    <?php echo form_input(array('type' => 'hidden', 'name' => 'hidden_id_edit', 'value' => $obj->deallers_id)); ?>
                    <?php $data = array('type' => 'submit', 'style' => 'float:left;margin-right:32px', 'class' => 'btn btn-default buttoupdate');
                    echo form_button($data, '<i class="fa fa-edit"></i> Edit');
                    echo form_close();
                    ?>
                    <button type="button" class="btn btn-default buttoupdate" value="<?php echo $obj->id; ?>"
                            id="delete_id_tractor" onclick="delete_tractor(this.value);" style=""><i
                                class="fa fa-times"> Delete</i></button>
                </td>


            </tr>


            <?php
            $s_no++;

        }
    }

}


?>