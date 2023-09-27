<!DOCTYPE html>
<html>
<head>
    <title>Invoice Payment System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
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
                                    <th>Service</th>
                                    <th>Cost Due</th>
                                    <th>Action</th>
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
        <div class="row mt-4">
            <div class="col-md-6">
                <input type="text" id="search-input" class="form-control" placeholder="Search invoices...">
            </div>
            <div class="col-md-2">
                <button id="search-button" class="btn btn-primary btn-block">Search</button>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Function to populate the table with data (Replace with actual data retrieval logic)
        function populateTableWithData() {
            // Replace this with your data retrieval logic using PHP and MySQL
            <?php
            // Placeholder data (Replace with actual data retrieval)
            $invoices = [
                [
                    'id' => 1,
                    'fullName' => 'John Doe',
                    'opdNumber' => 'OPD001',
                    'nhisNumber' => 'NHIS123',
                    'dateOfVisit' => '2023-09-18',
                    'service' => 'Consultation',
                    'costDue' => 100.00
                ],
                // Add more invoice data here
            ];

            // Loop through the invoices and generate JavaScript code to populate the table
            echo 'var data = ' . json_encode($invoices) . ';';
            ?>
            
            // Clear previous results
            $('#search-results').empty();
            
            // Loop through the data and append rows to the table
            data.forEach(function(invoice) {
                var row = '<tr>' +
                    '<td>' + invoice.id + '</td>' +
                    '<td>' + invoice.fullName + '</td>' +
                    '<td>' + invoice.opdNumber + '</td>' +
                    '<td>' + invoice.nhisNumber + '</td>' +
                    '<td>' + invoice.dateOfVisit + '</td>' +
                    '<td>' + invoice.service + '</td>' +
                    '<td>' + invoice.costDue + '</td>' +
                    '<td><button class="btn btn-primary" onclick="payInvoice(' + invoice.id + ')">Pay</button></td>' +
                    '</tr>';
                $('#search-results').append(row);
            });
        }

        // Function to handle search
        $('#search-button').click(function() {
            var query = $('#search-input').val().toLowerCase();
            if (!query) {
                // If the search query is empty, re-populate the table with all data
                populateTableWithData();
                return;
            }

            // Filter data based on the query and update the table
            var filteredData = data.filter(function(invoice) {
                return (
                    invoice.fullName.toLowerCase().includes(query) ||
                    invoice.opdNumber.toLowerCase().includes(query) ||
                    invoice.nhisNumber.toLowerCase().includes(query) ||
                    invoice.service.toLowerCase().includes(query)
                );
            });

            // Clear previous results
            $('#search-results').empty();

            // Populate the table with filtered data
            filteredData.forEach(function(invoice) {
                var row = '<tr>' +
                    '<td>' + invoice.id + '</td>' +
                    '<td>' + invoice.fullName + '</td>' +
                    '<td>' + invoice.opdNumber + '</td>' +
                    '<td>' + invoice.nhisNumber + '</td>' +
                    '<td>' + invoice.dateOfVisit + '</td>' +
                    '<td>' + invoice.service + '</td>' +
                    '<td>' + invoice.costDue + '</td>' +
                    '<td><button class="btn btn-primary" onclick="payInvoice(' + invoice.id + ')">Pay</button></td>' +
                    '</tr>';
                $('#search-results').append(row);
            });
        });

        // Function to handle invoice payment (Replace with actual payment processing logic)
        function payInvoice(invoiceId) {
            // Replace this with your payment processing logic using PHP
            alert('Payment for Invoice ID ' + invoiceId + ' processed.');
        }

        // Call the function to initially populate the table
        populateTableWithData();
    </script>
</body>
</html>
