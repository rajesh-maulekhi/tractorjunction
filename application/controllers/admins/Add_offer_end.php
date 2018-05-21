<?php

class Add_offer_end extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('javascript');
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
        $this->load->library('image_lib');
        $this->load->database();
        $this->load->helper('shweta');
    }

    function index()
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        $newDate = date("Y-m-d");
        if ($_FILES['picture']['name'] != "") {
            // $rand_no=rand(99,999); 
            // $image_name="imageoffer".$rand_no.".jpg";
            // $_FILES['picture']['name']=$image_name;

            // die;
            $this->load->library('upload');
            // required configuration.
            $config['upload_path'] = './upload/offer/';
            $config['allowed_types'] = 'jpg|jpeg|gif|png';
            $config['max_size'] = 80000;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $this->upload->initialize($config);
            $this->upload->do_upload('picture');
            $upload_data = $this->upload->data();
            $image_name = $upload_data['file_name'];
        }
        $fil = array(
            'image' => $image_name,
            'title' => $this->input->post('title'),
            'description' => $this->input->post('des'),
            'date_time' => $newDate,
            'exp_date' => $this->input->post('endDate'),
        );


        $message = '
	<div id=":1ak" class="ii gt adP adO"><div id=":16z" class="a3s aXjCH m15610dcd7c8f7071"><div class="adM">
    
        
        
        

    </div><div style="font-family:&quot;Trebuchet MS&quot;,&quot;Helvetica&quot;,Helvetica,Arial,sans-serif;line-height:1.6em;background-color:#fff;text-align:center"><div class="adM">
        
        </div><table style="border-spacing:0;border-collapse:collapse;padding:20px;width:600px" align="center" bgcolor="#fff" cellpadding="0" cellspacing="0">
            <tbody><tr>
                <td>
                </td><td style="border:1px solid #f0f0f0" bgcolor="#dfdfdf">
                    
                    <div style="display:block;margin:0 auto;max-width:600px">
                        <table style="width:100%;border-spacing:0;border-collapse:collapse">
                            <tbody><tr>
                                <td style="text-align:center;padding: 18px;">
                             <a target="_blank" style="color: rgb(221, 68, 69);text-decoration-line: initial;font-size: 24px;" href="http://www.tractorjunction.com/">Tractor<span style="color:#148F20"> Junction</a></span>
                                    <br>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align:center;color:#fff;background-color:#DD4445;text-transform:uppercase;font-weight:bold;padding:10px">
                                ' . $fil['title'] . '
                                </td>
                            </tr>
                            <tr>
                                <td><br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    


    
<table align="center">
    <tbody>
                                    
        
                        
                    
                          
                                        
        
                           
                    
                                        
        
                            <tr>
              <img class="CToWUd" style="padding-top:0px" src="' . $root . 'upload/offer/' . $image_name . '" alt="" width="600">         
                    
                    
                                        
        
         
                                    </tr>
                                    
                    
                    
                        </tbody>
</table>
                                </td>
                            </tr>
                       <tr>
          <td style="padding: 20px;
text-align: justify;color:#767676;font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;font-size:16px;font-weight:300;line-height:24px;padding-top:15px;padding-right:30px;padding-bottom:15px;padding-left:30px;border-top:1px solid #e5e5e5;border-bottom:1px solid #e5e5e5" align="center">
        ' . $fil['description'] . '

	   </td>
        </tr>

                            <tr>
                                <td style="width:100%;padding:0;background:#148F1A;border-collapse:collapse;border-spacing:0;margin:auto;text-align:center">
                                    <table style="width:100%;border-collapse:collapse;border-spacing:0">
                                        <tbody><tr align="center">
                                            <td colspan="2">
<p style="padding: 10px;font-size:20px;font-weight:300;color:#ffffff;letter-spacing:0.01em;font-family:"Helvetica Neue",Helvetica,Arial,sans-serif">
Now access Tractor Junction on the go!</p>
                                            </td>
                                        </tr>

                                    </tbody></table>
                                </td>
                            </tr>


                            <tr>
                                <td style="background-color:#000;font-size:12px;color:#fff;text-align:center;padding:10px">
                                    Youre receiving this newsletter because youve <br>subscribed to our newsletter. <br>

									
                                    Address: Tractor Junction
44, First Floor
Azad Nagar, Ward No 43
Alwar, Rajasthan 301001
                                </td>
                            </tr>
                        </tbody></table>
                    </div>
                    

                </td>
                <td>
                    
                </td>
            </tr>
        </tbody></table>
        
    
<img class="CToWUd" src="https://ci4.googleusercontent.com/proxy/wo7PYKfuX11XcydmUEr2O6c8RCLs1h-xaQ5ZysFTWZPpChB2cfL8S2-sJs9LIFbFMtix9A6WbVD9x5A1542ufc2PdnlOBwKvStn7RgoZhi35qQQLk5PjCFoPU-cpMoiXbB_u5zMi=s0-d-e1-ft#http://links.coupondunia.in/mpss/o/2gA/nbABAA/t.1z3/EbN8MM15RZGYJqlx2F-pEA/o.gif" alt="" style="min-height:1px!important;width:1px!important;border-width:0!important;margin-top:0!important;margin-bottom:0!important;margin-right:0!important;margin-left:0!important;padding-top:0!important;padding-bottom:0!important;padding-right:0!important;padding-left:0!important" border="0" height="1" width="1"><div class="yj6qo"></div><div class="adL">
</div></div><div class="adL">


</div></div></div>
	
	';
// echo $message;
// die;	

        $subject = ucwords($fil['title']);


        $get_all = array();
        $get_all = shweta_select('*', 'newsleter', 'status', '1');
        if (!empty($get_all)) {
            foreach ($get_all as $get_allkey => $get_allValue) {
                $to = $get_allValue->email;//to send

                MailSentNow($message, $subject, $to);


            }

        }


        shweta_insert_form('offer', $fil);
        $this->session->set_userdata('value_inserted', 'Offer added successfully');
        header("Location:view_offer");


    }
}

?>
