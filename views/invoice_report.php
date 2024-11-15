<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2 class="text-center">Invoice Report</h2>
            <form id="invoiceReportForm" class="row g-3" method="POST" action="generate-invoice-report-pdf.php">
                <div class="col-md-4">
                    <label for="startDate" class="form-label">Start Date</label>
                    <input type="date" class="form-control" id="startDate" name="start_date" required>
                </div>
                <div class="col-md-4">
                    <label for="endDate" class="form-label">End Date</label>
                    <input type="date" class="form-control" id="endDate" name="end_date" required>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary w-100">Generate PDF</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        $('#invoiceReportForm').on('submit', function(e) {
            e.preventDefault();  

            var form = $(this);
            var formData = form.serialize();  

            $.ajax({
                type: 'POST',
                url: form.attr('action'),  
                data: formData,
                success: function(response) {
                    var blob = new Blob([response], { type: 'application/pdf' });

                    var link = document.createElement('a');
                    link.href = URL.createObjectURL(blob);
                    link.download = 'invoice_report.pdf';  
                    link.click(); 
                },
                error: function() {
                    alert('Error generating PDF');
                }
            });
        });
    </script>
</body>
</html>
