<?php

	include_once 'dbconnect.php';

	$ava = $_POST['add_avatar'];
	$iin = $_POST['sent_iin'];

	$sql = "UPDATE users SET userAvatar='$ava' WHERE userIIN='$iin'";
	$res = mysql_query($sql);

	if(! $res ) {
        die('Could not get data: ' . mysql_error());
    }

	if($res){
		echo "success";
		header("Location: cabinet.php");
	}else{
		echo $sql;
		echo "not";
	}
	exit;
?>