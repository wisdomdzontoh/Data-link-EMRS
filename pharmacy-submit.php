<?php include('dbconfig.php') ?>
<?php
// Retrieve form data
$fullName = $_POST['fullName'];
$opdNumber = $_POST['opdNumber'];
$NHISnumber = $_POST['NHISnumber'];
$dateOfVisit = $_POST['dateOfVisit'];
$age = $_POST['age'];
$ageGroup = $_POST['ageGroup'];
$dateOfMedicineDispensed = $_POST['dateOfMedicineDispensed'];
$weight = $_POST['weight'];
$gender = $_POST['gender'];
$PrincipalDiagnosis = $_POST['PrincipalDiagnosis'];
$AdditionalDiagnosis1 = $_POST['AdditionalDiagnosis1'];
$nameOfPrescriber = $_POST['nameOfPrescriber'];
$DosageForm = $_POST['DosageForm'];
$nameOfMedicine = $_POST['nameOfMedicine'];
$genericName = $_POST['genericName'];
$Formulation = $_POST['Formulation'];
$Strength = $_POST['Strength'];
$Frequency = $_POST['Frequency'];
$QuantityDispensed = $_POST['QuantityDispensed'];
$timeMedicineDispensed = $_POST['timeMedicineDispensed'];
$costOfMedicine = $_POST['costOfMedicine'];
$clientStatus = $_POST['clientStatus'];
$pharmacyNotes = $_POST['pharmacyNotes'];


// Prepare and bind the SQL statement
$sql = "INSERT INTO tbl_pharmacy (fullName, opdNumber, NHISnumber, dateOfVisit, age, ageGroup, dateOfMedicineDispensed, weight, gender, PrincipalDiagnosis, AdditionalDiagnosis1, nameOfPrescriber, DosageForm, genericName, Formulation, Strength, Frequency, QuantityDispensed, timeMedicineDispensed, costOfMedicine, clientStatus, pharmacyNotes) 
VALUES ('$fullName', '$opdNumber', '$NHISnumber', '$dateOfVisit', '$age', '$ageGroup', '$dateOfMedicineDispensed', '$weight', '$gender', '$PrincipalDiagnosis', '$AdditionalDiagnosis1', '$nameOfPrescriber', '$DosageForm', '$genericName', '$Formulation', '$Strength', '$Frequency', '$QuantityDispensed', '$timeMedicineDispensed', '$costOfMedicine', '$clientStatus', '$pharmacyNotes')";

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
                text: "Medication added successfully",
                icon: "success",
                button: "OK",
            }).then(function () {
                // Redirect after displaying the SweetAlert message
                window.location.href = "pharmacy.php?msg=Data updated successfully";
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
 