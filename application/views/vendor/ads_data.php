<?php
// $this->session->set_userdata('admin',1);
if ($this->session->userdata('vendor')) {
    $root = "http://" . $_SERVER['HTTP_HOST'];

    $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);


    ?>

    <title>Admin || View Ads Data </title>
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
                <h3>Show On Ads Data (Total Visitors:- <?php echo $total_rows;?> )</h3>

                <div class="meas">

                    <?php
                    echo $this->session->userdata('value_inserted');
                    $this->session->unset_userdata('value_inserted');
                    ?>
                </div>
                <hr style="  border-top: 3px solid #C5C2C2;">

                <table border="0" style="width:100%;" class="table table-striped">
                    <thead>
                    <tr style="text-align: center;">
                        <th>S.no.</th>
                        <th>IP Address</th>
                        <th>Page Name</th>
                       
                        <th> Date</th>
                        <!--<th>Mail Sent</th>
                        <th>Reply</th>
						-->
                    </tr>
                    <?php $s_no = 1; ?>
                    </thead>
                    <tbody id="show_result">
                    <?php
                    foreach ($result as $row => $obj) {

                        ?>
                        <tr style="text-align: left;">

                            <td><?php echo $s_no; ?>.</td>
                           
                            <td><?php echo $obj->ip_address; ?></td>
                            <td><?php echo $obj->page_name; ?></td>
                            <td><?php echo $obj->date_time; ?></td>
                           
							   


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


        function search_re() {
            var value2 = $('#datepicker').val();
            var value3 = $('#datepicker2').val();

            $.ajax({
                type: "POST",
                url: '../admins/Search_request_result_onroad',
                data: {date1: value2, date2: value3},
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