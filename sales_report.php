<?php
include 'config.php'; // Include your database configuration file

// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "quickfix pharmacy");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the sales table
$sql = "SELECT `Medicine Name`, `Customer ID`, `Quantity`, `Total price`, `Payment method`, `Date` FROM sales";
$result = $conn->query($sql);

// Initialize total sales
$totalSales = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f5f9;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #2b7aae;
        }
        .total-sales {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Sales Report</h1>
    <table>
        <tr>
            <th>Medicine Name</th>
            <th>Customer ID</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Payment Method</th>
            <th>Date</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['Medicine Name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Customer ID']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Quantity']) . "</td>";
                echo "<td>" . number_format($row['Total price'], 2) . "</td>";
                echo "<td>" . htmlspecialchars($row['Payment method']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Date']) . "</td>";
                echo "</tr>";

                // Add to total sales
                $totalSales += $row['Total price'];
            }
        } else {
            echo "<tr><td colspan='6'>No sales found.</td></tr>";
        }
        ?>
    </table>

    <div class="total-sales">
        Total Sales: <?php echo number_format($totalSales, 2); ?>
    </div>

    <?php $conn->close(); ?>
</body>
</html>