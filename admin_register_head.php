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
  }else if($_SESSION['rank']!="admin"){
    echo "<h1>you need to login as admin <h1>";
    header("refresh:2;url=index.php");
    session_destroy();
 
  }else{ 

     
    $session_id=$_SESSION['reg_no'];
   if(isset($_POST['add'])){
        $School_reg_no=$_POST['school_reg_no'];
        $Reg_no=$_POST['Reg_no'];
        $Fname=$_POST['Fname'];
        $Mname=$_POST['Mname'];
        $Lname=$_POST['Lname'];
        $rank="headmaster";

        $query="SELECT `school_reg_no` 
                FROM   `school`
                 WHERE  school_Reg_no='$School_reg_no'";

       $run=mysqli_query($con,$query);

        //if(mysqli_num_rows($run)==1){

          $qury="SELECT `school_reg_no` ,`rank` 
                FROM   `staff`
                 WHERE  school_Reg_no='$School_reg_no' && rank=='headmaster'";
           $run2=mysqli_query($con,$qury); 

         if(mysqli_num_rows($run2)==0){
            $sql="INSERT INTO `staff` (reg_no,first_name,second_name,last_name,school_reg_no,rank )VALUE('$Reg_no','$Fname','$Mname','$Lname','$School_reg_no','$rank')";
        if(mysqli_query($con,$sql)){
         $msg_success="you have successfully inserted the headmaster";
        
        }else{
          $msg="item insertion was not successful";

              }
          }else{
            $msg="headmaster to this school exists";
          }

          
     // }else{
      //  $msg="School does not exist";
     // }

        }



        if(isset($_POST["import"])){

          $file_name=$_FILES['file']['name'];
          $file_type=$_FILES['file']['type'];
          $tmp_name=$_FILES['file']['tmp_name'];
          $extension=substr($file_name,strpos($file_name,'.')+1);
          $inserted=0;
          $not_inserted=0;
      
         
         
         
      
          if(isset($file_name) && $file_name!=""){
              if($extension=="xls" || $extension=="xlsx"){
                require'includes/PHPExcel/Classes/PHPExcel.php';
                require_once'includes/PHPExcel/Classes/PHPExcel/IOFactory.php';
                
      
                  
                  $objPHPExcel= PHPExcel_IOFactory::load($tmp_name);
                  foreach($objPHPExcel->getWorksheetIterator() as $worksheet){
                    $highestRow=$worksheet->getHighestRow();
                    for($row=2;$row<=$highestRow;$row++){
                      $School_reg_no= $worksheet->getCellByColumnAndRow(0,$row)->getValue();
                      $Reg_no= $worksheet->getCellByColumnAndRow(1,$row)->getValue();
                      $Fname= $worksheet->getCellByColumnAndRow(2,$row)->getValue();
                      $Lname= $worksheet->getCellByColumnAndRow(3,$row)->getValue();
                      $Lname= $worksheet->getCellByColumnAndRow(4,$row)->getValue();
                      $rank="headmaster";

                      $query="SELECT `school_reg_no` 
                FROM   `school`
                 WHERE  school_Reg_no='$School_reg_no'";

       $run=mysqli_query($con,$query);

        if(mysqli_num_rows($run)==1){

          $qury="SELECT `school_reg_no` ,`rank` 
                FROM   `staff`
                 WHERE  school_Reg_no='$School_reg_no' && rank=='headmaster'";
           $run2=mysqli_query($con,$qury); 

          if(mysqli_num_rows($run2)==0){
            $sql="INSERT INTO `staff` (reg_no,first_name,second_name,last_name,school_reg_no,rank )VALUE('$Reg_no','$Fname','$Mname','$Lname','$School_reg_no','$rank')";
        if(mysqli_query($con,$sql)){
              $inserted++;
        
        }else{
          $not_inserted++;

              }
          }else{
            $not_inserted++;
          }

          
      }else{
        $not_inserted++;
      }

                      
                      
                     
                    }
                  }
                  
         if($not_inserted==0){
          $file_success_msg="Information was successfully inserted";
         }else{
          $file_msg=$not_inserted."where not inserted";
  
         }
                  
                    
            }else{
           $file_msg="file not excel";
           }
    
  
               }else{
                  $file_msg="empty  field";
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
          
          <div class="row" style="margin-top:1%">
                    <h1 class="h3 mb-4 text-gray-800">Register Headmaster</h1>
                    <div class="col-7"></div>
                    <button type="button" class="btn btn-success col-2" data-toggle="modal" data-target="#exampleModalCenter">
                      import execl file <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-spreadsheet-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M2 3a2 2 0 0 1 2-2h5.293a1 1 0 0 1 .707.293L13.707 5a1 1 0 0 1 .293.707V13a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3zm7 2V2l4 4h-3a1 1 0 0 1-1-1zM3 8v1h2v2H3v1h2v2h1v-2h3v2h1v-2h3v-1h-3V9h3V8H3zm3 3V9h3v2H6z"/>
</svg>
                    </button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">File picker</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="admin_register_head.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        
      </div>
      <div class="modal-footer">
      
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" value="import" name="import" class="btn btn-success">
      </div>
      </form>
    </div>
  </div>
</div>
                    </div>

                    <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
     } ?></p>
   <p style="font-size:16px; color:green" align="center">  <?php if($msg_success){
    echo $msg_success;
   } ?></p>
   <p style="font-size:16px; color:green" align="center">  <?php if($file_success_msg){
    echo $file_success_msg;
   } ?></p>
   <p style="font-size:16px; color:red" align="center">  <?php if($file_msg){
    echo $file_msg ;
   } ?></p>

   <!----- javascript for form submistion--->
   <script>
   function checkform(){
   
   }
   </script>

<form name="addNewResource" action="admin_register_head.php " class="user" method="post" onsubmit="return checkform();">
  
    <div class="row">
                   <div class="col-8 mb-3">   <input type="hidden" class="form-control" id="" name="inventory"  value="<?php echo $p; ?>" required="true"></div>
                    </div> 
               <div class="row">
                <div class="col-4 mb-3">school registration number</div>
                   <div class="col-8 mb-3">   <input type="text" class="form-control" id="inventory" name="school_reg_no"  value="<?php echo $School_reg_no?>" required="true"></div>
                    </div>  
                    <div class="row">
                      <div class="col-4 mb-3"> Registration number </div>
                     <div class="col-8 mb-3">  <input type="text" class="form-control" id="name" name="Reg_no"  value="<?php echo $School_name?>" required="true"></div>  
                     </div>



                    <div class="row">
                    <div class="col-4 mb-3">First Name</div>
                    <div class="col-8 mb-3">
                      <input type="text" class="form-control" id="type" name="Fname"  value="<?php echo $type?>" required="true"></div>
                    </div>

                    <div class="row">
                    <div class="col-4 mb-3">Middel Name</div>
                    <div class="col-8 mb-3">
                      <input type="text" class="form-control" id="status" name="Mname"  value="<?php echo $specification?>" required="true"></div>
                    </div>


                    <div class="row">
                    <div class="col-4 mb-3">Last Name</div>
                    <div class="col-8 mb-3">
                      <input type="text" class="form-control" id="status" name="Lname"  value="<?php echo $status?>" required="true"></div>
                                
                    </div>

                    

                   <div class="row" style="margin-top:4%">
                      <div class="col-4"></div>
                      <div class="col-4">
                      <input type="submit" id="" name="add"  value="ADD" class="btn btn-primary btn-user btn-block">
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
   

</body>

</html>
<?php }  ?>
