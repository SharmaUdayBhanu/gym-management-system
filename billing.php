<?php
include 'config.php';

if (isset($_POST["submit"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $period = $_POST["period"];
    $amount = $_POST["amount"];

    // Check if the ID already exists
    $checkIdQuery = "SELECT * FROM billing WHERE id = '$id'";
    $result = mysqli_query($connection, $checkIdQuery);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('The Billing ID already exists. Please enter a unique ID.');</script>";
    } else {
        // Insert data
        $insertQuery = "INSERT INTO billing (id, name, period, price) VALUES ('$id', '$name', '$period', '$amount')";
        $query = mysqli_query($connection, $insertQuery);

        if ($query) {
            echo "<script>alert('Record added successfully.');</script>";
        } else {
            echo "<script>alert('Failed to add record.');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/slick.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    body {
  background-image: url('img/bg.webp');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  height: 100vh;
  margin: 0;
}

.navbar {
  background-color: rgba(0, 0, 0, 0.7) !important; /* Ensure it's applied */
  backdrop-filter: blur(10px); /* Optional: adds a blur effect for a frosted look */
}

.navbar .nav-link, .navbar .navbar-brand {
  color: #ffffff !important; /* White text for visibility */
}

form {
  max-width: 800px; /* Control the max width of the form */
  margin-left: auto; /* Center the form horizontally */
  margin-right: auto; /* Center the form horizontally */
  border: 2px solid rgba(255, 255, 255, 0.5); /* Lightly transparent white border */
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.7); /* Dark shadow for depth */
  border-radius: 15px;
  padding: 15px;
  margin-left: 23vw;
  margin-top: 10vh;
  background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent black background */
  color: #ffffff; /* Text color for the form */
}

input.form-control {
  background-color: rgba(255, 255, 255, 0.1); /* Very transparent white background for inputs */
  border: 1px solid rgba(255, 255, 255, 0.3); /* Lightly transparent white border for inputs */
  color: #ffffff; /* Text color for input fields */
}

input.form-control::placeholder {
  color: rgba(255, 255, 255, 0.7); /* Lightly transparent white for placeholder text */
}

.btn {
  margin-top: 10px;
  background-color: rgba(255, 255, 255, 0.2); /* Semi-transparent white for button background */
  color: #ffffff; /* Text color for button */
}

  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="billing"><img src="" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Gym Management System</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="billing.php">Billing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="coach.php">Coach</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="members.php">Member</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="receptionist.php">Receptionist</a>
          </li>
        </ul>
      </div>
      <div class="header-btns d-none d-lg-block f-right">
      <a href="index.html" class="btn">Home</a>
    </div>
    </div>
  </nav>


  <form method="post" class="p-4">
    <div class="mb-3 col-md-6">
        <label for="inputEmail4" class="form-label">Billing ID</label>
        <input type="text" name="id" class="form-control" id="inputEmail4" placeholder="Billing Id">
    </div>
    <div class="mb-3 col-md-6">
        <label for="inputPassword4" class="form-label">Member Name</label>
        <input type="text" name="name" class="form-control" id="inputPassword4" placeholder="Full name">
    </div>
    <div class="mb-3 col-md-12">
        <label for="inputAddress" class="form-label">Period</label>
        <input type="text" name="period" class="form-control" id="inputAddress" placeholder="Time-period">
    </div>
    <div class="mb-3 col-md-12">
        <label for="inputAddress2" class="form-label">Amount</label>
        <input type="text" name="amount" class="form-control" id="inputAddress2" placeholder="Amount to be paid">
    </div>
    <div class="d-flex justify-content-center">
        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
    </div>
</form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>