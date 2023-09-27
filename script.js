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
    // Open the edit modal popup
    $('#editModal').modal('show');

    // Send an AJAX request to fetch the record details
    $.ajax({
        url: 'get_record.php',
        method: 'POST',
        data: {recordId: recordId},
        dataType: 'json',
        success: function(response) {
            // Populate the form fields with the fetched record details
            $('#fullName').val(response.fullName);
            $('#dob').val(response.DOB);
            $('#email').val(response.email);
            // Set the values for other form fields as well

            // Set the record ID as a hidden field value
            $('#recordId').val(recordId);
        }
    });
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
