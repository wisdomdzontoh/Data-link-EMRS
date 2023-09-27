<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      
    function drawTable() {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'AgeGroup0_28days');
    
   
       
        data.addRows([
          ['AFP (Polio)'],
          ['Meningitis'],
          ['Neo-Natal Tetanus'],
          ['Pertussis (Whooping Cough)'],
          ['Diphtheria'],
          ['Measles'],
          ['Yellow Fever (YF)'],
          ['Tetanus'],
          ['Tuberculosis'],
          ['Uncomplicated Malaria'],
          ['Severe Malaria (Lab-Confirmed)'],
          ['Severe Malaria (Non-Lab-Confirmed)'],
          ['Typhoid Fever'],
          ['Cholera'],
          ['AFP (Polio)'],
          ['Diarrhoea Diseases'],
          ['Viral Hepatitis'],
          ['Schistosomiasis (Bilharzia)'],
          ['Suspected Guinea Worm'],
          ['Onchocerciasis'],
          ['Buruli Ulcer'],
          ['Leprosy'],
          ['HIV/AIDS Related conditions'],
          ['Mumps'],
          ['Intestinal Worms'],
          ['Chicken Pox'],
          ['Upper Respiratory Tract Infections'],
          ['Pneumonia'],
          ['Septicemia'],
          ['Malnutrition'],
          ['Obesity'],
          ['Anaemia'],
          ['Other Nutritional Diseases'],
          ['Hypertension'],
          ['Cardiac Diseases'],
          ['Stroke'],
          ['Diabetes Mellitus'],
          ['Rheumatism / Other Joint Pains / Arthritis'],
          ['Sickle Cell Disease'],
          ['Asthma'],
          ['Chronic Obstructive Pulmonary Disease (COPD)'],
          ['Breast Cancer'],
          ['Cervical Cancer'],
          ['Lymphoma'],
          ['Prostate Cancer'],
          ['Hepatocellular Carcinoma'],
          ['Chronic Obstructive Pulmonary Disease (COPD)'],
          ['Breast Cancer'],
          ['Cervical Cancer'],
          ['Lymphoma'],
          ['Prostate Cancer'],
          ['Hepatocellular Carcinoma'],
          ['All Other Cancers'],
          ['Schizophrenia'],
          ['Acute Psychotic Disorder'],
          ['Mono Symptoms Delusion'],
          ['Depression'],
          ['Substance Abuse'],
          ['Epilepsy'],
          ['Autism'],
          ['Mental Retardation'],
          ['Attention Deficit Hyperactivity Disorder'],
          ['Conversion Disorders'],
          ['Post Traumatic Stress Syndrome'],
          ['Generalized Anxiety'],
          ['Other Anxiety Disorders'],
          ['Neurosis'],
          ['Acute Eye Infection'],
          ['Cataract'],
          ['Trachoma'],
          ['Otitis Media'],
          ['Other Acute Ear Infection'],
          ['Dental Caries'],
          ['Dental Swellings'],
          ['Traumatic Conditions (Oral and Maxillofacial Region)'],
          ['Periodontal Diseases'],
          ['Cerebral Palsy'],
          ['Liver Diseases'],
          ['Acute Urinary Tract Infection'],
          ['Skin Diseases'],
          ['Ulcer'],
          ['Kidney Related Diseases'],
          ['Other Oral Conditions'],
          ['Gynecological Conditions'],
          ['Pregnancy Related Complications'],
          ['Anemia in Pregnancy'],
          ['Genital Ulcer'],
          ['Vaginal Discharge'],
          ['Urethral Discharge'],
          ['Other Diseases of the Male Reproductive System'],
          ['Other Diseases of the Female Reproductive System'],
          ['Transport Injuries (Road Traffic Accidents)'],
          ['Home Injuries (Home Accidents and Injuries)'],
          ['Occupational / Industrial Injuries'],
          ['Burns'],
          ['Poisoning (Occupational Poisoning)'],
          ['Dog Bite'],
          ['Human Bites'],
          ['Snake Bite'],
          ['Sexual Abuse'],
          ['Domestic Violence'],
          ['Pyrexia of unknown origin PUO (not Malaria)'],
          ['Brought in Dead'],
          ['Other Animal Bites'],
          ['Other Diseases']
        ]);

        var table = new google.visualization.Table(document.getElementById('table_div'));

        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
      }
    </script>
  </head>
  <body>
    <div id="table_div"></div>
  </body>
</html>
