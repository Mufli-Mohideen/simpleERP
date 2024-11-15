<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Report</title>
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
            height: 100%; /* Take full height */
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
            margin-bottom: 0; /* Removed bottom margin */
            height: auto; /* Make table height responsive */
        }

        .table th, .table td {
            vertical-align: middle; /* Align text in cells */
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Custom Wrapper Container -->
        <div class="custom-container">
            <div class="form-container">
                <h2 class="text-center">Invoice Report</h2>

                <!-- Date Range Form -->
                <form id="invoiceReportForm" method="POST" action="generate_report.php" class="row g-3">
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

            <!-- Invoice Report Table -->
            <div class="table-container">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Invoice No</th>
                            <th>Date</th>
                            <th>Customer Name</th>
                            <th>District</th>
                            <th>Item Count</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- PHP code to dynamically populate the table with data -->
                        <?php
                        if (isset($invoices) && count($invoices) > 0) {
                            foreach ($invoices as $invoice) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($invoice['invoice_no']) . "</td>";
                                echo "<td>" . htmlspecialchars($invoice['date']) . "</td>";
                                echo "<td>" . htmlspecialchars($invoice['customer']) . "</td>";
                                echo "<td>" . htmlspecialchars($invoice['district']) . "</td>";
                                echo "<td>" . htmlspecialchars($invoice['item_count']) . "</td>";
                                echo "<td>" . number_format($invoice['amount'], 2) . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center'>No invoices found for the selected date range.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
