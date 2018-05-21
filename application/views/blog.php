<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
?>
<style>
@media (max-width:768px) {
    .side-thing,.side-thing2 {
        display:none;
    }

}
.margBlog{display:none;}
</style>

<body class="mainCont">
		<div class="mainCont">
			<div class="container">
				<div class="col-md-12 col-sm-12 col-xs-12 mainContBlog" style="float: left;margin-bottom: 2%;margin-top: 16%;">
					<div class="col-md-8 col-sm-12 col-xs-12 mainContBlog" style="padding-left: 0px;">
						<?php if(!empty($result)){ ?>
					<?php foreach($result as $key=>$value){ ?>
					<p class="margBlog"></p>
						<div class="post_main mar20 col-md-12 col-sm-12 col-xs-12">
						<h3 class="date_blog"><?php echo date("D, M d, Y", strtotime($value->blog_date)); ?></h3>
						<h2 class="page-title"><span><a href="<?php echo $root; ?>blog/<?php echo $value->slug; ?>"><?php echo $value->title; ?></a></span></h2>
						<div class="post-image">
						<a href="<?php echo $root; ?>blog/<?php echo $value->slug; ?>">
						<img src="<?php echo $root; ?>upload/blog_image/<?php echo $value->image_name; ?>" title="<?php echo $value->title; ?>"  alt="<?php echo $value->title; ?>" class="img-responsive" style="width: 100%;">
						</a>
						</div>
						<div class="entry-content cf col-md-12 col-sm-12 col-xs-12">
						<p> 
						<?php 
						$blog_des='';
						    if (strlen($value->description) > 450) {
                                    $blog_des= substr(ucfirst(($value->description)), 0, 450) ;
                                } else {
                                    $blog_des= ucfirst(($value->description));
                                } 
								echo strip_tags($blog_des);
								?>
						</p> 
						</div>

						<ul style="">
						<!--
						<input type="hidden" id="image_url_share" value="<?php echo $root; ?>upload/blog_image/<?php echo $value->image_name; ?>">
						<input type="hidden" id="name_url_share" value="<?php echo $value->title; ?>">
						<input type="hidden" id="id_des_share" value="<?php echo $value->description; ?>">
						<li class="share-item"><a class="facebook" onclick="BlogShareFB()" target="_blank"><i class="fa fa-facebook"></i></a></li>
						<li class="share-item"><a class="facebook" href="" target="_blank"><i class="fa fa-twitter"></i></a></li>
						<li class="share-item"><a class="facebook" href="" target="_blank"><i class="fa fa-google-plus"></i></a></li> 
						<li class="share-item"><a class="facebook" href="" target="_blank"><i class="fa fa-instagram"></i></a></li> 
-->
						</ul>
						<a class="read-more" href="<?php echo $root; ?>blog/<?php echo $value->slug; ?>">Read More</a>

						</div>
					<?php } ?>
<?php }else{ ?>
<div class="post_main mar20 MobileBlgNo" style="
">
					<h4 style="color:#DD4445;margin-top:40px;"> Blog Not Found</h4>
					</div>
					<?php } ?>
					       <div class="pagination" style="float:right; margin-top: 13px;">
                    <ul class="pagination" style="margin:-4px 0px -23px 0px !important;">
                        <?php echo $links; ?>
                    </ul>
                </div>
					</div>
						<div class="post_main col-md-4 col-sm-12 col-xs-12 mar20" style="padding: 20px;">
					<div class="">
					<h2 class="PopularTut"><span>Popular Posts</span></h2>
					<?php if(!empty($popular_result)){ ?>
					<?php foreach($popular_result as $key1=>$value1){ ?>
					<div class="col-md-12 col-sm-12 col-xs-12 PopDiv">
					<img style="float: left;" src="<?php echo $root; ?>upload/blog_image/<?php echo $value1->image_name; ?>" title="<?php echo $value1->title; ?>"  alt="<?php echo $value1->title; ?>" class="img-responsive"  width="72" height="72" border="0">
					<a class="popular_a" href="<?php echo $root; ?>blog/<?php echo $value1->slug; ?>" style="color: #DD4445;"><?php echo $value1->title; ?></a>
					</div>
					<?php } ?>
					<?php }else{ ?>
					<h4 style="color:#DD4445;margin-top:40px;"> Blog Not Found</h4>
					<?php } ?>
					</div>
					



					</div>
							<div class="post_main col-md-4 col-sm-12 col-xs-12" style="padding: 20px;margin-top:20px;">
							<div class="">
					<h2 class="PopularTut"><span>Join Us</span></h2>
					 
		 
			 <div class="col-md-12 col-sm-12 col-xs-12 padw360" style="margin-top: 10px;">
                    <div class="itemmG" style="background:#3B5998">
                        <a title="Facebook" href="https://www.facebook.com/tractorjunction/" class="linkmF" target="_blank">
                            <i class="fa fa-facebook" style="padding: 7px 18px;font-size:18px;color:#fff;"></i></a>
                    </div>
                    <div class="itemmT">
                        <a title="Twitter" href="https://twitter.com/tractorjunction" class="linkmT" target="_blank" style="top:-2px;left:-11px;">
                            <i class="fa fa-twitter" style="padding:7px 16px;font-size:18px;color:#fff;"></i></a>
                    </div>
                    <div class="itemmG">
                        <a title="Google" href="https://plus.google.com/u/0/111375983648287404977?hl=en" class="linkmG" target="_blank">
                            <i class="fa fa-google-plus" style="padding: 8px 17px;font-size:16px;color:#fff;"></i></a>
                    </div>
                    <div class="itemmF">
                        <a title="Instagram" href="https://www.instagram.com/tractor_junction/" class="linkmF" target="_blank">
                            <i class="fa fa-instagram" style="padding: 7px 18px;font-size:16px;color:#fff;"></i></a>
                    </div>
                </div>
				 
							</div>
				</div>
					<div class="post_main col-md-4 col-sm-12 col-xs-12 adBloKBlog" style="padding: 20px;margin-top:20px;">
					  <p class="advertisementLabel">Advertisement</p>
		    <?php echo newsFront(); ?>
					</div>
						<?php if(empty($result)){ ?>
							<div class="post_main col-md-4 col-sm-12 col-xs-12 adBloKBlog" style="padding: 20px;margin-top:20px;">
					  <p class="advertisementLabel">Advertisement</p>
		    <?php echo newsFront(); ?>
					</div>
						<div class="post_main col-md-4 col-sm-12 col-xs-12 adBloKBlog" style="padding: 20px;margin-top:20px;">
					  <p class="advertisementLabel">Advertisement</p>
		    <?php echo newsFront(); ?>
					</div>
						<?php } ?>
						<?php if(!empty($result)){ ?>
					<div class="post_main col-md-4 col-sm-12 col-xs-12" style="padding: 20px;margin-top:20px;">
					  <p class="advertisementLabel">Advertisement</p>
		    <?php echo searchAdd(); ?>
					</div>
						<?php } ?>
				
			</div>
		</div>
</body>
