<?php

function redirect($url) {
    header('Location: '.$url);
    die();
}

$email = $_POST['email'];
$password = $_POST['password'];

//database connection here

$con = new mysqli("localhost", "root", "", "inventory");
if($con->connect_error) {
	die("Failed to connect : ".$con->connect_error );
} else {
	$stmt = $con->prepare("SELECT * FROM users_for_inventory WHERE email = ?");
	$stmt->bind_param("s", $email);
	$stmt->execute();
	$stmt_result = $stmt->get_result();

	if($stmt_result->num_rows>0) {

		$data = $stmt_result->fetch_assoc();
		if($data['password'] === $password) {
			 redirect('sidebar.php');
		} else {
			echo "<h2>Invalid Email or Password</h2>";
		}
	 } else {
		echo "<h2>Invalid Email or Password</h2>";
	        }
}
?>