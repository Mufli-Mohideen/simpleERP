<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '../config/db.php';

class Customer {
    private $id;
    private $title;
    private $first_name;
    private $middle_name;
    private $last_name;
    private $contact_no;
    private $district;
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Setters
    public function setTitle($title) {
        $this->title = $title;
    }

    public function setFirstName($first_name) {
        $this->first_name = $first_name;
    }

    public function setMiddleName($middle_name) {
        $this->middle_name = $middle_name;
    }

    public function setLastName($last_name) {
        $this->last_name = $last_name;
    }

    public function setContactNo($contact_no) {
        $this->contact_no = $contact_no;
    }

    public function setDistrict($district) {
        $this->district = $district;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getFirstName() {
        return $this->first_name;
    }

    public function getMiddleName() {
        return $this->middle_name;
    }

    public function getLastName() {
        return $this->last_name;
    }

    public function getContactNo() {
        return $this->contact_no;
    }

    public function getDistrict() {
        return $this->district;
    }

    // Method (add customer)
    public function addCustomer() {
        // SQL query to insert data
        $query = "INSERT INTO customer (title, first_name, middle_name, last_name, contact_no, district) 
                  VALUES (?, ?, ?, ?, ?, ?)";
    
        // Prepare statement
        if ($stmt = $this->conn->prepare($query)) {
            // Bind parameters to the prepared statement
            $stmt->bind_param("ssssss", $this->title, $this->first_name, $this->middle_name, $this->last_name, $this->contact_no, $this->district);
    
            // Execute the query and return true if successful
            if ($stmt->execute()) {
                $stmt->close();
                return true;
            }
            $stmt->close();
        }

        return false;
    }

    // Method (update customer)
    public function updateCustomer($customer_id) {
        $query = "UPDATE customer 
                SET title = ?, first_name = ?, middle_name = ?, last_name = ?, contact_no = ?, district = ? 
                WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssssssi", $this->title, $this->first_name, $this->middle_name, $this->last_name, $this->contact_no, $this->district, $customer_id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Method (get all customers)
    public function getAllCustomers() {
        $query = "SELECT * FROM customer";
        $result = $this->conn->query($query);
        $customers = [];
        
        while ($row = $result->fetch_assoc()) {
            $customers[] = $row;
        }
        return $customers;
    }

    // Method (delete customer)
    public function deleteCustomer($customer_id) {
        $query = "DELETE FROM customer WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $customer_id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
