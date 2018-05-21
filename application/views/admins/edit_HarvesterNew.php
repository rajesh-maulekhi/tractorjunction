<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

if ($this->session->userdata('admin')) {
    foreach ($result as $key => $value) {
    }
    ?>
    <title>Admin || Edit Harvester </title>
    <script type="text/javascript" src="<?php echo $root ?>ckeditor/ckeditor.js"></script>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"
         style="padding:0px;min-height:835px;background: #F7F7F7;">
        <!-- main section -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding:20px 14px;"><a
                    href="<?php echo $root; ?>admins/show-harvester">
                <button type="button" class="btn btn-default buttoupdate" style="">Show harvester List</button>
            </a>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding: 30px 15px;background: #fff;">
            <h3>Edit Harvester</h3>
            <hr style="  border-top: 3px solid #C5C2C2;">

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-md-12 col-sm-12" style="">
                        <?php
                        $att = array('class' => 'form-horizontal form-label-left');
                        echo form_open_multipart('admins/ImplementTractor/editHarvesterEnd', $att); ?>


                        <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom:10px">
                            <div class="col-md-4 col-sm-4">
                                <span style="float:right;margin-top:7px;font-weight:bold">Brand* : </span>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <?php
                                $selected = '';
                                $selected = ($value->brand) ? $value->brand : $value->brand;
                                $query3 = shweta_order_by_query('*', 'brand', 'name', 'ASC');
                                $val3[''] = 'Please Select brand';
                                foreach ($query3 as $k3 => $r3) {
                                    $val3[$r3->id] = ucfirst($r3->name);
                                }
                                $ab = 'class="form-control col-md-7 col-xs-12" required="required"';
                                echo form_dropdown('brand', $val3, $selected, $ab);
                                ?>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom:10px">
                            <div class="col-md-4 col-sm-4">
                                <span style="float:right;margin-top:7px;font-weight:bold">Modal Name* : </span>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <?php echo form_input(array('type' => 'text', 'name' => 'name', 'value' => $value->model_name, 'placeholder' => 'Model Name', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>

                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom:10px">
                            <div class="col-md-4 col-sm-4">
                                <span style="float:right;margin-top:7px;font-weight:bold">Modal Image* : </span>
                            </div>
                            <div class="col-md-5 col-sm-5">
                                <?php echo form_input(array('type' => 'file', 'name' => 'model_image', 'id' => 'picture', 'class' => 'col-md-7 col-xs-12')); ?>
                                <?php echo form_input(array('type' => 'hidden', 'name' => 'oldmodel_image', 'value' => $value->image, 'class' => 'col-md-7 col-xs-12')); ?>
                                <?php echo form_input(array('type' => 'hidden', 'name' => 'idHar', 'value' => $value->id, 'class' => 'col-md-7 col-xs-12')); ?>
                                <?php echo form_input(array('type' => 'hidden', 'name' => 'slug_old', 'value' => $value->slug, 'class' => 'col-md-7 col-xs-12')); ?>

                            </div>
                            <div class="col-md-1 col-sm-1">
                                <img src="<?php echo $root; ?>images/implementTractor/<?php echo $value->image; ?>"
                                     style="    width: 100px;
    height: 50px;">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom:10px">
                            <div class="col-md-4 col-sm-4">
                                <span style="float:right;margin-top:7px;font-weight:bold">Specifcation image : </span>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <?php echo form_input(array('type' => 'file', 'name' => 'model_image2', 'id' => 'picture', 'class' => 'col-md-7 col-xs-12')); ?>
                                <?php echo form_input(array('type' => 'hidden', 'name' => 'old_spec', 'value' => $value->specImge, 'class' => 'col-md-7 col-xs-12')); ?>

                            </div>
                            <?php if ($value->specImge != "") { ?>
                                <div class="col-md-1 col-sm-1">
                                    <img src="<?php echo $root; ?>images/implementTractor/<?php echo $value->specImge; ?>"
                                         style="    width: 100px;
    height: 50px;">
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom:10px">
                            <div class="col-md-4 col-sm-4">
                                <span style="float:right;margin-top:7px;font-weight:bold">Overview : </span>
                            </div>
                            <div class="col-md-6 col-sm-6">
	<textarea name="overview" placeholder="Enter overview of harvester"
              class="form-control ckeditor col-md-7 col-xs-12">
	<?php echo $value->overview; ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom:10px">
                            <div class="col-md-4 col-sm-4">
                                <span style="float:right;margin-top:7px;font-weight:bold">Other images (Can uploaded multiple images): </span>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <input type="file" multiple name="userfile[]" class="col-md-7 col-xs-12" size="20"/>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom:10px">
                            <div class="col-md-4 col-sm-4">
                                <span style="float:right;margin-top:7px;font-weight:bold"> </span>
                            </div>
                            <div class="col-md-6  col-sm-6 col-xs-12" style="    padding: 10px;
    border: 1px solid #2F3136;">
                                <p>
                                    <a href="<?php echo $root; ?>admins/ImplementTractor/deleteAllimage?id=<?php echo $value->id; ?>"
                                       style="cursor:pointer;">Want to Empty gallery</a></p>

                                <?php
                                if ($value->gallery == "") {
                                    echo "gallery empty";
                                } else {
                                    ?>

                                    <?php
                                    $gallery_array = array();
                                    $gallery_array = explode('$$', $value->gallery);
                                    foreach ($gallery_array as $image) {
                                        if (file_exists("./images/implementTractor/" . $image)) { ?>
                                            <div class="col-md-3 col-sm-3" style="margin-top:10px;">
                                                <img src="<?php echo $root ?>images/implementTractor/<?php echo $image; ?>"
                                                     style="  width:100%;  height: 80px;float:left;border:1px solid #eee;
">
                                                <a href="<?php echo $root; ?>admins/implementTractor/DeleteHarvesterImagesingle?imagename=<?php echo $image; ?>&id=<?php echo $value->id; ?>">Delete</a>
                                            </div>
                                        <?php }
                                    } ?>

                                <?php } ?>

                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12" style="padding:10px 0px">
                            <div class="col-md-12 col-sm-12" style="background:#065E84;text-align:center">
                                <h3 style="margin:0px;padding:20px;color:white"> Key Specification</h3>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding:20px 0px 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Type : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="type"
                                           value="<?php echo $value->type; ?>" placeholder="Type">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Crop : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="crop"
                                           value="<?php echo $value->crop; ?>" placeholder="Crop">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Price(in rs) : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control"
                                           value="<?php echo $value->hprice; ?>" name="hprice"
                                           placeholder="Price(in rs)">
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 col-sm-12" style="padding:10px 0px">
                            <div class="col-md-12 col-sm-12" style="background:#065E84;text-align:center">
                                <h3 style="margin:0px;padding:20px;color:white"> Working Dimensions</h3>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding:20px 0px 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Length(mm) : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="length"
                                           value="<?php echo $value->length; ?>" placeholder="Length(mm)">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Width(mm) : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="width"
                                           value="<?php echo $value->width; ?>" placeholder="Width(mm)">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Height(mm) : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="height"
                                           value="<?php echo $value->height; ?>" placeholder="Height(mm)">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Ground Clearance (mm) : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="groundclear"
                                           value="<?php echo $value->groundclear; ?>"
                                           placeholder="Ground Clearance (mm)">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Weight (kg) : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="weight"
                                           value="<?php echo $value->weight; ?>" placeholder="Weight (kg)">
                                </div>
                            </div>


                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Crawler/Belt Length (mm) : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="beltlength"
                                           value="<?php echo $value->beltlength; ?>"
                                           placeholder="Crawler/Belt Length (mm)">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Wheel Base : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="wheelbase"
                                           value="<?php echo $value->wheelbase; ?>" placeholder="Wheel Base">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">No. of Rollers (each side) : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="rollers"
                                           value="<?php echo $value->rollers; ?>"
                                           placeholder="No. of Rollers (each side)">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">No. of Grouser (each side) : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="grouser"
                                           value="<?php echo $value->grouser; ?>"
                                           placeholder="No. of Grouser (each side)">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Height of Grouser (mm) : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="hgrouser"
                                           value="<?php echo $value->hgrouser; ?>" placeholder="Height of Grouser (mm)">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Ground Contact Area (sqm) : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="area"
                                           value="<?php echo $value->area; ?>" placeholder="Ground Contact Area (sqm)">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Cutting Capacity : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control"
                                           value="<?php echo $value->cutCaacity; ?>" name="cutCaacity"
                                           placeholder="Cutting Capacity">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12" style="padding:10px 0px">
                            <div class="col-md-12 col-sm-12" style="background:#065E84;text-align:center">
                                <h3 style="margin:0px;padding:20px;color:white"> Transport Dimensions</h3>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding:20px 0px 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Length(mm) : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control"
                                           value="<?php echo $value->tlength; ?>" name="tlength"
                                           placeholder="Length(mm)">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Width(mm) : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control"
                                           value="<?php echo $value->twidth; ?>" name="twidth" placeholder="Width(mm)">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Height(mm) : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control"
                                           value="<?php echo $value->theight; ?>" name="theight"
                                           placeholder="Height(mm)">
                                </div>
                            </div>


                        </div>
                        <div class="col-md-12 col-sm-12" style="padding:10px 0px">
                            <div class="col-md-12 col-sm-12" style="background:#065E84;text-align:center">
                                <h3 style="margin:0px;padding:20px;color:white"> Tyres</h3>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding:20px 0px 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Front : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control"
                                           value="<?php echo $value->tyarFront; ?>" name="tyarFront"
                                           placeholder="Front">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Rear : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control"
                                           value="<?php echo $value->tyarRear; ?>" name="tyarRear" placeholder="Rear">
                                </div>
                            </div>

                        </div>

                        <div class="col-md-12 col-sm-12" style="padding:10px 0px">
                            <div class="col-md-12 col-sm-12" style="background:#065E84;text-align:center">
                                <h3 style="margin:0px;padding:20px;color:white"> Engine</h3>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding:20px 0px 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Engine Modal : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="enginemodel"
                                           value="<?php echo $value->enginemodel; ?>" placeholder="Engine Modal">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Cooling System : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="coolingsystem"
                                           value="<?php echo $value->coolingsystem; ?>" placeholder="Cooling System">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">No of cylinder : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="engtype"
                                           value="<?php echo $value->engtype; ?>" placeholder="Type">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Power : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="epower"
                                           value="<?php echo $value->epower; ?>" placeholder="Power">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Rated RPM : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="rpm"
                                           value="<?php echo $value->rpm; ?>" placeholder="Rated RPM">
                                </div>
                            </div>


                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Pre-Cleaner & Air Cleaner	Dry Type : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="drytpe"
                                           value="<?php echo $value->drytpe; ?>"
                                           placeholder="Pre-Cleaner & Air Cleaner	Dry Type">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Fuel Tank Capacity (l) : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="fuelcapacity"
                                           value="<?php echo $value->fuelcapacity; ?>"
                                           placeholder="Fuel Tank Capacity (l)">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Transmission Type : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="transtype"
                                           value="<?php echo $value->transtype; ?>" placeholder="Transmission Type">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Type of Clutch : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control"
                                           value="<?php echo $value->typeClutch; ?>" name="typeClutch"
                                           placeholder="Engine Clutch">
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 col-sm-12" style="padding:10px 0px">
                            <div class="col-md-12 col-sm-12" style="background:#065E84;text-align:center">
                                <h3 style="margin:0px;padding:20px;color:white"> Straw Walker</h3>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding:20px 0px 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold"> NO of Straw Walker : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control"
                                           value="<?php echo $value->sNOWalker; ?>" name="sNOWalker"
                                           placeholder="NO of Straw Walker">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">No of steps: </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control"
                                           value="<?php echo $value->sNOStpesWalker; ?>" name="sNOStpesWalker"
                                           placeholder="No of steps">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Length(mm) : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control"
                                           value="<?php echo $value->lengthWalker; ?>" name="lengthWalker"
                                           placeholder="Length(mm)">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Width(mm) : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control"
                                           value="<?php echo $value->widthWalker; ?>" name="widthWalker"
                                           placeholder="Width(mm)">
                                </div>
                            </div>

                        </div>

                        <div class="col-md-12 col-sm-12" style="padding:10px 0px">
                            <div class="col-md-12 col-sm-12" style="background:#065E84;text-align:center">
                                <h3 style="margin:0px;padding:20px;color:white"> ELECTRICAL SYSTEM</h3>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding:20px 0px 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">No. of Batteries : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="batteries"
                                           value="<?php echo $value->batteries; ?>" placeholder="No. of Batteries">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Battery Output : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="outputbattery"
                                           value="<?php echo $value->outputbattery; ?>"
                                           placeholder="Battery Output	">
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 col-sm-12" style="padding:10px 0px">
                            <div class="col-md-12 col-sm-12" style="background:#065E84;text-align:center">
                                <h3 style="margin:0px;padding:20px;color:white"> HARVESTING</h3>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding:20px 0px 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Cutter Bar – Effective Width : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="cutterbar"
                                           value="<?php echo $value->cutterbar; ?>"
                                           placeholder="Cutter Bar – Effective Width">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Cutting Height Range (mm) : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="cutterheight"
                                           value="<?php echo $value->cutterheight; ?>"
                                           placeholder="Cutting Height Range (mm)">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Reel Drive : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="reeldrive"
                                           value="<?php echo $value->reeldrive; ?>" placeholder="Reel Drive">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Reel Height Adjustment : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="reelheight"
                                           value="<?php echo $value->reelheight; ?>"
                                           placeholder="Reel Height Adjustment">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Feeder Housing : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="feeder"
                                           value="<?php echo $value->feeder; ?>" placeholder="Feeder Housing">
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 col-sm-12" style="padding:10px 0px">
                            <div class="col-md-12 col-sm-12" style="background:#065E84;text-align:center">
                                <h3 style="margin:0px;padding:20px;color:white"> THRESHING & SEPARATING</h3>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding:20px 0px 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Threshing Cylinder Diameter (mm) : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="thershingdiameter"
                                           value="<?php echo $value->thershingdiameter; ?>"
                                           placeholder="Threshing Cylinder Diameter (mm)">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 paddingZ" style="padding:20px 0px 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Threshing Width : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control"
                                           value="<?php echo $value->thershingwidth; ?>" name="thershingwidth"
                                           placeholder="Threshing width">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Threshing Cylinder Length (mm) : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="thershinglength"
                                           value="<?php echo $value->thershinglength; ?>"
                                           placeholder="Threshing Cylinder Length (mm)">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Threshing System : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="thershingsystem"
                                           value="<?php echo $value->thershingsystem; ?>"
                                           placeholder="Threshing System">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Revolutions (RPM) : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="revolution"
                                           value="<?php echo $value->revolution; ?>" placeholder="Revolutions (RPM)">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Speed Adjustment : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="speedadjustment"
                                           value="<?php echo $value->speedadjustment; ?>"
                                           placeholder="Speed Adjustment">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Concave Width (mm) : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="concavewidth"
                                           value="<?php echo $value->concavewidth; ?>" placeholder="Concave Width (mm)">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Concave Clearance : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="concaveclear"
                                           value="<?php echo $value->concaveclear; ?>" placeholder="Concave Clearance">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Separating Cylinder Diameter (mm) : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="separatingdiameter"
                                           value="<?php echo $value->separatingdiameter; ?>"
                                           placeholder="Separating Cylinder Diameter (mm)">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Separating Cylinder Length (mm) : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="cylinderlength"
                                           value="<?php echo $value->cylinderlength; ?>"
                                           placeholder="Separating Cylinder Length (mm)">
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 col-sm-12" style="padding:10px 0px">
                            <div class="col-md-12 col-sm-12" style="background:#065E84;text-align:center">
                                <h3 style="margin:0px;padding:20px;color:white"> CLEANING</h3>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding:20px 0px 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Cleaning Type : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="cleningtype"
                                           value="<?php echo $value->cleningtype; ?>" placeholder="Cleaning Type">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Cleaning Area (sq. mt) : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="cleaningarea"
                                           value="<?php echo $value->cleaningarea; ?>"
                                           placeholder="Cleaning Area (sq. mt)">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Upper Sieve Area (sq. mt) : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="uppersieve"
                                           value="<?php echo $value->uppersieve; ?>"
                                           placeholder="Upper Sieve Area (sq. mt)">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding-bottom: 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Lower Sieve Area (sq. mt) : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="lowersieve"
                                           value="<?php echo $value->lowersieve; ?>"
                                           placeholder="Lower Sieve Area (sq. mt)">
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 col-sm-12" style="padding:10px 0px">
                            <div class="col-md-12 col-sm-12" style="background:#065E84;text-align:center">
                                <h3 style="margin:0px;padding:20px;color:white"> STORAGE</h3>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding:20px 0px 10px">
                                <div class="col-md-4 col-sm-4">
                                    <span style="float:right;margin-top:7px;font-weight:bold">Grain Tank Capacity : </span>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input style="" type="text" class="form-control" name="graintank"
                                           value="<?php echo $value->graintank; ?>" placeholder="Grain Tank Capacity">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12" style="padding:10px 0px">
                            <div class="col-md-12 col-sm-12" style="background:#065E84;text-align:center">
                                <h3 style="margin:0px;padding:20px;color:white"> Power Source</h3>
                            </div>

                            <div class="col-md-12 col-sm-12 paddingZ" style="padding:20px 0px 10px">
                                <div class="col-md-4 col-sm-4">

                                    <span style="float:right;margin-top:7px;font-weight:bold">Select Power Source : </span>
                                </div>
                                <div class="col-md-4 col-sm-4">


                                    <input style="" type="radio"
                                           value="self" <?php if ($value->power_Source == "self") { ?> checked <?php } ?>
                                           name="power_Source">
                                    <span style="font-weight:bold">Self Propelled </span>
                                    <br>
                                    <input style="" type="radio"
                                           value="mounted" <?php if ($value->power_Source == "mounted") { ?> checked <?php } ?>
                                           name="power_Source">
                                    <span style="font-weight:bold">Tractor Mounted </span>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <center>
                                <div class="col-sm-12 col-md-12 b5">
                                    <?php echo form_input(array('type' => 'submit', 'id' => 'form_up', 'class' => 'btn btn-default buttoupdate', 'value' => 'Update harvester', 'style' => '    padding: 16px 39px;margin-top: 46px;')); ?>

                                </div>
                            </center>
                        </div>
                        <?php echo form_close(); ?>
                    </div>


                </div>
            </div>


        </div>


    </div>


    <?php
} else {
    header("Location:" . $root . "admin");
}
?>