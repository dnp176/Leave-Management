<?php
include "../db.inc.php";
include "header.inc.php";
include "sidebar.inc.php";
include "footer.inc.php";

$id=$_GET["id"];
$res = mysqli_query($con,"select * from leave_type where id=$id");
$leave_type="";


while($row=mysqli_fetch_array($res)){

    $leave_type = $row["leave_type"];
    
}
?>

<section id="main-content">
      <section class="wrapper">
        <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal " id="register_form" method="POST" action="">
                    <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2"><b>Leave Type</b> <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="fullname" name="leave_type" placeholder="Enter Leave Type name" type="text" value="<?php echo $leave_type ?>" required />
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit" name="submit">Update</button>
                      </div>
                    </div>
                    <div class="alert alert-success" id="success" style="display:none;">
                       Record Updated Successfully
            		</div>
                  </form>
                </div>
              </div>
        
          



    <!-- Wrapper Close   -->  
    </section>
</section>


<?php

if(isset($_POST["submit"])){
    mysqli_query($con,"update leave_type set leave_type='$_POST[leave_type]' where id=$id ") or die(mysqli_error($con));

    ?>
        <script>
        document.getElementById("success").style.display="block";
        
        setTimeout(function(){
          window.location.href="leave_type.php";
        },1000)
      </script>
    <?php
}

?>