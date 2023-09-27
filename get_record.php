<?php
// Establish a database connection
$servername = "sql109.epizy.com";
$username = "epiz_33722902";
$password = "DgRYDMrBI3RPg";
$dbname = "epiz_33722902_hims";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the record ID from the AJAX request
$recordId = $_POST['recordId'];

// Prepare a SELECT query to fetch the record details
$sql = "SELECT * FROM patientregistration WHERE id = $recordId";

// Execute the query
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the record details
    $record = $result->fetch_assoc();

    // Convert the record details to JSON format
    $jsonResponse = json_encode($record);

    // Return the JSON response
    echo $jsonResponse;
} else {
    // No record found with the given ID
    echo "Record not found";
}

// Close the database connection
$conn->close();
?>
