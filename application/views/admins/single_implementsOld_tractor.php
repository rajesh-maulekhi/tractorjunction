<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

if ($this->session->userdata('admin')) {
    ?>
    <title>Admin || Single implement tractor </title>

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
            <h3>Implement tractor</h3>
            <hr style="  border-top: 3px solid #C5C2C2;">
            <?php
            // print_r($result);
            // die;
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
                                    Type
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php
                                    if ($obj->type_implement == "harvester") {
                                        echo "Harvester";
                                    } else {

                                        foreach (shweta_select('name', 'filed', 'id', $obj->type_implement) as $raa1) echo ucfirst($raa1->name);
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Implement for
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php echo ucfirst($obj->implement_for); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Model Name:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <a href="<?php echo $root; ?>used-tractor-implement/<?php foreach (shweta_select('name', 'brand', 'id', $obj->brand) as $raa) echo newslugend($raa->name); ?>-<?php echo newslugend($obj->model_name); ?>"
                                       target="_blank">
                                        <?php echo ucfirst($obj->model_name); ?>    </a></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Seller Name:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">

                                    <?php echo ucfirst($obj->name); ?>        </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Seller City:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php foreach (shweta_select('name', 'cities', 'id', $obj->city) as $raa) echo ucfirst($raa->name);
                                    ?>            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Seller State:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">

                                    <?php foreach (shweta_select('name', 'states', 'id', $obj->state) as $raa) echo ucfirst($raa->name);
                                    ?>        </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Seller Email-id:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">

                                    <?php echo ucfirst($obj->email); ?>        </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Seller Contact no:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">

                                    <?php echo ucfirst($obj->mobile); ?>        </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 col-sm-6">

                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Image :
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <img src="<?php echo $root; ?>images/implementTractor/<?php echo $obj->image; ?>"
                                         class="img-responsive"></div>
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