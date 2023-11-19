<?php
$host = 'localhost';
$username = 'admin@project2.com';
$password = 'password123';
$dbname = 'dolphin';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch data from the contacts table
    $stmt = $conn->query("SELECT * FROM contacts");
    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($contacts) {
        echo '<table border="1" id="contactsTable">';
        echo '<tr><th>ID</th><th>Title</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Telephone</th><th>Company</th><th>Type</th></tr>';

        foreach ($contacts as $contact) {
            echo '<tr id="contact_' . $contact['id'] . '">';
            echo '<td>' . $contact['id'] . '</td>';
            echo '<td>' . $contact['title'] . '</td>';
            echo '<td>' . $contact['firstname'] . '</td>';
            echo '<td>' . $contact['lastname'] . '</td>';
            echo '<td>' . $contact['email'] . '</td>';
            echo '<td>' . $contact['telephone'] . '</td>';
            echo '<td>' . $contact['company'] . '</td>';
            echo '<td>' . $contact['type'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo 'No contacts found.';
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
