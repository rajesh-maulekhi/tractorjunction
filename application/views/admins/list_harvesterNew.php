<?php

$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

if ($this->session->userdata('admin')) {
    ?>

    <title>Admin || Show new harvester </title>

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

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding:20px 14px;"><a
                href="<?php echo $root; ?>admins/add-harvester">
            <button type="button" class="btn btn-default buttoupdate" style="">Add harvester</button>
        </a>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 "
         style="padding:20px 14px;background: #fff; margin-top:20px;">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding:0px; padding-top:0px;">
            <div class="col-md-3">
                <h3>Harvester List</h3>
            </div>
            <div class="col-md-9">
                <div class="col-md-9">

                    <?php echo form_open('admins/show-harvester'); ?>
                    <?php echo form_input(array('type' => 'text', 'name' => 'name', 'id' => 'HarvesterName', 'placeholder' => 'Enter model Name', 'required' => 'required', 'class' => 'form-control')); ?>
                </div>
                <div class="col-md-3">

                    <?php echo form_input(array('type' => 'submit', 'value' => 'Search', 'name' => 'submitbt', 'class' => 'ap btn btn-default')); ?>
                    <?php echo form_close(); ?>
                    <a href="<?php echo $root; ?>admins/show-harvester" class="ap btn btn-default">Reset</a>
                </div>
            </div>
            <hr style="  border-top: 3px solid #C5C2C2;">
            <?php
            $result = array();
            if (isset($_POST['submitbt'])) {
                $condition = '';
                $condition = "model_name like '" . $_POST['name'] . "'";
                $result = shweta_pagination_query_new_orderby('harvester', '9', 'admins/show-harvester', $condition, 'id', 'DESC');
            } else {
                $condition = '';
                $result = shweta_pagination_query_new_orderby('harvester', '9', 'admins/show-harvester', $condition, 'id', 'DESC');
            }
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
                        <th style="width:15%;">Brand</th>
                        <th style="width:15%;">Image</th>
                        <th style="width:15%;">Model Name</th>

                        <th style="width:15%;">date</th>
                        <th style="width:35%;">Action</th>

                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $i = 1;
                    foreach ($result['result'] as $key => $value) {
                        ?>
                        <tr>

                            <td><?php echo $i; ?></td>
                            <td><?php foreach (shweta_select('name', 'brand', 'id', $value->brand) as $raa) echo $raa->name; ?></td>
                            <td>
                                <?php if ($value->image != "" && file_exists("./images/implementTractor/" . $value->image)) { ?>
                                    <img src="<?php echo $root . "images/implementTractor/" ?><?php echo $value->image; ?>"
                                         class="img-responsive img_wid" style="height:50px;width:100px;"/>
                                <?php } else { ?>
                                    <img src="<?php echo $root . "images/" ?>default-image.png"
                                         class="img-responsive img_wid" style="height:50px;width:100px;"/>
                                <?php } ?>
                            </td>
                            <td>
                                <a target="_blank" title="View Harvester"
                                   href="<?php echo $root; ?>harvester/<?php foreach (shweta_select('name', 'brand', 'id', $value->brand) as $raa) echo newslugend($raa->name); ?>-<?php echo newslugend($value->slug); ?>-combine-harvester">
                                    <?php echo $value->model_name; ?>
                                </a>
                            </td>


                            <td><?php echo $value->date; ?></td>
                            <td>
                                <a target="_blank" title="Edit"
                                   href="<?php echo $root; ?>admins/edit-harvester/<?php echo $value->id; ?>">
                                    <button type="button" style="background:#065E84;color:#eee;"
                                            class="ap btn btn-default"><i class="fa fa-edit"></i></button>
                                </a>
                                <a title="Delete"
                                   href="<?php echo $root; ?>admins/ImplementTractor/deleteHarvester/<?php echo $value->id; ?>">
                                    <button type="button" style="background:#DC4344;color:#eee;"
                                            class="ap btn btn-default"><i class="fa fa-trash"></i></button>
                                </a>


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