<?php
session_start(); // start session

// check if form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // get form inputs
    $username = $_POST['username'];
    $password = $_POST['password'];

    // connect to database
    $servername = "sql109.epizy.com";
    $dbusername = "epiz_33722902";
    $dbpassword = "DgRYDMrBI3RPg";
    $dbname = "epiz_33722902_hims";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // prepare and execute query
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // check if user exists
    if ($result->num_rows > 0) {
        // set session variables
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $username;
        // redirect to maternalform.php
        header("location: home_apps.php");
        exit();
    } else {
        // show error message
        $error = "Invalid username or password";
    }

    // close connection
    $stmt->close();
    $conn->close();
}
?>



  <?php
// Include the loader.php file at the top of your PHP page
require_once('loader.php');

// Rest of your PHP code for the page
// ...
?>

<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DATA LINK EMRS LOGIN</title>
    <link rel="stylesheet" href="login.css" />
    <link rel="stylesheet" href="header.css" />
    <!-- Unicons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  </head>
  <body>
 
    <!-- Header -->
    <header class="header">
      <nav class="nav">
      
        <strong><a href="" class="nav_logo" style="color: #04E823  ;">DATA LINK ELECTRONIC MEDICAL RECORDS</a></strong>

        <ul class="nav_items">
          <li class="nav_item">
            <a href="index.php" class="nav_link">Home</a>
            <a href="#" class="nav_link" >Announcements</a>
            <a href="#" class="nav_link" >Services</a>
            <a href="#" class="nav_link" ">Contact</a>
          </li>
        </ul>

        <button class="button" id="form-open"  style="font-size:200%;"><b><i>Login</button></b></i>
      </nav>
    </header>

    <!-- Home -->
    <section class="home">
      <div class="form_container">
        <i class="uil uil-times form_close"></i>
        <!-- Login From -->
        <div class="form login_form">
          <form method = "POST">
            <h2>Login</h2>

            <div class="input_box">
              <input type="text" placeholder="Enter your username" name = "username" required />
              <i class="uil uil-envelope-alt email"></i>
            </div>
            <div class="input_box">
              <input type="password" placeholder="Enter your password" name = "password" required />
              <i class="uil uil-lock password"></i>
              <i class="uil uil-eye-slash pw_hide"></i>
            </div>

            <div class="option_field">
              <span class="checkbox">
                <input type="checkbox" id="check" />
                <label for="check">Remember me</label>
              </span>
              <a href="#" class="forgot_pw">Forgot password?</a>
            </div>

            <button class="button" type = "submit" >Login Now</button>

            <!--<div class="login_signup">Don't have an account? <a href="#" id="signup">Signup</a></div>-->
          </form>
        </div>

        <!-- Signup From -->
        <!--<div class="form signup_form">
          <form action="#">
            <h2>Signup</h2>

            <div class="input_box">
              <input type="email" placeholder="Enter your email" required />
              <i class="uil uil-envelope-alt email"></i>
            </div>
            <div class="input_box">
              <input type="password" placeholder="Create password" required />
              <i class="uil uil-lock password"></i>
              <i class="uil uil-eye-slash pw_hide"></i>
            </div>
            <div class="input_box">
              <input type="password" placeholder="Confirm password" required />
              <i class="uil uil-lock password"></i>
              <i class="uil uil-eye-slash pw_hide"></i>
            </div>

            <button class="button">Signup Now</button>-->

            <!--<div class="login_signup">Already have an account? <a href="#" id="login">Login</a></div>-->
          </form>
        </div>
      </div>
    </section>

    <script src="login.js"></script>
  </body>
</html>


