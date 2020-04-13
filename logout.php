<?php
//session_name('Admin');
session_start(); //Start the current session
unset ($_SESSION['user']);
unset ($_SESSION['u_name']);
session_destroy(); //Destroy it! So we are logged out now
header("location:./?rdr=home&msg=Successfully-Logged-out"); // Move back to login.php with a logout message
?>