<?php
	include_once 'dbconnect.php';

	$name = $_POST['username'];
	$surname = $_POST['usersurname'];
	$iin = $_POST['useriin'];
	$address = $_POST['useraddress'];
	$email = $_POST['useremail'];
	$birthdate = $_POST['userbirthdate'];
	$doctor_clinic = $_POST['doctor_clinic'];
	
	$sql = "UPDATE users SET userName='$name', userSurname='$surname', userIIN='$iin', userAddress='$address', userEmail='$email', userBirthdate='$birthdate' WHERE userEmail = '$email'";
	$res = mysql_query($sql);
	
	if(!empty($doctor_clinic)){
		$clinic_sql = "UPDATE clinic SET clinicName='$doctor_clinic' WHERE userIIN = '$iin'";
		$clinic_res = mysql_query($clinic_sql);		
	}else{
		$doctor_clinic = TRUE;
	}

	if($res){
		if($doctor_clinic){
			header("Location: cabinet.php");	
		}
	}else{
		die('Could not get data: ' . mysql_error());
	}
	exit;
?>