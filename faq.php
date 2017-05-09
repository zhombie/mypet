<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	
	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: login.php");
		exit;
	}

	// select loggedin users detail
	$res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);

?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
	<link rel="stylesheet" type="text/css" href="css/style.css"></link>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="css/sweet-alert.css">
	<link rel="stylesheet" href="css/quiz.css">
	<style>
	#quiz {
		height: 600px;
		display: block;
	}
	</style>
	<!-- <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/caladea" type="text/css"/> -->
</head>
<body>
	<div class="total">
		<div class="header container-fluid">
			<div class="container">
				<div class="in_header">
					<a href="index.php">
						<div class="logo">
							<p>mypet</p>
						</div>
					</a>

					<div class="right_header">
						<ul class="navbar_list">
							<li class="other"><a href="index.php">главная</a></li>
							<li class="other"><a href="cabinet.php">кабинет</a></li>
							<li class="other"><a href="poleznoe.php">полезное</a></li>
							<li class="login_button"><a href="logout.php?logout">выйти</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="container-fluid">
		    <div id="quiz"></div>
		</div>
		<script src="js/sweet-alert.min.js"></script>
		<script src="js/quiz.js"></script>
		<script>
			$(function() {
				$('#quiz').quiz("unicorns.json");
			});
		</script>
	</div>
</body>
</html>