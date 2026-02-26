<?php 
require_once "../controllers/UserControllers.php";

$usrController = new UserControllers();

if(isset($_GET['action'])){
    if($_GET['action'] == 'list'){
        $usrController->list();
        exit(); }
}

// export pdf
if(isset($_GET['action']) && $_GET['action'] == 'export'){
    $usrController->exportPdf();
}

if(isset($_POST['action'])){

    if($_POST['action'] == 'signup'){
        $usrController->signup();
    }

    if($_POST['action'] == 'login'){
        $usrController->login();
    }
    
    
   if(isset($_POST['submit']) && $_POST['submit'] == 'logout'){
    session_unset();
    session_destroy();
    header('Location: ../views/login.php');
    exit();
    }

}
// bank account
if(isset($_POST['action']) && $_POST['action']== 'create_account'){
  $usrController->createAccount();
   }

// view account details
if(isset($_GET['action']) && $_GET['action'] == 'view_account'){
  $usrController->viewAccount();
}

//deposit
if(isset($_POST['action']) && $_POST['action'] == 'deposit'){
    $usrController->deposit();
}
//transaction
if(isset($_GET['action']) && $_GET['action'] == 'transactions'){
    $usrController->transactionHistory();
}

if(!isset($_POST['action'])){
    require_once "../views/signup.php";
}

?>