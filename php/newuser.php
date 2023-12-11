<?php

// Start or resume the session
session_start();

try {
    // Include your database connection file
    include('../config.php');


    // Check if the page was loaded due to a form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
        // Taking all 5 values from the form data(input)
        $firstname =  $_REQUEST['firstname'];
        $lastname = $_REQUEST['lastname'];
        $password =  $_REQUEST['password'];
        $email = $_REQUEST['email'];
        $role = $_REQUEST['role'];
        // Get the current timestamp for created_at
        $currentTimestamp = date('Y-m-d H:i:s');

        //Hash the password
        $hashed_pass = password_hash($password, PASSWORD_BCRYPT);

        if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($password) && !empty($role)) {

            // Check if the contact with the same email already exists
            $checkQuery = $conn->prepare("SELECT * FROM contacts WHERE email = ?");
            $checkQuery->bindParam(1, $email);
            $checkQuery->execute();

            if ($checkQuery->rowCount() > 0) {
                $message = "A user with the provided email already exists.";
                $response = ['success' => false, 'error' => $message];
            } else {
        
                // Performing insert query execution
                $insertQuery = $conn->prepare("INSERT INTO users (firstname, lastname, password, email, role, created_at) VALUES (?, ?, ?, ?, ?, ?)");

                //Bind parameters to the statment
                $insertQuery->bindParam(1, $firstname);
                $insertQuery->bindParam(2, $lastname);
                $insertQuery->bindParam(3, $password);
                $insertQuery->bindParam(4, $email);
                $insertQuery->bindParam(5, $role);
                $insertQuery->bindParam(6, $currentTimestamp);
                        
                $insertQuery->execute();

                // Check if the query was successful
                if ($insertQuery->rowCount() > 0) {
                    $response = ['success' => true, 'message' => "Contact successfully added."];
                } else {
                    $response = ['success' => false, 'error' => "Something went wrong. Please try again later."];
                }
            }
        } else {
            $response = ['success' => false, 'error' => "Please fill in all the required fields."];
        }

        // Send JSON response
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }

} catch (PDOException $e) {
echo 'Error: ' . $e->getMessage();
}
?>