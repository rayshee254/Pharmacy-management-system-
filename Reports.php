<?php
// Include necessary files
require_once 'functions.php';
require_once 'config.php';

// Establish database connection
$conn = connectToDatabase();

// Fetch the necessary data for reports
$salesReport = getSalesReport($conn);
$purchaseReport = getPurchaseReport($conn);
$stockReport = getStockReport($conn);

// Close database connection
closeConnection($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar code -->
        <main class="main-content">
            <header>
                <h1>Reports</h1>
            </header>

            <section class="reports">
                <div class="report-card">
                    <h2>Sales Report</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($salesReport as $sale) { ?>
                                <tr>
                                    <td><?php echo $sale['customer_name']; ?></td>
                                    <td><?php echo $sale['product_name']; ?></td>
                                    <td><?php echo $sale['quantity']; ?></td>
                                    <td><?php echo $sale['price']; ?></td>
                                    <td><?php echo $sale['total']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <div class="report-card">
                    <h2>Purchase Report</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Supplier</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($purchaseReport as $purchase) { ?>
                                <tr>
                                    <td><?php echo $purchase['product_name']; ?></td>
                                    <td><?php echo $purchase['quantity']; ?></td>
                                    <td><?php echo $purchase['price']; ?></td>
                                    <td><?php echo $purchase['supplier_name']; ?></td>
                                </tr>
                            <?php }
