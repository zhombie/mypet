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
			<div id="reg2-login-form">
				<form method="post" action="process.php" autocomplete="off">
					<div class="row">
				    	<div class="col-lg-4 col-lg-offset-4">
				        	
				        	<div class="form-group">
				            	<h2 class="">Второй этап</h2>
				            </div>
				        
				        	<div class="form-group">
				            	<hr />
				            </div>
						            
							<input type="hidden" name="name" value="{name}">
							<input type="hidden" name="surname" value="{surname}">
							<input type="hidden" name="iin" value="{iin}">
							<input type="hidden" name="address" value="{address}">
							<input type="hidden" name="email" value="{email}">
							<input type="hidden" name="birthdate" value="{bd_day}/{bd_month}/{bd_year}">
							<input type="hidden" name="pass" value="{pass}">
							<input type="hidden" name="user_type" value="{user_type}">

							<div id="user" style="display:none">
								<p><a href="#" class="add" id="pet_add_button" onclick="toggle_visibility('foo');">Добавить питомца(+)</a></p>
					        	<div id="foo">
					        		<div class="row" style="margin-left: 8px;">
						        		<div class="pull-left user_type_div">
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
									<div class="row" style="margin-left: 8px;">
										<div class="dob_selected pull-left">
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

								</div>
							</div>

							<div id="doctor" style="display:none">
								<input placeholder = "Место работы(клиника)" name="clinic" >
							</div>

							<button type="submit" class="reg_button">Завершить регистрацию</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		if({user_type} == 0){
			document.getElementById('user').style.display = 'block';
		}else{
			document.getElementById('doctor').style.display = 'block';
		}
	</script>
	<script type="text/javascript" src="js/javascript.js"></script>
</body>
</html>