<?php
include 'config.php';

$id = $_GET['id'];
$query = "SELECT * FROM membership WHERE id = $id";
$result = mysqli_query($connection, $query);
$member = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">Member Details</h1>
    
    <div class="card">
        <div class="card-body">
            <p><strong>Name:</strong> <?php echo htmlspecialchars($member['name']); ?></p>
            <p><strong>Date of Birth:</strong> <?php echo htmlspecialchars($member['dob']); ?></p>
            <p><strong>Age:</strong> <?php echo htmlspecialchars($member['age']); ?></p>
            <p><strong>Phone:</strong> <?php echo htmlspecialchars($member['phone']); ?></p>
            <p><strong>Goal:</strong> <?php echo htmlspecialchars($member['goal']); ?></p>
            <p><strong>Membership Type:</strong> <?php echo htmlspecialchars($member['membershiptype']); ?></p>
            <p><strong>Registration Date:</strong> <?php echo htmlspecialchars($member['registration_date']); ?></p>
        </div>
        <div class="card-footer text-right">
            <a href="members.php" class="btn btn-secondary">Back to Members List</a>
            <a href="edit_member.php?id=<?php echo $id; ?>" class="btn btn-info">Edit Member</a>
            <a href="delete_member.php?id=<?php echo $id; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this member?');">Delete Member</a>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
