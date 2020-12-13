<?php
require_once("DBController.php");
$db_handle = new DBController();

$action = $_POST["action"];
if(!empty($action)) {
	switch($action) {

			
		

		case "delete":
		    if(!empty($_POST["row-id"])) {
		        $query = "DELETE FROM `inventory`  WHERE id=".$_POST["row-id"];
		        $result = $db_handle->execute($query);
			}
			break;
	}
}
?>
