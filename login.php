<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	
	// it will never let you open index(login) page if session is set
	if ( isset($_SESSION['user'])!="" ) {
		header("Location: index.php");
		exit;
	}
	
	$error = false;
	
	if( isset($_POST['btn-login']) ) {	
		
		// prevent sql injections/ clear user invalid inputs
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		// prevent sql injections / clear user invalid inputs
		
		if(empty($email)){
			$error = true;
			$emailError = "Пожалуйста, введите адрес электронной почты.";
		} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Пожалуйста, введите действительный адрес электронной почты.";
		}
		
		if(empty($pass)){
			$error = true;
			$passError = "Пожалуйста, введите пароль.";
		}
		
		// if there's no error, continue to login
		if (!$error) {
			
			$password = hash('sha256', $pass); // password hashing using SHA256
		
			$res=mysql_query("SELECT userId, userName, userPass FROM users WHERE userEmail='$email'");
			$row=mysql_fetch_array($res);
			$count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
			
			if( $count == 1 && $row['userPass']==$password ) {
				$_SESSION['user'] = $row['userId'];
				header("Location: index.php");
			} else {
				$errMSG = "Неправильное имя пользователя или пароль.";
			}
				
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
			<div id="login-form">
			    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
			    	<div class="row">
				    	<div class="col-lg-4 col-lg-offset-4">
				        
				        	<div class="form-group">
				            	<h2 class="">Вход в личный кабинет</h2>
				            </div>
				        
				        	<div class="form-group">
				            	<hr />
				            </div>
				            
				            <?php
							if ( isset($errMSG) ) {
								
								?>
								<div class="form-group">
					            	<div class="alert alert-danger">
										<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
					                </div>
				            	</div>
				                <?php
							}
							?>
				            
				            <div class="form-group">
            					<div class="input-group">
					            	<input type="email" name="email" class="form-control" placeholder="Электронный адрес" value="<?php echo $email; ?>" maxlength="40" />
				                	<span class="input-group-addon">
					                	<span class="glyphicon glyphicon-envelope"></span>
					                </span>
				                </div>
				                <span class="text-danger"><?php echo $emailError; ?></span>
				            </div>
				            
				            <div class="form-group">
            					<div class="input-group">
					            	<input type="password" name="pass" class="form-control" placeholder="Пароль" maxlength="15" />
					            	<span class="input-group-addon">
					                	<span class="glyphicon glyphicon-lock"></span>
					                </span>
				                </div>
				                <span class="text-danger"><?php echo $passError; ?></span>
				            </div>
				        
				        </div>
			        </div>

			        <div class="row">
			        	<div class="form-group">
			            	<hr />
			            </div>
			            
			            <div class="form-group">
			            	<button type="submit" class="log_button" name="btn-login">Войти</button>
			            </div>
			            
			            <div class="form-group">
			            	<a href="register.php">Регистрация</a>
			            </div>
			        </div>
			   		
			    </form>
		    </div>	
		</div>
	</div>
<!-- 
	<div class="container-fluid login_page_footer">
		<div class="footer_line"></div>
	</div> -->
</body>
</html>
<?php ob_end_flush(); ?>