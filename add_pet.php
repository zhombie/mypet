<?php

	include_once 'dbconnect.php';

    $pet_category = isset($_POST['pet_category']) ? $_POST['pet_category'] : false; 

	$dob_day = isset($_POST['dob_day']) ? $_POST['dob_day'] : false;
    $dob_month = isset($_POST['dob_month']) ? $_POST['dob_month'] : false;
    $dob_year = isset($_POST['dob_year']) ? $_POST['dob_year'] : false;

    $iin = $_POST['simple_user_iin'];

    if(empty($iin)){
    	echo "Empty IIN";
    }else if(empty($pet_category)){
		echo "Empty category";
	}else if(empty($dob_day) && empty($dob_month) && empty($dob_year)){
		echo "Empty DD/MM/YY";
	}else{
        
        $pet_query = "INSERT INTO pet(petCategory, petDobDay, petDobMonth, petDobYear, userIIN) VALUES('$pet_category', '$dob_day', '$dob_month', '$dob_year', '$iin')";
        $pet_res = mysql_query($pet_query);
        if($pet_res){
        	echo "success";
     		header("Location: cabinet.php");
        }else{
        	echo "not success";
        }
	}
	exit;
?>