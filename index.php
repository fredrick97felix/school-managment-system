<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
  {
    $reg_no=$_POST['reg_no'];
    $Password=$_POST['Password'];
    $password_hashed=MD5($Password);

    $query_to_get="SELECT * 
                  FROM   `staff`
                  WHERE  reg_no='$reg_no' && password='$password_hashed'";

    $query=mysqli_query($con,$query_to_get);
    $ret=mysqli_fetch_assoc($query);
    $comp_pass=$ret['password'];
    if($password_hashed==$comp_pass){
      $_SESSION['reg_no']=$ret['reg_no'];
      $_SESSION['school_reg_no']=$ret['school_reg_no'];
      $_SESSION['rank']=$ret['rank'];
      $_SESSION['name']=$ret['frist_name']."".$ret['last_name'];

      if($ret['rank']=='resource'){
        header('location:resource_manager_dashboard.php');

       }else if($ret['rank']=='admin'){
        header('location:admin_dashboard.php');

       }else if($ret['rank']=='headmaster'){
        header('location:head_dashboard.php');

       }else if($ret['rank']=='academic'){
        header('location:academic_dashboard.php');

       }else{
        header('location:teacher_dashboard.php');

       }
      
    
     
    }
    else{
      $msg="invalid details";
    }
  }
  ?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="pms">
  <meta name="description" content="sm">
  <meta name="author" content="fx">

  <title>PMS Student Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gray-100">

  <div class="container">
    <h3 align="center" style="color: black; padding-top: 2%">SMS | School Managament System</h3>

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            

            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"><img src="img/i1.png" class="img-rounded img-responsive" width="95%" height="99%"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">SM | STAFFS LOGIN</h1>
                  </div>
                  <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                   <form class="user" method="post" action="">
                    <div class="form-group">
                      <input type="text" class="form-control" id="reg_no" name="reg_no"  placeholder="Reg number" required="true">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" id="Password" name="Password" placeholder="Password" required="true">
                    </div>
                    
                  
                    <p> <input type="submit" class="btn btn-primary  btn-block" name="login" value="login"></p>

                    <hr>
                  
                  </form>
                  <hr>
                  <!-- <div class="text-center">
                    <a class="small" href="forgetpassword.php">Forgot Password?</a>
                  </div> -->
                  <!-- <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
