<?php
$host = 'localhost';
$username = 'admin@project2.com';
$password = 'password123';
$dbname = 'dolphin';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch data from the users table
    $stmt = $conn->query("SELECT * FROM users");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($users) {
        echo '<table border="1" id="usersTable">';
        echo '<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Role</th></tr>';

        foreach ($users as $user) {
            echo '<tr id="user_' . $user['id'] . '">';
            echo '<td>' . $user['id'] . '</td>';
            echo '<td>' . $user['title'] . '</td>';
            echo '<td>' . $user['firstname'] . '</td>';
            echo '<td>' . $user['lastname'] . '</td>';
            echo '<td>' . $user['email'] . '</td>';
            echo '<td>' . $user['role'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo 'No users found.';
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
