<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

if ($this->session->userdata('admin')) {
    ?>

    <title>Admin || Old tarctor List </title>

    <div id="loder" style="background:rgba(0, 0, 0, 0.55);height:100%;width:100%;display:none;position: fixed;
    left: 0;
    right: 0;
    top: 0;
    z-index: 2;">
        <center>
            <img src="<?php echo $root; ?>images/gif_tractor.gif" style="margin-top:23%;height:50px;">
        </center>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"
         style="padding:0px;min-height:835px;background: #F7F7F7;">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding:20px 14px;">
        <div class="col-sm-2 col-md-2">
        </div>


    </div>


    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 "
         style="padding:20px 14px;background: #fff; margin-top:20px;">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding:0px; padding-top:0px;">
            <h3>Used tractor purchase details
            </h3>

            <hr style="  border-top: 3px solid #C5C2C2;">
            <?php
            $result = array();
            $condition = "type='old'";
            $result = shweta_pagination_query_new_orderby('purchaserequest', '9', 'admins/buy-old-tractors-details', $condition, 'id', 'DESC');
            // echo "<pre>";
            // print_r($result);
            // die;

            if (empty($result['result'])) {
                ?>
                <h5 style="    text-align: center;
    color: #DC4344;
    font-size: 22px;
    padding: 40px;">No result found</h5>
            <?php } else { ?>
                <table id="keywords" class="table table-striped" style="cursor:pointer;" cellspacing="0"
                       cellpadding="0">
                    <thead>
                    <tr>

                        <th style="width:5%;">S.no.</th>
                        <th style="width:10%;">Order No.</th>
                        <th style="width:10%;">Order Date</th>
                        <th style="width:20%;">Order Tractor</th>
                        <th style="width:15%;">Customer name</th>
                        <th style="width:15%;">Customer location</th>
                        <th style="width:15%;">Customer City</th>


                        <th style="width:35%;">Action</th>

                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $i = 1;
                    foreach ($result['result'] as $key => $value) {
                        ?>
                        <tr>
                            <?php
                            $model_name = '';
                            foreach (shweta_select('brand,model_name,slug', 'old_tractor', 'id', $value->requestfor) as $raa) {
                                foreach (shweta_select('name', 'brand', 'id', $raa->brand) as $raa1) $brand = ($raa1->name);
                                $model_name = $raa->slug;
                            }

                            ?>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $value->reqNo; ?></td>
                            <td><?php echo date("d-M-Y", strtotime($value->date)); ?></td>
                            <td>

                                <a href="<?php echo $root; ?>used-tractor/<?php echo newslugend($brand); ?>-<?php echo newslugend($model_name); ?>"
                                   target="_blank">

                                    <?php

                                    echo ucfirst($brand);
                                    echo "-";
                                    echo ucfirst($model_name);

                                    ?></a></td>
                            <td><?php echo ucfirst($value->name); ?></td>
                            <td>
                                <?php foreach (shweta_select('name', 'states', 'id', $value->state) as $raa) echo ucfirst($raa->name);
                                ?></td>
                            <td>
                                <?php foreach (shweta_select('name', 'cities', 'id', $value->city) as $raa) echo ucfirst($raa->name);
                                ?></td>


                            <td>
                                <a title="View Order"
                                   href="<?php echo $root; ?>admins/view-old-tractor-purchase-details/<?php echo $value->id; ?>">
                                    <button type="button" style="background:#1ABB9C;color:#eee;"
                                            class="ap btn btn-default"><i class="fa fa-eye"></i></button>
                                </a>
                                <!--
<?php
                                if ($value->status == 1) {
                                    ?>
<a title="click to don't want to reply" href="<?php echo $root; ?>admins/PurchaseDetails/replayConfirmedOldTractor/<?php echo $value->id; ?>/0"><button type="button" style="background:#DD4445;color:#eee;" class="ap btn btn-default"><i class="fa fa-times"></i></button></a>

		<?php
                                } else {
                                    ?>
<a title="click to reply confirmed" href="<?php echo $root; ?>admins/PurchaseDetails/replayConfirmedOldTractor/<?php echo $value->id; ?>/1"><button type="button" style="background:#148F1A;color:#eee;" class="ap btn btn-default"><i class="fa fa-check"></i> </button></a>

	<?php
                                }

                                ?>
-->


                            </td>
                        </tr>

                        <?php $i++;
                    }
                    ?>


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

    <?php
} else {
    header("Location:" . $root . "admin");
}
?>