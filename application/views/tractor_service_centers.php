<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
?>
<?php
$statename = '';
$bradId = '';
$brandName = '';
$stateid = '';
$cond = array();
$data2 = array();
$data1 = array();
if (isset($_GET['state_name'])) {
    $statename = $_GET['state_name'];
    if ($statename != '') {

        foreach (shweta_select_like('id', 'states', 'name', $statename) as $raa) $stateid = ($raa->id);
        $data1 = array(
            'state' => $stateid,
        );
    }
}
if (isset($_GET['brand_name'])) {
    $brandName = $_GET['brand_name'];
    if ($brandName != '') {
        foreach (shweta_select_like('id', 'brand', 'name', $brandName) as $raa) $bradId = ($raa->id);
        $data2 = array(
            'authorize' => $bradId,
        );

    }
}
$cond = array_merge($data1, $data2);

?>
<div class="banner" style="background:rgba(204, 0, 1, 0.7) none repeat scroll 0% 0%;height:105px;">
    <div class="container">
        <div class="col-sm-12 col-md-12" style="padding:15px 0px;">
            <ul type="none" style="color:#fff">
                <li style="float:left;padding-right:5px;"><i class="fa fa-home"
                                                             style="font-size:16px;padding-right:5px;"></i>Home
                </li>
                <li style="float:left;padding-right:5px;">/</li>
                <li style="float:left;padding-right:5px;">Service Centers</li>
            </ul>
        </div>
    </div>
</div>
<div class="container d1">
    <div class="col-sm-12 col-md-12 paddingZ b1">
        <div class="box-wrapper">
            <div class="box1" style="padding-top: 0;
padding-bottom: 0;">
                <div class="row">
                    <img src="images/banner_service.jpg" alt="Tractor service center banner image tractorjunction"
                         style="width:100%;height:300px"/>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$result = array();
// print_r($cond);
// die;
if (empty($cond)) {
    $cond = '';
}
$result = shweta_pagination_query_new_orderby('dealers', '20', 'tractor-service-centers', $cond, 'name_de', 'ASC');

