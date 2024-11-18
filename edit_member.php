<?php
include 'config.php';

// Check if the id is set in the URL
if (isset($_GET['id'])) {
    $memberId = $_GET['id'];

    // Fetch the current member's details
    $query = "SELECT * FROM membership WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'i', $memberId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $member = mysqli_fetch_assoc($result);

    // Check if the member exists
    if (!$member) {
        die("Member not found.");
    }

    // Handle the form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $dob = $_POST["dob"];
        $age = $_POST["age"];
        $phone = $_POST["phone"];
        $goal = $_POST["goal"];
        $membershipType = $_POST["membershipType"];

        // Update the member details
        $updateQuery = "UPDATE membership SET name = ?, dob = ?, age = ?, phone = ?, goal = ?, membershiptype = ? WHERE id = ?";
        $updateStmt = mysqli_prepare($connection, $updateQuery);
        mysqli_stmt_bind_param($updateStmt, 'ssisssi', $name, $dob, $age, $phone, $goal, $membershipType, $memberId);

        if (mysqli_stmt_execute($updateStmt)) {
            echo "Member updated successfully! Redirecting to member management in 3 seconds...";
            echo '<meta http-equiv="refresh" content="3;url=members.php">';
        } else {
            echo "Error: " . mysqli_error($connection);
        }
    }
} else {
    die("ID not provided.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Member</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">Edit Member</h1>
    
    <form method="POST" action="">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($member['name']); ?>" required>
        </div>
        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob" value="<?php echo htmlspecialchars($member['dob']); ?>" required>
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" class="form-control" id="age" name="age" value="<?php echo htmlspecialchars($member['age']); ?>" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($member['phone']); ?>" required>
        </div>
        <div class="form-group">
            <label for="goal">Goal</label>
            <input type="text" class="form-control" id="goal" name="goal" value="<?php echo htmlspecialchars($member['goal']); ?>" required>
        </div>
        <div class="form-group">
            <label for="membershipType">Membership Type</label>
            <select class="form-control" id="membershipType" name="membershipType" required>
                <option value="monthly" <?php echo ($member['membershiptype'] == 'monthly') ? 'selected' : ''; ?>>Monthly</option>
                <option value="half_yearly" <?php echo ($member['membershiptype'] == 'half_yearly') ? 'selected' : ''; ?>>Half Yearly</option>
                <option value="yearly" <?php echo ($member['membershiptype'] == 'yearly') ? 'selected' : ''; ?>>Yearly</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update Member</button>
        <a href="members.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
