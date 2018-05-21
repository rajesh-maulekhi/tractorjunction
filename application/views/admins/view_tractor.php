<?php
$root = "http://" . $_SERVER['HTTP_HOST'];

$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

if ($this->session->userdata('admin')) {

    ?>

    <title>Admin || View_Tractor </title>
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
                <a href="add_tractor">
                    <button type="button" class="btn btn-default buttoupdate" style="" id="delete">Add Tractor</button>
                </a>
            </div>
            <?php echo form_open('admins/view_tractor'); ?>
            <div class="col-sm-2 col-md-4" style="margin-left: 80px;">
                Select Brand:
                <?php

                $temp = shweta_select('*', 'brand', '', '');
                $p = "";
                $brand[''] = 'Please Select';
                foreach ($temp as $row => $objk) {
                    $brand[$objk->id] = ucfirst($objk->name);
                }
                $ab = 'class="form-control col-md-7 col-xs-12"';
                echo form_dropdown('brand', $brand, '', $ab);
                ?>
            </div>

            <div class="col-sm-2 col-md-2" style="text-align:center;float:right;">

                <?php $data = array('type' => 'submit', 'name' => 'submita', 'style' => 'margin-left: 72px;height: 37px;margin-top:21px', 'class' => 'btn btn-default buttoupdate');
                echo form_button($data, '<i class="fa fa-search"></i> Search'); ?>
            </div>


            <div class="col-sm-3 col-md-3" style="float:right;">
                Select Model:
                <?php echo form_input(array('type' => 'text', 'id' => 'search_box', 'name' => 'search_box_name', 'placeholder' => 'Model Name', 'class' => 'form-control', 'style' => 'height:37px;border-radius:0px;margin-left:0px')); ?>
                <div style="max-height: 90px;
height:auto;
    display: none;
    padding-top: 10px;
    line-height: 12px;
    width: 95%;
    margin-left: 0px;
	padding-bottom:8px;
    margin-top: 0px;
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
        <?php echo form_close(); ?>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 "
             style="padding:20px 14px;background: #fff; margin-top:20px;">


            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding:0px; padding-top:0px;">
                <h3>Show Tractor</h3>

                <div class="meas" id="info-message">

                    <?php
                    echo $this->session->userdata('value_inserted');
                    $this->session->unset_userdata('value_inserted');
                    ?>
                    <?php
                    echo $this->session->userdata('p_add');
                    $this->session->unset_userdata('p_add');
                    ?>

                </div>
                <hr style="  border-top: 3px solid #C5C2C2;">

                <table id="keywords" class="table table-striped" style="cursor:pointer;" cellspacing="0"
                       cellpadding="0">
                    <thead>
                    <tr>
                  
                        <th>S.no.</th>
                        <th>Brand Name</th>
                        <th>Model Name</th>
                        <th>Image</th>
                        <th>Price Show</th>
                        <th>Price</th>

                        <th>Status</th>
                        <th>Popular</th>
                        <th>latest</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>

                    </thead>
                    <tbody id="">
                    <tr>
                        <?php
                        $condition = "";
                        $brand = "";
                        $model = "";


                        if (isset($_POST['submita'])) {

                            $brand = $this->input->post('brand');
                            $model = $this->input->post('search_box_name');

                            if ($brand != "" && $model != "") {
                                $condition = " brand ='" . $brand . "' and model_name='" . $model . "'";
                                $this->session->set_userdata('ShowTractorcond', $condition);
                                $result = shweta_pagination_query_new('tech_specification', '20', 'admins/View_tractor', $condition);
                            } elseif ($brand != "") {
                                $condition = " brand ='" . $brand . "'";
                                $this->session->set_userdata('ShowTractorcond', $condition);
                                $result = shweta_pagination_query_new('tech_specification', '20', 'admins/View_tractor', $condition);
                            } elseif ($model != "") {
                                $condition = " model_name ='" . $model . "'";
                                $this->session->set_userdata('ShowTractorcond', $condition);
                                $result = shweta_pagination_query_new('tech_specification', '20', 'admins/View_tractor', $condition);
                            } else {
                                $cc = '';
                                // if($this->session->userdata('ShowTractorcond')){
                                // $cc=$this->session->userdata('ShowTractorcond');
                                // }
                                $this->session->unset_userdata('ShowTractorcond');
                                $result = shweta_pagination_query_new('tech_specification', '20', 'admins/View_tractor', $cc);
                            }

                        } else {
                            $cc = '';
                            if ($this->session->userdata('ShowTractorcond')) {
                                $cc = $this->session->userdata('ShowTractorcond');
                            } else {
                                $this->session->unset_userdata('ShowTractorcond');
                            }
                            // $cc='';
                            $result = shweta_pagination_query_new('tech_specification', '20', 'admins/View_tractor', $cc);
                        }

                        // echo "<pre>";
                        // echo $this->session->userdata('ShowTractorcond');
                        // die;
                        if ($result['page'] < 0) {
                            $s_no = 1;
                        } else {
                            $s_no = ($result['per_page'] * ($result['page'])) + 1;
                        }
                        if (!empty($result['result'])){
                        // die;
                        foreach ($result['result'] as $row => $obj){
                        ?>
         

                        <td><?php echo $s_no; ?>.</td>
                        <td><?php foreach (shweta_select('name', 'brand', 'id', $obj->brand) as $raa) echo ucfirst($raa->name); ?></td>


                        <td>
                            <a target="_blank"
                               href="<?php echo $root; ?>admins/Edit_tractor/EditTra/<?php echo $obj->id; ?>">
                                <?php echo $obj->model_name; ?></a></td>
                        <td>
                            <?php if ($obj->image != "" && file_exists("./upload/" . $obj->image)) { ?>
                                <img src="<?php echo $root . "upload/" ?><?php echo $obj->image; ?>"
                                     class="img-responsive img_wid" style="height:50px;width:100px;"/>
                            <?php } else { ?>
                                <img src="<?php echo $root . "images/" ?>default-image.png"
                                     class="img-responsive img_wid" style="height:50px;width:100px;"/>
                            <?php } ?>
                        </td>
                        <td>
                            <?php if ($obj->priceShow == 0) {
                                ?><a style="cursor:pointer;" onclick="PriceShowFun('<?php echo $obj->id; ?>','1');">
                                    No</a><?php
                            } else {
                                ?><a style="cursor:pointer;" onclick="PriceShowFun('<?php echo $obj->id; ?>','0');">
                                    Yes</a><?php
                            } ?>
                        </td>
                        <td><i class="fa fa-inr"> <?php

                                if ($obj->price != "")
                                    echo $obj->price;
                                else
                                    echo "Not Filled";
                                ?></i></td>

                        <td><?php echo $obj->status; ?></td>
                        <td>
                            <?php if ($obj->popular == "yes") { ?>
                                <i class="fa fa-star pp fa" style="color: #FFD700;cursor: pointer;" value="no"
                                   id="<?php echo $obj->id; ?>" onclick="get_p(this.id,'no')"></i>
                            <?php } else { ?>
                            <i class="fa fa-star-o pp fa" style="cursor: pointer;" value="yes"
                               id="<?php echo $obj->id; ?>" onclick="get_p(this.id,'yes')">

                                </i><?php } ?>

                        </td>
                        <td>
                            <?php if ($obj->latest == '1') { ?>
                                <i class="fa fa-star pp fa" style="color: #FFD700;cursor: pointer;" value="0"
                                   id="<?php echo $obj->id; ?>" onclick="get_l(this.id,'0')"></i>
                            <?php } else { ?>
                            <i class="fa fa-star-o pp fa" style="cursor: pointer;" value="1"
                               id="<?php echo $obj->id; ?>" onclick="get_l(this.id,'1')">

                                </i><?php } ?>

                        </td>
                        <td>

                            <a target="_blank"
                               href="<?php echo $root; ?>admins/Edit_tractor/EditTra/<?php echo $obj->id; ?>"><i
                                        class="fa fa-edit"></i> Edit</a>
                        </td>


                        <td>
                            <button type="button" class="btn btn-default buttoupdate" value="<?php echo $obj->id; ?>"
                                    id="delete_id_tractor" onclick="delete_tractor(this.value);" style=""><i
                                        class="fa fa-times"> Delete</i></button>
                        </td>


                    </tr>


                    <?php
                    $s_no++;
                    }
                    }
                    else {
                        echo "no result found";
                    }
                    ?>


                    </tbody>


                </table>
                <div class="pagination" style="float:right; margin-top: 13px;">
                    <ul class="pagination" style="margin:-4px 0px -23px 0px !important;">
                        <?php echo $result['links']; ?>
                    </ul>
                </div>
            </div>


        </div>
    </div>


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
                        url: '../admins/delete_tractor',
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
                } else {
                    alert("please check one row");
                }
            });
        });

        function get_p(id, value) {

            document.getElementById('gif_image').style.display = "block";
            $.ajax({
                type: "POST",
                url: '../admins/add_popular_tractor_ajax',
                data: {id12: id, value12: value},
                success: function (data) {
                    location.reload();
                    document.getElementById('gif_image').style.display = "none";
                },

                error: function () {
                    alert("error occur");
                }
            });
        }

        setTimeout(function () {
            document.getElementById('info-message').style.display = 'none';
        }, 1500);

        function PriceShowFun(id, value) {

            document.getElementById('gif_image').style.display = "block";
            $.ajax({
                type: "POST",
                url: '../admins/Add_popular_tractor_ajax/PriceChangeShow',
                data: {id12: id, value12: value},
                success: function (data) {
                    location.reload();
                    document.getElementById('gif_image').style.display = "none";
                },

                error: function () {
                    alert("error occur");
                }
            });
        }


        function get_l(id, value) {

            document.getElementById('gif_image').style.display = "block";
            $.ajax({
                type: "POST",
                url: '../admins/add_popular_tractor_ajax/latest',
                data: {id12: id, value12: value},
                success: function (data) {
                    // alert(data);
                    location.reload();
                    document.getElementById('gif_image').style.display = "none";
                },

                error: function () {
                    alert("error occur");
                }
            });
        }

        setTimeout(function () {
            document.getElementById('info-message').style.display = 'none';
        }, 1500);


        function delete_tractor(k) {
            var val_tractor = k;
            document.getElementById('gif_image').style.display = "block";
            $.ajax({
                type: "POST",
                url: '../admins/delete_tractor_single',
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
			// alert(value);
            if (value != "") {
                $.ajax({
                    type: "POST",
                    url: '../admins/search_model_name',
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

        // function search_re(){

        // var value2= $('#search_box').val();
        // var value3= $('#brand_id').val();
        // $.ajax({
        // type: "POST",
        // url: '../admins/search_model_result',
        // data:{val_model_result: value2, val_brand_result: value3},
        // success: function(data){

        // $("#show_result").html(data);
        // },
        // error: function(){
        // alert("error occur");
        // }
        // });
        // }
    </script>
    <?php
} else {
    header("Location:login");
}
?>