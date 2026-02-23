<?php 
session_start();
require_once '../config/Database.php';
require_once '../models/User.php';

class UserControllers {

private $conn;

public function __construct(){
  $db= new Database();
  $this->conn= $db->conn;
  $this->user= new User($this->conn);
   
}

public function signup(){

$name= $_POST['name'];
$email= $_POST['email'];
$mobile_no= $_POST['mobile'];
$password= password_hash($_POST['password'], PASSWORD_DEFAULT);

$this->user->add($name,$email,$mobile_no,$password);

// $_SESSION['name']= $name;

header("Location: ../views/customerlist.php");
exit();
}

public function login(){

    $name = $_POST['name'];
    $password = $_POST['password'];

    $user = $this->user->login($name);

    if($user){

        if(password_verify($password, $user['password'])){

            $_SESSION['name'] = $user['name'];
            $_SESSION['role'] = $user['role'];

            if($user['role'] == 'admin'){
                header("Location: ../views/admin.php");
            } else {
                header("Location: ../views/customerlist.php");
            }
            exit();

        } else {
            echo "Wrong Password!";
        }

    } else {
        echo "User Not Found!";
    }
}

}



?>