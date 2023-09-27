<?php
// Include your database connection code here
include('dbconfig.php');

// Check if the user has submitted the form with date range inputs
if(isset($_POST['start_date']) && isset($_POST['end_date'])) {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    // Define the SQL query to retrieve the data
    $sql = "
    SELECT
        PrincipalDiagnosis,
        SUM(CASE WHEN AgeGroup = '0-28 days' AND Gender = 'male' AND statusOfPrincipal = 'New case' THEN 1 ELSE 0 END) AS '0-28 days Male',
        SUM(CASE WHEN AgeGroup = '1-11 months' AND Gender = 'male' AND statusOfPrincipal = 'New case' THEN 1 ELSE 0 END) AS '1-11 months Male',
        SUM(CASE WHEN AgeGroup = '1-4 Years' AND Gender = 'male' AND statusOfPrincipal = 'New case' THEN 1 ELSE 0 END) AS '1-4 Years Male',
        SUM(CASE WHEN AgeGroup = '5-9 Years' AND Gender = 'male' AND statusOfPrincipal = 'New case' THEN 1 ELSE 0 END) AS '5-9 Years Male',
        SUM(CASE WHEN AgeGroup = '10-14 Years' AND Gender = 'male' AND statusOfPrincipal = 'New case' THEN 1 ELSE 0 END) AS '10-14 Years Male',
        SUM(CASE WHEN AgeGroup = '15-17 Years' AND Gender = 'male' AND statusOfPrincipal = 'New case' THEN 1 ELSE 0 END) AS '15-17 Years Male',
        SUM(CASE WHEN AgeGroup = '18-19 Years' AND Gender = 'male' AND statusOfPrincipal = 'New case' THEN 1 ELSE 0 END) AS '18-19 Years Male',
        SUM(CASE WHEN AgeGroup = '20-34 Years' AND Gender = 'male' AND statusOfPrincipal = 'New case' THEN 1 ELSE 0 END) AS '20-34 Years Male',
        SUM(CASE WHEN AgeGroup = '35-49 Years' AND Gender = 'male' AND statusOfPrincipal = 'New case' THEN 1 ELSE 0 END) AS '35-49 Years Male',
        SUM(CASE WHEN AgeGroup = '50-59 Years' AND Gender = 'male' AND statusOfPrincipal = 'New case' THEN 1 ELSE 0 END) AS '50-59 Years Male',
        SUM(CASE WHEN AgeGroup = '60-69 Years' AND Gender = 'male' AND statusOfPrincipal = 'New case' THEN 1 ELSE 0 END) AS '60-69 Years Male',
        SUM(CASE WHEN AgeGroup = '70 Yrs & Above' AND Gender = 'male' AND statusOfPrincipal = 'New case' THEN 1 ELSE 0 END) AS '70 Yrs & Above Male',
        
        SUM(CASE WHEN AgeGroup = '0-28 days' AND Gender = 'female' AND statusOfPrincipal = 'New case' THEN 1 ELSE 0 END) AS '0-28 days Female',
        SUM(CASE WHEN AgeGroup = '1-11 months' AND Gender = 'female' AND statusOfPrincipal = 'New case' THEN 1 ELSE 0 END) AS '1-11 months Female',
        SUM(CASE WHEN AgeGroup = '1-4 Years' AND Gender = 'female' AND statusOfPrincipal = 'New case' THEN 1 ELSE 0 END) AS '1-4 Years Female',
        SUM(CASE WHEN AgeGroup = '5-9 Years' AND Gender = 'female' AND statusOfPrincipal = 'New case' THEN 1 ELSE 0 END) AS '5-9 Years Female',       
        SUM(CASE WHEN AgeGroup = '10-14 Years' AND Gender = 'female' AND statusOfPrincipal = 'New case' THEN 1 ELSE 0 END) AS '10-14 Years Female',      
        SUM(CASE WHEN AgeGroup = '15-17 Years' AND Gender = 'female' AND statusOfPrincipal = 'New case' THEN 1 ELSE 0 END) AS '15-17 Years Female',       
        SUM(CASE WHEN AgeGroup = '18-19 Years' AND Gender = 'female' AND statusOfPrincipal = 'New case' THEN 1 ELSE 0 END) AS '18-19 Years Female',       
        SUM(CASE WHEN AgeGroup = '20-34 Years' AND Gender = 'female' AND statusOfPrincipal = 'New case' THEN 1 ELSE 0 END) AS '20-34 Years Female',      
        SUM(CASE WHEN AgeGroup = '35-49 Years' AND Gender = 'female' AND statusOfPrincipal = 'New case' THEN 1 ELSE 0 END) AS '35-49 Years Female',      
        SUM(CASE WHEN AgeGroup = '50-59 Years' AND Gender = 'female' AND statusOfPrincipal = 'New case' THEN 1 ELSE 0 END) AS '50-59 Years Female',     
        SUM(CASE WHEN AgeGroup = '60-69 Years' AND Gender = 'female' AND statusOfPrincipal = 'New case' THEN 1 ELSE 0 END) AS '60-69 Years Female',     
        SUM(CASE WHEN AgeGroup = '70 Yrs & Above' AND Gender = 'female' AND statusOfPrincipal = 'New case' THEN 1 ELSE 0 END) AS '70 Yrs & Above Female'
    FROM (
        SELECT
            PrincipalDiagnosis,
            statusOfPrincipal,
            AgeGroup,
            Gender
        FROM consulting_room
        WHERE dateOfVisit BETWEEN '$start_date' AND '$end_date'
    ) AS subquery
    GROUP BY PrincipalDiagnosis;
    ";

    // Execute the SQL query
    $result = mysqli_query($conn, $sql);
}

