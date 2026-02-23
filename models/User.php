<?php 
require_once '../config/Database.php';

class User{

private $conn;

public function __construct($db){    
   $this->conn= $db;
}

// add 
public function add($name,$email,$mobile_no, $password){

$sql= "INSERT INTO users (`name`,`email`,`mobile_no`,`password`) VALUES (?,?,?,?)";
$stmt= $this->conn->prepare($sql);   
$stmt->bind_param("ssis" ,$name,$email,$mobile_no, $password);
return $stmt->execute();

}

public function login($name){

    $sql = "SELECT * FROM users WHERE name = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("s", $name);
    $stmt->execute();

    $result = $stmt->get_result();
    return $result->fetch_assoc();
}


}



?>