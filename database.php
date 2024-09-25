<?php
$host ="localhost";
$User ="root";
$Password="";
$db = "login";
$conn=mysqli_connect($host,$User,$Password,$db);
if (!$conn) {
    die("Something went wrong");
}
?>