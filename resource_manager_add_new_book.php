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
    $session_id=$_SESSION['reg_no'];
  if(isset($_POST['add'])){

        $id=$_POST['id'];
        $name=$_POST['name'];
        $type=$_POST['type'];
        $status=$_POST['status'];
        $school_reg_no=$_SESSION['school_reg_no'];
        $name=$_POST['name'];



  
  
    $sql="INSERT INTO `school_text_books` (	id ,	name ,	type ,school_reg_no, status)VALUE('$id','$name','$type','$school_reg_no','$status')";
    if(mysqli_query($con,$sql)){
         $msg_success="you have successfully inserted new book";
        
    }else{
         $msg="item insertion was not successful";
    }
  

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
                $id= $worksheet->getCellByColumnAndRow(0,$row)->getValue();
                $name= $worksheet->getCellByColumnAndRow(1,$row)->getValue();
                $type= $worksheet->getCellByColumnAndRow(2,$row)->getValue();
                $school_reg_no= $_SESSION['school_reg_no'];
                $status= $worksheet->getCellByColumnAndRow(3,$row)->getValue();


                $sql="INSERT INTO `school_text_books` (	id ,	name ,	type ,school_reg_no, status)VALUE('$id','$name','$type','$school_reg_no','$status')";
                if(mysqli_query($con,$sql)!=false){
                  $inserted++;

                }else{
                  $not_inserted++;
                }
               
              }
            }
            if($not_inserted==0){
              $file_success_msg ="you have successfully inserted new resources";
              //header('location:resource_manager_add_new_book.php');
             
         }else{
          $file_msg="some data was not inserted ";

         }
            
              
            
   
     }else{
    $file_msg="file not execl";
   }

  }else{
    $file_msg="file can not be empty";
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

          <!-- content here -->
                    <!-- Page Heading -->
                
                    <div class="row" style="margin-top:1%">
                    <h1 class="h3 mb-4 text-gray-800">Add new books</h1>
                    <div class="col-7"></div>
                    <button type="button" class="btn btn-success col-2" data-toggle="modal" data-target="#exampleModalCenter">
                      import execl file
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
      <form action="resource_manager_add_new_book.php" method="post" enctype="multipart/form-data">
      <div class="input-group-prepend">
        <input type="file" name="file">
        </div>
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

                    <?php if($msg){
                  
                  echo" <div style=\" margin:0 auto;\">
                  <div class=row>
                  <div class =col-sm-4 col-md-4 col-lg-4> </div>

                  <div class =col-sm-4 col-md-4 col-lg-4> 
                  
                  <div class=\"alert alert-danger w-75\" role=\"alert\">
                   <p style=\"font-size:16px; color:red\" align=\"center\"> 
                   $msg
                    </p>
 
                  </div> 

                  </div>

                  <div class =col-sm-4 col-md-4 col-lg-4> </div>
                  
                  </div>";
                   }
                  ?>

              <?php if($file_msg){ 
                 
                 echo" <div style=\" margin:0 auto;\">
                 <div class=row>
                 <div class =col-sm-4 col-md-4 col-lg-4> </div>

                 <div class =col-sm-4 col-md-4 col-lg-4> 
                 
                 <div class=\"alert alert-danger w-75\" role=\"alert\">
                  <p style=\"font-size:16px; color:red\" align=\"center\"> 
                  $file_msg
                   </p>

                 </div> 

                 </div>

                 <div class =col-sm-4 col-md-4 col-lg-4> </div>
                 
                 </div>";
                  }
                 ?>
                    <?php if( $msg_success){
                 
                 echo" <div style=\" margin:0 auto;\">
                  <div class=row>
                  <div class =col-sm-4 col-md-4 col-lg-4> </div>

                  <div class =col-sm-4 col-md-4 col-lg-4> 
                  
                  <div class=\"alert alert-success w-75\" role=\"alert\">
                   <p style=\"font-size:16px; color:green\" align=\"center\"> 
                   $msg_success
                    </p>
 
                  </div> 

                  </div>

                  <div class =col-sm-4 col-md-4 col-lg-4> </div>
                  
                  </div>";
                  }
                 ?>
 
  
                 <?php if($file_success_msg){
                 
                 echo" <div style=\" margin:0 auto;\">
                 <div class=row>
                 <div class =col-sm-4 col-md-4 col-lg-4> </div>

                 <div class =col-sm-4 col-md-4 col-lg-4> 
                 
                 <div class=\"alert alert-success w-75\" role=\"alert\">
                  <p style=\"font-size:16px; color:green\" align=\"center\"> 
                  $file_success_msg
                   </p>

                 </div> 

                 </div>

                 <div class =col-sm-4 col-md-4 col-lg-4> </div>
                 
                 </div>";
                  }
                 ?>
 
                  
                  
   <!----- javascript for form submistion--->
   <script>
   function checkform(){
   
   }
   </script>

<form name="addNewResource" action=" " class="user" method="post" onsubmit="return checkform();">
  
    <div class="row">
                   <div class="col-8 mb-3">   <input type="hidden" class="form-control" id="" name="inventory"  value="<?php echo $p; ?>" required="true"></div>
                    </div> 
               <div class="row">
                <div class="col-4 mb-3">id</div>
                   <div class="col-8 mb-3">   <input type="text" class="form-control" id="id" name="id"  value="<?php echo $inventory?>" required="true"></div>
                    </div>  
                    <div class="row">
                      <div class="col-4 mb-3">Name </div>
                     <div class="col-8 mb-3">  <input type="text" class="form-control" id="name" name="name"  value="<?php echo $_POST['name'] ?>" required="true"></div>  
                     </div>



                    <div class="row">
                    <div class="col-4 mb-3">type</div>
                    <div class="col-8 mb-3">
                      <input type="text" class="form-control" id="type" name="type"  value="<?php echo $type?>" required="true"></div>
                    </div>

                    

                    <div class="row">
                    <div class="col-4 mb-3">Status</div>
                    <div class="col-8 mb-3">
                      <input type="text" class="form-control" id="status" name="status"  value="<?php echo $status?>" required="true"></div>
                                
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
  <script>
  $(document).ready(function(){

   $(#send).click(function(e){
     e.preventDefault();





   });

  });
  
  
  </script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  
  

</body>

</html>
<?php }  ?>
