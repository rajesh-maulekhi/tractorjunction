<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

if ($this->session->userdata('admin')) {
    ?>
	  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>

    <title>Admin || Update Blog </title>
    <script type="text/javascript" src="<?php echo $root ?>ckeditor/ckeditor.js"></script>
<?php 
foreach($result as $key=>$value){}
$seo_tegs=unserialize(base64_decode($value->seo_tags));
?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"
         style="padding:0px;min-height:835px;background: #F7F7F7;">
        <!-- main section -->
      

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding: 30px 15px;background: #fff;">
            <h3>Add Blog</h3>
            <hr style="  border-top: 3px solid #C5C2C2;">


            <div id="page-wrapper">
                <div class="row">

                    <?php
                    $att = array('class' => 'form-horizontal form-label-left');
                    echo form_open_multipart('admins/Blog/UpdateBlogEnd', $att); ?>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Title :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text','value' => $value->title, 'name' => 'title', 'placeholder' => 'Title', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                            <?php echo form_input(array('type' => 'hidden','value' => $value->id, 'name' => 'id_val', 'placeholder' => 'Title', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                            <?php echo form_input(array('type' => 'hidden','value' => $value->image_name, 'name' => 'old_image', 'placeholder' => 'Title', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Image :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'file', 'name' => 'image_name', 'placeholder' => 'Title', 'class' => 'form-control col-md-7 col-xs-12')); ?>
			              
					   </div>
			<img src="<?php echo $root; ?>upload/blog_image/<?php echo $value->image_name; ?>" style="height: 50px;
border: 1px solid #ddd;
padding: 5px;
">                     
			</div>
					<div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Blog Date :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text','value' => $value->blog_date,'id' => 'datepicker', 'name' => 'date', 'placeholder' => 'Date', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Description :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                   	<textarea name="description" placeholder="Description" class="form-control ckeditor"
                                  required=""><?php echo $value->description; ?>
						</textarea>     </div>
                    </div>
					
					                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">http://www.tractorjunction.com/blog/ 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text','value' => $value->slug, 'name' => 'slug', 'placeholder' => 'url blog', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
					
					                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Meta Title: 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text','value' => $seo_tegs['meta_title'], 'name' => 'meta_title', 'placeholder' => 'Meta Title', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>     <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Meta Keyword: 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text','value' => $seo_tegs['meta_keyword'], 'name' => 'meta_keyword', 'placeholder' => 'Meta Keyword', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>     <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Meta Description: 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text','value' => $seo_tegs['meta_description'], 'name' => 'meta_description', 'placeholder' => 'Meta Description', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
					

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                            <?php echo form_input(array('type' => 'submit', 'id' => 'form_up', 'class' => 'btn btn-default buttoupdate', 'value' => 'Update Blog')); ?>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>


        </div>


    </div>


    <?php
} else {
    header("Location:" . $root . "admin");
}
?>