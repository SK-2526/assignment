<?php 

class Database{

private $host= '127.0.0.1';
private $dbname= 'bank';
private $port= 3307;
private $user='root';
private $pass='';

public $conn;

public function __construct(){
    $this-> conn= new mysqli(
    $this->host,
    $this->user,
    $this->pass,
    $this->dbname,
    $this->port
   );

if($this->conn->connect_error){
    die("connection Failed");
   }
}
}
?>
