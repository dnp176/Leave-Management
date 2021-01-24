<?php
include "../db.inc.php";
include "header.inc.php";
include "sidebar.inc.php";
include "footer.inc.php";


?>



<section id="main-content">
      <section class="wrapper">


      	<div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal " id="register_form" method="POST">
                    <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2"><b>Leave Type</b> <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="fullname" name="leave_type" placeholder="Enter Leave Type name" type="text" required />
                      </div>
                    </div>
                    <div class="alert alert-danger" id="error" style="display:none;">
                       This Leave Type Already Exits | Please Try Another !!!
            		</div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit" name="save">Save</button>
                      </div>
                    </div>
                    <div class="alert alert-success" id="success" style="display:none;">
                       Record Inserted Successfully
            		</div>

                  </form>
                </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                LEAVE TYPE INFORMATION
              </header>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th width="5%">S.No</th>
                      <th width="10%">ID</th>
                      <th width="65%">Department Name</th>
                      <th width="10%">Edit</th>
                      <th width="10%">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  	$count=0;
                	$res = mysqli_query($con,"select * from leave_type order by id desc");
                	while($row=mysqli_fetch_array($res)){
                  	$count=$count+1;

                  ?>
                    <tr>
                      <td width="5%"><?php echo $count; ?></td>
                      <td width="10%"><?php echo $row["id"] ?></td>
                      <td width="65%"><?php echo $row["leave_type"] ?></td>
                      <td width="10%"><a href="edit_leave_type.php?id=<?php echo $row["id"]; ?>" style="color:blue; font-weight: bold;">Edit</td>
                      <td width="10%"><a href="delete_leave_type.php?id=<?php echo $row["id"]; ?>" style="color:red;">Delet</td>
                    </tr>
                    <?php
                	}
                   ?>
                  </tbody>
                </table>
              </div>

            </section>
          </div>
        </div>




        
        
          



    <!-- Wrapper Close   -->  
    </section>
</section>



<?php

if(isset($_POST['save']))
{
	$count=0;
    $res = mysqli_query($con,"select * from leave_type where leave_type='$_POST[leave_type]'");
    $count = mysqli_num_rows($res);
    if($count>0){
      ?>
      <script>
        document.getElementById("success").style.display="none";
        document.getElementById("error").style.display="block";
      </script>
      <?php
    }else{
        mysqli_query($con,"insert into leave_type values (NULL,'$_POST[leave_type]')") or die(mysqli_error($con));
        ?>
      <script>
        document.getElementById("success").style.display="block";
        document.getElementById("error").style.display="none";
        setTimeout(function(){
          window.location.href=window.location.href;
        },1000)
      </script>
      <?php
    }
}



?>