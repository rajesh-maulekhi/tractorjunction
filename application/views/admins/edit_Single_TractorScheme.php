<?php
$root = "http://" . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

if ($this->session->userdata('admin')) {
	foreach($result as $key=>$value){}
    ?>
    <title>Admin || Edit scheme </title>
    <script type="text/javascript" src="<?php echo $root ?>ckeditor/ckeditor.js"></script>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"
         style="padding:0px;min-height:835px;background: #F7F7F7;">
        <!-- main section -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding:20px 14px;"><a
                    href="<?php echo $root; ?>admins/list-tractor-scheme">
                <button type="button" class="btn btn-default buttoupdate" style="">List Scheme</button>
            </a>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding: 30px 15px;background: #fff;">
            <h3>Insurance scheme </h3>
            <hr style="  border-top: 3px solid #C5C2C2;">


            <div id="page-wrapper">
                <div class="row">

                    <?php
                    $att = array('class' => 'form-horizontal form-label-left');
                    echo form_open_multipart('admins/ListFinanceTractor/UpdateschemeEndSe', $att); ?>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Scheme Type :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text','value' => $value->type, 'readonly' => 'readonly', 'placeholder' => 'Enter Title', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>  <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Title :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text','value' => $value->title, 'name' => 'title', 'placeholder' => 'Enter Title', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                            <?php echo form_input(array('type' => 'hidden','value' => $value->id, 'name' => 'id_val', 'placeholder' => 'Enter Title', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                            <?php echo form_input(array('type' => 'hidden','value' => $value->image, 'name' => 'image_old', 'placeholder' => 'Enter Title', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>  <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">order by :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(array('type' => 'text','value' => $value->order_by, 'name' => 'order_by', 'placeholder' => 'Enter order_by', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Image:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12" style="width: 34%;
    background: #065E84;
    height: 47px;
    padding: 10px;
    margin-left: 17px;
    color: white;">
                            <?php echo form_input(array('type' => 'file', 'name' => 'model_image', 'class' => 'col-md-7 col-xs-12', 'style' => 'width:100%')); ?>
                      
  </div>
     <img src="<?php echo $root; ?>images/scheme/<?php echo $value->image; ?>"
                                     style="height:50px;width:50px;    border: 1px solid #ddd;" class="img-respomsive">
                            
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Description* :
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
<textarea name="description" placeholder="Please add description" class="form-control col-md-7 col-xs-12 ckeditor"
          required="">
		  <?php echo $value->description; ?>
			</textarea>
                        </div>
                    </div>


                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                            <?php echo form_input(array('type' => 'submit', 'id' => 'form_up', 'class' => 'btn btn-default buttoupdate', 'value' => 'Update')); ?>
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