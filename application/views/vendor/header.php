<!DOCTYPE html>
<html>
<head>
<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
// echo $this->session->userdata('vendor');
// die;
if ($this->session->userdata('vendor') == "") {
	header("Location: ".$root."vendor");
	die;
}
?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Vendor  | Tractor Junction </title>
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
		.QA{
		    color: white;
    float: right;
    padding-top: 12px;
    margin-left: 12px;
    margin-right: 20px;
		}
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
    <a href="<?php echo $root; ?>/vendor" class="logo">
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
	      
            <a href="<?php echo $root; ?>vendor/Login/Logout" class="QA">Logout</a>
			    <a href="<?php echo $root; ?>vendor/Home/Profile" class="QA">Profile</a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Notifications: style can be found in dropdown.less -->
         
          <!-- Tasks: style can be found in dropdown.less -->
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
    
           
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
          <img src="<?php echo $root; ?>images/fav.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo ucfirst($this->session->userdata('username'));?> Team</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
     
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">


          <li class="">
              <a href="<?php echo $root; ?>vendor/">
                  <i class="fa fa-dashboard"></i> <span>Dashboard</span>

              </a>

          </li>
          <li class="">
              <a href="<?php echo $root; ?>vendor/on-road-price">
                  <i class="fa fa-car"></i>
                  <span>On Road Price Request</span>
                  
              </a>
			  </li>
          <li class="">
              <a href="<?php echo $root; ?>vendor/Home/Ads_Data">
                  <i class="fa fa-car"></i>
                  <span>Ads Data</span>
                  
              </a>
			  </li>
        

	
	
	
	
	
	
	
	
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
    <div class="content-wrapper">
        <script src="<?php echo $root; ?>admin_web_root/bower_components/jquery/dist/jquery.min.js"></script>