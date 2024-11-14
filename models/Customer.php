<?php
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

    // Method (add customer)
    public function addCustomer() {
        $query = "INSERT INTO customer (title, first_name, middle_name, last_name, contact_no, district)
                  VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssssss", $this->title, $this->first_name, $this->middle_name, $this->last_name, $this->contact_no, $this->district);

        if ($stmt->execute()) {
            return true;
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
