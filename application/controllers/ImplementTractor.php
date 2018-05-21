<?php

class ImplementTractor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('shweta');
        $this->load->helper('form');
        $this->load->helper('query');
        $this->load->library('session');
        $this->load->database();
        $this->load->model("Front_model");
    }

    function index()
    {
        $des = "You can sell used tractor implements quickly with its best price via tractorjunction.com. It is India’s largest tractor online portal which provides easiest way to sell your used tractor implements.";
        $key = "Post Used Tractor Implements , Post Used Tractor Implements For Sell, Sell Old Tractor Implements, Sell Used Tractor Implements in India, Used Tractors Implements For sell, Latest Tractors in India, Tractors in India, Tractor Price in India, Tractor Brands, Tractors Models in India, Tractor prices India, Agricultural Tractors, Online Compare Tractors, Compare Tractors in India";
        $meta = array(
            'meta_title' => 'Post Used Implements, Sell Used Tractor Implements in India - TractorJunction',
            'meta_keywords' => $key,
            'meta_description' => $des,
            'meta_robots' => 'all',
            'extra_headers' => ''
        );
        $data = array();
        $data = array_merge($data, $meta);
        $this->session->set_userdata('pageinfo', 'rent');
        $this->load->view('header', $data);
        $this->load->view('addImplementTractor');
        $this->load->view('footer');
    }


    function GetDivAjax()
    {

        $value = $this->input->post('id_brand');
        if ($value == "harvester") {
            ?>
            <div class="col-md-6 col-sm-6 paddingZ" style="border-left:1px solid #eee;padding-bottom:10px">
                <h4>Key Specifications </h4>
                <div class="col-md-12 col-sm-12" style="margin-top:15px">
                    <div class="col-md-6 col-sm-6" style="text-align:left"> Brand Name: <span class="red">*</span>
                        <?php
                        $query3 = shweta_order_by_query('*', 'brand', 'name', 'ASC');
                        $val3[''] = 'Please Select brand';
                        foreach ($query3 as $k3 => $r3) {
                            $val3[$r3->id] = ucfirst($r3->name);
                        }
                        $ab = 'class="form-control col-md-7 col-xs-12" required="required"';
                        echo form_dropdown('brand', $val3, '', $ab);
                        ?>
                    </div>

                    <div class="col-md-6 col-sm-6" style="text-align:left">Model Name <span class="red">*</span>
                        <?php echo form_input(array('type' => 'text', 'name' => 'name', 'id' => 'brand_name', 'placeholder' => 'Model Name', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>

                    </div>
                    <div class="col-md-12 col-sm-6" style="text-align:left;    padding: 31px 0px;
    padding-bottom: 5px;">
                        <div class="col-md-3 col-sm-6" style="text-align:left">

                            Model Image <span class="red">*</span>
                        </div>
                        <div class="col-md-9 col-sm-6" style="text-align:left">
                            <?php echo form_input(array('type' => 'file', 'name' => 'model_image', 'required' => 'required', 'id' => 'picture', 'class' => 'form-control')); ?>


                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12" style="margin-top:15px">
                    <div class="col-md-6 col-sm-6" style="text-align:left"> Type:
                        <input style="" type="text" class="form-control" name="type" placeholder="Type">
                    </div>

                    <div class="col-md-6 col-sm-6" style="text-align:left">Crop
                        <input style="" type="text" class="form-control" name="crop" placeholder="Crop">
                    </div>
                </div>
                <div class="col-md-12 col-sm-12" style="margin-top:15px">
                    <h4>Electrical System </h4>
                    <div class="col-md-6 col-sm-6" style="text-align:left"> No. of Batteries:
                        <input style="" type="text" class="form-control" name="batteries"
                               placeholder="No. of Batteries">
                    </div>

                    <div class="col-md-6 col-sm-6" style="text-align:left">Battery Output
                        <input style="" type="text" class="form-control" name="outputbattery"
                               placeholder="Battery Output	">
                    </div>
                </div>
                <div class="col-md-12 col-sm-12" style="margin-top:15px">
                    <h4>Storage </h4>
                    <div class="col-md-6 col-sm-6" style="text-align:left"> Grain Tank Capacity:
                        <input style="" type="text" class="form-control" name="graintank"
                               placeholder="Grain Tank Capacity">
                    </div>
                </div>

            </div>

            <div class="col-md-6 col-sm-6 paddingZ" style="border-left:1px solid #eee;padding-bottom:10px">
                <h4>General Features </h4>
                <div class="col-md-12 col-sm-12" style="margin-top:15px">
                    <div class="col-md-6 col-sm-6" style="text-align:left"> Length(mm):
                        <input style="" type="text" class="form-control" name="length" placeholder="Length(mm)">
                    </div>
                    <div class="col-md-6 col-sm-6" style="text-align:left">Width(mm):
                        <input style="" type="text" class="form-control" name="width" placeholder="Width(mm)">
                    </div>
                </div>
                <div class="col-md-12 col-sm-12" style="margin-top:15px">
                    <div class="col-md-6 col-sm-6" style="text-align:left"> Height(mm):

                        <input style="" type="text" class="form-control" name="height" placeholder="Height(mm)">
                    </div>
                    <div class="col-md-6 col-sm-6" style="text-align:left">Ground Clearance (mm):
                        <input style="" type="text" class="form-control" name="groundclear"
                               placeholder="Ground Clearance (mm)">
                    </div>
                </div>
                <div class="col-md-12 col-sm-12" style="margin-top:15px">
                    <div class="col-md-6 col-sm-6" style="text-align:left"> Weight (kg):
                        <input style="" type="text" class="form-control" name="weight" placeholder="Weight (kg)">
                    </div>
                    <div class="col-md-6 col-sm-6" style="text-align:left">Crawler/Belt Length (mm):
                        <input style="" type="text" class="form-control" name="beltlength"
                               placeholder="Crawler/Belt Length (mm)">
                    </div>
                </div>
                <div class="col-md-12 col-sm-12" style="margin-top:15px">

                    <div class="col-md-6 col-sm-6" style="text-align:left">Wheel Base:
                        <input style="" type="text" class="form-control" name="wheelbase" placeholder="Wheel Base">
                    </div>
                </div>
                <div class="col-md-12 col-sm-12" style="margin-top:15px">
                    <div class="col-md-6 col-sm-6" style="text-align:left"> No. of Rollers (each side):
                        <input style="" type="text" class="form-control" name="rollers"
                               placeholder="No. of Rollers (each side)">
                    </div>
                    <div class="col-md-6 col-sm-6" style="text-align:left">No. of Grouser (each side):
                        <input style="" type="text" class="form-control" name="grouser"
                               placeholder="No. of Grouser (each side)">
                    </div>
                </div>
                <div class="col-md-12 col-sm-12" style="margin-top:15px">
                    <div class="col-md-6 col-sm-6" style="text-align:left"> Height of Grouser (mm):
                        <input style="" type="text" class="form-control" name="hgrouser"
                               placeholder="Height of Grouser (mm)">
                    </div>
                    <div class="col-md-6 col-sm-6" style="text-align:left">Ground Contact Area (sqm):
                        <input style="" type="text" class="form-control" name="area"
                               placeholder="Ground Contact Area (sqm)">
                    </div>
                </div>
            </div>


            <div class="col-md-6 col-sm-6 paddingZ"
                 style="border-left:1px solid #eee;border-right:1px solid #eee;padding-bottom:10px;margin-top:20px">
                <h4>Engine </h4>
                <div class="col-md-12 col-sm-12" style="margin-top:15px">
                    <div class="col-md-6 col-sm-6" style="text-align:left">Engine Model:
                        <input style="" type="text" class="form-control" name="enginemodel" placeholder="Engine Modal">
                    </div>

                    <div class="col-md-6 col-sm-6" style="text-align:left"> Cooling System :
                        <input style="" type="text" class="form-control" name="coolingsystem"
                               placeholder="Cooling System">
                    </div>
                </div>
                <div class="col-md-12 col-sm-12" style="margin-top:15px">
                    <div class="col-md-6 col-sm-6" style="text-align:left">Type:
                        <input style="" type="text" class="form-control" name="engtype" placeholder="Type">
                    </div>

                    <div class="col-md-6 col-sm-6" style="text-align:left"> Power :
                        <input style="" type="text" class="form-control" name="epower" placeholder="Power">
                    </div>
                </div>
                <div class="col-md-12 col-sm-12" style="margin-top:15px">
                    <div class="col-md-6 col-sm-6" style="text-align:left">Rated RPM:
                        <input style="" type="text" class="form-control" name="rpm" placeholder="Rated RPM">
                    </div>

                    <div class="col-md-6 col-sm-6" style="text-align:left"> Pre-Cleaner & Air Cleaner :
                        <input style="" type="text" class="form-control" name="drytpe"
                               placeholder="Pre-Cleaner & Air Cleaner	Dry Type">
                    </div>
                </div>
                <div class="col-md-12 col-sm-12" style="margin-top:15px">
                    <div class="col-md-6 col-sm-6" style="text-align:left">Fuel Tank Capacity (l):
                        <input style="" type="text" class="form-control" name="fuelcapacity"
                               placeholder="Fuel Tank Capacity (l)">
                    </div>

                    <div class="col-md-6 col-sm-6" style="text-align:left"> Transmission Type :
                        <input style="" type="text" class="form-control" name="transtype"
                               placeholder="Transmission Type">
                    </div>
                </div>

            </div>


            <div class="col-md-6 col-sm-6 paddingZ" style="padding-bottom:10px;margin-top:20px">
                <h4>HARVESTING </h4>
                <div class="col-md-12 col-sm-12" style="margin-top:15px">
                    <div class="col-md-6 col-sm-6" style="text-align:left">Cutter Bar – Effective Width:
                        <input style="" type="text" class="form-control" name="cutterbar"
                               placeholder="Cutter Bar – Effective Width">
                    </div>

                    <div class="col-md-6 col-sm-6" style="text-align:left">Cutting Height Range (mm)
                        <input style="" type="text" class="form-control" name="cutterheight"
                               placeholder="Cutting Height Range (mm)">
                    </div>
                </div>
                <div class="col-md-12 col-sm-12" style="margin-top:15px">
                    <div class="col-md-6 col-sm-6" style="text-align:left">Reel Drive:
                        <input style="" type="text" class="form-control" name="reeldrive" placeholder="Reel Drive">
                    </div>

                    <div class="col-md-6 col-sm-6" style="text-align:left">Reel Height Adjustment
                        <input style="" type="text" class="form-control" name="reelheight"
                               placeholder="Reel Height Adjustment">
                    </div>
                </div>
                <div class="col-md-12 col-sm-12" style="margin-top:15px">
                    <div class="col-md-6 col-sm-6" style="text-align:left">Feeder Housing:
                        <input style="" type="text" class="form-control" name="feeder" placeholder="Feeder Housing">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 paddingZ" style="padding-bottom:10px;margin-top:20px">
                <h4>CLEANING </h4>
                <div class="col-md-12 col-sm-12" style="margin-top:15px">
                    <div class="col-md-6 col-sm-6" style="text-align:left">Cleaning Type:
                        <input style="" type="text" class="form-control" name="cleningtype" placeholder="Cleaning Type">
                    </div>

                    <div class="col-md-6 col-sm-6" style="text-align:left">Cleaning Area (sq. mt) :
                        <input style="" type="text" class="form-control" name="cleaningarea"
                               placeholder="Cleaning Area (sq. mt)">
                    </div>
                </div>
                <div class="col-md-12 col-sm-12" style="margin-top:15px">
                    <div class="col-md-6 col-sm-6" style="text-align:left">Upper Sieve Area (sq. mt):
                        <input style="" type="text" class="form-control" name="uppersieve"
                               placeholder="Upper Sieve Area (sq. mt)">
                    </div>

                    <div class="col-md-6 col-sm-6" style="text-align:left">Lower Sieve Area (sq. mt) :
                        <input style="" type="text" class="form-control" name="lowersieve"
                               placeholder="Lower Sieve Area (sq. mt)">
                    </div>
                </div>
            </div>


            <div class="col-md-6 col-sm-6 paddingZ"
                 style="border-right:1px solid #eee;padding-bottom:10px;margin-top:20px">
                <h4>THRESHING & SEPARATING </h4>
                <div class="col-md-12 col-sm-12" style="margin-top:15px">
                    <div class="col-md-6 col-sm-6" style="text-align:left">Threshing Cylinder Diameter:
                        <input style="" type="text" class="form-control" name="thershingdiameter"
                               placeholder="Threshing Cylinder Diameter (mm)">
                    </div>

                    <div class="col-md-6 col-sm-6" style="text-align:left">Threshing Cylinder Length (mm) :
                        <input style="" type="text" class="form-control" name="thershinglength"
                               placeholder="Threshing Cylinder Length (mm)">
                    </div>
                </div>
                <div class="col-md-12 col-sm-12" style="margin-top:15px">
                    <div class="col-md-6 col-sm-6" style="text-align:left">Threshing System:
                        <input style="" type="text" class="form-control" name="thershingsystem"
                               placeholder="Threshing System">
                    </div>

                    <div class="col-md-6 col-sm-6" style="text-align:left">Revolutions (RPM) :
                        <input style="" type="text" class="form-control" name="revolution"
                               placeholder="Revolutions (RPM)">
                    </div>
                </div>
                <div class="col-md-12 col-sm-12" style="margin-top:15px">
                    <div class="col-md-6 col-sm-6" style="text-align:left">Speed Adjustment:
                        <input style="" type="text" class="form-control" name="speedadjustment"
                               placeholder="Speed Adjustment">
                    </div>

                    <div class="col-md-6 col-sm-6" style="text-align:left">Concave Width (mm) :
                        <input style="" type="text" class="form-control" name="concavewidth"
                               placeholder="Concave Width (mm)">
                    </div>
                </div>
                <div class="col-md-12 col-sm-12" style="margin-top:15px">
                    <div class="col-md-6 col-sm-6" style="text-align:left">Concave Clearance:
                        <input style="" type="text" class="form-control" name="concaveclear"
                               placeholder="Concave Clearance">
                    </div>

                    <div class="col-md-6 col-sm-6" style="text-align:left">Separating Cylinder Diameter :
                        <input style="" type="text" class="form-control" name="separatingdiameter"
                               placeholder="Separating Cylinder Diameter (mm)">

                    </div>
                </div>
                <div class="col-md-12 col-sm-12" style="margin-top:15px">
                    <div class="col-md-6 col-sm-6" style="text-align:left">Separating Cylinder Length (mm):
                        <input style="" type="text" class="form-control" name="cylinderlength"
                               placeholder="Separating Cylinder Length (mm)">
                    </div>
                </div>
            </div>
            <?php

        } else {

            $fields = array();
            $fields = shweta_select('*', 'implement_fileds', 'title', $value);
            // echo "<pre>";
            // print_r($fields);
            ?>
            <div class="col-md-12 col-sm-6 paddingZ"
                 style="border-right:1px solid #eee;padding-bottom:10px;margin-top:20px">
            <h4>Please fill all fields for add your implement</h4>

            <div class="col-md-6 col-sm-6" style="text-align:left">Model Name <span class="red">*</span>
                <?php echo form_input(array('type' => 'text', 'style' => 'width:90%', 'name' => 'name', 'id' => 'brand_name', 'placeholder' => 'Model Name', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>

            </div>

            <div class="col-md-6 col-sm-6" style="text-align:left">Model Image <span class="red">*</span>
                <?php echo form_input(array('type' => 'file', 'style' => 'width:90%', 'name' => 'model_image', 'required' => 'required', 'id' => 'picture', 'class' => 'form-control')); ?>

            </div>

            <div class="col-md-6 col-sm-6" style="text-align:left">Brand* <span class="red">*</span>
                <?php
                $query3 = shweta_order_by_query('*', 'brand', 'name', 'ASC');
                $val3[''] = 'Please Select brand';
                foreach ($query3 as $k3 => $r3) {
                    $val3[$r3->id] = ucfirst($r3->name);
                }
                $ab = 'class="form-control col-md-7 col-xs-12" required="required" style="width:90%"';
                echo form_dropdown('brand', $val3, '', $ab);
                ?>
            </div>
            <div class="col-md-6 col-sm-6" style="text-align:left">Work on Tractor hp* <span class="red">*</span>
                <?php
                $query3 = '';
                $val3 = '';
                $query3 = shweta_order_by_query('*', 'hp_range_imp', 'id', 'ASC');
                $val3[''] = 'Please Select HP range';
                foreach ($query3 as $k3 => $r3) {
                    $val3[$r3->id] = ucfirst($r3->name) . " HP";
                }
                $ab = 'class="form-control col-md-7 col-xs-12" required="required" style="width:90%"';
                echo form_dropdown('hp', $val3, '', $ab);
                ?>
            </div>
            <div class="col-md-12 col-sm-6" style="text-align:left;margin-top:20px;">If you have any field that want to
                show please inter here and for more field click add more
                <div id="AddImplementFiledOld">
                    <div class="col-md-10 col-sm-6 col-xs-12">
                        <div class="col-md-5 col-sm-6 col-xs-12">
                            <input name="filedkey[]" placeholder="Field type" class="form-control col-md-7 col-xs-12"
                                   id="p_1" maxlength="50" type="text">
                        </div>
                        <div class="col-md-5 col-sm-6 col-xs-12">
                            <input name="filedvalue[]" placeholder="Field Value" class="form-control col-md-7 col-xs-12"
                                   id="p_1" maxlength="50" type="text">
                        </div>

                    </div>
                </div>
                <a onclick="AddImplementFiledOldFunction();" class="btn btn-default" style="cursor:pointer;">Add
                    More</a>
            </div>


            <?php
            foreach ($fields as $fieldsKey => $fieldsValue) {

                $featurename = array();
                $featurename_filter = array();
                $featurename_count = "";

                $featurename = explode('$$', $fieldsValue->fieldsName);
                $featurename_filter = (array_filter($featurename));

                ?>


                <?php
                foreach ($featurename_filter as $k1) {

                    ?>


                    <div class="col-md-6 col-sm-6" style="text-align:left"><?php echo ucfirst($k1); ?> : <span
                                class="red">*</span>
                        <?php echo form_input(array('type' => 'text', 'style' => 'width:90%', 'class' => 'form-control', 'required' => 'required', 'name' => 'valueImplement[]')); ?>

                    </div>

                    <?php

                }
                ?></div><?php

            }
        }

    }


    function SetHarveserSession()
    {
        $harVersterId = $this->input->post('HarvesterId');
        $this->session->set_userdata('harversterId', $harVersterId);
    }


    function SetImplementSession()
    {
        $implementId = $this->input->post('ImplementId1');
        $this->session->set_userdata('implementId', $implementId);
    }


    function singleharvesterTractor($slug)
    {
	 
        $root = "http://" . $_SERVER['HTTP_HOST'];

        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);


        $slug = str_replace('-combine-harvester', '', $slug);


// $slug= Actual_slug_get($slug);


// $result=array();
// $alltractor=shweta_select('id,brand,slug','harvester','','');
// $alltractorArr=array();
// $alltractorArrNew=array();
// foreach($alltractor as $alltractorKey=>$alltractorValue){
// $brandNameOld='';
// foreach(shweta_select('name','brand','id',$alltractorValue->brand) as $raa) $brandNameOld=ucfirst($raa->name) ;
// $alltractorArr['id']=$alltractorValue->id;
// $alltractorArr['slug']=newslugend($brandNameOld)."-".$alltractorValue->slug."-combine-harvester";

// $alltractorArrNew[]=$alltractorArr;
// }
// foreach($alltractorArrNew as $kk){
// if($kk['slug'] == $slug){

// $result['result']=shweta_select('*','harvester','id',$kk['id']);
// }
// }


        // $get_allBrand=shweta_select('slug','brand','','');
        // $all_brand=array();
        // foreach($get_allBrand as $getKey=>$getValue){
        // $all_brand[]=newslugend($getValue->slug);
        // }
        // foreach($all_brand as $brandName){
        // foreach($slug_array as $slu){
        // if($slu == $t){
        // $slug= str_replace($slu, "", $slug);
        // }
        // }
        // }


        $result = array();

        $cond = '';
        $cond = " id ='" . $this->session->userdata('harversterId') . "'";
        // die;


        if (empty($result['result'])) {
            $AllHArvester = shweta_select('id,brand,slug', 'harvester', '', '');
            foreach ($AllHArvester as $AllHArvesterkey => $AllHArvesterValue) {
                $brandNameOld = '';
                foreach (shweta_select('name', 'brand', 'id', $AllHArvesterValue->brand) as $raa) $brandNameOld = ($raa->name);
                $NewSlug = newslugend($brandNameOld . "-" . $AllHArvesterValue->slug);
                if ($NewSlug == $slug) {
                    $cond = '';
                    $cond = " id ='" . $AllHArvesterValue->id . "'";
                }
            }
        }

        $result['result'] = shweta_select_th('*', 'harvester', $cond);

        if (empty($result['result'])) {
            header("Location:" . $root . "tractor-combine-harvesters");
            die;
        }

        // echo "<pre>";
        // print_r($result);
        // die;
        $brandName = '';
        $modelName = '';

        foreach ($result['result'] as $key => $value) {
            foreach (shweta_select('name', 'brand', 'id', $value->brand) as $raa) $brandName = ucfirst($raa->name);
            $modelName = $value->model_name;
        }


        $title = "Tractor Combine Harvesters, " . $brandName . " " . $modelName . " Combine Harvesters, Agriculture Implements in India - TractorJunction";
        $Description = "Get details of " . $brandName . " " . $modelName . " Combine Harvesters with their features, specification and reasonable price in India only at TractorJunction.";
        $key = "" . $brandName . " " . $modelName . " Combine Harvesters , " . $brandName . " " . $modelName . " Combine Harvesters in India, Tractor Combine Harvesters,  Agriculture Implements in India , Tractor Driven Harvester Combine , Tractor Combine Harvesters in India, Combine Harvester For Sale, Combine Harvester For Rent, Latest Tractors in India, Tractors in India, Tractor Price in India, Tractor Brands, Tractors Models in India, Tractor prices India, Agricultural Tractors, Online Compare Tractors, Compare Tractors in India";

        $this->session->set_userdata('pageinfo', 'rent');


        $meta = array(
            'meta_title' => $title,
            'meta_keywords' => $key,
            'meta_description' => $Description,
            'meta_robots' => 'all',
            'extra_headers' => ''
        );
        $data = array();
        $data = array_merge($data, $meta);

        $this->load->view('header', $data);
        $this->load->view('singleharvesterTractor', $result);
        $this->load->view('footer');

    }

    function ShowHarvesterTractor()
    {

        $result['SearchOldTractor'] = $this->Front_model->PopLatUpTract('*', 'harvester', 'status', '1', 18, 0);
 
		$meta=Meta_title_description('tractor_combine_harvesters');
        $data = array();
        $data = array_merge($data, $meta);
        $this->session->set_userdata('pageinfo', 'harvester');
        $this->load->view('header', $data);
        $this->load->view('searchHarvstertractor', $result);
        $this->load->view('footer');

    }

    function AddImplement()
    {


        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        date_default_timezone_set("Asia/Kolkata");
        $date_time = $date = date('Y-m-d');


        $image_name = '';
        if (isset($_FILES['model_image']['name'])) {
            if ($_FILES['model_image']['name'] != "") {
                $this->load->library('upload');
                $config['file_name'] = newslugend($this->input->post('name'));
                $config['upload_path'] = './images/implementTractor/';
                $config['allowed_types'] = 'jpg|jpeg|gif|png';
                $config['max_size'] = 8000;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $this->upload->initialize($config);
                $this->upload->do_upload('model_image');
                $upload_data = $this->upload->data();
                $image_name = $upload_data['file_name'];
            }
        }

        //slug check
        $array = array();
        $slug = newslugend($this->input->post('name'));
        $slugResult = shweta_select('slug', 'old_implement', '', '');
        foreach ($slugResult as $b => $a) {
            $array[] = $a->slug;
        }
        $array = array_filter($array);
        if (in_array($slug, $array)) {
            $slug = $slug . (count($slugResult) + 1);
        } else {
            $slug = $slug;
        }


        if ($this->input->post('typeImplement') == "harvester") {

            $fil = array(
                'email' => $this->input->post('email'),
                'mobile' => $this->input->post('mobile'),
                'pincode' => $this->input->post('pincode'),
                'name' => $this->input->post('username'),
                'state' => $this->input->post('state'),
                'city' => $this->input->post('city'),
                'user_id' => $this->session->userdata('review_id'),
                'type_implement' => $this->input->post('typeImplement'),
                'implement_for' => $this->input->post('like'),
                'model_name' => $this->input->post('name'),
                'brand' => $this->input->post('brand'),
                'image' => $image_name,
                'type' => $this->input->post('type'),
                'crop' => $this->input->post('crop'),
                'length' => $this->input->post('length'),
                'width' => $this->input->post('width'),
                'height' => $this->input->post('height'),
                'groundclear' => $this->input->post('groundclear'),
                'weight' => $this->input->post('weight'),
                'beltlength' => $this->input->post('beltlength'),
                'wheelbase' => $this->input->post('wheelbase'),
                'rollers' => $this->input->post('rollers'),
                'grouser' => $this->input->post('grouser'),
                'hgrouser' => $this->input->post('hgrouser'),
                'area' => $this->input->post('area'),
                'enginemodel' => $this->input->post('enginemodel'),
                'coolingsystem' => $this->input->post('coolingsystem'),
                'engtype' => $this->input->post('engtype'),
                'epower' => $this->input->post('epower'),
                'rpm' => $this->input->post('rpm'),
                'drytpe' => $this->input->post('drytpe'),
                'fuelcapacity' => $this->input->post('fuelcapacity'),
                'transtype' => $this->input->post('transtype'),
                'batteries' => $this->input->post('batteries'),
                'outputbattery' => $this->input->post('outputbattery'),
                'cutterbar' => $this->input->post('cutterbar'),
                'cutterheight' => $this->input->post('cutterheight'),
                'reeldrive' => $this->input->post('reeldrive'),
                'reelheight' => $this->input->post('reelheight'),
                'feeder' => $this->input->post('feeder'),
                'thershingdiameter' => $this->input->post('thershingdiameter'),
                'thershinglength' => $this->input->post('thershinglength'),
                'thershingsystem' => $this->input->post('thershingsystem'),
                'revolution' => $this->input->post('revolution'),
                'speedadjustment' => $this->input->post('speedadjustment'),
                'concavewidth' => $this->input->post('concavewidth'),
                'concaveclear' => $this->input->post('concaveclear'),
                'separatingdiameter' => $this->input->post('separatingdiameter'),
                'cylinderlength' => $this->input->post('cylinderlength'),
                'cleningtype' => $this->input->post('cleningtype'),
                'cleaningarea' => $this->input->post('cleaningarea'),
                'uppersieve' => $this->input->post('uppersieve'),
                'lowersieve' => $this->input->post('lowersieve'),
                'graintank' => $this->input->post('graintank'),
                'status' => 1,
                'date' => $date_time,
                'slug' => $slug,
            );

        } else {

            $feature_name = array();
            $feature_name_str = '';
            $feature_name = $this->input->post('valueImplement');
            if (!empty($feature_name)) {
                $feature_name = (array_filter($feature_name));
                $feature_name_str = implode('$$', $feature_name);
            }


            $fieldkeyArray = array();
            $filedKeyStr = '';
            $fieldkeyArray = $this->input->post('filedkey');
            if (!empty($fieldkeyArray)) {
                $fieldkeyArray = (array_filter($fieldkeyArray));
                $filedKeyStr = implode('$$', $fieldkeyArray);
            }

            $fieldValueArray = array();
            $filedValueStr = '';
            $fieldValueArray = $this->input->post('filedvalue');
            if (!empty($fieldValueArray)) {
                $fieldValueArray = (array_filter($fieldValueArray));
                $filedValueStr = implode('$$', $fieldValueArray);
            }


            $fil = array(
                'email' => $this->input->post('email'),
                'brand' => $this->input->post('brand'),
                'hp' => $this->input->post('hp'),

                'mobile' => $this->input->post('mobile'),
                'pincode' => $this->input->post('pincode'),
                'name' => $this->input->post('username'),
                'state' => $this->input->post('state'),
                'city' => $this->input->post('city'),
                'user_id' => $this->session->userdata('review_id'),
                'type_implement' => $this->input->post('typeImplement'),

                'implement_for' => $this->input->post('like'),

                'value_fields' => $feature_name_str,
                'filedKeyStr' => $filedKeyStr,
                'filedValueStr' => $filedValueStr,

                'model_name' => $this->input->post('name'),


                'image' => $image_name,
                'status' => 1,
                'date' => $date_time,
                'slug' => $slug,
            );
        }


        $sellEmail = '';
        $sellEmail = $this->input->post('email');


        $userEmail = '';
        foreach (shweta_select('email', 'user_reg', 'id', $this->session->userdata('review_id')) as $raa) $userEmail = ($raa->email);
        $implementType = '';
        foreach (shweta_select('name', 'filed', 'id', $this->input->post('typeImplement')) as $raa) $implementType = ($raa->name);


//mail sent
        $nameHeader = $sellEmail;
        $lineSecond = '';
        $lineFirst = 'Congratulations! You have successfully added a implement for ' . $this->input->post('like') . ' in Tractor junction';
        $otherInfo = array(

            'Implement type' => ucfirst($implementType),
            'Implement Name' => $this->input->post('name'),
            'Added On' => $date_time,
        );
        $message = sentMailFunction($nameHeader, $lineFirst, $lineSecond, $otherInfo);

        $subject = "Successfully Added Implement in Tractor junction";
        MailSentNow($message, $subject, $sellEmail);


//mail sent userid
        $nameHeader = $userEmail;
        $lineSecond = 'For more details you can visit our website.';
        $lineFirst = 'Congratulations! Your friend ' . $sellEmail . ' added a implement for ' . $this->input->post('like') . ' in Tractor junction';

        $message = sentMailFunction($nameHeader, $lineFirst, $lineSecond, $otherInfo);

        MailSentNow($message, $subject, $userEmail);


        shweta_insert_form('old_implement', $fil);
        $this->session->set_userdata('newsesson', 'Implement added successfully');
        header("location:" . $root . "add-used-tractor-implement");


    }

    function updateImplementold()
    {


        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        date_default_timezone_set("Asia/Kolkata");
        $date_time = $date = date('Y-m-d');


        $image_name = '';
        if (isset($_FILES['model_image']['name'])) {
            if ($_FILES['model_image']['name'] != "") {
                $config['file_name'] = newslugend($this->input->post('name'));
                $this->load->library('upload');
                $config['upload_path'] = './images/implementTractor/';
                $config['allowed_types'] = 'jpg|jpeg|gif|png';
                $config['max_size'] = 8000;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $this->upload->initialize($config);
                $this->upload->do_upload('model_image');
                $upload_data = $this->upload->data();
                $image_name = $upload_data['file_name'];
                if (file_exists("./images/implementTractor/" . $this->input->post('old_image'))) {
                    unlink('./images/implementTractor/' . $this->input->post('old_image'));
                }
            } else {
                $image_name = $this->input->post('old_image');
            }
        } else {
            $image_name = $this->input->post('old_image');
        }


//slug check


        $array = array();
        $slug = newslugend($this->input->post('name'));
        $slugOld = newslugend($this->input->post('slug_old'));
        if ($slugOld != $slug) {
            $slugResult = shweta_select('slug', 'old_implement', '', '');
            foreach ($slugResult as $b => $a) {
                $array[] = $a->slug;
            }
            $array = array_filter($array);
            if (in_array($slug, $array)) {
                $slug = $slug . (count($slugResult) + 1);
            } else {
                $slug = $slug;
            }
        }


        if ($this->input->post('typeImplement') == "harvester") {

            $fil = array(
                'email' => $this->input->post('email'),
                'mobile' => $this->input->post('mobile'),
                'pincode' => $this->input->post('pincode'),
                'name' => $this->input->post('username'),
                'state' => $this->input->post('state'),
                'city' => $this->input->post('city'),
                'user_id' => $this->session->userdata('review_id'),
                'type_implement' => $this->input->post('typeImplement'),
                'implement_for' => $this->input->post('like'),
                'model_name' => $this->input->post('name'),
                'brand' => $this->input->post('brand'),
                'image' => $image_name,
                'type' => $this->input->post('type'),
                'crop' => $this->input->post('crop'),
                'length' => $this->input->post('length'),
                'width' => $this->input->post('width'),
                'height' => $this->input->post('height'),
                'groundclear' => $this->input->post('groundclear'),
                'weight' => $this->input->post('weight'),
                'beltlength' => $this->input->post('beltlength'),
                'wheelbase' => $this->input->post('wheelbase'),
                'rollers' => $this->input->post('rollers'),
                'grouser' => $this->input->post('grouser'),
                'hgrouser' => $this->input->post('hgrouser'),
                'area' => $this->input->post('area'),
                'enginemodel' => $this->input->post('enginemodel'),
                'coolingsystem' => $this->input->post('coolingsystem'),
                'engtype' => $this->input->post('engtype'),
                'epower' => $this->input->post('epower'),
                'rpm' => $this->input->post('rpm'),
                'drytpe' => $this->input->post('drytpe'),
                'fuelcapacity' => $this->input->post('fuelcapacity'),
                'transtype' => $this->input->post('transtype'),
                'batteries' => $this->input->post('batteries'),
                'outputbattery' => $this->input->post('outputbattery'),
                'cutterbar' => $this->input->post('cutterbar'),
                'cutterheight' => $this->input->post('cutterheight'),
                'reeldrive' => $this->input->post('reeldrive'),
                'reelheight' => $this->input->post('reelheight'),
                'feeder' => $this->input->post('feeder'),
                'thershingdiameter' => $this->input->post('thershingdiameter'),
                'thershinglength' => $this->input->post('thershinglength'),
                'thershingsystem' => $this->input->post('thershingsystem'),
                'revolution' => $this->input->post('revolution'),
                'speedadjustment' => $this->input->post('speedadjustment'),
                'concavewidth' => $this->input->post('concavewidth'),
                'concaveclear' => $this->input->post('concaveclear'),
                'separatingdiameter' => $this->input->post('separatingdiameter'),
                'cylinderlength' => $this->input->post('cylinderlength'),
                'cleningtype' => $this->input->post('cleningtype'),
                'cleaningarea' => $this->input->post('cleaningarea'),
                'uppersieve' => $this->input->post('uppersieve'),
                'lowersieve' => $this->input->post('lowersieve'),
                'graintank' => $this->input->post('graintank'),

                'slug' => $slug,
            );

        } else {

            $feature_name = array();
            $feature_name_str = '';
            $feature_name = $this->input->post('valueImplement');
            if (!empty($feature_name)) {
                $feature_name = (array_filter($feature_name));
                $feature_name_str = implode('$$', $feature_name);
            }


            $fieldkeyArray = array();
            $filedKeyStr = '';
            $fieldkeyArray = $this->input->post('filedkey');
            if (!empty($fieldkeyArray)) {
                $fieldkeyArray = (array_filter($fieldkeyArray));
                $filedKeyStr = implode('$$', $fieldkeyArray);
            }

            $fieldValueArray = array();
            $filedValueStr = '';
            $fieldValueArray = $this->input->post('filedvalue');
            if (!empty($fieldValueArray)) {
                $fieldValueArray = (array_filter($fieldValueArray));
                $filedValueStr = implode('$$', $fieldValueArray);
            }


            $fil = array(
                'email' => $this->input->post('email'),
                'brand' => $this->input->post('brand'),
                'hp' => $this->input->post('hp'),
                'mobile' => $this->input->post('mobile'),
                'pincode' => $this->input->post('pincode'),
                'name' => $this->input->post('username'),
                'state' => $this->input->post('state'),
                'city' => $this->input->post('city'),
                'user_id' => $this->session->userdata('review_id'),

                'implement_for' => $this->input->post('like'),
                'value_fields' => $feature_name_str,
                'filedKeyStr' => $filedKeyStr,
                'filedValueStr' => $filedValueStr,
                'model_name' => $this->input->post('name'),
                'image' => $image_name,
                'slug' => $slug,
            );
        }


        shweta_update('old_implement', $fil, 'id', $this->input->post('id_old'));
        $this->session->set_userdata('newsesson', 'Implement updated successfully');
        header("location:" . $root . "my-profile");


    }


    function ShowImplementsOld()
    {

        $des = "TractorJunction is one of the leading online automotive information source for Tractors in India. Here user can find out the latest Tractor brands and models in India along with their detailed information like features, specification and performance etc.";
        $key = "Tractor, Tractors, Latest Tractors, Latest Tractor in India, Compare Tractors Online, Compare Tractors,  Tractors in India, Tractor Price in India, Tractor Brands, Tractor Information, Tractor Specification, Tractors Reviews, Tractors Features, Tractors Models, Tractor prices India, New Tractors in India, Model Tractors, Agriculture Tractor, Tractor Dealers in India, Best Tractor in India, Best Tractors in India, Tractor Info, Commercial Tractors,  Agricultural Tractors, Tractor Models, Latest Tractors in India,  New Tractors, New Tractors in India, Tractor Prices, Tractors Specification, Tractor Reviews, Tractor Features";
        $meta = array(
            'meta_title' => 'Tractors Information, Tractors Specification, Tractors Features, Tractor Price in India- TractorJunction',
            'meta_keywords' => $key,
            'meta_description' => $des,
            'meta_robots' => 'all',
            'extra_headers' => ''
        );
        $data = array();
        $data = array_merge($data, $meta);
        // $this->session->set_userdata('pageinfo','harvester');
        $this->load->view('header', $data);
        $this->load->view('searchImplementsOldTractor');
        $this->load->view('footer');

    }


    function filterImplementOldtractorResult()
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        $value_array = $this->input->post('val');
        if (!empty($value_array)) {
            $main_array_explode = array();
            $key_index_array = array();
            $colume_name = array();
            $colume_value = array();
            $key_value = "";
            $key_index = "";
            $new_array = array();
            foreach ($value_array as $key => $value) {
                $main_array_explode[] = explode(':', $value);
            }
            foreach ($main_array_explode as $key1) {
                $key_index = $key1[0];
                $key_value = $key1[1];
                $new_array[][$key_index] = $key_value;
            }
            $explode_price = array();
            $explode_hp = array();
            $all_tractor = array();
            $all_tractor_explode = array();
            $match_tractor = array();
            $condition_price = "";
            $condition_hp = "";
            $condition_brand = "";
            $condition_uses = "";
            foreach ($new_array as $key2 => $value2) {
                foreach ($value2 as $key3 => $value3) {

                    //brand condition
                    if ($key3 == "type_implement") {
                        $condition_brand .= $key3 . " = '" . $value3 . "' OR ";
                    }
                    //brand condition
                    if ($key3 == "implement_for") {
                        $condition_hp .= $key3 . " = '" . $value3 . "' OR ";
                    }
                }
            }
            $condition_new_brand = rtrim($condition_brand, " OR");
            $condition_hp = rtrim($condition_hp, " OR");
            $fibal_condition = "";


            if ($condition_new_brand != "") {
                $fibal_condition .= " (" . $condition_new_brand . " ) AND ";
            }
            if ($condition_hp != "") {
                $fibal_condition .= " (" . $condition_hp . " ) AND ";
            }
            $condition_final = "";
            $condition_final = rtrim($fibal_condition, " AND");
            $condition_final .= " and status='1'";

            $result = array();
            $ci =& get_instance();
            $ci->load->database();
            $ci->db->select('*');
            $ci->db->from('old_implement');
            // $ci->db->join('hp', 'hp.id = implements.hp');
            $ci->db->where($condition_final);
            $total = "";
            $query = $ci->db->get();
            $result = $query->result();

        } else {
            $result = array();
            $result = shweta_select('*', 'old_implement', 'status', '1');
        }
        echo implementOldTractorDiv($result);
    }


    function filterHarvestertractorResult()
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        $value_array = $this->input->post('val');
        if (!empty($value_array)) {
            $main_array_explode = array();
            $key_index_array = array();
            $colume_name = array();
            $colume_value = array();
            $key_value = "";
            $key_index = "";
            $new_array = array();
            foreach ($value_array as $key => $value) {
                $main_array_explode[] = explode(':', $value);
            }
            foreach ($main_array_explode as $key1) {
                $key_index = $key1[0];
                $key_value = $key1[1];
                $new_array[][$key_index] = $key_value;
            }
            $explode_CutterBar = array();
            $explode_hp = array();
            $all_tractor = array();
            $all_tractor_explode = array();
            $match_tractor = array();
            $Condition_CutterBar = "";
            $condition_hp = "";
            $condition_brand = "";
            $condition_power_Source = "";
            foreach ($new_array as $key2 => $value2) {
                foreach ($value2 as $key3 => $value3) {

                    //brand condition
                    if ($key3 == "power_Source") {
                        $condition_power_Source .= $key3 . " = '" . $value3 . "' OR ";
                    }
                    //brand condition
                    if ($key3 == "brand") {
                        $condition_brand .= $key3 . " = " . $value3 . " OR ";
                    }
                    //brand condition
                    if ($key3 == "cutterbar") {
                        $explode_CutterBar = explode('-', $value3);
                        $Condition_CutterBar .= " cutterbar BETWEEN " . $explode_CutterBar[0] . " AND " . $explode_CutterBar[1] . " OR ";
                    }
                }
            }
            $condition_new_brand = rtrim($condition_brand, " OR");
            $Condition_CutterBar = rtrim($Condition_CutterBar, " OR");
            $condition_power_Source = rtrim($condition_power_Source, " OR");
            $fibal_condition = "";


            if ($condition_new_brand != "") {
                $fibal_condition .= " (" . $condition_new_brand . " ) AND ";
            }
            if ($Condition_CutterBar != "") {
                $fibal_condition .= " (" . $Condition_CutterBar . " ) AND ";
            }
            if ($condition_power_Source != "") {
                $fibal_condition .= " (" . $condition_power_Source . " ) AND ";
            }
            $condition_final = "";
            $condition_final = rtrim($fibal_condition, " AND");
            $condition_final .= " and status='1'";

            $result = array();
            $ci =& get_instance();
            $ci->load->database();
            $ci->db->select('*');
            $ci->db->from('harvester');
            // $ci->db->join('hp', 'hp.id = implements.hp');
            $ci->db->where($condition_final);
            $total = "";
            $query = $ci->db->get();
            $result = $query->result();

        } else {
            $result = array();
            $result = shweta_select('*', 'harvester', 'status', '1');
        }
        echo implementTractorDiv($result);
    }


    function filterNewImpResult()
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        $value_array = $this->input->post('val');
        $imp1mnt = '';
        $imp1mnt = $this->input->post('imp1');
        $this->session->set_userdata('FilterImplentChkValue', $value_array);
        // echo "<pre>";
        // print_r($value_array);
        // die;
        if (!empty($value_array)) {
            $main_array_explode = array();
            $key_index_array = array();
            $colume_name = array();
            $colume_value = array();
            $key_value = "";
            $key_index = "";
            $new_array = array();
            foreach ($value_array as $key => $value) {
                $main_array_explode[] = explode(':', $value);
            }
            foreach ($main_array_explode as $key1) {
                $key_index = $key1[0];
                $key_value = $key1[1];
                $new_array[][$key_index] = $key_value;
            }
            $explode_price = array();
            $explode_hp = array();
            $all_tractor = array();
            $all_tractor_explode = array();
            $match_tractor = array();
            $condition_price = "";
            $condition_hp = "";
            $condition_brand = "";
            $condition_uses = "";
            // echo "<pre>";
            // print_r($new_array);
            // die;
            foreach ($new_array as $key2 => $value2) {
                foreach ($value2 as $key3 => $value3) {

                    //cate condition
                    if ($key3 == "implementType") {
                        $condition_uses .= $key3 . " = " . $value3 . " OR ";
                    }
                    //brand condition
                    if ($key3 == "brand") {
                        $condition_brand .= $key3 . " = " . $value3 . " OR ";
                    }
                    if ($key3 == "implement_cate") {
                        $condition_hp .= $key3 . " = " . $value3 . " OR ";
                    }
                }
            }
            $condition_new_brand = rtrim($condition_brand, " OR");
            $condition_hp = rtrim($condition_hp, " OR");
            $condition_uses = rtrim($condition_uses, " OR");
            $fibal_condition = "";


            if ($condition_uses != "") {
                $fibal_condition .= " (" . $condition_uses . " ) AND ";
            }
            if ($condition_new_brand != "") {
                $fibal_condition .= " (" . $condition_new_brand . " ) AND ";
            }
            if ($condition_hp != "") {
                $fibal_condition .= " (" . $condition_hp . " ) AND ";
            }
            $condition_final = "";
            $condition_final = rtrim($fibal_condition, " AND");
            $condition_final .= " and status='1'";
// echo $condition_final;
// die;
            $result = array();
            $ci =& get_instance();
            $ci->load->database();
            // $ci->db->select('*');
            // $ci->db->from('new_implement');

            // $ci->db->where($condition_final);
            // $total="";
            // $query = $ci->db->get();
            // $result=$query->result();
            // $result=shweta_order_by_limit2('*','new_implement',$condition_final,$limitcal, 0);
        } else {
            $condition_final = '';
            $result = array();
            // $result=shweta_order_by_limit2('*','new_implement',$condition_final,$limitcal, 0);
        }


        $total = count(shweta_select_th('id', 'new_implement', $condition_final));
        if ($this->session->userdata('ViewSession')) {
            $limitcal = $this->session->userdata('ViewSession');
        } else {
            $limitcal = 15;
        }
        $this->session->set_userdata('ImplementCondition', $condition_final);

        $result = shweta_order_by_limit2('*', 'new_implement', $condition_final, $limitcal, 0);
        $lastval = count($result);
        if ($this->session->userdata('ViewSession')) {
            $limitcal = $this->session->userdata('ViewSession');
            $this->session->set_userdata('ViewSession', $limitcal);
        } else {
            $this->session->set_userdata('ViewSession', 15);
        }


        echo implementTractorDivNew($result, $total, $lastval);
    }


    function SrachAjax()
    {
        $result = array();
        $value = $_GET["term"];
        $condition = '';
        $condition = "model_name LIKE '%" . $value . "%'";
        $result = shweta_select_th('model_name', 'harvester', $condition);


        $json = array();
        if (!empty($result)) {
            foreach ($result as $key => $resultvalue) {
                $json[] = array(
                    'value' => $resultvalue->model_name,
                    'label' => $resultvalue->model_name
                );
            }
        } else {
            $json[] = array(
                'value' => "",
                'label' => "No Result Found"
            );
        }
        echo json_encode($json);


    }

    function GetSearchResult()
    {

        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);


        $result = array();
        $value = $this->input->post('name');
        $condition = '';
        $condition = "model_name LIKE '%" . $value . "%'";
        $result = shweta_select_th('model_name,slug,brand', 'harvester', $condition);
        $slug = '';
        // echo "<pre>";
        // print_r($result);
        // die;

        if (!empty($result)) {

            foreach ($result as $value => $obj) {
                $barndName = '';
                foreach (shweta_select('name', 'brand', 'id', $obj->brand) as $raa) $barndName = ($raa->name);
                $slug = $obj->slug;
            }
            header("Location:" . $root . "harvester/" . newslugend($barndName) . "-" . $slug . "-combine-harvester");
        } else {
            header("Location:" . $root . "tractor-combine-harvesters");
        }
    }


    function ImplementsNew($slug)
    {
 
  
		
		
        $result = array();
        $fieldId = '';
        foreach (shweta_select('id', 'filed', 'slug', $slug) as $raa) $fieldId = ($raa->id);


        $result['r'] = $fieldId;

        $condition = '';
        $condition = "implementType='" . $fieldId . "'";
        $this->session->set_userdata('ImplementCondition', $condition);
        $total = count(shweta_select_th('*', 'new_implement', $condition));
        if ($this->session->userdata('ViewSession')) {
            $limitcal = $this->session->userdata('ViewSession');
        } else {
            $limitcal = 15;
        }
        $result['result'] = shweta_order_by_limit2('*', 'new_implement', $condition, $limitcal, 0);
        $lastval = count($result['result']);
        if ($this->session->userdata('ViewSession')) {
            $limitcal = $this->session->userdata('ViewSession');
            $this->session->set_userdata('ViewSession', $limitcal);
        } else {
            $this->session->set_userdata('ViewSession', 15);
        }


        $result['total'] = $total;
        $result['lastval'] = $lastval;

        // $result['result']=shweta_select_th('*','new_implement',$condition);
// echo "<pre>";
// print_r($result);
// die;
$pageName='';
if($slug == "rotary-tiller-rotavator"){ $pageName='rotary_tiller_rotavator'; $meta=Meta_title_description($pageName); }
elseif($slug == "plough"){ $pageName='plough'; $meta=Meta_title_description($pageName); }
elseif($slug == "cultivator"){ $pageName='cultivator'; $meta=Meta_title_description($pageName); }
elseif($slug == "thresher"){ $pageName='thresher'; $meta=Meta_title_description($pageName); }
elseif($slug == "seed-cum-fertilizer-drill"){ $pageName='seed_cum_fertilizer_drill'; $meta=Meta_title_description($pageName); }
elseif($slug == "bund-maker"){ $pageName='bund_maker'; $meta=Meta_title_description($pageName); }
elseif($slug == "chopper"){ $pageName='chopper'; $meta=Meta_title_description($pageName); }

else{	
$key = '';
$title = "Tractor " . $slug . ", Tractor Implements, Farm Tractor Implements in India -TractorJunction";
$Description = "We offers a list of all farm tractor implements and other agricultural products with their complete features and price. By clicking on the item in which you interested, you can find detailed information about that.";
$key = "Tractor " . $slug . ", Tractor Implements, Farm Tractor Implements, Agricultural Tractor Implements, Latest Tractor Implements in India, Tractor Implements in India, Agricultural Tractor Implements in India, Farm Tractor Implements in India, Latest Tractors in India, Tractors in India, Tractor Price in India, Tractor Brands, Tractors Models in India, Tractor prices India, Agricultural Tractors, Online Compare Tractors, Compare Tractors in India";

$meta = array(
'meta_title' => $title,
'meta_keywords' => $key,
'meta_description' => $Description,
'meta_robots' => 'all',
'extra_headers' => ''
);
}
        $data = array();
        $data = array_merge($data, $meta);
        // echo "<pre>";
        // print_r($data);
        // die;
        $this->session->set_userdata('pageinfo', 'implementNew');
        $this->load->view('header', $data);
        $this->load->view('show_OtherImplement_New', $result);
        $this->load->view('footer');
    }

    function AllTractorImplementSearch()
    {
        // echo $slug;
        // die;

        $fieldId = '';
        // foreach(shweta_select('id','filed','slug',$slug) as $raa) $fieldId=($raa->id) ;

        $result = array();

        $result['r'] = $fieldId;


        $condition = '';
        // $condition="implementType='".$fieldId."'";
        $this->session->set_userdata('ImplementCondition', $condition);


        $total = count(shweta_select('id', 'new_implement', '', ''));
        if ($this->session->userdata('ViewSession')) {
            $limitcal = $this->session->userdata('ViewSession');
        } else {
            $limitcal = 15;
        }

        $result['result'] = shweta_select_limit('*', 'new_implement', '', '', $limitcal, 0);
        $lastval = count($result['result']);
        if ($this->session->userdata('ViewSession')) {
            $limitcal = $this->session->userdata('ViewSession');
            $this->session->set_userdata('ViewSession', $limitcal);
        } else {
            $this->session->set_userdata('ViewSession', 15);
        }


        $result['total'] = $total;
        $result['lastval'] = $lastval;


 
$meta=Meta_title_description('tractor_implements');
       
	 $data = array();
        $data = array_merge($data, $meta);
     
        $this->session->set_userdata('pageinfo', 'implementNew');
        $this->load->view('header', $data);
        $this->load->view('show_OtherImplement_New', $result);
        $this->load->view('footer');
    }

    function NewImplementViewMore()
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        $condition = '';
        $condition = $this->session->userdata('ImplementCondition');

        $total = count(shweta_select_th('id', 'new_implement', $condition));


        $limitcal = 0;
        if ($this->session->userdata('ViewSession')) {
            $limitcal = $this->session->userdata('ViewSession') + 15;
            $this->session->set_userdata('ViewSession', $limitcal);

        }
        $limit_result = array();
        $limit_result = shweta_order_by_limit2('*', 'new_implement', $condition, $limitcal, 0);
        $lastval = count($limit_result);
        echo implementTractorDivNew($limit_result, $total, $lastval);
    }

    function ImplementsNewSingle($slug)
    {
        $des = "TractorJunction is one of the leading online automotive information source for Tractors in India. Here user can find out the latest Tractor brands and models in India along with their detailed information like features, specification and performance etc.";
        $key = "Tractor, Tractors, Latest Tractors, Latest Tractor in India, Compare Tractors Online, Compare Tractors,  Tractors in India, Tractor Price in India, Tractor Brands, Tractor Information, Tractor Specification, Tractors Reviews, Tractors Features, Tractors Models, Tractor prices India, New Tractors in India, Model Tractors, Agriculture Tractor, Tractor Dealers in India, Best Tractor in India, Best Tractors in India, Tractor Info, Commercial Tractors,  Agricultural Tractors, Tractor Models, Latest Tractors in India,  New Tractors, New Tractors in India, Tractor Prices, Tractors Specification, Tractor Reviews, Tractor Features";
        $meta = array(
            'meta_title' => 'Tractors Information, Tractors Specification, Tractors Features, Tractor Price in India- TractorJunction',
            'meta_keywords' => $key,
            'meta_description' => $des,
            'meta_robots' => 'all',
            'extra_headers' => ''
        );
        $data = array();
        $data = array_merge($data, $meta);
        $result = array();
        // echo $slug;
        // echo "<br>";
// echo  $slug= Actual_slug_get($slug);

        // $all_impl=shweta_select('*','new_implement','','');
        // $ImpId='';
// foreach($all_impl as $all_implKey=>$all_implValue){
        // $brName='';

        // foreach(shweta_select('name','brand','id',$all_implValue->brand) as $raa) $brName= ($raa->name) ;
        // $newSlug=newslugend($brName."-".$all_implValue->slug);
        // if($newSlug == $slug){
        // $ImpId=$all_implValue->id;
        // }
// }


        $cond = '';
        $cond = " id ='" . $this->session->userdata('implementId') . "'";


        if (empty($result['result'])) {
            $AllHArvester = shweta_select('id,brand,slug', 'new_implement', '', '');
            foreach ($AllHArvester as $AllHArvesterkey => $AllHArvesterValue) {
                $brandNameOld = '';
                foreach (shweta_select('name', 'brand', 'id', $AllHArvesterValue->brand) as $raa) $brandNameOld = ($raa->name);
                $NewSlug = newslugend($brandNameOld . "-" . $AllHArvesterValue->slug);
                if ($NewSlug == $slug) {
                    $cond = '';
                    $cond = " id ='" . $AllHArvesterValue->id . "'";
                }
            }
        }

        $result['result'] = shweta_select_th('*', 'new_implement', $cond);

        if (empty($result['result'])) {
            header("Location:" . $root . "tractor-implements");
            die;
        }


        // echo "<pre>";
        // print_r($result);
        // die;
        $this->load->view('header', $data);
        $this->load->view('singleOtherImplementTractor', $result);
        $this->load->view('footer');

    }

    function ImplementsOldSingle($slug)
    {
        $des = "TractorJunction is one of the leading online automotive information source for Tractors in India. Here user can find out the latest Tractor brands and models in India along with their detailed information like features, specification and performance etc.";
        $key = "Tractor, Tractors, Latest Tractors, Latest Tractor in India, Compare Tractors Online, Compare Tractors,  Tractors in India, Tractor Price in India, Tractor Brands, Tractor Information, Tractor Specification, Tractors Reviews, Tractors Features, Tractors Models, Tractor prices India, New Tractors in India, Model Tractors, Agriculture Tractor, Tractor Dealers in India, Best Tractor in India, Best Tractors in India, Tractor Info, Commercial Tractors,  Agricultural Tractors, Tractor Models, Latest Tractors in India,  New Tractors, New Tractors in India, Tractor Prices, Tractors Specification, Tractor Reviews, Tractor Features";
        $meta = array(
            'meta_title' => 'Tractors Information, Tractors Specification, Tractors Features, Tractor Price in India- TractorJunction',
            'meta_keywords' => $key,
            'meta_description' => $des,
            'meta_robots' => 'all',
            'extra_headers' => ''
        );
        $data = array();
        $data = array_merge($data, $meta);
        $result = array();
        $slug = Actual_slug_get($slug);

        $result['result'] = shweta_select('*', 'old_implement', 'slug', $slug);

        $this->load->view('header', $data);
        $this->load->view('singleOtherImplementTractorOld', $result);
        $this->load->view('footer');

    }


    function sendRequest()
    {
        $root = "http://" . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

        date_default_timezone_set("Asia/Kolkata");
        $date_time = $date = date('Y-m-d h:i:sa');


        $getOrder = array();
        $toNo = 0;
        $getOrder = shweta_select('*', 'purchaserequest', 'type', 'implement');
        $toNo = count($getOrder);
        $toNo = $toNo + 1;
        $newNO = 0;
        $newNO = "I9610T" . $toNo;
        // die;

        $data = array(
            'name' => $this->input->post('name'),
            'user_id' => $this->session->userdata('review_id'),
            'contact' => $this->input->post('contact'),
            'email' => $this->input->post('email'),
            'address' => $this->input->post('address'),
            'pincode' => $this->input->post('pincode'),
            'state' => $this->input->post('state'),
            'city' => $this->input->post('city'),
            'requestfor' => $this->input->post('id_tractor'),
            'status' => '0',
            'type' => 'implement',
            'date' => $date_time,
            'reqNo' => $newNO,
        );


//get all info for mail
        $buyerEmail = '';
        $buyerEmail = $this->input->post('email');

        $sellerEmail = '';
        $Sellername = '';
        $Sellercity = '';
        $Sellerstate = '';
        $userId = '';
        $Sellermobile = '';
        $Sellerpincode = '';
        foreach (shweta_select('email,name,city,state,mobile,pincode,user_id', 'old_implement', 'id', $this->input->post('id_tractor')) as $raa) {
            $sellerEmail = ($raa->email);
            $Sellername = ($raa->name);
            $Sellercity = ($raa->city);
            $Sellerstate = ($raa->state);
            $Sellermobile = ($raa->mobile);
            $Sellerpincode = ($raa->pincode);
            $userId = ($raa->user_id);


        }
        foreach (shweta_select('name', 'cities', 'id', $Sellercity) as $raa) $Sellercity = ($raa->name);
        foreach (shweta_select('name', 'states', 'id', $Sellerstate) as $raa) $Sellerstate = ($raa->name);


        $TractorModel = '';
        foreach (shweta_select('model_name', 'old_implement', 'id', $this->input->post('id_tractor')) as $raa) $TractorModel = ($raa->model_name);
        $TractorBrand = '';
        foreach (shweta_select('brand', 'old_implement', 'id', $this->input->post('id_tractor')) as $raa) $TractorBrand = ($raa->brand);
        $brandName = '';
        foreach (shweta_select('name', 'brand', 'id', $TractorBrand) as $raa) $brandName = ($raa->name);
        $StateName = '';
        foreach (shweta_select('name', 'states', 'id', $this->input->post('state')) as $raa) $StateName = ($raa->name);
        $CityName = '';
        foreach (shweta_select('name', 'cities', 'id', $this->input->post('city')) as $raa) $CityName = ($raa->name);

//mail sent seller
        $nameHeader = $sellerEmail;
        $lineSecond = 'Below are the buyer information...';
        $lineFirst = $buyerEmail . ' has request to purchase your <strong> ' . $TractorModel . '</strong> tractor Implement in Tractor junction';
        $otherInfo = array(
            'Request Date' => date("d-M-Y", strtotime($date_time)),
            'Model Name' => $TractorModel,
            'Name' => $this->input->post('name'),
            'Contact No' => $this->input->post('contact'),
            'Email-id' => $this->input->post('email'),
            'Pincode' => $this->input->post('pincode'),
            'State' => $StateName,
            'City' => $CityName,
            'Address' => $this->input->post('address'),


        );
        $message = sentMailFunction($nameHeader, $lineFirst, $lineSecond, $otherInfo);

        $subject = "Buyer Info For request Your Implement Tractor at Tractor Junction";
        MailSentNow($message, $subject, $sellerEmail);

//mail sent Buyer
        $nameHeader = ucfirst($this->input->post('name'));
        $toSend = ucfirst($this->input->post('email'));
        $lineSecond = 'Below are the seller information...';
        $lineFirst = 'Thank You ' . $nameHeader . ' for purchasing <strong> ' . $TractorModel . '</strong> tractor implement in Tractor junction';
        $otherInfo = array(
            'Request Date' => date("d-M-Y", strtotime($date_time)),
            ' Model Name' => $TractorModel,
            'Seller Email-id' => $sellerEmail,
            'Seller Name' => $Sellername,
            'Seller City' => $Sellercity,
            'Seller State' => $Sellerstate,
            'Seller Mobile' => $Sellermobile,
            'Seller Pincode' => $Sellerpincode,


        );
        $message = sentMailFunction($toSend, $lineFirst, $lineSecond, $otherInfo);

        $subject = "Seller Info For request Implement Tractor at Tractor Junction";
        MailSentNow($message, $subject, $nameHeader);

//mail sent loginTractor
        $AdminUserId = '';
        foreach (shweta_select('email', 'user_reg', 'id', $userId) as $raa) $AdminUserId = ($raa->email);


        $nameHeader = $AdminUserId;
        $lineSecond = 'Below are the information...';
        $lineFirst = 'Yout implement <strong>' . $TractorModel . '</strong> has been purchase  in Tractor junction';
        $otherInfo = array(
            'Purchase Date' => date("d-M-Y", strtotime($date_time)),

            ' Model Name' => $TractorModel,
            'Seller Email-id' => $sellerEmail,
            'Seller Mobile' => $Sellermobile,
            'Buyer Email-id' => $this->input->post('email'),
            'Buyer Contact No' => $this->input->post('contact'),


        );
        $message = sentMailFunction($nameHeader, $lineFirst, $lineSecond, $otherInfo);

        $subject = "Seller & buyer Info For request Implement Tractor at Tractor Junction";
        MailSentNow($message, $subject, $nameHeader);
//end mail

        //sent sms
        $txtmsg = "Tractor Model Name=" . $TractorModel . ",Seller mobile no=" . $Sellermobile . ",Seller Email-id=" . $sellerEmail . "";
        $mobile = $this->input->post('contact');
        smsSent($mobile, $txtmsg);


        $this->db->insert('purchaserequest', $data);
        $insert_id = $this->db->insert_id();

        $this->session->set_userdata('thyankYou', $insert_id);

        header("Location:" . $_SERVER['HTTP_REFERER']);
    }


    function ImplementReq()
    {

        $newDate = date("Y-m-d");
        $data = array(
            'impID' => $this->input->post('impID'),
            'contact_no' => $this->input->post('contact_no'),
            'date' => $newDate,
            'req_type' => $this->input->post('req_type'),
            'status' => 0,
        );


        $txtmsg = "Successfully sent request for " . $this->input->post('r_brand') . " " . $this->input->post('r_model') . ".We will contact you as soon as possible";
        smsSent($mobile, $txtmsg);
        shweta_insert_form('implement_req', $data);
        $this->session->set_userdata('messageTrue', "Thanks for your request...! We will revert you soon");
    }


}

?>