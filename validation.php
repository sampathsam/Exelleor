<?php



$conn= mysqli_connect('localhost', 'root', 'sam', 'test');


if(isset($_POST['register'])){
	$email = $_POST['email'];
	$password = $_POST['pass'];

	mysqli_query($conn, "INSERT INTO users(email, password) VALUES('$email', '$password')");
	session_start();
	$_SESSION['email']=$email;
	# header('location: /application');
}

if(isset($_POST['signin'])){
	$email = $_POST['email'];
	$password = $_POST['pass'];
	session_start();
	$_SESSION['email']=$email;
	# header('location: /application');

}
if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

?>