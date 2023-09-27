  <?php
// Include the loader.php file at the top of your PHP page
require_once('loader.php');

// Rest of your PHP code for the page
// ...
?>
<?php include('dbconfig.php') ?>

<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="patientreg.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

     <!-- ===== CSS NAVBAR===== -->
     <link rel="stylesheet" href="navbar.css">
        
     <!-- ===== Boxicons CSS ===== -->
     <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
     <!--CSS SIDE NAV BAR-->
     <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="sidebar.css" />

     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <link rel="icon" type="image/x-icon" href="data-link-emrs-logo.png">
   <title>Responsive Regisration Form </title>
 
</head>
<style>
    #search-results {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
  border-radius: 4px;
  padding: 5px;
  margin-top: 2px;
  z-index: 9999;
}

#search-results li {
  padding: 5px;
  cursor: pointer;
}

#search-results li:hover {
  background-color: #e0e0e0;
}
      .client-list li {
            margin-bottom: 5px;
        }
        .client-list li a {
            color: #333;
            text-decoration: none;
        }
        .client-list li a:hover {
            color: #ff0000;
        }

    </style>
<body>
    <!--SIDE NAVE BAR-->
    <!-- navbar -->
   <?php include("patientregnavbar.php") ?>
      


<!--login form-->
    <div class="container" id="registration">
    <br></br>
    <br></br>
    <br></br>
    <br></br>
        <header>LABORATORY RESULTS</header>
        <br></br>
    <br></br>
    <br></br>
    <br></br>
    <input type="text" id="search-box" placeholder="Search clients">
    <ul id="search-results"></ul>
        <form action="lab-result-submit.php" method="POST">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>Full Name</label>
                            <input type="text" placeholder="Enter your name" name = "fullName" id = "fullName" readonly>
                        </div>
                        <div class="input-field">
                            <label> OPD number:</label> 
                            <input type="text" name="opdNumber" id = "opdNumber" readonly>
                        </div>
                        <div class="input-field">
                            <label>NHIS Number</label> 
                            <input type="text" name="NHISnumber" id = "opdNumber" readonly>
                        </div>
                        
                        <div class="input-field">
                            <label>Date of visit</label>
                            <input type="text" placeholder="Enter date of visit" name = "dateOfVisit" id = "dateOfVisit">
                        </div>
                        <div class="input-field">
                            <label>Age</label>
                            <input type="number" placeholder="Enter age" name = "age" readonly  id = "age" >
                        </div>
                        <div class="input-field">
                        <label>NHIS Client</label>
                        <input type="text" placeholder="E.g: Insure/Non-insured" name = "clientStatus" id = "clientStatus" >
                        </div>
                        <div class="input-field">
                        <label>What age group is the client</label>
                        <input type="text" placeholder="Enter age" name = "ageGroup" readonly id = "ageGroup">
                        </div>
                    </div>
                </div>
                <div class="details ID"> 
                    <div class="fields">
                        <div class="input-field">
                        <label>Source of request</label>
                        <select name="sourceOfRequest" id="sourceOfRequest" class="select2">
                            <option disabled selected>Select department</option>
                            <option value="ANC">Antenatal Care (ANC)</option>
                            <option value="Consulting room">Consulting room</option>
                            <option value="Surgical Ward">Surgical Ward</option>
                            <option value="Obstetric and Gyaenacology">Obstetric and Gyaenacology</option>
                            <option value="Dental">Dental</option>
                            <option value="Eye, nose and throat (ENT)">Ears, nose and throat (ENT)</option>
                            <option value="Disease Control">Disease Control</option>
                            <option value="Neonatal ward">Neonatal ward</option>
                            <option value="Emergency">Emergency</option>
                            <option value="Dressing room">Dressing room</option>
                        </select>
                        </div>
                        <div class="input-field">
                            <label> Pathology number:</label> 
                            <input type="text" name="pathologyNumber" id = "pathologyNumber" required>
                        </div>
                        <div class="input-field">
                            <label>Type of Test(S) Requested</label>
                            <input type = "text" name="TypeOfTest" id="TypeOfTest" readonly >
                        </div>
                        <div class="input-field">
                        <label>Gender</label>
                        <input type="text" placeholder="Enter gender" name = "gender" readonly id = "gender">
                        </div>
                        <div class="input-field">
                        <label>Date of sample received</label>
                        <input type="date"  name = "dateSampleReceived" id="dateSampleReceived" required>
                    </div>
                    <div class="input-field">
                        <label>Time of sample received</label>
                        <input type="time"  name = "timeSampleReceived" id="timeSampleReceived" required>
                    </div>
                    <div class="input-field">
                        <label>Provisional Diagnosis</label>
                        <input type="text" placeholder="Enter gender" name = "Provisional" readonly id = "Provisional">
                        </div>
                    <div class="input-field">
                        <label>Results of test</label>
                        <select name="resultsOfTest" id="resultsOfTest" required class="select2">
                            <option disabled selected>Select department</option>
                            <option value="Malaria Parasite Total tests">Malaria Parasite Total tests</option>
                            <option value="MP falciparum positive">MP falciparum positive</option>
                            <option value="MP malaria positive">MP malaria positive</option>
                            <option value="MP ovale positive">MP ovale positive</option>
                            <option value="MP vivax positive">MP vivax positive</option>
                            <option value="MP knowlesi positive">MP knowlesi positive</option>
                            <option value="MP trophozoite positive">MP trophozoite positive</option>
                            <option value="MP trophozoite positive">MP trophozoite positive</option>
                            <option value="MP gametocyte positive">MP gametocyte positive</option>
                            <option value="MP Count <200,000p/µ">MP Count <200,000p/µ</option>
                            <option value="MP Count ≥500,000p/µ">MP Count ≥500,000p/µ</option>
                            <option value="mRDT Total tests">mRDT Total tests</option>
                            <option value="pf HRP2 positive RDT<200,000p/µ">pf HRP2 positive RDT<200,000p/µ</option>
                            <option value="pf-pLDH positive RDT<200,000p/µ">pf-pLDH positive RDT<200,000p/µ</option>
                            <option value="Pan-pLDH positive RDT<200,000p/µ">Pan-pLDH positive RDT<200,000p/µ</option>
                            <option value="All other">All other</option>
                        </select>
                        </div>
                        <div class="input-field">
                        <label>Cost </label>
                        <input type="number" step="0.01" placeholder="GCH 20" name = "costOfTest" id = "costOfTest" required>
                        </div>
                        <div class="input-field">
                            <label>Clinical note</label> 
                            <textarea name="message" rows="4" cols="50" placeholder="further details" name = "pharmacyNotes" style="resize: none;"></textarea>
                        </div>
                    <div class="buttons">
                        <button class="sumbit">
                            <span class="btnText" button type="submit" onclick="return confirmSubmit();">Submit </span>
                            <i class="uil uil-navigator"></i>
                        </button>
                        </div>
                        
                        
                    </div>
                    
                </div> 
            </div>
            
                        <br>
                    </br>
                    
                    </div>
                    
                </div> 
            </div>
        </form>
    </div>  
