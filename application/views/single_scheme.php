<style>
    .paa9 {
        text-align: left;
        line-height: 20px;
        text-align: justify;
        line-height: 1.7;
        padding: 36px;
    }
</style>
<body>
<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
foreach($finance_result as $key=>$value){}
?>
<div class="banner" style="background:rgba(204, 0, 1, 0.7) none repeat scroll 0% 0%;height:105px;">
    <div class="container">
        <div class="col-sm-12 col-md-12" style="padding:15px 0px;">
            <ul type="none" style="color:#fff">
                <li style="float:left;padding-right:5px;"><i class="fa fa-home"
                                                             style="font-size:16px;padding-right:5px;"></i><a
                            style="color:white;" href="<?php echo $root; ?>">Home</a></li>
                <li style="float:left;padding-right:5px;">/</li>
                <li style="float:left;padding-right:5px;"><?php echo ucfirst($type); ?> Scheme</li>
            </ul>
        </div>
    </div>
</div>
<div class="container" style="color:black;padding: 0px 15px;margin-top:-55px;background:transparent;">
    <div class="col-sm-12 col-md-12 paddingZ" style="padding-bottom: 90px;">
        <div class="col-sm-12 col-md-12 padding_0_in_small">
            <div class="box-wrapper">
                <div class="box1" style="padding: 30px 50px;">
                    <div class="row">
                        <h2 style="" class="font-upcoming SchHed"><?php echo ucwords($value->title); ?></h2>
                        <div class="border displyNone">
                            <div class="border-inner"></div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 prod-div BodrSingSV" style="margin-bottom:20px;">
                            <div class="col-sm-12 col-md-12 padding_0_in_small">
                                <div class="col-sm-12 col-md-12 padding_0_in_small">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
									<img src="<?php echo $root; ?>images/scheme/<?php echo $value->image; ?>" alt="<?php echo ucwords($value->title); ?> | tractorjunction" class="img-responsive" style="    border: 1px solid #ddd;margin-top:5px;
    margin: auto; margin-top:5px;">
									</div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 paa9">
                                        <p style="font-family:inherit;">
                                          <?php echo $value->description; ?>
                                        </p>
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>