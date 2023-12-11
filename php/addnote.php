<!-- add_note.php -->

<?php

session_start();
require('../config.php');


$creatorID = $_POST['userid'] ?? null;
$id = $_POST['id'] ?? null;
$noteComment = ($_POST['noteComment'] ?? null);

$currentTimestamp = date('Y-m-d H:i:s');

// Insert the new note into the database
if (!empty($noteComment)) {
    try {
        // Performing insert query execution
        $insertQuery = $conn->prepare("INSERT INTO notes (contact_id, noteComment, created_by, created_at) 
            VALUES (?, ?, ?, ?)");

        // Bind parameters to the prepared statement
        $insertQuery->bindParam(1, $id);
        $insertQuery->bindParam(2, $noteComment);
        $insertQuery->bindParam(3, $creatorID);
        $insertQuery->bindParam(4, $currentTimestamp);

        // Execute the prepared statement
        $insertQuery->execute();

    // Check if the query was successful
        if ($insertQuery->rowCount() > 0) {
            echo '<script>alert("Note successfully added.");</script>';
            echo "Note successfully added";
        } else {
        echo '<script>alert("Cannot add empty note.");</script>';
        }

    } catch (PDOException $e) {
        echo '<script>alert("Database error. Please try again later.");</script>';
    }
}
    ?>