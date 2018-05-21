<?php
if ($this->session->userdata('admin')) {
    $root = "http://" . $_SERVER['HTTP_HOST'];

    $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);


    ?>

    <title>Admin || View Implement Request </title>
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


        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 "
             style="padding:20px 14px;background: #fff; margin-top:20px;">
            <div id="info-message" style="float:right;">
                <?php
                echo $this->session->userdata('p_add');
                $this->session->unset_userdata('p_add');
                ?>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding:0px; padding-top:0px;">
                <h3>Show Implement Request</h3>

                <div class="meas">

                    <?php
                    echo $this->session->userdata('value_inserted');
                    $this->session->unset_userdata('value_inserted');
                    ?>
                </div>
                <hr style="  border-top: 3px solid #C5C2C2;">
                <?php
                $condition = "req_type='implement'";
                $result = shweta_pagination_query_new_orderby('implement_req', '10', 'admins/implement-request', $condition, 'id', 'DESC');

                if (empty($result['result'])) {
                    ?>
                    <h5 style="    text-align: center;
    color: #DC4344;
    font-size: 22px;
    padding: 40px;">No result found</h5>
                <?php } else { ?>
                    <table border="0" style="width:100%;" class="table table-striped">
                        <thead>
                        <tr style="text-align: center;">
                            <th>S.no.</th>
                            <th>Name</th>
                            <th>Requset brand</th>
                            <th>Requset model</th>
                            <th>Email-id</th>
                            <th>Request Date</th>
                            <th style="width:8%;">Mail Sent</th>
                            <th style="width:20%;    text-align: center;">Action</th>
                        </tr>
                        <?php $s_no = 1; ?>
                        </thead>
                        <tbody id="show_result">
                        <?php


                        foreach ($result['result'] as $row => $obj) {
                            $brand_name = '';
                            $Model_name = '';
                            $slug = '';
                            foreach (shweta_select('brand,model_name,slug', 'new_implement', 'id', $obj->impID) as $raa) {
                                foreach (shweta_select('name', 'brand', 'id', $raa->brand) as $raa1) $brand_name = ucfirst($raa1->name);
                                $Model_name = $raa->model_name;
                                $slug = $raa->slug;
                            }
                            $Name = '';
                            $Email = '';
                            foreach (shweta_select('username,email', 'user_reg', 'id', $obj->userId) as $raa) {

                                $Name = $raa->username;
                                $Email = $raa->email;
                            }
                            ?>
                            <tr style="text-align: center;">

                                <td><?php echo $s_no; ?>.</td>
                                <td><?php echo $Name; ?></td>
                                <td><?php echo $brand_name; ?></td>
                                <td>
                                    <a target="_blank"
                                       href="<?php echo $root; ?>implement/<?php echo newslugend($brand_name); ?>-<?php echo newslugend($slug); ?>"
                                       style="cursor:pointer;color:#2A7842;">
                                        <?php echo $Model_name; ?>
                                    </a></td>
                                <td><?php echo $Email; ?></td>


                                <td><?php echo $obj->date; ?></td>
                                <td>
                                    <?php
                                    if ($obj->status == "0") {
                                        ?><i class="fa fa-times"></i><?php
                                    } else {
                                        ?><i class="fa fa-check"></i>
                                    <?php } ?>
                                </td>

                                <td>
                                    <a title="View"
                                       href="<?php echo $root; ?>admins/request-single/<?php echo $obj->id; ?>"><i
                                                class="fa fa-eye"></i></a>
                                    &nbsp;&nbsp;&nbsp;
                                    <a href="<?php echo $root; ?>admins/request-reply/<?php echo $obj->id; ?>"><i
                                                class="fa fa-reply"> </i></a>
                                    &nbsp;&nbsp;&nbsp;
                                    <a onclick="return dialogeBox();" title="delete"
                                       href="<?php echo $root; ?>admins/ImplementRequest/DeteleReq/<?php echo $obj->id; ?>">
                                        <i class="fa fa-trash"> </i></a>

                                </td>


                            </tr>


                            <?php
                            $s_no++;
                        } ?>


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
    </div>


    <?php
} else {
    header("Location:login");
}
?>