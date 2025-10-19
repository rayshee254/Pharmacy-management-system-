<?php
	include "config.php";
	$pid = $_GET['pid'];
	$qty = $_GET['qty'];
	$sup = $_GET['sup'];

	$sql = "DELETE FROM suppliers WHERE `Product`='$pid' AND `Product Quantity`='$qty' AND `Supplier Name`='$sup'";

	if ($conn->query($sql)) {
		header("location:Suppliers-view.php");
	} else {
		echo "error";
	}
?>