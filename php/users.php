<?php

// Start or resume the session
session_start();


include_once("../config.php");      
// include_once("head.php");
$currentPage = 'users';
// include_once("sidemenu.php");
?>

<h2>All Users</h2>
<div>
<button id="addUser" onclick="addUser()">Add New User</button>
    <input type="text" name="filter" value="" id="filter" placeholder="Search Users..." autocomplete="off" />

</div>
<table cellspacing="0" cellpadding="2" id="resultTable">
    <thead>
        <tr>
            <th width="5%">ID</th>
            <th width="7%">First Name</th>
            <th width="10%">Last Name</th>
            <th width="8%">Password</th>
            <th width="10%">Email</th>
            <th width="23%">Role</th>
            <th width="10%">Created at</th>
            <th width="10%"> Action </th>
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
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $row['lastname']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['role']; ?></td>
                    <td><?php echo $row['created_at']; ?></td>
                    <td><a rel="facebox" href="editform.php?id=<?php echo $row['id']; ?>"> Edit </a> | <a href="#" id="<?php echo $row['id']; ?>" class="delbutton" title="Click To Delete">Delete</a></td>
                </tr>
        <?php
                    }
                } else {
                    echo '<tr><td colspan="13">No users found.</td></tr>';
                }
        ?>
    </tbody>
</table>
