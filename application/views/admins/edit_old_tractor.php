<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

if ($this->session->userdata('admin')) {
    foreach ($result as $key => $value) {
    }
    ?>

    <style>
        /****** Style Star Rating Widget *****/

        .rating5 {
            border: none;
            float: left;
        }

        .rating5 > input {
            display: none;
        }

        .rating5 > label:before {
            margin: 5px;
            font-size: 1.25em;
            font-family: FontAwesome;
            display: inline-block;
            content: "\f005";
        }

        .rating5 > .half:before {
            content: "\f089";
            position: absolute;
        }

        .rating5 > label {
            color: black;
            float: right;
        }

        /***** CSS Magic to Highlight Stars on Hover *****/

        .rating5 > input:checked ~ label,

            /* show gold star when clicked */

        .rating5:not(:checked) > label:hover,

            /* hover current star */

        .rating5:not(:checked) > label:hover ~ label {
            color: #DB4C4C;
        }

        /* hover previous stars in list */

        .rating5 > input:checked + label:hover,

            /* hover current star when changing rating5 */

        .rating5 > input:checked ~ label:hover,
        .rating5 > label:hover ~ input:checked ~ label,

            /* lighten current selection */

        .rating5 > input:checked ~ label:hover ~ label {
            color: #DB4C4C;
        }
    </style>
    <style>
        .rateaa {
            font-size: 14px;
            padding: 3px 8px;
            background: rgb(91, 168, 41) none repeat scroll 0% 0%;
            border-radius: 5px;
            margin: 0px 5px 0px 0px;
            font-weight: 700;
            width: 73px;;
            color: white;
        }
    </style>


    <div class="container-fluid paddingz ">
        <div class="container a3">
            <div class="col-sm-12 col-md-12 paddingZ b1">


                <div class="col-sm-7 col-md-7 paddingZ pdf">

                    <div class="col-sm-12 col-md-12">


                        <div class="col-sm-12 col-md-12">
                            <h4 class="b3"><u>Seller Contact Information</u></h4>


                            <?php
                            $att = 'form-horizontal';
                            echo form_open_multipart('admins/ListOldTractor/UpdateOldTractorEnd', $att);
                            ?>


                            <div class="form-group">
                                <div class="col-sm-6 col-md-6">
                                    <input type="text" class="form-control" name="name"
                                           value="<?php echo $value->name; ?>" placeholder="Full Name"
                                           required="required">
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <input type="email" class="form-control" name="email"
                                           value="<?php echo $value->email; ?>" placeholder="Email" required="required">
                                </div>
                                <span id="loader2" style="display:none"></span>
                                <div class="col-sm-6 col-md-6" style="margin-top:20px">
                                    <?php
                                    $selected = '';
                                    $selected = ($value->state) ? $value->state : $value->state;
                                    $query1 = shweta_select('*', 'states', 'country_id', '101');
                                    $val1[''] = 'Select state';
                                    foreach ($query1 as $k1 => $r1) {
                                        $val1[$r1->id] = ucfirst($r1->name);
                                    }
                                    $ab = 'class="form-control" id="country_id_val"  required="required" onchange="state_get()"';
                                    echo form_dropdown('state', $val1, $selected, $ab);
                                    ?>
                                </div>
                                <div class="col-sm-6 col-md-6" style="margin-top:20px">
                                    <?php
                                    $val1 = array();
                                    $selected = '';
                                    $selected = ($value->city) ? $value->city : $value->city;
                                    $query1 = shweta_select('*', 'cities', 'state_id', $value->state);
                                    $val1[''] = 'Select city';
                                    foreach ($query1 as $k1 => $r1) {
                                        $val1[$r1->id] = ucfirst($r1->name);
                                    }
                                    $js6 = 'class="form-control" id="cur_city_id" required="required"';
                                    echo form_dropdown('city', $val1, $selected, $js6);
                                    ?>
                                </div>

                                <div class="col-sm-6 col-md-6" style="margin-top:20px">
                                    <?php echo form_input(array('type' => 'text', 'name' => 'mobile', 'value' => $value->mobile, 'onkeypress' => 'return isNumberKey(event)', 'placeholder' => 'Mobile Number', 'required' => 'required', 'class' => 'form-control', 'maxlength' => '10', 'minlength' => '10')); ?>


                                </div>
                                <div class="col-sm-6 col-md-6" style="margin-top:20px">
                                    <?php echo form_input(array('type' => 'text', 'name' => 'pincode', 'value' => $value->pincode, 'onkeypress' => 'return isNumberKey(event)', 'placeholder' => 'Pin Code Number', 'required' => 'required', 'class' => 'form-control', 'maxlength' => '6', 'minlength' => '6')); ?>
                                </div>
                            </div>


                        </div>


                        <div class="col-md-12 col-sm-12" style="margin-top:15px">
                            <h4 class="b3"><u>Tractor Information Details</u></h4>
                            <div class="col-md-6 col-sm-6" style="text-align:left"> Brand Name: <span
                                        class="red">*</span>
                                <?php
                                $selected = '';
                                $selected = ($value->brand) ? $value->brand : $value->brand;
                                $query3 = shweta_order_by_query('*', 'brand', 'name', 'ASC');
                                $val3[''] = 'Select brand';
                                foreach ($query3 as $k3 => $r3) {
                                    $val3[$r3->id] = ucfirst($r3->name);
                                }
                                $ab = 'class="form-control" required="required"';
                                echo form_dropdown('brand', $val3, $selected, $ab);
                                ?>
                            </div>

                            <div class="col-md-6 col-sm-6" style="text-align:left">Model Name <span class="red">*</span>
                                <input type="text" class="form-control" name="model"
                                       value="<?php echo $value->model_name; ?>" placeholder="Model Name"
                                       required="required">
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12" style="margin-top:15px">
                            <div class="col-md-6 col-sm-6" style="text-align:left"> Purchase Year:<span
                                        class="red">*</span>
                                <input style="" type="text" class="form-control"
                                       value="<?php echo $value->yearpurchase; ?>" maxlength="4" name="yearpurchase"
                                       onkeypress="return isNumberKey(event)" placeholder="Purchase Year"
                                       required="required">
                            </div>
                            <div class="col-md-6 col-sm-6" style="text-align:left">Expected Price(in Lac):<span
                                        class="red">*</span>
                                <?php echo form_input(array('type' => 'text', 'name' => 'price', 'value' => $value->price, 'placeholder' => 'Enter Expected Price', 'required' => 'required', 'class' => 'form-control', 'onkeypress' => 'return isNumberKey(event)')); ?>

                            </div>

                        </div>

                        <div class="col-md-12 col-sm-12" style="margin-top:15px">
                            <div class="col-md-6 col-sm-6" style="text-align:left"> Upload Image: <span
                                        class="red">*</span>
                                <?php echo form_input(array('type' => 'file', 'name' => 'model_image', 'class' => 'form-control')); ?>
                                <?php echo form_input(array('type' => 'hidden', 'name' => 'old_image', 'value' => $value->image, 'class' => 'form-control')); ?>
                                <?php echo form_input(array('type' => 'hidden', 'name' => 'slug_old', 'value' => $value->slug, 'class' => 'form-control')); ?>

                            </div>

                            <div class="col-md-6 col-sm-6" style="text-align:left"> RTO Number
                                <input type="text" class="form-control" name="rto" value="<?php echo $value->rto; ?>"
                                       placeholder="RTO Number">
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12" style="margin-top:15px">
                            <div class="col-md-6 col-sm-6" style="text-align:left">Engine Number:
                                <input style="" type="text" class="form-control" value="<?php echo $value->engin; ?>"
                                       name="engin" placeholder="Engine Number">
                            </div>

                            <div class="col-md-6 col-sm-6" style="text-align:left">Chassis Number
                                <input type="text" class="form-control" value="<?php echo $value->chasis; ?>"
                                       name="chasis" placeholder="Chassis Number">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12" style="margin-top:15px">
                            <div class="col-md-6 col-sm-6" style="text-align:left">HP:<span class="red">*</span>
                                <?php
                                $selected = '';
                                $selected = ($value->hp) ? $value->hp : $value->hp;
                                $temp2 = shweta_select('*', 'hp', '', '');
                                $p = "";
                                $hp[''] = 'Select HP';
                                foreach ($temp2 as $row => $objk) {
                                    $hp[$objk->id] = $objk->name . " HP";
                                }
                                $ab = 'class="form-control" required="required"';
                                echo form_dropdown('hp', $hp, $selected, $ab);
                                ?>
                            </div>

                            <div class="col-md-6 col-sm-6" style="text-align:left">Engine CC :
                                <input type="text" class="form-control" value="<?php echo $value->cc; ?>" name="cc"
                                       placeholder="Engine CC">
                            </div>
                        </div>


                        <div class="col-md-12 col-sm-12" style="margin-top:15px">
                            <div class="col-md-6 col-sm-6" style="text-align:left">Engine Condition:<span
                                        class="red">*</span>

                                <?php
                                $selected = '';
                                $selected = ($value->engincond) ? $value->engincond : $value->engincond;
                                $query = array();
                                $valueQuery = array();
                                $QueryKey = array();
                                $QueryKeyValue = array();
                                $ab = '';
                                $query = shweta_select('*', 'dropdownvalue', 'type', 'condition');
                                $valueQuery[''] = 'Please Select Engine Condition';
                                foreach ($query as $QueryKey => $QueryKeyValue) {
                                    $valueQuery[$QueryKeyValue->id] = ucfirst($QueryKeyValue->name);
                                }
                                $ab = 'class="form-control" required="required"';
                                echo form_dropdown('engincond', $valueQuery, $selected, $ab);
                                ?>


                            </div>

                            <div class="col-md-6 col-sm-6" style="text-align:left">Transmission Condition

                                <?php
                                $selected = '';
                                $selected = ($value->transcond) ? $value->transcond : $value->transcond;
                                $query = array();
                                $valueQuery = array();
                                $QueryKey = array();
                                $QueryKeyValue = array();
                                $ab = '';
                                $query = shweta_select('*', 'dropdownvalue', 'type', 'condition');
                                $valueQuery[''] = 'Please Select Transmission Condition';
                                foreach ($query as $QueryKey => $QueryKeyValue) {
                                    $valueQuery[$QueryKeyValue->id] = ucfirst($QueryKeyValue->name);
                                }
                                $ab = 'class="form-control"';
                                echo form_dropdown('transcond', $valueQuery, $selected, $ab);
                                ?>


                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12" style="margin-top:15px">
                            <div class="col-md-6 col-sm-6" style="text-align:left">Electric Condition:
                                <?php
                                $selected = '';
                                $selected = ($value->electriccond) ? $value->electriccond : $value->electriccond;
                                $query = array();
                                $valueQuery = array();
                                $QueryKey = array();
                                $QueryKeyValue = array();
                                $ab = '';
                                $query = shweta_select('*', 'dropdownvalue', 'type', 'condition');
                                $valueQuery[''] = 'Please Select Electric Condition';
                                foreach ($query as $QueryKey => $QueryKeyValue) {
                                    $valueQuery[$QueryKeyValue->id] = ucfirst($QueryKeyValue->name);
                                }
                                $ab = 'class="form-control"';
                                echo form_dropdown('electriccond', $valueQuery, $selected, $ab);
                                ?>


                            </div>

                            <div class="col-md-6 col-sm-6" style="text-align:left">Tyre Condition <span
                                        class="red">*</span>

                                <?php
                                $selected = '';
                                $selected = ($value->taycond) ? $value->taycond : $value->taycond;
                                $query = array();
                                $valueQuery = array();
                                $QueryKey = array();
                                $QueryKeyValue = array();
                                $ab = '';
                                $query = shweta_select('*', 'dropdownvalue', 'type', 'condition');
                                $valueQuery[''] = 'Please Select Tyre Condition';
                                foreach ($query as $QueryKey => $QueryKeyValue) {
                                    $valueQuery[$QueryKeyValue->id] = ucfirst($QueryKeyValue->name);
                                }
                                $ab = 'class="form-control"  required="required"';
                                echo form_dropdown('taycond', $valueQuery, $selected, $ab);
                                ?>


                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12" style="margin-top:15px">
                            <div class="col-md-6 col-sm-6" style="text-align:left">Strying Condition:
                                <?php
                                $selected = '';
                                $selected = ($value->stryingcond) ? $value->stryingcond : $value->stryingcond;
                                $query = array();
                                $valueQuery = array();
                                $QueryKey = array();
                                $QueryKeyValue = array();
                                $ab = '';
                                $query = shweta_select('*', 'dropdownvalue', 'type', 'condition');
                                $valueQuery[''] = 'Please Select Strying Condition';
                                foreach ($query as $QueryKey => $QueryKeyValue) {
                                    $valueQuery[$QueryKeyValue->id] = ucfirst($QueryKeyValue->name);
                                }
                                $ab = 'class="form-control"';
                                echo form_dropdown('stryingcond', $valueQuery, $selected, $ab);
                                ?>


                            </div>
                            <div class="col-md-6 col-sm-6" style="text-align:left">Used Hours <span class="red">*</span>
                                <input type="text" class="form-control" value="<?php echo $value->hours; ?>"
                                       name="hours" placeholder="Used Hours" required="required">
                            </div>

                        </div>


                        <div class="col-md-12 col-sm-12" style="margin-top:15px">


                            <div class="col-md-12 col-sm-12" style="text-align:left">Reason For Selling
                                <textarea cols="" rows="" class="form-control" name="resonrelling"
                                          placeholder="Reason For Selling"> <?php echo $value->resonrelling; ?></textarea>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12" style="margin-top:15px">


                            <div class="col-md-12 col-sm-12" style="text-align:left">Overview <span class="red">*</span>
                                <textarea cols="" rows="" class="form-control" name="overview" placeholder="Overview"
                                          required="required"><?php echo $value->overview; ?></textarea>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="col-sm-12 col-md-5 b5" style="margin-top: 100px;">
                    <div class="form-group">
                        <div class="col-sm-12 col-md-12 b5">
                            <button type="submit" class="btn btn-default slido-btni">Update Information</button>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>


            </div>
        </div>
    </div>

    </div>

<?php } else {
    header("location:" . $root);
}
?>