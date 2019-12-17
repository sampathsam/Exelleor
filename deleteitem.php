<?php 
session_start();

$conn = mysqli_connect('localhost', 'root', 'sam', 'test');

if(isset($_GET['id'])){
	$id = $_GET['id'];
	$query = mysqli_query($conn, "DELETE from cartitems WHERE id=$id AND user='".$_SESSION['email']."' LIMIT 1");
	header("Location: " . $_SERVER["HTTP_REFERER"]);

}

?>