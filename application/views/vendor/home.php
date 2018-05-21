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
              <span class="info-box-text"> Members</span>
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
                      $result=  shweta_order_by_limit('id,username,date_time','user_reg','date_time','DESC',20,0);
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
		    <div class="info-box bg-aqua" style="background-color: #227f96 !important;">
            <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">News</span>
              <span class="info-box-number"><?php
                  $cond='';
                  echo  GetCountResultDesboard('id',' news',$cond);
                  ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 0%"></div>
              </div>
              <span class="progress-description">
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
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