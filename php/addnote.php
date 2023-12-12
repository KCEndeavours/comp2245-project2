<?php

session_start();

try {
    include('../config.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $creatorID = $_POST['userid'];
        $id = $_POST['id'];
        $noteComment = htmlspecialchars($_POST['noteComment']);
        $currentTimestamp = date('Y-m-d H:i:s');

        // Insert the new note into the database
        if (!empty($noteComment) && !empty($creatorID) && !empty($id)) {

            // Performing insert query execution
            $insertQuery = $conn->prepare("INSERT INTO notes (contact_id, comment, created_by, created_at) 
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
                $response = "Note successfully added.";
            } else {
                $response = "Cannot add empty note.";
            }

            // Send response
            echo $response;
            exit;
        }
    }

} catch (PDOException $e) {
    $response = "Database error. Please try again later.";
    echo $response;
    exit;
}
?>