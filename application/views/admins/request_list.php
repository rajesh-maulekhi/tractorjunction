<?php

if ($this->session->userdata('admin')) {
    ?>
    <title>Admin || On Road And Demo List </title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/resources/demos/style.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
	$( function() {
		var dateFormat = "mm/dd/yy",
			from = $( "#from" )
				.datepicker({
					defaultDate: "+1w",
					changeMonth: true,
					numberOfMonths: 1
				})
				.on( "change", function() {
					to.datepicker( "option", "minDate", getDate( this ) );
				}),
			to = $( "#to" ).datepicker({
				defaultDate: "+1w",
				changeMonth: true,
				numberOfMonths: 1
			})
			.on( "change", function() {
				from.datepicker( "option", "maxDate", getDate( this ) );
			});

		function getDate( element ) {
			var date;
			try {
				date = $.datepicker.parseDate( dateFormat, element.value );
			} catch( error ) {
				date = null;
			}

			return date;
		}
	} );
	</script>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"
         style="padding:0px;min-height:835px;background: #F7F7F7;">
        <!-- main section -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding:20px 14px;">
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding: 30px 15px;background: #fff;">
            <h3>On Road And Demo List </h3>
            <hr style="  border-top: 3px solid #C5C2C2;">
 

            <div id="page-wrapper">
                <div class="row">
                    <?php
                    $att = array('class' => 'form-horizontal form-label-left');
                    echo form_open_multipart('admins/User_list_export/GetExcelDemoOnnRoad', $att); ?>
                  
                    <div class="form-group">
                       
                        <div class="col-md-4 col-sm-6 col-xs-12"></div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						<input type="radio" name="request_list" value="7" checked> Last 7 Day<br><br>
						<input type="radio" name="request_list" value="15"> Last 15 Day<br><br>
						<input type="radio" name="request_list" value="date_range"> 
						<input type="text"  id="from" name="from_date" placeholder="From Date">
						<input type="text" id="to" name="to_date" placeholder="To Date">
						
						
                        </div>
                    </div>
                   

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                            <?php echo form_input(array('type' => 'submit', 'id' => 'form_up', 'class' => 'btn btn-default buttoupdate', 'value' => 'Get Excel File')); ?>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>


        </div>


    </div>


    <?php
} else {
    header("Location:login");
}
?>