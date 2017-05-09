<?php
    session_start();

    require_once 'dbconnect.php';

   	$iin = $_GET['userIIN'];
	$pet_category = $_GET['category']; 

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

		<div class="container-fluid cabinet">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 add_med_karta">
						<a href="cabinet.php"><input type="button" value="Назад" class="back_med_karta_btn"></a>
					</div>

					<?php
						$med_karta = "SELECT * FROM med_karta WHERE userIIN='$iin' AND petCategory='$pet_category'";
						$row = mysql_query($med_karta, $conn);

						if(!$row) {
							die('Could not get data: ' . mysql_error());
						}
						
						if(mysql_num_rows($row) < 1){
							echo "<div class='col-lg-2 col-lg-offset-3 add_med_karta'>";
							echo "<form method='post' action='add_med_karta.php' autocomplete='off'>";
							echo "<input type='hidden' value='".$iin."' name='med_karta_iin'>";
							echo "<input type='hidden' value='".$pet_category."' name='med_karta_pet'>";
							echo "<input type='submit' value='Добавить мед. карту' class='add_med_karta_btn'>";
							echo "</form>";
							echo "</div>";
						}else{	
							echo "<div class='col-lg-2 col-lg-offset-3 add_med_karta'>";
							echo "<form method='post' action='edit_med_karta.php' autocomplete='off'>";
							echo "<input type='hidden' value='".$iin."' name='med_karta_iin'>";
							echo "<input type='hidden' value='".$pet_category."' name='med_karta_pet'>";
							echo "<input type='submit' value='Изменить мед. карту' class='add_med_karta_btn'>";
							echo "</form>";
							echo "</div>";
						}
					?>
				</div>
			</div>

			<div class="info_med">
				<div class="row">
					<div class="col-lg-10 col-lg-offset-1">
						<?php
							if(mysql_num_rows($row) < 1){
								echo "<p style='text-align:center'>Нет данных</p>";
							}else{	
								while($parsed = mysql_fetch_array($row, MYSQL_ASSOC)) {	
									echo "<table class='table med_table'>";
									    echo "<thead>";
										    echo "<tr>";
											    echo "<th>Дата поступления</th>";
											    echo "<th>Данные о состоянии на момент поступления</th>";
											    echo "<th>Жалобы</th>";
											    echo "<th>Результаты исследований</th>";
											    echo "<th colspan='2'>Диагноз<br><span class='tabs'>первоначальный</span><span>|</span><span class='tabs'>заключительный</span></th>";
											    echo "<th>Лечение и рекомендации</th>";
											    echo "<th>Примечания</th>";
										    echo "</tr>";
										echo "</thead>";

										echo "<tbody>";
										    echo "<tr>";
											    echo "<td>".$parsed['receipt_date']."</td>";
											    echo "<td>";
											    echo "<ul style='list-style:none'>";
											    echo "<li>Дыхание: ".$parsed['respiration']."</li>";
											    echo "<li>Температура: ".$parsed['temperature']."</li>";
											    echo "<li>Сердечный ритм: ".$parsed['heart_rate']."</li>";
											    echo "<li>Частота сердечных сокращений: ".$parsed['frequency']."</li>";
											    echo "<li>Сознание: ".$parsed['soznanie']."</li>";
											    echo "<li>Общее состояние: ".$parsed['state']."</li>";
											    echo "</ul>";
											    echo "</td>";
											    echo "<td>".$parsed['complaint']."</td>";
											    echo "<td>".$parsed['research_result']."</td>";
											    echo "<td>".$parsed['initial_diagnosis']."</td>";
											    echo "<td>".$parsed['final_diagnosis']."</td>";
											    echo "<td>".$parsed['treatment_recom']."</td>";
											    echo "<td>".$parsed['note']."</td>";
											echo "</tr>";
											
									    echo "</tbody>";
								  	echo "</table>";
								}
							}
						   	
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>