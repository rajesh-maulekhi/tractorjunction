<?php
if ($this->session->userdata('admin')) {
    ?>
    <?php
    $root = "http://" . $_SERVER['HTTP_HOST'];
    $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
    ?>
    <title>Admin || View Admin </title>
    <div id="gif_image" style="background:rgba(0, 0, 0, 0.55);height:100%;width:100%;display:none;position: fixed;
    left: 0;
    right: 0;
    top: 0;
    z-index: 2;">
        <center>
            <img src="../images/gif_tractor.gif" style="margin-top:23%;height:50px;">
        </center>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"
         style="padding:0px;min-height:835px;background: #F7F7F7;">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding:20px 14px;">

            <div class="col-sm-2 col-md-2">
                <a href="<?php echo $root; ?>admins/add-semi-admin">
                    <button type="button" class="btn btn-default buttoupdate" style="" id="delete">Add Admin</button>
                </a>
            </div>


        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 "
             style="padding:20px 14px;background: #fff; margin-top:20px;">
            <div id="info-message" style="float:right;">
                <?php
                echo $this->session->userdata('p_add');
                $this->session->unset_userdata('p_add');
                ?>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding:0px; padding-top:0px;">
                <h3>Show Admin</h3>

                <div class="meas">

                    <?php
                    echo $this->session->userdata('value_inserted');
                    $this->session->unset_userdata('value_inserted');
                    ?>
                </div>
                <hr style="  border-top: 3px solid #C5C2C2;">
                <?php if (!empty($result)) { ?>
                    <table border="0" style="width:100%;" class="table table-striped">
                        <thead>
                        <tr>

                            <th>S.no.</th>
                            <th> Name</th>
                            <th>Email</th>

                        </tr>
                        <?php $s_no = 1; ?>
                        </thead>
                        <tbody id="show_result">
                        <tr>
                            <?php
                            foreach ($result as $row => $obj){
                            ?>


                            <td><?php echo $s_no; ?>.</td>
                            <td><?php echo ucfirst($obj->username); ?></td>
                            <td><?php echo ucfirst($obj->email); ?></td>


                        </tr>


                        <?php
                        $s_no++;
                        } ?>


                        </tbody>


                    </table>
                <?php } else {
                    echo "No Result found";
                } ?>
            </div>


        </div>
    </div>
    <script src="../../js/jquery.min2.js"></script>


    <?php
} else {
    header("Location:login");
}
?>