<?php
include "config.php";

if (isset($_GET['cid'])) {
    $customer_id = $_GET['cid'];
    $qry1 = "SELECT * FROM customers WHERE `Customer ID`='$customer_id'";
    $result = $conn->query($qry1);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Product not found.";
        exit();
    }
}
if (isset($_POST['update'])) {
    $customer_id = $_POST['cid']; 
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $product = $_POST['pdt'];
    $payment_method = $_POST['pmd'];
    $phone_number = $_POST['phone'];
    $date = $_POST['date'];

    $sql = "UPDATE customers SET 
    `First Name` = '$first_name',
    `Last Name` = '$last_name', 
    `Product` = '$product', 
    `Payment method` = '$payment_method',
    `Phone number` = '$phone_number', 
    `Date` = '$date' 
    WHERE `Customer ID` = '$customer_id'";

    if ($conn->query($sql) === TRUE) { 
        echo "Record updated successfully.";
        header("Location: Customers-view.php");  
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   
    <title>Customers</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="Purchase.css">
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
        <br><br><br><br><br><br><br>
    <div class="one row" >

		<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <div class="head">
	<h2>UPDATE CUSTOMER DETAILS</h2>
	</div>

        <div class="column"style="margin-left:350px">

        <label for="CustomerID">Customer ID:</label><br>   
        <input type="text" name="cid" value="<?= $row['Customer ID']; ?>">
    <p>
        <label for="FirstName">First Name:</label><br>
        <input type="text" name="fname" value="<?= $row['First Name']; ?>">
    </p>
    <p>
        <label for="LastName">Last Name:</label><br>
        <input type="text" name="lname" value="<?= $row['Last Name']; ?>">
    </p>
    <p>
        <label for="Product">Product:</label><br>
        <input type="text" name="pdt" value="<?= $row['Product']; ?>">
    </p>
    <p>
        <label for="PaymentMethod">Payment Method:</label><br>
        <input type="text" name="pmd" value="<?= $row['Payment method']; ?>">
    </p>
    <p>
        <label for="PhoneNumber">Phone Number:</label><br>
        <input type="number" name="phone" value="<?= $row['Phone number']; ?>">
    </p>
    <p>
        <label for="Date">Date:</label><br>
        <input type="date" name="date" value="<?= $row['Date']; ?>">
    </p>
    </div>
    <input type="submit" name="update" value="Update"> 
</form>
            <br>
		</div>
	</div>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
    </body>
	
</html>
