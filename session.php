<?php
	// database credentials
$servername = "sql109.epizy.com";
$username = "epiz_33722902";
$password = "DgRYDMrBI3RPg";
$dbname = "epiz_33722902_hims";

// create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


<?php 
	}
		$session_id=$_SESSION['id'];
		$user_query = $conn->query("SELECT * FROM users WHERE id = '$session_id'") or die(mysqli_errno());
		$user_row = $user_query->fetch_array();
		$user_username = $user_row['fullName'];
?>