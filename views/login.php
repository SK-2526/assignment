<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>

<body>

<h3 class='d-flex justify-content-center mt-3' >Login</h3>
<div class="mt-0 container d-flex justify-content-center align-items-center" style="height: 50vh;">
  
<form method="POST" action="../public/index.php" >
      <input type="hidden" name="action" value="login">
      <div class="form-group">
          <input type="text" name="name" class="form-control" placeholder='Enter Name' required>
      </div>
      <div class="form-group">
          <input type="password" name="password" class="form-control" placeholder='Enter password' required>
      </div>


       <div class="form-check">
            <input class="form-check-input" name='chk1' type="checkbox" id="chk1">
            <label class="form-check-label" for="defaultCheck1">
                User login
            </label>
       </div>

             <div class="form-check">
            <input class="form-check-input" type="checkbox" name='chk2' id="chk2" >
            <label class="form-check-label" for="defaultCheck2">
                Admin login
            </label>
             </div> 
          
      <input type="submit" class="btn btn-primary btn-block mt-2" value="Login">
      <p class="mt-2">Don't have an account? <a href="signup.php">Sign up</a></p>
  </form>
</div>


</body>
</html>