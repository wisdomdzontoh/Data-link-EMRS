<?php
// Connect to the database
$host = "sql109.epizy.com";
$username = "epiz_33722902";
$password = "DgRYDMrBI3RPg";
$dbname = "epiz_33722902_hims";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the search query from the AJAX request
if (isset($_POST['search'])) {
    $filtervalues = $_POST['search'];

    // Prepare the SQL statement with a WHERE clause for searching
    $query = "SELECT * FROM patientregistration WHERE CONCAT(fullName, DOB, email, phoneNumber, gender, Occupation, opdNumber, age, ageGroup, clientStatus, NHISnumber, dateOfVisit, address, nationality, houseNumber, clientType, nameOfGuardian, phoneOfGuardian) LIKE '%$filtervalues%'";
    $result = mysqli_query($conn, $query);

    // Generate HTML for the search results
    $html = "";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Generate HTML for each search result row
            $html .= "<li><a href='#' class='client-link' data-fullname='" . $row["fullName"] . "'>" . $row["fullName"] . "</a></li>";
        }
    } else {
        // No search results found
        $html = "<li>No results found.</li>";
    }

    // Return the HTML as the response
    echo $html;
}

// Close the database connection
$conn->close();
?>
