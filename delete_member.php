<?php
include 'config.php';

$id = $_GET['id'];
$deleteQuery = "DELETE FROM membership WHERE id = $id";

if (mysqli_query($connection, $deleteQuery)) {
    echo "Member deleted successfully!";
} else {
    echo "Error deleting member: " . mysqli_error($connection);
}

// Redirect back to the member management page after deletion
echo '<meta http-equiv="refresh" content="2;url=admin_member_management.php">';
?>
