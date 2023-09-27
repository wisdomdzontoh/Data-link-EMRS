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

    <!-- ===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <!--CSS SIDE NAV BAR-->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <title>Search patients</title>
</head>
<style>
  
</style>
<body>
    <table style="width:100%">
<!--NAVBAR-->
    <nav>
        <div class="nav-bar">
            <i class='bx bx-menu sidebarOpen' ></i>
            <span class="logo navLogo"><a href="#">OUTPATIENT</a></span>
            <div class="menu">
                <div class="logo-toggle">
                    <span class="logo"><a href="#">OUTPATIENT</a></span>
                    <i class='bx bx-x siderbarClose'></i>
                </div>
                <ul class="nav-links">
                    <li><a href="#">Search</a></li>
                    <li><a href="#">consulting</a></li>
                    <li><a href="#">lab</a></li>
                    <li><a href="#">Pharmacy</a></li>
                    <li><a href="#">ANC</a></li>
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


        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-body">
                    <table id="customers" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full name</th>
                            <th>Date of birth</th>
                            <th>Email</th>
                            <th>Phone number</th>
                            <th>Gender</th>
                            <th>Occupation</th>
                            <th>Opd Number</th>
                            <th>Age</th>
                            <th>Age group</th>
                            <th>Client status</th>
                            <th>NHIS number</th>
                            <th>Date of visit</th>
                            <th>Address</th>
                            <th>Nationality</th>
                            <th>House number</th>
                            <th>Client type</th>
                            <th>Name of guardian</th>
                            <th>Guardian's Mobile</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        
                        <tbody id="search-results">
                        <?php
                        // Loop through the retrieved data and display each record
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['fullName']; ?></td>
                                <td><?php echo $row['DOB']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['phoneNumber']; ?></td>
                                <td><?php echo $row['gender']; ?></td>
                                <td><?php echo $row['Occupation']; ?></td>
                                <td><?php echo $row['opdNumber']; ?></td>
                                <td><?php echo $row['age']; ?></td>
                                <td><?php echo $row['ageGroup']; ?></td>
                                <td><?php echo $row['clientStatus']; ?></td>
                                <td><?php echo $row['NHISnumber']; ?></td>
                                <td><?php echo $row['dateOfVisit']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td><?php echo $row['nationality']; ?></td>
                                <td><?php echo $row['houseNumber']; ?></td>
                                <td><?php echo $row['clientType']; ?></td>
                                <td><?php echo $row['nameOfGuardian']; ?></td>
                                <td><?php echo $row['phoneOfGuardian']; ?></td>
                                <td><button class="btn btn-primary" onclick="editRecord(<?php echo $row['id']; ?>)">Edit</button></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add the modal markup at the end of the HTML body -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Record</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Add a form for editing the record -->
                <form id="editForm" action="update.php" method="POST">
                    <input type="hidden" id="recordId" name="recordId">
                    <!-- Add input fields for each field in the table -->
                    <div class="form-group">
                        <label for="fullName">Full Name</label>
                        <input type="text" class="form-control" id="fullName" name="fullName" required>
                    </div>
                    <div class="form-group">
                        <label for="dob">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" required>
                    </div>
                    <!-- Add input fields for other fields in the table -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<body>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="script.js"></script>
    <script>
    const toggleButton = document.getElementsByClassName('toggle-button')[0]
const navbarLinks = document.getElementsByClassName('navbar-links')[0]

toggleButton.addEventListener('click', () => {
  navbarLinks.classList.toggle('active')
})

