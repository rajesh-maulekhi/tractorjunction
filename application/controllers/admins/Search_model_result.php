<?php

class Search_model_result extends CI_Controller
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
        $brand_id = $this->input->post('val_brand_result');
// echo $value_array;
// echo "<br>";
// echo $brand_id;
// $qq1a=array();

// $qq1a=shweta_select('*','tech_specification','id',$obj->brand);
        $ci =& get_instance();
        $ci->load->database();
        $ci->db->select('*');
        $ci->db->from('tech_specification');
        if ($value_array != "") {
            $ci->db->where('model_name', $value_array);
        }
        if ($brand_id != "") {
            $ci->db->where('brand', $brand_id);
        }
        // $ci->db->like('model_name',$value_array);
        $query = $ci->db->get();
        $qq1a = $query->result();
        if (empty($qq1a)) {
            echo "No Tractor Found";
        } else {
            foreach ($qq1a as $result => $obj) {
                $s_no = 1; ?>
                <tr>

                    <td><input type="checkbox" class="form-control checkbox" style="height: 10px;" class="checkbox"
                               value="<?php echo $obj->id; ?>"/></td>

                    <td><?php echo $s_no; ?>.</td>
                    <td><?php foreach (shweta_select('name', 'brand', 'id', $obj->brand) as $raa) echo $raa->name ?></td>
                    <td><?php echo $obj->model_name; ?></td>
                    <td><i class="fa fa-inr"> <?php

                            if ($obj->price != "")
                                echo $obj->price;
                            else
                                echo "Not Filled";
                            ?></i></td>
                    <td><?php echo $obj->launch_date; ?></td>
                    <td><?php echo $obj->status; ?></td>
                    <td>
                        <?php if ($obj->popular == "yes") { ?>
                            <i class="fa fa-star pp fa" style="color: #FFD700;cursor: pointer;" value="no"
                               id="<?php echo $obj->id; ?>" onclick="get(this.id,'no')"></i>
                        <?php } else { ?>
                        <i class="fa fa-star-o pp fa" style="cursor: pointer;" value="yes" id="<?php echo $obj->id; ?>"
                           onclick="get(this.id,'yes')">

                            </i><?php } ?>

                    </td>
                    <td>
                        <?php echo form_open('admins/edit_tractor'); ?>
                        <?php echo form_input(array('type' => 'hidden', 'name' => 'hidden_id_edit', 'value' => $obj->id)); ?>
                        <?php $data = array('type' => 'submit', 'id' => 'form_up', 'class' => 'btn btn-default buttoupdate');
                        echo form_button($data, '<i class="fa fa-edit"></i> Edit');
                        echo form_close();
                        ?>
                    </td>


                    <td>
                        <button type="button" class="btn btn-default buttoupdate" value="<?php echo $obj->id; ?>"
                                id="delete_id_tractor" onclick="delete_tractor(this.value);" style=""><i
                                    class="fa fa-times"> Delete</i></button>
                    </td>


                </tr>


                <?php
                $s_no++;
            }
        }
        ?>


        <?php
    }

}


?>