<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="Table1.css">
<title>
Suppliers
</title>
</head>

<body>
<div class="container">
<aside class="sidebar">
            <div class="profile">
                <a href="#" class="logo-link"></a>
                <h2>QuickFix <br>Pharmacy</h2></br>
              
            </div>
            <div class="search-bar">
                <ion-icon name="search-outline" class="search-icon"></ion-icon>
                <input type="text" id="searchInput" placeholder="Search..." onkeyup="filterCards()">
            </div>
           
            <nav>
                <ul>
                    <li>
                        <ion-icon name="home-outline"></ion-icon> <a href="index.php">Dashboard</a>
                    </li>
                    <li>
                        <span class="dropdown">
                            <ion-icon name="cart-outline"></ion-icon> Purchase &#9662;
                        </span>
                        <ul class="submenu">
                            <li><a href="Purchase-add.php">Add Purchases</a></li>
                            <li><a href="Purchase-view.php">Manage Purchases</a></li>
                        </ul>
                    </li>
                    <li>
                        <span class="dropdown">
                            <ion-icon name="person-add-outline"></ion-icon> Supplier &#9662;
                        </span>
                        <ul class="submenu">
                            <li><a href="Suppliers-add.php">Add Supplier</a></li>
                            <li><a href="Suppliers-view.php">Manage Supplier</a></li>
                        </ul>
                    </li>
                    <li>
                        <span class="dropdown">
                            <ion-icon name="cash-outline"></ion-icon> Sales &#9662;
                        </span>
                        <ul class="submenu">
                            <li><a href="Sales-add.php">Add Sales</a></li>
                            <li><a href="Sales-view.php"> Manage Sales</a></li>
                        </ul>
                    </li>
                    <li>
                    <span class="dropdown">
                            <ion-icon name="people-circle"></ion-icon> Customers &#9662;
                        </span>
                        <ul class="submenu">
                            <li><a href="Customers-add.php">Add Customers</a></li>
                            <li><a href="Customers-view.php">Manage Customers</a></li>
                        </ul>
                    </li>
                    
                   
                  
                    <li>
                        <span class="dropdown">
                            <ion-icon name="medkit-outline"></ion-icon> Medicine &#9662;
                        </span>
                        <ul class="submenu">
                            <li><a href="Inventory-add.php">Add Inventory</a></li>
                            <li><a href="Inventory-view.php">Manage Inventory</a></li>
                        </ul>
                    </li>
                    <li>
                        <span class="dropdown">
                            <ion-icon name="document-text-outline"></ion-icon> Invoices &#9662;
                        </span>
                        <ul class="submenu">
                            <li><a href="New-invoice.php">New Invoice</a></li>
                            <li><a href="Invoices-view.php">Manage Invoices</a></li>
                        </ul>
                    </li>
                    <li>
                        <span class="dropdown">
                            <ion-icon name="analytics-outline"></ion-icon> Reports &#9662;
                        </span>
                        <ul class="submenu">
                            <li><a href="sales_report.php" class="report-toggle">Sales Report</a></li>
                            <li><a href="purchase_report.php" class="report-toggle">Purchase Report</a></li>
                        </ul>
                    </li>
                    <ul>
                    <li>
                        <ion-icon name="home-outline"></ion-icon> <a href="login.php">Log out</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <table  id="table1" >
    <caption>SUPPLIERS LIST</caption>
    <tr>
        <th>Product</th>
        <th>Product Quantity</th>
        <th>Supplier Name</th>
        <th>Supplier Phone</th>
        <th>Supplier Email</th>
        <th>Location</th>
        <th>Action</th>
    </tr>
    <?php

include "config.php";
$sql = "SELECT `Product`, `Product Quantity`, `Supplier Name`, `Supplier Phone`, `Supplier Email`, `Location` FROM suppliers"; 
 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Product"] . "</td>";
        echo "<td>" . $row["Product Quantity"] . "</td>";
        echo "<td>" . $row["Supplier Name"] . "</td>";
        echo "<td>" . $row["Supplier Phone"] . "</td>";
        echo "<td>" . $row["Supplier Email"] . "</td>";
        echo "<td>" . $row["Location"] . "</td>";
        echo "<td align=center>";
        echo "<a class='button1 edit-btn' href=Suppliers-update.php?pid=" . $row['Product'] . "&qty=" . $row['Product Quantity'] . "&sup=" . $row['Supplier Name'] . "&phone=" . $row['Supplier Phone'] . "&email=" . $row['Supplier Email'] . "&loc=" . $row['Location'] . ">Edit</a>";
echo "<a class='button1 del-btn' href=Suppliers-delete.php?pid=" . $row['Product'] . "&qty=" . $row['Product Quantity'] . "&sup=" . $row['Supplier Name'] . "&phone=" . $row['Supplier Phone'] . "&email=" . $row['Supplier Email'] . "&loc=" . $row['Location'] . ">
    <ion-icon name='trash-outline'></ion-icon>
</a>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

$conn->close();
?>
</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<script>
      
        const dropdowns = document.querySelectorAll('.dropdown');
        dropdowns.forEach(dropdown => {
            dropdown.addEventListener('click', function() {
                const submenu = this.nextElementSibling;

                
                document.querySelectorAll('.submenu').forEach(sub => {
                    if (sub !== submenu) {
                        sub.style.display = 'none';
                    }
                });

                
                submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
            });
        });

        function filterCards() {
            const input = document.getElementById('searchInput');
            const filter = input.value.toLowerCase();
            const cards = document.querySelectorAll('.card');

            cards.forEach(card => {
                const text = card.textContent || card.innerText;
                card.style.display = text.toLowerCase().includes(filter) ? '' : 'none';
            });
        }

        document.getElementById('searchInput').addEventListener('keyup', function(event) {
            if (event.key === 'Enter') {
                filterCards(); 
            }
        });
    </script>

</html>

