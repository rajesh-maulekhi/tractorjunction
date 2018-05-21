<?php

class Country_ajax extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->database();
        $this->load->helper('shweta');

    }

    function index()
    {
        $c_id = $this->input->post('eml');

        $data = array(
            'cou_name' => $c_id
        );
        $result = array();
        $result['result'] = shweta_select('*', 'cities', 'state_id', $data['cou_name']);
        ?>
        <?php
        foreach ($result as $r => $t) {
            foreach ($t as $r1 => $t1) {

                ?>
                <option value=<?php echo $t1->id; ?>><?php echo $t1->name; ?></option>
                <?php
            }
        }
    }

}

?>

