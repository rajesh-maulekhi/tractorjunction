<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
?>

</div>
  <footer class="main-footer">
 
    <strong>Copyright &copy; 2016 <a href="#">Nishant Goyal</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo $root; ?>admin_web_root/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo $root; ?>admin_web_root/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $root; ?>admin_web_root/dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo $root; ?>admin_web_root/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="<?php echo $root; ?>admin_web_root/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo $root; ?>admin_web_root/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="<?php echo $root; ?>admin_web_root/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo $root; ?>admin_web_root/bower_components/Chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo $root; ?>admin_web_root/dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $root; ?>admin_web_root/dist/js/demo.js"></script>
<script src="<?php echo $root; ?>web_root/admin_web_root/autocomplete-jquery-ui.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('#keywords').tablesorter();
    });
</script>

<script>
    $(function () {
        $("#accordion").accordion();
    });

    $(function () {
        $("#accordion").accordion({collapsible: true, active: false});
        $('.open').click(function () {
            $('.ui-accordion-header').removeClass('ui-corner-all').addClass('ui-accordion-header-active ui-state-active ui-corner-top').attr({
                'aria-selected': 'true',
                'tabindex': '0'
            });
            $('.ui-accordion-header .ui-icon').removeClass('ui-icon-triangle-1-e').addClass('ui-icon-triangle-1-s');
            $('.ui-accordion-content').addClass('ui-accordion-content-active').attr({
                'aria-expanded': 'true',
                'aria-hidden': 'false'
            }).show();
            $(this).hide();
            $('.close').show();
        });
        $('.close').click(function () {
            $('.ui-accordion-header').removeClass('ui-accordion-header-active ui-state-active ui-corner-top').addClass('ui-corner-all').attr({
                'aria-selected': 'false',
                'tabindex': '-1'
            });
            $('.ui-accordion-header .ui-icon').removeClass('ui-icon-triangle-1-s').addClass('ui-icon-triangle-1-e');
            $('.ui-accordion-content').removeClass('ui-accordion-content-active').attr({
                'aria-expanded': 'false',
                'aria-hidden': 'true'
            }).hide();
            $(this).hide();
            $('.open').show();
        });
        $('.ui-accordion-header').click(function () {
            $('.open').show();
            $('.close').show();
        });
    });
    // var timePeriodInMs = 2000;
    // setTimeout(function()
    // {
    // document.getElementById("message-box").style.display = "none";
    // },
    // timePeriodInMs);
    function cancelclickmessagebox() {

        document.getElementById("message-box").style.display = "none";
    }

</script>
<script>


    // var root5 = location.protocol + '//' + location.host+'/tractor';
    var root5 = location.protocol + '//' + location.host;

    $(document).ready(function () {
        $("#OldTractorName").autocomplete({
            source: root5 + '/admins/ListOldTractor/SrachAjax',
            minLength: 1
        });
    });
    $(document).ready(function () {
        $("#RentTractorName").autocomplete({
            source: root5 + '/admins/ListRentTractor/SrachAjax',
            minLength: 1
        });
    });
    $(document).ready(function () {
        $("#HarvesterName").autocomplete({
            source: root5 + '/admins/ImplementTractor/SrachAjax',
            minLength: 1
        });
    });

    $(document).ready(function () {
        $("#ImplementNameDiv").autocomplete({
            source: root5 + '/admins/ImplementTractor/SrachAjaxImplement',
            minLength: 1
        });
    });

    $(document).ready(function () {
        $("#ImplementsOldTractorName").autocomplete({
            source: root5 + '/admins/ImplementTractor/SrachAjax2',
            minLength: 1
        });
    });
    function dialogeBox() {
        var result = confirm("Want to Continue?");
        if (result) {
            return true;
        }
        else {
            return false;
        }
    }
    function state_get() {
        var cout = document.getElementById("country_id_val").value;
        $.ajax({
            type: "POST",
            url: root5 + "/admins/Country_ajax",
            data: {eml: cout},
            success: function (data) {
                $("#cur_city_id").html(data);
            },
        });
    }

    function getFieldsName(value) {
        if (value != "") {
            $.ajax({
                type: "POST",
                url: root5 + "/admins/ImplementTractor/getFields",
                data: {eml: value},
                success: function (data) {
                    $("#result").html(data);
                    // alert(data);
                },
            });
        }
    }
    function model_name_getDemo() {

        var value_brand = document.getElementById("brand_id1").value;


        $.ajax({
            type: "POST",
            url: root5 + '/Comapre_ajax',
            data: {id_brand: value_brand},
            success: function (data) {
// alert(data);
                $("#model_name_id").html(data);

            },
            error: function () {
                alert("error occur");
            }
        });

    }
    function model_name_getDemo1() {

        var value_brand = document.getElementById("brand_id11").value;


        $.ajax({
            type: "POST",
            url: root5 + '/Comapre_ajax',
            data: {id_brand: value_brand},
            success: function (data) {
// alert(data);
                $("#model_name_id1").html(data);

            },
            error: function () {
                alert("error occur");
            }
        });

    }

