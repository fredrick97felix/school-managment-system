<?php
include('includes/dbconnection.php');
 $no =$_GET['no_bud'];

 $sql="delete from room where no='$no' ";

 $run=mysqli_query($con,$sql);

 if($run){

  mysqli_close($con);
  header("location:resource_manager_view_building_list (.php");
  exit;
 }else{

  echo"error on delete";
 }

?>