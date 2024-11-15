<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Item Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        .container {
            display: flex;
            flex-direction: column;
            max-width: 1200px;
            height: 100%;
            margin: 0 auto;
            padding: 0;
        }

        h2 {
            margin-top: 10px;
        }

        .form-container {
            flex-shrink: 0;
            margin-bottom: 10px;
        }

        .table-container {
            flex-grow: 1;
            overflow-y: auto;
        }

        .table {
            margin-bottom: 0;
            height: auto;
        }

        .table th, .table td {
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header and Form -->
        <div class="form-container">
            <h2 class="text-center">Invoice Item Report</h2>

            <!-- Date Range Form -->
            <form id="invoiceItemReportForm" method="POST" action="generate_item_report.php" class="row g-3">
                <div class="col-md-4">
                    <label for="startDate" class="form-label">Start Date</label>
                    <input type="date" class="form-control" id="startDate" name="start_date" required>
                </div>
                <div class="col-md-4">
                    <label for="endDate" class="form-label">End Date</label>
                    <input type="date" class="form-control" id="endDate" name="end_date" required>
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">Generate Report</button>
                </div>
            </form>
        </div>

        <!-- Table for Invoice Item Report -->
        <div class="table-container">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Invoice No</th>
                        <th>Date</th>
                        <th>Customer Name</th>
                        <th>Item Name</th>
                        <th>Item Code</th>
                        <th>Item Category</th>
                        <th>Unit Price</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- PHP code to dynamically populate the table with data -->
                    <?php
                    if (isset($report) && count($report) > 0) {
                        foreach ($report as $row) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['invoice_no']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['invoiced_date']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['customer_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['item_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['item_code']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['item_category']) . "</td>";
                            echo "<td>" . number_format($row['unit_price'], 2) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7' class='text-center'>No data found for the selected date range.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
