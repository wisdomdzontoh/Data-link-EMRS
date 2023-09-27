  <?php
// Include the loader.php file at the top of your PHP page
require_once('loader.php');

// Rest of your PHP code for the page
// ...
?>
<?php include('dbconfig.php') ?>



<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="tables.css">
    <link rel="icon" type="image/x-icon" href="data-link-emrs-logo.png">
     <!-- ===== Boxicons CSS ===== -->
     <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
     <!--CSS SIDE NAV BAR-->
     <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
     <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Include SweetAlert library -->

    <link rel="stylesheet" href="path/to/sweetalert2.min.css">

    <title>Search patients</title>
</head>
<style>

</style>
<body>
 
  
<!--NAVBAR-->

    <nav>
        <div class="nav-bar">
            <i class='bx bx-menu sidebarOpen' ></i>
            <span class="logo navLogo"><a href="#">OUTPATIENT DEPARTMENT</a></span>
            <div class="menu">
                <div class="logo-toggle">
                    <span class="logo"><a href="#">OPD </a></span>
                    <i class='bx bx-x siderbarClose'></i>
                </div>
                <ul class="nav-links">
                    <li><a href="registrationpatient.php">OPD</a></li>
                    <li><a href="consultingroom.php">consulting</a></li>
                    <li><a href="labresults.php">lab</a></li>
                    <li><a href="pharmacy.php">Pharmacy</a></li>
                    <li><a href="generalward.php">General ward</a></li>
                </ul>
            </div>
            <div class="darkLight-searchBox">
                <div class="dark-light">
                    <i class='bx bx-moon moon'></i>
                    <i class='bx bx-sun sun'></i>
                </div>
                <div class="searchBox">
                   <div class="searchToggle">
                    <i class='bx bx-x cancel'></i>
                    <i class='bx bx-search search'></i>
                   </div>
                    <div class="search-field">
                        <input type="text" id="search" placeholder="Search...">
                        <i class='bx bx-search'></i>
                    </div>
                </div>



            </div>
        </div>
    </nav>
<!---->

<br>

</br>
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-body">
                    <table id="customers" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full name</th>
                            <th>Opd Number</th>
                            <th>NHIS number</th>
                            <th>Date of visit</th>
                            <th>Age</th>
                            <th>Phone number</th>
                            <th>Address</th>
                            <th>Gender</th>
                            <th>Status of client</th>
                            <!--<th>Type of test</th>
                            <th>Age group</th>
                            <th>Diate of Birth</th>
                            <!--<th>Test results</th>
                            <th>Principal Diagnosis</th>
                            <th>Status of Principal diagnosis</th>
                            <th>1st Additional Diagnosis</th>
                            <th>Status of 1st Additional diagnosis</th>
                            <th>2nd Additional Diagnosis</th>
                            <th>Status of 2nd Additional diagnosis</th>
                            <th>3rd Additional Diagnosis</th>
                            <th>Status of 3rd Additional diagnosis</th>
                            <th>NHIS status</th>
                            <th>Medicines prescribed</th>
                            <th>Medicines dispensed</th>
                            <th>Food Notes</th>
                            <!-- Add other table headers here -->
                            <th scope="col">Action</th>
                           
                        </tr>
                        </thead>
                        <tbody id="search-results">
                        <!-- Display search results here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!--<form action="generate_report.php" method="POST">
  <label for="start_date">Start Date:</label>
  <input type="date" id="start_date" name="start_date" required>

  <label for="end_date">End Date:</label>
  <input type="date" id="end_date" name="end_date" required>

  <button type="submit">Generate Report</button>
</form>-->

<!-- HTML form for selecting the start and end date -->
<form method="post" action="consultingroomreportdownload.php">
    <label for="start_date">Start Date:</label>
    <input type="date" name="start_date" required>
    <label for="end_date">End Date:</label>
    <input type="date" name="end_date" required>
    <input type="submit" name="submit" value="Download CSV">
</form>
 

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function () {
        // Trigger search on keyup event
        $('#search').keyup(function () {
            var filtervalues = $(this).val();

            // Send AJAX request to search.php
            $.ajax({
                url: 'OPDsearch.php',
                method: 'POST',
                data: {search: filtervalues},
                success: function (response) {
                    $('#search-results').html(response);
                }
            });
        });
    });
    /*NAVBAR JS CODE*/

const body = document.querySelector("body"),
      nav = document.querySelector("nav"),
      modeToggle = document.querySelector(".dark-light"),
      searchToggle = document.querySelector(".searchToggle"),
      sidebarOpen = document.querySelector(".sidebarOpen"),
      siderbarClose = document.querySelector(".siderbarClose");
      let getMode = localStorage.getItem("mode");
          if(getMode && getMode === "dark-mode"){
            body.classList.add("dark");
          }
// js code to toggle dark and light mode
      modeToggle.addEventListener("click" , () =>{
        modeToggle.classList.toggle("active");
        body.classList.toggle("dark");
        // js code to keep user selected mode even page refresh or file reopen
        if(!body.classList.contains("dark")){
            localStorage.setItem("mode" , "light-mode");
        }else{
            localStorage.setItem("mode" , "dark-mode");
        }
      });
// js code to toggle search box
        searchToggle.addEventListener("click" , () =>{
        searchToggle.classList.toggle("active");
      });
 
      
//   js code to toggle sidebar
sidebarOpen.addEventListener("click" , () =>{
    nav.classList.add("active");
});
body.addEventListener("click" , e =>{
    let clickedElm = e.target;
    if(!clickedElm.classList.contains("sidebarOpen") && !clickedElm.classList.contains("menu")){
        nav.classList.remove("active");
    }
});


// Add a click event listener to all elements with the "delete-button" class
const deleteButtons = document.querySelectorAll('.delete-button');

deleteButtons.forEach((button) => {
  button.addEventListener('click', (e) => {
    e.preventDefault(); // Prevent the default link behavior

    const id = button.getAttribute('data-id'); // Get the data-id attribute value

    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        // Send an AJAX request to delete the record
        fetch(`OPDsearch.php?id=${id}`, {
          method: 'GET'
        })
        .then((response) => response.json())
        .then((data) => {
          if (data.success) {
            Swal.fire(
              'Deleted!',
              'Your record has been deleted.',
              'success'
            ).then(() => {
              // Redirect to opdsearchclient.php after successful deletion
              window.location.href = 'outpatientsearchclient.php';
            });
          } else {
            Swal.fire(
              'Error!',
              'An error occurred while deleting the record.',
              'error'
            );
          }
        })
        .catch((error) => {
          console.error('Error:', error);
        });
      }
    });
  });
});




</script>
 <script src="path/to/sweetalert2.all.min.js"></script>
<!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>