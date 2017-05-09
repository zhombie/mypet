<?php
    session_start();

    require_once 'dbconnect.php';

   	$iin = $_GET['userIIN'];

   	if(!empty($iin)){
		$sql = "DELETE FROM doctor WHERE userIIN=".$iin;
		$res = mysql_query($sql);

		if($res){
			echo "success";
			header("Location: cabinet.php");
    	
		}else{
			echo "not";
		}
	}else{
		echo "empty iin";
	}
	                    
    exit;
?>