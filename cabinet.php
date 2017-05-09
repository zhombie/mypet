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

	<script src="js/dobPicker.min.js"></script>
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
							<a href="edit.php"><p class="pull-right">Изменить данные</p></a>
						</div>
						<div class="row">
							<div class="col-lg-4">
								<img src="img/<?php 
													if(!empty($userRow['userAvatar'])) { 
														echo $userRow['userAvatar']; 
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
									        <td><?php echo $userRow['userName']; ?></td>
								        </tr>
								        <tr>
									        <td class="td"><span class="left_circle">•</span>Фамилия</td>
									        <td><?php echo $userRow['userSurname']; ?></td>
								        </tr>
								        <tr>
									        <td class="td"><span class="left_circle">•</span>ИИН</td>
									        <td><?php echo $userRow['userIIN']; ?></td>
								        </tr>
								        <tr>
									        <td class="td"><span class="left_circle">•</span>Адрес</td>
									        <td><?php echo $userRow['userAddress']; ?></td>
								        </tr>
								        <tr>
									        <td class="td"><span class="left_circle">•</span>E-mail</td>
									        <td><?php echo $userRow['userEmail']; ?></td>
								        </tr>
								        <tr>
									        <td class="td"><span class="left_circle">•</span>День рождения</td>
									        <td><?php echo $userRow['userBirthdate']; ?></td>
								        </tr>
								        <?php 
											if($userRow['userType']==1){
												echo "<tr>";
											    echo "<td class='td'><span class='left_circle'>•</span>Место работы</td>";
											    
											    $clinic_sql = "SELECT * FROM clinic WHERE userIIN=".$userRow['userIIN'];
								
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
											    
											    $doctor_sql = "SELECT * FROM doctor WHERE userIIN=".$userRow['userIIN'];
								
												$doctor_res = mysql_query($doctor_sql, $conn);

												if(! $doctor_res) {
													die('Could not get data: ' . mysql_error());
												}

												while($parsed_doctor = mysql_fetch_array($doctor_res, MYSQL_ASSOC)) {
											    	echo "<td><a href='user_page.php?userIIN=".$parsed_doctor['doctorIIN']."'>".$parsed_doctor['doctorIIN']."</td>";
											    }
										        echo "</tr>";
											}
								        ?>
								    </tbody>
								</table>
							</div>
						</div>

						<div class="row">						
							<div class="pet_div">
								<span class="h2">
									<?php 
										if($userRow['userType']==0){
											echo "Питомцы";		
										}else{
											echo "Клиенты";
										}
									?>
								</span>
								<?php 
									if($userRow['userType']==1){
										echo "<button class='pull-right add_client_btn' data-toggle='modal' data-target='#myModal'>Добавить клиента</button>";		
									}else{
										echo "<button class='pull-right add_client_btn' data-toggle='modal' data-target='#myPetModal'>Добавить питомца</button>";
									}
								?>
								<div class="modal fade" id="myModal" role="dialog">
									<div class="modal-dialog modal-sm">
										<form method="post" action="add_client.php" autocomplete="off">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title">Добавить клиента</h4>
												</div>
												<div class="modal-body">
													<input type="hidden" name="doctor_iin" value="<?php echo $userRow['userIIN']; ?>">
													<input class="add_client" name="client_iin">
												</div>
												<div class="modal-footer">
													<button type="submit" class="btn btn-success">Добавить</button>
												</div>
											</div>
										</form>
									</div>
								</div>

								<div class="modal fade" id="myPetModal" role="dialog">
									<div class="modal-dialog modal-sm">
										<form method="post" action="add_pet.php" autocomplete="off">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title">Добавить питомца</h4>
												</div>
												<div class="modal-body">
													<input type="hidden" name="simple_user_iin" value="<?php echo $userRow['userIIN']; ?>">
													<div class="row">
										        		<div class="user_type_div">
															<select class="selected" name="pet_category">
																<option>Выберите категорию</option>
																<option class="category_pick" value="Собака">Собака</option>
																<option class="category_pick" value="Кот">Кот</option>
																<option class="category_pick" value="Рыбы">Рыбы</option>
																<option class="category_pick" value="Птица">Птица</option>
																<option class="category_pick" value="Грызуны">Грызуны</option>
															</select>
														</div>
													</div>
													<div class="dob_selected">
														<select id="dobday" class="selected" name="dob_day"></select>
														<select id="dobmonth" class="selected" name="dob_month"></select>
														<select id="dobyear" class="selected" name="dob_year"></select>
														<!-- And here's the library being called! -->
														<script>
															$(document).ready(function() {
																$.dobPicker({
																	daySelector: '#dobday', /* Required */
																	monthSelector: '#dobmonth', /* Required */
																	yearSelector: '#dobyear', /* Required */
																	dayDefault: 'День', /* Optional */
																	monthDefault: 'Месяц', /* Optional */
																	yearDefault: 'Год', /* Optional */
																	minimumAge: 0, /* Optional */
																	maximumAge: 80 /* Optional */
																});
															});
														</script>
													</div>
												</div>
												<div class="modal-footer">
													<button type="submit" class="btn btn-success">Добавить</button>
												</div>
											</div>
										</form>
									</div>
								</div>

								<table class="table">
								    <thead>
								      	<tr>
								      		<?php 
												if($userRow['userType']==0){
													echo "<th>Категория</th>";		
													echo "<th>День рождения</th>";
									        		echo "<th>Удалить</th>";
									        	}else{
													echo "<th>Имя</th>";
													echo "<th>Фамилия</th>";
													echo "<th>ИИН</th>";
													echo "<th>Питомец</th>";
													echo "<th>Удалить</th>";
												}
											?>
								      	</tr>
								    </thead>
								    <tbody>
								      	<?php 
									      	if($userRow['userType']==0){
									      		$sql = "SELECT * FROM pet WHERE userIIN=".$userRow['userIIN'];
								
												$retval = mysql_query($sql, $conn);

												if(! $retval ) {
													die('Could not get data: ' . mysql_error());
												}

												while($rowt = mysql_fetch_array($retval, MYSQL_ASSOC)) {
													echo "<tr>";
													echo "<td>".$rowt['petCategory']."</td>";
													echo "<td>".$rowt['petDobDay']."/".$rowt['petDobMonth']."/".$rowt['petDobYear']."</td>";
													echo "<td><a href='delete_pet.php?userIIN=".$rowt['userIIN']."&category=".$rowt['petCategory']."'>Удалить</a></td>";
													echo "</tr>";
												}
											}else{
												$sql = "SELECT * FROM doctor WHERE doctorIIN=".$userRow['userIIN'];
												
												$retval = mysql_query($sql, $conn);

												if(! $retval ) {
													die('Could not get data: ' . mysql_error());
												}

												while($rowt = mysql_fetch_array($retval, MYSQL_ASSOC)) {
													echo "<tr>";
													echo "<td>".$rowt['userName']."</td>";
													echo "<td>".$rowt['userSurname']."</td>";
													echo "<td><a href='user_page.php?userIIN=".$rowt['userIIN']."'>".$rowt['userIIN']."</a></td>";
													
													$get_pet = "SELECT * FROM pet WHERE userIIN=".$rowt['userIIN'];
												
													$get_pet_res = mysql_query($get_pet, $conn);

													if(! $get_pet_res ) {
														die('Could not get data: ' . mysql_error());
													}

													echo "<td>";
													while($get_pet_parse = mysql_fetch_array($get_pet_res, MYSQL_ASSOC)) {
														echo "<a href='med_karta.php?category=".$get_pet_parse['petCategory']."&userIIN=".$rowt['userIIN']."'>".$get_pet_parse['petCategory']."</a>";

														$if_state = mysql_query("SELECT * FROM med_karta WHERE userIIN='".$rowt['userIIN']."' AND petCategory='".$get_pet_parse['petCategory']."'", $conn);
														if(mysql_num_rows($if_state) > 0){
															echo "<img src='img/healthbook.png' width='25px' style='padding-left:5px;'>";
														}

														echo "<br>";							
													}
													echo "</td>";
													echo "<td><a href='delete.php?userIIN=".$rowt['userIIN']."'>Удалить</a></td>";
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