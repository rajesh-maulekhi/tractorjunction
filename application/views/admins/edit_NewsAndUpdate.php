<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

if ($this->session->userdata('admin')) {
    foreach ($result as $key => $value) {
    }
    ?>
    <title>Admin || Add News and Update </title>
    <script type="text/javascript" src="<?php echo $root ?>ckeditor/ckeditor.js"></script>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"
         style="padding:0px;min-height:835px;background: #F7F7F7;">
        <!-- main section -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding:20px 14px;"><a
                    href="<?php echo $root; ?>admins/show-news-update">
                <button type="button" class="btn btn-default buttoupdate" style="">Show News and Update</button>
            </a>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding: 30px 15px;background: #fff;">
            <h3>News and Update</h3>
            <hr style="  border-top: 3px solid #C5C2C2;">


            <div id="page-wrapper">
                <div class="row">

                    <?php
                    $att = array('class' => 'form-horizontal form-label-left');
                    echo form_open_multipart('admins/NewsAndUpdate/editNewsAndUpdateEnd', $att); ?>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">News type :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select required="required" name="type" class="form-control">

                                <option value="tractor" <?php if ($value->type == "tractor") { ?> selected <?php } ?>>
                                    Tractor's News
                                </option>
                                <option value="agriculture" <?php if ($value->type == "agriculture") { ?> selected <?php } ?>>
                                    Agriculture News
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Title :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text', 'name' => 'title', 'value' => $value->title, 'placeholder' => 'Enter Title', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Image:
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12" style="">
                            <?php echo form_input(array('type' => 'file', 'name' => 'model_image', 'class' => '', 'style' => 'width:100%')); ?>
                            <?php echo form_input(array('type' => 'hidden', 'name' => 'old_image', 'value' => $value->image, 'class' => '', 'style' => 'width:100%')); ?>
                            <?php echo form_input(array('type' => 'hidden', 'name' => 'id', 'value' => $value->id, 'class' => '', 'style' => 'width:100%')); ?>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12" style="">
                            <img src="<?php echo $root; ?>images/news/<?php echo $value->image; ?>"
                                 style="    width: 50%;" class="img-responsive">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Description* :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
<textarea name="description" placeholder="Please add description" class="form-control col-md-7 col-xs-12 ckeditor"
          required="">
			<?php echo $value->description; ?></textarea>
                        </div>
                    </div>


                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                            <?php echo form_input(array('type' => 'submit', 'id' => 'form_up', 'class' => 'btn btn-default buttoupdate', 'value' => 'Update News')); ?>
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