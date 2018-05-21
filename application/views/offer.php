<head>
    <?php
    $root = "http://" . $_SERVER['HTTP_HOST'];
    $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
    ?>
    <link rel="stylesheet" href="<?php echo $root; ?>web_root/front_web_root/lightbox.css">
    <style>
        .upload-tym {
            position: relative;
            border: 1px solid #eaedef;
            max-width: 100px;
            float: left;
            margin-right: 12px;
        }

        .upload-day {
            padding: 10px 25px 5px;
            font-size: 24px;
            text-align: center;
        }

        .upload-date {
            font-size: 11px;
            background-color: #f5f5f5;
            text-align: center;
            padding-top: 8px;
            padding-bottom: 8px;
        }
    </style>
</head>
<div class="banner" style="background:rgba(204, 0, 1, 0.7) none repeat scroll 0% 0%;height:105px;">
    <div class="container">
        <div class="col-sm-12 col-md-12" style="padding:15px 0px;">
            <ul type="none" style="color:#fff">
                <li style="float:left;padding-right:5px;"><i class="fa fa-home"
                                                             style="font-size:16px;padding-right:5px;"></i><a
                            style="color:white;" href="<?php echo $root; ?>">Home</a></li>
                <li style="float:left;padding-right:5px;">/</li>
                <li style="float:left;padding-right:5px;">Offers</li>
            </ul>
        </div>
    </div>
</div>
<div class="container" style="color:black;padding: 0px 15px;margin-top:-55px;background:transparent;">
    <div class="col-sm-12 col-md-12 paddingZ" style="padding-bottom: 90px;">
        <div class="col-sm-12 col-md-12">
            <div class="box-wrapper">
                <div class="box1" style="padding: 30px 50px;">
                    <div class="row">
                        <h2 style="margin:10px 0px 0px;font-size: 2.3em;color:#148f1a;">Offers</h2>
                        <div class="border">
                            <div class="border-inner"></div>
                        </div>
                        <?php
                        $result = array();
                        $result = Select_OrderBy_brand('*', 'offer', '', 'id', 'DESC');
                        if (!empty($result)) {
                            ?>
                            <?php
                            foreach ($result as $row => $obj) {
                                ?>
                                <div class="col-md-12 prod-div" style="margin-bottom:20px;">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="col-sm-12 col-md-12 ">
                                            <a class="example-image-link"
                                               href="<?php echo $root; ?>upload/offer/<?php echo $obj->image; ?>"
                                               data-lightbox="example-set"><img
                                                        style="height:243px;width: 90%;margin-top:13px;margin-left: 13px;"
                                                        class="example-image img-responsive"
                                                        src="<?php echo $root . "upload/" ?>offer/<?php echo $obj->image; ?>"
                                                        alt=""/></a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <h2 style="margin:35px 0px 0px;font-size:20px;color:#DB4C4C;padding-bottom:8px;border-bottom:1px solid #eee;"><?php echo ucfirst($obj->title); ?> </h2>
                                        <div class="col-sm-12 col-md-12" style="padding:0px;margin-top:6px;">
                                            <p style="text-align:justify;">
                                            <div class="upload-tym">
                                                <div class="upload-day"><?php echo date("d", strtotime($obj->date_time)); ?></div>
                                                <div class="upload-date"><?php echo date("M Y", strtotime($obj->date_time)); ?></div>
                                            </div>
                                            <?php echo $obj->description; ?>
                                            <?php if (isset($obj->exp_date)) { ?>
                                                <?php if ($obj->exp_date != "") { ?>
                                                    <span style="color: #DD4445;font-weight: 700;"> Expire On: <?php echo $obj->exp_date; ?></span>
                                                <?php } ?>
                                            <?php } ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            ?>
                            <div class="col-md-12 prod-div" style="margin-bottom:20px;">
                                <div class="col-sm-12 col-md-12">
                                    <div class="col-sm-12 col-md-12 ">
                                        <center>
                                            <img src="<?php echo $root; ?>images/No-record-found.png"
                                                 class="img-responsive" style="padding:22px;">
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<?php echo quickLinksHTML(); ?>

<script src="<?php echo $root; ?>web_root/front_web_root/lightbox-plus-jquery.min.js"></script>
