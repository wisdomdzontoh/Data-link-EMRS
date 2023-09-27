<?php
// Establish a database connection
$servername = "sql109.epizy.com";
$username = "epiz_33722902";
$password = "DgRYDMrBI3RPg";
$dbname = "epiz_33722902_hims";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];

    // Create the SQL query to retrieve provisional diagnosis counts
    $diagnosisQuery = "SELECT `ProvisionalDiagnosis`, COUNT(*) AS `Count` FROM `consulting_room` WHERE `dateOfVisit` BETWEEN '$startDate' AND '$endDate' GROUP BY `ProvisionalDiagnosis`";

    // Execute the diagnosis query
    $diagnosisResult = $conn->query($diagnosisQuery);

    // Check if any rows are returned
    if ($diagnosisResult->num_rows > 0) {
        // Output the morbidity conditions summary
        $csvData = "Morbidity Conditions Summary\n";

        while ($row = $diagnosisResult->fetch_assoc()) {
            $condition = $row['ProvisionalDiagnosis'];
            $count = $row['Count'];

            $csvData .= "$condition, $count\n";
        }
    } else {
        $csvData = "No data found for the selected date range.";
    }

    // Create the SQL query to retrieve age group breakdown for males
    $malesQuery = "SELECT `ageGroup`, COUNT(*) AS `Count` FROM `consulting_room` WHERE `dateOfVisit` BETWEEN '$startDate' AND '$endDate' AND `gender` = 'Male' GROUP BY `ageGroup`";

    // Execute the males query
    $malesResult = $conn->query($malesQuery);

    // Check if any rows are returned
    if ($malesResult->num_rows > 0) {
        // Output the age group breakdown for males
        $csvData .= "\nAge Group Breakdown for Males\n";

        while ($row = $malesResult->fetch_assoc()) {
            $ageGroup = $row['ageGroup'];
            $count = $row['Count'];

            $csvData .= "$ageGroup, $count\n";
        }
    }

    // Create the SQL query to retrieve age group breakdown for females
    $femalesQuery = "SELECT `ageGroup`, COUNT(*) AS `Count` FROM `consulting_room` WHERE `dateOfVisit` BETWEEN '$startDate' AND '$endDate' AND `gender` = 'Female' GROUP BY `ageGroup`";

    // Execute the females query
    $femalesResult = $conn->query($femalesQuery);

    // Check if any rows are returned
    if ($femalesResult->num_rows > 0) {
        // Output the age group breakdown for females
        $csvData .= "\nAge Group Breakdown for Females\n";

        while ($row = $femalesResult->fetch_assoc()) {
            $ageGroup = $row['ageGroup'];
            $count = $row['Count'];

            $csvData .= "$ageGroup, $count\n";
        }
    }

    // Create the SQL query to retrieve grand total for all conditions
    $grandTotalQuery = "SELECT COUNT(*) AS `GrandTotal` FROM `consulting_room` WHERE `dateOfVisit` BETWEEN '$startDate' AND '$endDate'";

    // Execute the grand total query
    $grandTotalResult = $conn->query($grandTotalQuery);

    // Check if any rows are returned
    if ($grandTotalResult->num_rows > 0) {
        // Output the grand total for all conditions
        $row = $grandTotalResult->fetch_assoc();
        $grandTotal = $row['GrandTotal'];

        $csvData .= "\nGrand Total for All Conditions, $grandTotal\n";
    }

    // Close the database connection
    $conn->close();

    // Set headers for CSV file download
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="report.csv"');

    // Output the CSV data
    echo $csvData;
    exit;
}
?>
