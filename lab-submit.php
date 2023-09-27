<?php
include "dbconfig.php";

$id = isset($_GET["id"]) ? $_GET["id"] : null;

if ($id !== null) {
    if (isset($_POST["submit"])) {
        // Nurse-station data
        $fullName = $_POST['fullName'];
        $opdNumber = $_POST['opdNumber'];
        $age = $_POST['age'];
        $ageGroup = $_POST['ageGroup'];
        $dateOfVisit = $_POST['dateOfVisit'];
        $gender = $_POST['gender'];
        $provisional = $_POST['provisional'];
        $clientType = $_POST['clientType'];
        $doctorConsulted = $_POST['doctorConsulted'];
        $cost = $_POST['cost'];
        $sourceOfRequest = $_POST['sourceOfRequest'];
        $pathologyNumber = $_POST['pathologyNumber'];
        $TypeOfTest = $_POST['TypeOfTest'];
        $dateSampleReceived = $_POST['dateSampleReceived'];
        $timeSampleReceived = $_POST['timeSampleReceived'];
        $resultsOfTest = $_POST['resultsOfTest'];
        $labNotes = $_POST['labNotes']; // Renamed to avoid duplication

        // Update patient consulting_room data using prepared statement
        $sql = "UPDATE `consulting_room` SET
            `fullName`=?, `opdNumber`=?, `dateOfVisit`=?, `gender`=?,
            `age`=?, `ageGroup`=?, `clientStatus`=?, `NHISnumber`=?,
            `dateOfVisit`=?, `clientType`=?, `Provisional`=?, `notes`=?, `cost`=?
        WHERE id = ?";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssssissssssssi", $fullName, $opdNumber, $dateOfVisit, $gender, $age, $ageGroup, $clientStatus, $NHISnumber, $dateOfVisit, $clientType, $provisional, $labNotes, $cost, $id);

        if (mysqli_stmt_execute($stmt)) {
            // Insert data into the nursestation table using prepared statement
            $sql2 = "INSERT INTO `tbl_lab`(`opdNumber`, `fullName`, `sourceOfRequest`, `NHISnumber`, `age`, `Provisional`, `clientStatus`, `ageGroup`, `cost`, `pathologyNumber`, `TypeOfTest`, `dateSampleReceived`, `timeSampleReceived`, `resultsOfTest`, `notes`)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt2 = mysqli_prepare($conn, $sql2);
            mysqli_stmt_bind_param($stmt2, "sssssssssssssss", $opdNumber, $fullName, $sourceOfRequest, $NHISnumber, $age, $provisional, $clientStatus, $ageGroup, $cost, $pathologyNumber, $TypeOfTest, $dateSampleReceived, $timeSampleReceived, $resultsOfTest, $labNotes);

            if (mysqli_stmt_execute($stmt2)) {
                header("Location: labresults.php?msg=Data updated successfully");
                exit; // Terminate script execution after redirection
            } else {
                echo "Failed to insert data into the nursestation table: " . mysqli_error($conn);
            }
        } else {
            echo "Failed to update lab results data: " . mysqli_error($conn);
        }
    }
} else {
    // Handle the case where 'id' is not provided in the URL
    echo "ID parameter is missing in the URL.";
}
?>