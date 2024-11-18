<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  $name = $_POST["name"];
  $dob = $_POST["dob"];
  $age = $_POST["age"];
  $phone = $_POST["phone"];
  $goal = $_POST["goal"];
  $membershipType = $_POST["membershipType"];

  $ins = "INSERT INTO membership (name, dob, age, phone, goal, membershiptype, registration_date) 
          VALUES ('$name', '$dob', '$age', '$phone', '$goal', '$membershipType', NOW())";
          
  if (mysqli_query($connection, $ins)) {
      echo "Registration successful! Redirecting to home page in 3 seconds...";
      echo '<meta http-equiv="refresh" content="3;url=index.html">';
  } else {
      echo "Error: " . mysqli_error($connection);
  }
}
?>
