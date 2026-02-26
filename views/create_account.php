<?php require_once 'auth.php'; ?>

<!DOCTYPE html>
<html>
<head>
<title>Create Bank Account</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>

<body>

<div class="container mt-5">
    <div class="card shadow p-4">
        <h4>Create Bank Account</h4>
        <hr>

        <form method="POST" action="../public/index.php">

            <input type="hidden" name="action" value="create_account">

            <div class="form-group">
                <label>Account No</label>
                <input type="text" name="account_no" 
                       class="form-control" required>
            </div>

            <div class="form-group">
                <label>Account Type</label>
                <select name="account_type" class="form-control" required>
                    <option value="">Select Type</option>
                    <option value="Savings">Savings</option>
                    <option value="Current">Current</option>
                </select>
            </div>

            <div class="form-group">
                <label>Bank Name</label>
                <input type="text" name="bank_name" 
                       class="form-control" required>
            </div>

            <div class="form-group">
                <label>Country</label>
                <input type="text" name="country" 
                       class="form-control" required>
            </div>

            <input type="submit" class="btn btn-success" value= 'Create Account'>

            <a href="customerlist.php" 
               class="btn btn-secondary">Back</a>

        </form>
    </div>
</div>

</body>
</html>