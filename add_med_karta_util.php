<?php

   include_once 'dbconnect.php';

   $date = $_POST['date'];
   $temp = $_POST['temp'];
   $pulse = $_POST['pulse'];
   $breath = $_POST['breath'];
   $soznanie = $_POST['soznanie'];
   $frequency = $_POST['frequency'];
   $total = $_POST['total'];
   $zhaloby = $_POST['zhaloby'];
   $result = $_POST['result'];
   $init_diag = $_POST['init_diag'];
   $final_diag = $_POST['final_diag'];
   $treatment = $_POST['treatment'];
   $notes = $_POST['notes'];

   $med_karta_iin = $_POST['med_carta_iin'];
   $med_karta_pet = $_POST['med_carta_pet'];

   // echo "date:";
   // echo $date;
   // echo "temp:";
   // echo $temp;
   // echo "<br>";
   // echo $pulse, $breath, $soznanie, $total, $zhaloby;

   if (!empty($date) && !empty($temp) && !empty($pulse) && !empty($breath) && !empty($total)){
      $query = "INSERT INTO med_karta(petCategory,userIIN,receipt_date,respiration,temperature,heart_rate,frequency,soznanie,state,complaint,research_result,initial_diagnosis,final_diagnosis,treatment_recom,note) 
                  VALUES('$med_karta_pet','$med_karta_iin','$date','$breath','$temp','$pulse','$frequency','$soznanie','$total','$zhaloby','$result','$init_diag','$final_diag','$treatment','$notes')";
      $res = mysql_query($query);
   }
 
   if ($res) {
      echo "done";
      header("Location: cabinet.php");
   }else{
      echo "not";
      die('Could not get data: ' . mysql_error());
   }

?>