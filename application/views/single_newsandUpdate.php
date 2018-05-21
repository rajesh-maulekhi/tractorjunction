<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
foreach ($result1 as $key => $obj) {
}
 header( 'Content-Type: text/html; charset=utf-8' ); 
?>

<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<style>
    
#newsDescri img{
	width: 100% !important;
	height: 50% !important;
}
table>tbody>tr>td {
    padding-right: unset !important;
}
</style>
<div class="banner" style="background:rgba(204, 0, 1, 0.7) none repeat scroll 0% 0%;height:105px;">
    <div class="container">
        <div class="col-sm-12 col-md-12" style="padding:15px 0px;">
            <ul type="none" style="color:#fff">
                <li style="float:left;padding-right:5px;"><i class="fa fa-home"
                                                             style="font-size:16px;padding-right:5px;"></i>Home
                </li>
                <li style="float:left;padding-right:5px;">/</li>
                <li style="float:left;padding-right:5px;">News details</li>
            </ul>
        </div>
    </div>
</div>
<div class="container d1">
    <div class="col-sm-12 col-md-12 paddingZ b1">
        <div class="box-wrapper">
            <div class="box1">
                <div class="row margin_news">
                    <h2 class="font_b SingleNewsTitle" style=""> <span
                                style="color:#cc0001;">
						<?php echo ($obj->title); ?></span>
                    </h2>
                    <div class="border Singleorder" style="margin:22px 20px;">
                        <div class="border-inner"></div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 ">
                        <div class="col-md-8 col-sm-12 col-xs-12 ipm font_a NewsDescription" style="text-align:justify">
                            <?php if ($obj->image != "" && file_exists("./images/news/" . $obj->image)) { ?>
                                <img class="im_width showsss"
                                     src="<?php echo $root ?>images/news/<?php echo $obj->image; ?>"
                                     alt="tractor news" style="width: 100%;
border: 1px solid #ddd;"/>
                            <?php } else { ?>
                                <img class="im_width showsss"
                                     src="<?php echo $root; ?>images/tractor_default_image.jpg"
                                     alt="No image found" style="width: 100%;
border: 1px solid #ddd;">
                            <?php } ?>
							<p class="eyeStyle"><i class="fa fa-eye"></i>  <?php echo $totalCount; ?></p>
							<div id="newsDescri">
                            <p >
                            <?php
                            echo (($obj->description));
                            ?></p>
							</div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 paddingZ" style="">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0px 0px 10px">
                                    <h4 class="d16" style="text-align: center;">
                                        Posted On</h4>
                                    <div class="d17" style="color: rgb(219, 76, 77);text-align: center;padding: 20px;">
                                        <i class="fa fa-calendar"> </i>
                                        &nbsp;&nbsp;<?php echo date("d M Y", strtotime($obj->date)); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 paddingZ" style="background:#eee">
                                <h4 class="d16 singlenews">
                                    Top Latest News</h4>
                                <div class="col-md-12 col-sm-12 col-xs-12 font_a">
                                    <ul style="padding-left: 15px;">
                                        <?php
                                        $condition = '';
                                        $condition = "status='1' order by date DESC LIMIT 5 ";
                                        $result = shweta_select_th('*', 'news', $condition);
                                        foreach ($result as $kk => $kk1) {
                                            ?>
                                            <li style="margin-bottom: 10px;">
                                                <a href="<?php echo $root; ?>tractor-news/<?php echo newslugend($kk1->title); ?>/<?php echo($kk1->id); ?>"
                                                   class="text_fom" style="font-size: 15px;">
                                                    <?php
                                                    if (strlen($kk1->title) > 65) {
                                                        echo substr((($kk1->title)), 0, 65) . "...";
                                                    } else {
                                                        echo (($kk1->title));
                                                    } ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 paddingZ" style="margin-top:20px;">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#home"
                                                          style="font-size: 14px;padding: 10px 5px;">Popular tractor</a>
                                    </li>
                                    <li><a data-toggle="tab" href="#menu1" style="font-size: 14px;padding: 10px 5px;">Latest
                                            tractor</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active">
                                        <ul style="padding: 0px;line-height: 26px;">
                                            <?php
                                            $whrcond = "popular = 'yes'";
                                            $resultTab = resultOrdrByWhere('model_name,brand,id', 'tech_specification', $whrcond, 'id', 'RANDOM', '10');
                                            foreach ($resultTab as $resultTabKey => $resultTabValue) {
                                                ?>
                                                <li>
                                                    <a style="color: #D63334;" target="_blank"
                                                       href="<?php echo $root; ?>product/<?php echo $resultTabValue->id; ?>/<?php foreach (shweta_select('name', 'brand', 'id', $resultTabValue->brand) as $raa) echo newslugend($raa->name) . "-tractor"; ?>-<?php echo newslugend($resultTabValue->model_name); ?>">
                                                        <?php foreach (shweta_select('name', 'brand', 'id', $resultTabValue->brand) as $raa) echo ucfirst($raa->name); ?>
                                                        <?php echo ucfirst($resultTabValue->model_name); ?></a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <div id="menu1" class="tab-pane fade">
                                        <ul style="padding: 0px;line-height: 26px;">
                                            <?php
                                            $whrcond = "latest = '1'";
                                            $resultTab = resultOrdrByWhere('model_name,brand,id', 'tech_specification', $whrcond, 'id', 'RANDOM', '10');
                                            foreach ($resultTab as $resultTabKey => $resultTabValue) {
                                                ?>
                                                <li>
                                                    <a style="color: #D63334;" target="_blank"
                                                       href="<?php echo $root; ?>product/<?php echo $resultTabValue->id; ?>/<?php foreach (shweta_select('name', 'brand', 'id', $resultTabValue->brand) as $raa) echo newslugend($raa->name) . "-tractor"; ?>-<?php echo newslugend($resultTabValue->model_name); ?>">
                                                        <?php foreach (shweta_select('name', 'brand', 'id', $resultTabValue->brand) as $raa) echo ucfirst($raa->name); ?>
                                                        <?php echo ucfirst($resultTabValue->model_name); ?></a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo quickLinksHTML(); ?>
</div>
</div>
<!--blinking text-->
<script type="text/javascript">
    $(function () {
        window.setInterval(function () {
            $('a').toggleClass('blink');
        }, 600);
    });
</script>

<script type="text/javascript">
    $(window).load(function () {
        $("#flexiselDemo1").flexisel();
    });
</script>
<script type="text/javascript">
    var timeOut;
    function scrollToTop() {
        if (document.body.scrollTop != 0 || document.documentElement.scrollTop != 0) {
            window.scrollBy(0, -50);
            timeOut = setTimeout('scrollToTop()', 10);
        }
        else clearTimeout(timeOut);
    }
</script>
<script type="text/javascript" src="js/jquery.flexisel.js"></script>
</body>
</html>  