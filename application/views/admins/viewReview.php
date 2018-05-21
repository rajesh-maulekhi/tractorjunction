<?php
if ($this->session->userdata('admin')) {
    ?>
    <title>Admin || viewReview </title>

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
            <h3>Review</h3>
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
                                    Review for brand:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php foreach (shweta_select('brand', 'tech_specification', 'id', $obj->tractor_id) as $raa) {
                                        foreach (shweta_select('name', 'brand', 'id', $raa->brand) as $raa1) echo $raa1->name;
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
                                    Review for model:
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php foreach (shweta_select('model_name', 'tech_specification', 'id', $obj->tractor_id) as $raa) echo ucfirst($raa->model_name); ?>
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
                                    Username :
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php foreach (shweta_select('username', 'user_reg', 'id', $obj->user_id) as $raa) echo ucfirst($raa->username); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="margin: auto;float: none;font-size: 21px;">
                            <div class="col-md-12 col-sm-12">
                                <div class="col-md-6 col-sm-6 l1">
                                    Review rating :
                                </div>
                                <div class="col-md-6 col-sm-6 l2">
                                    <?php echo $obj->review_rating; ?>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="col-md-12 col-sm-12">
                    <span class="l1" style="    margin-left: 30px;">Message:</span>
                    <span class="l2">
	<?php echo $obj->review; ?>
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