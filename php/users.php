<?php

// Start or resume the session
session_start();


include_once("../config.php");      
$currentPage = 'users';
?>

<div id="head">
    <h2 id="all-users">All Users</h2>
    <button id="addUser" onclick="addUser()"><i class="fa-solid fa-plus"></i>  New User</button>
</div>
<div class=tableContainer>
    <table cellspacing="0" cellpadding="2" id="resultTable">
        <thead>
            <tr id= tHead>
                <th width="30%">Name</th>
                <th width="30%">Email</th>
                <th width="15%">Role</th>
                <th width="25%">Created</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = $conn->prepare("SELECT * FROM users ORDER BY id DESC");
                $query->execute();

                $rowCount = $query->rowCount(); //Get amout of rows
                
                if ($rowCount > 0) {
                    while ($row = $query->fetch()) {
            ?>
                    <tr class="record">
                        <td><?php echo $row['firstname'] . ' ' . $row['lastname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['role']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>
                    </tr>
            <?php
                        }
                    } else {
                        echo '<tr><td colspan="13">No users found.</td></tr>';
                    }
            ?>
        </tbody>
    </table>
</div>
