<?= '<?xml version="1.0" encoding="UTF-8" ?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?php echo $baseurl; ?></loc> 
        <priority>1.0</priority>
    </url>
    <!-- My code is looking quite different, but the principle is similar -->
<url>
	<loc><?php echo $abouturl; ?></loc>
	<priority>0.5</priority>
</url>
<url>
	<loc><?php echo $sellusedtractor; ?></loc>
	<priority>0.5</priority>
</url>
<url>
	<loc><?php echo $tractorproductsonrent; ?></loc>
	<priority>0.5</priority>
</url>
<url>
	<loc><?php echo $usedtractorsforsell; ?></loc>
	<priority>0.5</priority>
</url>
<url>
	<loc><?php echo $populartractors; ?></loc>
	<priority>0.5</priority>
</url>
<url>
	<loc><?php echo $latesttractors; ?></loc>
	<priority>0.5</priority>
</url>
<url>
	<loc><?php echo $upcomingtractors; ?></loc>
	<priority>0.5</priority>
</url>
<url>
	<loc><?php echo $privacyurl; ?></loc>
	<priority>0.5</priority>
</url>
<url>
	<loc><?php echo $advertiseurl; ?></loc>
	<priority>0.5</priority>
</url>
<url>
	<loc><?php echo $carerurl; ?></loc>
	<priority>0.5</priority>
</url>
<url>
	<loc><?php echo $contacturl; ?></loc>
	<priority>0.5</priority>
</url>
<url>
	<loc><?php echo $offerurl; ?></loc>
	<priority>0.5</priority>
</url>
<url>
	<loc><?php echo $compareurl; ?></loc>
	<priority>0.5</priority>
</url>
<url>
	<loc><?php echo $searchurl; ?></loc>
	<priority>0.5</priority>
</url>

<url>
	<loc><?php echo $loanurl; ?></loc>
	<priority>0.5</priority>
</url>
<url>
	<loc><?php echo $finance; ?></loc>
	<priority>0.5</priority>
</url>
<url>
	<loc><?php echo $insurance; ?></loc>
	<priority>0.5</priority>
</url>
<url>
	<loc><?php echo $findtractordealers; ?></loc>
	<priority>0.5</priority>
</url>
<url>
	<loc><?php echo $tractordealershipenquiry; ?></loc>
	<priority>0.5</priority>
</url>
<url>
	<loc><?php echo $tractornews; ?></loc>
	<priority>0.5</priority>
</url>
<url>
	<loc><?php echo $tractorcustomercare; ?></loc>
	<priority>0.5</priority>
</url>
<url>
	<loc><?php echo $tractorservicecenters; ?></loc>
	<priority>0.5</priority>
</url>
	<?php	if(!empty($brandurl)) { ?>
	<?php	foreach($brandurl as $url) { ?>
<url>
	<loc><?php echo $url; ?></loc>
	<priority>0.5</priority>
</url>
	<?php } ?>
	<?php } ?>
	
	<?php	if(!empty($tractorurl)) { ?>
	<?php	foreach($tractorurl as $url) { ?>
<url>
	<loc><?php echo $url; ?></loc>
	<priority>0.5</priority>
</url>
	<?php } ?>
	<?php } ?>
	
		<?php	if(!empty($harvesterURL)) { ?>
	<?php	foreach($harvesterURL as $url) { ?>
<url>
	<loc><?php echo $url; ?></loc>
	<priority>0.5</priority>
</url>
	<?php } ?>
	<?php } ?>
	
			<?php	if(!empty($ImplementsURL)) { ?>
	<?php	foreach($ImplementsURL as $url) { ?>
<url>
	<loc><?php echo $url; ?></loc>
	<priority>0.5</priority>
</url>
	<?php } ?>
	<?php } ?>
	
	<?php	if(!empty($OldTractorURL)) { ?>
	<?php	foreach($OldTractorURL as $url) { ?>
<url>
	<loc><?php echo $url; ?></loc>
	<priority>0.5</priority>
</url>
	<?php } ?>
	<?php } ?>
	
	<?php	if(!empty($RentTractorURL)) { ?>
	<?php	foreach($RentTractorURL as $url) { ?>
<url>
	<loc><?php echo $url; ?></loc>
	<priority>0.5</priority>
</url>
	<?php } ?>
	<?php } ?>
		<?php	if(!empty($OldImplementTractorURL)) { ?>
	<?php	foreach($OldImplementTractorURL as $url) { ?>
<url>
	<loc><?php echo $url; ?></loc>
	<priority>0.5</priority>
</url>
	<?php } ?>
	<?php } ?>
</urlset>