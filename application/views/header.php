<!DOCTYPE html>
<html lang="en">
<head>
    <?php
	 
	// $this->session->unset_userdata('user_id_login');
    $root = "http://" . $_SERVER['HTTP_HOST'];
    $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
    $REQUEST_URI = $_SERVER['REQUEST_URI'];
    ?>
    <!--Meta-->
    <title><?php if (isset($meta_title)) echo $meta_title; ?></title>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="description" content="<?php if (isset($meta_description)) echo $meta_description; ?>"/>
    <meta name=keywords content="<?php if (isset($meta_keywords)) echo $meta_keywords; ?>"/>
    <meta name="classification" content="<?php if (isset($meta_keywords)) echo $meta_keywords; ?>"/>
    <meta property="og:title" content="<?php if (isset($meta_title)) echo $meta_title; ?>"/>
    <meta property="og:description" content="<?php if (isset($meta_description)) echo $meta_description; ?>"/>
    <meta name="twitter:description" content="<?php if (isset($meta_description)) echo $meta_description; ?>"/>
    <meta name="twitter:title" content="<?php if (isset($meta_title)) echo $meta_title; ?>"/>
    <link rel="shortcut icon" href="<?php echo $root; ?>images/fav.png"/>
    <meta name="web-author" content="Tractor Junction"/>
    <meta name="googlebot" content="all">
    <meta name="robots" content="index, follow"/>
    <meta name="revisit-after" content="3 days">
    <meta name="copyright" content="Tractor Junction">
    <meta name="language" content="English">
    <meta name="reply-to" content="contact@tractorjunction.com">
    <meta name="distribution" content="Global"/>
    <meta name="rating" content="General"/>
    <meta name="google-site-verification" content="BfVUKkyPGEt4xrv4HzPeOMkHh42ZHiq80aeN15sPUDU"/>
    <meta name="google-site-verification" content="BfVUKkyPGEt4xrv4HzPeOMkHh42ZHiq80aeN15sPUDU"/>
    <link rel="canonical" href="<?php echo "http://www.tractorjunction.com" . $REQUEST_URI; ?>"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="<?php echo "http://www.tractorjunction.com" . $REQUEST_URI; ?>"/>
    <meta property="og:site_name" content="Tractor Junction "/>
    <meta property="og:image" content=""/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:url" content="<?php echo "http://www.tractorjunction.com" . $REQUEST_URI; ?>"/>
    <meta name="twitter:site" content="@tractorjunction"/>
    <meta name="twitter:creator" content="@tractorjunction"/>
    <meta name="twitter:image" content=""/>

    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-77053076-1', 'auto');
        ga('send', 'pageview');
    </script>
<style>
.skiptranslate{z-index: 9999;}
</style>
 
    <link href="<?php echo $root; ?>web_root/front_web_root/bootstrap.min.css" type="text/css" rel="stylesheet"
          media="all"/>

    <link href="<?php echo $root; ?>web_root/admin_web_root/font-awesome-4.4.0/css/font-awesome.min.css" type="text/css"
          rel="stylesheet" media="all"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
    <link href="<?php echo $root; ?>web_root/front_web_root/tractorcss.css" type="text/css" rel="stylesheet"
          media="all"/>
    <link href="<?php echo $root; ?>web_root/front_web_root/style.css" type="text/css" rel="stylesheet" media="all"/>
    <link href="<?php echo $root; ?>web_root/front_web_root/responsive.css" type="text/css" rel="stylesheet"
          media="all"/>


</head>
<body>