</script>
<script type="text/javascript">


    function validationAddTractor() {
        var a = document.getElementById('status').value;
        if (a == "") {
            document.getElementById('user_error').style.display = "block";
            var temp = false;
        }
        if (a != "") {
            document.getElementById('user_error').style.display = "none";
            var temp = false;
        }
        if (a != "") {
            var temp = true;
        }
        if (temp == true) {
            document.getElementById('form').submit;
        }
        return temp;
    }


</script>


<script>

    function AddAccessoriesFunction() {
        var j = 2;
        var jj = 2;
        var you1 = [];
        $("#Accessoriesitems").append('<div><label class="control-label col-md-4 col-sm-4 col-xs-12"></label><div  style="margin-top:10px;"0 class="col-md-6 col-sm-6 col-xs-12"><input id="p_' + jj + '"  placeholder="Accessories"   class="form-control col-md-7 col-xs-12" name="accessories_name[]"></div><button class="delete remove-text-field" id="p_' + jj + '" style="float:left">Delete</button></div>');
        $("body").on("click", ".delete", function (e) {
            $(this).parent("div").remove();
        });
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
        });
    }

    function AddOptionsFunction() {
        var j = 2;
        var jj = 2;
        var you1 = [];
        $("#Optionsitems").append('<div><label class="control-label col-md-4 col-sm-4 col-xs-12"></label><div  style="margin-top:10px;"0 class="col-md-6 col-sm-6 col-xs-12"><input id="p_' + jj + '"  placeholder="Options"   class="form-control col-md-7 col-xs-12" name="options_name[]"></div><button class="delete remove-text-field" id="p_' + jj + '" style="float:left">Delete</button></div>');
        $("body").on("click", ".delete", function (e) {
            $(this).parent("div").remove();
        });
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
        });
    }

    function AddAdditionalFunction() {
        var j = 2;
        var jj = 2;
        var you1 = [];
        $("#AdditionalFeaturesitems").append('<div><label class="control-label col-md-4 col-sm-4 col-xs-12"></label><div  style="margin-top:10px;"0 class="col-md-6 col-sm-6 col-xs-12"><input id="p_' + jj + '"  placeholder="Additional Features"   class="form-control col-md-7 col-xs-12" name="addi_name[]"></div><button class="delete remove-text-field" id="p_' + jj + '" style="float:left">Delete</button></div>');
        $("body").on("click", ".delete", function (e) {
            $(this).parent("div").remove();
        });
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
        });
    }

    function AddCustomerCareNOFunction() {
        var j = 2;
        var jj = 2;
        var you1 = [];
        $("#AddCustomerCareNOFunctionitems").append('<div><label class="control-label col-md-4 col-sm-4 col-xs-12"></label><div  style="margin-top:10px;"0 class="col-md-6 col-sm-6 col-xs-12"><input id="p_' + jj + '"  placeholder="Customer Care Contact No"   class="form-control col-md-7 col-xs-12" name="contactNo[]"></div><button class="delete remove-text-field" id="p_' + jj + '" style="float:left">Delete</button></div>');
        $("body").on("click", ".delete", function (e) {
            $(this).parent("div").remove();
        });
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
        });
    }

    function AddImplementAddFunction() {
        var j = 2;
        var jj = 2;
        var you1 = [];
        $("#AddImplementAddFunctionItems").append('<div><label class="control-label col-md-4 col-sm-4 col-xs-12"></label><div  style="margin-top:10px;"0 class="col-md-6 col-sm-6 col-xs-12"><input id="p_' + jj + '"  placeholder="Implement field name"   class="form-control col-md-7 col-xs-12" name="contactNo[]"></div><button class="delete remove-text-field" id="p_' + jj + '" style="float:left">Delete</button></div>');
        $("body").on("click", ".delete", function (e) {
            $(this).parent("div").remove();
        });
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
        });
    }


    function DeleteCustomerCareNOFunction() {
        var j = 2;
        var jj = 2;
        var you1 = [];
        $("body").on("click", ".delete", function (e) {
            $(this).parent("div").remove();
        });

    }
    function find_id_btm() {

        var state_val = document.getElementById("country_id_val").value;
        var city_val = document.getElementById("cur_city_id").value;
        var brand_val = document.getElementById("brand_id").value;
        // alert(state_val);
        // alert(city_val);
        // alert(brand_val);
        $("#state_result").html(state_val);
        $("#city_result").html(city_val);
        $("#brand_result").html(brand_val);
    }

</script>
</body>
</html>
