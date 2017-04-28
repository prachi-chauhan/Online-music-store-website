<?php
include 'dbconnect.php';
session_start();
#include '../homepage.php';
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$username = $_POST["username"];

$song_ids = json_decode(stripslashes($_POST['song_ids']));
$count = 0;

foreach($song_ids as $song_id){
	
	list($mid, $qty,$price) = explode(':', $song_id);
	
	$total_price = $price * $qty;
	$sql =  "insert into transactions(username, song_id, start_date, transaction_status,transaction_price) values('".$username. "',". $mid . ", current_timestamp ," ."'checkout'".",".$total_price.")";
	#echo $sql;
	$result = $conn->query($sql);
	$sql2 = "UPDATE songs SET qty = qty-$qty where song_id =$mid ";
	//echo $sql2;
	$result2 = $conn->query($sql2);	
	$sql3 = "DELETE from cart where song_id =$mid and username='".$_SESSION["username"]."'";
	$result3 = $conn->query($sql3);	
	//echo $sql3;
}


//echo $sql;

$conn->close();
//header("Location: order_History.php");

?>