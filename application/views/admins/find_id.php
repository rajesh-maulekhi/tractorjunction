<?php

if ($this->session->userdata('admin')) {
    ?>

    <title>Admin || find_id </title>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"
         style="padding:0px;min-height:835px;background: #F7F7F7;">
        <!-- main section -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding:20px 14px;"><a
                    href="view_dealers">
                <button type="button" class="btn btn-default buttoupdate" style="">Show Dealers</button>
            </a>
        </div>
        <style>
            .a1 {
            }
        </style>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding: 30px 15px;background: #fff;">
            <h3>Find Id For Excel Sheet </h3>
            <hr style="  border-top: 3px solid #C5C2C2;">

            <div class="col-md-12 col-sm-12" style=" border: 1px solid #0E84B6;padding: 24px;">
                <div class="row">
                    <div class="col-md-4 col-sm-4" style="
    float: left;border-right: 2px solid #0E84B6;
">
                        Select State
                        <?php
                        $query1 = shweta_select('*', 'states', 'country_id', '101');
                        $val1[0] = 'please select';
                        foreach ($query1 as $k1 => $r1) {
                            $val1[$r1->id] = ucfirst($r1->name);
                        }
                        $ab = 'class="form-control a1 col-md-7 col-xs-12" id="country_id_val" onchange="state_get()"';
                        echo form_dropdown('state', $val1, '', $ab);
                        ?>
                    </div>
                    <div class="col-md-4 col-sm-4" style="
    float: left;border-right: 2px solid #0E84B6;
">
                        Select City
                        <?php
                        $js6 = 'class="form-control a1" id="cur_city_id"';
                        echo form_dropdown('city', '', '', $js6);
                        ?>

                    </div>
                    <div class="col-md-4 col-sm-4" style="
    float: left;
">
                        Select Brand
                        <?php
                        $query3 = shweta_order_by_query('*', 'brand', 'name', 'ASC');
                        $val3[0] = 'Please Select';
                        foreach ($query3 as $k3 => $r3) {
                            $val3[$r3->id] = ucfirst($r3->name);
                        }
                        $ab = 'id="brand_id" class="form-control col-md-7 col-xs-12"';
                        echo form_dropdown('authorize', $val3, '', $ab);
                        ?>
                    </div>

                </div>
            </div>
            <center>
                <button style="    margin-top: 26px;
    width: 10%;
    margin-bottom: 30px;" class="btn btn-default buttoupdate" onclick="find_id_btm();"> Find Id
                </button>
            </center>
            <span id="" style="color: #0F8DC2;font-size: 20px;margin-top:50px;">Result:</span>

            <div class="col-md-12 col-sm-12" style=" border: 1px solid #0E84B6;padding: 24px;">
                <div class="row">
                    <div class="col-md-4 col-sm-4" style="float: left;border-right: 2px solid #0E84B6;">
                        State Id:
                        <span id="state_result"
                              style="color: #0F8DC2;font-size: 25px;margin-left: 64px;">Not Select</span>
                    </div>
                    <div class="col-md-4 col-sm-4" style="float: left;border-right: 2px solid #0E84B6;">
                        City Id:
                        <span id="city_result"
                              style="color: #0F8DC2;font-size: 25px;margin-left: 64px;">Not Select</span>

                    </div>
                    <div class="col-md-4 col-sm-4" style="float: left;">
                        Brand Id:
                        <span id="brand_result"
                              style="color: #0F8DC2;font-size: 25px;margin-left: 64px;">Not Select</span>

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