<?php
if ($this->session->userdata('admin')) {
    ?>

    <title>Admin || View area </title>
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
                <a href="add_area">
                    <button type="button" class="btn btn-default buttoupdate" style="" id="delete">Add area</button>
                </a>
            </div>
            <div class="col-sm-2 col-md-2" style="text-align:center;float:right;">
                <?php $data = array('type' => 'submit', 'onclick' => 'search_re()', 'style' => 'margin-left: 72px;height: 37px', 'class' => 'btn btn-default buttoupdate');
                echo form_button($data, '<i class="fa fa-search"></i> Search'); ?>
            </div>


            <div class="col-sm-3 col-md-3" style="float:right;">
                <?php echo form_input(array('type' => 'text', 'id' => 'search_box', 'name' => 'search_box_name', 'placeholder' => 'Area Name', 'class' => 'form-control', 'style' => 'height:37px;border-radius:0px;margin-left:87px')); ?>
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
                <h3>Show Area</h3>

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
                        <th><input type="checkbox" class="form-control" style="    height: 18px;
    width: 18px;
    background: #139ED9 !important;
    color: #139ED9 !important;" id="select_all"></th>
                        <th>S.no.</th>
                        <th>Area Name</th>
                        <th>Edit/Delete</th>

                    </tr>
                    <?php $s_no = 1; ?>
                    </thead>
                    <tbody id="show_result">
                    <tr>
                        <?php
                        foreach ($result as $row => $obj){
                        ?>
                        <td><input type="checkbox" class="form-control checkbox" style="    height: 18px;
    width: 18px;
    background: #139ED9 !important;
    color: #139ED9 !important;" class="checkbox" value="<?php echo $obj->id; ?>"/></td>

                        <td><?php echo $s_no; ?>.</td>
                        <td><?php echo ucfirst($obj->area_name); ?></td>

                        <td>
                            <?php echo form_open('admins/edit_area'); ?>
                            <?php echo form_input(array('type' => 'hidden', 'name' => 'hidden_id_edit', 'value' => $obj->id)); ?>
                            <?php $data = array('type' => 'submit', 'style' => 'float:left;margin-right:32px', 'class' => 'btn btn-default buttoupdate');
                            echo form_button($data, '<i class="fa fa-edit"></i> Edit');
                            echo form_close();
                            ?>
                            <button type="button" class="btn btn-default buttoupdate" value="<?php echo $obj->id; ?>"
                                    id="delete_id_tractor" onclick="delete_tractor(this.value);" style=""><i
                                        class="fa fa-times"> Delete</i></button>
                        </td>


                    </tr>


                    <?php
                    $s_no++;
                    } ?>


                    </tbody>


                </table>
                <div class="pagination" style="float:right; margin-top: 13px;">
                    <ul class="pagination" style="margin:-4px 0px -23px 0px !important;">
                        <?php echo $links; ?>
                    </ul>
                </div>
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

        var root = "http://<?php echo $_SERVER['HTTP_HOST'];?>";
        root += <?php echo str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);?>;


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
                        url: root + 'index.php/admins/delete_area',
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
                url: root + 'index.php/admins/delete_area_single',
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


        $("#search_box").keyup(function (event) {
            var value = $(this).val();
            if (value != "") {
                $.ajax({
                    type: "POST",
                    url: root + 'index.php/admins/search_area_name',
                    data: {val_model: value},
                    success: function (data) {
                        $('#filter_result').show();
                        document.getElementById('box').style.display = "block";
                        $("#filter_result").html(data);
                    },
                    error: function () {
                        alert("error occur");
                    }
                });
            }
            else {
                document.getElementById('box').style.display = "none";
            }
        });
        function set_item(item) {
            $('#search_box').val(item);
            $('#filter_result').hide();
            document.getElementById('box').style.display = "none";
        }

        function search_re() {
            var value2 = $('#search_box').val();
            $.ajax({
                type: "POST",
                url: root + 'index.php/admins/search_area_result',
                data: {val_model_result: value2},
                success: function (data) {

                    $("#show_result").html(data);
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