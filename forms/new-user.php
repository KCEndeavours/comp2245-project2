<?php

require_once "../config.php";
// include_once "head.php";
$currentPage = 'user';

?>
<div id="head">
   <h2>Add New User</h2>
</div>

<form id="newUse" onsubmit="return checkUser()">
      
   <div id="a" width= "100%">
      <label for="firstname">First Name:</label>
      <input type="text" name="firstname" id="firstname" required>
   </div>

      
   <div id="b">
      <label for="lastname">Last Name:</label>
      <input type="text" name="lastname" id="lastname" required>
   </div>

      
   <div id="c">
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" required>
   </div>

      
   <div id="d">
      <label for="email">Email Address:</label>
      <input type="email" name="email" id="email" required>
   </div>

      
   <div id="e">
      <label for="role">Role:</label>
      <select id="role" name="role" required>
         <option value="Member">Member</option>
         <option value="Admin">Admin</option>
      </select>
   </div>

   <input id="f" type="submit" class="btn" value="Submit">
</form>

