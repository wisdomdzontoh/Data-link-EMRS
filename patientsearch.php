<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>search</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Search for clients</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="search.php" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full name</th>
                                    <th>Date of birth</th>
                                    <th>Email</th>
                                    <th>Phone number</th>
                                    <th>Gender</th>
                                    <th>Client type</th>
                                    <!--<th>Occupation</th>
                                    <th>Opd Number</th>
                                    <th>Age</th>
                                    <th>Age group</th>
                                    <th>Client status</th>
                                    <th>NHIS number</th>
                                    <th>Date of visit</th>
                                    <th>Address</th>
                                    <th>Nationality</th>
                                    <th>House number</th>
                                    <th>Name of guardian</th>
                                    <th>Phone number of guardian</th>-->
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                // Connect to the database
                                    $host = "sql109.epizy.com";
                                    $username = "epiz_33722902";
                                    $password = "DgRYDMrBI3RPg";
                                    $dbname = "epiz_33722902_hims";

                                    $conn = mysqli_connect($host, $username, $password, $dbname);

                                    if (!$conn) {
                                        die("Connection failed: " . mysqli_connect_error());
                                    } 
                                    

                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM users WHERE CONCAT(fullName, DOB, email, phoneNumber, gender, Occupation, opdNumber, age, ageGroup, clientStatus, NHISnumber, dateOfVisit, address, nationality, houseNumber, clientType, nameOfGuardian, phoneOfGuardian) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($conn, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $items['id']; ?></td>
                                                    <td><?= $items['fullName']; ?></td>
                                                    <td><?= $items['DOB']; ?></td>
                                                    <td><?= $items['email']; ?></td>
                                                    <td><?= $items['phoneNumber']; ?></td>
                                                    <td><?= $items['gender']; ?></td>
                                                    <td><?= $items['clientType']; ?></td>
                                                    <!--<td><?= $items['Occupation']; ?></td>
                                                    <td><?= $items['opdNumber']; ?></td>
                                                    <td><?= $items['ageGroup']; ?></td>
                                                    <td><?= $items['clientStatus']; ?></td>
                                                    <td><?= $items['NHISnumber']; ?></td>
                                                    <td><?= $items['dateOfVisit']; ?></td>
                                                    <td><?= $items['address']; ?></td>
                                                    <td><?= $items['nationality']; ?></td>
                                                    <td><?= $items['houseNumber']; ?></td>
                                                    <td><?= $items['nameOfGuardian']; ?></td>
                                                    <td><?= $items['phoneOfGuardian']; ?></td>-->
                                                    

                                                </tr>
                                                <td>
              <a href="consulting-room-profile.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
              <!--<a href="#" class="link-dark delete-button" data-id="<?php echo $row["id"] ?>"><i class="fa-solid fa-trash fs-5"></i></a>-->

            </td> 
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="7">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>