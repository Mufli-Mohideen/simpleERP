<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            overflow: hidden;
        }

        .custom-container {
            margin: auto;
            padding-top: 10px;
            height: 110vh;
        }

        .tab-pane {
            max-height: 600px;
            overflow-y: auto;
            padding-top: 20px;
            scroll-behavior: smooth;
        }

        .tab-content {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container custom-container">
        <!-- Tabs for switching between forms -->
        <ul class="nav nav-tabs" id="itemTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="add-tab" data-bs-toggle="tab" data-bs-target="#addItemForm"
                    type="button" role="tab">Add Item</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="update-tab" data-bs-toggle="tab" data-bs-target="#updateItemForm"
                    type="button" role="tab">Update Item</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="delete-tab" data-bs-toggle="tab" data-bs-target="#deleteItemForm"
                    type="button" role="tab">Delete Item</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="show-tab" data-bs-toggle="tab" data-bs-target="#showAllItems"
                    type="button" role="tab">Show All Items</button>
            </li>
        </ul>

        <!-- Tab content for each form -->
        <div class="tab-content" id="itemTabsContent">
            <!-- Add Item Form -->
            <div class="tab-pane fade show active" id="addItemForm" role="tabpanel">
                <h4 class="mt-4">Add New Item</h4>
                <form method="POST" action="add_item.php">
                    <div class="mb-3">
                        <label for="addItemCode" class="form-label">Item Code</label>
                        <input type="text" class="form-control" id="addItemCode" name="item_code" required>
                    </div>
                    <div class="mb-3">
                        <label for="addItemName" class="form-label">Item Name</label>
                        <input type="text" class="form-control" id="addItemName" name="item_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="addItemCategory" class="form-label">Category</label>
                        <input type="text" class="form-control" id="addItemCategory" name="item_category" required>
                    </div>
                    <div class="mb-3">
                        <label for="addItemSubcategory" class="form-label">Subcategory</label>
                        <input type="text" class="form-control" id="addItemSubcategory" name="item_subcategory">
                    </div>
                    <div class="mb-3">
                        <label for="addItemQuantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="addItemQuantity" name="quantity" required>
                    </div>
                    <div class="mb-3">
                        <label for="addItemPrice" class="form-label">Unit Price</label>
                        <input type="number" step="0.01" class="form-control" id="addItemPrice" name="unit_price" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Add Item</button>
                </form>
            </div>

            <!-- Update Item Form -->
            <div class="tab-pane fade" id="updateItemForm" role="tabpanel">
                <h4 class="mt-4">Update Item</h4>
                <form method="POST" action="update_item.php">
                    <div class="mb-3">
                        <label for="updateItemId" class="form-label">Item ID</label>
                        <input type="text" class="form-control" id="updateItemId" name="item_id" required>
                    </div>
                    <div class="mb-3">
                        <label for="updateItemCode" class="form-label">Item Code</label>
                        <input type="text" class="form-control" id="updateItemCode" name="item_code">
                    </div>
                    <div class="mb-3">
                        <label for="updateItemName" class="form-label">Item Name</label>
                        <input type="text" class="form-control" id="updateItemName" name="item_name">
                    </div>
                    <div class="mb-3">
                        <label for="updateItemCategory" class="form-label">Category</label>
                        <input type="text" class="form-control" id="updateItemCategory" name="item_category">
                    </div>
                    <div class="mb-3">
                        <label for="updateItemSubcategory" class="form-label">Subcategory</label>
                        <input type="text" class="form-control" id="updateItemSubcategory" name="item_subcategory">
                    </div>
                    <div class="mb-3">
                        <label for="updateItemQuantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="updateItemQuantity" name="quantity">
                    </div>
                    <div class="mb-3">
                        <label for="updateItemPrice" class="form-label">Unit Price</label>
                        <input type="number" step="0.01" class="form-control" id="updateItemPrice" name="unit_price">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Update Item</button>
                </form>
            </div>

            <!-- Delete Item Form -->
            <div class="tab-pane fade" id="deleteItemForm" role="tabpanel">
                <h4 class="mt-4">Delete Item</h4>
                <form method="POST" action="delete_item.php">
                    <div class="mb-3">
                        <label for="deleteItemId" class="form-label">Item ID</label>
                        <input type="text" class="form-control" id="deleteItemId" name="item_id" required>
                    </div>
                    <button type="submit" class="btn btn-danger w-100">Delete Item</button>
                </form>
            </div>

            <!-- Show All Items Section -->
            <div class="tab-pane fade" id="showAllItems" role="tabpanel">
                <h4 class="mt-4">All Items</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Item ID</th>
                            <th>Item Code</th>
                            <th>Item Name</th>
                            <th>Category</th>
                            <th>Subcategory</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data to be populated dynamically -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
