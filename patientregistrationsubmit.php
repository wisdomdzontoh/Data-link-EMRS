<?php
include('dbconfig.php');

// Retrieve form data
$fullName = $_POST['fullName'];
$DOB = $_POST['DOB'];
$email = $_POST['email'];
$phoneNumber = $_POST['phoneNumber'];
$gender = $_POST['gender'];
$Occupation = $_POST['Occupation'];
$opdNumber = $_POST['opdNumber'];
$age = $_POST['age'];
$ageGroup = $_POST['ageGroup'];
$clientStatus = $_POST['clientStatus'];
$NHISnumber = $_POST['NHISnumber'];
$dateOfVisit = $_POST['dateOfVisit'];
$address = $_POST['address'];
$nationality = $_POST['nationality'];
$clientType = $_POST['clientType'];
$nameOfGuardian = $_POST['nameOfGuardian'];
$phoneOfGuardian = $_POST['phoneOfGuardian'];
$spo2 = $_POST['spo2'];
$respiratory_rate = $_POST['respiratory_rate'];
$pulse = $_POST['pulse'];
$temperature = $_POST['temperature'];
$rbs = $_POST['rbs'];
$weight = $_POST['weight'];
$height = $_POST['height'];
$bp = $_POST['bp'];

// Prepare and bind the SQL statement
$stmt = mysqli_prepare($conn, "INSERT INTO patientregistration (fullName, DOB, email, phoneNumber, gender, Occupation, opdNumber, age, ageGroup, clientStatus, NHISnumber, dateOfVisit, address, nationality, clientType, nameOfGuardian, phoneOfGuardian, spo2, respiratory_rate, pulse, temperature, rbs, weight, height, bp) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");


mysqli_stmt_bind_param($stmt, "sssssssissssssssssssisiis", $fullName, $DOB, $email, $phoneNumber, $gender, $Occupation, $opdNumber, $age, $ageGroup, $clientStatus, $NHISnumber, $dateOfVisit, $address, $nationality, $clientType, $nameOfGuardian, $phoneOfGuardian, $spo2, $respiratory_rate, $pulse, $temperature, $rbs, $weight, $height, $bp);

if (mysqli_stmt_execute($stmt)) {
    // Display the success message if available
   ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Your SweetAlert code here
            swal({
                title: "Success!",
                text: "Patient added successfully",
                icon: "success",
                button: "OK",
            }).then(function () {
                // Redirect after displaying the SweetAlert message
                window.location.href = "registrationpatient.php?msg=Data updated successfully";
            });
        });
    </script>
    <?php
    exit();
} else {
    // Form submission failed
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>