<?php

   session_start();
   if( isset($_SESSION['user'])!="" ){
      header("Location: index.php");
   }

   include_once 'dbconnect.php';

   $name = $_POST['name'];
   $surname = $_POST['surname'];
   $iin = $_POST['iin'];
   $address = $_POST['address'];
   $email = $_POST['email'];
   $birthdate = $_POST['birthdate'];
   $pass = $_POST['pass'];
   $user_type = $_POST['user_type'];

   $clinic = $_POST['clinic'];

   $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
   $result = mysql_query($query);
   $count = mysql_num_rows($result);
   
   if($count!=0){
      $errmsg = "Введенный адрес электронной почты уже зарегистрирован.";
   }else{
      $password = hash('sha256', $pass);
      $query = "INSERT INTO users(userName,userSurname,userIIN,userAddress,userEmail,userBirthdate,userPass,userType) VALUES('$name','$surname','$iin','$address','$email','$birthdate','$password','$user_type')";
      $res = mysql_query($query);
   
      if ($user_type == 0){
         $pet_category = isset($_POST['pet_category']) ? $_POST['pet_category'] : false; 

         if($pet_category){
            $dob_day = isset($_POST['dob_day']) ? $_POST['dob_day'] : false;
            $dob_month = isset($_POST['dob_month']) ? $_POST['dob_month'] : false;
            $dob_year = isset($_POST['dob_year']) ? $_POST['dob_year'] : false;
            
            $pet_query = "INSERT INTO pet(petCategory, petDobDay, petDobMonth, petDobYear, userIIN) VALUES('$pet_category', '$dob_day', '$dob_month', '$dob_year', '$iin')";
            $pet_res = mysql_query($pet_query);
         }else{
            $add_msg = "pet not implemented";
         }
      }else if ($user_type == 1){
         if($clinic){
            $clinic_query = "INSERT INTO clinic(clinicName, userIIN) VALUES('$clinic', '$iin')";
            $clinic_res = mysql_query($clinic_query);
         }else{
            $add_msg = "clinic not implemented";
         }   
      }
   }

   if ($res && ($pet_res || $clinic_res)) {
      $finalmsg = "Вы успешно зарегистрированы, Вы можете сейчас войти в свой <a href='login.php'>личный кабинет</a>";
   }else{
      $finalmsg = "Ошибка!";
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
      
      <div class="container" id="process_area">
         <?php
            if ( isset($finalmsg) ) {   
               ?>
               <div class="form-group">
                  <p class="final_text"><?php echo $finalmsg; ?></p>
               </div>
               <?php
            }
         ?>

         <?php
            if ( isset($errmsg) ) {   
               ?>
               <div class="form-group">
                  <p class="final_text"><?php echo $errmsg; ?></p>
               </div>
               <?php
            }
         ?>

      </div>

   </div>
</body>
</html>