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
        if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($telephone) && !empty($company) && !empty($type) && !empty($assigned_to)) {

            // Check if the contact with the same email already exists
            $checkQuery = $conn->prepare("SELECT * FROM contacts WHERE email = ?");
            $checkQuery->bindParam(1, $email);
            $checkQuery->execute();

            if ($checkQuery->rowCount() > 0) {
                echo '<script>alert("The contact with the provided email already exists.");</script>';
            } else {
                // Performing insert query execution
                $insertQuery = $conn->prepare("INSERT INTO contacts (firstname, lastname, email, telephone, company, type, assigned_to, created_by, created_at, updated_at) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

                // Bind parameters to the prepared statement
                $insertQuery->bindParam(1, $firstname);
                $insertQuery->bindParam(2, $lastname);
                $insertQuery->bindParam(3, $email);
                $insertQuery->bindParam(4, $telephone);
                $insertQuery->bindParam(5, $company);
                $insertQuery->bindParam(6, $type);
                $insertQuery->bindParam(7, $assigned_to);
                $insertQuery->bindParam(8, $created_by);
                $insertQuery->bindParam(9, $currentTimestamp);
                $insertQuery->bindParam(10, $currentTimestamp);

                // Execute the prepared statement
                $insertQuery->execute();

                // Check if the query was successful
                if ($insertQuery->rowCount() > 0) {
                    echo '<script>alert("Contact successfully added.");</script>';
                    echo "Contact successfully added";
                } else {
                    echo '<script>alert("Something went wrong. Please try again later.");</script>';
                }
            }
        } else {
            echo '<script>alert("Please fill in all the required fields.");</script>';
        }

    }

} catch (PDOException $e) {
    echo '<script>alert("Database error. Please try again later.");</script>';
}
?>
