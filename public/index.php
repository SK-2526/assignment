
<?php 

require_once "../controllers/UserControllers.php";

$usrController = new UserControllers();

if(isset($_POST['action'])){

    if($_POST['action'] == 'signup'){
        $usrController->signup();
    }

    if($_POST['action'] == 'login'){
        $usrController->login();
    }
    
    if(isset($_POST['submit']) && $_POST['submit'] == 'logout'){
    session_start();
    session_destroy();
    header('Location: ../views/login.php');
    exit();
    }

}

?>