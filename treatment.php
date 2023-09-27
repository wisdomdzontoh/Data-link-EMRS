<?php
include "dbconfig.php";

// Check if 'id' is provided in the URL
$id = isset($_GET["id"]) ? $_GET["id"] : null;

if ($id === null) {
    // Handle the case where 'id' is not provided in the URL
    echo "ID parameter is missing in the URL.";
} else {
    // Process the form data when it's submitted
    if (isset($_POST["submit"])) { // Exclude the "submit" field here
        // Get data from the form
        $fullName = $_POST["fullName"];
        $opdNumber = $_POST["opdNumber"];
        $NHISnumber = $_POST["NHISnumber"];
        $dateOfVisit = $_POST["dateOfVisit"];
        $paymentMode = $_POST["paymentMode"];
        $transaction_id = $_POST["transaction_id"];
        $treatment_types = $_POST["treatment_type"];
        $invDate = $_POST["invDate"];
        $FTotal = $_POST["FTotal"];
        $FGST = $_POST["FGST"];
        $FNet = $_POST["FNet"];

        // Retrieve existing data from the consulting_room table
        $sqlSelect = "SELECT * FROM consulting_room WHERE opdNumber = '$opdNumber'";
        $resultSelect = mysqli_query($conn, $sqlSelect);

        if ($resultSelect) {
            $existingData = mysqli_fetch_assoc($resultSelect);

            // Combine existing data with new data
            $mergedData = array_merge($existingData, $_POST);

            // Update the consulting_room table with merged data
            $sqlUpdate = "UPDATE consulting_room SET ";
            foreach ($mergedData as $key => $value) {
                $sqlUpdate .= "$key = '$value', ";
            }
            $sqlUpdate = rtrim($sqlUpdate, ', ') . " WHERE opdNumber = '$opdNumber'";

            $resultUpdate = mysqli_query($conn, $sqlUpdate);

            if ($resultUpdate) {
                // Data was successfully updated

                // Now, let's handle the dynamic table data
                $numRows = count($_POST["treatment_type"]);
                $treatmentTypes = $_POST["treatment_type"]; // This will be an array
                $qtys = $_POST["qty"];
                $rates = $_POST["rate"];
                $amts = $_POST["amt"];
                $FTotals = $_POST["FTotal"];
                $FGSTs = $_POST["FGST"];
                $FNets = $_POST["FNet"];

                for ($i = 0; $i < $numRows; $i++) {
                    $treatmentType = $treatmentTypes[$i]; // Correctly access each value in the array
                    $qty = $qtys[$i];
                    $rate = $rates[$i]; // Correctly access each value in the array
                    $amt = $amts[$i]; // Correctly access each value in the array
                    $FTotal = $FTotals[$i];
                    $FGST = $FGSTs[$i];
                    $FNet = $FNets[$i];

                    // Insert the dynamic table data into tbl_services
                    $sqlInsert = "INSERT INTO tbl_services (transaction_id, treatment_type, qty, rate, amt, FTotal, FGST, FNet)
                        VALUES ('$transaction_id', '$treatmentType', '$qty', '$rate', '$amt', '$FTotal', '$FGST', '$FNet')";
                    $resultInsert = mysqli_query($conn, $sqlInsert);

                    if (!$resultInsert) {
                        echo "Failed to insert dynamic table data: " . mysqli_error($conn);
                        exit;
                    }
                }
                ?>
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                    // Your SweetAlert code here
                    swal({
                        title: "Good job!",
                        text: "Invoice added successfully",
                        icon: "success",
                        button: "OK",
                    }).then(function () {
                        // Redirect after displaying the SweetAlert message
                        window.location.href = "accounts-office-client-search.php?msg=Data updated successfully";
                    });
                });

                </script>
                <?php
            } else {
                echo "Failed to update data: " . mysqli_error($conn);
            }
        } else {
            echo "Failed to retrieve existing data: " . mysqli_error($conn);
        }
    } else {
        // Handle the case where the form is not submitted
    }
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>client invoice</title>
    <!-- For Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!--sweetalert popup-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    
    <!-- CSS For Print Format -->
    <link rel="stylesheet" media="print" href="invoiceprint.css">
    
    <!-- CSS For Invoice -->
    <link rel="stylesheet"  href="invoice.css">
    <link rel="stylesheet" href="includes/header.css" />
    <link rel="stylesheet" href="includes/footer.css" />
  <link rel="stylesheet" href="include/style.css">
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.2.slim.js" integrity="sha256-OflJKW8Z8amEUuCaflBZJ4GOg4+JnNh9JdVfoV+6biw=" crossorigin="anonymous"></script>
    
    <!-- For Invoice  -->
    <script src="invoice.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



    <style>
    /**input css*/
    .input-group-text {
        width: 120px;
        } 
    .container {
    width: 1000px; /* Adjust the width to your desired value */
    height: auto; /* Let the height adjust automatically */
}
/**css for printing invoice*/
@media screen {
    
}


