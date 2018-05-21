<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

if ($this->session->userdata('admin')) {
    ?>
    <title>Admin || Single Tractor Scheme </title>

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
            <h3>Tractor Scheme</h3>
            <hr style="  border-top: 3px solid #C5C2C2;">
            <?php
            foreach ($result as $value => $obj) {
            }
            ?>

            <div id="page-wrapper"
                 style="line-height: 35px;float:left;border:2px solid #eee;width:100%;padding: 17px 0px;">

                <div class="col-md-12 col-sm-12" style="border-right:2px solid #ccc">


                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-2 col-sm-2 l1">
                                    Scheme type:
                                </div>
                                <div class="col-md-8 col-sm-8 l2">
                                    <?php echo ucfirst($obj->type); ?>
                                </div>
                                <div class="col-md-2 col-sm-2 l2">
                                    <img src="<?php echo $root; ?>images/scheme/<?php echo $obj->image; ?>"
                                         style="height:50px;width:50px;    border: 1px solid #ddd;"
                                         class="img-respomsive">

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-12 col-sm-12">


                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-2 col-sm-2 l1">
                                    Title:
                                </div>
                                <div class="col-md-10 col-sm-10 l2">
                                    <?php echo ucfirst($obj->title); ?>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="col-md-12 col-sm-12">


                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-2 col-sm-2 l1">
                                    Description:
                                </div>
                                <div class="col-md-10 col-sm-10 l2">
                                    <?php echo ucfirst($obj->description); ?>
                                </div>
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