// Include your HTML code for the form and table here
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/header.css" />
  <link rel="stylesheet" href="includes/footer.css" />
  <link rel="stylesheet" href="include/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>Report</title>
     <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }

        form {
            text-align: center;
            margin-top: 20px;
        }

        label {
            font-weight: bold;
            margin-right: 10px;
        }

        input[type="date"] {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 90%;
            max-width: 800px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-left: 20px;
            margin-right:20px;
        }

        th, td {
            padding: 10px;
            text-align: center;
            color:white;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
 <?php include 'includes/header.php'; ?>
    <h1>GENERATE OPD MORBIDITY REPORT</h1>
    <form method="post" action="">
        <label for="start_date">Start Date:</label>
        <input type="date" name="start_date" required>
        <label for="end_date">End Date:</label>
        <input type="date" name="end_date" required>
        <input type="submit" name="submit" value="Generate Report">
    </form>

    <?php
    // Check if the SQL query was executed and there are results
    if (isset($result) && mysqli_num_rows($result) > 0) {
        echo '<table border="1">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Morbidity Conditions</th>';
        echo '<th>0-28 days Male</th>';
        echo '<th>1-11 months Male</th>';
        echo '<th>1-4 Years Male</th>';
        echo '<th>5-9 Years Male</th>';
        echo '<th>10-14 Years Male</th>';
        echo '<th>15-17 Years Male</th>';
        echo '<th>18-19 Years Male</th>';
        echo '<th>20-34 Years Male</th>';
        echo '<th>35-49 Years Male</th>';
        echo '<th>50-59 Years Male</th>';
        echo '<th>60-69 Years Male</th>';
        echo '<th>70 Yrs & Above Male</th>';
        echo '<th>0-28 days Female</th>';
        echo '<th>1-11 months Female</th>';
        echo '<th>1-4 Years Female</th>';
        echo '<th>5-9 Years Female</th>';
        echo '<th>10-14 Years Female</th>';
        echo '<th>15-17 Years Female</th>';
        echo '<th>18-19 Years Female</th>';
        echo '<th>20-34 Years Female</th>';
        echo '<th>35-49 Years Female</th>';
        echo '<th>50-59 Years Female</th>';
        echo '<th>60-69 Years Female</th>';
        echo '<th>70 Yrs & Above Female</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        // Fetch and display the data in the table
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['PrincipalDiagnosis'] . '</td>';
            echo '<td>' . $row['0-28 days Male'] . '</td>';
            echo '<td>' . $row['1-11 months Male'] . '</td>';
            echo '<td>' . $row['1-4 Years Male'] . '</td>';
            echo '<td>' . $row['5-9 Years Male'] . '</td>';
            echo '<td>' . $row['10-14 Years Male'] . '</td>';
            echo '<td>' . $row['15-17 Years Male'] . '</td>';
            echo '<td>' . $row['18-19 Years Male'] . '</td>';
            echo '<td>' . $row['20-34 Years Male'] . '</td>';
            echo '<td>' . $row['35-49 Years Male'] . '</td>';
            echo '<td>' . $row['50-59 Years Male'] . '</td>';
            echo '<td>' . $row['60-69 Years Male'] . '</td>';
            echo '<td>' . $row['70 Yrs & Above Male'] . '</td>';
            echo '<td>' . $row['0-28 days Female'] . '</td>';
            echo '<td>' . $row['1-11 months Female'] . '</td>';
            echo '<td>' . $row['1-4 Years Female'] . '</td>';
            echo '<td>' . $row['5-9 Years Female'] . '</td>';
            echo '<td>' . $row['10-14 Years Female'] . '</td>';
            echo '<td>' . $row['15-17 Years Female'] . '</td>';
            echo '<td>' . $row['18-19 Years Female'] . '</td>';
            echo '<td>' . $row['20-34 Years Female'] . '</td>';
            echo '<td>' . $row['35-49 Years Female'] . '</td>';
            echo '<td>' . $row['50-59 Years Female'] . '</td>';
            echo '<td>' . $row['60-69 Years Female'] . '</td>';
            echo '<td>' . $row['70 Yrs & Above Female'] . '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    } else {
        echo 'No data available.';
    }
    ?>


<?php include 'includes/footer.php'; ?>
  <script src="includes/script.js"></script>
</body>
</html>
