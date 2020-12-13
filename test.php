<?php
if(1){
  include('includes/dbconnection.php');
?>
<html>
<head>
<title></title>
<head>

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
      </div>
    </div>
  </div>
</div></td>

                   
                   <td>  <button type='button' class='btn btn-danger'  onClick="callCrudAction('delete',<?php echo $inv  ?>)">delete <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-trash-fill' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                   <path fill-rule='evenodd' d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z'/>
                   </svg></button> </td>
                   </tr>
                  <?php } ?>

                  

                    
                  

                  
                
                  

                  
                  
                  
                  
                    
                  </tbody>
                </table>
                 
</body>
<script src="vendor/jquery/jquery.min.js"></script>
<script>

function fn1(){
  $('#heading1').fadeOut();
}
</script>
</html>





  
<?php }?>