<!--the end of the form-->
    <script src="patientreg.js"></script>
      <!-- side navbar JavaScript -->
    <script src="sidebar.js"></script>
    <script>
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
<script>
  $(document).ready(function() {
    var searchBox = $('#search-box');
    var resultsList = $('#search-results');

    searchBox.on('input', function() {
      var searchQuery = searchBox.val();

      if (searchQuery.trim() === '') {
        resultsList.hide();
      } else {
        // Make an AJAX request to the PHP script
        $.ajax({
          url: 'Csearch.php',
          method: 'POST',
          data: { search: searchQuery },
          dataType: 'json',
          success: function(response) {
            // Update the search results in the search box
            resultsList.empty();

            // Add client names to the search results list
            response.forEach(function(result) {
              var listItem = $('<li>' + result.fullName + '</li>');
              listItem.click(function() {
                searchBox.val(result.fullName);
                fillFields(result); // Call the fillFields function with the selected search result
                resultsList.hide();
              });
              resultsList.append(listItem);
            });

            resultsList.show();
          }
        });
      }
    });

    // Hide the results list initially
    resultsList.hide();
  });

  // Function to fill the form fields with the selected search result
  function fillFields(result) {
    $('#fullName').val(result.fullName);
    $('#DOB').val(result.DOB);
    $('#opdNumber').val(result.opdNumber);
    $('#NHISnumber').val(result.NHISnumber);
    $('#dateOfVisit').val(result.dateOfVisit);
    $('#age').val(result.age);
    $('#ageGroup').val(result.ageGroup);
    $('#phoneNumber').val(result.phoneNumber);
    $('#address').val(result.address);
    $('#gender').val(result.gender);
    $('#clientStatus').val(result.clientStatus);
    $('#Provisional').val(result.Provisional);
    $('#TypeOfTest').val(result.TypeOfTest);
    // Populate other form fields as needed
  }

  $(document).ready(function() {
  $('.select2').select2();
});
</script>



</body>
</html>