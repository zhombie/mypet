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
	
	<script type="text/javascript" src="js/for_ajax.js"></script>
	<!-- <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/caladea" type="text/css"/> -->
</head>
<body>
	<div class="feed_page_total">
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

		<?php
			$id = $_POST['feed_id'];
			echo "<div class='container'>";
			echo "<div class='row'>";
				echo "<div class='col-lg-6 col-lg-offset-5' style='margin-top:50px'>";
					echo "<a type='button' href='index.php' class='feed_page_back'>Назад</a>";
				echo "</div>";	
			echo "</div>";
			echo "<div class='more'>";
			echo "<div class='row'>";
			echo "<div class='col-lg-10 col-lg-offset-2'>";
			
			$feed = "SELECT * FROM feed WHERE feedId=".$id;
			$row = mysql_query($feed, $conn);

			if(! $id ) {
				die('Could not get data: ' . mysql_error());
			}
			while($parsed = mysql_fetch_array($row, MYSQL_ASSOC)) {
				echo "<div class='row'>";				
					echo "<div class='col-lg-6'>";
						echo "<p class='feed_page_heading'>".$parsed['feedHeading']."</p>";
						echo "<p class='feed_page_email'>".$parsed['userEmail']."</p>";
						echo "<p class='feed_page_date'>".$parsed['feedDate']."</p>";
					echo "</div>";
				echo "</div>";

				echo "<div class='row'>";
					echo "<div class='col-lg-4'>";
						echo "<img src='img/".$parsed['feedImg']."' class='feed_page_img'>";
					echo "</div>";

					echo "<div class='col-lg-6'>";
						echo "<p class='text feed_page_text'>".$parsed['feedText']."</p>";
					echo "</div>";
				echo "</div>";
			}
			
			
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
		?>
	</div>
</body>
</html>