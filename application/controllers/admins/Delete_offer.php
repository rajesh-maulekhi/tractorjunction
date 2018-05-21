<?php

class Delete_offer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();

        $this->load->helper('shweta');
        $this->load->helper('form');
    }

    function index()
    {
        foreach ($this->input->post('val1') as $p) {

            $result1 = array();
            $result1 = shweta_select('*', 'offer', 'id', $p);
            foreach ($result1 as $f => $a) {


                if (file_exists("./upload/offer/" . $a->image)) {
                    unlink('./upload/offer/' . $a->image);
                }
            }
            shweta_delete('offer', 'id', $p);

        }
        echo "successfully deleted";


    }
}

?>