<?php if (($this->session->userdata('newsessonInvalid'))) { ?>
    <div id="bdamessagebox" class="footer23">
        <div class="review-box22" id="" style="background:#da9216">
            <div class="">
                <span class="closeReview112"><a style="cursor:pointer;" onclick="cancelbdamessagebox()"><i
                                class="fa fa-close"></i></a></span>
                <span class="iconS_read"><i class="fa fa-check-square-o" style="font-size: 45px;"></i></span>
                <h5 class="footer24" id="show_cont">
                    <?php
                    echo $this->session->userdata('newsessonInvalid');
                    $this->session->unset_userdata('newsessonInvalid');
                    ?>
                </h5>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (($this->session->userdata('newsesson') || $this->session->userdata('messageTrue') || $this->session->userdata('messageFalse'))) {

	?>
    <div id="bdamessagebox" class="footer23">
        <div class="review-box22" id="" style="">
            <div class="">
                <span class="closeReview112"><a style="cursor:pointer;" onclick="cancelbdamessagebox()"><i
                                class="fa fa-close"></i></a></span>
                <span class="iconS_read"><i class="fa fa-check-square-o" style="font-size: 45px;"></i></span>
                <h5 class="footer24" id="show_cont">
                    <?php
                    echo $this->session->userdata('newsesson');
                    echo $this->session->userdata('messageTrue');
                    echo $this->session->userdata('messageFalse');
                    $this->session->unset_userdata('newsesson');
                    $this->session->unset_userdata('messageTrue');
                    $this->session->unset_userdata('messageFalse');
                    ?>
                </h5>
            </div>
        </div>
    </div>
<?php } ?>

        <p class="side-thing sideBarNav"><a href="<?php echo $root; ?>find-tractor-dealers">Find a Dealer</a></p>
        <p class="side-thing2 sideBarNav"><a href="<?php echo $root; ?>on-road-price">On Road Price</a></p>
       

				<div class="container paddingZ bottomBar">
					<div class="col-md-12 paddingZ MainCont">
						<a href="<?php echo $root; ?>compare-tractors" style="color: black;">
							<div class="col-md-3 paddingZ MainContBt">
								<h1> <i class="fa fa-balance-scale"></i></h1>
								<p class="paddingZ textBottomFooter">Compare</p>
							</div>
						</a>
						<a href="<?php echo $root; ?>on-road-price" style="color: black;">
							<div class="col-md-3 paddingZ MainContBt">
								<h1> <img src="<?php echo $root; ?>web_root/images_new/on_road_price_icon.png"></h1>
								<p class="paddingZ textBottomFooter">On Road P.</p>
							</div>
						</a>
						<a href="<?php echo $root; ?>" style="color: black;">
							<div class="col-md-3 paddingZ MainContBt">
								<h1> <i class="fa fa-home"></i></h1>
								<p class="paddingZ textBottomFooter">Home</p>
							</div>
						</a>
						<a href="<?php echo $root; ?>tractors" style="color: black;">
							<div class="col-md-3 paddingZ MainContBt">
								<h1> <img src="<?php echo $root; ?>web_root/images_new/tractor_icon.png"></h1>
								<p class="paddingZ textBottomFooter">Tractors</p>
							</div>
						</a>
						<a href="<?php echo $root; ?>reviews-tractors" style="color: black;">
							<div class="col-md-3 paddingZ MainContBt">
								<h1> <img src="<?php echo $root; ?>web_root/images_new/reciew_icon.png"></h1>
								<p class="paddingZ textBottomFooter">Review</p>
							</div>
						</a>
					</div>
				</div>
         
<div class="TopHeader">
    
    <div class="top_row">
        <div class="container paddingL">
            <div class="col-md-2 huh" style="text-align: left;z-index:9999">
            <div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'hi,ml,pa,ta,te', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        
			</div>
            <div class="col-sm-12 col-md-2 col-xs-12 paddingZ">
			</div>
            <div class="col-sm-12 col-md-6 col-xs-12 paddingZ" style="padding: 3px 0px;text-align: center;">
	<?php echo form_open('OldTractor/FindResult'); ?>
	<input type="text" id="mainSearchBox" required="required" name="valueSearch"
	placeholder="Search tractor" class="searchBoxCs"/>
	<button type="submit" class="searcxhBtCs" id="searchform"><i class="fa fa-search"></i></button>
	<?php echo form_close(); ?>


            
            </div>
			<div class="col-sm-12 col-md-2 col-xs-12 paddingZ textcentrMob">
			<?php 
			if($this->session->userdata('user_id_login')){
			?>
<a class="LoginButCs" href="<?php echo $root; ?>my-profile">Hi.. <?php echo $this->session->userdata('user_name_login'); ?></a>
			
			<?php }else{
				?>
				
			
<a data-toggle="modal" data-target="#LoginModelWindow" class="LoginButCs">Login</a>
				<?php 
			}
			?>
			</div>
        </div>
    </div>
	
	
	
    <div class="">
        <!-- Second navbar for categories -->
        <nav class="navbar navbar-default navBarCls">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo $root; ?>">
                        <img src="<?php echo $root; ?>web_root/images_new/logo.png" class="tractorlogo_image" alt="Tractorjunction logo">

                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse paddingZ" id="navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="<?php if ($this->session->userdata('pageinfo') == "home") { ?>active<?php } ?>"><a
                                    href="<?php echo $root ?>">Home</a></li>
                        <li class="dropdown <?php if ($this->session->userdata('pageinfo') == "search") { ?>active<?php } ?>"
                            >
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">
                                New<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu drop_width">
                                <li><a href="<?php echo $root . "tractors" ?>"> New Tractors</a></li>
                                <li><a href="<?php echo $root . "popular-tractors" ?>"> Popular Tractors</a></li>
                                <li><a href="<?php echo $root . "latest-tractors" ?>"> Latest Tractors</a></li>
                                <li><a href="<?php echo $root . "upcoming-tractors" ?>"> Upcoming Tractors</a></li>
                            </ul>
                        </li>

                        <li class="dropdown <?php if ($this->session->userdata('pageinfo') == "old") { ?>active<?php } ?>"
                            >
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">
                                Old<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu drop_width">
                                <li><a href="<?php echo $root . "used-tractors-for-sell" ?>">Buy Old Tractor</a>
                                </li>
								<li><a href="<?php echo $root . "sell-used-tractor" ?>">Sell Old Tractor</a></li>
                                
                            </ul>
                        </li>
                        <!--
<li class="dropdown <?php if ($this->session->userdata('pageinfo') == "rent") { ?>active<?php } ?>" id="">
	<a href="<?php echo $root . "tractor-products-on-rent" ?>"  role="button" aria-haspopup="true" aria-expanded="false">
		Rent
	</a>
</li>
-->

                        <li class="<?php if ($this->session->userdata('pageinfo') == "compare") { ?>active<?php } ?>"><a
                                    href="<?php echo $root . "compare-tractors" ?>">Compare</a></li>
                        <li class="<?php if ($this->session->userdata('pageinfo') == "harvester") { ?>active<?php } ?>">
                            <a href="<?php echo $root . "tractor-combine-harvesters"; ?>">Combine Harvester</a></li>
                        <li class="dropdown linkHover <?php if ($this->session->userdata('pageinfo') == "implementNew") { ?>active<?php } ?>">
                            <a href="<?php echo $root . "tractor-implements" ?>" class="dropdown-toggle">
                                Implements<span class="caret ImplementMenu"></span></a>
								
                            <ul class="dropdown-menu ImplementMenu">
                                <?php
                                $implArray = array();
                                $cond = '';
                                $cond = "status='1' order By name ASC";
                                $implArray = shweta_select_th('*', 'filed', $cond);
                                $count_imp = array();
                                foreach ($implArray as $implArray => $implArray_Value) {
                                    $count_imp[$implArray_Value->id] = count(shweta_select('id', 'new_implement', 'implementType', $implArray_Value->id));
                                }
                                arsort($count_imp);
                                $rr11 = 0;
                                foreach ($count_imp as $implArrayKey => $implArrayValue) {
                                    $impName = '';
                                    foreach (shweta_select('name', 'filed', 'id', $implArrayKey) as $raa) $impName = ($raa->name);
                                    $slugImp = '';
                                    foreach (shweta_select('slug', 'filed', 'id', $implArrayKey) as $raa) $slugImp = ($raa->slug);
                                    $rr11++;
                                    if ($rr11 == 6) {
                                        break;
                                    }
                                    ?>
                                    <li><a href="<?php echo $root . "tractor-implements" ?>/<?php echo $slugImp; ?>">
                                            <?php echo ucfirst($impName); ?>
                                            (<?php
                                            echo $implArrayValue;

                                            ?>)
                                        </a>
                                    </li>
                                <?php } ?>
                                <li>
                                    <ul style="list-style:none;" class="next-li">
                                        <?php
                                        $implArray = array();
                                        $cond = '';
                                        $cond = "status='1' order By name ASC";
                                        $implArray = shweta_select_th('*', 'filed', $cond);
                                        foreach ($implArray as $implArrayKey => $implArrayValue) {
                                            ?>
                                            <li>
                                                <a href="<?php echo $root . "tractor-implements" ?>/<?php echo $implArrayValue->slug; ?>"><?php echo ucfirst($implArrayValue->name); ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            </ul>
                        </li>

<li class="<?php if ($this->session->userdata('pageinfo') == "blog") { ?>active<?php } ?>"><a
                                    href="<?php echo $root . "blog" ?>">Blog</a></li>
<li class="" style="border: 1px solid #dd4445;
    border-radius: 9px;
    box-shadow: 0px 0px 2px #dd4445;
    background: #fdfdfd;"><a
                                    href="<?php echo $root . "reviews-tractors" ?>"><i class="fa fa-star"></i> Review</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">More<span class="caret"></span></a>
                            <ul class="dropdown-menu drop_width">
                                <li><a href="<?php echo $root . "tractor-finance" ?>">Finance</a></li>
                                <li><a href="<?php echo $root . "tractor-insurance" ?>">Insurance</a></li>
                                <li><a href="<?php echo $root . "find-tractor-dealers" ?>">Find Dealer</a></li>
                                <li><a href="<?php echo $root . "special-tractor-offers" ?>">Offers</a></li>
                                <li><a href="<?php echo $root . "tractor-dealership-enquiry" ?>">Dealership Enquiry</a>
                                </li>
                                <li><a href="<?php echo $root . "tractor-news" ?>">News & Update</a></li>
                                <li><a href="<?php echo $root . "questionanswer" ?>">Ask A Question</a></li>
                            </ul>
                        </li>

                    </ul>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container -->
        </nav><!-- /.navbar -->

        <!-- Second navbar for sign in -->

        <!-- Second navbar for search -->
    </div><!-- /.container-fluid -->

</div>