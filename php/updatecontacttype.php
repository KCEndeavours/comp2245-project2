<?php
include('./config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contactId = $_POST['contact_id'];

    // Fetch current contact type
    $sql = "SELECT type FROM contacts WHERE id = $contactId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $currentType = $row['type'];

        // Toggle contact type
        $newType = ($currentType == 'Sales Lead') ? 'Support' : 'Sales Lead';

        // Update the 'type' column in the contacts table
        $sql = "UPDATE contacts SET type = '$newType' WHERE id = $contactId";

        if ($conn->query($sql) === TRUE) {
            echo "Contact type updated successfully!";
        } else {
            echo "Error updating contact type: " . $conn->error;
        }
    } else {
        echo "Contact not found";
    }
}
?>
