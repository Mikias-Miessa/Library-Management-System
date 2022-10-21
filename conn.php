<?php
//Define your host here.
$HostName = "localhost";

//Define your database username here.
$HostUser = "dbreader";

//Define your database password here.
$HostPass = "YES";

//Define your database name here.
$DatabaseName = "abuneg01";

//global $con;

$con = mysqli_connect($HostName, $HostUser , $HostPass, $DatabaseName);
// Check connection
if ($con->connect_error) {
   die("Connectioin failed: " . $con->connect_error);
}
// else
// echo "Connection successfull!"

?>