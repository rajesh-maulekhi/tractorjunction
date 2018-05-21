<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('shweta');
        $this->load->helper('query');
        $this->load->library("pagination");
        $this->load->model("Front_model");
    }
	public function Logout(){
				$this->session->unset_userdata('user_id_login');
					$this->session->unset_userdata('user_name_login');
	    $root = "http://" . $_SERVER['HTTP_HOST'];
    $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
		
	header("Location: ".$root);
		
	}
	public function Loginstep_one(){
		$mobileNo=$this->input->post('mobileNO1');
		$rand=rand(1000,9999);
		$txt_msg = "OTP for login tractorjunction by Mobile no ".$mobileNo." is ".$rand.". Do not share it with anyone. Regards Team Tractorjunction.";
		smsSent($mobileNo, $txt_msg);
		
				$user_reg = $this->Front_model->get_result_check('id', 'user_reg', 'mobile', $this->input->post('mobileNO1'));
				if (!empty($user_reg)) {
					$userId = '';
					foreach ($user_reg as $key => $value) {
					$userId = $value->id;
					}
				
				}else{
					    date_default_timezone_set("Asia/Kolkata");
        $date_time = $date = date('Y-m-d H:i:s');
	
						$data = array(
						'username' => $this->input->post('mobileNO1'),
						'mobile' => $this->input->post('mobileNO1'),
						'date_time' => $date_time,
						);
						$this->db->insert('user_reg', $data);
						$userId = $this->db->insert_id();
				}
			$dataUpdate=array(
			'code'=>$rand,
			);
		 $this->Front_model->update_data('user_reg',$dataUpdate, 'id', $userId);
				

				?>
					<h3 class="LoginTexxt1">Get access your tractor requests and profile</h3>
					<h6 class="LoginTexxt1 text22Login">OTP sent successfully on <?php echo $mobileNo; ?></h6>
			<div class="col-md-12 col-sm-12 cennterClass"> 
				<input type="text" class="LoginInutBox OTPBOx" onkeypress="return isNumberKey(event);" id="OTPLogin" placeholder="Enter OTP" maxlength="4">
			<a style="cursor:pointer" class="resendOTP" onclick="ResendOTP(<?php echo $mobileNo; ?>);">Resend OTP</a>
			</div>
			<div class="col-md-12 col-sm-12 ButtnCenMar"> 
				<input type="button" value="Login" id="DoneCllick" class="NextBTLogin" onclick="DoneCllick();">
	<input type="hidden" value="<?php echo $userId; ?>" id="user_id">		
		</div>
			
		
				<?php 
           
	}
	function OTPMatch(){
			$data=array(
			'code'=>$this->input->post('OTPLogin1'),
			'id'=>$this->input->post('user_id1'),
			);
			$result= $this->Front_model->get_result($data,'user_reg');
			if(empty($result)){
				echo "Invalid OTP";
			}else{
				$username=$result[0]->username;
					$this->session->set_userdata('user_id_login',$data['id']);
					$this->session->set_userdata('user_name_login',$username);
					$message="Welcome ".$username."...!
					Thank you for showing interest with us...! ";
					$this->session->set_userdata('newsesson',$message);
				
			}
			
	}
	function MyProfile(){
		    $root = "http://" . $_SERVER['HTTP_HOST'];
    $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
				if($this->session->userdata('user_id_login')){

$result=array();
$result['result']=shweta_select('*','user_reg','id',$this->session->userdata('user_id_login'));

				  $meta_keywords = "";
        $meta_description = "";
        $meta = array(
            'meta_title' => 'My Profile - TractorJunction',
            'meta_keywords' => $meta_keywords,
            'meta_description' => $meta_description,
            'meta_robots' => 'all',
            'extra_headers' => ''
        );
        $data11 = array();
        $data11 = array_merge($data11, $meta);
        $this->load->view('header', $data11);
        $this->load->view('my_profile', $result);
        $this->load->view('footer');
				
				
				
				}else{
					header("Location: ".$root);
				}
	}
	function update_profile(){
			$root = "http://".$_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);

			$data=array(
	'username'=>$this->input->post('username'),
	'location'=>$this->input->post('location'),
	'email'=>$this->input->post('email'),
	'state'=>$this->input->post('states'),
	);
	
	shweta_update('user_reg',$data,'id',$this->session->userdata('user_id_login'));
	$this->session->set_userdata('newsesson','Profile updated auccessfully');
	header("Location:".$root."my-profile");
	}
}
	?>