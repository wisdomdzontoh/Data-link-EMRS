<?php
include('dbconfig.php'); ?>
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
  <?php
// Include the loader.php file at the top of your PHP page
require_once('loader.php');

// Rest of your PHP code for the page
// ...
?>

    <!--SIDE NAVE BAR-->
    <!-- navbar -->
  <?php include("patientregnavbar.php") ?>
      
<!--login form-->
    <div class="container" id="registration">
    <br></br>
    <br></br>
    <br></br>
    <br></br>
        
        <br></br>
    <br></br>
    <br></br>
    <br></br>
    <header>PHARMACY DISPENSARY</header>
    <input type="text" id="search-box" placeholder="Search clients">
    <ul id="search-results"></ul>
        <form action="pharmacy-submit.php" method="POST">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>Full Name</label>
                            <input type="text" placeholder="Enter your name" name = "fullName" id = "fullName" readonly required>
                        </div>
                        <div class="input-field">
                            <label> OPD number</label> 
                            <input type="text" name="opdNumber" id = "opdNumber" readonly>
                        </div>
                        <div class="input-field">
                            <label> NHIS Number</label> 
                            <input type="number" name="NHISnumber" id = "NHISnumber" readonly>
                        </div>
                        <div class="input-field">
                            <label>Date of Visit</label> 
                            <input type="date" name="dateOfVisit" id = "dateOfVisit" readonly>
                        </div>
                        <div class="input-field">
                            <label>Date medicine dispensed</label>
                            <input type="date" name = "dateOfMedicineDispensed" readonly  id = "dateOfMedicineDispensed" required>
                        </div>
                        <div class="input-field">
                            <label>Age</label>
                            <input type="number" placeholder="Enter age" name = "age" readonly  id = "age" required>
                        </div>
                        <div class="input-field">
                            <label>What age group is the client</label>
                            <input type="text" placeholder="Enter age" name = "ageGroup" readonly id = "ageGroup" required>
                        </div>
                        <div class="input-field">
                            <label> Weight in Kg</label> 
                            <input type="text" name="weight" id = "weight" required>
                        </div>
                        <div class="input-field">
                            <label> Full Diagnosis</label> 
                            <input type="text" name="PrincipalDiagnosis" id = "PrincipalDiagnosis" readonly required>
                        </div>
                        <div class="input-field">
                            <label>Additional Diagnosis</label>
                            <input type = "text" name="AdditionalDiagnosis1" id="AdditionalDiagnosis1" readonly required>
                        </div>
                        <div class="input-field">
                            <label>Gender</label>
                            <input type="text" placeholder="Enter gender" name = "gender" readonly id = "gender" required>
                        </div>
                        <div class="input-field">
                        <label>Name of prescriber</label>
                        <input type="name" placeholder="e.g John Smith" name="nameOfPrescriber" id="nameOfPrescriber" required>
                    </div>
                    
                    <div class="input-field">
                    <label>Name of Medicine</label>
                    <select name="nameOfMedicine" id="nameOfMedicine" required class="select2">
                        <option disabled selected>Select medicine name</option>
                        <option value="Tab. Acetylsalicylic Acid 300mg">Tab. Acetylsalicylic Acid 300mg</option>
                        <option value="Tab. Albendazole 200/400mg">Tab. Albendazole 200/400mg</option>
                        <option value="Tab. Aluminium Hydroxide 500mg/Tab. Magnesium Trisilicate 250mg">Tab. Aluminium Hydroxide 500mg/Tab. Magnesium Trisilicate 250mg</option>
                        <option value="Tab. Artesunate +Tab. Amodiaquine (base) Adult">Tab. Artesunate +Tab. Amodiaquine (base) Adult</option>
                        <option value="Tab. Artesunate +Tab. Amodiaquine (base) Children">Tab. Artesunate +Tab. Amodiaquine (base) Children</option>
                        <option value="Tab. Artemether – Lumefantrine 20\120mg Adult">Tab. Artemether – Lumefantrine 20\120mg Adult</option>
                        <option value="Tab./Granules/Artemether – Lumefantrine 20\120mg Paediatric">Tab./Granules/Artemether – Lumefantrine 20\120mg Paediatric</option>
                        <option value="Tab. Chlopheniramine Maleate 4mg">Tab. Chlopheniramine Maleate 4mg</option>
                        <option value="Tab. Co-trimoxazole 400mg + 80mg">Tab. Co-trimoxazole 400mg + 80mg</option>
                        <option value="Tab. Ciprofloxacin 250/500mg">Tab. Ciprofloxacin 250/500mg</option>
                        <option value="Tab. Citerizine 10mg">Tab. Citerizine 10mg</option>
                        <option value="Tab. Diazepam 5/10mg">Tab. Diazepam 5/10mg</option>
                        <option value="Tab. Diclofenac 50/100mg">Tab. Diclofenac 50/100mg</option>
                        <option value="Tab. Ferrous Sulphate 200mg/Tab. Ferrous Fumarate 322mg">Tab. Ferrous Sulphate 200mg/Tab. Ferrous Fumarate 322mg</option>
                        <option value="Tab. Folic Acid 5mg">Tab. Folic Acid 5mg</option>
                        <option value="Tab. Furosemide 40mg">Tab. Furosemide 40mg</option>
                        <option value="Tab. Ibuprofen 200/400mg">Tab. Ibuprofen 200/400mg</option>
                        <option value="Tab. Methyldopa 250mg">Tab. Methyldopa 250mg</option>
                        <option value="Tab. Metronidazole 200mg">Tab. Metronidazole 200mg</option>
                        <option value="Tab. Nifedipine Retard 10/20mg">Tab. Nifedipine Retard 10/20mg</option>
                        <option value="Tab. Paracetamol 500mg">Tab. Paracetamol 500mg</option>
                        <option value="Tab. Quinine 300mg">Tab. Quinine 300mg</option>
                        <option value="Cap. Amoxycillin 250/500mg">Cap. Amoxycillin 250/500mg</option>
                        <option value="Cap. Chloramphenicol 250mg">Cap. Chloramphenicol 250mg</option>
                        <option value="Cap. Doxycycline 100mg">Cap. Doxycycline 100mg</option>
                        <option value="Cap. Tetracycline 250mg">Cap. Tetracycline 250mg</option>
                        <option value="Susp. Albendazole 100mg/5ml">Susp. Albendazole 100mg/5ml</option>
                        <option value="Susp. Amoxycillin 125mg/5ml">Susp. Amoxycillin 125mg/5ml</option>
                        <option value="Susp. Chloramphenicol 125mg/5ml">Susp. Chloramphenicol 125mg/5ml</option>
                        <option value="Susp. DihydroArtemisinin – Piperaquine 40\320mg">Susp. DihydroArtemisinin – Piperaquine 40\320mg</option>
                        <option value="Tab DihydroArtemisinin – Piperaquine 40\320mg">Tab DihydroArtemisinin – Piperaquine 40\320mg</option>
                        <option value="Susp. Co-trimoxazole 200mg + 40mg/5ml">Susp. Co-trimoxazole 200mg + 40mg/5ml</option>
                        <option value="Syr. Metoclopramide 1mg/ml">Syr. Metoclopramide 1mg/ml</option>
                        <option value="Susp. Metronidazole 200mg/5ml">Susp. Metronidazole 200mg/5ml</option>
                        <option value="Syr. Multivitamin">Syr. Multivitamin</option>
                        <option value="Syr. Paracetamol 120mg/5ml">Syr. Paracetamol 120mg/5ml</option>
                        <option value="Inj. Anti-Rabies Vaccine (ARV)/Serum">Inj. Anti-Rabies Vaccine (ARV)/Serum</option>
                        <option value="Inj. Anti-Snake Serum (ASS) – West African Polyvalent">Inj. Anti-Snake Serum (ASS) – West African Polyvalent</option>
                        <option value="Inj. Anti-Tetanus Serum (ATS) 1,500/50,000iu">Inj. Anti-Tetanus Serum (ATS) 1,500/50,000iu</option>
                        <option value="Inj. Benzyl Penicillin 1mu">Inj. Benzyl Penicillin 1mu</option>
                        <option value="Inj. Ciprofloxacin 500mg/100ml">Inj. Ciprofloxacin 500mg/100ml</option>
                        <option value="Inj. Diazepam 5mg/ml">Inj. Diazepam 5mg/ml</option>
                        <option value="Inj. Ergometrine 500micrograms/ml">Inj. Ergometrine 500micrograms/ml</option>
                        <option value="Inj. Oxytocin 10 IU">Inj. Oxytocin 10 IU</option>
                        <option value="Inj. Frusemide 10mg/ml">Inj. Frusemide 10mg/ml</option>
                        <option value="Inj. Hydrocortisone 100mg">Inj. Hydrocortisone 100mg</option>
                        <option value="Inj. Metronidazole 500mg/100ml">Inj. Metronidazole 500mg/100ml</option>
                        <option value="Inj. Pethidine 50mg/ml 2ml">Inj. Pethidine 50mg/ml 2ml</option>
                        <option value="Inj. Promethazine 25mg/ml">Inj. Promethazine 25mg/ml</option>
                        <option value="Inj. Quinine 600mg/2ml">Inj. Quinine 600mg/2ml</option>
                        <option value="Inj. Artemether">Inj. Artemether</option>
                        <option value="IV. Cholera Replacement Fluid 5:4:1">IV. Cholera Replacement Fluid 5:4:1</option>
                        <option value="IV. Dextrose 5% 500ml">IV. Dextrose 5% 500ml</option>
                        <option value="IV. Dextrose 50% 250ml">IV. Dextrose 50% 250ml</option>
                        <option value="IV. Dextrose 5% in Normal Saline 0.9% 500ml">IV. Dextrose 5% in Normal Saline 0.9% 500ml</option>
                        <option value="IV. Ringers Lactate 500/1000ml">IV. Ringers Lactate 500/1000ml</option>
                        <option value="IV. Normal Saline 0.9% 500ml">IV. Normal Saline 0.9% 500ml</option>
                        <option value="Supp. Artesunate">Supp. Artesunate</option>
                        <option value="Supp. Diazepam 5/10mg">Supp. Diazepam 5/10mg</option>
                        <option value="Supp. Diclofenac 25/50/100mg">Supp. Diclofenac 25/50/100mg</option>
                        <option value="Supp. Paracetamol 125/250/500mg">Supp. Paracetamol 125/250/500mg</option>
                        <option value="Oral Rehydration Salt (ORS)">Oral Rehydration Salt (ORS)</option>
                        <option value="Gutt. Chloramphenicol 1%">Gutt. Chloramphenicol 1%</option>
                        <option value="Oc. Chloramphenicol 1%">Oc. Chloramphenicol 1%</option>
                        <option value="Sol. Povidone Iodine">Sol. Povidone Iodine</option>
                    </select>
                    </div>
                    <div class="input-field">
                        <label>Generic Name</label>
                        <input type="text"  name = "genericName" id="genericName" required>
                    </div>
                    <div class="input-field">
                    <label>Dosage Form</label>
                    <select name="DosageForm" id="DosageForm" required class="select2">
                        <option disabled selected>Select department</option>
                        <option value="Tablet">Tablet</option>
                        <option value="Capsule">Capsule</option>
                        <option value="Syrup">Syrup</option>
                        <option value="Dispersible">Dispersible</option>
                        <option value="Other">Other</option>
                    </select>
                    </div>
                    <div class="input-field">
                        <label>Medicine Formulation</label>
                        <input type="text"  name = "Formulation" id="Formulation" required>
                    </div>
                    <div class="input-field">
                        <label>Medicine Strength</label>
                        <input type="text"  name = "Strength" id="Strength" required>
                    </div>
                    <div class="input-field">
                        <label>Medicine Frequency</label>
                        <input type="number"  name = "Frequency" id="Frequency" placeholder="number of days" required>
                    </div>
                    <div class="input-field">
                        <label>Quantity Dispensed</label>
                        <input type="number"  name = "QuantityDispensed" required>
                    </div>
                    <div class="input-field">
                        <label>Cost of Medicine</label>
                        <input type="text" name="costOfMedicine" placeholder = "amount should be in GHC" required>
                    </div>
                    <div class="input-field">
                        <label>Time Medicine Dispensed</label>
                        <input type="time"  name = "timeMedicineDispensed" required>
                    </div>
                    <div class="input-field">
                        <label>NHIS Client</label>
                        <input type="text" placeholder="E.g: Insure/Non-insured" name = "clientStatus" id = "clientStatus" required>
                    </div>
                    <div class="input-field">
                        <label>Clinical note</label> 
                        <textarea rows="4" cols="50" placeholder="further details" name = "pharmacyNotes" style="resize: none;"></textarea>
                    </div>
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
    $('#nameOfPrescriber').val(result.nameOfPrescriber);
    $('#dateOfVisit').val(result.dateOfVisit);
    $('#age').val(result.age);
    $('#ageGroup').val(result.ageGroup);
    $('#phoneNumber').val(result.phoneNumber);
    $('#address').val(result.address);
    $('#gender').val(result.gender);
    $('#clientStatus').val(result.clientStatus);
    $('#AdditionalDiagnosis1').val(result.AdditionalDiagnosis1);
    $('#PrincipalDiagnosis').val(result.PrincipalDiagnosis);
    // Populate other form fields as needed
  }

  $(document).ready(function() {
  $('.select2').select2();
});
</script>



</body>
</html>