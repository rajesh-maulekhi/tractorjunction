<?php
if ($this->session->userdata('admin')) {
    $root = "http://" . $_SERVER['HTTP_HOST'];

    $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);


    ?>

    <title>Admin || View offer </title>
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
                <button type="button" class="btn btn-default buttoupdate" style="" id="delete">Multipal Delete</button>
            </div>
            <div class="col-sm-2 col-md-2">
                <a href="add_offer">
                    <button type="button" class="btn btn-default buttoupdate" style="" id="delete">Add Offer</button>
                </a>
            </div>
            <div class="col-sm-2 col-md-2" style="text-align:center;float:right;">
            </div>


            <div class="col-sm-3 col-md-3" style="float:right;">
                <div style="max-height: 90px;
height:auto;
    display: none;
    padding-top: 10px;
    line-height: 12px;
    width: 95%;
    margin-left: 87px;
    margin-top: 0px;
	padding-bottom:8px;
    position: absolute;
    z-index: 2;
    overflow-y: scroll;
    overflow-x: hidden;
    cursor: pointer;
    background: rgb(221, 68, 69);
    color: white;" id="box">
                    <ul style="    line-height:19px;list-style: none;padding-left:15px;" id="filter_result">
                    </ul>
                </div>


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
                <h3>Show Offers</h3>

                <div class="meas">

                    <?php
                    echo $this->session->userdata('value_inserted');
                    $this->session->unset_userdata('value_inserted');
                    ?>
                </div>
                <hr style="  border-top: 3px solid #C5C2C2;">
                <?php
                $result = array();
                $result = shweta_pagination_query_new('offer', '5', 'admins/View_offer', '');

                if (!empty($result['result'])) {

                    ?>
                    <table border="0" style="width:100%;" class="table table-striped">
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="form-control" style="    height: 18px;
    width: 18px;
    background: #139ED9 !important;
    color: #139ED9 !important;" id="select_all"></th>
                            <th>S.no.</th>
                            <th>Title</th>
                            <th>Descrition</th>
                            <th>Action</th>

                        </tr>
                        <?php $s_no = 1; ?>
                        </thead>
                        <tbody id="show_result">
                        <tr>
                            <?php


                            foreach ($result['result'] as $row => $obj){
                            ?>
                            <td><input type="checkbox" class="form-control checkbox" style="    height: 18px;
    width: 18px;
    background: #139ED9 !important;
    color: #139ED9 !important;" class="checkbox" value="<?php echo $obj->id; ?>"/></td>

                            <td><?php echo $s_no; ?>.</td>
                            <td><?php echo $obj->title; ?></td>
                            <td style="width:20%;"><?php

                                $cou = strlen($obj->description);
                                if ($cou > 5) {
                                    echo substr($obj->description, 0, 10); ?>.......
                                <?php } else
                                    echo ucfirst($obj->description);
                                ?>
                            </td>


                            <td>
                                <a class="btn btn-default buttoupdate"
                                   href="<?php echo $root; ?>admins/Edit_offer?id1=<?php echo $obj->id; ?>">Edit</a>
                                <a class="btn btn-default buttoupdate"
                                   onclick="delete_tractor('<?php echo $obj->id; ?>');">Delete</a>

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
                    <?php
                } else {
                    echo "No offer found";
                }
                ?>
            </div>


        </div>
    </div>
    <script src="../../js/jquery.min2.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#select_all').on('click', function () {
                if (this.checked) {
                    $('.checkbox').each(function () {
                        this.checked = true;
                    });
                } else {
                    $('.checkbox').each(function () {
                        this.checked = false;
                    });
                }
            });

            $('.checkbox').on('click', function () {
                if ($('.checkbox:checked').length == $('.checkbox').length) {
                    $('#select_all').prop('checked', true);
                } else {
                    $('#select_all').prop('checked', false);
                }
            });
        });

        $(document).ready(function () {
            $('#delete').on('click', function () {
                var vals = new Array();
                var chkArray12 = [];
                $(".checkbox:checked").each(function () {
                    chkArray12.push($(this).val());
                });
                if (chkArray12 != "") {
                    document.getElementById('gif_image').style.display = "block";
                    $.ajax({
                        type: "POST",
                        url: '../admins/delete_offer',
                        data: {val1: chkArray12},
                        success: function (data) {
                            document.getElementById('gif_image').style.display = "none";
                            alert(data);
                            location.reload();
                            // $("#filter_result").html(data);
                        },
                        error: function () {
                            alert("error occur");
                        }
                    });
                }
                else {
                    alert("please check one row");
                }
            });
        });
        function delete_tractor(k) {
            var val_tractor = k;
            document.getElementById('gif_image').style.display = "block";
            $.ajax({
                type: "POST",
                url: '../admins/Delete_offer_single',
                data: {val21: val_tractor},
                success: function (data) {
                    alert(data);
                    document.getElementById('gif_image').style.display = "none";
                    location.reload();
                },
                error: function () {
                    alert("error occur");
                }
            });
        }


    </script>
    <?php
} else {
    header("Location:login");
}
?>