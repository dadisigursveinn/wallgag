<?php

session_start();

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage

}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp


$dbhost = "tagl.is"; // this will ususally be 'localhost', but can sometimes differ
$dbname = "dadis_PictureBase"; // the name of the database that you are going to use for this project
$dbuser = "dadis"; // the username that you created, or were given, to access your database
$dbpass = ""; // the password that you created, or were given, to access your database
 
mysql_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_error());
mysql_select_db($dbname) or die("MySQL Error: " . mysql_error());
?>