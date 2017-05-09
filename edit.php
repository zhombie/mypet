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
	<script type="text/javascript">
		document.getElementById('add_ava').onchange = function (e) {
		    loadImage(
		        e.target.files[0],
		        function (img) {
		            document.body.appendChild(img);
		        }
		    );
		};
	</script>

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
			<div class="info">
				<div class="row">
					<div class="col-lg-10 col-lg-offset-1">
						<div class="row">
							<a href="cabinet.php"><p class="pull-right">Отменить</p></a>
						</div>
						<div class="row">
							<div class="col-lg-4 change_avatar">
								<img src="img/<?php 
													if(!empty($userRow['userAvatar'])) { 
														echo $userRow['userAvatar']; 
													} else{ 
														echo "steve.png";
													}
												?>" class="info_image">
								<div class="middle">
								    <div class="hover_text">
								    	<?php 
											echo "<form method='post' action='add_avatar.php' autocomplete='off'>";
											echo "<input type='hidden' name='sent_iin' value='".$userRow['userIIN']."' >";
											echo "<input type='file' id='add_ava' name='add_avatar' value='Добавить фото' />"; 
											echo "<button class='ava_add_btn' type='submit'>Готово</button>";
											echo "</form>";
										?>
									</div>
								</div>
							</div>

							<div class="col-lg-6 edit_right_info">
								<form method="post" action="edit_info.php" autocomplete="off">
									<table class="table table-hover">
									    <tbody>
									      	<tr>
									        	<td class="edit_td"><span class="left_circle">•</span>Имя</td>
									        	<td><input value="<?php echo $userRow['userName']; ?>" class="edit_input" name="username"></td>
									      	</tr>
									      	<tr>
									        	<td class="edit_td"><span class="left_circle">•</span>Фамилия</td>
									        	<td><input value="<?php echo $userRow['userSurname']; ?>" class="edit_input" name="usersurname"></td>
									      	</tr>
										    <tr>
										        <td class="edit_td"><span class="left_circle">•</span>ИИН</td>
										        <td><input value="<?php echo $userRow['userIIN']; ?>" class="edit_input" name="useriin"></td>
										    </tr>
									      	<tr>
										        <td class="edit_td"><span class="left_circle">•</span>Адрес</td>
										        <td><input value="<?php echo $userRow['userAddress']; ?>" class="edit_input" name="useraddress"></td>
									        </tr>
									      	<tr>
										        <td class="edit_td"><span class="left_circle">•</span>E-mail</td>
										        <td><input value="<?php echo $userRow['userEmail']; ?>" class="edit_input" name="useremail"></td>
									        </tr>
									      	<tr>
										        <td class="edit_td"><span class="left_circle">•</span>День рождения</td>
										        <td><input value="<?php echo $userRow['userBirthdate']; ?>" class="edit_input" name="userbirthdate"></td>
									      	</tr>
									      	<?php 
									      		if($userRow['userType']==1){
										    		echo "<tr>";
										        	echo "<td class='edit_td'><span class='left_circle'>•</span>Место работы</td>";
										        	
										        	$clinic_sql = "SELECT * FROM clinic WHERE userIIN=".$userRow['userIIN'];
								
													$clinic_res = mysql_query($clinic_sql, $conn);

													if(! $clinic_res) {
														die('Could not get data: ' . mysql_error());
													}

													while($parsed_clinic = mysql_fetch_array($clinic_res, MYSQL_ASSOC)) {
										        		echo "<td>";
										        		echo "<input value='".$parsed_clinic['clinicName']."' class='edit_input' name='doctor_clinic'>";
										        		echo "</td>";
									      			}
									      			echo "</tr>";
									      		}
									      	?>
									    </tbody>
									</table>
									<button class="done_btn" type="submit">Готово</button>
								</form>
							</div>
						</div>

						
					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="js/load-image.all.min.js"></script>
	</div>
</body>
</html>