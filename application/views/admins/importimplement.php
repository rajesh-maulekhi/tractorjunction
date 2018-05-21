<html>
<head>
    <?php
    $root = "http://" . $_SERVER['HTTP_HOST'];
    $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
    ?>
</head>
<body>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding: 30px 15px;background: #fff;">
    <h3>Import Implement

        <span style="float:right;">
<?php if ($this->session->userdata('dataupdate') != "") {
    echo $this->session->userdata('dataupdate');
    $this->session->unset_userdata('dataupdate');
} ?>
</span>
    </h3>
    <hr style="  border-top: 3px solid #C5C2C2;">


    <div id="page-wrapper">
        <div class="row">

            <form action="<?php echo $root; ?>admins/ImportData/Implement" method="post"
                  class="form-horizontal form-label-left" enctype="multipart/form-data">

                <div class="form-group">
                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Select File (Please upload file in .xls
                        format):
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="file" name="model_image" class="form-control col-md-7 col-xs-12" required>

                    </div>
                </div>


                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                        <input type="submit" name="submit" class="btn btn-default buttoupdate" value="Import"/>

                    </div>
                </div>
            </form>
        </div>
    </div>


</div>


</body>

</html>