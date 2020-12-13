<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
//error_reporting(0);
if ($_SESSION['reg_no']=="") {
  //header('location:logout.php');
    echo"<h1>you need to login <h1>";
   header("refresh:2;url=login.php");
   session_destroy();
  }else{ 
    $session_id=$_SESSION['reg_no'];
    $fetch="SELECT * FROM `staff` WHERE reg_no='$session_id'";
    $ret=mysqli_query($con,$fetch);
    $row=mysqli_fetch_assoc($ret);

    $first_name=$row["first_name"];
    $second_name=$row["second_name"];
    $last_name=$row["last_name"];
    $reg_no=$row["reg_no"];
    $rank=$row["rank"];
    $school_reg_no=$row["school_reg_no"];
    $img=$row["img"];

    $full_name=$first_name." ".$second_name." ".$last_name;

    $fetch="SELECT 	school_name FROM `school` WHERE school_reg_no='$school_reg_no'";
    $ret=mysqli_query($con,$fetch);
    $row=mysqli_fetch_assoc($ret);

    $school_name=$row["school_name"];


    if(isset($_POST["import"])){
    $file_name=$_FILES['file']['name'];
    $file_type=$_FILES['file']['type'];
    $tmp_name=$_FILES['file']['tmp_name'];
    $extension=substr($file_name,strpos($file_name,'.')+1);

        if(isset($file_name) && $file_name!=""){
          if($extension=="png" || $extension=="jpeg" || $extension=="jpg"){
            $location='img/profile_img/';
            $img_path=$location.$reg_no.$file_name;

           if(move_uploaded_file( $tmp_name,$img_path)){

            $msg_succsess="image uploaded ";
            $update="update staff set img='$img_path' where reg_no='$session_id'";
            $ret=mysqli_query($con,$update);
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

  <title>My Profile</title>

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

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800 text-center"> 
          <img src="<?php echo $img?>" class="img-rounded img-responsive" width="90" height="90">      
           
           <br>My Profile</h1>

<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
  <p style="font-size:16px; color:green" align="center"> <?php if($msg_succsess){
    echo $msg_succsess;
  }  ?> </p>


<form action="myprofile.php" method="post" enctype="multipart/form-data">
               <div class="row">
                <div class="col-4 mb-3">School name</div>
                   <div class="col-8 mb-3">   <input type="text" class="form-control" readonly='' id="school_name" name="school" aria-describedby="" required="true" value="<?php  echo $school_name ;?>"></div>
                    </div>  
                    <div class="row">
                      <div class="col-4 mb-3">Name</div>
                     <div class="col-8 mb-3">  <input type="text" class="form-control" readonly='' id="name" name="name" aria-describedby="emailHelp" required="true" value="<?php  echo  $full_name;?>"></div>  
                     </div>



                    <div class="row">
                    <div class="col-4 mb-3">Reg no </div>
                    <div class="col-8 mb-3">
                      <input type="text" class="form-control" readonly='' id="reg_no" name="email" aria-describedby="emailHelp" required="true" value="<?php  echo $reg_no;?>"></div>
                    </div>

                    <div class="row">
                      <div class="col-4 mb-3"> Rank</div>
                     <div class="col-8 mb-3">
                      <input type="text" class="form-control" id="EmpDept" name="rank" readonly='' aria-describedby="emailHelp" required="true" value="<?php  echo $rank;?>">
                    </div></div>
                  </form>
              
          

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  upload profile picture
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
      <form action="myprofile.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file"> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" value="upload" name="import" class="btn btn-success">
        </form>
      </div>
    </div>
  </div>
</div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
   
      <!-- End of Footer -->

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