@media print 
{
    .btn
    {
        display: none;
    }
    .NoPrint
    {
        display: none;
    }
    .form-control
    {
        border: 0px;
    }
    .input-group-text
    {
        border: 0px;
        background-color: white;
    }
}
    /*invoice css
    
.btn , .NoPrint 
{
    display: none;
}

.form-control
{
    border: 0px;
}

.input-group-text
{
    border: 0px;
    background-color: white;
}

table 
{
    border : 1px solid black;
}
*/
    </style>
    <script>
    function GetPrint()
{
    /*For Print*/
    window.print();
}
    
    </script>
</head>
  <body>
    <?php include 'includes/header.php'; ?>


<?php
    $sql = "SELECT * FROM `consulting_room` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>
<br>

</br>

<br>

</br>

    <div class="container ">
       

        <div class="card">
            <div class="card-header text-center">
              <h4>PAYMENT INVOICE</h4>
            </div>
            <form action="" method="post">
            <div class="card-body">
            
                <div class="row">
                    <div class="col-8">
                        <div class="input-group mb-3">
                            <span class="input-group-text" >Full Name</span>
                            <input type="text" class="form-control" placeholder="Customer" name="fullName" id="fullName" value="<?php echo isset($row['fullName']) ? $row['fullName'] : ''; ?>" readonly>
                        </div>
            
                        <div class="input-group mb-3">
                            <span class="input-group-text" >OPD No.</span>
                            <input type="text" class="form-control" name="opdNumber" id="opdNumber" type="text" value="<?php echo isset($row['opdNumber']) ? $row['opdNumber'] : ''; ?>" readonly  >
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" >NHIS No.</span>
                            <input type="text" class="form-control" name="NHISnumber" id="NHISnumber" type="text" value="<?php echo isset($row['NHISnumber']) ? $row['NHISnumber'] : ''; ?>" readonly  >
                        </div>
            
                        <div class="input-group mb-3">
                            <span class="input-group-text" >Visit Date</span>
                            <input type="text" class="form-control" name="dateOfVisit" id="dateOfVisit" value="<?php echo isset($row['dateOfVisit']) ? $row['dateOfVisit'] : ''; ?>" >
                        </div>
                    </div>
                    <div class="col-4">
                      
                        <div class="input-group mb-3">
                            <span class="input-group-text" >Payment mode</span>
                            <select name="paymentMode" class="form-control" id="paymentMode">
                            <option value="Cash">Cash</option>
                            <option value="Mobile banking">Mobile banking</option>
                        </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" >Inv. No</span>
                            <input type="text" class="form-control" placeholder="Inv. No" name="transaction_id" id="transaction_id" readonly  >
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" >Generate</span>
                            <input type="button" class="btn btn-sm btn-success" value="click to generate inv. No" onclick="generateTransactionID()">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" >Inv. Date</span>
                            <input type="date" class="form-control" name="invDate" id="invDate"  >
                        </div>



                    </div>
                </div>


                <table class="table table-bordered">
                    <thead class="table-success">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Service</th>
                        <th scope="col" class="text-end">Qty</th>
                        <th scope="col" class="text-end">Rate</th>
                        <th scope="col" class="text-end">Amount Payed</th>
                        <th scope="col" class="NoPrint">                         
                            <button type="button" class="btn btn-sm btn-success" onclick="BtnAdd()">+</button>
                          
                        </th>

                      </tr>
                    </thead>
                    <tbody id="TBody">
                      <tr id="TRow" class="d-none">
                        <th scope="row">1</th>
                        
                        <td><select name="treatment_type[]" id="treatment_type" class="form-control">
                            <option disabled selected>Select type of service</option>
                            <option value="Consultation">Consultation</option>
                            <option value="ANC">Antenatal Care</option>
                            <option value="Radiology">Radiology</option>
                            <option value="Wound Dressing">Wound Dressing</option>
                            <option value="Eye">Eye</option>
                            <option value="Dental">Dental</option>
                            <option value="ENT">Ear, Nose and Throat</option>
                            <option value="OBS&GYN">Obstetrics & Gynecology</option>
                            <option value="pediatrics">Pediatrics</option>
                            <option value="physiotherapy">Physiotherapy</option>
                            <option value="investigation">Investigation</option>
                            <option value="psychaitry">Psychaitry</option>
                            <option value="psychology">Psychology</option>
                            <option value="anesthesia">Anesthesia</option>
                        </select></td>
                        <td><input type="number" step="0.001" class="form-control text-end" name="qty[]" onchange="Calc(this);"></td>
                        <td><input type="number" step="0.001" class="form-control text-end" name="rate[]"  onchange="Calc(this);"></td>
                        <td><input type="number" step="0.001" class="form-control text-end" name="amt[]" readonly ></td>
                        <td class="NoPrint"><button type="button" class="btn btn-sm btn-danger" onclick="BtnDel(this)">X</button></td>
                        
                      </tr>
                    </tbody>
                  </table>


                  <div class="row">
                    <div class="col-8">
                      
                        <button type="button" class="btn btn-primary" onclick="GetPrint()">Print</button>
                        <button type="submit" class="btn btn-primary" name="submit">Update</button>

                    </div>
                    <div class="col-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" >Total</span>
                            <input type="number" step=""0.01 class="form-control text-end" id="FTotal" name="FTotal[]" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" >GST</span>
                            <input type="number" class="form-control text-end" id="FGST" name="FGST[]" onchange="GetTotal()" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" >Net Amt</span>
                            <input type="number" class="form-control text-end" id="FNet" name="FNet[]" readonly>
                        </div>


                    </div>
                </div>
             </div>
          </div>

    </div>
