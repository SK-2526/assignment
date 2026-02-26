<?php 
session_start();

if(!isset($_SESSION['customer_id'])){
    header("Location: login.php");
    exit();
}

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="container mt-3">

<h2>Welcome User</h2> 
<!-- Logout -->
<form method="POST" action="../public/index.php">
    <input type="hidden" name="submit" value="logout">
    <button type="submit" class="btn btn-danger float-right ">Logout</button>
</form>

<!-- bank account --> 
<div class="mb-3">
    <a href="create_account.php" class="btn btn-primary">
        Create Bank Account
    </a>

    <a href="view_account.php" class="btn btn-info">
        View Account Details
    </a>

    <a href="deposit.php" class="btn btn-warning">Deposit Money</a>
    <a href="transaction_history.php" class="btn btn-dark">Transaction History</a>

</div>

<button id="viewCustomers" class="btn btn-success mb-3">VIEW DASHBOARD </button>

<div id="customerTable" class="table-responsive" style="display:none;">
  
<a href="../public/index.php?action=export" class="btn btn-primary float-right mb-2">
    Export PDF </a>

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile No</th>
                    <th>Pan No </th>
                    <th>Deposit Amount </th>
                </tr>
            </thead>
            <tbody id="tableBody">
                
            </tbody>
        </table>
    </div>
</div>
<!-- ajax -->
<script>
$(document).ready(function(){
   $('#viewCustomers').click(function(e){

     $.ajax({
        url: '../public/index.php?action=list&ajax=1',
        method: 'GET',
        dataType: 'json',
        
        success: function(data){
            let rows="";
            if(data.length>0){
                data.forEach(function(customer){
                    rows += `
                       <tr>
                       <td>${customer.name}</td>
                       <td>${customer.email}</td>
                       <td>${customer.mobile_no}</td>
                       <td>${customer.pan_no}</td>
                       <td>${customer.deposite}</td>
                       </tr>
                    `
                })
            }else {
                    rows = `<tr><td colspan="4" class="text-center">No customers found</td></tr>`;
        }
        $('#tableBody').html(rows)
        $('#customerTable').show();
    },
     error: function(){
            alert("Failed to fetch data.");
        }
     })
   }) 
});
</script>

</body>
</html>