$(document).ready(function () {
  // Event handler for the edit button click event
  $('#customers').on('click', '.edit-button', function () {
    // Get the table row
    var row = $(this).closest('tr');

    // Find the table cells within the row
    var cells = row.find('td');

    // Enable editing for each cell, except the action cell
    cells.each(function () {
      if (!$(this).hasClass('action-cell')) {
        var content = $(this).html();
        $(this).html('<input type="text" value="' + content + '">');
      }
    });

    // Change the button text to "Save"
    $(this).text('Save');
    $(this).removeClass('edit-button').addClass('save-button');
  });

  // Event handler for the save button click event
  $('#customers').on('click', '.save-button', function () {
    // Get the table row
    var row = $(this).closest('tr');

    // Find the table cells within the row
    var cells = row.find('td');

    // Prepare the data to be sent to the server
    var data = {};
    cells.each(function (index) {
      if (!$(this).hasClass('action-cell')) {
        var value = $(this).find('input').val();
        var fieldName = $('#customers thead th').eq(index).text();
        data[fieldName] = value;
        $(this).html(value);
      }
    });

    // Send the updated data to the server
    $.ajax({
      url: 'update.php', // Replace with the URL to your server-side update script
      method: 'POST',
      data: data,
      success: function (response) {
        console.log('Record updated successfully');
        // Add any additional logic here after the record is updated
      },
      error: function () {
        console.log('Error occurred while updating the record');
        // Handle the error case here
      }
    });

    // Change the button text back to "Edit"
    $(this).text('Edit');
    $(this).removeClass('save-button').addClass('edit-button');
  });
});

/*search button */
$(document).ready(function () {
        // Trigger search on keyup event
        $('#search').keyup(function () {
            var filtervalues = $(this).val();

            // Send AJAX request to search.php
            $.ajax({
                url: 'search.php',
                method: 'POST',
                data: {search: filtervalues},
                success: function (response) {
                    $('#search-results').html(response);
                }
            });
        });
    });

    function editRecord(recordId) {
        // Implement the logic to edit a record with the specified ID
        // You can redirect to a new PHP page where the user can edit the record or use a modal popup for editing.
        // Pass the record ID to the new page or modal for identifying which record to edit.
        // You can retrieve the record details from the database based on the record ID and pre-fill the form fields for editing.
        // Once the user makes the necessary changes and submits the form, update the record in the database using the PHP code for updating the data in the database.
    }

    /*NAVBAR JS CODE*/
    const body = document.querySelector("body"),
      nav = document.querySelector("nav"),
      modeToggle = document.querySelector(".dark-light"),
      searchToggle = document.querySelector(".searchToggle"),
      sidebarOpen = document.querySelector(".sidebarOpen"),
      siderbarClose = document.querySelector(".siderbarClose");
    let getMode = localStorage.getItem("mode");
    if (getMode && getMode === "dark-mode") {
        body.classList.add("dark");
    }
    // js code to toggle dark and light mode
    modeToggle.addEventListener("click", () => {
        modeToggle.classList.toggle("active");
        body.classList.toggle("dark");
        // js code to keep user selected mode even page refresh or file reopen
        if (!body.classList.contains("dark")) {
            localStorage.setItem("mode", "light-mode");
        } else {
            localStorage.setItem("mode", "dark-mode");
        }
    });
    // js code to toggle search box
    searchToggle.addEventListener("click", () => {
        searchToggle.classList.toggle("active");
    });

    //   js code to toggle sidebar
    sidebarOpen.addEventListener("click", () => {
        nav.classList.add("active");
    });
    body.addEventListener("click", e => {
        let clickedElm = e.target;
        if (!clickedElm.classList.contains("sidebarOpen") && !clickedElm.classList.contains("menu")) {
            nav.classList.remove("active");
        }
    });

    /*EDIT MODAL SCRIPT*/
   
    function editRecord(recordId) {
        // Set the recordId value in the editForm
        document.getElementById("recordId").value = recordId;
        
        // Retrieve the record details from the database using AJAX
        $.ajax({
            url: 'get_record.php',
            method: 'POST',
            data: { recordId: recordId },
            success: function(response) {
                // Parse the JSON response
                var record = JSON.parse(response);
                
                // Set the values of the input fields in the editForm
                document.getElementById("fullName").value = record.fullName;
                document.getElementById("dob").value = record.dob;
                // Set the values of other input fields in the editForm
                
                // Show the modal popup
                $('#editModal').modal('show');
            }
        });
    }

    </script>

<html>