</form>



<br>
</br>
<br>
</br>
<br>
</br>
<?php include 'includes/footer.php'; ?>
  <script src="includes/script.js"></script>
    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script>


function BtnAdd()
{
    /*Add Button*/
    var v = $("#TRow").clone().appendTo("#TBody") ;
    $(v).find("input").val('');
    $(v).removeClass("d-none");
    $(v).find("th").first().html($('#TBody tr').length - 1);
}

function BtnDel(v)
{
    /*Delete Button*/
       $(v).parent().parent().remove(); 
       GetTotal();

        $("#TBody").find("tr").each(
        function(index)
        {
           $(this).find("th").first().html(index);
        }

       );
}

function Calc(v) {
    /*Detail Calculation Each Row*/
    var index = $(v).parent().parent().index();
    var qty = parseFloat(document.getElementsByName("qty[]")[index].value);
    var rate = parseFloat(document.getElementsByName("rate[]")[index].value);
    var amt = qty * rate;
    document.getElementsByName("amt[]")[index].value = amt.toFixed(2); // Display with 2 decimal places
    GetTotal();
}

function GetTotal()
{
    /*Footer Calculation*/   

    var sum=0;
    var amts =  document.getElementsByName("amt[]");

    for (let index = 0; index < amts.length; index++)
    {
        var amt = amts[index].value;
        sum = +(sum) +  +(amt) ; 
    }

    document.getElementById("FTotal").value = sum;

    var gst =  document.getElementById("FGST").value;
    var net = +(sum) + +(gst);
    document.getElementById("FNet").value = net;

}

/*function to generate inv. no*/
 function generateTransactionID() {
            // Generate an 8-digit random number
            const transactionID = 'TR_ID-' + Math.floor(10000000 + Math.random() * 90000000);
            
            // Update the transaction ID input field
            document.getElementById("transaction_id").value = transactionID;
        }
    </script>
    
  </body>
</html>