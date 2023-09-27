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
   <link rel="icon" type="image/x-icon" href="house.png">
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
        
        <br></br>
    <br></br>
    <br></br>
    <br></br>
    <header>GENERAL WARD (ADMISSIONS AND DISCHARGE)</header>
    <input type="text" id="search-box" placeholder="Search clients">
    <ul id="search-results"></ul>
        <form action="consultingroomsubmit.php" method="POST">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>Full Name</label>
                            <input type="text" placeholder="Enter your name" name = "fullName" id = "fullName" readonly required = "required">
                        </div>
                        <div class="input-field">
                            <label> OPD number:</label> 
                            <input type="text" name="opdNumber" id = "opdNumber" readonly>
                        </div>
                        <div class="input-field">
                            <label>NHIS number</label>
                            <input type="number" placeholder="E.g:25456325" name = "NHISnumber" readonly  id = "NHISnumber" required>
                        </div>
                        <div class="input-field">
                            <label>Date of Admission</label>
                            <input type="date" placeholder="Enter date of Admission" name = "dateOfAdmission" id = "dateOfAdmissiont" required>
                        </div>
                        <div class="input-field">
                            <label>Age</label>
                            <input type="number" placeholder="Enter age" name = "age" readonly  id = "age" required>
                        </div>
                        <div class="input-field">
                        <label>What age group is the client</label>
                        <input type="text" placeholder="Enter age" name = "ageGroup" readonly id = "ageGroup" required>
                    </div>
                    </div>
                </div>
                <div class="details ID"> 
                    <div class="fields">
                        <div class="input-field">
                            <label>Mobile Number</label>
                            <input type="tel" placeholder="Enter mobile number" name = "phoneNumber" readonly id = "phoneNumber" required>
                        </div>
                        <div class="input-field">
                            <label>Address or GPS- Address</label>
                            <input type="text" placeholder="e.g Bubuashie/GA-563-6296" name = "address" id = "address" required>
                        </div>
                        <div class="input-field">
                        <label>Gender</label>
                        <input type="text" placeholder="Enter gender" name = "gender" readonly id = "gender" required>
                        </div>
                        <div class="input-field">
                        <label for="Provisional">Provisional Diagnosis</label>
                        <select name="Provisional" id="Provisional" required class="select2">
                            <option disabled selected>Select condition</option>
                            <option value="AFP (Polio)">AFP (Polio)</option>
                            <option value="Meningitis">Meningitis</option>
                            <option value="Neo-Natal Tetanus">Neo-Natal Tetanus</option>
                            <option value="Pertussis (Whooping Cough)">Pertussis (Whooping Cough)</option>
                            <option value="Diphteria">Diphteria</option>
                            <option value="Measles">Measles</option>
                            <option value="Yellow Fever (YF)">Yellow Fever (YF)</option>
                            <option value="Tetanus">Tetanus</option>
                            <option value="Tuberculosis">Tuberculosis</option>
                            <option value="Uncomplicated Malaria">Uncomplicated Malaria</option>
                            <option value="Severe Malaria (Lab-Confirmed)">Severe Malaria (Lab-Confirmed)</option>
                            <option value="Severe Malaria (Non-Lab-Confirmed)">Severe Malaria (Non-Lab-Confirmed)</option>
                            <option value="Typhoid Fever">Typhoid Fever</option>
                            <option value="Cholera">Cholera</option>
                            <option value="AFP (Polio)">Diarrhoea Diseases</option>
                            <option value="Viral Hepatitis">Viral Hepatitis</option>
                            <option value="Schistosomiasis (Bilhazia)">Schistosomiasis (Bilhazia)</option>
                            <option value="Suspected Guinea Worm">Suspected Guinea Worm</option>
                            <option value="Onchocerciasis">Onchocerciasis</option>
                            <option value="Buruli Ulcer">Buruli Ulcer</option>
                            <option value="Leprosy">Leprosy</option>
                            <option value="HIV/AIDS Related conditions">HIV/AIDS Related conditions</option>
                            <option value="Mumps">Mumps</option>
                            <option value="Intestinal Worms">Intestinal Worms</option>
                            <option value="Chicken Pox">Chicken Pox</option>
                            <option value="Upper Respiratory Tract Infections">Upper Respiratory Tract Infections</option>
                            <option value="Pneumonia">Pneumonia</option>
                            <option value="Septiceamia">Septiceamia</option>
                            <option value="Malnutrition">Malnutrition</option>
                            <option value="Obesity">Obesity</option>
                            <option value="Anaemia">Anaemia</option>
                            <option value="Other Nutritional Diseases">Other Nutritional Diseases</option>
                            <option value="Hypertension">Hypertension</option>
                            <option value="Cardiac Diseases">Cardiac Diseases</option>
                            <option value="Stroke">Stroke</option>
                            <option value="Diabetes Mellitus">Diabetes Mellitus</option>
                            <option value="Rheumatism / Other Joint Pains / Arthritis">Rheumatism / Other Joint Pains / Arthritis</option>
                            <option value="Sickle Cell Disease">Sickle Cell Disease</option>
                            <option value="Asthma">Asthma</option>
                            <option value="Chronic Obstructed Pulmonary Disease (COPD)">Chronic Obstructed Pulmonary Disease (COPD)</option>
                            <option value="Breast Cancer">Breast Cancer</option>
                            <option value="Cervical Cancer">Cervical Cancer</option>
                            <option value="Lymphoma">Lymphoma</option>
                            <option value="Prostate Cancer">Prostate Cancer</option>
                            <option value="Hepatocellular Carcinoma">Hepatocellular Carcinoma</option>
                            <option value="Chronic Obstructed Pulmonary Disease (COPD)">Chronic Obstructed Pulmonary Disease (COPD)</option>
                            <option value="Breast Cancer">Breast Cancer</option>
                            <option value="Cervical Cancer">Cervical Cancer</option>
                            <option value="Lymphoma">Lymphoma</option>
                            <option value="Prostate Cancer">Prostate Cancer</option>
                            <option value="Hepatocellular Carcinoma">Hepatocellular Carcinoma</option>
                            <option value="All Other Cancers">All Other Cancers</option>
                            <option value="Schizophrenia">Schizophrenia</option>
                            <option value="Acute Psychotic Disorder">Acute Psychotic Disorder</option>
                            <option value="Mono Symptoms Delusion">Mono Symptoms Delusion</option>
                            <option value="Depression">Depression</option>
                            <option value="Substance Abuse">Substance Abuse</option>
                            <option value="Epilepsy">Epilepsy</option>
                            <option value="Autism">Autism</option>
                            <option value="Mental Retardation">Mental Retardation</option>
                            <option value="Attention Deficit Hyperactivity Disorder">Attention Deficit Hyperactivity Disorder</option>
                            <option value="Conversion Disorders">Conversion Disorders</option>
                            <option value="Post Traumatic Stress Syndrome">Post Traumatic Stress Syndrome</option>
                            <option value="Generalized Anxiety">Generalized Anxiety</option>
                            <option value="Other Anxiety Disorders">Other Anxiety Disorders</option>
                            <option value="Neurosis">Neurosis</option>
                            <option value="Acute Eye Infection">Acute Eye Infection</option>
                            <option value="Cataract">Cataract</option>
                            <option value="Trachoma">Trachoma</option>
                            <option value="Otitis Media">Otitis Media</option>
                            <option value="Other Acute Ear infection">Other Acute Ear infection</option>
                            <option value="Dental Caries">Dental Caries</option>
                            <option value="Dental Swellings">Dental Swellings</option>
                            <option value="Traumtic Conditions (Oral and Maxillofacial Region)">Traumtic Conditions (Oral and Maxillofacial Region)</option>
                            <option value="Peridontal diseases">Peridontal diseases</option>
                            <option value="Cerebral Palsy">Cerebral Palsy</option>
                            <option value="liver diseases">liver diseases</option>
                            <option value="Acute Urinary Tract Infection">Acute Urinary Tract Infection</option>
                            <option value="Skin Diseases">Skin Diseases</option>
                            <option value="Ulcer">Ulcer</option>
                            <option value="Kidney Related Diseases">Kidney Related Diseases</option>
                            <option value="Other Oral Conditions">Other Oral Conditions</option>
                            <option value="Gynaecological conditions">Gynaecological conditions</option>
                            <option value="Pregnancy Related Complications">Pregnancy Related Complications</option>
                            <option value="Anaemia in Pregnancy">Anaemia in Pregnancy</option>
                            <option value="Genital Ulcer">Genital Ulcer</option>
                            <option value="Vaginal Discharge">Vaginal Discharge</option>
                            <option value="Urethral Discharge">Urethral Discharge</option>
                            <option value="Other diseases of the Male reproductive system">Other diseases of the Male reproductive system</option>
                            <option value="Other diseases of the Female reproductive system">Other diseases of the Female reproductive system</option>
                            <option value="Transport injuries (Road Traffic Accidents)">Transport injuries (Road Traffic Accidents)</option>
                            <option value="Home Injuries (Home Accidents and Injuries)">Home Injuries (Home Accidents and Injuries)</option>
                            <option value="Occupational / Industrial Injuries">Occupational / Industrial Injuries</option>
                            <option value="Burns">Burns</option>
                            <option value="Poisoning (Occupational Poisoning)">Poisoning (Occupational Poisoning)</option>
                            <option value="Dog bite">Dog bite</option>
                            <option value="Human bites">Human bites</option>
                            <option value="Snake Bite">Snake Bite</option>
                            <option value="Sexual Abuse">Sexual Abuse</option>
                            <option value="Domestic Violence">Domestic Violence</option>
                            <option value="Pyrexia of unknown origin PUO (not Malaria)">Pyrexia of unknown origin PUO (not Malaria)</option>
                            <option value="Brought in Dead">Brought in Dead</option>
                            <option value="Other Animal Bites">Other Animal Bites</option>
                            <option value="other Diseases">other Diseases</option>
                            <!-- Add more options as needed -->
                        </select>
                        </div>
                        <div class="input-field">
                        <label>Type of Test(S) Requested</label>
                        <select name="TypeOfTest" id="TypeOfTest" required class="select2">
                            <option disabled selected>Select test</option>
                            <option value="HB Test">HB Test</option>
                            <option value="PCV Test">PCV Test</option>
                            <option value="RBC Tests">RBC Tests</option>
                            <option value="MCH Tests">MCH Tests</option>
                            <option value="MCHC Tests">MCHC Tests</option>
                            <option value="WBC Tests">WBC Tests</option>
                            <option value="Differential counts">Differential counts</option>
                            <option value="Platelet counts">Platelet counts</option>
                            <option value="Reticulocyte counts">Reticulocyte counts</option>
                            <option value="Blood film comments">Blood film comments</option>
                            <option value="ESR Tests">ESR Tests</option>
                            <option value="Microscopy (MP)">Microscopy (MP)</option>
                            <option value="Sickle Cell">Sickle Cell</option>
                            <option value="HB Electrophoresis Tests">HB Electrophoresis Tests</option>
                            <option value="G-6PD Normal">G-6PD Normal</option>
                            <option value="G-6PD Partial Defect">G-6PD Partial Defect</option>
                            <option value="G-6PD Full Defect">G-6PD Full Defect</option>
                            <option value="LE Cells">LE Cells</option>
                            <option value="Blood groupings">Blood groupings</option>
                            <option value="Bleeding Time Tests">Bleeding Time Tests</option>
                            <option value="Clotting Time Tests">Clotting Time Tests</option>
                            <option value="Prothrombin Time Tests">Prothrombin Time Tests</option>
                            <option value="Sodium Tests">Sodium Tests</option>
                            <option value="Potassium Tests">Potassium Tests</option>
                            <option value="Chloride Tests">Chloride Tests</option>
                            <option value="Bicarbonate Tests">Bicarbonate Tests</option>
                            <option value="Urea Tests">Urea Tests</option>
                            <option value="Creatinine Tests">Creatinine Tests</option>
                            <option value="Bilirubin Tests">Bilirubin Tests</option>
                            <option value="Alkaline Phosphatase Tests">Alkaline Phosphatase Tests</option>
                            <option value="Acid Phosphatase Tests">Acid Phosphatase Tests</option>
                            <option value="PSA Tests">PSA Tests</option>
                            <option value="Amylase Tests">Amylase Tests</option>
                            <option value="SGPT Tests">SGPT Tests</option>
                            <option value="SGOT Tests">SGOT Tests</option>
                            <option value="Total Protein Tests">Total Protein Tests</option>
                             <option value="Albumin Tests">Albumin Tests</option>
                            <option value="Globulin Tests">Globulin Tests</option>
                            <option value="Gamma GT Tests">Gamma GT Tests</option>
                            <option value="Total Cholesterol Tests">Total Cholesterol Tests</option>
                            <option value="LDL Tests">LDL Tests</option>
                            <option value="HDL Tests">HDL Tests</option>
                            <option value="Triglycerides Tests">Triglycerides Tests</option>
                            <option value="Glucose Tests">Glucose Tests</option>
                            <option value="Uric Acid Tests">Uric Acid Tests</option>
                            <option value="CK - NAC Tests">CK - NAC Tests</option>
                            <option value="Troponin Tests">Troponin Tests</option>
                            <option value="LDH Tests">LDH Tests</option>
                            <option value="T3 Tests">T3 Tests</option>
                            <option value="T4 Tests">T4 Tests</option>
                            <option value="TSH Tests">TSH Tests</option>
                            <option value="Pregnancy Tests">Pregnancy Tests</option>
                            <option value="Malaria RDT">Malaria RDT</option>
                            <option value="All Other Haematological tests">All Other Haematological tests</option>
                        </select>
                        </div>
                        <div class="input-field">
                        <label>Test Result(S)</label>
                        <select name = "testResults" id = "testResults" required class="select2">
                            <option disabled selected>select result</option>
                            <option value="MP Positive Results">MP Positive Results</option>
                            <option value="MP Negative Results">MP Negative Results</option>
                            <option value="Sickle Cell Negative Results">Sickle Cell Negative Results</option>
                            <option value="Sickle Cell Positive Results">Sickle Cell Positive Results</option>
                            <option value="Positive Malaria RDT">Positive Malaria RDT</option>
                            <option value="Negetive Malaria RDT">Negetive Malaria RDT</option>
                            <option value="Negetive Pregnancy test">Negetive Pregnancy test</option>
                            <option value="Positive Pregnancy Test">Positive Pregnancy Test</option>
                        </select>
                        </div> 
                        <div class="input-field">
                        <label>Outcome of Admission</label>
                        <select name="outcomeOfAdmission" id="outcomeOfAdmission" required class="select2">
                            <option disabled selected>Select test</option>
                            <option value="Discharged">Discharged</option>
                            <option value="Transferred">Transferred</option>
                            <option value="Died">Died</option>
                            <option value="Absconded">Absconded</option>
                        </select>
                        </div>
                        <div class="input-field">
                            <label>Date of Discharge</label>
                            <input type="date" placeholder="Enter date of Discharge" name = "dateOfDischarge" id = "dateOfDischarge" required>
                        </div>
                        <div class="input-field">
                        <label>Occupation</label>
                        <select name="occupation" id="occupation" required class="select2">
                            <option disabled selected>Select occupation</option>
                            <option value="Teaching">Teaching</option>
                            <option value="Farming">Farming</option>
                            <option value="Civil servant">Civil servant</option>
                            <option value="Others">Others</option>
                        </select>
                        </div>
                        <div class="input-field">
                        <label>Principal Diagnosis</label>
                        <select name="PrincipalDiagnosis" id="PrincipalDiagnosis" required class="select2">
                            <option disabled selected>Select condition</option>
                            <option value="AFP (Polio)">AFP (Polio)</option>
                            <option value="Meningitis">Meningitis</option>
                            <option value="Neo-Natal Tetanus">Neo-Natal Tetanus</option>
                            <option value="Pertussis (Whooping Cough)">Pertussis (Whooping Cough)</option>
                            <option value="Diphteria">Diphteria</option>
                            <option value="Measles">Measles</option>
                            <option value="Yellow Fever (YF)">Yellow Fever (YF)</option>
                            <option value="Tetanus">Tetanus</option>
                            <option value="Tuberculosis">Tuberculosis</option>
                            <option value="Uncomplicated Malaria">Uncomplicated Malaria</option>
                            <option value="Severe Malaria (Lab-Confirmed)">Severe Malaria (Lab-Confirmed)</option>
                            <option value="Severe Malaria (Non-Lab-Confirmed)">Severe Malaria (Non-Lab-Confirmed)</option>
                            <option value="Typhoid Fever">Typhoid Fever</option>
                            <option value="Cholera">Cholera</option>
                            <option value="AFP (Polio)">Diarrhoea Diseases</option>
                            <option value="Viral Hepatitis">Viral Hepatitis</option>
                            <option value="Schistosomiasis (Bilhazia)">Schistosomiasis (Bilhazia)</option>
                            <option value="Suspected Guinea Worm">Suspected Guinea Worm</option>
                            <option value="Onchocerciasis">Onchocerciasis</option>
                            <option value="Buruli Ulcer">Buruli Ulcer</option>
                            <option value="Leprosy">Leprosy</option>
                            <option value="HIV/AIDS Related conditions">HIV/AIDS Related conditions</option>
                            <option value="Mumps">Mumps</option>
                            <option value="Intestinal Worms">Intestinal Worms</option>
                            <option value="Chicken Pox">Chicken Pox</option>
                            <option value="Upper Respiratory Tract Infections">Upper Respiratory Tract Infections</option>
                            <option value="Pneumonia">Pneumonia</option>
                            <option value="Septiceamia">Septiceamia</option>
                            <option value="Malnutrition">Malnutrition</option>
                            <option value="Obesity">Obesity</option>
                            <option value="Anaemia">Anaemia</option>
                            <option value="Other Nutritional Diseases">Other Nutritional Diseases</option>
                            <option value="Hypertension">Hypertension</option>
                            <option value="Cardiac Diseases">Cardiac Diseases</option>
                            <option value="Stroke">Stroke</option>
                            <option value="Diabetes Mellitus">Diabetes Mellitus</option>
                            <option value="Rheumatism / Other Joint Pains / Arthritis">Rheumatism / Other Joint Pains / Arthritis</option>
                            <option value="Sickle Cell Disease">Sickle Cell Disease</option>
                            <option value="Asthma">Asthma</option>
                            <option value="Chronic Obstructed Pulmonary Disease (COPD)">Chronic Obstructed Pulmonary Disease (COPD)</option>
                            <option value="Breast Cancer">Breast Cancer</option>
                            <option value="Cervical Cancer">Cervical Cancer</option>
                            <option value="Lymphoma">Lymphoma</option>
                            <option value="Prostate Cancer">Prostate Cancer</option>
                            <option value="Hepatocellular Carcinoma">Hepatocellular Carcinoma</option>
                            <option value="Chronic Obstructed Pulmonary Disease (COPD)">Chronic Obstructed Pulmonary Disease (COPD)</option>
                            <option value="Breast Cancer">Breast Cancer</option>
                            <option value="Cervical Cancer">Cervical Cancer</option>
                            <option value="Lymphoma">Lymphoma</option>
                            <option value="Prostate Cancer">Prostate Cancer</option>
                            <option value="Hepatocellular Carcinoma">Hepatocellular Carcinoma</option>
                            <option value="All Other Cancers">All Other Cancers</option>
                            <option value="Schizophrenia">Schizophrenia</option>
                            <option value="Acute Psychotic Disorder">Acute Psychotic Disorder</option>
                            <option value="Mono Symptoms Delusion">Mono Symptoms Delusion</option>
                            <option value="Depression">Depression</option>
                            <option value="Substance Abuse">Substance Abuse</option>
                            <option value="Epilepsy">Epilepsy</option>
                            <option value="Autism">Autism</option>
                            <option value="Mental Retardation">Mental Retardation</option>
                            <option value="Attention Deficit Hyperactivity Disorder">Attention Deficit Hyperactivity Disorder</option>
                            <option value="Conversion Disorders">Conversion Disorders</option>
                            <option value="Post Traumatic Stress Syndrome">Post Traumatic Stress Syndrome</option>
                            <option value="Generalized Anxiety">Generalized Anxiety</option>
                            <option value="Other Anxiety Disorders">Other Anxiety Disorders</option>
                            <option value="Neurosis">Neurosis</option>
                            <option value="Acute Eye Infection">Acute Eye Infection</option>
                            <option value="Cataract">Cataract</option>
                            <option value="Trachoma">Trachoma</option>
                            <option value="Otitis Media">Otitis Media</option>
                            <option value="Other Acute Ear infection">Other Acute Ear infection</option>
                            <option value="Dental Caries">Dental Caries</option>
                            <option value="Dental Swellings">Dental Swellings</option>
                            <option value="Traumtic Conditions (Oral and Maxillofacial Region)">Traumtic Conditions (Oral and Maxillofacial Region)</option>
                            <option value="Peridontal diseases">Peridontal diseases</option>
                            <option value="Cerebral Palsy">Cerebral Palsy</option>
                            <option value="liver diseases">liver diseases</option>
                            <option value="Acute Urinary Tract Infection">Acute Urinary Tract Infection</option>
                            <option value="Skin Diseases">Skin Diseases</option>
                            <option value="Ulcer">Ulcer</option>
                            <option value="Kidney Related Diseases">Kidney Related Diseases</option>
                            <option value="Other Oral Conditions">Other Oral Conditions</option>
                            <option value="Gynaecological conditions">Gynaecological conditions</option>
                            <option value="Pregnancy Related Complications">Pregnancy Related Complications</option>
                            <option value="Anaemia in Pregnancy">Anaemia in Pregnancy</option>
                            <option value="Genital Ulcer">Genital Ulcer</option>
                            <option value="Vaginal Discharge">Vaginal Discharge</option>
                            <option value="Urethral Discharge">Urethral Discharge</option>
                            <option value="Other diseases of the Male reproductive system">Other diseases of the Male reproductive system</option>
                            <option value="Other diseases of the Female reproductive system">Other diseases of the Female reproductive system</option>
                            <option value="Transport injuries (Road Traffic Accidents)">Transport injuries (Road Traffic Accidents)</option>
                            <option value="Home Injuries (Home Accidents and Injuries)">Home Injuries (Home Accidents and Injuries)</option>
                            <option value="Occupational / Industrial Injuries">Occupational / Industrial Injuries</option>
                            <option value="Burns">Burns</option>
                            <option value="Poisoning (Occupational Poisoning)">Poisoning (Occupational Poisoning)</option>
                            <option value="Dog bite">Dog bite</option>
                            <option value="Human bites">Human bites</option>
                            <option value="Snake Bite">Snake Bite</option>
                            <option value="Sexual Abuse">Sexual Abuse</option>
                            <option value="Domestic Violence">Domestic Violence</option>
                            <option value="Pyrexia of unknown origin PUO (not Malaria)">Pyrexia of unknown origin PUO (not Malaria)</option>
                            <option value="Brought in Dead">Brought in Dead</option>
                            <option value="Other Animal Bites">Other Animal Bites</option>
                            <option value="other Diseases">other Diseases</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                        <div class="input-field">
                        <label>Status of Principal Diagnosis</label>
                        <select name = "statusOfPrincipal" required>
                            <option disabled selected>Select </option>
                            <option value = ">New case">New case</option>
                            <option value = "Old case">Old case</option>
                        </select>
                    </div>
                        <div class="input-field">
                        <label>1st Additional Diagnosis</label>
                        <select name="Additional1" id="Additional1" required class="select2">
                            <option disabled selected>Select condition</option>
                            <option value="AFP (Polio)">AFP (Polio)</option>
                            <option value="Meningitis">Meningitis</option>
                            <option value="Neo-Natal Tetanus">Neo-Natal Tetanus</option>
                            <option value="Pertussis (Whooping Cough)">Pertussis (Whooping Cough)</option>
                            <option value="Diphteria">Diphteria</option>
                            <option value="Measles">Measles</option>
                            <option value="Yellow Fever (YF)">Yellow Fever (YF)</option>
                            <option value="Tetanus">Tetanus</option>
                            <option value="Tuberculosis">Tuberculosis</option>
                            <option value="Uncomplicated Malaria">Uncomplicated Malaria</option>
                            <option value="Severe Malaria (Lab-Confirmed)">Severe Malaria (Lab-Confirmed)</option>
                            <option value="Severe Malaria (Non-Lab-Confirmed)">Severe Malaria (Non-Lab-Confirmed)</option>
                            <option value="Typhoid Fever">Typhoid Fever</option>
                            <option value="Cholera">Cholera</option>
                            <option value="AFP (Polio)">Diarrhoea Diseases</option>
                            <option value="Viral Hepatitis">Viral Hepatitis</option>
                            <option value="Schistosomiasis (Bilhazia)">Schistosomiasis (Bilhazia)</option>
                            <option value="Suspected Guinea Worm">Suspected Guinea Worm</option>
                            <option value="Onchocerciasis">Onchocerciasis</option>
                            <option value="Buruli Ulcer">Buruli Ulcer</option>
                            <option value="Leprosy">Leprosy</option>
                            <option value="HIV/AIDS Related conditions">HIV/AIDS Related conditions</option>
                            <option value="Mumps">Mumps</option>
                            <option value="Intestinal Worms">Intestinal Worms</option>
                            <option value="Chicken Pox">Chicken Pox</option>
                            <option value="Upper Respiratory Tract Infections">Upper Respiratory Tract Infections</option>
                            <option value="Pneumonia">Pneumonia</option>
                            <option value="Septiceamia">Septiceamia</option>
                            <option value="Malnutrition">Malnutrition</option>
                            <option value="Obesity">Obesity</option>
                            <option value="Anaemia">Anaemia</option>
                            <option value="Other Nutritional Diseases">Other Nutritional Diseases</option>
                            <option value="Hypertension">Hypertension</option>
                            <option value="Cardiac Diseases">Cardiac Diseases</option>
                            <option value="Stroke">Stroke</option>
                            <option value="Diabetes Mellitus">Diabetes Mellitus</option>
                            <option value="Rheumatism / Other Joint Pains / Arthritis">Rheumatism / Other Joint Pains / Arthritis</option>
                            <option value="Sickle Cell Disease">Sickle Cell Disease</option>
                            <option value="Asthma">Asthma</option>
                            <option value="Chronic Obstructed Pulmonary Disease (COPD)">Chronic Obstructed Pulmonary Disease (COPD)</option>
                            <option value="Breast Cancer">Breast Cancer</option>
                            <option value="Cervical Cancer">Cervical Cancer</option>
                            <option value="Lymphoma">Lymphoma</option>
                            <option value="Prostate Cancer">Prostate Cancer</option>
                            <option value="Hepatocellular Carcinoma">Hepatocellular Carcinoma</option>
                            <option value="Chronic Obstructed Pulmonary Disease (COPD)">Chronic Obstructed Pulmonary Disease (COPD)</option>
                            <option value="Breast Cancer">Breast Cancer</option>
                            <option value="Cervical Cancer">Cervical Cancer</option>
                            <option value="Lymphoma">Lymphoma</option>
                            <option value="Prostate Cancer">Prostate Cancer</option>
                            <option value="Hepatocellular Carcinoma">Hepatocellular Carcinoma</option>
                            <option value="All Other Cancers">All Other Cancers</option>
                            <option value="Schizophrenia">Schizophrenia</option>
                            <option value="Acute Psychotic Disorder">Acute Psychotic Disorder</option>
                            <option value="Mono Symptoms Delusion">Mono Symptoms Delusion</option>
                            <option value="Depression">Depression</option>
                            <option value="Substance Abuse">Substance Abuse</option>
                            <option value="Epilepsy">Epilepsy</option>
                            <option value="Autism">Autism</option>
                            <option value="Mental Retardation">Mental Retardation</option>
                            <option value="Attention Deficit Hyperactivity Disorder">Attention Deficit Hyperactivity Disorder</option>
                            <option value="Conversion Disorders">Conversion Disorders</option>
                            <option value="Post Traumatic Stress Syndrome">Post Traumatic Stress Syndrome</option>
                            <option value="Generalized Anxiety">Generalized Anxiety</option>
                            <option value="Other Anxiety Disorders">Other Anxiety Disorders</option>
                            <option value="Neurosis">Neurosis</option>
                            <option value="Acute Eye Infection">Acute Eye Infection</option>
                            <option value="Cataract">Cataract</option>
                            <option value="Trachoma">Trachoma</option>
                            <option value="Otitis Media">Otitis Media</option>
                            <option value="Other Acute Ear infection">Other Acute Ear infection</option>
                            <option value="Dental Caries">Dental Caries</option>
                            <option value="Dental Swellings">Dental Swellings</option>
                            <option value="Traumtic Conditions (Oral and Maxillofacial Region)">Traumtic Conditions (Oral and Maxillofacial Region)</option>
                            <option value="Peridontal diseases">Peridontal diseases</option>
                            <option value="Cerebral Palsy">Cerebral Palsy</option>
                            <option value="liver diseases">liver diseases</option>
                            <option value="Acute Urinary Tract Infection">Acute Urinary Tract Infection</option>
                            <option value="Skin Diseases">Skin Diseases</option>
                            <option value="Ulcer">Ulcer</option>
                            <option value="Kidney Related Diseases">Kidney Related Diseases</option>
                            <option value="Other Oral Conditions">Other Oral Conditions</option>
                            <option value="Gynaecological conditions">Gynaecological conditions</option>
                            <option value="Pregnancy Related Complications">Pregnancy Related Complications</option>
                            <option value="Anaemia in Pregnancy">Anaemia in Pregnancy</option>
                            <option value="Genital Ulcer">Genital Ulcer</option>
                            <option value="Vaginal Discharge">Vaginal Discharge</option>
                            <option value="Urethral Discharge">Urethral Discharge</option>
                            <option value="Other diseases of the Male reproductive system">Other diseases of the Male reproductive system</option>
                            <option value="Other diseases of the Female reproductive system">Other diseases of the Female reproductive system</option>
                            <option value="Transport injuries (Road Traffic Accidents)">Transport injuries (Road Traffic Accidents)</option>
                            <option value="Home Injuries (Home Accidents and Injuries)">Home Injuries (Home Accidents and Injuries)</option>
                            <option value="Occupational / Industrial Injuries">Occupational / Industrial Injuries</option>
                            <option value="Burns">Burns</option>
                            <option value="Poisoning (Occupational Poisoning)">Poisoning (Occupational Poisoning)</option>
                            <option value="Dog bite">Dog bite</option>
                            <option value="Human bites">Human bites</option>
                            <option value="Snake Bite">Snake Bite</option>
                            <option value="Sexual Abuse">Sexual Abuse</option>
                            <option value="Domestic Violence">Domestic Violence</option>
                            <option value="Pyrexia of unknown origin PUO (not Malaria)">Pyrexia of unknown origin PUO (not Malaria)</option>
                            <option value="Brought in Dead">Brought in Dead</option>
                            <option value="Other Animal Bites">Other Animal Bites</option>
                            <option value="other Diseases">other Diseases</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div class="input-field">
                        <label>1st Status of Additional Diagnosis</label>
                        <select name = "statusOfAdditional1" required>
                            <option disabled selected>Select </option>
                            <option value = ">New case">New case</option>
                            <option value = "Old case">Old case</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <label>2nd Additional Diagnosis</label>
                        <select name="Additional2" id="Additional2" required class="select2">
                            <option disabled selected>Select condition</option>
                            <option value="AFP (Polio)">AFP (Polio)</option>
                            <option value="Meningitis">Meningitis</option>
                            <option value="Neo-Natal Tetanus">Neo-Natal Tetanus</option>
                            <option value="Pertussis (Whooping Cough)">Pertussis (Whooping Cough)</option>
                            <option value="Diphteria">Diphteria</option>
                            <option value="Measles">Measles</option>
                            <option value="Yellow Fever (YF)">Yellow Fever (YF)</option>
                            <option value="Tetanus">Tetanus</option>
                            <option value="Tuberculosis">Tuberculosis</option>
                            <option value="Uncomplicated Malaria">Uncomplicated Malaria</option>
                            <option value="Severe Malaria (Lab-Confirmed)">Severe Malaria (Lab-Confirmed)</option>
                            <option value="Severe Malaria (Non-Lab-Confirmed)">Severe Malaria (Non-Lab-Confirmed)</option>
                            <option value="Typhoid Fever">Typhoid Fever</option>
                            <option value="Cholera">Cholera</option>
                            <option value="AFP (Polio)">Diarrhoea Diseases</option>
                            <option value="Viral Hepatitis">Viral Hepatitis</option>
                            <option value="Schistosomiasis (Bilhazia)">Schistosomiasis (Bilhazia)</option>
                            <option value="Suspected Guinea Worm">Suspected Guinea Worm</option>
                            <option value="Onchocerciasis">Onchocerciasis</option>
                            <option value="Buruli Ulcer">Buruli Ulcer</option>
                            <option value="Leprosy">Leprosy</option>
                            <option value="HIV/AIDS Related conditions">HIV/AIDS Related conditions</option>
                            <option value="Mumps">Mumps</option>
                            <option value="Intestinal Worms">Intestinal Worms</option>
                            <option value="Chicken Pox">Chicken Pox</option>
                            <option value="Upper Respiratory Tract Infections">Upper Respiratory Tract Infections</option>
                            <option value="Pneumonia">Pneumonia</option>
                            <option value="Septiceamia">Septiceamia</option>
                            <option value="Malnutrition">Malnutrition</option>
                            <option value="Obesity">Obesity</option>
                            <option value="Anaemia">Anaemia</option>
                            <option value="Other Nutritional Diseases">Other Nutritional Diseases</option>
                            <option value="Hypertension">Hypertension</option>
                            <option value="Cardiac Diseases">Cardiac Diseases</option>
                            <option value="Stroke">Stroke</option>
                            <option value="Diabetes Mellitus">Diabetes Mellitus</option>
                            <option value="Rheumatism / Other Joint Pains / Arthritis">Rheumatism / Other Joint Pains / Arthritis</option>
                            <option value="Sickle Cell Disease">Sickle Cell Disease</option>
                            <option value="Asthma">Asthma</option>
                            <option value="Chronic Obstructed Pulmonary Disease (COPD)">Chronic Obstructed Pulmonary Disease (COPD)</option>
                            <option value="Breast Cancer">Breast Cancer</option>
                            <option value="Cervical Cancer">Cervical Cancer</option>
                            <option value="Lymphoma">Lymphoma</option>
                            <option value="Prostate Cancer">Prostate Cancer</option>
                            <option value="Hepatocellular Carcinoma">Hepatocellular Carcinoma</option>
                            <option value="Chronic Obstructed Pulmonary Disease (COPD)">Chronic Obstructed Pulmonary Disease (COPD)</option>
                            <option value="Breast Cancer">Breast Cancer</option>
                            <option value="Cervical Cancer">Cervical Cancer</option>
                            <option value="Lymphoma">Lymphoma</option>
                            <option value="Prostate Cancer">Prostate Cancer</option>
                            <option value="Hepatocellular Carcinoma">Hepatocellular Carcinoma</option>
                            <option value="All Other Cancers">All Other Cancers</option>
                            <option value="Schizophrenia">Schizophrenia</option>
                            <option value="Acute Psychotic Disorder">Acute Psychotic Disorder</option>
                            <option value="Mono Symptoms Delusion">Mono Symptoms Delusion</option>
                            <option value="Depression">Depression</option>
                            <option value="Substance Abuse">Substance Abuse</option>
                            <option value="Epilepsy">Epilepsy</option>
                            <option value="Autism">Autism</option>
                            <option value="Mental Retardation">Mental Retardation</option>
                            <option value="Attention Deficit Hyperactivity Disorder">Attention Deficit Hyperactivity Disorder</option>
                            <option value="Conversion Disorders">Conversion Disorders</option>
                            <option value="Post Traumatic Stress Syndrome">Post Traumatic Stress Syndrome</option>
                            <option value="Generalized Anxiety">Generalized Anxiety</option>
                            <option value="Other Anxiety Disorders">Other Anxiety Disorders</option>
                            <option value="Neurosis">Neurosis</option>
                            <option value="Acute Eye Infection">Acute Eye Infection</option>
                            <option value="Cataract">Cataract</option>
                            <option value="Trachoma">Trachoma</option>
                            <option value="Otitis Media">Otitis Media</option>
                            <option value="Other Acute Ear infection">Other Acute Ear infection</option>
                            <option value="Dental Caries">Dental Caries</option>
                            <option value="Dental Swellings">Dental Swellings</option>
                            <option value="Traumtic Conditions (Oral and Maxillofacial Region)">Traumtic Conditions (Oral and Maxillofacial Region)</option>
                            <option value="Peridontal diseases">Peridontal diseases</option>
                            <option value="Cerebral Palsy">Cerebral Palsy</option>
                            <option value="liver diseases">liver diseases</option>
                            <option value="Acute Urinary Tract Infection">Acute Urinary Tract Infection</option>
                            <option value="Skin Diseases">Skin Diseases</option>
                            <option value="Ulcer">Ulcer</option>
                            <option value="Kidney Related Diseases">Kidney Related Diseases</option>
                            <option value="Other Oral Conditions">Other Oral Conditions</option>
                            <option value="Gynaecological conditions">Gynaecological conditions</option>
                            <option value="Pregnancy Related Complications">Pregnancy Related Complications</option>
                            <option value="Anaemia in Pregnancy">Anaemia in Pregnancy</option>
                            <option value="Genital Ulcer">Genital Ulcer</option>
                            <option value="Vaginal Discharge">Vaginal Discharge</option>
                            <option value="Urethral Discharge">Urethral Discharge</option>
                            <option value="Other diseases of the Male reproductive system">Other diseases of the Male reproductive system</option>
                            <option value="Other diseases of the Female reproductive system">Other diseases of the Female reproductive system</option>
                            <option value="Transport injuries (Road Traffic Accidents)">Transport injuries (Road Traffic Accidents)</option>
                            <option value="Home Injuries (Home Accidents and Injuries)">Home Injuries (Home Accidents and Injuries)</option>
                            <option value="Occupational / Industrial Injuries">Occupational / Industrial Injuries</option>
                            <option value="Burns">Burns</option>
                            <option value="Poisoning (Occupational Poisoning)">Poisoning (Occupational Poisoning)</option>
                            <option value="Dog bite">Dog bite</option>
                            <option value="Human bites">Human bites</option>
                            <option value="Snake Bite">Snake Bite</option>
                            <option value="Sexual Abuse">Sexual Abuse</option>
                            <option value="Domestic Violence">Domestic Violence</option>
                            <option value="Pyrexia of unknown origin PUO (not Malaria)">Pyrexia of unknown origin PUO (not Malaria)</option>
                            <option value="Brought in Dead">Brought in Dead</option>
                            <option value="Other Animal Bites">Other Animal Bites</option>
                            <option value="other Diseases">other Diseases</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div class="input-field">
                        <label>2nd Status of Additional Diagnosis</label>
                        <select name = "statusOfAdditional2" required>
                            <option disabled selected>Select </option>
                            <option value = ">New case">New case</option>
                            <option value = "Old case">Old case</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <label>3rd Additional Diagnosis</label>
                        <select name="Additional3" id="Additional3" required class="select2">
                            <option disabled selected>Select condition</option>
                            <option value="AFP (Polio)">AFP (Polio)</option>
                            <option value="Meningitis">Meningitis</option>
                            <option value="Neo-Natal Tetanus">Neo-Natal Tetanus</option>
                            <option value="Pertussis (Whooping Cough)">Pertussis (Whooping Cough)</option>
                            <option value="Diphteria">Diphteria</option>
                            <option value="Measles">Measles</option>
                            <option value="Yellow Fever (YF)">Yellow Fever (YF)</option>
                            <option value="Tetanus">Tetanus</option>
                            <option value="Tuberculosis">Tuberculosis</option>
                            <option value="Uncomplicated Malaria">Uncomplicated Malaria</option>
                            <option value="Severe Malaria (Lab-Confirmed)">Severe Malaria (Lab-Confirmed)</option>
                            <option value="Severe Malaria (Non-Lab-Confirmed)">Severe Malaria (Non-Lab-Confirmed)</option>
                            <option value="Typhoid Fever">Typhoid Fever</option>
                            <option value="Cholera">Cholera</option>
                            <option value="AFP (Polio)">Diarrhoea Diseases</option>
                            <option value="Viral Hepatitis">Viral Hepatitis</option>
                            <option value="Schistosomiasis (Bilhazia)">Schistosomiasis (Bilhazia)</option>
                            <option value="Suspected Guinea Worm">Suspected Guinea Worm</option>
                            <option value="Onchocerciasis">Onchocerciasis</option>
                            <option value="Buruli Ulcer">Buruli Ulcer</option>
                            <option value="Leprosy">Leprosy</option>
                            <option value="HIV/AIDS Related conditions">HIV/AIDS Related conditions</option>
                            <option value="Mumps">Mumps</option>
                            <option value="Intestinal Worms">Intestinal Worms</option>
                            <option value="Chicken Pox">Chicken Pox</option>
                            <option value="Upper Respiratory Tract Infections">Upper Respiratory Tract Infections</option>
                            <option value="Pneumonia">Pneumonia</option>
                            <option value="Septiceamia">Septiceamia</option>
                            <option value="Malnutrition">Malnutrition</option>
                            <option value="Obesity">Obesity</option>
                            <option value="Anaemia">Anaemia</option>
                            <option value="Other Nutritional Diseases">Other Nutritional Diseases</option>
                            <option value="Hypertension">Hypertension</option>
                            <option value="Cardiac Diseases">Cardiac Diseases</option>
                            <option value="Stroke">Stroke</option>
                            <option value="Diabetes Mellitus">Diabetes Mellitus</option>
                            <option value="Rheumatism / Other Joint Pains / Arthritis">Rheumatism / Other Joint Pains / Arthritis</option>
                            <option value="Sickle Cell Disease">Sickle Cell Disease</option>
                            <option value="Asthma">Asthma</option>
                            <option value="Chronic Obstructed Pulmonary Disease (COPD)">Chronic Obstructed Pulmonary Disease (COPD)</option>
                            <option value="Breast Cancer">Breast Cancer</option>
                            <option value="Cervical Cancer">Cervical Cancer</option>
                            <option value="Lymphoma">Lymphoma</option>
                            <option value="Prostate Cancer">Prostate Cancer</option>
                            <option value="Hepatocellular Carcinoma">Hepatocellular Carcinoma</option>
                            <option value="Chronic Obstructed Pulmonary Disease (COPD)">Chronic Obstructed Pulmonary Disease (COPD)</option>
                            <option value="Breast Cancer">Breast Cancer</option>
                            <option value="Cervical Cancer">Cervical Cancer</option>
                            <option value="Lymphoma">Lymphoma</option>
                            <option value="Prostate Cancer">Prostate Cancer</option>
                            <option value="Hepatocellular Carcinoma">Hepatocellular Carcinoma</option>
                            <option value="All Other Cancers">All Other Cancers</option>
                            <option value="Schizophrenia">Schizophrenia</option>
                            <option value="Acute Psychotic Disorder">Acute Psychotic Disorder</option>
                            <option value="Mono Symptoms Delusion">Mono Symptoms Delusion</option>
                            <option value="Depression">Depression</option>
                            <option value="Substance Abuse">Substance Abuse</option>
                            <option value="Epilepsy">Epilepsy</option>
                            <option value="Autism">Autism</option>
                            <option value="Mental Retardation">Mental Retardation</option>
                            <option value="Attention Deficit Hyperactivity Disorder">Attention Deficit Hyperactivity Disorder</option>
                            <option value="Conversion Disorders">Conversion Disorders</option>
                            <option value="Post Traumatic Stress Syndrome">Post Traumatic Stress Syndrome</option>
                            <option value="Generalized Anxiety">Generalized Anxiety</option>
                            <option value="Other Anxiety Disorders">Other Anxiety Disorders</option>
                            <option value="Neurosis">Neurosis</option>
                            <option value="Acute Eye Infection">Acute Eye Infection</option>
                            <option value="Cataract">Cataract</option>
                            <option value="Trachoma">Trachoma</option>
                            <option value="Otitis Media">Otitis Media</option>
                            <option value="Other Acute Ear infection">Other Acute Ear infection</option>
                            <option value="Dental Caries">Dental Caries</option>
                            <option value="Dental Swellings">Dental Swellings</option>
                            <option value="Traumtic Conditions (Oral and Maxillofacial Region)">Traumtic Conditions (Oral and Maxillofacial Region)</option>
                            <option value="Peridontal diseases">Peridontal diseases</option>
                            <option value="Cerebral Palsy">Cerebral Palsy</option>
                            <option value="liver diseases">liver diseases</option>
                            <option value="Acute Urinary Tract Infection">Acute Urinary Tract Infection</option>
                            <option value="Skin Diseases">Skin Diseases</option>
                            <option value="Ulcer">Ulcer</option>
                            <option value="Kidney Related Diseases">Kidney Related Diseases</option>
                            <option value="Other Oral Conditions">Other Oral Conditions</option>
                            <option value="Gynaecological conditions">Gynaecological conditions</option>
                            <option value="Pregnancy Related Complications">Pregnancy Related Complications</option>
                            <option value="Anaemia in Pregnancy">Anaemia in Pregnancy</option>
                            <option value="Genital Ulcer">Genital Ulcer</option>
                            <option value="Vaginal Discharge">Vaginal Discharge</option>
                            <option value="Urethral Discharge">Urethral Discharge</option>
                            <option value="Other diseases of the Male reproductive system">Other diseases of the Male reproductive system</option>
                            <option value="Other diseases of the Female reproductive system">Other diseases of the Female reproductive system</option>
                            <option value="Transport injuries (Road Traffic Accidents)">Transport injuries (Road Traffic Accidents)</option>
                            <option value="Home Injuries (Home Accidents and Injuries)">Home Injuries (Home Accidents and Injuries)</option>
                            <option value="Occupational / Industrial Injuries">Occupational / Industrial Injuries</option>
                            <option value="Burns">Burns</option>
                            <option value="Poisoning (Occupational Poisoning)">Poisoning (Occupational Poisoning)</option>
                            <option value="Dog bite">Dog bite</option>
                            <option value="Human bites">Human bites</option>
                            <option value="Snake Bite">Snake Bite</option>
                            <option value="Sexual Abuse">Sexual Abuse</option>
                            <option value="Domestic Violence">Domestic Violence</option>
                            <option value="Pyrexia of unknown origin PUO (not Malaria)">Pyrexia of unknown origin PUO (not Malaria)</option>
                            <option value="Brought in Dead">Brought in Dead</option>
                            <option value="Other Animal Bites">Other Animal Bites</option>
                            <option value="other Diseases">other Diseases</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div class="input-field">
                        <label>3rd Status of Additional Diagnosis</label>
                        <select name = "statusOfAdditional3" required>
                            <option disabled selected>Select </option>
                            <option value = ">New case">New case</option>
                            <option value = "Old case">Old case</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <label>NHIS Client</label>
                        <input type="text" placeholder="E.g: Insure/Non-insured" name = "clientStatus" id = "clientStatus" required>
                    </div>
                    <div class="input-field">
                        <label>Medicine prescribed</label>
                        <input type="text" placeholder="E.g: ACT" name = "medicinePrescribed" required>
                    </div>
                    <div class="input-field">
                        <label>Medicine dispensed</label>
                        <input type="text" placeholder="E.g: ACT" name = "medicineDispensed" required>
                    </div>
                    <div class="input-field">
                        <label>Foot note</label> 
                        <textarea rows="4" cols="50" placeholder="further details" name = "notes" style="resize: none;"></textarea>
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
        </form>
    </div>  
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
    // Populate other form fields as needed
  }

  $(document).ready(function() {
  $('.select2').select2();
});
</script>




</body>
</html>