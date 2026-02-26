<?php require_once 'auth.php'; ?>

<!DOCTYPE html>
<html>
<head>
<title>Account Details</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

<div class="container mt-5">
    <div class="card shadow p-4">

        <h4>My Account Details</h4>
        <hr>

        <button id="loadAccount" class="btn btn-primary mb-3">
            Load Account
        </button>

        <table class="table table-bordered" 
               id="accountTable" style="display:none;">
            <thead class="thead-dark">
                <tr>
                    <th>Account Number</th>
                    <th>Account Type</th>
                    <th>Bank Name</th>
                    <th>Country</th>
                </tr>
            </thead>
            <tbody id="accountBody"></tbody>
        </table>

        <a href="customerlist.php" 
           class="btn btn-secondary">Back</a>

    </div>
</div>

<script>
$('#loadAccount').click(function(){

    $.ajax({
        url: '../public/index.php?action=view_account',
        method: 'GET',
        dataType: 'json',
        success: function(data){

            let rows = "";

            if(data.length > 0){
                data.forEach(function(acc){
                    rows += `
                        <tr>
                            <td>${acc.account_number}</td>
                            <td>${acc.account_type}</td>
                            <td>${acc.bank_name}</td>
                            <td>${acc.country}</td>
                        </tr>
                    `;
                });
            } else {
                rows = `
                <tr>
                    <td colspan="4" class="text-center">
                        No Account Found
                    </td>
                </tr>`;
            }

            $('#accountBody').html(rows);
            $('#accountTable').show();
        }
    });

});
</script>

</body>
</html>