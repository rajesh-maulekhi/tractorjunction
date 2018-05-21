<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

if ($this->session->userdata('admin')) {
    ?>

    <title>Admin || Show Customer Care </title>

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

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding:20px 14px;">
        <div class="col-sm-2 col-md-2">
            <a href="<?php echo $root; ?>admins/add-customer-care">
                <button type="button" class="btn btn-default buttoupdate" style="" id="delete">Add Customer care
                </button>
            </a>
        </div>


    </div>


    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 "
         style="padding:20px 14px;background: #fff; margin-top:20px;">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding:0px; padding-top:0px;">
            <h3>Show Customer Care</h3>

            <hr style="  border-top: 3px solid #C5C2C2;">
            <?php
            $result = array();
            $condition = '';
            $result = shweta_pagination_query_new_orderby('customercare', '9', 'admins/show-customer-care', $condition, 'id', 'DESC');
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
                <button id="deleteMultiple" type="button" class="btn btn-default logbuttn1"
                        style="background:#D43F3A;color:white;"><i class="fa fa-trash"> </i> Delete selected
                </button>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="width:5%;"><input type="checkbox" class="form-control" style="    height: 18px;
    width: 18px;
    background: #139ED9 !important;
    color: #139ED9 !important;" id="select_all"></th>
                        <th style="width:5%;">S.no.</th>
                        <th style="width:25%;">Customer care For brand</th>
                        <th style="width:15%;">Contact No</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $i = 1;
                    foreach ($result['result'] as $key => $value) {
                        ?>
                        <tr>
                            <td><input type="checkbox" class="form-control checkbox" style="    height: 18px;
    width: 18px;
    background: #139ED9 !important;
    color: #139ED9 !important;" class="checkbox" value="<?php echo $value->id; ?>"/></td>
                            <td><?php echo $i; ?></td>
                            <td><?php foreach (shweta_select('name', 'brand', 'id', $value->brand) as $raa) echo $raa->name; ?></td>
                            <td><?php
                                $contct = array();
                                $contct = array_filter(explode('$$', $value->contactno));
                                foreach ($contct as $contct) {
                                    echo $contct;
                                    echo "<br>";
                                }
                                ?></td>

                            <td>
                                <a href="<?php echo $root; ?>admins/edit-customer-care/<?php echo $value->id; ?>">
                                    <button type="button" style="background:#1ABB9C;color:#eee;"
                                            class="ap btn btn-default"><i class="fa fa-edit"></i></button>
                                </a>
                                <a href="<?php echo $root; ?>admins/CustomerCare/DeleteCustomerCare?id=<?php echo $value->id; ?>">
                                    <button style="background:#D43F3A;color:#eee;" type="button"
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
    <script src="<?php echo $root; ?>/js/jquery.min2.js"></script>

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
            $('#deleteMultiple').on('click', function () {
                var vals = new Array();
                var chkArray12 = [];
                $(".checkbox:checked").each(function () {
                    chkArray12.push($(this).val());
                });
                if (chkArray12 != "") {
                    document.getElementById('loder').style.display = "block";
                    $.ajax({
                        type: "POST",
                        url: '../admins/CustomerCare/delallCustomerCare',
                        data: {val1: chkArray12},
                        success: function (data) {
                            document.getElementById('loder').style.display = "none";
                            alert(data);
                            location.reload();
                        },
                    });
                }
                else {
                    alert("please check one Customer care");
                }
            });
        });


    </script>
    <?php
} else {
    header("Location:" . $root . "admin");
}
?>