<?php
include "config.php";

if (isset($_REQUEST["submit"])) {

  $id = $_REQUEST["id"];
  $name = $_REQUEST["name"];
  $date = $_REQUEST["date"];
  $address = $_REQUEST["address"];
  $phone = $_REQUEST["phone"];

  // Check if ID already exists
  $check_id = "SELECT * FROM receptionist WHERE id='$id'";
  $result = mysqli_query($connection, $check_id);
  
  if (mysqli_num_rows($result) > 0) {
    // If ID exists, show alert and prevent insertion
    echo "<script>alert('ID is already allocated. Please use a different ID.');</script>";
  } else {
    // If ID does not exist, insert data
    $ins = "INSERT INTO receptionist (id,name, date,address,phone) VALUES ('$id','$name','$date','$address','$phone')";
    $query1 = mysqli_query($connection, $ins);

    if ($query1) {
      echo "<script>alert('Record added successfully');</script>";
    } else {
      echo "<script>alert('Error adding record.');</script>";
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
      background-color: rgba(0, 0, 0, 0.7) !important;
      backdrop-filter: blur(10px);
    }

    .navbar .nav-link,
    .navbar .navbar-brand {
      color: #ffffff !important;
    }

    form {
      max-width: 800px;
      margin-left: auto;
      margin-right: auto;
      border: 2px solid rgba(255, 255, 255, 0.5);
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.7);
      border-radius: 15px;
      padding: 15px;
      margin-left: 23vw;
      margin-top: 10vh;
      background-color: rgba(0, 0, 0, 0.7);
      color: #ffffff;
    }

    input.form-control {
      background-color: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.3);
      color: #ffffff;
      height: 45px;
    }

    input.form-control::placeholder {
      color: rgba(255, 255, 255, 0.7);
    }

    .btn {
      margin-top: 10px;
      background-color: rgba(255, 255, 255, 0.2);
      color: #ffffff;
    }
  </style>
</head>

<body>

  <!-- nav bar start -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="admin-login.php"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Gym Management System</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Billing.php">Billing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Coach.php">Coach</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="members.php">Member</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Receptionist.php">Receptionist</a>
        </li>
      </ul>
    </div>
    <div class="header-btns d-none d-lg-block f-right">
      <a href="index.html" class="btn">Home</a>
    </div>
  </nav>
  <!-- nav bar end -->

  <!-- form start -->
  <form method="post" class="p-4">
    <div class="row">
      <div class="mb-3 form-group col-md-6">
        <label for="inputEmail4">ID</label>
        <input type="text" name="id" class="form-control" id="inputEmail4" placeholder="ID" required>
      </div>
      <div class="mb-3 form-group col-md-6">
        <label for="inputPassword4">Name</label>
        <input type="text" name="name" class="form-control" id="inputPassword4" placeholder="Name" required>
      </div>
    </div>
    <div class="mb-3 form-group">
      <label for="inputDate">Date of Birth (dd-mm-yyyy)</label>
      <input type="date" name="date" class="form-control" id="inputDate" placeholder="Date of Birth" required>
    </div>
    <div class="mb-3 form-group">
      <label for="inputAddress">Address</label>
      <input type="text" name="address" class="form-control" id="inputAddress" placeholder="Address" required>
    </div>
    <div class="mb-3 form-group">
      <label for="inputPhone">Phone</label>
      <input type="text" name="phone" class="form-control" id="inputPhone" placeholder="Phone" required>
    </div>

    <div class="mb-3 form-group text-center">
      <button type="submit" name="submit" class="btn btn-primary">Save</button>
    </div>
  </form>
  <!-- form end -->

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
