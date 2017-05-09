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

   if (!empty($date) && !empty($temp) && !empty($pulse) && !empty($breath) && !empty($total)){
     
      $query = "UPDATE med_karta SET receipt_date='$date', respiration='$breath', temperature='$temp', heart_rate='$pulse', frequency='$frequency', 
               soznanie='$soznanie', state='$total', complaint='$zhaloby', research_result='$result', initial_diagnosis='$init_diag', final_diagnosis='$final_diag', 
               treatment_recom='$treatment', note='$notes' WHERE userIIN = '$med_karta_iin' AND petCategory = '$med_karta_pet'";
   
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