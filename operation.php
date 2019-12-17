<?php 
session_start();

$conn = mysqli_connect('localhost', 'root', 'sam', 'test');

if(isset($_GET['id'])){
	$id = $_GET['id'];

	$query = "SELECT * FROM shopitems WHERE id=$id";
	$data = mysqli_query($conn, $query);
	$row = mysqli_fetch_array($data);
	$type = $row['type'];
	$name = $row['name'];
	$quantity = $row['quantity'];
	$units = $row['units'];
	$image = $row['image'];
	$price = $row['price'];
	$discprice = $row['discountedprice'];
	$email = $_SESSION['email'];



	mysqli_query($conn, "INSERT into cartitems(id, type, name, quantity, units, image, price, discountedprice, user) VALUES('$id', '$type', '$name', '$quantity', '$units', '$image', '$price', '$discprice', '$email')");
	header("Location: " . $_SERVER["HTTP_REFERER"]);
}


?>