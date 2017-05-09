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

		<div class="slider">
			<div class="container in_slider">
				<div class="row">
					<div class="col-lg-1 arrow">
						<div class="arrow-left" onclick="plusDivs(-1)"><img src="img/arrow-left.png"></div>
					</div>

					<div class="col-lg-10 imgs">
						<img class="mySlides" src="img/main.png">
						<img class="mySlides" src="img/main2.png">
					</div>

					<div class="col-lg-1 arrow">
						<div class="arrow-right" onclick="plusDivs(1)"><img src="img/arrow-right.png"></div>
					</div>  
			  	</div>

			  	<div class="row">
				  	<div class="circles">
						<div class="circle" onclick="currentDiv(1)">1</div>
						<div class="circle" onclick="currentDiv(2)">2</div>
					</div>
				</div>
			</div>
		</div>

		<div class="container-fluid news_feed">
			<div class="container size">
				<div class="row">
					<div class="col-lg-7 col-lg-offset-1" id="result_para">	
						<div class="add_feed">
							<form method="post" action="add_feed.php" autocomplete="off">
								<input placeholder="Заголовок*" style="display: none" class="write_down" id="add_feed_heading" name="add_feed_heading">
								<div class="focus_divider"></div>
								<input placeholder="Написать от <?php echo $userRow['userEmail']; ?>*" class="write_down" id="write_down" name="add_feed_text">
								<div class="focus_divider"></div>
								<input type="button" value="Отменить" class="cancel_feed_btn" style="display:none">
								<input type="file" id="file-input" style="display:none" name="add_feed_img">
								<input type="hidden" value="<?php echo $userRow['userEmail']; ?>" name="user_Email">
								<input type="submit" value="Добавить" class="add_feed_btn">
							</form>

							<script type="text/javascript" src="js/toggle_add.js"></script>
						</div>
						<?php 
							$sql = 'SELECT * FROM feed ORDER BY feedId DESC LIMIT 3';
							
							$retval = mysql_query($sql, $conn);

							if(! $retval ) {
								die('Could not get data: ' . mysql_error());
							}

							while($rowt = mysql_fetch_array($retval, MYSQL_ASSOC)) {
								echo "<form method='post' action='feed_page.php' autocomplete='off'>";
									echo "<div class='feed'>";
										echo "<div class='row'>";
											echo "<div class='col-lg-8'>";
												echo "<input type='hidden' name='feed_id' value='".$rowt['feedId']."'>";
												echo "<p class='heading'>";
													echo $rowt['feedHeading'];
												echo "</p>";
												echo "<p class='date'>";
													echo $rowt['feedDate'];
												echo "</p>";
											echo "</div>";
											echo "<div class='col-lg-4'>";
												echo "<p class='text-right feed_author'>";
													echo $rowt['userEmail'];
												echo "</p>";
											echo "</div>";
										echo "</div>";
										
										echo "<p class='text'>";
											echo $rowt['feedText'];
										echo "</p>";
									
										if(!empty($rowt['feedImg'])){
											echo "<img src='img/".$rowt['feedImg']."' class='feed_img' />";
										}else{
											echo "";
										}

										echo "<a href='#'>";
											echo "<button class='feed_button pull-right'>Подробнее</button>";
										echo "</a>";
									echo "</div>";
								echo "</form>";
							}
						?>

					</div>

					<div class="col-lg-3 right_bar">
						<div class="faq">
							<img src="img/dobr.jpg" class="pull-center">
							
							<p>Готовы ли Вы завести собаку?</p>
							
							<a href="faq.php">
								<button>
									Подробнее
								</button>
							</a>
						</div>

						<div class="faq">
							<img src="img/steve.png" class="pull-center">
							
							<p>Как выбрать питомца?</p>
							
							<a href="faq.php">
								<button>
									Узнать больше
								</button>
							</a>
						</div>
					</div>
					
				</div>
				<div class="load_more" id="load_more_div">
					<input type="hidden" id="result_no" value="3">
					<script type="text/javascript">
						document.getElementById("result_no").value = 3;
					</script>
					<input type="submit" class="load_more_btn" value="Загрузить еще" />
				</div>
			</div>
			
			<footer>
				<!-- <p class="footer_text">2017</p> -->
				<a href="#" class="scrollup"><img src="img/to_top.png"></a>
				
			</footer>
		</div>
	</div>
<!-- 
	<div class="container-fluid footer">
		<div class="footer_line"></div>
	</div> -->

	<script type="text/javascript" src="js/javascript.js"></script>
</body>
</html>