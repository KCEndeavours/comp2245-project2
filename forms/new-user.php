<?php

require_once "../config.php";
// include_once "head.php";
$currentPage = 'user';

?>
<h2>Add New User</h2>
   </head>
   <body>
      <main>
         <h3>Add new user to Dolphin Database</h3>
         <form onsubmit="return checkUser()">
             
            <p>
               <label for="firstName">First Name:</label>
               <input type="text" name="firstname" id="firstName">
            </p>
 
             
            <p>
               <label for="lastName">Last Name:</label>
               <input type="text" name="lastname" id="lastName">
            </p>
 
             
            <p>
               <label for="Password">Password:</label>
               <input type="password" name="password" id="Password">
            </p>
 
             
            <p>
               <label for="emailAddress">Email Address:</label>
               <input type="email" name="email" id="emailAddress">
            </p>
 
             
            <p>
               <label for="role">Role:</label>
               <select id="role" name="role" required>
                <option value="Member">Member</option>
                <option value="Admin">Admin</option>
               </select>
            </p>
 
            <input type="submit" value="Submit">
         </form>
        </main>
   </body>
</html>
