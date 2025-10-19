
<?php
	include "config.php";
	$med = $_GET['med'];
	$qty = $_GET['qty'];
	$cat = $_GET['cat'];

	$sql = "DELETE FROM meds WHERE `Medicine Name`='$med' AND `Quantity`='$qty' AND `Category`='$cat'";

	if ($conn->query($sql)) {
		header("location:Inventory-view.php");
	} else {
		echo "error";
	}
?>
