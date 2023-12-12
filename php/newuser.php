<?php

// Start or resume the session
session_start();

try {
    // Include your database connection file
    include('../config.php');

    //Validate the password
    function validatePassword($password) {
        // Ensure passwords have at least one letter, one capital letter, and at least 8 characters long
        $regex = '/^(?=.*[a-z])(?=.*[A-Z]).{8,}$/';
        return preg_match($regex, $password);
    }

    // Check if the page was loaded due to a form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
        // Taking all 5 values from the form data(input)
        $firstname = htmlspecialchars($_POST['firstname']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $password =  $_POST['password'];
        $email = htmlspecialchars($_POST['email'], FILTER_SANITIZE_EMAIL);
        $role = htmlspecialchars($_POST['role']);
        // Get the current timestamp for created_at
        $currentTimestamp = date('Y-m-d H:i:s');

        if (!validatePassword($password)) {
            $response = "Password must have at least one letter, one capital letter, and be at least 8 characters long.";
        } else {
            //Hash the password
            $hashed_pass = password_hash($password, PASSWORD_BCRYPT);

            if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($password) && !empty($role)) {

                // Check if the contact with the same email already exists
                $checkQuery = $conn->prepare("SELECT * FROM contacts WHERE email = ?");
                $checkQuery->bindParam(1, $email);
                $checkQuery->execute();

                if ($checkQuery->rowCount() > 0) {
                    $response = "A user with the provided email already exists.";;
                } else {
            
                    // Performing insert query execution
                    $insertQuery = $conn->prepare("INSERT INTO users (firstname, lastname, password, email, role, created_at) VALUES (?, ?, ?, ?, ?, ?)");

                    //Bind parameters to the statment
                    $insertQuery->bindParam(1, $firstname);
                    $insertQuery->bindParam(2, $lastname);
                    $insertQuery->bindParam(3, $hashed_pass);
                    $insertQuery->bindParam(4, $email);
                    $insertQuery->bindParam(5, $role);
                    $insertQuery->bindParam(6, $currentTimestamp);
                            
                    $insertQuery->execute();

                    // Check if the query was successful
                    if ($insertQuery->rowCount() > 0) {
                        $response = "User successfully added.";
                    } else {
                        $response = "Something went wrong. Please try again later.";
                    }
                }
            } else {
                $response = "Please fill in all the required fields.";
            }
        }

        // Send response
        echo $response;
        exit;
    }

} catch (PDOException $e) {
echo 'Error: ' . $e->getMessage();
}
?>