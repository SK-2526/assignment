
<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">    
 <title >Sign Up </title>
</head>
<body>
<h3 class='d-flex justify-content-center mt-3 ml- -4' >Registeration Form </h3>

<div class="mt-5 container d-flex justify-content-center align-items-center">

        <form method="POST" action="../public/index.php">

            <input type="hidden" name="action" value="signup">

            <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
            </div>

            <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Enter Email">
            </div>

            <div class="form-group">
            <input type="tel" name="mobile" class="form-control" placeholder="Enter Mobile No " required>
            </div>

            <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
            </div>

            <input type="submit" class="btn btn-primary btn-block mt-2" value="Sign Up">
        
            <p class="mt-2">Already have an account ? <a href="login.php">Login Here</a></p>
        </form>

        </div>

</body>
</html>
