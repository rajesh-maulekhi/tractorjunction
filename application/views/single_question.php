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
				<div class="col-md-12 col-sm-12 col-xs-12 mainContBlog" style="float: left;margin-bottom: 2%;margin-top: 13%;">
<h1 class="postQuestionheading">Latest Question & Answers on tractors</h1>
				<div class="col-md-8 col-sm-12 col-xs-12 mainContBlog paddL">


<?php 
if(!empty($result)){
	foreach($result as $key=>$value){
		?>
<div class="post_main mar20 col-md-12 col-sm-12 col-xs-12 QuesMain">
<p class="QuestAG"><?php echo $value->question; ?> </p>
<p class="textLeft"><span class="Quesish">Published On : <?php echo date("D, M d, Y", strtotime($value->date_time)); ?></span> 
<span class="pubBY">By <?php echo $value->publish_by; ?></span></p>
</div>
		<?php 
	}
}else{
	?>
	
<div class="post_main mar20 col-md-12 col-sm-12 col-xs-12 QuesMain">
<p class="NoResF">No Question found</p>
</div>
	<?php 
}
?>  
<div class="post_main mar20 col-md-12 col-sm-12 col-xs-12 QuesMain" style="    background: #eee;
    border: 1px solid #ddd;">
<p class="QuestAG">Give Answer </p>
<?php echo form_open('Questions/AddAnsEnd'); ?>
              
<p class="QuestAG">
<input type="hidden" value="<?php echo $root; ?>post-answer/<?php echo $value->id; ?>/<?php echo newslug_end($value->question); ?>" name="id_que">
<input type="hidden" value="<?php echo $value->id; ?>" name="question_id">
<input type="text" placeholder="Name" name="name" class="textQues" required="required">
<input type="text" placeholder="Mobile No" pattern="[789][0-9]{9}" required="required" maxlength="10"  onkeypress="return isNumberKey(event)" name="publish_mob" class="textQues">
</p>
<p class="QuestAG">
<textarea placeholder="Type Question" name="question" class="textQues typeques" required="required"></textarea>
</p>
<button type="submit" class="AnswwrBT PostQUE">Post Answer</button>
</div> 
<div class="post_main mar20 col-md-12 col-sm-12 col-xs-12 QuesMain">
<h1 class="answertext">Answers (<?php echo count($answer_of_que); ?>)</h1>
<?php
if(!empty($answer_of_que)){
	foreach($answer_of_que as $kk=>$value1){
 ?>
 <div class="col-md-12 col-sm-12 col-xs-12 paddingZ BorderAnswer">
<p class="QuestAG"><?php echo $value1->answer; ?> </p>
<p class="textLeft"><span class="Quesish">Published On : <?php echo date("D, M d, Y", strtotime($value1->date_time)); ?></span> 
<span class="pubBY">By <?php echo $value1->name_answer; ?></span></p>
</div>
	<?php }}else{
	?>
	<div class="col-md-12 col-sm-12 col-xs-12 paddingZ">
	<p>No Answers Found</p>
	</div>
	<?php 
	
}?>
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
			<div class="post_main col-md-4 col-sm-12 col-xs-12 DiplayNONe" style="padding: 20px;margin-top:20px;">
			<div data-WRID="WRID-150166901964795378" data-widgetType="staticBanner" data-responsive="yes" data-class="affiliateAdsByFlipkart" height="250" width="300"></div><script async src="//affiliate.flipkart.com/affiliate/widgets/FKAffiliateWidgets.js"></script>
				</div>
						
			</div>
		</div>
</body>
