<?php

class Comapre_ajax extends CI_Controller
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

    function index()
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
}

?>