<?php

require_once "config.php";
require_once "session.php";

$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if($query = $conn->prepare("SELECT * FROM users WHERE email = ?")) {
        $query->bindParam(1, $email);
        $query->execute();
        $row = $query->fetch();
        if ($row) {
            // if (password_verify($password, $row['password'])) {
            if ($password === $row['password']) {
                $_SESSION['userid'] = $row['id'];
                $_SESSION['user'] = $row;;
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['userrole'] = $row['role'];


                //Redirect the user to welcome page
                header("location: index.php");
                exit;
            } else {
                echo '<div class="alert alert-danger">Invalid username or password</div>';
                echo 'Username: ' . $email . '<br>';
                echo 'Entered password: ' . $password . '<br>';
                echo 'Hashed password in the database: ' . $row['password'] . '<br>';
            }
        } else {
            echo "<p>No account found for that email.</p>";
            echo 'Username: ' . $email . '<br>';

        }
    }
}
?>

<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
		<title>Dolphin CRM</title>

		<!-- you can modify this as needed or to your preference -->
		<link href="dolphin.css" type="text/css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- <script src="dolphin.js" type="text/javascript"></script> -->
	</head>

    <body>
    <header>
        <img src="dolphin.png" alt="dolphin logo" class="headerimg">
        <h1>Dolphin CRM</h1>
    </header>

    <main>
        <div id="LoginForm">
            <h2 class="login">Login</h2>
            <form id="loginForm" action="" method="post">
                <div class="input-container">
                    <input id="email" type="email" name="email" placeholder="Email address" required />
                </div>
                <div class="input-container">
                    <input id="password" type="password" name="password" placeholder="Password" required />
                </div>
                <div class="button-container">
                <button type="submit" class="btn">
                    <i class="fa fa-lock lock-icon"></i> Login
                </button>
            </div>
            </form>
        </div>
    </main>

    <footer>
        &copy; 2023 DolphinCRM | All rights reserved
    </footer>
</body>
</html>