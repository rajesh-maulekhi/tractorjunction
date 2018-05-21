<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

if ($this->session->userdata('admin')) {
    ?>
    <title>Admin || Single purchase old tractor </title>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"
         style="padding:0px;min-height:835px;background: #F7F7F7;">
        <!-- main section -->
        <style>
            .l1 {
                color: #065E84;
                font-size: 18px;
                text-align: left;
            }

            .l2 {
                color: black;
                font-size: 18px;
            }
        </style>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding: 30px 15px;background: #fff;">
            <h3>Details Purachse old tractor</h3>
            <hr style="  border-top: 3px solid #C5C2C2;">
            <?php
            foreach ($result as $value => $obj) {
            }
            ?>

            <div id="page-wrapper"
                 style="line-height: 35px;float:left;border:2px solid #eee;width:100%;padding: 17px 0px;">

                <div class="col-md-6 col-sm-6" style="border-right:2px solid #ccc">


                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Request No:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php echo $obj->reqNo; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Customer Name:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php echo $obj->name; ?>            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Customer State:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">

                                    <?php foreach (shweta_select('name', 'states', 'id', $obj->state) as $raa) echo($raa->name); ?>    </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Customer City:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php foreach (shweta_select('name', 'cities', 'id', $obj->city) as $raa) echo($raa->name); ?>        </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Customer Email:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php echo $obj->email; ?>            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Customer Contact No:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php echo $obj->contact; ?>            </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 col-sm-6">

                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Customer Address:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php echo $obj->address; ?>            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Customer PinCode:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php echo $obj->pincode; ?>            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Request for Brand:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php
                                    $model_name = '';
                                    foreach (shweta_select('brand,model_name,slug', 'old_tractor', 'id', $obj->requestfor) as $raa) {
                                        foreach (shweta_select('name', 'brand', 'id', $raa->brand) as $raa1) echo $brand = ucfirst($raa1->name);
                                        $model_name = $raa->slug;
                                    }

                                    ?>        </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Request for model:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php
                                    $slug = "";
                                    foreach (shweta_select('slug', 'old_tractor', 'id', $obj->requestfor) as $raa) $slug = ($raa->slug);

                                    ?>
                                    <a href="<?php echo $root; ?>used-tractor/<?php echo newslugend($brand); ?>-<?php echo newslugend($model_name); ?>"
                                       target="_blank">


                                        <?php
                                        foreach (shweta_select('model_name', 'old_tractor', 'id', $obj->requestfor) as $raa) {
                                            echo $raa->model_name;

                                        }
                                        ?>        </a></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Date:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php echo date("d-M-Y", strtotime($obj->date)); ?>        </div>
                            </div>
                        </div>
                    </div>


                </div>


            </div>


        </div>


    </div>


    <?php
} else {
    header("Location:login");
}
?>