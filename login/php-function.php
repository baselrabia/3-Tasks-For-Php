<?php
print_r($_POST);
$name=$_POST['name'];
$pass=$_POST['pass'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loginDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = 'SELECT id, username, password FROM users where username="'.$name.'"';
$result = $conn->query($sql);
$row = $result->fetch_assoc();


if (isset($row)) {

	if ($row['password'] === $pass) {

		$sql2 = 'SELECT role FROM roles where userID="'.$row['id'].'"';
		$result2 = $conn->query($sql2);
		$row2 = $result2->fetch_assoc();
	echo "<h1>you are login now </h1><p>Your Role is :".$row2['role']."</p>";
	if ($row2['role'] == 'admin') {
		header("Location: admin.php");
		die();
	}elseif ($row2['role'] == 'user') {
		header("Location: user.php");
		die();
	}

	}else{
	echo "<h1>Password Wrong </h1>";

	}    
} else {
    echo "<h1>No User Found</h1>";
}


$conn->close();
?>