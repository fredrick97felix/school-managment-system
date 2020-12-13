<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
//error_reporting(0);
if ($_SESSION['reg_no']=="") {
  //header('location:logout.php');
    echo "<h1>you need to login <h1>";
   header("refresh:2;url=login.php");
   session_destroy();
  }else{ 

    if(isset($_POST['submit']))
{
$session_id=$_SESSION['reg_no'];
$old_password=$_POST['old_password'];
$new_password=$_POST['new_password'];
$confirm_password=$_POST['confirm_password'];
$new_password_hashed=MD5($new_password);
$confirm_password_hashed=MD5($confirm_password);




$fetch="SELECT password FROM `staff` WHERE reg_no='$session_id'";
$ret=mysqli_query($con,$fetch);
$row=mysqli_fetch_assoc($ret);
$password=$row["password"];

if($old_password==$password){
  if($confirm_password_hashed==$new_password_hashed){
    $update="update staff set password='$new_password_hashed' where reg_no='$session_id'";
    $ret=mysqli_query($con,$update);
    $msg_success="you have successfully updated your password";
  }else{
    $msg="new password and confirm password should be equal";
  }

}else{
  $msg="wrong current password";
}


}
   
  ?>
 




<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title></title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
  <?php include_once('includes/sidebar.php')?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
         <?php include_once('includes/header.php')?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- content here-->
          <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
     } ?></p>
   <p style="font-size:16px; color:green" align="center">  <?php if($msg_success){
    echo $msg_success;
   }
    ?> </p>

          <form name="changepassword" onsubmit="return validater()" class="user" method="post" > 
          <div class="row">
                   <div class="col-8 mb-3">   <input type="hidden" class="form-control" id="Password" name="crps1"  value="" required="true"></div>
                    </div> 
               <div class="row">
                <div class="col-4 mb-3">Current Password</div>
                   <div class="col-8 mb-3">   <input type="Password" class="form-control" id="Password" name="old_password"  value="" required="true"></div>
                    </div>  
                    <div class="row">
                      <div class="col-4 mb-3">New Password </div>
                     <div class="col-8 mb-3">  
                     <input type="Password" class="form-control mb-2" id="newpassword" name="new_password"  value="" required="true">
                     
                     </div>
                     </div>



                    <div class="row">
                    <div class="col-4 mb-3">Confirm Password </div>
                    <div class="col-8 mb-3">
                      <input type="Password" class="form-control mb-2" id="confirmpassword" name="confirm_password"   value="" required="true">
                     
                      </div>
                      </div>

                    <div class="row" style="margin-top:4%">
                      <div class="col-4"></div>
                      <div class="col-4">
                      <input type="submit" name="submit"  value="Change" class="btn btn-primary btn-user btn-block">
                    </div>
                    </div>
                  
                  </form>






                   




        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  

  <!-- Bootstrap core JavaScript-->
  <script src=" vendor/jquery/jquery.min.js"></script>
  <script src=" vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script type="text/javascript">

  function validater(){
	
  
	
	if($('#id').val().length<6) {
		$('#probar').removeClass();
    $('#probar').addClass('progress-bar progress-bar-striped bg-danger" role="progressbar');
    
		
	} else {  	
	    if($('#id').val().match(number) && $('#password').val().match(alphabets) && $('#password').val().match(special_characters)) {            
        $('#probar').removeClass();
    $('#probar').addClass('progress-bar progress-bar-striped bg-success" role="progressbar');
			
        } else {
          $('#probar').removeClass();
    $('#probar').addClass('progress-bar progress-bar-striped bg-warning');
			
        } 
  }
  
  return false;
}
    
  </script>

</body>

</html>
<?php }  ?>
