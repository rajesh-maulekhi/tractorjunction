<!DOCTYPE html>
<html>
<head>
<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
if ($this->session->userdata('admin') =="") {
	header("Location: ".$root."admin");
	die;
}
?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin  | Tractor Junction </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo $root; ?>admin_web_root/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $root; ?>admin_web_root/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo $root; ?>admin_web_root/bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo $root; ?>admin_web_root/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $root; ?>admin_web_root/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo $root; ?>admin_web_root/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

  <![endif]-->
    <style>
        .head_border{    background: #ddd;
            padding: 5px 10px;
            text-align: center;
            margin: 19px 0px;}
table{    border: 1px solid #ddd;}
        thead{    background: #3c8dbc;
            color: #fff;}
        td{border-right: 1px solid #ddd;}
        input[type=checkbox], input[type=radio] {
            -webkit-appearance: checkbox !important;}
        #search_box{}
    </style>
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php if ($this->session->userdata('dataupdate') != "") { ?>
    <div class="alert alert-success alert-dismissible" style="    position: absolute;
    z-index: 9999;
    right: 5px;
    top: 51px;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Alert!</h4>
        <?php echo $this->session->userdata('dataupdate'); ?>

    </div>

    <?php
    $this->session->unset_userdata('dataupdate');
} ?>
<?php if ($this->session->userdata('value_inserted') != "") { ?>
    <div class="alert alert-success alert-dismissible" style="    position: absolute;
    z-index: 9999;
    right: 5px;
    top: 51px;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Alert!</h4>
        <?php echo $this->session->userdata('value_inserted'); ?>

    </div>

    <?php
    $this->session->unset_userdata('value_inserted');
} ?>
<?php if ($this->session->userdata('p_add') != "") { ?>
    <div class="alert alert-success alert-dismissible" style="    position: absolute;
    z-index: 9999;
    right: 5px;
    top: 51px;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Alert!</h4>
        <?php echo $this->session->userdata('p_add'); ?>

    </div>

    <?php
    $this->session->unset_userdata('p_add');
} ?>
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="<?php echo $root; ?>/admin" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>T</b>J</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b></b>Tractor Junction</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">3</span>
            </a>
            <ul class="dropdown-menu">
              
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  
				  <li>
                    <a href="<?php echo $root; ?>admins/view_users">
                      <i class="fa fa-users text-aqua"></i> 
					  <?php 
					$current_date = date("Y-m-d");
					$cond='';
					$cond="date_time like'%".$current_date."%'";
					echo  GetCountResultDesboard('id','user_reg',$cond);
					  ?> new members joined today
                    </a>
                  </li>
                 
				  <li>
                    <a href="<?php echo $root; ?>admins/view_request_onroad">
                      <i class="fa fa-users text-aqua"></i> 
					  <?php 
					$current_date = date("Y-m-d");
					$cond='';
					$cond="date_ like'%".$current_date."%'";
					echo  GetCountResultDesboard('id','onroadprice',$cond);
					  ?> new on road request today
                    </a>
                  </li>
                 
				  <li>
                    <a href="<?php echo $root; ?>admins/view_request">
                      <i class="fa fa-users text-aqua"></i> 
					  <?php 
					$current_date = date("Y-m-d");
					$cond='';
					$cond="date like'%".$current_date."%'";
					echo  GetCountResultDesboard('id','demo_request',$cond);
					  ?> new demo request today
                    </a>
                  </li>
                 
                </ul>
              </li> 
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo $root; ?>admin_web_root/image/developer.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">TractorJunction Team</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo $root; ?>admin_web_root/image/developer.jpg" class="img-circle" alt="User Image">

                <p>
                  Nishant Goyal - Web Developer
                  <small>Member since Jan. 2016</small>
                </p>
              </li>
              <!-- Menu Body -->
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo $root; ?>admins/Password_change" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo $root; ?>admins/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $root; ?>admin_web_root/image/developer.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>TractorJunction Team</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
     
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">


          <li class="">
              <a href="<?php echo $root; ?>admins/">
                  <i class="fa fa-dashboard"></i> <span>Dashboard</span>

              </a>

          </li>
          <li class="treeview">
              <a href="#">
                  <i class="fa fa-car"></i>
                  <span>New Tracors</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="<?php echo $root; ?>admins/add_tractor"><i class="fa fa-circle-o"></i> Add Tractor</a></li>
                  <li><a href="<?php echo $root; ?>admins/view_tractor"><i class="fa fa-circle-o"></i> Show Tractor </a></li>
                  <li><a href="<?php echo $root; ?>admins/ImportTracor"><i class="fa fa-circle-o"></i> Import Tractor from Excel</a></li>

              </ul>
          </li>
          <li class="treeview">
              <a href="#">
                  <i class="fa fa-car"></i>
                  <span>Excel List</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="<?php echo $root; ?>admins/User_list_export/TrackIpAddress"><i class="fa fa-circle-o"></i>Mahindra List</a></li>
                  <li><a href="<?php echo $root; ?>admins/User_list_export"><i class="fa fa-circle-o"></i> Users List </a></li>
                  <li><a href="<?php echo $root; ?>admins/User_list_export/GetRequestList"><i class="fa fa-circle-o"></i> Request List </a></li>
                  <li><a href="<?php echo $root; ?>admins/User_list_export/GetRequestListHarvester"><i class="fa fa-circle-o"></i> Harvesters / Imp Request List </a></li>
                  <li><a href="<?php echo $root; ?>admins/User_list_export/dealearslist"><i class="fa fa-circle-o"></i> Dealers List </a></li>
             
              </ul>
          </li>
		  <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Extra Links</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="">
            <li><a href="<?php echo $root; ?>admins/view_request"><i class="fa fa-circle-o"></i>Demo Request</a></li>
            <li><a href="<?php echo $root; ?>admins/view_request_onroad"><i class="fa fa-circle-o"></i>On Road Price Request</a></li>
           

	<li><a href="<?php echo $root; ?>admins/harvester-on-road-request"><i class="fa fa-circle-o"></i>Harvester on road Request</a></li>
	<li><a href="<?php echo $root; ?>admins/harvester-demo-request"><i class="fa fa-circle-o"></i>Harvester Demo Request</a></li>
	<li><a href="<?php echo $root; ?>admins/implement-on-road-request"><i class="fa fa-circle-o"></i>Implement on road Request </a></li>
	<li><a href="<?php echo $root; ?>admins/implement-demo-request"><i class="fa fa-circle-o"></i>Implement Demo Request </a></li>
    



	<li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i>Frequently
                            used links
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" style="display: none;">
                            <li><a href="<?php echo $root; ?>admins/view_hp"><i class="fa fa-circle-o"></i> Show HP</a></li>
                            <li><a href="<?php echo $root; ?>admins/view_brand"><i class="fa fa-circle-o"></i> Show Brand</a></li>
                            <li><a href="<?php echo $root; ?>admins/view_users"><i class="fa fa-circle-o"></i> All Registered Users</a></li>
                            <li><a href="<?php echo $root; ?>admins/view_uses"><i class="fa fa-circle-o"></i>  Uses Of tractor</a></li>
                            <li><a href="<?php echo $root; ?>admins/view_slider"><i class="fa fa-circle-o"></i> Slider</a></li>
                            <li><a href="<?php echo $root; ?>admins/view_offer"><i class="fa fa-circle-o"></i> Offers</a></li>
                            <li><a href="<?php echo $root; ?>admins/hp_range"><i class="fa fa-circle-o"></i> Hp Range set</a></li>
                            <li><a href="<?php echo $root; ?>admins/price_range"><i class="fa fa-circle-o"></i> Price Range set</a></li>
		 
              </ul>
            </li>        <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i>Quick Links
                       
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" style="display: none;">
                             <li><a href="<?php echo $root; ?>admins/view_tractor"><i class="fa fa-circle-o"></i> Show Tractors</a></li>
                            <li><a href="<?php echo $root; ?>admins/show-harvester"><i class="fa fa-circle-o"></i> Show New Harvesters</a></li>
                            <li><a href="<?php echo $root; ?>admins/show-implement-list"><i class="fa fa-circle-o"></i> Show New Implements</a></li>
                            <li><a href="<?php echo $root; ?>admins/compare-front"><i class="fa fa-circle-o"></i> Compare tractor on front</a></li>

		 
              </ul>
            </li>
             
          </ul>
        </li>
		  <li class="treeview">
              <a href="#">
                  <i class="fa fa-chrome"></i>
                  <span>SEO meta tag</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
<li><a href='<?php echo $root; ?>admins/SEO_meta/updateTag/home'><i class="fa fa-circle-o"></i> <span>Home Page</span></a></li>
<li><a href='<?php echo $root; ?>admins/SEO_meta/updateTag/tractors'><i class="fa fa-circle-o"></i> <span>tractors Page</span></a></li>
<li><a href='<?php echo $root; ?>admins/SEO_meta/updateTag/popular_tractors'><i class="fa fa-circle-o"></i> <span>popular_tractors Page</span></a></li>
<li><a href='<?php echo $root; ?>admins/SEO_meta/updateTag/latest_tractors'><i class="fa fa-circle-o"></i> <span>latest_tractors Page</span></a></li>
<li><a href='<?php echo $root; ?>admins/SEO_meta/updateTag/upcoming_tractors'><i class="fa fa-circle-o"></i> <span>upcoming_tractors Page</span></a></li>
<li><a href='<?php echo $root; ?>admins/SEO_meta/updateTag/sell_used_tractor'><i class="fa fa-circle-o"></i> <span>sell_used_tractor Page</span></a></li>
<li><a href='<?php echo $root; ?>admins/SEO_meta/updateTag/used_tractors_for_sell'><i class="fa fa-circle-o"></i> <span>used_tractors_for_sell Page</span></a></li>
<li><a href='<?php echo $root; ?>admins/SEO_meta/updateTag/compare_tractors'><i class="fa fa-circle-o"></i> <span>compare_tractors Page</span></a></li>
<li><a href='<?php echo $root; ?>admins/SEO_meta/updateTag/tractor_combine_harvesters'><i class="fa fa-circle-o"></i> <span>tractor_combine_harvesters Page</span></a></li>
<li><a href='<?php echo $root; ?>admins/SEO_meta/updateTag/tractor_implements'><i class="fa fa-circle-o"></i> <span>tractor_implements Page</span></a></li>
<li><a href='<?php echo $root; ?>admins/SEO_meta/updateTag/rotary_tiller_rotavator'><i class="fa fa-circle-o"></i> <span>rotary_tiller_rotavator Page</span></a></li>
<li><a href='<?php echo $root; ?>admins/SEO_meta/updateTag/plough'><i class="fa fa-circle-o"></i> plough Page</a></li>
<li><a href='<?php echo $root; ?>admins/SEO_meta/updateTag/cultivator'><span><i class="fa fa-circle-o"></i> cultivator Page</span></a></li>
<li><a href='<?php echo $root; ?>admins/SEO_meta/updateTag/thresher'><span><i class="fa fa-circle-o"></i> thresher Page</span></a></li>
<li><a href='<?php echo $root; ?>admins/SEO_meta/updateTag/seed_cum_fertilizer_drill'><span><i class="fa fa-circle-o"></i> seed_cum_fertilizer_drill Page</span></a></li>
<li><a href='<?php echo $root; ?>admins/SEO_meta/updateTag/bund_maker'><span><i class="fa fa-circle-o"></i> bund_maker Page</span></a></li>
<li><a href='<?php echo $root; ?>admins/SEO_meta/updateTag/chopper'><span><i class="fa fa-circle-o"></i> chopper Page</span></a></li>
<li><a href='<?php echo $root; ?>admins/SEO_meta/updateTag/tractor_finance'><span><i class="fa fa-circle-o"></i> tractor_finance Page</span></a></li>
<li><a href='<?php echo $root; ?>admins/SEO_meta/updateTag/tractor_insurance'><span><i class="fa fa-circle-o"></i> tractor_insurance Page</span></a></li>
<li><a href='<?php echo $root; ?>admins/SEO_meta/updateTag/find_tractor_dealers'><span><i class="fa fa-circle-o"></i> find_tractor_dealers Page</span></a></li>
<li><a href='<?php echo $root; ?>admins/SEO_meta/updateTag/special_tractor_offers'><span><i class="fa fa-circle-o"></i> special_tractor_offers Page</span></a></li>
<li><a href='<?php echo $root; ?>admins/SEO_meta/updateTag/tractor_dealership_enquiry'><span><i class="fa fa-circle-o"></i> tractor_dealership_enquiry Page</span></a></li>
<li><a href='<?php echo $root; ?>admins/SEO_meta/updateTag/tractor_news'><span><i class="fa fa-circle-o"></i> tractor_news Page</span></a></li>
<li><a href='<?php echo $root; ?>admins/SEO_meta/updateTag/used_tractors_for_rent'><span><i class="fa fa-circle-o"></i> used_tractors_for_rent Page</span></a></li>
<li><a href='<?php echo $root; ?>admins/SEO_meta/updateTag/tractor_customer_care'><span><i class="fa fa-circle-o"></i> tractor_customer_care Page</span></a></li>
<li><a href='<?php echo $root; ?>admins/SEO_meta/updateTag/about_us'><span><i class="fa fa-circle-o"></i> about_us Page</span></a></li>
<li><a href='<?php echo $root; ?>admins/SEO_meta/updateTag/privacy_policy'><span><i class="fa fa-circle-o"></i> privacy_policy Page</span></a></li>
<li><a href='<?php echo $root; ?>admins/SEO_meta/updateTag/advertise_with_us'><span><i class="fa fa-circle-o"></i> advertise_with_us Page</span></a></li>
<li><a href='<?php echo $root; ?>admins/SEO_meta/updateTag/blog_page'><span><i class="fa fa-circle-o"></i> Blog Page</span></a></li>

              </ul>
          </li>
		  
		  <li class="treeview">
              <a href="#">
                  <i class="fa fa-rss"></i>
                  <span>Tractor Blog</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="<?php echo $root; ?>admins/Blog"><i class="fa fa-circle-o"></i> Add Blog</a></li>
                  <li><a href="<?php echo $root; ?>admins/Blog/ShowBlog"><i class="fa fa-circle-o"></i> Show Blog </a></li>

              </ul>
          </li>
		  
		  
		  
		            <li class="treeview">
              <a href="#">
                  <i class="fa fa-address-book"></i>
                  <span> Tracors Dealers</span>
                  <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                      <li><a href='add_dealers'><span><i class="fa fa-circle-o"></i> Add Dealers</span></a></li>
                                    <li class=''><a href='view_dealers'><span><i class="fa fa-circle-o"></i> Show Dealers</span></a></li>
                                    <li class=''><a href='Find_id'><span><i class="fa fa-circle-o"></i> Find Id</span></a></li>
                                    <li class=''><a href='<?php echo $root; ?>admins/ImportDealers'><span><i class="fa fa-circle-o"></i> Import Dealers by Excel</span></a>
                                    </li>
                                    <li class=''><a
                                                href='<?php echo $root; ?>admins/User_list_export/TrackIpAddress'><span><i class="fa fa-circle-o"></i> Export Excel Of IP</span></a>
                                    </li>
              </ul>
          </li>
		  
		   
		  
	<li class="treeview">
	<a href="#">
	<i class="fa fa-cogs"></i>
	<span> Service Center</span>
	<span class="pull-right-container">
	<i class="fa fa-angle-left pull-right"></i>
	</span>
	</a>
	<ul class="treeview-menu">
	<li>
	<a href='<?php echo $root; ?>admins/add-service-center'><span><i class="fa fa-circle-o"></i> Add Service Center</span></a>
	</li>
	<li><a href='<?php echo $root; ?>admins/show-service-center'><span><i class="fa fa-circle-o"></i> Show service Center</span></a>
	</li>
	</ul>
	</li>
		  
	<li class="treeview">
	<a href="#">
	<i class="fa fa-question-circle"></i>
	<span> Customer Care</span>
	<span class="pull-right-container">
	<i class="fa fa-angle-left pull-right"></i>
	</span>
	</a>
	<ul class="treeview-menu">
	<li>
	<a href='<?php echo $root; ?>admins/add-customer-care'><span><i class="fa fa-circle-o"></i> Add Customer Care</span></a>
	</li>
	<li>
	<a href='<?php echo $root; ?>admins/show-customer-care'><span><i class="fa fa-circle-o"></i> show Customer Care</span></a>
	</li>
	</ul>
	</li>
	  
	<li class="treeview">
	<a href="#">
	<i class="fa fa-share"></i>
	<span> Newsletter  </span>
	<span class="pull-right-container">
	<i class="fa fa-angle-left pull-right"></i>
	</span>
	</a>
	<ul class="treeview-menu">
         <li><a href='<?php echo $root; ?>admins/newsletter'><span><i class="fa fa-circle-o"></i> Newsletter </span></a>
                                    </li>
                                    <li><a href='<?php echo $root; ?>admins/show-newsletter-users'><span><i class="fa fa-circle-o"></i> Show Newsletter user's list</span></a>
                                    </li>
	</ul>
	</li>
	<li class="treeview">
	<a href="#">
	<i class="fa fa-question"></i>
	<span> Ask A Question  </span>
	<span class="pull-right-container">
	<i class="fa fa-angle-left pull-right"></i>
	</span>
	</a>
	<ul class="treeview-menu">
           <li><a href='<?php echo $root; ?>admins/Questions'><span><i class="fa fa-circle-o"></i> Add new Question</span></a>
                                    <li><a href='<?php echo $root; ?>admins/Questions/ShowAAllQuestion'><span><i class="fa fa-circle-o"></i> Show new Question</span></a>
                                    </li>
	</ul>
	</li>
	
	<li class="treeview">
	<a href="#">
	<i class="fa fa-newspaper-o"></i>
	<span> News & Update  </span>
	<span class="pull-right-container">
	<i class="fa fa-angle-left pull-right"></i>
	</span>
	</a>
	<ul class="treeview-menu">
        <li><a href='<?php echo $root; ?>admins/news-update'><span><i class="fa fa-circle-o"></i> &nbsp; News & Update</span></a>
                                    </li>
                                    <li><a href='<?php echo $root; ?>admins/show-news-update'><span><i class="fa fa-circle-o"></i> &nbsp;Show All News</span></a>
                                    </li>
	</ul>
	</li>
	
	<li class="treeview">
<a href="#">
<i class="fa fa-car"></i>
<span> Old / Rent tractors </span>
<span class="pull-right-container">
<i class="fa fa-angle-left pull-right"></i>
</span>
</a>

							<ul class="treeview-menu">
                                    <li>
                                        <a href='<?php echo $root; ?>admins/list-old-tractors'><span><i class="fa fa-circle-o"></i> &nbsp;List Old tractors</span></a>
                                    </li>
                                    <li>
                                        <a href='<?php echo $root; ?>admins/list-rent-tractors'><span><i class="fa fa-circle-o"></i> &nbsp;List Rent tractors</span></a>
                                    </li>
                                    <li><a href='<?php echo $root; ?>admins/list-implement-tractors'><span><i class="fa fa-circle-o"></i> &nbsp;List Implement tractors</span></a>
                                    </li>


                                </ul>
                            </li>
                     
<li class="treeview">
<a href="#">
<i class="fa fa-info"></i>
<span>Buy / Rent details  </span>
<span class="pull-right-container">
<i class="fa fa-angle-left pull-right"></i>
</span>
</a>

						  <ul class="treeview-menu">
                                    <li><a href='<?php echo $root; ?>admins/buy-old-tractors-details'><span><i class="fa fa-circle-o"></i> &nbsp;Buy Old tractors details</span></a>
                                    </li>
                                    <li><a href='<?php echo $root; ?>admins/buy-rent-tractors-details'><span><i class="fa fa-circle-o"></i> &nbsp;Buy Rent tractors details</span></a>
                                    </li>
                                    <li><a href='<?php echo $root; ?>admins/buy-implements-tractors-details'><span><i class="fa fa-circle-o"></i> &nbsp;Implement tractors details</span></a>
                                    </li>


                                </ul>
                            </li>
                    
<li class="treeview">
<a href="#">
<i class="fa fa-envelope"></i>
<span> Dealership enquiry  </span>
<span class="pull-right-container">
<i class="fa fa-angle-left pull-right"></i>
</span>
</a>

						   <ul class="treeview-menu">
                                    <li><a href='<?php echo $root; ?>admins/list-Dealership-enquiry'><span><i class="fa fa-circle-o"></i> &nbsp;Request Dealership enquiry</span></a>
                                    </li>


                                </ul>
                            </li>
							
                     
	<li class="treeview">
<a href="#">
<i class="fa fa-bug"></i>
<span> Finance / insurance </span>
<span class="pull-right-container">
<i class="fa fa-angle-left pull-right"></i>
</span>
</a>

							   <ul class="treeview-menu">
                                    <li>
                                        <a href='<?php echo $root; ?>admins/insurance-tractor'><span><i class="fa fa-circle-o"></i> &nbsp;Insurance</span></a>
                                    </li>
                                    <li><a href='<?php echo $root; ?>admins/finance-tractor'><span><i class="fa fa-circle-o"></i> &nbsp;Finance</span></a>
                                    </li>


                                </ul>
                            </li>
                         
	<li class="treeview">
<a href="#">
<i class="fa fa-picture-o"></i>
<span>Finance / insurance Scheme </span>
<span class="pull-right-container">
<i class="fa fa-angle-left pull-right"></i>
</span>
</a>

								<ul class="treeview-menu">

                                    <li><a href='<?php echo $root; ?>admins/add-insurance-tractor-scheme'><span><i class="fa fa-circle-o"></i> &nbsp;Add Insurance Scheme</span></a>
                                    </li>

                                    <li><a href='<?php echo $root; ?>admins/add-finance-tractor-scheme'><span><i class="fa fa-circle-o"></i> &nbsp;Add Finance Scheme</span></a>
                                    </li>
                                    <li>
                                        <a href='<?php echo $root; ?>admins/list-tractor-scheme'><span><i class="fa fa-circle-o"></i> &nbsp;List Scheme's</span></a>
                                    </li>


                                </ul>
                            </li>
                            
<li class="treeview">
<a href="#">
<i class="fa fa-at"></i>
<span> Implements fields </span>
<span class="pull-right-container">
<i class="fa fa-angle-left pull-right"></i>
</span>
</a>

						<ul class="treeview-menu">

                                    <li>
                                        <a href='<?php echo $root; ?>admins/add-field-title'><span><i class="fa fa-circle-o"></i> &nbsp;Add Fields title</span></a>
                                    </li>
                                    <li>
                                        <a href='<?php echo $root; ?>admins/show-field-title'><span><i class="fa fa-circle-o"></i> &nbsp;Show Fields title</span></a>
                                    </li>
                                    <li><a href='<?php echo $root; ?>admins/add-fields'><span><i class="fa fa-circle-o"></i> &nbsp;Add Fields</span></a></li>
                                    <li><a href='<?php echo $root; ?>admins/show-fields'><span><i class="fa fa-circle-o"></i> &nbsp;Show Fields</span></a>
                                    </li>


                                </ul>
                            </li>
                            
<li class="treeview">
<a href="#">
<i class="fa fa-bolt"></i>
<span> Harvester  </span>
<span class="pull-right-container">
<i class="fa fa-angle-left pull-right"></i>
</span>
</a>

                            	<ul class="treeview-menu">
                                    <li>
                                        <a href='<?php echo $root; ?>admins/add-harvester'><span><i class="fa fa-circle-o"></i> &nbsp;Add New Harvester</span></a>
                                    </li>
                                    <li>
                                        <a href='<?php echo $root; ?>admins/show-harvester'><span><i class="fa fa-circle-o"></i> &nbsp;Show New Harvester</span></a>
                                    </li>
                                    <li class='last'><a href='<?php echo $root; ?>admins/ImportHarvester'><span><i class="fa fa-circle-o"></i> &nbsp;Import Harvester by Excel</span></a>
                                    </li>

                                </ul>
                            </li>


                         
<li class="treeview">
<a href="#">
<i class="fa fa-cc"></i>
<span> Implements </span>
<span class="pull-right-container">
<i class="fa fa-angle-left pull-right"></i>
</span>
</a>

                             	<ul class="treeview-menu">

                                    <li>
                                        <a href='<?php echo $root; ?>admins/add-implement'><span><i class="fa fa-circle-o"></i> &nbsp;Add New Implement</span></a>
                                    </li>
                                    <li><a href='<?php echo $root; ?>admins/show-implement-list'><span><i class="fa fa-circle-o"></i> &nbsp;Show New Implement</span></a>
                                    </li>
                                    <li class='last'><a href='<?php echo $root; ?>admins/ImportImplement'><span><i class="fa fa-circle-o"></i> &nbsp;Import Implement by Excel</span></a>
                                    </li>


                                </ul>
                            </li>
              
<li class="treeview">
<a href="#">
<i class="fa fa-user"></i>
<span>Semi Admin </span>
<span class="pull-right-container">
<i class="fa fa-angle-left pull-right"></i>
</span>
</a>
                        	<ul class="treeview-menu">

                                    <li><a href='<?php echo $root; ?>admins/add-semi-admin'><span><i class="fa fa-circle-o"></i> &nbsp;Add Admin</span></a>
                                    </li>
                                    <li><a href='<?php echo $root; ?>admins/show-semi-admin'><span><i class="fa fa-circle-o"></i> &nbsp;Show Admin</span></a>
                                    </li>


                                </ul>
                            </li>

	
	
	
	
	
	
	
	
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
    <div class="content-wrapper">
        <script src="<?php echo $root; ?>admin_web_root/bower_components/jquery/dist/jquery.min.js"></script>