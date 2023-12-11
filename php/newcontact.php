<?php

// Start or resume the session
session_start();
$currentPage = 'contact';

try {
    // Include your database connection file
    include('../config.php');

    
    // Check if the page was loaded due to a form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Taking all values from the form data (input) and sanitize them
        $title = htmlspecialchars($_POST['title']); 
        $firstname = htmlspecialchars($_POST['firstname']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $email = htmlspecialchars($_POST['email'], FILTER_SANITIZE_EMAIL);
        $telephone = htmlspecialchars($_POST['telephone']);
        $company = htmlspecialchars($_POST['company']);
        $type = htmlspecialchars($_POST['type']);
        $assigned_to = htmlspecialchars($_POST['assigned_to']);
        $created_by = $_SESSION['userid'];
        // Get the current timestamp for created_at and updated_at
        $currentTimestamp = date('Y-m-d H:i:s');

        // Check if the form has been submitted and the fields are not empty
        if (!empty($title) && !empty($firstname) && !empty($lastname) && !empty($email) && !empty($telephone) && !empty($company) && !empty($type) && !empty($assigned_to)) {

            // Check if the contact with the same email already exists
            $checkQuery = $conn->prepare("SELECT * FROM contacts WHERE email = ?");
            $checkQuery->bindParam(1, $email);
            $checkQuery->execute();

            if ($checkQuery->rowCount() > 0) {
                $response = "The contact with the provided email already exists.";
            } else {
                // Performing insert query execution
                $insertQuery = $conn->prepare("INSERT INTO contacts (title, firstname, lastname, email, telephone, company, type, assigned_to, created_by, created_at, updated_at) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

                // Bind parameters to the prepared statement
                $insertQuery->bindParam(1, $title);
                $insertQuery->bindParam(2, $firstname);
                $insertQuery->bindParam(3, $lastname);
                $insertQuery->bindParam(4, $email);
                $insertQuery->bindParam(5, $telephone);
                $insertQuery->bindParam(6, $company);
                $insertQuery->bindParam(7, $type);
                $insertQuery->bindParam(8, $assigned_to);
                $insertQuery->bindParam(9, $created_by);
                $insertQuery->bindParam(10, $currentTimestamp);
                $insertQuery->bindParam(11, $currentTimestamp);

                // Execute the prepared statement
                $insertQuery->execute();

                // Check if the query was successful
                if ($insertQuery->rowCount() > 0) {
                    $response = "Contact successfully added.";
                } else {
                    $response = "Something went wrong. Please try again later.";
                }
            }
        } else {
            $response = "Please fill in all the required fields.";
        }

        echo $response;
        exit;

    }

} catch (PDOException $e) {
    $response = "Database error. Please try again later.";
}
?>
