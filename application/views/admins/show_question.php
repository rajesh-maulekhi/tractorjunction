<?php
if ($this->session->userdata('admin')) {
    ?>
    <?php
    $root = "http://" . $_SERVER['HTTP_HOST'];
    $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
    ?>
    <title>Admin || View Questions </title>
    <div id="gif_image" style="background:rgba(0, 0, 0, 0.55);height:100%;width:100%;display:none;position: fixed;
    left: 0;
    right: 0;
    top: 0;
    z-index: 2;">
        <center>
            <img src="../images/gif_tractor.gif" style="margin-top:23%;height:50px;">
        </center>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"
         style="padding:0px;min-height:835px;background: #F7F7F7;">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding:20px 14px;">
        
            <div class="col-sm-2 col-md-2">
                <a href="<?php echo $root; ?>admins/Questions">
                    <button type="button" class="btn btn-default buttoupdate" style="" id="delete">Add Question</button>
                </a>
            </div>
    

 

        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 "
             style="padding:20px 14px;background: #fff; margin-top:20px;">
            <div id="info-message" style="float:right;">
                <?php
                echo $this->session->userdata('p_add');
                $this->session->unset_userdata('p_add');
                ?>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding:0px; padding-top:0px;">
                <h3>Show Questions</h3>

                <div class="meas">

                    <?php
                    echo $this->session->userdata('value_inserted');
                    $this->session->unset_userdata('value_inserted');
                    ?>
                </div>
                <hr style="  border-top: 3px solid #C5C2C2;">

                <table border="0" style="width:100%;" class="table table-striped">
                    <thead>
                    <tr>
                  
                        <th>S.no.</th>
                        <th style="width:30%">Question</th>
                        <th>Published On</th>
                        <th>Published By</th>
                         
                        <th>Edit/Delete</th>

                    </tr>
                    <?php $s_no = 1; ?>
                    </thead>
                    <tbody id="show_result">
                    <tr>
                        <?php
                        foreach ($result as $row => $obj){
                        ?>
    

                        <td><?php echo $s_no; ?>.</td>
						   
                        <td><?php echo ucfirst($obj->question); ?></td>
                        <td> <?php echo date("D, M d, Y", strtotime($obj->date_time)); ?></td>
                 
                        <td><?php echo ucfirst($obj->publish_by); ?></td>
                        <td>
					
					<a href="<?php echo $root; ?>admins/Questions/DeleteQues/<?php echo $obj->id;?>" onclick="return dialogeBox();">
                                    <button class="btn btn-default buttoupdate">Delete</button>
                                </a>
						</td>

             
                 
                        
                        </td>


                    </tr>


                    <?php
                    $s_no++;
                    } ?>


                    </tbody>


                </table>
                <div class="pagination" style="float:right; margin-top: 13px;">
                    <ul class="pagination" style="margin:-4px 0px -23px 0px !important;">
                        <?php echo $links; ?>
                    </ul>
                </div>
            </div>


        </div>
    </div>
    <script src="../../js/jquery.min2.js"></script>

    <script type="text/javascript">
   	function dialogeBox(){
	var result = confirm("Want to Continue?");
if (result) {
    return true;
}
else{
	   return false;
}
}
    </script>
    <?php
} else {
    header("Location:login");
}
?>