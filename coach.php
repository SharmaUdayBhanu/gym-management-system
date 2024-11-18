<?php
include 'config.php';

if (isset($_POST["submit"])) {
  // Simple sanitization
  $id = htmlspecialchars(trim($_POST["id"]));
  $name = htmlspecialchars(trim($_POST["name"]));
  $dob = htmlspecialchars(trim($_POST["dob"]));
  $experience = htmlspecialchars(trim($_POST["experience"]));

  // Validate ID uniqueness
  $checkIdQuery = "SELECT * FROM coach WHERE id = '$id'";
  $checkIdResult = mysqli_query($connection, $checkIdQuery);
  
  if (mysqli_num_rows($checkIdResult) > 0) {
    echo "<script>alert('ID already allotted. Please use a unique ID.');</script>";
  } 
   elseif (!is_numeric($experience) || (int)$experience < 0) { // Validate experience as a positive number
    echo "<script>alert('Please enter a valid numerical value for experience in years.');</script>";
  } else {
    // Insert into the database
    $ins = "INSERT INTO coach (id, name, dob, experience) VALUES ('$id', '$name', '$dob', '$experience')";
    $query = mysqli_query($connection, $ins);
    if ($query) {
      echo "<script>alert('Coach data successfully added.');</script>";
    } else {
      echo "<script>alert('Failed to add coach data. Please try again.');</script>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gym Management System - Add Coach</title>
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
    }

    .navbar {
      background-color: rgba(0, 0, 0, 0.7) !important; /* Ensure it's applied */
      backdrop-filter: blur(10px); /* Optional: adds a blur effect for a frosted look */
    }

    .navbar .nav-link, .navbar .navbar-brand {
      color: #ffffff !important; /* White text for visibility */
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
    <div class="mb-3 col-md-12">
      <label for="inputEmail4" class="form-label">ID</label>
      <input type="text" name="id" class="form-control" id="inputEmail4" placeholder="ID" required>
    </div>
    <div class="mb-3 col-md-12">
      <label for="inputPassword4" class="form-label">Name</label>
      <input type="text" name="name" class="form-control" id="inputPassword4" placeholder="Full name" required>
    </div>
    <div class="mb-3 col-md-12">
      <label for="inputDob" class="form-label">DOB (DD-MM-YYYY)</label>
      <input type="date" name="dob" class="form-control" id="inputDob" placeholder="Date of Birth" required>
    </div>
    <div class="mb-3 col-md-12">
      <label for="inputExperience" class="form-label">Experience (Years)</label>
      <input type="text" name="experience" class="form-control" id="inputExperience" placeholder="Experience in years" required>
    </div>
    <div class="d-flex justify-content-center">
      <input type="submit" name="submit" class="btn btn-primary" value="Submit">
    </div>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
