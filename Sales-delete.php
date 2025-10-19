<?php
	include "config.php";
	$med = $_GET['med'];
	$cid = $_GET['cid'];
	$qty = $_GET['qty'];
	$total = $_GET['total'];

	$sql = "DELETE FROM sales WHERE `Medicine Name`='$med' AND `Customer ID`=$cid AND `Quantity`='$qty' AND `Total price`='$total'";

	if ($conn->query($sql)) {
		header("location:Sales-view.php");
	} else {
		echo "error";
	}
?>