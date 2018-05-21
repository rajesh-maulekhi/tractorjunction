<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
 
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Tractor Junction</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
<div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Demo Request</span>
              <span class="info-box-number"> <?php 
			 
					$cond=''; 
					echo  GetCountResultDesboard('id','demo_request',$cond);
					  ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
		<div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">On Road Request</span>
              <span class="info-box-number"> <?php 
				 
					$cond=''; 
					echo  GetCountResultDesboard('id','onroadprice',$cond);
					  ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
 
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>
       <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-rss"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Blogs</span>
              <span class="info-box-number"><?php 
				 
					$cond=''; 
					echo  GetCountResultDesboard('id','blog',$cond);
					  ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">New Members</span>
              <span class="info-box-number"> <?php 
					 
					$cond=''; 
					echo  GetCountResultDesboard('id','user_reg',$cond);
					  ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">last 7 days Request Report</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
             
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
			<?php 
			$current_date = date("d M,Y");
			$last_month = date("d M,Y", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "-1 month" ) );
			?>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
				 
                  <p class="text-center">
                    <strong>On Road Requests : <?php echo $last_month; ?> - <?php echo $current_date; ?></strong>
                  </p>

                 <script src="<?php echo $root; ?>admin_web_root/bower_components/chart.js/Chart.js"></script>
    <style>
    #canvas-holder1 {
        width: 300px;
        margin: 20px auto;
    }
    #canvas-holder2 {
        width: 50%;
        margin: 20px 25%;
    }
    #chartjs-tooltip {
        opacity: 1;
        position: absolute;
        background: rgba(0, 0, 0, .7);
        color: white;
        padding: 3px;
        border-radius: 3px;
        -webkit-transition: all .1s ease;
        transition: all .1s ease;
        pointer-events: none;
        -webkit-transform: translate(-50%, 0);
        transform: translate(-50%, 0);
    }
   	.chartjs-tooltip-key{
   		display:inline-block;
   		width:10px;
   		height:10px;
   	}
    </style>
</head>

<body>
<p style=" float: right;   margin-right: 18px;"><span style="width: 50px;
    height: 50px;
    background: gainsboro;
    padding: 1px 10px;
    margin-right: 10px;"></span> On Road Price</p>
<p style="    float: right;
    margin-right: 32px;"><span style="width: 50px;
    height: 50px;
    background: #97bbcd;
    padding: 1px 10px;
    margin-right: 10px;"></span> Demo Request</p>
    <div id="canvas-holder1">
        <canvas id="chart1" width="300" height="0" />
    </div>
    <div id="canvas-holder2">
        <canvas id="chart2" width="1349" height="600" />
    </div>

 
	<?php 
			$current_date = date("Y-m-d"); 
			$current_month = date("d-M");
			$last_month1 =  date('d-M', strtotime('-1 days', strtotime($current_date)));
			$last_month2 =  date('d-M', strtotime('-2 days', strtotime($current_date)));
			$last_month3 =  date('d-M', strtotime('-3 days', strtotime($current_date)));
			$last_month4 =  date('d-M', strtotime('-4 days', strtotime($current_date)));
			$last_month5 =  date('d-M', strtotime('-5 days', strtotime($current_date)));
			$last_month6 =  date('d-M', strtotime('-6 days', strtotime($current_date)));
$current_date = date("Y-m-d");
$cond='';$cond="date like'%".$current_date."%'";
$result_current_demo = GetCountResultDesboard('id','demo_request',$cond);
$cond='';$cond="date_ like'%".$current_date."%'";
$result_current_onroad = GetCountResultDesboard('id','onroadprice',$cond);

$last_month1 = date('Y-m-d', strtotime('-1 days', strtotime($current_date)));
$cond='';$cond="date like'%".$last_month1."%'";
$result_last1_demo = GetCountResultDesboard('id','demo_request',$cond);
$cond='';$cond="date_ like'%".$last_month1."%'";
$result_last1_onroad = GetCountResultDesboard('id','onroadprice',$cond);

