<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/customer_styles.css">
    <style>
        body {
            overflow: hidden;
        }

        .custom-container {
            margin: auto;
            padding-top: 10px;
            height: 110vh;
        }

        /* Ensure that each form starts from the top */
        .tab-pane {
            max-height: 600px;
            overflow-y: auto;
            padding-top: 20px;
            scroll-behavior: smooth;
        }

        /* Add padding between tab content sections */
        .tab-content {
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <div class="container custom-container">
        <!-- Tabs for switching between forms -->
        <ul class="nav nav-tabs" id="customerTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="add-tab" data-bs-toggle="tab" data-bs-target="#addCustomerForm"
                    type="button" role="tab">Add Customer</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="update-tab" data-bs-toggle="tab" data-bs-target="#updateCustomerForm"
                    type="button" role="tab">Update Customer</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="delete-tab" data-bs-toggle="tab" data-bs-target="#deleteCustomerForm"
                    type="button" role="tab">Delete Customer</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="show-tab" data-bs-toggle="tab" data-bs-target="#showAllCustomers"
                    type="button" role="tab">Show All Customers</button>
            </li>
        </ul>

        <!-- Tab content for each form -->
        <div class="tab-content" id="customerTabsContent">
            <!-- Add Customer Form -->
            <div class="tab-pane fade show active" id="addCustomerForm" role="tabpanel">
                <h4 class="mt-4">Add New Customer</h4>
                <form method="POST" action="add_customer.php">
                    <div class="mb-3">
                        <label for="addTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="addTitle" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="addFirstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="addFirstName" name="first_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="addMiddleName" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="addMiddleName" name="middle_name">
                    </div>
                    <div class="mb-3">
                        <label for="addLastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="addLastName" name="last_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="addContactNo" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="addContactNo" name="contact_no" required>
                    </div>
                    <div class="mb-3">
                        <label for="addDistrict" class="form-label">District</label>
                        <input type="text" class="form-control" id="addDistrict" name="district" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Save Customer</button>
                </form>
            </div>

            <!-- Update Customer Form -->
            <div class="tab-pane fade" id="updateCustomerForm" role="tabpanel">
                <h4 class="mt-4">Update Customer</h4>
                <form method="POST" action="update_customer.php">
                    <div class="mb-3">
                        <label for="updateId" class="form-label">Customer ID</label>
                        <input type="text" class="form-control" id="updateId" name="customer_id" required>
                    </div>
                    <div class="mb-3">
                        <label for="updateTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="updateTitle" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="updateFirstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="updateFirstName" name="first_name">
                    </div>
                    <div class="mb-3">
                        <label for="updateMiddleName" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="updateMiddleName" name="middle_name">
                    </div>
                    <div class="mb-3">
                        <label for="updateLastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="updateLastName" name="last_name">
                    </div>
                    <div class="mb-3">
                        <label for="updateContactNo" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="updateContactNo" name="contact_no">
                    </div>
                    <div class="mb-3">
                        <label for="updateDistrict" class="form-label">District</label>
                        <input type="text" class="form-control" id="updateDistrict" name="district">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Update Customer</button>
                </form>
            </div>

            <!-- Delete Customer Form -->
            <div class="tab-pane fade" id="deleteCustomerForm" role="tabpanel">
                <h4 class="mt-4">Delete Customer</h4>
                <form method="POST" action="delete_customer.php">
                    <div class="mb-3">
                        <label for="deleteId" class="form-label">Customer ID</label>
                        <input type="text" class="form-control" id="deleteId" name="customer_id" required>
                    </div>
                    <button type="submit" class="btn btn-danger w-100">Delete Customer</button>
                </form>
            </div>

            <!-- Show All Customers Section -->
            <div class="tab-pane fade" id="showAllCustomers" role="tabpanel">
                <h4 class="mt-4">All Customers</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Customer ID</th>
                            <th>Title</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Contact No</th>
                            <th>District</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS for tabs functionality -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>