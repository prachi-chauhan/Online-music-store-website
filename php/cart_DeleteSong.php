<?php
include 'dbconnect.php';
#include '../homepage.php';
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$key = $_POST["songId"];
$username = $_POST["username"];

$sql = "DELETE FROM cart where song_id= '$key' and username ='$username'";


$result = $conn->query($sql);
$conn->close();

//header("Location: Cart.php");
?>