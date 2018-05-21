<?php
$root = "http://" . $_SERVER['HTTP_HOST'];

$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

if ($this->session->userdata('admin')) {
    ?>
    <title>Admin || Comapre tractor </title>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"
         style="padding:0px;min-height:835px;background: #F7F7F7;">
        <!-- main section -->


        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding: 30px 15px;background: #fff;">
            <h3> Comapre tractor add on front </h3>
            <hr style="  border-top: 3px solid #C5C2C2;">


            <div class="col-md-12" style="border:1px solid #eee;margin-bottom: 60px;">
                <?php
                $result = shweta_select('*', 'compare_tractorfront', '', '');
                if (!empty($result)) {

                    foreach ($result as $kjey => $value) {
                        ?>
                        <div class="col-md-6" style="border:1px solid #eee;padding:20px;">
                            <p>Tractor Brand:
                                <?php foreach (shweta_select('name', 'brand', 'id', $value->brand) as $raa) echo ucfirst($raa->name);
                                ?></p>
                            <p>Tractor Model Name:
                                <?php foreach (shweta_select('model_name', 'tech_specification', 'id', $value->tractor_id) as $raa) echo ucfirst($raa->model_name);
                                ?></p>
                            <p style="font-weight: 700;
text-align: center;"> VS</p>
                            <p>Tractor Brand:
                                <?php foreach (shweta_select('name', 'brand', 'id', $value->sbrand) as $raa) echo ucfirst($raa->name);
                                ?></p>
                            <p>Tractor Model Name:
                                <?php foreach (shweta_select('model_name', 'tech_specification', 'id', $value->stractor_id) as $raa) echo ucfirst($raa->model_name);
                                ?></p>
                            <a href="<?php echo $root; ?>admins/CompareFront/deleteCompare/<?php echo $value->id; ?>"><i
                                        class="fa fa-trash"></i> Delete </a>
                        </div>
                    <?php }
                } else { ?>
                    <h4 style="text-align:center">No result found</h4>
                <?php } ?>
            </div>


            <div id="page-wrapper" style="margin-top:50px;">
                <div class="row">

                    <?php
                    $att = array('class' => 'form-horizontal form-label-left');
                    echo form_open('admins/CompareFront/addcompareEnd', $att); ?>
                    <h3 style="text-align: center;">Tarctor first</h3>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Tractor Brand :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php
                            $query3 = shweta_order_by_query('*', 'brand', 'name', 'ASC');
                            $val3[''] = 'Please Select brand';
                            foreach ($query3 as $k3 => $r3) {
                                $val3[$r3->id] = ucfirst($r3->name);
                            }
                            $ab = 'class="form-control col-md-7 col-xs-12" id="brand_id1" onchange="model_name_getDemo();" required="required"';
                            echo form_dropdown('brand', $val3, '', $ab);
                            ?>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Tractor Brand :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php
                            $val1 = array();
                            $val1[''] = 'Select Model Name';
                            $js6 = 'class="form-control" id="model_name_id" required="required"';
                            echo form_dropdown('model', $val1, '', $js6);
                            ?>

                        </div>
                    </div>
                    <h3 style="text-align: center;">Tarctor Second</h3>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Tractor Brand :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php
                            $query3 = shweta_order_by_query('*', 'brand', 'name', 'ASC');
                            $val3[''] = 'Please Select brand';
                            foreach ($query3 as $k3 => $r3) {
                                $val3[$r3->id] = ucfirst($r3->name);
                            }
                            $ab = 'class="form-control col-md-7 col-xs-12" id="brand_id11" onchange="model_name_getDemo1();" required="required"';
                            echo form_dropdown('sbrand', $val3, '', $ab);
                            ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Tractor Brand :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php
                            $val1 = array();
                            $val1[''] = 'Select Model Name';
                            $js6 = 'class="form-control" id="model_name_id1" required="required"';
                            echo form_dropdown('smodel', $val1, '', $js6);
                            ?>

                        </div>
                    </div>


                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                            <?php echo form_input(array('type' => 'submit', 'id' => 'form_up', 'class' => 'btn btn-default buttoupdate', 'value' => 'Submit')); ?>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>


        </div>


    </div>


    <?php
} else {
    header("Location:login");
}
?>