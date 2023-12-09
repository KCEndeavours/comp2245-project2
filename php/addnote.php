<!-- add_note.php -->

<?php
include('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contactId = $_POST['contact_id'];
    $noteComment = $_POST['comment'];
    $createdBy = $_SESSION['userid']; // Assuming you have user authentication

    // Insert the new note into the database
    // ...

    // Update the timestamp on the contact
    // ...

    // Send a response back to the frontend
    echo "Note added successfully!";
}
?>
