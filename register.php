<?php
	ob_start();
	session_start();
	if( isset($_SESSION['user'])!="" ){
		header("Location: index.php");
	}
	include_once 'dbconnect.php';

	$error = false;

	if ( isset($_POST['btn-signup']) ) {
		
		$name = trim($_POST['name']);
		$name = strip_tags($name);
		$name = htmlspecialchars($name);
		
		$surname = trim($_POST['surname']);
		$surname = strip_tags($surname);
		$surname = htmlspecialchars($surname);

		$iin = (int)$_POST['iin'];

		$address = trim($_POST['address']);
		$address = strip_tags($address);
		$address = htmlspecialchars($address);

		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);


		$bd_day = isset($_POST['bd_day']) ? $_POST['bd_day'] : false;
        $bd_month = isset($_POST['bd_month']) ? $_POST['bd_month'] : false;
        $bd_year = isset($_POST['bd_year']) ? $_POST['bd_year'] : false;
		// $birthdate = trim($_POST['birthdate']);
		// $birthdate = strip_tags($birthdate);
		// $birthdate = htmlspecialchars($birthdate); 

		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		
		$user_type = (int)$_POST['user_type'];

		if (empty($name)) {
			$error = true;
			$nameError = "Введите ваше имя.";
		} 
		// else if (!preg_match("/^[а-яА-Я ]+$/",$name)) {
		// 	$error = true;
		// 	$nameError = "Пожалуйста, используйте только буквы алфавита при заполнении этой формы.";
		// }
		
		if (empty($iin)) {
			$error = true;
			$iinError = "Введите ваш ИИН.";
		} else {
			$iin_query = "SELECT userIIN FROM users WHERE userIIN='$iin'";
			$iin_result = mysql_query($iin_query);
			$iin_count = mysql_num_rows($iin_result);
			if($iin_count!=0){
				$error = true;
				$iinError = "Введенный ИИН уже зарегистрирован.";
			}
		}

		if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Пожалуйста, введите действительный адрес электронной почты.";
		} else {
			// check email exist or not
			$query = "SELECT userEmail FROM users WHERE userEmail='$email'";
			$result = mysql_query($query);
			$count = mysql_num_rows($result);
			if($count!=0){
				$error = true;
				$emailError = "Введенный адрес электронной почты уже зарегистрирован.";
			}
		}
		// password validation
		if (empty($pass)){
			$error = true;
			$passError = "Пожалуйста, введите пароль.";
		} else if(strlen($pass) < 6) {
			$error = true;
			$passError = "Ваш пароль должен иметь не менее 6 символов.";
		}
		
		// password encrypt using SHA256();
		$password = hash('sha256', $pass);
		
		// if there's no error, continue to signup
		if( !$error ) {

			$aParams = array(
				'{name}' => $name,
				'{surname}' => $surname,
				'{iin}' => $iin,
				'{address}' => $address,
				'{email}' => $email,
				'{bd_day}' => $bd_day,
				'{bd_month}' => $bd_month,
				'{bd_year}' => $bd_year,
				'{pass}' => $pass,
				'{user_type}' => $user_type
			);

			echo strtr(file_get_contents('second_page.php'), $aParams);
			exit;		
		}
	}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css"></link>
	<link rel="stylesheet" type="text/css" href="css/register_page_style.css"></link>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<script src="js/dobPicker.min.js"></script>
	
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

					<div class="right_header pull-right">
						<ul class="navbar_list">
							<li class="other"><a href="index.php">главная</a></li>
							<li class="other"><a href="cabinet.php">кабинет</a></li>
							<li class="other"><a href="poleznoe.php">полезное</a></li>
							<li class="login_button"><a href="login.php">войти</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div id="reg-login-form">
			    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
			    	<div class="row">
				    	<div class="col-lg-4 col-lg-offset-4">
				        	
				        	<div class="form-group">
				            	<h2 class="">Регистрация</h2>
				            </div>
				        
				        	<div class="form-group">
				            	<hr />
				            </div>
				            
				            <?php
							if ( isset($errMSG) ) {
								
								?>
								<div class="form-group">
					            	<div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
										<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
					                </div>
				            	</div>
				                <?php
							}
							?>
				            
				            <div class="form-group">
				            	<div class="input-group">
					                <input type="text" name="name" class="form-control" placeholder="Имя*" maxlength="50" value="<?php echo $name ?>" />
				                	<span class="input-group-addon">
				                		<span class="glyphicon glyphicon-user"></span>
				                	</span>
				                </div>
				                <span class="text-danger"><?php echo $nameError; ?></span>
				            </div>

				            <div class="form-group">
				            	<div class="input-group">
					                <input type="text" name="surname" class="form-control" placeholder="Фамилия" maxlength="50" value="<?php echo $surname ?>" />
					                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
				                </div>
				                <!-- <span class="text-danger"><?php echo $surnameError; ?></span> -->
				            </div>

				            <div class="form-group">
				            	<div class="input-group">
					                <input type="text" name="iin" class="form-control" placeholder="ИИН*" maxlength="50" value="<?php echo $iin ?>" />
					                <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
				                </div>
				                <span class="text-danger"><?php echo $iinError; ?></span>
				            </div>
				            
							<div class="form-group">
				            	<div class="input-group">
					            	<input type="text" name="address" class="form-control" placeholder="Адрес" maxlength="50" value="<?php echo $address ?>" />
				                	<span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span></span>
				                </div>
				                <!-- <span class="text-danger"><?php echo $addressError; ?></span> -->
				            </div>

				            <div class="form-group">
				            	<div class="input-group">
					                <input type="email" name="email" class="form-control" placeholder="Электронный адрес*" maxlength="40" value="<?php echo $email ?>" />
				                	<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
				                </div>
				                <span class="text-danger"><?php echo $emailError; ?></span>
				            </div>

							<div class="form-group row">
								<span class="pull-left dob_text">Дата рождения:</span>
				            	<div class="reg_dob_selected">
									<select id="dobday" class="selected" name="bd_day"></select>
									<select id="dobmonth" class="selected" name="bd_month"></select>
									<select id="dobyear" class="selected" name="bd_year"></select>
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
				                <!-- <span class="text-danger"><?php echo $birthdateError; ?></span> -->
				            </div>

				            
				            <div class="form-group">
				            	<div class="input-group">
					            	<input type="password" name="pass" class="form-control" placeholder="Пароль*" maxlength="15" />
				                	<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
				                </div>
				                <span class="text-danger"><?php echo $passError; ?></span>
				            </div>

				            <div class="form-group">
				            	<div class="input-group user_type_div">
				            		<div class="row">
				            			<span class="user_type_ask">Кто вы?</span>
						            	<select name="user_type">
											<option value="0">Хозяин</option>
											<option value="1">Ветеринар</option>
										</select>
									</div>
				                </div>
				                <!-- <span class="text-danger"><?php echo $passError; ?></span> -->
				            </div>
				    		
				        </div> <!-- col-lg-4 col-lg-offset-4 -->
				    </div>  <!-- row -->  
			        
			        <div class="row">
				        <div class="form-group">
			            	<hr />
			            </div>
			            
			            <div class="form-group">
			            	<button type="submit" class="reg_button" name="btn-signup">Зарегистрироваться</button>
			            </div>
			            
			            <div class="form-group">
			            	<a href="login.php">Войти</a>
			            </div>
		            </div>
					
			    </form> <!-- php post -->
	    	</div> <!-- reg-login-form -->
		</div> <!-- container -->
	</div> <!-- total -->

	<!-- <div class="container-fluid login_page_footer">
		<div class="footer_line"></div>
	</div> -->

	<script type="text/javascript" src="js/javascript.js"></script>
</body>
</html>
<?php ob_end_flush(); ?>