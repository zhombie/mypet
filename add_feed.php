<?php

   session_start();
   if( isset($_SESSION['user'])!="" ){
      header("Location: index.php");
   }

   include_once 'dbconnect.php';

   $feed_heading = $_POST['add_feed_heading'];
   $feed_text = $_POST['add_feed_text'];
   $feed_img = $_POST['add_feed_img'];
   $feed_date = date("d/m/Y");
   $email = $_POST['user_Email'];

   if (!empty($feed_heading)){
      echo strlen($feed_heading);
      if(!empty($feed_text)){
         $query = "INSERT INTO feed(feedHeading,feedDate,feedText,feedImg,userEmail) VALUES('$feed_heading','$feed_date','$feed_text','$feed_img','$email')";
         $res = mysql_query($query);
      }
   }

   if(! $res ) {
      die('Could not get data: ' . mysql_error());
   }
   if ($res) {
      echo "done";
   }else{
      echo "not";
   }

?>