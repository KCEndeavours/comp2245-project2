<?php
require("../config.php"); 

//Get type and id from the POST request
$assignedId = $_POST['assignedId'] ?? null;
$id = $_POST['id'] ?? null;

//Check if both $contacttype and $id are not null
if ($assignedId !== null && $id !== null) {
    try {
        //Update query to update record
        $updatequery = "UPDATE contacts SET assigned_to = :assignedId, updated_at = NOW() WHERE id = :id";
        $statement = $conn->prepare($updatequery);

        $params = [
            ':id'   => $id,
            ':assignedId' => $assignedId
        ];

        $statement->execute($params);

        //Display success message
        echo "Update successful! Assigned to $assignedId";
    } catch (PDOException $e) {
        // Output error message
        echo "Error updating record: " . $e->getMessage();
    }
} else {
    // Output message for missing parameters
    echo "Missing parameters!";
}
?>
