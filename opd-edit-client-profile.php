<?php include('dbconfig.php') ?>
<?php
$id = $_GET["id"];

if (isset($_POST["submit"])) {
  $service = $_POST['service'];
  $opdNumber = $_POST['opdNumber'];
  $fullName = $_POST['fullName'];
  $DOB = $_POST['DOB'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $Occupation = $_POST['Occupation'];
  $age = $_POST['age'];
  $ageGroup = $_POST['ageGroup'];
  $clientStatus = $_POST['clientStatus'];
  $NHISnumber = $_POST['NHISnumber'];
  $dateOfVisit = $_POST['dateOfVisit'];
  
  $address = $_POST['address'];
  $nationality = $_POST['nationality'];
  //$houseNumber = $_POST['houseNumber'];
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

 //`houseNumber`='$houseNumber'
  $sql = "UPDATE `patientregistration` SET `service`='$service', `opdNumber`='$opdNumber',`fullName`='$fullName',`DOB`='$DOB',`email`='$email',
   `gender`='$gender', `Occupation`='$Occupation',`age`='$age',`ageGroup`='$ageGroup',`clientStatus`='$clientStatus',
   `NHISnumber`='$NHISnumber',`dateOfVisit`='$dateOfVisit',`address`='$address',`nationality`='$nationality',
   ,`clientType`='$clientType',`nameOfGuardian`='$nameOfGuardian',`phoneOfGuardian`='$phoneOfGuardian', `spo2`='$spo2', `respiratory_rate`='$respiratory_rate', `pulse`='$pulse', `temperature`='$temperature', `rbs`='$rbs', `weight`='$weight', `height`='$height', `bp`='$bp'  WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: registrationpatient.php?msg=Data updated successfully");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}

?>

<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
    <!-- Link Bootstrap CSS -->
    <!-- Link Bootstrap JS -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="patientreg.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

     <!-- ===== CSS NAVBAR===== -->
     <!--<link rel="stylesheet" href="navbar.css">-->
        
     <!-- ===== Boxicons CSS ===== -->
     <!--<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>-->
     <!--CSS SIDE NAV BAR-->
     <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
     <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="sidebar.css" />

   <title>OPD Registration </title>
   <link rel="icon" type="image/x-icon" href="house.png">
  
  

</head>
<style>
     /* Add this CSS code to your existing styles or in a separate CSS file */
  .navbar {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 999;
  }
  
  /* Adjust the styles of the content below the fixed navigation bar */
  /* Assuming you have a margin or padding applied to the body */
  body {
    padding-top: 60px; /* Adjust this value according to the height of your fixed navbar */
  }
</style>
<body>
    <!--SIDE NAVE BAR-->
    <!-- navbar -->
     <?php include("patientregnavbar.php") ?>
    <!--NAVBAR BODY-->
     
     <?php
    $sql = "SELECT * FROM `patientregistration` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

<!--login form-->
    <div class="container" id="registration">
        <header>Patient Registration</header>
        <form action="patientregistrationsubmit.php" method="POST">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>Full Name</label>
                            <input type="text" placeholder="Enter your name" id = "name" name = "fullName" value="<?php echo $row['fullName'] ?>" required>
                        </div>
                        <div class="input-field">
                            <label for="DOB">Date of Birth</label>
                            <input type="date" placeholder="Enter birth date" name="DOB" id="dateOfBirth" onchange="displayAge()" value="<?php echo $row['DOB'] ?>" required>
                        </div>
                        <div class="input-field">
                            <label>Email</label>
                            <input type="email" placeholder="Enter your email" name = "email" value="<?php echo $row['email'] ?>">
                        </div>
                        <div class="input-field">
                            <label>Mobile Number</label>
                            <input type="tel" placeholder="Enter mobile number" name = "phoneNumber" value="<?php echo $row['phoneNumber'] ?>" required>
                        </div>
                        <div class="input-field">
                            <label>Gender</label>
                            <select name = "gender" required>
                                <option disabled selected>Select gender</option>
                                <option value="male" <?php echo ($row["gender"] == 'male') ? "selected" : ""; ?>>Male</option>
                                <option value="female" <?php echo ($row["gender"] == 'female') ? "selected" : ""; ?>>Female</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>Occupation</label>
                            <input type="text" placeholder="Enter your ccupation" name = "Occupation" value="<?php echo $row['Occupation'] ?>" required>
                        </div>
                    </div>
                </div>
                <div class="details ID"> 
                    <div class="fields">
                        <div class="input-field">
                            <label> OPD number:</label> 
                            <input type="text" id="opdNumber" name="opdNumber" value="<?php echo $row['opdNumber'] ?>" readonly>
                        </div>
                        <div class="input-field">
                            <button type="button" id="generate_opd_button" onclick="generateOPD()">Generate</button>
                        </div>
                        <div class="input-field">
                        <label for="age">Age</label>
                        <input type="text" placeholder="specify in days or months for <1" name="age" id="ageOutput" value="<?php echo $row['age'] ?>" required>
                    </div>
                    <div class="input-field">
                        <label for="ageGroup">What age group is the client</label>
                        <select name="ageGroup" id="ageGroupSelect" required>
                            <option disabled selected>Select status</option>
                            <option value="0-28 days" <?php echo ($row["ageGroup"] == '0-28 days') ? "selected" : ""; ?>>0-28 days</option>
                            <option value="1-11 months" <?php echo ($row["ageGroup"] == '1-11 days') ? "selected" : ""; ?>>1-11 months</option>
                            <option value="1-4 years" <?php echo ($row["ageGroup"] == '1-4 years') ? "selected" : ""; ?>>1-4 Years</option>
                            <option value="5-9 years" <?php echo ($row["ageGroup"] == '5-9 years') ? "selected" : ""; ?>>5-9 Years</option>
                            <option value="10-14 years" <?php echo ($row["ageGroup"] == '10-14 years') ? "selected" : ""; ?>>10-14 Years</option>
                            <option value="15-17 years" <?php echo ($row["ageGroup"] == '15-17 years') ? "selected" : ""; ?>>15-17 Years</option>
                            <option value="18-19 years" <?php echo ($row["ageGroup"] == '18-19 years') ? "selected" : ""; ?>>18-19 Years</option>
                            <option value="20-34 years" <?php echo ($row["ageGroup"] == '20-34 years') ? "selected" : ""; ?>>20-34 Years</option>
                            <option value="35-49 years" <?php echo ($row["ageGroup"] == '35-49 years') ? "selected" : ""; ?>>35-49 Years</option>
                            <option value="50-59 years" <?php echo ($row["ageGroup"] == '50-59 years') ? "selected" : ""; ?>>50-59 Years</option>
                            <option value="60-69 years" <?php echo ($row["ageGroup"] == '60-69 years') ? "selected" : ""; ?>>60-69 Years</option>
                            <option value="70 Yrs & Above" <?php echo ($row["ageGroup"] == '70 Yrs & Above') ? "selected" : ""; ?>>70 Yrs & Above</option>
                        </select>
                    </div>
                        <div class="input-field">
                            <label>Status of client</label>
                            <select name = "clientStatus" required>
                                <option disabled selected>Select status</option>
                                <option value="insured" <?php echo ($row["clientStatus"] == 'insured') ? "selected" : ""; ?>>Insure client</option>
                                <option value="non-insured" <?php echo ($row["clientStatus"] == 'non-insured') ? "selected" : ""; ?>>Non-insure client</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>NHIS number</label>
                            <input type="number" placeholder="E.g:25456325" name = "NHISnumber" value="<?php echo $row['NHISnumber'] ?>" required>
                        </div>
                        
                    </div>
                    <button type="button" class="nextBtn">
                    <span class="btnText">Next</span>
                    <i class="uil uil-navigator"></i>
                    </button>

                </div> 
            </div>
            <div class="form second">
                    <div class="fields">
                        <div class="input-field">
                            <label>Date of visit</label>
                            <input type="date" placeholder="Enter date of visit" name = "dateOfVisit" value="<?php echo $row['dateOfVisit'] ?>" required>
                        </div>
                        <div class="input-field">
                            <label>Address</label>
                            <input type="text" placeholder="e.g Bubuashie" name = "address" value="<?php echo $row['address'] ?>" required>
                        </div>
                        <div class="input-field">
                            <label>Nationality</label>
                            <select name = "nationality" required>
                                <option disabled selected>Select nationality</option>
                                <option value="Ghanaiain" <?php echo ($row["nationality"] == 'Ghanaiain') ? "selected" : ""; ?>>Ghanaiain</option>
                                <option value="Other nationality" <?php echo ($row["nationality"] == 'Other nationality') ? "selected" : ""; ?>>Other nationality</option>
                            </select>
                        </div>
                        <!--<div class="input-field">
                            <label>House Number</label>
                            <input type="text" placeholder="House number/GPS address" name = "houseNumber">
                        </div>-->
                        <div class="input-field">
                            <label>Client type</label>
                            <select name = "clientType" required>
                                <option disabled selected>Select status</option>
                                <option value="new client" <?php echo ($row["clientType"] == 'new client') ? "selected" : ""; ?>>New client</option>
                                <option value="old client" <?php echo ($row["clientType"] == 'new client') ? "selected" : ""; ?>>Old client</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>Name of Guardian</label>
                            <input type="text" placeholder="E.g: John Smith" name = "nameOfGuardian" value="<?php echo $row['nameOfGuardian'] ?>" required>
                        </div>
                        <div class="input-field">
                            <label>Phone number of guardian</label>
                            <input type="text" placeholder="E.g: 0558749735" name = "phoneOfGuardian" value="<?php echo $row['phoneOfGuardian'] ?>" required>
                        </div>
                
                    <div class="fields">
                        <div class="input-field">
                        <label for="spo2" class="form-label">Peripheral Oxygen Saturation</label>
                        <input type="text" step="0.01" class="form-control" id="spo2" name="spo2" placeholder="20.2" value="<?php echo $row['spo2'] ?>">
                    </div>
                        <div class="input-field">
                            <label for="respiratory_rate" class="form-label">Respiratoty Rate</label>
                            <input type="text" class="form-control" id="respiratory_rate" name="respiratory_rate" placeholder="10.5" value="<?php echo $row['respiratory_rate'] ?>">
                        </div>
                        <div class="input-field">
                            <label for="pulse" class="form-label">Pulse</label>
                            <input type="text" class="form-control" id="pulse" name="pulse" placeholder="35.4" value="<?php echo $row['pulse'] ?>">
                        </div>
                        <div class="input-field">
                            <label for="temperature" class="form-label">Temperature</label>
                            <input type="number" step="0.01" class="form-control" id="temperature" name="temperature" placeholder="25.1" value="<?php echo $row['temperature'] ?>">
                        </div>
                        <div class="input-field">
                            <label for="rbs" class="form-label">RBS</label>
                            <input type="text" step="0.01" class="form-control" id="rbs" name="rbs" placeholder="1.2" value="<?php echo $row['rbs'] ?>">
                        </div>
                        <div class="input-field">
                            <label for="weight" class="form-label">Record Weight</label>
                            <input type="number" step="0.01" class="form-control" id="weight" name="weight" placeholder="35.6 kg" value="<?php echo $row['weight'] ?>">
                        </div>
                        <div class="input-field">
                            <label for="height" class="form-label">Record Height</label>
                            <input type="number" step="0.01" class="form-control" id="height" name="height" placeholder="1.7 m" value="<?php echo $row['height'] ?>">
                        </div>
                        <div class="input-field">
                            <label for="bp" class="form-label">Blood Pressure</label>
                            <input type="text" class="form-control" id="bp" name="bp" placeholder="120/80 mmHg" value="<?php echo $row['bp'] ?>">
                        </div>
                    <div class="buttons">
                        <div class="backBtn">
                            <i class="uil uil-navigator"></i>
                            <span class="btnText">Back</span>
                        </div>
                        <button class="sumbit">
                            <span class="btnText" button type="submit" onclick="return confirmSubmit();">Update</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div> 
        </form>
    </div>




   <script src="patientreg.js"></script>
    <script src="sidebar.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="sweetalert2.min.js"></script>

    <script>
        function generateOPD() {
          var opdNumber = 'GHS-' + Math.floor(Math.random() * 10000000); // Generate an 8-digit random number
          document.getElementById('opdNumber').value = opdNumber; // Set the OPD number in the input field
          document.getElementById('generate_opd_button').disabled = True; // Enable the button
        }
       
   
      <!-- side navbar JavaScript -->
   
   
      function confirmSubmit() {
    var confirmation = confirm("Are you sure you want to submit the form?");
     if (!confirmation) {
      event.preventDefault();
    }
    return confirmation;
  }

  // get a reference to the logout button element
const logoutButton = document.getElementById('logout-button');

// add a click event listener to the button
logoutButton.addEventListener('click', function(event) {
  // prevent the default behavior of the button click event
  event.preventDefault();

  // show a confirmation dialog to the user
  const confirmLogout = confirm('Are you sure you want to logout?');

  // if the user confirms the logout, redirect to the login page
  if (confirmLogout) {
    window.location.href = 'index.php';
  }
});
</script>


<!--js script to select the age range based on the age-->

<script>
    function calculateAge(dateOfBirth) {
    const now = new Date();
    const birthDate = new Date(dateOfBirth);
    
    const years = now.getFullYear() - birthDate.getFullYear();
    const months = now.getMonth() - birthDate.getMonth();
    const days = now.getDate() - birthDate.getDate();

    return { years, months, days };
}


const ageInput = document.getElementById('ageOutput');
ageInput.addEventListener('input', updateAgeGroupSelect);

//calculate age automatically
function calculateAge(dateOfBirth) {
    const now = new Date();
    const birthDate = new Date(dateOfBirth);
    
    const years = now.getFullYear() - birthDate.getFullYear();
    const months = now.getMonth() - birthDate.getMonth();
    const days = now.getDate() - birthDate.getDate();

    return { years, months, days };
}

function displayAge() {
    const dobInput = document.getElementById('dateOfBirth');
    const dob = dobInput.value;

    if (dob) {
        const age = calculateAge(dob);
        const ageOutput = document.getElementById('ageOutput'); // Assuming 'ageOutput' is the ID of the form field

        if (age.years >= 1) {
            ageOutput.value = `${age.years} years`;
        } else if (age.months >= 1) {
            ageOutput.value = `${age.months} months`;
        } else if (age.days >= 1) {
            ageOutput.value = `${age.days} days`;
        } else {
            ageOutput.value = ''; // Clear age if no DOB selected or if less than 1 day old
        }
    } else {
        const ageOutput = document.getElementById('ageOutput');
        ageOutput.value = ''; // Clear age if no DOB selected
    }
}

//select age groupings automatically
function updateAgeGroupSelect() {
    const ageInput = document.getElementById('ageOutput');
    const ageGroupSelect = document.getElementById('ageGroupSelect');

    const age = parseInt(ageInput.value);
    
    if (age >= 1 && age <= 4) {
    ageGroupSelect.value = '1-4 Years';
    } else if (age ==1 && age <= 11 && ageOutput.value.includes('days')) {
        ageGroupSelect.value = '0-28 days';
    } else if (ageOutput.value.includes('months')) {
        ageGroupSelect.value = '1-11 Months';
    }else if (age >= 5 && age <= 9) {
        ageGroupSelect.value = '5-9 Years';
    } else if (age >= 10 && age <= 14) {
        ageGroupSelect.value = '10-14 Years';
    } else if (age >= 15 && age <= 17) {
        ageGroupSelect.value = '15-17 Years';
    } else if (age >= 18 && age <= 19) {
        ageGroupSelect.value = '18-19 Years';
    } else if (age >= 20 && age <= 34) {
        ageGroupSelect.value = '20-34 Years';
    } else if (age >= 35 && age <= 49) {
        ageGroupSelect.value = '35-49 Years';
    } else if (age >= 50 && age <= 59) {
        ageGroupSelect.value = '50-59 Years';
    } else if (age >= 60 && age <= 69) {
        ageGroupSelect.value = '60-69 Years';
    } else if (age >= 70) {
        ageGroupSelect.value = '70 Yrs & Above';
    } else {
        ageGroupSelect.value = '';
    }
}

Swal.fire({
  title: 'Error!',
  text: 'Do you want to continue',
  icon: 'error',
  confirmButtonText: 'Cool'
})

</script>
<!--
<script>
    const dateOfBirthInput = document.getElementById('dateOfBirth');
    const ageInput = document.getElementById('ageInput');

    dateOfBirthInput.addEventListener('change', function() {
        const dob = new Date(this.value);
        const today = new Date();
        const age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000)); // Calculate age in years

        if (age >= 0) {
            ageInput.value = age;
        } else {
            ageInput.value = '';
        }
    });
</script>-->

</body>
</html>