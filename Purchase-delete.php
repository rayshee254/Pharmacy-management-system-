
<?php
include "config.php";


if (isset($_GET['mid'])) {
    $medicineName = $_GET['mid'];

    $sql = "DELETE FROM purchases WHERE `Medicine Name`='$medicineName'";

  
    if ($conn->query($sql) === TRUE) {
        header("Location: Purchase-view.php");
        exit();
    } else {
        echo "<p style='color:red;'>Error! Unable to delete: " . $conn->error . "</p>";
    }
} else {
    echo "<p style='color:red;'>No medicine selected for deletion.</p>";
}

$conn->close();
?>
