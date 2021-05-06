<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cheif_information";

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
} 


if(isset($_POST['save'])){
    $ratedIndex = $_POST['ratedIndex'] + 1;
    $chef_id = $_POST['c_id'];
    $r_comment = $_POST['comment'];
    $reviewer = $_POST['name'];
    
    if($r_comment != null && $ratedIndex > 0){
        $review_insert = "INSERT INTO ratings (chef_id, reviewer, rating, comment )
        VALUES ({$chef_id}, '$reviewer', {$ratedIndex}, '$r_comment')";

        if ($connection->query($review_insert) === TRUE) {
          echo "Review Submitted successfully";
        } 
        else {
          echo "Error: " . $review_insert . "<br>" . $connection->error;
        }
    } else{
        echo "Fields can'be empty";
    }
    

    $connection->close();
    
}

?>