?>
<div class="container">
    <div class="col-sm-12 col-md-12" style="padding-bottom:90px;border:1px solid #eee">
        <div class="col-md-6 col-sm-9">
            <h1 style="margin:40px 0px 0px;font-size:24px;color:#148f1a;">Tractor Service <span style="color:#cc0001;"> Centers in
                    <?php

                    if ($statename != '') {
                        echo ucfirst($statename);
                    } else {
                        echo "India";
                    }
                    ?></span>
            </h1>
        </div>
        <?php if (!empty($result)){ ?>
        <?php //echo form_open('tractor-service-centers'); ?>
        <form action="<?php echo $root; ?>tractor-service-centers" method="GET">

            <div class="col-sm-3 col-md-6" style="padding:40px 35px 0px 0px;width: 388px;float: right;">
                <div class="dis">
                    <?php
                    $selected = '';
                    $selected = ($statename) ? $statename : $statename;
                    $query = array();
                    $valueQuery = array();
                    $QueryKey = array();
                    $QueryKeyValue = array();
                    $ab = '';
                    $query = shweta_select('*', 'states', 'country_id', '101');
                    $valueQuery[''] = 'Select state';
                    foreach ($query as $QueryKey => $QueryKeyValue) {
                        $valueQuery[$QueryKeyValue->name] = ucfirst($QueryKeyValue->name);
                    }
                    $js5 = 'class="serca" id="maxOption2"  data-max-options="1"style="width:150px;border:none;border-right:2px solid #eee"';
                    echo form_dropdown('state_name', $valueQuery, $selected, $js5);
                    ?>
                    <?php
                    $selected = '';
                    $selected = ($brandName) ? $brandName : $brandName;
                    $cc[''] = 'Select brand';
                    foreach (shweta_order_by_query('name,id', ' brand', '', '') as $r => $t) {
                        $tractor_brand = '';
                        $cc[$t->name] = ucfirst($t->name);
                    }
                    $js5 = 'class="serca" id="maxOption2"  data-max-options="1"style="width:150px;border:none;border-right:2px solid #eee" required="required"';
                    echo form_dropdown('brand_name', $cc, $selected, $js5);
                    ?>
                    <button type="submit" class="btns"><i class="fa fa-search"></i></button>
                    <?php echo form_close(); ?>
                </div>
            </div>
            <?php } ?>
            <div class="border" style="margin:80px 0px 0px;">
                <div class="border-inner"></div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:20px">
                <?php
                if (isset($_POST['submitcusto'])) {
                    $brand = '';
                    $brand = $this->input->post('brand_name');
                    $state = '';
                    $state = $this->input->post('state_name');
                    if ($brand != "" && $state != "") {
                        header("Location:" . $root . "centers/" . newslugend($brand) . "-service-centers/" . newslugend($state));
                    } elseif ($brand != "") {
                        header("Location:" . $root . "centers/" . newslugend($brand) . "-service-centers");
                    } else {
                        header("Location:" . $root . "tractor-service-centers");
                    }
                }
                ?>
                <?php
                $i = 1;
                if (!empty($result['result'])) {
                    foreach ($result['result'] as $key => $value) {
                        $tractor_brandImage = '';
                        $tractor_brand = '';
                        foreach (shweta_select('image', 'brand', 'id', $value->authorize) as $raa) $tractor_brandImage = $raa->image;
                        foreach (shweta_select('name', 'brand', 'id', $value->authorize) as $raa) $tractor_brand = $raa->name;
                        ?>
                        <div class="col-md-6 col-sm-6 col-xs-12 paddingZ">
                            <div class="col-md-12 col-sm-12 col-xs-12 paddingZ"
                                 style="background-color:#eee;padding:10px">
                                <div class="col-md-9 col-sm-6 col-xs-8">
                                    <span class="service_font"
                                          style="font-size:22px;color:#DB4C4D"><?php echo ucfirst($value->name_de); ?></span>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-4">
                                    <img src="<?php echo $root . "upload/"; ?><?php echo $tractor_brandImage; ?>"
                                         class="service_image" style="float:right;width: 80%;
height: 30px;"/>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:10px;">
                                <div class="col-md-3 col-sm-3 col-xs-4">
                                    <i class="fa fa-gear" style="color:black;font-size:15px"></i>
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-8">
                                    <span> <?php echo ucfirst($tractor_brand); ?></span>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:10px">
                                <div class="col-md-3 col-sm-3 col-xs-4">
                                    <i class="fa fa-mobile" style="color:black;font-size:15px"></i>
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-8">
						<span> <?php
                            if ($value->contact == "")
                                echo "Not available";
                            else
                                echo ucfirst($value->contact); ?></span>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:10px">
                                <div class="col-md-3 col-sm-3 col-xs-4">
                                    <i class="fa fa-map-marker" style="color:black;font-size:15px"></i></div>
                                <div class="col-md-9 col-sm-9 col-xs-8">
                                    <?php foreach (shweta_select('name', 'cities', 'id', $value->city) as $raa) echo ucfirst($raa->name); ?>
                                    ,
                                    <?php foreach (shweta_select('name', 'states', 'id', $value->state) as $raa) echo ucfirst($raa->name); ?>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:10px">
                                <div class="col-md-3 col-sm-3 col-xs-4">
                                    <i class="fa fa-location-arrow" style="color:black;font-size:15px"></i>
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-8">
                                    <?php echo ucfirst($value->address); ?>
                                </div>
                            </div>
                        </div>
                        <?php $i++;
                    }
                    ?>
                    <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:10px">
                        <div class="pagination" style="float:right; margin-top: 13px;">
                            <ul class="pagination" style="margin:-4px 0px -23px 0px !important;">
                                <?php echo $result['links']; ?>
                            </ul>
                        </div>
                    </div>
                    <?php
                } else { ?>
                    <h4 style="color:#DB4C4D;text-align:center;">No Result found</h4>
                <?php } ?>
            </div>
    </div>
    <?php echo quickLinksHTML(); ?>
</div>
</div>
