<?php
    session_start();

    require_once 'dbconnect.php';

   	$iin = $_GET['userIIN'];
	$pet_category = $_GET['category']; 

   	if(!empty($iin)){
		$sql = "DELETE FROM pet WHERE userIIN='$iin' AND petCategory='$pet_category'";
		$res = mysql_query($sql);

		if($res){
			echo "success";
			// echo $sql;
			header("Location: cabinet.php");
    	
		}else{
			echo "not";
		}
	}else{
		echo "empty iin";
	}
	                    
    exit;
?>