<?php
$host = 'localhost';
$username = 'admin@project2.com';
$password = 'password123';
$dbname = 'dolphin';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Get user inout from GET parameters
    $email = $_GET['email'];
    $password = $_GET['password'];

    
    // Validate user credentials (simplified for demonstration purposes)
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    // Check if a user with the provided credentials exists
    if ($stmt->rowCount() > 0) {
        // Set session variables to track the user
        session_start();
        $_SESSION['email'] = $email;

        // You can redirect the user to the dashboard or perform other actions
        echo "Login successful!";
    } else {
        echo "Invalid credentials";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>