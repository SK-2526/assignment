<?php 
session_start();
require_once '../config/csrf.php';
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

// if (!CSRF::verifyToken($_POST['csrf_token'])) {
//     die("Invalid CSRF token");
// }

$name= $_POST['name'];
$email= $_POST['email'];
$mobile_no= $_POST['mobile'];
$password= password_hash($_POST['password'], PASSWORD_DEFAULT);

$this->user->add($name,$email,$mobile_no,$password);

// $_SESSION['name']= $name;
// CSRF::regenerateToken();

header("Location: ../views/login.php");
exit();
}

public function login(){

    // if(!CSRF::verifyToken($_POST['csrf_token'])){
    //     die('Invalid Tokens');
    //     }
        
        $name = $_POST['name'];
        $password = $_POST['password'];
        
        $user = $this->user->login($name);
        
        if($user){
            
            if(password_verify($password, $user['password'])){
                
                $_SESSION['name'] = $user['name'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['customer_id'] = $user['id']; 

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

public function list(){
   $customer= $this->user->customer_list();  //model method call 

   if(isset($_GET['ajax']) AND $_GET['ajax']== 1){
     header('Content-type: application/json');
     echo json_encode($customer);
     exit();
   }

   include '../views/customerlist.php';
}  

public function exportPdf()
{
    require_once '../TCPDF-main/tcpdf.php';
    require_once '../config/Database.php';

    // Create PDF
    $pdf = new TCPDF();
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('ABC');
    $pdf->SetTitle('Customers List');

    $pdf->SetMargins(10, 10, 10);
    $pdf->AddPage();

    // Title
    $pdf->SetFont('helvetica', 'B', 14);
    $pdf->Cell(0, 10, 'Customer List', 0, 1, 'C');
    $pdf->Ln(5);

    // Table Header
    $pdf->SetFont('helvetica', 'B', 10);
    $pdf->Cell(30, 8, 'Name', 1);
    $pdf->Cell(45, 8, 'Email', 1);
    $pdf->Cell(30, 8, 'Mobile', 1);
    $pdf->Cell(30, 8, 'PAN', 1);
    $pdf->Cell(30, 8, 'Deposit', 1);
    $pdf->Ln();

    // Fetch data
    $db = new Database();
    $sql = "SELECT * FROM customers";
    $stmt = $db->conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    $pdf->SetFont('helvetica', '', 9);

    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(30, 8, $row['name'], 1);
        $pdf->Cell(45, 8, $row['email'], 1);
        $pdf->Cell(30, 8, $row['mobile_no'], 1);
        $pdf->Cell(30, 8, $row['pan_no'], 1);
        $pdf->Cell(30, 8, $row['deposite'], 1);
        $pdf->Ln();
    }
    // Output
    $pdf->Output('customers.pdf', 'D');
    exit;
}

public function createAccount(){

    if(!isset($_SESSION['customer_id'])){
        header("Location: ../views/login.php");
        exit();
    }

    $customer_id = $_SESSION['customer_id'];
    $account_number= $_POST['account_no'];
    $account_type = $_POST['account_type'];
    $bank_name = $_POST['bank_name'];
    $country = $_POST['country'];

    $this->user->createAccount($customer_id, $account_number, $account_type, $bank_name, $country);

    header("Location: ../views/view_account.php");
    exit();
}

public function viewAccount(){

    if(!isset($_SESSION['customer_id'])){
        header("Location: ../views/login.php");
        exit();
    }
    $customer_id = $_SESSION['customer_id'];

    $accounts = $this->user->getAccountDetails($customer_id);

    header("Content-Type: application/json");
    echo json_encode($accounts);
    exit();
}

}



?>