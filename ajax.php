<?php
    session_start();

    $no = $_POST['getresult'];

    require_once 'dbconnect.php';

    // $cnt = mysql_query("SELECT * FROM feed", $conn);
    // $num_rows = mysql_num_rows($cnt);

    // if ($num_rows == $no){
    // }

    $sql = "SELECT feedId, feedHeading, feedDate, feedDate, feedText, feedImg, userEmail FROM feed ORDER BY feedId DESC LIMIT $no, 3";
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
                        
    exit;
?>