<?php

	include_once 'dbconnect.php';

	$doctor = $_POST['doctor_iin'];
	$client = $_POST['client_iin'];
	
	if(empty($client)){
		echo "Empty IIN";
	}else if($client == $doctor){
		echo "You cannot itself as client";
	}else{
	
		$check_sql = "SELECT * FROM users WHERE userIIN='$client'";
		$check_res = mysql_query($check_sql);

		if (mysql_num_rows($check_res) < 1){
			echo "We have no client with IIN = ".$client;
		}else{
			$get = "SELECT userName, userSurname, userIIN, userType FROM users WHERE userIIN='$client'";
			$result = mysql_query($get);

			if($result){
				while($rowt = mysql_fetch_array($result, MYSQL_ASSOC)) {
					$client_name = $rowt['userName'];
					$client_surname = $rowt['userSurname'];
					
					if($rowt['userType'] == 1){
						echo "You cannot add doctor as a client";
					}else{
						$query = "INSERT INTO doctor(doctorIIN,userName,userSurname,userIIN) VALUES('$doctor', '$client_name', '$client_surname', '$client')";
						$res = mysql_query($query);
						
						if($res){
							echo "success";
							header("Location: cabinet.php");
						}else{
							echo "not implemented";
						}
					}
				}
			}else{
				echo "not implemented2";
			}	
		}	
	}	
	exit;
?>