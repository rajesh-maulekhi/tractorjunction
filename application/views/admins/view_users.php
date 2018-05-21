<?php
if ($this->session->userdata('admin')) {
    ?>

    <title>Admin || View users </title>
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
        <a href="User_list_export">
            <button type="button" class="btn btn-default logbuttn" style="    float: left !important;
    margin: 21px;">Export Users List
            </button>
        </a>


        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 "
             style="padding:20px 14px;background: #fff; margin-top:20px;">
            <div id="info-message" style="float:right;">
                <?php
                echo $this->session->userdata('p_add');
                $this->session->unset_userdata('p_add');
                ?>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding:0px; padding-top:0px;">
                <h3>Show Users</h3>

                <div class="meas">

                    <?php
                    echo $this->session->userdata('value_inserted');
                    $this->session->unset_userdata('value_inserted');
                    ?>
                </div>
                <hr style="  border-top: 3px solid #C5C2C2;">

                <table border="0" style="width:100%;" class="table table-striped">
                    <thead>
                    <tr>

                        <th>S.no.</th>
                        <th>Name</th>
                        <th>Email Id</th>
                        <th>Location</th>
                        <th>Gender</th>
                        <th>Join date</th>

                    </tr>
                    <?php $s_no = 1; ?>
                    </thead>
                    <tbody id="">
                    <tr>
                        <?php
                        $result = array();
                        $result = shweta_pagination_query_new('user_reg', '9', 'admins/View_users', '');
                        if (empty($result)){
                            echo "No user found";
                        }
                        else{
                        foreach ($result['result'] as $row => $obj){
                        ?>

                        <td><?php echo $s_no; ?>.</td>
                        <td><?php echo ucfirst($obj->username); ?></td>

                        <td><?php
                            if ($obj->email)
                                echo $obj->email;
                            else
                                echo "Not Filled";
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($obj->location)
                                foreach (shweta_select('name', 'cities', 'id', $obj->location) as $raa) echo ucfirst($raa->name);

                            else
                                echo "Not Filled";
                            ?>
                        </td>
                        <td><?php
                            if ($obj->gender)
                                echo $obj->gender;
                            else
                                echo "Not Filled";
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($obj->date_time)
                                echo $obj->date_time;
                            else
                                echo "Not Filled";
                            ?>
                        </td>


                    </tr>


                    <?php
                    $s_no++;
                    }
                    }
                    ?>


                    </tbody>


                </table>
                <?php
                if (!empty($result)) {
                    ?>
                    <div class="pagination" style="float:right; margin-top: 13px;">
                        <ul class="pagination" style="margin:-4px 0px -23px 0px !important;">
                            <?php echo $result['links']; ?>
                        </ul>
                    </div>
                <?php } ?>
            </div>


        </div>
    </div>
    <script src="../../js/jquery.min2.js"></script>

    <?php
} else {
    header("Location:login");
}
?>