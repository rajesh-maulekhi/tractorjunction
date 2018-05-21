<?php
if ($this->session->userdata('admin')) {
    $root = "http://" . $_SERVER['HTTP_HOST'];

    $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);


    ?>

    <title>Admin || <?php echo $page_type; ?> </title>
    <div id="gif_image" style="background:rgba(0, 0, 0, 0.55);height:100%;width:100%;display:none;position: fixed;
    left: 0;
    right: 0;
    top: 0;
    z-index: 2;">
        <center>
            <img src="../images/gif_tractor.gif" style="margin-top:23%;height:50px;">
        </center>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"
         style="padding:0px;min-height:835px;background: #F7F7F7;">


        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 "
             style="padding:20px 14px;background: #fff; margin-top:20px;">
            <div id="info-message" style="float:right;">
                <?php
                echo $this->session->userdata('p_add');
                $this->session->unset_userdata('p_add');
                ?>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding:0px; padding-top:0px;">
                <h3><?php echo $page_type; ?></h3>

                <div class="meas">

                    <?php
                    echo $this->session->userdata('value_inserted');
                    $this->session->unset_userdata('value_inserted');
                    ?>
                </div>
                <hr style="  border-top: 3px solid #C5C2C2;">
                <?php
          
                if (empty($result)) {
                    ?>
                    <h5 style="    text-align: center;
    color: #DC4344;
    font-size: 22px;
    padding: 40px;">No result found</h5>
                <?php } else { ?>
                    <table border="0" style="width:100%;" class="table table-striped">
                        <thead>
                        <tr style="text-align: center;">
                            <th>S.no.</th>
                            <th>Name</th>
                            <th>Request for</th> 
                            <th>Email-id</th>
                            <th>State</th>
                            <th>City</th>
                            <th>Contact No</th>
                            <th>Request Date</th> 
                        </tr>
                        <?php $s_no = 1; ?>
                        </thead>
                        <tbody id="show_result">
                        <?php
 

                        foreach ($result['result'] as $row => $obj) {
						   $brand_name = '';
                            $Model_name = '';
                            $type_model = '';
                         	
							if($obj->req_type == "harvester"){
							foreach (shweta_select('brand,model_name,slug', 'harvester', 'id', $obj->impID) as $raa) {
                                foreach (shweta_select('name', 'brand', 'id', $raa->brand) as $raa1) $brand_name = ucfirst($raa1->name);
                                $Model_name = $raa->model_name;
                             
                            }	
							$type_model=$brand_name." ".$Model_name;
							}else{ 
									foreach (shweta_select('brand,model_name', 'new_implement', 'id', $obj->impID) as $raa) {
                                foreach (shweta_select('name', 'brand', 'id', $raa->brand) as $raa1) $brand_name = ucfirst($raa1->name);
                                $Model_name = $raa->model_name;
                             
                            }	
							$type_model=$brand_name." ".$Model_name;
							}
							
                            $Name = '';
                            $Email = '';
                            foreach (shweta_select('username', 'user_reg', 'id', $obj->user_id) as $raa) {

                                $Name = $raa->username;
                    
                            }
	foreach (shweta_select('name', 'states', 'id', $obj->state) as $raa1) $state = ucfirst($raa1->name);
	foreach (shweta_select('name', 'cities', 'id', $obj->city) as $raa1) $city = ucfirst($raa1->name);
                              
                            ?>
                            <tr style="text-align: center;">

                                <td><?php echo $s_no; ?>.</td>
                                <td><?php echo ucfirst($Name); ?></td>
                                <td><?php echo $type_model; ?></td>
                                <td><?php echo $obj->email_id; ?></td>
                                <td><?php echo $state; ?></td>
                                <td><?php echo $city; ?></td>
                                <td><?php echo $obj->contact_no; ?></td>
                                <td><?php echo $obj->date_time; ?></td>
                              


                            </tr>


                            <?php
                            $s_no++;
                        } ?>


                        </tbody>


                    </table>
                    <div class="pagination" style="float:right; margin-top: 13px;">
                        <ul class="pagination" style="margin:-4px 0px -23px 0px !important;">
                            <?php echo $result['links']; ?>
                        </ul>
                    </div>


                <?php } ?>
            </div>


        </div>
    </div>


    <?php
} else {
    header("Location:login");
}
?>