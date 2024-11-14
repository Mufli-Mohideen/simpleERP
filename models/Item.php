<?php
include_once '../config/db.php';

class Item {
    private $conn;
    private $item_code;
    private $item_name;
    private $item_category;
    private $item_subcategory;
    private $quantity;
    private $unit_price;

    // Constructor to initialize database connection
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Method (Add item)
    public function addItem() {
        $query = "INSERT INTO item (item_code, item_category, item_subcategory, item_name, quantity, unit_price) 
                  VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ssssdi', $this->item_code, $this->item_category, $this->item_subcategory, $this->item_name, $this->quantity, $this->unit_price);
        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Method (Update item)
    public function updateItem($item_id) {
        $query = "UPDATE item 
                  SET item_code = ?, 
                      item_category = ?, 
                      item_subcategory = ?, 
                      item_name = ?, 
                      quantity = ?, 
                      unit_price = ? 
                  WHERE item_id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ssssdii', $this->item_code, $this->item_category, $this->item_subcategory, $this->item_name, $this->quantity, $this->unit_price, $item_id);
        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Method (Delete item)
    public function deleteItem($item_id) {
        $query = "DELETE FROM item WHERE item_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $item_id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Method (Get all items)
    public function getAllItems() {
        $query = "SELECT * FROM item";
        $result = $this->conn->query($query);
        return $result;
    }
}
?>
