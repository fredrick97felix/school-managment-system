<?php

$filename=$_FILES['file']['name'];
$filetype=$_FILES['file']['type'];
if($filename!=""){
if($filetype!='xls'){
    echo"not execl";
}else{
    echo"$filename";
}
}













?>
<form action="input.php" method="post" enctype="multipart/form-data">
<input type="file" name="file">
<input type="submit" value="import" name="import" class="btn btn-success">
</form>