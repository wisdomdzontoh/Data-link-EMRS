   <?php
// Include the loader.php file at the top of your PHP page
require_once('loader.php');

// Rest of your PHP code for the page
// ...
?>
<!DOCTYPE html>
<html lang="eng">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="includes/header.css" />
  <link rel="stylesheet" href="includes/footer.css" />
  <link rel="stylesheet" href="include/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="icon" type="image/x-icon" href="data-link-emrs-logo.png">
  <title>home Apps</title>
</head>

<body>

  <!-- header -->
  <?php include 'includes/header.php'; ?>
  <!-- end of the header-->
  <!-- navbar 2 -->
  <!-- end of nav bar 2 -->

  <!-- The Modal -->
  <!-- The popup modal -->
  
 
  <!--displaya calender on a webpage-->
  <section>
    <div class="calender">

    
      <table id="calendar">
        <thead>
          <tr>
            <th colspan="7"></th>
          </tr>
          <tr>
            <th>Sun</th>
            <th>Mon</th>
            <th>Tue</th>
            <th>Wed</th>
            <th>Thu</th>
            <th>Fri</th>
            <th>Sat</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </section>

  <!--include footer-->
  <?php include 'includes/footer.php'; ?>
  <script src="includes/script.js"></script>
</body>
</html>