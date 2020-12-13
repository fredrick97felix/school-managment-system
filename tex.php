<?php

$school_reg_no="S1277"; 

include('includes/dbconnection.php');

  

                    

                        $school_reg_no="S1277";

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

                       $length=count($store_value);

                      for($i=0;$i< $length;$i++){

                        echo $store_value[$i];
                      }


                           










?>