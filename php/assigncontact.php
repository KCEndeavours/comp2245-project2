
<?php
include('./config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contactId = $_POST['contact_id'];
    $assignedTo = $_SESSION['userid']; // Assuming you have user authentication

    // Update the 'assigned_to' column in the contacts table
    $update = "UPDATE contacts SET assigned_to = $assignedTo WHERE id = $contactId";
    
    if ($conn->query($update) === TRUE) {
        echo "Contact assigned successfully!";
    } else {
        echo "Error updating contact: " . $conn->error;
    }
}
?>
