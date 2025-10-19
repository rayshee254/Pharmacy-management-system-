<?php
include 'config.php';

$conn = mysqli_connect("localhost", "root", "", "quickfix pharmacy");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT `Medicine Name`, `Category`, `Supplier`, `Cost`, `Quantity`, `Date of Purchase`, `Expiry Date` FROM purchases";
$result = $conn->query($sql);


$totalPurchases = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
           background-color:#f1f5f9;
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
        .total-purchase {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Purchase Report</h1>
    <table>
        <tr>
            <th>Medicine Name</th>
            <th>Category</th>
            <th>Supplier</th>
            <th>Cost</th>
            <th>Quantity</th>
            <th>Total Cost</th>
            <th>Date of Purchase</th>
            <th>Expiry Date</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                
                $totalCost = $row['Cost'] * $row['Quantity'];
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['Medicine Name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Category']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Supplier']) . "</td>";
                echo "<td>" . number_format($row['Cost'], 2) . "</td>";
                echo "<td>" . $row['Quantity'] . "</td>";
                echo "<td>" . number_format($totalCost, 2) . "</td>"; // Display calculated total cost
                echo "<td>" . htmlspecialchars($row['Date of Purchase']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Expiry Date']) . "</td>";
                echo "</tr>";

              
                $totalPurchases += $totalCost; 
            }
        } else {
            echo "<tr><td colspan='8'>No purchases found.</td></tr>";
        }
        ?>
    </table>

    <div class="total-purchase">
        Total Purchases: <?php echo number_format($totalPurchases, 2); ?>
    </div>

    <?php $conn->close(); ?>
</body>
</html>