<?php

// Define database connection parameters
$host = 'sql109.epizy.com';
$username = 'epiz_33722902';
$password = 'DgRYDMrBI3RPg';
$database = 'epiz_33722902_maternal_deaths';

// Create a new database connection
$conn = new mysqli($host, $username, $password, $database);

// Check for connection errors
if ($conn->connect_error) {
  die('Failed to connect to the database: ' . $conn->connect_error);
}

// Handle POST requests
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the start and end dates from the form data
  $start_date = $_POST["start-date"];
  $end_date = $_POST["end-date"];

  // Prepare the SQL query
  $stmt = $conn->prepare("
    SELECT District, COUNT(Facility), COUNT(otherFacility) as total_deaths 
    FROM maternal_deaths_entered 
    WHERE DateOfDeath BETWEEN ? AND ?
    GROUP BY District
    ORDER BY total_deaths DESC
  ");
  $stmt->bind_param("ss", $start_date, $end_date);
  $stmt->execute();
  $result = $stmt->get_result();

  // Create a new PHPExcel object
  require_once 'PHPExcel.php';
  $excel = new PHPExcel();

  // Add a worksheet to the Excel file
  $worksheet = $excel->getActiveSheet();
  $worksheet->setTitle('Maternal Deaths Report');

  // Set the column headers
  $worksheet->setCellValue('A1', 'District');
  $worksheet->setCellValue('B1', 'Facility Deaths');
  $worksheet->setCellValue('C1', 'Other Facility Deaths');

  // Add the data from the database to the Excel file
  $row = 2;
  while ($row_data = mysqli_fetch_assoc($result)) {
    $worksheet->setCellValue('A' . $row, $row_data['District']);
    $worksheet->setCellValue('B' . $row, $row_data['COUNT(Facility)']);
    $worksheet->setCellValue('C' . $row, $row_data['total_deaths'] - $row_data['COUNT(Facility)']);
    $row++;
  }

  // Set the header information for the Excel file
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment; filename="maternal_deaths_report.xls"');

  // Write the Excel file to the output stream
  $writer = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
  $writer->save('php://output');

  // Add a download button to the page
  echo '<a href="maternal_deaths_report.xls" download><button>Download Report</button></a>';

  // Clean up
  mysqli_free_result($result);
  $stmt->close();
  $conn->close();
}
