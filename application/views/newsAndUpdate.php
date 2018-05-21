<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
?>
<div class="banner" style="background:rgba(204, 0, 1, 0.7) none repeat scroll 0% 0%;height:105px;">
    <div class="container">
        <div class="col-sm-12 col-md-12 col-xs-12" style="padding:15px 0px;">
            <ul type="none" style="color:#fff">
                <li style="float:left;padding-right:5px;"><i class="fa fa-home"
                                                             style="font-size:16px;padding-right:5px;"></i>Home
                </li>
                <li style="float:left;padding-right:5px;">/</li>
                <li style="float:left;padding-right:5px;">News</li>
            </ul>
        </div>
    </div>
</div>
<div class="container d1">
    <div class="col-sm-12 col-md-12 col-xs-12 paddingZ b1">
        <div class="box-wrapper">
            <div class="nwpad">
                <img src="<?php echo $root; ?>images/news_top.jpeg" alt="news and update banner image"
                     class="img-responsive" style="width: 100%;height: 300px;">
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="col-sm-12 col-md-12 col-xs-12 ipm" style="padding-bottom: 90px;border:1px solid #eee">
        <h1 class="news_font NewsSearchTitle">Tractors Latest <span style="color:#cc0001;"> News</span>
        </h1>
        <div class="border Singleorder">
            <div class="border-inner"></div>
        </div>
        <?php
        $result = array();
        $condition = '';
        $condition = "status='1' order by date DESC LIMIT 1 ";
        $result = shweta_select_th('*', 'news', $condition);
        ?>
        <div class="col-md-12 col-sm-12 col-xs-12 paddingZ ">
            <?php
            if (!empty($result)) {
                foreach ($result as $row => $obj) {
                    ?>
                    <div class="col-md-8 col-sm-8 col-xs-12 ipm">
                        <div class="col-md-6 col-sm-6 col-xs-12 ipm">
                            <img src="<?php echo $root ?>images/news/<?php echo $obj->image; ?>"
                                 alt="tractor news" style="height:250px;width:100%"/>

                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 font_a NewsDescription" style="text-align:justify">
                            <h4 class="NwtsTitle" style="color:rgb(219,76,77); text-decoration: underline;">
                                <a class="font_a" style="color:rgb(219,76,77); text-decoration: underline;"
                                   href="<?php echo $root; ?>tractor-news/<?php echo newslugend($obj->title); ?>/<?php echo($obj->id); ?>"><?php echo($obj->title); ?></a>
                            </h4>
                            <p><?php
                                if (strlen($obj->description) > 330) {
                                    echo substr((($obj->description)), 0, 330) . "...";
                                } else {
                                    echo (($obj->description));
                                }
                                ?></p>
                            <a href="<?php echo $root; ?>tractor-news/<?php echo newslugend($obj->title); ?>/<?php echo($obj->id); ?>">Read
                                More</a>
                        </div>
                    </div>
                <?php }
            } else { ?>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <h4 style="color:#DB4C4D;text-align:center;">No news found</h4>
                </div>
            <?php } ?>
            <div class="col-md-4 col-sm-4 col-xs-12 paddingZ huh"
                 style="border:1px solid #eee;padding: 0px 0px 10px;margin:0px;">
                <div data-WRID="WRID-150157885464557155" data-widgetType="Push Content"  data-class="affiliateAdsByFlipkart" height="250" width="300"></div><script async src="//affiliate.flipkart.com/affiliate/widgets/FKAffiliateWidgets.js"></script>
				<?php //echo newsFront(); ?>
            </div>
            <?php
            $result = array();
            $condition = '';
            $condition = "status='1' and type='tractor' LIMIT 4 ";
            $result = shweta_select_th('*', 'news', $condition);
            ?>
            <div class="col-md-12 col-sm-12 col-xs-12 ipm">
                <h2 class="font_h2 NewsSearchTitle">Tractor <span style="color:#cc0001;"> News</span>
                </h2>
                <div class="border Singleorder">
                    <div class="border-inner"></div>
                </div>
                <?php
                if ($this->session->userdata('viewmoresession3')) {
                    $limitcal = $this->session->userdata('viewmoresession3');
                } else {
                    $limitcal = 3;
                }
                $condition = "status='1' and type='tractor'";
                $result = resultOrdrByWhere('*', 'news', $condition, 'id', 'DESC', $limitcal);
                $totalval = count(resultOrdrByWhere('*', 'news', $condition, 'id', 'DESC', ''));
                if ($this->session->userdata('viewmoresession3')) {
                    $limitcal = $this->session->userdata('viewmoresession3');
                    $this->session->set_userdata('viewmoresession3', $limitcal);
                } else {
                    $this->session->set_userdata('viewmoresession3', 3);
                }
                echo NewsHtmlDiv($result, $totalval, 'GetMoreNews', 'filter_result');
                ?>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h2 class="news_font NewsSearchTitle"> Agriculture <span
                            style="color:#cc0001;"> News</span>
                </h2>
                <div class="border Singleorder">
                    <div class="border-inner"></div>
                </div>
                <?php
                $this->session->unset_userdata('viewmoresession5');
                if ($this->session->userdata('viewmoresession5')) {
                    $limitcal = $this->session->userdata('viewmoresession5');
                } else {
                    $limitcal = 3;
                }
                $condition = "status='1' and type='agriculture'";
                $result = resultOrdrByWhere('*', 'news', $condition, 'id', 'DESC', $limitcal);
                $totalval = count(resultOrdrByWhere('*', 'news', $condition, 'id', 'DESC', ''));
                if ($this->session->userdata('viewmoresession5')) {
                    $limitcal = $this->session->userdata('viewmoresession5');
                    $this->session->set_userdata('viewmoresession5', $limitcal);
                } else {
                    $this->session->set_userdata('viewmoresession5', 3);
                }
                echo NewsHtmlDiv($result, $totalval, 'GetMoreNewsAgree', 'filter_result2');
                ?>
            </div>
        </div>
    </div>
</div>
</div>
<?php echo quickLinksHTML(); ?>
<script type="text/javascript">
    $(window).load(function () {
        $("#flexiselDemo1").flexisel();
    });
</script>
<script>
    var root5 = '<?php echo $root; ?>';
    function GetMoreNews() {
        document.getElementById('viewMoreId').style.display = "none";
        document.getElementById('ImageViewMore').style.display = "block";
        $.ajax({
            type: "POST",
            url: root5 + '/NewsAndUpdate/MoreNewsTractor',
            success: function (data) {
                document.getElementById('viewMoreId').style.display = "block";
                document.getElementById('ImageViewMore').style.display = "none";
                $("#filter_result").html(data);
            },
        });
    }
    function GetMoreNewsAgree() {
        document.getElementById('viewMoreId').style.display = "none";
        document.getElementById('ImageViewMore').style.display = "block";
        $.ajax({
            type: "POST",
            url: root5 + '/NewsAndUpdate/MoreNewsTractorAgree',
            success: function (data) {
                document.getElementById('viewMoreId').style.display = "block";
                document.getElementById('ImageViewMore').style.display = "none";
                $("#filter_result2").html(data);
            },
        });
    }
</script>
</body>
</html>  
