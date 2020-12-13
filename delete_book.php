<?php
include('includes/dbconnection.php');
 $no =$_GET['no'];

 $sql="delete from school_text_books where no='$no' ";

 $run=mysqli_query($con,$sql);

 if($run){

  mysqli_close($con);
  header("location:resource_manager_view_book_list .php");
  exit;
 }else{

  echo"error on delete";
 }

?>