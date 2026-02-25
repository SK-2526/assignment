<?php 
require_once '../config/Database.php';

class User{

private $conn;

public function __construct($db){    
   $this->conn= $db;
}

// add 
public function add($name,$email,$mobile_no, $password){

$sql= "INSERT INTO users(`name`,`email`,`mobile_no`,`password`) VALUES (?,?,?,?)";
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

public function customer_list(){
    $sql= "SELECT name,email,mobile_no,pan_no,deposite FROM customers";
    $stmt= $this->conn->prepare($sql);
    $stmt->execute(); 
    $result= $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
    }


public function createAccount($customer_id, $account_number, $account_type, $bank_name, $country){

    // $account_number = "AC" . rand(10000000,99999999);

    $sql = "INSERT INTO accounts 
            (customer_id, account_number, account_type, bank_name, country)
            VALUES (?,?,?,?,?)";

    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("issss",
        $customer_id,
        $account_number,
        $account_type,
        $bank_name,
        $country
    );

    return $stmt->execute();
}

public function getAccountDetails($customer_id){
    
    $sql = "SELECT account_number, account_type, bank_name, country
            FROM accounts
            WHERE customer_id = ?";

    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $customer_id);
    $stmt->execute();

    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

}



?>