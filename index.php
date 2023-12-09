<?php
//start the session
session_start();

// Check if the user is not logged in, then redirect the user to login page
if (!isset($_SESSION['userid']) || empty($_SESSION['userid'])) {
    header("Location: login.php");
    exit;
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
		<!-- <script src="js/app.js" type="text/javascript"></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script src="js/navi.js" type="text/javascript"></script>
        

	</head>

	<body>
		<header>
			<img src="dolphin.png" alt="dolphin logo" class="headerimg">
			<h1>Dolphin CRM</h1>
		</header>
        <div id="container">
			<aside>
                <ul>
                    <li class="nav-item" id="home"><i class="fa fa-home"></i> Home</li>
                    <li class="nav-item" id="newContact"><i class="fa fa-user-circle"></i> New Contact</li>
                    <?php if (isset($_SESSION['userrole']) && $_SESSION['userrole'] === 'IT Support') : ?>
                    <li class="nav-item" id="users"><i class="fa fa-users"></i> Users</li>
                    <?php endif; ?>
                    <li class="nav-item" id="logout" role="'button" id="logout"><i class="fa fa-arrow-circle-o-left"></i> Logout</li>
                </ul>
            </aside>

            <main>
                <div id="dashMain">
                    <div id="content-container">
                        
                    </div>
                    <div id="message">
                    </div>
                        
                </div>
            </main>
        </div>

        <footer>
            &copy; 2023 DolphinCRM | All rights reserved
        </footer>

	</body>
</html>