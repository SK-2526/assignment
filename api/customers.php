<?php
// header('Content-Type: application/json');
// require_once '../models/User.php';  

// require_once '../auth.php'; 

// $method = $_SERVER['REQUEST_METHOD'];

// if ($method !== 'GET') {
//     http_response_code(405); 
//     echo json_encode([
//         'error' => 'Method not allowed. Only GET is allowed.'
//     ]);
//     exit();
// }

// Optional: Basic route checking
// $requestUri = $_SERVER['REQUEST_URI'];
// For simplicity, assume URL is like: /api/customers.php
// if (strpos($requestUri, 'customers.php') === false) {
//     http_response_code(404); 
//     echo json_encode([
//         'error' => 'Invalid API endpoint'
//     ]);
//     exit();
// }

// $userModel = new User();

// $customers = $userModel->customer_list();

// if ($customers) {
//     http_response_code(200); 
//     echo json_encode([
//         'status' => 'success',
//         'data' => $customers
//     ]);
// } else {
//     http_response_code(404); 
//     echo json_encode([
//         'status' => 'error',
//         'message' => 'No customers found'
//     ]);
// }
?>