<?php
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

		<div class="container-fluid cabinet">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 add_med_karta">
						<?php 
							$med_karta_iin = $_POST['med_karta_iin'];
							$med_karta_pet = $_POST['med_karta_pet'];

							echo "<a href='med_karta.php?category=".$med_karta_pet."&userIIN=".$med_karta_iin."'><input type='button' value='Отменить' class='back_med_karta_btn'></a>";
						?>
					</div>
				</div>
			</div>

			<div class="info_med">
				<div class="row">
					<div class="col-lg-10 col-lg-offset-1">
						<?php
							echo "<form method='post' action='add_med_karta_util.php' autocomplete='off'>";
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
										    echo "<td><input type='text' class='form-control' name='date'></td>";
										    echo "<td>";
										    	echo "<ul style='list-style:none'>";
										    		echo "<li>Дыхание: <input type='text' class='form-control' name='breath'></li>";
										    		echo "<li>Температура: <input type='text' class='form-control' name='temp'></li>";
										    		echo "<li>Сердечный ритм: <input type='text' class='form-control' name='pulse'></li>";
										    		echo "<li>Частота сердечных	сокращений: <input type='text' class='form-control' name='frequency'></li>";
										    		echo "<li>Сознание: <input type='text' class='form-control' name='soznanie'></li>";
										    		echo "<li>Общее состояние: <input type='text' class='form-control' name='total'></li>";
										    	echo "</ul>";
										    echo "</td>";
										    echo "<td><textarea class='form-control' rows='11' style='resize: vertical;' name='zhaloby'></textarea></td>";
										    echo "<td><textarea class='form-control' rows='11' style='resize: vertical;' name='result'></textarea></td>";
										    echo "<td><textarea class='form-control' rows='11' style='resize: vertical;' name='init_diag'></textarea></td>";
										    echo "<td><textarea class='form-control' rows='11' style='resize: vertical;' name='final_diag'></textarea></td>";
										    echo "<td><textarea class='form-control' rows='11' style='resize: vertical;' name='treatment'></textarea></td>";
										    echo "<td><textarea class='form-control' rows='11' style='resize: vertical;' name='notes'></textarea></td>";
										echo "</tr>";
										
								    echo "</tbody>";
							  	echo "</table>";

							  	echo "<input type='hidden' value='".$med_karta_iin."' name='med_carta_iin'>";
								echo "<input type='hidden' value='".$med_karta_pet."' name='med_carta_pet'>";
								echo "<input type='submit' value='Добавить мед. карту' class='add_med_karta_btn' style='margin:50px auto 0; display:block'>";
							echo "</form>";
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>