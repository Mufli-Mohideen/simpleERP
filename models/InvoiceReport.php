<?php
include_once '../config/db.php';

class InvoiceReport {

    //Method(Create Invoice Reports based on Start and End date)
    public function getInvoicesWithCustomerDetails($startDate, $endDate) {
        global $conn;
        $query = "
            SELECT 
                i.invoice_no,
                i.date,
                i.customer,
                i.item_count,
                i.amount,
                c.title,
                c.first_name,
                c.middle_name,
                c.last_name,
                c.district
            FROM
                invoice i
            JOIN
                customer c ON i.customer = c.id
            WHERE
                i.date BETWEEN ? AND ?
        ";

        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $startDate, $endDate);
        $stmt->execute();
        $result = $stmt->get_result();

        $report = [];
        while ($row = $result->fetch_assoc()) {
            // Combine Customer Name
            $fullName = $row['title'] . ' ' . $row['first_name'] . ' ' . $row['middle_name'] . ' ' . $row['last_name'];
            
            $report[] = [
                'invoice_no' => $row['invoice_no'],
                'date' => $row['date'],
                'customer' => $fullName,
                'district' => $row['district'],
                'item_count' => $row['item_count'],
                'amount' => $row['amount']
            ];
        }

        return $report;
    }
}

?>