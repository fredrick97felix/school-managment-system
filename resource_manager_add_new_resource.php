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
        $inventory=$_POST['inventory'];
        $name=$_POST['name'];
        $type=$_POST['type'];
        $status=$_POST['status'];
        $specification=$_POST['specification'];
        $school_reg_no=$_SESSION['school_reg_no'];



    
  
    $sql="INSERT INTO `inventory` (	inventory_number ,	name ,	type ,	specification ,school_reg_no, status)VALUE('$inventory','$name','$type','$specification','$school_reg_no','$status')";
    if(mysqli_query($con,$sql)){
         $msg_success="you have successfully inserted new resource";
        
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
                $inventory = $worksheet->getCellByColumnAndRow(0,$row)->getValue();
                $name= $worksheet->getCellByColumnAndRow(1,$row)->getValue();
                $type= $worksheet->getCellByColumnAndRow(2,$row)->getValue();
                $specification= $worksheet->getCellByColumnAndRow(3,$row)->getValue();
                $school_reg_no= $_SESSION['school_reg_no'];
                $status= $worksheet->getCellByColumnAndRow(4,$row)->getValue();


                $sql="INSERT INTO `inventory` (	inventory_number ,	name ,	type ,	specification ,school_reg_no, status)VALUE('$inventory','$name','$type','$specification','$school_reg_no','$status')";
                if(mysqli_query($con,$sql)!=false){
                  $inserted++;

                }else{
                  $not_inserted++;
                }
               
              }
            }
            if($not_inserted==0){
              $file_success_msg ="you have successfully inserted new resources";
             
             
         }else{
          $file_msg="$not_inserted row where not inserted ";

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
                    <h1 class="h3 mb-4 text-gray-800">Add new resources</h1>
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
        <form action="resource_manager_add_new_resource.php" method="post" enctype="multipart/form-data">
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
                <div class="col-4 mb-3">inventory number</div>
                   <div class="col-8 mb-3">   <input type="text" class="form-control" id="inventory" name="inventory"  value="<?php echo $inventory?>" required="true"></div>
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
                    <div class="col-4 mb-3">specification</div>
                    <div class="col-8 mb-3">
                      <input type="text" class="form-control" id="status" name="specification"  value="<?php echo $specification?>" required="true"></div>
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
    
$(document).ready(function() {
	$('#name').on('keypress', function(key) {
		if((key.charCode < 97 || key.charCode > 122) && (key.charCode < 65 || key.charCode > 90) && (key.charCode != 45)) {
			return false;	
		}
	});
    });

});
function validate() {	
	var valid = true;
	
		
	$("#btn-submit").attr("disabled",true);
	if(valid) {
		$("#btn-submit").attr("disabled",false);
	}
}

  
  
  </script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  
  

</body>

</html>
<?php  }  ?>
