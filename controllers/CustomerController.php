<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../config/db.php';
require_once '../models/Customer.php';

class CustomerController {

    private $conn;
    private $customer;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();

        $this->customer = new Customer($this->conn);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo "<pre>";
            print_r($_POST);
            echo "</pre>";

            $this->addCustomer();
        }
    }

    public function addCustomer() {
        $title = $_POST['title'] ?? null;
        $first_name = $_POST['first_name'] ?? null;
        $middle_name = $_POST['middle_name'] ?? null;
        $last_name = $_POST['last_name'] ?? null;
        $contact_no = $_POST['contact_no'] ?? null;
        $district = $_POST['district'] ?? null;

        if (empty($title) || empty($first_name) || empty($last_name) || empty($contact_no) || empty($district)) {
            echo "<script>alert('Error: All required fields must be filled out.');</script>";
            return;
        }

        $this->customer->setTitle($title);
        $this->customer->setFirstName($first_name);
        $this->customer->setMiddleName($middle_name);
        $this->customer->setLastName($last_name);
        $this->customer->setContactNo($contact_no);
        $this->customer->setDistrict($district);

        if ($this->customer->addCustomer()) {
            echo "<script>alert('Customer added successfully!'); window.location.href='../views/dashboard.php';</script>";
        } else {
            echo "<script>alert('Error: Could not add customer.');</script>";
        }
    }
}

new CustomerController();
