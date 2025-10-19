<?php
include "config.php";

if (isset($_GET['med'])) {
    $medicineName = $_GET['med'];
    $qry1 = "SELECT * FROM meds WHERE `Medicine Name`='$medicineName'";
    $result = $conn->query($qry1);
    $row = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $medicineName = $_POST['med']; 
    $quantity = $_POST['qty']; 
    $category = $_POST['cat']; 
    $price = $_POST['sp']; 
    $expiryDate = $_POST['edate']; 

    $sql = "UPDATE meds SET 
        `Quantity` = '$quantity',
        `Category` = '$category',
        `Price` = '$price',
        `Expiry Date` = '$expiryDate'
    WHERE `Medicine Name` = '$medicineName'";

    if ($conn->query($sql) === TRUE) {
        header("Location: Inventory-view.php");
        exit();
    } else {
        echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   
    <title>Inventory</title>
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
		<form action="Inventory-update.php" method="post">
        <div class="head">
	<h2> UPDATE MEDICINE DETAILS</h2>
	</div>
    <div class="column"style="margin-left:350px">
   
    <label for="med">Medicine Name:</label><br>
    <input type="text" name="med" value="<?php echo $row['Medicine Name']; ?>">
<p>
    <label for="qty">Quantity:</label><br>
    <input type="number" name="qty" value="<?php echo $row['Quantity']; ?>">
</p>
<p>
    <label for="cat">Category:</label><br>
    <input type="text" name="cat" value="<?php echo $row['Category']; ?>">
</p>
<p>
    <label for="sp">Price: </label><br>
    <input type="number"  name="sp" value="<?php echo $row['Price']; ?>">
</p>
<p>
    <label for="edate">Expiry Date:</label><br>
    <input type="date" name="edate" value="<?php echo $row['Expiry Date']; ?>">
</p>
                <input type="submit" name="update" value="Update">
                </div>
				</form>
		</div>
	</div>
	
</body>
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
    </html>
