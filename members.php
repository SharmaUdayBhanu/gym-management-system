<?php
include 'config.php';

// Query all members from the membership table
$query = "SELECT * FROM membership ORDER BY membershiptype, registration_date";
$result = mysqli_query($connection, $query);

// Check if the query was successful
if (!$result) {
    die("Query Failed: " . mysqli_error($connection));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Member Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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

        .btn1 {
            border: 1px solid white;
            padding: 10px;
            margin: 10px;
            background-color: rgba(255, 255, 255, 0.2);
            /* Semi-transparent white for button background */
            color: #ffffff;
            /* Text color for button */
        }

        .btn1:hover {
            
            color: black;
            background-color: rgba(255, 255, 255, 0.2);
            /* Change the last value to control transparency */
        }


        h1 {
            color: white;
            /* Set the heading color to white */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="billing"><img src="" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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
                <a href="index.html" class="btn1">Home</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Admin Member Management</h1>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Date of Birth</th>
                        <th>Age</th>
                        <th>Phone</th>
                        <th>Goal</th>
                        <th>Membership Type</th>
                        <th>Registration Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)):
                        $memberId = htmlspecialchars($row['id']);
                        $memberName = htmlspecialchars($row['name']);
                        $dob = htmlspecialchars($row['dob']);
                        $age = htmlspecialchars($row['age']);
                        $phone = htmlspecialchars($row['phone']);
                        $goal = htmlspecialchars($row['goal']);
                        $membershipType = htmlspecialchars($row['membershiptype']);
                        $registrationDate = htmlspecialchars($row['registration_date']);
                        ?>
                        <tr>
                            <td><?php echo $memberName; ?></td>
                            <td><?php echo $dob; ?></td>
                            <td><?php echo $age; ?></td>
                            <td><?php echo $phone; ?></td>
                            <td><?php echo $goal; ?></td>
                            <td><?php echo $membershipType; ?></td>
                            <td><?php echo $registrationDate; ?></td>
                            <td>
                                <a href="view_member.php?id=<?php echo $memberId; ?>" class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye"></i> View
                                </a>
                                <a href="edit_member.php?id=<?php echo $memberId; ?>" class="btn btn-info btn-sm">
                                    <i class="fas fa-pen"></i> Edit
                                </a>
                                <a href="delete_member.php?id=<?php echo $memberId; ?>" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this member?');">
                                    <i class="fas fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>