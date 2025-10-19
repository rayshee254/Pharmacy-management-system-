<?php
include 'config.php';

$invoiceid = $_GET['id'];

$sql = "SELECT * FROM invoices WHERE `INVOICE ID` = '$invoiceid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $invoice = $result->fetch_assoc();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Invoice</title>
    <style>
        .invoice {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            background: #f9f9f9;
        }
        .invoice h1 {
            text-align: center;
        }
        .invoice-table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }
        .invoice-table th, .invoice-table td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .invoice-table th {
            background-color: #f2f2f2;
        }
        .invoice-details {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="invoice">
        <h1>Invoice Details</h1>
        <table class="invoice-table">
            <tr>
                <th>Invoice ID</th>
                <td><?php echo $invoice["INVOICE ID"]; ?></td>
            </tr>
            <tr>
                <th>Invoice Date</th>
                <td><?php echo $invoice['INVOICE DATE']; ?></td>
            </tr>
            <tr>
                <th>Customer ID</th>
                <td><?php echo $invoice['CUSTOMER ID']; ?></td>
            </tr>
            <tr>
                <th>Medicine Name</th>
                <td><?php echo $invoice['MEDICINE NAME']; ?></td>
            </tr>
            <tr>
                <th>Total Amount</th>
                <td><?php echo $invoice['TOTAL AMOUNT']; ?></td>
            </tr>
            <tr>
                <th>Payment Method</th>
                <td><?php echo $invoice['PAYMENT METHOD']; ?></td>
            </tr>
        </table>

    <button onclick="window.print();">Print Invoice</button>
</div>

<script>
    // Trigger print dialog when the page is loaded
    window.onload = function() {
        window.print();
    };
</script>

</body>
</html>
