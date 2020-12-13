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
  }else if($_SESSION['rank']!="resource"){
    echo "<h1>you need to login as resource manager<h1>";
    header("refresh:2;url=index.php");
    session_destroy();

  }else{

    $school_reg_no=$_SESSION['school_reg_no'];
    $sql="SELECT `inventory_number` , `name`, `type` , `specification` , `status`
                  FROM   `inventory`
                  WHERE  school_Reg_no='$school_reg_no' ";
              
                  $query=mysqli_query($con,$sql);

                  $avalible=0;
                  
                  
                  while($ret=mysqli_fetch_assoc($query)){

                    $avalible++;


                  }

                  $sql="SELECT `inventory_number` , `name`, `type` , `specification` , `status`
                         FROM   `inventory`
                        WHERE  school_Reg_no='$school_reg_no' && status='Good'";

                    $query=mysqli_query($con,$sql);

                    $Condition_good=0;

                    while($ret=mysqli_fetch_assoc($query)){

                      $Condition_good++;
    
    
                      }

                      $other=  $avalible-$Condition_good;

                      $perc_good=round(($Condition_good/ $avalible)*100);


                      

                      function getQ($school_reg_no,$con,$value){

                          $sql="SELECT `inventory_number` , `name`, `type` , `specification` , `status`
                          FROM   `inventory`
                         WHERE  school_Reg_no='$school_reg_no' && name='$value'";
  
                     $query=mysqli_query($con,$sql);
  
                     $Condition_good=0;
  
                     while($ret=mysqli_fetch_assoc($query)){
  
                       $Condition_good++;
     
     
                       }

                       return  $Condition_good;


                      }

                     
                   

                      $store_value=array();
                      $store_amount=array();

                     $sql="SELECT  DISTINCT  `name` 
                       FROM   `inventory`
                      WHERE  school_Reg_no='$school_reg_no' && status='Good'";

                    $query=mysqli_query($con,$sql);
                    while($ret=mysqli_fetch_assoc($query)){

                      $value=$ret['name'];

                      $amount=getQ($school_reg_no,$con,$value);

                      

                      array_push($store_value," $value");
                      array_push($store_amount," $amount");
                      
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
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Resource manager</h1>
            
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Available resources </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $avalible ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Resources in good condition</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo  $Condition_good ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
             <!-- Earnings (Monthly) Card Example -->
             <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">percentage of working</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $perc_good?>%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                           <?php echo" <div class=\"progress-bar bg-info\" role=\"progressbar\" style=\"width:$perc_good% \" aria-valuenow=\"50\" aria-valuemin=\"0\" aria-valuemax=\"100\"></div>"?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

               <!-- Pending Requests Card Example -->
               <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Resource to repair</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> <?echo $other?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

           

         


          <!-- content here-->
          <div class="row">

<!-- Area Chart -->
<div class="col-xl-8 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">School resource against quantity</h6>
      <div class="dropdown no-arrow">
        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
          <div class="dropdown-header">Dropdown Header:</div>
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#"></a>
        </div>
      </div>
    </div>
    <!-- Card Body -->
    <div class="card-body">
      <div class="chart-area">
        <canvas id="myBarChart"></canvas>
      </div>
    </div>
  </div>
</div>

<!-- Pie Chart -->
<div class="col-xl-4 col-lg-5">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">class allocation</h6>
      <div class="dropdown no-arrow">
        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
          <div class="dropdown-header">Dropdown Header:</div>
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#"></a>
        </div>
      </div>
    </div>
    <!-- Card Body -->
    <div class="card-body">
      <div class="chart-pie pt-4 pb-2">
      <canvas id="myPieChart"></canvas>
      </div>
      <div class="mt-4 text-center small">
        <span class="mr-2">
          <i class="fas fa-circle text-primary"></i> Direct
        </span>
        <span class="mr-2">
          <i class="fas fa-circle text-success"></i> Social
        </span>
        <span class="mr-2">
          <i class="fas fa-circle text-info"></i> Referral
        </span>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Content Row -->
<div class="row">

<!-- Content Column -->
<div class="col-lg-6 mb-4">

  <!-- Project Card Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">resource</h6> 
    </div>
    <?php 
    $lable=array('progress-bar bg-warning',
    'progress-bar bg-info',
    'progress-bar bg-success',
    'progress-bar bg-danger',
    'progress-bar bg-secondary',
    'progress-bar bg-primary'
    );
    $length=count($store_value);

                      for($i=0;$i< $length;$i++){

                         $value=$store_value[$i];
                        $amount=$store_amount[$i];

                        $perc=round(($store_amount[$i]/ $avalible)*100);
                        if($i>5){
                          $j=$i%5;
                          $lables= $lable[$j];
                        }else{
                          $lables=$lable[$i];
                        }
                        
                      
    
    ?>
    <div class="card-body">
      <h4 class="small font-weight-bold"><?php echo $value ?><span class="float-right"><?php  echo $perc ?>%</span></h4>
      <div class="progress mb-4">
      <div class="<?php echo $lables ?>" role="progressbar" style="<?php echo 'width:'.$perc.'%';?>" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
      </div>

                     
     
    </div>
    <?php } ?>
    </div>
  </div>

  <!-- Color System -->
  <div class="row">
    <div class="col-lg-6 mb-4">
      <div class="card bg-primary text-white shadow">
        <div class="card-body">
          Primary
          <div class="text-white-50 small">#4e73df</div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 mb-4">
      <div class="card bg-success text-white shadow">
        <div class="card-body">
          Success
          <div class="text-white-50 small">#1cc88a</div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 mb-4">
      <div class="card bg-info text-white shadow">
        <div class="card-body">
          Info
          <div class="text-white-50 small">#36b9cc</div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 mb-4">
      <div class="card bg-warning text-white shadow">
        <div class="card-body">
          Warning
          <div class="text-white-50 small">#f6c23e</div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 mb-4">
      <div class="card bg-danger text-white shadow">
        <div class="card-body">
          Danger
          <div class="text-white-50 small">#e74a3b</div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 mb-4">
      <div class="card bg-secondary text-white shadow">
        <div class="card-body">
          Secondary
          <div class="text-white-50 small">#858796</div>
        </div>
      </div>
    </div>
  </div>

</div>

<div class="col-lg-6 mb-4">

  <!-- Illustrations -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">list of an allocated rooms</h6>
    </div>
    <div class="card-body">
      <div class="text-center">
        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="">
      </div>
      <p> <a target="_blank" rel="nofollow" href="https://undraw.co/"></a></p>
      <a target="_blank" rel="nofollow" href="https://undraw.co/"> </a>
    </div>
  </div>

  <!-- Approach -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Allocated rooms</h6>
    </div>
    <div class="card-body">
      <p></p>
      <p class="mb-0"></p>
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

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
<button class="close" type="button" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
<div class="modal-footer">
<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
<a class="btn btn-primary" href="login.html">Logout</a>
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
  <script src="vendor/chart.js/Chart.min.js"></script>
  
  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="js/demo/chart-bar-demo.js"></script>
  
  

</body>

</html>
<?php }  ?>