$last_month2 =  date('Y-m-d', strtotime('-2 days', strtotime($current_date)));
$cond='';$cond="date like'%".$last_month2."%'";
$result_last2_demo = GetCountResultDesboard('id','demo_request',$cond);
$cond='';$cond="date_ like'%".$last_month2."%'";
$result_last2_onroad = GetCountResultDesboard('id','onroadprice',$cond);

$last_month3 = date('Y-m-d', strtotime('-3 days', strtotime($current_date)));
$cond='';$cond="date like'%".$last_month3."%'";
$result_last3_demo  =GetCountResultDesboard('id','demo_request',$cond);
$cond='';$cond="date_ like'%".$last_month3."%'";
$result_last3_onroad = GetCountResultDesboard('id','onroadprice',$cond);

$last_month4 =  date('Y-m-d', strtotime('-4 days', strtotime($current_date)));
$cond='';$cond="date like'%".$last_month4."%'";
$result_last4_demo = GetCountResultDesboard('id','demo_request',$cond);
$cond='';$cond="date_ like'%".$last_month4."%'";
$result_last4_onroad = GetCountResultDesboard('id','onroadprice',$cond);

$last_month5 =  date('Y-m-d', strtotime('-5 days', strtotime($current_date)));
$cond='';$cond="date like'%".$last_month5."%'";
$result_last5_demo = GetCountResultDesboard('id','demo_request',$cond);
$cond='';$cond="date_ like'%".$last_month5."%'";
$result_last5_onroad = GetCountResultDesboard('id','onroadprice',$cond);

$last_month6 =  date('Y-m-d', strtotime('-6 days', strtotime($current_date)));
$cond='';$cond="date like'%".$last_month6."%'";
$result_last6_demo  =GetCountResultDesboard('id','demo_request',$cond);
$cond='';$cond="date_ like'%".$last_month6."%'";
$result_last6_onroad = GetCountResultDesboard('id','onroadprice',$cond);

			?>

    <script>
var last_month6='<?php echo $last_month6; ?>';
var last_month5='<?php echo $last_month5; ?>';
var last_month4='<?php echo $last_month4; ?>';
var last_month3='<?php echo $last_month3; ?>';
var last_month2='<?php echo $last_month2; ?>';
var last_month1='<?php echo $last_month1; ?>';
var current_month='<?php echo $current_month; ?>';

var result_current_demo='<?php echo $result_current_demo; ?>';
var result_last1_demo='<?php echo $result_last1_demo; ?>';
var result_last2_demo='<?php echo $result_last2_demo; ?>';
var result_last3_demo='<?php echo $result_last3_demo; ?>';
var result_last4_demo='<?php echo $result_last4_demo; ?>';
var result_last5_demo='<?php echo $result_last5_demo; ?>';
var result_last6_demo='<?php echo $result_last6_demo; ?>';
 
