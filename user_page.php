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
	<!-- <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/caladea" type="text/css"/> -->
</head>
<body>
	<div class="total_cabinet">
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

		<div class="container cabinet">
			<div class="row">
				<div class='col-lg-6 col-lg-offset-5' style='margin-top:50px'>
					<a type='button' href='cabinet.php' class='feed_page_back'>Назад</a>
				</div>	
		    </div>
			<div class="info">
				<div class="row">
					<div class="col-lg-10 col-lg-offset-1">
						<div class="row">
							<?php
								$iin = $_GET['userIIN'];
								
							    $user_sql = "SELECT * FROM users WHERE userIIN='$iin'";
							    $user_res = mysql_query($user_sql, $conn);

							    if(! $user_res ) {
							        die('Could not get data: ' . mysql_error());
							    }

							    while($parsed_user = mysql_fetch_array($user_res, MYSQL_ASSOC)) {
							?>
							<div class="col-lg-4">
								<img src="img/<?php 
													if(!empty($parsed_user['userAvatar'])) { 
														echo $parsed_user['userAvatar']; 
													} else{ 
														echo "steve.png";
													}
													
												?>" class="info_image">
							</div>

							<div class="col-lg-6 right_info">
								<table class="table table-hover">
								    <tbody>
								        <tr>
									        <td class="td"><span class="left_circle">•</span>Имя</td>
									        <td><?php echo $parsed_user['userName']; ?></td>
								        </tr>
								        <tr>
									        <td class="td"><span class="left_circle">•</span>Фамилия</td>
									        <td><?php echo $parsed_user['userSurname']; ?></td>
								        </tr>
								        <tr>
									        <td class="td"><span class="left_circle">•</span>ИИН</td>
									        <td><?php echo $parsed_user['userIIN']; ?></td>
								        </tr>
								        <tr>
									        <td class="td"><span class="left_circle">•</span>Адрес</td>
									        <td><?php echo $parsed_user['userAddress']; ?></td>
								        </tr>
								        <tr>
									        <td class="td"><span class="left_circle">•</span>E-mail</td>
									        <td><?php echo $parsed_user['userEmail']; ?></td>
								        </tr>
								        <tr>
									        <td class="td"><span class="left_circle">•</span>День рождения</td>
									        <td><?php echo $parsed_user['userBirthdate']; ?></td>
								        </tr>
								        
								        <?php 
											if($userRow['userType']==0){
												echo "<tr>";
											    echo "<td class='td'><span class='left_circle'>•</span>Место работы</td>";
											    
											    $clinic_sql = "SELECT * FROM clinic WHERE userIIN=".$parsed_user['userIIN'];
								
												$clinic_res = mysql_query($clinic_sql, $conn);

												if(! $clinic_res) {
													die('Could not get data: ' . mysql_error());
												}

												while($parsed_clinic = mysql_fetch_array($clinic_res, MYSQL_ASSOC)) {
											    	echo "<td>".$parsed_clinic['clinicName']."</td>";
											    }
										        echo "</tr>";			
											}else{
												echo "<tr>";
											    echo "<td class='td'><span class='left_circle'>•</span>ИИН ветеринара</td>";
											    
											    $doctor_sql = "SELECT * FROM doctor WHERE userIIN=".$parsed_user['userIIN'];
								
												$doctor_res = mysql_query($doctor_sql, $conn);

												if(! $doctor_res) {
													die('Could not get data: ' . mysql_error());
												}

												while($parsed_doctor = mysql_fetch_array($doctor_res, MYSQL_ASSOC)) {
											    	echo "<td>".$parsed_doctor['doctorIIN']."</td>";
											    }
										        echo "</tr>";
											}
										}
								        ?>
								    </tbody>
								</table>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>