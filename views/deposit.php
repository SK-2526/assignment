<?php require_once 'auth.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Deposit Money</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h3>Deposit Money</h3>

    <form method="POST" action="../public/index.php">
        <input type="hidden" name="action" value="deposit">

        <div class="form-group">
            <label>Account ID</label>
            <input type="number" name="account_id" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Amount</label>
            <input type="number" name="amount" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Deposit</button>
        <a href="customerlist.php" 
        class="btn btn-secondary">Back</a>

    </form>
</div>

</body>
</html>