var result_current_onroad='<?php echo $result_current_onroad; ?>';
var result_last1_onroad='<?php echo $result_last1_onroad; ?>';
var result_last2_onroad='<?php echo $result_last2_onroad; ?>';
var result_last3_onroad='<?php echo $result_last3_onroad; ?>';
var result_last4_onroad='<?php echo $result_last4_onroad; ?>';
var result_last5_onroad='<?php echo $result_last5_onroad; ?>';
var result_last6_onroad='<?php echo $result_last6_onroad; ?>';

    Chart.defaults.global.pointHitDetectionRadius = 1;
    Chart.defaults.global.customTooltips = function(tooltip) {

        var tooltipEl = $('#chartjs-tooltip');

        if (!tooltip) {
            tooltipEl.css({
                opacity: 0
            });
            return;
        }

        tooltipEl.removeClass('above below');
        tooltipEl.addClass(tooltip.yAlign);

        var innerHtml = '';
        for (var i = tooltip.labels.length - 1; i >= 0; i--) {
        	innerHtml += [
        		'<div class="chartjs-tooltip-section">',
        		'	<span class="chartjs-tooltip-key" style="background-color:' + tooltip.legendColors[i].fill + '"></span>',
        		'	<span class="chartjs-tooltip-value">' + tooltip.labels[i] + '</span>',
        		'</div>'
        	].join('');
        }
        tooltipEl.html(innerHtml);

        tooltipEl.css({
            opacity: 1,
            left: tooltip.chart.canvas.offsetLeft + tooltip.x + 'px',
            top: tooltip.chart.canvas.offsetTop + tooltip.y + 'px',
            fontFamily: tooltip.fontFamily,
            fontSize: tooltip.fontSize,
            fontStyle: tooltip.fontStyle,
        });
    };
    var randomScalingFactor = function() {
        return Math.round(Math.random() * 100);
    };
    var lineChartData = {
        labels: [last_month6, last_month5,last_month4, last_month3, last_month2, last_month1, current_month],
        datasets: [{
            label: "My First dataset",
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [result_last6_onroad, result_last5_onroad,  result_last4_onroad,  result_last3_onroad,  result_last2_onroad,   result_last1_onroad,   result_current_onroad ]
        }, {
            label: "My Second dataset",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
             data: [result_last6_demo, result_last5_demo,  result_last4_demo,  result_last3_demo,  result_last2_demo,   result_last1_demo,   result_current_demo ]
        }]
    };

    window.onload = function() {
        var ctx1 = document.getElementById("chart1").getContext("2d");
        window.myLine = new Chart(ctx1).Line(lineChartData, {
        	showScale: false,
        	pointDot : true,
            responsive: true
        });

        var ctx2 = document.getElementById("chart2").getContext("2d");
        window.myLine = new Chart(ctx2).Line(lineChartData, {
            responsive: true
        });
    };
    </script>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
           
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">

          <!-- /.box -->
          <div class="row">

            <div class="col-md-12">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest Members</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                      <?php
                      $cond='';
                      $cond="order by date_time DESC";
                      $result=  shweta_order_by_limit('id,username,date_time','user_reg','date_time','DESC',8,0);
                      foreach($result as $key=>$value){
                         $joiin_date= date('d M, Y',strtotime($value->date_time));
                      ?>
                    <li>
                      <img src="<?php echo $root; ?>images/no-profile-img.gif" alt="User Image" style="    height: 49px;">
                      <a class="users-list-name" href="#"><?php echo ucfirst($value->username); ?></a>
                      <span class="users-list-date"><?php echo $joiin_date; ?></span>
                    </li>
                          <?php } ?>
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="<?php echo $root; ?>admins/view_users" class="uppercase">View All Users</a>
                </div>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- TABLE: LATEST ORDERS -->

          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">New Tractors</span>
              <span class="info-box-number">  <?php
                  $cond='';
                  echo  GetCountResultDesboard('id',' tech_specification',$cond);
                  ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 0%"></div>
              </div>
              <span class="progress-description">

                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Dealers</span>
              <span class="info-box-number"><?php
                  $cond='';
                  echo  GetCountResultDesboard('id',' dealers',$cond);
                  ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 0%"></div>
              </div>
              <span class="progress-description">
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Old Tractors</span>
              <span class="info-box-number"><?php
                  $cond='';
                  echo  GetCountResultDesboard('id',' old_tractor',$cond);
                  ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 0%"></div>
              </div>
              <span class="progress-description">

                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">New Implements</span>
              <span class="info-box-number"><?php
                  $cond='';
                  echo  GetCountResultDesboard('id',' new_implement',$cond);
                  ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 0%"></div>
              </div>
              <span class="progress-description">
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->

          <!-- /.box -->

          <!-- PRODUCT LIST -->
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php 
 
?>