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
  
  <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  
  
  
  

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
     
      <div class="card shadow mb-4">
          <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">LIST OF RESOURCES</h6>
          
                </div>
                <div class="card-body">
                <div class="chart-bar">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>inventory no</th>
                      <th>name</th>
                      <th>type</th>
                      <th>	specification</th>
                      <th>status</th>
                      <th>edit</th>
                      <th>delete</th>
                    </tr>
                  </thead>
                  
                  <tbody>

                  <?php
                  $school_reg_no=$_SESSION['school_reg_no'];
                  $search=$_POST['search'];


                  
                
                
                 
                  $sql="SELECT `inventory_number` , `name`, `type` , `specification` , `status`
                  FROM   `inventory`
                  WHERE  school_Reg_no='$school_reg_no' ";
              
                  $query=mysqli_query($con,$sql);
                  
                  
                  while($ret=mysqli_fetch_assoc($query)){

                    $inv=$ret['inventory_number'];
                    $nam=$ret['name'];
                    $typ=$ret['type'];
                    $spec=$ret['specification'];
                    $stat=$ret['status'];
                  
                  ?>


                   <tr id='row_<?php echo $inv?>' >
                    <td><?php echo $inv ?></td>
                    <td><?php echo $nam ?></td>
                    <td><?php echo  $typ ?></td>
                    <td><?php echo $spec  ?></td>
                    <td><?php echo $stat ?></td>
                    <td> <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>
                  edit
                </button>  
                <div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class=modal-header>
        <h5 class='modal-title' id='exampleModalLabel'>edit status</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
      <form action='resource_manager_view_resource_list.php' method='post' enctype='multipart/form-data'>
        <lable>status:<lable><input type='text' name='status'>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
        <input type='submit' value='edit' name='edit' class='btn btn-success'>
        </form>

        <?php 

        $status=$_POST['status'];
        $edit=$_POST['edit'];

        if(isset($edit)){

        if($status!="" ){
          header("location:edit_status.php?inventory_no=<?php echo $inv;?> status=<?php echo $status ;?>");

        }

        }

        
        ?>

      </div>
    </div>
  </div>
</div></td>

                   
          <td><a href="delete_inventory.php?inventory_no=<?php echo $inv; ?>" class="btn btn-danger btn-lg active" role="button" aria-pressed="true"> delete<svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-trash-fill' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                   <path fill-rule='evenodd' d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z'/>
                   </svg> </a>  </td>
                   </tr>
                  <?php } ?>

                  

                    
                  

                  
                
                  

                  
                  
                  
                  
                    
                  </tbody>
                </table>
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
  

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script src="edit_and_delete/edit_0r_delete.js"></script>
  <script src="http://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready( function () {
    $('#dataTable').DataTable();
} );
  </script>
  

</body>

</html>
<?php }  ?>
