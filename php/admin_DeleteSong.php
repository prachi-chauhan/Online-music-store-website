<?php
include 'dbconnect.php';
#include '../homepage.php';
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$key = $_POST["songId"];

$sql = "UPDATE songs SET flag = 1 WHERE song_id = '$key' ";



//$sql = "DELETE FROM cart where song_id= '$key'";
//echo $sql;
$result = $conn->query($sql);

$sql2 = "UPDATE cart SET flag = 1 WHERE song_id = '$key' ";

$result2 = $conn->query($sql2);


$conn->close();
?>