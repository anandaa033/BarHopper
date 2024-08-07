<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'zbvfpszw_group_recommen';
// Create connection
$conn = new mysqli($servername, $username, $password , $dbname);


// Check connection
if($conn->connect_error){
	die("Connection failed: ".$conn->connect_error);
}
//echo"Connected successfully.<br>";
$sql = "SET NAMES UTF8";
$conn->query($sql);

?>