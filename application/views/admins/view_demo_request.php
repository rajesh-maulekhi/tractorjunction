<?php
if ($this->session->userdata('admin')) {
    ?>
    <title>Admin || Add Area </title>

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
            <h3>Reply Request</h3>
            <hr style="  border-top: 3px solid #C5C2C2;">
            <?php
            foreach ($result as $value => $key) {
            }
            ?>

            <div id="page-wrapper"
                 style="line-height: 35px;float:left;border:2px solid #eee;width:100%;padding: 17px 0px;">

                <div class="col-md-6 col-sm-6" style="border-right:2px solid #ccc">


                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Request for brand:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php foreach (shweta_select('name', 'brand', 'id', $key->brand) as $raa)

                                        echo $bb = $raa->name ?>
                                </div>
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
                                    <?php echo $key->model; ?>                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Request Date:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php echo ucfirst($key->date); ?>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-md-6 col-sm-6">

                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Name:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php echo ucfirst($key->name); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Email:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php echo ucfirst($key->email); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Contact No:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php
                                    if ($key->contact != "")
                                        echo $key->contact;
                                    else
                                        echo "Not filled";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="col-md-12 col-sm-12">
                    <span class="l1" style="    margin-left: 30px;">Message:</span>
                    <span class="l2">
<?php
if ($key->status == "0") {
    echo "Reply pending";
} else {
    if ($key->message == "")
        echo "Message empty";
    else
        echo $key->message;
}
?>
</span>

                </div>
            </div>


        </div>


    </div>


    <script src="../../js/jquery.min2.js"></script>


    <?php
} else {
    header("Location:login");
}
?>