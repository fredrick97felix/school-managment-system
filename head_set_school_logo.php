<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
//error_reporting(0);
if ($_SESSION['reg_no']=="") {
  //header('location:logout.php');
    echo "<h1>you need to login <h1>";
   header("refresh:2;url=index.php");
   session_destroy();
  }else if($_SESSION['rank']!="headmaster"){
    echo "<h1>you need to login as headmaster<h1>";
    header("refresh:2;url=index.php");
    session_destroy();

  }else{


    $school_reg_no=$_SESSION['school_reg_no'];

$fetch="SELECT 	school_name,logo FROM `school` WHERE school_reg_no='$school_reg_no'";
    $ret=mysqli_query($con,$fetch);
    $row=mysqli_fetch_assoc($ret);
    
    $school_name=$row["school_name"];
    $logo=$row["logo"];

    if(isset($_POST["upload"])){
      $file_name=$_FILES['file']['name'];
      $file_type=$_FILES['file']['type'];
      $tmp_name=$_FILES['file']['tmp_name'];
      $extension=substr($file_name,strpos($file_name,'.')+1);
  
          if(isset($file_name) && $file_name!=""){
            if($extension=="png" || $extension=="jpeg" || $extension=="jpg"){
              $location='img/school_logo/';
              $img_path=$location.$file_name;
  
             if(move_uploaded_file( $tmp_name,$img_path)){
  
              
              $update="update `school` set logo='$img_path' where school_reg_no='$school_reg_no'";
             if($ret=mysqli_query($con,$update)){
              $msg_succsess="image uploaded ";
             }else{
              $msg="";
             }
             }else{
              $msg="image not uploaded".$tmp_name.$img_path;
             }
  
            }else{
              $msg="file selected not an image";
  
            }
  
          }else{
            $msg="you have not selected anything";
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
  <link href="https://fonts.googleapis.com/css?family=Nuni" rel="stylesheet">

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
          <div><p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
  <p style="font-size:16px; color:green" align="center"> <?php if($msg_succsess){
    echo $msg_succsess;
  }  ?> </p></div>
          <div class="m-4"> 
         <img src="<?php echo $logo ?>" class="img-rounded img-responsive" width="400" height="400">
         </div>

         <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  upload school logo
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">upload image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="head_set_school_logo.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file"> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" value="upload" name="upload" class="btn btn-success">
        </form>
      </div>
    </div>
  </div>
</div>


                   




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
    $(".jDate").datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
}).datepicker("update", "10/10/2016"); 
  </script>

</body>

</html>
<?php }  ?>
