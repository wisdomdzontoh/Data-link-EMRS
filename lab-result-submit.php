<?php include('dbconfig.php') ?>
<?php
// Retrieve form data
$fullName = $_POST['fullName'];
$opdNumber = $_POST['opdNumber'];
$NHISnumber = $_POST['NHISnumber'];
$dateOfVisit = $_POST['dateOfVisit'];
$age = $_POST['age'];
$ageGroup = $_POST['ageGroup'];
$gender = $_POST['gender'];
$TypeOfTest = $_POST['TypeOfTest'];
$sourceOfRequest = $_POST['sourceOfRequest'];
$pathologyNumber = $_POST['pathologyNumber'];
$timeSampleReceived = $_POST['timeSampleReceived'];
$Provisional = $_POST['Provisional'];
$resultsOfTest = $_POST['resultsOfTest'];
$pharmacyNotes = $_POST['pharmacyNotes'];
$costOfTest = $_POST['costOfTest'];
$clientStatus = $_POST['clientStatus'];


// Prepare and bind the SQL statement
$sql = "INSERT INTO tbl_lab (fullName, opdNumber, NHISnumber, dateOfVisit, age, ageGroup, gender, Provisional, TypeOfTest, sourceOfRequest, pathologyNumber, timeSampleReceived, resultsOfTest, pharmacyNotes, costOfTest, clientStatus) 
VALUES ('$fullName', '$opdNumber', '$NHISnumber', '$dateOfVisit', '$age', '$ageGroup', '$gender', '$Provisional', '$TypeOfTest', '$sourceOfRequest', '$pathologyNumber', '$timeSampleReceived', '$resultsOfTest', '$pharmacyNotes', '$costOfTest', '$clientStatus')";

// Check if the user was successfully inserted
// check if the user was successfully inserted
if (mysqli_query($conn, $sql)) {
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Your SweetAlert code here
            swal({
                title: "Success!",
                text: "Lab results added",
                icon: "success",
                button: "OK",
            }).then(function () {
                // Redirect after displaying the SweetAlert message
                window.location.href = "labresults.php?msg=Data updated successfully";
            });
        });
    </script>
    <?php
    exit(); // Exit the script after displaying the SweetAlert
} else {
    // Display an error message
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
 