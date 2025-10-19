
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   
    <title>Purchases</title>
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
                            <ion-icon name="medkit-outline"></ion-icon> Inventory &#9662;
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
                </ul>
            </nav>
        </aside> <?php
session_start();


$_SESSION = array();


if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"], $params["secure"], $params["httponly"]
    );
}


session_destroy();


header("Location: login.php");
exit;
?>
