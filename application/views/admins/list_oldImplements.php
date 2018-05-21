<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

if ($this->session->userdata('admin')) {
    ?>

    <title>Admin || Show Implements tractor </title>

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
        </div>


    </div>


    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 "
         style="padding:20px 14px;background: #fff; margin-top:20px;">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding:0px; padding-top:0px;">
            <div class="col-md-3">
                <h3>Implements tractors</h3>
            </div>
            <div class="col-md-9">
                <div class="col-md-9">

                    <?php echo form_open('admins/list-implement-tractors'); ?>
                    <?php echo form_input(array('type' => 'text', 'name' => 'name', 'id' => 'ImplementsOldTractorName', 'placeholder' => 'Enter Tractor Name', 'required' => 'required', 'class' => 'form-control')); ?>
                </div>
                <div class="col-md-3">

                    <?php echo form_input(array('type' => 'submit', 'value' => 'Search', 'name' => 'submitbt', 'class' => 'ap btn btn-default')); ?>
                    <?php echo form_close(); ?>
                    <a href="<?php echo $root; ?>admins/list-rent-tractors" class="ap btn btn-default">Reset</a>
                </div>
            </div>

            <hr style="  border-top: 3px solid #C5C2C2;">
            <?php
            $result = array();
            if (isset($_POST['submitbt'])) {
                $condition = '';
                $condition = "model_name like '" . $_POST['name'] . "'";
                $result = shweta_pagination_query_new_orderby('old_implement', '9', 'admins/list-implement-tractors', $condition, 'id', 'DESC');
            } else {
                $condition = '';
                $result = shweta_pagination_query_new_orderby('old_implement', '9', 'admins/list-implement-tractors', $condition, 'id', 'DESC');
            }
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
                <table id="keywords" class="table table-striped" style="cursor:pointer;" cellspacing="0"
                       cellpadding="0">
                    <thead>
                    <tr>

                        <th style="width:5%;">S.no.</th>

                        <th style="width:15%;">Model Name</th>
                        <th style="width:10%;">Implements For</th>
                        <th style="width:10%;">Implements Type</th>
                        <th style="width:12%;">Seller Name</th>
                        <th style="width:15%;">Seller Location</th>
                        <th style="width:10%;">Seller City</th>
                        <th style="width:10%;">date</th>
                        <th style="width:15%;">Action</th>

                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $i = 1;
                    foreach ($result['result'] as $key => $value) {
                        ?>
                        <tr>

                            <td><?php echo $i; ?></td>
                            <td>
                                <a href="<?php echo $root; ?>used-tractor-implement/<?php foreach (shweta_select('name', 'brand', 'id', $value->brand) as $raa) echo newslugend($raa->name); ?>-<?php echo newslugend($value->slug); ?>"
                                   target="_blank"><?php echo $value->model_name; ?></a></td>
                            <td><?php echo ucfirst($value->name); ?></td>
                            <td><?php echo ucfirst($value->implement_for); ?></td>
                            <td>                <?php
                                if ($value->type_implement == "harvester") {
                                    echo "Harvester";
                                } else {

                                    foreach (shweta_select('name', 'filed', 'id', $value->type_implement) as $raa1) echo ucfirst($raa1->name);
                                }
                                ?></td>
                            <td>
                                <?php foreach (shweta_select('name', 'states', 'id', $value->state) as $raa) echo ucfirst($raa->name);
                                ?></td>
                            <td>
                                <?php foreach (shweta_select('name', 'cities', 'id', $value->city) as $raa) echo ucfirst($raa->name);
                                ?></td>

                            <td><?php echo $value->date; ?></td>


                            <td>
                                <a title="View Info"
                                   href="<?php echo $root; ?>admins/view-single-implement-tractor/<?php echo $value->id; ?>">
                                    <button type="button" style="background:#1ABB9C;color:#eee;"
                                            class="ap btn btn-default"><i class="fa fa-eye"></i></button>
                                </a>
                                <!--
<?php
                                if ($value->status == 1) {
                                    ?>
<a href="<?php echo $root; ?>admins/ListRentTractor/inactive/<?php echo $value->id; ?>/0"><button type="button" style="background:#065E84;color:#eee;" class="ap btn btn-default"><i class="fa fa-edit"></i> Want to Hide</button></a>

		<?php
                                } else {
                                    ?>
<a href="<?php echo $root; ?>admins/ListRentTractor/inactive/<?php echo $value->id; ?>/0"><button type="button" style="background:#148F1A;color:#eee;" class="ap btn btn-default"><i class="fa fa-edit"></i> Want to Show</button></a>

	<?php
                                }

                                ?>
-->


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