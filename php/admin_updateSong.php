<?php
include 'dbconnect.php';
#include '../homepage.php';
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$songId = $_POST["songId"];
$title = $_POST["title"];
$price = $_POST["price"];
$genre = $_POST["genre"];
$rating = $_POST["rating"];
$year = $_POST["year"];
$quantity = $_POST["quantity"];
$description = $_POST["description"];
$type = $_POST["type"];

//echo $price;

$sql = "UPDATE songs SET title='$title', price= '$price',genre='$genre',rating='$rating',yr='$year',qty='$quantity',type='$type' WHERE song_id = '$songId'";
//echo $sql;
$result = $conn->query($sql);
$conn->close();
header("Location: ../adminpage.php");
?>