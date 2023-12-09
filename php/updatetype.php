<?php
require("../config.php"); 

//Get type and id from the POST request
$contacttype = $_POST['type'] ?? null;
$id = $_POST['id'] ?? null;

//Check if both $contacttype and $id are not null
if ($contacttype !== null && $id !== null) {
    //Choose new type based on current
    $newType = ($contacttype === "Sales Lead") ? "Support" : "Sales Lead";

    try {
        //Update query to update record
        $updatequery = "UPDATE contacts SET type = :type, updated_at = NOW() WHERE id = :id";
        $statement = $conn->prepare($updatequery);

        $params = [
            ':id'   => $id,
            ':type' => $newType
        ];

        $statement->execute($params);

        //Display success message
        echo "Update successful! New Type: $newType";
    } catch (PDOException $e) {
        // Output error message
        echo "Error updating record: " . $e->getMessage();
    }
} else {
    // Output message for missing parameters
    echo "Missing parameters!";
}
?>
