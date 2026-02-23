<?php 
session_start();

if(!isset($_SESSION['name'])){
    header("Location: login.php");
    exit();
}

// stop browser back after logout
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
</head>
<body>

<h2>Customer List</h2> 
<!-- Logout -->
<form method="POST" action="../public/index.php">
    <input type="hidden" name="submit" value="logout">
    <button type="submit" class="btn btn-danger">Logout</button>
</form>

</body>
</html>


<?php 


?>