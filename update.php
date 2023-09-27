<?php
// Assuming you have a database connection established
// Replace the placeholders with your actual database credentials
$servername = "sql109.epizy.com";
$username = "epiz_33722902";
$password = "DgRYDMrBI3RPg";
$dbname = "epiz_33722902_hims";

// Create a new PDO instance
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // Handle any database connection errors
    echo "Connection failed: " . $e->getMessage();
    exit;
}

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the updated data from the POST request
    $id = $_POST['id'];
    $fullName = $_POST['fullName'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $gender = $_POST['gender'];
    $occupation = $_POST['occupation'];
    $opdNumber = $_POST['opdNumber'];
    $age = $_POST['age'];
    $ageGroup = $_POST['ageGroup'];
    $clientStatus = $_POST['clientStatus'];
    $nhisNumber = $_POST['nhisNumber'];
    $dateOfVisit = $_POST['dateOfVisit'];
    $address = $_POST['address'];
    $nationality = $_POST['nationality'];
    $houseNumber = $_POST['houseNumber'];
    $clientType = $_POST['clientType'];
    $nameOfGuardian = $_POST['nameOfGuardian'];
    $phoneOfGuardian = $_POST['phoneOfGuardian'];

    try {
        // Prepare the SQL query
        $stmt = $conn->prepare("UPDATE patientregistration SET
            fullName = :fullName,
            DOB = :dob,
            email = :email,
            phoneNumber = :phoneNumber,
            gender = :gender,
            Occupation = :occupation,
            opdNumber = :opdNumber,
            age = :age,
            ageGroup = :ageGroup,
            clientStatus = :clientStatus,
            NHISnumber = :nhisNumber,
            dateOfVisit = :dateOfVisit,
            address = :address,
            nationality = :nationality,
            houseNumber = :houseNumber,
            clientType = :clientType,
            nameOfGuardian = :nameOfGuardian,
            phoneOfGuardian = :phoneOfGuardian
            WHERE id = :id");

        // Bind the parameters
        $stmt->bindParam(':fullName', $fullName);
        $stmt->bindParam(':dob', $dob);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phoneNumber', $phoneNumber);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':occupation', $occupation);
        $stmt->bindParam(':opdNumber', $opdNumber);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':ageGroup', $ageGroup);
        $stmt->bindParam(':clientStatus', $clientStatus);
        $stmt->bindParam(':nhisNumber', $nhisNumber);
        $stmt->bindParam(':dateOfVisit', $dateOfVisit);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':nationality', $nationality);
        $stmt->bindParam(':houseNumber', $houseNumber);
        $stmt->bindParam(':clientType', $clientType);
        $stmt->bindParam(':nameOfGuardian', $nameOfGuardian);
        $stmt->bindParam(':phoneOfGuardian', $phoneOfGuardian);
        $stmt->bindParam(':id', $id);

        // Execute the query
        $stmt->execute();

        // Check if any rows were affected
        if ($stmt->rowCount() > 0) {
            // Return a success message
            echo "Record updated successfully";
        } else {
            // Return an error message if no rows were affected
            echo "No rows updated";
        }
    } catch(PDOException $e) {
        // Handle any database errors
        echo "Error updating record: " . $e->getMessage();
    }
} else {
    // Return an error message for invalid requests
    echo "Invalid request method";
}

// Close the database connection
$conn = null;
?>
