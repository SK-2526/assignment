<?php require_once 'auth.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Transaction History</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="container mt-5">
    <h3>Transaction History</h3>

    <input type="number" id="account_id" class="form-control mb-2" placeholder="Enter Account ID">
    
    <button id="loadTransactions" class="btn btn-primary">Load</button>

    <a href="customerlist.php" 
    class="btn btn-secondary">Back</a>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Type</th>
                <th>Amount</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody id="transactionTable"></tbody>
    </table>
</div>

<script>
$('#loadTransactions').click(function(){

    let $account_id = $('#account_id').val();

    $.ajax({
        url: '../public/index.php?action=transactions&account_id=' + $account_id,
        method: 'GET',
        dataType: 'json',

        success: function(data){
            let rows = "";
            data.forEach(function(tx){
                rows += `
                <tr>
                    <td>${tx.type}</td>
                    <td>${tx.amount}</td>
                    <td>${tx.created_at}</td>
                </tr>
                `;
            });
            $('#transactionTable').html(rows);
        }
    });

});
</script>

</body>
</html>