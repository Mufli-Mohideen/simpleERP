<?php
// Include necessary files
require_once './models/Customer.php';  // Adjust this path as needed to include the Customer class

// Assume you have a Database connection class like Database.php
require_once './config/db.php'; 

// Create a new Database instance and get the connection
$database = new Database();
$conn = $database->getConnection();

// Create an instance of the CustomerModel (where your getAllCustomers method is defined)
$customerModel = new Customer($conn);

// Call the getAllCustomers method to fetch customer data
$customers = $customerModel->getAllCustomers();

// Check if customers are fetched successfully
if ($customers) {
    echo "<pre>";
    print_r($customers);  // Display the customer data
    echo "</pre>";
} else {
    echo "No customers found.";
}

?>
